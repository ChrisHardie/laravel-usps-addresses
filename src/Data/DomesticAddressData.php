<?php

namespace ChrisHardie\UspsAddresses\Data;

use Spatie\LaravelData\Data;

class DomesticAddressData extends Data
{
    public function __construct(
        public string $streetAddress,
        public ?string $secondaryAddress,
        public string $city,
        public string $state,
        public string $ZIPCode,
        public ?string $ZIPPlus4,
        public ?string $urbanization,
    ) {
    }
}
