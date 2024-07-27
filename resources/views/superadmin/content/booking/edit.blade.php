@extends('superadmin.layout.index')
@section('content')
<div class="container">
    <div class="pagetitle mt-2">
        <h1>Edit Plot</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Edit Plot</li>
          </ol>
        </nav>
      </div>
    <form action="{{ route('booking.update', $bookings->id )}}" method="POST">
        @csrf

        <!-- Customer Name Field -->
        <div class="form-group">
            <label for="customer_name" class="fw-bold">Customer Name</label>
            <select name="customer_id" id="customer_id" class="form-control">
                <option value="">Select Customer Name</option>
                <!-- Populate with customer names from database -->
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $customer->id == $bookings->customer_id ? 'selected' : '' }} data-email="{{ $customer->email }}"
                        data-cnic="{{ $customer->cnic }}" data-phone="{{ $customer->phone }}">
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Email, CNIC, and Phone Fields (displayed based on selection) -->
        <div class="row">
            <div class="form-group col-6 mt-2" id="email_field" style="{{ $bookings->customer ? 'display: block;' : 'display: none;' }}">
                <label for="email" class="fw-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" readonly value="{{ $bookings->customer ? $bookings->customer->email : '' }}">
            </div>
            <div class="form-group col-6 mt-2" id="cnic_field" style="{{ $bookings->customer ? 'display: block;' : 'display: none;' }}">
                <label for="cnic" class="fw-bold">CNIC</label>
                <input type="text" name="cnic" id="cnic" class="form-control" readonly value="{{ $bookings->customer ? $bookings->customer->cnic : '' }}">
            </div>
        </div>
        <div class="form-group mt-2" id="phone_field" style="{{ $bookings->customer ? 'display: block;' : 'display: none;' }}">
            <label for="phone" class="fw-bold">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" readonly value="{{ $bookings->customer ? $bookings->customer->phone : '' }}">
        </div>
        <!-- Plot Number Field -->
        <div class="form-group mt-2">
            <label for="plot_number" class="fw-bold">Plot No.</label>
            <select name="add_plot_id" id="add_plot_id" class="form-control">
                <option value="">Select Plot Number</option>
                <!-- Populate with plot numbers from database -->
                @foreach ($plots as $plot)
                    <option value="{{ $plot->id }}" {{ $plot->id == $bookings->add_plot_id ? 'selected' : '' }} data-marla="{{ $plot->marla }}"
                        data-plot-type="{{ $plot->type }}" data-categories="{{ $plot->categories }}"
                        data-total="{{ $plot->total_amount }}">
                        {{ $plot->plotno }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Other Plot Details (displayed based on selection) -->
        <div class="row">
            <div class="form-group col-6 mt-2" id="marla_field" style="{{ $bookings->plot ? 'display: block;' : 'display: none;' }}">
                <label for="marla" class="fw-bold">Marla</label>
                <input type="number" name="marla" id="marla" class="form-control" readonly value="{{ $bookings->marla ? $bookings->marla : '' }}">
            </div>
            <div class="form-group col-6 mt-2" id="plot_type_field" style="{{ $bookings->plot ? 'display: block;' : 'display: none;' }}">
                <label for="plot_type" class="fw-bold">Plot Type</label>
                <input type="text" name="plot_type" id="plot_type" class="form-control" readonly value="{{ $bookings->plot_type ? $bookings->plot_type : '' }}">
            </div>
        </div>
        <div class=row>
            <div class="form-group col-6 mt-2" id="categories_field" style="{{ $bookings->plot ? 'display: block;' : 'display: none;' }}">
                <label for="categories" class="fw-bold">Categories</label>
                <input type="text" name="categories" id="categories" class="form-control" readonly value="{{ $bookings->categories ? $bookings->categories : '' }}">
            </div>
            <div class="form-group col-6  mt-2" id="total_amount_field" style="{{ $bookings->plot ? 'display: block;' : 'display: none;' }}">
                <label for="total_amount" class="fw-bold">Total Amount</label>
                <input type="text" name="total_amount" id="total_amount" class="form-control" readonly value="{{ $bookings->total_amount ? $bookings->total_amount : '' }}">
            </div>
        </div>
        <!-- Payment Type and Installments Fields -->
        <div class="form-group mt-2">
            <label class="fw-bold">Payment Type</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_type" id="full_payment" value="full_payment" {{ $bookings->payment_type == 'full_payment' ? 'checked' : '' }}>
                <label class="form-check-label" for="full_payment">Full Payment</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="payment_type" id="installment_plan" value="installment_plan" {{ $bookings->payment_type == 'installment_plan' ? 'checked' : '' }}>
                <label class="form-check-label " for="installment_plan">Installment Plan</label>
            </div>
        </div>
        <div class="form-group" id="num_installments_field" style="{{ $bookings->payment_type == 'installment_plan' ? 'display: block;' : 'display: none;' }}">
            <label for="num_installments" class="fw-bold">Number of Installments</label>
            <select name="num_installments" id="num_installments" class="form-control">
                <option value="">Select the No of Installments</option>
                <option value="6" {{ $bookings->num_installments == 6 ? 'selected' : '' }}>6</option>
                <option value="12" {{ $bookings->num_installments == 12 ? 'selected' : '' }}>12</option>
                <option value="18" {{ $bookings->num_installments == 18 ? 'selected' : '' }}>18</option>
                <option value="24" {{ $bookings->num_installments == 24 ? 'selected' : '' }}>24</option>
            </select>
        </div>
        <div class="form-group" id="installment_payment_field" style="{{ $bookings->payment_type == 'installment_plan' ? 'display: block;' : 'display: none;' }}">
            <label for="installment_payment" class="fw-bold">Installment Payment Amount</label>
            <input type="text" name="installment_payment" id="installment_payment" class="form-control" value="{{ $bookings->installment_payment }}">
        </div>
        <div class="form-group" id="total_payment_field" style="{{ $bookings->payment_type == 'full_payment' ? 'display: block;' : 'display: none;' }}">
            <label for="total_payment" class="fw-bold">Total Payment</label>
            <input type="text" name="total_payment" id="total_payment" class="form-control" readonly value="{{ $bookings->total_payment }}">
        </div>

        <!-- Booking Status -->
        <div class="col-lg-6 col-sm-12 d-flex">
            <label for="Plot Number" class="col-sm-4 col-form-label fw-bold">Booking Status</label>
            <div class="col-lg-8 col-sm-8">
                <select type="text" name="status" class="form-control">
                    <option value="">Select Please</option>
                    <option value="pending" {{ $bookings->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="booked" {{ $bookings->status == 'booked' ? 'selected' : '' }}>Booked</option>
                </select>
                @error('status')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
       <div class="d-flex justify-content-center mt-3">
        <button type="submit" class="btn btn-golden">Update Booking</button>
       </div>
    </form>
</div>

<script>
    // Function to show fields based on initial values
    function showFields() {
        var customerId = document.getElementById('customer_id').value;
        var plotId = document.getElementById('add_plot_id').value;
        var paymentType = document.querySelector('input[name="payment_type"]:checked').value;

        if (customerId) {
            document.getElementById('email_field').style.display = 'block';
            document.getElementById('cnic_field').style.display = 'block';
            document.getElementById('phone_field').style.display = 'block';
        }

        if (plotId) {
            document.getElementById('marla_field').style.display = 'block';
            document.getElementById('plot_type_field').style.display = 'block';
            document.getElementById('categories_field').style.display = 'block';
            document.getElementById('total_amount_field').style.display = 'block';
        }

        if (paymentType === 'full_payment') {
            document.getElementById('total_payment_field').style.display = 'block';
            document.getElementById('installment_payment_field').style.display = 'none';
            document.getElementById('num_installments_field').style.display = 'none';
        } else {
            document.getElementById('total_payment_field').style.display = 'none';
            document.getElementById('installment_payment_field').style.display = 'block';
            document.getElementById('num_installments_field').style.display = 'block';
        }
    }

    // Call the function when the page loads
    window.onload = showFields;

    // Add event listeners to trigger the function on change
    document.getElementById('customer_id').addEventListener('change', showFields);
    document.getElementById('add_plot_id').addEventListener('change', showFields);
    document.querySelectorAll('input[name="payment_type"]').forEach(function(radio) {
        radio.addEventListener('change', showFields);
    });
</script>


@endsection
