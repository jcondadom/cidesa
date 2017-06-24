<?php


abstract class BaseViaestado extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codest;


	
	protected $nomest;


	
	protected $codpai;


	
	protected $id;

	
	protected $collViamunicips;

	
	protected $lastViamunicipCriteria = null;

	
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
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = ViaestadoPeer::CODEST;
      }
  
	} 
	
	public function setNomest($v)
	{

    if ($this->nomest !== $v) {
        $this->nomest = $v;
        $this->modifiedColumns[] = ViaestadoPeer::NOMEST;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = ViaestadoPeer::CODPAI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViaestadoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codest = $rs->getString($startcol + 0);

      $this->nomest = $rs->getString($startcol + 1);

      $this->codpai = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viaestado object", $e);
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
			$con = Propel::getConnection(ViaestadoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViaestadoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViaestadoPeer::DATABASE_NAME);
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
					$pk = ViaestadoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViaestadoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collViamunicips !== null) {
				foreach($this->collViamunicips as $referrerFK) {
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


			if (($retval = ViaestadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collViamunicips !== null) {
					foreach($this->collViamunicips as $referrerFK) {
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
		$pos = ViaestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodpai();
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
		$keys = ViaestadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodest(),
			$keys[1] => $this->getNomest(),
			$keys[2] => $this->getCodpai(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViaestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodpai($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViaestadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodest($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomest($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpai($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViaestadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViaestadoPeer::CODEST)) $criteria->add(ViaestadoPeer::CODEST, $this->codest);
		if ($this->isColumnModified(ViaestadoPeer::NOMEST)) $criteria->add(ViaestadoPeer::NOMEST, $this->nomest);
		if ($this->isColumnModified(ViaestadoPeer::CODPAI)) $criteria->add(ViaestadoPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(ViaestadoPeer::ID)) $criteria->add(ViaestadoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViaestadoPeer::DATABASE_NAME);

		$criteria->add(ViaestadoPeer::ID, $this->id);

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

		$copyObj->setCodpai($this->codpai);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getViamunicips() as $relObj) {
				$copyObj->addViamunicip($relObj->copy($deepCopy));
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
			self::$peer = new ViaestadoPeer();
		}
		return self::$peer;
	}

	
	public function initViamunicips()
	{
		if ($this->collViamunicips === null) {
			$this->collViamunicips = array();
		}
	}

	
	public function getViamunicips($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseViamunicipPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collViamunicips === null) {
			if ($this->isNew()) {
			   $this->collViamunicips = array();
			} else {

				$criteria->add(ViamunicipPeer::VIAESTADO_CODEST, $this->getCodest());

				ViamunicipPeer::addSelectColumns($criteria);
				$this->collViamunicips = ViamunicipPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ViamunicipPeer::VIAESTADO_CODEST, $this->getCodest());

				ViamunicipPeer::addSelectColumns($criteria);
				if (!isset($this->lastViamunicipCriteria) || !$this->lastViamunicipCriteria->equals($criteria)) {
					$this->collViamunicips = ViamunicipPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastViamunicipCriteria = $criteria;
		return $this->collViamunicips;
	}

	
	public function countViamunicips($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseViamunicipPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ViamunicipPeer::VIAESTADO_CODEST, $this->getCodest());

		return ViamunicipPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addViamunicip(Viamunicip $l)
	{
		$this->collViamunicips[] = $l;
		$l->setViaestado($this);
	}

} 