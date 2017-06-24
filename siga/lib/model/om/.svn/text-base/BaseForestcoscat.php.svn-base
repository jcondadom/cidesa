<?php


abstract class BaseForestcoscat extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codart;


	
	protected $codpar;


	
	protected $canuni;


	
	protected $canart;


	
	protected $monart;


	
	protected $totpre;


	
	protected $codfin;


	
	protected $codtip;


	
	protected $observ;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getCanuni($val=false)
  {

    if($val) return number_format($this->canuni,2,',','.');
    else return $this->canuni;

  }
  
  public function getCanart($val=false)
  {

    if($val) return number_format($this->canart,2,',','.');
    else return $this->canart;

  }
  
  public function getMonart($val=false)
  {

    if($val) return number_format($this->monart,2,',','.');
    else return $this->monart;

  }
  
  public function getTotpre($val=false)
  {

    if($val) return number_format($this->totpre,2,',','.');
    else return $this->totpre;

  }
  
  public function getCodfin()
  {

    return trim($this->codfin);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ForestcoscatPeer::CODCAT;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = ForestcoscatPeer::CODART;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = ForestcoscatPeer::CODPAR;
      }
  
	} 
	
	public function setCanuni($v)
	{

    if ($this->canuni !== $v) {
        $this->canuni = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForestcoscatPeer::CANUNI;
      }
  
	} 
	
	public function setCanart($v)
	{

    if ($this->canart !== $v) {
        $this->canart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForestcoscatPeer::CANART;
      }
  
	} 
	
	public function setMonart($v)
	{

    if ($this->monart !== $v) {
        $this->monart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForestcoscatPeer::MONART;
      }
  
	} 
	
	public function setTotpre($v)
	{

    if ($this->totpre !== $v) {
        $this->totpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForestcoscatPeer::TOTPRE;
      }
  
	} 
	
	public function setCodfin($v)
	{

    if ($this->codfin !== $v) {
        $this->codfin = $v;
        $this->modifiedColumns[] = ForestcoscatPeer::CODFIN;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = ForestcoscatPeer::CODTIP;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = ForestcoscatPeer::OBSERV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForestcoscatPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcat = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codpar = $rs->getString($startcol + 2);

      $this->canuni = $rs->getFloat($startcol + 3);

      $this->canart = $rs->getFloat($startcol + 4);

      $this->monart = $rs->getFloat($startcol + 5);

      $this->totpre = $rs->getFloat($startcol + 6);

      $this->codfin = $rs->getString($startcol + 7);

      $this->codtip = $rs->getString($startcol + 8);

      $this->observ = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forestcoscat object", $e);
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
			$con = Propel::getConnection(ForestcoscatPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForestcoscatPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForestcoscatPeer::DATABASE_NAME);
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
					$pk = ForestcoscatPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForestcoscatPeer::doUpdate($this, $con);
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


			if (($retval = ForestcoscatPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForestcoscatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodpar();
				break;
			case 3:
				return $this->getCanuni();
				break;
			case 4:
				return $this->getCanart();
				break;
			case 5:
				return $this->getMonart();
				break;
			case 6:
				return $this->getTotpre();
				break;
			case 7:
				return $this->getCodfin();
				break;
			case 8:
				return $this->getCodtip();
				break;
			case 9:
				return $this->getObserv();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForestcoscatPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodpar(),
			$keys[3] => $this->getCanuni(),
			$keys[4] => $this->getCanart(),
			$keys[5] => $this->getMonart(),
			$keys[6] => $this->getTotpre(),
			$keys[7] => $this->getCodfin(),
			$keys[8] => $this->getCodtip(),
			$keys[9] => $this->getObserv(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForestcoscatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodpar($value);
				break;
			case 3:
				$this->setCanuni($value);
				break;
			case 4:
				$this->setCanart($value);
				break;
			case 5:
				$this->setMonart($value);
				break;
			case 6:
				$this->setTotpre($value);
				break;
			case 7:
				$this->setCodfin($value);
				break;
			case 8:
				$this->setCodtip($value);
				break;
			case 9:
				$this->setObserv($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForestcoscatPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanuni($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanart($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonart($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotpre($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodfin($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodtip($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObserv($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForestcoscatPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForestcoscatPeer::CODCAT)) $criteria->add(ForestcoscatPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForestcoscatPeer::CODART)) $criteria->add(ForestcoscatPeer::CODART, $this->codart);
		if ($this->isColumnModified(ForestcoscatPeer::CODPAR)) $criteria->add(ForestcoscatPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(ForestcoscatPeer::CANUNI)) $criteria->add(ForestcoscatPeer::CANUNI, $this->canuni);
		if ($this->isColumnModified(ForestcoscatPeer::CANART)) $criteria->add(ForestcoscatPeer::CANART, $this->canart);
		if ($this->isColumnModified(ForestcoscatPeer::MONART)) $criteria->add(ForestcoscatPeer::MONART, $this->monart);
		if ($this->isColumnModified(ForestcoscatPeer::TOTPRE)) $criteria->add(ForestcoscatPeer::TOTPRE, $this->totpre);
		if ($this->isColumnModified(ForestcoscatPeer::CODFIN)) $criteria->add(ForestcoscatPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(ForestcoscatPeer::CODTIP)) $criteria->add(ForestcoscatPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(ForestcoscatPeer::OBSERV)) $criteria->add(ForestcoscatPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(ForestcoscatPeer::ID)) $criteria->add(ForestcoscatPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForestcoscatPeer::DATABASE_NAME);

		$criteria->add(ForestcoscatPeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCanuni($this->canuni);

		$copyObj->setCanart($this->canart);

		$copyObj->setMonart($this->monart);

		$copyObj->setTotpre($this->totpre);

		$copyObj->setCodfin($this->codfin);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setObserv($this->observ);


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
			self::$peer = new ForestcoscatPeer();
		}
		return self::$peer;
	}

} 