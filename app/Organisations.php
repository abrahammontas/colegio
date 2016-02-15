<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
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
    protected $fillable = array['name', 'others'];

    public function userRoles()
    {
        return $this->hasMany('App\UsersOrganisationsRoles','organisation_id','id');
    } 

    public function clients()
    {
        return $this->hasMany('App\OrganisationClients','organisation_id','id');
    }  
}
