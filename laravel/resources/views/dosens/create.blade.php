@extends('layouts.app')

@section('title', isset($dosen) ? 'Edit Dosen' : 'Tambah Dosen')

@section('content')
<div class="card">
    <div class="card-body">
        <h1>{{ isset($dosen) ? 'Edit Dosen' : 'Tambah Dosen' }}</h1>
        <form action="{{ isset($dosen) ? route('dosens.update', $dosen->id) : route('dosens.store') }}" method="POST">
            @csrf
            @if(isset($dosen))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="kode_dosen" class="form-label">Kode Dosen</label>
                <input type="text" name="kode_dosen" class="form-control" value="{{ old('kode_dosen', $dosen->kode_dosen ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama</label>
                <input type="text" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', $dosen->nama_dosen ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ old('nip', $dosen->nip ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $dosen->email ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No. Telepon</label>
                <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon', $dosen->no_telepon ?? '') }}">
            </div>
            <button type="submit" class="btn btn-success">
                {{ isset($dosen) ? 'Perbarui' : 'Tambah' }}
            </button>
        </form>
    </div>
</div>
@endsection
