@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Daftar Pengeluaran</h1>
            <a class="btn btn-primary mb-3" href="{{ route('pengeluarans.create') }}">Tambah Pengeluaran</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Tanggal Pengeluaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengeluarans as $pengeluaran)
                        <tr>
                            <td>{{ $pengeluaran->keterangan }}</td>
                            <td>{{ $pengeluaran->jumlah }}</td>
                            <td>{{ $pengeluaran->tanggal_pengeluaran }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('pengeluarans.show', $pengeluaran->id) }}">View</a>
                                <a class="btn btn-warning" href="{{ route('pengeluarans.edit', $pengeluaran->id) }}">Edit</a>
                                <form action="{{ route('pengeluarans.destroy', $pengeluaran->id) }}" method="POST" style="display:inline;">
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
