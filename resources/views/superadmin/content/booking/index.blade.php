@extends('superadmin.layout.index')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<div id="popupModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <div id="popupContent"></div>
    </div>
</div>
<style>
    /* The modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    /* Modal content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
    }

    /* Close button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<div class="pagetitle mt-2">
    <h1>Booking</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Booking List</li>
      </ol>
    </nav>
  </div>
  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ Session::get('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
<div class="container my-3 card recent-sales overflow-auto">
   <div class="card-body">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('booking.create') }}" class="btn btn-golden mt-3">Add Booking</a>
    </div>
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Plot No</th>
                <th>Marla</th>
                <th>Plot Type</th>
                <th>Payment Type</th>
                <th>Installment</th>
                <th>Monthly Installment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->customer->name }}</td>
                <td>{{ $booking->add_plot_id }}</td>
                <td>{{ $booking->marla }}</td>
                <td>{{ $booking->plot_type}}</td>
                <td>{{ $booking->payment_type }}</td>
                <td>{{ $booking->num_installments }}</td>
                <td>{{ $booking->installment_payment }}</td>
                <td>
                    @if ($booking->status == 'booked')
                        <span class="btn btn-sm text-white px-2" style="background-color: green;">Booked</span>
                    @else
                        <span class="btn btn-sm text-white px-2" style="background-color: red;">Pending</span>
                    @endif
                </td>
                <td class="d-flex">
                    <button class="btn btn-sm bg-golden me-1" onclick="openPopup(
                        '{{ $booking->customer->name }}',
                        '{{ $booking->email }}',
                        '{{ $booking->add_plot_id }}',
                        '{{ $booking->marla }}',
                        '{{ $booking->plot_type }}',
                        '{{ $booking->categories }}',
                        '{{ $booking->total_amount }}',
                        '{{ $booking->payment_type }}',
                        '{{ $booking->num_installments }}',
                        '{{ $booking->installment_payment }}',
                        '{{ $booking->status }}'
                    )" style="cursor: pointer; color: white"><i class="fa-solid fa-eye"></i></button>
                    <a href="{{ route('booking.edit',$booking->id)}}" class="btn btn-sm bg-golden"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form method="POST" action="{{ route('booking.delete',$booking->id)}}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-sm bg-golden show_confirm ms-1" data-toggle="tooltip" title='Delete'><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

   </div>
</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this booking?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Deleted!", "The file has been deleted successfully.", "success");
                form.submit();
            }
        });
    });


</script>
@endsection
