<?php

namespace App\Rules;

use App\Models\Term;
use Illuminate\Contracts\Validation\Rule;

class OneActiveTermRule implements Rule
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
        // If the term is active and there is already an active term, return false
        if ($value && Term::where('active', '=', 1)->get()->count() > 0) {
            return false;
        }
        
        return true;
    }

    public function message()
    {
        return 'There can only be one active term.';
    }
}
