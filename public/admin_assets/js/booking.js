// Get references to the select element and the input fields
var customerSelect = document.getElementById('customer_id');
var emailField = document.getElementById('email');
var cnicField = document.getElementById('cnic');
var phoneField = document.getElementById('phone');

// Add event listener to the customer select
customerSelect.addEventListener('change', function() {
    // Get the selected option
    var selectedOption = customerSelect.options[customerSelect.selectedIndex];
    // Get the data attributes
    var email = selectedOption.getAttribute('data-email');
    var cnic = selectedOption.getAttribute('data-cnic');
    var phone = selectedOption.getAttribute('data-phone');

    // Update the input fields with the data attributes
    emailField.value = email;
    cnicField.value = cnic;
    phoneField.value = phone;

    // Show the input fields
    emailField.parentElement.style.display = 'block';
    cnicField.parentElement.style.display = 'block';
    phoneField.parentElement.style.display = 'block';
});

// Get references to the select element and the input fields
var plotSelect = document.getElementById('add_plot_id');
var marlaField = document.getElementById('marla');
var plotTypeField = document.getElementById('plot_type');
var categoriesField = document.getElementById('categories');
var totalAmountField = document.getElementById('total_amount');

// Add event listener to the plot select
plotSelect.addEventListener('change', function() {
    // Get the selected option
    var selectedOption = plotSelect.options[plotSelect.selectedIndex];
    // Get the data attributes
    var marla = selectedOption.getAttribute('data-marla');
    var plotType = selectedOption.getAttribute('data-plot-type');
    var categories = selectedOption.getAttribute('data-categories');
    var totalAmount = selectedOption.getAttribute('data-total');

    console.log("Total Amount: " + totalAmount);

    // Update the input fields with the data attributes
    marlaField.value = marla;
    plotTypeField.value = plotType;
    categoriesField.value = categories;
    totalAmountField.value = totalAmount;

    console.log("Total Amount: " + totalAmountField.value);


    // Show the input fields
    marlaField.parentElement.style.display = 'block';
    plotTypeField.parentElement.style.display = 'block';
    categoriesField.parentElement.style.display = 'block';
    totalAmountField.parentElement.style.display = 'block';
});


function checkPlotSelected() {
    if (plotSelect.value === "") {
        alert("Please select a plot before choosing the payment type.");
        return false;
    }
    return true;
}

var fullPaymentRadio = document.getElementById('full_payment');
var installmentPlanRadio = document.getElementById('installment_plan');
var installmentPaymentField = document.getElementById('installment_payment_field');
var numInstallmentsField = document.getElementById('num_installments_field');
var totalPaymentField = document.getElementById('total_payment_field');
var totalPayment = document.getElementById('total_payment');

// Add event listeners to the radio buttons
fullPaymentRadio.addEventListener('change', function() {
    if (!checkPlotSelected()) {
        fullPaymentRadio.checked = false;
        return;
    }
    // Show or hide relevant fields based on the selected payment type
    if (fullPaymentRadio.checked) {
        installmentPaymentField.style.display = 'none';
        numInstallmentsField.style.display = 'none';
        totalPayment.value = totalAmountField.value;
        totalPaymentField.style.display = 'block';
    }
});

installmentPlanRadio.addEventListener('change', function() {
    if (!checkPlotSelected()) {
        installmentPlanRadio.checked = false;
        return;
    }
    // Show or hide relevant fields based on the selected payment type
    if (installmentPlanRadio.checked) {
        installmentPaymentField.style.display = 'block';
        numInstallmentsField.style.display = 'block';
        totalPaymentField.style.display = 'none';
    }
});

// Calculate installment payment amount based on the total amount and number of installments
document.getElementById('num_installments').addEventListener('input', function() {
    var totalAmount = parseFloat(document.getElementById('total_amount').value);
    var numInstallments = parseFloat(this.value);
    var installmentPayment = (totalAmount / numInstallments).toFixed(2);
    document.getElementById('installment_payment').value = installmentPayment;
});

