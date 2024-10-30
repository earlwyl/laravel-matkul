@extends('layouts.master')
@section('title', 'Edit Product')
@section('content')
<br>
<div class="container" >
    <div class="row" >
        <div class="col-md-6" >
                <h4>Form Edit Data</h4>
                <br>
                <form action="{{ route('product.update', $product->id) }}" method="post" >
                    @csrf
                    <div class="form-group">
                        <label for="product_id">Kode Product <span class="text-danger" >*</span></label>
                        <input class="form-control" name="id" id="id" type="text" value="{{ $product->id }}">
                    </div>
                    <div class="form-group">
                        <label for="name_product">Product Name <span class="text-danger" >*</span></label>
                        <input class="form-control" name="name_product" id="name_product" type="text" value="{{ $product->name_product }}">
                    </div>

                    <div class="form-group">
                        <label for="name_product"> Category <span class="text-danger" >*</span></label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price <span class="text-danger" >*</span></label>
                        <input class="form-control" name="price" id="price" type="text" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock<span class="text-danger" >*</span></label>
                        <input class="form-control" name="stock" id="stock" type="text" value="{{ $product->stock }}">
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('product.index') }}">Kembali</a>
                    </div>
                </form>
        </div>
    </div>
</div>
@endSection
