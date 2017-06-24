<?php


abstract class BaseFapresup extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpre;


	
	protected $despre;


	
	protected $fecpre;


	
	protected $codcli;


	
	protected $monpre;


	
	protected $mondesc;


	
	protected $monrgo;


	
	protected $faconpag_id;


	
	protected $fafordes_id;


	
	protected $faforsol_id;


	
	protected $tipmon;


	
	protected $valmon = 1;


	
	protected $autpor;


	
	protected $observ;


	
	protected $codubi;


	
	protected $codprg;


	
	protected $reapor;


	
	protected $cantras;


	
	protected $pertra;


	
	protected $frectra;


	
	protected $duracion;


	
	protected $obstra;


	
	protected $tippre;


	
	protected $percon;


	
	protected $feciniper;


	
	protected $coddirec;


	
	protected $codemb;


	
	protected $codgru;


	
	protected $staapr;


	
	protected $usuapr;


	
	protected $fecapr;


	
	protected $codsed;


	
	protected $tiecot;


	
	protected $refpreaso;


	
	protected $facliper_id;


	
	protected $numcue;


	
	protected $id;

	
	protected $aFafordes;

	
	protected $aFaforsol;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefpre()
  {

    return trim($this->refpre);

  }
  
  public function getDespre()
  {

    return trim($this->despre);

  }
  
  public function getFecpre($format = 'Y-m-d')
  {

    if ($this->fecpre === null || $this->fecpre === '') {
      return null;
    } elseif (!is_int($this->fecpre)) {
            $ts = adodb_strtotime($this->fecpre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpre] as date/time value: " . var_export($this->fecpre, true));
      }
    } else {
      $ts = $this->fecpre;
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
  
  public function getMonpre($val=false)
  {

    if($val) return number_format($this->monpre,2,',','.');
    else return $this->monpre;

  }
  
  public function getMondesc($val=false)
  {

    if($val) return number_format($this->mondesc,2,',','.');
    else return $this->mondesc;

  }
  
  public function getMonrgo($val=false)
  {

    if($val) return number_format($this->monrgo,2,',','.');
    else return $this->monrgo;

  }
  
  public function getFaconpagId()
  {

    return $this->faconpag_id;

  }
  
  public function getFafordesId()
  {

    return $this->fafordes_id;

  }
  
  public function getFaforsolId()
  {

    return $this->faforsol_id;

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
  
  public function getAutpor()
  {

    return trim($this->autpor);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getCodprg()
  {

    return trim($this->codprg);

  }
  
  public function getReapor()
  {

    return trim($this->reapor);

  }
  
  public function getCantras()
  {

    return trim($this->cantras);

  }
  
  public function getPertra()
  {

    return trim($this->pertra);

  }
  
  public function getFrectra()
  {

    return trim($this->frectra);

  }
  
  public function getDuracion()
  {

    return trim($this->duracion);

  }
  
  public function getObstra()
  {

    return trim($this->obstra);

  }
  
  public function getTippre()
  {

    return trim($this->tippre);

  }
  
  public function getPercon()
  {

    return trim($this->percon);

  }
  
  public function getFeciniper($format = 'Y-m-d')
  {

    if ($this->feciniper === null || $this->feciniper === '') {
      return null;
    } elseif (!is_int($this->feciniper)) {
            $ts = adodb_strtotime($this->feciniper);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feciniper] as date/time value: " . var_export($this->feciniper, true));
      }
    } else {
      $ts = $this->feciniper;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getCodemb()
  {

    return trim($this->codemb);

  }
  
  public function getCodgru()
  {

    return trim($this->codgru);

  }
  
  public function getStaapr()
  {

    return trim($this->staapr);

  }
  
  public function getUsuapr()
  {

    return trim($this->usuapr);

  }
  
  public function getFecapr($format = 'Y-m-d')
  {

    if ($this->fecapr === null || $this->fecapr === '') {
      return null;
    } elseif (!is_int($this->fecapr)) {
            $ts = adodb_strtotime($this->fecapr);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecapr] as date/time value: " . var_export($this->fecapr, true));
      }
    } else {
      $ts = $this->fecapr;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodsed()
  {

    return trim($this->codsed);

  }
  
  public function getTiecot()
  {

    return trim($this->tiecot);

  }
  
  public function getRefpreaso()
  {

    return trim($this->refpreaso);

  }
  
  public function getFacliperId()
  {

    return $this->facliper_id;

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpre($v)
	{

    if ($this->refpre !== $v) {
        $this->refpre = $v;
        $this->modifiedColumns[] = FapresupPeer::REFPRE;
      }
  
	} 
	
	public function setDespre($v)
	{

    if ($this->despre !== $v) {
        $this->despre = $v;
        $this->modifiedColumns[] = FapresupPeer::DESPRE;
      }
  
	} 
	
	public function setFecpre($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpre !== $ts) {
      $this->fecpre = $ts;
      $this->modifiedColumns[] = FapresupPeer::FECPRE;
    }

	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = FapresupPeer::CODCLI;
      }
  
	} 
	
	public function setMonpre($v)
	{

    if ($this->monpre !== $v) {
        $this->monpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapresupPeer::MONPRE;
      }
  
	} 
	
	public function setMondesc($v)
	{

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapresupPeer::MONDESC;
      }
  
	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapresupPeer::MONRGO;
      }
  
	} 
	
	public function setFaconpagId($v)
	{

    if ($this->faconpag_id !== $v) {
        $this->faconpag_id = $v;
        $this->modifiedColumns[] = FapresupPeer::FACONPAG_ID;
      }
  
	} 
	
	public function setFafordesId($v)
	{

    if ($this->fafordes_id !== $v) {
        $this->fafordes_id = $v;
        $this->modifiedColumns[] = FapresupPeer::FAFORDES_ID;
      }
  
		if ($this->aFafordes !== null && $this->aFafordes->getId() !== $v) {
			$this->aFafordes = null;
		}

	} 
	
	public function setFaforsolId($v)
	{

    if ($this->faforsol_id !== $v) {
        $this->faforsol_id = $v;
        $this->modifiedColumns[] = FapresupPeer::FAFORSOL_ID;
      }
  
		if ($this->aFaforsol !== null && $this->aFaforsol->getId() !== $v) {
			$this->aFaforsol = null;
		}

	} 
	
	public function setTipmon($v)
	{

    if ($this->tipmon !== $v) {
        $this->tipmon = $v;
        $this->modifiedColumns[] = FapresupPeer::TIPMON;
      }
  
	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v || $v === 1) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapresupPeer::VALMON;
      }
  
	} 
	
	public function setAutpor($v)
	{

    if ($this->autpor !== $v) {
        $this->autpor = $v;
        $this->modifiedColumns[] = FapresupPeer::AUTPOR;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = FapresupPeer::OBSERV;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = FapresupPeer::CODUBI;
      }
  
	} 
	
	public function setCodprg($v)
	{

    if ($this->codprg !== $v) {
        $this->codprg = $v;
        $this->modifiedColumns[] = FapresupPeer::CODPRG;
      }
  
	} 
	
	public function setReapor($v)
	{

    if ($this->reapor !== $v) {
        $this->reapor = $v;
        $this->modifiedColumns[] = FapresupPeer::REAPOR;
      }
  
	} 
	
	public function setCantras($v)
	{

    if ($this->cantras !== $v) {
        $this->cantras = $v;
        $this->modifiedColumns[] = FapresupPeer::CANTRAS;
      }
  
	} 
	
	public function setPertra($v)
	{

    if ($this->pertra !== $v) {
        $this->pertra = $v;
        $this->modifiedColumns[] = FapresupPeer::PERTRA;
      }
  
	} 
	
	public function setFrectra($v)
	{

    if ($this->frectra !== $v) {
        $this->frectra = $v;
        $this->modifiedColumns[] = FapresupPeer::FRECTRA;
      }
  
	} 
	
	public function setDuracion($v)
	{

    if ($this->duracion !== $v) {
        $this->duracion = $v;
        $this->modifiedColumns[] = FapresupPeer::DURACION;
      }
  
	} 
	
	public function setObstra($v)
	{

    if ($this->obstra !== $v) {
        $this->obstra = $v;
        $this->modifiedColumns[] = FapresupPeer::OBSTRA;
      }
  
	} 
	
	public function setTippre($v)
	{

    if ($this->tippre !== $v) {
        $this->tippre = $v;
        $this->modifiedColumns[] = FapresupPeer::TIPPRE;
      }
  
	} 
	
	public function setPercon($v)
	{

    if ($this->percon !== $v) {
        $this->percon = $v;
        $this->modifiedColumns[] = FapresupPeer::PERCON;
      }
  
	} 
	
	public function setFeciniper($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feciniper] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feciniper !== $ts) {
      $this->feciniper = $ts;
      $this->modifiedColumns[] = FapresupPeer::FECINIPER;
    }

	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = FapresupPeer::CODDIREC;
      }
  
	} 
	
	public function setCodemb($v)
	{

    if ($this->codemb !== $v) {
        $this->codemb = $v;
        $this->modifiedColumns[] = FapresupPeer::CODEMB;
      }
  
	} 
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = FapresupPeer::CODGRU;
      }
  
	} 
	
	public function setStaapr($v)
	{

    if ($this->staapr !== $v) {
        $this->staapr = $v;
        $this->modifiedColumns[] = FapresupPeer::STAAPR;
      }
  
	} 
	
	public function setUsuapr($v)
	{

    if ($this->usuapr !== $v) {
        $this->usuapr = $v;
        $this->modifiedColumns[] = FapresupPeer::USUAPR;
      }
  
	} 
	
	public function setFecapr($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecapr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecapr !== $ts) {
      $this->fecapr = $ts;
      $this->modifiedColumns[] = FapresupPeer::FECAPR;
    }

	} 
	
	public function setCodsed($v)
	{

    if ($this->codsed !== $v) {
        $this->codsed = $v;
        $this->modifiedColumns[] = FapresupPeer::CODSED;
      }
  
	} 
	
	public function setTiecot($v)
	{

    if ($this->tiecot !== $v) {
        $this->tiecot = $v;
        $this->modifiedColumns[] = FapresupPeer::TIECOT;
      }
  
	} 
	
	public function setRefpreaso($v)
	{

    if ($this->refpreaso !== $v) {
        $this->refpreaso = $v;
        $this->modifiedColumns[] = FapresupPeer::REFPREASO;
      }
  
	} 
	
	public function setFacliperId($v)
	{

    if ($this->facliper_id !== $v) {
        $this->facliper_id = $v;
        $this->modifiedColumns[] = FapresupPeer::FACLIPER_ID;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = FapresupPeer::NUMCUE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FapresupPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpre = $rs->getString($startcol + 0);

      $this->despre = $rs->getString($startcol + 1);

      $this->fecpre = $rs->getDate($startcol + 2, null);

      $this->codcli = $rs->getString($startcol + 3);

      $this->monpre = $rs->getFloat($startcol + 4);

      $this->mondesc = $rs->getFloat($startcol + 5);

      $this->monrgo = $rs->getFloat($startcol + 6);

      $this->faconpag_id = $rs->getInt($startcol + 7);

      $this->fafordes_id = $rs->getInt($startcol + 8);

      $this->faforsol_id = $rs->getInt($startcol + 9);

      $this->tipmon = $rs->getString($startcol + 10);

      $this->valmon = $rs->getFloat($startcol + 11);

      $this->autpor = $rs->getString($startcol + 12);

      $this->observ = $rs->getString($startcol + 13);

      $this->codubi = $rs->getString($startcol + 14);

      $this->codprg = $rs->getString($startcol + 15);

      $this->reapor = $rs->getString($startcol + 16);

      $this->cantras = $rs->getString($startcol + 17);

      $this->pertra = $rs->getString($startcol + 18);

      $this->frectra = $rs->getString($startcol + 19);

      $this->duracion = $rs->getString($startcol + 20);

      $this->obstra = $rs->getString($startcol + 21);

      $this->tippre = $rs->getString($startcol + 22);

      $this->percon = $rs->getString($startcol + 23);

      $this->feciniper = $rs->getDate($startcol + 24, null);

      $this->coddirec = $rs->getString($startcol + 25);

      $this->codemb = $rs->getString($startcol + 26);

      $this->codgru = $rs->getString($startcol + 27);

      $this->staapr = $rs->getString($startcol + 28);

      $this->usuapr = $rs->getString($startcol + 29);

      $this->fecapr = $rs->getDate($startcol + 30, null);

      $this->codsed = $rs->getString($startcol + 31);

      $this->tiecot = $rs->getString($startcol + 32);

      $this->refpreaso = $rs->getString($startcol + 33);

      $this->facliper_id = $rs->getInt($startcol + 34);

      $this->numcue = $rs->getString($startcol + 35);

      $this->id = $rs->getInt($startcol + 36);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 37; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fapresup object", $e);
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
			$con = Propel::getConnection(FapresupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FapresupPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FapresupPeer::DATABASE_NAME);
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


												
			if ($this->aFafordes !== null) {
				if ($this->aFafordes->isModified()) {
					$affectedRows += $this->aFafordes->save($con);
				}
				$this->setFafordes($this->aFafordes);
			}

			if ($this->aFaforsol !== null) {
				if ($this->aFaforsol->isModified()) {
					$affectedRows += $this->aFaforsol->save($con);
				}
				$this->setFaforsol($this->aFaforsol);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FapresupPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FapresupPeer::doUpdate($this, $con);
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


												
			if ($this->aFafordes !== null) {
				if (!$this->aFafordes->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFafordes->getValidationFailures());
				}
			}

			if ($this->aFaforsol !== null) {
				if (!$this->aFaforsol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaforsol->getValidationFailures());
				}
			}


			if (($retval = FapresupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapresupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpre();
				break;
			case 1:
				return $this->getDespre();
				break;
			case 2:
				return $this->getFecpre();
				break;
			case 3:
				return $this->getCodcli();
				break;
			case 4:
				return $this->getMonpre();
				break;
			case 5:
				return $this->getMondesc();
				break;
			case 6:
				return $this->getMonrgo();
				break;
			case 7:
				return $this->getFaconpagId();
				break;
			case 8:
				return $this->getFafordesId();
				break;
			case 9:
				return $this->getFaforsolId();
				break;
			case 10:
				return $this->getTipmon();
				break;
			case 11:
				return $this->getValmon();
				break;
			case 12:
				return $this->getAutpor();
				break;
			case 13:
				return $this->getObserv();
				break;
			case 14:
				return $this->getCodubi();
				break;
			case 15:
				return $this->getCodprg();
				break;
			case 16:
				return $this->getReapor();
				break;
			case 17:
				return $this->getCantras();
				break;
			case 18:
				return $this->getPertra();
				break;
			case 19:
				return $this->getFrectra();
				break;
			case 20:
				return $this->getDuracion();
				break;
			case 21:
				return $this->getObstra();
				break;
			case 22:
				return $this->getTippre();
				break;
			case 23:
				return $this->getPercon();
				break;
			case 24:
				return $this->getFeciniper();
				break;
			case 25:
				return $this->getCoddirec();
				break;
			case 26:
				return $this->getCodemb();
				break;
			case 27:
				return $this->getCodgru();
				break;
			case 28:
				return $this->getStaapr();
				break;
			case 29:
				return $this->getUsuapr();
				break;
			case 30:
				return $this->getFecapr();
				break;
			case 31:
				return $this->getCodsed();
				break;
			case 32:
				return $this->getTiecot();
				break;
			case 33:
				return $this->getRefpreaso();
				break;
			case 34:
				return $this->getFacliperId();
				break;
			case 35:
				return $this->getNumcue();
				break;
			case 36:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapresupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpre(),
			$keys[1] => $this->getDespre(),
			$keys[2] => $this->getFecpre(),
			$keys[3] => $this->getCodcli(),
			$keys[4] => $this->getMonpre(),
			$keys[5] => $this->getMondesc(),
			$keys[6] => $this->getMonrgo(),
			$keys[7] => $this->getFaconpagId(),
			$keys[8] => $this->getFafordesId(),
			$keys[9] => $this->getFaforsolId(),
			$keys[10] => $this->getTipmon(),
			$keys[11] => $this->getValmon(),
			$keys[12] => $this->getAutpor(),
			$keys[13] => $this->getObserv(),
			$keys[14] => $this->getCodubi(),
			$keys[15] => $this->getCodprg(),
			$keys[16] => $this->getReapor(),
			$keys[17] => $this->getCantras(),
			$keys[18] => $this->getPertra(),
			$keys[19] => $this->getFrectra(),
			$keys[20] => $this->getDuracion(),
			$keys[21] => $this->getObstra(),
			$keys[22] => $this->getTippre(),
			$keys[23] => $this->getPercon(),
			$keys[24] => $this->getFeciniper(),
			$keys[25] => $this->getCoddirec(),
			$keys[26] => $this->getCodemb(),
			$keys[27] => $this->getCodgru(),
			$keys[28] => $this->getStaapr(),
			$keys[29] => $this->getUsuapr(),
			$keys[30] => $this->getFecapr(),
			$keys[31] => $this->getCodsed(),
			$keys[32] => $this->getTiecot(),
			$keys[33] => $this->getRefpreaso(),
			$keys[34] => $this->getFacliperId(),
			$keys[35] => $this->getNumcue(),
			$keys[36] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapresupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpre($value);
				break;
			case 1:
				$this->setDespre($value);
				break;
			case 2:
				$this->setFecpre($value);
				break;
			case 3:
				$this->setCodcli($value);
				break;
			case 4:
				$this->setMonpre($value);
				break;
			case 5:
				$this->setMondesc($value);
				break;
			case 6:
				$this->setMonrgo($value);
				break;
			case 7:
				$this->setFaconpagId($value);
				break;
			case 8:
				$this->setFafordesId($value);
				break;
			case 9:
				$this->setFaforsolId($value);
				break;
			case 10:
				$this->setTipmon($value);
				break;
			case 11:
				$this->setValmon($value);
				break;
			case 12:
				$this->setAutpor($value);
				break;
			case 13:
				$this->setObserv($value);
				break;
			case 14:
				$this->setCodubi($value);
				break;
			case 15:
				$this->setCodprg($value);
				break;
			case 16:
				$this->setReapor($value);
				break;
			case 17:
				$this->setCantras($value);
				break;
			case 18:
				$this->setPertra($value);
				break;
			case 19:
				$this->setFrectra($value);
				break;
			case 20:
				$this->setDuracion($value);
				break;
			case 21:
				$this->setObstra($value);
				break;
			case 22:
				$this->setTippre($value);
				break;
			case 23:
				$this->setPercon($value);
				break;
			case 24:
				$this->setFeciniper($value);
				break;
			case 25:
				$this->setCoddirec($value);
				break;
			case 26:
				$this->setCodemb($value);
				break;
			case 27:
				$this->setCodgru($value);
				break;
			case 28:
				$this->setStaapr($value);
				break;
			case 29:
				$this->setUsuapr($value);
				break;
			case 30:
				$this->setFecapr($value);
				break;
			case 31:
				$this->setCodsed($value);
				break;
			case 32:
				$this->setTiecot($value);
				break;
			case 33:
				$this->setRefpreaso($value);
				break;
			case 34:
				$this->setFacliperId($value);
				break;
			case 35:
				$this->setNumcue($value);
				break;
			case 36:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapresupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDespre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcli($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMondesc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonrgo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFaconpagId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFafordesId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFaforsolId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipmon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setValmon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAutpor($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setObserv($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodubi($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodprg($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setReapor($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCantras($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPertra($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFrectra($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDuracion($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setObstra($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTippre($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setPercon($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFeciniper($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCoddirec($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodemb($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCodgru($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setStaapr($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setUsuapr($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFecapr($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCodsed($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setTiecot($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setRefpreaso($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setFacliperId($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setNumcue($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setId($arr[$keys[36]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FapresupPeer::DATABASE_NAME);

		if ($this->isColumnModified(FapresupPeer::REFPRE)) $criteria->add(FapresupPeer::REFPRE, $this->refpre);
		if ($this->isColumnModified(FapresupPeer::DESPRE)) $criteria->add(FapresupPeer::DESPRE, $this->despre);
		if ($this->isColumnModified(FapresupPeer::FECPRE)) $criteria->add(FapresupPeer::FECPRE, $this->fecpre);
		if ($this->isColumnModified(FapresupPeer::CODCLI)) $criteria->add(FapresupPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(FapresupPeer::MONPRE)) $criteria->add(FapresupPeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(FapresupPeer::MONDESC)) $criteria->add(FapresupPeer::MONDESC, $this->mondesc);
		if ($this->isColumnModified(FapresupPeer::MONRGO)) $criteria->add(FapresupPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(FapresupPeer::FACONPAG_ID)) $criteria->add(FapresupPeer::FACONPAG_ID, $this->faconpag_id);
		if ($this->isColumnModified(FapresupPeer::FAFORDES_ID)) $criteria->add(FapresupPeer::FAFORDES_ID, $this->fafordes_id);
		if ($this->isColumnModified(FapresupPeer::FAFORSOL_ID)) $criteria->add(FapresupPeer::FAFORSOL_ID, $this->faforsol_id);
		if ($this->isColumnModified(FapresupPeer::TIPMON)) $criteria->add(FapresupPeer::TIPMON, $this->tipmon);
		if ($this->isColumnModified(FapresupPeer::VALMON)) $criteria->add(FapresupPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(FapresupPeer::AUTPOR)) $criteria->add(FapresupPeer::AUTPOR, $this->autpor);
		if ($this->isColumnModified(FapresupPeer::OBSERV)) $criteria->add(FapresupPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(FapresupPeer::CODUBI)) $criteria->add(FapresupPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(FapresupPeer::CODPRG)) $criteria->add(FapresupPeer::CODPRG, $this->codprg);
		if ($this->isColumnModified(FapresupPeer::REAPOR)) $criteria->add(FapresupPeer::REAPOR, $this->reapor);
		if ($this->isColumnModified(FapresupPeer::CANTRAS)) $criteria->add(FapresupPeer::CANTRAS, $this->cantras);
		if ($this->isColumnModified(FapresupPeer::PERTRA)) $criteria->add(FapresupPeer::PERTRA, $this->pertra);
		if ($this->isColumnModified(FapresupPeer::FRECTRA)) $criteria->add(FapresupPeer::FRECTRA, $this->frectra);
		if ($this->isColumnModified(FapresupPeer::DURACION)) $criteria->add(FapresupPeer::DURACION, $this->duracion);
		if ($this->isColumnModified(FapresupPeer::OBSTRA)) $criteria->add(FapresupPeer::OBSTRA, $this->obstra);
		if ($this->isColumnModified(FapresupPeer::TIPPRE)) $criteria->add(FapresupPeer::TIPPRE, $this->tippre);
		if ($this->isColumnModified(FapresupPeer::PERCON)) $criteria->add(FapresupPeer::PERCON, $this->percon);
		if ($this->isColumnModified(FapresupPeer::FECINIPER)) $criteria->add(FapresupPeer::FECINIPER, $this->feciniper);
		if ($this->isColumnModified(FapresupPeer::CODDIREC)) $criteria->add(FapresupPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(FapresupPeer::CODEMB)) $criteria->add(FapresupPeer::CODEMB, $this->codemb);
		if ($this->isColumnModified(FapresupPeer::CODGRU)) $criteria->add(FapresupPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(FapresupPeer::STAAPR)) $criteria->add(FapresupPeer::STAAPR, $this->staapr);
		if ($this->isColumnModified(FapresupPeer::USUAPR)) $criteria->add(FapresupPeer::USUAPR, $this->usuapr);
		if ($this->isColumnModified(FapresupPeer::FECAPR)) $criteria->add(FapresupPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(FapresupPeer::CODSED)) $criteria->add(FapresupPeer::CODSED, $this->codsed);
		if ($this->isColumnModified(FapresupPeer::TIECOT)) $criteria->add(FapresupPeer::TIECOT, $this->tiecot);
		if ($this->isColumnModified(FapresupPeer::REFPREASO)) $criteria->add(FapresupPeer::REFPREASO, $this->refpreaso);
		if ($this->isColumnModified(FapresupPeer::FACLIPER_ID)) $criteria->add(FapresupPeer::FACLIPER_ID, $this->facliper_id);
		if ($this->isColumnModified(FapresupPeer::NUMCUE)) $criteria->add(FapresupPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(FapresupPeer::ID)) $criteria->add(FapresupPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FapresupPeer::DATABASE_NAME);

		$criteria->add(FapresupPeer::ID, $this->id);

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

		$copyObj->setRefpre($this->refpre);

		$copyObj->setDespre($this->despre);

		$copyObj->setFecpre($this->fecpre);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setMondesc($this->mondesc);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setFaconpagId($this->faconpag_id);

		$copyObj->setFafordesId($this->fafordes_id);

		$copyObj->setFaforsolId($this->faforsol_id);

		$copyObj->setTipmon($this->tipmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setAutpor($this->autpor);

		$copyObj->setObserv($this->observ);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setCodprg($this->codprg);

		$copyObj->setReapor($this->reapor);

		$copyObj->setCantras($this->cantras);

		$copyObj->setPertra($this->pertra);

		$copyObj->setFrectra($this->frectra);

		$copyObj->setDuracion($this->duracion);

		$copyObj->setObstra($this->obstra);

		$copyObj->setTippre($this->tippre);

		$copyObj->setPercon($this->percon);

		$copyObj->setFeciniper($this->feciniper);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setCodemb($this->codemb);

		$copyObj->setCodgru($this->codgru);

		$copyObj->setStaapr($this->staapr);

		$copyObj->setUsuapr($this->usuapr);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setCodsed($this->codsed);

		$copyObj->setTiecot($this->tiecot);

		$copyObj->setRefpreaso($this->refpreaso);

		$copyObj->setFacliperId($this->facliper_id);

		$copyObj->setNumcue($this->numcue);


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
			self::$peer = new FapresupPeer();
		}
		return self::$peer;
	}

	
	public function setFafordes($v)
	{


		if ($v === null) {
			$this->setFafordesId(NULL);
		} else {
			$this->setFafordesId($v->getId());
		}


		$this->aFafordes = $v;
	}


	
	public function getFafordes($con = null)
	{
		if ($this->aFafordes === null && ($this->fafordes_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFafordesPeer.php';

      $c = new Criteria();
      $c->add(FafordesPeer::ID,$this->fafordes_id);
      
			$this->aFafordes = FafordesPeer::doSelectOne($c, $con);

			
		}
		return $this->aFafordes;
	}

	
	public function setFaforsol($v)
	{


		if ($v === null) {
			$this->setFaforsolId(NULL);
		} else {
			$this->setFaforsolId($v->getId());
		}


		$this->aFaforsol = $v;
	}


	
	public function getFaforsol($con = null)
	{
		if ($this->aFaforsol === null && ($this->faforsol_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFaforsolPeer.php';

      $c = new Criteria();
      $c->add(FaforsolPeer::ID,$this->faforsol_id);
      
			$this->aFaforsol = FaforsolPeer::doSelectOne($c, $con);

			
		}
		return $this->aFaforsol;
	}

} 