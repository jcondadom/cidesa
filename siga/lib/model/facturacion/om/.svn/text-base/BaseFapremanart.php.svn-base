<?php


abstract class BaseFapremanart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpre;


	
	protected $codart;


	
	protected $codman;


	
	protected $uniman;


	
	protected $canman;


	
	protected $cosman;


	
	protected $totman;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefpre()
  {

    return trim($this->refpre);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodman()
  {

    return trim($this->codman);

  }
  
  public function getUniman()
  {

    return trim($this->uniman);

  }
  
  public function getCanman($val=false)
  {

    if($val) return number_format($this->canman,2,',','.');
    else return $this->canman;

  }
  
  public function getCosman($val=false)
  {

    if($val) return number_format($this->cosman,2,',','.');
    else return $this->cosman;

  }
  
  public function getTotman($val=false)
  {

    if($val) return number_format($this->totman,2,',','.');
    else return $this->totman;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpre($v)
	{

    if ($this->refpre !== $v) {
        $this->refpre = $v;
        $this->modifiedColumns[] = FapremanartPeer::REFPRE;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FapremanartPeer::CODART;
      }
  
	} 
	
	public function setCodman($v)
	{

    if ($this->codman !== $v) {
        $this->codman = $v;
        $this->modifiedColumns[] = FapremanartPeer::CODMAN;
      }
  
	} 
	
	public function setUniman($v)
	{

    if ($this->uniman !== $v) {
        $this->uniman = $v;
        $this->modifiedColumns[] = FapremanartPeer::UNIMAN;
      }
  
	} 
	
	public function setCanman($v)
	{

    if ($this->canman !== $v) {
        $this->canman = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapremanartPeer::CANMAN;
      }
  
	} 
	
	public function setCosman($v)
	{

    if ($this->cosman !== $v) {
        $this->cosman = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapremanartPeer::COSMAN;
      }
  
	} 
	
	public function setTotman($v)
	{

    if ($this->totman !== $v) {
        $this->totman = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapremanartPeer::TOTMAN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FapremanartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpre = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codman = $rs->getString($startcol + 2);

      $this->uniman = $rs->getString($startcol + 3);

      $this->canman = $rs->getFloat($startcol + 4);

      $this->cosman = $rs->getFloat($startcol + 5);

      $this->totman = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fapremanart object", $e);
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
			$con = Propel::getConnection(FapremanartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FapremanartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FapremanartPeer::DATABASE_NAME);
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
					$pk = FapremanartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FapremanartPeer::doUpdate($this, $con);
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


			if (($retval = FapremanartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapremanartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpre();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodman();
				break;
			case 3:
				return $this->getUniman();
				break;
			case 4:
				return $this->getCanman();
				break;
			case 5:
				return $this->getCosman();
				break;
			case 6:
				return $this->getTotman();
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
		$keys = FapremanartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpre(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodman(),
			$keys[3] => $this->getUniman(),
			$keys[4] => $this->getCanman(),
			$keys[5] => $this->getCosman(),
			$keys[6] => $this->getTotman(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapremanartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpre($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodman($value);
				break;
			case 3:
				$this->setUniman($value);
				break;
			case 4:
				$this->setCanman($value);
				break;
			case 5:
				$this->setCosman($value);
				break;
			case 6:
				$this->setTotman($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapremanartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodman($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUniman($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanman($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCosman($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotman($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FapremanartPeer::DATABASE_NAME);

		if ($this->isColumnModified(FapremanartPeer::REFPRE)) $criteria->add(FapremanartPeer::REFPRE, $this->refpre);
		if ($this->isColumnModified(FapremanartPeer::CODART)) $criteria->add(FapremanartPeer::CODART, $this->codart);
		if ($this->isColumnModified(FapremanartPeer::CODMAN)) $criteria->add(FapremanartPeer::CODMAN, $this->codman);
		if ($this->isColumnModified(FapremanartPeer::UNIMAN)) $criteria->add(FapremanartPeer::UNIMAN, $this->uniman);
		if ($this->isColumnModified(FapremanartPeer::CANMAN)) $criteria->add(FapremanartPeer::CANMAN, $this->canman);
		if ($this->isColumnModified(FapremanartPeer::COSMAN)) $criteria->add(FapremanartPeer::COSMAN, $this->cosman);
		if ($this->isColumnModified(FapremanartPeer::TOTMAN)) $criteria->add(FapremanartPeer::TOTMAN, $this->totman);
		if ($this->isColumnModified(FapremanartPeer::ID)) $criteria->add(FapremanartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FapremanartPeer::DATABASE_NAME);

		$criteria->add(FapremanartPeer::ID, $this->id);

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

		$copyObj->setRefpre($this->refpre);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodman($this->codman);

		$copyObj->setUniman($this->uniman);

		$copyObj->setCanman($this->canman);

		$copyObj->setCosman($this->cosman);

		$copyObj->setTotman($this->totman);


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
			self::$peer = new FapremanartPeer();
		}
		return self::$peer;
	}

} 