<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\TestGenerator;
use App\Services\TestGeneratorMultiple;
use App\Services\TestGeneratorSingle;
use App\Models\LaravelTest;
use App\Interfaces\TestConverter;
use App\Services\TestConverterNumeric;
use App\Services\TestConverterRot;

class TestGeneratorProvider extends ServiceProvider
{
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Return a random Generator when requested
        $this->app->when(LaravelTest::class)
            ->needs(TestGenerator::class)
            ->give(function () {
                return rand(0,1) ? new TestGeneratorSingle(rand(1,10)) : new TestGeneratorMultiple(rand(1,10), rand(2,10)) ;
            });
        
        //Return a random Converter when requested
        $this->app->when(LaravelTest::class)
            ->needs(TestConverter::class)
            ->give(function () {
                return rand(0,1) ? new TestConverterNumeric() : new TestConverterRot(rand(1,10), rand(1,10)) ;
            });
    }
    
}
