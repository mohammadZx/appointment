<?php

namespace App\Rules;

use App\Models\SubService;
use Illuminate\Contracts\Validation\Rule;

class ServicesRule implements Rule
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
                !isset($item['lilsting_services']) ||
                !SubService::find($item['lilsting_services']) ||
                !isset($item['time']) ||
                !isset($item['price']) ||
                !$item['time'] ||
                !$item['price']){
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
        return 'The validation error message.';
    }
}
