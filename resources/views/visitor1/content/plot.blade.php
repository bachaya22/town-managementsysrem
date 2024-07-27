@extends('visitor1.layout.index')
   @section('content')
<!-- Plot -->
<section>
  <h1 class="text-center mt-4">Choose Your Pricing Plan</h1>
  <!-- star-line -->
<div class="seprator-wapper text-center">
  <i class="fa-solid fa-star color-star"></i>
</div>
<!-- section-1 -->
<div class="container mt-4">
  <h2 class="text-center">Residential Plots</h2>
  <p class="text-center">Residential Plot are an integral part of the Al Noor Garden community lifestyle. Immaculately designed General Block will offer a complete lifestyle at affordable rates. Lush green parks, wide roads, nicely laid out streetscape embellished with road kerbs, pavements, streetlamps, greenbelts and flowerbeds, complement the lifestyle preferences of those who aspire to live a convenient yet cost-effective lifestyle.</p>
  <div class="row">
    @foreach ($plots->where('type', 'Residential')->whereIn('status', ['active', 0]) as $plot)
    <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-center mt-4 ">

      <div class="card plot-shadow" style="width: 19rem;">
        <div class="pricing-top py-4">
          <h4 class="px-3 top-heading">{{ $plot->description }}</h4>

          <p class="price ps-4"><span class="currency white">PKR&nbsp;</span> <span class="number white">{{ number_format($plot->price, 0) }}&nbsp;</span> <span class="month white">p/month</span></p>
         </div>
        <div class="card-body card-color pt-4 pb-5">
          <div class="pricing-bottom">
             <ul class="list-unstyled">
                <li class="text-center font-plot-heading"><strong>Down Payment</strong></li>
                <li class="text-center">{{ number_format($plot->down_payment, 0) }}</li>
                <li class="text-center font-plot-heading"><strong>Catagerioes</strong></li>
                <li class="text-center">{{ $plot->categories }}&nbsp;</li>
                <li class="text-center font-plot-heading"><strong>Total Amount</strong></li>
                <li class="text-center">{{ number_format($plot->total_amount, 0) }}&nbsp;</li>
            </ul>
            <div class="text-center"> <a href="{{ route('visitor.discount') }}">Apply For Discount Offer</a></div>

        </div>
        </div>
      </div>

    </div>
    @endforeach

<!-- section-2 -->
<div class="container my-5">
  <h2 class="text-center">Comercial Block</h2>
  <p class="text-center">Comercial Block are an integral part of the Al Noor Garden community lifestyle. Immaculately designed General Block will offer a complete lifestyle at affordable rates. Lush green parks, wide roads, nicely laid out streetscape embellished with road kerbs, pavements, streetlamps, greenbelts and flowerbeds, complement the lifestyle preferences of those who aspire to live a convenient yet cost-effective lifestyle.</p>
  <div class="row">
    @foreach ($plots->where('type', 'Commercial')->whereIn('status', ['active', 0]) as $plot)
    <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-center mt-4 ">

      <div class="card plot-shadow" style="width: 19rem;">
        <div class="pricing-top py-4">
          <h4 class="px-3 top-heading">{{ $plot->description }}</h4>
          <p class="price ps-4"><span class="currency white">PKR&nbsp;</span> <span class="number white">{{ number_format($plot->price, 0) }}&nbsp;</span> <span class="month white">p/month</span></p>
         </div>
        <div class="card-body card-color pt-4 pb-5">
          <div class="pricing-bottom">
             <ul class="list-unstyled">
                <li class="text-center font-plot-heading"><strong>Down Payment</strong></li>
                <li class="text-center">{{ $plot->down_payment }}</li>
                <li class="text-center font-plot-heading"><strong>Catagerioes</strong></li>
                <li class="text-center">{{ $plot->categories }}&nbsp;</li>
                <li class="text-center font-plot-heading"><strong>Total Amount</strong></li>
                <li class="text-center">{{ number_format($plot->total_amount, 0) }}&nbsp;</li>
            </ul>
            <div class="text-center"> <a href="{{ route('visitor.discount') }}">Apply For Discount Offer</a></div>

        </div>
        </div>
      </div>

    </div>
    @endforeach

</section>
@endsection
