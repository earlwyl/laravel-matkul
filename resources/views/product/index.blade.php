@extends('layouts.master')
@section('title', 'Product')
@section('content')
<br>
<div class="container" >
    <h2>Product Table</h2>
    <a href="{{ route('product.create') }}" class="btn btn-success">+ Tambah Data</a>
    <a href="{{ route('product.excel') }}" class="btn btn-success" > Excel </a>
    <a href="{{ route('product.pdf') }}" class="btn btn-success pull-right" target="_blank" > PDF </a>
    <a href="{{ route('product.chart') }}" class="btn btn-success pull-right" > Chart </a>
    <table class="table table-bordered table-striped" id="tabel-produk" >
        <thead>
            <tr>
                <th style="width:1%" >No.</th>
                <th style="width:5%" >Product Id</th>
                <th style="width:5%" >Product Name</th>
                <th style="width:5%" >Category</th>
                <th style="width:5%" >Price</th>
                <th style="width:5%" >Stock</th>
                <th style="width:5%" >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
         <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name_product }}
            <td>{{ $product->category->category_name }}</td>
            </td>
            <td>{{ number_format($product->price, 0,',', '.') }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <form action="{{ route('product.delete', $product->id) }}" method="post">
                    @csrf
                    <a  href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <button class="btn btn-danger" >Delete</button>
                </form>

            </td>
         </tr>
         @endforeach
        </tbody>
    </table>
</div>
@endsection