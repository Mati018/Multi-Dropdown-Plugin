# Multiple Dropdowns Plugin

## Description
The Multiple Dropdowns Plugin is a WordPress plugin that adds dynamic multiple dropdowns to your website. These dropdowns are populated with data from a MySQL database, allowing users to make selections and retrieve relevant information.

## Features
- Multiple dropdowns with data fetched from MySQL database columns.
- AJAX-powered interactions for a seamless user experience.
- Customizable styling for integration with different WordPress themes.
- Easy integration via shortcode.

## Installation
1. Download the plugin ZIP file from the source.
2. Log in to your WordPress admin panel.
3. Navigate to Plugins > Add New.
4. Click on the "Upload Plugin" button and select the ZIP file you downloaded.
5. Click "Install Now" and then "Activate Plugin" once installation is complete.

## Shortcode
To display the multiple dropdowns on your WordPress pages or posts, use the following shortcode:
```bash
[dropdown]
```

## Usage
1. Add the shortcode `[dropdown]` to any WordPress page or post where you want the multiple dropdowns to appear.
2. Users can select options from each dropdown, dynamically populating subsequent dropdowns with relevant data.
3. Based on the final selection, the plugin retrieves and displays specific information related to the user's choices.

## Customization
- Modify the appearance of the dropdowns and result display by editing the `style.css` file located within the plugin folder.
- Adjust the styling to match your website's design and layout preferences.

## Database
Ensure that your MySQL database is properly configured and contains relevant data for the plugin to fetch and display. The plugin retrieves data from the `data` table within your MySQL database.
