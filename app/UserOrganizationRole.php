<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOrganizationRole extends Model
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
    protected $fillable = ['user_id', 'organisation_id', 'role_id'];

    public function user()
    {
        return $this->belongsTo('App\Users');
    }

    public function organisations()
    {
        return $this->belongsTo('App\Organisations');
    }
}
