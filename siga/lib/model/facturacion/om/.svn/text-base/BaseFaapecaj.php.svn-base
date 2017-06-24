<?php


abstract class BaseFaapecaj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codalm;


	
	protected $codcaj;


	
	protected $codusu;


	
	protected $fechorape;


	
	protected $stacaj;


	
	protected $monape;


	
	protected $observ;


	
	protected $id;

	
	protected $aFadefcaj;

	
	protected $collFaciecajs;

	
	protected $lastFaciecajCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodcaj()
  {

    return $this->codcaj;

  }
  
  public function getCodusu()
  {

    return trim($this->codusu);

  }
  
  public function getFechorape($format = 'Y-m-d H:i:s')
  {

    if ($this->fechorape === null || $this->fechorape === '') {
      return null;
    } elseif (!is_int($this->fechorape)) {
            $ts = adodb_strtotime($this->fechorape);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechorape] as date/time value: " . var_export($this->fechorape, true));
      }
    } else {
      $ts = $this->fechorape;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStacaj()
  {

    return trim($this->stacaj);

  }
  
  public function getMonape($val=false)
  {

    if($val) return number_format($this->monape,2,',','.');
    else return $this->monape;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = FaapecajPeer::CODALM;
      }
  
	} 
	
	public function setCodcaj($v)
	{

    if ($this->codcaj !== $v) {
        $this->codcaj = $v;
        $this->modifiedColumns[] = FaapecajPeer::CODCAJ;
      }
  
		if ($this->aFadefcaj !== null && $this->aFadefcaj->getId() !== $v) {
			$this->aFadefcaj = null;
		}

	} 
	
	public function setCodusu($v)
	{

    if ($this->codusu !== $v) {
        $this->codusu = $v;
        $this->modifiedColumns[] = FaapecajPeer::CODUSU;
      }
  
	} 
	
	public function setFechorape($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechorape] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechorape !== $ts) {
      $this->fechorape = $ts;
      $this->modifiedColumns[] = FaapecajPeer::FECHORAPE;
    }

	} 
	
	public function setStacaj($v)
	{

    if ($this->stacaj !== $v) {
        $this->stacaj = $v;
        $this->modifiedColumns[] = FaapecajPeer::STACAJ;
      }
  
	} 
	
	public function setMonape($v)
	{

    if ($this->monape !== $v) {
        $this->monape = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaapecajPeer::MONAPE;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = FaapecajPeer::OBSERV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaapecajPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codalm = $rs->getString($startcol + 0);

      $this->codcaj = $rs->getInt($startcol + 1);

      $this->codusu = $rs->getString($startcol + 2);

      $this->fechorape = $rs->getTimestamp($startcol + 3, null);

      $this->stacaj = $rs->getString($startcol + 4);

      $this->monape = $rs->getFloat($startcol + 5);

      $this->observ = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faapecaj object", $e);
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
			$con = Propel::getConnection(FaapecajPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaapecajPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaapecajPeer::DATABASE_NAME);
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


												
			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aFadefcaj !== null) {
				if ($this->aFadefcaj->isModified()) {
					$affectedRows += $this->aFadefcaj->save($con);
				}
				$this->setFadefcaj($this->aFadefcaj);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FaapecajPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaapecajPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFaciecajs !== null) {
				foreach($this->collFaciecajs as $referrerFK) {
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

			if ($this->aFadefcaj !== null) {
				if (!$this->aFadefcaj->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFadefcaj->getValidationFailures());
				}
			}


			if (($retval = FaapecajPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFaciecajs !== null) {
					foreach($this->collFaciecajs as $referrerFK) {
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
		$pos = FaapecajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodalm();
				break;
			case 1:
				return $this->getCodcaj();
				break;
			case 2:
				return $this->getCodusu();
				break;
			case 3:
				return $this->getFechorape();
				break;
			case 4:
				return $this->getStacaj();
				break;
			case 5:
				return $this->getMonape();
				break;
			case 6:
				return $this->getObserv();
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
		$keys = FaapecajPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodalm(),
			$keys[1] => $this->getCodcaj(),
			$keys[2] => $this->getCodusu(),
			$keys[3] => $this->getFechorape(),
			$keys[4] => $this->getStacaj(),
			$keys[5] => $this->getMonape(),
			$keys[6] => $this->getObserv(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaapecajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodalm($value);
				break;
			case 1:
				$this->setCodcaj($value);
				break;
			case 2:
				$this->setCodusu($value);
				break;
			case 3:
				$this->setFechorape($value);
				break;
			case 4:
				$this->setStacaj($value);
				break;
			case 5:
				$this->setMonape($value);
				break;
			case 6:
				$this->setObserv($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaapecajPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodalm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcaj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodusu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechorape($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStacaj($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonape($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setObserv($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaapecajPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaapecajPeer::CODALM)) $criteria->add(FaapecajPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(FaapecajPeer::CODCAJ)) $criteria->add(FaapecajPeer::CODCAJ, $this->codcaj);
		if ($this->isColumnModified(FaapecajPeer::CODUSU)) $criteria->add(FaapecajPeer::CODUSU, $this->codusu);
		if ($this->isColumnModified(FaapecajPeer::FECHORAPE)) $criteria->add(FaapecajPeer::FECHORAPE, $this->fechorape);
		if ($this->isColumnModified(FaapecajPeer::STACAJ)) $criteria->add(FaapecajPeer::STACAJ, $this->stacaj);
		if ($this->isColumnModified(FaapecajPeer::MONAPE)) $criteria->add(FaapecajPeer::MONAPE, $this->monape);
		if ($this->isColumnModified(FaapecajPeer::OBSERV)) $criteria->add(FaapecajPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(FaapecajPeer::ID)) $criteria->add(FaapecajPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaapecajPeer::DATABASE_NAME);

		$criteria->add(FaapecajPeer::ID, $this->id);

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

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodcaj($this->codcaj);

		$copyObj->setCodusu($this->codusu);

		$copyObj->setFechorape($this->fechorape);

		$copyObj->setStacaj($this->stacaj);

		$copyObj->setMonape($this->monape);

		$copyObj->setObserv($this->observ);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFaciecajs() as $relObj) {
				$copyObj->addFaciecaj($relObj->copy($deepCopy));
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
			self::$peer = new FaapecajPeer();
		}
		return self::$peer;
	}

	
	public function setFadefcaj($v)
	{


		if ($v === null) {
			$this->setCodcaj(NULL);
		} else {
			$this->setCodcaj($v->getId());
		}


		$this->aFadefcaj = $v;
	}


	
	public function getFadefcaj($con = null)
	{
		if ($this->aFadefcaj === null && ($this->codcaj !== null)) {
						include_once 'lib/model/facturacion/om/BaseFadefcajPeer.php';

      $c = new Criteria();
      $c->add(FadefcajPeer::ID,$this->codcaj);
      
			$this->aFadefcaj = FadefcajPeer::doSelectOne($c, $con);

			
		}
		return $this->aFadefcaj;
	}

	
	public function initFaciecajs()
	{
		if ($this->collFaciecajs === null) {
			$this->collFaciecajs = array();
		}
	}

	
	public function getFaciecajs($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFaciecajPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFaciecajs === null) {
			if ($this->isNew()) {
			   $this->collFaciecajs = array();
			} else {

				$criteria->add(FaciecajPeer::CODAPE, $this->getId());

				FaciecajPeer::addSelectColumns($criteria);
				$this->collFaciecajs = FaciecajPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FaciecajPeer::CODAPE, $this->getId());

				FaciecajPeer::addSelectColumns($criteria);
				if (!isset($this->lastFaciecajCriteria) || !$this->lastFaciecajCriteria->equals($criteria)) {
					$this->collFaciecajs = FaciecajPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFaciecajCriteria = $criteria;
		return $this->collFaciecajs;
	}

	
	public function countFaciecajs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFaciecajPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FaciecajPeer::CODAPE, $this->getId());

		return FaciecajPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFaciecaj(Faciecaj $l)
	{
		$this->collFaciecajs[] = $l;
		$l->setFaapecaj($this);
	}

} 