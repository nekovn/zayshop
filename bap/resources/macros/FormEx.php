<?php
use App\Helpers\Form\Helper;

/**
 * Label Span タグ拡張
 */

Form::macro('labelSpan', function ($name, $text, $attributes = []) {
    return "<label class='${attributes['class']}' for='$name'>$text ${attributes['span']}</label>";
});

/**
 * password eye icon
 */
Form::macro('passwordEye', function ($name, $attributes = []) {
    $xhtml = Form::password($name, $attributes);
    $xhtml.= Helper::spanEyePassword();
    return $xhtml;
});

/**
 * remember checkbox
 */
Form::macro('checkboxRemember', function ($name, $value, $isChecked, $attributes = []) {
    $input = Form::checkbox($name, $value, $isChecked, $attributes);
    $text = Helper::spanRememberPassword();
    return "<label class='form-check'>$input $text</label>";
});
/**
 * agree checkbox
 */
Form::macro('checkboxAgree', function ($name, $value, $isChecked, $attributes = []) {
    $input = Form::checkbox($name, $value, $isChecked, $attributes);
    $text = Helper::spanAgreeCheckbox();
    return "<label class='form-check'>$input $text</label>";
});


