@extends('visitor.layout.index')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- section-3 -->
<section class="container py-2 contact-main my-5">
  <h1 class="text-center text-golden pt-4 fw-bold">Avail Discount Offers</h1>
  <div class="row">
      <div class="col-md-6 px-lg-5 py-lg-5 col-order-2 text-black discount my-4" data-aos="fade-right"  data-aos-duration="800">
        <h3 class="text-golden mt-4">Discount Form</h3>
        <form action="{{ route('discount.store') }}" method="POST">
            @csrf
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
            <div class="mb-4 mt-4 width-avil-input">
                <input type="text" placeholder="Name" name="name">
            </div>
            <div class="mb-4 width-avil-input">
              <input type="number" placeholder="Phone No." name="phone_no">
          </div>
          <div class="mb-4">
            <select name="plot_merla" class="form-select py-3" aria-label="Default select example">
              <option selected class="text-secondary">Select Plot</option>
              @foreach ($plots as $plot)
              <option  value="{{ $plot->plotno}}">{{ $plot->description }}</option>
              @endforeach
            </select>
          </div>
        <div class="d-grid btn-login">
          <button type="submit" class="btn btn-discount py-3">Avail Discount</button>
        </div>


        </form>
      </div>
      <div class="col-md-6 col-order-1" data-aos="fade-left" data-aos-duration="800">
          <div class="card-body py-lg-5 pe-lg-4 px-0">
              <img src="{{URL::asset('visitor_assets')}}/img/dis-2.jpg" alt="" class="card-img">
          </div>
      </div>
  </div>
</section>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
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
