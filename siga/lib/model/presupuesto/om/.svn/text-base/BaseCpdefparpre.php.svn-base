<?php


abstract class BaseCpdefparpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codparpre;


	
	protected $nomparpre;


	
	protected $stagen;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodparpre()
  {

    return trim($this->codparpre);

  }
  
  public function getNomparpre()
  {

    return trim($this->nomparpre);

  }
  
  public function getStagen()
  {

    return trim($this->stagen);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodparpre($v)
	{

    if ($this->codparpre !== $v) {
        $this->codparpre = $v;
        $this->modifiedColumns[] = CpdefparprePeer::CODPARPRE;
      }
  
	} 
	
	public function setNomparpre($v)
	{

    if ($this->nomparpre !== $v) {
        $this->nomparpre = $v;
        $this->modifiedColumns[] = CpdefparprePeer::NOMPARPRE;
      }
  
	} 
	
	public function setStagen($v)
	{

    if ($this->stagen !== $v) {
        $this->stagen = $v;
        $this->modifiedColumns[] = CpdefparprePeer::STAGEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpdefparprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codparpre = $rs->getString($startcol + 0);

      $this->nomparpre = $rs->getString($startcol + 1);

      $this->stagen = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpdefparpre object", $e);
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
			$con = Propel::getConnection(CpdefparprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdefparprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdefparprePeer::DATABASE_NAME);
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
					$pk = CpdefparprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpdefparprePeer::doUpdate($this, $con);
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


			if (($retval = CpdefparprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdefparprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodparpre();
				break;
			case 1:
				return $this->getNomparpre();
				break;
			case 2:
				return $this->getStagen();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdefparprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodparpre(),
			$keys[1] => $this->getNomparpre(),
			$keys[2] => $this->getStagen(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdefparprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodparpre($value);
				break;
			case 1:
				$this->setNomparpre($value);
				break;
			case 2:
				$this->setStagen($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdefparprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodparpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomparpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStagen($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdefparprePeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdefparprePeer::CODPARPRE)) $criteria->add(CpdefparprePeer::CODPARPRE, $this->codparpre);
		if ($this->isColumnModified(CpdefparprePeer::NOMPARPRE)) $criteria->add(CpdefparprePeer::NOMPARPRE, $this->nomparpre);
		if ($this->isColumnModified(CpdefparprePeer::STAGEN)) $criteria->add(CpdefparprePeer::STAGEN, $this->stagen);
		if ($this->isColumnModified(CpdefparprePeer::ID)) $criteria->add(CpdefparprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdefparprePeer::DATABASE_NAME);

		$criteria->add(CpdefparprePeer::ID, $this->id);

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

		$copyObj->setCodparpre($this->codparpre);

		$copyObj->setNomparpre($this->nomparpre);

		$copyObj->setStagen($this->stagen);


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
			self::$peer = new CpdefparprePeer();
		}
		return self::$peer;
	}

} 