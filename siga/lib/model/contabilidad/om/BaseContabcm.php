<?php


abstract class BaseContabcm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcom;


	
	protected $feccom;


	
	protected $descom;


	
	protected $moncom;


	
	protected $stacom;


	
	protected $tipcom;


	
	protected $reftra;


	
	protected $loguse;


	
	protected $usuanu;


	
	protected $id;

	
	protected $collContabc1ms;

	
	protected $lastContabc1mCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcom()
  {

    return trim($this->numcom);

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

  
  public function getDescom()
  {

    return trim($this->descom);

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
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getReftra()
  {

    return trim($this->reftra);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getUsuanu()
  {

    return trim($this->usuanu);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = ContabcmPeer::NUMCOM;
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
      $this->modifiedColumns[] = ContabcmPeer::FECCOM;
    }

	} 
	
	public function setDescom($v)
	{

    if ($this->descom !== $v) {
        $this->descom = $v;
        $this->modifiedColumns[] = ContabcmPeer::DESCOM;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ContabcmPeer::MONCOM;
      }
  
	} 
	
	public function setStacom($v)
	{

    if ($this->stacom !== $v) {
        $this->stacom = $v;
        $this->modifiedColumns[] = ContabcmPeer::STACOM;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = ContabcmPeer::TIPCOM;
      }
  
	} 
	
	public function setReftra($v)
	{

    if ($this->reftra !== $v) {
        $this->reftra = $v;
        $this->modifiedColumns[] = ContabcmPeer::REFTRA;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = ContabcmPeer::LOGUSE;
      }
  
	} 
	
	public function setUsuanu($v)
	{

    if ($this->usuanu !== $v) {
        $this->usuanu = $v;
        $this->modifiedColumns[] = ContabcmPeer::USUANU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ContabcmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcom = $rs->getString($startcol + 0);

      $this->feccom = $rs->getDate($startcol + 1, null);

      $this->descom = $rs->getString($startcol + 2);

      $this->moncom = $rs->getFloat($startcol + 3);

      $this->stacom = $rs->getString($startcol + 4);

      $this->tipcom = $rs->getString($startcol + 5);

      $this->reftra = $rs->getString($startcol + 6);

      $this->loguse = $rs->getString($startcol + 7);

      $this->usuanu = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Contabcm object", $e);
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
			$con = Propel::getConnection(ContabcmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContabcmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContabcmPeer::DATABASE_NAME);
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
					$pk = ContabcmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContabcmPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collContabc1ms !== null) {
				foreach($this->collContabc1ms as $referrerFK) {
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


			if (($retval = ContabcmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collContabc1ms !== null) {
					foreach($this->collContabc1ms as $referrerFK) {
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
		$pos = ContabcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcom();
				break;
			case 1:
				return $this->getFeccom();
				break;
			case 2:
				return $this->getDescom();
				break;
			case 3:
				return $this->getMoncom();
				break;
			case 4:
				return $this->getStacom();
				break;
			case 5:
				return $this->getTipcom();
				break;
			case 6:
				return $this->getReftra();
				break;
			case 7:
				return $this->getLoguse();
				break;
			case 8:
				return $this->getUsuanu();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContabcmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcom(),
			$keys[1] => $this->getFeccom(),
			$keys[2] => $this->getDescom(),
			$keys[3] => $this->getMoncom(),
			$keys[4] => $this->getStacom(),
			$keys[5] => $this->getTipcom(),
			$keys[6] => $this->getReftra(),
			$keys[7] => $this->getLoguse(),
			$keys[8] => $this->getUsuanu(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContabcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcom($value);
				break;
			case 1:
				$this->setFeccom($value);
				break;
			case 2:
				$this->setDescom($value);
				break;
			case 3:
				$this->setMoncom($value);
				break;
			case 4:
				$this->setStacom($value);
				break;
			case 5:
				$this->setTipcom($value);
				break;
			case 6:
				$this->setReftra($value);
				break;
			case 7:
				$this->setLoguse($value);
				break;
			case 8:
				$this->setUsuanu($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContabcmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStacom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setReftra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLoguse($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUsuanu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContabcmPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContabcmPeer::NUMCOM)) $criteria->add(ContabcmPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(ContabcmPeer::FECCOM)) $criteria->add(ContabcmPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(ContabcmPeer::DESCOM)) $criteria->add(ContabcmPeer::DESCOM, $this->descom);
		if ($this->isColumnModified(ContabcmPeer::MONCOM)) $criteria->add(ContabcmPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(ContabcmPeer::STACOM)) $criteria->add(ContabcmPeer::STACOM, $this->stacom);
		if ($this->isColumnModified(ContabcmPeer::TIPCOM)) $criteria->add(ContabcmPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(ContabcmPeer::REFTRA)) $criteria->add(ContabcmPeer::REFTRA, $this->reftra);
		if ($this->isColumnModified(ContabcmPeer::LOGUSE)) $criteria->add(ContabcmPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(ContabcmPeer::USUANU)) $criteria->add(ContabcmPeer::USUANU, $this->usuanu);
		if ($this->isColumnModified(ContabcmPeer::ID)) $criteria->add(ContabcmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContabcmPeer::DATABASE_NAME);

		$criteria->add(ContabcmPeer::ID, $this->id);

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

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setDescom($this->descom);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setStacom($this->stacom);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setReftra($this->reftra);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setUsuanu($this->usuanu);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getContabc1ms() as $relObj) {
				$copyObj->addContabc1m($relObj->copy($deepCopy));
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
			self::$peer = new ContabcmPeer();
		}
		return self::$peer;
	}

	
	public function initContabc1ms()
	{
		if ($this->collContabc1ms === null) {
			$this->collContabc1ms = array();
		}
	}

	
	public function getContabc1ms($criteria = null, $con = null)
	{
				include_once 'lib/model/contabilidad/om/BaseContabc1mPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContabc1ms === null) {
			if ($this->isNew()) {
			   $this->collContabc1ms = array();
			} else {

				$criteria->add(Contabc1mPeer::NUMCOM, $this->getNumcom());

				Contabc1mPeer::addSelectColumns($criteria);
				$this->collContabc1ms = Contabc1mPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(Contabc1mPeer::NUMCOM, $this->getNumcom());

				Contabc1mPeer::addSelectColumns($criteria);
				if (!isset($this->lastContabc1mCriteria) || !$this->lastContabc1mCriteria->equals($criteria)) {
					$this->collContabc1ms = Contabc1mPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContabc1mCriteria = $criteria;
		return $this->collContabc1ms;
	}

	
	public function countContabc1ms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/contabilidad/om/BaseContabc1mPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(Contabc1mPeer::NUMCOM, $this->getNumcom());

		return Contabc1mPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addContabc1m(Contabc1m $l)
	{
		$this->collContabc1ms[] = $l;
		$l->setContabcm($this);
	}


	
	public function getContabc1msJoinContabb($criteria = null, $con = null)
	{
				include_once 'lib/model/contabilidad/om/BaseContabc1mPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContabc1ms === null) {
			if ($this->isNew()) {
				$this->collContabc1ms = array();
			} else {

				$criteria->add(Contabc1mPeer::NUMCOM, $this->getNumcom());

				$this->collContabc1ms = Contabc1mPeer::doSelectJoinContabb($criteria, $con);
			}
		} else {
									
			$criteria->add(Contabc1mPeer::NUMCOM, $this->getNumcom());

			if (!isset($this->lastContabc1mCriteria) || !$this->lastContabc1mCriteria->equals($criteria)) {
				$this->collContabc1ms = Contabc1mPeer::doSelectJoinContabb($criteria, $con);
			}
		}
		$this->lastContabc1mCriteria = $criteria;

		return $this->collContabc1ms;
	}

} 