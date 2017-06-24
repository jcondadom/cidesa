<?php


abstract class BaseFamantartra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftar;


	
	protected $codart;


	
	protected $codman;


	
	protected $codemp;


	
	protected $horpla;


	
	protected $horeje;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReftar()
  {

    return trim($this->reftar);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodman()
  {

    return trim($this->codman);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getHorpla($val=false)
  {

    if($val) return number_format($this->horpla,2,',','.');
    else return $this->horpla;

  }
  
  public function getHoreje($val=false)
  {

    if($val) return number_format($this->horeje,2,',','.');
    else return $this->horeje;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReftar($v)
	{

    if ($this->reftar !== $v) {
        $this->reftar = $v;
        $this->modifiedColumns[] = FamantartraPeer::REFTAR;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FamantartraPeer::CODART;
      }
  
	} 
	
	public function setCodman($v)
	{

    if ($this->codman !== $v) {
        $this->codman = $v;
        $this->modifiedColumns[] = FamantartraPeer::CODMAN;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = FamantartraPeer::CODEMP;
      }
  
	} 
	
	public function setHorpla($v)
	{

    if ($this->horpla !== $v) {
        $this->horpla = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FamantartraPeer::HORPLA;
      }
  
	} 
	
	public function setHoreje($v)
	{

    if ($this->horeje !== $v) {
        $this->horeje = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FamantartraPeer::HOREJE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FamantartraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reftar = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codman = $rs->getString($startcol + 2);

      $this->codemp = $rs->getString($startcol + 3);

      $this->horpla = $rs->getFloat($startcol + 4);

      $this->horeje = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Famantartra object", $e);
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
			$con = Propel::getConnection(FamantartraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FamantartraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FamantartraPeer::DATABASE_NAME);
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
					$pk = FamantartraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FamantartraPeer::doUpdate($this, $con);
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


			if (($retval = FamantartraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FamantartraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftar();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodman();
				break;
			case 3:
				return $this->getCodemp();
				break;
			case 4:
				return $this->getHorpla();
				break;
			case 5:
				return $this->getHoreje();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FamantartraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftar(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodman(),
			$keys[3] => $this->getCodemp(),
			$keys[4] => $this->getHorpla(),
			$keys[5] => $this->getHoreje(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FamantartraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftar($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodman($value);
				break;
			case 3:
				$this->setCodemp($value);
				break;
			case 4:
				$this->setHorpla($value);
				break;
			case 5:
				$this->setHoreje($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FamantartraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodman($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHorpla($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHoreje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FamantartraPeer::DATABASE_NAME);

		if ($this->isColumnModified(FamantartraPeer::REFTAR)) $criteria->add(FamantartraPeer::REFTAR, $this->reftar);
		if ($this->isColumnModified(FamantartraPeer::CODART)) $criteria->add(FamantartraPeer::CODART, $this->codart);
		if ($this->isColumnModified(FamantartraPeer::CODMAN)) $criteria->add(FamantartraPeer::CODMAN, $this->codman);
		if ($this->isColumnModified(FamantartraPeer::CODEMP)) $criteria->add(FamantartraPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(FamantartraPeer::HORPLA)) $criteria->add(FamantartraPeer::HORPLA, $this->horpla);
		if ($this->isColumnModified(FamantartraPeer::HOREJE)) $criteria->add(FamantartraPeer::HOREJE, $this->horeje);
		if ($this->isColumnModified(FamantartraPeer::ID)) $criteria->add(FamantartraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FamantartraPeer::DATABASE_NAME);

		$criteria->add(FamantartraPeer::ID, $this->id);

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

		$copyObj->setReftar($this->reftar);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodman($this->codman);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setHorpla($this->horpla);

		$copyObj->setHoreje($this->horeje);


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
			self::$peer = new FamantartraPeer();
		}
		return self::$peer;
	}

} 