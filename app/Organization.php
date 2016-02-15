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

    public function userRole()
    {
        return $this->hasMany('App\UserOrganizationRole');
    } 

    public function client()
    {
        return $this->hasMany('App\OrganizationCliens');
    }  
}
