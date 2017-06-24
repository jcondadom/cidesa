<?php


abstract class BaseCosforpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codforpro;


	
	protected $desforpro;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodforpro()
  {

    return trim($this->codforpro);

  }
  
  public function getDesforpro()
  {

    return trim($this->desforpro);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodforpro($v)
	{

    if ($this->codforpro !== $v) {
        $this->codforpro = $v;
        $this->modifiedColumns[] = CosforproPeer::CODFORPRO;
      }
  
	} 
	
	public function setDesforpro($v)
	{

    if ($this->desforpro !== $v) {
        $this->desforpro = $v;
        $this->modifiedColumns[] = CosforproPeer::DESFORPRO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CosforproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codforpro = $rs->getString($startcol + 0);

      $this->desforpro = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cosforpro object", $e);
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
			$con = Propel::getConnection(CosforproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CosforproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CosforproPeer::DATABASE_NAME);
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
					$pk = CosforproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CosforproPeer::doUpdate($this, $con);
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


			if (($retval = CosforproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CosforproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodforpro();
				break;
			case 1:
				return $this->getDesforpro();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CosforproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodforpro(),
			$keys[1] => $this->getDesforpro(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CosforproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodforpro($value);
				break;
			case 1:
				$this->setDesforpro($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CosforproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodforpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesforpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CosforproPeer::DATABASE_NAME);

		if ($this->isColumnModified(CosforproPeer::CODFORPRO)) $criteria->add(CosforproPeer::CODFORPRO, $this->codforpro);
		if ($this->isColumnModified(CosforproPeer::DESFORPRO)) $criteria->add(CosforproPeer::DESFORPRO, $this->desforpro);
		if ($this->isColumnModified(CosforproPeer::ID)) $criteria->add(CosforproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CosforproPeer::DATABASE_NAME);

		$criteria->add(CosforproPeer::ID, $this->id);

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

		$copyObj->setCodforpro($this->codforpro);

		$copyObj->setDesforpro($this->desforpro);


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
			self::$peer = new CosforproPeer();
		}
		return self::$peer;
	}

} 