<?php


abstract class BaseNpinfapo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $tipben;


	
	protected $anno;


	
	protected $monpag;


	
	protected $sopcon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getTipben()
  {

    return trim($this->tipben);

  }
  
  public function getAnno()
  {

    return trim($this->anno);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getSopcon()
  {

    return trim($this->sopcon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinfapoPeer::CODEMP;
      }
  
	} 
	
	public function setTipben($v)
	{

    if ($this->tipben !== $v) {
        $this->tipben = $v;
        $this->modifiedColumns[] = NpinfapoPeer::TIPBEN;
      }
  
	} 
	
	public function setAnno($v)
	{

    if ($this->anno !== $v) {
        $this->anno = $v;
        $this->modifiedColumns[] = NpinfapoPeer::ANNO;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpinfapoPeer::MONPAG;
      }
  
	} 
	
	public function setSopcon($v)
	{

    if ($this->sopcon !== $v) {
        $this->sopcon = $v;
        $this->modifiedColumns[] = NpinfapoPeer::SOPCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinfapoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->tipben = $rs->getString($startcol + 1);

      $this->anno = $rs->getString($startcol + 2);

      $this->monpag = $rs->getFloat($startcol + 3);

      $this->sopcon = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinfapo object", $e);
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
			$con = Propel::getConnection(NpinfapoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfapoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfapoPeer::DATABASE_NAME);
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
					$pk = NpinfapoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinfapoPeer::doUpdate($this, $con);
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


			if (($retval = NpinfapoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfapoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getTipben();
				break;
			case 2:
				return $this->getAnno();
				break;
			case 3:
				return $this->getMonpag();
				break;
			case 4:
				return $this->getSopcon();
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
		$keys = NpinfapoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getTipben(),
			$keys[2] => $this->getAnno(),
			$keys[3] => $this->getMonpag(),
			$keys[4] => $this->getSopcon(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfapoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setTipben($value);
				break;
			case 2:
				$this->setAnno($value);
				break;
			case 3:
				$this->setMonpag($value);
				break;
			case 4:
				$this->setSopcon($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfapoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipben($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnno($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonpag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSopcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfapoPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfapoPeer::CODEMP)) $criteria->add(NpinfapoPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfapoPeer::TIPBEN)) $criteria->add(NpinfapoPeer::TIPBEN, $this->tipben);
		if ($this->isColumnModified(NpinfapoPeer::ANNO)) $criteria->add(NpinfapoPeer::ANNO, $this->anno);
		if ($this->isColumnModified(NpinfapoPeer::MONPAG)) $criteria->add(NpinfapoPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(NpinfapoPeer::SOPCON)) $criteria->add(NpinfapoPeer::SOPCON, $this->sopcon);
		if ($this->isColumnModified(NpinfapoPeer::ID)) $criteria->add(NpinfapoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfapoPeer::DATABASE_NAME);

		$criteria->add(NpinfapoPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setTipben($this->tipben);

		$copyObj->setAnno($this->anno);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setSopcon($this->sopcon);


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
			self::$peer = new NpinfapoPeer();
		}
		return self::$peer;
	}

} 