<?php
/**
 * english language file
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Stephane Chamberland <stephane.chamberland@ec.gc.ca>
 */

// settings must be present and set appropriately for the language
$lang['encoding']   = 'utf-8';
$lang['direction']  = 'ltr';

// for admin plugins, the menu prompt to be displayed in the admin menu
// if set here, the plugin doesn't need to override the getMenuText() method
$lang['menu']       = 'Text Config Manager';

// custom language strings for the plugin
$lang['desc']       = "Manage Dokuwiki's Text Config Files";

$lang['error']      = 'Settings not updated due to an invalid value, please review your changes and resubmit.
                       <br />The incorrect value(s) will be shown surrounded by a red border.';
$lang['updated']    = 'Settings updated successfully.';
$lang['nochoice']   = '(no other choices available)';
$lang['locked']     = 'The settings file can not be updated, if this is unintentional, <br />
                       ensure the local settings file name and permissions are correct.';

$lang['btn_addnew']     = "New Value";

$lang['msg_howto']     = "You may edit below the values for each config line or remove item by erasing its value before saving.<br /> To modify a key name, remove it first then re-add it with the new name below. <br />Please note that you cannot remove a <b>bold</b> (default) item.";

$lang['msg_howtoadd']     = "You may add a new config item with the following form.";

$lang['msg_chooseConf'] = "Please select which config file you would like to edit";
$lang['msg_editThisConf'] = "You may choose to edit another config file.<br /> Please note that changes to the form above will be lost if you do not save it first.";
$lang['btn_editThisConf'] = "Edit This Config";

$lang['filelocked'] = '<b>WARNING</b>: Config file not editable, cannot save modifications';
