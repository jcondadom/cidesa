<?php


abstract class BaseViasolviabol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $apepercon;


	
	protected $nompercon;


	
	protected $cedpercon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getApepercon()
  {

    return trim($this->apepercon);

  }
  
  public function getNompercon()
  {

    return trim($this->nompercon);

  }
  
  public function getCedpercon()
  {

    return trim($this->cedpercon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = ViasolviabolPeer::NUMSOL;
      }
  
	} 
	
	public function setApepercon($v)
	{

    if ($this->apepercon !== $v) {
        $this->apepercon = $v;
        $this->modifiedColumns[] = ViasolviabolPeer::APEPERCON;
      }
  
	} 
	
	public function setNompercon($v)
	{

    if ($this->nompercon !== $v) {
        $this->nompercon = $v;
        $this->modifiedColumns[] = ViasolviabolPeer::NOMPERCON;
      }
  
	} 
	
	public function setCedpercon($v)
	{

    if ($this->cedpercon !== $v) {
        $this->cedpercon = $v;
        $this->modifiedColumns[] = ViasolviabolPeer::CEDPERCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViasolviabolPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->apepercon = $rs->getString($startcol + 1);

      $this->nompercon = $rs->getString($startcol + 2);

      $this->cedpercon = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viasolviabol object", $e);
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
			$con = Propel::getConnection(ViasolviabolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViasolviabolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViasolviabolPeer::DATABASE_NAME);
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
					$pk = ViasolviabolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViasolviabolPeer::doUpdate($this, $con);
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


			if (($retval = ViasolviabolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViasolviabolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getApepercon();
				break;
			case 2:
				return $this->getNompercon();
				break;
			case 3:
				return $this->getCedpercon();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViasolviabolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getApepercon(),
			$keys[2] => $this->getNompercon(),
			$keys[3] => $this->getCedpercon(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViasolviabolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setApepercon($value);
				break;
			case 2:
				$this->setNompercon($value);
				break;
			case 3:
				$this->setCedpercon($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViasolviabolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setApepercon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNompercon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedpercon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViasolviabolPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViasolviabolPeer::NUMSOL)) $criteria->add(ViasolviabolPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(ViasolviabolPeer::APEPERCON)) $criteria->add(ViasolviabolPeer::APEPERCON, $this->apepercon);
		if ($this->isColumnModified(ViasolviabolPeer::NOMPERCON)) $criteria->add(ViasolviabolPeer::NOMPERCON, $this->nompercon);
		if ($this->isColumnModified(ViasolviabolPeer::CEDPERCON)) $criteria->add(ViasolviabolPeer::CEDPERCON, $this->cedpercon);
		if ($this->isColumnModified(ViasolviabolPeer::ID)) $criteria->add(ViasolviabolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViasolviabolPeer::DATABASE_NAME);

		$criteria->add(ViasolviabolPeer::ID, $this->id);

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

		$copyObj->setApepercon($this->apepercon);

		$copyObj->setNompercon($this->nompercon);

		$copyObj->setCedpercon($this->cedpercon);


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
			self::$peer = new ViasolviabolPeer();
		}
		return self::$peer;
	}

} 