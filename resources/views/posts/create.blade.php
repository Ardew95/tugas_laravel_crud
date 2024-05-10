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
                    <input type="file" class="form-control {{$errors->has('gambar') ? 'is-invalid' : ''}}" id="gambar" name="gambar" accept="image/jpeg, image/png">
                    {{-- Periksa kesalahan --}}
                    @if ($errors->has('gambar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gambar') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}" id="nama" name="nama" value="{{ old('nama') }}">
                    {{-- check error --}}
                    @if ($errors->has('nama'))
                        <div class="invalid-feedback">
                            Kolom nama produk wajib diisi
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="berat" class="form-label">Berat</label>
                    <input type="number" class="form-control
                    {{$errors->has('berat') ? 'is-invalid' : ''}}" id="berat" name="berat" value="{{ old('berat') }}">
                    {{-- check error --}}
                    @if ($errors->has('berat'))
                        <div class="invalid-feedback">
                            Kolom berat wajib diisi
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control
                    {{$errors->has('harga') ? 'is-invalid' : ''}}" id="harga" name="harga" value="{{ old('harga') }}">
                    {{-- check error --}}
                    @if ($errors->has('harga'))
                        <div class="invalid-feedback">
                            Kolom harga wajib diisi
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control
                    {{$errors->has('stok') ? 'is-invalid' : ''}}" id="stok" name="stok" value="{{ old('stok') }}">
                    {{-- check error --}}
                    @if ($errors->has('stok'))
                        <div class="invalid-feedback">
                            Kolom stok wajib diisi
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="kondisi" class="form-label">--Kondisi--</label>
                    <select class="form-select {{$errors->has('kondisi') ? 'is-invalid' : ''}}" id="kondisi" name="kondisi">
                        <option value="Baru" {{ old('kondisi') == 'Baru' ? 'selected' : '' }}>Baru</option>
                        <option value="Bekas" {{ old('kondisi') == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                    </select>
                    {{-- check error --}}
                    @if ($errors->has('kondisi'))
                        <div class="invalid-feedback">
                            Kolom kondisi wajib diisi
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control
                    {{$errors->has('deskripsi') ? 'is-invalid' : ''}}" id="deskripsi" name="deskripsi" rows="3" maxlength="2000">{{ old('deskripsi') }}</textarea>
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