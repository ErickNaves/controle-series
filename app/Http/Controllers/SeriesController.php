<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        
    }

    public function index(Request $request)
    {
        $series = Series::all();
        // $mensagemSucesso = $request->session()->get('mensagem.sucesso');  --> O código na linha a baixo irá executar a mesma coisa de uma forma mais simples.
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

        return to_route("series.index")->with('mensagem.sucesso', "Série '{$series->nome}' adicionada com sucesso");
         }
        

    public function destroy (Series $series)
    {
        $series->delete();

        // $request->session()->flash('mensagem.sucesso', "Série '{$series->nome}'

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit (Series $series)
    {
        return view('series.edit')->with('series',$series);
    }

    public function update (Series $series, SeriesFormRequest $request)
    {
        $series->nome = $request->nome;
        $series->save();

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}

