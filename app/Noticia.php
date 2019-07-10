<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    //
    protected $fillable=['titulo','autor','fecha','texto','documento','user_id','directorio','imagen'];

    public function user(){

return $this->belongsTo('App\User');

    }
}
