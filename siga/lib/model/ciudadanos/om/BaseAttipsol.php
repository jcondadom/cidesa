<?php


abstract class BaseAttipsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipsol;


	
	protected $destipsol;


	
	protected $id;

	
	protected $collAtdenunciass;

	
	protected $lastAtdenunciasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtipsol()
  {

    return trim($this->codtipsol);

  }
  
  public function getDestipsol()
  {

    return trim($this->destipsol);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtipsol($v)
	{

    if ($this->codtipsol !== $v) {
        $this->codtipsol = $v;
        $this->modifiedColumns[] = AttipsolPeer::CODTIPSOL;
      }
  
	} 
	
	public function setDestipsol($v)
	{

    if ($this->destipsol !== $v) {
        $this->destipsol = $v;
        $this->modifiedColumns[] = AttipsolPeer::DESTIPSOL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AttipsolPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtipsol = $rs->getString($startcol + 0);

      $this->destipsol = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Attipsol object", $e);
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
			$con = Propel::getConnection(AttipsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AttipsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AttipsolPeer::DATABASE_NAME);
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
					$pk = AttipsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AttipsolPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtdenunciass !== null) {
				foreach($this->collAtdenunciass as $referrerFK) {
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


			if (($retval = AttipsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtdenunciass !== null) {
					foreach($this->collAtdenunciass as $referrerFK) {
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
		$pos = AttipsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipsol();
				break;
			case 1:
				return $this->getDestipsol();
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
		$keys = AttipsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipsol(),
			$keys[1] => $this->getDestipsol(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AttipsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipsol($value);
				break;
			case 1:
				$this->setDestipsol($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AttipsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestipsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AttipsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(AttipsolPeer::CODTIPSOL)) $criteria->add(AttipsolPeer::CODTIPSOL, $this->codtipsol);
		if ($this->isColumnModified(AttipsolPeer::DESTIPSOL)) $criteria->add(AttipsolPeer::DESTIPSOL, $this->destipsol);
		if ($this->isColumnModified(AttipsolPeer::ID)) $criteria->add(AttipsolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AttipsolPeer::DATABASE_NAME);

		$criteria->add(AttipsolPeer::ID, $this->id);

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

		$copyObj->setCodtipsol($this->codtipsol);

		$copyObj->setDestipsol($this->destipsol);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtdenunciass() as $relObj) {
				$copyObj->addAtdenuncias($relObj->copy($deepCopy));
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
			self::$peer = new AttipsolPeer();
		}
		return self::$peer;
	}

	
	public function initAtdenunciass()
	{
		if ($this->collAtdenunciass === null) {
			$this->collAtdenunciass = array();
		}
	}

	
	public function getAtdenunciass($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdenunciass === null) {
			if ($this->isNew()) {
			   $this->collAtdenunciass = array();
			} else {

				$criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->getId());

				AtdenunciasPeer::addSelectColumns($criteria);
				$this->collAtdenunciass = AtdenunciasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->getId());

				AtdenunciasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
					$this->collAtdenunciass = AtdenunciasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;
		return $this->collAtdenunciass;
	}

	
	public function countAtdenunciass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->getId());

		return AtdenunciasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdenuncias(Atdenuncias $l)
	{
		$this->collAtdenunciass[] = $l;
		$l->setAttipsol($this);
	}


	
	public function getAtdenunciassJoinAtciudadano($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdenunciass === null) {
			if ($this->isNew()) {
				$this->collAtdenunciass = array();
			} else {

				$criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtciudadano($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->getId());

			if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtciudadano($criteria, $con);
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;

		return $this->collAtdenunciass;
	}


	
	public function getAtdenunciassJoinAtunidades($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdenunciass === null) {
			if ($this->isNew()) {
				$this->collAtdenunciass = array();
			} else {

				$criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtunidades($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->getId());

			if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtunidades($criteria, $con);
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;

		return $this->collAtdenunciass;
	}


	
	public function getAtdenunciassJoinAtinsrefier($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdenunciass === null) {
			if ($this->isNew()) {
				$this->collAtdenunciass = array();
			} else {

				$criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtinsrefier($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->getId());

			if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtinsrefier($criteria, $con);
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;

		return $this->collAtdenunciass;
	}


	
	public function getAtdenunciassJoinAtestayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdenunciass === null) {
			if ($this->isNew()) {
				$this->collAtdenunciass = array();
			} else {

				$criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->getId());

			if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;

		return $this->collAtdenunciass;
	}

} 