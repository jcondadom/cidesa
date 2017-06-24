<?php


abstract class BaseCpcomext extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcomext;


	
	protected $tipcom;


	
	protected $feccom;


	
	protected $anocom;


	
	protected $refcom;


	
	protected $descom;


	
	protected $desanu;


	
	protected $moncom;


	
	protected $stacom;


	
	protected $fecanu;


	
	protected $cedrif;


	
	protected $loguse;


	
	protected $fecreg = 1327942052;


	
	protected $codmon;


	
	protected $valmon;


	
	protected $id;

	
	protected $aCpdoccom;

	
	protected $aOpbenefi;

	
	protected $aTsdefmon;

	
	protected $collCpimpcomexts;

	
	protected $lastCpimpcomextCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefcomext()
  {

    return trim($this->refcomext);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getFeccom($format = 'Y-m-d')
  {

    if ($this->feccom === null || $this->feccom === '') {
      return null;
    } elseif (!is_int($this->feccom)) {
            $ts = adodb_strtotime($this->feccom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
      }
    } else {
      $ts = $this->feccom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnocom()
  {

    return trim($this->anocom);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getDescom()
  {

    return trim($this->descom);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getMoncom($val=false)
  {

    if($val) return number_format($this->moncom,2,',','.');
    else return $this->moncom;

  }
  
  public function getStacom()
  {

    return trim($this->stacom);

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

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getFecreg($format = 'Y-m-d H:i:s')
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

  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,2,',','.');
    else return $this->valmon;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefcomext($v)
	{

    if ($this->refcomext !== $v) {
        $this->refcomext = $v;
        $this->modifiedColumns[] = CpcomextPeer::REFCOMEXT;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = CpcomextPeer::TIPCOM;
      }
  
		if ($this->aCpdoccom !== null && $this->aCpdoccom->getTipcom() !== $v) {
			$this->aCpdoccom = null;
		}

	} 
	
	public function setFeccom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccom !== $ts) {
      $this->feccom = $ts;
      $this->modifiedColumns[] = CpcomextPeer::FECCOM;
    }

	} 
	
	public function setAnocom($v)
	{

    if ($this->anocom !== $v) {
        $this->anocom = $v;
        $this->modifiedColumns[] = CpcomextPeer::ANOCOM;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = CpcomextPeer::REFCOM;
      }
  
	} 
	
	public function setDescom($v)
	{

    if ($this->descom !== $v) {
        $this->descom = $v;
        $this->modifiedColumns[] = CpcomextPeer::DESCOM;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CpcomextPeer::DESANU;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpcomextPeer::MONCOM;
      }
  
	} 
	
	public function setStacom($v)
	{

    if ($this->stacom !== $v) {
        $this->stacom = $v;
        $this->modifiedColumns[] = CpcomextPeer::STACOM;
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
      $this->modifiedColumns[] = CpcomextPeer::FECANU;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = CpcomextPeer::CEDRIF;
      }
  
		if ($this->aOpbenefi !== null && $this->aOpbenefi->getCedrif() !== $v) {
			$this->aOpbenefi = null;
		}

	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = CpcomextPeer::LOGUSE;
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
    if ($this->fecreg !== $ts || $ts === 1327942052) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = CpcomextPeer::FECREG;
    }

	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = CpcomextPeer::CODMON;
      }
  
		if ($this->aTsdefmon !== null && $this->aTsdefmon->getCodmon() !== $v) {
			$this->aTsdefmon = null;
		}

	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpcomextPeer::VALMON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpcomextPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refcomext = $rs->getString($startcol + 0);

      $this->tipcom = $rs->getString($startcol + 1);

      $this->feccom = $rs->getDate($startcol + 2, null);

      $this->anocom = $rs->getString($startcol + 3);

      $this->refcom = $rs->getString($startcol + 4);

      $this->descom = $rs->getString($startcol + 5);

      $this->desanu = $rs->getString($startcol + 6);

      $this->moncom = $rs->getFloat($startcol + 7);

      $this->stacom = $rs->getString($startcol + 8);

      $this->fecanu = $rs->getDate($startcol + 9, null);

      $this->cedrif = $rs->getString($startcol + 10);

      $this->loguse = $rs->getString($startcol + 11);

      $this->fecreg = $rs->getTimestamp($startcol + 12, null);

      $this->codmon = $rs->getString($startcol + 13);

      $this->valmon = $rs->getFloat($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpcomext object", $e);
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

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpcomextPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpcomextPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpcomextPeer::DATABASE_NAME);
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


												
			if ($this->aCpdoccom !== null) {
				if ($this->aCpdoccom->isModified()) {
					$affectedRows += $this->aCpdoccom->save($con);
				}
				$this->setCpdoccom($this->aCpdoccom);
			}

			if ($this->aOpbenefi !== null) {
				if ($this->aOpbenefi->isModified()) {
					$affectedRows += $this->aOpbenefi->save($con);
				}
				$this->setOpbenefi($this->aOpbenefi);
			}

			if ($this->aTsdefmon !== null) {
				if ($this->aTsdefmon->isModified()) {
					$affectedRows += $this->aTsdefmon->save($con);
				}
				$this->setTsdefmon($this->aTsdefmon);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CpcomextPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpcomextPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpimpcomexts !== null) {
				foreach($this->collCpimpcomexts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aCpdoccom !== null) {
				if (!$this->aCpdoccom->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpdoccom->getValidationFailures());
				}
			}

			if ($this->aOpbenefi !== null) {
				if (!$this->aOpbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOpbenefi->getValidationFailures());
				}
			}

			if ($this->aTsdefmon !== null) {
				if (!$this->aTsdefmon->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTsdefmon->getValidationFailures());
				}
			}


			if (($retval = CpcomextPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpimpcomexts !== null) {
					foreach($this->collCpimpcomexts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpcomextPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcomext();
				break;
			case 1:
				return $this->getTipcom();
				break;
			case 2:
				return $this->getFeccom();
				break;
			case 3:
				return $this->getAnocom();
				break;
			case 4:
				return $this->getRefcom();
				break;
			case 5:
				return $this->getDescom();
				break;
			case 6:
				return $this->getDesanu();
				break;
			case 7:
				return $this->getMoncom();
				break;
			case 8:
				return $this->getStacom();
				break;
			case 9:
				return $this->getFecanu();
				break;
			case 10:
				return $this->getCedrif();
				break;
			case 11:
				return $this->getLoguse();
				break;
			case 12:
				return $this->getFecreg();
				break;
			case 13:
				return $this->getCodmon();
				break;
			case 14:
				return $this->getValmon();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpcomextPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcomext(),
			$keys[1] => $this->getTipcom(),
			$keys[2] => $this->getFeccom(),
			$keys[3] => $this->getAnocom(),
			$keys[4] => $this->getRefcom(),
			$keys[5] => $this->getDescom(),
			$keys[6] => $this->getDesanu(),
			$keys[7] => $this->getMoncom(),
			$keys[8] => $this->getStacom(),
			$keys[9] => $this->getFecanu(),
			$keys[10] => $this->getCedrif(),
			$keys[11] => $this->getLoguse(),
			$keys[12] => $this->getFecreg(),
			$keys[13] => $this->getCodmon(),
			$keys[14] => $this->getValmon(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpcomextPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcomext($value);
				break;
			case 1:
				$this->setTipcom($value);
				break;
			case 2:
				$this->setFeccom($value);
				break;
			case 3:
				$this->setAnocom($value);
				break;
			case 4:
				$this->setRefcom($value);
				break;
			case 5:
				$this->setDescom($value);
				break;
			case 6:
				$this->setDesanu($value);
				break;
			case 7:
				$this->setMoncom($value);
				break;
			case 8:
				$this->setStacom($value);
				break;
			case 9:
				$this->setFecanu($value);
				break;
			case 10:
				$this->setCedrif($value);
				break;
			case 11:
				$this->setLoguse($value);
				break;
			case 12:
				$this->setFecreg($value);
				break;
			case 13:
				$this->setCodmon($value);
				break;
			case 14:
				$this->setValmon($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpcomextPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcomext($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnocom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefcom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDescom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesanu($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMoncom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStacom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecanu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCedrif($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLoguse($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecreg($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodmon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setValmon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpcomextPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpcomextPeer::REFCOMEXT)) $criteria->add(CpcomextPeer::REFCOMEXT, $this->refcomext);
		if ($this->isColumnModified(CpcomextPeer::TIPCOM)) $criteria->add(CpcomextPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(CpcomextPeer::FECCOM)) $criteria->add(CpcomextPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(CpcomextPeer::ANOCOM)) $criteria->add(CpcomextPeer::ANOCOM, $this->anocom);
		if ($this->isColumnModified(CpcomextPeer::REFCOM)) $criteria->add(CpcomextPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(CpcomextPeer::DESCOM)) $criteria->add(CpcomextPeer::DESCOM, $this->descom);
		if ($this->isColumnModified(CpcomextPeer::DESANU)) $criteria->add(CpcomextPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpcomextPeer::MONCOM)) $criteria->add(CpcomextPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(CpcomextPeer::STACOM)) $criteria->add(CpcomextPeer::STACOM, $this->stacom);
		if ($this->isColumnModified(CpcomextPeer::FECANU)) $criteria->add(CpcomextPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpcomextPeer::CEDRIF)) $criteria->add(CpcomextPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CpcomextPeer::LOGUSE)) $criteria->add(CpcomextPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(CpcomextPeer::FECREG)) $criteria->add(CpcomextPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(CpcomextPeer::CODMON)) $criteria->add(CpcomextPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(CpcomextPeer::VALMON)) $criteria->add(CpcomextPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(CpcomextPeer::ID)) $criteria->add(CpcomextPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpcomextPeer::DATABASE_NAME);

		$criteria->add(CpcomextPeer::ID, $this->id);

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

		$copyObj->setRefcomext($this->refcomext);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setAnocom($this->anocom);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setDescom($this->descom);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setStacom($this->stacom);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValmon($this->valmon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpimpcomexts() as $relObj) {
				$copyObj->addCpimpcomext($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new CpcomextPeer();
		}
		return self::$peer;
	}

	
	public function setCpdoccom($v)
	{


		if ($v === null) {
			$this->setTipcom(NULL);
		} else {
			$this->setTipcom($v->getTipcom());
		}


		$this->aCpdoccom = $v;
	}


	
	public function getCpdoccom($con = null)
	{
		if ($this->aCpdoccom === null && (($this->tipcom !== "" && $this->tipcom !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpdoccomPeer.php';

      $c = new Criteria();
      $c->add(CpdoccomPeer::TIPCOM,$this->tipcom);
      
			$this->aCpdoccom = CpdoccomPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpdoccom;
	}

	
	public function setOpbenefi($v)
	{


		if ($v === null) {
			$this->setCedrif(NULL);
		} else {
			$this->setCedrif($v->getCedrif());
		}


		$this->aOpbenefi = $v;
	}


	
	public function getOpbenefi($con = null)
	{
		if ($this->aOpbenefi === null && (($this->cedrif !== "" && $this->cedrif !== null))) {
						include_once 'lib/model/om/BaseOpbenefiPeer.php';

      $c = new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$this->cedrif);
      
			$this->aOpbenefi = OpbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aOpbenefi;
	}

	
	public function setTsdefmon($v)
	{


		if ($v === null) {
			$this->setCodmon(NULL);
		} else {
			$this->setCodmon($v->getCodmon());
		}


		$this->aTsdefmon = $v;
	}


	
	public function getTsdefmon($con = null)
	{
		if ($this->aTsdefmon === null && (($this->codmon !== "" && $this->codmon !== null))) {
						include_once 'lib/model/om/BaseTsdefmonPeer.php';

      $c = new Criteria();
      $c->add(TsdefmonPeer::CODMON,$this->codmon);
      
			$this->aTsdefmon = TsdefmonPeer::doSelectOne($c, $con);

			
		}
		return $this->aTsdefmon;
	}

	
	public function initCpimpcomexts()
	{
		if ($this->collCpimpcomexts === null) {
			$this->collCpimpcomexts = array();
		}
	}

	
	public function getCpimpcomexts($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpcomextPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpimpcomexts === null) {
			if ($this->isNew()) {
			   $this->collCpimpcomexts = array();
			} else {

				$criteria->add(CpimpcomextPeer::REFCOMEXT, $this->getRefcomext());

				CpimpcomextPeer::addSelectColumns($criteria);
				$this->collCpimpcomexts = CpimpcomextPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpimpcomextPeer::REFCOMEXT, $this->getRefcomext());

				CpimpcomextPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpimpcomextCriteria) || !$this->lastCpimpcomextCriteria->equals($criteria)) {
					$this->collCpimpcomexts = CpimpcomextPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpimpcomextCriteria = $criteria;
		return $this->collCpimpcomexts;
	}

	
	public function countCpimpcomexts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpcomextPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpimpcomextPeer::REFCOMEXT, $this->getRefcomext());

		return CpimpcomextPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpimpcomext(Cpimpcomext $l)
	{
		$this->collCpimpcomexts[] = $l;
		$l->setCpcomext($this);
	}


	
	public function getCpimpcomextsJoinCpdeftit($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpcomextPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpimpcomexts === null) {
			if ($this->isNew()) {
				$this->collCpimpcomexts = array();
			} else {

				$criteria->add(CpimpcomextPeer::REFCOMEXT, $this->getRefcomext());

				$this->collCpimpcomexts = CpimpcomextPeer::doSelectJoinCpdeftit($criteria, $con);
			}
		} else {
									
			$criteria->add(CpimpcomextPeer::REFCOMEXT, $this->getRefcomext());

			if (!isset($this->lastCpimpcomextCriteria) || !$this->lastCpimpcomextCriteria->equals($criteria)) {
				$this->collCpimpcomexts = CpimpcomextPeer::doSelectJoinCpdeftit($criteria, $con);
			}
		}
		$this->lastCpimpcomextCriteria = $criteria;

		return $this->collCpimpcomexts;
	}

} 