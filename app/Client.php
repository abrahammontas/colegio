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
    protected $guarded = ['id'];

    /**
     * Columns that can be added or edited
     *
     * @var array
     */
    protected $fillable = ['name', 'others', 'creator_user_id'];

    public function organisations()
    {
        return $this->hasMany('App\OrganisationsClients');
    }  

    public function organisations()
    {
        return $this->hasMany('App\OrganisationsClients');
    } 
}
