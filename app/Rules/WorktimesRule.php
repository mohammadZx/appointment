<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WorktimesRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        public $data
    )
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

        $status = true;
        foreach($value as $item){
            if(
                !isset($item['workhours']) ||
                !isset($item['time_start']) ||
                !isset($item['time_end']) ||
                !isset($item['type']) ||
                !$item['workhours'] ||
                !$item['time_start'] ||
                !$item['time_end'] ||
                !$item['type']){
                    $status = false;
                }
        }
        return $status;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.custom.worktimes.invalid');
    }
}
