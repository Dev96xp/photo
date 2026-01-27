<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // ReCAPTCHA    Parte[3/4]
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => '6Ldd3EgsAAAAALWi3LdNSYqtD9fxHyeOZiWyzAJe',
                'response' => $value,
            ])->object();

        if ($response->success && $response->score >= 0.7) {
            // dd('El Usuario es Humano bueno');    // Significa que la validación ha sido exitosa y el usuario es humano, por tanto no se hace nada
            // se deja pasar la validación y se guarda el usuario.
        } else {
            $fail('Verification failed. Please try again.');    // Significa que la validación ha fallado
        }
    }


}
