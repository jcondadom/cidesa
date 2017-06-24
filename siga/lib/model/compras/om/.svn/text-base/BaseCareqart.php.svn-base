<?php


abstract class BaseCareqart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reqart;


	
	protected $fecreq;


	
	protected $desreq;


	
	protected $monreq;


	
	protected $stareq;


	
	protected $unisol;


	
	protected $codcatreq;


	
	protected $aprreq;


	
	protected $nummemo;


	
	protected $justif;


	
	protected $codcen;


	
	protected $codalm;


	
	protected $codubi;


	
	protected $stadesp;


	
	protected $motivo;


	
	protected $usuapr;


	
	protected $fecapr;


	
	protected $coddirec;


	
	protected $obsreq;


	
	protected $fecanu;


	
	protected $desanu;


	
	protected $usuanu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReqart()
  {

    return trim($this->reqart);

  }
  
  public function getFecreq($format = 'Y-m-d')
  {

    if ($this->fecreq === null || $this->fecreq === '') {
      return null;
    } elseif (!is_int($this->fecreq)) {
            $ts = adodb_strtotime($this->fecreq);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreq] as date/time value: " . var_export($this->fecreq, true));
      }
    } else {
      $ts = $this->fecreq;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesreq()
  {

    return trim($this->desreq);

  }
  
  public function getMonreq($val=false)
  {

    if($val) return number_format($this->monreq,2,',','.');
    else return $this->monreq;

  }
  
  public function getStareq()
  {

    return trim($this->stareq);

  }
  
  public function getUnisol()
  {

    return trim($this->unisol);

  }
  
  public function getCodcatreq()
  {

    return trim($this->codcatreq);

  }
  
  public function getAprreq()
  {

    return trim($this->aprreq);

  }
  
  public function getNummemo()
  {

    return trim($this->nummemo);

  }
  
  public function getJustif()
  {

    return trim($this->justif);

  }
  
  public function getCodcen()
  {

    return trim($this->codcen);

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getStadesp()
  {

    return trim($this->stadesp);

  }
  
  public function getMotivo()
  {

    return trim($this->motivo);

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

  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getObsreq()
  {

    return trim($this->obsreq);

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
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReqart($v)
	{

    if ($this->reqart !== $v) {
        $this->reqart = $v;
        $this->modifiedColumns[] = CareqartPeer::REQART;
      }
  
	} 
	
	public function setFecreq($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreq !== $ts) {
      $this->fecreq = $ts;
      $this->modifiedColumns[] = CareqartPeer::FECREQ;
    }

	} 
	
	public function setDesreq($v)
	{

    if ($this->desreq !== $v) {
        $this->desreq = $v;
        $this->modifiedColumns[] = CareqartPeer::DESREQ;
      }
  
	} 
	
	public function setMonreq($v)
	{

    if ($this->monreq !== $v) {
        $this->monreq = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CareqartPeer::MONREQ;
      }
  
	} 
	
	public function setStareq($v)
	{

    if ($this->stareq !== $v) {
        $this->stareq = $v;
        $this->modifiedColumns[] = CareqartPeer::STAREQ;
      }
  
	} 
	
	public function setUnisol($v)
	{

    if ($this->unisol !== $v) {
        $this->unisol = $v;
        $this->modifiedColumns[] = CareqartPeer::UNISOL;
      }
  
	} 
	
	public function setCodcatreq($v)
	{

    if ($this->codcatreq !== $v) {
        $this->codcatreq = $v;
        $this->modifiedColumns[] = CareqartPeer::CODCATREQ;
      }
  
	} 
	
	public function setAprreq($v)
	{

    if ($this->aprreq !== $v) {
        $this->aprreq = $v;
        $this->modifiedColumns[] = CareqartPeer::APRREQ;
      }
  
	} 
	
	public function setNummemo($v)
	{

    if ($this->nummemo !== $v) {
        $this->nummemo = $v;
        $this->modifiedColumns[] = CareqartPeer::NUMMEMO;
      }
  
	} 
	
	public function setJustif($v)
	{

    if ($this->justif !== $v) {
        $this->justif = $v;
        $this->modifiedColumns[] = CareqartPeer::JUSTIF;
      }
  
	} 
	
	public function setCodcen($v)
	{

    if ($this->codcen !== $v) {
        $this->codcen = $v;
        $this->modifiedColumns[] = CareqartPeer::CODCEN;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CareqartPeer::CODALM;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CareqartPeer::CODUBI;
      }
  
	} 
	
	public function setStadesp($v)
	{

    if ($this->stadesp !== $v) {
        $this->stadesp = $v;
        $this->modifiedColumns[] = CareqartPeer::STADESP;
      }
  
	} 
	
	public function setMotivo($v)
	{

    if ($this->motivo !== $v) {
        $this->motivo = $v;
        $this->modifiedColumns[] = CareqartPeer::MOTIVO;
      }
  
	} 
	
	public function setUsuapr($v)
	{

    if ($this->usuapr !== $v) {
        $this->usuapr = $v;
        $this->modifiedColumns[] = CareqartPeer::USUAPR;
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
      $this->modifiedColumns[] = CareqartPeer::FECAPR;
    }

	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = CareqartPeer::CODDIREC;
      }
  
	} 
	
	public function setObsreq($v)
	{

    if ($this->obsreq !== $v) {
        $this->obsreq = $v;
        $this->modifiedColumns[] = CareqartPeer::OBSREQ;
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
      $this->modifiedColumns[] = CareqartPeer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CareqartPeer::DESANU;
      }
  
	} 
	
	public function setUsuanu($v)
	{

    if ($this->usuanu !== $v) {
        $this->usuanu = $v;
        $this->modifiedColumns[] = CareqartPeer::USUANU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CareqartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reqart = $rs->getString($startcol + 0);

      $this->fecreq = $rs->getDate($startcol + 1, null);

      $this->desreq = $rs->getString($startcol + 2);

      $this->monreq = $rs->getFloat($startcol + 3);

      $this->stareq = $rs->getString($startcol + 4);

      $this->unisol = $rs->getString($startcol + 5);

      $this->codcatreq = $rs->getString($startcol + 6);

      $this->aprreq = $rs->getString($startcol + 7);

      $this->nummemo = $rs->getString($startcol + 8);

      $this->justif = $rs->getString($startcol + 9);

      $this->codcen = $rs->getString($startcol + 10);

      $this->codalm = $rs->getString($startcol + 11);

      $this->codubi = $rs->getString($startcol + 12);

      $this->stadesp = $rs->getString($startcol + 13);

      $this->motivo = $rs->getString($startcol + 14);

      $this->usuapr = $rs->getString($startcol + 15);

      $this->fecapr = $rs->getDate($startcol + 16, null);

      $this->coddirec = $rs->getString($startcol + 17);

      $this->obsreq = $rs->getString($startcol + 18);

      $this->fecanu = $rs->getDate($startcol + 19, null);

      $this->desanu = $rs->getString($startcol + 20);

      $this->usuanu = $rs->getString($startcol + 21);

      $this->id = $rs->getInt($startcol + 22);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 23; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Careqart object", $e);
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
			$con = Propel::getConnection(CareqartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CareqartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CareqartPeer::DATABASE_NAME);
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
					$pk = CareqartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CareqartPeer::doUpdate($this, $con);
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


			if (($retval = CareqartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CareqartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReqart();
				break;
			case 1:
				return $this->getFecreq();
				break;
			case 2:
				return $this->getDesreq();
				break;
			case 3:
				return $this->getMonreq();
				break;
			case 4:
				return $this->getStareq();
				break;
			case 5:
				return $this->getUnisol();
				break;
			case 6:
				return $this->getCodcatreq();
				break;
			case 7:
				return $this->getAprreq();
				break;
			case 8:
				return $this->getNummemo();
				break;
			case 9:
				return $this->getJustif();
				break;
			case 10:
				return $this->getCodcen();
				break;
			case 11:
				return $this->getCodalm();
				break;
			case 12:
				return $this->getCodubi();
				break;
			case 13:
				return $this->getStadesp();
				break;
			case 14:
				return $this->getMotivo();
				break;
			case 15:
				return $this->getUsuapr();
				break;
			case 16:
				return $this->getFecapr();
				break;
			case 17:
				return $this->getCoddirec();
				break;
			case 18:
				return $this->getObsreq();
				break;
			case 19:
				return $this->getFecanu();
				break;
			case 20:
				return $this->getDesanu();
				break;
			case 21:
				return $this->getUsuanu();
				break;
			case 22:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CareqartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReqart(),
			$keys[1] => $this->getFecreq(),
			$keys[2] => $this->getDesreq(),
			$keys[3] => $this->getMonreq(),
			$keys[4] => $this->getStareq(),
			$keys[5] => $this->getUnisol(),
			$keys[6] => $this->getCodcatreq(),
			$keys[7] => $this->getAprreq(),
			$keys[8] => $this->getNummemo(),
			$keys[9] => $this->getJustif(),
			$keys[10] => $this->getCodcen(),
			$keys[11] => $this->getCodalm(),
			$keys[12] => $this->getCodubi(),
			$keys[13] => $this->getStadesp(),
			$keys[14] => $this->getMotivo(),
			$keys[15] => $this->getUsuapr(),
			$keys[16] => $this->getFecapr(),
			$keys[17] => $this->getCoddirec(),
			$keys[18] => $this->getObsreq(),
			$keys[19] => $this->getFecanu(),
			$keys[20] => $this->getDesanu(),
			$keys[21] => $this->getUsuanu(),
			$keys[22] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CareqartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReqart($value);
				break;
			case 1:
				$this->setFecreq($value);
				break;
			case 2:
				$this->setDesreq($value);
				break;
			case 3:
				$this->setMonreq($value);
				break;
			case 4:
				$this->setStareq($value);
				break;
			case 5:
				$this->setUnisol($value);
				break;
			case 6:
				$this->setCodcatreq($value);
				break;
			case 7:
				$this->setAprreq($value);
				break;
			case 8:
				$this->setNummemo($value);
				break;
			case 9:
				$this->setJustif($value);
				break;
			case 10:
				$this->setCodcen($value);
				break;
			case 11:
				$this->setCodalm($value);
				break;
			case 12:
				$this->setCodubi($value);
				break;
			case 13:
				$this->setStadesp($value);
				break;
			case 14:
				$this->setMotivo($value);
				break;
			case 15:
				$this->setUsuapr($value);
				break;
			case 16:
				$this->setFecapr($value);
				break;
			case 17:
				$this->setCoddirec($value);
				break;
			case 18:
				$this->setObsreq($value);
				break;
			case 19:
				$this->setFecanu($value);
				break;
			case 20:
				$this->setDesanu($value);
				break;
			case 21:
				$this->setUsuanu($value);
				break;
			case 22:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CareqartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReqart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecreq($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesreq($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonreq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStareq($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUnisol($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodcatreq($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAprreq($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNummemo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setJustif($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodcen($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodalm($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodubi($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStadesp($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMotivo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUsuapr($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecapr($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCoddirec($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setObsreq($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecanu($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDesanu($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setUsuanu($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setId($arr[$keys[22]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CareqartPeer::DATABASE_NAME);

		if ($this->isColumnModified(CareqartPeer::REQART)) $criteria->add(CareqartPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CareqartPeer::FECREQ)) $criteria->add(CareqartPeer::FECREQ, $this->fecreq);
		if ($this->isColumnModified(CareqartPeer::DESREQ)) $criteria->add(CareqartPeer::DESREQ, $this->desreq);
		if ($this->isColumnModified(CareqartPeer::MONREQ)) $criteria->add(CareqartPeer::MONREQ, $this->monreq);
		if ($this->isColumnModified(CareqartPeer::STAREQ)) $criteria->add(CareqartPeer::STAREQ, $this->stareq);
		if ($this->isColumnModified(CareqartPeer::UNISOL)) $criteria->add(CareqartPeer::UNISOL, $this->unisol);
		if ($this->isColumnModified(CareqartPeer::CODCATREQ)) $criteria->add(CareqartPeer::CODCATREQ, $this->codcatreq);
		if ($this->isColumnModified(CareqartPeer::APRREQ)) $criteria->add(CareqartPeer::APRREQ, $this->aprreq);
		if ($this->isColumnModified(CareqartPeer::NUMMEMO)) $criteria->add(CareqartPeer::NUMMEMO, $this->nummemo);
		if ($this->isColumnModified(CareqartPeer::JUSTIF)) $criteria->add(CareqartPeer::JUSTIF, $this->justif);
		if ($this->isColumnModified(CareqartPeer::CODCEN)) $criteria->add(CareqartPeer::CODCEN, $this->codcen);
		if ($this->isColumnModified(CareqartPeer::CODALM)) $criteria->add(CareqartPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CareqartPeer::CODUBI)) $criteria->add(CareqartPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CareqartPeer::STADESP)) $criteria->add(CareqartPeer::STADESP, $this->stadesp);
		if ($this->isColumnModified(CareqartPeer::MOTIVO)) $criteria->add(CareqartPeer::MOTIVO, $this->motivo);
		if ($this->isColumnModified(CareqartPeer::USUAPR)) $criteria->add(CareqartPeer::USUAPR, $this->usuapr);
		if ($this->isColumnModified(CareqartPeer::FECAPR)) $criteria->add(CareqartPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(CareqartPeer::CODDIREC)) $criteria->add(CareqartPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(CareqartPeer::OBSREQ)) $criteria->add(CareqartPeer::OBSREQ, $this->obsreq);
		if ($this->isColumnModified(CareqartPeer::FECANU)) $criteria->add(CareqartPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CareqartPeer::DESANU)) $criteria->add(CareqartPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CareqartPeer::USUANU)) $criteria->add(CareqartPeer::USUANU, $this->usuanu);
		if ($this->isColumnModified(CareqartPeer::ID)) $criteria->add(CareqartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CareqartPeer::DATABASE_NAME);

		$criteria->add(CareqartPeer::ID, $this->id);

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

		$copyObj->setReqart($this->reqart);

		$copyObj->setFecreq($this->fecreq);

		$copyObj->setDesreq($this->desreq);

		$copyObj->setMonreq($this->monreq);

		$copyObj->setStareq($this->stareq);

		$copyObj->setUnisol($this->unisol);

		$copyObj->setCodcatreq($this->codcatreq);

		$copyObj->setAprreq($this->aprreq);

		$copyObj->setNummemo($this->nummemo);

		$copyObj->setJustif($this->justif);

		$copyObj->setCodcen($this->codcen);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setStadesp($this->stadesp);

		$copyObj->setMotivo($this->motivo);

		$copyObj->setUsuapr($this->usuapr);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setObsreq($this->obsreq);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setUsuanu($this->usuanu);


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
			self::$peer = new CareqartPeer();
		}
		return self::$peer;
	}

} 