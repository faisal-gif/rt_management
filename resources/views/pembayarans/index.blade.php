@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Daftar Pembayaran</h1>
            <a class="btn btn-primary mb-3" href="{{ route('pembayarans.create') }}">Tambah Pembayaran</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Penghuni</th>
                        <th>Jenis Iuran</th>
                        <th>Jumlah</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayarans as $pembayaran)
                        <tr>
                            <td>{{ $pembayaran->penghuni->nama_lengkap }}</td>
                            <td>{{ $pembayaran->jenis_iuran }}</td>
                            <td>{{ $pembayaran->jumlah }}</td>
                            <td>{{ $pembayaran->tanggal_pembayaran }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('pembayarans.show', $pembayaran->id) }}">View</a>
                                <a class="btn btn-warning" href="{{ route('pembayarans.edit', $pembayaran->id) }}">Edit</a>
                                <form action="{{ route('pembayarans.destroy', $pembayaran->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
