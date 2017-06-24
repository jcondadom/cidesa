<?php


abstract class BaseCaentalm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rcpart;


	
	protected $fecrcp;


	
	protected $desrcp;


	
	protected $codpro;


	
	protected $monrcp;


	
	protected $starcp;


	
	protected $codalm;


	
	protected $codubi;


	
	protected $tipmov;


	
	protected $codcen;


	
	protected $dphart;


	
	protected $numcom;


	
	protected $codalmusu;


	
	protected $codsada;


	
	protected $nroentdes;


	
	protected $nrocarveh;


	
	protected $nrocontro;


	
	protected $coddirec;


	
	protected $fecanu;


	
	protected $desanu;


	
	protected $usuanu;


	
	protected $observ;


	
	protected $nrocon;


	
	protected $fecreg;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $created_by_user;


	
	protected $updated_by_user;


	
	protected $id;

	
	protected $aCatipent;

	
	protected $aCadefalm;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRcpart()
  {

    return trim($this->rcpart);

  }
  
  public function getFecrcp($format = 'Y-m-d')
  {

    if ($this->fecrcp === null || $this->fecrcp === '') {
      return null;
    } elseif (!is_int($this->fecrcp)) {
            $ts = adodb_strtotime($this->fecrcp);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrcp] as date/time value: " . var_export($this->fecrcp, true));
      }
    } else {
      $ts = $this->fecrcp;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesrcp()
  {

    return trim($this->desrcp);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getMonrcp($val=false)
  {

    if($val) return number_format($this->monrcp,2,',','.');
    else return $this->monrcp;

  }
  
  public function getStarcp()
  {

    return trim($this->starcp);

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getTipmov()
  {

    return trim($this->tipmov);

  }
  
  public function getCodcen()
  {

    return trim($this->codcen);

  }
  
  public function getDphart()
  {

    return trim($this->dphart);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getCodalmusu()
  {

    return trim($this->codalmusu);

  }
  
  public function getCodsada()
  {

    return trim($this->codsada);

  }
  
  public function getNroentdes()
  {

    return trim($this->nroentdes);

  }
  
  public function getNrocarveh()
  {

    return trim($this->nrocarveh);

  }
  
  public function getNrocontro()
  {

    return trim($this->nrocontro);

  }
  
  public function getCoddirec()
  {

    return trim($this->coddirec);

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

  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getUsuanu()
  {

    return trim($this->usuanu);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getNrocon()
  {

    return trim($this->nrocon);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCreatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->created_at === null || $this->created_at === '') {
      return null;
    } elseif (!is_int($this->created_at)) {
            $ts = adodb_strtotime($this->created_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
      }
    } else {
      $ts = $this->created_at;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUpdatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->updated_at === null || $this->updated_at === '') {
      return null;
    } elseif (!is_int($this->updated_at)) {
            $ts = adodb_strtotime($this->updated_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
      }
    } else {
      $ts = $this->updated_at;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCreatedByUser()
  {

    if($this->created_by_user=='') $this->setCreatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse'));
    return $this->created_by_user;

  }
  
  public function getUpdatedByUser()
  {

    $this->setUpdatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse'));
    return $this->updated_by_user;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRcpart($v)
	{

    if ($this->rcpart !== $v) {
        $this->rcpart = $v;
        $this->modifiedColumns[] = CaentalmPeer::RCPART;
      }
  
	} 
	
	public function setFecrcp($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrcp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrcp !== $ts) {
      $this->fecrcp = $ts;
      $this->modifiedColumns[] = CaentalmPeer::FECRCP;
    }

	} 
	
	public function setDesrcp($v)
	{

    if ($this->desrcp !== $v) {
        $this->desrcp = $v;
        $this->modifiedColumns[] = CaentalmPeer::DESRCP;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = CaentalmPeer::CODPRO;
      }
  
	} 
	
	public function setMonrcp($v)
	{

    if ($this->monrcp !== $v) {
        $this->monrcp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaentalmPeer::MONRCP;
      }
  
	} 
	
	public function setStarcp($v)
	{

    if ($this->starcp !== $v) {
        $this->starcp = $v;
        $this->modifiedColumns[] = CaentalmPeer::STARCP;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CaentalmPeer::CODALM;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CaentalmPeer::CODUBI;
      }
  
	} 
	
	public function setTipmov($v)
	{

    if ($this->tipmov !== $v) {
        $this->tipmov = $v;
        $this->modifiedColumns[] = CaentalmPeer::TIPMOV;
      }
  
		if ($this->aCatipent !== null && $this->aCatipent->getCodtipent() !== $v) {
			$this->aCatipent = null;
		}

	} 
	
	public function setCodcen($v)
	{

    if ($this->codcen !== $v) {
        $this->codcen = $v;
        $this->modifiedColumns[] = CaentalmPeer::CODCEN;
      }
  
	} 
	
	public function setDphart($v)
	{

    if ($this->dphart !== $v) {
        $this->dphart = $v;
        $this->modifiedColumns[] = CaentalmPeer::DPHART;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = CaentalmPeer::NUMCOM;
      }
  
	} 
	
	public function setCodalmusu($v)
	{

    if ($this->codalmusu !== $v) {
        $this->codalmusu = $v;
        $this->modifiedColumns[] = CaentalmPeer::CODALMUSU;
      }
  
		if ($this->aCadefalm !== null && $this->aCadefalm->getCodalm() !== $v) {
			$this->aCadefalm = null;
		}

	} 
	
	public function setCodsada($v)
	{

    if ($this->codsada !== $v) {
        $this->codsada = $v;
        $this->modifiedColumns[] = CaentalmPeer::CODSADA;
      }
  
	} 
	
	public function setNroentdes($v)
	{

    if ($this->nroentdes !== $v) {
        $this->nroentdes = $v;
        $this->modifiedColumns[] = CaentalmPeer::NROENTDES;
      }
  
	} 
	
	public function setNrocarveh($v)
	{

    if ($this->nrocarveh !== $v) {
        $this->nrocarveh = $v;
        $this->modifiedColumns[] = CaentalmPeer::NROCARVEH;
      }
  
	} 
	
	public function setNrocontro($v)
	{

    if ($this->nrocontro !== $v) {
        $this->nrocontro = $v;
        $this->modifiedColumns[] = CaentalmPeer::NROCONTRO;
      }
  
	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = CaentalmPeer::CODDIREC;
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
      $this->modifiedColumns[] = CaentalmPeer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CaentalmPeer::DESANU;
      }
  
	} 
	
	public function setUsuanu($v)
	{

    if ($this->usuanu !== $v) {
        $this->usuanu = $v;
        $this->modifiedColumns[] = CaentalmPeer::USUANU;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CaentalmPeer::OBSERV;
      }
  
	} 
	
	public function setNrocon($v)
	{

    if ($this->nrocon !== $v) {
        $this->nrocon = $v;
        $this->modifiedColumns[] = CaentalmPeer::NROCON;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = CaentalmPeer::FECREG;
    }

	} 
	
	public function setCreatedAt($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->created_at !== $ts) {
      $this->created_at = $ts;
      $this->modifiedColumns[] = CaentalmPeer::CREATED_AT;
    }

	} 
	
	public function setUpdatedAt($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->updated_at !== $ts) {
      $this->updated_at = $ts;
      $this->modifiedColumns[] = CaentalmPeer::UPDATED_AT;
    }

	} 
	
	public function setCreatedByUser($v)
	{

    if ($this->created_by_user !== $v) {
        $this->created_by_user = $v;
        $this->modifiedColumns[] = CaentalmPeer::CREATED_BY_USER;
      }
  
	} 
	
	public function setUpdatedByUser($v)
	{

    if ($this->updated_by_user !== $v) {
        $this->updated_by_user = $v;
        $this->modifiedColumns[] = CaentalmPeer::UPDATED_BY_USER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaentalmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->rcpart = $rs->getString($startcol + 0);

      $this->fecrcp = $rs->getDate($startcol + 1, null);

      $this->desrcp = $rs->getString($startcol + 2);

      $this->codpro = $rs->getString($startcol + 3);

      $this->monrcp = $rs->getFloat($startcol + 4);

      $this->starcp = $rs->getString($startcol + 5);

      $this->codalm = $rs->getString($startcol + 6);

      $this->codubi = $rs->getString($startcol + 7);

      $this->tipmov = $rs->getString($startcol + 8);

      $this->codcen = $rs->getString($startcol + 9);

      $this->dphart = $rs->getString($startcol + 10);

      $this->numcom = $rs->getString($startcol + 11);

      $this->codalmusu = $rs->getString($startcol + 12);

      $this->codsada = $rs->getString($startcol + 13);

      $this->nroentdes = $rs->getString($startcol + 14);

      $this->nrocarveh = $rs->getString($startcol + 15);

      $this->nrocontro = $rs->getString($startcol + 16);

      $this->coddirec = $rs->getString($startcol + 17);

      $this->fecanu = $rs->getDate($startcol + 18, null);

      $this->desanu = $rs->getString($startcol + 19);

      $this->usuanu = $rs->getString($startcol + 20);

      $this->observ = $rs->getString($startcol + 21);

      $this->nrocon = $rs->getString($startcol + 22);

      $this->fecreg = $rs->getDate($startcol + 23, null);

      $this->created_at = $rs->getTimestamp($startcol + 24, null);

      $this->updated_at = $rs->getTimestamp($startcol + 25, null);

      $this->created_by_user = $rs->getString($startcol + 26);

      $this->updated_by_user = $rs->getString($startcol + 27);

      $this->id = $rs->getInt($startcol + 28);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 29; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caentalm object", $e);
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
			$con = Propel::getConnection(CaentalmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaentalmPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(CaentalmPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(CaentalmPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(CaentalmPeer::CREATED_BY_USER))
    {
      $this->setCreatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse','Sin Usuario'));
    }

    if ($this->isModified() && !$this->isColumnModified(CaentalmPeer::UPDATED_BY_USER))
    {
      $this->setUpdatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse','Sin Usuario'));
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaentalmPeer::DATABASE_NAME);
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


												
			if ($this->aCatipent !== null) {
				if ($this->aCatipent->isModified()) {
					$affectedRows += $this->aCatipent->save($con);
				}
				$this->setCatipent($this->aCatipent);
			}

			if ($this->aCadefalm !== null) {
				if ($this->aCadefalm->isModified()) {
					$affectedRows += $this->aCadefalm->save($con);
				}
				$this->setCadefalm($this->aCadefalm);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CaentalmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaentalmPeer::doUpdate($this, $con);
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


												
			if ($this->aCatipent !== null) {
				if (!$this->aCatipent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatipent->getValidationFailures());
				}
			}

			if ($this->aCadefalm !== null) {
				if (!$this->aCadefalm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCadefalm->getValidationFailures());
				}
			}


			if (($retval = CaentalmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaentalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRcpart();
				break;
			case 1:
				return $this->getFecrcp();
				break;
			case 2:
				return $this->getDesrcp();
				break;
			case 3:
				return $this->getCodpro();
				break;
			case 4:
				return $this->getMonrcp();
				break;
			case 5:
				return $this->getStarcp();
				break;
			case 6:
				return $this->getCodalm();
				break;
			case 7:
				return $this->getCodubi();
				break;
			case 8:
				return $this->getTipmov();
				break;
			case 9:
				return $this->getCodcen();
				break;
			case 10:
				return $this->getDphart();
				break;
			case 11:
				return $this->getNumcom();
				break;
			case 12:
				return $this->getCodalmusu();
				break;
			case 13:
				return $this->getCodsada();
				break;
			case 14:
				return $this->getNroentdes();
				break;
			case 15:
				return $this->getNrocarveh();
				break;
			case 16:
				return $this->getNrocontro();
				break;
			case 17:
				return $this->getCoddirec();
				break;
			case 18:
				return $this->getFecanu();
				break;
			case 19:
				return $this->getDesanu();
				break;
			case 20:
				return $this->getUsuanu();
				break;
			case 21:
				return $this->getObserv();
				break;
			case 22:
				return $this->getNrocon();
				break;
			case 23:
				return $this->getFecreg();
				break;
			case 24:
				return $this->getCreatedAt();
				break;
			case 25:
				return $this->getUpdatedAt();
				break;
			case 26:
				return $this->getCreatedByUser();
				break;
			case 27:
				return $this->getUpdatedByUser();
				break;
			case 28:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaentalmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRcpart(),
			$keys[1] => $this->getFecrcp(),
			$keys[2] => $this->getDesrcp(),
			$keys[3] => $this->getCodpro(),
			$keys[4] => $this->getMonrcp(),
			$keys[5] => $this->getStarcp(),
			$keys[6] => $this->getCodalm(),
			$keys[7] => $this->getCodubi(),
			$keys[8] => $this->getTipmov(),
			$keys[9] => $this->getCodcen(),
			$keys[10] => $this->getDphart(),
			$keys[11] => $this->getNumcom(),
			$keys[12] => $this->getCodalmusu(),
			$keys[13] => $this->getCodsada(),
			$keys[14] => $this->getNroentdes(),
			$keys[15] => $this->getNrocarveh(),
			$keys[16] => $this->getNrocontro(),
			$keys[17] => $this->getCoddirec(),
			$keys[18] => $this->getFecanu(),
			$keys[19] => $this->getDesanu(),
			$keys[20] => $this->getUsuanu(),
			$keys[21] => $this->getObserv(),
			$keys[22] => $this->getNrocon(),
			$keys[23] => $this->getFecreg(),
			$keys[24] => $this->getCreatedAt(),
			$keys[25] => $this->getUpdatedAt(),
			$keys[26] => $this->getCreatedByUser(),
			$keys[27] => $this->getUpdatedByUser(),
			$keys[28] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaentalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRcpart($value);
				break;
			case 1:
				$this->setFecrcp($value);
				break;
			case 2:
				$this->setDesrcp($value);
				break;
			case 3:
				$this->setCodpro($value);
				break;
			case 4:
				$this->setMonrcp($value);
				break;
			case 5:
				$this->setStarcp($value);
				break;
			case 6:
				$this->setCodalm($value);
				break;
			case 7:
				$this->setCodubi($value);
				break;
			case 8:
				$this->setTipmov($value);
				break;
			case 9:
				$this->setCodcen($value);
				break;
			case 10:
				$this->setDphart($value);
				break;
			case 11:
				$this->setNumcom($value);
				break;
			case 12:
				$this->setCodalmusu($value);
				break;
			case 13:
				$this->setCodsada($value);
				break;
			case 14:
				$this->setNroentdes($value);
				break;
			case 15:
				$this->setNrocarveh($value);
				break;
			case 16:
				$this->setNrocontro($value);
				break;
			case 17:
				$this->setCoddirec($value);
				break;
			case 18:
				$this->setFecanu($value);
				break;
			case 19:
				$this->setDesanu($value);
				break;
			case 20:
				$this->setUsuanu($value);
				break;
			case 21:
				$this->setObserv($value);
				break;
			case 22:
				$this->setNrocon($value);
				break;
			case 23:
				$this->setFecreg($value);
				break;
			case 24:
				$this->setCreatedAt($value);
				break;
			case 25:
				$this->setUpdatedAt($value);
				break;
			case 26:
				$this->setCreatedByUser($value);
				break;
			case 27:
				$this->setUpdatedByUser($value);
				break;
			case 28:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaentalmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRcpart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecrcp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesrcp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrcp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStarcp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodalm($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodubi($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipmov($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodcen($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDphart($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNumcom($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodalmusu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodsada($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNroentdes($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setNrocarveh($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNrocontro($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCoddirec($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFecanu($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDesanu($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setUsuanu($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setObserv($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setNrocon($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setFecreg($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCreatedAt($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setUpdatedAt($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCreatedByUser($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setUpdatedByUser($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setId($arr[$keys[28]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaentalmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaentalmPeer::RCPART)) $criteria->add(CaentalmPeer::RCPART, $this->rcpart);
		if ($this->isColumnModified(CaentalmPeer::FECRCP)) $criteria->add(CaentalmPeer::FECRCP, $this->fecrcp);
		if ($this->isColumnModified(CaentalmPeer::DESRCP)) $criteria->add(CaentalmPeer::DESRCP, $this->desrcp);
		if ($this->isColumnModified(CaentalmPeer::CODPRO)) $criteria->add(CaentalmPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CaentalmPeer::MONRCP)) $criteria->add(CaentalmPeer::MONRCP, $this->monrcp);
		if ($this->isColumnModified(CaentalmPeer::STARCP)) $criteria->add(CaentalmPeer::STARCP, $this->starcp);
		if ($this->isColumnModified(CaentalmPeer::CODALM)) $criteria->add(CaentalmPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CaentalmPeer::CODUBI)) $criteria->add(CaentalmPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CaentalmPeer::TIPMOV)) $criteria->add(CaentalmPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(CaentalmPeer::CODCEN)) $criteria->add(CaentalmPeer::CODCEN, $this->codcen);
		if ($this->isColumnModified(CaentalmPeer::DPHART)) $criteria->add(CaentalmPeer::DPHART, $this->dphart);
		if ($this->isColumnModified(CaentalmPeer::NUMCOM)) $criteria->add(CaentalmPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CaentalmPeer::CODALMUSU)) $criteria->add(CaentalmPeer::CODALMUSU, $this->codalmusu);
		if ($this->isColumnModified(CaentalmPeer::CODSADA)) $criteria->add(CaentalmPeer::CODSADA, $this->codsada);
		if ($this->isColumnModified(CaentalmPeer::NROENTDES)) $criteria->add(CaentalmPeer::NROENTDES, $this->nroentdes);
		if ($this->isColumnModified(CaentalmPeer::NROCARVEH)) $criteria->add(CaentalmPeer::NROCARVEH, $this->nrocarveh);
		if ($this->isColumnModified(CaentalmPeer::NROCONTRO)) $criteria->add(CaentalmPeer::NROCONTRO, $this->nrocontro);
		if ($this->isColumnModified(CaentalmPeer::CODDIREC)) $criteria->add(CaentalmPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(CaentalmPeer::FECANU)) $criteria->add(CaentalmPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CaentalmPeer::DESANU)) $criteria->add(CaentalmPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CaentalmPeer::USUANU)) $criteria->add(CaentalmPeer::USUANU, $this->usuanu);
		if ($this->isColumnModified(CaentalmPeer::OBSERV)) $criteria->add(CaentalmPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CaentalmPeer::NROCON)) $criteria->add(CaentalmPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(CaentalmPeer::FECREG)) $criteria->add(CaentalmPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(CaentalmPeer::CREATED_AT)) $criteria->add(CaentalmPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(CaentalmPeer::UPDATED_AT)) $criteria->add(CaentalmPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(CaentalmPeer::CREATED_BY_USER)) $criteria->add(CaentalmPeer::CREATED_BY_USER, $this->created_by_user);
		if ($this->isColumnModified(CaentalmPeer::UPDATED_BY_USER)) $criteria->add(CaentalmPeer::UPDATED_BY_USER, $this->updated_by_user);
		if ($this->isColumnModified(CaentalmPeer::ID)) $criteria->add(CaentalmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaentalmPeer::DATABASE_NAME);

		$criteria->add(CaentalmPeer::ID, $this->id);

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

		$copyObj->setRcpart($this->rcpart);

		$copyObj->setFecrcp($this->fecrcp);

		$copyObj->setDesrcp($this->desrcp);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setMonrcp($this->monrcp);

		$copyObj->setStarcp($this->starcp);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setTipmov($this->tipmov);

		$copyObj->setCodcen($this->codcen);

		$copyObj->setDphart($this->dphart);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setCodalmusu($this->codalmusu);

		$copyObj->setCodsada($this->codsada);

		$copyObj->setNroentdes($this->nroentdes);

		$copyObj->setNrocarveh($this->nrocarveh);

		$copyObj->setNrocontro($this->nrocontro);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setUsuanu($this->usuanu);

		$copyObj->setObserv($this->observ);

		$copyObj->setNrocon($this->nrocon);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setCreatedByUser($this->created_by_user);

		$copyObj->setUpdatedByUser($this->updated_by_user);


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
			self::$peer = new CaentalmPeer();
		}
		return self::$peer;
	}

	
	public function setCatipent($v)
	{


		if ($v === null) {
			$this->setTipmov(NULL);
		} else {
			$this->setTipmov($v->getCodtipent());
		}


		$this->aCatipent = $v;
	}


	
	public function getCatipent($con = null)
	{
		if ($this->aCatipent === null && (($this->tipmov !== "" && $this->tipmov !== null))) {
						include_once 'lib/model/compras/om/BaseCatipentPeer.php';

      $c = new Criteria();
      $c->add(CatipentPeer::CODTIPENT,$this->tipmov);
      
			$this->aCatipent = CatipentPeer::doSelectOne($c, $con);

			
		}
		return $this->aCatipent;
	}

	
	public function setCadefalm($v)
	{


		if ($v === null) {
			$this->setCodalmusu(NULL);
		} else {
			$this->setCodalmusu($v->getCodalm());
		}


		$this->aCadefalm = $v;
	}


	
	public function getCadefalm($con = null)
	{
		if ($this->aCadefalm === null && (($this->codalmusu !== "" && $this->codalmusu !== null))) {
						include_once 'lib/model/compras/om/BaseCadefalmPeer.php';

      $c = new Criteria();
      $c->add(CadefalmPeer::CODALM,$this->codalmusu);
      
			$this->aCadefalm = CadefalmPeer::doSelectOne($c, $con);

			
		}
		return $this->aCadefalm;
	}

} 