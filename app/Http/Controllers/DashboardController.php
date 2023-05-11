<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tables = [
            [
                "Name" => "Tiger Nixon",
                "Position" => "System Architect",
                "Office" => "Edinburgh",
                "Age" => "61",
                "Start_date" => "2011/04/25",
                "Salary" => "$320,800"
            ]
        ];

        return view("pages.dashboard", [
            "areaChart" => false,
            "barChart" => false,
            "variable" => "tidak ada",
            "tables" => $tables,
        ]);
    }
}
