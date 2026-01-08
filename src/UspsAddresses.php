<?php

namespace ChrisHardie\UspsAddresses;

use ChrisHardie\UspsAddresses\Data\AddressResponseData;

class UspsAddresses
{
    public function __construct(
        protected UspsClient $client
    ) {
    }

    /**
     * Returns the best standardized address for a given address.
     * https://developers.usps.com/addressesv3#tag/Resources/operation/get-address
     */
    public function verify(array $address): AddressResponseData
    {
        return AddressResponseData::from(
            $this->client->address($address)
        );
    }

    /**
     * Returns the city and state for a given ZIP Code.
     * https://developers.usps.com/addressesv3#tag/Resources/operation/get-city-state
     */
    public function cityState(string $zip): array
    {
        return $this->client->cityState($zip);
    }

    /**
     * Returns the ZIP Code for a given address.
     * https://developers.usps.com/addressesv3#tag/Resources/operation/get-ZIPCode
     */
    public function zipCode(array $address): array
    {
        return $this->client->zipCode($address);
    }
}
