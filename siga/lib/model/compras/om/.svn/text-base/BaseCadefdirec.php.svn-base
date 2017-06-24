<?php


abstract class BaseCadefdirec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddirec;


	
	protected $desdirec;


	
	protected $codcat;


	
	protected $escentral = false;


	
	protected $corpta;


	
	protected $prepta;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getDesdirec()
  {

    return trim($this->desdirec);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getEscentral()
  {

    return $this->escentral;

  }
  
  public function getCorpta()
  {

    return $this->corpta;

  }
  
  public function getPrepta()
  {

    return trim($this->prepta);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = CadefdirecPeer::CODDIREC;
      }
  
	} 
	
	public function setDesdirec($v)
	{

    if ($this->desdirec !== $v) {
        $this->desdirec = $v;
        $this->modifiedColumns[] = CadefdirecPeer::DESDIREC;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = CadefdirecPeer::CODCAT;
      }
  
	} 
	
	public function setEscentral($v)
	{

    if ($this->escentral !== $v || $v === false) {
        $this->escentral = $v;
        $this->modifiedColumns[] = CadefdirecPeer::ESCENTRAL;
      }
  
	} 
	
	public function setCorpta($v)
	{

    if ($this->corpta !== $v) {
        $this->corpta = $v;
        $this->modifiedColumns[] = CadefdirecPeer::CORPTA;
      }
  
	} 
	
	public function setPrepta($v)
	{

    if ($this->prepta !== $v) {
        $this->prepta = $v;
        $this->modifiedColumns[] = CadefdirecPeer::PREPTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefdirecPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddirec = $rs->getString($startcol + 0);

      $this->desdirec = $rs->getString($startcol + 1);

      $this->codcat = $rs->getString($startcol + 2);

      $this->escentral = $rs->getBoolean($startcol + 3);

      $this->corpta = $rs->getInt($startcol + 4);

      $this->prepta = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefdirec object", $e);
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
			$con = Propel::getConnection(CadefdirecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefdirecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadefdirecPeer::DATABASE_NAME);
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
					$pk = CadefdirecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadefdirecPeer::doUpdate($this, $con);
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


			if (($retval = CadefdirecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefdirecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddirec();
				break;
			case 1:
				return $this->getDesdirec();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getEscentral();
				break;
			case 4:
				return $this->getCorpta();
				break;
			case 5:
				return $this->getPrepta();
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
		$keys = CadefdirecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddirec(),
			$keys[1] => $this->getDesdirec(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getEscentral(),
			$keys[4] => $this->getCorpta(),
			$keys[5] => $this->getPrepta(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefdirecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddirec($value);
				break;
			case 1:
				$this->setDesdirec($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setEscentral($value);
				break;
			case 4:
				$this->setCorpta($value);
				break;
			case 5:
				$this->setPrepta($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefdirecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddirec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesdirec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEscentral($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCorpta($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPrepta($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadefdirecPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefdirecPeer::CODDIREC)) $criteria->add(CadefdirecPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(CadefdirecPeer::DESDIREC)) $criteria->add(CadefdirecPeer::DESDIREC, $this->desdirec);
		if ($this->isColumnModified(CadefdirecPeer::CODCAT)) $criteria->add(CadefdirecPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CadefdirecPeer::ESCENTRAL)) $criteria->add(CadefdirecPeer::ESCENTRAL, $this->escentral);
		if ($this->isColumnModified(CadefdirecPeer::CORPTA)) $criteria->add(CadefdirecPeer::CORPTA, $this->corpta);
		if ($this->isColumnModified(CadefdirecPeer::PREPTA)) $criteria->add(CadefdirecPeer::PREPTA, $this->prepta);
		if ($this->isColumnModified(CadefdirecPeer::ID)) $criteria->add(CadefdirecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefdirecPeer::DATABASE_NAME);

		$criteria->add(CadefdirecPeer::ID, $this->id);

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

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setDesdirec($this->desdirec);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setEscentral($this->escentral);

		$copyObj->setCorpta($this->corpta);

		$copyObj->setPrepta($this->prepta);


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
			self::$peer = new CadefdirecPeer();
		}
		return self::$peer;
	}

} 