<?php

/**
 * facestcueintref actions.
 *
 * @package    Roraima
 * @subpackage facestcueintref
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 40715 2010-09-21 21:02:58Z dmartinez $
 * @version    SVN: $Id: actions.class.php 40715 2010-09-21 21:02:58Z dmartinez $
 */
class facestcueintrefActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('default', 'module');
  }
}
