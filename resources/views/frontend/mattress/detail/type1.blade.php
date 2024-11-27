@extends('frontend.layout.app')

@section('title')
    {{ $product->name }}
@endsection

@section('content')

<style>
    .product-image {
        max-height: 500px;
        object-fit: cover;
        border-radius: 8px;
    }
    .product-details {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
    }
    .product-options {
        margin-top: 20px;
    }
    .price {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    .original-price {
        text-decoration: line-through;
        color: #999;
        margin-right: 10px;
    }
    .offer-price {
        color: #e63946;
        font-weight: bold;
    }
</style>

<div class="container my-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid product-image">
        </div>
        
        <!-- Product Details -->
        <div class="col-md-6">
            <div class="product-details">
                <h1 class="mb-3">{{ $product->name }}</h1>
                <p class="lead">{{ $product->description }}</p>

                <!-- Price Section -->
                <div class="price">
                    <span class="original-price" id="original-price">₹{{ number_format($product->price, 2) }}</span>
                    <span class="offer-price" id="offer-price">₹{{ number_format($product->offer_price, 2) }}</span>
                </div>

                <!-- Mattress Size -->
                <div class="product-options">
                    <label for="size" class="form-label">Select Mattress Size</label>
                    <div class="btn-group d-block" role="group" aria-label="Mattress Sizes">
                        @foreach($sizes as $size)
                            <input type="radio" 
                                class="btn-check" 
                                name="size" 
                                id="size-{{ $size->id }}" 
                                value="{{ $size->id }}" 
                                autocomplete="off" 
                                @if($loop->first) checked @endif>
                            <label class="btn btn-outline-primary" for="size-{{ $size->id }}">{{ $size->name }}</label>
                        @endforeach
                    </div>
                </div>


                <!-- Unit of Measurement -->
                <div class="product-options">
                    <label for="unit" class="form-label">Select Unit of Measurement</label>
                    <select class="form-select" id="unit" name="unit">
                        @foreach($units as $unit)
                            <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Step 3: Length & Width -->
                <div class="product-options">
                    <label for="product_dimensions" class="form-label">Step 3: Length & Width</label>
                    <select class="form-select" id="product_dimensions" name="product_dimensions">
                        <!-- Options will be populated dynamically -->
                    </select>
                </div>

                <!-- Mattress Thickness -->
                <div class="product-options">
                    <label for="thickness" class="form-label">Select Mattress Thickness</label>
                    <select class="form-select" id="thickness" name="thickness">
                        @foreach($thicknesses as $thickness)
                            <option value="{{ $thickness->id }}" 
                                    data-inches="{{ $thickness->value_in_inches }}" 
                                    data-feet="{{ $thickness->value_in_feet }}" 
                                    data-cm="{{ $thickness->value_in_cm }}">
                                {{ $thickness->value_in_inches }} inches
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('matress-script')

<!-- <script src="{{ asset('matress.js') }}"></script> -->

<script>
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
                                `<option value="${variant.id}">${dimensionText}</option>`
                            );
                        });
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
    });
</script>

@endsection
