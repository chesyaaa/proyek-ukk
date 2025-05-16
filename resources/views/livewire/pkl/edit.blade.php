<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6">

            <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Data PKL</h2>

            @if (session()->has('message'))
                <div class="p-4 mb-4 text-green-700 bg-green-200 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="updatePkl">
                <!-- Siswa -->
                <div class="mb-4">
                    <label for="siswa_id" class="block text-gray-700">Nama Siswa</label>
                    <select id="siswa_id" wire:model="siswa_id" class="w-full px-4 py-2 border rounded-md">
                        <option value="">-- Pilih Siswa --</option>
                        @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                        @endforeach
                    </select>
                    @error('siswa_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Industri -->
                <div class="mb-4">
                    <label for="industri_id" class="block text-gray-700">Nama Industri</label>
                    <select id="industri_id" wire:model="industri_id" class="w-full px-4 py-2 border rounded-md">
                        <option value="">-- Pilih Industri --</option>
                        @foreach ($industris as $industri)
                            <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                        @endforeach
                    </select>
                    @error('industri_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Guru Pembimbing (readonly / tidak bisa diedit) -->
                <div class="mb-4">
                    <label class="block text-gray-700">Guru Pembimbing</label>
                    <input type="text" class="w-full px-4 py-2 border rounded-md bg-gray-100" value="{{ optional($guru)->nama }}" disabled>
                </div>

                <!-- Tanggal Mulai -->
                <div class="mb-4">
                    <label for="mulai" class="block text-gray-700">Tanggal Mulai</label>
                    <input type="date" id="mulai" wire:model="mulai" class="w-full px-4 py-2 border rounded-md">
                    @error('mulai') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Tanggal Selesai -->
                <div class="mb-4">
                    <label for="selesai" class="block text-gray-700">Tanggal Selesai</label>
                    <input type="date" id="selesai" wire:model="selesai" class="w-full px-4 py-2 border rounded-md">
                    @error('selesai') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-6 text-right">
                    <button type="submit" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Simpan</button>
                    <button type="button" onclick="window.location.href='{{ route('pkl.index') }}'" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
