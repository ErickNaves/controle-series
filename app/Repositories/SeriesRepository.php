<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class SeriesRepository
{
    public function add(SeriesFormRequest $request): Series
    {
        return DB::transaction(function() use ($request){
            $series = Series::create($request->all());
            $seasons = [];
            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons = [
                    'series_id' => $series->id,
                    'number' => $i,
                ];
                $season = Season::create($seasons);          
                $episodes = [];
                for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                    $episodes = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                    Episode::create($episodes);
                }
            }

            return $series;
        });
    }
}