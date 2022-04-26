<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Interfaces\TestConverter;
use App\Interfaces\TestGenerator;

class LaravelTest extends Model
{
    use HasFactory;
    
    protected $generator = null;
    protected $converter = null;
    
    public function __construct(TestGenerator $generator, TestConverter $converter){
        $this->generator = $generator;
        $this->converter = $converter;
    }
    
    
    public function runTest(){
        return $this->converter->convert($this->generator->get());
    }
    
}
