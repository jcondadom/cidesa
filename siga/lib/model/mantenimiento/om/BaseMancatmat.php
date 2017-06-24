<?php


abstract class BaseMancatmat extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $fecsol;


	
	protected $unisol;


	
	protected $jussol;


	
	protected $nomite;


	
	protected $desite;


	
	protected $unimed;


	
	protected $peso;


	
	protected $volume;


	
	protected $obssol;


	
	protected $loguse;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getFecsol($format = 'Y-m-d')
  {

    if ($this->fecsol === null || $this->fecsol === '') {
      return null;
    } elseif (!is_int($this->fecsol)) {
            $ts = adodb_strtotime($this->fecsol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
      }
    } else {
      $ts = $this->fecsol;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUnisol()
  {

    return trim($this->unisol);

  }
  
  public function getJussol()
  {

    return trim($this->jussol);

  }
  
  public function getNomite()
  {

    return trim($this->nomite);

  }
  
  public function getDesite()
  {

    return trim($this->desite);

  }
  
  public function getUnimed()
  {

    return trim($this->unimed);

  }
  
  public function getPeso($val=false)
  {

    if($val) return number_format($this->peso,2,',','.');
    else return $this->peso;

  }
  
  public function getVolume($val=false)
  {

    if($val) return number_format($this->volume,2,',','.');
    else return $this->volume;

  }
  
  public function getObssol()
  {

    return trim($this->obssol);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = MancatmatPeer::NUMSOL;
      }
  
	} 
	
	public function setFecsol($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = MancatmatPeer::FECSOL;
    }

	} 
	
	public function setUnisol($v)
	{

    if ($this->unisol !== $v) {
        $this->unisol = $v;
        $this->modifiedColumns[] = MancatmatPeer::UNISOL;
      }
  
	} 
	
	public function setJussol($v)
	{

    if ($this->jussol !== $v) {
        $this->jussol = $v;
        $this->modifiedColumns[] = MancatmatPeer::JUSSOL;
      }
  
	} 
	
	public function setNomite($v)
	{

    if ($this->nomite !== $v) {
        $this->nomite = $v;
        $this->modifiedColumns[] = MancatmatPeer::NOMITE;
      }
  
	} 
	
	public function setDesite($v)
	{

    if ($this->desite !== $v) {
        $this->desite = $v;
        $this->modifiedColumns[] = MancatmatPeer::DESITE;
      }
  
	} 
	
	public function setUnimed($v)
	{

    if ($this->unimed !== $v) {
        $this->unimed = $v;
        $this->modifiedColumns[] = MancatmatPeer::UNIMED;
      }
  
	} 
	
	public function setPeso($v)
	{

    if ($this->peso !== $v) {
        $this->peso = Herramientas::toFloat($v);
        $this->modifiedColumns[] = MancatmatPeer::PESO;
      }
  
	} 
	
	public function setVolume($v)
	{

    if ($this->volume !== $v) {
        $this->volume = Herramientas::toFloat($v);
        $this->modifiedColumns[] = MancatmatPeer::VOLUME;
      }
  
	} 
	
	public function setObssol($v)
	{

    if ($this->obssol !== $v) {
        $this->obssol = $v;
        $this->modifiedColumns[] = MancatmatPeer::OBSSOL;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = MancatmatPeer::LOGUSE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = MancatmatPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->fecsol = $rs->getDate($startcol + 1, null);

      $this->unisol = $rs->getString($startcol + 2);

      $this->jussol = $rs->getString($startcol + 3);

      $this->nomite = $rs->getString($startcol + 4);

      $this->desite = $rs->getString($startcol + 5);

      $this->unimed = $rs->getString($startcol + 6);

      $this->peso = $rs->getFloat($startcol + 7);

      $this->volume = $rs->getFloat($startcol + 8);

      $this->obssol = $rs->getString($startcol + 9);

      $this->loguse = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Mancatmat object", $e);
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
			$con = Propel::getConnection(MancatmatPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MancatmatPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MancatmatPeer::DATABASE_NAME);
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
					$pk = MancatmatPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MancatmatPeer::doUpdate($this, $con);
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


			if (($retval = MancatmatPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MancatmatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getFecsol();
				break;
			case 2:
				return $this->getUnisol();
				break;
			case 3:
				return $this->getJussol();
				break;
			case 4:
				return $this->getNomite();
				break;
			case 5:
				return $this->getDesite();
				break;
			case 6:
				return $this->getUnimed();
				break;
			case 7:
				return $this->getPeso();
				break;
			case 8:
				return $this->getVolume();
				break;
			case 9:
				return $this->getObssol();
				break;
			case 10:
				return $this->getLoguse();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MancatmatPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getFecsol(),
			$keys[2] => $this->getUnisol(),
			$keys[3] => $this->getJussol(),
			$keys[4] => $this->getNomite(),
			$keys[5] => $this->getDesite(),
			$keys[6] => $this->getUnimed(),
			$keys[7] => $this->getPeso(),
			$keys[8] => $this->getVolume(),
			$keys[9] => $this->getObssol(),
			$keys[10] => $this->getLoguse(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MancatmatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setFecsol($value);
				break;
			case 2:
				$this->setUnisol($value);
				break;
			case 3:
				$this->setJussol($value);
				break;
			case 4:
				$this->setNomite($value);
				break;
			case 5:
				$this->setDesite($value);
				break;
			case 6:
				$this->setUnimed($value);
				break;
			case 7:
				$this->setPeso($value);
				break;
			case 8:
				$this->setVolume($value);
				break;
			case 9:
				$this->setObssol($value);
				break;
			case 10:
				$this->setLoguse($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MancatmatPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUnisol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setJussol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomite($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesite($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUnimed($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPeso($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setVolume($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObssol($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setLoguse($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MancatmatPeer::DATABASE_NAME);

		if ($this->isColumnModified(MancatmatPeer::NUMSOL)) $criteria->add(MancatmatPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(MancatmatPeer::FECSOL)) $criteria->add(MancatmatPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(MancatmatPeer::UNISOL)) $criteria->add(MancatmatPeer::UNISOL, $this->unisol);
		if ($this->isColumnModified(MancatmatPeer::JUSSOL)) $criteria->add(MancatmatPeer::JUSSOL, $this->jussol);
		if ($this->isColumnModified(MancatmatPeer::NOMITE)) $criteria->add(MancatmatPeer::NOMITE, $this->nomite);
		if ($this->isColumnModified(MancatmatPeer::DESITE)) $criteria->add(MancatmatPeer::DESITE, $this->desite);
		if ($this->isColumnModified(MancatmatPeer::UNIMED)) $criteria->add(MancatmatPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(MancatmatPeer::PESO)) $criteria->add(MancatmatPeer::PESO, $this->peso);
		if ($this->isColumnModified(MancatmatPeer::VOLUME)) $criteria->add(MancatmatPeer::VOLUME, $this->volume);
		if ($this->isColumnModified(MancatmatPeer::OBSSOL)) $criteria->add(MancatmatPeer::OBSSOL, $this->obssol);
		if ($this->isColumnModified(MancatmatPeer::LOGUSE)) $criteria->add(MancatmatPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(MancatmatPeer::ID)) $criteria->add(MancatmatPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MancatmatPeer::DATABASE_NAME);

		$criteria->add(MancatmatPeer::ID, $this->id);

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

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setUnisol($this->unisol);

		$copyObj->setJussol($this->jussol);

		$copyObj->setNomite($this->nomite);

		$copyObj->setDesite($this->desite);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setPeso($this->peso);

		$copyObj->setVolume($this->volume);

		$copyObj->setObssol($this->obssol);

		$copyObj->setLoguse($this->loguse);


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
			self::$peer = new MancatmatPeer();
		}
		return self::$peer;
	}

} 