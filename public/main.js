
$(document).ready(function () {
    console.log("Document Ready");

    // Set the first option as selected for thickness and initialize the details
    function setInitialThicknessDetails() {
        const firstThickness = $('#thickness option').first(); 
        const inches = firstThickness.data('inches');
        const feet = firstThickness.data('feet');
        const cm = firstThickness.data('cm');

        // Set the details for thickness
        $('#detailInches').text(inches);
        $('#detailFeet').text(feet);
        $('#detailCm').text(cm);
        $('#thicknessDetails').removeClass('d-none');
    }

    // Initialize the thickness details on page load
    setInitialThicknessDetails();

    // Change the display of thickness values based on the selected unit
    $('#unit').on('change', function () {
        const selectedUnit = $(this).val();
        const thicknessOptions = $('#thickness option');

        thicknessOptions.each(function () {
            const option = $(this);

            // Show options based on the selected unit
            if (selectedUnit === 'Inches' && option.data('inches')) {
                option.text(`${option.data('inches')} inches`).removeClass('d-none');
            } else if (selectedUnit === 'Feet' && option.data('feet')) {
                option.text(`${option.data('feet')} ft`).removeClass('d-none');
            } else if (selectedUnit === 'cm' && option.data('cm')) {
                option.text(`${option.data('cm')} cm`).removeClass('d-none');
            } else {
                option.addClass('d-none');
            }
        });

        // Reset the thickness dropdown selection
        // $('#thickness').val('');
        // Reinitialize the thickness details
        setInitialThicknessDetails();
    });

    // Show thickness details dynamically when thickness is changed
    $('#thickness').on('change', function () {
        const selected = $(this).find(':selected');
        const inches = selected.data('inches');
        const feet = selected.data('feet');
        const cm = selected.data('cm');

        if (inches || feet || cm) {
            $('#detailInches').text(inches || '-');
            $('#detailFeet').text(feet || '-');
            $('#detailCm').text(cm || '-');
            $('#thicknessDetails').removeClass('d-none');
        } else {
            $('#thicknessDetails').addClass('d-none');
        }
    });

    // Form submission handler
    $('#mattressForm').on('submit', function (e) {
        e.preventDefault();

        const size = $('input[name="size"]:checked').val();
        const unit = $('#unit').val();
        const thickness = $('#thickness').val();

        if (size && unit && thickness) {
            alert('Form submitted successfully!');
        } else {
            alert('Please fill in all the fields.');
        }
    });
});
    