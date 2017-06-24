<?php

/**
 * Subclase para representar una fila de la tabla 'fainstedu'.
 *
 * Contiene los registros de las instituciones educativas
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fainstedu extends BaseFainstedu
{
    public function getNomedo()
  {
   return Herramientas::getX('CODEDO','Ocestado','Nomedo',self::getCodedo());
  }

  public function getNomciu()
  {
   return Herramientas::getX('CODCIU','Occiudad','Nomciu',self::getCodciu());
  }

  public function getNommun()
  {
   return Herramientas::getX('CODMUN','Ocmunici','Nommun',self::getCodmun());
  }
  public function getNompar()
  {
   return Herramientas::getX('CODPAR','Ocparroq','Nompar',self::getCodpar());
  }
  public function getNomdep()
  {
    $fadependencia = $this->getFadependencia();
    if($fadependencia) return $fadependencia->getNomdep();
    return '';
  }
  public function getNomsub()
  {
    $fasubsistema = $this->getFasubsistema();
    if($fasubsistema) return $fasubsistema->getNomsub();
    return '';
  }
}
