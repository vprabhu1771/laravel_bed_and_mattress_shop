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
                <label for="size" class="form-label d-block">Select Mattress Size</label>
                <div class="btn-group" role="group" aria-label="Mattress Sizes">
                    @foreach($sizes as $size)
                        <input type="radio" class="btn-check" name="size" id="size-{{ $size->id }}" value="{{ $size->id }}" autocomplete="off">
                        <label class="btn btn-outline-primary" for="size-{{ $size->id }}">{{ $size->name }}</label>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="unit" class="form-label">Select Unit of Measurement</label>
                <select class="form-select" id="unit" name="unit">
                    @foreach($units as $unit)
                        <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
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
    
    <script src="{{ asset('main.js') }}"></script>
</body>
</html>
