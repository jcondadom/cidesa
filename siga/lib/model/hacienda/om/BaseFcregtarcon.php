<?php


abstract class BaseFcregtarcon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcarinm;


	
	protected $codusoinm;


	
	protected $escdes;


	
	protected $eschas;


	
	protected $alicuota;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcarinm()
  {

    return trim($this->codcarinm);

  }
  
  public function getCodusoinm()
  {

    return trim($this->codusoinm);

  }
  
  public function getEscdes($val=false)
  {

    if($val) return number_format($this->escdes,2,',','.');
    else return $this->escdes;

  }
  
  public function getEschas($val=false)
  {

    if($val) return number_format($this->eschas,2,',','.');
    else return $this->eschas;

  }
  
  public function getAlicuota($val=false)
  {

    if($val) return number_format($this->alicuota,2,',','.');
    else return $this->alicuota;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcarinm($v)
	{

    if ($this->codcarinm !== $v) {
        $this->codcarinm = $v;
        $this->modifiedColumns[] = FcregtarconPeer::CODCARINM;
      }
  
	} 
	
	public function setCodusoinm($v)
	{

    if ($this->codusoinm !== $v) {
        $this->codusoinm = $v;
        $this->modifiedColumns[] = FcregtarconPeer::CODUSOINM;
      }
  
	} 
	
	public function setEscdes($v)
	{

    if ($this->escdes !== $v) {
        $this->escdes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcregtarconPeer::ESCDES;
      }
  
	} 
	
	public function setEschas($v)
	{

    if ($this->eschas !== $v) {
        $this->eschas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcregtarconPeer::ESCHAS;
      }
  
	} 
	
	public function setAlicuota($v)
	{

    if ($this->alicuota !== $v) {
        $this->alicuota = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcregtarconPeer::ALICUOTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcregtarconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcarinm = $rs->getString($startcol + 0);

      $this->codusoinm = $rs->getString($startcol + 1);

      $this->escdes = $rs->getFloat($startcol + 2);

      $this->eschas = $rs->getFloat($startcol + 3);

      $this->alicuota = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcregtarcon object", $e);
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
			$con = Propel::getConnection(FcregtarconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcregtarconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcregtarconPeer::DATABASE_NAME);
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
					$pk = FcregtarconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcregtarconPeer::doUpdate($this, $con);
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


			if (($retval = FcregtarconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcregtarconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcarinm();
				break;
			case 1:
				return $this->getCodusoinm();
				break;
			case 2:
				return $this->getEscdes();
				break;
			case 3:
				return $this->getEschas();
				break;
			case 4:
				return $this->getAlicuota();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcregtarconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcarinm(),
			$keys[1] => $this->getCodusoinm(),
			$keys[2] => $this->getEscdes(),
			$keys[3] => $this->getEschas(),
			$keys[4] => $this->getAlicuota(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcregtarconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcarinm($value);
				break;
			case 1:
				$this->setCodusoinm($value);
				break;
			case 2:
				$this->setEscdes($value);
				break;
			case 3:
				$this->setEschas($value);
				break;
			case 4:
				$this->setAlicuota($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcregtarconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcarinm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodusoinm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEscdes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEschas($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAlicuota($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcregtarconPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcregtarconPeer::CODCARINM)) $criteria->add(FcregtarconPeer::CODCARINM, $this->codcarinm);
		if ($this->isColumnModified(FcregtarconPeer::CODUSOINM)) $criteria->add(FcregtarconPeer::CODUSOINM, $this->codusoinm);
		if ($this->isColumnModified(FcregtarconPeer::ESCDES)) $criteria->add(FcregtarconPeer::ESCDES, $this->escdes);
		if ($this->isColumnModified(FcregtarconPeer::ESCHAS)) $criteria->add(FcregtarconPeer::ESCHAS, $this->eschas);
		if ($this->isColumnModified(FcregtarconPeer::ALICUOTA)) $criteria->add(FcregtarconPeer::ALICUOTA, $this->alicuota);
		if ($this->isColumnModified(FcregtarconPeer::ID)) $criteria->add(FcregtarconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcregtarconPeer::DATABASE_NAME);

		$criteria->add(FcregtarconPeer::ID, $this->id);

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

		$copyObj->setCodcarinm($this->codcarinm);

		$copyObj->setCodusoinm($this->codusoinm);

		$copyObj->setEscdes($this->escdes);

		$copyObj->setEschas($this->eschas);

		$copyObj->setAlicuota($this->alicuota);


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
			self::$peer = new FcregtarconPeer();
		}
		return self::$peer;
	}

} 