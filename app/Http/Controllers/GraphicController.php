<?php

namespace App\Http\Controllers;

use App\Charts\TeamsPointChart;
use Illuminate\Http\Request;

class GraphicController extends Controller
{
    public function index(TeamsPointChart $chart)
    {
        return view('graphic.index', ['chart' => $chart->build()]);
    }
}
