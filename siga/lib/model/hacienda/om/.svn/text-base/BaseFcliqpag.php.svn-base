<?php


abstract class BaseFcliqpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numliq;


	
	protected $fecliq;


	
	protected $ctaban;


	
	protected $nrodep;


	
	protected $codtip;


	
	protected $desliq;


	
	protected $monliq;


	
	protected $id;

	
	protected $collFcdetliqs;

	
	protected $lastFcdetliqCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumliq()
  {

    return trim($this->numliq);

  }
  
  public function getFecliq($format = 'Y-m-d')
  {

    if ($this->fecliq === null || $this->fecliq === '') {
      return null;
    } elseif (!is_int($this->fecliq)) {
            $ts = adodb_strtotime($this->fecliq);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecliq] as date/time value: " . var_export($this->fecliq, true));
      }
    } else {
      $ts = $this->fecliq;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCtaban()
  {

    return trim($this->ctaban);

  }
  
  public function getNrodep()
  {

    return trim($this->nrodep);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getDesliq()
  {

    return trim($this->desliq);

  }
  
  public function getMonliq($val=false)
  {

    if($val) return number_format($this->monliq,2,',','.');
    else return $this->monliq;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumliq($v)
	{

    if ($this->numliq !== $v) {
        $this->numliq = $v;
        $this->modifiedColumns[] = FcliqpagPeer::NUMLIQ;
      }
  
	} 
	
	public function setFecliq($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecliq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecliq !== $ts) {
      $this->fecliq = $ts;
      $this->modifiedColumns[] = FcliqpagPeer::FECLIQ;
    }

	} 
	
	public function setCtaban($v)
	{

    if ($this->ctaban !== $v) {
        $this->ctaban = $v;
        $this->modifiedColumns[] = FcliqpagPeer::CTABAN;
      }
  
	} 
	
	public function setNrodep($v)
	{

    if ($this->nrodep !== $v) {
        $this->nrodep = $v;
        $this->modifiedColumns[] = FcliqpagPeer::NRODEP;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = FcliqpagPeer::CODTIP;
      }
  
	} 
	
	public function setDesliq($v)
	{

    if ($this->desliq !== $v) {
        $this->desliq = $v;
        $this->modifiedColumns[] = FcliqpagPeer::DESLIQ;
      }
  
	} 
	
	public function setMonliq($v)
	{

    if ($this->monliq !== $v) {
        $this->monliq = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcliqpagPeer::MONLIQ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcliqpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numliq = $rs->getString($startcol + 0);

      $this->fecliq = $rs->getDate($startcol + 1, null);

      $this->ctaban = $rs->getString($startcol + 2);

      $this->nrodep = $rs->getString($startcol + 3);

      $this->codtip = $rs->getString($startcol + 4);

      $this->desliq = $rs->getString($startcol + 5);

      $this->monliq = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcliqpag object", $e);
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
			$con = Propel::getConnection(FcliqpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcliqpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcliqpagPeer::DATABASE_NAME);
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
					$pk = FcliqpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcliqpagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFcdetliqs !== null) {
				foreach($this->collFcdetliqs as $referrerFK) {
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


												
			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}


			if (($retval = FcliqpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFcdetliqs !== null) {
					foreach($this->collFcdetliqs as $referrerFK) {
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
		$pos = FcliqpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumliq();
				break;
			case 1:
				return $this->getFecliq();
				break;
			case 2:
				return $this->getCtaban();
				break;
			case 3:
				return $this->getNrodep();
				break;
			case 4:
				return $this->getCodtip();
				break;
			case 5:
				return $this->getDesliq();
				break;
			case 6:
				return $this->getMonliq();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcliqpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumliq(),
			$keys[1] => $this->getFecliq(),
			$keys[2] => $this->getCtaban(),
			$keys[3] => $this->getNrodep(),
			$keys[4] => $this->getCodtip(),
			$keys[5] => $this->getDesliq(),
			$keys[6] => $this->getMonliq(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcliqpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumliq($value);
				break;
			case 1:
				$this->setFecliq($value);
				break;
			case 2:
				$this->setCtaban($value);
				break;
			case 3:
				$this->setNrodep($value);
				break;
			case 4:
				$this->setCodtip($value);
				break;
			case 5:
				$this->setDesliq($value);
				break;
			case 6:
				$this->setMonliq($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcliqpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumliq($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecliq($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCtaban($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNrodep($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodtip($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesliq($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonliq($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcliqpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcliqpagPeer::NUMLIQ)) $criteria->add(FcliqpagPeer::NUMLIQ, $this->numliq);
		if ($this->isColumnModified(FcliqpagPeer::FECLIQ)) $criteria->add(FcliqpagPeer::FECLIQ, $this->fecliq);
		if ($this->isColumnModified(FcliqpagPeer::CTABAN)) $criteria->add(FcliqpagPeer::CTABAN, $this->ctaban);
		if ($this->isColumnModified(FcliqpagPeer::NRODEP)) $criteria->add(FcliqpagPeer::NRODEP, $this->nrodep);
		if ($this->isColumnModified(FcliqpagPeer::CODTIP)) $criteria->add(FcliqpagPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(FcliqpagPeer::DESLIQ)) $criteria->add(FcliqpagPeer::DESLIQ, $this->desliq);
		if ($this->isColumnModified(FcliqpagPeer::MONLIQ)) $criteria->add(FcliqpagPeer::MONLIQ, $this->monliq);
		if ($this->isColumnModified(FcliqpagPeer::ID)) $criteria->add(FcliqpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcliqpagPeer::DATABASE_NAME);

		$criteria->add(FcliqpagPeer::ID, $this->id);

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

		$copyObj->setNumliq($this->numliq);

		$copyObj->setFecliq($this->fecliq);

		$copyObj->setCtaban($this->ctaban);

		$copyObj->setNrodep($this->nrodep);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setDesliq($this->desliq);

		$copyObj->setMonliq($this->monliq);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFcdetliqs() as $relObj) {
				$copyObj->addFcdetliq($relObj->copy($deepCopy));
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
			self::$peer = new FcliqpagPeer();
		}
		return self::$peer;
	}

	
	public function initFcdetliqs()
	{
		if ($this->collFcdetliqs === null) {
			$this->collFcdetliqs = array();
		}
	}

	
	public function getFcdetliqs($criteria = null, $con = null)
	{
				include_once 'lib/model/hacienda/om/BaseFcdetliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcdetliqs === null) {
			if ($this->isNew()) {
			   $this->collFcdetliqs = array();
			} else {

				$criteria->add(FcdetliqPeer::NUMLIQ, $this->getNumliq());

				FcdetliqPeer::addSelectColumns($criteria);
				$this->collFcdetliqs = FcdetliqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FcdetliqPeer::NUMLIQ, $this->getNumliq());

				FcdetliqPeer::addSelectColumns($criteria);
				if (!isset($this->lastFcdetliqCriteria) || !$this->lastFcdetliqCriteria->equals($criteria)) {
					$this->collFcdetliqs = FcdetliqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFcdetliqCriteria = $criteria;
		return $this->collFcdetliqs;
	}

	
	public function countFcdetliqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/hacienda/om/BaseFcdetliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FcdetliqPeer::NUMLIQ, $this->getNumliq());

		return FcdetliqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFcdetliq(Fcdetliq $l)
	{
		$this->collFcdetliqs[] = $l;
		$l->setFcliqpag($this);
	}


	
	public function getFcdetliqsJoinFcpagos($criteria = null, $con = null)
	{
				include_once 'lib/model/hacienda/om/BaseFcdetliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcdetliqs === null) {
			if ($this->isNew()) {
				$this->collFcdetliqs = array();
			} else {

				$criteria->add(FcdetliqPeer::NUMLIQ, $this->getNumliq());

				$this->collFcdetliqs = FcdetliqPeer::doSelectJoinFcpagos($criteria, $con);
			}
		} else {
									
			$criteria->add(FcdetliqPeer::NUMLIQ, $this->getNumliq());

			if (!isset($this->lastFcdetliqCriteria) || !$this->lastFcdetliqCriteria->equals($criteria)) {
				$this->collFcdetliqs = FcdetliqPeer::doSelectJoinFcpagos($criteria, $con);
			}
		}
		$this->lastFcdetliqCriteria = $criteria;

		return $this->collFcdetliqs;
	}


	
	public function getFcdetliqsJoinFcconrep($criteria = null, $con = null)
	{
				include_once 'lib/model/hacienda/om/BaseFcdetliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFcdetliqs === null) {
			if ($this->isNew()) {
				$this->collFcdetliqs = array();
			} else {

				$criteria->add(FcdetliqPeer::NUMLIQ, $this->getNumliq());

				$this->collFcdetliqs = FcdetliqPeer::doSelectJoinFcconrep($criteria, $con);
			}
		} else {
									
			$criteria->add(FcdetliqPeer::NUMLIQ, $this->getNumliq());

			if (!isset($this->lastFcdetliqCriteria) || !$this->lastFcdetliqCriteria->equals($criteria)) {
				$this->collFcdetliqs = FcdetliqPeer::doSelectJoinFcconrep($criteria, $con);
			}
		}
		$this->lastFcdetliqCriteria = $criteria;

		return $this->collFcdetliqs;
	}

} 
