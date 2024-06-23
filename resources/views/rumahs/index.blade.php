@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Daftar Rumah</h1>
            <a class="btn btn-primary mb-3" href="{{ route('rumahs.create') }}">Tambah Rumah</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Penghuni</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rumahs as $rumah)
                        <tr>
                            <td>{{ $rumah->alamat }}</td>
                            <td>{{ $rumah->status }}</td>
                            <td>{{ $rumah->penghuni ? $rumah->penghuni->nama_lengkap : 'Kosong' }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('rumahs.show', $rumah->id) }}">View</a>
                                <a class="btn btn-warning" href="{{ route('rumahs.edit', $rumah->id) }}">Edit</a>
                                <form action="{{ route('rumahs.destroy', $rumah->id) }}" method="POST" style="display:inline;">
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
