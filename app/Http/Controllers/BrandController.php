<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Hiển thị danh sách các brand
    public function index()
    {
        $brands = Brand::paginate(10); // Paginate for 10 brands per page
        return view('admin.brands.index', compact('brands'));
    }

    // Tạo mới một brand
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        Brand::create($request->all());

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    // Cập nhật thông tin của một brand
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update($request->all());

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    // Xóa một brand
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
