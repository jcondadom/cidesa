<?php


abstract class BaseNpdettur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtur;


	
	protected $codjor;


	
	protected $dia;


	
	protected $orden;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtur()
  {

    return trim($this->codtur);

  }
  
  public function getCodjor()
  {

    return trim($this->codjor);

  }
  
  public function getDia()
  {

    return $this->dia;

  }
  
  public function getOrden()
  {

    return trim($this->orden);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtur($v)
	{

    if ($this->codtur !== $v) {
        $this->codtur = $v;
        $this->modifiedColumns[] = NpdetturPeer::CODTUR;
      }
  
	} 
	
	public function setCodjor($v)
	{

    if ($this->codjor !== $v) {
        $this->codjor = $v;
        $this->modifiedColumns[] = NpdetturPeer::CODJOR;
      }
  
	} 
	
	public function setDia($v)
	{

    if ($this->dia !== $v) {
        $this->dia = $v;
        $this->modifiedColumns[] = NpdetturPeer::DIA;
      }
  
	} 
	
	public function setOrden($v)
	{

    if ($this->orden !== $v) {
        $this->orden = $v;
        $this->modifiedColumns[] = NpdetturPeer::ORDEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdetturPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtur = $rs->getString($startcol + 0);

      $this->codjor = $rs->getString($startcol + 1);

      $this->dia = $rs->getInt($startcol + 2);

      $this->orden = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdettur object", $e);
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
			$con = Propel::getConnection(NpdetturPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdetturPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdetturPeer::DATABASE_NAME);
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
					$pk = NpdetturPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdetturPeer::doUpdate($this, $con);
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


			if (($retval = NpdetturPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdetturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtur();
				break;
			case 1:
				return $this->getCodjor();
				break;
			case 2:
				return $this->getDia();
				break;
			case 3:
				return $this->getOrden();
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
		$keys = NpdetturPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtur(),
			$keys[1] => $this->getCodjor(),
			$keys[2] => $this->getDia(),
			$keys[3] => $this->getOrden(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdetturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtur($value);
				break;
			case 1:
				$this->setCodjor($value);
				break;
			case 2:
				$this->setDia($value);
				break;
			case 3:
				$this->setOrden($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdetturPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodjor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDia($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOrden($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdetturPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdetturPeer::CODTUR)) $criteria->add(NpdetturPeer::CODTUR, $this->codtur);
		if ($this->isColumnModified(NpdetturPeer::CODJOR)) $criteria->add(NpdetturPeer::CODJOR, $this->codjor);
		if ($this->isColumnModified(NpdetturPeer::DIA)) $criteria->add(NpdetturPeer::DIA, $this->dia);
		if ($this->isColumnModified(NpdetturPeer::ORDEN)) $criteria->add(NpdetturPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(NpdetturPeer::ID)) $criteria->add(NpdetturPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdetturPeer::DATABASE_NAME);

		$criteria->add(NpdetturPeer::ID, $this->id);

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

		$copyObj->setCodtur($this->codtur);

		$copyObj->setCodjor($this->codjor);

		$copyObj->setDia($this->dia);

		$copyObj->setOrden($this->orden);


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
			self::$peer = new NpdetturPeer();
		}
		return self::$peer;
	}

} 