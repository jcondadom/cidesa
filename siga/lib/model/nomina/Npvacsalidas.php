<?php

/**
 * Subclase para representar una fila de la tabla 'npvacsalidas'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Npvacsalidas.php 45802 2011-09-01 15:45:35Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npvacsalidas extends BaseNpvacsalidas
{
  protected $diaspend=0;
  protected $objvac=array();	
  protected $pagadas='';
  protected $perini='';
  protected $perfin='';
  protected $diasdisfrutar2=0;
  protected $diasdisfrutados=0;
  protected $diasvac=0;
  protected $diasbonovac=0;
  protected $diasbonovacpag=0;
  protected $archixls='';
  protected $fecvac2='';
  protected $fecdes2='';
  protected $fecfin2='';
  protected $fechas2='';
	




  public function getNomemp()
  {
  	  $c = new Criteria();
  	  $c->add(NphojintPeer::CODEMP,self::getCodemp());
  	  $nombre = NphojintPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomemp();
	  else
	    return ' ';
   }

  public function getFecing($formato=false)
  {
  	  $c = new Criteria();
  	  $c->add(NphojintPeer::CODEMP,self::getCodemp());
  	  $fecha = NphojintPeer::doSelectone($c);
	  if ($fecha)
	   if ($formato)
	     return date("d/m/Y",strtotime($fecha->getFecing()));
	   else
	     return date("d/m/Y",strtotime($fecha->getFecing()));
	  	 #return $fecha->getFecing();
	  else
	    return ' ';
   }  
   
}
