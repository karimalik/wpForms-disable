<?php

/**
 * Plugin Name: WPForms Disable Form
 * Description: Automatically disable a WPForms form at specific date and time
 * Version: 1.0
 * Author: Karim Kompissi
 */


//Disables the form at a specific date and time
function wpforms_disable() {
    //Checks if WPForms is activated
    if (! function_exists('wpforms')) {
        return;
    }

    //ID of form to be deactivated
    $form_id = 0; //Replace 0 with the ID of your WPForms form

    //Date and time when the form should be deactivated (format: 'Y-m-d H:i:s')
    $date_disable = '0000-00-00 00:00:00';

    if (current_time('timestamp') >= strtotime($date_disable)) {
        
        wpforms()->form->update($form_id, array('title' => 'This form is no longer accepting submissions.'));
    }

}

add_action('init', 'wpforms_disable');
