@extends('layouts.master')

@section('title', 'Category')

@section('content')
<br>
<div class="container" >
    <h2>Table Kategori</h2>
    <a href="{{ route('category.create') }}" class="btn btn-success">+ Tambah Data</a>
    <table class="table table-bordered table-striped" id="tabel-produk" >
        <thead>
            <tr>
                <th style="width:1%" >No.</th>
                <th style="width:5%" >Kode Kategori</th>
                <th style="width:5%" >Nama Kategori</th>
                <th style="width:5%" >Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
         <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->id }}</td>
            <td>{{ $category->category_name }}</td>
            <td>
                <form action="{{ route('category.delete', $category->id) }}" method="post">
                    @csrf
                    <a  href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>    
</div>
@endsection