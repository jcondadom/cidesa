<?php
/*
 *  Configuration Class and generic setting classes
 *
 *  @author  Chris Smith <chris@jalakai.co.uk>
 */

if (!class_exists('configuration0')) {

  class configuration0 {

    var $_name = 'conf';           // name of the config variable found in the files (overridden by $config['varname'])
    var $_format = 'php';          // format of the config file, supported formats - php (overridden by $config['format'])
    var $_heading = '';            // heading string written at top of config file - don't include comment indicators
    var $_loaded = false;          // set to true after configuration files are loaded
    var $_metadata = array();      // holds metadata describing the settings
    var $setting = array();        // array of setting objects
    var $locked = false;           // configuration is considered locked if it can't be updated

    // filenames, these will be eval()'d prior to use so maintain any constants in output
    var $_default_file  = '';
    var $_local_file = '';
    var $_protected_file = '';

    /**
     *  constructor
     */
    function configuration0($datafile) {
        global $conf;

        if (!@file_exists($datafile)) {
          msg('No configuration metadata found at - '.htmlspecialchars($datafile),-1);
          return;
        }
        include($datafile);

        if (isset($config['varname'])) $this->_name = $config['varname'];
        if (isset($config['format'])) $this->_format = $config['format'];
        if (isset($config['heading'])) $this->_heading = $config['heading'];

        if (isset($file['default'])) $this->_default_file = $file['default'];
        if (isset($file['local'])) $this->_local_file = $file['local'];
        if (isset($file['protected'])) $this->_protected_file = $file['protected'];

        $this->locked = $this->_is_locked();

        $this->_metadata = array_merge($meta, $this->get_plugintpl_metadata($conf['template']));

        $this->retrieve_settings();
    }

    function retrieve_settings() {
        global $conf;

        if (!$this->_loaded) {
          $default = array_merge($this->_read_config($this->_default_file), $this->get_plugintpl_default($conf['template']));
          $local = $this->_read_config($this->_local_file);
          $protected = $this->_read_config($this->_protected_file);

          $keys = array_merge(array_keys($this->_metadata),array_keys($default), array_keys($local), array_keys($protected));
          $keys = array_unique($keys);

          foreach ($keys as $key) {
            if (isset($this->_metadata[$key])) {
              $class = $this->_metadata[$key][0];
              $class = ($class && class_exists('setting_'.$class)) ? 'setting_'.$class : 'setting';

              $param = $this->_metadata[$key];
              array_shift($param);
            } else {
              $class = 'setting';
              $param = NULL;
            }

            $this->setting[$key] = new $class($key,$param);
            $this->setting[$key]->initialize($default[$key],$local[$key],$protected[$key]);
          }

          $this->_loaded = true;
        }
    }

    function save_settings($id, $header='', $backup=true) {

      if ($this->locked) return false;

      $file = eval('return '.$this->_local_file.';');

      // backup current file (remove any existing backup)
      if (@file_exists($file) && $backup) {
        if (@file_exists($file.'.bak')) @unlink($file.'.bak');
        if (!@rename($file, $file.'.bak')) return false;
      }

      if (!$fh = @fopen($file, 'wb')) {
        @rename($file.'.bak', $file);     // problem opening, restore the backup
        return false;
      }

      if (empty($header)) $header = $this->_heading;

      $out = $this->_out_header($id,$header);

      foreach ($this->setting as $setting) {
        $out .= $setting->out($this->_name, $this->_format);
      }

      $out .= $this->_out_footer();

      @fwrite($fh, $out);
      fclose($fh);
      return true;
    }

    /**
     * return an array of config settings
     */
    function _read_config($file) {

      if (!$file) return array();

      $config = array();
      $file = eval('return '.$file.';');

      if ($this->_format == 'php') {

        $contents = @php_strip_whitespace($file);
        $pattern = '/\$'.$this->_name.'\[[\'"]([^=]+)[\'"]\] ?= ?(.*?);/';
        $matches=array();
        preg_match_all($pattern,$contents,$matches,PREG_SET_ORDER);

        for ($i=0; $i<count($matches); $i++) {

          // correct issues with the incoming data
          // FIXME ... for now merge multi-dimensional array indices using ____
          $key = preg_replace('/.\]\[./',CM_KEYMARKER,$matches[$i][1]);

          // remove quotes from quoted strings & unescape escaped data
          $value = preg_replace('/^(\'|")(.*)(?<!\\\\)\1$/','$2',$matches[$i][2]);
          $value = strtr($value, array('\\\\'=>'\\','\\\''=>'\'','\\"'=>'"'));

          $config[$key] = $value;
        }
      }

      return $config;
    }

    function _out_header($id, $header) {
      $out = '';
      if ($this->_format == 'php') {
          $out .= '<'.'?php'."\n".
                "/*\n".
                " * ".$header." \n".
                " * Auto-generated by ".$id." plugin \n".
                " * Run for user: ".$_SERVER['REMOTE_USER']."\n".
                " * Date: ".date('r')."\n".
                " */\n\n";
      }

      return $out;
    }

    function _out_footer() {
      $out = '';
      if ($this->_format == 'php') {
          if ($this->_protected_file) {
            $out .= "\n@include(".$this->_protected_file.");\n";
          }
          $out .= "\n// end auto-generated content\n";
      }

      return $out;
    }

    // configuration is considered locked if there is no local settings filename
    // or the directory its in is not writable or the file exists and is not writable
    function _is_locked() {
      if (!$this->_local_file) return true;

      $local = eval('return '.$this->_local_file.';');

      if (!is_writable(dirname($local))) return true;
      if (file_exists($local) && !is_writable($local)) return true;

      return false;
    }

    /**
     *  not used ... conf's contents are an array!
     *  reduce any multidimensional settings to one dimension using CM_KEYMARKER
     */
    function _flatten($conf,$prefix='') {

        $out = array();

        foreach($conf as $key => $value) {
          if (!is_array($value)) {
            $out[$prefix.$key] = $value;
            continue;
          }

          $tmp = $this->_flatten($value,$prefix.$key.CM_KEYMARKER);
          $out = array_merge($out,$tmp);
        }

        return $out;
    }

    /**
     * load metadata for plugin and template settings
     */
    function get_plugintpl_metadata($tpl){
      $file     = '/conf/metadata.php';
      $metadata = array();

      if ($dh = opendir(DOKU_PLUGIN)) {
        while (false !== ($plugin = readdir($dh))) {
          if ($plugin == '.' || $plugin == '..' || $plugin == 'tmp' || $plugin == 'config') continue;
          if (is_file(DOKU_PLUGIN.$plugin)) continue;

          if (@file_exists(DOKU_PLUGIN.$plugin.$file)){
            $meta = array();
            @include(DOKU_PLUGIN.$plugin.$file);
            foreach ($meta as $key => $value){
              $metadata['plugin'.CM_KEYMARKER.$plugin.CM_KEYMARKER.$key] = $value;
            }
          }
        }
        closedir($dh);
      }

      // the same for the active template
      if (@file_exists(DOKU_TPLINC.$file)){
        $meta = array();
        @include(DOKU_TPLINC.$file);
        foreach ($meta as $key => $value){
          $metadata['tpl'.CM_KEYMARKER.$tpl.CM_KEYMARKER.$key] = $value;
        }
      }

      return $metadata;
    }

    /**
     * load default settings for plugins and templates
     */
    function get_plugintpl_default($tpl){
      $file    = '/conf/default.php';
      $default = array();

      if ($dh = opendir(DOKU_PLUGIN)) {
        while (false !== ($plugin = readdir($dh))) {
          if (@file_exists(DOKU_PLUGIN.$plugin.$file)){
            $conf = array();
            @include(DOKU_PLUGIN.$plugin.$file);
            foreach ($conf as $key => $value){
              $default['plugin'.CM_KEYMARKER.$plugin.CM_KEYMARKER.$key] = $value;
            }
          }
        }
        closedir($dh);
      }

      // the same for the active template
      if (@file_exists(DOKU_TPLINC.$file)){
        $conf = array();
        @include(DOKU_TPLINC.$file);
        foreach ($conf as $key => $value){
          $default['tpl'.CM_KEYMARKER.$tpl.CM_KEYMARKER.$key] = $value;
        }
      }

      return $default;
    }

  }
}

