<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mattress Selection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Mattress Selector</h1>
        <form id="mattressForm">
            <div class="mb-3">
                <label for="size" class="form-label">Select Mattress Size</label>
                <select class="form-select" id="size" name="size">
                    <option value="">Choose Size</option>
                    @foreach($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="unit" class="form-label">Select Unit of Measurement</label>
                <select class="form-select" id="unit" name="unit">
                    <option value="">Choose Unit</option>
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="thickness" class="form-label">Select Mattress Thickness</label>
                <select class="form-select" id="thickness" name="thickness">
                    <option value="">Choose Thickness</option>
                    @foreach($thicknesses as $thickness)
                        <option value="{{ $thickness->id }}" 
                                data-inches="{{ $thickness->value_in_inches }}" 
                                data-feet="{{ $thickness->value_in_feet }}" 
                                data-cm="{{ $thickness->value_in_cm }}">
                            {{ $thickness->value_in_inches }} inches ({{ $thickness->value_in_feet }} ft / {{ $thickness->value_in_cm }} cm)
                        </option>
                    @endforeach
                </select>
            </div>

            <div id="thicknessDetails" class="alert alert-info d-none">
                <p><strong>Thickness Details:</strong></p>
                <ul>
                    <li>Inches: <span id="detailInches"></span></li>
                    <li>Feet: <span id="detailFeet"></span></li>
                    <li>Centimeters: <span id="detailCm"></span></li>
                </ul>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Show thickness details dynamically
            $('#thickness').change(function () {
                let selected = $(this).find(':selected');
                let inches = selected.data('inches');
                let feet = selected.data('feet');
                let cm = selected.data('cm');

                if (inches && feet && cm) {
                    $('#detailInches').text(inches);
                    $('#detailFeet').text(feet);
                    $('#detailCm').text(cm);
                    $('#thicknessDetails').removeClass('d-none');
                } else {
                    $('#thicknessDetails').addClass('d-none');
                }
            });

            // Form submission example
            $('#mattressForm').submit(function (e) {
                e.preventDefault();
                let size = $('#size').val();
                let unit = $('#unit').val();
                let thickness = $('#thickness').val();

                if (size && unit && thickness) {
                    alert('Form submitted successfully!');
                } else {
                    alert('Please fill in all the fields.');
                }
            });
        });
    </script>
</body>
</html>
