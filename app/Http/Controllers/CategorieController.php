<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    //
	/* Despliega el formulario de creacion de una nueva */
	/* 	categoria y envia los datos de las categorias */ 
	/* 	creadas con anterioridad */
	public function showFormCreateCategorie(){
		$categories=DB::table('categories')->where('user_id',Auth::user()->id)->get();
		return view('form_categorie')
			->with('categories',$categories);
	}

	/* Despliega el formulario de edicion de categoria */
	/* 	con los datos de la categoria en cuestion */
	public function showFormAlterCategorie($id){
		return view('form_alter_categorie')
			->with('data',Categorie::findOrFail($id));
	}

	
	public function insertCategorie(Request $request){
		$categorie=['user_id'=>Auth::user()->id,'categorie'=>$request->categorie];
		Categorie::create($categorie);
		return redirect()->back();
	}

	public function editCategorie($id,Request $request){
		Categorie::findOrFail($id)->update($request->all());
		return redirect('create/categorie');
	}

	public function dropCategorie($id){
		Categorie::findOrFail($id)->delete();
		return redirect('create/categorie');
	}

	
}
