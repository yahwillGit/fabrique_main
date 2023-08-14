<?php

namespace App\Http\Controllers;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {

        // $role = auth()->user()->roles[0];
        // dd($role->hasPermissionTo('viewCharts'));

        $chart_options = [
            'chart_title' => 'Productions par jour',
            'report_type' => 'group_by_date',
            'model' => 'App\Production',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'aggregate_function' => 'count',
            'aggregate_field' => 'id',
        ];
        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Ventes par jour',
            'report_type' => 'group_by_date',
            'model' => 'App\Facture',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
            'aggregate_function' => 'count',
            'aggregate_field' => 'id',
        ];

        $chart2 = new LaravelChart($chart_options);
        return view('pages.dashboard',compact('chart1', 'chart2'));
    }
}
