<?php


abstract class BaseFafacturpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reffac;


	
	protected $fecfac;


	
	protected $codcli;


	
	protected $desfac;


	
	protected $tipref;


	
	protected $monfac;


	
	protected $mondesc;


	
	protected $codconpag;


	
	protected $numcom;


	
	protected $reapor;


	
	protected $fecanu;


	
	protected $status;


	
	protected $observ;


	
	protected $tipmon;


	
	protected $valmon;


	
	protected $numcomord;


	
	protected $numcominv;


	
	protected $sucursal;


	
	protected $motanu;


	
	protected $vuelto;


	
	protected $codcaj;


	
	protected $numcontrol;


	
	protected $codubi;


	
	protected $muelle;


	
	protected $buque;


	
	protected $expedi;


	
	protected $bele;


	
	protected $factura;


	
	protected $embarca;


	
	protected $descarga;


	
	protected $canbul;


	
	protected $codprod;


	
	protected $tmdesc;


	
	protected $fecatra;


	
	protected $fecinidesc;


	
	protected $fecfindesc;


	
	protected $valcifs;


	
	protected $fadescripfac_id;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReffac()
  {

    return trim($this->reffac);

  }
  
  public function getFecfac($format = 'Y-m-d')
  {

    if ($this->fecfac === null || $this->fecfac === '') {
      return null;
    } elseif (!is_int($this->fecfac)) {
            $ts = adodb_strtotime($this->fecfac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfac] as date/time value: " . var_export($this->fecfac, true));
      }
    } else {
      $ts = $this->fecfac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getDesfac()
  {

    return trim($this->desfac);

  }
  
  public function getTipref()
  {

    return trim($this->tipref);

  }
  
  public function getMonfac($val=false)
  {

    if($val) return number_format($this->monfac,2,',','.');
    else return $this->monfac;

  }
  
  public function getMondesc($val=false)
  {

    if($val) return number_format($this->mondesc,2,',','.');
    else return $this->mondesc;

  }
  
  public function getCodconpag()
  {

    return $this->codconpag;

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getReapor()
  {

    return trim($this->reapor);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getTipmon()
  {

    return trim($this->tipmon);

  }
  
  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,2,',','.');
    else return $this->valmon;

  }
  
  public function getNumcomord()
  {

    return trim($this->numcomord);

  }
  
  public function getNumcominv()
  {

    return trim($this->numcominv);

  }
  
  public function getSucursal()
  {

    return trim($this->sucursal);

  }
  
  public function getMotanu()
  {

    return trim($this->motanu);

  }
  
  public function getVuelto($val=false)
  {

    if($val) return number_format($this->vuelto,2,',','.');
    else return $this->vuelto;

  }
  
  public function getCodcaj()
  {

    return $this->codcaj;

  }
  
  public function getNumcontrol()
  {

    return trim($this->numcontrol);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getMuelle()
  {

    return trim($this->muelle);

  }
  
  public function getBuque()
  {

    return trim($this->buque);

  }
  
  public function getExpedi()
  {

    return trim($this->expedi);

  }
  
  public function getBele()
  {

    return trim($this->bele);

  }
  
  public function getFactura()
  {

    return trim($this->factura);

  }
  
  public function getEmbarca()
  {

    return trim($this->embarca);

  }
  
  public function getDescarga()
  {

    return trim($this->descarga);

  }
  
  public function getCanbul($val=false)
  {

    if($val) return number_format($this->canbul,2,',','.');
    else return $this->canbul;

  }
  
  public function getCodprod()
  {

    return trim($this->codprod);

  }
  
  public function getTmdesc($val=false)
  {

    if($val) return number_format($this->tmdesc,2,',','.');
    else return $this->tmdesc;

  }
  
  public function getFecatra($format = 'Y-m-d')
  {

    if ($this->fecatra === null || $this->fecatra === '') {
      return null;
    } elseif (!is_int($this->fecatra)) {
            $ts = adodb_strtotime($this->fecatra);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecatra] as date/time value: " . var_export($this->fecatra, true));
      }
    } else {
      $ts = $this->fecatra;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecinidesc($format = 'Y-m-d')
  {

    if ($this->fecinidesc === null || $this->fecinidesc === '') {
      return null;
    } elseif (!is_int($this->fecinidesc)) {
            $ts = adodb_strtotime($this->fecinidesc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecinidesc] as date/time value: " . var_export($this->fecinidesc, true));
      }
    } else {
      $ts = $this->fecinidesc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfindesc($format = 'Y-m-d')
  {

    if ($this->fecfindesc === null || $this->fecfindesc === '') {
      return null;
    } elseif (!is_int($this->fecfindesc)) {
            $ts = adodb_strtotime($this->fecfindesc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfindesc] as date/time value: " . var_export($this->fecfindesc, true));
      }
    } else {
      $ts = $this->fecfindesc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getValcifs($val=false)
  {

    if($val) return number_format($this->valcifs,2,',','.');
    else return $this->valcifs;

  }
  
  public function getFadescripfacId()
  {

    return $this->fadescripfac_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReffac($v)
	{

    if ($this->reffac !== $v) {
        $this->reffac = $v;
        $this->modifiedColumns[] = FafacturproPeer::REFFAC;
      }
  
	} 
	
	public function setFecfac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfac !== $ts) {
      $this->fecfac = $ts;
      $this->modifiedColumns[] = FafacturproPeer::FECFAC;
    }

	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = FafacturproPeer::CODCLI;
      }
  
	} 
	
	public function setDesfac($v)
	{

    if ($this->desfac !== $v) {
        $this->desfac = $v;
        $this->modifiedColumns[] = FafacturproPeer::DESFAC;
      }
  
	} 
	
	public function setTipref($v)
	{

    if ($this->tipref !== $v) {
        $this->tipref = $v;
        $this->modifiedColumns[] = FafacturproPeer::TIPREF;
      }
  
	} 
	
	public function setMonfac($v)
	{

    if ($this->monfac !== $v) {
        $this->monfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturproPeer::MONFAC;
      }
  
	} 
	
	public function setMondesc($v)
	{

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturproPeer::MONDESC;
      }
  
	} 
	
	public function setCodconpag($v)
	{

    if ($this->codconpag !== $v) {
        $this->codconpag = $v;
        $this->modifiedColumns[] = FafacturproPeer::CODCONPAG;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = FafacturproPeer::NUMCOM;
      }
  
	} 
	
	public function setReapor($v)
	{

    if ($this->reapor !== $v) {
        $this->reapor = $v;
        $this->modifiedColumns[] = FafacturproPeer::REAPOR;
      }
  
	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = FafacturproPeer::FECANU;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = FafacturproPeer::STATUS;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = FafacturproPeer::OBSERV;
      }
  
	} 
	
	public function setTipmon($v)
	{

    if ($this->tipmon !== $v) {
        $this->tipmon = $v;
        $this->modifiedColumns[] = FafacturproPeer::TIPMON;
      }
  
	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturproPeer::VALMON;
      }
  
	} 
	
	public function setNumcomord($v)
	{

    if ($this->numcomord !== $v) {
        $this->numcomord = $v;
        $this->modifiedColumns[] = FafacturproPeer::NUMCOMORD;
      }
  
	} 
	
	public function setNumcominv($v)
	{

    if ($this->numcominv !== $v) {
        $this->numcominv = $v;
        $this->modifiedColumns[] = FafacturproPeer::NUMCOMINV;
      }
  
	} 
	
	public function setSucursal($v)
	{

    if ($this->sucursal !== $v) {
        $this->sucursal = $v;
        $this->modifiedColumns[] = FafacturproPeer::SUCURSAL;
      }
  
	} 
	
	public function setMotanu($v)
	{

    if ($this->motanu !== $v) {
        $this->motanu = $v;
        $this->modifiedColumns[] = FafacturproPeer::MOTANU;
      }
  
	} 
	
	public function setVuelto($v)
	{

    if ($this->vuelto !== $v) {
        $this->vuelto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturproPeer::VUELTO;
      }
  
	} 
	
	public function setCodcaj($v)
	{

    if ($this->codcaj !== $v) {
        $this->codcaj = $v;
        $this->modifiedColumns[] = FafacturproPeer::CODCAJ;
      }
  
	} 
	
	public function setNumcontrol($v)
	{

    if ($this->numcontrol !== $v) {
        $this->numcontrol = $v;
        $this->modifiedColumns[] = FafacturproPeer::NUMCONTROL;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = FafacturproPeer::CODUBI;
      }
  
	} 
	
	public function setMuelle($v)
	{

    if ($this->muelle !== $v) {
        $this->muelle = $v;
        $this->modifiedColumns[] = FafacturproPeer::MUELLE;
      }
  
	} 
	
	public function setBuque($v)
	{

    if ($this->buque !== $v) {
        $this->buque = $v;
        $this->modifiedColumns[] = FafacturproPeer::BUQUE;
      }
  
	} 
	
	public function setExpedi($v)
	{

    if ($this->expedi !== $v) {
        $this->expedi = $v;
        $this->modifiedColumns[] = FafacturproPeer::EXPEDI;
      }
  
	} 
	
	public function setBele($v)
	{

    if ($this->bele !== $v) {
        $this->bele = $v;
        $this->modifiedColumns[] = FafacturproPeer::BELE;
      }
  
	} 
	
	public function setFactura($v)
	{

    if ($this->factura !== $v) {
        $this->factura = $v;
        $this->modifiedColumns[] = FafacturproPeer::FACTURA;
      }
  
	} 
	
	public function setEmbarca($v)
	{

    if ($this->embarca !== $v) {
        $this->embarca = $v;
        $this->modifiedColumns[] = FafacturproPeer::EMBARCA;
      }
  
	} 
	
	public function setDescarga($v)
	{

    if ($this->descarga !== $v) {
        $this->descarga = $v;
        $this->modifiedColumns[] = FafacturproPeer::DESCARGA;
      }
  
	} 
	
	public function setCanbul($v)
	{

    if ($this->canbul !== $v) {
        $this->canbul = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturproPeer::CANBUL;
      }
  
	} 
	
	public function setCodprod($v)
	{

    if ($this->codprod !== $v) {
        $this->codprod = $v;
        $this->modifiedColumns[] = FafacturproPeer::CODPROD;
      }
  
	} 
	
	public function setTmdesc($v)
	{

    if ($this->tmdesc !== $v) {
        $this->tmdesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturproPeer::TMDESC;
      }
  
	} 
	
	public function setFecatra($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecatra] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecatra !== $ts) {
      $this->fecatra = $ts;
      $this->modifiedColumns[] = FafacturproPeer::FECATRA;
    }

	} 
	
	public function setFecinidesc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecinidesc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecinidesc !== $ts) {
      $this->fecinidesc = $ts;
      $this->modifiedColumns[] = FafacturproPeer::FECINIDESC;
    }

	} 
	
	public function setFecfindesc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfindesc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfindesc !== $ts) {
      $this->fecfindesc = $ts;
      $this->modifiedColumns[] = FafacturproPeer::FECFINDESC;
    }

	} 
	
	public function setValcifs($v)
	{

    if ($this->valcifs !== $v) {
        $this->valcifs = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturproPeer::VALCIFS;
      }
  
	} 
	
	public function setFadescripfacId($v)
	{

    if ($this->fadescripfac_id !== $v) {
        $this->fadescripfac_id = $v;
        $this->modifiedColumns[] = FafacturproPeer::FADESCRIPFAC_ID;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FafacturproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reffac = $rs->getString($startcol + 0);

      $this->fecfac = $rs->getDate($startcol + 1, null);

      $this->codcli = $rs->getString($startcol + 2);

      $this->desfac = $rs->getString($startcol + 3);

      $this->tipref = $rs->getString($startcol + 4);

      $this->monfac = $rs->getFloat($startcol + 5);

      $this->mondesc = $rs->getFloat($startcol + 6);

      $this->codconpag = $rs->getInt($startcol + 7);

      $this->numcom = $rs->getString($startcol + 8);

      $this->reapor = $rs->getString($startcol + 9);

      $this->fecanu = $rs->getDate($startcol + 10, null);

      $this->status = $rs->getString($startcol + 11);

      $this->observ = $rs->getString($startcol + 12);

      $this->tipmon = $rs->getString($startcol + 13);

      $this->valmon = $rs->getFloat($startcol + 14);

      $this->numcomord = $rs->getString($startcol + 15);

      $this->numcominv = $rs->getString($startcol + 16);

      $this->sucursal = $rs->getString($startcol + 17);

      $this->motanu = $rs->getString($startcol + 18);

      $this->vuelto = $rs->getFloat($startcol + 19);

      $this->codcaj = $rs->getInt($startcol + 20);

      $this->numcontrol = $rs->getString($startcol + 21);

      $this->codubi = $rs->getString($startcol + 22);

      $this->muelle = $rs->getString($startcol + 23);

      $this->buque = $rs->getString($startcol + 24);

      $this->expedi = $rs->getString($startcol + 25);

      $this->bele = $rs->getString($startcol + 26);

      $this->factura = $rs->getString($startcol + 27);

      $this->embarca = $rs->getString($startcol + 28);

      $this->descarga = $rs->getString($startcol + 29);

      $this->canbul = $rs->getFloat($startcol + 30);

      $this->codprod = $rs->getString($startcol + 31);

      $this->tmdesc = $rs->getFloat($startcol + 32);

      $this->fecatra = $rs->getDate($startcol + 33, null);

      $this->fecinidesc = $rs->getDate($startcol + 34, null);

      $this->fecfindesc = $rs->getDate($startcol + 35, null);

      $this->valcifs = $rs->getFloat($startcol + 36);

      $this->fadescripfac_id = $rs->getInt($startcol + 37);

      $this->id = $rs->getInt($startcol + 38);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 39; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fafacturpro object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

  
  public function get($m, $a)
    {

      if(method_exists($this,$m)){
        $obj_fk = $this->$m();
        if($obj_fk) return $obj_fk->$a();
      } return '';
    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FafacturproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FafacturproPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FafacturproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FafacturproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FafacturproPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = FafacturproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FafacturproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReffac();
				break;
			case 1:
				return $this->getFecfac();
				break;
			case 2:
				return $this->getCodcli();
				break;
			case 3:
				return $this->getDesfac();
				break;
			case 4:
				return $this->getTipref();
				break;
			case 5:
				return $this->getMonfac();
				break;
			case 6:
				return $this->getMondesc();
				break;
			case 7:
				return $this->getCodconpag();
				break;
			case 8:
				return $this->getNumcom();
				break;
			case 9:
				return $this->getReapor();
				break;
			case 10:
				return $this->getFecanu();
				break;
			case 11:
				return $this->getStatus();
				break;
			case 12:
				return $this->getObserv();
				break;
			case 13:
				return $this->getTipmon();
				break;
			case 14:
				return $this->getValmon();
				break;
			case 15:
				return $this->getNumcomord();
				break;
			case 16:
				return $this->getNumcominv();
				break;
			case 17:
				return $this->getSucursal();
				break;
			case 18:
				return $this->getMotanu();
				break;
			case 19:
				return $this->getVuelto();
				break;
			case 20:
				return $this->getCodcaj();
				break;
			case 21:
				return $this->getNumcontrol();
				break;
			case 22:
				return $this->getCodubi();
				break;
			case 23:
				return $this->getMuelle();
				break;
			case 24:
				return $this->getBuque();
				break;
			case 25:
				return $this->getExpedi();
				break;
			case 26:
				return $this->getBele();
				break;
			case 27:
				return $this->getFactura();
				break;
			case 28:
				return $this->getEmbarca();
				break;
			case 29:
				return $this->getDescarga();
				break;
			case 30:
				return $this->getCanbul();
				break;
			case 31:
				return $this->getCodprod();
				break;
			case 32:
				return $this->getTmdesc();
				break;
			case 33:
				return $this->getFecatra();
				break;
			case 34:
				return $this->getFecinidesc();
				break;
			case 35:
				return $this->getFecfindesc();
				break;
			case 36:
				return $this->getValcifs();
				break;
			case 37:
				return $this->getFadescripfacId();
				break;
			case 38:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FafacturproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReffac(),
			$keys[1] => $this->getFecfac(),
			$keys[2] => $this->getCodcli(),
			$keys[3] => $this->getDesfac(),
			$keys[4] => $this->getTipref(),
			$keys[5] => $this->getMonfac(),
			$keys[6] => $this->getMondesc(),
			$keys[7] => $this->getCodconpag(),
			$keys[8] => $this->getNumcom(),
			$keys[9] => $this->getReapor(),
			$keys[10] => $this->getFecanu(),
			$keys[11] => $this->getStatus(),
			$keys[12] => $this->getObserv(),
			$keys[13] => $this->getTipmon(),
			$keys[14] => $this->getValmon(),
			$keys[15] => $this->getNumcomord(),
			$keys[16] => $this->getNumcominv(),
			$keys[17] => $this->getSucursal(),
			$keys[18] => $this->getMotanu(),
			$keys[19] => $this->getVuelto(),
			$keys[20] => $this->getCodcaj(),
			$keys[21] => $this->getNumcontrol(),
			$keys[22] => $this->getCodubi(),
			$keys[23] => $this->getMuelle(),
			$keys[24] => $this->getBuque(),
			$keys[25] => $this->getExpedi(),
			$keys[26] => $this->getBele(),
			$keys[27] => $this->getFactura(),
			$keys[28] => $this->getEmbarca(),
			$keys[29] => $this->getDescarga(),
			$keys[30] => $this->getCanbul(),
			$keys[31] => $this->getCodprod(),
			$keys[32] => $this->getTmdesc(),
			$keys[33] => $this->getFecatra(),
			$keys[34] => $this->getFecinidesc(),
			$keys[35] => $this->getFecfindesc(),
			$keys[36] => $this->getValcifs(),
			$keys[37] => $this->getFadescripfacId(),
			$keys[38] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FafacturproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReffac($value);
				break;
			case 1:
				$this->setFecfac($value);
				break;
			case 2:
				$this->setCodcli($value);
				break;
			case 3:
				$this->setDesfac($value);
				break;
			case 4:
				$this->setTipref($value);
				break;
			case 5:
				$this->setMonfac($value);
				break;
			case 6:
				$this->setMondesc($value);
				break;
			case 7:
				$this->setCodconpag($value);
				break;
			case 8:
				$this->setNumcom($value);
				break;
			case 9:
				$this->setReapor($value);
				break;
			case 10:
				$this->setFecanu($value);
				break;
			case 11:
				$this->setStatus($value);
				break;
			case 12:
				$this->setObserv($value);
				break;
			case 13:
				$this->setTipmon($value);
				break;
			case 14:
				$this->setValmon($value);
				break;
			case 15:
				$this->setNumcomord($value);
				break;
			case 16:
				$this->setNumcominv($value);
				break;
			case 17:
				$this->setSucursal($value);
				break;
			case 18:
				$this->setMotanu($value);
				break;
			case 19:
				$this->setVuelto($value);
				break;
			case 20:
				$this->setCodcaj($value);
				break;
			case 21:
				$this->setNumcontrol($value);
				break;
			case 22:
				$this->setCodubi($value);
				break;
			case 23:
				$this->setMuelle($value);
				break;
			case 24:
				$this->setBuque($value);
				break;
			case 25:
				$this->setExpedi($value);
				break;
			case 26:
				$this->setBele($value);
				break;
			case 27:
				$this->setFactura($value);
				break;
			case 28:
				$this->setEmbarca($value);
				break;
			case 29:
				$this->setDescarga($value);
				break;
			case 30:
				$this->setCanbul($value);
				break;
			case 31:
				$this->setCodprod($value);
				break;
			case 32:
				$this->setTmdesc($value);
				break;
			case 33:
				$this->setFecatra($value);
				break;
			case 34:
				$this->setFecinidesc($value);
				break;
			case 35:
				$this->setFecfindesc($value);
				break;
			case 36:
				$this->setValcifs($value);
				break;
			case 37:
				$this->setFadescripfacId($value);
				break;
			case 38:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FafacturproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReffac($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecfac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcli($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesfac($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipref($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonfac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMondesc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodconpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumcom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setReapor($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecanu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStatus($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setObserv($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipmon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setValmon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setNumcomord($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNumcominv($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setSucursal($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setMotanu($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setVuelto($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodcaj($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setNumcontrol($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCodubi($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setMuelle($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setBuque($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setExpedi($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setBele($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setFactura($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setEmbarca($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setDescarga($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCanbul($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCodprod($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setTmdesc($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setFecatra($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setFecinidesc($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setFecfindesc($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setValcifs($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setFadescripfacId($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setId($arr[$keys[38]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FafacturproPeer::DATABASE_NAME);

		if ($this->isColumnModified(FafacturproPeer::REFFAC)) $criteria->add(FafacturproPeer::REFFAC, $this->reffac);
		if ($this->isColumnModified(FafacturproPeer::FECFAC)) $criteria->add(FafacturproPeer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(FafacturproPeer::CODCLI)) $criteria->add(FafacturproPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(FafacturproPeer::DESFAC)) $criteria->add(FafacturproPeer::DESFAC, $this->desfac);
		if ($this->isColumnModified(FafacturproPeer::TIPREF)) $criteria->add(FafacturproPeer::TIPREF, $this->tipref);
		if ($this->isColumnModified(FafacturproPeer::MONFAC)) $criteria->add(FafacturproPeer::MONFAC, $this->monfac);
		if ($this->isColumnModified(FafacturproPeer::MONDESC)) $criteria->add(FafacturproPeer::MONDESC, $this->mondesc);
		if ($this->isColumnModified(FafacturproPeer::CODCONPAG)) $criteria->add(FafacturproPeer::CODCONPAG, $this->codconpag);
		if ($this->isColumnModified(FafacturproPeer::NUMCOM)) $criteria->add(FafacturproPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(FafacturproPeer::REAPOR)) $criteria->add(FafacturproPeer::REAPOR, $this->reapor);
		if ($this->isColumnModified(FafacturproPeer::FECANU)) $criteria->add(FafacturproPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(FafacturproPeer::STATUS)) $criteria->add(FafacturproPeer::STATUS, $this->status);
		if ($this->isColumnModified(FafacturproPeer::OBSERV)) $criteria->add(FafacturproPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(FafacturproPeer::TIPMON)) $criteria->add(FafacturproPeer::TIPMON, $this->tipmon);
		if ($this->isColumnModified(FafacturproPeer::VALMON)) $criteria->add(FafacturproPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(FafacturproPeer::NUMCOMORD)) $criteria->add(FafacturproPeer::NUMCOMORD, $this->numcomord);
		if ($this->isColumnModified(FafacturproPeer::NUMCOMINV)) $criteria->add(FafacturproPeer::NUMCOMINV, $this->numcominv);
		if ($this->isColumnModified(FafacturproPeer::SUCURSAL)) $criteria->add(FafacturproPeer::SUCURSAL, $this->sucursal);
		if ($this->isColumnModified(FafacturproPeer::MOTANU)) $criteria->add(FafacturproPeer::MOTANU, $this->motanu);
		if ($this->isColumnModified(FafacturproPeer::VUELTO)) $criteria->add(FafacturproPeer::VUELTO, $this->vuelto);
		if ($this->isColumnModified(FafacturproPeer::CODCAJ)) $criteria->add(FafacturproPeer::CODCAJ, $this->codcaj);
		if ($this->isColumnModified(FafacturproPeer::NUMCONTROL)) $criteria->add(FafacturproPeer::NUMCONTROL, $this->numcontrol);
		if ($this->isColumnModified(FafacturproPeer::CODUBI)) $criteria->add(FafacturproPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(FafacturproPeer::MUELLE)) $criteria->add(FafacturproPeer::MUELLE, $this->muelle);
		if ($this->isColumnModified(FafacturproPeer::BUQUE)) $criteria->add(FafacturproPeer::BUQUE, $this->buque);
		if ($this->isColumnModified(FafacturproPeer::EXPEDI)) $criteria->add(FafacturproPeer::EXPEDI, $this->expedi);
		if ($this->isColumnModified(FafacturproPeer::BELE)) $criteria->add(FafacturproPeer::BELE, $this->bele);
		if ($this->isColumnModified(FafacturproPeer::FACTURA)) $criteria->add(FafacturproPeer::FACTURA, $this->factura);
		if ($this->isColumnModified(FafacturproPeer::EMBARCA)) $criteria->add(FafacturproPeer::EMBARCA, $this->embarca);
		if ($this->isColumnModified(FafacturproPeer::DESCARGA)) $criteria->add(FafacturproPeer::DESCARGA, $this->descarga);
		if ($this->isColumnModified(FafacturproPeer::CANBUL)) $criteria->add(FafacturproPeer::CANBUL, $this->canbul);
		if ($this->isColumnModified(FafacturproPeer::CODPROD)) $criteria->add(FafacturproPeer::CODPROD, $this->codprod);
		if ($this->isColumnModified(FafacturproPeer::TMDESC)) $criteria->add(FafacturproPeer::TMDESC, $this->tmdesc);
		if ($this->isColumnModified(FafacturproPeer::FECATRA)) $criteria->add(FafacturproPeer::FECATRA, $this->fecatra);
		if ($this->isColumnModified(FafacturproPeer::FECINIDESC)) $criteria->add(FafacturproPeer::FECINIDESC, $this->fecinidesc);
		if ($this->isColumnModified(FafacturproPeer::FECFINDESC)) $criteria->add(FafacturproPeer::FECFINDESC, $this->fecfindesc);
		if ($this->isColumnModified(FafacturproPeer::VALCIFS)) $criteria->add(FafacturproPeer::VALCIFS, $this->valcifs);
		if ($this->isColumnModified(FafacturproPeer::FADESCRIPFAC_ID)) $criteria->add(FafacturproPeer::FADESCRIPFAC_ID, $this->fadescripfac_id);
		if ($this->isColumnModified(FafacturproPeer::ID)) $criteria->add(FafacturproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FafacturproPeer::DATABASE_NAME);

		$criteria->add(FafacturproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setReffac($this->reffac);

		$copyObj->setFecfac($this->fecfac);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setDesfac($this->desfac);

		$copyObj->setTipref($this->tipref);

		$copyObj->setMonfac($this->monfac);

		$copyObj->setMondesc($this->mondesc);

		$copyObj->setCodconpag($this->codconpag);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setReapor($this->reapor);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setStatus($this->status);

		$copyObj->setObserv($this->observ);

		$copyObj->setTipmon($this->tipmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setNumcomord($this->numcomord);

		$copyObj->setNumcominv($this->numcominv);

		$copyObj->setSucursal($this->sucursal);

		$copyObj->setMotanu($this->motanu);

		$copyObj->setVuelto($this->vuelto);

		$copyObj->setCodcaj($this->codcaj);

		$copyObj->setNumcontrol($this->numcontrol);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setMuelle($this->muelle);

		$copyObj->setBuque($this->buque);

		$copyObj->setExpedi($this->expedi);

		$copyObj->setBele($this->bele);

		$copyObj->setFactura($this->factura);

		$copyObj->setEmbarca($this->embarca);

		$copyObj->setDescarga($this->descarga);

		$copyObj->setCanbul($this->canbul);

		$copyObj->setCodprod($this->codprod);

		$copyObj->setTmdesc($this->tmdesc);

		$copyObj->setFecatra($this->fecatra);

		$copyObj->setFecinidesc($this->fecinidesc);

		$copyObj->setFecfindesc($this->fecfindesc);

		$copyObj->setValcifs($this->valcifs);

		$copyObj->setFadescripfacId($this->fadescripfac_id);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new FafacturproPeer();
		}
		return self::$peer;
	}

} 