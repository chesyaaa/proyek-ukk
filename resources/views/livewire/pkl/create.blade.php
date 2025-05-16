<div class="py-12">
    <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6">

            <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Data Industri</h2>

            <!-- Form Tambah Post -->
            <form action="{{ route('pkl.store') }}" method="POST">
                @csrf

                <!-- Nama Siswa -->
                <div class="mb-4">
                    <label for="siswa_id" class="block">Nama Siswa</label>
                    <select name="siswa_id" id="siswa_id" class="w-full px-4 py-2 border rounded-md">
                        <option value="">-- Pilih Siswa --</option>
                        @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                        @endforeach
                    </select>
                    @error('siswa_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Nama Industri -->
                <div class="mb-4">
                    <label for="industri_id" class="block">Nama Industri</label>
                    <select name="industri_id" id="industri_id" class="w-full px-4 py-2 border rounded-md">
                        <option value="">-- Pilih Industri --</option>
                        @foreach ($industris as $industri)
                            <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                        @endforeach
                    </select>
                    @error('industri_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Tanggal Mulai -->
                <div class="mb-4">
                    <label for="mulai" class="block">Tanggal Mulai PKL</label>
                    <input type="date" name="mulai" id="mulai" class="w-full px-4 py-2 border rounded-md">
                    @error('mulai') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Tanggal Selesai -->
                <div class="mb-4">
                    <label for="selesai" class="block">Tanggal Selesai PKL</label>
                    <input type="date" name="selesai" id="selesai" class="w-full px-4 py-2 border rounded-md">
                    @error('selesai') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>


                <!-- Submit Button -->
                <div class="mt-6 text-right">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" style="background-color: #3182ce !important;">Simpan</button>
                    <button type="button" onclick="window.location.href='{{ route('pkl.index') }}'" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" style="background-color: #3182ce !important;">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
