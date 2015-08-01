<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docentes extends Model
{
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'docentes';
    protected $guarded = array('id');
    protected $fillable = array('nombre', 'id_nivel');

    public function TipoDocentes()
    {
        return $this->hasOne('App\TipoDocentes');
    }
}
