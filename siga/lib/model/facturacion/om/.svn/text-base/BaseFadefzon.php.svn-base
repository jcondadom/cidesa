<?php


abstract class BaseFadefzon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codzon;


	
	protected $deszon;


	
	protected $id;

	
	protected $collFaentcres;

	
	protected $lastFaentcreCriteria = null;

	
	protected $collFaemptras;

	
	protected $lastFaemptraCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodzon()
  {

    return trim($this->codzon);

  }
  
  public function getDeszon()
  {

    return trim($this->deszon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodzon($v)
	{

    if ($this->codzon !== $v) {
        $this->codzon = $v;
        $this->modifiedColumns[] = FadefzonPeer::CODZON;
      }
  
	} 
	
	public function setDeszon($v)
	{

    if ($this->deszon !== $v) {
        $this->deszon = $v;
        $this->modifiedColumns[] = FadefzonPeer::DESZON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadefzonPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codzon = $rs->getString($startcol + 0);

      $this->deszon = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadefzon object", $e);
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
			$con = Propel::getConnection(FadefzonPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadefzonPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadefzonPeer::DATABASE_NAME);
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
					$pk = FadefzonPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadefzonPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFaentcres !== null) {
				foreach($this->collFaentcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFaemptras !== null) {
				foreach($this->collFaemptras as $referrerFK) {
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


			if (($retval = FadefzonPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFaentcres !== null) {
					foreach($this->collFaentcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFaemptras !== null) {
					foreach($this->collFaemptras as $referrerFK) {
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
		$pos = FadefzonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodzon();
				break;
			case 1:
				return $this->getDeszon();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefzonPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodzon(),
			$keys[1] => $this->getDeszon(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadefzonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodzon($value);
				break;
			case 1:
				$this->setDeszon($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefzonPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodzon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDeszon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadefzonPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadefzonPeer::CODZON)) $criteria->add(FadefzonPeer::CODZON, $this->codzon);
		if ($this->isColumnModified(FadefzonPeer::DESZON)) $criteria->add(FadefzonPeer::DESZON, $this->deszon);
		if ($this->isColumnModified(FadefzonPeer::ID)) $criteria->add(FadefzonPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadefzonPeer::DATABASE_NAME);

		$criteria->add(FadefzonPeer::ID, $this->id);

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

		$copyObj->setCodzon($this->codzon);

		$copyObj->setDeszon($this->deszon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFaentcres() as $relObj) {
				$copyObj->addFaentcre($relObj->copy($deepCopy));
			}

			foreach($this->getFaemptras() as $relObj) {
				$copyObj->addFaemptra($relObj->copy($deepCopy));
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
			self::$peer = new FadefzonPeer();
		}
		return self::$peer;
	}

	
	public function initFaentcres()
	{
		if ($this->collFaentcres === null) {
			$this->collFaentcres = array();
		}
	}

	
	public function getFaentcres($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFaentcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFaentcres === null) {
			if ($this->isNew()) {
			   $this->collFaentcres = array();
			} else {

				$criteria->add(FaentcrePeer::CODZON, $this->getCodzon());

				FaentcrePeer::addSelectColumns($criteria);
				$this->collFaentcres = FaentcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FaentcrePeer::CODZON, $this->getCodzon());

				FaentcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastFaentcreCriteria) || !$this->lastFaentcreCriteria->equals($criteria)) {
					$this->collFaentcres = FaentcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFaentcreCriteria = $criteria;
		return $this->collFaentcres;
	}

	
	public function countFaentcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFaentcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FaentcrePeer::CODZON, $this->getCodzon());

		return FaentcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFaentcre(Faentcre $l)
	{
		$this->collFaentcres[] = $l;
		$l->setFadefzon($this);
	}

	
	public function initFaemptras()
	{
		if ($this->collFaemptras === null) {
			$this->collFaemptras = array();
		}
	}

	
	public function getFaemptras($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFaemptraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFaemptras === null) {
			if ($this->isNew()) {
			   $this->collFaemptras = array();
			} else {

				$criteria->add(FaemptraPeer::CODZON, $this->getCodzon());

				FaemptraPeer::addSelectColumns($criteria);
				$this->collFaemptras = FaemptraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FaemptraPeer::CODZON, $this->getCodzon());

				FaemptraPeer::addSelectColumns($criteria);
				if (!isset($this->lastFaemptraCriteria) || !$this->lastFaemptraCriteria->equals($criteria)) {
					$this->collFaemptras = FaemptraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFaemptraCriteria = $criteria;
		return $this->collFaemptras;
	}

	
	public function countFaemptras($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFaemptraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FaemptraPeer::CODZON, $this->getCodzon());

		return FaemptraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFaemptra(Faemptra $l)
	{
		$this->collFaemptras[] = $l;
		$l->setFadefzon($this);
	}

} 