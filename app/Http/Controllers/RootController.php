<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RootController extends Controller
{
    //

	/* Retorna la vista raiz con los favoritos publicos creados 
		* por los usuarios */
	public function root(){
		$favorites=DB::table("favorites")
			->where("visibility",true)
			->orderBy('created_at','desc')
			->paginate(10);

		return view('welcome')
			->with("favorites",$favorites);
	}
}
