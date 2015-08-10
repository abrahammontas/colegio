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

    public function Docente()
    {
        return $this->hasOne('App\Docentes','id','id_coordinador');
    }
}
