$(document).ready(function () {
    // Load regions
    $.get("../alumni/fetch/fetch_regions.php", function (data) {
        let regions = JSON.parse(data);
        regions.forEach(region => {
            $("#region").append(new Option(region.name, region.reg_code));
        });
    });

    // Load provinces when region changes
    $("#region").change(function () {
        let reg_code = $(this).val();
        $("#province").html('<option value="">Select Province</option>').prop("disabled", !reg_code);
        $("#city").html('<option value="">Select City</option>').prop("disabled", true);
        $("#barangay").html('<option value="">Select Barangay</option>').prop("disabled", true);

        if (reg_code) {
            $.get("../alumni/fetch/fetch_provinces.php", { reg_code }, function (data) {
                let provinces = JSON.parse(data);
                provinces.forEach(province => {
                    $("#province").append(new Option(province.name, province.prv_code));
                });
            });
        }
    });

    // Load municipalities when province changes
    $("#province").change(function () {
        let prv_code = $(this).val();
        $("#city").html('<option value="">Select City</option>').prop("disabled", !prv_code);
        $("#barangay").html('<option value="">Select Barangay</option>').prop("disabled", true);

        if (prv_code) {
            $.get("../alumni/fetch/fetch_municipalities.php", { prv_code }, function (data) {
                let municipalities = JSON.parse(data);
                municipalities.forEach(municipality => {
                    $("#city").append(new Option(municipality.name, municipality.mun_code));
                });
            });
        }
    });

    // Load barangays when city changes
    $("#city").change(function () {
        let mun_code = $(this).val();
        $("#barangay").html('<option value="">Select Barangay</option>').prop("disabled", !mun_code);

        if (mun_code) {
            $.get("../alumni/fetch/fetch_barangays.php", { mun_code }, function (data) {
                let barangays = JSON.parse(data);
                barangays.forEach(barangay => {
                    $("#barangay").append(new Option(barangay.name, barangay.bgy_code));
                });
            });
        }
    });
});


// eduacational background
function addFields() {
    const d1 = document.getElementById('d1');
    const newField = document.createElement('div');
    newField.classList.add('input-group', 'd-flex', 'mt-2');
    newField.innerHTML = `
                <input class="form-control" type="text" name="degree" placeholder="Degree & Specialization">
                <input class="form-control" type="text" name="college" placeholder="College / University">
                <input class="form-control" type="text" name="year" placeholder="Year Graduated">
                <input class="form-control" type="text" name="honors" placeholder="Honors / Awards Received">
            `;
    d1.appendChild(newField);
}

function removeFields() {
    const d1 = document.getElementById('d1');
    if (d1.children.length > 1) {
        d1.removeChild(d1.lastChild);
    }
}

function addFields2() {
    const d2 = document.getElementById('d2');
    const newField = document.createElement('div');
    newField.classList.add('input-group', 'd-flex', 'mt-2');
    newField.innerHTML = `
                <input class="form-control" type="text" name="exam_name" placeholder="Name Of Examination">
                <input class="form-control" type="text" name="exam_date" placeholder="YYY-MMM-DDD">
                <input class="form-control" type="text" name="exam_rating" placeholder="Rating">
            `;
    d2.appendChild(newField);
}

function removeFields2() {
    const d2 = document.getElementById('d2');
    if (d2.children.length > 1) {
        d2.removeChild(d2.lastChild);
    }
}
// trainings
function addFields(sectionId) {
    let container = document.getElementById(sectionId);
    let newFields = container.cloneNode(true);

    // Clear input values
    newFields.querySelectorAll('input').forEach(input => input.value = '');

    // Append new fields
    container.parentNode.insertBefore(newFields, container.nextSibling);
}

function removeFields(sectionId) {
    let container = document.getElementById(sectionId);
    if (container.parentNode.childElementCount > 2) {
        container.parentNode.removeChild(container.nextSibling);
    }
}



// employment

// no.17
document.addEventListener("DOMContentLoaded", function () {
    const reasonSelect = document.querySelector('[name="reason_not_employed"]');
    const otherReasonInput = document.querySelector('[name="other_reason_specify"]');

    if (reasonSelect) {
        reasonSelect.addEventListener('change', function () {
            if (this.value === 'other_reasons') {
                otherReasonInput.style.display = 'block';
            } else {
                otherReasonInput.style.display = 'none';
            }
        });
    } else {
        console.error("Dropdown element not found in DOM");
    }
});

