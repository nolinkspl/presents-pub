<?php

namespace App\Repositories;

use App\Models\GiftCategory;

class GiftCategoryRepository
{
    /**
     * @return GiftCategory[]
     */
    public function findAllVipCategories(): array
    {
        return GiftCategory::query()->where('is_vip', true)->get()->all();
    }

    /**
     * @return GiftCategory[]
     */
    public function findAllCommonCategories(): array
    {
        return GiftCategory::query()->where('is_vip', false)->get()->all();
    }
}
