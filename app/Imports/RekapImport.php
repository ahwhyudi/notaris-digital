<?php

namespace App\Imports;

use App\Models\Divisi;
use App\Models\User;
use App\Models\RekapDivisi;
use App\Models\RekapUser;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Carbon;

class RekapImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'rekap_divisi' => new class implements ToCollection {
                public function collection(Collection $rows)
                {
                    foreach ($rows->skip(1) as $row) {
                        $divisi_name = $row[0];
                        $ots_masuk = $row[1];
                        $jbd_baru = $row[2];
                        $tanggal = now()->toDateString();

                        $divisi = Divisi::where('name', $divisi_name)->first();

                        if (!$divisi) {
                            continue;
                        }

                        RekapDivisi::updateOrCreate(
                            [
                                'divisi_id' => $divisi->id,
                                'created_at' => now(),
                            ],
                            [
                                'ots_masuk' => $ots_masuk,
                                'ots_selesai' => 0,
                                'ots_sisa' => $ots_masuk,
                                'jbd_baru'=>$jbd_baru,
                                'created_at' => now(),
                            ]
                        );
                    }
                }
            },
            'rekap_user' => new class implements ToCollection {
                public function collection(Collection $rows)
                {
                    foreach ($rows->skip(1) as $row) {
                        $user_name = $row[0];
                        $divisi_name = $row[1];
                        $ots_selesai = $row[2];
                        $tanggal = now()->toDateString();

                        $user = User::where('name', $user_name)->first();
                        $divisi = Divisi::where('name', $divisi_name)->first();

                        if (!$user || !$divisi) {
                            continue;
                        }

                        RekapUser::create([
                            'user_id' => $user->id,
                            'divisi_id' => $divisi->id,
                            'ots_selesai' => $ots_selesai ?? 0,
                            'created_at' => now(),
                        ]);

                        $totalSelesai = RekapUser::where('divisi_id', $divisi->id)
                            ->whereDate('created_at', $tanggal)
                            ->sum('ots_selesai');

                        $rekapDivisi = RekapDivisi::where('divisi_id', $divisi->id)
                            ->whereDate('created_at', $tanggal)
                            ->first();

                        if ($rekapDivisi) {
                            $rekapDivisi->update([
                                'ots_selesai' => $totalSelesai,
                                'ots_sisa' => $rekapDivisi->ots_masuk - $totalSelesai,
                            ]);
                        }
                    }
                }
            },
        ];
    }
}