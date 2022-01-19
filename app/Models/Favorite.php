<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
	protected $table="favorites";
	protected $fillable=["title","url","description","user_id","visibility"];

	public function categories()
    {
        return $this->belongsToMany(Categorie::class);
    }
}
