<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Category',
            'Price',
            'Stock',
            'Created_at',
            'Updated_at',
        ];
    }

    public function row(): array
    {
        return [
            Product::all()->id,
            Product::all()->name_product,
            Product::all()->category_id->category_name,
            Product::all()->price,
            Product::all()->stock,
            Product::all()->created_at,
            Product::all()->updated_at,
        ];
    }
}
