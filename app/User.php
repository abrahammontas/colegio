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
    protected $guarded = ['id'];

    /**
     * Columns that can be added or edited
     *
     * @var array
     */
    protected $fillable = ['name', 'others'];

    public function organisationsRoles()
    {
        return $this->hasMany('App\UsersOrganisationsRoles');
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
