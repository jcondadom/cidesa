<?php


abstract class BaseFaemptra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemptra;


	
	protected $rifemptra;


	
	protected $nomemptra;


	
	protected $diremptra;


	
	protected $codzon;


	
	protected $tlfemptra;


	
	protected $nomperres;


	
	protected $id;

	
	protected $aFadefzon;

	
	protected $collFadefvehs;

	
	protected $lastFadefvehCriteria = null;

	
	protected $collFadefchos;

	
	protected $lastFadefchoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemptra()
  {

    return trim($this->codemptra);

  }
  
  public function getRifemptra()
  {

    return trim($this->rifemptra);

  }
  
  public function getNomemptra()
  {

    return trim($this->nomemptra);

  }
  
  public function getDiremptra()
  {

    return trim($this->diremptra);

  }
  
  public function getCodzon()
  {

    return trim($this->codzon);

  }
  
  public function getTlfemptra()
  {

    return trim($this->tlfemptra);

  }
  
  public function getNomperres()
  {

    return trim($this->nomperres);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemptra($v)
	{

    if ($this->codemptra !== $v) {
        $this->codemptra = $v;
        $this->modifiedColumns[] = FaemptraPeer::CODEMPTRA;
      }
  
	} 
	
	public function setRifemptra($v)
	{

    if ($this->rifemptra !== $v) {
        $this->rifemptra = $v;
        $this->modifiedColumns[] = FaemptraPeer::RIFEMPTRA;
      }
  
	} 
	
	public function setNomemptra($v)
	{

    if ($this->nomemptra !== $v) {
        $this->nomemptra = $v;
        $this->modifiedColumns[] = FaemptraPeer::NOMEMPTRA;
      }
  
	} 
	
	public function setDiremptra($v)
	{

    if ($this->diremptra !== $v) {
        $this->diremptra = $v;
        $this->modifiedColumns[] = FaemptraPeer::DIREMPTRA;
      }
  
	} 
	
	public function setCodzon($v)
	{

    if ($this->codzon !== $v) {
        $this->codzon = $v;
        $this->modifiedColumns[] = FaemptraPeer::CODZON;
      }
  
		if ($this->aFadefzon !== null && $this->aFadefzon->getCodzon() !== $v) {
			$this->aFadefzon = null;
		}

	} 
	
	public function setTlfemptra($v)
	{

    if ($this->tlfemptra !== $v) {
        $this->tlfemptra = $v;
        $this->modifiedColumns[] = FaemptraPeer::TLFEMPTRA;
      }
  
	} 
	
	public function setNomperres($v)
	{

    if ($this->nomperres !== $v) {
        $this->nomperres = $v;
        $this->modifiedColumns[] = FaemptraPeer::NOMPERRES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaemptraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemptra = $rs->getString($startcol + 0);

      $this->rifemptra = $rs->getString($startcol + 1);

      $this->nomemptra = $rs->getString($startcol + 2);

      $this->diremptra = $rs->getString($startcol + 3);

      $this->codzon = $rs->getString($startcol + 4);

      $this->tlfemptra = $rs->getString($startcol + 5);

      $this->nomperres = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faemptra object", $e);
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
			$con = Propel::getConnection(FaemptraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaemptraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaemptraPeer::DATABASE_NAME);
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


												
			if ($this->aFadefzon !== null) {
				if ($this->aFadefzon->isModified()) {
					$affectedRows += $this->aFadefzon->save($con);
				}
				$this->setFadefzon($this->aFadefzon);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FaemptraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaemptraPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFadefvehs !== null) {
				foreach($this->collFadefvehs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFadefchos !== null) {
				foreach($this->collFadefchos as $referrerFK) {
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


												
			if ($this->aFadefzon !== null) {
				if (!$this->aFadefzon->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFadefzon->getValidationFailures());
				}
			}


			if (($retval = FaemptraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFadefvehs !== null) {
					foreach($this->collFadefvehs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFadefchos !== null) {
					foreach($this->collFadefchos as $referrerFK) {
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
		$pos = FaemptraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemptra();
				break;
			case 1:
				return $this->getRifemptra();
				break;
			case 2:
				return $this->getNomemptra();
				break;
			case 3:
				return $this->getDiremptra();
				break;
			case 4:
				return $this->getCodzon();
				break;
			case 5:
				return $this->getTlfemptra();
				break;
			case 6:
				return $this->getNomperres();
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
		$keys = FaemptraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemptra(),
			$keys[1] => $this->getRifemptra(),
			$keys[2] => $this->getNomemptra(),
			$keys[3] => $this->getDiremptra(),
			$keys[4] => $this->getCodzon(),
			$keys[5] => $this->getTlfemptra(),
			$keys[6] => $this->getNomperres(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaemptraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemptra($value);
				break;
			case 1:
				$this->setRifemptra($value);
				break;
			case 2:
				$this->setNomemptra($value);
				break;
			case 3:
				$this->setDiremptra($value);
				break;
			case 4:
				$this->setCodzon($value);
				break;
			case 5:
				$this->setTlfemptra($value);
				break;
			case 6:
				$this->setNomperres($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaemptraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemptra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRifemptra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomemptra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDiremptra($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodzon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTlfemptra($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomperres($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaemptraPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaemptraPeer::CODEMPTRA)) $criteria->add(FaemptraPeer::CODEMPTRA, $this->codemptra);
		if ($this->isColumnModified(FaemptraPeer::RIFEMPTRA)) $criteria->add(FaemptraPeer::RIFEMPTRA, $this->rifemptra);
		if ($this->isColumnModified(FaemptraPeer::NOMEMPTRA)) $criteria->add(FaemptraPeer::NOMEMPTRA, $this->nomemptra);
		if ($this->isColumnModified(FaemptraPeer::DIREMPTRA)) $criteria->add(FaemptraPeer::DIREMPTRA, $this->diremptra);
		if ($this->isColumnModified(FaemptraPeer::CODZON)) $criteria->add(FaemptraPeer::CODZON, $this->codzon);
		if ($this->isColumnModified(FaemptraPeer::TLFEMPTRA)) $criteria->add(FaemptraPeer::TLFEMPTRA, $this->tlfemptra);
		if ($this->isColumnModified(FaemptraPeer::NOMPERRES)) $criteria->add(FaemptraPeer::NOMPERRES, $this->nomperres);
		if ($this->isColumnModified(FaemptraPeer::ID)) $criteria->add(FaemptraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaemptraPeer::DATABASE_NAME);

		$criteria->add(FaemptraPeer::ID, $this->id);

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

		$copyObj->setCodemptra($this->codemptra);

		$copyObj->setRifemptra($this->rifemptra);

		$copyObj->setNomemptra($this->nomemptra);

		$copyObj->setDiremptra($this->diremptra);

		$copyObj->setCodzon($this->codzon);

		$copyObj->setTlfemptra($this->tlfemptra);

		$copyObj->setNomperres($this->nomperres);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFadefvehs() as $relObj) {
				$copyObj->addFadefveh($relObj->copy($deepCopy));
			}

			foreach($this->getFadefchos() as $relObj) {
				$copyObj->addFadefcho($relObj->copy($deepCopy));
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
			self::$peer = new FaemptraPeer();
		}
		return self::$peer;
	}

	
	public function setFadefzon($v)
	{


		if ($v === null) {
			$this->setCodzon(NULL);
		} else {
			$this->setCodzon($v->getCodzon());
		}


		$this->aFadefzon = $v;
	}


	
	public function getFadefzon($con = null)
	{
		if ($this->aFadefzon === null && (($this->codzon !== "" && $this->codzon !== null))) {
						include_once 'lib/model/facturacion/om/BaseFadefzonPeer.php';

      $c = new Criteria();
      $c->add(FadefzonPeer::CODZON,$this->codzon);
      
			$this->aFadefzon = FadefzonPeer::doSelectOne($c, $con);

			
		}
		return $this->aFadefzon;
	}

	
	public function initFadefvehs()
	{
		if ($this->collFadefvehs === null) {
			$this->collFadefvehs = array();
		}
	}

	
	public function getFadefvehs($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadefvehPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFadefvehs === null) {
			if ($this->isNew()) {
			   $this->collFadefvehs = array();
			} else {

				$criteria->add(FadefvehPeer::CODEMPTRA, $this->getCodemptra());

				FadefvehPeer::addSelectColumns($criteria);
				$this->collFadefvehs = FadefvehPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FadefvehPeer::CODEMPTRA, $this->getCodemptra());

				FadefvehPeer::addSelectColumns($criteria);
				if (!isset($this->lastFadefvehCriteria) || !$this->lastFadefvehCriteria->equals($criteria)) {
					$this->collFadefvehs = FadefvehPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFadefvehCriteria = $criteria;
		return $this->collFadefvehs;
	}

	
	public function countFadefvehs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadefvehPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FadefvehPeer::CODEMPTRA, $this->getCodemptra());

		return FadefvehPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFadefveh(Fadefveh $l)
	{
		$this->collFadefvehs[] = $l;
		$l->setFaemptra($this);
	}

	
	public function initFadefchos()
	{
		if ($this->collFadefchos === null) {
			$this->collFadefchos = array();
		}
	}

	
	public function getFadefchos($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadefchoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFadefchos === null) {
			if ($this->isNew()) {
			   $this->collFadefchos = array();
			} else {

				$criteria->add(FadefchoPeer::CODEMPTRA, $this->getCodemptra());

				FadefchoPeer::addSelectColumns($criteria);
				$this->collFadefchos = FadefchoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FadefchoPeer::CODEMPTRA, $this->getCodemptra());

				FadefchoPeer::addSelectColumns($criteria);
				if (!isset($this->lastFadefchoCriteria) || !$this->lastFadefchoCriteria->equals($criteria)) {
					$this->collFadefchos = FadefchoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFadefchoCriteria = $criteria;
		return $this->collFadefchos;
	}

	
	public function countFadefchos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadefchoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FadefchoPeer::CODEMPTRA, $this->getCodemptra());

		return FadefchoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFadefcho(Fadefcho $l)
	{
		$this->collFadefchos[] = $l;
		$l->setFaemptra($this);
	}

} 