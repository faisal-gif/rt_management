@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Tambah Penghuni</h1>
            <form action="{{ route('penghunis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                </div>
                <div class="form-group">
                    <label for="foto_ktp">Foto KTP</label>
                    <input type="file" class="form-control" id="foto_ktp" name="foto_ktp">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="tetap">Tetap</option>
                        <option value="kontrak">Kontrak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                </div>
                <div class="form-group">
                    <label for="sudah_menikah">Sudah Menikah</label>
                    <select class="form-control" id="sudah_menikah" name="sudah_menikah" required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
