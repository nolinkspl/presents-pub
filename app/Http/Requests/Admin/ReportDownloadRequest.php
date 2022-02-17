<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Maatwebsite\Excel\Excel;

class ReportDownloadRequest extends Request
{
    public function rules(): array
    {
        return [
            'format' => 'string',
        ];
    }

    public function getReportFormat(): string
    {
        $format = $this->get('format');
return $format;
        switch ($format) {
            case Excel::XLSX:
            case Excel::XLS:
            case Excel::CSV:
            case Excel::ODS:
            case Excel::HTML: return $format;
            default: return Excel::CSV;
        }
    }
}
