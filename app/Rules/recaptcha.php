<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Session;

class recaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $secretkey = '6LdOEQsdAAAAAJ7kgChWqYfcG7QUuNzUP0w-HyRk';
        $response = $value;
        $userIp = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$userIp";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if(!$response->success){
            Session::flash('g-recaptcha-response','لطفا تیک من ربات نیستم را فعال نمایید.');
        }
        return $response->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
