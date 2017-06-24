<?php


abstract class BaseManparfabcat extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $numpar;


	
	protected $codfab;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getNumpar()
  {

    return trim($this->numpar);

  }
  
  public function getCodfab()
  {

    return trim($this->codfab);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = ManparfabcatPeer::NUMSOL;
      }
  
	} 
	
	public function setNumpar($v)
	{

    if ($this->numpar !== $v) {
        $this->numpar = $v;
        $this->modifiedColumns[] = ManparfabcatPeer::NUMPAR;
      }
  
	} 
	
	public function setCodfab($v)
	{

    if ($this->codfab !== $v) {
        $this->codfab = $v;
        $this->modifiedColumns[] = ManparfabcatPeer::CODFAB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ManparfabcatPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->numpar = $rs->getString($startcol + 1);

      $this->codfab = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Manparfabcat object", $e);
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
			$con = Propel::getConnection(ManparfabcatPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ManparfabcatPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ManparfabcatPeer::DATABASE_NAME);
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
					$pk = ManparfabcatPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ManparfabcatPeer::doUpdate($this, $con);
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


			if (($retval = ManparfabcatPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManparfabcatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getNumpar();
				break;
			case 2:
				return $this->getCodfab();
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
		$keys = ManparfabcatPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getNumpar(),
			$keys[2] => $this->getCodfab(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManparfabcatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setNumpar($value);
				break;
			case 2:
				$this->setCodfab($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ManparfabcatPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumpar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodfab($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ManparfabcatPeer::DATABASE_NAME);

		if ($this->isColumnModified(ManparfabcatPeer::NUMSOL)) $criteria->add(ManparfabcatPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(ManparfabcatPeer::NUMPAR)) $criteria->add(ManparfabcatPeer::NUMPAR, $this->numpar);
		if ($this->isColumnModified(ManparfabcatPeer::CODFAB)) $criteria->add(ManparfabcatPeer::CODFAB, $this->codfab);
		if ($this->isColumnModified(ManparfabcatPeer::ID)) $criteria->add(ManparfabcatPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ManparfabcatPeer::DATABASE_NAME);

		$criteria->add(ManparfabcatPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setNumpar($this->numpar);

		$copyObj->setCodfab($this->codfab);


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
			self::$peer = new ManparfabcatPeer();
		}
		return self::$peer;
	}

} 