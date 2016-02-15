<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{       
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

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

    static function scopeAllOrganisations()
    {
        $userData = Users::find(1)->organisationsRoles()->organisations()->get();
        return $userData->organisations();
    }

    static function scopeAllOrganisationsClients()
    {
        $userData = Users::find(1)->organisationsRoles()->organisations()->clients()->get();
        return $userData->organisations();
    }
}
