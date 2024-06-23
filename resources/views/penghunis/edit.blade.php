@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit Penghuni</h1>
            <form action="{{ route('penghunis.update', $penghuni->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $penghuni->nama_lengkap }}" required>
                </div>
                <div class="form-group">
                    <label for="foto_ktp">Foto KTP</label>
                    <input type="file" class="form-control" id="foto_ktp" name="foto_ktp">
                    @if($penghuni->foto_ktp)
                        <img src="{{ Storage::url($penghuni->foto_ktp) }}" alt="Foto KTP" width="100">
                    @endif
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="tetap" {{ $penghuni->status == 'tetap' ? 'selected' : '' }}>Tetap</option>
                        <option value="kontrak" {{ $penghuni->status == 'kontrak' ? 'selected' : '' }}>Kontrak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $penghuni->nomor_telepon }}" required>
                </div>
                <div class="form-group">
                    <label for="sudah_menikah">Sudah Menikah</label>
                    <select class="form-control" id="sudah_menikah" name="sudah_menikah" required>
                        <option value="1" {{ $penghuni->sudah_menikah ? 'selected' : '' }}>Ya</option>
                        <option value="0" {{ !$penghuni->sudah_menikah ? 'selected' : '' }}>Tidak</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
