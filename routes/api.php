<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TitleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'titles' => TitleController::class,
]);

Route::controller(DepartmentsController::class)->group(function () {
    Route::get('departements', 'index');
    Route::get('employee-by-departments', 'employeeByDepartments');
});

Route::controller(SalaryController::class)->middleware(['cors'])->group(function () {
    Route::get('salaries/{year}', 'salariesByYear');
    Route::get('salaries-five-year', 'index');
    Route::get('salaries-by-quarter/{quarter}', 'salariesByQuarter');
});


Route::controller(EmployeeController::class)->group(function() {
    Route::get('employees', 'index');
    Route::get('employees-by-year/{year}', 'employeesByYear');
});