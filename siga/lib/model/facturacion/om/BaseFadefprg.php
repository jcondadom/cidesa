<?php


abstract class BaseFadefprg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprg;


	
	protected $desprg;


	
	protected $espae;


	
	protected $id;

	
	protected $collFalisprcs;

	
	protected $lastFalisprcCriteria = null;

	
	protected $collFadefcarords;

	
	protected $lastFadefcarordCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodprg()
  {

    return trim($this->codprg);

  }
  
  public function getDesprg()
  {

    return trim($this->desprg);

  }
  
  public function getEspae()
  {

    return trim($this->espae);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodprg($v)
	{

    if ($this->codprg !== $v) {
        $this->codprg = $v;
        $this->modifiedColumns[] = FadefprgPeer::CODPRG;
      }
  
	} 
	
	public function setDesprg($v)
	{

    if ($this->desprg !== $v) {
        $this->desprg = $v;
        $this->modifiedColumns[] = FadefprgPeer::DESPRG;
      }
  
	} 
	
	public function setEspae($v)
	{

    if ($this->espae !== $v) {
        $this->espae = $v;
        $this->modifiedColumns[] = FadefprgPeer::ESPAE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadefprgPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codprg = $rs->getString($startcol + 0);

      $this->desprg = $rs->getString($startcol + 1);

      $this->espae = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadefprg object", $e);
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
			$con = Propel::getConnection(FadefprgPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadefprgPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadefprgPeer::DATABASE_NAME);
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
					$pk = FadefprgPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadefprgPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFalisprcs !== null) {
				foreach($this->collFalisprcs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFadefcarords !== null) {
				foreach($this->collFadefcarords as $referrerFK) {
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


			if (($retval = FadefprgPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFalisprcs !== null) {
					foreach($this->collFalisprcs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFadefcarords !== null) {
					foreach($this->collFadefcarords as $referrerFK) {
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
		$pos = FadefprgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodprg();
				break;
			case 1:
				return $this->getDesprg();
				break;
			case 2:
				return $this->getEspae();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefprgPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprg(),
			$keys[1] => $this->getDesprg(),
			$keys[2] => $this->getEspae(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadefprgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodprg($value);
				break;
			case 1:
				$this->setDesprg($value);
				break;
			case 2:
				$this->setEspae($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefprgPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesprg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEspae($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadefprgPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadefprgPeer::CODPRG)) $criteria->add(FadefprgPeer::CODPRG, $this->codprg);
		if ($this->isColumnModified(FadefprgPeer::DESPRG)) $criteria->add(FadefprgPeer::DESPRG, $this->desprg);
		if ($this->isColumnModified(FadefprgPeer::ESPAE)) $criteria->add(FadefprgPeer::ESPAE, $this->espae);
		if ($this->isColumnModified(FadefprgPeer::ID)) $criteria->add(FadefprgPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadefprgPeer::DATABASE_NAME);

		$criteria->add(FadefprgPeer::ID, $this->id);

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

		$copyObj->setCodprg($this->codprg);

		$copyObj->setDesprg($this->desprg);

		$copyObj->setEspae($this->espae);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFalisprcs() as $relObj) {
				$copyObj->addFalisprc($relObj->copy($deepCopy));
			}

			foreach($this->getFadefcarords() as $relObj) {
				$copyObj->addFadefcarord($relObj->copy($deepCopy));
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
			self::$peer = new FadefprgPeer();
		}
		return self::$peer;
	}

	
	public function initFalisprcs()
	{
		if ($this->collFalisprcs === null) {
			$this->collFalisprcs = array();
		}
	}

	
	public function getFalisprcs($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFalisprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFalisprcs === null) {
			if ($this->isNew()) {
			   $this->collFalisprcs = array();
			} else {

				$criteria->add(FalisprcPeer::CODPRG, $this->getCodprg());

				FalisprcPeer::addSelectColumns($criteria);
				$this->collFalisprcs = FalisprcPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FalisprcPeer::CODPRG, $this->getCodprg());

				FalisprcPeer::addSelectColumns($criteria);
				if (!isset($this->lastFalisprcCriteria) || !$this->lastFalisprcCriteria->equals($criteria)) {
					$this->collFalisprcs = FalisprcPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFalisprcCriteria = $criteria;
		return $this->collFalisprcs;
	}

	
	public function countFalisprcs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFalisprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FalisprcPeer::CODPRG, $this->getCodprg());

		return FalisprcPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFalisprc(Falisprc $l)
	{
		$this->collFalisprcs[] = $l;
		$l->setFadefprg($this);
	}


	
	public function getFalisprcsJoinFatipcte($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFalisprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFalisprcs === null) {
			if ($this->isNew()) {
				$this->collFalisprcs = array();
			} else {

				$criteria->add(FalisprcPeer::CODPRG, $this->getCodprg());

				$this->collFalisprcs = FalisprcPeer::doSelectJoinFatipcte($criteria, $con);
			}
		} else {
									
			$criteria->add(FalisprcPeer::CODPRG, $this->getCodprg());

			if (!isset($this->lastFalisprcCriteria) || !$this->lastFalisprcCriteria->equals($criteria)) {
				$this->collFalisprcs = FalisprcPeer::doSelectJoinFatipcte($criteria, $con);
			}
		}
		$this->lastFalisprcCriteria = $criteria;

		return $this->collFalisprcs;
	}


	
	public function getFalisprcsJoinFaconpag($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFalisprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFalisprcs === null) {
			if ($this->isNew()) {
				$this->collFalisprcs = array();
			} else {

				$criteria->add(FalisprcPeer::CODPRG, $this->getCodprg());

				$this->collFalisprcs = FalisprcPeer::doSelectJoinFaconpag($criteria, $con);
			}
		} else {
									
			$criteria->add(FalisprcPeer::CODPRG, $this->getCodprg());

			if (!isset($this->lastFalisprcCriteria) || !$this->lastFalisprcCriteria->equals($criteria)) {
				$this->collFalisprcs = FalisprcPeer::doSelectJoinFaconpag($criteria, $con);
			}
		}
		$this->lastFalisprcCriteria = $criteria;

		return $this->collFalisprcs;
	}

	
	public function initFadefcarords()
	{
		if ($this->collFadefcarords === null) {
			$this->collFadefcarords = array();
		}
	}

	
	public function getFadefcarords($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadefcarordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFadefcarords === null) {
			if ($this->isNew()) {
			   $this->collFadefcarords = array();
			} else {

				$criteria->add(FadefcarordPeer::CODPRG, $this->getCodprg());

				FadefcarordPeer::addSelectColumns($criteria);
				$this->collFadefcarords = FadefcarordPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FadefcarordPeer::CODPRG, $this->getCodprg());

				FadefcarordPeer::addSelectColumns($criteria);
				if (!isset($this->lastFadefcarordCriteria) || !$this->lastFadefcarordCriteria->equals($criteria)) {
					$this->collFadefcarords = FadefcarordPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFadefcarordCriteria = $criteria;
		return $this->collFadefcarords;
	}

	
	public function countFadefcarords($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadefcarordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FadefcarordPeer::CODPRG, $this->getCodprg());

		return FadefcarordPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFadefcarord(Fadefcarord $l)
	{
		$this->collFadefcarords[] = $l;
		$l->setFadefprg($this);
	}


	
	public function getFadefcarordsJoinFaconpagRelatedByConpagpreId($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadefcarordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFadefcarords === null) {
			if ($this->isNew()) {
				$this->collFadefcarords = array();
			} else {

				$criteria->add(FadefcarordPeer::CODPRG, $this->getCodprg());

				$this->collFadefcarords = FadefcarordPeer::doSelectJoinFaconpagRelatedByConpagpreId($criteria, $con);
			}
		} else {
									
			$criteria->add(FadefcarordPeer::CODPRG, $this->getCodprg());

			if (!isset($this->lastFadefcarordCriteria) || !$this->lastFadefcarordCriteria->equals($criteria)) {
				$this->collFadefcarords = FadefcarordPeer::doSelectJoinFaconpagRelatedByConpagpreId($criteria, $con);
			}
		}
		$this->lastFadefcarordCriteria = $criteria;

		return $this->collFadefcarords;
	}


	
	public function getFadefcarordsJoinFaconpagRelatedByConpagpedId($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadefcarordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFadefcarords === null) {
			if ($this->isNew()) {
				$this->collFadefcarords = array();
			} else {

				$criteria->add(FadefcarordPeer::CODPRG, $this->getCodprg());

				$this->collFadefcarords = FadefcarordPeer::doSelectJoinFaconpagRelatedByConpagpedId($criteria, $con);
			}
		} else {
									
			$criteria->add(FadefcarordPeer::CODPRG, $this->getCodprg());

			if (!isset($this->lastFadefcarordCriteria) || !$this->lastFadefcarordCriteria->equals($criteria)) {
				$this->collFadefcarords = FadefcarordPeer::doSelectJoinFaconpagRelatedByConpagpedId($criteria, $con);
			}
		}
		$this->lastFadefcarordCriteria = $criteria;

		return $this->collFadefcarords;
	}

} 