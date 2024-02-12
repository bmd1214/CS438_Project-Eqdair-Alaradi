function validateForm() {
    var name = document.getElementById("name").value;
    var company = document.getElementById("company").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var carType = document.getElementById("carType").value;
    var year = document.getElementById("year").value;
    var price = document.getElementById("price").value;
    var pictures = document.getElementById("pictures");

    // Validate name, company, and other fields as needed
    if (name === "" || company === "" || phone === "" || email === "" || carType === "" || year === "" || price === "") {
        alert("Please fill in all required fields.");
        return false;
    }

    // Validate phone number
    if (phone.length !== 10) {
        alert("Please enter a valid phone number with 10 digits.");
        return false;
    }

    // Validate email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Validate price as a positive number
    if (isNaN(price) || parseFloat(price) <= 0) {
        alert("Please enter a valid positive price.");
        return false;
    }

    // Validate pictures field has at least one file selected
    if (pictures.files.length === 0) {
        alert("Please select at least one picture.");
        return false;
    }

    // Display success message
    alert("Thank You For Contacting With us.");

    // Reset the form
    document.getElementById("formm").reset();

    return true;
}
