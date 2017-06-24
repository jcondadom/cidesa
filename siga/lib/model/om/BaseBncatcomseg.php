<?php


abstract class BaseBncatcomseg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcom;


	
	protected $nomcom;


	
	protected $nompro;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcom()
  {

    return trim($this->codcom);

  }
  
  public function getNomcom()
  {

    return trim($this->nomcom);

  }
  
  public function getNompro()
  {

    return trim($this->nompro);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcom($v)
	{

    if ($this->codcom !== $v) {
        $this->codcom = strtoupper($v);
        $this->modifiedColumns[] = BncatcomsegPeer::CODCOM;
      }
  
	} 
	
	public function setNomcom($v)
	{

    if ($this->nomcom !== $v) {
        $this->nomcom = strtoupper($v);
        $this->modifiedColumns[] = BncatcomsegPeer::NOMCOM;
      }
  
	} 
	
	public function setNompro($v)
	{

    if ($this->nompro !== $v) {
        $this->nompro = strtoupper($v);
        $this->modifiedColumns[] = BncatcomsegPeer::NOMPRO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BncatcomsegPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcom = $rs->getString($startcol + 0);

      $this->nomcom = $rs->getString($startcol + 1);

      $this->nompro = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bncatcomseg object", $e);
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
			$con = Propel::getConnection(BncatcomsegPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BncatcomsegPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BncatcomsegPeer::DATABASE_NAME);
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
					$pk = BncatcomsegPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BncatcomsegPeer::doUpdate($this, $con);
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


			if (($retval = BncatcomsegPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BncatcomsegPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcom();
				break;
			case 1:
				return $this->getNomcom();
				break;
			case 2:
				return $this->getNompro();
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
		$keys = BncatcomsegPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcom(),
			$keys[1] => $this->getNomcom(),
			$keys[2] => $this->getNompro(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BncatcomsegPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcom($value);
				break;
			case 1:
				$this->setNomcom($value);
				break;
			case 2:
				$this->setNompro($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BncatcomsegPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNompro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BncatcomsegPeer::DATABASE_NAME);

		if ($this->isColumnModified(BncatcomsegPeer::CODCOM)) $criteria->add(BncatcomsegPeer::CODCOM, $this->codcom);
		if ($this->isColumnModified(BncatcomsegPeer::NOMCOM)) $criteria->add(BncatcomsegPeer::NOMCOM, $this->nomcom);
		if ($this->isColumnModified(BncatcomsegPeer::NOMPRO)) $criteria->add(BncatcomsegPeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(BncatcomsegPeer::ID)) $criteria->add(BncatcomsegPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BncatcomsegPeer::DATABASE_NAME);

		$criteria->add(BncatcomsegPeer::ID, $this->id);

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

		$copyObj->setCodcom($this->codcom);

		$copyObj->setNomcom($this->nomcom);

		$copyObj->setNompro($this->nompro);


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
			self::$peer = new BncatcomsegPeer();
		}
		return self::$peer;
	}

} 