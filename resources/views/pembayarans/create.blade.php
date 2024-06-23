@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Tambah Pembayaran</h1>
            <form action="{{ route('pembayarans.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="penghuni_id">Penghuni</label>
                    <select class="form-control" id="penghuni_id" name="penghuni_id" required>
                        <option value="">-- Pilih Penghuni --</option>
                        @foreach($penghunis as $penghuni)
                            <option value="{{ $penghuni->id }}">{{ $penghuni->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_iuran">Jenis Iuran</label>
                    <select class="form-control" id="jenis_iuran" name="jenis_iuran" required>
                        <option value="kebersihan">Kebersihan</option>
                        <option value="satpam">Satpam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                    <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
