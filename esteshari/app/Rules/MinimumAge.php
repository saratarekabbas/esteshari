<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MinimumAge implements Rule
{
    public function passes($attribute, $value)
    {
        // Calculate the minimum allowed date of birth
        $minimumDateOfBirth = now()->subYears(21);

        // Check if the provided date of birth is at least 21 years old
        return strtotime($value) <= $minimumDateOfBirth->timestamp;
    }

    public function message()
    {
        return 'The :attribute must be at least 21 years old.';
    }
}
