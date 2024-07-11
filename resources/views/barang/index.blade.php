@extends('layouts.app')
@section('title', 'Data Barang')
@section('content')
    <div class="table-responsive">
        <div align="right" class="mb-3">
            <a href="{{ route('barang.create') }}" class="btn btn-success"><i class="fas fa-plus-square"></i> Add</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama</th>
                    <th>Satuan</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->category->name }}</td>
                        <td>{{ $d->nama_barang }}</td>
                        <td>{{ $d->satuan }}</td>
                        <td>{{ $d->qty }}</td>
                        <td>Rp {{ number_format($d->harga) }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $d->id) }}" class="btn btn-xs bg-primary">
                                <i class="fas fa-edit"> Edit</i>
                            </a>
                            <form action="{{ route('barang.destroy', $d->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-xs btn-danger show_confirm" type="submit">
                                    <i class="fas fa-trash"> Delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
