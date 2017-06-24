<?php


abstract class BaseNpasiconparcar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcar;


	
	protected $codcon;


	
	protected $codpar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpasiconparcarPeer::CODCAR;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpasiconparcarPeer::CODCON;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = NpasiconparcarPeer::CODPAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpasiconparcarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcar = $rs->getString($startcol + 0);

      $this->codcon = $rs->getString($startcol + 1);

      $this->codpar = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npasiconparcar object", $e);
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
			$con = Propel::getConnection(NpasiconparcarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpasiconparcarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpasiconparcarPeer::DATABASE_NAME);
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
					$pk = NpasiconparcarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpasiconparcarPeer::doUpdate($this, $con);
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


			if (($retval = NpasiconparcarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiconparcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcar();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getCodpar();
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
		$keys = NpasiconparcarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcar(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getCodpar(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpasiconparcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcar($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setCodpar($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpasiconparcarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpasiconparcarPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpasiconparcarPeer::CODCAR)) $criteria->add(NpasiconparcarPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpasiconparcarPeer::CODCON)) $criteria->add(NpasiconparcarPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpasiconparcarPeer::CODPAR)) $criteria->add(NpasiconparcarPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(NpasiconparcarPeer::ID)) $criteria->add(NpasiconparcarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpasiconparcarPeer::DATABASE_NAME);

		$criteria->add(NpasiconparcarPeer::ID, $this->id);

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

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodpar($this->codpar);


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
			self::$peer = new NpasiconparcarPeer();
		}
		return self::$peer;
	}

} 