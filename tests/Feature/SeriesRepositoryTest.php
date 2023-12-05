<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use Tests\TestCase;
use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_when_a_series_is_created_its_seasons_and_episodes_must_also_be_created()
    {
        //Arrange
        /** @var SeriesRepository $repository */
        $repository = $this->app->make(SeriesRepository::class);

        $request = new SeriesFormRequest();
        $request->setMethod('POST');

        $request->request->add([
            'name' => 'Série Teste',
            'seasonsQty' => 1,
            'episodesPerSeason' => 1,
        ]);

        $request->setCoverPath('series_cover/base.jpg');

        //Act
        $repository->add($request);

        //Assert
        $this->assertDatabaseHas('series', ['name' => 'Série Teste']);
        $this->assertDatabaseHas('seasons', ['number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 1]);
    }
}
