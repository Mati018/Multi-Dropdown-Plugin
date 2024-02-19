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
                    var tableIndex = response.indexOf('<table>');
                    $('#multiple-dropdowns-result').show();
                    
                    if (tableIndex !== -1) {
                        var tableHTML = response.substring(tableIndex);
                        $('#multiple-dropdowns-result').html(tableHTML);
                    } else {
                        $('#multiple-dropdowns-result').html('<p>No data found.</p>');
                    }
                }
            });
        } else {
            $('#multiple-dropdowns-result').empty();
            $('#multiple-dropdowns-result').hide();
        }
    });

    $('#price-defect-update-dropdown').change(function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    action: 'update_custom_field_value',
                    defect_value: selectedValue
                },
                success: function(response) {
                    var tableIndex = response.indexOf('<table>');
                    $('#price-update-dropdowns-result').show();
                    
                    var tableHTML = response.substring(tableIndex);
                    $('#price-update-dropdowns-result').html(tableHTML);
                }
            });
        }
    });

    function fetchDropdownValues(a) {
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'fetch_dropdown_values'
            },
            success: function(response) {
                $(a).html(response);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching dropdown values:', error);
            }
        });
    }

    $('#field-updater-form').on('submit', function(e) {
        e.preventDefault();
    
        var fieldValue = $('#field-value').val();
        var postId = $('#update-type-dropdown').val();
    
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                field_value: fieldValue,
                post_id: postId
            },
            success: function(response) {
                $('#custom-field-updater-message').html(response);
                $('#update-type-dropdown').val('');
                fetchDropdownValues('#update-type-dropdown');
                $('#field-value').val('');
            },
            error: function(xhr, status, error) {
                $('#custom-field-updater-message').html('Error: ' + error);
            }
        });
    });

    $(document).ready(function() {
        $(document).on('change', '#update-type-dropdown', function() {
            var selectedValue = $(this).val();
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    action: 'update_custom_field_value',
                    typeValues: selectedValue
                },
                success: function(response) {
                    $('#update-brand-dropdown').html(response).prop('disabled', false);
                }
            });
        });
    });
    

    $('#brand-update-type-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                typeValues: selectedValue
            },
            success: function(response) {
                $('#update-brand-dropdown').html(response).prop('disabled', false);
            }
        });
    });

    $('#model-update-type-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                typeValues: selectedValue
            },
            success: function(response) {
                $('#model-update-brand-dropdown').html(response).prop('disabled', false);
                $('#update-model-dropdown').html('<option value="">Options</option>').prop('disabled', true);
            }
        });
    });

    $('#defect-update-type-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                typeValues: selectedValue
            },
            success: function(response) {
                $('#defect-update-brand-dropdown').html(response).prop('disabled', false);
                $('#defect-update-model-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#defect-update-dropdown').html('<option value="">Options</option>').prop('disabled', true);
            }
        });
    });

    $('#price-update-type-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                typeValues: selectedValue
            },
            success: function(response) {
                $('#price-update-brand-dropdown').html(response).prop('disabled', false);
                $('#defect-update-model-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#defect-update-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#price-update-dropdowns-resul').empty();
                $('#price-update-dropdowns-resul').hide();
            }
        });
    });

    $('#model-update-brand-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                brand_value: selectedValue
            },
            success: function(response) {
                $('#update-model-dropdown').html(response).prop('disabled', false);
                
            }
        });
    });

    $('#defect-update-brand-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                brand_value: selectedValue
            },
            success: function(response) {
                $('#defect-update-model-dropdown').html(response).prop('disabled', false);
                $('#defect-update-dropdown').html('<option value="">Options</option>').prop('disabled', true);
            }
        });
    });

    $('#price-update-brand-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                brand_value: selectedValue
            },
            success: function(response) {
                $('#price-update-model-dropdown').html(response).prop('disabled', false);
                $('#price-defect-update-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#price-update-dropdowns-resul').empty();
                $('#price-update-dropdowns-resul').hide();
            }
        });
    });
    
    $('#defect-update-model-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                model_value: selectedValue
            },
            success: function(response) {
                $('#defect-update-dropdown').html(response).prop('disabled', false);
            }
        });
    });

    $('#price-update-model-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                model_value: selectedValue
            },
            success: function(response) {
                $('#price-defect-update-dropdown').html(response).prop('disabled', false);
                $('#price-update-dropdowns-result').empty();
                $('#price-update-dropdowns-result').hide();
            }
        });
    });

    $('#brand-updater-form').on('submit', function(e) {
        e.preventDefault();
    
        var fieldValue = $('#brand_field_value').val();
        var postId = $('#brand-update-type-dropdown').val();
        var brandId = $('#update-brand-dropdown').val();
    
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                brand_field_value: fieldValue,
                brand_post_id: postId,
                brand_id:brandId
            },
            success: function(response) {
                $('#custom-field-updater-message').html(response);
                $('#brand-update-type-dropdown').html('<option value="">Options</option>')
                $('#update-brand-dropdown').html('<option value="">Options</option>')
                $('#brand_field_value').val('');
            },
            error: function(xhr, status, error) {
                $('#custom-field-updater-message').html('Error: ' + error);
            }
        });
    });

    $('#model-updater-form').on('submit', function(e) {
        e.preventDefault();
    
        var fieldValue = $('#model_field_value').val();
        var brandId = $('#model-update-brand-dropdown').val();
        var modelId = $('#update-model-dropdown').val();
    
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                model_field_value: fieldValue,
                model_id:modelId,
                model_brand_id:brandId
            },
            success: function(response) {
                $('#custom-field-updater-message').html(response);
                $('#model-update-type-dropdown').html('<option value="">Options</option>')
                $('#model-update-brand-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#update-model-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#model_field_value').val('');
                fetchDropdownValues('#model-update-type-dropdown');
            },
            error: function(xhr, status, error) {
                $('#custom-field-updater-message').html('Error: ' + error);
            }
        });
    });

    $('#defect-updater-form').on('submit', function(e) {
        e.preventDefault();
    
        var fieldValue = $('#defect_field_value').val();
        var brandId = $('#defect-update-brand-dropdown').val();
        var modelId = $('#defect-update-model-dropdown').val();
    
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                defect_field_value: fieldValue,
                defect_model_id:brandId,
                defect_id:modelId
            },
            success: function(response) {
                $('#custom-field-updater-message').html(response);
                $('#defect-update-type-dropdown').html('<option value="">Options</option>')
                $('#defect-update-brand-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#defect-update-model-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#defect-update-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#defect_field_value').val('');
                fetchDropdownValues('#defect-update-type-dropdown');
            },
            error: function(xhr, status, error) {
                $('#custom-field-updater-message').html('Error: ' + error);
            }
        });
    });

    $('#price-updater-form').on('submit', function(e) {
        e.preventDefault();
    
        var defectId = $('#price-defect-update-dropdown').val();
        var PickupDropValue = $('#PickupDrop-value').val();
        var AtDoorstepValue = $('#AtDoorstep-value').val();
        var AtCenterValue = $('#AtCenter-value').val();
    
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                defect_id1:defectId,
                PickupDrop_value1:PickupDropValue,
                AtDoorstep_value1:AtDoorstepValue,
                AtCenter_value1:AtCenterValue,
            },
            success: function(response) {
                $('#custom-field-updater-message').html(response);
                $('#price-update-type-dropdown').html('<option value="">Options</option>')
                $('#price-update-brand-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#price-update-model-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#price-defect-update-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#PickupDrop-value').val('');
                $('#AtDoorstep-value').val('');
                $('#AtCenter-value').val('');
                $('#price-update-dropdowns-result').empty();
                $('#price-update-dropdowns-result').hide();
                fetchDropdownValues('#price-update-type-dropdown');
            },
            error: function(xhr, status, error) {
                $('#custom-field-updater-message').html('Error: ' + error);
            }
        });
    });

    $('#field-create-form').on('submit', function(e) {
        e.preventDefault();
    
        var type = $('#create-field-value').val();
    
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'create_dropdown_values',
                type:type,
            },
            success: function(response) {
                $('#create-field-value').val('');
                $('#custom-field-create-message').html(response);
            },
            error: function(xhr, status, error) {
                $('#custom-field-create-message').html('Error: ' + error);
            }
        });
    });

    $('#field-delete-form').on('submit', function(e) {
        e.preventDefault();
    
        var type = $('#delete-type-dropdown').val();
    
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'delete_dropdown_values',
                deletetype:type,
            },
            success: function(response) {
                $('#custom-field-delete-message').html(response);
            },
            error: function(xhr, status, error) {
                $('#custom-field-delete-message').html('Error: ' + error);
            }
        });
    });

    $('#brand-create-form').on('submit', function(e) {
        e.preventDefault();
    
        var type = $('#brand-create-type-dropdown').val();
        var brand = $('#create-brand-value').val();
    
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'create_dropdown_values',
                brand:brand,
                brandtype:type,
            },
            success: function(response) {
                $('#brand-create-type-dropdown').html('<option value="">Options</option>')
                $('#create-brand-value').val('');
                $('#custom-field-create-message').html(response);
                fetchDropdownValues('#brand-create-type-dropdown');
            },
            error: function(xhr, status, error) {
                $('#custom-field-create-message').html('Error: ' + error);
            }
        });
    });

    $('#model-create-type-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                typeValues: selectedValue
            },
            success: function(response) {
                $('#model-create-brand-dropdown').html(response).prop('disabled', false);
            }
        });
    });

    $('#model-create-form').on('submit', function(e) {
        e.preventDefault();
        
        var type = $('#model-create-type-dropdown').val();
        var brand = $('#model-create-brand-dropdown').val();
        var model = $('#create-model-value').val();
    
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'create_dropdown_values',
                modelbrand:brand,
                modeltype:type,
                model:model
            },
            success: function(response) {
                $('#brand-create-type-dropdown').html('<option value="">Options</option>')
                $('#create-brand-value').val('');
                $('#custom-field-create-message').html(response);
                fetchDropdownValues('#brand-create-type-dropdown');
            },
            error: function(xhr, status, error) {
                $('#custom-field-create-message').html('Error: ' + error);
            }
        });
    });

    $('#defect-create-type-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                typeValues: selectedValue
            },
            success: function(response) {
                $('#defect-create-brand-dropdown').html(response).prop('disabled', false);
                $('#defect-create-model-dropdown').html('<option value="">Options</option>').prop('disabled', true);
            }
        });
    });

    $('#defect-create-brand-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                brand_value: selectedValue
            },
            success: function(response) {
                $('#defect-create-model-dropdown').html(response).prop('disabled', false);
            }
        });
    });

    $('#defect-create-form').on('submit', function(e) {
        e.preventDefault();
        
        var type = $('#defect-create-type-dropdown').val();
        var brand = $('#defect-create-brand-dropdown').val();
        var model = $('#defect-create-model-dropdown').val();
        var defect = $('#create-defect-value').val();
    
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'create_dropdown_values',
                defectbrand:brand,
                defecttype:type,
                defectmodel:model,
                defect:defect
            },
            success: function(response) {
                $('#defect-create-type-dropdown').html('<option value="">Options</option>')
                $('#defect-create-brand-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#defect-create-model-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#create-defect-value').val('');
                $('#custom-field-create-message').html(response);
                fetchDropdownValues('#defect-create-type-dropdown');
            },
            error: function(xhr, status, error) {
                $('#custom-field-create-message').html('Error: ' + error);
            }
        });
    });

    $('#serviceprice-create-type-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                typeValues: selectedValue
            },
            success: function(response) {
                $('#serviceprice-create-brand-dropdown').html(response).prop('disabled', false);
                $('#serviceprice-create-model-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#serviceprice-create-defect-dropdown').html('<option value="">Options</option>').prop('disabled', true);
            }
        });
    });

    $('#serviceprice-create-brand-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                brand_value: selectedValue
            },
            success: function(response) {
                $('#serviceprice-create-model-dropdown').html(response).prop('disabled', false);
                $('#serviceprice-create-defect-dropdown').html('<option value="">Options</option>').prop('disabled', true);
            }
        });
    });

    $('#serviceprice-create-model-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                model_value: selectedValue
            },
            success: function(response) {
                $('#serviceprice-create-defect-dropdown').html(response).prop('disabled', false);
            }
        });
    });

    $('#serviceprice-create-defect-dropdown').change(function() {
        var selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'update_custom_field_value',
                defect_create_value: selectedValue
            },
            success: function(response) {
                // $('#serviceprice-create-defect-dropdown').html(response).prop('disabled', false);
            }
        });
    });

    $('#serviceprice-create-form').on('submit', function(e) {
        e.preventDefault();
        
        var defect = $('#serviceprice-create-defect-dropdown').val();
        var center = $('#create-serviceprice-value-center').val();
        var doorstep = $('#create-serviceprice-value-doorstep').val();
        var pickdrop = $('#create-serviceprice-value-pickdrop').val();
    
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'create_dropdown_values',
                servicepricedefect:defect,
                centerprice:center,
                doorstepprice:doorstep,
                pickdropprice:pickdrop
            },
            success: function(response) {
                $('#serviceprice-create-type-dropdown').html('<option value="">Options</option>')
                $('#serviceprice-create-brand-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#serviceprice-create-model-dropdown').html('<option value="">Options</option>').prop('disabled', true);
                $('#create-serviceprice-value').val('');
                $('#custom-field-create-message').html(response);
                fetchDropdownValues('#serviceprice-create-type-dropdown');
            },
            error: function(xhr, status, error) {
                $('#custom-field-create-message').html('Error: ' + error);
            }
        });
    });
});