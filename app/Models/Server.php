<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'country_id', 'load','ip_address','isPremium'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function ovpnFiles()
    {
        return $this->hasMany(OVPNFile::class);
    }

    public function connections()
    {
        return $this->hasMany(Connection::class);
    }

    public function incrementLoad()
    {
        $this->increment('load');
    }

    public function decrementLoad()
    {
        $this->decrement('load');
    }
}
