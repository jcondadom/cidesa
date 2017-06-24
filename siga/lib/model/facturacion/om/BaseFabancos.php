<?php


abstract class BaseFabancos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codban;


	
	protected $nomban;


	
	protected $id;

	
	protected $collFacombans;

	
	protected $lastFacombanCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodban()
  {

    return trim($this->codban);

  }
  
  public function getNomban()
  {

    return trim($this->nomban);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodban($v)
	{

    if ($this->codban !== $v) {
        $this->codban = $v;
        $this->modifiedColumns[] = FabancosPeer::CODBAN;
      }
  
	} 
	
	public function setNomban($v)
	{

    if ($this->nomban !== $v) {
        $this->nomban = $v;
        $this->modifiedColumns[] = FabancosPeer::NOMBAN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FabancosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codban = $rs->getString($startcol + 0);

      $this->nomban = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fabancos object", $e);
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
			$con = Propel::getConnection(FabancosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FabancosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FabancosPeer::DATABASE_NAME);
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
					$pk = FabancosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FabancosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFacombans !== null) {
				foreach($this->collFacombans as $referrerFK) {
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


			if (($retval = FabancosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFacombans !== null) {
					foreach($this->collFacombans as $referrerFK) {
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
		$pos = FabancosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodban();
				break;
			case 1:
				return $this->getNomban();
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
		$keys = FabancosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodban(),
			$keys[1] => $this->getNomban(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FabancosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodban($value);
				break;
			case 1:
				$this->setNomban($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FabancosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodban($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomban($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FabancosPeer::DATABASE_NAME);

		if ($this->isColumnModified(FabancosPeer::CODBAN)) $criteria->add(FabancosPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(FabancosPeer::NOMBAN)) $criteria->add(FabancosPeer::NOMBAN, $this->nomban);
		if ($this->isColumnModified(FabancosPeer::ID)) $criteria->add(FabancosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FabancosPeer::DATABASE_NAME);

		$criteria->add(FabancosPeer::ID, $this->id);

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

		$copyObj->setCodban($this->codban);

		$copyObj->setNomban($this->nomban);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFacombans() as $relObj) {
				$copyObj->addFacomban($relObj->copy($deepCopy));
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
			self::$peer = new FabancosPeer();
		}
		return self::$peer;
	}

	
	public function initFacombans()
	{
		if ($this->collFacombans === null) {
			$this->collFacombans = array();
		}
	}

	
	public function getFacombans($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFacombanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFacombans === null) {
			if ($this->isNew()) {
			   $this->collFacombans = array();
			} else {

				$criteria->add(FacombanPeer::CODBAN_ID, $this->getId());

				FacombanPeer::addSelectColumns($criteria);
				$this->collFacombans = FacombanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FacombanPeer::CODBAN_ID, $this->getId());

				FacombanPeer::addSelectColumns($criteria);
				if (!isset($this->lastFacombanCriteria) || !$this->lastFacombanCriteria->equals($criteria)) {
					$this->collFacombans = FacombanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFacombanCriteria = $criteria;
		return $this->collFacombans;
	}

	
	public function countFacombans($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFacombanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FacombanPeer::CODBAN_ID, $this->getId());

		return FacombanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFacomban(Facomban $l)
	{
		$this->collFacombans[] = $l;
		$l->setFabancos($this);
	}


	
	public function getFacombansJoinFatippag($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFacombanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFacombans === null) {
			if ($this->isNew()) {
				$this->collFacombans = array();
			} else {

				$criteria->add(FacombanPeer::CODBAN_ID, $this->getId());

				$this->collFacombans = FacombanPeer::doSelectJoinFatippag($criteria, $con);
			}
		} else {
									
			$criteria->add(FacombanPeer::CODBAN_ID, $this->getId());

			if (!isset($this->lastFacombanCriteria) || !$this->lastFacombanCriteria->equals($criteria)) {
				$this->collFacombans = FacombanPeer::doSelectJoinFatippag($criteria, $con);
			}
		}
		$this->lastFacombanCriteria = $criteria;

		return $this->collFacombans;
	}

} 