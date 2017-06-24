<?php

/**
 * Subclase para representar una fila de la tabla 'viadetsolacoemp'.
 *
 * Tabla que contiene información referente a los acompañantes de Solicitud
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Viadetsolacoemp extends BaseViadetsolacoemp
{
	public function getNomempaco()
    {
        if (H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra')!='S')
            return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codempaco);
        else
            return H::getX_vacio('Cedrif','Opbenefi','Nomben',$this->codempaco);
    }
    public function getCedempaco()
    {
        if (H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra')!='S')
            return H::getX_vacio('Codemp','Nphojint','Cedemp',$this->codempaco);
        else
            return H::getX_vacio('Cedrif','Opbenefi','Cedrif',$this->codempaco);
    }
    public function getNombenaco()
    {
        return H::getX_vacio('Cedrif','Opbenefi','Nomben',$this->codempaco);
    }
    public function getCedrifaco()
    {
        return H::getX_vacio('Cedrif','Opbenefi','Cedrif',$this->codempaco);
    }
    public function getCargoaco()
    {
        $codcar = NphojintPeer::getCodcar($this->codempaco);
        $nomcar = NphojintPeer::getNomcar($codcar);
        if ($codcar=='' && $nomcar=='')
           return '';
        else
           return $codcar.'  -  '.$nomcar;
    }
    public function getNivelaco()
    {
        $nomniv='';
        $codniv = H::getX_vacio('Codemp','Nphojint','Codniv',$this->codempaco);
        $c2 = new Criteria();
        $c2->add(NpestorgPeer::CODNIV,$codniv);
        $per2 = NpestorgPeer::doSelectOne($c2);
        if($per2)
            $nomniv=$per2->getDesniv();
        if ($codniv=='' && $nomniv=='')
            return '';
        else
          return $codniv.'  -  '.$nomniv;
    }
    public function getDesnivaco()
    {
        return H::getX_vacio('Codniv','Viadefniv','Desniv',$this->codnivaco);
    }
}
