<?php


abstract class BaseFadetord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reford;


	
	protected $codart;


	
	protected $desart;


	
	protected $tiedur;


	
	protected $ejepor;


	
	protected $nuitem;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReford()
  {

    return trim($this->reford);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getTiedur()
  {

    return $this->tiedur;

  }
  
  public function getEjepor()
  {

    return trim($this->ejepor);

  }
  
  public function getNuitem()
  {

    return trim($this->nuitem);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReford($v)
	{

    if ($this->reford !== $v) {
        $this->reford = $v;
        $this->modifiedColumns[] = FadetordPeer::REFORD;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FadetordPeer::CODART;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = FadetordPeer::DESART;
      }
  
	} 
	
	public function setTiedur($v)
	{

    if ($this->tiedur !== $v) {
        $this->tiedur = $v;
        $this->modifiedColumns[] = FadetordPeer::TIEDUR;
      }
  
	} 
	
	public function setEjepor($v)
	{

    if ($this->ejepor !== $v) {
        $this->ejepor = $v;
        $this->modifiedColumns[] = FadetordPeer::EJEPOR;
      }
  
	} 
	
	public function setNuitem($v)
	{

    if ($this->nuitem !== $v) {
        $this->nuitem = $v;
        $this->modifiedColumns[] = FadetordPeer::NUITEM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadetordPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reford = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->desart = $rs->getString($startcol + 2);

      $this->tiedur = $rs->getInt($startcol + 3);

      $this->ejepor = $rs->getString($startcol + 4);

      $this->nuitem = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadetord object", $e);
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
			$con = Propel::getConnection(FadetordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadetordPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadetordPeer::DATABASE_NAME);
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
					$pk = FadetordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadetordPeer::doUpdate($this, $con);
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


			if (($retval = FadetordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadetordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReford();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getDesart();
				break;
			case 3:
				return $this->getTiedur();
				break;
			case 4:
				return $this->getEjepor();
				break;
			case 5:
				return $this->getNuitem();
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
		$keys = FadetordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReford(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getDesart(),
			$keys[3] => $this->getTiedur(),
			$keys[4] => $this->getEjepor(),
			$keys[5] => $this->getNuitem(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadetordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReford($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setDesart($value);
				break;
			case 3:
				$this->setTiedur($value);
				break;
			case 4:
				$this->setEjepor($value);
				break;
			case 5:
				$this->setNuitem($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadetordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReford($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTiedur($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEjepor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNuitem($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadetordPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadetordPeer::REFORD)) $criteria->add(FadetordPeer::REFORD, $this->reford);
		if ($this->isColumnModified(FadetordPeer::CODART)) $criteria->add(FadetordPeer::CODART, $this->codart);
		if ($this->isColumnModified(FadetordPeer::DESART)) $criteria->add(FadetordPeer::DESART, $this->desart);
		if ($this->isColumnModified(FadetordPeer::TIEDUR)) $criteria->add(FadetordPeer::TIEDUR, $this->tiedur);
		if ($this->isColumnModified(FadetordPeer::EJEPOR)) $criteria->add(FadetordPeer::EJEPOR, $this->ejepor);
		if ($this->isColumnModified(FadetordPeer::NUITEM)) $criteria->add(FadetordPeer::NUITEM, $this->nuitem);
		if ($this->isColumnModified(FadetordPeer::ID)) $criteria->add(FadetordPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadetordPeer::DATABASE_NAME);

		$criteria->add(FadetordPeer::ID, $this->id);

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

		$copyObj->setReford($this->reford);

		$copyObj->setCodart($this->codart);

		$copyObj->setDesart($this->desart);

		$copyObj->setTiedur($this->tiedur);

		$copyObj->setEjepor($this->ejepor);

		$copyObj->setNuitem($this->nuitem);


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
			self::$peer = new FadetordPeer();
		}
		return self::$peer;
	}

} 