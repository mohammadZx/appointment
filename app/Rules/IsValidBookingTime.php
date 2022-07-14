<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsValidBookingTime implements Rule
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
            list($start, $end) = explode('|', $value);
            if(isset($this->data['appointment_id'])){
                return is_valid_appointment($this->data['listing_id'], $this->data['service'], $this->data['date'] ,$start, $end, $this->data['appointment_id']);
            }
            return is_valid_appointment($this->data['listing_id'], $this->data['service'], $this->data['date'] ,$start, $end);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.custom.booking_time.invalid');
    }
}
