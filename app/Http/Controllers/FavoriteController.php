<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\CategorieFavorite;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class FavoriteController extends Controller
{

	/* Genera las relacion muchos a muchos entre el favorito y las categorias */
	private function insertRelationsCategories($categories,$id){
		if(is_null($categories)){
			return;
		}else{
			$array= explode(' ',$categories);

			foreach($array as $categorie){ 
				CategorieFavorite::create(["favorite_id"=>$id,"categorie_id"=>intval($categorie)]);
			}
		}
	}

	/* Despliega el formulario para la creacion de un nuevo */
	/* favorito con las categorias creadas por el usuario */
	public function showFormCrateFavorite(){
		$categories=DB::table('categories')
			->where('user_id',Auth::user()->id)->get();

		return view('form_favorite')
			->with('categories',$categories);
	}

	/* Inserta el nuevo favorito en la base de datos y genera las */ 
	/* relaciones pertinentes con las categorias */
	public function insertFavorite(Request $request){
		$visibility=isset($request->visibility);
		
		$favorite=Favorite::create([
			"title"=>$request->title,
			"url"=>$request->url,
			"description"=>$request->description,
			"visibility"=>$visibility,
			"user_id"=>Auth::user()->id
		]);
		
		$this->insertRelationsCategories($request->id_categorie,$favorite->id);

		return redirect('home');
	}


	/* Despliega el formulario de edicion de favorito con los datos */
	/* del favorito en cuestion */
	public function showFormAlterFavorite($id){
		$favorite=Favorite::find($id);

		$categories=Categorie::where('user_id',Auth::user()->id)->get();

		$id_categorie="";

		foreach($favorite->categories as $categorie){
			$id_categorie=$id_categorie . " " . $categorie->id;
		}

		return view('form_alter_favorite')
			->with('data',$favorite)
			->with('related_categories',$favorite->categories)
			->with('categories',$categories)
			->with('id_categorie',$id_categorie);
	}

	/* Edita el favorito en bases de datos y borra y recrea las */
	/* relaciones */
	public function editFavorite($id,Request $request){
		$visibility=isset($request->visibility);

		Favorite::findOrFail($id)->update([
			"title"=>$request->title,
			"url"=>$request->url,
			"description"=>$request->description,
			"visibility"=>$visibility,
			"user_id"=>Auth::user()->id
		]);

		CategorieFavorite::where('favorite_id',$id)->delete();

		$this->insertRelationsCategories($request->id_categorie,$id);
		

		return redirect()->back();
	}

	/* Borra el favorito de base de datos */ 
	/* (conserva relaciones) */
	public function dropFavorite($id){
		CategorieFavorite::where('favorite_id',$id)->delete();

		Favorite::findOrFail($id)->delete();

		return redirect('home');
	}

}
