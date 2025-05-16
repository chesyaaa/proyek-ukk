<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            
            <!-- Search & Tambah Post -->
            <div class="flex justify-between items-center mb-4">
                <div class="flex justify-start w-full">
                    <!-- <form action="{{ route('industri') }}" method="GET" class="inline-flex items-center w-1/3"> -->
                    <div class="inline-flex items-center w-1/3">
                        <input wire:model.live="search" type="search" id="search" class="block w-full p-3 text-sm text-gray-900 border rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                        <button type="submit" class="ml-1 px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M16.5 10a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        </button>
                    <!-- </form> -->
                    </div>
                </div>     
                     
                <a href="{{ route('pkl.create') }}" class="flex items-center gap-2 px-6 py-1 bg-blue-600 text-black rounded-md hover:bg-blue-700">
                    <span class="text-xl">+</span>
                    <span>Tambah</span>
                </a>

            </div>

            <!-- Tabel Post -->
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600 border-collapse">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 w-1/4 text-center">Nama Siswa</th>
                            <th class="px-6 py-3 w-1/4 text-center">Industri</th>
                            <th class="px-6 py-3 w-1/4 text-center">Guru pembimbing</th>
                            <th class="px-6 py-3 w-1/4 text-center">Mulai</th>  
                            <th class="px-6 py-3 w-1/4 text-center">Selesai</th>     
                            <th class="px-6 py-3 w-1/4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pkls as $pkl)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $pkl->siswa->nama }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $pkl->industri->nama }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ optional($pkl->guru)->nama ?? 'Belum ditentukan' }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $pkl->mulai }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $pkl->selesai }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('pkl.edit', $pkl) }}" class="text-blue-600 hover:underline">Edit</a> |
                                <form action="{{ route('pkl.destroy', $pkl->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                     <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">Tidak ada data ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $pkls->links() }}
            </div>
        </div>
    </div>
</div>
