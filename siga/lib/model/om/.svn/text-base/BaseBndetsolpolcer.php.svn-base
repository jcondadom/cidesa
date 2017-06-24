<?php


abstract class BaseBndetsolpolcer extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $codact;


	
	protected $codmue;


	
	protected $monpri;


	
	protected $numdep;


	
	protected $mondep;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

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
  
  public function getNumdep()
  {

    return trim($this->numdep);

  }
  
  public function getMondep($val=false)
  {

    if($val) return number_format($this->mondep,2,',','.');
    else return $this->mondep;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = strtoupper($v);
        $this->modifiedColumns[] = BndetsolpolcerPeer::NUMSOL;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = strtoupper($v);
        $this->modifiedColumns[] = BndetsolpolcerPeer::CODACT;
      }
  
	} 
	
	public function setCodmue($v)
	{

    if ($this->codmue !== $v) {
        $this->codmue = strtoupper($v);
        $this->modifiedColumns[] = BndetsolpolcerPeer::CODMUE;
      }
  
	} 
	
	public function setMonpri($v)
	{

    if ($this->monpri !== $v) {
        $this->monpri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BndetsolpolcerPeer::MONPRI;
      }
  
	} 
	
	public function setNumdep($v)
	{

    if ($this->numdep !== $v) {
        $this->numdep = strtoupper($v);
        $this->modifiedColumns[] = BndetsolpolcerPeer::NUMDEP;
      }
  
	} 
	
	public function setMondep($v)
	{

    if ($this->mondep !== $v) {
        $this->mondep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BndetsolpolcerPeer::MONDEP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BndetsolpolcerPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->codact = $rs->getString($startcol + 1);

      $this->codmue = $rs->getString($startcol + 2);

      $this->monpri = $rs->getFloat($startcol + 3);

      $this->numdep = $rs->getString($startcol + 4);

      $this->mondep = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bndetsolpolcer object", $e);
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
			$con = Propel::getConnection(BndetsolpolcerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndetsolpolcerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndetsolpolcerPeer::DATABASE_NAME);
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
					$pk = BndetsolpolcerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BndetsolpolcerPeer::doUpdate($this, $con);
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


			if (($retval = BndetsolpolcerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndetsolpolcerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
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
				return $this->getNumdep();
				break;
			case 5:
				return $this->getMondep();
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
		$keys = BndetsolpolcerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getCodact(),
			$keys[2] => $this->getCodmue(),
			$keys[3] => $this->getMonpri(),
			$keys[4] => $this->getNumdep(),
			$keys[5] => $this->getMondep(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndetsolpolcerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
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
				$this->setNumdep($value);
				break;
			case 5:
				$this->setMondep($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndetsolpolcerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonpri($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumdep($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMondep($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndetsolpolcerPeer::DATABASE_NAME);

		if ($this->isColumnModified(BndetsolpolcerPeer::NUMSOL)) $criteria->add(BndetsolpolcerPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(BndetsolpolcerPeer::CODACT)) $criteria->add(BndetsolpolcerPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BndetsolpolcerPeer::CODMUE)) $criteria->add(BndetsolpolcerPeer::CODMUE, $this->codmue);
		if ($this->isColumnModified(BndetsolpolcerPeer::MONPRI)) $criteria->add(BndetsolpolcerPeer::MONPRI, $this->monpri);
		if ($this->isColumnModified(BndetsolpolcerPeer::NUMDEP)) $criteria->add(BndetsolpolcerPeer::NUMDEP, $this->numdep);
		if ($this->isColumnModified(BndetsolpolcerPeer::MONDEP)) $criteria->add(BndetsolpolcerPeer::MONDEP, $this->mondep);
		if ($this->isColumnModified(BndetsolpolcerPeer::ID)) $criteria->add(BndetsolpolcerPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndetsolpolcerPeer::DATABASE_NAME);

		$criteria->add(BndetsolpolcerPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setCodact($this->codact);

		$copyObj->setCodmue($this->codmue);

		$copyObj->setMonpri($this->monpri);

		$copyObj->setNumdep($this->numdep);

		$copyObj->setMondep($this->mondep);


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
			self::$peer = new BndetsolpolcerPeer();
		}
		return self::$peer;
	}

} 