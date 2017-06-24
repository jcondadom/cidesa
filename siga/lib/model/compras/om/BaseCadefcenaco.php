<?php


abstract class BaseCadefcenaco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcenaco;


	
	protected $descenaco;


	
	protected $codpai;


	
	protected $codedo;


	
	protected $codciu;


	
	protected $codmun;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcenaco()
  {

    return trim($this->codcenaco);

  }
  
  public function getDescenaco()
  {

    return trim($this->descenaco);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcenaco($v)
	{

    if ($this->codcenaco !== $v) {
        $this->codcenaco = $v;
        $this->modifiedColumns[] = CadefcenacoPeer::CODCENACO;
      }
  
	} 
	
	public function setDescenaco($v)
	{

    if ($this->descenaco !== $v) {
        $this->descenaco = $v;
        $this->modifiedColumns[] = CadefcenacoPeer::DESCENACO;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = CadefcenacoPeer::CODPAI;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = CadefcenacoPeer::CODEDO;
      }
  
	} 
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = CadefcenacoPeer::CODCIU;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = CadefcenacoPeer::CODMUN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefcenacoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcenaco = $rs->getString($startcol + 0);

      $this->descenaco = $rs->getString($startcol + 1);

      $this->codpai = $rs->getString($startcol + 2);

      $this->codedo = $rs->getString($startcol + 3);

      $this->codciu = $rs->getString($startcol + 4);

      $this->codmun = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefcenaco object", $e);
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
			$con = Propel::getConnection(CadefcenacoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefcenacoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadefcenacoPeer::DATABASE_NAME);
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


												
			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CadefcenacoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadefcenacoPeer::doUpdate($this, $con);
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


												
			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}


			if (($retval = CadefcenacoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefcenacoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcenaco();
				break;
			case 1:
				return $this->getDescenaco();
				break;
			case 2:
				return $this->getCodpai();
				break;
			case 3:
				return $this->getCodedo();
				break;
			case 4:
				return $this->getCodciu();
				break;
			case 5:
				return $this->getCodmun();
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
		$keys = CadefcenacoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcenaco(),
			$keys[1] => $this->getDescenaco(),
			$keys[2] => $this->getCodpai(),
			$keys[3] => $this->getCodedo(),
			$keys[4] => $this->getCodciu(),
			$keys[5] => $this->getCodmun(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefcenacoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcenaco($value);
				break;
			case 1:
				$this->setDescenaco($value);
				break;
			case 2:
				$this->setCodpai($value);
				break;
			case 3:
				$this->setCodedo($value);
				break;
			case 4:
				$this->setCodciu($value);
				break;
			case 5:
				$this->setCodmun($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefcenacoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcenaco($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescenaco($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpai($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodedo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodciu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodmun($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadefcenacoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefcenacoPeer::CODCENACO)) $criteria->add(CadefcenacoPeer::CODCENACO, $this->codcenaco);
		if ($this->isColumnModified(CadefcenacoPeer::DESCENACO)) $criteria->add(CadefcenacoPeer::DESCENACO, $this->descenaco);
		if ($this->isColumnModified(CadefcenacoPeer::CODPAI)) $criteria->add(CadefcenacoPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(CadefcenacoPeer::CODEDO)) $criteria->add(CadefcenacoPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(CadefcenacoPeer::CODCIU)) $criteria->add(CadefcenacoPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(CadefcenacoPeer::CODMUN)) $criteria->add(CadefcenacoPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(CadefcenacoPeer::ID)) $criteria->add(CadefcenacoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefcenacoPeer::DATABASE_NAME);

		$criteria->add(CadefcenacoPeer::ID, $this->id);

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

		$copyObj->setCodcenaco($this->codcenaco);

		$copyObj->setDescenaco($this->descenaco);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodciu($this->codciu);

		$copyObj->setCodmun($this->codmun);


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
			self::$peer = new CadefcenacoPeer();
		}
		return self::$peer;
	}

} 