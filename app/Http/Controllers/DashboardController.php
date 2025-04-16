<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Divisi;
use App\Models\RekapUser;
use App\Models\RekapDivisi;
use App\Imports\RekapImport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil rekap per divisi dan kelompokkan per minggu berdasarkan created_at
        $rekaps = RekapDivisi::with('divisi')->get()->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->startOfWeek()->format('Y-m-d');
        });

        return view('components.dashboard', compact('rekaps'));
    }

        public function show($id)
        {
            $divisi = Divisi::findOrFail($id);

            // Ambil semua rekap user untuk divisi ini dan kelompokkan per minggu
            $rekapUser = RekapUser::with('user')
                ->where('divisi_id', $id)
                ->get()
                ->groupBy(function ($item) {
                    return Carbon::parse($item->created_at)->startOfWeek()->format('Y-m-d');
                });
                // dd($rekapUser);

            return view('detail-user.rekap-detail-user', [
                'divisi' => $divisi,
                'rekapUsers' => $rekapUser
            ]);
        }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new RekapImport, $request->file('file'));

        return back()->with('success', 'Data berhasil diimport');
    }
}
