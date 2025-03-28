$('#verifyForm').submit(function(e) {
    e.preventDefault();

    $('#modalMessage').text('Verifying... Please wait.');
    const verificationModal = new bootstrap.Modal(document.getElementById('verificationModal'));
    verificationModal.show();

    $.ajax({
        url: '../alumni/validate/graduate.php',
        method: 'POST',
        data: $('#verifyForm').serialize(),
        success: function(response) {
            console.log(response);  // Debugging - Check server response
            const result = typeof response === 'object' ? response : JSON.parse(response);

            if (result.status === 'verified') {
                $('#modalMessage').text('✅ Verification Successful!');
                setTimeout(() => {
                    window.location.href = result.redirect;
                }, 2000);
            } else if (result.status === 'new_student') {
                $('#modalMessage').html(
                    '🆕 <strong>Your details have been submitted.</strong> Please wait for admin approval.'
                );
            } else if (result.status === 'not_verified') {
                $('#modalMessage').text('❌ Please wait for admin approval.');
            } else if (result.status === 'invalid') {
                $('#modalMessage').text('⚠️ Invalid details. Please check your information.');
            } else {
                $('#modalMessage').text('❗ Unexpected response from server.');
            }
        },
        error: function() {
            $('#modalMessage').text('❗ Error occurred. Please try again.');
        }
    });
});




    document.addEventListener("DOMContentLoaded", function() {
    // Generate options for graduation year
    const startYear = 1992;
    const currentYear = new Date().getFullYear();
    const graduationYearSelect = document.getElementById("graduationYear");

    // Loop to generate year ranges and append options
    for (let year = startYear; year < currentYear; year++) {
        const nextYear = year + 1;
        const option = document.createElement("option");
        option.value = `${year}-${nextYear}`;
        option.textContent = `${year}-${nextYear}`;
        graduationYearSelect.appendChild(option);
    }
});
