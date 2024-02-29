<?php

namespace APP\Services;

use App\Models\Endpoint;
use Illuminate\Support\Facades\Http;

class CertificateService
{
    public function fetchCertificateDetails($certificateNumber)
    {
        $endpoints = Endpoint::with('mappings')->get();
        $certificateDetails = [];

        foreach ($endpoints as $endpoint) {
            $response = Http::get($endpoint->url, ['certificateNumber' => $certificateNumber]);

            if($response->successful()) {
                $data = $response->json();

                $normalizedData = $this->normalizedData($data, $endpoint->mappings);

                $certificateDetails = array_merge($certificateDetails, $normalizedData);
            }
        }

        return $certificateDetails;
    }

    private function normalizedData($data, $mappings)
    {
        $normalizedData = [];

        foreach ($data as $item) {
            $normalizedItem = [];

            foreach ($mappings as $mapping) {
                $normalizedItem[$mapping->target_field] = $item[$mapping->source_field] ?? '';
            }

            $normalizedData[] = $normalizedItem;
        }

        return $normalizedData;
    }
}
