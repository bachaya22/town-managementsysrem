@extends('visitor1.layout.index')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<section class="container contact-main pt-4 pb-1 my-5">
    <div class="text-center">
      <h2 class="fw-bold">Get In Touch</h2>
      <div class="seprator-wapper">
        <i class="fa-solid fa-star color-star"></i>
      </div>
      <span>We Will Assist You 24/7 - Quick Contact</span>
    </div>
  <div class="contact-border mt-5 " data-aos="zoom-in" data-aos-duration="800">
     <div class="row d-flex justify-content-center align-items-center ps-5">
      <div class="col-4 d-flex">
      <div class="icon">
        <i class="fa-solid fa-phone fa-2x"></i>
      </div>
      <div class="ms-2">
        <h6 class="m-0 fw-bold text-golden">Contact Us</h6>
      <p>0301-8619078</p>
      </div>
      </div>
      <div class="col-4 d-flex">
        <div class="icon">
          <i class="fa-regular fa-envelope fa-2x"></i>
        </div>
        <div class="ms-2">
          <h6 class="m-0 fw-bold text-golden">Email</h6>
        <p>alnoorgarden@gmail.com</p>
        </div>
        </div>
      <div class="col-4 d-flex">
        <div class="icon">
          <i class="fa-regular fa-address-book fa-2x"></i>
        </div>
        <div class="ms-2">
          <h6 class="m-0 fw-bold text-golden">Address</h6>
        <p>Tarinda Saway Khan</p>
        </div>
        </div>

          </div>
  </div>
    <div class="row my-lg-5 mx-lg-5">
        @if(Session::has('contact'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('contact') }}
                    </div>
                    @endif
        <div class="col-md-6 col-4 py-4" data-aos="zoom-in-right"
        data-aos-duration="800">
              <div class="text-black contact">
                <form action="{{ route('contact.store') }}" method="POST" >
                    @csrf

                    <div class="mb-3">
                      <input type="text" name="name" placeholder="Name" >
                  </div>
                  <div class="mb-3">
                    <input type="number" name="phone_no" placeholder="Phone No." >
                </div>
                <div class="mb-3">
                  <input type="email" name="email" placeholder="Email">
              </div>
              <div class="main-input mb-3">
                <textarea name="suggestion" placeholder="Message" id="" rows="6" class="form-input"></textarea>
            </div>
                <div class="d-grid btn-contact">
                  <button type="submit" class="btn py-3 text-white">Submit</button>
                </div>
                </form>
              </div>
        </div>
        <div class="col-md-6 map " data-aos="zoom-in-left" data-aos-duration="800">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3507.1551326204008!2d70.4113180745456!3d28.474874375751185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393759626e6984ef%3A0x7efa589a8d124063!2sAlnoor%20Garden!5e0!3m2!1sen!2s!4v1715675097389!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>
  </section>
  <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if (Session::has('contact'))
<script>
 toastr.options =
 {
     "closeButton" : true,
     "progressBar" : true
 }
    toastr.success("{{ Session::get('contact') }}");
</script>
@endif
@endsection
