<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    /**
     * Validar el campo reCAPTCHA.
     *
     * @param  string  $attribute
     * @param  mixed   $value
     * @param  Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET'),
            'response' => $value,
        ])->object();

        if(!$response->success || $response->score < 0.6){
            $fail(__('The :attribute verification failed. Please try again.'));
        }
    }


    public function message()
    {
        return __('The :attribute verification failed. Please try again.');
    }
}
