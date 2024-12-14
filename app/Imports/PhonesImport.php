<?php

namespace App\Imports;

use App\Models\Phone;
use App\Models\PhoneVariants;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Brand;
use App\Models\Storage;

class PhonesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        
        // Tìm hoặc tạo Brand
        $brand = Brand::firstOrCreate(['brand_name' => $row['brand']]);
        
         // Xử lý JSON variants
        $variants = json_decode($row['variants'], true);


        // Tạo Phone
        $phone = Phone::create([
            'phone_name' => $row['phone_name'],
            'screen_size' => $row['screen_size'],
            'ram' => $row['ram'],
            'operating_system' => $row['operating_system'],
            'processor' => $row['processor'],
            'battery' => $row['battery'],
            'release_date' => $row['release_date'],
            'description' => $row['description'],
            'brand_id' => $brand->id,
        ]);

        

        // Tạo PhoneVariant cho mỗi biến thể
        // dd($variants);
        
        foreach ($variants as $variantData) {
            $storage = Storage::firstOrCreate(['storage_size' => $variantData['storage']]);
            PhoneVariants::create([
                'phone_variants_name' => $variantData['variant_name'],
                'color' => $variantData['color'],
                'image' => $variantData['image'],
                'storage_id' => $storage->id,
                'regular_price' => $variantData['regular_price'],
                'sale_price' => $variantData['sale_price'],
                'stock_status' => 'instock',
                'phone_id' => $phone->id, // Liên kết với Phone
            ]);
        }
        return $phone; // Trả về model Phone vừa tạo
    }
}