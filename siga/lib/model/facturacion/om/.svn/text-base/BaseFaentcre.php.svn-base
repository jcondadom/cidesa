<?php


abstract class BaseFaentcre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codentcre;


	
	protected $nomentcre;


	
	protected $codzon;


	
	protected $id;

	
	protected $aFadefzon;

	
	protected $collFacarords;

	
	protected $lastFacarordCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodentcre()
  {

    return trim($this->codentcre);

  }
  
  public function getNomentcre()
  {

    return trim($this->nomentcre);

  }
  
  public function getCodzon()
  {

    return trim($this->codzon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodentcre($v)
	{

    if ($this->codentcre !== $v) {
        $this->codentcre = $v;
        $this->modifiedColumns[] = FaentcrePeer::CODENTCRE;
      }
  
	} 
	
	public function setNomentcre($v)
	{

    if ($this->nomentcre !== $v) {
        $this->nomentcre = $v;
        $this->modifiedColumns[] = FaentcrePeer::NOMENTCRE;
      }
  
	} 
	
	public function setCodzon($v)
	{

    if ($this->codzon !== $v) {
        $this->codzon = $v;
        $this->modifiedColumns[] = FaentcrePeer::CODZON;
      }
  
		if ($this->aFadefzon !== null && $this->aFadefzon->getCodzon() !== $v) {
			$this->aFadefzon = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaentcrePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codentcre = $rs->getString($startcol + 0);

      $this->nomentcre = $rs->getString($startcol + 1);

      $this->codzon = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faentcre object", $e);
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
			$con = Propel::getConnection(FaentcrePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaentcrePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaentcrePeer::DATABASE_NAME);
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
					$pk = FaentcrePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaentcrePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFacarords !== null) {
				foreach($this->collFacarords as $referrerFK) {
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


			if (($retval = FaentcrePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFacarords !== null) {
					foreach($this->collFacarords as $referrerFK) {
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
		$pos = FaentcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodentcre();
				break;
			case 1:
				return $this->getNomentcre();
				break;
			case 2:
				return $this->getCodzon();
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
		$keys = FaentcrePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodentcre(),
			$keys[1] => $this->getNomentcre(),
			$keys[2] => $this->getCodzon(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaentcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodentcre($value);
				break;
			case 1:
				$this->setNomentcre($value);
				break;
			case 2:
				$this->setCodzon($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaentcrePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodentcre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomentcre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodzon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaentcrePeer::DATABASE_NAME);

		if ($this->isColumnModified(FaentcrePeer::CODENTCRE)) $criteria->add(FaentcrePeer::CODENTCRE, $this->codentcre);
		if ($this->isColumnModified(FaentcrePeer::NOMENTCRE)) $criteria->add(FaentcrePeer::NOMENTCRE, $this->nomentcre);
		if ($this->isColumnModified(FaentcrePeer::CODZON)) $criteria->add(FaentcrePeer::CODZON, $this->codzon);
		if ($this->isColumnModified(FaentcrePeer::ID)) $criteria->add(FaentcrePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaentcrePeer::DATABASE_NAME);

		$criteria->add(FaentcrePeer::ID, $this->id);

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

		$copyObj->setCodentcre($this->codentcre);

		$copyObj->setNomentcre($this->nomentcre);

		$copyObj->setCodzon($this->codzon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFacarords() as $relObj) {
				$copyObj->addFacarord($relObj->copy($deepCopy));
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
			self::$peer = new FaentcrePeer();
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

	
	public function initFacarords()
	{
		if ($this->collFacarords === null) {
			$this->collFacarords = array();
		}
	}

	
	public function getFacarords($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFacarordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFacarords === null) {
			if ($this->isNew()) {
			   $this->collFacarords = array();
			} else {

				$criteria->add(FacarordPeer::CODENTCRE, $this->getCodentcre());

				FacarordPeer::addSelectColumns($criteria);
				$this->collFacarords = FacarordPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FacarordPeer::CODENTCRE, $this->getCodentcre());

				FacarordPeer::addSelectColumns($criteria);
				if (!isset($this->lastFacarordCriteria) || !$this->lastFacarordCriteria->equals($criteria)) {
					$this->collFacarords = FacarordPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFacarordCriteria = $criteria;
		return $this->collFacarords;
	}

	
	public function countFacarords($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFacarordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FacarordPeer::CODENTCRE, $this->getCodentcre());

		return FacarordPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFacarord(Facarord $l)
	{
		$this->collFacarords[] = $l;
		$l->setFaentcre($this);
	}


	
	public function getFacarordsJoinFaclienteRelatedByCodpro($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFacarordPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFacarords === null) {
			if ($this->isNew()) {
				$this->collFacarords = array();
			} else {

				$criteria->add(FacarordPeer::CODENTCRE, $this->getCodentcre());

				$this->collFacarords = FacarordPeer::doSelectJoinFaclienteRelatedByCodpro($criteria, $con);
			}
		} else {
									
			$criteria->add(FacarordPeer::CODENTCRE, $this->getCodentcre());

			if (!isset($this->lastFacarordCriteria) || !$this->lastFacarordCriteria->equals($criteria)) {
				$this->collFacarords = FacarordPeer::doSelectJoinFaclienteRelatedByCodpro($criteria, $con);
			}
		}
		$this->lastFacarordCriteria = $criteria;

		return $this->collFacarords;
	}

} 