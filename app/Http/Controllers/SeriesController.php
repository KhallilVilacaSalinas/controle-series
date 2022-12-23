<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $query = DB::select('SELECT nome FROM series');

        return view('series.index')->with('series', $query);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nameSerie = $request->input('nome');

        $query = DB::insert('INSERT INTO series (nome) VALUES (?)', [$nameSerie]);

        if ($query) {
            return 'OK';
        } else {
            return 'Deu erro';
        }
    }
}
