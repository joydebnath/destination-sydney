<?php

use App\ExternalAPIs\Atdw\Regions;
use Illuminate\Testing\Fluent\AssertableJson;

afterAll(function () {
    Mockery::close();
});

it('has api/regions endpoint', function () {
    $mock = Mockery::mock(Regions::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([]);
    });

    $this->app->instance(Regions::class, $mock);

    $this->get('/api/regions')
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));
});


it('returns all regions', function () {
    $mock = Mockery::mock(Regions::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([
                ['RegionId' => '001', 'Name' => 'North Coast', 'Code' => 'NCT', 'Type' => 'MARKETING', 'State' => 'NSW'],
                ['RegionId' => '002', 'Name' => 'Central Coast', 'Code' => 'CCT', 'Type' => 'MARKETING', 'State' => 'NSW'],
                ['RegionId' => '003', 'Name' => 'Hunter', 'Code' => 'HUN', 'Type' => 'MARKETING', 'State' => 'NSW'],
                ['RegionId' => '004', 'Name' => 'Newcastle', 'Code' => 'NEW', 'Type' => 'MARKETING', 'State' => 'NSW'],
                ['RegionId' => '005', 'Name' => 'Sydney', 'Code' => 'SYD', 'Type' => 'MARKETING', 'State' => 'NSW'],
                ['RegionId' => '006', 'Name' => 'Illawarra', 'Code' => 'ILL', 'Type' => 'MARKETING', 'State' => 'NSW'],
                ['RegionId' => '007', 'Name' => 'South Coast', 'Code' => 'SCT', 'Type' => 'MARKETING', 'State' => 'NSW']
            ]);
    });
    $this->app->instance(Regions::class, $mock);

    $response = $this->get('/api/regions');

    $response
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));

    expect($response->getData()->data)
        ->toBeArray()
        ->toHaveCount(7);
});

it('only returns regions with name contains "inn" when searched by name', function () {
    $mock = Mockery::mock(Regions::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([
                ['RegionId' => '001', 'Name' => 'North Coast', 'Code' => 'NCT', 'Type' => 'MARKETING', 'State' => 'NSW'],
                ['RegionId' => '003', 'Name' => 'Hunter', 'Code' => 'HUN', 'Type' => 'MARKETING', 'State' => 'NSW'],
                ['RegionId' => '004', 'Name' => 'Newcastle', 'Code' => 'NEW', 'Type' => 'MARKETING', 'State' => 'NSW'],
                ['RegionId' => '006', 'Name' => 'Illawarra', 'Code' => 'ILL', 'Type' => 'MARKETING', 'State' => 'NSW'],
            ]);
    });
    $this->app->instance(Regions::class, $mock);

    $response = $this->get('/api/regions?name=New');

    $response
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));;

    expect($response->getData()->data)
        ->toBeArray()
        ->toHaveCount(1);
});
