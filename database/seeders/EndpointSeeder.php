<?php

namespace Database\Seeders;

use App\Models\Endpoint;
use Illuminate\Database\Seeder;

class EndpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Endpoint::factory()->count(50)->create();

        $exampleEndpoint = Endpoint::factory()->state([
            'name' => 'TIKI PLAYGROUND',
            'url' => 'http://127.0.0.1:8000/api/certificates',
        ])->create();

        $sourceFields = ["student_name", "certificate_no", "issue_date", "valid_till_date", "institution_name"];
        $targetFields = ['owner_name', 'certificate_number', 'issuing_date', 'issuing_institution', 'expiration_date'];

        foreach ($sourceFields as $index => $sourceField) {
            $mapping = new \App\Models\Mapping([
                'source_field' => $sourceField,
                'target_field' => $targetFields[$index],
            ]);
            $exampleEndpoint->mappings()->save($mapping);
        }
    }
}
