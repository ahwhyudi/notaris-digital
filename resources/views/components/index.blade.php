@extends('index-layout')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-4 px-4 mx-auto max-w-screen-xl sm:py-6 lg:px-6">
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                @foreach ($rekaps as $rekap)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 p-5 flex items-center gap-4">
                        <div class="flex-1">
                            <h3 class="mb-2 text-xl font-bold dark:text-white">{{ strtoupper($rekap->divisi->name) }}
                            </h3>
                            {{-- <p class="text-gray-500 dark:text-gray-400">OTS SEBELUMNYA : {{ $rekap->ots_masuk }}</p> --}}
                            <p class="text-gray-500 dark:text-gray-400">JBD MASUK : {{ $rekap->jbd_baru }}</p>
                            <p class="text-gray-500 dark:text-gray-400">JBD SELESAI : {{ $rekap->ots_selesai }}</p>
                            <p class="text-gray-500 dark:text-gray-400">OTS : {{ $rekap->ots_sisa }}</p>
                            <p class="text-gray-500 dark:text-gray-400">TANGGAL :
                                {{ $rekap->created_at->format('d-m-Y') }}</p>
                        </div>
                        <div class="text-center">
                            <img class="w-24 h-24 rounded-full object-cover mx-auto mb-2"
                                src="{{asset('img/user.png')}}"
                                alt="Bonnie Avatar">
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Terbaik</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-between my-4">
                {{-- Tombol Prev --}}
                @if ($prevDate)
                    <a href="{{ route('components.index', ['date' => $prevDate]) }}"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"><svg
                            class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                    </a>
                @else
                    <span class="px-4 py-2 bg-gray-200 rounded text-gray-400"><svg
                            class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                    </span>
                @endif
                @if ($nextDate)
                    <a href="{{ route('components.index', ['date' => $nextDate]) }}"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"> <svg
                            class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                    </a>
                @else
                    <span class="px-4 py-2 bg-gray-200 rounded text-gray-400"><svg
                            class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                    </span>
                @endif
            </div>
        </div>
    </section>
@endsection
