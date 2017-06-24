<?php


abstract class BaseLidetparval extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numval;


	
	protected $codart;


	
	protected $unimed;


	
	protected $cantid;


	
	protected $preuni;


	
	protected $monrec;


	
	protected $subtot;


	
	protected $cantidvalu;


	
	protected $subtotvalu;


	
	protected $aprobado;


	
	protected $liregcondet_id;


	
	protected $id;

	
	protected $aLivaluaciones;

	
	protected $aLiregcondet;

	
	protected $collLidetparinss;

	
	protected $lastLidetparinsCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumval()
  {

    return trim($this->numval);

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
  
  public function getCantidvalu($val=false)
  {

    if($val) return number_format($this->cantidvalu,2,',','.');
    else return $this->cantidvalu;

  }
  
  public function getSubtotvalu($val=false)
  {

    if($val) return number_format($this->subtotvalu,2,',','.');
    else return $this->subtotvalu;

  }
  
  public function getAprobado()
  {

    return $this->aprobado;

  }
  
  public function getLiregcondetId()
  {

    return $this->liregcondet_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumval($v)
	{

    if ($this->numval !== $v) {
        $this->numval = $v;
        $this->modifiedColumns[] = LidetparvalPeer::NUMVAL;
      }
  
		if ($this->aLivaluaciones !== null && $this->aLivaluaciones->getNumval() !== $v) {
			$this->aLivaluaciones = null;
		}

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LidetparvalPeer::CODART;
      }
  
	} 
	
	public function setUnimed($v)
	{

    if ($this->unimed !== $v) {
        $this->unimed = $v;
        $this->modifiedColumns[] = LidetparvalPeer::UNIMED;
      }
  
	} 
	
	public function setCantid($v)
	{

    if ($this->cantid !== $v) {
        $this->cantid = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetparvalPeer::CANTID;
      }
  
	} 
	
	public function setPreuni($v)
	{

    if ($this->preuni !== $v) {
        $this->preuni = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetparvalPeer::PREUNI;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetparvalPeer::MONREC;
      }
  
	} 
	
	public function setSubtot($v)
	{

    if ($this->subtot !== $v) {
        $this->subtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetparvalPeer::SUBTOT;
      }
  
	} 
	
	public function setCantidvalu($v)
	{

    if ($this->cantidvalu !== $v) {
        $this->cantidvalu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetparvalPeer::CANTIDVALU;
      }
  
	} 
	
	public function setSubtotvalu($v)
	{

    if ($this->subtotvalu !== $v) {
        $this->subtotvalu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetparvalPeer::SUBTOTVALU;
      }
  
	} 
	
	public function setAprobado($v)
	{

    if ($this->aprobado !== $v) {
        $this->aprobado = $v;
        $this->modifiedColumns[] = LidetparvalPeer::APROBADO;
      }
  
	} 
	
	public function setLiregcondetId($v)
	{

    if ($this->liregcondet_id !== $v) {
        $this->liregcondet_id = $v;
        $this->modifiedColumns[] = LidetparvalPeer::LIREGCONDET_ID;
      }
  
		if ($this->aLiregcondet !== null && $this->aLiregcondet->getId() !== $v) {
			$this->aLiregcondet = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidetparvalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numval = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->unimed = $rs->getString($startcol + 2);

      $this->cantid = $rs->getFloat($startcol + 3);

      $this->preuni = $rs->getFloat($startcol + 4);

      $this->monrec = $rs->getFloat($startcol + 5);

      $this->subtot = $rs->getFloat($startcol + 6);

      $this->cantidvalu = $rs->getFloat($startcol + 7);

      $this->subtotvalu = $rs->getFloat($startcol + 8);

      $this->aprobado = $rs->getBoolean($startcol + 9);

      $this->liregcondet_id = $rs->getInt($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidetparval object", $e);
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
			$con = Propel::getConnection(LidetparvalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidetparvalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidetparvalPeer::DATABASE_NAME);
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


												
			if ($this->aLivaluaciones !== null) {
				if ($this->aLivaluaciones->isModified()) {
					$affectedRows += $this->aLivaluaciones->save($con);
				}
				$this->setLivaluaciones($this->aLivaluaciones);
			}

			if ($this->aLiregcondet !== null) {
				if ($this->aLiregcondet->isModified()) {
					$affectedRows += $this->aLiregcondet->save($con);
				}
				$this->setLiregcondet($this->aLiregcondet);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LidetparvalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidetparvalPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLidetparinss !== null) {
				foreach($this->collLidetparinss as $referrerFK) {
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


												
			if ($this->aLivaluaciones !== null) {
				if (!$this->aLivaluaciones->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLivaluaciones->getValidationFailures());
				}
			}

			if ($this->aLiregcondet !== null) {
				if (!$this->aLiregcondet->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiregcondet->getValidationFailures());
				}
			}


			if (($retval = LidetparvalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLidetparinss !== null) {
					foreach($this->collLidetparinss as $referrerFK) {
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
		$pos = LidetparvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumval();
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
				return $this->getCantidvalu();
				break;
			case 8:
				return $this->getSubtotvalu();
				break;
			case 9:
				return $this->getAprobado();
				break;
			case 10:
				return $this->getLiregcondetId();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidetparvalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumval(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getUnimed(),
			$keys[3] => $this->getCantid(),
			$keys[4] => $this->getPreuni(),
			$keys[5] => $this->getMonrec(),
			$keys[6] => $this->getSubtot(),
			$keys[7] => $this->getCantidvalu(),
			$keys[8] => $this->getSubtotvalu(),
			$keys[9] => $this->getAprobado(),
			$keys[10] => $this->getLiregcondetId(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetparvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumval($value);
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
				$this->setCantidvalu($value);
				break;
			case 8:
				$this->setSubtotvalu($value);
				break;
			case 9:
				$this->setAprobado($value);
				break;
			case 10:
				$this->setLiregcondetId($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidetparvalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumval($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUnimed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCantid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPreuni($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonrec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSubtot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCantidvalu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSubtotvalu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAprobado($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setLiregcondetId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidetparvalPeer::DATABASE_NAME);

		if ($this->isColumnModified(LidetparvalPeer::NUMVAL)) $criteria->add(LidetparvalPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(LidetparvalPeer::CODART)) $criteria->add(LidetparvalPeer::CODART, $this->codart);
		if ($this->isColumnModified(LidetparvalPeer::UNIMED)) $criteria->add(LidetparvalPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(LidetparvalPeer::CANTID)) $criteria->add(LidetparvalPeer::CANTID, $this->cantid);
		if ($this->isColumnModified(LidetparvalPeer::PREUNI)) $criteria->add(LidetparvalPeer::PREUNI, $this->preuni);
		if ($this->isColumnModified(LidetparvalPeer::MONREC)) $criteria->add(LidetparvalPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(LidetparvalPeer::SUBTOT)) $criteria->add(LidetparvalPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(LidetparvalPeer::CANTIDVALU)) $criteria->add(LidetparvalPeer::CANTIDVALU, $this->cantidvalu);
		if ($this->isColumnModified(LidetparvalPeer::SUBTOTVALU)) $criteria->add(LidetparvalPeer::SUBTOTVALU, $this->subtotvalu);
		if ($this->isColumnModified(LidetparvalPeer::APROBADO)) $criteria->add(LidetparvalPeer::APROBADO, $this->aprobado);
		if ($this->isColumnModified(LidetparvalPeer::LIREGCONDET_ID)) $criteria->add(LidetparvalPeer::LIREGCONDET_ID, $this->liregcondet_id);
		if ($this->isColumnModified(LidetparvalPeer::ID)) $criteria->add(LidetparvalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidetparvalPeer::DATABASE_NAME);

		$criteria->add(LidetparvalPeer::ID, $this->id);

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

		$copyObj->setNumval($this->numval);

		$copyObj->setCodart($this->codart);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setCantid($this->cantid);

		$copyObj->setPreuni($this->preuni);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setCantidvalu($this->cantidvalu);

		$copyObj->setSubtotvalu($this->subtotvalu);

		$copyObj->setAprobado($this->aprobado);

		$copyObj->setLiregcondetId($this->liregcondet_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLidetparinss() as $relObj) {
				$copyObj->addLidetparins($relObj->copy($deepCopy));
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
			self::$peer = new LidetparvalPeer();
		}
		return self::$peer;
	}

	
	public function setLivaluaciones($v)
	{


		if ($v === null) {
			$this->setNumval(NULL);
		} else {
			$this->setNumval($v->getNumval());
		}


		$this->aLivaluaciones = $v;
	}


	
	public function getLivaluaciones($con = null)
	{
		if ($this->aLivaluaciones === null && (($this->numval !== "" && $this->numval !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';

      $c = new Criteria();
      $c->add(LivaluacionesPeer::NUMVAL,$this->numval);
      
			$this->aLivaluaciones = LivaluacionesPeer::doSelectOne($c, $con);

			
		}
		return $this->aLivaluaciones;
	}

	
	public function setLiregcondet($v)
	{


		if ($v === null) {
			$this->setLiregcondetId(NULL);
		} else {
			$this->setLiregcondetId($v->getId());
		}


		$this->aLiregcondet = $v;
	}


	
	public function getLiregcondet($con = null)
	{
		if ($this->aLiregcondet === null && ($this->liregcondet_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLiregcondetPeer.php';

      $c = new Criteria();
      $c->add(LiregcondetPeer::ID,$this->liregcondet_id);
      
			$this->aLiregcondet = LiregcondetPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiregcondet;
	}

	
	public function initLidetparinss()
	{
		if ($this->collLidetparinss === null) {
			$this->collLidetparinss = array();
		}
	}

	
	public function getLidetparinss($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetparinsPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetparinss === null) {
			if ($this->isNew()) {
			   $this->collLidetparinss = array();
			} else {

				$criteria->add(LidetparinsPeer::LIDETPARVAL_ID, $this->getId());

				LidetparinsPeer::addSelectColumns($criteria);
				$this->collLidetparinss = LidetparinsPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetparinsPeer::LIDETPARVAL_ID, $this->getId());

				LidetparinsPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetparinsCriteria) || !$this->lastLidetparinsCriteria->equals($criteria)) {
					$this->collLidetparinss = LidetparinsPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetparinsCriteria = $criteria;
		return $this->collLidetparinss;
	}

	
	public function countLidetparinss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetparinsPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetparinsPeer::LIDETPARVAL_ID, $this->getId());

		return LidetparinsPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetparins(Lidetparins $l)
	{
		$this->collLidetparinss[] = $l;
		$l->setLidetparval($this);
	}


	
	public function getLidetparinssJoinLiinspecciones($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetparinsPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetparinss === null) {
			if ($this->isNew()) {
				$this->collLidetparinss = array();
			} else {

				$criteria->add(LidetparinsPeer::LIDETPARVAL_ID, $this->getId());

				$this->collLidetparinss = LidetparinsPeer::doSelectJoinLiinspecciones($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetparinsPeer::LIDETPARVAL_ID, $this->getId());

			if (!isset($this->lastLidetparinsCriteria) || !$this->lastLidetparinsCriteria->equals($criteria)) {
				$this->collLidetparinss = LidetparinsPeer::doSelectJoinLiinspecciones($criteria, $con);
			}
		}
		$this->lastLidetparinsCriteria = $criteria;

		return $this->collLidetparinss;
	}

} 