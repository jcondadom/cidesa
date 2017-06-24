<?php


abstract class BaseFatippag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $destippag;


	
	protected $tipcan;


	
	protected $genmov;


	
	protected $gening;


	
	protected $gennotcre;


	
	protected $gendetche;


	
	protected $pagret;


	
	protected $id;

	
	protected $collFacombans;

	
	protected $lastFacombanCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDestippag()
  {

    return trim($this->destippag);

  }
  
  public function getTipcan()
  {

    return trim($this->tipcan);

  }
  
  public function getGenmov()
  {

    return trim($this->genmov);

  }
  
  public function getGening()
  {

    return trim($this->gening);

  }
  
  public function getGennotcre()
  {

    return trim($this->gennotcre);

  }
  
  public function getGendetche()
  {

    return trim($this->gendetche);

  }
  
  public function getPagret()
  {

    return trim($this->pagret);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDestippag($v)
	{

    if ($this->destippag !== $v) {
        $this->destippag = $v;
        $this->modifiedColumns[] = FatippagPeer::DESTIPPAG;
      }
  
	} 
	
	public function setTipcan($v)
	{

    if ($this->tipcan !== $v) {
        $this->tipcan = $v;
        $this->modifiedColumns[] = FatippagPeer::TIPCAN;
      }
  
	} 
	
	public function setGenmov($v)
	{

    if ($this->genmov !== $v) {
        $this->genmov = $v;
        $this->modifiedColumns[] = FatippagPeer::GENMOV;
      }
  
	} 
	
	public function setGening($v)
	{

    if ($this->gening !== $v) {
        $this->gening = $v;
        $this->modifiedColumns[] = FatippagPeer::GENING;
      }
  
	} 
	
	public function setGennotcre($v)
	{

    if ($this->gennotcre !== $v) {
        $this->gennotcre = $v;
        $this->modifiedColumns[] = FatippagPeer::GENNOTCRE;
      }
  
	} 
	
	public function setGendetche($v)
	{

    if ($this->gendetche !== $v) {
        $this->gendetche = $v;
        $this->modifiedColumns[] = FatippagPeer::GENDETCHE;
      }
  
	} 
	
	public function setPagret($v)
	{

    if ($this->pagret !== $v) {
        $this->pagret = $v;
        $this->modifiedColumns[] = FatippagPeer::PAGRET;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FatippagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->destippag = $rs->getString($startcol + 0);

      $this->tipcan = $rs->getString($startcol + 1);

      $this->genmov = $rs->getString($startcol + 2);

      $this->gening = $rs->getString($startcol + 3);

      $this->gennotcre = $rs->getString($startcol + 4);

      $this->gendetche = $rs->getString($startcol + 5);

      $this->pagret = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fatippag object", $e);
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
			$con = Propel::getConnection(FatippagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FatippagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FatippagPeer::DATABASE_NAME);
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
					$pk = FatippagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FatippagPeer::doUpdate($this, $con);
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


			if (($retval = FatippagPeer::doValidate($this, $columns)) !== true) {
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
		$pos = FatippagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDestippag();
				break;
			case 1:
				return $this->getTipcan();
				break;
			case 2:
				return $this->getGenmov();
				break;
			case 3:
				return $this->getGening();
				break;
			case 4:
				return $this->getGennotcre();
				break;
			case 5:
				return $this->getGendetche();
				break;
			case 6:
				return $this->getPagret();
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
		$keys = FatippagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDestippag(),
			$keys[1] => $this->getTipcan(),
			$keys[2] => $this->getGenmov(),
			$keys[3] => $this->getGening(),
			$keys[4] => $this->getGennotcre(),
			$keys[5] => $this->getGendetche(),
			$keys[6] => $this->getPagret(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FatippagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDestippag($value);
				break;
			case 1:
				$this->setTipcan($value);
				break;
			case 2:
				$this->setGenmov($value);
				break;
			case 3:
				$this->setGening($value);
				break;
			case 4:
				$this->setGennotcre($value);
				break;
			case 5:
				$this->setGendetche($value);
				break;
			case 6:
				$this->setPagret($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FatippagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDestippag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcan($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setGenmov($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGening($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setGennotcre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setGendetche($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPagret($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FatippagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FatippagPeer::DESTIPPAG)) $criteria->add(FatippagPeer::DESTIPPAG, $this->destippag);
		if ($this->isColumnModified(FatippagPeer::TIPCAN)) $criteria->add(FatippagPeer::TIPCAN, $this->tipcan);
		if ($this->isColumnModified(FatippagPeer::GENMOV)) $criteria->add(FatippagPeer::GENMOV, $this->genmov);
		if ($this->isColumnModified(FatippagPeer::GENING)) $criteria->add(FatippagPeer::GENING, $this->gening);
		if ($this->isColumnModified(FatippagPeer::GENNOTCRE)) $criteria->add(FatippagPeer::GENNOTCRE, $this->gennotcre);
		if ($this->isColumnModified(FatippagPeer::GENDETCHE)) $criteria->add(FatippagPeer::GENDETCHE, $this->gendetche);
		if ($this->isColumnModified(FatippagPeer::PAGRET)) $criteria->add(FatippagPeer::PAGRET, $this->pagret);
		if ($this->isColumnModified(FatippagPeer::ID)) $criteria->add(FatippagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FatippagPeer::DATABASE_NAME);

		$criteria->add(FatippagPeer::ID, $this->id);

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

		$copyObj->setDestippag($this->destippag);

		$copyObj->setTipcan($this->tipcan);

		$copyObj->setGenmov($this->genmov);

		$copyObj->setGening($this->gening);

		$copyObj->setGennotcre($this->gennotcre);

		$copyObj->setGendetche($this->gendetche);

		$copyObj->setPagret($this->pagret);


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
			self::$peer = new FatippagPeer();
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

				$criteria->add(FacombanPeer::TIPPAG_ID, $this->getId());

				FacombanPeer::addSelectColumns($criteria);
				$this->collFacombans = FacombanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FacombanPeer::TIPPAG_ID, $this->getId());

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

		$criteria->add(FacombanPeer::TIPPAG_ID, $this->getId());

		return FacombanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFacomban(Facomban $l)
	{
		$this->collFacombans[] = $l;
		$l->setFatippag($this);
	}


	
	public function getFacombansJoinFabancos($criteria = null, $con = null)
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

				$criteria->add(FacombanPeer::TIPPAG_ID, $this->getId());

				$this->collFacombans = FacombanPeer::doSelectJoinFabancos($criteria, $con);
			}
		} else {
									
			$criteria->add(FacombanPeer::TIPPAG_ID, $this->getId());

			if (!isset($this->lastFacombanCriteria) || !$this->lastFacombanCriteria->equals($criteria)) {
				$this->collFacombans = FacombanPeer::doSelectJoinFabancos($criteria, $con);
			}
		}
		$this->lastFacombanCriteria = $criteria;

		return $this->collFacombans;
	}

} 