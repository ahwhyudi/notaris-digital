@extends('layout')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="bg-white shadow-md rounded-lg p-6 ">
            <div class="flex justify-end">
                <form action="{{ route('dashboard.import') }}" method="POST" enctype="multipart/form-data"
                    class="mb-6 flex flex-col sm:flex-row gap-4 sm:items-center ">
                    @csrf
                    <input type="file" name="file" class="border border-gray-300 p-2 rounded w-full sm:w-auto">
                    <button
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-200">Upload
                        Excel</button>
                </form>
            </div>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">Divisi</th>
                            <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">OTS Masuk</th>
                            <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">OTS Selesai</th>
                            <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">OTS Sisa</th>
                            <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">Tanggal Upload</th>
                            <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach ($rekaps as $week => $items)
                        {{-- {{dd($week)}} --}}
                            <tr>
                                <td colspan="6" class="bg-gray-50 text-gray-800 font-semibold px-6 py-3">
                                    Minggu mulai {{ \Carbon\Carbon::parse($week)->format('d M Y') }}
                                </td>
                            </tr>
                            @foreach ($items as $rekap)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">{{ strtoupper(($rekap->divisi->name)) ?? '-' }}</td>
                                    <td class="px-6 py-4">{{ $rekap->ots_masuk }}</td>
                                    <td class="px-6 py-4">{{ $rekap->ots_selesai }}</td>
                                    <td class="px-6 py-4">{{ $rekap->ots_sisa }}</td>
                                    <td class="px-6 py-4">{{ $rekap->created_at->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4">

                                        <a href="{{ $rekap->ots_selesai== 0 ? '#' : route('detail-user.rekap-detail-user', $rekap->divisi_id) }}"
                                            class="px-3 py-2 rounded 
                                            {{ $rekap->ots_selesai== 0 ? 'text-gray-400 cursor-not-allowed' : 'text-blue-500 hover:text-blue-700 hover:underline' }}"
                                            {{ $rekap->ots_selesai== 0 ? 'onclick=return false;' : '' }}>
                                            Detail
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
