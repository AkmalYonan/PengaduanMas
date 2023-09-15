<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mobile">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 pb-5">
                    <div class="sm:col-span-3">
                        <!-- Name -->
                        <div>
                            <x-input-label for="nik" :value="__('NIK')" />
                            <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')"
                                required autofocus autocomplete="nik" />
                            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                        </div>

                        <div class="row flex gap-2 mt-4">
                            <div class="col w-1/2">
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col w-1/2">
                                <div>
                                    <x-input-label for="username" :value="__('Username')" />
                                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                                        :value="old('username')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class=" mt-4">
                            <x-input-label for="telp" :value="__('Telepon')" />
                            <x-text-input id="telp" class="block mt-1 w-full" type="text" name="telp"
                                :value="old('telp')" required autofocus autocomplete="telp" />
                            <x-input-error :messages="$errors->get('telp')" class="mt-2" />
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ml-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>


            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Belum Proses
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of
                                    Flowbite
                                    products designed to help you work and play, stay organized, get answers, keep in
                                    touch,
                                    grow your business, and more.</p>
                            </caption>
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                    <td class="px-6 py-4 text-right">
                                        <form action="{{route('history.proses', ['id' => $data->id])}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Proses</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Proses
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of
                                    Flowbite
                                    products designed to help you work and play, stay organized, get answers, keep in
                                    touch,
                                    grow your business, and more.</p>
                            </caption>
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                @foreach ($pengaduanProses as $data)
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
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{route('history-detail', [ 'id' => $data->id ])}}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tanggapi</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>