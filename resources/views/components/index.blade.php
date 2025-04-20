@extends('layout')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-4 px-4 mx-auto max-w-screen-xl sm:py-6 lg:px-6">
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                @foreach ($rekaps as $rekap)
                    <a href="{{ route('detail-user.rekap-detail-user', ['id'=>$rekap->divisi_id, 'date'=>$date]) }}">
                        <div
                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 p-5">
                            {{-- <div
                                    class="flex justify-center rekap-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                                    <svg class="w-5 h-5 text-primary-600 lg:w-6 lg:h-6 dark:text-primary-300"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div> --}}
                            <h3 class="mb-2 text-xl font-bold dark:text-white">{{ strtoupper($rekap->divisi->name) }}
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400">OTS MASUK : {{ $rekap->ots_masuk }}</p>
                            <p class="text-gray-500 dark:text-gray-400">OTS SELESAI : {{ $rekap->ots_selesai }}</p>
                            <p class="text-gray-500 dark:text-gray-400">OTS SISA : {{ $rekap->ots_sisa }}</p>
                            <p class="text-gray-500 dark:text-gray-400">TANGGAL :
                                {{ $rekap->created_at->format('d-m-Y') }}</p>
                        </div>
                    </a>
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