if (!class_exists('setting0')) {
  class setting0 {

    var $_key = '';
    var $_default = NULL;
    var $_local = NULL;
    var $_protected = NULL;

    var $_pattern = '';
    var $_error = false;            // only used by those classes which error check
    var $_input = NULL;             // only used by those classes which error check

    function setting0($key, $params=NULL) {
        $this->_key = $key;

        if (is_array($params)) {
          foreach($params as $property => $value) {
            $this->$property = $value;
          }
        }
    }

    /**
     *  recieves current values for the setting $key
     */
    function initialize($default, $local, $protected) {
        if (isset($default)) $this->_default = $default;
        if (isset($local)) $this->_local = $local;
        if (isset($protected)) $this->_protected = $protected;
    }

    /**
     *  update setting with user provided value $input
     *  if value fails error check, save it
     *
     *  @return true if changed, false otherwise (incl. on error)
     */
    function update($input) {
        if (is_null($input)) return false;
        if ($this->is_protected()) return false;

        $value = is_null($this->_local) ? $this->_default : $this->_local;
        if ($value == $input) return false;

        if ($this->_pattern && !preg_match($this->_pattern,$input)) {
          $this->_error = true;
          $this->_input = $input;
          return false;
        }

        $this->_local = $input;
        return true;
    }

    /**
     *  @return   array(string $label_html, string $input_html)
     */
    function html(&$plugin, $echo=false) {
        $value = '';
        $disable = '';

        if ($this->is_protected()) {
          $value = $this->_protected;
          $disable = 'disabled="disabled"';
        } else {
          if ($echo && $this->_error) {
            $value = $this->_input;
          } else {
            $value = is_null($this->_local) ? $this->_default : $this->_local;
          }
        }

        $key = htmlspecialchars($this->_key);
        $value = htmlspecialchars($value);

        $label = '<label for="config__'.$key.'">'.$this->prompt($plugin).'</label>';
        $input = '<textarea rows="3" cols="40" id="config__'.$key.'" name="config['.$key.']" class="edit" '.$disable.'>'.$value.'</textarea>';
        return array($label,$input);
    }

    /**
     *  generate string to save setting value to file according to $fmt
     */
    function out($var, $fmt='php') {

      if ($this->is_protected()) return '';
      if (is_null($this->_local) || ($this->_default == $this->_local)) return '';

      $out = '';

      if ($fmt=='php') {
        // translation string needs to be improved FIXME
        $tr = array("\n"=>'\n', "\r"=>'\r', "\t"=>'\t', "\\" => '\\\\', "'" => '\\\'');
        $tr = array("\\" => '\\\\', "'" => '\\\'');

        $out =  '$'.$var."['".$this->_out_key()."'] = '".strtr($this->_local, $tr)."';\n";
      }

      return $out;
    }

    function prompt(&$plugin) {
      $prompt = $plugin->getLang($this->_key);
      if (!$prompt) $prompt = htmlspecialchars(str_replace(array('____','_'),' ',$this->_key));
      return $prompt;
    }

    function is_protected() { return !is_null($this->_protected); }
    function is_default() { return !$this->is_protected() && is_null($this->_local); }
    function error() { return $this->_error; }

    function _out_key() { return str_replace(CM_KEYMARKER,"']['",$this->_key); }
  }
}


