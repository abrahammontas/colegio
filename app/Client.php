<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The primary Id.
     *
     * @var array
     */
    protected $guarded = array['id'];

    /**
     * Columns that can be added or edited
     *
     * @var array
     */
    protected $fillable = array['name', 'others', 'creator_user_id'];

    public function organisations()
    {
        return $this->hasMany('App\OrganisationsClients','client_id','id');
    }  

    public function organisations()
    {
        return $this->hasMany('App\OrganisationsClients','client_id','id');
    } 
}
