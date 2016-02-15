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

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
