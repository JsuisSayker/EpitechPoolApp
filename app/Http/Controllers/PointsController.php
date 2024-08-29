<?php

namespace App\Http\Controllers;

use App\Charts\TeamsPointChart;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function index(TeamsPointChart $chart)
    {
        return view('points.index', ['chart' => $chart->build()]);
    }
}
