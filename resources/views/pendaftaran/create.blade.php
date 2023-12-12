<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('CAMABA &raquo; Pendaftaran') !!}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($errors->any())
                <div class="mb-5" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4
    py-2">
                        There's something wrong!
                    </div>

                    <div class="border border-t-0 border-red-400 rounded-b
    bg-red-100 px-4 py-3 text-red-700">
                        <p>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </p>
                    </div>
                </div>
                @endif
                <form class="w-full" action="{{ url('/pendaftaran/store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide
    text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Nama Lengkap
                            </label>

                            <input value="{{ old('nama_lengkap') }}" name="nama_lengkap" class="appearance-none block w-full bg-gray-200
    text-gray-700 border border-gray-200 rounded py-3
    px-4 leading-tight focus:outline-none
    focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Nama lengkap">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700
    text-xs font-bold mb-2" for="grid-last-name">
                                Alamat
                            </label>

                            <input value="{{ old('alamat') }}" name="alamat" class="appearance-none block w-full bg-gray-200
    text-gray-700 border border-gray-200 rounded py-3
    px-4 leading-tight focus:outline-none
    focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700
    text-xs font-bold mb-2" for="grid-last-name">
                                Kota
                            </label>

                            <input value="{{ old('kota') }}" name="kota" class="appearance-none block w-full bg-gray-200
    text-gray-700 border border-gray-200 rounded py-3
    px-4 leading-tight focus:outline-none
    focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Kota">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700
    text-xs font-bold mb-2" for="grid-last-name">
                                Tgl Lahir
                            </label>

                            <input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" class="appearance-none block w-full bg-gray-200
    text-gray-700 border border-gray-200 rounded py-3
    
    px-4 leading-tight focus:outline-none focus:bg-
    white
    
    focus:border-gray-500" id="tanggal_lahir" type="text" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700
    text-xs font-bold mb-2" for="grid-last-name">
                                Asal Sekolah
                            </label>

                            <input value="{{ old('asal_sekolah') }}" name="asal_sekolah" class="appearance-none block w-
    full
    
    bg-gray-200 text-gray-700 border border-gray-200
    rounded py-3 px-4 leading-tight focus:outline-none
    focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Asal Sekolah">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">

                            <label class="block uppercase tracking-wide text-gray-700
    text-xs font-bold mb-2" for="grid-last-name">
                                Ijazah
                            </label>

                            <input name="ijazah_url" class="appearance-none block
    
    w-full bg-gray-200 text-gray-700 border border-gray-
    200
    
    rounded py-3 px-4 leading-tight focus:outline-none
    focus:bg-white focus:border-gray-500" id="grid-last-name" type="file" placeholder="Ijazah">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700
    text-xs font-bold mb-2" for="grid-last-name">
                                Prodi Pilihan
                            </label>

                            <select name="prodi_id" class="appearance-none block
    w-full bg-gray-200 text-gray-700 border
    border-gray-200 rounded py-3 px-4 leading-tight
    focus:outline-none focus:bg-white
    focus:border-gray-500" id="grid-last-name">
                                @foreach ($prodi as $item )
                                <option value="{{ $item->id }}">
                                    {{ $item->fakultas->nama_fakultas.' - '
                                    .$item->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 text-right">

                            <button type="submit" class="bg-green-500 hover:bg-green-
    700
    
    text-white font-bold py-2 px-4 rounded">
                                Daftar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    (function() {
        flatpickr('#tanggal_lahir', {});
    })();
</script>