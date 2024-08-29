<?php

namespace App\Charts;

use App\Models\Teams;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TeamsPointChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $teams = Teams::all();

        $this->chart = $this->chart->lineChart()
        ->setTitle('Teams Point Pool 2030 Promo')
        ->setSubtitle('Physical sales vs Digital sales.')
        ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', '']);
        foreach ($teams as $team) {
            $this->chart = $this->chart->addData($team->name, [1, 2, 1, 3, 1, 1, 1, 1]);
        }
        return $this->chart;
    }
}
