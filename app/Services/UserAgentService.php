<?php

namespace App\Services;

use App\Http\Requests\Request;
use App\Models\AgentInfo;
use Jenssegers\Agent\Agent;

class UserAgentService
{
    private $agent;

    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    public function storeUserAgentData(Request $request, int $inviteId): void
    {
        $this->agent->setUserAgent($request->userAgent());
        $this->agent->setHttpHeaders($request->headers->all());

        $model = new AgentInfo();
        $model->invite_id = $inviteId;
        $model->device = $this->agent->device();
        $browser = $this->agent->browser();
        $model->browser = "{$browser} {$this->agent->version($browser)}";
        $platform = $this->agent->platform();
        $model->platform = "{$platform} {$this->agent->version($platform)}";
        $model->ip_address = $request->ip();
        $model->raw = $request->userAgent();
        $model->save();
    }
}
