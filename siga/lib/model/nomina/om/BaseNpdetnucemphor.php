<?php


abstract class BaseNpdetnucemphor extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codniv;


	
	protected $codcon;


	
	protected $codemp;


	
	protected $canhor;


	
	protected $fecreg;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCanhor($val=false)
  {

    if($val) return number_format($this->canhor,2,',','.');
    else return $this->canhor;

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = NpdetnucemphorPeer::CODNIV;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpdetnucemphorPeer::CODCON;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpdetnucemphorPeer::CODEMP;
      }
  
	} 
	
	public function setCanhor($v)
	{

    if ($this->canhor !== $v) {
        $this->canhor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdetnucemphorPeer::CANHOR;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = NpdetnucemphorPeer::FECREG;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdetnucemphorPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codniv = $rs->getString($startcol + 0);

      $this->codcon = $rs->getString($startcol + 1);

      $this->codemp = $rs->getString($startcol + 2);

      $this->canhor = $rs->getFloat($startcol + 3);

      $this->fecreg = $rs->getDate($startcol + 4, null);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdetnucemphor object", $e);
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
			$con = Propel::getConnection(NpdetnucemphorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdetnucemphorPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdetnucemphorPeer::DATABASE_NAME);
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
					$pk = NpdetnucemphorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdetnucemphorPeer::doUpdate($this, $con);
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


			if (($retval = NpdetnucemphorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdetnucemphorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodniv();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getCodemp();
				break;
			case 3:
				return $this->getCanhor();
				break;
			case 4:
				return $this->getFecreg();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdetnucemphorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodniv(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getCodemp(),
			$keys[3] => $this->getCanhor(),
			$keys[4] => $this->getFecreg(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdetnucemphorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodniv($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setCodemp($value);
				break;
			case 3:
				$this->setCanhor($value);
				break;
			case 4:
				$this->setFecreg($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdetnucemphorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodniv($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanhor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecreg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdetnucemphorPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdetnucemphorPeer::CODNIV)) $criteria->add(NpdetnucemphorPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(NpdetnucemphorPeer::CODCON)) $criteria->add(NpdetnucemphorPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpdetnucemphorPeer::CODEMP)) $criteria->add(NpdetnucemphorPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpdetnucemphorPeer::CANHOR)) $criteria->add(NpdetnucemphorPeer::CANHOR, $this->canhor);
		if ($this->isColumnModified(NpdetnucemphorPeer::FECREG)) $criteria->add(NpdetnucemphorPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(NpdetnucemphorPeer::ID)) $criteria->add(NpdetnucemphorPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdetnucemphorPeer::DATABASE_NAME);

		$criteria->add(NpdetnucemphorPeer::ID, $this->id);

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

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCanhor($this->canhor);

		$copyObj->setFecreg($this->fecreg);


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
			self::$peer = new NpdetnucemphorPeer();
		}
		return self::$peer;
	}

} 