@extends('layouts.app') {{-- Sesuaikan dengan layout utama kamu --}}

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-8 shadow rounded">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Import Data Kegiatan</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="mb-4 p-4 text-green-800 bg-green-100 rounded border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validasi error --}}
    @if($errors->any())
        <div class="mb-4 p-4 text-red-800 bg-red-100 rounded border border-red-300">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kegiatans.import') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700 mb-1">Pilih File Excel</label>
            <input type="file" name="file" id="file"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-300"
                required>
            <small class="text-gray-500 text-sm">Format file: .xlsx atau .xls</small>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Import
            </button>
        </div>
    </form>

    <div class="mt-6 text-sm text-gray-600">
        <p><strong>Format Excel yang diterima:</strong></p>
        <ul class="list-disc pl-5 mt-1">
            <li>nama_kegiatan</li>
            <li>menu</li>
            <li>alias</li>
            <li>jml_petugas</li>
            <li>jml_hari</li>
            <li>keterangan</li>
        </ul>
        <p class="mt-2">Pastikan baris pertama berisi heading sesuai format di atas.</p>
    </div>
</div>
@endsection
