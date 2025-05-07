<?php

namespace App\Http\Controllers;

use App\Models\RekapDivisi;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $allDates = RekapDivisi::orderByDesc('created_at')
            ->pluck('created_at')
            ->map(fn($item) => $item->format('Y-m-d'))
            ->unique()
            ->values();
            
            if ($allDates->isEmpty()) {
                return view('components.index', [
                    'rekaps' => collect(),
                    'date'=>null,
                    'prevDate'=>null,
                    'nextDate'=>null
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

        return view('components.index', compact(
            [
                'rekaps',
                'date',
                'prevDate',
                'nextDate'
            ]
        ));
    }
}
