<?php
/*
Plugin Name: Multiple Dropdowns Plugin
Description: This plugin adds multiple dropdowns populated with data from MySQL database columns.
Version: 1.0
Author: Matiurrehman Meersayed
License: GPL2
*/

// Enqueue scripts and styles

// Enqueue scripts and styles
function enqueue_plugin_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_style('multiple-dropdowns-style', plugins_url('style.css', __FILE__));
    wp_enqueue_script('multiple-dropdowns-script', plugins_url('multiple-dropdowns-script.js', __FILE__), array('jquery'), '1.0', true);
    wp_localize_script('multiple-dropdowns-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'enqueue_plugin_scripts');

// Shortcode to display the multiple dropdowns
function multiple_dropdowns_shortcode() {
    ob_start();
    ?>

    <form id="multiple-dropdowns-form">
        <?php
        global $wpdb;

        // Fetch distinct values from column 1
        $typeValues = $wpdb->get_col("SELECT DISTINCT `type` FROM `data`");

        if ($typeValues) {
            echo '<p>What would u like to Repair today.</p>';
            echo '<select id="type-dropdown">';
            echo '<option value="">Options</option>';
            foreach ($typeValues as $value) {
                echo '<option value="' . esc_attr($value) . '">' . esc_html($value) . '</option>';
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


    <?php
    return ob_get_clean();
}
add_shortcode('dropdown', 'multiple_dropdowns_shortcode');

// Ajax handler to fetch data based on dropdown selections
add_action('wp_ajax_get_dropdown_data', 'get_dropdown_data_callback');
add_action('wp_ajax_nopriv_get_dropdown_data', 'get_dropdown_data_callback');

function get_dropdown_data_callback() {
    global $wpdb;

    if (isset($_POST['typeValues'])) {
        $selected_typeValues = $_POST['typeValues'];
        $brand_values = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT `brand` FROM `data` WHERE `type` = %s", $selected_typeValues));
        if ($brand_values) {
            $options = '<option value="">Options</option>';
            foreach ($brand_values as $row) {
                $options .= '<option value="' . esc_attr($row->brand) . '">' . esc_html($row->brand) . '</option>';
            }
            echo $options;
        } else {
            echo '<option value="">No data found</option>';
        }
    }

    if (isset($_POST['brand_value'])) {
        $brand_value = $_POST['brand_value'];
        $model_values = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT `model` FROM `data` WHERE `brand` = %s", $brand_value));
        if ($model_values) {
            $options = '<option value="">Options</option>';
            foreach ($model_values as $row) {
                $options .= '<option value="' . esc_attr($row->model) . '">' . esc_html($row->model) . '</option>';
            }
            echo $options;
        } else {
            echo '<option value="">No data found</option>';
        }
    }

    if (isset($_POST['model_value'])) {
        $model_value = $_POST['model_value'];
        $defect_values = $wpdb->get_results($wpdb->prepare("SELECT DISTINCT `defect` FROM `data` WHERE `model` = %s", $model_value));
        if ($defect_values) {
            $options = '<option value="">Options</option>';
            foreach ($defect_values as $row) {
                $options .= '<option value="' . esc_attr($row->defect) . '">' . esc_html($row->defect) . '</option>';
            }
            echo $options;
        } else {
            echo '<option value="">No data found</option>';
        }
    }
    
    if (isset($_POST['defect_value']) && isset($_POST['model_value'])) {
        $defect_value = $_POST['defect_value'];
        $model_value = $_POST['model_value'];
        $result = $wpdb->get_row($wpdb->prepare("SELECT `center`,`doorstep`,`pickanddrop` FROM `data` WHERE `defect` = %s AND `model` = %s", $defect_value, $model_value));
        if ($result) {
            echo '<table>';
            echo '<tr><th>Center</th><th>Doorstep</th><th>Pick and Drop</th></tr>';
            echo '<tr>';
            echo '<td>' . $result->center . '</td>';
            echo '<td>' . $result->doorstep . '</td>';
            echo '<td>' . $result->pickanddrop . '</td>';
            echo '</tr>';
            echo '</table>';
        } else {
            echo '<p>No data found.</p>';
        }
    }

    wp_die();
}
?>
