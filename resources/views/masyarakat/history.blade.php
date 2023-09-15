<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mobile">


            <div
                class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-slate-200 dark:border-slate-300">
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Pilih Tab</label>
                    <select id="tabs"
                        class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Belum Proses</option>
                        <option>Proses</option>
                        <option>Selesai</option>
                    </select>
                </div>
                <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400"
                    id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                    <li class="w-full">
                        <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab" aria-controls="stats"
                            aria-selected="true"
                            class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Belum
                            Proses</button>
                    </li>
                    <li class="w-full">
                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                            aria-selected="false"
                            class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Proses</button>
                    </li>
                    <li class="w-full">
                        <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq"
                            aria-selected="false"
                            class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Selesai</button>
                    </li>
                </ul>
                <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                    {{-- BELUM PROSES --}}
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-slate-100" id="stats" role="tabpanel"
                        aria-labelledby="stats-tab">
                        @foreach ($history as $data)
                        @if($data->status == 'belum')
                        <div class="flex flex-col mb-2 items-center bg-gray-800 border border-gray-200 rounded-lg shadow md:flex-row
                md:max-w-full dark:border-gray-700 dark:bg-gray-800 ">
                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                src="{{ url('storage/'. $data->image) }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <p class="text-xs text-slate-400 normal-case">NIK : {{$data->nik_pengadu}}</p>
                                <h5
                                    class="mb-2 text-2xl font-bold tracking-tight text-gray-100 dark:text-white capitalize subpixel-antialiased">
                                    {{ $data->judulLaporan }}
                                </h5>
                                <p class="mb-3 font-normal text-gray-100 dark:text-white">{{ $data->isiLaporan }}</p>
                                <span class="text-xs text-slate-400">{{ $data->tgl_pengaduan }} / <span class="capitalize @if($data->status == 'belum') text-red-500
                                        @elseif($data->status == 'proses') text-yellow-500
                                        @elseif($data->status == 'selesai') text-green-600
                                        @endif">{{
                                        $data->status}}</span></span>
                            </div>
                            <a href="{{route('history-detail', [ 'id' => $data->id ])}}" id="ARROW BRO"
                                class="inline-flex h-60 items-center px-2 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-r-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-slate-100" id="about" role="tabpanel"
                        aria-labelledby="about-tab">
                        @foreach ($history as $data)
                        @if($data->status == 'proses')
                        <div class="flex flex-col mb-2 items-center bg-gray-800 border border-gray-200 rounded-lg shadow md:flex-row
                md:max-w-full dark:border-gray-700 dark:bg-gray-800 ">
                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                src="{{ url('storage/'. $data->image) }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <p class="text-xs text-slate-400 normal-case">NIK : {{$data->nik_pengadu}}</p>
                                <h5
                                    class="mb-2 text-2xl font-bold tracking-tight text-gray-100 dark:text-white capitalize subpixel-antialiased">
                                    {{ $data->judulLaporan }}
                                </h5>
                                <p class="mb-3 font-normal text-gray-100 dark:text-white">{{ $data->isiLaporan }}</p>
                                <span class="text-xs text-slate-400">{{ $data->tgl_pengaduan }} / <span class="capitalize @if($data->status == 'belum') text-red-500
                                        @elseif($data->status == 'proses') text-yellow-500
                                        @elseif($data->status == 'selesai') text-green-600
                                        @endif">{{
                                        $data->status}}</span></span>
                            </div>
                            <a href="{{route('history-detail', [ 'id' => $data->id ])}}" id="ARROW BRO"
                                class="inline-flex h-60 items-center px-2 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-r-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>


                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-slate-100" id="faq" role="tabpanel"
                        aria-labelledby="faq-tab">
                        @foreach ($history as $data)
                        @if($data->status == 'selesai')
                        <div class="flex flex-col mb-2 items-center bg-gray-800 border border-gray-200 rounded-lg shadow md:flex-row
                md:max-w-full dark:border-gray-700 dark:bg-gray-800 ">
                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                src="{{ url('storage/'. $data->image) }}" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <p class="text-xs text-slate-400 normal-case">NIK : {{$data->nik_pengadu}}</p>
                                <h5
                                    class="mb-2 text-2xl font-bold tracking-tight text-gray-100 dark:text-white capitalize subpixel-antialiased">
                                    {{ $data->judulLaporan }}
                                </h5>
                                <p class="mb-3 font-normal text-gray-100 dark:text-white">{{ $data->isiLaporan }}</p>
                                <span class="text-xs text-slate-400">{{ $data->tgl_pengaduan }} / <span class="capitalize @if($data->status == 'belum') text-red-500
                                        @elseif($data->status == 'proses') text-yellow-500
                                        @elseif($data->status == 'selesai') text-green-600
                                        @endif">{{
                                        $data->status}}</span></span>
                            </div>
                            <a href="{{route('history-detail', [ 'id' => $data->id ])}}" id="ARROW BRO"
                                class="inline-flex h-60 items-center px-2 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-r-lg hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">
                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>



            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}


            {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                NIK
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul Laporan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat Laporan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Edit
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history as $data)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->nik_pengadu }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data->judulLaporan}}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->alamat}}
                            </td>
                            <td class="px-6 py-4">
                                {{$data->tgl_kejadian}}
                            </td>
                            <td class="px-6 py-4 capitalize">
                                {{$data->status}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
        </div>
    </div>
</x-app-layout>