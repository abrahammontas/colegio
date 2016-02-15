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
    protected $guarded = array('id');

    /**
     * Columns that can be added or edited
     *
     * @var array
     */
    protected $fillable = array('name');

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function usersOrganisations()
    {
        return $this->hasMany('App\UsersOrganisationsRoles','role_id','id');
    }  
}
