@extends('layouts.master')
@section('content')
<div class="mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Tambah Data Produk</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-dark ms-3">Create Post</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">Please check the form below for errors</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Produk</label>
                    <input type="url" class="form-control {{$errors->has('gambar') ? 'is-invalid' : ''}}" id="gambar" name="gambar">
                    {{-- check error --}}
                    @if ($errors->has('gambar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gambar') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control {{$errors->has('nama_produk') ? 'is-invalid' : ''}}" id="nama" name="nama">
                    {{-- check error --}}
                    @if ($errors->has('nama'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="berat" class="form-label">Berat</label>
                    <input type="number" class="form-control {{$errors->has('berat') ? 'is-invalid' : ''}}" id="berat" name="berat">
                    {{-- check error --}}
                    @if ($errors->has('berat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('berat') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control {{$errors->has('harga') ? 'is-invalid' : ''}}" id="harga" name="harga">
                    {{-- check error --}}
                    @if ($errors->has('harga'))
                        <div class="invalid-feedback">
                            {{ $errors->first('harga') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control {{$errors->has('stok') ? 'is-invalid' : ''}}" id="stok" name="stok">
                    {{-- check error --}}
                    @if ($errors->has('stok'))
                        <div class="invalid-feedback">
                            {{ $errors->first('stok') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi (Baru/Bekas)</label>
                    <select class="form-select {{$errors->has('kondisi') ? 'is-invalid' : ''}}" id="kondisi" name="kondisi">
                        <option value="Baru">Baru</option>
                        <option value="Bekas">Bekas</option>
                    </select>
                    {{-- check error --}}
                    @if ($errors->has('kondisi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kondisi') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control {{$errors->has('deskripsi') ? 'is-invalid' : ''}}" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    {{-- check error --}}
                    @if ($errors->has('deskripsi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('deskripsi') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-dark w-100">Submit</button>
            </form>
        </div>
    </div>

</div>
@endsection