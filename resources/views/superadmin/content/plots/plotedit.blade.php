@extends('superadmin.layout.index')
@section('content')
<div class="pagetitle mt-2">
    <h1>Plot Edit</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Plot Edit</li>
      </ol>
    </nav>
  </div>

<form method="POST" action="{{ route('plot.update', $plots->id) }}">
    @csrf
    <div class="row mb-3">
        <div class="col-lg-6 col-sm-12 d-flex">
            <label for="Plot Number" class="col-sm-4 col-form-label">Plot No.</label>
            <div class="col-lg-8 col-sm-8">
                <input type="text" name="plotno" class="form-control" value="{{ $plots->plotno }}">
                @error('plotno')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 d-flex space">
            <label for="Plot Categories" class="col-sm-4 col-form-label">Plot Type</label>
            <div class="col-lg-8 col-sm-8">
                <select name="type" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                    <option selected>Select Plot Type</option>
                    <option value="Commercial" @if ($plots->type === 'Commercial') selected @endif>Commercial</option>
                    <option value="Residential" @if ($plots->type === 'Residential') selected @endif>Residential</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6 col-sm-12 d-flex">
            <label for="Plot Categories" class="col-sm-4 col-form-label">Plot Categories</label>
            <div class="col-lg-8 col-sm-8">
                <select name="categories" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                    <option selected>Select Plot Categories</option>
                    <option value="Front" @if ($plots->categories === 'Front') selected @endif>Front</option>
                    <option value="Corner" @if ($plots->categories === 'Corner') selected @endif>Corner</option>
                    <option value="Back" @if ($plots->categories === 'Back') selected @endif>Back</option>
                    <option value="Middle" @if ($plots->categories === 'Middle') selected @endif>Middle</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 d-flex">
            <label for="Plot Area" class="col-sm-4 col-form-label">Plot Area</label>
            <div class="col-lg-3">
                <input type="number" name="length" class="form-control" placeholder="Length" id="input1" value="{{ $plots->length }}">
            </div>
            <div class="col-lg-2">
                <h5 class="pt-2 text-center">X</h5>
            </div>
            <div class="col-lg-3">
                <input type="number" name="width" class="form-control" placeholder="Width" value="{{ $plots->width }}" id="input2">
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6 col-sm-12 d-flex">
            <label for="Marla" class="col-sm-4 col-form-label">Marla</label>
            <div class="col-lg-8 col-sm-8">
                <input value="{{ $plots->marla }}" name="marla" class="form-control" id="result" readonly>
                @error('marla')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 d-flex space">
            <label for="down payment" class="col-sm-4 col-form-label">Down Payment</label>
            <div class="col-lg-8 col-sm-8">
                <input type="number" value="{{ $plots->down_payment }}" name="down_payment" class="form-control">
                @error('down_payment')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6 col-sm-12 d-flex space">
            <label for="price" class="col-sm-4 col-form-label">Price per Marla</label>
            <div class="col-lg-8 col-sm-8">
                <input type="number"  id="per_marla_price" value="{{ $plots->price }}" name="price" class="form-control">
                @error('price')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 d-flex space">
            <label for="Plot Categories" class="col-sm-4 col-form-label">Plot Status</label>
            <div class="col-lg-8 col-sm-8">
                <select name="status" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                    <option selected>Select Plot Status</option>
                    <option value="0" @if ($plots->status === '0') selected @endif>Active</option>
                    <option value="1" @if ($plots->status === '1') selected @endif>Inactive</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12 col-sm-8 d-flex">
            <label for="Plot Description" class="col-lg-2 col-sm-6 align-items-center mt-4">Plot Description</label>
            <div class="col-lg-10 col-sm-12 mt-3">
                <textarea id="description" name="description" class="form-control" width="100%">{{ $plots->description }}</textarea>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mt-2 col-sm-12 d-flex space">
        <label for="total_amount" class="col-sm-4 col-form-label">Total Amount</label>
        <div class="col-lg-8 col-sm-8">
            <input type="text" name="total_amount" value="{{ $plots->total_amount }}" id="total_amount" class="form-control" readonly>
            @error('total_amount')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="row mb-3 text-center mt-4">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-golden">Update</button>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#input1, #input2, #per_marla_price').on('input', function() {
            calculateMarla();
        });

        // Calculate initial values on page load
        calculateMarla();
    });

    function calculateMarla() {
        var length = parseFloat($('#input1').val());
        var width = parseFloat($('#input2').val());

        if (!isNaN(length) && !isNaN(width)) {
            var areaSqft = length * width;
            var marla = areaSqft / 272.25;
            $('#result').val(marla.toFixed(2));
        } else {
            $('#result').val('');
        }
        calculateTotal(); // Ensure total is calculated after setting the marla value
    }

    function calculateTotal() {
        var perMarlaPrice = parseFloat($('#per_marla_price').val());
        var marla = parseFloat($('#result').val());

        if (!isNaN(perMarlaPrice) && !isNaN(marla)) {
            var totalAmount = perMarlaPrice * marla;
            $('#total_amount').val(totalAmount.toFixed(2));
        } else {
            $('#total_amount').val('');
        }
    }
</script>
@endsection
