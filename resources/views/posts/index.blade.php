@extends('layouts.master')
@section('content')
    <div class="mt-5">
        {{-- check session --}}
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <h2>List Product Toko Amandemy</h2>
            <a href="{{ route('posts.create') }}" class="btn btn-dark ms-3">Tambah Produk</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="container text-center">
                    <th>No</th>
                    {{-- <th>Gambar Produk</th> --}}
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Kondisi</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($posts as $post) { ?>
                    <tr class="container text-center">
                        <td><?= $no++ ?></td>
                        {{-- <td><img src="{{ asset($post->gambar) }}" alt="Gambar Produk" width="20%"></td> --}}
                        <td class="fw-semibold">{{ $post->nama }}</td>
                        <td>{{ $post->stok }}</td>
                        <td>{{ $post->berat }}</td>
                        <td>{{ $post->harga }}</td>
                         <td>
                            <button class="btn btn-{{ $post->kondisi == 'Baru' ? 'primary' : ($post->kondisi == 'Bekas' ? 'dark' : 'secondary') }} btn-sm" disabled>{{ $post->kondisi }}</button>
                        </td>
                        <td>{{ $post->deskripsi }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
@endsection