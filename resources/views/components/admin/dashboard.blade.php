@extends('layout')

@section('content')
    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5 ">
        <div class="mx-auto max-w-screen-xl ">
            <div class="flex flex-col md:flex-row items-center justify-end space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center" action="{{ route('dashboard.import') }}" method="POST"
                        enctype='multipart/form-data'>
                        @csrf
                        <label for="file-upload" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5  text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01" />
                                </svg>
                            </div>
                            <input type="file" id="file-upload"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="upload here" required="" name="file">
                        </div>
                        <div class="mx-3">
                            <button
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-white focus:outline-none bg-blue-500 rounded-lg border border-gray-200 hover:bg-blue-400 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Upload
                            </button>
                        </div>
                    </form>
                    <form id="delete-form" action="{{ route('dashboard.delete') }}" method="POST"
                        class="w-full md:w-auto flex items-center justify-center">
                        @csrf
                        @method('DELETE')
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-4 py-3 text-center text-2xl">
                                <div id="" class="">
                                    <div class="">
                                        <input type="checkbox" id="select-all">

                                    </div>
                                </div>
                            </th>

                            <th scope="col" class="px-4 py-3 text-2xl">Divisi</th>
                            <th scope="col" class="px-4 py-3 text-2xl ">Ots Masuk</th>
                            <th scope="col" class="px-4 py-3 text-2xl ">Ots Selesai</th>
                            <th scope="col" class="px-4 py-3 text-2xl ">Ots Sisa</th>
                            <th scope="col" class="px-4 py-3 text-2xl ">Tanggal Upload</th>
                            <th scope="col" class="px-4 py-3 text-2xl ">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekaps as $items)
                            <tr class=" dark:border-gray-700">
                                <td class="border- px-4 py-3 text-center">
                                    <input type="checkbox" name="selected_ids[]" value="{{ $items->id }}"
                                        class="row-checkbox">
                                    {{-- {{dump($items->id)}} --}}
                                </td>

                                <th scope="row"
                                    class="border-t px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ strtoupper($items->divisi->name) }}
                                </th>
                                <td class="border-t px-4 py-3">{{ $items->ots_masuk }}</td>
                                <td class="border-t px-4 py-3">{{ $items->ots_selesai }}</td>
                                <td class="border-t px-4 py-3">{{ $items->ots_sisa }}</td>
                                <td class="border-t px-4 py-3">{{ $items->created_at->format('d-m-Y') }}</td>
                                <td class="border-t px-4 py-3">
                                    <a href="{{ $items->ots_selesai == 0 ? '#' : route('detail-user.rekap-detail-user', ['id' => $items->divisi_id, 'date' => $date]) }}"
                                        class="px-3 py-2 rounded 
                                                        {{ $items->ots_selesai == 0 ? 'text-gray-400 cursor-not-allowed' : 'text-blue-500 hover:text-blue-700 hover:underline' }}"
                                        {{ $items->ots_selesai == 0 ? 'onclick=return false;' : '' }}>
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="hidden flex justify-end pr-10" id="deleteSelector">
                    <button type="submit"
                        class=" text-sm font-medium items-center bg-white text-white px-4 py-2 rounded-lg flex hover:bg-gray-200">
                        <svg class="w-6 h-6 text-red-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                        </svg>
                    </button>
                </div>
                </form>
                <div class="flex justify-between my-4">
                    {{-- Tombol Prev --}}
                    @if ($prevDate)
                        <a href="{{ route('components.dashboard', ['date' => $prevDate]) }}"
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                            </svg>
                        </span>
                    @endif
                    @if ($nextDate)
                        <a href="{{ route('components.dashboard', ['date' => $nextDate]) }}"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"> <svg
                                class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                            </svg>
                        </a>
                    @else
                        <span class="px-4 py-2 bg-gray-200 rounded text-gray-400"><svg
                                class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                            </svg>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
