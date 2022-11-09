<?php

namespace App\Helpers\Form;

use App\Enums\DefaultDefine;
use App\Helpers\RenderIconSvg;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;

class Helper
{

    use RenderIconSvg;

    /**
     * Forgot password
     * @return string
     */
    public static function spanForgotPassword($routeName = 'client.password.request'): string
    {
        $text = Lang::get('global.B.login.forgot');
        $router = route($routeName);
        return "<span class='form-label-description'><a href='$router'>$text</a></span>";
    }

    /**
     *
     * @return string
     */
    public static function spanEyePassword(): string
    {
        $iconOn = self::renderElementIcon('EyePassword');
        $iconOff = self::renderElementIcon('EyeOffPassword');
        return "<label id='eye'><span class='input-group-text px-2' id='eye-on'>$iconOn</span>
                <span class='input-group-text px-2 d-none' id='eye-off'>$iconOff</span></label>";
    }

    public static function spanRememberPassword(): string
    {
        $text = Lang::get('global.B.login.remember');
        return "<span class='form-check-label'>$text</span>";
    }

    public static function spanAgreeCheckbox(): string
    {
        $text = Lang::get('global.M.p.utility.agree');
        return "<span class='form-check-label'>$text</span>";
    }

    /**
     * Formでフィールドを表示する
     * @param $fields
     * @param $attributes
     * @param $classLabel
     * @param $classInput
     * @return string
     */
    public static function renderFormFields($fields, $attributes, $classLabel, $classInput = ''): string
    {
        $xhtml = '';
        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $attribute = $attributes[$field];
                if ($attribute['isShow']) {
                    $divClass = $field == 'textarea' ? 'mb-3' : $classLabel;
                    $subLabel = $attribute['sub_label'] ? "<small class='form-hint'>${attribute['sub_label']}</small>" : '';
                    $input = $classInput ? "<div class='col'>${attribute['input']} $subLabel</div>" : "${attribute['input']}";
                    $xhtml .= "<div class='$divClass'>${attribute['label']} $input</div>";
                }
            }

        }
        return $xhtml;
    }

    /**
     * Modalでフォームのフィールドを表示する
     * @param $fields
     * @param $showLabel
     * @return string
     */
    public static function renderFormFieldsModal($fields, $showLabel = true): string
    {
        $attributes = self::getAttributeForm();
        $xhtml = '';
        foreach ($fields as $field) {
            if (array_key_exists($field, $attributes)) {
                $attribute = $attributes[$field];
                if ($attribute['isShow']) {
                    $divClass = $field == 'textarea' ? 'mb-2 col-lg-12' : 'mb-1 col-lg-6';
                    $label = $showLabel ? $attribute['label'] : '';
                    $xhtml .= "<div class='$divClass'>${label} ${attribute['input']}</div>";
                }
            }

        }
        return $xhtml;
    }

    /**
     * Modalでフォームの項目を取得する
     * @return array
     */
    public static function getAttributeForm(): array
    {
        $attributes = config('app-settings.form') ?? [];
        foreach ($attributes as $key => &$value) {
            $input = $value['input'];
            $value['label'] = "<label class='${value['label_class']}' for='$key'>${value['label']}</label>";
            $id = "input-$key";
            switch ($key) {
                case 'title':
                    $value['input'] = "<input type='$input' class='${value['input_class']}' name='$key' id='$id' placeholder='${value['placeholder']}' value='${value['value']}'>";
                    break;
                case 'image':
                    $value['input'] = "<input type='file' class='${value['input_class']}' name='$key' id='$id' value='${value['value']}'>";
                    break;
                case 'textarea':
                    $value['input'] = "<textarea class='${value['input_class']}' id='$id' placeholder='${value['placeholder']}' name='$key' cols='50' rows='10'></textarea>";
                    break;
                default:
                    break;
            }
        }
        return $attributes;
    }

    /**
     * @param $inputData
     * @param $arrLabel
     * @param $arrOld
     * @return string
     */
    public static function setInputEditData($inputData, $arrLabel, $arrOld, $areaLabel = true): string
    {
        $xhtml = '';
        foreach ($inputData as $type => $attribute) {
            if (is_array($attribute) && count($attribute)) {
                foreach ($attribute as $key => $value) {
                    $xhtml .= ($type !== 'hidden') ? "<div class='col-lg-6'>" : "";
                    $flag = !is_array($value) ? $value : $key;
                    $oldValue = '';

                    if (array_key_exists($flag, $arrLabel) && $areaLabel) {
                        $xhtml .= "<label class='form-label' for='input-$flag'>${arrLabel[$flag]}</label>";
                    }
                    if (array_key_exists($flag, $arrOld['items'])) {
                        $oldValue = $arrOld['items'][$flag];
                    }
                    $xhtml .= self::renderFormInputModal($type, $flag, $value, $oldValue, 'edit');
                    $xhtml .= ($type !== 'hidden') ? "</div>" : "";
                }

            }
        }
        return $xhtml;
    }

    public static function setInputCreateData($inputData, $arrLabel): string
    {
        $xhtml = '';
        foreach ($inputData as $type => $attribute) {
            if (is_array($attribute) && count($attribute)) {
                foreach ($attribute as $key => $value) {
                    $xhtml .= "<div class='col-lg-6'>";
                    $flag = !is_array($value) ? $value : $key;
                    if (array_key_exists($flag, $arrLabel)) {
                        $xhtml .= "<label class='form-label' for='input-$flag'>${arrLabel[$flag]}</label>";
                    }
                    $xhtml .= self::renderFormInputModal($type, $key, $value, [], 'create');
                    $xhtml .= "</div>";
                }
            }
        }
        return $xhtml;
    }


    /**
     * Modalでフォームのフィールドを表示する
     * @param $type
     * @param $key
     * @param $newValue
     * @param $oldValue
     * @param $event
     * @return string
     */
    public static function renderFormInputModal($type, $key, $newValue, $oldValue, $event): string
    {
        $oldValue = $event === 'create' ? '' : $oldValue;
        $name = $event === 'create' ? $newValue : $key;
        $acceptImg = DefaultDefine::ACCEPT_IMG;
        $xhtml = '';
        switch ($type) {
            case 'textarea':
                $xhtml .= "<div class='mb-2 col-lg-12'>";
                $xhtml .= "<textarea class='form-control mt-1' name='$name' cols='50' rows='10'></textarea>";
                $xhtml .= "</div>";
                break;
            case 'checkbox':
                $elmCheckbox = '';
                if (is_array($newValue)) {
                    foreach ($newValue as $attr) {
                        $checked = '';
                        if (is_array($oldValue)) {
                            foreach ($oldValue as $old) {
                                if($old['id'] == $attr['id']) {
                                    $checked = 'checked';
                                }
                            }
                        }
                        $elmCheckbox .= '<label class="form-check">';
                        $elmCheckbox .= "<input type='$type' class='form-check-input' name='{$key}[]' value='{$attr['id']}' $checked>";
                        $elmCheckbox .= "<span class='form-check-label'>{$attr['name']}</span>";
                        $elmCheckbox .= '</label>';
                    }
                }
                $xhtml .= $elmCheckbox;
                break;
            case 'select':
                $elmSelect = '';
                if (is_array($newValue['code_value'])) {
                    $elmSelect .= "<select class='form-select' id='input-$key' name='{$key}'>";
                    foreach ($newValue['code_value'] as $attr) {
                        $selected = $oldValue == $attr['key'] ? 'selected' : '';
                        $elmSelect .= "<option value='{$attr['key']}' $selected>{$attr['value']}</option>";
                    }
                    $elmSelect .= '</select>';
                }
                $xhtml .= $elmSelect;
                break;
            case 'image':
                $xhtml .= "<input class='form-control mt-1' type='file' name='$name' id='input-$name' value='' accept='$acceptImg' data-image='$oldValue'>";
                break;
            case 'multiple_image':
                if (is_array($oldValue)) {
                    $xhtml .= "<input class='form-control mt-1' type='file' name='image[]' id='input-image' value='' multiple='multiple' accept='$acceptImg' data-image=''>";
                    foreach ($oldValue as $img) {
                        $xhtml .= "<input type='hidden' name='old_image[]' value='{$img['name']}'>";
                    }
                } else {
                    $xhtml .= "<input class='form-control mt-1' type='file' name='image[]' id='input-image' value='' multiple='multiple' accept='$acceptImg' data-image='$oldValue'>";
                }
                break;
            default:
                $xhtml .= "<input class='form-control mt-1' type='$type' name='$name' id='input-$name' value='$oldValue'>";
                break;

        }
        return $xhtml;
    }

    /**
     * Printボタンを表示する
     * @return string
     */
    public static function renderButtonPrint(): string
    {
        $icon = self::renderElementIcon('Print');
        $btnName = Lang::get('global.B.print');
        $divName = 'printBill("print")';
        return "<button type='button' class='btn btn-primary' onclick='${divName}'>$icon$btnName</button>";
    }

    /**
     * Footer Text Invoiceを表示する
     * @return string
     */
    public static function showFooterTextInvoice(): string
    {
        $text = Lang::get('global.F.text.invoice');
        return "<p class='text-muted text-center mt-5'>Nội dung chuyển khoản: Nộp tiền + Mã số (Ví dụ: Nộp tiền SM501 )</p>";
    }
}
