<?php

namespace App\Rules;

use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Validation\Rule;

class RangeDate implements Rule
{
    private DateTime $dateFrom;
    private DateTime $dateTo;
    private ?int $maxRange;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Carbon $dateFrom, Carbon $dateTo, ?int $maxRange = 24)
    {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        $this->maxRange = $maxRange;
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
        return $this->dateTo->diffInDays($this->dateFrom) < $this->maxRange;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Range of store can`t be more than 24 days.';
    }
}
