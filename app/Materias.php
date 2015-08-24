<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'materias';
    protected $guarded = array('id');
    protected $fillable = array('descripcion','codigo');

    public function CursosMaterias()
    {
        return $this->hasMany('App\CursosMaterias');
    }

    public function Users()
    {
        return $this->hasOne('App\User','id','id_coordinador');
    }
}
