
// $(document).ready(function () {

//     // Set the first option as selected for thickness and initialize the details
//     function setInitialThicknessDetails() {
//         const firstThickness = $('#thickness option').first();
//         const inches = firstThickness.data('inches');
//         const feet = firstThickness.data('feet');
//         const cm = firstThickness.data('cm');

//         // Set the details for thickness
//         $('#detailInches').text(inches);
//         $('#detailFeet').text(feet);
//         $('#detailCm').text(cm);
//         $('#thicknessDetails').removeClass('d-none');
//     }

//     // Initialize the thickness details on page load
//     setInitialThicknessDetails();

//     // Function to fetch product variants based on selected size
//     function fetchVariants(selectedSizeId) {
//         // Send AJAX request to the backend
//         $.ajax({
//             url: "{{ route('mattresses.fetch.variant') }}", // Route for fetching product variants
//             method: "GET", // HTTP method
//             data: {
//                 size_id: selectedSizeId // Pass the selected size ID
//             },
//             success: function (response) {
//                 // Handle successful response
//                 console.log('Variants:', response);

//                 // Populate the product dimensions dropdown
//                 const productDimensionsDropdown = $('#product_dimensions');
//                 productDimensionsDropdown.empty(); // Clear previous options

//                 // Check if there are variants and update the price display
//                 if (response.variants.length > 0) {
//                     // Assuming the response contains variants, update the price display
//                     const selectedVariant = response.variants[0]; // You can customize which variant to select
//                     const price = parseFloat(selectedVariant.price).toFixed(2);

//                     // Update the displayed price on the page
//                     $('#offer-price').text('₹' + price);

//                     // Populate the product dimensions dropdown
//                     response.variants.forEach(function (variant) {
//                         const dimensions = variant.product_dimensions;
//                         const dimensionText = `${dimensions.inches} (Inches) | ${dimensions.feet} (Feet) | ${dimensions.cm} (cm)`;

//                         // Create an option element and append it to the dropdown
//                         productDimensionsDropdown.append(
//                             `<option 
//                                 value="${variant.id}"
//                                 data-inches="${dimensions.inches}" 
//                                 data-feet="${dimensions.feet}" 
//                                 data-cm="${dimensions.cm}">
//                                 ${dimensionText}
//                             </option>`
//                         );
//                     });

//                     // Listen for changes on the product dimensions dropdown
//                     $('#product_dimensions').on('change', function () {
//                         // Get the currently selected value
//                         const selectedOption = $(this).find(':selected'); // Get the selected <option> element

//                         const selectedValue = $(this).val(); // Get the selected option's value

//                         const inches = selectedOption.data('inches'); // Fetch the data-inches attribute
//                         const feet = selectedOption.data('feet'); // Fetch the data-feet attribute
//                         const cm = selectedOption.data('cm'); // Fetch the data-cm attribute
                        
//                         console.log('Selected Product Dimension ID:', selectedValue);
//                         console.log(`Dimensions: Inches: ${inches}, Feet: ${feet}, CM: ${cm}`);

//                         // Optional: Find and log the corresponding variant details
//                         const selectedVariant = response.variants.find(
//                             (variant) => variant.id == selectedValue
//                         );

//                         // const selectedVariant = response.variants.find(v => v.id == selectedVariantId);

//                         if (selectedVariant) {
//                             console.log('Selected Variant Details:', selectedVariant);

//                             // Update the displayed price on the page
//                             const price = parseFloat(selectedVariant.price).toFixed(2); // Format the price
//                             $('#offer-price').text('₹' + price); // Update the price display
//                         }
//                     });

//                     // Automatically trigger the change event after populating the dropdown to handle the default selection
//                     if (response.variants.length > 0) {
//                         productDimensionsDropdown.val(response.variants[0].id).trigger('change');
//                     }

//                 } else {
//                     // Handle case where there are no variants
//                     $('#offer-price').text('No variants available');
//                 }
//             },
//             error: function (xhr, status, error) {
//                 // Handle errors
//                 console.error('Error:', error);
//                 $('#offer-price').text('Error fetching price');
//             }
//         });
//     }

//     // Listen for changes to the mattress size radio buttons
//     $('input[name="size"]').on('change', function () {
//         const selectedSizeId = $('input[name="size"]:checked').val();
//         fetchVariants(selectedSizeId); // Call the function to fetch variants
//     });

//     // Trigger the event on page load to fetch variants for the default size
//     const defaultSizeId = $('input[name="size"]:checked').val();
//     if (defaultSizeId) {
//         fetchVariants(defaultSizeId); // Fetch variants for the initial selection
//     }


//     // Change the display of thickness values based on the selected unit
//     $('#unit').on('change', function () {
//         const selectedUnit = $(this).val();
//         const thicknessOptions = $('#thickness option');

//         thicknessOptions.each(function () {
//             const option = $(this);

//             // Show options based on the selected unit
//             if (selectedUnit === 'Inches' && option.data('inches')) {
//                 option.text(`${option.data('inches')} inches`).removeClass('d-none');
//             } else if (selectedUnit === 'Feet' && option.data('feet')) {
//                 option.text(`${option.data('feet')} ft`).removeClass('d-none');
//             } else if (selectedUnit === 'cm' && option.data('cm')) {
//                 option.text(`${option.data('cm')} cm`).removeClass('d-none');
//             } else {
//                 option.addClass('d-none');
//             }
//         });

//         // Reinitialize the thickness details for the newly selected unit
//         setInitialThicknessDetails();
//     });

