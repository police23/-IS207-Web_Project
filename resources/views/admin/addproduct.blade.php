@extends('admin.adminlayout')
@section('add-product')

<style>
    /* Center and style the form */
    .main-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f5f5f5;
    }

    .add-product-container {
        width: 100%;
        max-width: 1000px; /* Adjusted width to match the design */
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .add-product-container h3 {
        color: #333;
        text-align: center;
        font-size: 1.5em;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 0px;
    }

    .form-group label {
        display: block;
        margin-bottom: 0px;
        font-weight: bold;
        font-size: 0.9em;
        color: #333;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1em;
        background-color: #f0f0f0;
    }

    .form-group textarea {
        resize: vertical;
        height: 80px;
    }

    .submit-button {
        width: 100%;
        padding: 12px;
        border: none;
        background-color: #7e3af2;
        color: white;
        font-size: 1em;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 20px;
    }

    .submit-button:hover {
        background-color: #5e29d2;
    }
</style>

<main class="main-container">
    <section class="add-product-container">
    <div class="container mt-5">
    <h2 class="text-center" style="color: #7e3af2;">Add New Product</h2>
    <div class="card" style="border-color: #7e3af2;">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_code" style="color: #7e3af2;">Product Code</label>
                            <input type="text" class="form-control" id="phone_code" name="phone_code" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_name" style="color: #7e3af2;">Phone Name</label>
                            <input type="text" class="form-control" id="phone_name" name="phone_name" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="brand_name" style="color: #7e3af2;">Brand</label>
                            <input type="text" class="form-control" id="brand_name" name="brand_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="color" style="color: #7e3af2;">Color</label>
                            <input type="text" class="form-control" id="color" name="color" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="camera" style="color: #7e3af2;">Camera</label>
                            <input type="text" class="form-control" id="camera" name="camera" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="quantity" style="color: #7e3af2;">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" style="color: #7e3af2;">Price</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="storage" style="color: #7e3af2;">Storage</label>
                            <select class="form-control" id="storage" name="storage" required>
                                <option value="64">64GB</option>
                                <option value="128">128GB</option>
                                <option value="256">256GB</option>
                                <option value="512">512GB</option>
                                <option value="1024">1TB</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stock_quantity" style="color: #7e3af2;">Stock Quantity</label>
                            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" style="color: #7e3af2;">Status</label>
                            <input type="text" class="form-control" id="status" name="status" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image" style="color: #7e3af2;">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="form-group">
                    <label for="description" style="color: #7e3af2;">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>

                <button type="submit" class="btn" style="background-color: #7e3af2; color: white;">Add Product</button>
            </form>
        </div>
    </div>
    </section>
</main>

@endsection
