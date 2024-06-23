@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Tambah Pengeluaran</h1>
            <form action="{{ route('pengeluarans.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                    <input type="date" class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
