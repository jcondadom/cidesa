<?php

/**
 * Subclase para representar una fila de la tabla 'faordtra'.
 *
 * Tabla para registrar las Ordenes de Trabajo
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Faordtra extends BaseFaordtra
{
	protected $obj=array();
	protected $rifpro="";
    protected $nompro="";
    protected $grid=array();
    protected $fecdes="";
    protected $fechas="";
    protected $check="0";
    protected $nomcompl="";
    protected $embar="";
    protected $fecord2="";

	  protected function afterHydrate()
	  {
	    $t= new Criteria();
	    $t->add(FaclientePeer::CODPRO, $this->codcli);
	    $result= FaclientePeer::doSelectOne($t);
	    if ($result)
	    {
	        $this->rifpro=$result->getRifpro();
	        $this->nompro=$result->getNompro();
	        $this->nomcompl=$this->rifpro.' - '.$this->nompro;
	    }
	    $this->embar=$this->codemb. ' - '.$this->getNomemb();
	    $this->fecord2=date('d/m/Y',strtotime(self::getFecord()));
	  }

	public function getDespre()
	{
	    return H::getX_vacio('REFPRE','Fapresup','Despre',self::getRefpre());
	}	  

	public function getDessed()
	{
	    return H::getX_vacio('CODSED','Fadefsed','Dessed',self::getCodsed());
	}	  

  public function getNomemb()
  {
      return H::getX_vacio('CODEMB','Faembarca','Nomemb',self::getCodemb());
  }	  
}
