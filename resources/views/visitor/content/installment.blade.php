@extends('visitor.layout.index')
@section('content')
<section class="container py-2 contact-main my-5">
    <div class="container mt-5 mb-5 px-4">
        <h2 class="text-center fw-bold pb-3 text-golden">Installments</h2>


        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-golden">Installment No</th>
                    <th class="text-golden">Email</th>
                    <th class="text-golden">Amount</th>
                    <th class="text-golden">Due Date</th>
                    <th class="text-golden">Status</th>
                </tr>
            </thead>
            <tbody>


                @forelse ($installments as $installment)
                    <tr>
                        <td class="fw-bold text-golden">{{ $installment->installment_no }}</td>
                        <td>{{ $installment->email }}</td>
                        <td>{{ $installment->installment_amount }}</td>
                        <td>{{ $installment->date }}</td>
                        <td> @if ($installment->installment_status == 'paid')
                            <span class="btn btn-sm text-white px-3" style="background-color: green;">Paid</span>
                        @else
                            <span class="btn btn-sm text-white px-2" style="background-color: red;">Pending</span>
                        @endif</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No installments found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

@endsection
