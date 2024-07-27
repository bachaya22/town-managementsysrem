@extends('superadmin.layout.index')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<div class="pagetitle">
    <h1>Installment</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Installment list</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
<div class="card recent-sales overflow-auto">
    <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('ins.create') }}" class="btn btn-golden mt-3">Add Installments</a>
        </div>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Plot No</th>
                    <th>Marla</th>
                    <th>Plot Type</th>
                    <th>Total Amount</th>
                    <th>Payment Type</th>
                    <th>Monthly Installment</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $processedBookings = [];
                @endphp
                @foreach ($installments as $installment)
                @if (!in_array($installment->booking->id, $processedBookings))
                <tr>
                    {{--  {{ dd($installment) }}  --}}
                    <td>{{ $installment->booking->customer->name }}</td>
                    <td>{{ $installment->booking->add_plot_id }}</td>
                    <td>{{ $installment->booking->marla }}</td>
                    <td>{{ $installment->booking->plot_type }}</td>
                    <td>{{ $installment->booking->total_amount }}</td>
                    <td>{{ $installment->booking->payment_type }}</td>
                    <td>{{ $installment->booking->installment_payment }}</td>
                    <td>
                        @if ($installment->booking->status == 'booked')
                        <span class="btn btn-sm text-white px-2" style="background-color: green;">Booked</span>
                    @else
                        <span class="btn btn-sm text-white px-2" style="background-color: red;">Pending</span>
                    @endif
                    </td>
                    <td class="d-flex">
                        <button type="button" class="btn btn-sm bg-golden"
                            onclick="toggleInstallments('{{ $installment->id }}')"><i class="fa-solid fa-eye"></i></button>
                            <form method="POST" action="{{ route('ins.delete',$installment->id)}}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-sm bg-golden show_confirm ms-1" data-toggle="tooltip" title='Delete'><i class="fa-solid fa-trash"></i></button>
                            </form>
                    </td>
                </tr>
                <tr id="Installment-{{ $installment->id }}" class="collapse">
                    <td colspan="8">
                        <!-- Display orders associated with the invoice -->
                        <table class="table table-bordered installment-table text-white">
                            <thead>
                                <tr>
                                    <th class="text-center heading-read-1">Installment No</th>
                                    <th class="text-center heading-read-1">Email</th>
                                    <th class="text-center heading-read-1">Installment Amount</th>
                                    <th class="text-center heading-read-1">Due Date</th>
                                    <th class="text-center heading-read-1">Installment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($installment->booking->installments as $bookingInstallment)
                                <tr>
                                    <td>{{ $bookingInstallment->installment_no }}</td>
                                    <td>{{ $bookingInstallment->email }}</td>
                                    <td>{{ $bookingInstallment->installment_amount }}</td>
                                    <td>{{ $bookingInstallment->date }}</td>
                                    <td>
                                        @if ($bookingInstallment->installment_status == 'paid')
                                        <span class="btn btn-sm text-white px-2" style="background-color: green;">Paid</span>
                                    @else
                                        <span class="btn btn-sm text-white px-2" style="background-color: red;">Pending</span>
                                    @endif

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                @php
                $processedBookings[] = $installment->booking->id;
                @endphp
                @endif

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
            title: `Are you sure you want to delete this Installmant?`,
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

<script>
    function toggleInstallments(booking_id) {
    var ordersSection = document.getElementById('Installment-' + booking_id);
    var orderTable = ordersSection.querySelector('.installment-table');

    if (ordersSection.style.display === 'none' || ordersSection.style.display === '') {
      ordersSection.style.display = 'table-row';
      setTimeout(function() {
        orderTable.style.display = 'table';
      }, 20);
    } else {
      orderTable.style.display = 'none';
      setTimeout(function() {
        ordersSection.style.display = 'none';
      }, 200);
    }
  }
</script>
