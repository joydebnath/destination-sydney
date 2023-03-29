<?php

use App\ExternalAPIs\Atdw\Suburbs;
use Illuminate\Testing\Fluent\AssertableJson;

afterAll(function () {
    Mockery::close();
});

it('has api/suburbs endpoint', function () {
    $mock = Mockery::mock(Suburbs::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([]);
    });

    $this->app->instance(Suburbs::class, $mock);

    $this->get('/api/suburbs')
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));
});


it('returns all suburbs', function () {
    $mock = Mockery::mock(Suburbs::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([
                ['SuburbId' => '001', 'Name' => 'Aarons Pass', 'PostCode' => '2850'],
                ['SuburbId' => '002', 'Name' => 'Abbotsbury', 'PostCode' => '2176'],
                ['SuburbId' => '004', 'Name' => 'Abercrombie', 'PostCode' => '2795'],
                ['SuburbId' => '005', 'Name' => 'Doubtful Creek', 'PostCode' => '2470'],
                ['SuburbId' => '006', 'Name' => 'East Lindfield', 'PostCode' => '2070'],
                ['SuburbId' => '007', 'Name' => 'East Lismore', 'PostCode' => '2480'],
            ]);
    });
    $this->app->instance(Suburbs::class, $mock);

    $response = $this->get('/api/suburbs');

    $response
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));

    expect($response->getData()->data)
        ->toBeArray()
        ->toHaveCount(6);
});

it('only returns suburbs with name contains "East" when searched by name', function () {
    $mock = Mockery::mock(Suburbs::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([
                ['SuburbId' => '004', 'Name' => 'Abercrombie', 'PostCode' => '2795'],
                ['SuburbId' => '005', 'Name' => 'Doubtful Creek', 'PostCode' => '2470'],
                ['SuburbId' => '006', 'Name' => 'East Lindfield', 'PostCode' => '2070'],
                ['SuburbId' => '007', 'Name' => 'East Lismore', 'PostCode' => '2480'],
            ]);
    });
    $this->app->instance(Suburbs::class, $mock);

    $response = $this->get('/api/suburbs?name=East');

    $response
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));;

    expect($response->getData()->data)
        ->toBeArray()
        ->toHaveCount(2);
});
