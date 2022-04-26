<?php

use Illuminate\Support\Facades\Route;
use App\Models\LaravelTest;
use App\Interfaces\TestGenerator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //Instantiate the model 10 different times and fetch the results
    //@TODO: Push the dependency injection a level deeper and avoid repeated model instantiations
    $testResults = array();
    for($i=0; $i<10; $i++){
        $model = App::make(LaravelTest::class);
        $testResults[] = $model->runTest();
    }
    
    //Render the results
    return View::make('test')->with('testResults', $testResults);
});
