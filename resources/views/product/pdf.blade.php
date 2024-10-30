<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak PDF</title>
</head>
<body>
    <style>
        .table {
            font-family: sans-serif,
            color: #232323;
            border-collapse: collapse;
        }

        .table, th, td {
            border: 1px solid #999;
            padding: 8px 20px;
        }
    </style>
    <h4 align="center" >Laporan Data Product</h4>
    <table class="table table-bordered table-striped table-bordered" >
        <thead>
            <tr>
                <th style="width:5%" >No.</th>
                <th style="width:7%" >Product Id</th>
                <th style="width:12%" >Product Name</th>
                <th style="width:12%" >Category</th>
                <th style="width:12%" >Price</th>
                <th style="width:8%" >Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
         <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name_product }}</td>
            <td>{{ $product->category->category_name }}</td>
            <td>{{ number_format($product->price, 0,',', '.') }}</td>
            <td>{{ $product->stock }}</td>
         </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/javascript" >
    window.print();
    </script>
</body>
</html>