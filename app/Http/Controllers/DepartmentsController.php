<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    public function index() {
        $departments = Departments::all();
        
        return $departments;
    }

    public function employeeByDepartments() {
        $employees = DB::select('call employee_by_departments()');

        return response()->json($employees);
    }
}
