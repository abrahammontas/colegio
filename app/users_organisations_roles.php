<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_organisations_roles extends Model
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
}
