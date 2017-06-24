<?php
/**
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Andreas Gohr <gohr@cosmocode.de>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'action.php');

class action_plugin_googlesearch extends DokuWiki_Action_Plugin {

    /**
     * return some info
     */
    function getInfo(){
        return array(
            'author' => 'Andreas Gohr',
            'email'  => 'gohr@cosmocode.de',
            'date'   => '2006-07-17',
            'name'   => 'Google Search Plugin',
            'desc'   => 'Search the wiki using the Google API',
            'url'    => 'http://wiki:splitbrain.org/plugin:googlesearch',
        );
    }

    /**
     * register the eventhandlers
     */
    function register(&$controller){
        $controller->register_hook('ACTION_ACT_PREPROCESS',
                                   'BEFORE',
                                   $this,
                                   'handle_act_preprocess',
                                   array());

        $controller->register_hook('TPL_ACT_UNKNOWN',
                                   'BEFORE',
                                   $this,
                                   'handle_act_unknown',
                                   array());
    }

    /**
     * Checks if 'googlesearch' was given as action, if so we
     * do handle the event our self and no further checking takes place
     */
    function handle_act_preprocess(&$event, $param){
        if($event->data != 'googlesearch') return; // nothing to do for us

        $event->stopPropagation(); // this is our very own action, no need to check other plugins
        $event->preventDefault();  // we handle it our self, thanks
    }

    /**
     * If our own 'googlesearch' action was given we produce our content here
     */
    function handle_act_unknown(&$event, $param){
        if($event->data != 'googlesearch') return; // nothing to do for us

        // we can handle it -> prevent others
        $event->stopPropagation();
        $event->preventDefault();

        global $QUERY;
        $this->_search($QUERY,$_REQUEST['start']);
    }

    /**
     * Do the google search and display the results
     */
    function _search($q,$start=0){
        global $conf;
        require_once(dirname(__FILE__).'/nusoap.php');
        require_once(dirname(__FILE__).'/GoogleAPI.php');

        $start = (int) $start;
        if($start < 0) $start = 0;

        //prepare site URL
        $urlinfo = parse_url(DOKU_URL);
        $url = $urlinfo['host'];

        // do the search
        $API = new GoogleAPI($this->getConf('apikey'),$url);
        $ret = $API->do_search($q,$start,$this->getConf('maxresults'));

        // handle errors
        if($ret === false){
            echo $this->locale_xhtml('error');
            echo '<p>';
            echo $this->external_link('http://www.google.com/search?hl=en&safe=off&q='.
                                      urlencode("site:$url $q"),'Search for '.hsc($q),
                                      'urlextern',$conf['target']['extern']);
            echo '</p>';

            echo '<p><b>Error:</b> <em>'.hsc($API->error).'</em></p>';
            return;
        }

        // no results
        if(!count($ret['resultElements'])){
            echo $this->locale_xhtml('noresult');
            return;
        }

        // give info
        if($ret['estimateIsExact']){
            $info = $this->getLang('resultinfo');
        }else{
            $info = $this->getLang('estimateinfo');
        }
        $info = str_replace('%from',$ret['startIndex'],$info);
        $info = str_replace('%to',$ret['endIndex'],$info);
        $info = str_replace('%num',$ret['estimatedTotalResultsCount'],$info);
        $info = str_replace('%q',hsc($q),$info);

        echo $this->locale_xhtml('result');
        echo "<p>$info</p>";

        // output results
        foreach($ret['resultElements'] as $hit){
            echo '<div class="search_result">';
            echo $this->external_link($hit['URL'],$hit['title'],
                                      'wikilink1',$conf['target']['intern']);
            echo '<div class="search_snippet">';
            echo $hit['snippet'];
            echo '</div>';

            echo '</div>';
        }

        echo '<div class="googlesearch_nav">';

        // give paging buttons
        if($ret['startIndex'] > 1){
            $prev = $ret['startIndex'] - $this->getConf('maxresults') - 1;
            if($prev < 0) $prev = 0;

            echo $this->external_link(wl('',array('do'=>'googlesearch','id'=>$q,'start'=>$prev),'false','&'),
                                      $this->getLang('prev'),'wikilink1 gs_prev',$conf['target']['intern']);
        }


        if($ret['endIndex'] < $ret['estimatedTotalResultsCount'] - $this->getConf('maxresults')){
            $next = $ret['endIndex'] + $this->getConf('maxresults');

            echo $this->external_link(wl('',array('do'=>'googlesearch','id'=>$q,'start'=>$next),'false','&'),
                                      $this->getLang('next'),'wikilink1 gs_next',$conf['target']['intern']);
        }

        echo '</div>';
        //dbg($ret);
    }

    /**
     * Outputs the search form
     *
     * Static function to call from your template like this:
     * action_plugin_googlesearch::searchform()
     */
    function searchform(){
        global $lang;
        global $ACT;
        global $QUERY;

        print '<form action="'.wl().'" accept-charset="utf-8" class="search" id="dw__search"><div class="no">';
        print '<input type="hidden" name="do" value="googlesearch" />';
        print '<input type="text" ';
        if($ACT == 'googlesearch') print 'value="'.htmlspecialchars($QUERY).'" ';
        print 'id="qsearch__in" accesskey="f" name="id" class="edit" title="[ALT+F]" />';
        print '<input type="submit" value="'.$lang['btn_search'].'" class="button" />';
        print '</div></form>';
    }
}

//Setup VIM: ex: et ts=4 enc=utf-8 :
