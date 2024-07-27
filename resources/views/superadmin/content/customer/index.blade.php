@extends('superadmin.layout.index')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<div class="pagetitle mt-2">
    <h1>Customer</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Customer List</li>
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
        <a href="{{ route('customer.create') }}" class="btn btn-golden mt-3">Add Customer</a>
    </div>
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>CNIC</th>
                <th>Phone No.</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->cnic }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
                    @if ($customer->image)
                    <img src="{{ asset('uploads/' . $customer->image) }}" alt="Customer Image" width="50">
                    @else
                    No Image
                    @endif
                </td>
                <td class="d-flex">
                    <a href="{{ route('customer.edit', $customer->id) }}"
                        class="btn btn-sm bg-golden"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form method="POST" action="{{ route('customer.destroy', $customer->id) }}">
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
              title: `Are you sure you want to delete this customer?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                swal("Deleted!", "The Customer has been deleted successfully.", "success");
                form.submit();
            }
          });
      });

</script>

@endsection
