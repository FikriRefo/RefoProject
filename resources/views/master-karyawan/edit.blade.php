@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Edit Karyawan</h1>

    <form action="{{ route('master-karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="kode_nik" class="form-label">Kode NIK</label>
            <input type="text" name="kode_nik" id="kode_nik" class="form-control @error('kode_nik') is-invalid @enderror" value="{{ old('kode_nik', $karyawan->kode_nik) }}" required>
            @error('kode_nik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap', $karyawan->nama_lengkap) }}" required>
            @error('nama_lengkap')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan', $karyawan->jabatan) }}" required>
            @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
            <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control @error('gaji_pokok') is-invalid @enderror" value="{{ old('gaji_pokok', $karyawan->gaji_pokok) }}" required>
            @error('gaji_pokok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="insentif" class="form-label">Insentif</label>
            <input type="number" name="insentif" id="insentif" class="form-control @error('insentif') is-invalid @enderror" value="{{ old('insentif', $karyawan->insentif) }}" required>
            @error('insentif')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('master-karyawan.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
