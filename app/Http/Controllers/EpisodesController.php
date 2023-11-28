<?php 

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('episodes.index', ['episodes' => $season->episodes]);
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;
        try {
            $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
                $episode->watched = in_array($episode->id, $watchedEpisodes);
            });

            $season->push();
            return redirect()->route('episodes.index', $season->id);
        } catch (\Throwable $e) {           
            $season->episodes->each(function (Episode $episode) {
                $episode->watched = false;
            });
            $season->push();
            return redirect()->route('episodes.index', $season->id);
        }
    }
}