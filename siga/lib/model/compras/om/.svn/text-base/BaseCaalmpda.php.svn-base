<?php


abstract class BaseCaalmpda extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpda;


	
	protected $codart;


	
	protected $id_reg;


	
	protected $codalm;


	
	protected $codubi;


	
	protected $candis;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefpda()
  {

    return trim($this->refpda);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getIdReg()
  {

    return $this->id_reg;

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getCandis($val=false)
  {

    if($val) return number_format($this->candis,2,',','.');
    else return $this->candis;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpda($v)
	{

    if ($this->refpda !== $v) {
        $this->refpda = $v;
        $this->modifiedColumns[] = CaalmpdaPeer::REFPDA;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CaalmpdaPeer::CODART;
      }
  
	} 
	
	public function setIdReg($v)
	{

    if ($this->id_reg !== $v) {
        $this->id_reg = $v;
        $this->modifiedColumns[] = CaalmpdaPeer::ID_REG;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CaalmpdaPeer::CODALM;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CaalmpdaPeer::CODUBI;
      }
  
	} 
	
	public function setCandis($v)
	{

    if ($this->candis !== $v) {
        $this->candis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaalmpdaPeer::CANDIS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaalmpdaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpda = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->id_reg = $rs->getInt($startcol + 2);

      $this->codalm = $rs->getString($startcol + 3);

      $this->codubi = $rs->getString($startcol + 4);

      $this->candis = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caalmpda object", $e);
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
			$con = Propel::getConnection(CaalmpdaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaalmpdaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaalmpdaPeer::DATABASE_NAME);
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
					$pk = CaalmpdaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaalmpdaPeer::doUpdate($this, $con);
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


			if (($retval = CaalmpdaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaalmpdaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpda();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getIdReg();
				break;
			case 3:
				return $this->getCodalm();
				break;
			case 4:
				return $this->getCodubi();
				break;
			case 5:
				return $this->getCandis();
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
		$keys = CaalmpdaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpda(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getIdReg(),
			$keys[3] => $this->getCodalm(),
			$keys[4] => $this->getCodubi(),
			$keys[5] => $this->getCandis(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaalmpdaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpda($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setIdReg($value);
				break;
			case 3:
				$this->setCodalm($value);
				break;
			case 4:
				$this->setCodubi($value);
				break;
			case 5:
				$this->setCandis($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaalmpdaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpda($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdReg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodalm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodubi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCandis($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaalmpdaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaalmpdaPeer::REFPDA)) $criteria->add(CaalmpdaPeer::REFPDA, $this->refpda);
		if ($this->isColumnModified(CaalmpdaPeer::CODART)) $criteria->add(CaalmpdaPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaalmpdaPeer::ID_REG)) $criteria->add(CaalmpdaPeer::ID_REG, $this->id_reg);
		if ($this->isColumnModified(CaalmpdaPeer::CODALM)) $criteria->add(CaalmpdaPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CaalmpdaPeer::CODUBI)) $criteria->add(CaalmpdaPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CaalmpdaPeer::CANDIS)) $criteria->add(CaalmpdaPeer::CANDIS, $this->candis);
		if ($this->isColumnModified(CaalmpdaPeer::ID)) $criteria->add(CaalmpdaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaalmpdaPeer::DATABASE_NAME);

		$criteria->add(CaalmpdaPeer::ID, $this->id);

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

		$copyObj->setRefpda($this->refpda);

		$copyObj->setCodart($this->codart);

		$copyObj->setIdReg($this->id_reg);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setCandis($this->candis);


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
			self::$peer = new CaalmpdaPeer();
		}
		return self::$peer;
	}

} 