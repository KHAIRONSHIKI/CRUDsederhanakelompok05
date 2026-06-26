<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Data Mahasiswa</h2>

        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="nim">NIM</label>
                <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" value="{{ $mahasiswa->nama }}" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" value="{{ $mahasiswa->jurusan }}" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('mahasiswa.index') }}" class="text-gray-600 hover:text-gray-800 font-semibold text-sm">
                    ← Kembali
                </a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded shadow">
                    Perbarui Data
                </button>
            </div>
        </form>
    </div>
</body>
</html>