<?php


abstract class BaseVianivpri extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpri;


	
	protected $codniv;


	
	protected $monpor;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpri()
  {

    return trim($this->codpri);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getMonpor($val=false)
  {

    if($val) return number_format($this->monpor,2,',','.');
    else return $this->monpor;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpri($v)
	{

    if ($this->codpri !== $v) {
        $this->codpri = $v;
        $this->modifiedColumns[] = VianivpriPeer::CODPRI;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = VianivpriPeer::CODNIV;
      }
  
	} 
	
	public function setMonpor($v)
	{

    if ($this->monpor !== $v) {
        $this->monpor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = VianivpriPeer::MONPOR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = VianivpriPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpri = $rs->getString($startcol + 0);

      $this->codniv = $rs->getString($startcol + 1);

      $this->monpor = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Vianivpri object", $e);
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
			$con = Propel::getConnection(VianivpriPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			VianivpriPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(VianivpriPeer::DATABASE_NAME);
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
					$pk = VianivpriPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += VianivpriPeer::doUpdate($this, $con);
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


			if (($retval = VianivpriPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = VianivpriPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpri();
				break;
			case 1:
				return $this->getCodniv();
				break;
			case 2:
				return $this->getMonpor();
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
		$keys = VianivpriPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpri(),
			$keys[1] => $this->getCodniv(),
			$keys[2] => $this->getMonpor(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = VianivpriPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpri($value);
				break;
			case 1:
				$this->setCodniv($value);
				break;
			case 2:
				$this->setMonpor($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = VianivpriPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpri($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodniv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonpor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(VianivpriPeer::DATABASE_NAME);

		if ($this->isColumnModified(VianivpriPeer::CODPRI)) $criteria->add(VianivpriPeer::CODPRI, $this->codpri);
		if ($this->isColumnModified(VianivpriPeer::CODNIV)) $criteria->add(VianivpriPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(VianivpriPeer::MONPOR)) $criteria->add(VianivpriPeer::MONPOR, $this->monpor);
		if ($this->isColumnModified(VianivpriPeer::ID)) $criteria->add(VianivpriPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(VianivpriPeer::DATABASE_NAME);

		$criteria->add(VianivpriPeer::ID, $this->id);

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

		$copyObj->setCodpri($this->codpri);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setMonpor($this->monpor);


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
			self::$peer = new VianivpriPeer();
		}
		return self::$peer;
	}

} 