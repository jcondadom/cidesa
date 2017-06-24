<?php


abstract class BaseTsdefmon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmon;


	
	protected $nommon;


	
	protected $aumdis;


	
	protected $id;

	
	protected $collOpordpags;

	
	protected $lastOpordpagCriteria = null;

	
	protected $collTscheemis;

	
	protected $lastTscheemiCriteria = null;

	
	protected $collTsmovlibs;

	
	protected $lastTsmovlibCriteria = null;

	
	protected $collCasolarts;

	
	protected $lastCasolartCriteria = null;

	
	protected $collCaordcoms;

	
	protected $lastCaordcomCriteria = null;

	
	protected $collCacotizas;

	
	protected $lastCacotizaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getNommon()
  {

    return trim($this->nommon);

  }
  
  public function getAumdis()
  {

    return trim($this->aumdis);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = TsdefmonPeer::CODMON;
      }
  
	} 
	
	public function setNommon($v)
	{

    if ($this->nommon !== $v) {
        $this->nommon = $v;
        $this->modifiedColumns[] = TsdefmonPeer::NOMMON;
      }
  
	} 
	
	public function setAumdis($v)
	{

    if ($this->aumdis !== $v) {
        $this->aumdis = $v;
        $this->modifiedColumns[] = TsdefmonPeer::AUMDIS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsdefmonPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codmon = $rs->getString($startcol + 0);

      $this->nommon = $rs->getString($startcol + 1);

      $this->aumdis = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsdefmon object", $e);
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

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsdefmonPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdefmonPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdefmonPeer::DATABASE_NAME);
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
					$pk = TsdefmonPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsdefmonPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collOpordpags !== null) {
				foreach($this->collOpordpags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTscheemis !== null) {
				foreach($this->collTscheemis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTsmovlibs !== null) {
				foreach($this->collTsmovlibs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCasolarts !== null) {
				foreach($this->collCasolarts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCaordcoms !== null) {
				foreach($this->collCaordcoms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCacotizas !== null) {
				foreach($this->collCacotizas as $referrerFK) {
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


			if (($retval = TsdefmonPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOpordpags !== null) {
					foreach($this->collOpordpags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTscheemis !== null) {
					foreach($this->collTscheemis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTsmovlibs !== null) {
					foreach($this->collTsmovlibs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCasolarts !== null) {
					foreach($this->collCasolarts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCaordcoms !== null) {
					foreach($this->collCaordcoms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCacotizas !== null) {
					foreach($this->collCacotizas as $referrerFK) {
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
		$pos = TsdefmonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmon();
				break;
			case 1:
				return $this->getNommon();
				break;
			case 2:
				return $this->getAumdis();
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
		$keys = TsdefmonPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmon(),
			$keys[1] => $this->getNommon(),
			$keys[2] => $this->getAumdis(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefmonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmon($value);
				break;
			case 1:
				$this->setNommon($value);
				break;
			case 2:
				$this->setAumdis($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdefmonPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNommon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAumdis($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdefmonPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdefmonPeer::CODMON)) $criteria->add(TsdefmonPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(TsdefmonPeer::NOMMON)) $criteria->add(TsdefmonPeer::NOMMON, $this->nommon);
		if ($this->isColumnModified(TsdefmonPeer::AUMDIS)) $criteria->add(TsdefmonPeer::AUMDIS, $this->aumdis);
		if ($this->isColumnModified(TsdefmonPeer::ID)) $criteria->add(TsdefmonPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdefmonPeer::DATABASE_NAME);

		$criteria->add(TsdefmonPeer::ID, $this->id);

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

		$copyObj->setCodmon($this->codmon);

		$copyObj->setNommon($this->nommon);

		$copyObj->setAumdis($this->aumdis);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getOpordpags() as $relObj) {
				$copyObj->addOpordpag($relObj->copy($deepCopy));
			}

			foreach($this->getTscheemis() as $relObj) {
				$copyObj->addTscheemi($relObj->copy($deepCopy));
			}

			foreach($this->getTsmovlibs() as $relObj) {
				$copyObj->addTsmovlib($relObj->copy($deepCopy));
			}

			foreach($this->getCasolarts() as $relObj) {
				$copyObj->addCasolart($relObj->copy($deepCopy));
			}

			foreach($this->getCaordcoms() as $relObj) {
				$copyObj->addCaordcom($relObj->copy($deepCopy));
			}

			foreach($this->getCacotizas() as $relObj) {
				$copyObj->addCacotiza($relObj->copy($deepCopy));
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
			self::$peer = new TsdefmonPeer();
		}
		return self::$peer;
	}

	
	public function initOpordpags()
	{
		if ($this->collOpordpags === null) {
			$this->collOpordpags = array();
		}
	}

	
	public function getOpordpags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOpordpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOpordpags === null) {
			if ($this->isNew()) {
			   $this->collOpordpags = array();
			} else {

				$criteria->add(OpordpagPeer::CODMON, $this->getCodmon());

				OpordpagPeer::addSelectColumns($criteria);
				$this->collOpordpags = OpordpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OpordpagPeer::CODMON, $this->getCodmon());

				OpordpagPeer::addSelectColumns($criteria);
				if (!isset($this->lastOpordpagCriteria) || !$this->lastOpordpagCriteria->equals($criteria)) {
					$this->collOpordpags = OpordpagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOpordpagCriteria = $criteria;
		return $this->collOpordpags;
	}

	
	public function countOpordpags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseOpordpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OpordpagPeer::CODMON, $this->getCodmon());

		return OpordpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOpordpag(Opordpag $l)
	{
		$this->collOpordpags[] = $l;
		$l->setTsdefmon($this);
	}


	
	public function getOpordpagsJoinOpbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOpordpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOpordpags === null) {
			if ($this->isNew()) {
				$this->collOpordpags = array();
			} else {

				$criteria->add(OpordpagPeer::CODMON, $this->getCodmon());

				$this->collOpordpags = OpordpagPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(OpordpagPeer::CODMON, $this->getCodmon());

			if (!isset($this->lastOpordpagCriteria) || !$this->lastOpordpagCriteria->equals($criteria)) {
				$this->collOpordpags = OpordpagPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		}
		$this->lastOpordpagCriteria = $criteria;

		return $this->collOpordpags;
	}

	
	public function initTscheemis()
	{
		if ($this->collTscheemis === null) {
			$this->collTscheemis = array();
		}
	}

	
	public function getTscheemis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTscheemiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTscheemis === null) {
			if ($this->isNew()) {
			   $this->collTscheemis = array();
			} else {

				$criteria->add(TscheemiPeer::CODMON, $this->getCodmon());

				TscheemiPeer::addSelectColumns($criteria);
				$this->collTscheemis = TscheemiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TscheemiPeer::CODMON, $this->getCodmon());

				TscheemiPeer::addSelectColumns($criteria);
				if (!isset($this->lastTscheemiCriteria) || !$this->lastTscheemiCriteria->equals($criteria)) {
					$this->collTscheemis = TscheemiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTscheemiCriteria = $criteria;
		return $this->collTscheemis;
	}

	
	public function countTscheemis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTscheemiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TscheemiPeer::CODMON, $this->getCodmon());

		return TscheemiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTscheemi(Tscheemi $l)
	{
		$this->collTscheemis[] = $l;
		$l->setTsdefmon($this);
	}

	
	public function initTsmovlibs()
	{
		if ($this->collTsmovlibs === null) {
			$this->collTsmovlibs = array();
		}
	}

	
	public function getTsmovlibs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovlibPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovlibs === null) {
			if ($this->isNew()) {
			   $this->collTsmovlibs = array();
			} else {

				$criteria->add(TsmovlibPeer::CODMON, $this->getCodmon());

				TsmovlibPeer::addSelectColumns($criteria);
				$this->collTsmovlibs = TsmovlibPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TsmovlibPeer::CODMON, $this->getCodmon());

				TsmovlibPeer::addSelectColumns($criteria);
				if (!isset($this->lastTsmovlibCriteria) || !$this->lastTsmovlibCriteria->equals($criteria)) {
					$this->collTsmovlibs = TsmovlibPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTsmovlibCriteria = $criteria;
		return $this->collTsmovlibs;
	}

	
	public function countTsmovlibs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovlibPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TsmovlibPeer::CODMON, $this->getCodmon());

		return TsmovlibPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTsmovlib(Tsmovlib $l)
	{
		$this->collTsmovlibs[] = $l;
		$l->setTsdefmon($this);
	}


	
	public function getTsmovlibsJoinTsdefban($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovlibPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovlibs === null) {
			if ($this->isNew()) {
				$this->collTsmovlibs = array();
			} else {

				$criteria->add(TsmovlibPeer::CODMON, $this->getCodmon());

				$this->collTsmovlibs = TsmovlibPeer::doSelectJoinTsdefban($criteria, $con);
			}
		} else {
									
			$criteria->add(TsmovlibPeer::CODMON, $this->getCodmon());

			if (!isset($this->lastTsmovlibCriteria) || !$this->lastTsmovlibCriteria->equals($criteria)) {
				$this->collTsmovlibs = TsmovlibPeer::doSelectJoinTsdefban($criteria, $con);
			}
		}
		$this->lastTsmovlibCriteria = $criteria;

		return $this->collTsmovlibs;
	}


	
	public function getTsmovlibsJoinTstipmov($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsmovlibPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsmovlibs === null) {
			if ($this->isNew()) {
				$this->collTsmovlibs = array();
			} else {

				$criteria->add(TsmovlibPeer::CODMON, $this->getCodmon());

				$this->collTsmovlibs = TsmovlibPeer::doSelectJoinTstipmov($criteria, $con);
			}
		} else {
									
			$criteria->add(TsmovlibPeer::CODMON, $this->getCodmon());

			if (!isset($this->lastTsmovlibCriteria) || !$this->lastTsmovlibCriteria->equals($criteria)) {
				$this->collTsmovlibs = TsmovlibPeer::doSelectJoinTstipmov($criteria, $con);
			}
		}
		$this->lastTsmovlibCriteria = $criteria;

		return $this->collTsmovlibs;
	}

	
	public function initCasolarts()
	{
		if ($this->collCasolarts === null) {
			$this->collCasolarts = array();
		}
	}

	
	public function getCasolarts($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCasolartPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCasolarts === null) {
			if ($this->isNew()) {
			   $this->collCasolarts = array();
			} else {

				$criteria->add(CasolartPeer::TIPMON, $this->getCodmon());

				CasolartPeer::addSelectColumns($criteria);
				$this->collCasolarts = CasolartPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CasolartPeer::TIPMON, $this->getCodmon());

				CasolartPeer::addSelectColumns($criteria);
				if (!isset($this->lastCasolartCriteria) || !$this->lastCasolartCriteria->equals($criteria)) {
					$this->collCasolarts = CasolartPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCasolartCriteria = $criteria;
		return $this->collCasolarts;
	}

	
	public function countCasolarts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCasolartPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CasolartPeer::TIPMON, $this->getCodmon());

		return CasolartPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCasolart(Casolart $l)
	{
		$this->collCasolarts[] = $l;
		$l->setTsdefmon($this);
	}

	
	public function initCaordcoms()
	{
		if ($this->collCaordcoms === null) {
			$this->collCaordcoms = array();
		}
	}

	
	public function getCaordcoms($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
			   $this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

				CaordcomPeer::addSelectColumns($criteria);
				$this->collCaordcoms = CaordcomPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

				CaordcomPeer::addSelectColumns($criteria);
				if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
					$this->collCaordcoms = CaordcomPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCaordcomCriteria = $criteria;
		return $this->collCaordcoms;
	}

	
	public function countCaordcoms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

		return CaordcomPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCaordcom(Caordcom $l)
	{
		$this->collCaordcoms[] = $l;
		$l->setTsdefmon($this);
	}


	
	public function getCaordcomsJoinCaprovee($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
				$this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaprovee($criteria, $con);
			}
		} else {
									
			$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

			if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaprovee($criteria, $con);
			}
		}
		$this->lastCaordcomCriteria = $criteria;

		return $this->collCaordcoms;
	}


	
	public function getCaordcomsJoinCaconpag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
				$this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaconpag($criteria, $con);
			}
		} else {
									
			$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

			if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaconpag($criteria, $con);
			}
		}
		$this->lastCaordcomCriteria = $criteria;

		return $this->collCaordcoms;
	}


	
	public function getCaordcomsJoinCaforent($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
				$this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaforent($criteria, $con);
			}
		} else {
									
			$criteria->add(CaordcomPeer::TIPMON, $this->getCodmon());

			if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaforent($criteria, $con);
			}
		}
		$this->lastCaordcomCriteria = $criteria;

		return $this->collCaordcoms;
	}

	
	public function initCacotizas()
	{
		if ($this->collCacotizas === null) {
			$this->collCacotizas = array();
		}
	}

	
	public function getCacotizas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCacotizaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCacotizas === null) {
			if ($this->isNew()) {
			   $this->collCacotizas = array();
			} else {

				$criteria->add(CacotizaPeer::TIPMON, $this->getCodmon());

				CacotizaPeer::addSelectColumns($criteria);
				$this->collCacotizas = CacotizaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CacotizaPeer::TIPMON, $this->getCodmon());

				CacotizaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCacotizaCriteria) || !$this->lastCacotizaCriteria->equals($criteria)) {
					$this->collCacotizas = CacotizaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCacotizaCriteria = $criteria;
		return $this->collCacotizas;
	}

	
	public function countCacotizas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCacotizaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CacotizaPeer::TIPMON, $this->getCodmon());

		return CacotizaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCacotiza(Cacotiza $l)
	{
		$this->collCacotizas[] = $l;
		$l->setTsdefmon($this);
	}


	
	public function getCacotizasJoinCaprovee($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCacotizaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCacotizas === null) {
			if ($this->isNew()) {
				$this->collCacotizas = array();
			} else {

				$criteria->add(CacotizaPeer::TIPMON, $this->getCodmon());

				$this->collCacotizas = CacotizaPeer::doSelectJoinCaprovee($criteria, $con);
			}
		} else {
									
			$criteria->add(CacotizaPeer::TIPMON, $this->getCodmon());

			if (!isset($this->lastCacotizaCriteria) || !$this->lastCacotizaCriteria->equals($criteria)) {
				$this->collCacotizas = CacotizaPeer::doSelectJoinCaprovee($criteria, $con);
			}
		}
		$this->lastCacotizaCriteria = $criteria;

		return $this->collCacotizas;
	}

} 