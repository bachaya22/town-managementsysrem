   @extends('visitor1.layout.index')
   @section('content')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

   <section class="container-fluid p-0 m-0 section-1">
    <div class="row pt-5 ps-lg-5 ps-2 pe-0 me-0 ">
      <div class="col-lg-6 bg-golden-btn mt-5 pt-5" data-aos="fade-right" data-aos-duration="800">
        <h1 class="pb-2 section1-title fw-bold">AL-NOOR GARDEN</h1>
        <p class="pb-2">Welcome to Al Noor Garden, where luxury meets tranquility. Explore a world of elegance, security, and comfort. From lush landscapes to modern amenities, experience unparalleled living. Step into our haven and discover true luxury, where peace and harmony await.</p>
        <a href="{{ route('visitor1.discount') }}" class="btn ">Discount Offer</a>
      </div>
    </div>
  </section>
  <!-- section-2 -->
  <section class="container pt-3 mt-4">
    <h1 class="text-center fw-bold text-golden">Amazing Features</h1>
    <div class="row my-5">
        <div class="col-lg-4 col-md-6 col-12 px-4" data-aos="zoom-in" data-aos-duration="800">
            <div class="card border rounded-5 mb-5 bg-gray">
                <img src="{{URL::asset('visitor_assets')}}/img/gate.jpg" class="p-4" alt="..." width="388px" height="320px">
                <div class="card-body text-center px-5 pt-4 pb-5">
                    <a href="" class="text-decoration-none text-black">
                        <h5 class="card-title hover-line">Security Facility</h5>
                    </a>
                    <div class="box-1"></div>
                    <p class="card-text my-4">Enjoy peace of mind with our 24/7 security system, including CCTV monitoring, gated access, and professional security personnel.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 px-4" data-aos="zoom-in" data-aos-duration="800">
            <div class="card border rounded-0 mb-5 padding-inline bg-gray">
                <img src="{{URL::asset('visitor_assets')}}/img/grasy.jpg" class="p-4" alt="..." width="388px" height="320px">
                <div class="card-body text-center px-5 pt-4 pb-5">
                    <a href="" class="text-decoration-none text-black">
                        <h5 class="card-title hover-line">Grassy Ground</h5>
                    </a>
                    <div class="box-1"></div>
                    <p class="card-text my-4">Embrace nature and recreation in our expansive grassy grounds, perfect for family picnics, outdoor activities, and leisurely strolls.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 px-4" data-aos="zoom-in" data-aos-duration="800">
            <div class="card border rounded-0 bg-gray">
                <img src="{{URL::asset('visitor_assets')}}/img/location.jpg" class="p-4" alt="..." width="388px" height="320px">
                <div class="card-body text-center px-5 pt-4 pb-5">
                    <a href="" class="text-decoration-none text-black">
                        <h5 class="card-title hover-line">Beautiful Location</h5>
                    </a>
                    <div class="box-1"></div>
                    <p class="card-text my-4">Visit our beautiful location and immerse yourself in the breathtaking landscapes, where every moment is a picturesque experience.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 px-4" data-aos="zoom-in" data-aos-duration="800">
          <div class="card border rounded-0 bg-gray">
              <img src="{{URL::asset('visitor_assets')}}/img/park.jpg" class="p-4" alt="..." width="388px" height="320px">
              <div class="card-body text-center px-5 pt-4 pb-5">
                  <a href="" class="text-decoration-none text-black">
                      <h5 class="card-title hover-line">Beautiful Park</h5>
                  </a>
                  <div class="box-1"></div>
                  <p class="card-text my-4">Whether it's a leisurely stroll, a picnic with loved ones, or simply unwinding amidst nature's beauty, our park offers endless opportunities for rejuvenation.</p>
              </div>
          </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12 px-4"data-aos="zoom-in" data-aos-duration="800">
        <div class="card border rounded-0 bg-gray">
            <img src="{{URL::asset('visitor_assets')}}/img/road.jpg" class="p-4" alt="..." width="388px" height="320px">
            <div class="card-body text-center px-5 pt-4 pb-5">
                <a href="" class="text-decoration-none text-black">
                    <h5 class="card-title hover-line">Carpeted Roads</h5>
                </a>
                <div class="box-1"></div>
                <p class="card-text my-4">From morning commutes to late-night drives, our carpeted roads pave the way for safe transportation, enhancing connectivity and accessibility.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12 px-4" data-aos="zoom-in" data-aos-duration="800">
      <div class="card border rounded-0 bg-gray"  >
          <img src="{{URL::asset('visitor_assets')}}/img/masjid.jpg" class="p-4" alt="..." width="388px" height="320px">
          <div class="card-body text-center px-5 pt-4 pb-5">
              <a href="" class="text-decoration-none text-black">
                  <h5 class="card-title hover-line">Mosque</h5>
              </a>
              <div class="box-1"></div>
              <p class="card-text my-4">Find spiritual solace and community at our beautifully maintained mosque, offering convenient prayer spaces and regular gatherings.</p>
          </div>
      </div>
  </div>
    </div>
</section>
<script src="{{URL::asset('visitor_assets')}}/https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="{{URL::asset('visitor_assets')}}/https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
