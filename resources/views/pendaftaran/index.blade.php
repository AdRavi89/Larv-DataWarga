<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pendaftaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="mb-10 flex" method="get">
                <input value="{{ $tanggal_awal }}" name="tanggal_awal" 
                    class="appearance-none block bg-gray-200 flatpickr
                        text-gray-700 border border-gray-200 rounded py-3 
                        px-4 mx-2 leading-tight focus:outline-none focus:bg-white 
                        focus:border-gray-500" id="tanggal_awal" 
                        type="text" placeholder="Tanggal Awal">
                <input value="{{ $tanggal_akhir }}" name="tanggal_akhir" 
                    class="appearance-none block bg-gray-200 flatpickr
                        text-gray-700 border border-gray-200 rounded py-3 
                        px-4 mx-2 leading-tight focus:outline-none focus:bg-white 
                        focus:border-gray-500" id="tanggal_akhir" 
                        type="text" placeholder="Tanggal Akhir">
                <select name="status" class="appearance-none bg-blue-500 text-white 
                    border border-gray-200 rounded py-3 px-4 mx-2 leading-tight 
                    focus:outline-none focus:bg-blue-500 focus:border-gray-500" 
                    id="grid-last-name">
                    <option @if($status=='SEMUA') SELECTED @endif 
                        value="SEMUA">SEMUA</option>
                    <option @if($status=='DAFTAR') SELECTED @endif 
                        value="DAFTAR">DAFTAR</option>
                    <option @if($status=='DITERIMA') SELECTED @endif 
                        value="DITERIMA">DITERIMA</option> 
                                            <option @if($status=='TIDAK DITERIMA') SELECTED @endif 
                        value="TIDAK DITERIMA">TIDAK DITERIMA</option>
                </select>
                <input name="q" value="{{ $q }}" class="appearance-none block 
                    bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 
                    px-4 leading-tight focus:outline-none focus:bg-white 
                    focus:border-gray-500" id="grid-last-name" type="text" 
                    placeholder="Kunci Pencarian">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold 
                    py-2 px-4 mx-2 rounded">
                    Cari
                </button>
            </form>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">ID</th>
                        <th class="border px-6 py-4">Nama</th>
                        <th class="border px-6 py-4">Pendaftaran</th>
                        <th class="border px-6 py-4">Data Diri</th>
                        <th class="border px-6 py-4">Status</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftaran as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $item->id }}</td>
                                <td class="border px-6 py-4 ">
                                    {{ $item->nama_lengkap }}
                                </td>
                                <td class="border px-6 py-4 ">
                                    {{ $item->prodi->fakultas->nama_fakultas
                                        .'-'.$item->prodi->nama_prodi }}<br/>
                                    Pada 
                                    {{ \Carbon\Carbon::parse(
                                        $item->tanggal_pendaftaran)
                                        ->format('Y-m-d') }}</td>
                                </td>
                                <td class="border px-6 py-4 ">
                                    {{ $item->alamat }}<br/>
                                    {{ $item->kota }}<br/>
                                    {{ $item->asal_sekolah }}
                                </td>
                                <td class="border px-6 py-4 text-center">
                                    {{ $item->status }}</td>
                                <td class="border px-6 py- text-center"> 
                                                                        @if($item->status=='DAFTAR')
                                    <form action="{{ url('/pendaftaran/terima', 
                                        $item->id) }}" method="POST" 
                                        class="inline-block">
                                        @csrf
                                        <button type="submit" class="inline-block 
                                        bg-blue-500 hover:bg-blue-700 text-white 
                                        font-bold py-2 px-4 mx-2 rounded"
                                        onclick="return 
                                        confirm('Yakin akan TERIMA camaba? Proses ini
tidak bisa dibatalkan.')">
                                            TERIMA
                                        </button>
                                    </form>
                                    <form action="{{ url('/pendaftaran/tolak', 
                                        $item->id) }}" method="POST" 
                                        class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-red-500 
                                        hover:bg-red-700 text-white font-bold py-2 
                                        px-4 mx-2 rounded inline-block"
                                        onclick="return confirm('Yakin akan TOLAK
camaba? Proses ini tidak bisa dibatalkan.')">
                                            TOLAK
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="6" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $pendaftaran->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 
<script>
(function() {
    flatpickr('.flatpickr', {});
})();
</script>
 