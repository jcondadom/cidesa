<?php


abstract class BaseFapreserart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpre;


	
	protected $codart;


	
	protected $codser;


	
	protected $uniser;


	
	protected $canser;


	
	protected $cosser;


	
	protected $totser;


	
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
  
  public function getCodser()
  {

    return trim($this->codser);

  }
  
  public function getUniser()
  {

    return trim($this->uniser);

  }
  
  public function getCanser($val=false)
  {

    if($val) return number_format($this->canser,2,',','.');
    else return $this->canser;

  }
  
  public function getCosser($val=false)
  {

    if($val) return number_format($this->cosser,2,',','.');
    else return $this->cosser;

  }
  
  public function getTotser($val=false)
  {

    if($val) return number_format($this->totser,2,',','.');
    else return $this->totser;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpre($v)
	{

    if ($this->refpre !== $v) {
        $this->refpre = $v;
        $this->modifiedColumns[] = FapreserartPeer::REFPRE;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FapreserartPeer::CODART;
      }
  
	} 
	
	public function setCodser($v)
	{

    if ($this->codser !== $v) {
        $this->codser = $v;
        $this->modifiedColumns[] = FapreserartPeer::CODSER;
      }
  
	} 
	
	public function setUniser($v)
	{

    if ($this->uniser !== $v) {
        $this->uniser = $v;
        $this->modifiedColumns[] = FapreserartPeer::UNISER;
      }
  
	} 
	
	public function setCanser($v)
	{

    if ($this->canser !== $v) {
        $this->canser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapreserartPeer::CANSER;
      }
  
	} 
	
	public function setCosser($v)
	{

    if ($this->cosser !== $v) {
        $this->cosser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapreserartPeer::COSSER;
      }
  
	} 
	
	public function setTotser($v)
	{

    if ($this->totser !== $v) {
        $this->totser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapreserartPeer::TOTSER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FapreserartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpre = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codser = $rs->getString($startcol + 2);

      $this->uniser = $rs->getString($startcol + 3);

      $this->canser = $rs->getFloat($startcol + 4);

      $this->cosser = $rs->getFloat($startcol + 5);

      $this->totser = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fapreserart object", $e);
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
			$con = Propel::getConnection(FapreserartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FapreserartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FapreserartPeer::DATABASE_NAME);
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
					$pk = FapreserartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FapreserartPeer::doUpdate($this, $con);
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


			if (($retval = FapreserartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapreserartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodser();
				break;
			case 3:
				return $this->getUniser();
				break;
			case 4:
				return $this->getCanser();
				break;
			case 5:
				return $this->getCosser();
				break;
			case 6:
				return $this->getTotser();
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
		$keys = FapreserartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpre(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodser(),
			$keys[3] => $this->getUniser(),
			$keys[4] => $this->getCanser(),
			$keys[5] => $this->getCosser(),
			$keys[6] => $this->getTotser(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapreserartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodser($value);
				break;
			case 3:
				$this->setUniser($value);
				break;
			case 4:
				$this->setCanser($value);
				break;
			case 5:
				$this->setCosser($value);
				break;
			case 6:
				$this->setTotser($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapreserartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodser($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUniser($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanser($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCosser($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotser($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FapreserartPeer::DATABASE_NAME);

		if ($this->isColumnModified(FapreserartPeer::REFPRE)) $criteria->add(FapreserartPeer::REFPRE, $this->refpre);
		if ($this->isColumnModified(FapreserartPeer::CODART)) $criteria->add(FapreserartPeer::CODART, $this->codart);
		if ($this->isColumnModified(FapreserartPeer::CODSER)) $criteria->add(FapreserartPeer::CODSER, $this->codser);
		if ($this->isColumnModified(FapreserartPeer::UNISER)) $criteria->add(FapreserartPeer::UNISER, $this->uniser);
		if ($this->isColumnModified(FapreserartPeer::CANSER)) $criteria->add(FapreserartPeer::CANSER, $this->canser);
		if ($this->isColumnModified(FapreserartPeer::COSSER)) $criteria->add(FapreserartPeer::COSSER, $this->cosser);
		if ($this->isColumnModified(FapreserartPeer::TOTSER)) $criteria->add(FapreserartPeer::TOTSER, $this->totser);
		if ($this->isColumnModified(FapreserartPeer::ID)) $criteria->add(FapreserartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FapreserartPeer::DATABASE_NAME);

		$criteria->add(FapreserartPeer::ID, $this->id);

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

		$copyObj->setCodser($this->codser);

		$copyObj->setUniser($this->uniser);

		$copyObj->setCanser($this->canser);

		$copyObj->setCosser($this->cosser);

		$copyObj->setTotser($this->totser);


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
			self::$peer = new FapreserartPeer();
		}
		return self::$peer;
	}

} 