//edit
 // Get references to the select element and the input fields
 var customerSelect = document.getElementById('customer_id');
 var emailField = document.getElementById('email');
 var cnicField = document.getElementById('cnic');
 var phoneField = document.getElementById('phone');

 // Add event listener to the customer select
 customerSelect.addEventListener('change', function() {
     // Get the selected option
     var selectedOption = customerSelect.options[customerSelect.selectedIndex];
     // Get the data attributes
     var email = selectedOption.getAttribute('data-email');
     var cnic = selectedOption.getAttribute('data-cnic');
     var phone = selectedOption.getAttribute('data-phone');

     // Update the input fields with the data attributes
     emailField.value = email;
     cnicField.value = cnic;
     phoneField.value = phone;

     // Show the input fields
     emailField.parentElement.style.display = 'block';
     cnicField.parentElement.style.display = 'block';
     phoneField.parentElement.style.display = 'block';
 });


 // Get references to the select element and the input fields
 var plotSelect = document.getElementById('add_plot_id');
 var marlaField = document.getElementById('marla');
 var plotTypeField = document.getElementById('plot_type');
 var categoriesField = document.getElementById('categories');
 var totalAmountField = document.getElementById('total_amount');

 // Add event listener to the plot select
 plotSelect.addEventListener('change', function() {
     // Get the selected option
     var selectedOption = plotSelect.options[plotSelect.selectedIndex];
     // Get the data attributes
     var marla = selectedOption.getAttribute('data-marla');
     var plotType = selectedOption.getAttribute('data-plot-type');
     var categories = selectedOption.getAttribute('data-categories');
     var totalAmount = selectedOption.getAttribute('data-total');

     console.log("Total Amount: " + totalAmount);

     // Update the input fields with the data attributes
     marlaField.value = marla;
     plotTypeField.value = plotType;
     categoriesField.value = categories;
     totalAmountField.value = totalAmount;

     console.log("Total Amount: " + totalAmountField.value);


     // Show the input fields
     marlaField.parentElement.style.display = 'block';
     plotTypeField.parentElement.style.display = 'block';
     categoriesField.parentElement.style.display = 'block';
     totalAmountField.parentElement.style.display = 'block';
 });


 function checkPlotSelected() {
     if (plotSelect.value === "") {
         alert("Please select a plot before choosing the payment type.");
         return false;
     }
     return true;
 }

 var fullPaymentRadio = document.getElementById('full_payment');
 var installmentPlanRadio = document.getElementById('installment_plan');
 var installmentPaymentField = document.getElementById('installment_payment_field');
 var numInstallmentsField = document.getElementById('num_installments_field');
 var totalPaymentField = document.getElementById('total_payment_field');
 var totalPayment = document.getElementById('total_payment');

 // Add event listeners to the radio buttons
 fullPaymentRadio.addEventListener('change', function() {
     if (!checkPlotSelected()) {
         fullPaymentRadio.checked = false;
         return;
     }
     // Show or hide relevant fields based on the selected payment type
     if (fullPaymentRadio.checked) {
         installmentPaymentField.style.display = 'none';
         numInstallmentsField.style.display = 'none';
         totalPayment.value = totalAmountField.value;
         totalPaymentField.style.display = 'block';
     }
 });

 installmentPlanRadio.addEventListener('change', function() {
     if (!checkPlotSelected()) {
         installmentPlanRadio.checked = false;
         return;
     }
     // Show or hide relevant fields based on the selected payment type
     if (installmentPlanRadio.checked) {
         installmentPaymentField.style.display = 'block';
         numInstallmentsField.style.display = 'block';
         totalPaymentField.style.display = 'none';
     }
 });

 // Calculate installment payment amount based on the total amount and number of installments
 document.getElementById('num_installments').addEventListener('input', function() {
     var totalAmount = parseFloat(document.getElementById('total_amount').value);
     var numInstallments = parseFloat(this.value);
     var installmentPayment = (totalAmount / numInstallments).toFixed(2);
     document.getElementById('installment_payment').value = installmentPayment;
 });
//pop message
function openPopup(name, email, plotId, marla, plotType, categories, totalAmount, paymentType, numInstallments, installmentPayment, status) {
    // Get the modal element
    var modal = document.getElementById('popupModal');

    // Populate the modal with data
    var modalContent = document.getElementById('popupContent');
    modalContent.innerHTML = `
        <table class="table">
            <tbody>
                <tr>
                    <th>Customer Name</th>
                    <td>${name}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>${email}</td>
                </tr>
                <tr>
                    <th>Plot No</th>
                    <td>${plotId}</td>
                </tr>
                <tr>
                    <th>Marla</th>
                    <td>${marla}</td>
                </tr>
                <tr>
                    <th>Plot Type</th>
                    <td>${plotType}</td>
                </tr>
                <tr>
                    <th>Categories</th>
                    <td>${categories}</td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td>${totalAmount}</td>
                </tr>
                <tr>
                    <th>Payment Type</th>
                    <td>${paymentType}</td>
                </tr>
                <tr>
                    <th>Number of Installments</th>
                    <td>${numInstallments}</td>
                </tr>
                <tr>
                    <th>Monthly Installment</th>
                    <td>${installmentPayment}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>${status}</td>
                </tr>
            </tbody>
        </table>
    `;

    // Display the modal
    modal.style.display = 'block';
}

function closePopup() {
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


