<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Phone;
use App\Models\PhoneVariants;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Storage;
use App\Imports\PhonesImport;
use Maatwebsite\Excel\Facades\Excel;
class AdminController extends Controller
{
    //
    public function index() {
        return view('admin.index');
    }

    public function brands() {
        $brands = Brand::orderBy('id','desc')->paginate(10);
        return view('admin.brands', compact('brands'));
    }

    public function add_brand() {
        return view('admin.add-brand');
    }

    public function brand_store(Request $request) {
        $request->validate([
            'brand_name'=> 'required|unique:brands,brand_name',
        ]);

        Brand::create([
        'brand_name' => $request->brand_name,
    ]);
    return redirect()->route('admin.brands')->with('success', 'Brand added successfully!');
    }

    public function edit_brand($id) {
        $brand = Brand::find($id);
        return view('admin.edit-brand', compact('brand'));
    }

    public function brand_update(Request $request) {
        $request->validate([
            'brand_name'=> 'required|unique:brands,brand_name',
        ]);
        $brand = Brand::find($request->id);
        $brand->update([
            'brand_name'=> $request->brand_name,
        ]);
        return redirect()->route('admin.brands')->with('success', 'Brand updated successfully!');
    }

    public function delete_brand($id) {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('admin.brands')->with('success','Brand deleted successfully!');
    }

    public function phones() {
        $phones = Phone::orderBy('id','asc')->paginate(10);
        return view('admin.phones', compact('phones'));
    }

    public function add_phone() {
        $brands = Brand::select('id', 'brand_name')->orderBy('id')->get();
        $storages = Storage::select('id', 'storage_size')->orderBy('id')->get();
        return view('admin.add-phone', compact('brands','storages'));
    }

    public function phone_store(Request $request) {
        $request->validate([
            'phone_name' => 'required',
            'screen_size' => 'required',
            'ram' => 'required',
            'operating_system' => 'required',
            'processor' => 'required',
            'battery' => 'required',
            'release_date' => 'required',
            'description' => 'required',
            'brand_id' => 'required',
            'phone_variants_name'=> 'required',
            'colors'=> 'required',
            'quantity'=> 'required',
            'regular_price'=> 'required',
            'sale_price'=> 'required',
            'color'=> 'required',
            'storage' => 'required|array|min:1',
            'storages' => 'required|array|min:1',
            'stock_status'=> 'required',
            'featured'=> 'required',
        ]);

        $phone = new Phone();
        $phone->phone_name = $request->phone_name;
        $phone->screen_size = $request->screen_size;
        $phone->ram = $request->ram;
        $phone->operating_system = $request->operating_system;
        $phone->processor = $request->processor;
        $phone->battery = $request->battery;
        $phone->release_date = $request->release_date;
        $phone->description = $request->description;
        $phone->brand_id = $request->brand_id;
        $phone->save();
        // Lấy dữ liệu từ request
        $phoneVariantsName = $request->input('phone_variants_name');
        $phoneVariantsColors = $request->input('colors');
        $phoneVariantsStorages = $request->input('storages');
        $quantities = $request->input('quantity');
        $regularPrices = $request->input('regular_price');
        $salePrices = $request->input('sale_price');
        $stockStatuses = $request->input('stock_status');
        $featuredStatuses = $request->input('featured');
        $images = $request->file('image'); // Lấy file ảnh nếu có
        
        
        // Duyệt qua từng biến thể
        $counter = 1;
        foreach ($phoneVariantsName as $index => $variantName) {
            // Lưu biến thể vào cơ sở dữ liệu
            $phoneVariant = new PhoneVariants();
            $phoneVariant->phone_id = $phone->id;
            $phoneVariant->phone_variants_name = $variantName;
            $phoneVariant->color = $phoneVariantsColors[$index];
            $phoneVariant->storage_id = $phoneVariantsStorages[$index];
            $phoneVariant->quantity = $quantities[$index];
            $phoneVariant->regular_price = $regularPrices[$index];
            $phoneVariant->sale_price = $salePrices[$index];
            $phoneVariant->stock_status = $stockStatuses[$index];
            $phoneVariant->featured = $featuredStatuses[$index];
            
            if (isset($images[$index]) && $images[$index]->isValid()) {
                $imageName = time() . '_' . $counter . '_' . $images[$index]->getClientOriginalName();

                $destinationPath = public_path('uploads/phones/thumbnails');

                $images[$index]->move($destinationPath, $imageName);

                $phoneVariant->image = $imageName;
            }
            $phoneVariant->save();
            $counter++;
    }
    return redirect()->route('admin.phones')->with('success','Phone has been added successfully !');
}
    public function edit_phone($id) {
        $phone = Phone::find($id);
        $brands = Brand::select('id', 'brand_name')->orderBy('id')->get();
        $storages = Storage::select('id', 'storage_size')->orderBy('id')->get();
        return view('admin.edit-phone', compact('phone','brands','storages'));
    }

