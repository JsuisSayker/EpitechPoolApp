<?php

namespace App\Charts;

use App\Models\Teams;
use App\Models\Points;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use PhpParser\Node\Expr\Cast\Array_;

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
        $points = Points::pluck("created_at")->toArray();

        $this->chart = $this->chart->lineChart()
            ->setTitle('Teams Points')
            ->setSubtitle('Pool 2030 Promo')
            ->setXAxis($points);
        foreach ($teams as $team) {
            $team_point = $team->points()->get();
            $tmp_array = array(count($points), 0);
            $tmp_index = 0;
            $last_value = $team_point[0]->point;
            for ($i = 0; $i < count($points); $i++) {
                if ($tmp_index < count($team_point) && $team_point[$tmp_index]->created_at == $points[$i]) {
                    $last_value = $team_point[$tmp_index]->point;
                    $tmp_index++;
                }
                $tmp_array[$i] = $last_value;
            }
            $this->chart = $this->chart->addData($team->name, $tmp_array);
        }
        return $this->chart;
    }
}
