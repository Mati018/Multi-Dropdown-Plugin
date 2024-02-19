<?php
/*
Plugin Name: Multiple Dropdowns Plugin
Description: This plugin adds multiple dropdowns populated with data from MySQL database columns.
Version: 1.0
Author: Matiurrehman Meersayed
License: GPL2
*/

// Enqueue scripts and styles
function enqueue_plugin_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_style('multiple-dropdowns-style', plugins_url('style.css', __FILE__));
    wp_enqueue_script('multiple-dropdowns-script', plugins_url('multiple-dropdowns-script.js', __FILE__), array('jquery'), '1.0', true);
    wp_localize_script('multiple-dropdowns-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_plugin_scripts');

// Shortcode to display the multiple dropdowns
function view_multiple_dropdowns_shortcode() {
    ob_start();
    ?>

    <form id="multiple-dropdowns-form">
        <?php
        global $wpdb;

        // Fetch distinct values from column 1
        $typeValues = $wpdb->get_results("SELECT * FROM `types`");


        if ($typeValues) {
            echo '<p>What would you like to Repair today.</p>';
            echo '<select id="type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($typeValues as $value) {
                echo '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
        
        <p>Choose Brand.</p>
        <select id="brand-dropdown" disabled><option value="">Options</option></select>
        <p>Choose Models.</p>
        <select id="model-dropdown" disabled><option value="">Options</option></select>
        <p>Choose Defects.</p>
        <select id="defect-dropdown" disabled><option value="">Options</option></select>
    </form>

    <div id="multiple-dropdowns-result"></div>


    <!-- update type -->
    <form id="field-updater-form">
        <label>Update the Type</label><br>
        <?php
        global $wpdb;

        $updateTypeValues = $wpdb->get_results("SELECT * FROM `types`");

        if ($updateTypeValues) {
            echo '<select id="update-type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($updateTypeValues as $value) {
                echo '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
        <input type="text" id="field-value" name="field_value"><br>
        <input type="submit" value="Update Type">
    </form>

    <!-- update brand -->
    <form id="brand-updater-form">
        <label>Update the Brand</label><br>
        <?php
        global $wpdb;

        $updateTypeValues = $wpdb->get_results("SELECT * FROM `types`");

        if ($updateTypeValues) {
            echo '<select id="brand-update-type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($updateTypeValues as $value) {
                echo '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
        <p>Choose Brand.</p>
        <select id="update-brand-dropdown" disabled><option value="">Options</option></select>
        <input type="text" id="brand_field_value" name="brand_field_value"><br>
        <input type="submit" value="Update Brand">
    </form>

    <!-- update model -->
    <form id="model-updater-form">
        <label>Update the model</label><br>
        <?php
        global $wpdb;

        $updateTypeValues = $wpdb->get_results("SELECT * FROM `types`");

        if ($updateTypeValues) {
            echo '<select id="model-update-type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($updateTypeValues as $value) {
                echo '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
        <p>Choose Brand.</p>
        <select id="model-update-brand-dropdown" disabled><option value="">Options</option></select>
        <p>Choose Models.</p>
        <select id="update-model-dropdown" disabled><option value="">Options</option></select>
        <input type="text" id="model_field_value" name="model_field_value"><br>
        <input type="submit" value="Update Model">
    </form>

    <!-- update defect -->
    <form id="defect-updater-form">
        <label>Update the Defect</label><br>
        <?php
        global $wpdb;

        $updateTypeValues = $wpdb->get_results("SELECT * FROM `types`");

        if ($updateTypeValues) {
            echo '<select id="defect-update-type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($updateTypeValues as $value) {
                echo '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
        <p>Choose Brand.</p>
        <select id="defect-update-brand-dropdown" disabled><option value="">Options</option></select>
        <p>Choose Models.</p>
        <select id="defect-update-model-dropdown" disabled><option value="">Options</option></select>
        <p>Choose Defects.</p>
        <select id="defect-update-dropdown" disabled><option value="">Options</option></select>
        <input type="text" id="defect_field_value" name="defect_field_value"><br>
        <input type="submit" value="Update Model">
    </form>

    <!-- update price -->
    <form id="price-updater-form">
        <label>Update the Price</label><br>
        <?php
        global $wpdb;

        $updateTypeValues = $wpdb->get_results("SELECT * FROM `types`");

        if ($updateTypeValues) {
            echo '<select id="price-update-type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($updateTypeValues as $value) {
                echo '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
        <p>Choose Brand.</p>
        <select id="price-update-brand-dropdown" disabled><option value="">Options</option></select>
        <p>Choose Models.</p>
        <select id="price-update-model-dropdown" disabled><option value="">Options</option></select>
        <p>Choose Defects.</p>
        <select id="price-defect-update-dropdown" disabled><option value="">Options</option></select>
        <div id="price-update-dropdowns-result"></div>
        <p>Center.</p>
        <input type="text" id="AtCenter-value" name="AtCenter_value"><br>
        <p>Doorstep.</p>
        <input type="text" id="AtDoorstep-value" name="AtDoorstep_value"><br>
        <p>Pick and Drop.</p>
        <input type="text" id="PickupDrop-value" name="PickupDrop_value"><br>
        <input type="submit" value="Update Price">
    </form>

    <div id="custom-field-updater-message"></div>
    
    
    <!-- create type -->
    <form id="field-create-form">
        <label>Create the Type</label><br>
        <input type="text" id="create-field-value" name="field_value"><br>
        <input type="submit" value="Create Type">
    </form>
    
    <!-- create brand -->
    <form id="brand-create-form">
        <label>Create the brand</label><br>
        <?php
        global $wpdb;

        $updateTypeValues = $wpdb->get_results("SELECT * FROM `types`");

        if ($updateTypeValues) {
            echo '<select id="brand-create-type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($updateTypeValues as $value) {
                echo '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
        <input type="text" id="create-brand-value" name="field_value"><br>
        <input type="submit" value="Create Brand">
    </form>
    
    <!-- create model -->
    <form id="model-create-form">
        <label>Create the model</label><br>
        <?php
        global $wpdb;

        $updateTypeValues = $wpdb->get_results("SELECT * FROM `types`");

        if ($updateTypeValues) {
            echo '<select id="model-create-type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($updateTypeValues as $value) {
                echo '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
        <p>Choose Brand.</p>
        <select id="model-create-brand-dropdown" disabled><option value="">Options</option></select>
        <input type="text" id="create-model-value" name="field_value"><br>
        <input type="submit" value="Create model">
    </form>
    
    <!-- create defect -->
    <form id="defect-create-form">
        <label>Create the Defect</label><br>
        <?php
        global $wpdb;

        $updateTypeValues = $wpdb->get_results("SELECT * FROM `types`");

        if ($updateTypeValues) {
            echo '<select id="defect-create-type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($updateTypeValues as $value) {
                echo '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
        <p>Choose Brand.</p>
        <select id="defect-create-brand-dropdown" disabled><option value="">Options</option></select>
        <p>Choose Model.</p>
        <select id="defect-create-model-dropdown" disabled><option value="">Options</option></select>
        <input type="text" id="create-defect-value" name="field_value"><br>
        <input type="submit" value="Create defect">
    </form>
    
    <!-- create serviceprice -->
    <form id="serviceprice-create-form">
        <label>Create the serviceprice</label><br>
        <?php
        global $wpdb;

        $updateTypeValues = $wpdb->get_results("SELECT * FROM `types`");

        if ($updateTypeValues) {
            echo '<select id="serviceprice-create-type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($updateTypeValues as $value) {
                echo '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
        <p>Choose Brand.</p>
        <select id="serviceprice-create-brand-dropdown" disabled><option value="">Options</option></select>
        <p>Choose Model.</p>
        <select id="serviceprice-create-model-dropdown" disabled><option value="">Options</option></select>
        <p>Choose Defect.</p>
        <select id="serviceprice-create-defect-dropdown" disabled><option value="">Options</option></select>
        <p>Center.</p>
        <input type="text" id="create-serviceprice-value-center" name="field_value"><br>
        <p>Doorstep.</p>
        <input type="text" id="create-serviceprice-value-doorstep" name="field_value"><br>
        <p>Pick and Drop.</p>
        <input type="text" id="create-serviceprice-value-pickdrop" name="field_value"><br>
        <input type="submit" value="Create serviceprice">
    </form>
    
    <div id="custom-field-create-message"></div>
    
    <!-- delete type -->
    <form id="field-delete-form">
        <label>Delete the Type</label><br>
        <?php
        global $wpdb;

        $updateTypeValues = $wpdb->get_results("SELECT * FROM `types`");

        if ($updateTypeValues) {
            echo '<select id="delete-type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($updateTypeValues as $value) {
                echo '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<p>No data found.</p>';
        }
        ?>
        <input type="submit" value="delete Type">
    </form>
    
    <div id="custom-field-delete-message"></div>
    <?php
    return ob_get_clean();
}
add_shortcode('ViewDropdown', 'view_multiple_dropdowns_shortcode');

// Ajax handler to fetch data based on dropdown selections
add_action('wp_ajax_get_dropdown_data', 'get_dropdown_data_callback');
add_action('wp_ajax_nopriv_get_dropdown_data', 'get_dropdown_data_callback');
add_action('wp_ajax_update_custom_field_value', 'update_custom_field_value');
add_action('wp_ajax_nopriv_update_custom_field_value', 'update_custom_field_value');

add_action('wp_ajax_fetch_dropdown_values', 'fetch_dropdown_values_callback');
add_action('wp_ajax_create_dropdown_values', 'create_dropdown_values_callback');
add_action('wp_ajax_delete_dropdown_values', 'delete_dropdown_values_callback');

function delete_dropdown_values_callback() {
    global $wpdb;

    if (isset($_POST['deletetype'])) {
        $deletetype = $_POST['deletetype'];
    
        $table_name = 'types';
        $where = array(
            'TypesID' => $deletetype,
        );

        // Delete the record from the table
        $result = $wpdb->delete($table_name, $where);

        if ($result !== false) {
            echo '<p>Type deletion Success</p>';
        } else {
            echo '<p>Failed to delete data</p>';
        }
    }

    wp_die();
}

function create_dropdown_values_callback() {
    global $wpdb;
    if (isset($_POST['type'])) {
        $type = sanitize_text_field($_POST['type']);
    
        $table_name = 'types';
        $data = array(
            'TypesName' => $type,
        );
        // Insert new record into table
        $result = $wpdb->insert($table_name, $data);

        if ($result !== false) {
            echo '<p>Type insert Success</p>';
        } else {
            echo '<p>Failed to insert data</p>';
        }
    }

    if (isset($_POST['brand']) && isset($_POST['brandtype'])) {
        $brandtype = sanitize_text_field($_POST['brandtype']);
        $brand = sanitize_text_field($_POST['brand']);
    
        $table_name = 'brand';
        $data = array(
            'BrandName' => $brand,
            'TypesID' => $brandtype
        );

        $result = $wpdb->insert($table_name, $data);

        if ($result !== false) {
            echo '<p>Type insert Success</p>';
        } else {
            echo '<p>Failed to insert data</p>';
        }
    }

    if(isset($_POST['modelbrand']) && isset($_POST['modeltype']) && isset($_POST['model'])){
        $model = $_POST['model'];
        $brand = $_POST['modelbrand'];
        $type = $_POST['modeltype'];

        $table_name = 'model';
        $data = array(
            'ModelName' => $model,
            'BrandID' => $brand
        );

        $result = $wpdb->insert($table_name, $data);

        if ($result !== false) {
            echo '<p>Type insert Success</p>';
        } else {
            echo '<p>Failed to insert data</p>';
        }
    }

    if(isset($_POST['defectbrand']) && isset($_POST['defecttype']) && isset($_POST['defectmodel']) && isset($_POST['defect'])){
        $brand = $_POST['defectbrand'];
        $model = $_POST['defectmodel'];
        $type = $_POST['defecttype'];
        $defect = $_POST[ 'defect'];

        $table_name = 'defect';
        $data = array(
            'DefectName' => $defect,
            'ModelID' => $model
        );

        $result = $wpdb->insert($table_name, $data);

        echo '<p>'.$type.'</p>';
        echo '<p>'.$brand.'</p>';
        echo '<p>'.$model.'</p>';
        echo '<p>'.$defect.'</p>';
        if ($result !== false) {
            echo '<p>Type insert Success</p>';
        } else {
            echo '<p>Failed to insert data</p>';
        }
    }

    if(isset($_POST['servicepricedefect']) && isset($_POST['centerprice']) && isset($_POST['doorstepprice']) && isset($_POST['pickdropprice'])){
        $defect = $_POST[ 'servicepricedefect'];
        $centerprice = $_POST[ 'centerprice'];
        $doorstepprice = $_POST[ 'doorstepprice'];
        $pickdropprice = $_POST[ 'pickdropprice'];

        $table_name = 'serviceprice';
        $data = array(
            'DefectID' => $defect,
            'AtCenter' => $centerprice,
            'AtDoorstep' => $doorstepprice,
            'PickupDrop' => $pickdropprice,
        );

        $result = $wpdb->insert($table_name, $data);

        if ($result !== false) {
            echo '<p>Type insert Success</p>';
        } else {
            echo '<p>Failed to insert data</p>';
        }
    }


    wp_die();
}

function fetch_dropdown_values_callback() {
    global $wpdb;
    $updateTypeValues = $wpdb->get_results("SELECT * FROM `types`");

    if ($updateTypeValues) {
        $options = '<option value="">Options</option>';
        foreach ($updateTypeValues as $value) {
            $options .= '<option value="' . esc_attr($value->TypesID) . '">' . esc_html($value->TypesName) . '</option>';
        }
        echo $options;
    } else {
        echo '<option value="">No data found</option>';
    }
    wp_die();
}

function update_custom_field_value() {
    global $wpdb;

    if (isset($_POST['defect_value'])) {
        $defect_value = $_POST['defect_value'];
        $result = $wpdb->get_row($wpdb->prepare("SELECT * FROM `ServicePrice` WHERE `DefectID` = %d", $defect_value));
        if ($result) {
            echo '<table>';
            echo '<tr><th>Center</th><th>Doorstep</th><th>Pick and Drop</th></tr>';
            echo '<tr>';
            echo '<td>' . $result->AtCenter . '</td>';
            echo '<td>' . $result->AtDoorstep . '</td>';
            echo '<td>' . $result->PickupDrop . '</td>';
            echo '</tr>';
            echo '</table>';
        } else {
            echo '<p>No data found</p>';
        }
    }

    if (isset($_POST['field_value']) && isset($_POST['post_id'])) {
        $field_value = $_POST['field_value'];
        $post_id = $_POST['post_id'];

        $table_name = 'types';
        $data = array(
            'TypesName' => $field_value
        );
        $where = array(
            'TypesID' => $post_id
        );

        $updated = $wpdb->update($table_name, $data, $where);

        if ($updated !== false) {
            echo '<p>Type update Success</p>';
        } else {
            echo '<p>Failed to update data</p>';
        }
    }

    if (isset($_POST['typeValues'])) {
        $selected_typeValues = $_POST['typeValues'];
        $brand_values = $wpdb->get_results($wpdb->prepare("SELECT * FROM `Brand` WHERE `TypesID` = %d", $selected_typeValues));
        if ($brand_values) {
            $options = '<option value="">Options</option>';
            foreach ($brand_values as $row) {
                $options .= '<option value="' . esc_attr($row->BrandID) . '">' . esc_html($row->BrandName) . '</option>';
            }
            echo $options;
        } else {
            echo '<option value="">No data found</option>';
        }
    }

    if (isset($_POST['brand_value'])) {
        $brand_value = $_POST['brand_value'];
        $model_values = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT * FROM `Model` WHERE `BrandID` = %d", $brand_value));
        if ($model_values) {
            $options = '<option value="">Options</option>';
            foreach ($model_values as $row) {
                $options .= '<option value="' . esc_attr($row->ModelID) . '">' . esc_html($row->ModelName) . '</option>';
            }
            echo $options;
        } else {
            echo '<option value="">No data found</option>';
        }
    }

    if (isset($_POST['model_value'])) {
        $model_value = $_POST['model_value'];
        $defect_values = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT * FROM `Defect` WHERE `ModelID` = %d", $model_value));
        if ($defect_values) {
            $options = '<option value="">Options</option>';
            foreach ($defect_values as $row) {
                $options .= '<option value="' . esc_attr($row->DefectID) . '">' . esc_html($row->DefectName) . '</option>';
            }
            echo $options;
        } else {
            echo '<option value="">No data found</option>';
        }
    }

    if (isset($_POST['brand_field_value']) && isset($_POST['brand_post_id']) && isset($_POST['brand_id'])) {
        $field_value = $_POST['brand_field_value'];
        $post_id = $_POST['brand_post_id'];
        $brand_id = $_POST['brand_id'];

        $table_name = 'brand';
        $data = array(
            'BrandName' => $field_value
        );
        $where = array(
            'TypesID' => $post_id,
            'BrandID' => $brand_id
        );

        $updated = $wpdb->update($table_name, $data, $where);

        if ($updated !== false) {
            echo '<p>Brand update Success</p>';
        } else {
            echo '<p>Failed to update data</p>';
        }
    }

    if (isset($_POST['model_field_value']) && isset($_POST['model_brand_id']) && isset($_POST['model_id'])) {
        $field_value = $_POST['model_field_value'];
        $brand_id = $_POST['model_brand_id'];
        $model_id = $_POST['model_id'];

        $table_name = 'model';
        $data = array(
            'ModelName' => $field_value
        );
        $where = array(
            'ModelID' => $model_id,
            'BrandID' => $brand_id
        );

        $updated = $wpdb->update($table_name, $data, $where);

        if ($updated !== false) {
            echo '<p>Model update Success</p>';
        } else {
            echo '<p>Failed to update data</p>';
        }
    }

    if (isset($_POST['defect_field_value']) && isset($_POST['defect_model_id']) && isset($_POST['defect_id'])) {
        $field_value = $_POST['defect_field_value'];
        $defect_id = $_POST['defect_id'];
        $model_id = $_POST['defect_model_id'];

        $table_name = 'defect';
        $data = array(
            'DefectName' => $field_value
        );
        $where = array(
            'ModelID' => $model_id,
            'DefectID' => $defect_id
        );

        $updated = $wpdb->update($table_name, $data, $where);

        if ($updated !== false) {
            echo '<p>Defect update Success</p>';
        } else {
            echo '<p>Failed to update data</p>';
        }
    }

    if (isset($_POST['AtCenter_value1']) && isset($_POST['AtDoorstep_value1']) && isset($_POST['PickupDrop_value1']) && isset($_POST['defect_id1'])) {
        $defect_id = $_POST['defect_id1'];
        $PickupDrop_value = $_POST['PickupDrop_value1'];
        $AtDoorstep_value = $_POST['AtDoorstep_value1'];
        $AtCenter_value = $_POST['AtCenter_value1'];

        $table_name = 'serviceprice';
        $data = array(
            'PickupDrop' => $PickupDrop_value,
            'AtDoorstep' => $AtDoorstep_value,
            'AtCenter' => $AtCenter_value,
        );
        $where = array(
            'DefectID' => $defect_id
        );

        $updated = $wpdb->update($table_name, $data, $where);

        if ($updated !== false) {
            echo '<p>Price update Success</p>';
        } else {
            echo '<p>Failed to update data</p>';
        }
    }

    wp_die();
}


function get_dropdown_data_callback() {
    global $wpdb;

    if (isset($_POST['typeValues'])) {
        $selected_typeValues = $_POST['typeValues'];
        $brand_values = $wpdb->get_results($wpdb->prepare("SELECT * FROM `Brand` WHERE `TypesID` = %d", $selected_typeValues));
        if ($brand_values) {
            $options = '<option value="">Options</option>';
            foreach ($brand_values as $row) {
                $options .= '<option value="' . esc_attr($row->BrandID) . '">' . esc_html($row->BrandName) . '</option>';
            }
            echo $options;
        } else {
            echo '<option value="">No data found</option>';
        }
    }

    if (isset($_POST['brand_value'])) {
        $brand_value = $_POST['brand_value'];
        $model_values = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT * FROM `Model` WHERE `BrandID` = %d", $brand_value));
        if ($model_values) {
            $options = '<option value="">Options</option>';
            foreach ($model_values as $row) {
                $options .= '<option value="' . esc_attr($row->ModelID) . '">' . esc_html($row->ModelName) . '</option>';
            }
            echo $options;
        } else {
            echo '<option value="">No data found</option>';
        }
    }

    if (isset($_POST['model_value'])) {
        $model_value = $_POST['model_value'];
        $defect_values = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT * FROM `Defect` WHERE `ModelID` = %d", $model_value));
        if ($defect_values) {
            $options = '<option value="">Options</option>';
            foreach ($defect_values as $row) {
                $options .= '<option value="' . esc_attr($row->DefectID) . '">' . esc_html($row->DefectName) . '</option>';
            }
            echo $options;
        } else {
            echo '<option value="">No data found</option>';
        }
    }
    
    if (isset($_POST['defect_value']) && isset($_POST['model_value'])) {
        $defect_value = $_POST['defect_value'];
        $result = $wpdb->get_row($wpdb->prepare("SELECT * FROM `ServicePrice` WHERE `DefectID` = %d", $defect_value));
        if ($result) {
            echo '<table>';
            echo '<tr><th>Center</th><th>Doorstep</th><th>Pick and Drop</th></tr>';
            echo '<tr>';
            echo '<td>' . $result->AtCenter . '</td>';
            echo '<td>' . $result->AtDoorstep . '</td>';
            echo '<td>' . $result->PickupDrop . '</td>';
            echo '</tr>';
            echo '</table>';
        } else {
            echo '<p>No data found</p>';
        }
    }

    wp_die();
}
?>