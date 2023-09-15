<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History - '. $history->judulLaporan) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 mobile">

            <div>
                <div class="px-4 sm:px-0">
                    <h3 class="text-base font-semibold leading-7 text-gray-900">Informasi Detail Pengaduan</h3>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Berikut adalah Hasil Lengkap laporan yang
                        dibuat
                    </p>
                </div>
                <div class="mt-6 border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">NIK</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{$history->user->nik}}
                            </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Nama Pelapor</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{$history->user->name}}
                            </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Email Pelapor</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{$history->user->email}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Status Laporan</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 capitalize @if($history->status == 'belum') text-red-500
                                @elseif($history->status == 'proses') text-yellow-500
                                @elseif($history->status == 'selesai') text-green-600
                                @endif">
                                {{$history->status}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Judul Laporan</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{$history->judulLaporan}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Isi Laporan</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{$history->isiLaporan}}
                            </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Alamat Kejadian</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{$history->alamat}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Tanggal Kejadian</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{$history->tgl_kejadian}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Tanggal Pengaduan</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{$history->tgl_pengaduan}}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Foto Laporan</dt>
                            <img srcset="{{ url('storage/'. $history->image) }} 1x, {{ url('storage/'. $history->image) }} 2x"
                                class="w-full h-auto max-w0-xl rounded-lg sm:col-span-2" alt="image description">
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Attachments</dt>
                            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                        <div class="flex w-0 flex-1 items-center">
                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                <span class="truncate font-medium">{{$history->image}}</span>
                                                <span class="flex-shrink-0 text-gray-400">{{ $fileSizeMB }}.Mb</span>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <a href="{{ route('history-detail-image-download', ['id' => $history->id])}}"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                        </div>
                                    </li>
                                </ul>
                            </dd>
                        </div>
                        @if ($history->status == 'proses' || $history->status == 'selesai')
                        <div class="border-b border-gray-900/10 pb-5 pt-5">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Komentar</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">We'll always let you know about important
                                changes, but you pick what else you want to hear about.</p>
                        </div>
                        @if (empty($komentar))
                        <p class="mt-5 text-center text-red-700">Belum ada!</p>
                        @else
                        <ol class="relative border-l border-gray-200 dark:border-gray-700">
                            @foreach ($komentar as $item)
                            <li class="mb-10 ml-4">
                                <div
                                    class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                                </div>
                                <time
                                    class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{$item->tgl_tanggapan}}</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">ID atau Nama Petugas
                                    disini</h3>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{$item->tanggapan}}
                                </p>
                            </li>
                            @endforeach
                        </ol>
                        @endif
                        @endif
                        <div class="mt-6 flex items-center justify-end gap-x-3">
                            @if ($history->status == 'belum' && $history->nik_pengadu == Auth::user()->nik)
                            <button data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                class="rounded-md bg-teal-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-teal-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600">Edit
                                Laporan</button>
                            @endif
                            @if ($history->status == 'proses')
                            <button data-modal-target="medium-modal" data-modal-toggle="medium-modal"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tanggapi</button>
                            <form action="{{route('history.selesai',['id' => $history->id])}}" method="POST">
                                @csrf
                                @method('patch')
                                <button type="submit"
                                    class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Selesai
                                    Laporan</button>
                            </form>
                            @endif
                        </div>
                    </dl>
                </div>
            </div>
            <div id="medium-modal" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Modal header -->
                        <div
                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Tambahkan Komentar
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="{{route('admin.komentar',['id' => $history->id])}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                        Laporan</label>
                                    <input type="text" name="judulLaporan" id="judulLaporan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                        placeholder="Judul Laporan" value="{{ $history->judulLaporan }}" disabled
                                        required="">
                                </div>
                                <div>
                                    <label for="brand"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Pelapor</label>
                                    <input type="text" name="brand" id="brand"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                        placeholder="Nama Pelapor" disabled value="{{$history->user->name}}"
                                        required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="tanggapan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komentar</label>
                                    <textarea id="tanggapan" name="tanggapan" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                                        placeholder="Tulis Komentar anda Terhadap Laporan ini"></textarea>
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Tambahkan
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <div id="edit-modal" tabindex="-1"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-4xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                Large modal
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="large-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="{{route('history.edit',['id' => $history->id])}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="sm:p-5">
                                <div class="border-b border-gray-900/10 pb-12">
                                    <h2 class="text-base font-semibold leading-7 text-gray-900">Form Pengaduan</h2>
                                    <p class="mt-1 text-sm leading-6 text-gray-600">Formulir ini bisa saja dilihat Oleh
                                        Public, Jadi
                                        Isilah dengan hati Hati dan Benar!</p>

                                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <label for="username"
                                                class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                                            <div class="mt-2">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <span
                                                        class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">pengaduan.com/</span>
                                                    <input type="text" name="username" id="username"
                                                        autocomplete="username" value="{{ $history->user->username }}"
                                                        disabled
                                                        class="block flex-1 border-0 bg-transparent  py-1.5 pl-1 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="sm:col-span-3">
                                            <label for="nik"
                                                class="block text-sm font-medium leading-6 text-gray-900">NIK
                                            </label>
                                            <div class="mt-2">
                                                <input type="text" name="nik" id="nik" autocomplete="nik"
                                                    value="{{ $history->user->nik }}" disabled
                                                    class="block w-full rounded-md border-0 py-1.5  disabled:bg-slate-100 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="name"
                                                class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                                            <div class="mt-2">
                                                <input type="text" name="name" id="name" autocomplete="family-name"
                                                    disabled value="{{ $history->user->name}}"
                                                    class="block w-full rounded-md disabled:bg-slate-100 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <label for="email"
                                                class="block text-sm font-medium leading-6 text-gray-900">Email
                                                address</label>
                                            <div class="mt-2">
                                                <input id="email" name="email" type="email" autocomplete="email"
                                                    value="{{ $history->user->email }}" disabled
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 disabled:bg-slate-100 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <label for="judulLaporan"
                                                class="block text-sm font-medium leading-6 text-gray-900">Judul
                                                Laporan</label>
                                            <div class="mt-2">
                                                <input type="text" name="judulLaporan" id="judulLaporan"
                                                    autocomplete="judulLaporan" value="{{$history->judulLaporan}}"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <label for="isiLaporan"
                                                class="block text-sm font-medium leading-6 text-gray-900">Detail
                                                /
                                                Kronologi</label>
                                            <div class="mt-2">
                                                <textarea id="isiLaporan" name="isiLaporan" rows="4"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$history->isiLaporan}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <label for="image"
                                                class="block text-sm font-medium leading-6 text-gray-900">Foto
                                                Kejadian <span class="text-slate-600 text-xs">(Opsional)</span></label>
                                            <input
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none "
                                                id="image" name="image" type="file">
                                        </div>


                                        <div class="sm:col-span-3">
                                            <label for="country"
                                                class="block text-sm font-medium leading-6 text-gray-900">Tanggal
                                                Kejadian</label>
                                            <div class="mt-2">
                                                <input type="date" name="tgl_kejadian" id="tgl_kejadian"
                                                    value="{{$history->tgl_kejadian}}">
                                            </div>
                                        </div>

                                        <div class="col-span-full">
                                            <label for="alamat"
                                                class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                                            <div class="mt-2">
                                                <input type="text" name="alamat" id="alamat" autocomplete="alamat"
                                                    value="{{$history->alamat}}"
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button data-modal-hide="large-modal" type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                    accept</button>
                                <button data-modal-hide="large-modal" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>