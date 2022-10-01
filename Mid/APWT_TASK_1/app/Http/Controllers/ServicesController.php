<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function services(){
        $service = array();

        for($i=0; $i<5; $i++){
            $service = array(
                "name" => "Service " . ($i+1),
                "id" =>"00" . ($i+1)

            );
            $services[] = (object)$service;
        }


        return view('products.services')->with('services', $services);
    }
}
