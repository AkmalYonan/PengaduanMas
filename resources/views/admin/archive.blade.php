<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Archive') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mobile">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <caption
                        class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Laporan Selesai
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of
                            Flowbite
                            products designed to help you work and play, stay organized, get answers, keep in
                            touch,
                            grow your business, and more.</p>
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Judul Laporan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NIK
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Kejadian
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $data)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->judulLaporan }}
                            </th>
                            <td class="px-6 py-4">
                                {{$data->nik_pengadu}}
                            </td>
                            <td class="px-6 py-4">
                                {{$data->tgl_kejadian}}
                            </td>
                            <td class="px-6 py-4 capitalize">
                                {{$data->status}}
                            </td>
                            <td class="px-2 py-4 text-left">
                                <a href="{{route('history-detail', ['id' => $data->id])}}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                    Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>