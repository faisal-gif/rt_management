@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit Rumah</h1>
            <form action="{{ route('rumahs.update', $rumah->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $rumah->alamat }}" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="dihuni" {{ $rumah->status == 'dihuni' ? 'selected' : '' }}>Dihuni</option>
                        <option value="tidak_dihuni" {{ $rumah->status == 'tidak_dihuni' ? 'selected' : '' }}>Tidak Dihuni</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="penghuni_id">Penghuni</label>
                    <select class="form-control" id="penghuni_id" name="penghuni_id">
                        <option value="">-- Pilih Penghuni --</option>
                        @foreach($penghunis as $penghuni)
                            <option value="{{ $penghuni->id }}" {{ $rumah->penghuni_id == $penghuni->id ? 'selected' : '' }}>{{ $penghuni->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