    public function phone_update(Request $request) {
        // dd($request->all());
        // dd($request->all());
        $request->validate([
            'phone_name' => 'required',
            'screen_size' => 'required',
            'ram' => 'required',
            'operating_system' => 'required',
            'processor' => 'required',
            'battery' => 'required',
            'release_date' => 'required',
            'description' => 'required',
            'brand_id' => 'required',
            'phone_variants_name'=> 'required',
            'colors'=> 'required',
            'quantity'=> 'required',
            'regular_price'=> 'required',
            'sale_price'=> 'required',
            'storages' => 'required|array|min:1',
            'stock_status'=> 'required',
            'featured'=> 'required',
        ]);

        $phone = Phone::find($request->phone_id);
        $phone->phone_name = $request->phone_name;
        $phone->screen_size = $request->screen_size;
        $phone->ram = $request->ram;
        $phone->operating_system = $request->operating_system;
        $phone->processor = $request->processor;
        $phone->battery = $request->battery;
        $phone->release_date = $request->release_date;
        $phone->description = $request->description;
        $phone->brand_id = $request->brand_id;
        $phone->save();
        
        $phoneVariantsIds = $request->input('phone_variants_id');
        $phoneVariantsName = $request->input('phone_variants_name');
        $phoneVariantsColors = $request->input('colors');
        $phoneVariantsStorages = $request->input('storages');
        $quantities = $request->input('quantity');
        $regularPrices = $request->input('regular_price');
        $salePrices = $request->input('sale_price');
        $stockStatuses = $request->input('stock_status');
        $featuredStatuses = $request->input('featured');
        $images = $request->file('image'); 
 
        
        
        // Duyệt qua từng biến thể
        $counter = 1;
        foreach ($phoneVariantsName as $index => $variantName) {
            
            // Lưu biến thể vào cơ sở dữ liệu
            if (strpos($phoneVariantsIds[$index], 'new-') === 0) {
                $phoneVariant = new PhoneVariants();
            } else {
                $phoneVariant = PhoneVariants::find($phoneVariantsIds[$index]); // Tìm theo ID
            }
            
            
            $phoneVariant->phone_id = $phone->id;
            $phoneVariant->phone_variants_name = $variantName;
            $phoneVariant->color = $phoneVariantsColors[$index];
            $phoneVariant->storage_id = $phoneVariantsStorages[$index];
            $phoneVariant->quantity = $quantities[$index];
            $phoneVariant->regular_price = $regularPrices[$index];
            $phoneVariant->sale_price = $salePrices[$index];
            $phoneVariant->stock_status = $stockStatuses[$index];
            $phoneVariant->featured = $featuredStatuses[$index];
            
            
            if (isset($images[$index]) && $images[$index]->isValid()) {
                //Xóa file cũ
                if(File::exists(public_path('uploads/phones/thumbnails'))) {
                File::delete(public_path('uploads/phones/thumbnails').'/'.$phoneVariant->image);
                }
                // Đặt tên file mới
                $imageName = time() . '_' . $counter . '_' . $images[$index]->getClientOriginalName();

                // Đường dẫn lưu file
                $destinationPath = public_path('uploads/phones/thumbnails');

                // Di chuyển file tới thư mục đích
                $images[$index]->move($destinationPath, $imageName);

                // Lưu đường dẫn vào cơ sở dữ liệu
                $phoneVariant->image = $imageName;
            }
            $phoneVariant->save();
            $counter++;
        
    }
    return redirect()->route('admin.phones')->with('success','Phone has been updated successfully !');
}
    public function delete_phone($id) {
        $phone = Phone::find($id);

        foreach ($phone->phoneVariants as $variant) {
            if(File::exists(public_path('uploads/phones/thumbnails'))) {
                File::delete(public_path('uploads/phones/thumbnails').'/'.$variant->image);
            }
        }

        $phone->delete();
        return redirect()->route('admin.phones')->with('success','Phone deleted successfully!');
    }

    public function delete_phone_variant($id) {
        $phoneVariant = PhoneVariants::find($id);

        if(File::exists(public_path('uploads/phones/thumbnails'))) {
            File::delete(public_path('uploads/phones/thumbnails').'/'.$phoneVariant->image);
        }
    
        $phoneVariant->delete();
        return redirect()->route('admin.phones')->with('success','Phone Variant deleted successfully!');
    }

    public function importExcel(Request $request)
    {
        Excel::import(new PhonesImport, $request->file('excel_file'));

        return redirect()->route('admin.phones')->with('success', 'Import thành công!');
    }

    public function orders(Request $request) {
       
    // Lấy tất cả các input từ form
    $searchKeyword = $request->input('search_keyword');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    // Truy vấn cơ bản
    $query = Order::query();

    // Lọc theo từ khóa (Order ID hoặc tên khách hàng)
    if ($searchKeyword) {
        $query->where(function ($q) use ($searchKeyword) {
            $q->where('order_id', 'like', "%$searchKeyword%")
              ->orWhereHas('user', function ($userQuery) use ($searchKeyword) {
                  $userQuery->where('fullname', 'like', "%$searchKeyword%");
              });
        });
    }

    // Lọc theo khoảng thời gian
    if ($startDate) {
        
        $query->whereDate('created_at', '>=', $startDate);
    }

    if ($endDate) {
        
        $query->whereDate('created_at', '<=', $endDate);
    }

    // Lọc theo giá trị thành tiền
    if ($minPrice) {
        $query->where('total_price', '>=', $minPrice);
    }
    if ($maxPrice) {
        $query->where('total_price', '<=', $maxPrice);
    }

    // Sắp xếp và phân trang
    $orders = $query->orderBy('created_at', 'desc')->paginate(12);

    // Trả về view với dữ liệu
    return view('admin.orders', compact('orders'));
}

    public function order_details($order_id) {
        $order = Order::find($order_id);
        $orderDetails = OrderDetails::where('order_id', $order_id)->orderBy('id','desc')->paginate(12);
        return view('admin.order-details', compact('order','orderDetails'));
    } 

    public function update_order_status(Request $request) {
        $order = Order::find($request->order_id);
        $order->status = $request->order_status;
        
        if ($order->status == 'Delivered') {
            $order->delivery_date = Carbon::Now();
        }
        
        $order->save();
        return back()->with('success','Status changed successfully');
    }
}