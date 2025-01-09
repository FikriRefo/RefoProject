@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Create Karyawan</h1>

    <form action="{{ route('master-karyawan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode_nik" class="form-label">Kode NIK</label>
            <input type="text" name="kode_nik" id="kode_nik" class="form-control @error('kode_nik') is-invalid @enderror" value="{{ old('kode_nik') }}" required>
            @error('kode_nik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" required>
            @error('nama_lengkap')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan') }}" required>
            @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
            <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control @error('gaji_pokok') is-invalid @enderror" value="{{ old('gaji_pokok') }}" required>
            @error('gaji_pokok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="insentif" class="form-label">Insentif</label>
            <input type="number" name="insentif" id="insentif" class="form-control @error('insentif') is-invalid @enderror" value="{{ old('insentif') }}" required>
            @error('insentif')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('master-karyawan.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
