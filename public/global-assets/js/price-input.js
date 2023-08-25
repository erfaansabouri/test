$(document).ready(function() {

    function formatAndSetCommas(inputElement) {
        var inputValue = $(inputElement).val();
        var intValue = parseInt(inputValue.replace(/\D/g, '')); // Parse integer from cleaned input

        if (!isNaN(intValue)) {
            // Format integer value with comma separators
            var formattedValue = intValue.toLocaleString();
            $(inputElement).val(formattedValue);
        } else {
            $(inputElement).val('');
        }
    }


    $('.price-input').each(function() {
        formatAndSetCommas(this);
    });

    $('.price-input').on('input', function() {
        formatAndSetCommas(this);
    });
});
