<?php
/*
 *  TxtConfiguration Class and generic setting classes
 *
 *  @author     Stephane Chamberland <stephane.chamberland@ec.gc.ca>
 *
 *  Extends Configuration Class and generic setting classes by Chris Smith <chris@jalakai.co.uk>
 *  Deals with TXT (None PHP) config files
 */

if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

if(!defined('PLUGIN_TXTCONF')) define('PLUGIN_TXTCONF',dirname(__FILE__).'/');

require_once(PLUGIN_TXTCONF.'config0.class.php');


if (!class_exists('txtconfiguration') && class_exists('configuration0')) {

  class txtconfiguration extends configuration0 {

    var $_intro = '';
    var $_format = 'txt';
    var $_defkeymeta = array('text');      // holds metametadata describing the settings key/name
    var $_defvalmeta = array('text');      // holds metametadata describing the settings valueblog

   /**
     *  constructor
     */
    function txtconfiguration($datafile) {
        global $conf;

        if (!@file_exists($datafile)) {
          //TODO: localize msg
          msg('No configuration metadata found at - '.htmlspecialchars($datafile),-1);
          return;
        }
        include($datafile);

        //?TODO:? fill $meta with appropriate values

        if (isset($config['intro'])) $this->_intro = $config['intro'];

        if (isset($config['varname'])) $this->_name = $config['varname'];
        if (isset($config['format'])) $this->_format = $config['format'];
        if (isset($config['heading'])) $this->_heading = $config['heading'];

        if (isset($file['default'])) $this->_default_file = $file['default'];
        if (isset($file['local'])) $this->_local_file = $file['local'];
        if (isset($file['protected'])) $this->_protected_file = $file['protected'];

        if (isset($metameta['key'])) $this->_defkeymeta = $metameta['key'];
        if (isset($metameta['value'])) $this->_defvalmeta = $metameta['value'];

        $this->locked = $this->_is_locked();

        //$this->_metadata = array_merge($meta, $this->get_plugintpl_metadata($conf['template']));

        $this->retrieve_settings();
    }

    function retrieve_settings() {
        global $conf;

        if (!$this->_loaded) {
          //$default = array_merge($this->_read_config($this->_default_file), $this->get_plugintpl_default($conf['template']));
          $default = $this->_read_config($this->_default_file);
          $local = $this->_read_config($this->_local_file);
          $protected = $this->_read_config($this->_protected_file);

          $keys = array_merge(array_keys($this->_metadata),array_keys($default), array_keys($local), array_keys($protected));
          $keys = array_unique($keys);

          $class = NULL;
          $defparam = NULL;
          if (isset($this->_defvalmeta[0])) {
            $class = $this->_defvalmeta[0];
            $defparam = $this->_defvalmeta;
            array_shift($defparam);
          }
          $defclass = ($class && class_exists('setting_'.$class)) ? 'setting_'.$class : 'setting0';

          foreach ($keys as $key) {
            if (isset($this->_metadata[$key])) {
              $class = $this->_metadata[$key][0];
              //$class = ($class && class_exists('setting_'.$class)) ? 'setting_'.$class : 'setting';
              //$param = $this->_metadata[$key];
              //array_shift($param);
              //$class = $defclass;
              $param = $defparam;
              if ($class && class_exists('setting_'.$class)) {
                $class = 'setting_'.$class;
                $param = $this->_metadata[$key];
                array_shift($param);
              }
            } else {
              //$class = 'setting';
              //$param = NULL;
              $class = $defclass;
              $param = $defparam;
            }

            $this->setting[$key] = new $class($key,$param);
            $this->setting[$key]->initialize($default[$key],$local[$key],$protected[$key]);
          }

          $this->_loaded = true;
        }

    }

    function add_local_setting($key,$value) {
        global $conf;

        $defclass = NULL;
        $defparam = NULL;
        $class = NULL;
        if (isset($this->_defvalmeta[0])) {
            $class = $this->_defvalmeta[0];
            $defparam = $this->_defvalmeta;
            array_shift($defparam);
        }
        $defclass = ($class && class_exists('setting_'.$class)) ? 'setting_'.$class : 'setting0';

        $class = $defclass;
        $param = $defparam;

        if (isset($this->_metadata[$key])) {
            $class = $this->_metadata[$key][0];
            $param = $defparam;
            if ($class && class_exists('setting_'.$class)) {
                $class = 'setting_'.$class;
                $param = $this->_metadata[$key];
                array_shift($param);
            }
        }

        $this->setting[$key] = new $class($key,$param);
        $this->setting[$key]->initialize(null,$value,null);

        //TODO: if key already exist, return False
        return True;
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
      } else if ($this->_format == 'txt') {
        //TODO: if confToHash not found, include(confutils.php)
        //if(!defined('DOKU_CONF')) define('DOKU_CONF',DOKU_INC.'conf/');
        //require_once(DOKU_INC.'inc/confutils.php');
        //include();
        $config = confToHash($file);
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
      } else if ($this->_format == 'txt') {
          $out .=
                "#\n".
                "# ".$header." \n".
                "# Auto-generated by ".$id." plugin \n".
                "# Run for user: ".$_SERVER['REMOTE_USER']."\n".
                "# Date: ".date('r')."\n".
                "#\n\n";
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
      } else if ($this->_format == 'txt') {
          $out .= "\n# end auto-generated content\n";
      }

      return $out;
    }

    function html() {
    }

  }
}

if (!class_exists('setting_text')  && class_exists('setting0')) {
  class setting_text extends setting0 {

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
        $defaultstyle = '';
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

        if (is_null($this->_local)) $defaultstyle = 'style="font-weight:bold;"';

        $key = htmlspecialchars($this->_key);
        $value = htmlspecialchars($value);

        //$label = '<input type="checkbox" name="configbox__'.$key.'" value="1"'.$noerase.'/> <label for="config__'.$key.'">'.$key.'</label>&nbsp;';
       $label = '<label '.$defaultstyle.' for="config__'.$key.'">'.$key.'</label>&nbsp;';
        //$input = '<textarea rows="3" cols="80" id="config__'.$key.'" name="config['.$key.']" class="edit" '.$disable.'>'.$value.'</textarea>';
        $input = '<input id="config__'.$key.'" name="config['.$key.']" type="text" class="edit" size="80" value="'.$value.'" '.$disable.'/>';
        return array($label,$input);
    }

    /**
     *  generate string to save setting value to file according to $fmt
     */
    function out($var='config', $fmt='txt') {

      if ($this->is_protected()) return '';
      if (is_null($this->_local) || ($this->_default == $this->_local)) return '';

      if ($fmt=='php') {
        // translation string needs to be improved FIXME
        $tr = array("\n"=>'\n', "\r"=>'\r', "\t"=>'\t', "\\" => '\\\\', "'" => '\\\'');
        $tr = array("\\" => '\\\\', "'" => '\\\'');

        $out =  '$'.$var."['".$this->_out_key()."'] = '".strtr($this->_local, $tr)."';\n";
      } else if ($fmt=='txt') {
        //$value = is_null($this->_local) ? $this->_default : $this->_local;
        //$out =  $this->_key."\t".$value."\n";
         $out =  $this->_key."\t".$this->_local."\n";
     }

      return $out;
    }

  }
}
