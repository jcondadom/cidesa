<?php

/**
 * Subclass for representing a row from the 'tsdefban'.
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
class Tsdefban extends BaseTsdefban
{
	protected $fechades = '';
	protected $fechahas = '';
	protected $gripmovban = '';
	protected $gripmovlib = '';
	protected $gripdesmovlib = '';
	protected $gripdesmovban = '';
        protected $deblibdis=0;
        protected $crelibdis=0;
        protected $debbandis=0;
        protected $crebandis=0;
        protected $tiedatrel="";
    protected $mossalmin="";
    protected $etiqueta="";
    protected $obj=array();
    protected $totalcomprobantes="";
    protected $totmov="0,00";

    public function __toString()
  {
    return array($this->numcue => $this->numcue);
  }

  public function getDestip()
  {
    return Herramientas::getX('CODTIP','Tstipcue','Destip',self::getTipcue());
  }

  public function getDestipren()
  {
    return Herramientas::getX('CODTIP','Tstipren','Destip',self::getTipren());
  }


  public function CalcularDisponibilidad(&$deb,&$cre)
  {
    $result=array();
      $fecinicio="";
        $fecactual="";
        $deb="";
        $cre="";
    $c = new Criteria();
      $c->add(ContabaPeer::CODEMP,'001');
      $dato = ContabaPeer::doSelectOne($c);
      if ($dato)
      {
        $fecinicio = $dato->getFecini();
          $fecinicio =date("d/m/Y",strtotime($fecinicio));
      }
      $fechaactual=date('d/m/Y');

    $sql = "SELECT coalesce(SUM(CASE WHEN A.DEBCRE='D' THEN B.MONMOV/(CASE WHEN COALESCE(B.VALMON,0)=0 THEN 1.00 ELSE B.VALMON END) ELSE 0 END),0) as debitos,
     coalesce(SUM(CASE WHEN A.DEBCRE='C' THEN B.MONMOV/(CASE WHEN COALESCE(B.VALMON,0)=0 THEN 1.00 ELSE B.VALMON END) ELSE 0 END),0) as creditos "
      . "FROM TSTIPMOV A,TSMOVLIB B,TSDEFBAN C WHERE B.NUMCUE = '". self::getNumcue(). "' AND b.numcue = c.numcue and "
      . "B.TIPMOV = A.CODTIP AND "
      . "B.FECLib <= to_date('". $fechaactual ."','dd/mm/yyyy') AND "
      . "B.FECLib >= to_date('". $fecinicio ."','dd/mm/yyyy')";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $deb = $result[0]['debitos'];
      $cre = $result[0]['creditos'];
    }else{
        $deb=0;
        $cre=0;
    }
  }

  public function CalcularDisponibilidad2(&$deb2,&$cre2)
  {
      $result=array();
      $fecinicio="";
        $fecactual="";
        $deb="";
        $cre="";
    $c = new Criteria();
      $c->add(ContabaPeer::CODEMP,'001');
      $dato = ContabaPeer::doSelectOne($c);
      if ($dato)
      {
        $fecinicio = $dato->getFecini();
          $fecinicio =date("d/m/Y",strtotime($fecinicio));
      }
      $fechaactual=date('d/m/Y');

    $sql = "SELECT coalesce(SUM(CASE WHEN A.DEBCRE='D' THEN B.MONMOV/(CASE WHEN COALESCE(B.VALMON,0)=0 THEN 1.00 ELSE B.VALMON END) ELSE 0 END),0) as debitos,
     coalesce(SUM(CASE WHEN A.DEBCRE='C' THEN B.MONMOV/(CASE WHEN COALESCE(B.VALMON,0)=0 THEN 1.00 ELSE B.VALMON END) ELSE 0 END),0) as creditos "
      . "FROM TSTIPMOV A,TSMOVBAN B,TSDEFBAN C WHERE B.NUMCUE = '". self::getNumcue(). "' AND b.numcue = c.numcue and "
      . "B.TIPMOV = A.CODTIP AND "
      . "B.FECBAN <= to_date('". $fechaactual ."','dd/mm/yyyy') AND "
      . "B.FECBAN >= to_date('". $fecinicio ."','dd/mm/yyyy')";
//print $sql; exit;
      if (Herramientas::BuscarDatos($sql,$result))
    {
      $deb2 = $result[0]['debitos'];
      $cre2 = $result[0]['creditos'];
    }else{
        $deb2=0;
        $cre2=0;
    }

  }


      // $this->deblibdis=number_format($deb,2,',','.');
      // $this->crelibdis=number_format($cre,2,',','.');
      // $this->debbandis=number_format($deb2,2,',','.');
      // $this->crebandis=number_format($cre2,2,',','.');

  public function getDeblibdis()
    {
      if($this->deblibdis>0) return number_format($this->deblibdis,2,',','.');
      else{
        self::CalcularDisponibilidad($this->deblibdis,$this->crelibdis);
        return number_format($this->deblibdis,2,',','.');
      }
   }


  public function getCrelibdis()
    {
      if($this->crelibdis>0) return number_format($this->crelibdis,2,',','.');
      else{
        self::CalcularDisponibilidad($this->deblibdis,$this->crelibdis);
        return number_format($this->crelibdis,2,',','.');
      }
   }

     public function getDebbandis()
    {
      if($this->debbandis>0) return number_format($this->debbandis,2,',','.');
      else{
        self::CalcularDisponibilidad2($this->debbandis,$this->crebandis);
        return number_format($this->debbandis,2,',','.');
      }
   }


  public function getCrebandis()
    {
      if($this->crebandis>0) return number_format($this->crebandis,2,',','.');
      else{
        self::CalcularDisponibilidad2($this->debbandis,$this->crebandis);
        return number_format($this->crebandis,2,',','.');
      }
   }


  public function getSaltotlib()
  {
    $saltot= self::getAntlib() + Herramientas::toFloat($this->deblibdis) - Herramientas::toFloat($this->crelibdis);
    return number_format($saltot,2,',','.');
  }


  public function getSaltotban()
  {
    $saltot= self::getAntban() + Herramientas::toFloat($this->debbandis) - Herramientas::toFloat($this->crebandis);
  return number_format($saltot,2,',','.');
  }

  public function getCantdigact()
  {
    if (self::getCantdig()!='')
       return self::getCantdig();
    else
       return 8;
  }

  public function getTiedatrel()
  {
  	  $valor="N";
  	  $d= new Criteria();
  	  $d->add(TsmovlibPeer::NUMCUE,self::getNumcue());
  	  $resul= TsmovlibPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  }else {
  	  $d= new Criteria();
  	  $d->add(TsmovbanPeer::NUMCUE,self::getNumcue());
  	  $resul= TsmovbanPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  }else $valor= 'N';
  	  }

  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }


  public function getMossalmin()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesdefcueban',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('mossalmin',$varemp['aplicacion']['tesoreria']['modulos']['tesdefcueban']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesdefcueban']['mossalmin'];
 }
         }
     return $dato;
  }

  public function setMossalmin()
  {
  	return $this->mossalmin;
  }

  public function getEtiqueta()
  {
  	if (H::toFloat(self::getSaltotlib()) < H::toFloat(self::getSalmin()))
  	{
  		$eti="EL SALDO ACTUAL EN LIBROS ES MENOR AL SALDO MÍNIMO DE LA CUENTA BANCARIA";
  	}
  	else
  	{
  	 $eti="";
  	}
  	return $eti;
  }
  
    public function getFechades($format = 'Y-m-d')
  {

    if ($this->fechades === null || $this->fechades === '') {
      return null;
    } elseif (!is_int($this->fechades)) {
            $ts = adodb_strtotime($this->fechades);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fechades, true));
      }
    } else {
      $ts = $this->fechades;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }
  
  
     public function setFechades($v)
     {
        if (is_array($v)){
        $value_array = $v;
        $v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
        }

        if ($v !== null && !is_int($v)) {
          $ts = adodb_strtotime($v);
          if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
          }
        } else {
          $ts = $v;
        }
        if ($this->fechades !== $ts) {
          $this->fechades = $ts;             
        }
     } 

  public function getFechahas($format = 'Y-m-d')
  {

    if ($this->fechahas === null || $this->fechahas === '') {
      return null;
    } elseif (!is_int($this->fechahas)) {
            $ts = adodb_strtotime($this->fechahas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fechahas, true));
      }
    } else {
      $ts = $this->fechahas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }
  
  
     public function setFechahas($v)
     {
        if (is_array($v)){
        $value_array = $v;
        $v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
        }

        if ($v !== null && !is_int($v)) {
          $ts = adodb_strtotime($v);
          if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
          }
        } else {
          $ts = $v;
        }
        if ($this->fechahas !== $ts) {
          $this->fechahas = $ts;             
        }
     }
     
  public function getDescom()
  {
    return H::getX_vacio('CODCOM','Tscomban','Descom',self::getCodcom());
  }

  public function getDestiptra()
  {
    return Herramientas::getX('CODTIPTRA','Cotiptra','Destiptra',self::getCodtiptra());
  }

   public function getTiecodadi()
    {
        return H::getConfApp2('tiecodadi', 'tesoreria', 'tesdefcueban');
    }

      public function getDesubi()
  {
    return H::getX_vacio('CODUBI','Bnubica','Desubi',self::getCodubi());
  }


  public function getDesdirec()
  {
    return H::getX_vacio('CODDIREC','Cadefdirec','Desdirec',self::getCoddirec());
  }

   public function getTieimpcarban()
    {
        return H::getConfApp2('impcarban', 'tesoreria', 'tesdefcueban');
    }  
 }
