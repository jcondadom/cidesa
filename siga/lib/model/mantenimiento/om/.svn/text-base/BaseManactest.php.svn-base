<?php


abstract class BaseManactest extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $desact;


	
	protected $cedemp;


	
	protected $codgru;


	
	protected $priori;


	
	protected $cedres;


	
	protected $codtma;


	
	protected $tipord;


	
	protected $feccre;


	
	protected $codgrr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getDesact()
  {

    return trim($this->desact);

  }
  
  public function getCedemp()
  {

    return trim($this->cedemp);

  }
  
  public function getCodgru()
  {

    return trim($this->codgru);

  }
  
  public function getPriori()
  {

    return trim($this->priori);

  }
  
  public function getCedres()
  {

    return trim($this->cedres);

  }
  
  public function getCodtma()
  {

    return trim($this->codtma);

  }
  
  public function getTipord()
  {

    return trim($this->tipord);

  }
  
  public function getFeccre($format = 'Y-m-d')
  {

    if ($this->feccre === null || $this->feccre === '') {
      return null;
    } elseif (!is_int($this->feccre)) {
            $ts = adodb_strtotime($this->feccre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccre] as date/time value: " . var_export($this->feccre, true));
      }
    } else {
      $ts = $this->feccre;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodgrr()
  {

    return trim($this->codgrr);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = ManactestPeer::CODACT;
      }
  
	} 
	
	public function setDesact($v)
	{

    if ($this->desact !== $v) {
        $this->desact = $v;
        $this->modifiedColumns[] = ManactestPeer::DESACT;
      }
  
	} 
	
	public function setCedemp($v)
	{

    if ($this->cedemp !== $v) {
        $this->cedemp = $v;
        $this->modifiedColumns[] = ManactestPeer::CEDEMP;
      }
  
	} 
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = ManactestPeer::CODGRU;
      }
  
	} 
	
	public function setPriori($v)
	{

    if ($this->priori !== $v) {
        $this->priori = $v;
        $this->modifiedColumns[] = ManactestPeer::PRIORI;
      }
  
	} 
	
	public function setCedres($v)
	{

    if ($this->cedres !== $v) {
        $this->cedres = $v;
        $this->modifiedColumns[] = ManactestPeer::CEDRES;
      }
  
	} 
	
	public function setCodtma($v)
	{

    if ($this->codtma !== $v) {
        $this->codtma = $v;
        $this->modifiedColumns[] = ManactestPeer::CODTMA;
      }
  
	} 
	
	public function setTipord($v)
	{

    if ($this->tipord !== $v) {
        $this->tipord = $v;
        $this->modifiedColumns[] = ManactestPeer::TIPORD;
      }
  
	} 
	
	public function setFeccre($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccre !== $ts) {
      $this->feccre = $ts;
      $this->modifiedColumns[] = ManactestPeer::FECCRE;
    }

	} 
	
	public function setCodgrr($v)
	{

    if ($this->codgrr !== $v) {
        $this->codgrr = $v;
        $this->modifiedColumns[] = ManactestPeer::CODGRR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ManactestPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codact = $rs->getString($startcol + 0);

      $this->desact = $rs->getString($startcol + 1);

      $this->cedemp = $rs->getString($startcol + 2);

      $this->codgru = $rs->getString($startcol + 3);

      $this->priori = $rs->getString($startcol + 4);

      $this->cedres = $rs->getString($startcol + 5);

      $this->codtma = $rs->getString($startcol + 6);

      $this->tipord = $rs->getString($startcol + 7);

      $this->feccre = $rs->getDate($startcol + 8, null);

      $this->codgrr = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Manactest object", $e);
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
			$con = Propel::getConnection(ManactestPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ManactestPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ManactestPeer::DATABASE_NAME);
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
					$pk = ManactestPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ManactestPeer::doUpdate($this, $con);
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


			if (($retval = ManactestPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManactestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getDesact();
				break;
			case 2:
				return $this->getCedemp();
				break;
			case 3:
				return $this->getCodgru();
				break;
			case 4:
				return $this->getPriori();
				break;
			case 5:
				return $this->getCedres();
				break;
			case 6:
				return $this->getCodtma();
				break;
			case 7:
				return $this->getTipord();
				break;
			case 8:
				return $this->getFeccre();
				break;
			case 9:
				return $this->getCodgrr();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ManactestPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getDesact(),
			$keys[2] => $this->getCedemp(),
			$keys[3] => $this->getCodgru(),
			$keys[4] => $this->getPriori(),
			$keys[5] => $this->getCedres(),
			$keys[6] => $this->getCodtma(),
			$keys[7] => $this->getTipord(),
			$keys[8] => $this->getFeccre(),
			$keys[9] => $this->getCodgrr(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManactestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setDesact($value);
				break;
			case 2:
				$this->setCedemp($value);
				break;
			case 3:
				$this->setCodgru($value);
				break;
			case 4:
				$this->setPriori($value);
				break;
			case 5:
				$this->setCedres($value);
				break;
			case 6:
				$this->setCodtma($value);
				break;
			case 7:
				$this->setTipord($value);
				break;
			case 8:
				$this->setFeccre($value);
				break;
			case 9:
				$this->setCodgrr($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ManactestPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodgru($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPriori($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCedres($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodtma($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipord($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFeccre($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodgrr($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ManactestPeer::DATABASE_NAME);

		if ($this->isColumnModified(ManactestPeer::CODACT)) $criteria->add(ManactestPeer::CODACT, $this->codact);
		if ($this->isColumnModified(ManactestPeer::DESACT)) $criteria->add(ManactestPeer::DESACT, $this->desact);
		if ($this->isColumnModified(ManactestPeer::CEDEMP)) $criteria->add(ManactestPeer::CEDEMP, $this->cedemp);
		if ($this->isColumnModified(ManactestPeer::CODGRU)) $criteria->add(ManactestPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(ManactestPeer::PRIORI)) $criteria->add(ManactestPeer::PRIORI, $this->priori);
		if ($this->isColumnModified(ManactestPeer::CEDRES)) $criteria->add(ManactestPeer::CEDRES, $this->cedres);
		if ($this->isColumnModified(ManactestPeer::CODTMA)) $criteria->add(ManactestPeer::CODTMA, $this->codtma);
		if ($this->isColumnModified(ManactestPeer::TIPORD)) $criteria->add(ManactestPeer::TIPORD, $this->tipord);
		if ($this->isColumnModified(ManactestPeer::FECCRE)) $criteria->add(ManactestPeer::FECCRE, $this->feccre);
		if ($this->isColumnModified(ManactestPeer::CODGRR)) $criteria->add(ManactestPeer::CODGRR, $this->codgrr);
		if ($this->isColumnModified(ManactestPeer::ID)) $criteria->add(ManactestPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ManactestPeer::DATABASE_NAME);

		$criteria->add(ManactestPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setDesact($this->desact);

		$copyObj->setCedemp($this->cedemp);

		$copyObj->setCodgru($this->codgru);

		$copyObj->setPriori($this->priori);

		$copyObj->setCedres($this->cedres);

		$copyObj->setCodtma($this->codtma);

		$copyObj->setTipord($this->tipord);

		$copyObj->setFeccre($this->feccre);

		$copyObj->setCodgrr($this->codgrr);


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
			self::$peer = new ManactestPeer();
		}
		return self::$peer;
	}

} 