<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursosMaterias extends Model
{
            /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cursos_materias';    
    protected $guarded = array('id');
    protected $fillable = array('id_curso','id_materia','id_coordinador','id_profesor');

    public function Materias()
    {
        return $this->hasOne('App\Materias','id','id_materia');
    }    

    public function Cursos()
    {
        return $this->hasOne('App\Cursos','id','id_curso');
    }

    public function Coordinador()
    {
        return $this->hasOne('App\User','id','id_coordinador');
    }

    public function Profesor()
    {
        return $this->hasOne('App\User','id','id_profesor');
    }

}
