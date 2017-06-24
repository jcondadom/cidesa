<?php

/**
 * Subclase para representar una fila de la tabla 'opciecaj'.
 *
 * Tabla que contiene información referente al cierre de caja chica
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Opciecaj extends BaseOpciecaj
{
	protected $mascaraubi = "";
    protected $lonubi = 0;
    protected $fecdes = '';
    protected $fechas = '';
    protected $obj1=array();
    protected $obj2=array();
    protected $cadesel='';
    protected $cedrif='';
    protected $tipcom='';
    protected $tippag='';
    protected $sujren='';
    protected $monape=0;
    protected $ctapag='';
    protected $idrefer="";
    protected $totalcomprobantes = '';



  public function getNomext()
  {
  return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getCodfin());
  }

  public function getDesubi()
  {
  return Herramientas::getX('CODUBI','Bnubica','Desubi',self::getCodubi());
  }

  public function getIdrefer()
  {
    return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
  }
}
