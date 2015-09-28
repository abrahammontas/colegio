<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comentarios';    
    protected $guarded = array('id');
    protected $fillable = array('id_profesor','id_estudiante','comentario','id_profesor');

    public function Estudiante()
    {
        return $this->hasOne('App\Estudiantes','id','id_estudiante');
    }
    public function Profesor()
    {
        return $this->hasOne('App\User','id','id_profesor');
    }
}
