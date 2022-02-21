<?php

namespace App\Repositories;

use App\Models\Gift;
use Psr\Log\LoggerInterface;

class GiftRepository
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param int $typeId
     * @return Gift|null
     */
    public function findFirstUnusedByTypeId(int $typeId): ?Gift
    {
        return Gift::query()
            ->where('gift_type_id', $typeId)
            ->where('used_at', null)
            ->get()
            ->first();
    }

    /**
     * @return Gift[]
     */
    public function getAll(): array
    {
        return Gift::query()
            ->get()
            ->all();
    }

    /**
     * @return Gift[]
     */
    public function findAllUnused(): array
    {
        return Gift::query()
            ->where('used_at', null)
            ->get()
            ->all();
    }

    /**
     * @param int[] $inviteIds
     * @return Gift[]
     */
    public function findAllWithInviteIds(array $inviteIds): array
    {
        return Gift::query()
            ->whereIn('invite_id', $inviteIds)
            ->get()
            ->all();
    }

    /**
     * @param int $inviteId
     * @return Gift|null
     */
    public function findByInviteId(int $inviteId): ?Gift
    {
        return Gift::query()
            ->where('invite_id', $inviteId)
            ->get()
            ->first();
    }


    /**
     * @param string[] $codesWithPin
     * @param integer $giftTypeId
     */
    public function createGifts(array $codesWithPin, int $giftTypeId): void
    {
        try {
            $data = [];
            foreach($codesWithPin as $codeWithPin) {
                $giftData = explode('pin', $codeWithPin);
                $data[] = [
                    'code' => addslashes($giftData[0]),
                    'pin' => addslashes($giftData[1] ?? ''),
                    'gift_type_id' => $giftTypeId,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }

            Gift::insert($data);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            throw new \Exception('Database error');
        }
    }

    public function deleteById(int $id): void
    {
        Gift::query()->where('id', $id)->delete();
    }

    public function deleteAll(): void
    {
        Gift::query()->where('id', '>', 0)->delete();
    }
}
