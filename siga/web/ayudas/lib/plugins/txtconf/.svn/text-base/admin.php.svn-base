<?php
/**
 * Text Config (conf/*.conf) Manager admin plugin
 * http://wiki.splitbrain.org/plugin:txtconf
 *
 * Thanks to everyone who provided so many examples of plugin or
 * contributed to the plugin tutorials... This was of great help!
 * Special thanks to Christopher Smith for his config plugin on
 * which this one is based.
 * If you see part of your code here and I forgot to give credits
 * for your work, please let me know so I could add your name.
 *
 * TODO:
 * - Remove cache for pages affected by conf modif
 * - Add option to download smileys and interwiki icons
 * - Add option to allow edition of "non local files"
 * - ?Add option to edit plugin:explain as well?
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Stephane Chamberland <stephane.chamberland@ec.gc.ca>
 * @date       2006-06-28
 */

if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'admin.php');

if(!defined('PLUGIN_NAME')) define('PLUGIN_NAME','txtconf');

if(!defined('DOKU_CONF')) define('DOKU_CONF',DOKU_INC.'conf/');
require_once(DOKU_INC.'inc/confutils.php');

define('PLUGIN_TXTCONF',dirname(__FILE__).'/');
require_once(PLUGIN_TXTCONF.'config0.class.php'); // base configuration class and generic settings classes from Chris Smith
require_once(PLUGIN_TXTCONF.'txtconfig.class.php'); // Text config class

/**
 * All DokuWiki plugins to extend the admin function
 * need to inherit from this class
 */
class admin_plugin_txtconf extends DokuWiki_Admin_Plugin {

    var $_myconf = null;
    var $_conftype = null;
    var $_input =  null;
    var $_changed = false;

    var $_conf_type_list = array('mime','acronyms','smileys','entities','interwiki');

    /**
     * return some info
     */
    function getInfo(){
        return array(
            'author' => 'Stephane Chamberland ',
            'email'  => 'stephane.chamberland@ec.gc.ca',
            'date'   => '2006-06-09',
            'name'   => $this->getLang('menu'),
            'desc'   => $this->getLang('desc'),
            'url'    => 'http://wiki.splitbrain.org/plugin:'.PLUGIN_NAME,
        );
    }

    /**
     * return sort order for position in admin menu
     */
    function getMenuSort() {
        return 101;
    }

    /**
     * handle user request
     */
    function handle() {
        global $ID;
        global $lang;

        if (isset($_POST['conftype'])) {
            $this->_myconf = new txtconfiguration(PLUGIN_TXTCONF.'conf/'.$_POST['conftype'].'.metadata.php');
            $this->_conftype = $_POST['conftype'];
            //if (!isset($_POST['txtconf'])) {
            //    ptnl('Ask for confirmation');
            //}
            // don't go any further if the configuration is locked
            if ($this->_myconf->_locked) return True;
        }

        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == $lang['btn_save']) {
                $this->_input = $_REQUEST['config'];
                while (list($key) = each($this->_myconf->setting)) {
                    $input = isset($this->_input[$key]) ? $this->_input[$key] : NULL;
                    if ($input == '') $input = null;
                    if ($this->_myconf->setting[$key]->update($input))
                        $this->_changed = true;
                    //if ($this->_myconf->setting[$key]->error())
                    //    $this->_error = true;
                }
            }

            if ($_POST['submit'] == $this->getLang('btn_addnew')) {
                //TODO: check if it already exists
                if( $this->_myconf->add_local_setting($_POST['newkey'],$_POST['newval'])) $this->_changed = true;
            }

            if ($this->_changed  && !$this->_error) {
                if ($this->_myconf->save_settings(PLUGIN_NAME)) {
                    msg('Successfully Saved '.$this->_conftype,1);
                } else {
                    msg('Problem Saving '.$this->_conftype,-1);
                }
            }
        }
        return True;
    }

    /**
     * output appropriate html
     */

    function _print_open_form() {
        global $ID;
        ptln('<div id="'.PLUGIN_NAME.'__manager">');
        ptln('<form action="'.wl($ID).'" method="post">');
        ptln('  <input type="hidden" name="do"     value="admin" />');
        ptln('  <input type="hidden" name="page"   value="'.PLUGIN_NAME.'" />');
        ptln('  <input type="hidden" name="id"     value="'.$ID.'" />');
    }

    function _print_close_form() {
        ptln('</form>');
        ptln('</div>');
    }

    function _print_choose_conf_form($msg='') {
        global $ID;
        global $lang;

        if ($msg) {
            ptln('<p>');
            if ($msg) ptln($msg);
            ptln('</p>');
        }
        ptln('<p>');

        ptln('<select name="conftype">');
        foreach ($this->_conf_type_list as $mytype) {
            if ($this->_conftype && $this->_conftype == $mytype) {
                ptln('<option value="'.$mytype.'" selected="selected">'.$mytype.'</option>');
            } else {
                ptln('<option value="'.$mytype.'">'.$mytype.'</option>');
            }
        }
        ptln('</select>');

        ptln('<input type="submit" name="submit" class="button" value="'.$this->getLang('btn_editThisConf').'" />');
        ptln('</p>');
    }

    function _html_choose_conf() {
        global $ID;
        global $lang;

        print $this->locale_xhtml('intro');

        $this->_print_open_form();

        $this->_print_choose_conf_form($this->getLang('msg_chooseConf'));

        $this->_print_close_form();
    }

    function _html_edit_conf() {
        global $ID;
        global $lang;

        //print $this->locale_xhtml('intro_'.$this->myconf->type);
        print $this->locale_xhtml($this->_myconf->_intro);

        ptln('<hr size=80%/>');
        ptln('<p>'.$this->getLang('msg_howto').'</p>');

        //TODO: Once form is updated/saved, print success/error msg

        $this->_print_open_form();

        ptln('  <input type="hidden" name="txtconf"     value="1" />');
        ptln('  <input type="hidden" name="conftype"    value="'.$this->_conftype.'" />');

        ptln('<table>');
        foreach ($this->_myconf->setting as $mysetting) {
            list($label,$value) = $mysetting->html($this);
            ptln('<tr>');
            ptln('<td>'.$label.'</td>');
            ptln('<td>'.$value.'</td>');
            ptln('</tr>');
        }
        ptln('</table>');

        if (!$this->_myconf->locked) {
        ptln('<p>');
        ptln('  <input type="submit" name="submit" class="button" value="'.$lang['btn_save'].'" accesskey="s" />'."&nbsp;\n");
        ptln('  <input type="reset" class="button" value="'.$lang['btn_reset'].'" />'."\n");
        ptln('</p>');

        ptln('<hr size=80%/>');
        ptln('<p>'.$this->getLang('msg_howtoadd').'</p>');

        ptln('<p>');
        ptln('<input id="newkey" name="newkey" type="text" class="edit" size="10" value="" />');
        ptln('<input id="newval" name="newval" type="text" class="edit" size="70" value="" /><br />');
        ptln('  <input type="submit" name="submit" class="button" value="'.$this->getLang('btn_addnew').'" />'."\n");
        ptln('</p>');
        } else {
            ptln('<p>'.$this->getLang('filelocked').'</p>');
        }

        ptln('<hr width=80%/>');
        ptln('<p>');
        $this->_print_choose_conf_form($this->getLang('msg_editThisConf'));
        ptln('</p>');

        $this->_print_close_form();
    }

    function html() {
        if ($this->_myconf) {
            $this->_html_edit_conf();
        } else {
            $this->_html_choose_conf();
        }
    }
}
