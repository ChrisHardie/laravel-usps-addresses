<?php

namespace ChrisHardie\UspsAddresses\Data;

use Spatie\LaravelData\Data;

class AddressAdditionalInfoData extends Data
{
    public function __construct(
        public ?string $deliveryPoint,
        public ?string $carrierRoute,
        public ?string $DPVConfirmation,
        public ?string $DPVCMRA,
        public ?string $business,
        public ?string $centralDeliveryPoint,
        public ?string $vacant,
    ) {
    }

    public function deliveryPointConfirmed(): bool
    {
        return $this->DPVConfirmation === 'Y';
    }
}
