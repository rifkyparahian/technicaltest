@extends('layouts.app')

@section('title', 'Data Product')

@section('content')
    <div class="container">
        <a href="/products" class="btn btn-primary mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('products.store') }}" method="POST" enctype="mulitpart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">No</label>
                        <input type="text" class="form-control" name="number" placeholder="Nomor">
                    </div>
                    @error('number')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" name="title" placeholder="Judul">
                    </div>
                    @error('title')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    @error('image')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection