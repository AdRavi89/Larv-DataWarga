<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CAMABA') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($pendaftaran)
            <div class="mb-10 bg-white py-10 px-4">
                <div class="mb-6">
                    <div class="uppercase text-gray-700 text-xs font-bold
    mb-2">Nama Lengkap</div>
                    <div class="bg-gray-200 text-gray-700 border border-gray-200
    rounded py-3 px-4 leading-tight">
                        {{ $pendaftaran->nama_lengkap }}</div>
                </div>
                <div class="mb-6">
                    <div class="uppercase text-gray-700 text-xs font-bold
    mb-2">Alamat</div>
                    <div class="bg-gray-200 text-gray-700 border border-gray-200
    rounded py-3 px-4 leading-tight">
                        {{ $pendaftaran->alamat }}</div>
                </div>
                <div class="mb-6">
                    <div class="uppercase text-gray-700 text-xs font-bold
    mb-2">Kota</div>
                    <div class="bg-gray-200 text-gray-700 border border-gray-200
    rounded py-3 px-4 leading-tight">
                        {{ $pendaftaran->kota }}</div>
                </div>
                <div class="mb-6">

                    <div class="uppercase text-gray-700 text-xs font-bold
    mb-2">Tanggal Lahir</div>
                    <div class="bg-gray-200 text-gray-700 border border-gray-200
    rounded py-3 px-4 leading-tight">
                        {{ Carbon\Carbon::parse($pendaftaran->tanggal_lahir)
                        ->format('Y-m-d') }}</div>
                </div>
                <div class="mb-6">
                    <div class="uppercase text-gray-700 text-xs font-bold
    mb-2">Asal Sekolah</div>
                    <div class="bg-gray-200 text-gray-700 border border-gray-200
    rounded py-3 px-4 leading-tight">
                        {{ $pendaftaran->asal_sekolah }}</div>
                </div>
                <div class="mb-6">
                    <div class="uppercase text-gray-700 text-xs font-bold
    mb-2">Ijazah</div>
                    <div class="bg-gray-200 text-gray-700 border border-gray-200
    rounded py-3 px-4 leading-tight">
                        <a href="{{ url('/storage',$pendaftaran->ijazah_url) }}" target="_blank">Lihat Ijazah</a>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="uppercase text-gray-700 text-xs font-bold
    mb-2">Prodi Pilihan</div>
                    <div class="bg-gray-200 text-gray-700 border border-gray-200
    rounded py-3 px-4 leading-tight">
                        {{ $pendaftaran->prodi->fakultas->nama_fakultas.' - '
                        .$pendaftaran->prodi->nama_prodi }}</div>
                </div>
                <div class="mb-6">
                    <div class="uppercase text-gray-700 text-xs font-bold mb-2">Status</div>
                    @if($pendaftaran->status=='DAFTAR')
                    <div class="bg-gray-200 text-gray-700 border border-gray-200
    rounded py-3 px-4 leading-tight">{{ $pendaftaran->status }}
                    </div>
                    @elseif($pendaftaran->status=='DITERIMA')
                    <div class="bg-green-500 text-white border border-gray-200
    rounded py-3 px-4 leading-tight">{{ $pendaftaran->status }}
                    </div>
                    @elseif($pendaftaran->status=='DITOLAK')
                    <div class="bg-red-500 text-white border border-gray-200
    rounded py-3 px-4 leading-tight">{{ $pendaftaran->status }}
                    </div>
                    @endif
                    <div class="text-gray-700 text-xs mb-2">Tanggal pendaftaran

                        {{ Carbon\Carbon::parse($pendaftaran->tanggal_pendaftara)
                        ->format('Y-m-d') }}</div>
                </div>
            </div>
            @else
            <div class="mb-10 bg-white py-10 px-4 text-center">
                <a href="{{ url('/pendaftaran/create') }}" class="bg-green-500
    hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Lakukan pendaftaran
                </a>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>