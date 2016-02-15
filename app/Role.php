<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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
    protected $fillable = ['name'];

    public function userOrganization()
    {
        return $this->hasMany('App\UserOrganizationRole');
    }  
}
