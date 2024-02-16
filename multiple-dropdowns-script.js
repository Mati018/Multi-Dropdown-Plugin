jQuery(document).ready(function($) {
    $('#type-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'get_dropdown_data',
                typeValues: selectedValue
            },
            success: function(response) {
                $('#brand-dropdown').html(response).prop('disabled', false);
                $('#model-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#defect-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#multiple-dropdowns-result').empty();
                $('#multiple-dropdowns-result').hide()
            }
        });
    });

    $('#brand-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'get_dropdown_data',
                brand_value: selectedValue
            },
            success: function(response) {
                $('#model-dropdown').html(response).prop('disabled', false);
                $('#defect-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#multiple-dropdowns-result').empty();
                $('#multiple-dropdowns-result').hide()
            }
        });
    });

    $('#model-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'get_dropdown_data',
                model_value: selectedValue
            },
            success: function(response) {
                $('#defect-dropdown').html(response).prop('disabled', false);
                $('#multiple-dropdowns-result').empty();
                $('#multiple-dropdowns-result').hide()
            }
        });
    });

    $('#defect-dropdown').change(function() {
        var selectedValue = $(this).val();
        var column3Value = $('#model-dropdown').val();
        if (selectedValue) {
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    action: 'get_dropdown_data',
                    defect_value: selectedValue,
                    model_value: column3Value
                },
                success: function(response) {
                    // Find the index of the table opening tag
                    var tableIndex = response.indexOf('<table>');
                    $('#multiple-dropdowns-result').show();
                    
                    if (tableIndex !== -1) {
                        // Extract the table HTML
                        var tableHTML = response.substring(tableIndex);
                        
                        // Append the table HTML to #multiple-dropdowns-result
                        $('#multiple-dropdowns-result').html(tableHTML);
                    } else {
                        // Handle the case where no table is found
                        $('#multiple-dropdowns-result').html('<p>No data found.</p>');
                    }
                }
            });
        } else {
            $('#multiple-dropdowns-result').empty();
            $('#multiple-dropdowns-result').hide();
        }
    });
});
