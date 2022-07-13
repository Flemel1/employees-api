<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index() {
        $employees = DB::select('call employees()');

        return response()->json($employees);
    }

    public function employeesByYear(int $year) {
        $employees = DB::select('call employees_by_year(?)', [$year]);

        return response()->json($employees);
    }
}
