<?php


abstract class BaseLiregaddcondet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numadd;


	
	protected $codart;


	
	protected $unimed;


	
	protected $cantid;


	
	protected $preuni;


	
	protected $monrec;


	
	protected $cantidaum;


	
	protected $preuniaum;


	
	protected $monrecaum;


	
	protected $cantiddis;


	
	protected $preunidis;


	
	protected $monrecdis;


	
	protected $cantidadd;


	
	protected $preuniadd;


	
	protected $monrecadd;


	
	protected $subtot;


	
	protected $tipconpub;


	
	protected $id;

	
	protected $aLiaddendum;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumadd()
  {

    return trim($this->numadd);

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
  
  public function getCantidaum($val=false)
  {

    if($val) return number_format($this->cantidaum,2,',','.');
    else return $this->cantidaum;

  }
  
  public function getPreuniaum($val=false)
  {

    if($val) return number_format($this->preuniaum,2,',','.');
    else return $this->preuniaum;

  }
  
  public function getMonrecaum($val=false)
  {

    if($val) return number_format($this->monrecaum,2,',','.');
    else return $this->monrecaum;

  }
  
  public function getCantiddis($val=false)
  {

    if($val) return number_format($this->cantiddis,2,',','.');
    else return $this->cantiddis;

  }
  
  public function getPreunidis($val=false)
  {

    if($val) return number_format($this->preunidis,2,',','.');
    else return $this->preunidis;

  }
  
  public function getMonrecdis($val=false)
  {

    if($val) return number_format($this->monrecdis,2,',','.');
    else return $this->monrecdis;

  }
  
  public function getCantidadd($val=false)
  {

    if($val) return number_format($this->cantidadd,2,',','.');
    else return $this->cantidadd;

  }
  
  public function getPreuniadd($val=false)
  {

    if($val) return number_format($this->preuniadd,2,',','.');
    else return $this->preuniadd;

  }
  
  public function getMonrecadd($val=false)
  {

    if($val) return number_format($this->monrecadd,2,',','.');
    else return $this->monrecadd;

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
	
	public function setNumadd($v)
	{

    if ($this->numadd !== $v) {
        $this->numadd = $v;
        $this->modifiedColumns[] = LiregaddcondetPeer::NUMADD;
      }
  
		if ($this->aLiaddendum !== null && $this->aLiaddendum->getNumadd() !== $v) {
			$this->aLiaddendum = null;
		}

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LiregaddcondetPeer::CODART;
      }
  
	} 
	
	public function setUnimed($v)
	{

    if ($this->unimed !== $v) {
        $this->unimed = $v;
        $this->modifiedColumns[] = LiregaddcondetPeer::UNIMED;
      }
  
	} 
	
	public function setCantid($v)
	{

    if ($this->cantid !== $v) {
        $this->cantid = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::CANTID;
      }
  
	} 
	
	public function setPreuni($v)
	{

    if ($this->preuni !== $v) {
        $this->preuni = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::PREUNI;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::MONREC;
      }
  
	} 
	
	public function setCantidaum($v)
	{

    if ($this->cantidaum !== $v) {
        $this->cantidaum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::CANTIDAUM;
      }
  
	} 
	
	public function setPreuniaum($v)
	{

    if ($this->preuniaum !== $v) {
        $this->preuniaum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::PREUNIAUM;
      }
  
	} 
	
	public function setMonrecaum($v)
	{

    if ($this->monrecaum !== $v) {
        $this->monrecaum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::MONRECAUM;
      }
  
	} 
	
	public function setCantiddis($v)
	{

    if ($this->cantiddis !== $v) {
        $this->cantiddis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::CANTIDDIS;
      }
  
	} 
	
	public function setPreunidis($v)
	{

    if ($this->preunidis !== $v) {
        $this->preunidis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::PREUNIDIS;
      }
  
	} 
	
	public function setMonrecdis($v)
	{

    if ($this->monrecdis !== $v) {
        $this->monrecdis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::MONRECDIS;
      }
  
	} 
	
	public function setCantidadd($v)
	{

    if ($this->cantidadd !== $v) {
        $this->cantidadd = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::CANTIDADD;
      }
  
	} 
	
	public function setPreuniadd($v)
	{

    if ($this->preuniadd !== $v) {
        $this->preuniadd = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::PREUNIADD;
      }
  
	} 
	
	public function setMonrecadd($v)
	{

    if ($this->monrecadd !== $v) {
        $this->monrecadd = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::MONRECADD;
      }
  
	} 
	
	public function setSubtot($v)
	{

    if ($this->subtot !== $v) {
        $this->subtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregaddcondetPeer::SUBTOT;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LiregaddcondetPeer::TIPCONPUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiregaddcondetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numadd = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->unimed = $rs->getString($startcol + 2);

      $this->cantid = $rs->getFloat($startcol + 3);

      $this->preuni = $rs->getFloat($startcol + 4);

      $this->monrec = $rs->getFloat($startcol + 5);

      $this->cantidaum = $rs->getFloat($startcol + 6);

      $this->preuniaum = $rs->getFloat($startcol + 7);

      $this->monrecaum = $rs->getFloat($startcol + 8);

      $this->cantiddis = $rs->getFloat($startcol + 9);

      $this->preunidis = $rs->getFloat($startcol + 10);

      $this->monrecdis = $rs->getFloat($startcol + 11);

      $this->cantidadd = $rs->getFloat($startcol + 12);

      $this->preuniadd = $rs->getFloat($startcol + 13);

      $this->monrecadd = $rs->getFloat($startcol + 14);

      $this->subtot = $rs->getFloat($startcol + 15);

      $this->tipconpub = $rs->getString($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liregaddcondet object", $e);
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
			$con = Propel::getConnection(LiregaddcondetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiregaddcondetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiregaddcondetPeer::DATABASE_NAME);
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


												
			if ($this->aLiaddendum !== null) {
				if ($this->aLiaddendum->isModified()) {
					$affectedRows += $this->aLiaddendum->save($con);
				}
				$this->setLiaddendum($this->aLiaddendum);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiregaddcondetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiregaddcondetPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aLiaddendum !== null) {
				if (!$this->aLiaddendum->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiaddendum->getValidationFailures());
				}
			}


			if (($retval = LiregaddcondetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregaddcondetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumadd();
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
				return $this->getCantidaum();
				break;
			case 7:
				return $this->getPreuniaum();
				break;
			case 8:
				return $this->getMonrecaum();
				break;
			case 9:
				return $this->getCantiddis();
				break;
			case 10:
				return $this->getPreunidis();
				break;
			case 11:
				return $this->getMonrecdis();
				break;
			case 12:
				return $this->getCantidadd();
				break;
			case 13:
				return $this->getPreuniadd();
				break;
			case 14:
				return $this->getMonrecadd();
				break;
			case 15:
				return $this->getSubtot();
				break;
			case 16:
				return $this->getTipconpub();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregaddcondetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumadd(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getUnimed(),
			$keys[3] => $this->getCantid(),
			$keys[4] => $this->getPreuni(),
			$keys[5] => $this->getMonrec(),
			$keys[6] => $this->getCantidaum(),
			$keys[7] => $this->getPreuniaum(),
			$keys[8] => $this->getMonrecaum(),
			$keys[9] => $this->getCantiddis(),
			$keys[10] => $this->getPreunidis(),
			$keys[11] => $this->getMonrecdis(),
			$keys[12] => $this->getCantidadd(),
			$keys[13] => $this->getPreuniadd(),
			$keys[14] => $this->getMonrecadd(),
			$keys[15] => $this->getSubtot(),
			$keys[16] => $this->getTipconpub(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregaddcondetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumadd($value);
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
				$this->setCantidaum($value);
				break;
			case 7:
				$this->setPreuniaum($value);
				break;
			case 8:
				$this->setMonrecaum($value);
				break;
			case 9:
				$this->setCantiddis($value);
				break;
			case 10:
				$this->setPreunidis($value);
				break;
			case 11:
				$this->setMonrecdis($value);
				break;
			case 12:
				$this->setCantidadd($value);
				break;
			case 13:
				$this->setPreuniadd($value);
				break;
			case 14:
				$this->setMonrecadd($value);
				break;
			case 15:
				$this->setSubtot($value);
				break;
			case 16:
				$this->setTipconpub($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregaddcondetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumadd($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUnimed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCantid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPreuni($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonrec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCantidaum($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPreuniaum($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonrecaum($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCantiddis($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPreunidis($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMonrecdis($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCantidadd($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPreuniadd($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMonrecadd($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setSubtot($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTipconpub($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiregaddcondetPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiregaddcondetPeer::NUMADD)) $criteria->add(LiregaddcondetPeer::NUMADD, $this->numadd);
		if ($this->isColumnModified(LiregaddcondetPeer::CODART)) $criteria->add(LiregaddcondetPeer::CODART, $this->codart);
		if ($this->isColumnModified(LiregaddcondetPeer::UNIMED)) $criteria->add(LiregaddcondetPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(LiregaddcondetPeer::CANTID)) $criteria->add(LiregaddcondetPeer::CANTID, $this->cantid);
		if ($this->isColumnModified(LiregaddcondetPeer::PREUNI)) $criteria->add(LiregaddcondetPeer::PREUNI, $this->preuni);
		if ($this->isColumnModified(LiregaddcondetPeer::MONREC)) $criteria->add(LiregaddcondetPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(LiregaddcondetPeer::CANTIDAUM)) $criteria->add(LiregaddcondetPeer::CANTIDAUM, $this->cantidaum);
		if ($this->isColumnModified(LiregaddcondetPeer::PREUNIAUM)) $criteria->add(LiregaddcondetPeer::PREUNIAUM, $this->preuniaum);
		if ($this->isColumnModified(LiregaddcondetPeer::MONRECAUM)) $criteria->add(LiregaddcondetPeer::MONRECAUM, $this->monrecaum);
		if ($this->isColumnModified(LiregaddcondetPeer::CANTIDDIS)) $criteria->add(LiregaddcondetPeer::CANTIDDIS, $this->cantiddis);
		if ($this->isColumnModified(LiregaddcondetPeer::PREUNIDIS)) $criteria->add(LiregaddcondetPeer::PREUNIDIS, $this->preunidis);
		if ($this->isColumnModified(LiregaddcondetPeer::MONRECDIS)) $criteria->add(LiregaddcondetPeer::MONRECDIS, $this->monrecdis);
		if ($this->isColumnModified(LiregaddcondetPeer::CANTIDADD)) $criteria->add(LiregaddcondetPeer::CANTIDADD, $this->cantidadd);
		if ($this->isColumnModified(LiregaddcondetPeer::PREUNIADD)) $criteria->add(LiregaddcondetPeer::PREUNIADD, $this->preuniadd);
		if ($this->isColumnModified(LiregaddcondetPeer::MONRECADD)) $criteria->add(LiregaddcondetPeer::MONRECADD, $this->monrecadd);
		if ($this->isColumnModified(LiregaddcondetPeer::SUBTOT)) $criteria->add(LiregaddcondetPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(LiregaddcondetPeer::TIPCONPUB)) $criteria->add(LiregaddcondetPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LiregaddcondetPeer::ID)) $criteria->add(LiregaddcondetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiregaddcondetPeer::DATABASE_NAME);

		$criteria->add(LiregaddcondetPeer::ID, $this->id);

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

		$copyObj->setNumadd($this->numadd);

		$copyObj->setCodart($this->codart);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setCantid($this->cantid);

		$copyObj->setPreuni($this->preuni);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setCantidaum($this->cantidaum);

		$copyObj->setPreuniaum($this->preuniaum);

		$copyObj->setMonrecaum($this->monrecaum);

		$copyObj->setCantiddis($this->cantiddis);

		$copyObj->setPreunidis($this->preunidis);

		$copyObj->setMonrecdis($this->monrecdis);

		$copyObj->setCantidadd($this->cantidadd);

		$copyObj->setPreuniadd($this->preuniadd);

		$copyObj->setMonrecadd($this->monrecadd);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setTipconpub($this->tipconpub);


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
			self::$peer = new LiregaddcondetPeer();
		}
		return self::$peer;
	}

	
	public function setLiaddendum($v)
	{


		if ($v === null) {
			$this->setNumadd(NULL);
		} else {
			$this->setNumadd($v->getNumadd());
		}


		$this->aLiaddendum = $v;
	}


	
	public function getLiaddendum($con = null)
	{
		if ($this->aLiaddendum === null && (($this->numadd !== "" && $this->numadd !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';

      $c = new Criteria();
      $c->add(LiaddendumPeer::NUMADD,$this->numadd);
      
			$this->aLiaddendum = LiaddendumPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiaddendum;
	}

} 