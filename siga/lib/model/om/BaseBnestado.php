<?php


abstract class BaseBnestado extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codest;


	
	protected $nomest;


	
	protected $id;

	
	protected $collBnmunicips;

	
	protected $lastBnmunicipCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getNomest()
  {

    return trim($this->nomest);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = strtoupper($v);
        $this->modifiedColumns[] = BnestadoPeer::CODEST;
      }
  
	} 
	
	public function setNomest($v)
	{

    if ($this->nomest !== $v) {
        $this->nomest = strtoupper($v);
        $this->modifiedColumns[] = BnestadoPeer::NOMEST;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnestadoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codest = $rs->getString($startcol + 0);

      $this->nomest = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnestado object", $e);
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
			$con = Propel::getConnection(BnestadoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnestadoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnestadoPeer::DATABASE_NAME);
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
					$pk = BnestadoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnestadoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collBnmunicips !== null) {
				foreach($this->collBnmunicips as $referrerFK) {
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


			if (($retval = BnestadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collBnmunicips !== null) {
					foreach($this->collBnmunicips as $referrerFK) {
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
		$pos = BnestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodest();
				break;
			case 1:
				return $this->getNomest();
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
		$keys = BnestadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodest(),
			$keys[1] => $this->getNomest(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodest($value);
				break;
			case 1:
				$this->setNomest($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnestadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodest($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomest($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnestadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnestadoPeer::CODEST)) $criteria->add(BnestadoPeer::CODEST, $this->codest);
		if ($this->isColumnModified(BnestadoPeer::NOMEST)) $criteria->add(BnestadoPeer::NOMEST, $this->nomest);
		if ($this->isColumnModified(BnestadoPeer::ID)) $criteria->add(BnestadoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnestadoPeer::DATABASE_NAME);

		$criteria->add(BnestadoPeer::ID, $this->id);

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

		$copyObj->setCodest($this->codest);

		$copyObj->setNomest($this->nomest);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getBnmunicips() as $relObj) {
				$copyObj->addBnmunicip($relObj->copy($deepCopy));
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
			self::$peer = new BnestadoPeer();
		}
		return self::$peer;
	}

	
	public function initBnmunicips()
	{
		if ($this->collBnmunicips === null) {
			$this->collBnmunicips = array();
		}
	}

	
	public function getBnmunicips($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseBnmunicipPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collBnmunicips === null) {
			if ($this->isNew()) {
			   $this->collBnmunicips = array();
			} else {

				$criteria->add(BnmunicipPeer::BNESTADO_CODEST, $this->getCodest());

				BnmunicipPeer::addSelectColumns($criteria);
				$this->collBnmunicips = BnmunicipPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(BnmunicipPeer::BNESTADO_CODEST, $this->getCodest());

				BnmunicipPeer::addSelectColumns($criteria);
				if (!isset($this->lastBnmunicipCriteria) || !$this->lastBnmunicipCriteria->equals($criteria)) {
					$this->collBnmunicips = BnmunicipPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastBnmunicipCriteria = $criteria;
		return $this->collBnmunicips;
	}

	
	public function countBnmunicips($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseBnmunicipPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(BnmunicipPeer::BNESTADO_CODEST, $this->getCodest());

		return BnmunicipPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addBnmunicip(Bnmunicip $l)
	{
		$this->collBnmunicips[] = $l;
		$l->setBnestado($this);
	}

} 