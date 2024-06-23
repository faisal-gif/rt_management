@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit Pembayaran</h1>
            <form action="{{ route('pembayarans.update', $pembayaran->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="penghuni_id">Penghuni</label>
                    <select class="form-control" id="penghuni_id" name="penghuni_id" required>
                        @foreach($penghunis as $penghuni)
                            <option value="{{ $penghuni->id }}" {{ $pembayaran->penghuni_id == $penghuni->id ? 'selected' : '' }}>{{ $penghuni->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_iuran">Jenis Iuran</label>
                    <select class="form-control" id="jenis_iuran" name="jenis_iuran" required>
                        <option value="kebersihan" {{ $pembayaran->jenis_iuran == 'kebersihan' ? 'selected' : '' }}>Kebersihan</option>
                        <option value="satpam" {{ $pembayaran->jenis_iuran == 'satpam' ? 'selected' : '' }}>Satpam</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pembayaran->jumlah }}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                    <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" value="{{ $pembayaran->tanggal_pembayaran }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
