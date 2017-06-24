<?php


abstract class BaseFadefcaj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $descaj;


	
	protected $corcaj;


	
	protected $corfac;


	
	protected $cornumctr;


	
	protected $codalm;


	
	protected $conpag;


	
	protected $impfisname;


	
	protected $impfishost;


	
	protected $id;

	
	protected $collFaapecajs;

	
	protected $lastFaapecajCriteria = null;

	
	protected $collFaciecajs;

	
	protected $lastFaciecajCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDescaj()
  {

    return trim($this->descaj);

  }
  
  public function getCorcaj($val=false)
  {

    if($val) return number_format($this->corcaj,2,',','.');
    else return $this->corcaj;

  }
  
  public function getCorfac()
  {

    return $this->corfac;

  }
  
  public function getCornumctr()
  {

    return $this->cornumctr;

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getConpag()
  {

    return $this->conpag;

  }
  
  public function getImpfisname()
  {

    return trim($this->impfisname);

  }
  
  public function getImpfishost()
  {

    return trim($this->impfishost);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDescaj($v)
	{

    if ($this->descaj !== $v) {
        $this->descaj = $v;
        $this->modifiedColumns[] = FadefcajPeer::DESCAJ;
      }
  
	} 
	
	public function setCorcaj($v)
	{

    if ($this->corcaj !== $v) {
        $this->corcaj = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadefcajPeer::CORCAJ;
      }
  
	} 
	
	public function setCorfac($v)
	{

    if ($this->corfac !== $v) {
        $this->corfac = $v;
        $this->modifiedColumns[] = FadefcajPeer::CORFAC;
      }
  
	} 
	
	public function setCornumctr($v)
	{

    if ($this->cornumctr !== $v) {
        $this->cornumctr = $v;
        $this->modifiedColumns[] = FadefcajPeer::CORNUMCTR;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = FadefcajPeer::CODALM;
      }
  
	} 
	
	public function setConpag($v)
	{

    if ($this->conpag !== $v) {
        $this->conpag = $v;
        $this->modifiedColumns[] = FadefcajPeer::CONPAG;
      }
  
	} 
	
	public function setImpfisname($v)
	{

    if ($this->impfisname !== $v) {
        $this->impfisname = $v;
        $this->modifiedColumns[] = FadefcajPeer::IMPFISNAME;
      }
  
	} 
	
	public function setImpfishost($v)
	{

    if ($this->impfishost !== $v) {
        $this->impfishost = $v;
        $this->modifiedColumns[] = FadefcajPeer::IMPFISHOST;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadefcajPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->descaj = $rs->getString($startcol + 0);

      $this->corcaj = $rs->getFloat($startcol + 1);

      $this->corfac = $rs->getInt($startcol + 2);

      $this->cornumctr = $rs->getInt($startcol + 3);

      $this->codalm = $rs->getString($startcol + 4);

      $this->conpag = $rs->getInt($startcol + 5);

      $this->impfisname = $rs->getString($startcol + 6);

      $this->impfishost = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadefcaj object", $e);
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
			$con = Propel::getConnection(FadefcajPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadefcajPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadefcajPeer::DATABASE_NAME);
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
					$pk = FadefcajPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadefcajPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFaapecajs !== null) {
				foreach($this->collFaapecajs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = FadefcajPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFaapecajs !== null) {
					foreach($this->collFaapecajs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = FadefcajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDescaj();
				break;
			case 1:
				return $this->getCorcaj();
				break;
			case 2:
				return $this->getCorfac();
				break;
			case 3:
				return $this->getCornumctr();
				break;
			case 4:
				return $this->getCodalm();
				break;
			case 5:
				return $this->getConpag();
				break;
			case 6:
				return $this->getImpfisname();
				break;
			case 7:
				return $this->getImpfishost();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefcajPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDescaj(),
			$keys[1] => $this->getCorcaj(),
			$keys[2] => $this->getCorfac(),
			$keys[3] => $this->getCornumctr(),
			$keys[4] => $this->getCodalm(),
			$keys[5] => $this->getConpag(),
			$keys[6] => $this->getImpfisname(),
			$keys[7] => $this->getImpfishost(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadefcajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDescaj($value);
				break;
			case 1:
				$this->setCorcaj($value);
				break;
			case 2:
				$this->setCorfac($value);
				break;
			case 3:
				$this->setCornumctr($value);
				break;
			case 4:
				$this->setCodalm($value);
				break;
			case 5:
				$this->setConpag($value);
				break;
			case 6:
				$this->setImpfisname($value);
				break;
			case 7:
				$this->setImpfishost($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefcajPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDescaj($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCorcaj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorfac($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCornumctr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodalm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setConpag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setImpfisname($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setImpfishost($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadefcajPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadefcajPeer::DESCAJ)) $criteria->add(FadefcajPeer::DESCAJ, $this->descaj);
		if ($this->isColumnModified(FadefcajPeer::CORCAJ)) $criteria->add(FadefcajPeer::CORCAJ, $this->corcaj);
		if ($this->isColumnModified(FadefcajPeer::CORFAC)) $criteria->add(FadefcajPeer::CORFAC, $this->corfac);
		if ($this->isColumnModified(FadefcajPeer::CORNUMCTR)) $criteria->add(FadefcajPeer::CORNUMCTR, $this->cornumctr);
		if ($this->isColumnModified(FadefcajPeer::CODALM)) $criteria->add(FadefcajPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(FadefcajPeer::CONPAG)) $criteria->add(FadefcajPeer::CONPAG, $this->conpag);
		if ($this->isColumnModified(FadefcajPeer::IMPFISNAME)) $criteria->add(FadefcajPeer::IMPFISNAME, $this->impfisname);
		if ($this->isColumnModified(FadefcajPeer::IMPFISHOST)) $criteria->add(FadefcajPeer::IMPFISHOST, $this->impfishost);
		if ($this->isColumnModified(FadefcajPeer::ID)) $criteria->add(FadefcajPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadefcajPeer::DATABASE_NAME);

		$criteria->add(FadefcajPeer::ID, $this->id);

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

		$copyObj->setDescaj($this->descaj);

		$copyObj->setCorcaj($this->corcaj);

		$copyObj->setCorfac($this->corfac);

		$copyObj->setCornumctr($this->cornumctr);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setConpag($this->conpag);

		$copyObj->setImpfisname($this->impfisname);

		$copyObj->setImpfishost($this->impfishost);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFaapecajs() as $relObj) {
				$copyObj->addFaapecaj($relObj->copy($deepCopy));
			}

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
			self::$peer = new FadefcajPeer();
		}
		return self::$peer;
	}

	
	public function initFaapecajs()
	{
		if ($this->collFaapecajs === null) {
			$this->collFaapecajs = array();
		}
	}

	
	public function getFaapecajs($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFaapecajPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFaapecajs === null) {
			if ($this->isNew()) {
			   $this->collFaapecajs = array();
			} else {

				$criteria->add(FaapecajPeer::CODCAJ, $this->getId());

				FaapecajPeer::addSelectColumns($criteria);
				$this->collFaapecajs = FaapecajPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FaapecajPeer::CODCAJ, $this->getId());

				FaapecajPeer::addSelectColumns($criteria);
				if (!isset($this->lastFaapecajCriteria) || !$this->lastFaapecajCriteria->equals($criteria)) {
					$this->collFaapecajs = FaapecajPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFaapecajCriteria = $criteria;
		return $this->collFaapecajs;
	}

	
	public function countFaapecajs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFaapecajPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FaapecajPeer::CODCAJ, $this->getId());

		return FaapecajPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFaapecaj(Faapecaj $l)
	{
		$this->collFaapecajs[] = $l;
		$l->setFadefcaj($this);
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

				$criteria->add(FaciecajPeer::CODCAJ, $this->getId());

				FaciecajPeer::addSelectColumns($criteria);
				$this->collFaciecajs = FaciecajPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FaciecajPeer::CODCAJ, $this->getId());

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

		$criteria->add(FaciecajPeer::CODCAJ, $this->getId());

		return FaciecajPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFaciecaj(Faciecaj $l)
	{
		$this->collFaciecajs[] = $l;
		$l->setFadefcaj($this);
	}

} 