<?php

use App\ExternalAPIs\Atdw\Locations;
use Illuminate\Testing\Fluent\AssertableJson;

afterAll(function () {
    Mockery::close();
});

it('has api/locations page', function () {
    $mock = Mockery::mock(Locations::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([]);
    });

    $this->app->instance(Locations::class, $mock);

    $this->get('/api/locations?filter=area')
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));
});

it('returns areas only when filter value is set to area', function () {
    $mock = Mockery::mock(Locations::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([
                [
                    "AreaId" => "29000677",
                    "Code" => "ISY",
                    "Name" => "Inner Sydney",
                    "Type" => "LOCAL",
                    "DomesticRegionId" => 29000013,
                    "DomesticRegionName" => "Greater Sydney",
                    "StateId" => 9000002,
                    "StateCode" => "NSW",
                    "Suburbs" => [
                        "suburb" => [
                            [
                                "SuburbId" => "29014839",
                                "Name" => "Abbotsford",
                                "PostCode" => "2046"
                            ],
                            [
                                "SuburbId" => "29014840",
                                "Name" => "Alexandria",
                                "PostCode" => "2015"
                            ]
                        ]
                    ]
                ]
            ]);
    });

    $this->app->instance(Locations::class, $mock);

    $response = $this->get('/api/locations?filter=area');

    $response
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));

    expect($response->getData()->data)
        ->toBeArray()
        ->toHaveCount(1);
});


it('returns suburbs only when filter value is set to suburb', function () {
    $mock = Mockery::mock(Locations::class, function ($mock) {
        $mock->shouldReceive('fetch')
            ->once()
            ->andReturn([
                [
                    "AreaId" => "29000677",
                    "Code" => "ISY",
                    "Name" => "Inner Sydney",
                    "Type" => "LOCAL",
                    "DomesticRegionId" => 29000013,
                    "DomesticRegionName" => "Greater Sydney",
                    "StateId" => 9000002,
                    "StateCode" => "NSW",
                    "Suburbs" => [
                        "suburb" => [
                            [
                                "SuburbId" => "29014839",
                                "Name" => "Abbotsford",
                                "PostCode" => "2046"
                            ],
                            [
                                "SuburbId" => "29014840",
                                "Name" => "Alexandria",
                                "PostCode" => "2015"
                            ]
                        ]
                    ]
                ]
            ]);
    });

    $this->app->instance(Locations::class, $mock);

    $response = $this->get('/api/locations?filter=suburb');

    $response
        ->assertStatus(200)
        ->assertJson(fn(AssertableJson $json) => $json->has('data'));

    expect($response->getData()->data)
        ->toBeArray()
        ->toHaveCount(2);
});
