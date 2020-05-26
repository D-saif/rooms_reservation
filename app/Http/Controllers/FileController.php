<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    function show( $fileName ){

    	//dd($fileName);
    	//home/saif/laraProject/rooms_reservation3.0/storage/app/files
    	// $pathToFile = storage_path($fileName) ;
    	$pathToFile = "home/saif/laraProject/rooms_reservation3.0/storage/app/files/$fileName" ;

    	return response()->file($pathToFile);
    }
}
