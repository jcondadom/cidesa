<?php

/**
 * Subclass for representing a row from the 'lidetcom'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Lidetcom.php 44640 2011-06-03 13:03:21Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Lidetcom extends BaseLidetcom
{
  protected $cedemp;
  protected $nomemp;
  protected $nomcar;

  protected $nphojint = null;

  public function getNphojint()
  {
    if(!$this->nphojint){
      $c = new Criteria();
      $c->add(NphojintPeer::CODEMP,$this->codemp);
      $this->nphojint = NphojintPeer::doSelectOne($c);
      if(!$this->nphojint) $this->nphojint = new Nphojint();
    }
  }

  public function getCedemp()
  {
    if(!$this->nphojint) $this->getNphojint();

    return $this->nphojint->getCedemp();
  }

  public function getNomemp()
  {
    if(!$this->nphojint) $this->getNphojint();

    return $this->nphojint->getNomemp();
  }
  
  public function getNomcar()
  {
    if(!$this->nphojint) $this->getNphojint();

    return $this->nphojint->getNomcar();
  }


}
