@extends('layout')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-8 lg:px-6">
            <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($rekapUsers as $rekap)
                        <div class="text-center text-gray-500 dark:text-gray-400">
                            <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                                src="{{asset('img/user.png')}}"
                                alt="Bonnie Avatar">
                            <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <a href="#">{{ strtoupper($rekap->user->name )}}</a>
                            </h3>
                            <p>{{strtoupper($rekap->user->status)}}</p>
                            <p>{{$rekap->ots_selesai}}</p>
                            <p>{{$rekap->created_at->format('d-m-Y')}}</p>
                        </div>  
                @endforeach
            </div>
            <div class="flex justify-between my-4">
                {{-- Tombol Prev --}}
                @if ($prevDate)
                    <a href="{{ route('detail-user.rekap-detail-user', ['id' => $divisi->id, 'date' => $prevDate]) }}"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                    </a>
                @else
                    <span class="px-4 py-2 bg-gray-200 rounded text-gray-400">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                    </span>
                @endif
            
                {{-- Tombol Next --}}
                @if ($nextDate)
                    <a href="{{ route('detail-user.rekap-detail-user', ['id' => $divisi->id, 'date' => $nextDate]) }}"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                    </a>
                @else
                    <span class="px-4 py-2 bg-gray-200 rounded text-gray-400">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                    </span>
                @endif
            </div>
            
        </div>
    </section>
@endsection
