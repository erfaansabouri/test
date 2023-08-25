$(document).ready(function() {
    $('.price-input').on('input', function() {
        var inputValue = $(this).val();
        var intValue = parseInt(inputValue.replace(/\D/g, '')); // Parse integer from cleaned input

        if (!isNaN(intValue)) {
            // Format integer value with comma separators
            var formattedValue = intValue.toLocaleString();
            $(this).val(formattedValue);
        } else {
            $(this).val('');
        }
    });
});
