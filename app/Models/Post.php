<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','content','categoria_id','description','posted','image'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
