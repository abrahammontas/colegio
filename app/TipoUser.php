<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUser extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_users';    
    protected $guarded = array('id');
    protected $fillable = array('nombre','pantalla');
}
