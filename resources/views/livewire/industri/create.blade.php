<div class="py-12">
    <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6">

            <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Data Industri</h2>

            <!-- Form Tambah Post -->
            <form action="{{ route('industri.store') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-4">
                    <label for="Nama" class="block text-gray-700">Nama</label>
                    <input type="text" id="nama" name="nama" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}" required>
                    @error('nama')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bidang usaha -->
                 <div class="mb-4">
                    <label for="Nama" class="block text-gray-700">Bidang Usaha</label>
                    <input type="text" id="bidang_usaha" name="bidang_usaha" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}" required>
                    @error('bidang_usaha')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>               

                <!-- Alamat  -->
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700">Alamat</label>
                    <textarea id="alamat" name="alamat" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" required>{{ old('description') }}</textarea>
                    @error('alamat')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kontak -->
                <div class="mb-4">
                    <label for="kontak" class="block text-gray-700">Kontak</label>
                    <input type="text" id="kontak" name="kontak" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}" required>
                    @error('kontak')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="Email" class="block text-gray-700">Email</label>
                    <input type="text" id="email" name="email" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}" required>
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Website -->
                <div class="mb-4">
                    <label for="Website" class="block text-gray-700">Website</label>
                    <input type="text" id="website" name="website" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title') }}" required>
                    @error('website')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6 text-right">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" style="background-color: #3182ce !important;">Simpan</button>
                    <button type="button" onclick="window.location.href='{{ route('industri') }}'" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" style="background-color: #3182ce !important;">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
