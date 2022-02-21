<?php

namespace App\Repositories;

use App\Http\Requests\Admin\GiftType\GiftTypeSaveRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Models\Gift;
use App\Models\GiftType;

class GiftTypeRepository
{

    /**
     * @param string $serviceName
     * @return GiftType|null
     */
    public function findGiftTypeByServiceName(string $serviceName): ?GiftType
    {
        return GiftType::query()->where('name', $serviceName)->get()->first();
    }

    /**
     * @param integer $id
     * @return GiftType|null
     */
    public function findById(int $id): ?GiftType
    {
        return GiftType::query()->where('id', $id)->get()->first();
    }

    public function findOrCreateById(int $id): GiftType
    {
        return GiftType::firstOrCreate(['id' => $id]);
    }

    /**
     * @return GiftType[]
     */
    public function getGiftTypesList(): array
    {
        return GiftType::query()->orderBy('id')->get()->all();
    }

    public function getGiftTypesIndexedById(): array
    {
        $types = $this->getGiftTypesList();
        $result = [];

        foreach ($types as $type) {
            $result[$type->id] = $type;
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getGiftTypeNamesIndexedById(): array
    {
        $types = $this->getGiftTypesList();
        $result = [];

        foreach ($types as $type) {
            $result[$type->id] = $type->name;
        }

        return $result;
    }

    /**
     * @param GiftType[] $giftTypes
     * @param Gift[] $gifts
     * @return int[]
     */
    public function countGiftsByTypes(array $giftTypes, array $gifts): array
    {
        $result = [];

        foreach ($giftTypes as $type) {
            $result[$type->name] = 0;
        }

        foreach ($giftTypes as $type) {
            foreach ($gifts as $gift) {
                if ($gift->gift_type_id === $type->id) {
                    $result[$type->name]++;
                }
            }
        }

        return $result;
    }

    /**
     * @return GiftType[]
     */
    public function findAll(): array
    {
        return GiftType::query()->get()->all();
    }

    public function save(GiftType $giftType, GiftTypeSaveRequest $request): void
    {
        $giftType->name = $request->getName();
        $giftType->title = $request->getTitle();
        $giftType->description_head = $request->getDescriptionHead();
        $giftType->description = $request->getDescription();
        $giftType->cost = $request->getCost();
        $giftType->is_vip = $request->getVip();
        $giftType->save();
    }

    public function delete(GiftType $giftType, DeleteRequest $request): void
    {
        $giftType->id = $request->getId();
        $giftType->delete();

    }

}
