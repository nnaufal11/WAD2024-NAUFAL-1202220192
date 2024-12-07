@extends('layouts.app')

@section('title', isset($mahasiswa) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>{{ isset($mahasiswa) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa' }}</h1>
        <form action="{{ isset($mahasiswa) ? route('mahasiswas.update', $mahasiswa->id) : route('mahasiswas.store') }}" method="POST">
            @csrf
            @if(isset($mahasiswa))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input
                    type="text"
                    name="nim"
                    class="form-control @error('nim') is-invalid @enderror"
                    value="{{ old('nim', $mahasiswa->nim ?? '') }}"
                    required>
                @error('nim')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                <input
                    type="text"
                    name="nama_mahasiswa"
                    class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                    value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa ?? '') }}"
                    required>
                @error('nama_mahasiswa')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $mahasiswa->email ?? '') }}"
                    required>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input
                    type="text"
                    name="jurusan"
                    class="form-control @error('jurusan') is-invalid @enderror"
                    value="{{ old('jurusan', $mahasiswa->jurusan ?? '') }}"
                    required>
                @error('jurusan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="dosen_id" class="form-label">Dosen Wali</label>
                <select
                    name="dosen_id"
                    class="form-select @error('dosen_id') is-invalid @enderror"
                    required>
                    <option value="">Pilih Dosen Wali</option>
                    @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->id }}"
                        {{ old('dosen_id', $mahasiswa->dosen_id ?? '') == $dosen->id ? 'selected' : '' }}>
                        {{ $dosen->nama_dosen }}
                    </option>
                    @endforeach
                </select>
                @error('dosen_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">
                {{ isset($mahasiswa) ? 'Perbarui' : 'Tambah' }}
            </button>
        </form>
    </div>
</div>
@endsection
