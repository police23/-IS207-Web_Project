@extends('admin.adminlayout')
@section('add_brand')

<style>
    /* Adjust form to align to the top */
    .main-container {
        display: flex;
        justify-content: center;
        align-items: flex-start; /* Align to the top */
        min-height: 100vh;
        background-color: #f5f5f5;
        padding-top: 20px; /* Optional padding at the top */
    }

    .add-brand-container {
        width: 100%;
        max-width: 1000px; /* Adjusted width to match the design */
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .add-brand-container h3 {
        color: #333;
        text-align: center;
        font-size: 1.5em;
        margin-bottom: 20px;
    }

    .form-group {
        position: relative;
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        font-size: 0.9em;
        color: #333;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1em;
        background-color: #f0f0f0;
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
    <section class="add-brand-container">
    <div class="container mt-5">
        <h2 class="text-center" style="color: #7e3af2;">Add New Brand</h2>
        <div class="card" style="border-color: #7e3af2;">
            <div class="card-body">
                <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="brand_name" style="color: #7e3af2;">Brand Name</label>
                        <input type="text" class="form-control" id="brand_name" name="brand_name" required>
                    </div>

                    <div class="form-group">
                        <label for="brand_code" style="color: #7e3af2;">Brand Code</label>
                        <input type="text" class="form-control" id="brand_code" name="brand_code" required>
                    </div>

                    <div class="form-group">
                        <label for="status" style="color: #7e3af2;">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="submit-button">Add Brand</button>
                </form>
            </div>
        </div>
    </section>
</main>

@endsection
