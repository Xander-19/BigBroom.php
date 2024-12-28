// Function to handle clicking on the "Apply for Loan" and "Apply for Cash" buttons
function applyForLoanOrCash() {
    var isLoggedIn = false; // Change this to check if the user is logged in

    if (isLoggedIn) {
        // If user is logged in, proceed to loan page
        window.location.href = "loan.php";
    } else {
        // If user is not logged in, redirect to sign up page
        window.location.href = "login.php";
    }
}

// Add event listener to the "Apply for Loan" and "Apply for Cash" buttons
document.addEventListener("DOMContentLoaded", function() {
    var applyButtons = document.querySelectorAll(".button");
    applyButtons.forEach(function(button) {
        button.addEventListener("click", applyForLoanOrCash);
    });
});
