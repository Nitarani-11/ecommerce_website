<?php

namespace App\Helpers;

class Number
{
    /**
     * Format a number as currency.
     *
     * @param float $amount
     * @param string $currency
     * @return string
     */
    public static function currency($amount, $currency = 'INR')
    {
        return $currency . ' ' . number_format($amount, 2);
    }
}
