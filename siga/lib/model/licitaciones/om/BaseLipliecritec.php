<?php


abstract class BaseLipliecritec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $codcri;


	
	protected $puntua;


	
	protected $porcen;


	
	protected $limita;


	
	protected $tipconpub;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumplie()
  {

    return trim($this->numplie);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getCodcri()
  {

    return trim($this->codcri);

  }
  
  public function getPuntua($val=false)
  {

    if($val) return number_format($this->puntua,2,',','.');
    else return $this->puntua;

  }
  
  public function getPorcen($val=false)
  {

    if($val) return number_format($this->porcen,2,',','.');
    else return $this->porcen;

  }
  
  public function getLimita()
  {

    return trim($this->limita);

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LipliecritecPeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LipliecritecPeer::NUMEXP;
      }
  
	} 
	
	public function setCodcri($v)
	{

    if ($this->codcri !== $v) {
        $this->codcri = $v;
        $this->modifiedColumns[] = LipliecritecPeer::CODCRI;
      }
  
	} 
	
	public function setPuntua($v)
	{

    if ($this->puntua !== $v) {
        $this->puntua = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LipliecritecPeer::PUNTUA;
      }
  
	} 
	
	public function setPorcen($v)
	{

    if ($this->porcen !== $v) {
        $this->porcen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LipliecritecPeer::PORCEN;
      }
  
	} 
	
	public function setLimita($v)
	{

    if ($this->limita !== $v) {
        $this->limita = $v;
        $this->modifiedColumns[] = LipliecritecPeer::LIMITA;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LipliecritecPeer::TIPCONPUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LipliecritecPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numplie = $rs->getString($startcol + 0);

      $this->numexp = $rs->getString($startcol + 1);

      $this->codcri = $rs->getString($startcol + 2);

      $this->puntua = $rs->getFloat($startcol + 3);

      $this->porcen = $rs->getFloat($startcol + 4);

      $this->limita = $rs->getString($startcol + 5);

      $this->tipconpub = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lipliecritec object", $e);
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
			$con = Propel::getConnection(LipliecritecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LipliecritecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LipliecritecPeer::DATABASE_NAME);
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
					$pk = LipliecritecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LipliecritecPeer::doUpdate($this, $con);
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


			if (($retval = LipliecritecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LipliecritecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumplie();
				break;
			case 1:
				return $this->getNumexp();
				break;
			case 2:
				return $this->getCodcri();
				break;
			case 3:
				return $this->getPuntua();
				break;
			case 4:
				return $this->getPorcen();
				break;
			case 5:
				return $this->getLimita();
				break;
			case 6:
				return $this->getTipconpub();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LipliecritecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumplie(),
			$keys[1] => $this->getNumexp(),
			$keys[2] => $this->getCodcri(),
			$keys[3] => $this->getPuntua(),
			$keys[4] => $this->getPorcen(),
			$keys[5] => $this->getLimita(),
			$keys[6] => $this->getTipconpub(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LipliecritecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumplie($value);
				break;
			case 1:
				$this->setNumexp($value);
				break;
			case 2:
				$this->setCodcri($value);
				break;
			case 3:
				$this->setPuntua($value);
				break;
			case 4:
				$this->setPorcen($value);
				break;
			case 5:
				$this->setLimita($value);
				break;
			case 6:
				$this->setTipconpub($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LipliecritecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumplie($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumexp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcri($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPuntua($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorcen($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLimita($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipconpub($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LipliecritecPeer::DATABASE_NAME);

		if ($this->isColumnModified(LipliecritecPeer::NUMPLIE)) $criteria->add(LipliecritecPeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LipliecritecPeer::NUMEXP)) $criteria->add(LipliecritecPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LipliecritecPeer::CODCRI)) $criteria->add(LipliecritecPeer::CODCRI, $this->codcri);
		if ($this->isColumnModified(LipliecritecPeer::PUNTUA)) $criteria->add(LipliecritecPeer::PUNTUA, $this->puntua);
		if ($this->isColumnModified(LipliecritecPeer::PORCEN)) $criteria->add(LipliecritecPeer::PORCEN, $this->porcen);
		if ($this->isColumnModified(LipliecritecPeer::LIMITA)) $criteria->add(LipliecritecPeer::LIMITA, $this->limita);
		if ($this->isColumnModified(LipliecritecPeer::TIPCONPUB)) $criteria->add(LipliecritecPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LipliecritecPeer::ID)) $criteria->add(LipliecritecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LipliecritecPeer::DATABASE_NAME);

		$criteria->add(LipliecritecPeer::ID, $this->id);

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

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodcri($this->codcri);

		$copyObj->setPuntua($this->puntua);

		$copyObj->setPorcen($this->porcen);

		$copyObj->setLimita($this->limita);

		$copyObj->setTipconpub($this->tipconpub);


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
			self::$peer = new LipliecritecPeer();
		}
		return self::$peer;
	}

} 