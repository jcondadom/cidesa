<?php


abstract class BaseTsccilnmov extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcue;


	
	protected $mescon;


	
	protected $anocon;


	
	protected $status = 'A';


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getMescon()
  {

    return trim($this->mescon);

  }
  
  public function getAnocon()
  {

    return trim($this->anocon);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TsccilnmovPeer::NUMCUE;
      }
  
	} 
	
	public function setMescon($v)
	{

    if ($this->mescon !== $v) {
        $this->mescon = $v;
        $this->modifiedColumns[] = TsccilnmovPeer::MESCON;
      }
  
	} 
	
	public function setAnocon($v)
	{

    if ($this->anocon !== $v) {
        $this->anocon = $v;
        $this->modifiedColumns[] = TsccilnmovPeer::ANOCON;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v || $v === 'A') {
        $this->status = $v;
        $this->modifiedColumns[] = TsccilnmovPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsccilnmovPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcue = $rs->getString($startcol + 0);

      $this->mescon = $rs->getString($startcol + 1);

      $this->anocon = $rs->getString($startcol + 2);

      $this->status = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsccilnmov object", $e);
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
			$con = Propel::getConnection(TsccilnmovPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsccilnmovPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsccilnmovPeer::DATABASE_NAME);
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
					$pk = TsccilnmovPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsccilnmovPeer::doUpdate($this, $con);
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


			if (($retval = TsccilnmovPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsccilnmovPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcue();
				break;
			case 1:
				return $this->getMescon();
				break;
			case 2:
				return $this->getAnocon();
				break;
			case 3:
				return $this->getStatus();
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
		$keys = TsccilnmovPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcue(),
			$keys[1] => $this->getMescon(),
			$keys[2] => $this->getAnocon(),
			$keys[3] => $this->getStatus(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsccilnmovPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcue($value);
				break;
			case 1:
				$this->setMescon($value);
				break;
			case 2:
				$this->setAnocon($value);
				break;
			case 3:
				$this->setStatus($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsccilnmovPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMescon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnocon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStatus($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsccilnmovPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsccilnmovPeer::NUMCUE)) $criteria->add(TsccilnmovPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TsccilnmovPeer::MESCON)) $criteria->add(TsccilnmovPeer::MESCON, $this->mescon);
		if ($this->isColumnModified(TsccilnmovPeer::ANOCON)) $criteria->add(TsccilnmovPeer::ANOCON, $this->anocon);
		if ($this->isColumnModified(TsccilnmovPeer::STATUS)) $criteria->add(TsccilnmovPeer::STATUS, $this->status);
		if ($this->isColumnModified(TsccilnmovPeer::ID)) $criteria->add(TsccilnmovPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsccilnmovPeer::DATABASE_NAME);

		$criteria->add(TsccilnmovPeer::ID, $this->id);

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

		$copyObj->setNumcue($this->numcue);

		$copyObj->setMescon($this->mescon);

		$copyObj->setAnocon($this->anocon);

		$copyObj->setStatus($this->status);


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
			self::$peer = new TsccilnmovPeer();
		}
		return self::$peer;
	}

} 