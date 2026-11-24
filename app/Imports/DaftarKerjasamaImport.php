<?php

namespace App\Imports;

use App\Models\DaftarKerjasama;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DaftarKerjasamaImport implements ToModel, WithHeadingRow
{
    public function model(array $row): ?Model
    {
        if (empty($row['nama_mitra'])) {
            return null;
        }

        $tingkatRaw = strtolower(trim($row['tingkat'] ?? 'dalam_negeri'));
        $tingkat = str_contains($tingkatRaw, 'luar') ? 'luar_negeri' : 'dalam_negeri';

        return new DaftarKerjasama([
            'nama_mitra'       => $row['nama_mitra'],
            'tingkat'          => $tingkat,
            'jenis_dokumen'    => $row['jenis_dokumen'] ?? 'MoU',
            'bidang_kerjasama' => $row['bidang_kerjasama'] ?? '-',
            'tahun_mulai'      => $row['tahun_mulai'] ?? null,
            'tahun_berakhir'   => $row['tahun_berakhir'] ?? null,
            'status'           => $row['status'] ?? 'Aktif',
        ]);
    }
}