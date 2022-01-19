<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieFavorite extends Model
{
    use HasFactory;
	protected $table="categorie_favorite";
	protected $fillable=["favorite_id","categorie_id"];
}
