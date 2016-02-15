<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationClient extends Model
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
    protected $fillable = array['organisation_id', 'client_id'];

    public function organisations()
    {
        return $this->belongsTo('App\Organisations', 'organisation_id', 'id');
    }

    public function clients()
    {
        return $this->belongsTo('App\Clients', 'client_id', 'id');
    }
}
