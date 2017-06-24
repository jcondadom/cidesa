<?php


abstract class BaseVianoemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rifnemp;


	
	protected $nomnemp;


	
	protected $dirnemp;


	
	protected $telnemp;


	
	protected $emanemp;


	
	protected $codban;


	
	protected $numcueb;


	
	protected $codniv;


	
	protected $codnivnemp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRifnemp()
  {

    return trim($this->rifnemp);

  }
  
  public function getNomnemp()
  {

    return trim($this->nomnemp);

  }
  
  public function getDirnemp()
  {

    return trim($this->dirnemp);

  }
  
  public function getTelnemp()
  {

    return trim($this->telnemp);

  }
  
  public function getEmanemp()
  {

    return trim($this->emanemp);

  }
  
  public function getCodban()
  {

    return trim($this->codban);

  }
  
  public function getNumcueb()
  {

    return trim($this->numcueb);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCodnivnemp()
  {

    return trim($this->codnivnemp);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRifnemp($v)
	{

    if ($this->rifnemp !== $v) {
        $this->rifnemp = $v;
        $this->modifiedColumns[] = VianoempPeer::RIFNEMP;
      }
  
	} 
	
	public function setNomnemp($v)
	{

    if ($this->nomnemp !== $v) {
        $this->nomnemp = $v;
        $this->modifiedColumns[] = VianoempPeer::NOMNEMP;
      }
  
	} 
	
	public function setDirnemp($v)
	{

    if ($this->dirnemp !== $v) {
        $this->dirnemp = $v;
        $this->modifiedColumns[] = VianoempPeer::DIRNEMP;
      }
  
	} 
	
	public function setTelnemp($v)
	{

    if ($this->telnemp !== $v) {
        $this->telnemp = $v;
        $this->modifiedColumns[] = VianoempPeer::TELNEMP;
      }
  
	} 
	
	public function setEmanemp($v)
	{

    if ($this->emanemp !== $v) {
        $this->emanemp = $v;
        $this->modifiedColumns[] = VianoempPeer::EMANEMP;
      }
  
	} 
	
	public function setCodban($v)
	{

    if ($this->codban !== $v) {
        $this->codban = $v;
        $this->modifiedColumns[] = VianoempPeer::CODBAN;
      }
  
	} 
	
	public function setNumcueb($v)
	{

    if ($this->numcueb !== $v) {
        $this->numcueb = $v;
        $this->modifiedColumns[] = VianoempPeer::NUMCUEB;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = VianoempPeer::CODNIV;
      }
  
	} 
	
	public function setCodnivnemp($v)
	{

    if ($this->codnivnemp !== $v) {
        $this->codnivnemp = $v;
        $this->modifiedColumns[] = VianoempPeer::CODNIVNEMP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = VianoempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->rifnemp = $rs->getString($startcol + 0);

      $this->nomnemp = $rs->getString($startcol + 1);

      $this->dirnemp = $rs->getString($startcol + 2);

      $this->telnemp = $rs->getString($startcol + 3);

      $this->emanemp = $rs->getString($startcol + 4);

      $this->codban = $rs->getString($startcol + 5);

      $this->numcueb = $rs->getString($startcol + 6);

      $this->codniv = $rs->getString($startcol + 7);

      $this->codnivnemp = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Vianoemp object", $e);
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
			$con = Propel::getConnection(VianoempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			VianoempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(VianoempPeer::DATABASE_NAME);
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
					$pk = VianoempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += VianoempPeer::doUpdate($this, $con);
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


			if (($retval = VianoempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = VianoempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRifnemp();
				break;
			case 1:
				return $this->getNomnemp();
				break;
			case 2:
				return $this->getDirnemp();
				break;
			case 3:
				return $this->getTelnemp();
				break;
			case 4:
				return $this->getEmanemp();
				break;
			case 5:
				return $this->getCodban();
				break;
			case 6:
				return $this->getNumcueb();
				break;
			case 7:
				return $this->getCodniv();
				break;
			case 8:
				return $this->getCodnivnemp();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = VianoempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRifnemp(),
			$keys[1] => $this->getNomnemp(),
			$keys[2] => $this->getDirnemp(),
			$keys[3] => $this->getTelnemp(),
			$keys[4] => $this->getEmanemp(),
			$keys[5] => $this->getCodban(),
			$keys[6] => $this->getNumcueb(),
			$keys[7] => $this->getCodniv(),
			$keys[8] => $this->getCodnivnemp(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = VianoempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRifnemp($value);
				break;
			case 1:
				$this->setNomnemp($value);
				break;
			case 2:
				$this->setDirnemp($value);
				break;
			case 3:
				$this->setTelnemp($value);
				break;
			case 4:
				$this->setEmanemp($value);
				break;
			case 5:
				$this->setCodban($value);
				break;
			case 6:
				$this->setNumcueb($value);
				break;
			case 7:
				$this->setCodniv($value);
				break;
			case 8:
				$this->setCodnivnemp($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = VianoempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRifnemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomnemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirnemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelnemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEmanemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodban($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumcueb($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodniv($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodnivnemp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(VianoempPeer::DATABASE_NAME);

		if ($this->isColumnModified(VianoempPeer::RIFNEMP)) $criteria->add(VianoempPeer::RIFNEMP, $this->rifnemp);
		if ($this->isColumnModified(VianoempPeer::NOMNEMP)) $criteria->add(VianoempPeer::NOMNEMP, $this->nomnemp);
		if ($this->isColumnModified(VianoempPeer::DIRNEMP)) $criteria->add(VianoempPeer::DIRNEMP, $this->dirnemp);
		if ($this->isColumnModified(VianoempPeer::TELNEMP)) $criteria->add(VianoempPeer::TELNEMP, $this->telnemp);
		if ($this->isColumnModified(VianoempPeer::EMANEMP)) $criteria->add(VianoempPeer::EMANEMP, $this->emanemp);
		if ($this->isColumnModified(VianoempPeer::CODBAN)) $criteria->add(VianoempPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(VianoempPeer::NUMCUEB)) $criteria->add(VianoempPeer::NUMCUEB, $this->numcueb);
		if ($this->isColumnModified(VianoempPeer::CODNIV)) $criteria->add(VianoempPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(VianoempPeer::CODNIVNEMP)) $criteria->add(VianoempPeer::CODNIVNEMP, $this->codnivnemp);
		if ($this->isColumnModified(VianoempPeer::ID)) $criteria->add(VianoempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(VianoempPeer::DATABASE_NAME);

		$criteria->add(VianoempPeer::ID, $this->id);

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

		$copyObj->setRifnemp($this->rifnemp);

		$copyObj->setNomnemp($this->nomnemp);

		$copyObj->setDirnemp($this->dirnemp);

		$copyObj->setTelnemp($this->telnemp);

		$copyObj->setEmanemp($this->emanemp);

		$copyObj->setCodban($this->codban);

		$copyObj->setNumcueb($this->numcueb);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodnivnemp($this->codnivnemp);


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
			self::$peer = new VianoempPeer();
		}
		return self::$peer;
	}

} 