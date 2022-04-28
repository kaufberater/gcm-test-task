<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GcmController extends Controller{
    
    public function index(){
        $converter = new ConverterController( new GeneratorController );
        $response['info'] = array();

        for( $i = 0; $i < 10; $i++ ){
            $convType = rand(1,10)%2 == 0 ? 'alpha' : 'rot';
            $genType = rand(1,10)%2 == 0 ? 'string' : 'array';

            $converter->setConvType( $convType );
            $converter->setGenType( $genType );
            $converter->setTest(false);
            
            $data = $converter->convert();
            
            foreach( $data as $item ){
                if( is_array( $item ) && !empty( $item ) )
                    array_push( $response['info'], $item );
            }
        } return view('gcm', $response);
    }
}
