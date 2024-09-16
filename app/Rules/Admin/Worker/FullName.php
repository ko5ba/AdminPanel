<?php

namespace App\Rules\Admin\Worker;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class FullName implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $parts = explode(' ', $value);

        if(count($parts) !== 3) {
            $fail('ФИО должно состоять из трех слов.');
        }

        foreach($parts as $part) {
            if(!is_string($part) || trim($part) === '') {
                $fail('ФИО должно состоять их трех слов.');
            }
        }
    }
}
