<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <!-- Card Header -->
                    <div class="card-header text-white text-center py-4">
                        <h4 class="mb-0">Create Order</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4">
                        <!-- Error Messages -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Order Form -->
                        <form method="POST" action="{{ route('order.save') }}">
                            @csrf

                            <!-- Item Name Field -->
                            <div class="mb-4">
                                <label for="item" class="form-label">Item Name</label>
                                <input type="text" id="item" class="form-control" placeholder="Enter item name" name="item" value="{{ old('item') }}" required>
                            </div>

                            <!-- Total Price Field -->
                            <div class="mb-4">
                                <label for="total" class="form-label">Total Price</label>
                                <input type="number" id="total" class="form-control" placeholder="Enter total price" name="total" value="{{ old('total') }}" required>
                            </div>

                            <!-- Address Field -->
                            <div class="mb-4">
                                <label for="address" class="form-label">Address</label>
                                <textarea id="address" class="form-control" placeholder="Enter delivery address" name="address" rows="3" required>{{ old('address') }}</textarea>
                            </div>

                            <!-- Payment Method Field -->
                            <div class="mb-4">
                                <label for="payment_method" class="form-label">Payment Method</label>
                                <select id="payment_method" class="form-select" name="payment_method" required>
                                    <option value="" disabled selected>Select a payment method</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="PayPal">PayPal</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success btn-lg w-100 py-2"  href="{{ route('order.index') }}">Submit Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>