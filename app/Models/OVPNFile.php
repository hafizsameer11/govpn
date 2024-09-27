<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OVPNFile extends Model
{
    use HasFactory;
    protected $table='ovpn_files';
    protected $fillable = [
        'server_id',
        'file_name',
        'file_path',
        'usage_count',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function incrementUsage()
    {
        $this->increment('usage_count');
    }
}
