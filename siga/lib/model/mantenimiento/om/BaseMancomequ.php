<?php


abstract class BaseMancomequ extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numequ;


	
	protected $codcom;


	
	protected $descom;


	
	protected $codtco;


	
	protected $numpar;


	
	protected $numser;


	
	protected $posici;


	
	protected $tieacu;


	
	protected $inspor;


	
	protected $fecins;


	
	protected $videst;


	
	protected $vidact;


	
	protected $fecree;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumequ()
  {

    return trim($this->numequ);

  }
  
  public function getCodcom()
  {

    return trim($this->codcom);

  }
  
  public function getDescom()
  {

    return trim($this->descom);

  }
  
  public function getCodtco()
  {

    return trim($this->codtco);

  }
  
  public function getNumpar()
  {

    return trim($this->numpar);

  }
  
  public function getNumser()
  {

    return trim($this->numser);

  }
  
  public function getPosici()
  {

    return trim($this->posici);

  }
  
  public function getTieacu($val=false)
  {

    if($val) return number_format($this->tieacu,2,',','.');
    else return $this->tieacu;

  }
  
  public function getInspor()
  {

    return trim($this->inspor);

  }
  
  public function getFecins($format = 'Y-m-d')
  {

    if ($this->fecins === null || $this->fecins === '') {
      return null;
    } elseif (!is_int($this->fecins)) {
            $ts = adodb_strtotime($this->fecins);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecins] as date/time value: " . var_export($this->fecins, true));
      }
    } else {
      $ts = $this->fecins;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getVidest($val=false)
  {

    if($val) return number_format($this->videst,2,',','.');
    else return $this->videst;

  }
  
  public function getVidact($val=false)
  {

    if($val) return number_format($this->vidact,2,',','.');
    else return $this->vidact;

  }
  
  public function getFecree($format = 'Y-m-d')
  {

    if ($this->fecree === null || $this->fecree === '') {
      return null;
    } elseif (!is_int($this->fecree)) {
            $ts = adodb_strtotime($this->fecree);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecree] as date/time value: " . var_export($this->fecree, true));
      }
    } else {
      $ts = $this->fecree;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumequ($v)
	{

    if ($this->numequ !== $v) {
        $this->numequ = $v;
        $this->modifiedColumns[] = MancomequPeer::NUMEQU;
      }
  
	} 
	
	public function setCodcom($v)
	{

    if ($this->codcom !== $v) {
        $this->codcom = $v;
        $this->modifiedColumns[] = MancomequPeer::CODCOM;
      }
  
	} 
	
	public function setDescom($v)
	{

    if ($this->descom !== $v) {
        $this->descom = $v;
        $this->modifiedColumns[] = MancomequPeer::DESCOM;
      }
  
	} 
	
	public function setCodtco($v)
	{

    if ($this->codtco !== $v) {
        $this->codtco = $v;
        $this->modifiedColumns[] = MancomequPeer::CODTCO;
      }
  
	} 
	
	public function setNumpar($v)
	{

    if ($this->numpar !== $v) {
        $this->numpar = $v;
        $this->modifiedColumns[] = MancomequPeer::NUMPAR;
      }
  
	} 
	
	public function setNumser($v)
	{

    if ($this->numser !== $v) {
        $this->numser = $v;
        $this->modifiedColumns[] = MancomequPeer::NUMSER;
      }
  
	} 
	
	public function setPosici($v)
	{

    if ($this->posici !== $v) {
        $this->posici = $v;
        $this->modifiedColumns[] = MancomequPeer::POSICI;
      }
  
	} 
	
	public function setTieacu($v)
	{

    if ($this->tieacu !== $v) {
        $this->tieacu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = MancomequPeer::TIEACU;
      }
  
	} 
	
	public function setInspor($v)
	{

    if ($this->inspor !== $v) {
        $this->inspor = $v;
        $this->modifiedColumns[] = MancomequPeer::INSPOR;
      }
  
	} 
	
	public function setFecins($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecins] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecins !== $ts) {
      $this->fecins = $ts;
      $this->modifiedColumns[] = MancomequPeer::FECINS;
    }

	} 
	
	public function setVidest($v)
	{

    if ($this->videst !== $v) {
        $this->videst = Herramientas::toFloat($v);
        $this->modifiedColumns[] = MancomequPeer::VIDEST;
      }
  
	} 
	
	public function setVidact($v)
	{

    if ($this->vidact !== $v) {
        $this->vidact = Herramientas::toFloat($v);
        $this->modifiedColumns[] = MancomequPeer::VIDACT;
      }
  
	} 
	
	public function setFecree($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecree] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecree !== $ts) {
      $this->fecree = $ts;
      $this->modifiedColumns[] = MancomequPeer::FECREE;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = MancomequPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numequ = $rs->getString($startcol + 0);

      $this->codcom = $rs->getString($startcol + 1);

      $this->descom = $rs->getString($startcol + 2);

      $this->codtco = $rs->getString($startcol + 3);

      $this->numpar = $rs->getString($startcol + 4);

      $this->numser = $rs->getString($startcol + 5);

      $this->posici = $rs->getString($startcol + 6);

      $this->tieacu = $rs->getFloat($startcol + 7);

      $this->inspor = $rs->getString($startcol + 8);

      $this->fecins = $rs->getDate($startcol + 9, null);

      $this->videst = $rs->getFloat($startcol + 10);

      $this->vidact = $rs->getFloat($startcol + 11);

      $this->fecree = $rs->getDate($startcol + 12, null);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Mancomequ object", $e);
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
			$con = Propel::getConnection(MancomequPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MancomequPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MancomequPeer::DATABASE_NAME);
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
					$pk = MancomequPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MancomequPeer::doUpdate($this, $con);
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


			if (($retval = MancomequPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MancomequPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumequ();
				break;
			case 1:
				return $this->getCodcom();
				break;
			case 2:
				return $this->getDescom();
				break;
			case 3:
				return $this->getCodtco();
				break;
			case 4:
				return $this->getNumpar();
				break;
			case 5:
				return $this->getNumser();
				break;
			case 6:
				return $this->getPosici();
				break;
			case 7:
				return $this->getTieacu();
				break;
			case 8:
				return $this->getInspor();
				break;
			case 9:
				return $this->getFecins();
				break;
			case 10:
				return $this->getVidest();
				break;
			case 11:
				return $this->getVidact();
				break;
			case 12:
				return $this->getFecree();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MancomequPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumequ(),
			$keys[1] => $this->getCodcom(),
			$keys[2] => $this->getDescom(),
			$keys[3] => $this->getCodtco(),
			$keys[4] => $this->getNumpar(),
			$keys[5] => $this->getNumser(),
			$keys[6] => $this->getPosici(),
			$keys[7] => $this->getTieacu(),
			$keys[8] => $this->getInspor(),
			$keys[9] => $this->getFecins(),
			$keys[10] => $this->getVidest(),
			$keys[11] => $this->getVidact(),
			$keys[12] => $this->getFecree(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MancomequPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumequ($value);
				break;
			case 1:
				$this->setCodcom($value);
				break;
			case 2:
				$this->setDescom($value);
				break;
			case 3:
				$this->setCodtco($value);
				break;
			case 4:
				$this->setNumpar($value);
				break;
			case 5:
				$this->setNumser($value);
				break;
			case 6:
				$this->setPosici($value);
				break;
			case 7:
				$this->setTieacu($value);
				break;
			case 8:
				$this->setInspor($value);
				break;
			case 9:
				$this->setFecins($value);
				break;
			case 10:
				$this->setVidest($value);
				break;
			case 11:
				$this->setVidact($value);
				break;
			case 12:
				$this->setFecree($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MancomequPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumequ($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtco($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumpar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumser($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPosici($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTieacu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setInspor($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecins($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setVidest($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setVidact($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecree($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MancomequPeer::DATABASE_NAME);

		if ($this->isColumnModified(MancomequPeer::NUMEQU)) $criteria->add(MancomequPeer::NUMEQU, $this->numequ);
		if ($this->isColumnModified(MancomequPeer::CODCOM)) $criteria->add(MancomequPeer::CODCOM, $this->codcom);
		if ($this->isColumnModified(MancomequPeer::DESCOM)) $criteria->add(MancomequPeer::DESCOM, $this->descom);
		if ($this->isColumnModified(MancomequPeer::CODTCO)) $criteria->add(MancomequPeer::CODTCO, $this->codtco);
		if ($this->isColumnModified(MancomequPeer::NUMPAR)) $criteria->add(MancomequPeer::NUMPAR, $this->numpar);
		if ($this->isColumnModified(MancomequPeer::NUMSER)) $criteria->add(MancomequPeer::NUMSER, $this->numser);
		if ($this->isColumnModified(MancomequPeer::POSICI)) $criteria->add(MancomequPeer::POSICI, $this->posici);
		if ($this->isColumnModified(MancomequPeer::TIEACU)) $criteria->add(MancomequPeer::TIEACU, $this->tieacu);
		if ($this->isColumnModified(MancomequPeer::INSPOR)) $criteria->add(MancomequPeer::INSPOR, $this->inspor);
		if ($this->isColumnModified(MancomequPeer::FECINS)) $criteria->add(MancomequPeer::FECINS, $this->fecins);
		if ($this->isColumnModified(MancomequPeer::VIDEST)) $criteria->add(MancomequPeer::VIDEST, $this->videst);
		if ($this->isColumnModified(MancomequPeer::VIDACT)) $criteria->add(MancomequPeer::VIDACT, $this->vidact);
		if ($this->isColumnModified(MancomequPeer::FECREE)) $criteria->add(MancomequPeer::FECREE, $this->fecree);
		if ($this->isColumnModified(MancomequPeer::ID)) $criteria->add(MancomequPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MancomequPeer::DATABASE_NAME);

		$criteria->add(MancomequPeer::ID, $this->id);

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

		$copyObj->setNumequ($this->numequ);

		$copyObj->setCodcom($this->codcom);

		$copyObj->setDescom($this->descom);

		$copyObj->setCodtco($this->codtco);

		$copyObj->setNumpar($this->numpar);

		$copyObj->setNumser($this->numser);

		$copyObj->setPosici($this->posici);

		$copyObj->setTieacu($this->tieacu);

		$copyObj->setInspor($this->inspor);

		$copyObj->setFecins($this->fecins);

		$copyObj->setVidest($this->videst);

		$copyObj->setVidact($this->vidact);

		$copyObj->setFecree($this->fecree);


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
			self::$peer = new MancomequPeer();
		}
		return self::$peer;
	}

} 