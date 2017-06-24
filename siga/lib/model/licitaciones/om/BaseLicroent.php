<?php


abstract class BaseLicroent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numofe;


	
	protected $codart;


	
	protected $cantid;


	
	protected $coduniadm;


	
	protected $fecent;


	
	protected $condic;


	
	protected $tipconpub;


	
	protected $cantident;


	
	protected $liforpag_id;


	
	protected $id;

	
	protected $aLiforpag;

	
	protected $collLidetcroentconts;

	
	protected $lastLidetcroentcontCriteria = null;

	
	protected $collLidetcroentcontobs;

	
	protected $lastLidetcroentcontobCriteria = null;

	
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
  
  public function getCantid($val=false)
  {

    if($val) return number_format($this->cantid,2,',','.');
    else return $this->cantid;

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCondic()
  {

    return trim($this->condic);

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getCantident($val=false)
  {

    if($val) return number_format($this->cantident,2,',','.');
    else return $this->cantident;

  }
  
  public function getLiforpagId()
  {

    return $this->liforpag_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumofe($v)
	{

    if ($this->numofe !== $v) {
        $this->numofe = $v;
        $this->modifiedColumns[] = LicroentPeer::NUMOFE;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LicroentPeer::CODART;
      }
  
	} 
	
	public function setCantid($v)
	{

    if ($this->cantid !== $v) {
        $this->cantid = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LicroentPeer::CANTID;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LicroentPeer::CODUNIADM;
      }
  
	} 
	
	public function setFecent($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = LicroentPeer::FECENT;
    }

	} 
	
	public function setCondic($v)
	{

    if ($this->condic !== $v) {
        $this->condic = $v;
        $this->modifiedColumns[] = LicroentPeer::CONDIC;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LicroentPeer::TIPCONPUB;
      }
  
	} 
	
	public function setCantident($v)
	{

    if ($this->cantident !== $v) {
        $this->cantident = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LicroentPeer::CANTIDENT;
      }
  
	} 
	
	public function setLiforpagId($v)
	{

    if ($this->liforpag_id !== $v) {
        $this->liforpag_id = $v;
        $this->modifiedColumns[] = LicroentPeer::LIFORPAG_ID;
      }
  
		if ($this->aLiforpag !== null && $this->aLiforpag->getId() !== $v) {
			$this->aLiforpag = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LicroentPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numofe = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->cantid = $rs->getFloat($startcol + 2);

      $this->coduniadm = $rs->getString($startcol + 3);

      $this->fecent = $rs->getDate($startcol + 4, null);

      $this->condic = $rs->getString($startcol + 5);

      $this->tipconpub = $rs->getString($startcol + 6);

      $this->cantident = $rs->getFloat($startcol + 7);

      $this->liforpag_id = $rs->getInt($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Licroent object", $e);
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
			$con = Propel::getConnection(LicroentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LicroentPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LicroentPeer::DATABASE_NAME);
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


												
			if ($this->aLiforpag !== null) {
				if ($this->aLiforpag->isModified()) {
					$affectedRows += $this->aLiforpag->save($con);
				}
				$this->setLiforpag($this->aLiforpag);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LicroentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LicroentPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLidetcroentconts !== null) {
				foreach($this->collLidetcroentconts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLidetcroentcontobs !== null) {
				foreach($this->collLidetcroentcontobs as $referrerFK) {
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


												
			if ($this->aLiforpag !== null) {
				if (!$this->aLiforpag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiforpag->getValidationFailures());
				}
			}


			if (($retval = LicroentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLidetcroentconts !== null) {
					foreach($this->collLidetcroentconts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLidetcroentcontobs !== null) {
					foreach($this->collLidetcroentcontobs as $referrerFK) {
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
		$pos = LicroentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCantid();
				break;
			case 3:
				return $this->getCoduniadm();
				break;
			case 4:
				return $this->getFecent();
				break;
			case 5:
				return $this->getCondic();
				break;
			case 6:
				return $this->getTipconpub();
				break;
			case 7:
				return $this->getCantident();
				break;
			case 8:
				return $this->getLiforpagId();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LicroentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumofe(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCantid(),
			$keys[3] => $this->getCoduniadm(),
			$keys[4] => $this->getFecent(),
			$keys[5] => $this->getCondic(),
			$keys[6] => $this->getTipconpub(),
			$keys[7] => $this->getCantident(),
			$keys[8] => $this->getLiforpagId(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LicroentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCantid($value);
				break;
			case 3:
				$this->setCoduniadm($value);
				break;
			case 4:
				$this->setFecent($value);
				break;
			case 5:
				$this->setCondic($value);
				break;
			case 6:
				$this->setTipconpub($value);
				break;
			case 7:
				$this->setCantident($value);
				break;
			case 8:
				$this->setLiforpagId($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LicroentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumofe($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCantid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCoduniadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecent($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCondic($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipconpub($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCantident($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLiforpagId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LicroentPeer::DATABASE_NAME);

		if ($this->isColumnModified(LicroentPeer::NUMOFE)) $criteria->add(LicroentPeer::NUMOFE, $this->numofe);
		if ($this->isColumnModified(LicroentPeer::CODART)) $criteria->add(LicroentPeer::CODART, $this->codart);
		if ($this->isColumnModified(LicroentPeer::CANTID)) $criteria->add(LicroentPeer::CANTID, $this->cantid);
		if ($this->isColumnModified(LicroentPeer::CODUNIADM)) $criteria->add(LicroentPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LicroentPeer::FECENT)) $criteria->add(LicroentPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(LicroentPeer::CONDIC)) $criteria->add(LicroentPeer::CONDIC, $this->condic);
		if ($this->isColumnModified(LicroentPeer::TIPCONPUB)) $criteria->add(LicroentPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LicroentPeer::CANTIDENT)) $criteria->add(LicroentPeer::CANTIDENT, $this->cantident);
		if ($this->isColumnModified(LicroentPeer::LIFORPAG_ID)) $criteria->add(LicroentPeer::LIFORPAG_ID, $this->liforpag_id);
		if ($this->isColumnModified(LicroentPeer::ID)) $criteria->add(LicroentPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LicroentPeer::DATABASE_NAME);

		$criteria->add(LicroentPeer::ID, $this->id);

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

		$copyObj->setCantid($this->cantid);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setFecent($this->fecent);

		$copyObj->setCondic($this->condic);

		$copyObj->setTipconpub($this->tipconpub);

		$copyObj->setCantident($this->cantident);

		$copyObj->setLiforpagId($this->liforpag_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLidetcroentconts() as $relObj) {
				$copyObj->addLidetcroentcont($relObj->copy($deepCopy));
			}

			foreach($this->getLidetcroentcontobs() as $relObj) {
				$copyObj->addLidetcroentcontob($relObj->copy($deepCopy));
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
			self::$peer = new LicroentPeer();
		}
		return self::$peer;
	}

	
	public function setLiforpag($v)
	{


		if ($v === null) {
			$this->setLiforpagId(NULL);
		} else {
			$this->setLiforpagId($v->getId());
		}


		$this->aLiforpag = $v;
	}


	
	public function getLiforpag($con = null)
	{
		if ($this->aLiforpag === null && ($this->liforpag_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLiforpagPeer.php';

      $c = new Criteria();
      $c->add(LiforpagPeer::ID,$this->liforpag_id);
      
			$this->aLiforpag = LiforpagPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiforpag;
	}

	
	public function initLidetcroentconts()
	{
		if ($this->collLidetcroentconts === null) {
			$this->collLidetcroentconts = array();
		}
	}

	
	public function getLidetcroentconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentconts === null) {
			if ($this->isNew()) {
			   $this->collLidetcroentconts = array();
			} else {

				$criteria->add(LidetcroentcontPeer::LICROENT_ID, $this->getId());

				LidetcroentcontPeer::addSelectColumns($criteria);
				$this->collLidetcroentconts = LidetcroentcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetcroentcontPeer::LICROENT_ID, $this->getId());

				LidetcroentcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetcroentcontCriteria) || !$this->lastLidetcroentcontCriteria->equals($criteria)) {
					$this->collLidetcroentconts = LidetcroentcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetcroentcontCriteria = $criteria;
		return $this->collLidetcroentconts;
	}

	
	public function countLidetcroentconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetcroentcontPeer::LICROENT_ID, $this->getId());

		return LidetcroentcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetcroentcont(Lidetcroentcont $l)
	{
		$this->collLidetcroentconts[] = $l;
		$l->setLicroent($this);
	}


	
	public function getLidetcroentcontsJoinLientregas($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentconts === null) {
			if ($this->isNew()) {
				$this->collLidetcroentconts = array();
			} else {

				$criteria->add(LidetcroentcontPeer::LICROENT_ID, $this->getId());

				$this->collLidetcroentconts = LidetcroentcontPeer::doSelectJoinLientregas($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentcontPeer::LICROENT_ID, $this->getId());

			if (!isset($this->lastLidetcroentcontCriteria) || !$this->lastLidetcroentcontCriteria->equals($criteria)) {
				$this->collLidetcroentconts = LidetcroentcontPeer::doSelectJoinLientregas($criteria, $con);
			}
		}
		$this->lastLidetcroentcontCriteria = $criteria;

		return $this->collLidetcroentconts;
	}


	
	public function getLidetcroentcontsJoinLiuniadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentconts === null) {
			if ($this->isNew()) {
				$this->collLidetcroentconts = array();
			} else {

				$criteria->add(LidetcroentcontPeer::LICROENT_ID, $this->getId());

				$this->collLidetcroentconts = LidetcroentcontPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentcontPeer::LICROENT_ID, $this->getId());

			if (!isset($this->lastLidetcroentcontCriteria) || !$this->lastLidetcroentcontCriteria->equals($criteria)) {
				$this->collLidetcroentconts = LidetcroentcontPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		}
		$this->lastLidetcroentcontCriteria = $criteria;

		return $this->collLidetcroentconts;
	}

	
	public function initLidetcroentcontobs()
	{
		if ($this->collLidetcroentcontobs === null) {
			$this->collLidetcroentcontobs = array();
		}
	}

	
	public function getLidetcroentcontobs($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentcontobs === null) {
			if ($this->isNew()) {
			   $this->collLidetcroentcontobs = array();
			} else {

				$criteria->add(LidetcroentcontobPeer::LICROENT_ID, $this->getId());

				LidetcroentcontobPeer::addSelectColumns($criteria);
				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetcroentcontobPeer::LICROENT_ID, $this->getId());

				LidetcroentcontobPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetcroentcontobCriteria) || !$this->lastLidetcroentcontobCriteria->equals($criteria)) {
					$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetcroentcontobCriteria = $criteria;
		return $this->collLidetcroentcontobs;
	}

	
	public function countLidetcroentcontobs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetcroentcontobPeer::LICROENT_ID, $this->getId());

		return LidetcroentcontobPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetcroentcontob(Lidetcroentcontob $l)
	{
		$this->collLidetcroentcontobs[] = $l;
		$l->setLicroent($this);
	}


	
	public function getLidetcroentcontobsJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentcontobs === null) {
			if ($this->isNew()) {
				$this->collLidetcroentcontobs = array();
			} else {

				$criteria->add(LidetcroentcontobPeer::LICROENT_ID, $this->getId());

				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentcontobPeer::LICROENT_ID, $this->getId());

			if (!isset($this->lastLidetcroentcontobCriteria) || !$this->lastLidetcroentcontobCriteria->equals($criteria)) {
				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLidetcroentcontobCriteria = $criteria;

		return $this->collLidetcroentcontobs;
	}


	
	public function getLidetcroentcontobsJoinLiuniadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentcontobs === null) {
			if ($this->isNew()) {
				$this->collLidetcroentcontobs = array();
			} else {

				$criteria->add(LidetcroentcontobPeer::LICROENT_ID, $this->getId());

				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentcontobPeer::LICROENT_ID, $this->getId());

			if (!isset($this->lastLidetcroentcontobCriteria) || !$this->lastLidetcroentcontobCriteria->equals($criteria)) {
				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		}
		$this->lastLidetcroentcontobCriteria = $criteria;

		return $this->collLidetcroentcontobs;
	}

} 