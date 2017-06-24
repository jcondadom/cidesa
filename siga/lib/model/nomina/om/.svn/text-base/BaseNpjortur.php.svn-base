<?php


abstract class BaseNpjortur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codjor;


	
	protected $desjor;


	
	protected $horini;


	
	protected $horfin;


	
	protected $numhor;


	
	protected $jorlab;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodjor()
  {

    return trim($this->codjor);

  }
  
  public function getDesjor()
  {

    return trim($this->desjor);

  }
  
  public function getHorini()
  {

    return trim($this->horini);

  }
  
  public function getHorfin()
  {

    return trim($this->horfin);

  }
  
  public function getNumhor()
  {

    return trim($this->numhor);

  }
  
  public function getJorlab()
  {

    return trim($this->jorlab);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodjor($v)
	{

    if ($this->codjor !== $v) {
        $this->codjor = $v;
        $this->modifiedColumns[] = NpjorturPeer::CODJOR;
      }
  
	} 
	
	public function setDesjor($v)
	{

    if ($this->desjor !== $v) {
        $this->desjor = $v;
        $this->modifiedColumns[] = NpjorturPeer::DESJOR;
      }
  
	} 
	
	public function setHorini($v)
	{

    if ($this->horini !== $v) {
        $this->horini = $v;
        $this->modifiedColumns[] = NpjorturPeer::HORINI;
      }
  
	} 
	
	public function setHorfin($v)
	{

    if ($this->horfin !== $v) {
        $this->horfin = $v;
        $this->modifiedColumns[] = NpjorturPeer::HORFIN;
      }
  
	} 
	
	public function setNumhor($v)
	{

    if ($this->numhor !== $v) {
        $this->numhor = $v;
        $this->modifiedColumns[] = NpjorturPeer::NUMHOR;
      }
  
	} 
	
	public function setJorlab($v)
	{

    if ($this->jorlab !== $v) {
        $this->jorlab = $v;
        $this->modifiedColumns[] = NpjorturPeer::JORLAB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpjorturPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codjor = $rs->getString($startcol + 0);

      $this->desjor = $rs->getString($startcol + 1);

      $this->horini = $rs->getString($startcol + 2);

      $this->horfin = $rs->getString($startcol + 3);

      $this->numhor = $rs->getString($startcol + 4);

      $this->jorlab = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npjortur object", $e);
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
			$con = Propel::getConnection(NpjorturPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpjorturPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpjorturPeer::DATABASE_NAME);
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
					$pk = NpjorturPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpjorturPeer::doUpdate($this, $con);
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


			if (($retval = NpjorturPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpjorturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodjor();
				break;
			case 1:
				return $this->getDesjor();
				break;
			case 2:
				return $this->getHorini();
				break;
			case 3:
				return $this->getHorfin();
				break;
			case 4:
				return $this->getNumhor();
				break;
			case 5:
				return $this->getJorlab();
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
		$keys = NpjorturPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodjor(),
			$keys[1] => $this->getDesjor(),
			$keys[2] => $this->getHorini(),
			$keys[3] => $this->getHorfin(),
			$keys[4] => $this->getNumhor(),
			$keys[5] => $this->getJorlab(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpjorturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodjor($value);
				break;
			case 1:
				$this->setDesjor($value);
				break;
			case 2:
				$this->setHorini($value);
				break;
			case 3:
				$this->setHorfin($value);
				break;
			case 4:
				$this->setNumhor($value);
				break;
			case 5:
				$this->setJorlab($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpjorturPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodjor($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesjor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHorini($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHorfin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumhor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setJorlab($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpjorturPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpjorturPeer::CODJOR)) $criteria->add(NpjorturPeer::CODJOR, $this->codjor);
		if ($this->isColumnModified(NpjorturPeer::DESJOR)) $criteria->add(NpjorturPeer::DESJOR, $this->desjor);
		if ($this->isColumnModified(NpjorturPeer::HORINI)) $criteria->add(NpjorturPeer::HORINI, $this->horini);
		if ($this->isColumnModified(NpjorturPeer::HORFIN)) $criteria->add(NpjorturPeer::HORFIN, $this->horfin);
		if ($this->isColumnModified(NpjorturPeer::NUMHOR)) $criteria->add(NpjorturPeer::NUMHOR, $this->numhor);
		if ($this->isColumnModified(NpjorturPeer::JORLAB)) $criteria->add(NpjorturPeer::JORLAB, $this->jorlab);
		if ($this->isColumnModified(NpjorturPeer::ID)) $criteria->add(NpjorturPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpjorturPeer::DATABASE_NAME);

		$criteria->add(NpjorturPeer::ID, $this->id);

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

		$copyObj->setCodjor($this->codjor);

		$copyObj->setDesjor($this->desjor);

		$copyObj->setHorini($this->horini);

		$copyObj->setHorfin($this->horfin);

		$copyObj->setNumhor($this->numhor);

		$copyObj->setJorlab($this->jorlab);


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
			self::$peer = new NpjorturPeer();
		}
		return self::$peer;
	}

} 