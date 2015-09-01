<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estudiantes';
    protected $guarded = array('id');
    protected $fillable = array('matricula', 'nombre','id_curso');

    public function Cursos()
    {
        return $this->hasOne('App\Cursos');
    }

    public function Notas()
    {
        return $this->hasMany('App\Notas','id_estudiante','id');
    }
}
