document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById("paymentModal");
    var btnSubmit = document.getElementById("btnSubmit");
    var span = document.getElementsByClassName("close")[0];

    btnSubmit.onclick = function(event) {
        event.preventDefault();
        if (validateForm()) {
            modal.style.display = "block";
        }
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    document.getElementById("paymentForm").addEventListener("submit", function(event) {
        event.preventDefault();

        // Check terms and conditions
        if (!document.getElementById("tnc").checked) {
            alert("Please agree to the terms and conditions.");
            return;
        }

        // Collect data from the main form
        const loanTypeElement = document.querySelector('input[name="loanOcash"]:checked');
        if (!loanTypeElement) {
            alert("Please select a loan type.");
            return;
        }

        const civilStatusElement = document.querySelector('input[name="civilStatus"]:checked');
        if (!civilStatusElement) {
            alert("Please select a civil status.");
            return;
        }

        const paymentMethodElement = document.querySelector('input[name="PaymentMethod"]:checked');
        if (!paymentMethodElement) {
            alert("Please select a payment method.");
            return;
        }
    });

    paymentForm.onsubmit = function (event) {
        event.preventDefault();

        // Create a FormData object to hold all form data
        var formData = new FormData(loanForm);

        // Append payment method to the form data
        var paymentMethod = document.querySelector('input[name="PaymentMethod"]:checked').value;
        formData.append('PaymentMethod', paymentMethod);

        // Submit form data via AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "save_loan.php", true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert("Form submitted successfully!");
                modal.style.display = "none";
                loanForm.reset();
                paymentForm.reset();
            } else {
                alert("Error occurred while submitting the form. Please try again.");
            }
        };
        xhr.send(formData);
    }

    function validateForm() {
        var isValid = true;
        var requiredFields = document.querySelectorAll('[required]');

        requiredFields.forEach(function(field) {
            if (!field.value) {
                field.classList.add('error');
                isValid = false;
            } else {
                field.classList.remove('error');
            }
        });

        if (!isValid) {
            alert("Please fill out all required fields.");
        }

        return isValid;
    }
});