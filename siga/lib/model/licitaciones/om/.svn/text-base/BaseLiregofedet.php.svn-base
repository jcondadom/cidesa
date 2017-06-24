<?php


abstract class BaseLiregofedet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numofe;


	
	protected $codart;


	
	protected $unimed;


	
	protected $cantid;


	
	protected $preuni;


	
	protected $monrec;


	
	protected $subtot;


	
	protected $tipconpub;


	
	protected $id;

	
	protected $collLiregcondets;

	
	protected $lastLiregcondetCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumofe()
  {

    return trim($this->numofe);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getUnimed()
  {

    return trim($this->unimed);

  }
  
  public function getCantid($val=false)
  {

    if($val) return number_format($this->cantid,2,',','.');
    else return $this->cantid;

  }
  
  public function getPreuni($val=false)
  {

    if($val) return number_format($this->preuni,2,',','.');
    else return $this->preuni;

  }
  
  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
  public function getSubtot($val=false)
  {

    if($val) return number_format($this->subtot,2,',','.');
    else return $this->subtot;

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumofe($v)
	{

    if ($this->numofe !== $v) {
        $this->numofe = $v;
        $this->modifiedColumns[] = LiregofedetPeer::NUMOFE;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LiregofedetPeer::CODART;
      }
  
	} 
	
	public function setUnimed($v)
	{

    if ($this->unimed !== $v) {
        $this->unimed = $v;
        $this->modifiedColumns[] = LiregofedetPeer::UNIMED;
      }
  
	} 
	
	public function setCantid($v)
	{

    if ($this->cantid !== $v) {
        $this->cantid = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregofedetPeer::CANTID;
      }
  
	} 
	
	public function setPreuni($v)
	{

    if ($this->preuni !== $v) {
        $this->preuni = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregofedetPeer::PREUNI;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregofedetPeer::MONREC;
      }
  
	} 
	
	public function setSubtot($v)
	{

    if ($this->subtot !== $v) {
        $this->subtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregofedetPeer::SUBTOT;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LiregofedetPeer::TIPCONPUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiregofedetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numofe = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->unimed = $rs->getString($startcol + 2);

      $this->cantid = $rs->getFloat($startcol + 3);

      $this->preuni = $rs->getFloat($startcol + 4);

      $this->monrec = $rs->getFloat($startcol + 5);

      $this->subtot = $rs->getFloat($startcol + 6);

      $this->tipconpub = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liregofedet object", $e);
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
			$con = Propel::getConnection(LiregofedetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiregofedetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiregofedetPeer::DATABASE_NAME);
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
					$pk = LiregofedetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiregofedetPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiregcondets !== null) {
				foreach($this->collLiregcondets as $referrerFK) {
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


			if (($retval = LiregofedetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiregcondets !== null) {
					foreach($this->collLiregcondets as $referrerFK) {
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
		$pos = LiregofedetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumofe();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getUnimed();
				break;
			case 3:
				return $this->getCantid();
				break;
			case 4:
				return $this->getPreuni();
				break;
			case 5:
				return $this->getMonrec();
				break;
			case 6:
				return $this->getSubtot();
				break;
			case 7:
				return $this->getTipconpub();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregofedetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumofe(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getUnimed(),
			$keys[3] => $this->getCantid(),
			$keys[4] => $this->getPreuni(),
			$keys[5] => $this->getMonrec(),
			$keys[6] => $this->getSubtot(),
			$keys[7] => $this->getTipconpub(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregofedetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumofe($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setUnimed($value);
				break;
			case 3:
				$this->setCantid($value);
				break;
			case 4:
				$this->setPreuni($value);
				break;
			case 5:
				$this->setMonrec($value);
				break;
			case 6:
				$this->setSubtot($value);
				break;
			case 7:
				$this->setTipconpub($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregofedetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumofe($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUnimed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCantid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPreuni($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonrec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSubtot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipconpub($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiregofedetPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiregofedetPeer::NUMOFE)) $criteria->add(LiregofedetPeer::NUMOFE, $this->numofe);
		if ($this->isColumnModified(LiregofedetPeer::CODART)) $criteria->add(LiregofedetPeer::CODART, $this->codart);
		if ($this->isColumnModified(LiregofedetPeer::UNIMED)) $criteria->add(LiregofedetPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(LiregofedetPeer::CANTID)) $criteria->add(LiregofedetPeer::CANTID, $this->cantid);
		if ($this->isColumnModified(LiregofedetPeer::PREUNI)) $criteria->add(LiregofedetPeer::PREUNI, $this->preuni);
		if ($this->isColumnModified(LiregofedetPeer::MONREC)) $criteria->add(LiregofedetPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(LiregofedetPeer::SUBTOT)) $criteria->add(LiregofedetPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(LiregofedetPeer::TIPCONPUB)) $criteria->add(LiregofedetPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LiregofedetPeer::ID)) $criteria->add(LiregofedetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiregofedetPeer::DATABASE_NAME);

		$criteria->add(LiregofedetPeer::ID, $this->id);

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

		$copyObj->setNumofe($this->numofe);

		$copyObj->setCodart($this->codart);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setCantid($this->cantid);

		$copyObj->setPreuni($this->preuni);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setTipconpub($this->tipconpub);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiregcondets() as $relObj) {
				$copyObj->addLiregcondet($relObj->copy($deepCopy));
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
			self::$peer = new LiregofedetPeer();
		}
		return self::$peer;
	}

	
	public function initLiregcondets()
	{
		if ($this->collLiregcondets === null) {
			$this->collLiregcondets = array();
		}
	}

	
	public function getLiregcondets($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregcondetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregcondets === null) {
			if ($this->isNew()) {
			   $this->collLiregcondets = array();
			} else {

				$criteria->add(LiregcondetPeer::LIREGOFEDET_ID, $this->getId());

				LiregcondetPeer::addSelectColumns($criteria);
				$this->collLiregcondets = LiregcondetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregcondetPeer::LIREGOFEDET_ID, $this->getId());

				LiregcondetPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregcondetCriteria) || !$this->lastLiregcondetCriteria->equals($criteria)) {
					$this->collLiregcondets = LiregcondetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregcondetCriteria = $criteria;
		return $this->collLiregcondets;
	}

	
	public function countLiregcondets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregcondetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregcondetPeer::LIREGOFEDET_ID, $this->getId());

		return LiregcondetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregcondet(Liregcondet $l)
	{
		$this->collLiregcondets[] = $l;
		$l->setLiregofedet($this);
	}


	
	public function getLiregcondetsJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregcondetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregcondets === null) {
			if ($this->isNew()) {
				$this->collLiregcondets = array();
			} else {

				$criteria->add(LiregcondetPeer::LIREGOFEDET_ID, $this->getId());

				$this->collLiregcondets = LiregcondetPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregcondetPeer::LIREGOFEDET_ID, $this->getId());

			if (!isset($this->lastLiregcondetCriteria) || !$this->lastLiregcondetCriteria->equals($criteria)) {
				$this->collLiregcondets = LiregcondetPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLiregcondetCriteria = $criteria;

		return $this->collLiregcondets;
	}

} 