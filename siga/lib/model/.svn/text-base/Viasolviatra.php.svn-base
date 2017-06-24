<?php

/**
 * Subclase para representar una fila de la tabla 'viasolviatra'.
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
class Viasolviatra extends BaseViasolviatra
{
    protected $grid=array();
    protected $check='';
    protected $check2=false;
    protected $check3=false;
    protected $codnivaprsig='';
    protected $eti="";
    protected $fecdes="";
    protected $fechas="";
    protected $gridbolaer=array();
    protected $gridtrater=array();

    public function getNomemp()
    {
        //if (H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra')!='S')
        if (!self::getEsnoemp())
            return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codemp);
        else
            return H::getX_vacio('Rifnemp','Vianoemp','Nomnemp',$this->codemp);
    }
    public function getCedemp()
    {
        //if (H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra')!='S')
        if (!self::getEsnoemp())
            return H::getX_vacio('Codemp','Nphojint','Cedemp',$this->codemp);
        else
            return H::getX_vacio('Cedrif','Opbenefi','Cedrif',$this->codemp);
    }
    public function getCargo()
    {
        $codcar = NphojintPeer::getCodcar($this->codemp);
        $nomcar = NphojintPeer::getNomcar($codcar);
        if ($codcar=='' && $nomcar=='')
            return '';
        else
          return $codcar.'  -  '.$nomcar;
    }
    public function getNivel()
    {
        $nomniv='';
        $codniv = H::getX_vacio('Codemp','Nphojint','Codniv',$this->codemp);
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
    public function getNomcat()
    {
        return H::getX_vacio('Codcat','Npcatpre','Nomcat',$this->codcat);
    }
    public function getDesniv()
    {
        return H::getX_vacio('Codniv','Viadefniv','Desniv',$this->codniv);
    }
    public function getNomempaco()
    {
        //if (H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra')!='S')
        if (!self::getEsnoemp())
            return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codempaco);
        else
            return H::getX_vacio('Cedrif','Opbenefi','Nomben',$this->codempaco);
    }
    public function getCedempaco()
    {
        //if (H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra')!='S')
        if (!self::getEsnoemp())
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
    public function getNomempaut()
    {
        $respon=H::getConfApp2('respon', 'tesoreria', 'tesdesubi');
        if ($respon=='S')
        {
         return  self::getNomempe();
        }else {
            return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codempaut);
        }
    }
    public function getCedempaut()
    {
        return H::getX_vacio('Codemp','Nphojint','Cedemp',$this->codempaut);
    }
    public function getNivelaut()
    {
        $nomniv='';
        $codniv = H::getX_vacio('Codemp','Nphojint','Codniv',$this->codempaut);
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
    public function getDesproced()
    {
        return H::getX_vacio('Codproced','Viadefproced','Desproced',$this->codproced);
    }
    public function getDesfortra()
    {
        return H::getX_vacio('Codfortra','Viadeffortra','Desfortra',$this->codfortra);
    }
    public function getRefsol()
    {
        return self::getNumsol();
    }
    public function getEmpleado()
    {
         //if (H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra')!='S')
        if (!self::getEsnoemp())
            $nomemp= H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codemp);
        else
            $nomemp= H::getX_vacio('Cedrif','Opbenefi','Nomben',$this->codemp);

        return  $this->codemp!='' ? $this->codemp.'  -  '.$nomemp : '';
    }
    public function getCodnivapract()
    {
        return self::getCodnivapr();
    }
    public function getNivact()
    {
        return H::getX_vacio('Codnivapr','Viadefnivapr','Desnivapr',$this->codnivapr);
    }
    public function getCodnivaprsig()
    {
        if (self::getEsnoemp())
            return '';
        else {
            $priori=0;
            $c = new Criteria();
            $c->add(ViaasopronivPeer::CODPROCED,$this->codproced);
            $c->add(ViaasopronivPeer::CODNIVAPR,$this->codnivapr);
            $per = ViaasopronivPeer::doSelectOne($c);
            if($per)
              $priori=$per->getPrioriapr();

            $c = new Criteria();
            $c->add(ViaasopronivPeer::CODPROCED,$this->codproced);
            $c->add(ViaasopronivPeer::PRIORIAPR,($priori+1));
            $per = ViaasopronivPeer::doSelectOne($c);
            if($per)
              return $per->getCodnivapr();
            else
              return '';
        }
    }
    public function getNivsig()
    {
        $desniv=H::getX_vacio('Codnivapr','Viadefnivapr','Desnivapr',self::getCodnivaprsig());
        return  $desniv ? $desniv : 'NIVEL ACTUAL ES ULTIMO' ;
    }
    public function getNomciu()
    {
        return H::getX_vacio('Codciu','Viaciudad','Nomciu',$this->codciu);
    }
    public function getCodest()
    {
        return H::getX_vacio('Codciu','Viaciudad','Codest',$this->codciu);
    }
    public function getNomest()
    {
        return H::getX_vacio('Codest','Viaestado','Nomest',self::getCodest());
    }

      public function getNommun()
  {
      return H::getXx('Viamunicip',array('CODMUN','VIAESTADO_CODEST'),array(self::getCodmun(),self::getCodest()),'nommun');
  }  
    /*public function getCodpai()
    {
        if($this->codciu!='')
            return H::getX_vacio('Codciu','Viaciudad','Codpai',$this->codciu);
        else
        {
           $c = new Criteria();
           $c->addAscendingOrderByColumn(ViapaisPeer::CODPAI);
           $per = ViapaisPeer::doSelectOne($c);
           if($per)
             return $per->getCodpai();
           else
             return '0001';
        }
    }*/
    public function getNompai()
    {
        return H::getX_vacio('Codpai','Viapais','Nompai',self::getCodpai());
    }
    public function getStatus2()
    {
        if ($this->getStatus()=='P') return 'Por Aprobar';
        else if ($this->getStatus()=='A') return  'Aprobado';
        else if ($this->getStatus()=='N') return  'Anulado';
        else return '';       
    }
    public function getTipvia2()
    {
        return $this->getTipvia()=='N' ? 'NACIONAL' : ($this->getTipvia()=='I' ? 'INTERNACIONAL' : '');
    }

     public function getDesubi()
    {
        return H::getX_vacio('Codubi','Bnubica','Desubi',$this->codubi);
    }

     public function getDescen()
    {
        return H::getX_vacio('Codcen','Cadefcen','Descen',$this->codcen);
    }

    public function getDesdirec()
    {
        return H::getX_vacio('Coddirec','Cadefdirec','Desdirec',$this->coddirec);
    }

    public function getNomempusu()
    {
      return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codempusu);
    }

    /*public function getCelemp()
    {
       return H::getX_vacio('Codemp','Nphojint','Celemp',$this->codempusu);
    }  */

    public function getNomreporte()
    {
      $c = new Criteria();
      $per = ViadefgenPeer::doSelectOne($c);    
      if($per)
        $reppreimpsol=$per->getReppreimpsol();
      else $reppreimpsol="";

      return $reppreimpsol;
    }

    public function afterhydrate(){
        if (self::getStatusdir()=='A')
            $this->check3=true;
        else $this->check3=false;

       if (self::getStatusdir()=='P')
             $this->check2=true;
        else $this->check2=false;
    }

     public function getDeseve()
    {
        return H::getX_vacio('Codeve','Cpevepre','Deseve',$this->codeve);
    }

  public function getDespro()
  {
    $catprofor=H::getConfApp2('catprofor', 'compras', 'almordcom');
      if ($catprofor=='S')
        return Herramientas::getX('CODPRO','Fordefpry','Nompro',self::getCodpro());
      else
        return H::getX_vacio('CODPRO','Catippro','Despro',self::getCodpro());
  } 
}
