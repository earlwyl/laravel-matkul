@extends('layouts.master')

@section('title', 'Category')

@section('content')
<br>
<div class="container" >
    <div class="row">
        <div class="cold-md-6" >
            <h2>Edit Kategori</h2>
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="category_id">Kode Kategori <span class="text-danger" >*</span></label>
                    <input class="form-control" name="id" id="id" type="text" value="{{ $category->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="name_category">Nama Kategori <span class="text-danger" >*</span></label>
                    <input class="form-control" name="category_name" id="category_name" type="text" value="{{ $category->category_name }}" >
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('category.index') }}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection