<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Middleware\Autenticador;

class SeasonsController extends Controller
{
    public function __construct()
    {
        $this->middleware(Autenticador::class)->except('index');
    }

    public function index(Series $series)
    {
        $seasons = $series->seasons()->with('episodes')->get();

        return view("seasons.index")->with('seasons', $seasons)->with('series', $series);
    }
}
