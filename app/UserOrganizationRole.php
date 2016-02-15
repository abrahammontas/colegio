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
    protected $guarded = array['id'];

    /**
     * Columns that can be added or edited
     *
     * @var array
     */
    protected $fillable = array['user_id', 'organisation_id', 'role_id'];

    public function user()
    {
        return $this->belongsTo('App\Users', 'user_id', 'id');
    }

    public function organisations()
    {
        return $this->belongsTo('App\Organisations', 'organisation_id', 'id');
    }
}
