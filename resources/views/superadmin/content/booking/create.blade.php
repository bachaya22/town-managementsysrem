@extends('superadmin.layout.index')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<div class="container">
    <div class="pagetitle mt-2">
        <h1>Add Booking</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Add Booking</li>
          </ol>
        </nav>
      </div>
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
        <!-- Customer Name Field -->
        <div class="form-group">
            <label for="customer_name" class="fw-bold">Customer Name</label>
            <select name="customer_id" id="customer_id" class="form-control">
                <option value="" selected>Select Customer Name</option>
                <!-- Populate with customer names from database -->
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" data-email="{{ $customer->email }}"
                        data-cnic="{{ $customer->cnic }}" data-phone="{{ $customer->phone }}">
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="form-group col-6 mt-2" id="email_field" style="display: none;">
                <label for="email" class="fw-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" readonly>
                @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group col-6 mt-2" id="cnic_field" style="display: none;">
                <label for="cnic" class="fw-bold">CNIC</label>
                <input type="text" name="cnic" id="cnic" class="form-control" readonly>
                @error('cnic')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>
        <div class="form-group mt-2" id="phone_field" style="display: none;">
            <label for="phone" class="fw-bold">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" readonly>
            @error('phone')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        </div>
        <div class="form-group mt-2">
            <label for="plot_number" class="fw-bold">Plot No.</label>
            <select name="add_plot_id" id="add_plot_id" class="form-control">
                <option value="" selected>Select Plot Number</option>
                <!-- Populate with plot numbers from database -->
                @foreach ($plots as $plot)
                    <option value="{{ $plot->id }}" data-marla="{{ $plot->marla }}"
                        data-plot-type="{{ $plot->type }}" data-categories="{{ $plot->categories }}"
                        data-total="{{ $plot->total_amount }}">
                        {{ $plot->plotno }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="form-group col-6 mt-2" id="marla_field" style="display: none;">
                <label for="marla" class="fw-bold">Marla</label>
                <input type="number" name="marla" id="marla" class="form-control" readonly>
                @error('marla')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group col-6 mt-2" id="plot_type_field" style="display: none;">
                <label for="plot_type" class="fw-bold">Plot Type</label>
                <input type="text" name="plot_type" id="plot_type" class="form-control" readonly>
                @error('plot_type')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>
        <div class=row>
            <div class="form-group col-6 mt-2" id="categories_field" style="display: none;">
                <label for="categories" class="fw-bold">Categories</label>
                <input type="text" name="categories" id="categories" class="form-control" readonly>
                @error('categories')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="form-group col-6  mt-2" id="total_amount_field" style="display: none;">
                <label for="total_amount" class="fw-bold">Total Amount</label>
                <input type="text" name="total_amount" id="total_amount" class="form-control" readonly>
                @error('total_amount')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>

        <div class="form-group mt-2">
            <label class="fw-bold">Payment Type</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_type" id="full_payment"
                    value="full_payment">
                <label class="form-check-label" for="full_payment">Full Payment</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_type" id="installment_plan"
                    value="installment_plan">
                <label class="form-check-label" for="installment_plan">Installment Plan</label>
            </div>
        </div>
        <div class="form-group" id="num_installments_field" style="display: none;">
            <label for="num_installments" class="fw-bold">Number of Installments</label>
            <select name="num_installments" id="num_installments" class="form-control">
                <option value="" selected>Select No of Installments</option>
                <option value="6">6</option>
                <option value="12">12</option>
                <option value="18">18</option>
                <option value="24">24</option>
            </select>
        </div>
        <div class="form-group" id="installment_payment_field" style="display: none;">
            <label for="installment_payment" class="fw-bold">Monthly Installment</label>
            <input type="text" name="installment_payment" id="installment_payment" class="form-control">
        </div>
        <div class="form-group" id="total_payment_field" style="display: none;">
            <label for="total_payment fw-bold">Total Payment</label>
            <input type="text" name="total_payment" id="total_payment" class="form-control" readonly>
        </div>
        <div class="col-lg-6 col-sm-12 d-flex">
            <label for="Plot Number" class="col-sm-4 col-form-label fw-bold">Booking Status</label>
            <div class="col-lg-8 col-sm-8">
                <select type="text" name="status" class="form-control">
                    <option value="">Select Please</option>
                    <option value="pending">Pending</option>
                    <option value="booked">Booked</option>
                </select>
                @error('status')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-4"><button type="submit" class="btn btn-golden">Book Plot</button></div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if (Session::has('success'))
<script>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
    toastr.success("{{ Session::get('success') }}");
</script>
@endif
@endsection
