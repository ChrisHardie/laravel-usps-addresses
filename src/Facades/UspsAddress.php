<?php

namespace ChrisHardie\UspsAddresses\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisHardie\UspsAddresses\UspsAddresses
 */
class UspsAddress extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ChrisHardie\UspsAddresses\UspsAddresses::class;
    }
}
