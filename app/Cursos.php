<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cursos';    
    protected $guarded = array('id');
    protected $fillable = array('descripcion');

    public function CursosMaterias()
    {
        return $this->hasMany('App\CursosMaterias');
    }

    public function Estudiantes()
    {
        return $this->hasMany('App\Estudiantes', 'id_curso', 'id');
    }
}
