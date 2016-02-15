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
    protected $guarded = ['id'];

    /**
     * Columns that can be added or edited
     *
     * @var array
     */
    protected $fillable = ['name', 'others'];

    public function userRoles()
    {
        return $this->hasMany('App\UsersOrganisationsRoles');
    } 

    public function clients()
    {
        return $this->hasMany('App\OrganisationClients');
    }  
}
