<?php

/**
 * Subclass for representing a row from the 'caartalm'.
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
class Caartalm extends BaseCaartalm
{
	//private $exiact = '';
	private $exiact2 = '';
	protected $ubicacion = '';

	public function getNomalm()
	{
		return Herramientas::getX('CODALM', 'Cadefalm', 'Nomalm',self::getCodalm());

	}

	public function getNomubi()
	{
		return Herramientas::getX('CODUBI', 'Cadefubi', 'Nomubi', self::getCodubi());

	}

	public function getDesart()
	{
		return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
	}

    public function getUnimed()
	{
		return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
	}

    public function getUnimed2()
	{
		return Herramientas::getX('CODART','Caregart','Unialt',self::getCodart());
	}


	/*public function setExiact($val){

		$this->exiact = $val;
	}

	public function getExiact(){

		return $this->exiact;
	}*/

	public function setExiact2($val){

		$this->exiact2 = $val;
	}

	public function getExiact2(){

		return $this->exiact2;
	}

        public function afterHydrate() {
            
         $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
          $c = new Criteria();
          if ($manartlot=='S')
          {
              $sql="select a.codubi, b.nomubi, a.exiact, a.numlot, a.fecela, a.fecven, a.codalm, a.id
                FROM  caartalmubi a, cadefubi b
                  where a.codubi=b.codubi
                and a.codalm='".$this->codalm."'and a.codart='".$this->codart."'
                order by a.codubi";
          }else {
          $sql="select a.codubi, b.nomubi, a.exiact, a.codalm, a.id
                FROM  caartalmubi a, cadefubi b
          where a.codubi=b.codubi
                and a.codalm='".$this->codalm."'and a.codart='".$this->codart."'
                order by a.codubi";
          }
          if (Herramientas::BuscarDatos($sql,$per)) {
            foreach ($per as $datos)
            {
               if ($manartlot=='S')
                   $this->ubicacion=$this->ubicacion . $datos["codubi"].'_' . $datos["nomubi"].'_' . H::FormatoMonto($datos["exiact"]) .'_'. $datos["numlot"].'_' . date('d/m/Y',  strtotime($datos["fecela"])) .'_'. date('d/m/Y',  strtotime($datos["fecven"])). '!';
               else
                   $this->ubicacion=$this->ubicacion . $datos["codubi"].'_' . $datos["nomubi"].'_' . H::FormatoMonto($datos["exiact"]) .'!';
                   
            }
	 }
        }
        


}
