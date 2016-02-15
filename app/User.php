<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UsersOrganisationsRoles;
use App\OrganisationsClients;

class User extends Model
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
    protected $fillable = array('name', 'others');

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function organisationsRoles()
    {
        return $this->hasMany('App\UsersOrganisationsRoles','user_id','id');
    }    

    public function scopeAllOrganisations()
    {
        $userData = UsersOrganisationsRoles::with('organisations')
                                           ->where('role_id', '=', 1)
                                           ->where('user_id', '=', 1)
                                           ->get();
        return $userData;
    }

    public function scopeAllOrganisationsClients()
    {
        $userData = OrganisationsClients::with('organisations')
                                        ->with('clients')
                                        ->get();
        return $userData;
    }
}
