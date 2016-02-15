<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersOrganisationsRoles extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_organisations_roles';

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
    protected $fillable = array('user_id', 'organisation_id', 'role_id');

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Users');
    }

    public function organisations()
    {
        return $this->belongsTo('App\Organisations');
    }
}