/**
 *  Provide php_strip_whitespace (php5 function) functionality
 *
 *  @author   Chris Smith <chris@jalakai.co.uk>
 */
if (!function_exists('php_strip_whitespace'))  {

  if (function_exists('token_get_all')) {

    if (!defined('T_ML_COMMENT')) {
      define('T_ML_COMMENT', T_COMMENT);
    } else {
      define('T_DOC_COMMENT', T_ML_COMMENT);
    }

    /**
     * modified from original
     * source Google Groups, php.general, by David Otton
     */
    function php_strip_whitespace($file) {
        if (!@is_readable($file)) return '';

        $in = join('',@file($file));
        $out = '';

        $tokens = token_get_all($in);

        foreach ($tokens as $token) {
          if (is_string ($token)) {
            $out .= $token;
          } else {
            list ($id, $text) = $token;
            switch ($id) {
              case T_COMMENT : // fall thru
              case T_ML_COMMENT : // fall thru
              case T_DOC_COMMENT : // fall thru
              case T_WHITESPACE :
                break;
              default : $out .= $text; break;
            }
          }
        }
        return ($out);
    }

  } else {

    function is_whitespace($c) { return (strpos("\t\n\r ",$c) !== false); }
    function is_quote($c) { return (strpos("\"'",$c) !== false); }
    function is_escaped($s,$i) {
        $idx = $i-1;
        while(($idx>=0) && ($s{$idx} == '\\')) $idx--;
        return (($i - $idx + 1) % 2);
    }

    function is_commentopen($str, $i) {
        if ($str{$i} == '#') return "\n";
        if ($str{$i} == '/') {
          if ($str{$i+1} == '/') return "\n";
          if ($str{$i+1} == '*') return "*/";
        }

        return false;
    }

    function php_strip_whitespace($file) {

        if (!@is_readable($file)) return '';

        $contents = join('',@file($file));
        $out = '';

        $state = 0;
        for ($i=0; $i<strlen($contents); $i++) {
          if (!$state && is_whitespace($contents{$i})) continue;

          if (!$state && ($c_close = is_commentopen($contents, $i))) {
            $c_open_len = ($contents{$i} == '/') ? 2 : 1;
            $i = strpos($contents, $c_close, $i+$c_open_len)+strlen($c_close)-1;
            continue;
          }

          $out .= $contents{$i};
          if (is_quote($contents{$i})) {
              if (($state == $contents{$i}) && !is_escaped($contents, $i)) { $state = 0; continue; }
            if (!$state) {$state = $contents{$i}; continue; }
          }
        }

        return $out;
    }
  }
}
