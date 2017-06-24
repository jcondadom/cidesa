<?php

/**
 * Subclase para representar una fila de la tabla 'npexplab'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author:dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Npexplab.php 34274 2009-10-26 22:32:03Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npexplab extends BaseNpexplab
{
  /*public function getDesniv()
  {
    return Herramientas::getX('CODNIV','Npestorg','Desniv',self::getCodniv());
  }*/

  public function getNomnom()
  {
    return Herramientas::getX('CODNOM','Npnomina','Nomnom',self::getCodnom());
  }

  /*public function getDedica()
  {
    $r = Herramientas::getX('CODEMP','Npasicaremp','codtie',self::getCodemp());
    return Herramientas::getX('CODTIE','Nptiempo','destie',$r);
  }*/
  public function getCondic()
  {
    self::getFecini()==null ? $fecini = date('Y-m-d') : $fecini = self::getFecini();
    self::getFecter()==null ? $fecter = date('Y-m-d') : $fecter = self::getFecter();

   $sql="select * from npasicaremp where codemp='".self::getCodemp()."' and fecasi<='$fecter' and fecasi>='$fecini'";
    if (Herramientas::BuscarDatos($sql,$resul))
       $r=$resul[0]["status"]; else $r='';

    return $r=='V' ? 'VIGENTE' : 'NO VIGENTE';
  }

 /*  public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);

      $r = Herramientas::getX('CODEMP','Npasicaremp','codtie',self::getCodemp());
      $this->dedica= 'aaaaaa';//Herramientas::getX('CODTIE','Nptiempo','destie',$r);

   }*/


}
