<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisations extends Model
{
        
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'organisations';

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

    public function userRoles()
    {
        return $this->hasMany('App\UsersOrganisationsRoles','organisation_id','id');
    } 

    public function clients()
    {
        return $this->hasMany('App\OrganisationClients','organisation_id','id');
    }  
}
