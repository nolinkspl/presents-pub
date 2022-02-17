<?php

namespace App\Exports;

use App\Models\Gift;
use App\Models\GiftType;
use App\Models\Invite;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class GiftsExport implements FromCollection, WithColumnFormatting, WithHeadings, WithMapping, ShouldAutoSize
{
    private $giftCollection;
    private $invites;
    private $giftTypes;

    /**
     * GiftsExport constructor.
     * @param $giftCollection
     * @param Invite[] $invites
     * @param GiftType[] $giftTypes
     */
    public function __construct($giftCollection, $invites, $giftTypes)
    {
        $this->giftCollection = $giftCollection;
        $this->invites = $invites;
        $this->giftTypes = $giftTypes;
    }

    public function collection()
    {
        return $this->giftCollection;
    }

    public function headings(): array
    {
        return [
            '#',
            'Тип подарка',
            'Код подарка',
            'Created',
            'Used',
            'Код инвайта',
            'Email',
        ];
    }

    /**
     * @param Gift $gift
     * @return array
     */
    public function map($gift): array
    {
        foreach ($this->invites as $invite) {
            if ($invite->id === $gift->invite_id) {
                $gift->invite = $invite;
            }
        }

        foreach ($this->giftTypes as $giftType) {

            if ($giftType->id === $gift->gift_type_id) {
                $gift->type = $giftType;
            }
        }

        return [
            $gift->id,
            $gift->getType()->name,
            " {$gift->code} ",
            $gift->created_at,
            $gift->used_at,
            $gift->getInviteInfo(),
            $gift->invite === null ? '' : $gift->invite->email,
        ];
    }

    public function columnFormats(): array
    {
        return [
//            'C' => DataType::TYPE_STRING,
//            'F' => DataType::TYPE_STRING,
        ];
    }
}
