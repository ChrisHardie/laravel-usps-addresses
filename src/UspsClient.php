<?php

namespace ChrisHardie\UspsAddresses;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class UspsClient
{
    protected function token(): string
    {
        return Cache::remember('usps-addresses.oauth.token', now()->addMinutes(50), function () {
            return Http::asForm()
                ->post(config('usps-addresses.oauth.token_url'), [
                    'grant_type' => 'client_credentials',
                    'client_id' => config('usps-addresses.oauth.client_id'),
                    'client_secret' => config('usps-addresses.oauth.client_secret'),
                    'scope' => config('usps-addresses.oauth.scope'),
                ])
                ->throw()
                ->json('access_token');
        });
    }

    protected function request(string $endpoint, array $query): array
    {
        return Http::baseUrl(config('usps-addresses.base_url'))
            ->withToken($this->token())
            ->acceptJson()
            ->timeout(config('usps-addresses.timeout'))
            ->get($endpoint, $query)
            ->throw()
            ->json();
    }

    public function address(array $data): array
    {
        return $this->request('/address', $data);
    }

    public function cityState(string $zip): array
    {
        return $this->request('/city-state', ['ZIPCode' => $zip]);
    }

    public function zipCode(array $data): array
    {
        return $this->request('/zipcode', $data);
    }
}
