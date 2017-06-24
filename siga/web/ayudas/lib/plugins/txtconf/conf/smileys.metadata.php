<?php
/**
 * Metadata for txtconf manager plugin
 * Based on Chris's Smith config.metatdata.php
 */

// ---------------[ settings for settings ]------------------------------
$config['intro'] = 'intro_smileys';     // which (type) config is this describing

$config['format']  = 'txt';      // format of setting files, supported formats: php
$config['varname'] = 'txtconf';  // name of the config variable, sans $

// this string is written at the top of the rewritten settings file,
// !! do not include any comment indicators !!
// this value can be overriden when calling save_settings() method
$config['heading'] = 'Dokuwiki\'s smileys TxtConfiguration File - Local Settings';

// ---------------[ setting files ]--------------------------------------
// these values can be string expressions, they will be eval'd before use
$file['local']     = 'DOKU_CONF."smileys.local.conf"';          // mandatory (file doesn't have to exist)
$file['default']   = 'DOKU_CONF."smileys.conf"';                // optional
$file['protected'] = '';  // optional

// test value (FIXME, remove before publishing)
//$meta['test']     = array('multichoice','_choices' => array(''));

// --------------[ setting metadata ]------------------------------------
// - any settings not mentioned will come after the last setting listed and
//   will use the default class with no parameters

$metemeta['key']    = array('text'); //Type of Txt config param Name/Key
$metemeta['value']  = array('text'); //Type of Txt config param value
