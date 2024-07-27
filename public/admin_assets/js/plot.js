
    function calculateMarla() {
        // Get the values of length and width
        var length = parseFloat(document.getElementById('input1').value);
        var width = parseFloat(document.getElementById('input2').value);

        // Check if length and width are valid numbers
        if (!isNaN(length) && !isNaN(width)) {
            // Calculate the area in square feet
            var areaSqft = length * width;

            // Convert square feet to Marla (1 Marla = 272.25 square feet)
            var marla = areaSqft / 272.25;

            // Display the result in the Marla input field
            document.getElementById('result').value = marla.toFixed(2); // Round to 2 decimal places

            return marla;
        } else {
            // If either length or width is not a valid number, display an error or handle it as needed
            document.getElementById('result').value = ''; // Clear the Marla input field
            return NaN; // Return NaN if calculation cannot be performed
        }
    }

    function calculateTotal() {
        // Get the per-Marla price
        var perMarlaPrice = parseFloat(document.getElementById('per_marla_price').value);

        // Get the Marla value
        var marla = calculateMarla();

        // Check if perMarlaPrice and marla are valid numbers
        if (!isNaN(perMarlaPrice) && !isNaN(marla)) {
            // Calculate total amount by multiplying the exact Marla with per Marla Price
            var totalAmount = perMarlaPrice * marla;

            // Display the total amount
            document.getElementById('total_amount').value = totalAmount.toFixed(2);
        } else {
            // If either perMarlaPrice or marla is not a valid number, display an error or handle it as needed
            document.getElementById('total_amount').value = ''; // Clear the Total Amount input field
        }
    }

