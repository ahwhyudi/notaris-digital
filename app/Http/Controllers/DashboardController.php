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
    
    public function report(Request $request)
    {

         $allDates = RekapDivisi::orderByDesc('created_at')
        ->pluck('created_at')
        ->map(fn($item) => $item->format('Y-m-d'))
        ->unique()
        ->values();

    if ($allDates->isEmpty()) {
        return view('components.admin.dashboard', [
            'rekaps' => collect(),
            'date' => null,
            'prevDate' => null,
            'nextDate' => null
        ]);
    }

    $requestDate = $request->get('date');
    $date = in_array($requestDate, $allDates->toArray()) ? $requestDate : $allDates->first();

    $curretIndex = $allDates->search($date);
    $prevDate = $allDates->get($curretIndex - 1);
    $nextDate = $allDates->get($curretIndex + 1);

    $rekaps = RekapDivisi::with('divisi')
        ->whereDate('created_at', $date)
        ->get();

    return view('components.admin.dashboard', compact(
        [
            'rekaps',
            'date',
            'prevDate',
            'nextDate'
        ]
    ));
    }

    public function show($id, Request $request)
    {
        $allDates= RekapUser::orderByDesc('created_at')
        ->pluck('created_at')
        ->map(fn($item)=>$item->format('Y-m-d'))
        ->unique()
        ->values();
        if($allDates->isEmpty()){
            return view('detail-user.rekap-detail-user',[
                'rekaps'=>collect(),
                'date'=>null,
                'prevDate'=>null,
                'nextDate'=> null
            ]);
        }
        
        $requestDate=$request->get('date');
        $date=in_array($requestDate, $allDates->toArray()) ? $requestDate : $allDates->first();

        $currentDate = $allDates->search($date);
        $prevDate = $allDates->get($currentDate-1);
        $nextDate = $allDates->get($currentDate+1);
        
        $divisi = Divisi::where('id', $id)->firstOrFail();
        $rekapUsers=RekapUser::with('user')
        ->where('divisi_id', $divisi->id)
        ->whereDate('created_at', $date)
        ->get();

        return view('detail-user.rekap-detail-user',compact([
            'rekapUsers',
            'date',
            'prevDate',
            'nextDate',
            'divisi'
        ]));  
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new RekapImport, $request->file('file'));

        return back()->with('success', 'Data berhasil diimport');
    }

    public function delete(Request $request){
        $ids = $request->input('selected_ids', []);

    if (!empty($ids)) {
       $rekapDivisis= RekapDivisi::whereIn('id', $ids)->get();

        foreach ($rekapDivisis as $divisi) {
            // Hapus rekap user yang terkait
            $divisi->rekapUsers()->delete();
            // Hapus rekap divisinya
            $divisi->delete();
    }}
    return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
