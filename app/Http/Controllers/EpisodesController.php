<?php 

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('episodes.index', ['episodes' => $season->episodes]);
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = implode(', ', $request->episodes ?? []);

        if (empty($watchedEpisodes)) {
            DB::transaction(function () use ($season) {
                $season->episodes()->update(['watched' => 0]);
            });
            return redirect()->route('episodes.index', $season->id);
        }

        DB::transaction(function () use ($watchedEpisodes, $season) {
            $season->episodes()->update(['watched' => DB::raw("case when id in ($watchedEpisodes) then 1 else 0 end")]);
        });

        return redirect()->route('episodes.index', $season->id);
    }
}