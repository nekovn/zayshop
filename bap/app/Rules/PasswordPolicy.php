<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordPolicy implements Rule
{
    public function __construct()
    {
        $this->passwordPolicy = config("app-settings.admin.password-policy");
    }

    public function passes($attribute, $value)
    {
        if (!$this->passwordPolicy) {
            return true;
        } elseif ($this->passwordPolicy['minlength'] > 0 && strlen($value) < $this->passwordPolicy['minlength']) {
            $this->error = 'minlength';
            return false;
        } elseif ($this->passwordPolicy['include-numeric'] && !preg_match("/[0-9]/", $value)) {
            $this->error = 'include-numeric';
            return false;
        } elseif ($this->passwordPolicy['include-symbol'] && !preg_match("/[".preg_quote("!#$%()*+-./:;=?@[]^_`{|}","/")."]+/", $value)) {
            $this->error = 'include-symbol';
            return false;
        } elseif ($this->passwordPolicy['minlength'] > 0 && $this->passwordPolicy['frequently-phrases']) {
            if (!isset($this->passwordPolicy['frequently-phrases'][$this->passwordPolicy['minlength']])) {
                return true;
            }
            $phrases = $this->passwordPolicy['frequently-phrases'][$this->passwordPolicy['minlength']];
            if (in_array($value, $phrases)) {
                $this->error = 'frequently-phrases';
                return false;
            }
            return true;
        }
        return true;
    }

    public function message()
    {
        ///'password-policy' => [
        //        'minlength'       => ':attributeは:min文字以上にしてください。',
        //trans (): set lai array voi (:min )

        return trans('validation.password-policy.'.$this->error, ['min' => $this->passwordPolicy['minlength']]);

    }
}
