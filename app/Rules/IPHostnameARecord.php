<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IPHostnameARecord implements Rule
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
     * @param  mixed  $value
     */
    public function passes(string $attribute, $value): bool
    {
        $ipValid = filter_var($value, FILTER_VALIDATE_IP) !== false;
        $domainValid = filter_var($value, FILTER_VALIDATE_DOMAIN) !== false;
        $aRecord = checkdnsrr($value, 'A');

        return $ipValid || ($domainValid && $aRecord) ? true : false;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return ':Attribute does not have a valid hostname/ip format or does not return an A record.';
    }
}
