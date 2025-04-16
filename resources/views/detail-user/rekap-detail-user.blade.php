@extends('layout')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-center">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">DIVISI : {{ strtoupper($divisi->name) }}</h2>
            </div>

            @foreach ($rekapUsers as $minggu => $items)
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-700 mb-2">
                        Minggu mulai {{ \Carbon\Carbon::parse($minggu)->translatedFormat('d M Y') }}
                    </h4>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700 border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">Nama User</th>
                                    <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">OTS Selesai</th>
                                    <th class="px-6 py-3 text-left font-medium uppercase tracking-wider">Tanggal Input</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @foreach ($items as $rekap)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4">{{ ucwords($rekap->user->name) ?? 'User tidak ditemukan' }}</td>
                                        <td class="px-6 py-4">{{ $rekap->ots_selesai }}</td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($rekap->created_at)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-end mt-2">
                            <a href="{{route('components.dashboard')}}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-200">back</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
