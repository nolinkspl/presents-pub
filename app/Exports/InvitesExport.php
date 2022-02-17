<?php

namespace App\Exports;

use App\Models\AgentInfo;
use App\Models\Gift;
use App\Models\Invite;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class InvitesExport implements FromCollection, WithColumnFormatting, WithHeadings, WithMapping, ShouldAutoSize
{
    private $inviteCollection;
    private $gifts;
    private $agents;

    public function __construct($inviteCollection, $gifts, $agents)
    {
        $this->inviteCollection = $inviteCollection;
        $this->gifts = $gifts;
        $this->agents = $agents;
    }

    public function collection()
    {
        return $this->inviteCollection;
    }

    public function headings(): array
    {
        return [
            '#',
            'Code',
            'Created',
            'Used',
            'Код подарка',
            'Тип подарка',
            'Email',
            'Устройство',
            'Браузер',
            'Платформа',
        ];
    }

    /**
     * @param Invite $invite
     * @return array
     */
    public function map($invite): array
    {
        $filtered = array_values(array_filter($this->gifts, function (Gift $gift) use ($invite) {
            return (int)$gift->invite_id === (int)$invite->id;
        }));

        $agents = array_values(array_filter($this->agents, function (AgentInfo $agent) use ($invite) {
            return (int)$agent->invite_id === (int)$invite->id;
        }));

        $invite->gift = $filtered[0] ?? null;

        $invite->agent = $agents[0] ?? null;

        return [
            $invite->id,
            $invite->code,
            $invite->created_at,
            $invite->used_at,
            $invite->gift === null ? '' : " {$invite->gift->code} ",
            $invite->gift === null ? '' : $invite->gift->getType()->name,
            $invite->email,
            $invite->agent === null ? '' : $invite->agent->device,
            $invite->agent === null ? '' : $invite->agent->browser,
            $invite->agent === null ? '' : $invite->agent->platform,
        ];
    }

    public function columnFormats(): array
    {
        return [
//            'B' => DataType::TYPE_STRING,
//            'E' => DataType::TYPE_STRING,
        ];
    }
}
