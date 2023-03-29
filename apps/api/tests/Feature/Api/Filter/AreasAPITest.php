<?php

use App\ExternalAPIs\Atdw\Areas;
use Illuminate\Testing\Fluent\AssertableJson;

afterAll(function () {
    Mockery::close();
});

it('has api/areas endpoint', function () {
    $mock = Mockery::mock(Areas::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([]);
    });

    $this->app->instance(Areas::class, $mock);

    $this->get('/api/areas')
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));
});


it('returns all areas', function () {
    $mock = Mockery::mock(Areas::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([
                ['AreaId' => '001', 'Name' => 'Sydney', 'Code' => 'SYD', 'Type' => 'LOCAL', 'StateCode' => 'NSW'],
                ['AreaId' => '002', 'Name' => 'Sydney West', 'Code' => 'SYD', 'Type' => 'LOCAL', 'StateCode' => 'NSW'],
                ['AreaId' => '003', 'Name' => 'Sydney East', 'Code' => 'SYD', 'Type' => 'LOCAL', 'StateCode' => 'NSW'],
                ['AreaId' => '004', 'Name' => 'Inner Sydney', 'Code' => 'SYD', 'Type' => 'LOCAL', 'StateCode' => 'NSW'],
                ['AreaId' => '005', 'Name' => 'Sydney South', 'Code' => 'SYD', 'Type' => 'LOCAL', 'StateCode' => 'NSW'],
                ['AreaId' => '006', 'Name' => 'North Sydney', 'Code' => 'SYD', 'Type' => 'LOCAL', 'StateCode' => 'NSW'],
                ['AreaId' => '007', 'Name' => 'Sydney South-West', 'Code' => 'SYD', 'Type' => 'LOCAL', 'StateCode' => 'NSW']
            ]);
    });
    $this->app->instance(Areas::class, $mock);

    $response = $this->get('/api/areas');

    $response
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));

    expect($response->getData()->data)
        ->toBeArray()
        ->toHaveCount(7);
});

it('only returns areas with name contains "inn" when searched by name', function () {
    $mock = Mockery::mock(Areas::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([
                ['AreaId' => '001', 'Name' => 'Sydney', 'Code' => 'SYD', 'Type' => 'LOCAL', 'StateCode' => 'NSW'],
                ['AreaId' => '004', 'Name' => 'Inner Sydney', 'Code' => 'SYD', 'Type' => 'LOCAL', 'StateCode' => 'NSW'],
                ['AreaId' => '006', 'Name' => 'North Sydney', 'Code' => 'SYD', 'Type' => 'LOCAL', 'StateCode' => 'NSW']
            ]);
    });
    $this->app->instance(Areas::class, $mock);

    $response = $this->get('/api/areas?name=Inn');

    $response
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));;

    expect($response->getData()->data)
        ->toBeArray()
        ->toHaveCount(1);
});
