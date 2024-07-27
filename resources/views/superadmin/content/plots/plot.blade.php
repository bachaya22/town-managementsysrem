@extends('superadmin.layout.index')
@section('content')
<div class="pagetitle mt-2">
    <h1>Add Plot</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Add Plot</li>
      </ol>
    </nav>
  </div>
<div class="card-body" >
    <!-- General Form Elements -->
<form action="{{ route('plot.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-lg-6 col-sm-12 d-flex">
            <label for="Plot Number" class="col-sm-4 col-form-label fw-bold">Plot No.</label>
            <div class="col-lg-8 col-sm-8">
                <input type="text" name="plotno" class="form-control">
                @error('plotno')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div>
        <div class="col-lg-6 col-sm-12 d-flex space m-0">
            <label for="Plot Categories" class="col-sm-4 col-form-label fw-bold">Plot Type</label>
            <div class="col-lg-8 col-sm-8 m-0">
                <select name="type" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                    <option value="" class="fw-bold" selected>Select Plot Type</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Residential">Residential</option>
                </select>
                @error('type')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6 col-sm-12 d-flex">
            <label for="Plot Categories" class="col-sm-4 col-form-label fw-bold">Plot Categories</label>
            <div class="col-lg-8 col-sm-8">
                <select name="categories" class="form-select form-select-md mb-3"
                    aria-label=".form-select-lg example">
                    <option value="" class="fw-bold" selected>Select Plot Categories</option>
                    <option value="Front">Front</option>
                    <option value="Corner">Corner</option>
                    <option value="Back">Back</option>
                    <option value="Middle">Middle</option>
                </select>
                @error('categories')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 d-flex">
            <label for="Plot Area" class="col-sm-4 col-form-label fw-bold">Plot Area</label>
            <div class="col-lg-3 ">
                <input type="number" step="any" name="length" class="form-control" placeholder="Length (feet)"
                    id="input1" oninput="calculateMarla()">
                    @error('length')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
            </div>

            <div class="col-lg-2">
                <h5 class="pt-2 text-center fw-bold">X</h5>
            </div>
            <div class="col-lg-3">
                <input type="number" step="any" name="width" class="form-control" placeholder="Width (feet)"
                    id="input2" oninput="calculateMarla()">
                    @error('width')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
            </div>

        </div>
    </div>


    <div class="row mb-3">
        <div class="col-lg-6 col-sm-12 d-flex">
            <label for="Marla" class="col-sm-4 col-form-label fw-bold">Marla</label>
            <div class="col-lg-8 col-sm-8">
                <input type="number" step="any" name="marla" class="form-control" id="result" readonly>
                @error('marla')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div>
        <div class="col-lg-6 col-sm-12 d-flex space fw-bold">
            <label for="Permarla Price" class="col-sm-4 col-form-label">Per-marla Price</label>
            <div class="col-lg-8 col-sm-8">
                <input type="text" name="price" class="form-control" id="per_marla_price" oninput="calculateTotal()">
                @error('price')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div>
        <div class="col-lg-6 mt-4 col-sm-12 d-flex space">
            <label for="down_payment" class="col-sm-4 col-form-label fw-bold">Down Payment</label>
            <div class="col-lg-8 col-sm-8">
                <input type="text" name="down_payment" class="form-control">
                @error('down_payment')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 d-flex space">
            <label for="Plot Categories" class="col-sm-4 mt-4 col-form-label fw-bold">Plot Type</label>
            <div class="col-lg-8 col-sm-8">
                <select name="status" class="form-select mt-4 form-select-md mb-3"
                    aria-label=".form-select-lg example">
                    <option value="" selected>Select Plot Status</option>
                    <option value="0">Active</option>
                    <option value="1">Unactive</option>
                </select>
                @error('status')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-6 mt-2 col-sm-12 d-flex">
            <label for="total_amount" class="col-lg-4 col-sm-4 col-form-label fw-bold">Total Amount</label>
            <div class="col-lg-8 col-sm-8">
                <input type="text" name="total_amount" id="total_amount" class="form-control">
                @error('total_amount')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12 col-sm-8 d-flex">
            <label for="Plot Description" class="col-lg-2 col-sm-6 align-items-center mt-4 fw-bold">Plot
                Description</label>
            <div class="col-lg-10 col-sm-12 mt-3">
                <textarea id="Description" name="description" class="form-control" width="100%"></textarea>
                @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div>
    </div>


    <div class="col-lg-12 col-md-12 text-center mt-1">
        <button type="submit" class="btn btn-golden">Add Plot</button>
    </div>
</form><!-- End General Form Elements -->
</div>


@endsection