//no.20
document.addEventListener("DOMContentLoaded", function () {
    const businessTypeSelect = document.querySelector('[name="business_type"]');
    const otherBusinessInput = document.querySelector('[name="other_business_type"]');

    if (businessTypeSelect) {
        businessTypeSelect.addEventListener('change', function () {
            otherBusinessInput.style.display = this.value === 'other' ? 'block' : 'none';
        });
    } else {
        console.error("Dropdown element not found in DOM");
    }
});
// no. 25
document.addEventListener("DOMContentLoaded", function () {
    const breakDurationSelect = document.querySelector('[name="break_duration"]');
    const otherBreakInput = document.querySelector('[name="other_break_duration"]');

    if (breakDurationSelect) {
        breakDurationSelect.addEventListener('change', function () {
            otherBreakInput.style.display = this.value === 'other' ? 'block' : 'none';
        });
    } else {
        console.error("Dropdown element not found in DOM");
    }
});

//no.28
document.addEventListener("DOMContentLoaded", function () {
    // Selecting the correct elements
    const reasonForChangingSelect = document.querySelector('[name="reason_for_changing"]');
    const otherChangingReasonInput = document.querySelector('[name="other_changing_reason"]');

    // Ensure the elements exist before adding event listeners
    if (reasonForChangingSelect) {
        reasonForChangingSelect.addEventListener('change', function () {
            otherChangingReasonInput.style.display = this.value === 'other' ? 'block' : 'none';
        });
    } else {
        console.error("Dropdown for reason_for_changing not found in DOM.");
    }
});

// no. 37
document.addEventListener("DOMContentLoaded", function () {
    const selectField = document.querySelector('[name="competencies_used_in_first_job"]');
    const otherInput = document.querySelector('[name="other_skills_specify"]');

    if (selectField) {
        selectField.addEventListener('change', function () {
            otherInput.style.display = this.value === 'other_skills' ? 'block' : 'none';
        });
    } else {
        console.error("Dropdown for competencies_used_in_first_job not found in DOM.");
    }
});

//no.30
document.addEventListener("DOMContentLoaded", function () {
    const promotionSelect = document.querySelector('[name="time_before_promotion"]');
    const otherPromotionInput = document.querySelector('[name="other_promotion_time"]');

    if (promotionSelect) {
        promotionSelect.addEventListener('change', function () {
            otherPromotionInput.style.display = this.value === 'other' ? 'block' : 'none';
        });
    } else {
        console.error("Dropdown for time_before_promotion not found in DOM.");
    }
});



// modal
document.getElementById('myForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission for demonstration

    // Show the modal
    $('#successModal').modal('show');

    // Simulate a successful submission (replace with actual AJAX/form logic)
    setTimeout(function () {
        document.getElementById('modalBody').classList.add('show-check');
        // Hide the modal after a delay (e.g., 3 seconds)
        setTimeout(function () {
            $('#successModal').modal('hide');
            //reset the modal to the initial state for the next submit.
            document.getElementById('modalBody').classList.remove('show-check');
        }, 3000); // 3000 milliseconds (3 seconds)
    }, 2000); // Simulate 2 seconds of processing
});


document.getElementById('educationform').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('../alumni/validate/education.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const educationModal = new bootstrap.Modal(document.getElementById('education'));
                const modalBody = document.getElementById('modalBody');

                modalBody.classList.remove('show-check');
                modalBody.offsetHeight; // Force repaint for reset animation

                educationModal.show(); // Show the modal first

                // Use the modal's 'shown' event to ensure it's fully displayed before adding the class
                educationModal._element.addEventListener('shown.bs.modal', function () {
                    modalBody.classList.add('show-check');

                    setTimeout(function () {
                        educationModal.hide();
                        modalBody.classList.remove('show-check'); // Reset for next use
                    }, 2000); // Close after 2 seconds
                });
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(() => {
            alert('Failed to submit data. Please try again.');
        });
});


document.getElementById('trainingform').addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('../alumni/validate/training.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const trainingModal = new bootstrap.Modal(document.getElementById('training'));
                trainingModal.show(); // Corrected modal variable

                document.getElementById('training').addEventListener('shown.bs.modal', function () { // Corrected event listener target
                    setTimeout(function () {
                        document.getElementById('modalBody').classList.add('show-check');

                        setTimeout(function () {
                            trainingModal.hide(); // Corrected modal variable
                            document.getElementById('modalBody').classList.remove('show-check');
                        }, 2000);
                    }, 1000);
                });
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(() => {
            alert('Failed to submit data. Please try again.');
        });
});


document.getElementById('employmentform').addEventListener('submit', function (event) {
    event.preventDefault();

    console.log('Form submitted');

    $('#employment').modal('show');

    setTimeout(function () {
        console.log('Adding show-check class');
        document.getElementById('modalBody').classList.add('show-check');

        setTimeout(function () {
            console.log('Hiding successModal');
            $('#successModal').modal('hide');
            document.getElementById('modalBody').classList.remove('show-check');
        }, 3000);
    }, 2000);
});

