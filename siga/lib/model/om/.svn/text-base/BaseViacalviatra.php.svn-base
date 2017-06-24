<?php


abstract class BaseViacalviatra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcal;


	
	protected $feccal;


	
	protected $tipcom;


	
	protected $refsol;


	
	protected $codcat;


	
	protected $diaconper;


	
	protected $diasinper;


	
	protected $status;


	
	protected $observaciones;


	
	protected $refcom;


	
	protected $fecanu;


	
	protected $desanu;


	
	protected $verificado;


	
	protected $stainf;


	
	protected $refcomvar;


	
	protected $usuapr;


	
	protected $fecapr;


	
	protected $logusu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcal()
  {

    return trim($this->numcal);

  }
  
  public function getFeccal($format = 'Y-m-d')
  {

    if ($this->feccal === null || $this->feccal === '') {
      return null;
    } elseif (!is_int($this->feccal)) {
            $ts = adodb_strtotime($this->feccal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccal] as date/time value: " . var_export($this->feccal, true));
      }
    } else {
      $ts = $this->feccal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getRefsol()
  {

    return trim($this->refsol);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getDiaconper()
  {

    return $this->diaconper;

  }
  
  public function getDiasinper()
  {

    return $this->diasinper;

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getObservaciones()
  {

    return trim($this->observaciones);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

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
  
  public function getVerificado()
  {

    return trim($this->verificado);

  }
  
  public function getStainf()
  {

    return trim($this->stainf);

  }
  
  public function getRefcomvar()
  {

    return trim($this->refcomvar);

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

  
  public function getLogusu()
  {

    return trim($this->logusu);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcal($v)
	{

    if ($this->numcal !== $v) {
        $this->numcal = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::NUMCAL;
      }
  
	} 
	
	public function setFeccal($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccal !== $ts) {
      $this->feccal = $ts;
      $this->modifiedColumns[] = ViacalviatraPeer::FECCAL;
    }

	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::TIPCOM;
      }
  
	} 
	
	public function setRefsol($v)
	{

    if ($this->refsol !== $v) {
        $this->refsol = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::REFSOL;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::CODCAT;
      }
  
	} 
	
	public function setDiaconper($v)
	{

    if ($this->diaconper !== $v) {
        $this->diaconper = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::DIACONPER;
      }
  
	} 
	
	public function setDiasinper($v)
	{

    if ($this->diasinper !== $v) {
        $this->diasinper = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::DIASINPER;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::STATUS;
      }
  
	} 
	
	public function setObservaciones($v)
	{

    if ($this->observaciones !== $v) {
        $this->observaciones = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::OBSERVACIONES;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::REFCOM;
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
      $this->modifiedColumns[] = ViacalviatraPeer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::DESANU;
      }
  
	} 
	
	public function setVerificado($v)
	{

    if ($this->verificado !== $v) {
        $this->verificado = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::VERIFICADO;
      }
  
	} 
	
	public function setStainf($v)
	{

    if ($this->stainf !== $v) {
        $this->stainf = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::STAINF;
      }
  
	} 
	
	public function setRefcomvar($v)
	{

    if ($this->refcomvar !== $v) {
        $this->refcomvar = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::REFCOMVAR;
      }
  
	} 
	
	public function setUsuapr($v)
	{

    if ($this->usuapr !== $v) {
        $this->usuapr = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::USUAPR;
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
      $this->modifiedColumns[] = ViacalviatraPeer::FECAPR;
    }

	} 
	
	public function setLogusu($v)
	{

    if ($this->logusu !== $v) {
        $this->logusu = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::LOGUSU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViacalviatraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcal = $rs->getString($startcol + 0);

      $this->feccal = $rs->getDate($startcol + 1, null);

      $this->tipcom = $rs->getString($startcol + 2);

      $this->refsol = $rs->getString($startcol + 3);

      $this->codcat = $rs->getString($startcol + 4);

      $this->diaconper = $rs->getInt($startcol + 5);

      $this->diasinper = $rs->getInt($startcol + 6);

      $this->status = $rs->getString($startcol + 7);

      $this->observaciones = $rs->getString($startcol + 8);

      $this->refcom = $rs->getString($startcol + 9);

      $this->fecanu = $rs->getDate($startcol + 10, null);

      $this->desanu = $rs->getString($startcol + 11);

      $this->verificado = $rs->getString($startcol + 12);

      $this->stainf = $rs->getString($startcol + 13);

      $this->refcomvar = $rs->getString($startcol + 14);

      $this->usuapr = $rs->getString($startcol + 15);

      $this->fecapr = $rs->getDate($startcol + 16, null);

      $this->logusu = $rs->getString($startcol + 17);

      $this->id = $rs->getInt($startcol + 18);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 19; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viacalviatra object", $e);
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
			$con = Propel::getConnection(ViacalviatraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViacalviatraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViacalviatraPeer::DATABASE_NAME);
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
					$pk = ViacalviatraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViacalviatraPeer::doUpdate($this, $con);
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


			if (($retval = ViacalviatraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViacalviatraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcal();
				break;
			case 1:
				return $this->getFeccal();
				break;
			case 2:
				return $this->getTipcom();
				break;
			case 3:
				return $this->getRefsol();
				break;
			case 4:
				return $this->getCodcat();
				break;
			case 5:
				return $this->getDiaconper();
				break;
			case 6:
				return $this->getDiasinper();
				break;
			case 7:
				return $this->getStatus();
				break;
			case 8:
				return $this->getObservaciones();
				break;
			case 9:
				return $this->getRefcom();
				break;
			case 10:
				return $this->getFecanu();
				break;
			case 11:
				return $this->getDesanu();
				break;
			case 12:
				return $this->getVerificado();
				break;
			case 13:
				return $this->getStainf();
				break;
			case 14:
				return $this->getRefcomvar();
				break;
			case 15:
				return $this->getUsuapr();
				break;
			case 16:
				return $this->getFecapr();
				break;
			case 17:
				return $this->getLogusu();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViacalviatraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcal(),
			$keys[1] => $this->getFeccal(),
			$keys[2] => $this->getTipcom(),
			$keys[3] => $this->getRefsol(),
			$keys[4] => $this->getCodcat(),
			$keys[5] => $this->getDiaconper(),
			$keys[6] => $this->getDiasinper(),
			$keys[7] => $this->getStatus(),
			$keys[8] => $this->getObservaciones(),
			$keys[9] => $this->getRefcom(),
			$keys[10] => $this->getFecanu(),
			$keys[11] => $this->getDesanu(),
			$keys[12] => $this->getVerificado(),
			$keys[13] => $this->getStainf(),
			$keys[14] => $this->getRefcomvar(),
			$keys[15] => $this->getUsuapr(),
			$keys[16] => $this->getFecapr(),
			$keys[17] => $this->getLogusu(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViacalviatraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcal($value);
				break;
			case 1:
				$this->setFeccal($value);
				break;
			case 2:
				$this->setTipcom($value);
				break;
			case 3:
				$this->setRefsol($value);
				break;
			case 4:
				$this->setCodcat($value);
				break;
			case 5:
				$this->setDiaconper($value);
				break;
			case 6:
				$this->setDiasinper($value);
				break;
			case 7:
				$this->setStatus($value);
				break;
			case 8:
				$this->setObservaciones($value);
				break;
			case 9:
				$this->setRefcom($value);
				break;
			case 10:
				$this->setFecanu($value);
				break;
			case 11:
				$this->setDesanu($value);
				break;
			case 12:
				$this->setVerificado($value);
				break;
			case 13:
				$this->setStainf($value);
				break;
			case 14:
				$this->setRefcomvar($value);
				break;
			case 15:
				$this->setUsuapr($value);
				break;
			case 16:
				$this->setFecapr($value);
				break;
			case 17:
				$this->setLogusu($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViacalviatraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcal($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccal($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipcom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefsol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodcat($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiaconper($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDiasinper($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObservaciones($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRefcom($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecanu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDesanu($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setVerificado($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStainf($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRefcomvar($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUsuapr($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecapr($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setLogusu($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViacalviatraPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViacalviatraPeer::NUMCAL)) $criteria->add(ViacalviatraPeer::NUMCAL, $this->numcal);
		if ($this->isColumnModified(ViacalviatraPeer::FECCAL)) $criteria->add(ViacalviatraPeer::FECCAL, $this->feccal);
		if ($this->isColumnModified(ViacalviatraPeer::TIPCOM)) $criteria->add(ViacalviatraPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(ViacalviatraPeer::REFSOL)) $criteria->add(ViacalviatraPeer::REFSOL, $this->refsol);
		if ($this->isColumnModified(ViacalviatraPeer::CODCAT)) $criteria->add(ViacalviatraPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ViacalviatraPeer::DIACONPER)) $criteria->add(ViacalviatraPeer::DIACONPER, $this->diaconper);
		if ($this->isColumnModified(ViacalviatraPeer::DIASINPER)) $criteria->add(ViacalviatraPeer::DIASINPER, $this->diasinper);
		if ($this->isColumnModified(ViacalviatraPeer::STATUS)) $criteria->add(ViacalviatraPeer::STATUS, $this->status);
		if ($this->isColumnModified(ViacalviatraPeer::OBSERVACIONES)) $criteria->add(ViacalviatraPeer::OBSERVACIONES, $this->observaciones);
		if ($this->isColumnModified(ViacalviatraPeer::REFCOM)) $criteria->add(ViacalviatraPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(ViacalviatraPeer::FECANU)) $criteria->add(ViacalviatraPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(ViacalviatraPeer::DESANU)) $criteria->add(ViacalviatraPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(ViacalviatraPeer::VERIFICADO)) $criteria->add(ViacalviatraPeer::VERIFICADO, $this->verificado);
		if ($this->isColumnModified(ViacalviatraPeer::STAINF)) $criteria->add(ViacalviatraPeer::STAINF, $this->stainf);
		if ($this->isColumnModified(ViacalviatraPeer::REFCOMVAR)) $criteria->add(ViacalviatraPeer::REFCOMVAR, $this->refcomvar);
		if ($this->isColumnModified(ViacalviatraPeer::USUAPR)) $criteria->add(ViacalviatraPeer::USUAPR, $this->usuapr);
		if ($this->isColumnModified(ViacalviatraPeer::FECAPR)) $criteria->add(ViacalviatraPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(ViacalviatraPeer::LOGUSU)) $criteria->add(ViacalviatraPeer::LOGUSU, $this->logusu);
		if ($this->isColumnModified(ViacalviatraPeer::ID)) $criteria->add(ViacalviatraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViacalviatraPeer::DATABASE_NAME);

		$criteria->add(ViacalviatraPeer::ID, $this->id);

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

		$copyObj->setNumcal($this->numcal);

		$copyObj->setFeccal($this->feccal);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setRefsol($this->refsol);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setDiaconper($this->diaconper);

		$copyObj->setDiasinper($this->diasinper);

		$copyObj->setStatus($this->status);

		$copyObj->setObservaciones($this->observaciones);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setVerificado($this->verificado);

		$copyObj->setStainf($this->stainf);

		$copyObj->setRefcomvar($this->refcomvar);

		$copyObj->setUsuapr($this->usuapr);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setLogusu($this->logusu);


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
			self::$peer = new ViacalviatraPeer();
		}
		return self::$peer;
	}

} 