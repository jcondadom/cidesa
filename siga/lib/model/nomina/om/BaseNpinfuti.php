<?php


abstract class BaseNpinfuti extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $anno;


	
	protected $nrohij;


	
	protected $monpag;


	
	protected $sopcon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getAnno()
  {

    return trim($this->anno);

  }
  
  public function getNrohij()
  {

    return $this->nrohij;

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getSopcon()
  {

    return trim($this->sopcon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinfutiPeer::CODEMP;
      }
  
	} 
	
	public function setAnno($v)
	{

    if ($this->anno !== $v) {
        $this->anno = $v;
        $this->modifiedColumns[] = NpinfutiPeer::ANNO;
      }
  
	} 
	
	public function setNrohij($v)
	{

    if ($this->nrohij !== $v) {
        $this->nrohij = $v;
        $this->modifiedColumns[] = NpinfutiPeer::NROHIJ;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpinfutiPeer::MONPAG;
      }
  
	} 
	
	public function setSopcon($v)
	{

    if ($this->sopcon !== $v) {
        $this->sopcon = $v;
        $this->modifiedColumns[] = NpinfutiPeer::SOPCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinfutiPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->anno = $rs->getString($startcol + 1);

      $this->nrohij = $rs->getInt($startcol + 2);

      $this->monpag = $rs->getFloat($startcol + 3);

      $this->sopcon = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinfuti object", $e);
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
			$con = Propel::getConnection(NpinfutiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfutiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfutiPeer::DATABASE_NAME);
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
					$pk = NpinfutiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinfutiPeer::doUpdate($this, $con);
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


			if (($retval = NpinfutiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfutiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getAnno();
				break;
			case 2:
				return $this->getNrohij();
				break;
			case 3:
				return $this->getMonpag();
				break;
			case 4:
				return $this->getSopcon();
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
		$keys = NpinfutiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getAnno(),
			$keys[2] => $this->getNrohij(),
			$keys[3] => $this->getMonpag(),
			$keys[4] => $this->getSopcon(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfutiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setAnno($value);
				break;
			case 2:
				$this->setNrohij($value);
				break;
			case 3:
				$this->setMonpag($value);
				break;
			case 4:
				$this->setSopcon($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfutiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAnno($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNrohij($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonpag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSopcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfutiPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfutiPeer::CODEMP)) $criteria->add(NpinfutiPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfutiPeer::ANNO)) $criteria->add(NpinfutiPeer::ANNO, $this->anno);
		if ($this->isColumnModified(NpinfutiPeer::NROHIJ)) $criteria->add(NpinfutiPeer::NROHIJ, $this->nrohij);
		if ($this->isColumnModified(NpinfutiPeer::MONPAG)) $criteria->add(NpinfutiPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(NpinfutiPeer::SOPCON)) $criteria->add(NpinfutiPeer::SOPCON, $this->sopcon);
		if ($this->isColumnModified(NpinfutiPeer::ID)) $criteria->add(NpinfutiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfutiPeer::DATABASE_NAME);

		$criteria->add(NpinfutiPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setAnno($this->anno);

		$copyObj->setNrohij($this->nrohij);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setSopcon($this->sopcon);


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
			self::$peer = new NpinfutiPeer();
		}
		return self::$peer;
	}

} 