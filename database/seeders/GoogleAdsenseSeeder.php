<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\HeaderEnum;
use App\Models\GoogleAdsense;

class GoogleAdsenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $headers = collect(HeaderEnum::cases())->map(function ($header) {
            return ['header' => $header->value, 'status' => 1, 'code' => "Dummy Google ad {$header->value}"];
        });

        $results = GoogleAdsense::upsert($headers->toArray(), ['header']);

        $removeHeaders = collect(HeaderEnum::cases())->map(function ($header) {
            return $header->value;
        });

        GoogleAdsense::whereNotIn('header', $removeHeaders)->delete();
    }
}
