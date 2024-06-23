@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit Pengeluaran</h1>
            <form action="{{ route('pengeluarans.update', $pengeluaran->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pengeluaran->keterangan }}" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pengeluaran->jumlah }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                    <input type="date" class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran" value="{{ $pengeluaran->tanggal_pengeluaran }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
