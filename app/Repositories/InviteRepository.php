<?php

namespace App\Repositories;

use App\Models\Invite;
use Psr\Log\LoggerInterface;

class InviteRepository
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param string $code
     * @return Invite|null
     */
    public function findByCode(string $code): ?Invite
    {
        return Invite::query()->where('code', $code)->get()->first();
    }

    public function getAll(): array
    {
        return Invite::query()->get()->all();
    }

    public function findAllUsed(): array
    {
        return Invite::query()
            ->whereNotNull('used_at')
            ->get()
            ->all();
    }

    /**
     * @param string[] $codes
     * @param bool $isVip
     */
    public function createInvites(array $codes, bool $isVip): void
    {
        $data = [];

        $intersect = array_intersect($this->getAllCodes(), $codes);

        foreach($codes as $code) {
            if (in_array($code, $intersect)) {
                continue;
            }
            $data[] = [
                'code' => addslashes($code),
                'is_vip' => $isVip,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        try {
            Invite::insert($data);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }
    }

    public function findAllByIds(array $ids): array
    {
        return Invite::query()
        ->whereIn('id', $ids)
        ->get()
        ->all();
    }

    public function deleteById(int $id): void
    {
        Invite::query()->where('id', $id)->delete();
    }

    private function getAllCodes(): array
    {
        return array_column(Invite::query()->get('code')->toArray(), 'code');
    }
}
