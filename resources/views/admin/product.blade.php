@extends('admin.adminlayout')
@section('product')
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Products
    </h2>
    <!-- CTA -->
    <div class="flex items-center p-4 mb-8 border border-purple-600 rounded-lg focus-within:border-purple-700 focus:outline-none">
      <svg
        class="w-5 h-5 mr-2 text-gray-500"
        fill="currentColor"
        viewBox="0 0 20 20">
        <path
          d="M12.9 14.32a8 8 0 111.42-1.42l4.1 4.1a1 1 0 01-1.42 1.42l-4.1-4.1zM8 14a6 6 0 100-12 6 6 0 000 12z">
        </path>
      </svg>
      <input
        class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
        type="text"
        placeholder="Search for products"
        aria-label="Search" />

    </div>

    <!-- General elements -->
    <h4
      class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th>Phone Code</th>
                <th>Phone Name</th>
                <th>Brand name</th>
                <th>Color</th>
                <th>Camera</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Storage</th>
                <th>Stock Quantity</th>
                <th>Status</th>
                <th>Product Image</th>
                <th>Description</th>

              </tr>
            </thead>
            <tbody
              class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach($products as $product)
              <tr class="text-gray-700 dark:text-gray-400">
                <td>{{ $product->phone_code }}</td>
                <td>{{ $product->phone_name }}</td>
                <td>{{ $product->brand_name }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->camera }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ number_format($product->price, 2) }} VNĐ</td>
                <td>{{ $product->storage }} GB</td>
                <td>{{ $product->stock_quantity }}</td>
                <td>{{ $product->status }}</td>
                <td>
                  @if ($product->image)
                  <img src="{{ asset('storage/' . $product->image) }}" alt="Ảnh Sản Phẩm" class="product-image">
                  @else
                  Không có ảnh
                  @endif
                </td>
                <td>{{ $product->description }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- Nút Thêm Sản Phẩm  -->
      <div style="text-align: right; margin-top: 16px;">
        <a href="addproduct" style="
        background-color: #7C3AED;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
        display: inline-block;
    "
          onmouseover="this.style.backgroundColor='#5C28B7';"
          onmouseout="this.style.backgroundColor='#7C3AED';">
          Add product
        </a>
      </div>

</main>
@endsection