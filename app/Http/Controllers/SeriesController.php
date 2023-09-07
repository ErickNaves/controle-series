<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::query()->orderBy('nome')->get();

        return view('series.index')->with('series', $series);
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
        return to_route("series.index");
    }
}

