<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;
    protected $fillable = ['server_id', 'user_ip', 'vpn_username', 'connected_at'];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
