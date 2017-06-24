<?php


abstract class BaseLitipmod extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipmod;


	
	protected $nomtipmod;


	
	protected $dettipmod;


	
	protected $tipo;


	
	protected $id;

	
	protected $collLimodcontsRelatedByTipmod;

	
	protected $lastLimodcontRelatedByTipmodCriteria = null;

	
	protected $collLimodcontsRelatedByCodtipmod;

	
	protected $lastLimodcontRelatedByCodtipmodCriteria = null;

	
	protected $collLiaddendums;

	
	protected $lastLiaddendumCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtipmod()
  {

    return trim($this->codtipmod);

  }
  
  public function getNomtipmod()
  {

    return trim($this->nomtipmod);

  }
  
  public function getDettipmod()
  {

    return trim($this->dettipmod);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtipmod($v)
	{

    if ($this->codtipmod !== $v) {
        $this->codtipmod = $v;
        $this->modifiedColumns[] = LitipmodPeer::CODTIPMOD;
      }
  
	} 
	
	public function setNomtipmod($v)
	{

    if ($this->nomtipmod !== $v) {
        $this->nomtipmod = $v;
        $this->modifiedColumns[] = LitipmodPeer::NOMTIPMOD;
      }
  
	} 
	
	public function setDettipmod($v)
	{

    if ($this->dettipmod !== $v) {
        $this->dettipmod = $v;
        $this->modifiedColumns[] = LitipmodPeer::DETTIPMOD;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = LitipmodPeer::TIPO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LitipmodPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtipmod = $rs->getString($startcol + 0);

      $this->nomtipmod = $rs->getString($startcol + 1);

      $this->dettipmod = $rs->getString($startcol + 2);

      $this->tipo = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Litipmod object", $e);
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
			$con = Propel::getConnection(LitipmodPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LitipmodPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LitipmodPeer::DATABASE_NAME);
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
					$pk = LitipmodPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LitipmodPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLimodcontsRelatedByTipmod !== null) {
				foreach($this->collLimodcontsRelatedByTipmod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLimodcontsRelatedByCodtipmod !== null) {
				foreach($this->collLimodcontsRelatedByCodtipmod as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = LitipmodPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLimodcontsRelatedByTipmod !== null) {
					foreach($this->collLimodcontsRelatedByTipmod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLimodcontsRelatedByCodtipmod !== null) {
					foreach($this->collLimodcontsRelatedByCodtipmod as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = LitipmodPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipmod();
				break;
			case 1:
				return $this->getNomtipmod();
				break;
			case 2:
				return $this->getDettipmod();
				break;
			case 3:
				return $this->getTipo();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LitipmodPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipmod(),
			$keys[1] => $this->getNomtipmod(),
			$keys[2] => $this->getDettipmod(),
			$keys[3] => $this->getTipo(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LitipmodPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipmod($value);
				break;
			case 1:
				$this->setNomtipmod($value);
				break;
			case 2:
				$this->setDettipmod($value);
				break;
			case 3:
				$this->setTipo($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LitipmodPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipmod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtipmod($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDettipmod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LitipmodPeer::DATABASE_NAME);

		if ($this->isColumnModified(LitipmodPeer::CODTIPMOD)) $criteria->add(LitipmodPeer::CODTIPMOD, $this->codtipmod);
		if ($this->isColumnModified(LitipmodPeer::NOMTIPMOD)) $criteria->add(LitipmodPeer::NOMTIPMOD, $this->nomtipmod);
		if ($this->isColumnModified(LitipmodPeer::DETTIPMOD)) $criteria->add(LitipmodPeer::DETTIPMOD, $this->dettipmod);
		if ($this->isColumnModified(LitipmodPeer::TIPO)) $criteria->add(LitipmodPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(LitipmodPeer::ID)) $criteria->add(LitipmodPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LitipmodPeer::DATABASE_NAME);

		$criteria->add(LitipmodPeer::ID, $this->id);

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

		$copyObj->setCodtipmod($this->codtipmod);

		$copyObj->setNomtipmod($this->nomtipmod);

		$copyObj->setDettipmod($this->dettipmod);

		$copyObj->setTipo($this->tipo);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLimodcontsRelatedByTipmod() as $relObj) {
				$copyObj->addLimodcontRelatedByTipmod($relObj->copy($deepCopy));
			}

			foreach($this->getLimodcontsRelatedByCodtipmod() as $relObj) {
				$copyObj->addLimodcontRelatedByCodtipmod($relObj->copy($deepCopy));
			}

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
			self::$peer = new LitipmodPeer();
		}
		return self::$peer;
	}

	
	public function initLimodcontsRelatedByTipmod()
	{
		if ($this->collLimodcontsRelatedByTipmod === null) {
			$this->collLimodcontsRelatedByTipmod = array();
		}
	}

	
	public function getLimodcontsRelatedByTipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByTipmod === null) {
			if ($this->isNew()) {
			   $this->collLimodcontsRelatedByTipmod = array();
			} else {

				$criteria->add(LimodcontPeer::TIPMOD, $this->getCodtipmod());

				LimodcontPeer::addSelectColumns($criteria);
				$this->collLimodcontsRelatedByTipmod = LimodcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LimodcontPeer::TIPMOD, $this->getCodtipmod());

				LimodcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLimodcontRelatedByTipmodCriteria) || !$this->lastLimodcontRelatedByTipmodCriteria->equals($criteria)) {
					$this->collLimodcontsRelatedByTipmod = LimodcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLimodcontRelatedByTipmodCriteria = $criteria;
		return $this->collLimodcontsRelatedByTipmod;
	}

	
	public function countLimodcontsRelatedByTipmod($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LimodcontPeer::TIPMOD, $this->getCodtipmod());

		return LimodcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLimodcontRelatedByTipmod(Limodcont $l)
	{
		$this->collLimodcontsRelatedByTipmod[] = $l;
		$l->setLitipmodRelatedByTipmod($this);
	}


	
	public function getLimodcontsRelatedByTipmodJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByTipmod === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByTipmod = array();
			} else {

				$criteria->add(LimodcontPeer::TIPMOD, $this->getCodtipmod());

				$this->collLimodcontsRelatedByTipmod = LimodcontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::TIPMOD, $this->getCodtipmod());

			if (!isset($this->lastLimodcontRelatedByTipmodCriteria) || !$this->lastLimodcontRelatedByTipmodCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByTipmod = LimodcontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByTipmodCriteria = $criteria;

		return $this->collLimodcontsRelatedByTipmod;
	}


	
	public function getLimodcontsRelatedByTipmodJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByTipmod === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByTipmod = array();
			} else {

				$criteria->add(LimodcontPeer::TIPMOD, $this->getCodtipmod());

				$this->collLimodcontsRelatedByTipmod = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::TIPMOD, $this->getCodtipmod());

			if (!isset($this->lastLimodcontRelatedByTipmodCriteria) || !$this->lastLimodcontRelatedByTipmodCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByTipmod = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByTipmodCriteria = $criteria;

		return $this->collLimodcontsRelatedByTipmod;
	}


	
	public function getLimodcontsRelatedByTipmodJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByTipmod === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByTipmod = array();
			} else {

				$criteria->add(LimodcontPeer::TIPMOD, $this->getCodtipmod());

				$this->collLimodcontsRelatedByTipmod = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::TIPMOD, $this->getCodtipmod());

			if (!isset($this->lastLimodcontRelatedByTipmodCriteria) || !$this->lastLimodcontRelatedByTipmodCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByTipmod = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByTipmodCriteria = $criteria;

		return $this->collLimodcontsRelatedByTipmod;
	}


	
	public function getLimodcontsRelatedByTipmodJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByTipmod === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByTipmod = array();
			} else {

				$criteria->add(LimodcontPeer::TIPMOD, $this->getCodtipmod());

				$this->collLimodcontsRelatedByTipmod = LimodcontPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::TIPMOD, $this->getCodtipmod());

			if (!isset($this->lastLimodcontRelatedByTipmodCriteria) || !$this->lastLimodcontRelatedByTipmodCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByTipmod = LimodcontPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByTipmodCriteria = $criteria;

		return $this->collLimodcontsRelatedByTipmod;
	}

	
	public function initLimodcontsRelatedByCodtipmod()
	{
		if ($this->collLimodcontsRelatedByCodtipmod === null) {
			$this->collLimodcontsRelatedByCodtipmod = array();
		}
	}

	
	public function getLimodcontsRelatedByCodtipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodtipmod === null) {
			if ($this->isNew()) {
			   $this->collLimodcontsRelatedByCodtipmod = array();
			} else {

				$criteria->add(LimodcontPeer::CODTIPMOD, $this->getCodtipmod());

				LimodcontPeer::addSelectColumns($criteria);
				$this->collLimodcontsRelatedByCodtipmod = LimodcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LimodcontPeer::CODTIPMOD, $this->getCodtipmod());

				LimodcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLimodcontRelatedByCodtipmodCriteria) || !$this->lastLimodcontRelatedByCodtipmodCriteria->equals($criteria)) {
					$this->collLimodcontsRelatedByCodtipmod = LimodcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLimodcontRelatedByCodtipmodCriteria = $criteria;
		return $this->collLimodcontsRelatedByCodtipmod;
	}

	
	public function countLimodcontsRelatedByCodtipmod($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LimodcontPeer::CODTIPMOD, $this->getCodtipmod());

		return LimodcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLimodcontRelatedByCodtipmod(Limodcont $l)
	{
		$this->collLimodcontsRelatedByCodtipmod[] = $l;
		$l->setLitipmodRelatedByCodtipmod($this);
	}


	
	public function getLimodcontsRelatedByCodtipmodJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodtipmod === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodtipmod = array();
			} else {

				$criteria->add(LimodcontPeer::CODTIPMOD, $this->getCodtipmod());

				$this->collLimodcontsRelatedByCodtipmod = LimodcontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODTIPMOD, $this->getCodtipmod());

			if (!isset($this->lastLimodcontRelatedByCodtipmodCriteria) || !$this->lastLimodcontRelatedByCodtipmodCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodtipmod = LimodcontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodtipmodCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodtipmod;
	}


	
	public function getLimodcontsRelatedByCodtipmodJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodtipmod === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodtipmod = array();
			} else {

				$criteria->add(LimodcontPeer::CODTIPMOD, $this->getCodtipmod());

				$this->collLimodcontsRelatedByCodtipmod = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODTIPMOD, $this->getCodtipmod());

			if (!isset($this->lastLimodcontRelatedByCodtipmodCriteria) || !$this->lastLimodcontRelatedByCodtipmodCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodtipmod = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodtipmodCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodtipmod;
	}


	
	public function getLimodcontsRelatedByCodtipmodJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodtipmod === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodtipmod = array();
			} else {

				$criteria->add(LimodcontPeer::CODTIPMOD, $this->getCodtipmod());

				$this->collLimodcontsRelatedByCodtipmod = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODTIPMOD, $this->getCodtipmod());

			if (!isset($this->lastLimodcontRelatedByCodtipmodCriteria) || !$this->lastLimodcontRelatedByCodtipmodCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodtipmod = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodtipmodCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodtipmod;
	}


	
	public function getLimodcontsRelatedByCodtipmodJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodtipmod === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodtipmod = array();
			} else {

				$criteria->add(LimodcontPeer::CODTIPMOD, $this->getCodtipmod());

				$this->collLimodcontsRelatedByCodtipmod = LimodcontPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODTIPMOD, $this->getCodtipmod());

			if (!isset($this->lastLimodcontRelatedByCodtipmodCriteria) || !$this->lastLimodcontRelatedByCodtipmodCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodtipmod = LimodcontPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodtipmodCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodtipmod;
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

				$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

				LiaddendumPeer::addSelectColumns($criteria);
				$this->collLiaddendums = LiaddendumPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

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

		$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

		return LiaddendumPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiaddendum(Liaddendum $l)
	{
		$this->collLiaddendums[] = $l;
		$l->setLitipmod($this);
	}


	
	public function getLiaddendumsJoinLitipadd($criteria = null, $con = null)
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

				$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLitipadd($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLitipadd($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
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

				$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLicontrat($criteria, $con);
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

				$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

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

				$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

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

				$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODTIPMOD, $this->getCodtipmod());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}

} 