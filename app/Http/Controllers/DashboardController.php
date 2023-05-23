<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $employess = Employee::get();

    //     return view("pages.dashboard", [
    //         "areaChart" => false,
    //         "barChart" => false,
    //         "variable" => "tidak ada",
    //         "tables" => $employess,
    //     ]);
    // }

    public function index()
    {
        return view("dashboard.index", [
            "title" => "Dashboard"
        ]);
    }
}
