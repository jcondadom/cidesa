<?php

/**
 * Subclass for representing a row from the 'fadescto'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fadescto.php 47350 2012-02-16 14:29:19Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fadescto extends BaseFadescto
{
  public function getDescta()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcta());
  }
}
