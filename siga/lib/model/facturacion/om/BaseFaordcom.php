<?php


abstract class BaseFaordcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordcom;


	
	protected $fecord;


	
	protected $desord;


	
	protected $monord;


	
	protected $cedrif;


	
	protected $nompro;


	
	protected $dirpro;


	
	protected $codalmsap;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getOrdcom()
  {

    return trim($this->ordcom);

  }
  
  public function getFecord($format = 'Y-m-d H:i:s')
  {

    if ($this->fecord === null || $this->fecord === '') {
      return null;
    } elseif (!is_int($this->fecord)) {
            $ts = adodb_strtotime($this->fecord);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecord] as date/time value: " . var_export($this->fecord, true));
      }
    } else {
      $ts = $this->fecord;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesord()
  {

    return trim($this->desord);

  }
  
  public function getMonord($val=false)
  {

    if($val) return number_format($this->monord,2,',','.');
    else return $this->monord;

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNompro()
  {

    return trim($this->nompro);

  }
  
  public function getDirpro()
  {

    return trim($this->dirpro);

  }
  
  public function getCodalmsap()
  {

    return trim($this->codalmsap);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setOrdcom($v)
	{

    if ($this->ordcom !== $v) {
        $this->ordcom = $v;
        $this->modifiedColumns[] = FaordcomPeer::ORDCOM;
      }
  
	} 
	
	public function setFecord($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecord] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecord !== $ts) {
      $this->fecord = $ts;
      $this->modifiedColumns[] = FaordcomPeer::FECORD;
    }

	} 
	
	public function setDesord($v)
	{

    if ($this->desord !== $v) {
        $this->desord = $v;
        $this->modifiedColumns[] = FaordcomPeer::DESORD;
      }
  
	} 
	
	public function setMonord($v)
	{

    if ($this->monord !== $v) {
        $this->monord = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaordcomPeer::MONORD;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = FaordcomPeer::CEDRIF;
      }
  
	} 
	
	public function setNompro($v)
	{

    if ($this->nompro !== $v) {
        $this->nompro = $v;
        $this->modifiedColumns[] = FaordcomPeer::NOMPRO;
      }
  
	} 
	
	public function setDirpro($v)
	{

    if ($this->dirpro !== $v) {
        $this->dirpro = $v;
        $this->modifiedColumns[] = FaordcomPeer::DIRPRO;
      }
  
	} 
	
	public function setCodalmsap($v)
	{

    if ($this->codalmsap !== $v) {
        $this->codalmsap = $v;
        $this->modifiedColumns[] = FaordcomPeer::CODALMSAP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaordcomPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ordcom = $rs->getString($startcol + 0);

      $this->fecord = $rs->getTimestamp($startcol + 1, null);

      $this->desord = $rs->getString($startcol + 2);

      $this->monord = $rs->getFloat($startcol + 3);

      $this->cedrif = $rs->getString($startcol + 4);

      $this->nompro = $rs->getString($startcol + 5);

      $this->dirpro = $rs->getString($startcol + 6);

      $this->codalmsap = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faordcom object", $e);
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
			$con = Propel::getConnection(FaordcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaordcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaordcomPeer::DATABASE_NAME);
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
					$pk = FaordcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaordcomPeer::doUpdate($this, $con);
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


			if (($retval = FaordcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaordcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdcom();
				break;
			case 1:
				return $this->getFecord();
				break;
			case 2:
				return $this->getDesord();
				break;
			case 3:
				return $this->getMonord();
				break;
			case 4:
				return $this->getCedrif();
				break;
			case 5:
				return $this->getNompro();
				break;
			case 6:
				return $this->getDirpro();
				break;
			case 7:
				return $this->getCodalmsap();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaordcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdcom(),
			$keys[1] => $this->getFecord(),
			$keys[2] => $this->getDesord(),
			$keys[3] => $this->getMonord(),
			$keys[4] => $this->getCedrif(),
			$keys[5] => $this->getNompro(),
			$keys[6] => $this->getDirpro(),
			$keys[7] => $this->getCodalmsap(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaordcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdcom($value);
				break;
			case 1:
				$this->setFecord($value);
				break;
			case 2:
				$this->setDesord($value);
				break;
			case 3:
				$this->setMonord($value);
				break;
			case 4:
				$this->setCedrif($value);
				break;
			case 5:
				$this->setNompro($value);
				break;
			case 6:
				$this->setDirpro($value);
				break;
			case 7:
				$this->setCodalmsap($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaordcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecord($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesord($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonord($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCedrif($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNompro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDirpro($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodalmsap($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaordcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaordcomPeer::ORDCOM)) $criteria->add(FaordcomPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(FaordcomPeer::FECORD)) $criteria->add(FaordcomPeer::FECORD, $this->fecord);
		if ($this->isColumnModified(FaordcomPeer::DESORD)) $criteria->add(FaordcomPeer::DESORD, $this->desord);
		if ($this->isColumnModified(FaordcomPeer::MONORD)) $criteria->add(FaordcomPeer::MONORD, $this->monord);
		if ($this->isColumnModified(FaordcomPeer::CEDRIF)) $criteria->add(FaordcomPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(FaordcomPeer::NOMPRO)) $criteria->add(FaordcomPeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(FaordcomPeer::DIRPRO)) $criteria->add(FaordcomPeer::DIRPRO, $this->dirpro);
		if ($this->isColumnModified(FaordcomPeer::CODALMSAP)) $criteria->add(FaordcomPeer::CODALMSAP, $this->codalmsap);
		if ($this->isColumnModified(FaordcomPeer::ID)) $criteria->add(FaordcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaordcomPeer::DATABASE_NAME);

		$criteria->add(FaordcomPeer::ID, $this->id);

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

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setFecord($this->fecord);

		$copyObj->setDesord($this->desord);

		$copyObj->setMonord($this->monord);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNompro($this->nompro);

		$copyObj->setDirpro($this->dirpro);

		$copyObj->setCodalmsap($this->codalmsap);


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
			self::$peer = new FaordcomPeer();
		}
		return self::$peer;
	}

} 