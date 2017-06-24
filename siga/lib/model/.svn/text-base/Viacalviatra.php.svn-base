<?php

/**
 * Subclase para representar una fila de la tabla 'viacalviatra'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Viacalviatra extends BaseViacalviatra
{
    protected $grid=array();
    protected $check='';
    protected $tipvia='';
    protected $fecdes="";
    protected $fechas="";
    protected $grid2=array();

    public function getNomext()
    {
        return H::getX('Tipcom','Cpdoccom','Nomext',$this->tipcom);
    }

    public function getFecsol()
    {
        if($this->refsol)
            return date('d/m/Y',strtotime(H::getX('Numsol','Viasolviatra','Fecsol',$this->refsol)));
        else
            return '';
    }
    public function getTipvia()
    {
        if(H::getX('Numsol','Viasolviatra','Tipvia',$this->refsol)=='N')
            return 'NACIONAL';
        elseif(H::getX('Numsol','Viasolviatra','Tipvia',$this->refsol)=='I')
            return 'INTERNACIONAL';
        else
            return '';
    }
    public function getEmpleado()
    {
        /*$codemp=H::getX('Numsol','Viasolviatra','Codemp',$this->refsol);
        $nomemp=H::getX('Codemp','Nphojint','Nomemp',$codemp);
        return  $codemp!='' ? $codemp.'  -  '.$nomemp : '';*/
        $codemp=H::getX_vacio('Numsol','Viasolviatra','Codemp',$this->refsol);
        $esnoemp=H::getX_vacio('Numsol','Viasolviatra','Esnoemp',$this->refsol);
        //if (H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra')!='S')          
        if (!$esnoemp)
            $nomemp=H::getX_vacio('Codemp','Nphojint','Nomemp',$codemp);
        else
            $nomemp=H::getX_vacio('Cedrif','Opbenefi','Nomben',$codemp);

        return  $codemp!='' ? $codemp.'  -  '.$nomemp : '';
    }
    public function getNivel()
    {
        $codniv=H::getX_vacio('Numsol','Viasolviatra','Codniv',$this->refsol);
        $desniv=H::getX_vacio('Codniv','Viadefniv','Desniv',$codniv);
        return $codniv!='' ? $codniv.'  -  '.$desniv : '';
    }
    public function getEmpleadoaco()
    {
        $codemp=H::getX_vacio('Numsol','Viasolviatra','Codempaco',$this->refsol);
        $esnoemp=H::getX_vacio('Numsol','Viasolviatra','Esnoemp',$this->refsol);
        //if (H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra')!='S') 
        if (!$esnoemp)
            $nomemp=H::getX_vacio('Codemp','Nphojint','Nomemp',$codemp);
        else
            $nomemp=H::getX_vacio('Cedrif','Opbenefi','Nomben',$codemp);
        return  $codemp!='' ? $codemp.'  -  '.$nomemp : '';
    }
    public function getNivelaco()
    {
        $codniv=H::getX_vacio('Numsol','Viasolviatra','Codnivaco',$this->refsol);
        $desniv=H::getX_vacio('Codniv','Viadefniv','Desniv',$codniv);
        return $codniv!='' ? $codniv.'  -  '.$desniv : '';
    }
    public function getTipviatic()
    {
        return H::getX_vacio('Numsol','Viasolviatra','Tipvia',$this->refsol);
    }
    public function getProced()
    {
        $codproced=H::getX_vacio('Numsol','Viasolviatra','Codproced',$this->refsol);
        $desproced = H::getX_vacio('Codproced','Viadefproced','Desproced',$codproced);
        return $codproced!='' ? $codproced.'  -  '.$desproced : '';
    }
    public function getFortra()
    {
        $codfortra = H::getX_vacio('Numsol','Viasolviatra','Codfortra',$this->refsol);
        $desfortra = H::getX_vacio('Codfortra','Viadeffortra','Desfortra',$codfortra);
        return $codfortra!='' ? $codfortra.'  -  '.$desfortra : '';
    }
    public function getFecdes()
    {
        return $this->refsol ? date('d/m/Y',strtotime(H::getX_vacio('Numsol','Viasolviatra','Fecdes',$this->refsol))): '';
    }
    public function getFechas()
    {
        return $this->refsol ?  date('d/m/Y',strtotime(H::getX_vacio('Numsol','Viasolviatra','Fechas',$this->refsol))): '';
    }
    public function getNumdia()
    {
        return H::getX_vacio('Numsol','Viasolviatra','Numdia',$this->refsol);
    }
    public function getEmpleadoaut()
    {
        $respon=H::getConfApp2('respon', 'tesoreria', 'tesdesubi');
        if ($respon=='S')
        {
            $codemp=H::getX_vacio('Numsol','Viasolviatra','Codempaut',$this->refsol);
            $nomemp=H::getX_vacio('Numsol','Viasolviatra','Nomempe',$this->refsol);
        }else {
            $codemp=H::getX_vacio('Numsol','Viasolviatra','Codempaut',$this->refsol);
            $nomemp=H::getX_vacio('Codemp','Nphojint','Nomemp',$codemp);
        }
        return  $codemp!='' ? $codemp.'  -  '.$nomemp : '';
    }
    public function getDessol()
    {
        return H::getX_vacio('Numsol','Viasolviatra','dessol',$this->refsol);
    }
    public function getNomcat()
    {
        return H::getX_vacio('Codcat','Npcatpre','Nomcat',$this->codcat);
    }
    public function getCodnivaco()
    {
        return H::getX_vacio('Numsol','Viasolviatra','Codnivaco',$this->refsol);
    }
    public function getCodniv()
    {
        return H::getX_vacio('Numsol','Viasolviatra','Codniv',$this->refsol);
    }
    public function getMontot()
    {
        $monto=0;
        $c = new Criteria();
        $c->add(ViadetcalviatraPeer::NUMCAL,$this->numcal);
        $per = ViadetcalviatraPeer::doSelect($c);
        foreach($per as $r)
        {
            $monto+=$r->getMontot();
        }
        return H::FormatoMonto($monto);
    }
    public function getFecha()
    {
        return self::getFeccal();
    }
    public function getDescrip()
    {
        return H::getX_vacio('Numsol','Viasolviatra','Dessol',$this->refsol);
    }
    public function getCodemp()
    {
        return H::getX('Numsol','Viasolviatra','Codemp',$this->refsol);
    }
    public function getCompromiso()
    {
        return $this->status=='N' ? 'Anulado el '.date('d/m/Y',$this->fecanu) : ($this->refcom ? 'COMPROMISO NRO '.$this->refcom : '');
    }
    public function getCiudad()
    {
        $codciu = H::getX_vacio('Numsol','Viasolviatra','Codciu',$this->refsol);
        return $codciu.'  -  '.H::getX_vacio('Codciu','Viaciudad','Nomciu',$codciu);
    }
    public function getEstado()
    {
        $codciu = H::getX_vacio('Numsol','Viasolviatra','Codciu',$this->refsol);
        $codest = H::getX_vacio('Codciu','Viaciudad','Codest',$codciu);
        return $codest.'  -  '.H::getX_vacio('Codest','Viaestado','Nomest',$codest);
    }
    public function getPais()
    {
        $codciu = H::getX_vacio('Numsol','Viasolviatra','Codciu',$this->refsol);
        $codpai = H::getX_vacio('Codciu','Viaciudad','Codpai',$codciu);
        return $codpai.'  -  '.H::getX_vacio('Codpai','Viapais','Nompai',$codpai);
    }
    public function getRefcal()
    {
        return $this->numcal;
    }
    public function getCategoria()
    {
        $nomcat=H::getX_vacio('Codcat','Npcatpre','Nomcat',$this->codcat);
        return  $this->codcat!='' ? $this->codcat.'  -  '.$nomcat : '';

    }

    public function getUnidadsol()
    {
        $codubi=H::getX_vacio('Numsol','Viasolviatra','codubi',$this->refsol);
        $desubi=H::getX_vacio('Codubi','Bnubica','Desubi',$codubi);
        return  $codubi!='' ? $codubi.'  -  '.$desubi : '';
    }

    public function getUnidadeje()
    {
        $codcen=H::getX_vacio('Numsol','Viasolviatra','Codcen',$this->refsol);
        $descen=H::getX_vacio('Codcen','Cadefcen','Descen',$codcen);
        return  $codcen!='' ? $codcen.'  -  '.$descen : '';
    }

    public function getNomreporte()
    {
      $c = new Criteria();
      $per = ViadefgenPeer::doSelectOne($c);    
      if($per)
        $reppreimpcal=$per->getReppreimpcal();
      else $reppreimpcal="";

      return $reppreimpcal;
    }    
    
    public function getValdolar(){
      $c = new Criteria();
      $op = ViadefgenPeer::doSelectOne($c);
      if($op)     
         return $op->getValdolar();
      else
        return 1;

     
    }
}
