<?php

namespace ChrisHardie\UspsAddresses\Data;

use Spatie\LaravelData\Data;

class AddressResponseData extends Data
{
    public function __construct(
        public ?string $firm,
        public ?DomesticAddressData $address,
        public ?AddressAdditionalInfoData $additionalInfo,
        public ?array $corrections,
        public ?array $matches,
        public ?array $warnings,
    ) {
    }

    public function hasMeaningfulCorrections(): bool
    {
        if (empty($this->corrections)) {
            return false;
        }

        return collect($this->corrections)->contains(function ($correction) {
            return filled($correction['code'] ?? null)
                || filled($correction['text'] ?? null);
        });
    }

    public function isValid(): bool
    {
        if ($this->dpvConfirmed()) {
            return true;
        }

        if ($this->hasExactMatch()) {
            return true;
        }

        return ! $this->hasMeaningfulCorrections()
            && empty($this->warnings);
    }

    public function zipCode(): ?string
    {
        return $this->address?->ZIPCode;
    }

    public function zipPlus4(): ?string
    {
        return $this->address?->ZIPPlus4;
    }

    public function dpvConfirmed(): bool
    {
        return $this->additionalInfo?->DPVConfirmation === 'Y';
    }

    public function hasExactMatch(): bool
    {
        return collect($this->matches)->contains(
            fn ($m) => ($m['code'] ?? null) === '31'
        );
    }
}
