<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaduan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 mobile">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}

            <form action="{{ route('send-laporan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <div class="bg-red-100 border-t border-b border-blue-500 text-black-700 px-4 py-3" role="alert">
                            <p class="font-bold">Danger:</p>
                            <p class="text-sm">{{ $error }}</p>
                        </div>
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Form Pengaduan</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Formulir ini bisa saja dilihat Oleh Public, Jadi
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
                                        <input type="text" name="username" id="username" autocomplete="username"
                                            value="{{ $user->username }}" disabled
                                            class="block flex-1 border-0 bg-transparent  py-1.5 pl-1 text-gray-900 focus:ring-0 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>


                            <div class="sm:col-span-3">
                                <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">NIK
                                </label>
                                <div class="mt-2">
                                    <input type="text" name="nik" id="nik" autocomplete="nik" value="{{ $user->nik }}"
                                        disabled
                                        class="block w-full rounded-md border-0 py-1.5  disabled:bg-slate-100 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" autocomplete="family-name" disabled
                                        value="{{ $user->name}}"
                                        class="block w-full rounded-md disabled:bg-slate-100 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                    address</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        value="{{ $user->email }}" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 disabled:bg-slate-100 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="judulLaporan"
                                    class="block text-sm font-medium leading-6 text-gray-900">Judul Laporan</label>
                                <div class="mt-2">
                                    <input type="text" name="judulLaporan" id="judulLaporan" autocomplete="judulLaporan"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="isiLaporan" class="block text-sm font-medium leading-6 text-gray-900">Detail
                                    /
                                    Kronologi</label>
                                <div class="mt-2">
                                    <textarea id="isiLaporan" name="isiLaporan" rows="4"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Foto
                                    Kejadian <span class="text-slate-600 text-xs">(Opsional)</span></label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none "
                                    id="image" name="image" type="file">
                            </div>

                            {{-- <div class="col-span-full">
                                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Foto
                                    Kejadian <span class="text-slate-600 text-xs">(Opsional)</span></label>
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
                                    id="drop-zone">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                            <label for="image"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="image" name="image" type="file" class="sr-only">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>

                                        <p id="selected-file" class="mt-2 text-sm font-medium text-gray-900">Selected
                                            File: None</p>
                                    </div>
                                </div>
                            </div> --}}


                            <div class="sm:col-span-3">
                                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Tanggal
                                    Kejadian</label>
                                <div class="mt-2">
                                    <input type="date" name="tgl_kejadian" id="tgl_kejadian">
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="alamat"
                                    class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                                <div class="mt-2">
                                    <input type="text" name="alamat" id="alamat" autocomplete="alamat"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-900/10 pb-5">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Notifications</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">We'll always let you know about important
                            changes, but you pick what else you want to hear about.</p>
                        <p class="mt-5 text-center text-red-700">Maintance Now</p>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    {{-- <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    --}}

                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('file-upload');
        const selectedFile = document.getElementById('selected-file');
    
        // Mencegah default behavior drag and drop browser
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-blue-500');
        });
    
        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-blue-500');
        });
    
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-blue-500');
            
            // Mengambil file yang di-drop
            const file = e.dataTransfer.files[0];
    
            // Mengisi nilai input file dengan file yang di-drop
            fileInput.files = e.dataTransfer.files;
    
            // Menampilkan nama file yang di-drop
            selectedFile.textContent = `Selected File: ${file.name}`;
        });
    
        // Memantau perubahan pada input file
        fileInput.addEventListener('change', () => {
            // Menampilkan nama file yang dipilih (jika ada)
            if (fileInput.files.length > 0) {
                selectedFile.textContent = `Selected File: ${fileInput.files[0].name}`;
            } else {
                selectedFile.textContent = `Selected File: None`;
            }
        });
    </script>


</x-app-layout>