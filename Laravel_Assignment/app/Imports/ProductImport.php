<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
     * @param array
     *
     * @return
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $category = Category::where('cat_name', $row['category'])->first();
            $data = [
                'cat_id' => $category->id,
                'prod_name' => $row['product_name'],
                'price' => $row['price'],
                'description' => $row['description'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
            ];
            Product::create($data);
        }
    }
    public function rules(): array
    {
        return [
            'product_name' => 'required|min:5|unique:products,prod_name,',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ];
    }
}
