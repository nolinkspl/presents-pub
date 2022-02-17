<?php

namespace App\Repositories;

use App\Models\AgentInfo;

class AgentRepository
{
    /**
     * @return AgentInfo[]
     */
    public function getAll(): array
    {
        return AgentInfo::query()->get()->all();
    }
}
