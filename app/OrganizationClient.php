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
    protected $guarded = ['id'];

    /**
     * Columns that can be added or edited
     *
     * @var array
     */
    protected $fillable = ['organisation_id', 'client_id'];

    public function organisations()
    {
        return $this->belongsTo('App\Organisations');
    }

    public function clients()
    {
        return $this->belongsTo('App\Clients');
    }
}
