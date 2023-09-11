<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        // $mensagemSucesso = $request->session()->get('mensagem.sucesso');  --> O código na linha a baixo irá executar a mesma coisa de uma forma mais simples.
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // $nomeSerie = $request->nome;
        // $series = new Serie();
        // $series->nome = $nomeSerie;
        // $series->save();
        // A linha 31 executa basicamente o mesmo código feito da linha 26 à 29. (Existem algumas diferenças).

        Serie::create($request->all());
        $request->session()->flash('mensagem.sucesso', 'Série adicionada com sucesso');
        
        return to_route("series.index");
    }

    public function destroy (Request $request)
    {
        Serie::destroy($request->series);
        $request->session()->flash('mensagem.sucesso', 'Série removida com sucesso');

        return to_route('series.index');
    }
}

