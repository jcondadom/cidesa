<?php

/**
 * Subclass for representing a row from the 'cacorrel'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Cacorrel extends BaseCacorrel
{
  public function getSecdes()
  {
    return H::getNextvalSecuencia('cacorrel_seq_cordes');
  }

  public function getSecreq()
  {
    return H::getNextvalSecuencia('cacorrel_seq_correq');
  }

  public function getSecent()
  {
    return H::getNextvalSecuencia('cacorrel_seq_corent');
  }

  public function getSecsal()
  {
    return H::getNextvalSecuencia('cacorrel_seq_corsal');
  }

  public function getSecajuoc()
  {
    return H::getNextvalSecuencia('cacorrel_seq_corajuoc');
  }

}
