<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $salaries = DB::select('call salaries_five_year()');
        return response()->json($salaries);
    }

    public function salaries(int $year, int $quarter) {
        $amount = Salary::where('year', $year)->where('quarter', $quarter)->sum('salary');
        $data = [
            'year' => $year,
            'quarter' => $quarter,
            'amount' => $amount
        ];
        return response()->json($data);
    }

    public function salariesByQuarter(int $quarter) {
        $salaries = DB::select('call salaries_by_quarter(?)', [$quarter]);
        return response()->json($salaries);
    }

    public function salariesByYear(int $year) {
        $salaries = DB::select('call salaries_by_year(?)', [$year]);
        return response()->json($salaries);
    }
}
