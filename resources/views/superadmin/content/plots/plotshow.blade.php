@extends('superadmin.layout.index')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<div id="popupModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close" onclick="closePopup1()">&times;</span>
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

<!-- Recent Sales -->
<div class="col-12">
    <div class="row mb-3">
    <div class="pagetitle">
        <h1>Plots</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Plot list</li>
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
                <a href="{{ route('plot.create') }}" class="btn btn-golden mt-4">Add Plot</a>
            </div>

            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Plot No.</th>
                            <th>Plot Type</th>
                            <th>Categories</th>
                            <th>Marla</th>
                            <th>Price</th>
                            <th>Total Amount</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plots as $plot)
                        <tr>
                            <td>{{ $plot->plotno }}</td>
                            <td>{{ $plot->type }}</td>
                            <td>{{ $plot->categories }}</td>
                            <td>{{ $plot->marla }}</td>
                            <td>{{ $plot->price }}</td>
                            <td>{{ $plot->total_amount }}</td>
                            <td>{{ $plot->description }}</td>
                            <td>
                                @if ($plot->status == '0')
                                <span class="badge bg-primary">Active</span>
                                @elseif ($plot->status == '1')
                                <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <a class="btn btn-sm bg-golden me-1" onclick="openPopup1(
                                    '{{ $plot->plotno }}',
                                    '{{ $plot->type }}',
                                    '{{ $plot->categories }}',
                                    '{{ $plot->length }}',
                                    '{{ $plot->width }}',
                                    '{{ $plot->marla }}',
                                    '{{ $plot->price }}',
                                    '{{ $plot->down_payment }}',
                                    '{{ $plot->total_amount }}',
                                    '{{ $plot->description }}'
                                )" style="cursor: pointer; color: white"><i class="fa-solid fa-eye"></i></a>

                                <a href="{{ route('plot.edit', $plot->id) }}" class="btn btn-sm bg-golden"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form method="POST" action="{{ route('plot.delete', $plot->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm bg-golden show_confirm ms-1" data-toggle="tooltip" title='Delete'><i class="fa-solid fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div><!-- End Recent Sales -->

    {{-- pop up --}}

<script>
    function openPopup1(plotno, type, categories, length, width, marla, price, down_payment, total_amount, description) {
        // Get the modal element
        var modal = document.getElementById('popupModal');

        // Populate the modal with data
        var modalContent = document.getElementById('popupContent');
        modalContent.innerHTML = `
            <table class="table">
                <tbody>
                    <tr>
                        <th class="hover-glow">Plot No</th>
                        <td>${plotno}</td>
                    </tr>
                    <tr>
                        <th class="hover-glow">Type</th>
                        <td>${type}</td>
                    </tr>
                    <tr>
                        <th class="hover-glow">Categories</th>
                        <td>${categories}</td>
                    </tr>
                    <tr>
                        <th class="hover-glow">Length</th>
                        <td>${length}</td>
                    </tr>
                    <tr>
                        <th class="hover-glow">Width</th>
                        <td>${width}</td>
                    </tr>
                    <tr>
                        <th class="hover-glow">Marla</th>
                        <td>${marla}</td>
                    </tr>
                    <tr>
                        <th class="hover-glow">Per-Marla-Price</th>
                        <td>${price}</td>
                    </tr>
                    <tr>
                        <th class="hover-glow">Down Payment</th>
                        <td>${down_payment}</td>
                    </tr>

                    <tr>
                        <th class="hover-glow">Total Amount</th>
                        <td>${total_amount}</td>
                    </tr>
                    <tr>
                        <th class="hover-glow">Description</th>
                        <td>${description}</td>
                    </tr>

                    <!-- Add other rows with data as needed -->
                </tbody>
            </table>
        `;

        // Display the modal
        modal.style.display = 'block';
    }

    function closePopup1() {
        // Hide the modal when the user clicks outside of it or on the "Close" button
        var modal = document.getElementById('popupModal');
        modal.style.display = 'none';
    }

    // Close the modal if the user clicks anywhere outside of the modal content
    window.onclick = function(event) {
        var modal = document.getElementById('popupModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>
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
    document.querySelectorAll('.show_confirm').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const form = this.closest("form");
            swal({
                title: `Are you sure want to delete this plot?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Deleted!", "The Plot has been deleted successfully.", "success").then(() => {
                        form.submit();
                    });
                }
            });
        });
    });
</script>
@endsection
