<?php


abstract class BaseBndetregpolcer extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpol;


	
	protected $codact;


	
	protected $codmue;


	
	protected $monpri;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpol()
  {

    return trim($this->numpol);

  }
  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getCodmue()
  {

    return trim($this->codmue);

  }
  
  public function getMonpri($val=false)
  {

    if($val) return number_format($this->monpri,2,',','.');
    else return $this->monpri;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpol($v)
	{

    if ($this->numpol !== $v) {
        $this->numpol = strtoupper($v);
        $this->modifiedColumns[] = BndetregpolcerPeer::NUMPOL;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = strtoupper($v);
        $this->modifiedColumns[] = BndetregpolcerPeer::CODACT;
      }
  
	} 
	
	public function setCodmue($v)
	{

    if ($this->codmue !== $v) {
        $this->codmue = strtoupper($v);
        $this->modifiedColumns[] = BndetregpolcerPeer::CODMUE;
      }
  
	} 
	
	public function setMonpri($v)
	{

    if ($this->monpri !== $v) {
        $this->monpri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BndetregpolcerPeer::MONPRI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BndetregpolcerPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpol = $rs->getString($startcol + 0);

      $this->codact = $rs->getString($startcol + 1);

      $this->codmue = $rs->getString($startcol + 2);

      $this->monpri = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bndetregpolcer object", $e);
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
			$con = Propel::getConnection(BndetregpolcerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndetregpolcerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndetregpolcerPeer::DATABASE_NAME);
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
					$pk = BndetregpolcerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BndetregpolcerPeer::doUpdate($this, $con);
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


			if (($retval = BndetregpolcerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndetregpolcerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpol();
				break;
			case 1:
				return $this->getCodact();
				break;
			case 2:
				return $this->getCodmue();
				break;
			case 3:
				return $this->getMonpri();
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
		$keys = BndetregpolcerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpol(),
			$keys[1] => $this->getCodact(),
			$keys[2] => $this->getCodmue(),
			$keys[3] => $this->getMonpri(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndetregpolcerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpol($value);
				break;
			case 1:
				$this->setCodact($value);
				break;
			case 2:
				$this->setCodmue($value);
				break;
			case 3:
				$this->setMonpri($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndetregpolcerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonpri($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndetregpolcerPeer::DATABASE_NAME);

		if ($this->isColumnModified(BndetregpolcerPeer::NUMPOL)) $criteria->add(BndetregpolcerPeer::NUMPOL, $this->numpol);
		if ($this->isColumnModified(BndetregpolcerPeer::CODACT)) $criteria->add(BndetregpolcerPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BndetregpolcerPeer::CODMUE)) $criteria->add(BndetregpolcerPeer::CODMUE, $this->codmue);
		if ($this->isColumnModified(BndetregpolcerPeer::MONPRI)) $criteria->add(BndetregpolcerPeer::MONPRI, $this->monpri);
		if ($this->isColumnModified(BndetregpolcerPeer::ID)) $criteria->add(BndetregpolcerPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndetregpolcerPeer::DATABASE_NAME);

		$criteria->add(BndetregpolcerPeer::ID, $this->id);

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

		$copyObj->setNumpol($this->numpol);

		$copyObj->setCodact($this->codact);

		$copyObj->setCodmue($this->codmue);

		$copyObj->setMonpri($this->monpri);


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
			self::$peer = new BndetregpolcerPeer();
		}
		return self::$peer;
	}

} 