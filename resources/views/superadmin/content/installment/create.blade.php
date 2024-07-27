@extends('superadmin.layout.index')
@section('content')
<div class="pagetitle">
    <h1>Installment</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Add Installment</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
    <div class="form-group">
        <form action="{{ route('ins.store') }}" method="POST">
            @csrf
            <div class="px-4">
                <label for="customer_name" class="fw-bold">Customer Name</label>
                <select name="booking_id" id="customer_id" class="form-control  mb-2">
                    <option value="" class="fw-bold">Select Customer Name</option>
                    <!-- Populate with customer names from database -->
                    @foreach ($bookings as $booking)
                        <option value="{{ $booking->id }}" data-payment-type="{{ $booking->payment_type }}"
                            data-email="{{ $booking->email }}" data-total="{{ $booking->total_amount }}"
                            data-installments="{{ $booking->num_installments }}"
                            data-installment-amount="{{ $booking->installment_payment }}"
                            data-installment-type="{{ $booking->payment_type }}">
                            {{ $booking->customer->name }}
                        </option>
                    @endforeach
                </select>


            <div class="row">
                <div class="form-group col-6 mt-2" id="email_field" style="display: none;">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" readonly>
                </div>
                <div class="form-group col-6 mt-2" id="total_amount_field" style="display: none;">
                    <label for="total_amount">Total Amount</label>
                    <input type="text" name="total_amount" id="total_amount" class="form-control" readonly>
                </div>
                <div class="form-group col-6 mt-2" id="num_installments_field" style="display: none;">
                    <label for="num_installments">Number of Installments</label>
                    <input type="text" name="num_installments" id="num_installments" class="form-control" readonly>
                </div>
                <div class="form-group col-6 mt-2" id="installment_payment_field" style="display: none;">
                    <label for="installment_payment">Installment Amount</label>
                    <input type="text" name="installment_payment" id="installment_payment" class="form-control" readonly>
                </div>
                <div class="form-group col-6 mt-2" id="installment_type_field" style="display: none;">
                    <label for="installment_type">Installment Type</label>
                    <input type="text" name="installment_type" id="installment_type" class="form-control" readonly>
                </div>
            </div>

            <table class="table border-black" style="width:100%;">
                <thead style="background-color:#447EAE">
                    <tr>
                        <th scope="col" class="col-2 text-center input-table-font border-black">No</th>
                        <th scope="col" class="col-4 text-center input-table-font border-black">Email</th>
                        <th scope="col" class="col-2 text-center input-table-font border-black">Installment Amount</th>
                        <th scope="col" class="col-2 text-center input-table-font border-black">Due Date</th>
                        <th scope="col" class="col-2 text-center input-table-font border-black">Status</th>
                        <th scope="col " class="NoPrint">
                            <button type="button" class="btn btn-sm btn-success border-dark" onclick="addRow()">+</button>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <tr id="row" class="d-none">
                        <td class="pt-3 border-dark"><input type="number" class="form-control" name="installment_no"></td>
                        <td class="pt-3 border-black"><input type="email" class="form-control" name="email"></td>
                        <td class="pt-3 border-black"><input type="number" class="form-control" name="installment_amount">
                        </td>
                        <td class="pt-3 border-black"><input type="date" class="form-control" name="date"></td>
                        <td class="pt-3 border-black">
                            <select name="status" id="" class="p-2">
                                <option value="">Select Status</option>
                                <option value="pending">Pending</option>
                                <option value="paid">Paid</option>
                            </select>
                        </td>
                        <td class="NoPrint">
                            <button type="button" class="btn btn-sm btn-danger mt-2"
                                onclick="deleteRow(this)">X</button>

                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex align-item-center justify-content-center"> <button  type="submit" class="btn btn-golden">Add
                    Installment</button></div>
        </form>
    </div>
</div>
    <script>
        // Get references to the select element and the input fields
        var customerSelect = document.getElementById('customer_id');
        var emailField = document.getElementById('email');
        var totalAmountField = document.getElementById('total_amount');
        var numInstallmentsField = document.getElementById('num_installments');
        var installmentPaymentField = document.getElementById('installment_payment');
        var installmentTypeField = document.getElementById('installment_type');

        // Add event listener to the customer select
        customerSelect.addEventListener('change', function() {
            // Get the selected option
            var selectedOption = customerSelect.options[customerSelect.selectedIndex];
            // Get the data attributes
            var email = selectedOption.getAttribute('data-email');
            var totalAmount = selectedOption.getAttribute('data-total');
            var numInstallments = selectedOption.getAttribute('data-installments');
            var installmentPayment = selectedOption.getAttribute('data-installment-amount');
            var installmentType = selectedOption.getAttribute('data-installment-type');

            // Update the input fields with the data attributes
            emailField.value = email;
            totalAmountField.value = totalAmount;
            numInstallmentsField.value = numInstallments;
            installmentPaymentField.value = installmentPayment;
            installmentTypeField.value = installmentType;

            // Show the input fields
            emailField.parentElement.style.display = 'block';
            totalAmountField.parentElement.style.display = 'block';
            numInstallmentsField.parentElement.style.display = 'block';
            installmentPaymentField.parentElement.style.display = 'block';
            installmentTypeField.parentElement.style.display = 'block';
        })

        function addRow() {
            var newRow = document.getElementById("row").cloneNode(true);
            newRow.classList.remove("d-none");
            var rowCount = document.getElementById("tbody").getElementsByTagName("tr").length;

            newRow.id = "row_" + rowCount; // Assign a unique ID to the new row

            // Update input fields with unique names
            newRow.querySelector('input[name="installment_no"]').setAttribute("name", "installment_no_" + rowCount);
            newRow.querySelector('input[name="email"]').setAttribute("name", "installment_email_" + rowCount);
            newRow.querySelector('input[name="installment_amount"]').setAttribute("name", "installment_amount_" + rowCount);
            newRow.querySelector('input[name="date"]').setAttribute("name", "installment_date_" + rowCount);
            newRow.querySelector('select[name="status"]').setAttribute("name", "installment_status_" + rowCount);

            document.getElementById("tbody").appendChild(newRow);
        }




        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }



        customerSelect.addEventListener('change', function() {
            var selectedOption = customerSelect.options[customerSelect.selectedIndex];
            var bookingId = selectedOption.value;

            // Make AJAX request to fetch installments
            fetch(`/get-installments/${bookingId}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    for (let i = 0; i < data.length; i++) {
                        addRow();
                        console.log(i);
                        var newRow = document.getElementById("row_" + (Number(i) + 1));
                        // console.log("row_" + Number(i) + 1);

                        newRow.querySelector(`input[name="installment_no_${i + 1}"]`).value = data[i]
                            .installment_no;
                        newRow.querySelector(`input[name="installment_email_${i + 1}"]`).value = data[i].email;
                        newRow.querySelector(`input[name="installment_amount_${i + 1}"]`).value = data[i]
                            .installment_amount;
                        newRow.querySelector(`input[name="installment_date_${i + 1}"]`).value = data[i].date;
                        newRow.querySelector(`select[name="installment_status_${i + 1}"]`).value = data[i]
                            .installment_status;

                        newRow.querySelectorAll('input, select').forEach(function(element) {
                            element.disabled = true;
                        });
                    }

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        function editRow(button) {
            var row = button.parentNode.parentNode;
            var rowId = row.id;
            enableRowInputs(rowId);
        }


        function enableRowInputs(rowId) {
            var row = document.getElementById(rowId);
            row.querySelectorAll('input, select').forEach(function(element) {
                element.disabled = false;
            });
        }
    </script>
@endsection
