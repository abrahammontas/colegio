<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
        
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The primary Id.
     *
     * @var array
     */
    protected $guarded = array('id');

    /**
     * Columns that can be added or edited
     *
     * @var array
     */
    protected $fillable = array('name', 'others', 'creator_user_id');

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function organisations()
    {
        return $this->hasMany('App\OrganisationsClients','client_id','id');
    }  
}
