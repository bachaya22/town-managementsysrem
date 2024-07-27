@extends('markting.layout.index')
@section('content')
<!-- Recent Sales -->
<div class="pagetitle">
    <h1>Discount</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Discount Customer List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
<div class="card recent-sales overflow-auto pt-4">
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Phone No</th>
                <th scope="col">Plot</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($discounts as $discount)
                <tr>
                  <td>{{ $discount->name }}</td>
                  <td>{{ $discount->phone_no }}</td>
                  <td>{{ $discount->plot_merla }}</td>

                    <td>
                        <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm bg-golden show_confirm ms-1"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this discount details?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Deleted!", "The discount has been deleted successfully.", "success");
                form.submit();
            }
        });
    });


</script>
@endsection
