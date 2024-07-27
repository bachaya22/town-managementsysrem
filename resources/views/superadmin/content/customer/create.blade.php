@extends('superadmin.layout.index')
@section('content')
<div class="container my-3">
    <div class="pagetitle mt-2">
        <h1>Add Customer</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Add Customer</li>
          </ol>
        </nav>
      </div>
    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-5">
            <div class="col-6">
                <label for="name" class="col-form-label fw-bold">Customer Name</label>
                <div>
                    <input type="text" name="name" class="form-control" required>
                    @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            <div class="col-6">
                <label for="email" class="col-form-label fw-bold">Email</label>
                <div>
                    <input type="email" name="email" class="form-control" required>
                    @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
        </div>
        <div class="row mx-5">
            <div class="col-6">
                <label for="cnic" class="col-form-label fw-bold">CNIC</label>
                <div>
                    <input type="text" name="cnic" class="form-control" required>
                    @error('cnic')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            <div class="col-6">
                <label for="phone" class="col-form-label fw-bold">Phone No.</label>
                <div>
                    <input type="phone" name="phone" class="form-control" required>
                    @error('plotno')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
        </div>
        <div class="my-4 d-flex justify-content-center">
            <button class="btn btn-golden" type="submit">Add Customer</button>
        </div>
    </form>
</div>
@endsection
