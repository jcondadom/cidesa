<?php


abstract class BaseNpdefsitent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsitent;


	
	protected $dessitent;


	
	protected $dirent;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodsitent()
  {

    return trim($this->codsitent);

  }
  
  public function getDessitent()
  {

    return trim($this->dessitent);

  }
  
  public function getDirent()
  {

    return trim($this->dirent);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodsitent($v)
	{

    if ($this->codsitent !== $v) {
        $this->codsitent = $v;
        $this->modifiedColumns[] = NpdefsitentPeer::CODSITENT;
      }
  
	} 
	
	public function setDessitent($v)
	{

    if ($this->dessitent !== $v) {
        $this->dessitent = $v;
        $this->modifiedColumns[] = NpdefsitentPeer::DESSITENT;
      }
  
	} 
	
	public function setDirent($v)
	{

    if ($this->dirent !== $v) {
        $this->dirent = $v;
        $this->modifiedColumns[] = NpdefsitentPeer::DIRENT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdefsitentPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codsitent = $rs->getString($startcol + 0);

      $this->dessitent = $rs->getString($startcol + 1);

      $this->dirent = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdefsitent object", $e);
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
			$con = Propel::getConnection(NpdefsitentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefsitentPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefsitentPeer::DATABASE_NAME);
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
					$pk = NpdefsitentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdefsitentPeer::doUpdate($this, $con);
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


			if (($retval = NpdefsitentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefsitentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsitent();
				break;
			case 1:
				return $this->getDessitent();
				break;
			case 2:
				return $this->getDirent();
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
		$keys = NpdefsitentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsitent(),
			$keys[1] => $this->getDessitent(),
			$keys[2] => $this->getDirent(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefsitentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsitent($value);
				break;
			case 1:
				$this->setDessitent($value);
				break;
			case 2:
				$this->setDirent($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefsitentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsitent($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDessitent($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirent($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefsitentPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefsitentPeer::CODSITENT)) $criteria->add(NpdefsitentPeer::CODSITENT, $this->codsitent);
		if ($this->isColumnModified(NpdefsitentPeer::DESSITENT)) $criteria->add(NpdefsitentPeer::DESSITENT, $this->dessitent);
		if ($this->isColumnModified(NpdefsitentPeer::DIRENT)) $criteria->add(NpdefsitentPeer::DIRENT, $this->dirent);
		if ($this->isColumnModified(NpdefsitentPeer::ID)) $criteria->add(NpdefsitentPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefsitentPeer::DATABASE_NAME);

		$criteria->add(NpdefsitentPeer::ID, $this->id);

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

		$copyObj->setCodsitent($this->codsitent);

		$copyObj->setDessitent($this->dessitent);

		$copyObj->setDirent($this->dirent);


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
			self::$peer = new NpdefsitentPeer();
		}
		return self::$peer;
	}

} 