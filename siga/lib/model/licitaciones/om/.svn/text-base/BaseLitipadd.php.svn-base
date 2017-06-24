<?php


abstract class BaseLitipadd extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipadd;


	
	protected $nomtipadd;


	
	protected $dettipadd;


	
	protected $id;

	
	protected $collLiaddendums;

	
	protected $lastLiaddendumCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtipadd()
  {

    return trim($this->codtipadd);

  }
  
  public function getNomtipadd()
  {

    return trim($this->nomtipadd);

  }
  
  public function getDettipadd()
  {

    return trim($this->dettipadd);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtipadd($v)
	{

    if ($this->codtipadd !== $v) {
        $this->codtipadd = $v;
        $this->modifiedColumns[] = LitipaddPeer::CODTIPADD;
      }
  
	} 
	
	public function setNomtipadd($v)
	{

    if ($this->nomtipadd !== $v) {
        $this->nomtipadd = $v;
        $this->modifiedColumns[] = LitipaddPeer::NOMTIPADD;
      }
  
	} 
	
	public function setDettipadd($v)
	{

    if ($this->dettipadd !== $v) {
        $this->dettipadd = $v;
        $this->modifiedColumns[] = LitipaddPeer::DETTIPADD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LitipaddPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtipadd = $rs->getString($startcol + 0);

      $this->nomtipadd = $rs->getString($startcol + 1);

      $this->dettipadd = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Litipadd object", $e);
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
			$con = Propel::getConnection(LitipaddPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LitipaddPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LitipaddPeer::DATABASE_NAME);
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
					$pk = LitipaddPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LitipaddPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiaddendums !== null) {
				foreach($this->collLiaddendums as $referrerFK) {
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


			if (($retval = LitipaddPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiaddendums !== null) {
					foreach($this->collLiaddendums as $referrerFK) {
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
		$pos = LitipaddPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipadd();
				break;
			case 1:
				return $this->getNomtipadd();
				break;
			case 2:
				return $this->getDettipadd();
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
		$keys = LitipaddPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipadd(),
			$keys[1] => $this->getNomtipadd(),
			$keys[2] => $this->getDettipadd(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LitipaddPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipadd($value);
				break;
			case 1:
				$this->setNomtipadd($value);
				break;
			case 2:
				$this->setDettipadd($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LitipaddPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipadd($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtipadd($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDettipadd($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LitipaddPeer::DATABASE_NAME);

		if ($this->isColumnModified(LitipaddPeer::CODTIPADD)) $criteria->add(LitipaddPeer::CODTIPADD, $this->codtipadd);
		if ($this->isColumnModified(LitipaddPeer::NOMTIPADD)) $criteria->add(LitipaddPeer::NOMTIPADD, $this->nomtipadd);
		if ($this->isColumnModified(LitipaddPeer::DETTIPADD)) $criteria->add(LitipaddPeer::DETTIPADD, $this->dettipadd);
		if ($this->isColumnModified(LitipaddPeer::ID)) $criteria->add(LitipaddPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LitipaddPeer::DATABASE_NAME);

		$criteria->add(LitipaddPeer::ID, $this->id);

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

		$copyObj->setCodtipadd($this->codtipadd);

		$copyObj->setNomtipadd($this->nomtipadd);

		$copyObj->setDettipadd($this->dettipadd);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiaddendums() as $relObj) {
				$copyObj->addLiaddendum($relObj->copy($deepCopy));
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
			self::$peer = new LitipaddPeer();
		}
		return self::$peer;
	}

	
	public function initLiaddendums()
	{
		if ($this->collLiaddendums === null) {
			$this->collLiaddendums = array();
		}
	}

	
	public function getLiaddendums($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
			   $this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

				LiaddendumPeer::addSelectColumns($criteria);
				$this->collLiaddendums = LiaddendumPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

				LiaddendumPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
					$this->collLiaddendums = LiaddendumPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiaddendumCriteria = $criteria;
		return $this->collLiaddendums;
	}

	
	public function countLiaddendums($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

		return LiaddendumPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiaddendum(Liaddendum $l)
	{
		$this->collLiaddendums[] = $l;
		$l->setLitipadd($this);
	}


	
	public function getLiaddendumsJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
				$this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}


	
	public function getLiaddendumsJoinLitipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
				$this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLitipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLitipmod($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}


	
	public function getLiaddendumsJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
				$this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}


	
	public function getLiaddendumsJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
				$this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}


	
	public function getLiaddendumsJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
				$this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::TIPADD, $this->getCodtipadd());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}

} 