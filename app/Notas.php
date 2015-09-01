<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notas';
    protected $guarded = array('id');
    protected $fillable = array('id_estudiante','id_cursomateria','nota');

    public function Materias()
    {
        return $this->hasOne('App\Materias','id','id_materia');
    }    

    public function Cursos()
    {
        return $this->hasOne('App\Cursos','id','id_curso');
    }

    public function Estudiante()
    {
        return $this->hasOne('App\Estudiantes','id','id_estudiante');
    }

    public function Profesor()
    {
        return $this->hasOne('App\User','id','id_profesor');
    }

}
