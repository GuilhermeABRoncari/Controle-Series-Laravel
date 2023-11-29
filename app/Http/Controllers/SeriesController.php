<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Middleware\Autenticador;
use App\Repositories\SeriesRepository;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    private SeriesRepository $repository;

    public function __construct(SeriesRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware(Autenticador::class)->except('index');
    }
    
    public function index(Request $request)
    {
        $series = Series::query()->orderBy('name')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $series = $this->repository->add($request);

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' adicionada com sucesso!");
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' removida com sucesso.");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('mensagem.sucesso', "Série '{$series->name}' atualizada com sucesso!");
    }
}