//     // Show thickness details dynamically when thickness is changed
//     $('#thickness').on('change', function () {
//         const selected = $(this).find(':selected');
//         const inches = selected.data('inches');
//         const feet = selected.data('feet');
//         const cm = selected.data('cm');

//         if (inches || feet || cm) {
//             $('#detailInches').text(inches || '-');
//             $('#detailFeet').text(feet || '-');
//             $('#detailCm').text(cm || '-');
//             $('#thicknessDetails').removeClass('d-none');
//         } else {
//             $('#thicknessDetails').addClass('d-none');
//         }
//     });
// });


$(document).ready(function () {

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

    // Function to fetch product variants based on selected size
    function fetchVariants(selectedSizeId) {
        // Send AJAX request to the backend
        $.ajax({
            url: "{{ route('mattresses.fetch.variant') }}", // Route for fetching product variants
            method: "GET", // HTTP method
            data: {
                size_id: selectedSizeId // Pass the selected size ID
            },
            success: function (response) {
                // Handle successful response
                console.log('Variants:', response);

                // Populate the product dimensions dropdown
                const productDimensionsDropdown = $('#product_dimensions');

                const unitSelector = $('#unit');

                productDimensionsDropdown.empty(); // Clear previous options

                // Check if there are variants and update the price display
                if (response.variants.length > 0) {
                    // Assuming the response contains variants, update the price display
                    const selectedVariant = response.variants[0]; // You can customize which variant to select
                    const price = parseFloat(selectedVariant.price).toFixed(2);

                    // Update the displayed price on the page
                    $('#offer-price').text('₹' + price);

                    // Populate the product dimensions dropdown
                    response.variants.forEach(function (variant) {
                        const dimensions = variant.product_dimensions;
                        const dimensionText = `${dimensions.inches} (Inches) | ${dimensions.feet} (Feet) | ${dimensions.cm} (cm)`;

                        // Create an option element and append it to the dropdown
                        productDimensionsDropdown.append(
                            `<option 
                                value="${variant.id}"
                                data-inches="${dimensions.inches}" 
                                data-feet="${dimensions.feet}" 
                                data-cm="${dimensions.cm}">
                                ${dimensionText}
                            </option>`
                        );
                    });

                    // Listen for changes in the unit selector
                    unitSelector.on('change', function () {
                        const selectedUnit = $(this).val(); // Get selected unit
                        console.log(selectedUnit);
                        
                        const options = productDimensionsDropdown.find('option');

                        options.each(function () {
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

                        // Automatically trigger the change event to select the first visible option
                        productDimensionsDropdown.find('option:not(.d-none)').first().prop('selected', true).trigger('change');
                    });

                    // Trigger change on unit selector to initialize options
                    unitSelector.trigger('change');

                    // Listen for changes on the product dimensions dropdown
                    $('#product_dimensions').on('change', function () {
                        // Get the currently selected value
                        const selectedOption = $(this).find(':selected'); // Get the selected <option> element

                        const selectedValue = $(this).val(); // Get the selected option's value

                        const inches = selectedOption.data('inches'); // Fetch the data-inches attribute
                        const feet = selectedOption.data('feet'); // Fetch the data-feet attribute
                        const cm = selectedOption.data('cm'); // Fetch the data-cm attribute
                        
                        console.log('Selected Product Dimension ID:', selectedValue);
                        console.log(`Dimensions: Inches: ${inches}, Feet: ${feet}, CM: ${cm}`);

                        // Optional: Find and log the corresponding variant details
                        const selectedVariant = response.variants.find(
                            (variant) => variant.id == selectedValue
                        );

                        // const selectedVariant = response.variants.find(v => v.id == selectedVariantId);

                        if (selectedVariant) {
                            console.log('Selected Variant Details:', selectedVariant);

                            // Update the displayed price on the page
                            const price = parseFloat(selectedVariant.price).toFixed(2); // Format the price
                            $('#offer-price').text('₹' + price); // Update the price display
                        }
                    });

                    // Automatically trigger the change event after populating the dropdown to handle the default selection
                    if (response.variants.length > 0) {
                        productDimensionsDropdown.val(response.variants[0].id).trigger('change');
                    }

                } else {
                    // Handle case where there are no variants
                    $('#offer-price').text('No variants available');
                }
            },
            error: function (xhr, status, error) {
                // Handle errors
                console.error('Error:', error);
                $('#offer-price').text('Error fetching price');
            }
        });
    }

    // Listen for changes to the mattress size radio buttons
    $('input[name="size"]').on('change', function () {
        const selectedSizeId = $('input[name="size"]:checked').val();
        fetchVariants(selectedSizeId); // Call the function to fetch variants
    });

    // Trigger the event on page load to fetch variants for the default size
    const defaultSizeId = $('input[name="size"]:checked').val();
    if (defaultSizeId) {
        fetchVariants(defaultSizeId); // Fetch variants for the initial selection
    }


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

        // Reinitialize the thickness details for the newly selected unit
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

    // Handle product dimensions dropdown changes
    $('#product_dimensions').on('change', function () {
        const selectedOption = $(this).find(':selected');
        const selectedValue = $(this).val();
        const inches = selectedOption.data('inches');
        const feet = selectedOption.data('feet');
        const cm = selectedOption.data('cm');

        console.log(`Selected Dimension ID: ${selectedValue}, Inches: ${inches}, Feet: ${feet}, CM: ${cm}`);
    });
});