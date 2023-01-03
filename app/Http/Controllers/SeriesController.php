<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('name')->get();
        $sucessMessage = session('success.message');

        return view('series.index')->with('series', $series)->with('sucessMessage', $sucessMessage);
    }

    public function findById(int $serieId)
    {
        $series = Serie::find(10);

        if (empty($series)) {
            return redirect()->route('errors.notfound');
        }

        return $series;
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $name = $request->input('nome');

        $series = Serie::create($request->all());
        $request->session()->flash('success.message', "series { $series->name } added successfully");

        return to_route('series.index');
    }

    public function destroy(Request $request)
    {
        $this->findById($request->serieId);

        Serie::destroy($request->name);
        $request->session()->flash('success.message', 'Series removed successfully');

        return to_route('series.index');
    }
}
