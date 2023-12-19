<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fakultas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
            <div class="mb-5" role="alert">
                <div class="bg-red-500" text-white font-bold rounded-t px-4 py-2>There's something wrong!</div>
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ url('/fakultas/create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Create Fakultas
                </a>
            </div>

            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-6 py-4">Fakultas</th>
                            <th class="border px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($fakultas as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $item->nama_fakultas }}</td>
                                <td class="border px-6 py-4 text-center">
                                    <a href="{{ url('/fakultas/edit/'.$item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ url('/fakultas/destroy/'.$item->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block" onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="border text-center p-5">
                                    Data Tidak Ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $fakultas->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
