@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Daftar Penghuni</h1>
            <a class="btn btn-primary mb-3" href="{{ route('penghunis.create') }}">Tambah Penghuni</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Status</th>
                        <th>Nomor Telepon</th>
                        <th>Sudah Menikah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penghunis as $penghuni)
                        <tr>
                            <td>{{ $penghuni->nama_lengkap }}</td>
                            <td>{{ $penghuni->status }}</td>
                            <td>{{ $penghuni->nomor_telepon }}</td>
                            <td>{{ $penghuni->sudah_menikah ? 'Ya' : 'Tidak' }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('penghunis.show', $penghuni->id) }}">View</a>
                                <a class="btn btn-warning" href="{{ route('penghunis.edit', $penghuni->id) }}">Edit</a>
                                <form action="{{ route('penghunis.destroy', $penghuni->id) }}" method="POST" style="display:inline;">
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
