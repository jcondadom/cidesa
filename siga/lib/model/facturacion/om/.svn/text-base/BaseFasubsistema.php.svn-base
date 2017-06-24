<?php


abstract class BaseFasubsistema extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsub;


	
	protected $nomsub;


	
	protected $id;

	
	protected $collFainstedus;

	
	protected $lastFainsteduCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodsub()
  {

    return trim($this->codsub);

  }
  
  public function getNomsub()
  {

    return trim($this->nomsub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodsub($v)
	{

    if ($this->codsub !== $v) {
        $this->codsub = $v;
        $this->modifiedColumns[] = FasubsistemaPeer::CODSUB;
      }
  
	} 
	
	public function setNomsub($v)
	{

    if ($this->nomsub !== $v) {
        $this->nomsub = $v;
        $this->modifiedColumns[] = FasubsistemaPeer::NOMSUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FasubsistemaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codsub = $rs->getString($startcol + 0);

      $this->nomsub = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fasubsistema object", $e);
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
			$con = Propel::getConnection(FasubsistemaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FasubsistemaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FasubsistemaPeer::DATABASE_NAME);
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
					$pk = FasubsistemaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FasubsistemaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFainstedus !== null) {
				foreach($this->collFainstedus as $referrerFK) {
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


			if (($retval = FasubsistemaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFainstedus !== null) {
					foreach($this->collFainstedus as $referrerFK) {
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
		$pos = FasubsistemaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsub();
				break;
			case 1:
				return $this->getNomsub();
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
		$keys = FasubsistemaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsub(),
			$keys[1] => $this->getNomsub(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FasubsistemaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsub($value);
				break;
			case 1:
				$this->setNomsub($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FasubsistemaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsub($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomsub($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FasubsistemaPeer::DATABASE_NAME);

		if ($this->isColumnModified(FasubsistemaPeer::CODSUB)) $criteria->add(FasubsistemaPeer::CODSUB, $this->codsub);
		if ($this->isColumnModified(FasubsistemaPeer::NOMSUB)) $criteria->add(FasubsistemaPeer::NOMSUB, $this->nomsub);
		if ($this->isColumnModified(FasubsistemaPeer::ID)) $criteria->add(FasubsistemaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FasubsistemaPeer::DATABASE_NAME);

		$criteria->add(FasubsistemaPeer::ID, $this->id);

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

		$copyObj->setCodsub($this->codsub);

		$copyObj->setNomsub($this->nomsub);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFainstedus() as $relObj) {
				$copyObj->addFainstedu($relObj->copy($deepCopy));
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
			self::$peer = new FasubsistemaPeer();
		}
		return self::$peer;
	}

	
	public function initFainstedus()
	{
		if ($this->collFainstedus === null) {
			$this->collFainstedus = array();
		}
	}

	
	public function getFainstedus($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFainsteduPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFainstedus === null) {
			if ($this->isNew()) {
			   $this->collFainstedus = array();
			} else {

				$criteria->add(FainsteduPeer::CODSUB, $this->getCodsub());

				FainsteduPeer::addSelectColumns($criteria);
				$this->collFainstedus = FainsteduPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FainsteduPeer::CODSUB, $this->getCodsub());

				FainsteduPeer::addSelectColumns($criteria);
				if (!isset($this->lastFainsteduCriteria) || !$this->lastFainsteduCriteria->equals($criteria)) {
					$this->collFainstedus = FainsteduPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFainsteduCriteria = $criteria;
		return $this->collFainstedus;
	}

	
	public function countFainstedus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFainsteduPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FainsteduPeer::CODSUB, $this->getCodsub());

		return FainsteduPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFainstedu(Fainstedu $l)
	{
		$this->collFainstedus[] = $l;
		$l->setFasubsistema($this);
	}


	
	public function getFainstedusJoinFadependencia($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFainsteduPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFainstedus === null) {
			if ($this->isNew()) {
				$this->collFainstedus = array();
			} else {

				$criteria->add(FainsteduPeer::CODSUB, $this->getCodsub());

				$this->collFainstedus = FainsteduPeer::doSelectJoinFadependencia($criteria, $con);
			}
		} else {
									
			$criteria->add(FainsteduPeer::CODSUB, $this->getCodsub());

			if (!isset($this->lastFainsteduCriteria) || !$this->lastFainsteduCriteria->equals($criteria)) {
				$this->collFainstedus = FainsteduPeer::doSelectJoinFadependencia($criteria, $con);
			}
		}
		$this->lastFainsteduCriteria = $criteria;

		return $this->collFainstedus;
	}

} 