<?php

/**
 * Subclass for representing a row from the 'careqart'.
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
class Careqart extends BaseCareqart
{
	protected $obj = array();
	protected $check = '';
	protected $check2 = '';
	protected $check3 = '';
	protected $totfil = '';
  protected $codest='';
  protected $nomfor="";

	public function getDesubi()
	{
            $catubibnu=H::getConfApp2('catubibnu', 'compras', 'almreq');
            $catubidir=H::getConfApp2('catubidir', 'compras', 'almreq');
            if ($catubibnu=='S')
		return  Herramientas::getX('codubi','bnubica','desubi',self::getCodcatreq());
  else if ($catubidir=='S')
    return  Herramientas::getX('coddirec','Cadefdirec','Desdirec',self::getCodcatreq());
            else
                return  Herramientas::getX('codubi','bnubibie','desubi',self::getCodcatreq());
	}

  public function getDescen()
  {
	return Herramientas::getX('CODCEN','Cadefcen','Descen',self::getCodcen());
  }
  
    public function getNomalm()
  {
	return Herramientas::getX('CODALM','Cadefalm','Nomalm',$this->getCodalm());
  }

  public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',$this->getCodubi());
	}

	public function getNovalcat()
  {
    return H::getConfApp2('novalcat', 'compras', 'almreq');
  }

  public function getDesdirec()
  {
      return H::getX_vacio('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
  }
  
  public function getManunialt()
  {
    return H::getConfApp2('manunialt', 'compras', 'almregart');
  }

   public function getEstatus()
  {
    if ($this->stareq=='N') return 'Requisición Anulada  el '.date('d/m/Y',strtotime(self::getFecanu()));
    else return '';
  }

  public function getDesest()
  {
  return Herramientas::getX('CODEST','Manesttra','Desest',$this->codest);
  }

}
