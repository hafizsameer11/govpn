<?php

namespace App\Jobs;

use App\Models\Connection;
use App\Models\Server;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LogConnectionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $serverId;
    protected $userIp;
    protected $vpnUsername;

    /**
     * Create a new job instance.
     */
    public function __construct($serverId, $userIp, $vpnUsername)
    {
        $this->serverId = $serverId;
        $this->userIp = $userIp;
        $this->vpnUsername = $vpnUsername;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
     // Log the connection to the database
     Connection::create([
        'server_id'    => $this->serverId,
        'user_ip'      => $this->userIp,
        'vpn_username' => $this->vpnUsername,
    ]);

    // Increment the server load
    Server::find($this->serverId)->increment('load');
    }
}
