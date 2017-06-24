<?php


abstract class BaseHcregconhcm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $cedfam;


	
	protected $tiphcm;


	
	protected $rifpro;


	
	protected $feccon;


	
	protected $moncon;


	
	protected $geneop;


	
	protected $nrofac;


	
	protected $fecfac;


	
	protected $fecrecfac;


	
	protected $genop;


	
	protected $titpro;


	
	protected $statop;


	
	protected $loguse;


	
	protected $numord;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCedfam()
  {

    return trim($this->cedfam);

  }
  
  public function getTiphcm()
  {

    return trim($this->tiphcm);

  }
  
  public function getRifpro()
  {

    return trim($this->rifpro);

  }
  
  public function getFeccon($format = 'Y-m-d H:i:s')
  {

    if ($this->feccon === null || $this->feccon === '') {
      return null;
    } elseif (!is_int($this->feccon)) {
            $ts = adodb_strtotime($this->feccon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccon] as date/time value: " . var_export($this->feccon, true));
      }
    } else {
      $ts = $this->feccon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMoncon($val=false)
  {

    if($val) return number_format($this->moncon,2,',','.');
    else return $this->moncon;

  }
  
  public function getGeneop()
  {

    return trim($this->geneop);

  }
  
  public function getNrofac()
  {

    return trim($this->nrofac);

  }
  
  public function getFecfac($format = 'Y-m-d H:i:s')
  {

    if ($this->fecfac === null || $this->fecfac === '') {
      return null;
    } elseif (!is_int($this->fecfac)) {
            $ts = adodb_strtotime($this->fecfac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfac] as date/time value: " . var_export($this->fecfac, true));
      }
    } else {
      $ts = $this->fecfac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecrecfac($format = 'Y-m-d H:i:s')
  {

    if ($this->fecrecfac === null || $this->fecrecfac === '') {
      return null;
    } elseif (!is_int($this->fecrecfac)) {
            $ts = adodb_strtotime($this->fecrecfac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrecfac] as date/time value: " . var_export($this->fecrecfac, true));
      }
    } else {
      $ts = $this->fecrecfac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getGenop()
  {

    return $this->genop;

  }
  
  public function getTitpro()
  {

    return $this->titpro;

  }
  
  public function getStatop()
  {

    return trim($this->statop);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::CODEMP;
      }
  
	} 
	
	public function setCedfam($v)
	{

    if ($this->cedfam !== $v) {
        $this->cedfam = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::CEDFAM;
      }
  
	} 
	
	public function setTiphcm($v)
	{

    if ($this->tiphcm !== $v) {
        $this->tiphcm = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::TIPHCM;
      }
  
	} 
	
	public function setRifpro($v)
	{

    if ($this->rifpro !== $v) {
        $this->rifpro = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::RIFPRO;
      }
  
	} 
	
	public function setFeccon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccon !== $ts) {
      $this->feccon = $ts;
      $this->modifiedColumns[] = HcregconhcmPeer::FECCON;
    }

	} 
	
	public function setMoncon($v)
	{

    if ($this->moncon !== $v) {
        $this->moncon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = HcregconhcmPeer::MONCON;
      }
  
	} 
	
	public function setGeneop($v)
	{

    if ($this->geneop !== $v) {
        $this->geneop = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::GENEOP;
      }
  
	} 
	
	public function setNrofac($v)
	{

    if ($this->nrofac !== $v) {
        $this->nrofac = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::NROFAC;
      }
  
	} 
	
	public function setFecfac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfac !== $ts) {
      $this->fecfac = $ts;
      $this->modifiedColumns[] = HcregconhcmPeer::FECFAC;
    }

	} 
	
	public function setFecrecfac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrecfac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrecfac !== $ts) {
      $this->fecrecfac = $ts;
      $this->modifiedColumns[] = HcregconhcmPeer::FECRECFAC;
    }

	} 
	
	public function setGenop($v)
	{

    if ($this->genop !== $v) {
        $this->genop = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::GENOP;
      }
  
	} 
	
	public function setTitpro($v)
	{

    if ($this->titpro !== $v) {
        $this->titpro = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::TITPRO;
      }
  
	} 
	
	public function setStatop($v)
	{

    if ($this->statop !== $v) {
        $this->statop = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::STATOP;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::LOGUSE;
      }
  
	} 
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::NUMORD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = HcregconhcmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->cedfam = $rs->getString($startcol + 1);

      $this->tiphcm = $rs->getString($startcol + 2);

      $this->rifpro = $rs->getString($startcol + 3);

      $this->feccon = $rs->getTimestamp($startcol + 4, null);

      $this->moncon = $rs->getFloat($startcol + 5);

      $this->geneop = $rs->getString($startcol + 6);

      $this->nrofac = $rs->getString($startcol + 7);

      $this->fecfac = $rs->getTimestamp($startcol + 8, null);

      $this->fecrecfac = $rs->getTimestamp($startcol + 9, null);

      $this->genop = $rs->getBoolean($startcol + 10);

      $this->titpro = $rs->getBoolean($startcol + 11);

      $this->statop = $rs->getString($startcol + 12);

      $this->loguse = $rs->getString($startcol + 13);

      $this->numord = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Hcregconhcm object", $e);
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
			$con = Propel::getConnection(HcregconhcmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HcregconhcmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HcregconhcmPeer::DATABASE_NAME);
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
					$pk = HcregconhcmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HcregconhcmPeer::doUpdate($this, $con);
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


			if (($retval = HcregconhcmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HcregconhcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCedfam();
				break;
			case 2:
				return $this->getTiphcm();
				break;
			case 3:
				return $this->getRifpro();
				break;
			case 4:
				return $this->getFeccon();
				break;
			case 5:
				return $this->getMoncon();
				break;
			case 6:
				return $this->getGeneop();
				break;
			case 7:
				return $this->getNrofac();
				break;
			case 8:
				return $this->getFecfac();
				break;
			case 9:
				return $this->getFecrecfac();
				break;
			case 10:
				return $this->getGenop();
				break;
			case 11:
				return $this->getTitpro();
				break;
			case 12:
				return $this->getStatop();
				break;
			case 13:
				return $this->getLoguse();
				break;
			case 14:
				return $this->getNumord();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HcregconhcmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCedfam(),
			$keys[2] => $this->getTiphcm(),
			$keys[3] => $this->getRifpro(),
			$keys[4] => $this->getFeccon(),
			$keys[5] => $this->getMoncon(),
			$keys[6] => $this->getGeneop(),
			$keys[7] => $this->getNrofac(),
			$keys[8] => $this->getFecfac(),
			$keys[9] => $this->getFecrecfac(),
			$keys[10] => $this->getGenop(),
			$keys[11] => $this->getTitpro(),
			$keys[12] => $this->getStatop(),
			$keys[13] => $this->getLoguse(),
			$keys[14] => $this->getNumord(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HcregconhcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCedfam($value);
				break;
			case 2:
				$this->setTiphcm($value);
				break;
			case 3:
				$this->setRifpro($value);
				break;
			case 4:
				$this->setFeccon($value);
				break;
			case 5:
				$this->setMoncon($value);
				break;
			case 6:
				$this->setGeneop($value);
				break;
			case 7:
				$this->setNrofac($value);
				break;
			case 8:
				$this->setFecfac($value);
				break;
			case 9:
				$this->setFecrecfac($value);
				break;
			case 10:
				$this->setGenop($value);
				break;
			case 11:
				$this->setTitpro($value);
				break;
			case 12:
				$this->setStatop($value);
				break;
			case 13:
				$this->setLoguse($value);
				break;
			case 14:
				$this->setNumord($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HcregconhcmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedfam($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTiphcm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRifpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFeccon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMoncon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setGeneop($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNrofac($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecfac($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecrecfac($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setGenop($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTitpro($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStatop($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLoguse($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNumord($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HcregconhcmPeer::DATABASE_NAME);

		if ($this->isColumnModified(HcregconhcmPeer::CODEMP)) $criteria->add(HcregconhcmPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(HcregconhcmPeer::CEDFAM)) $criteria->add(HcregconhcmPeer::CEDFAM, $this->cedfam);
		if ($this->isColumnModified(HcregconhcmPeer::TIPHCM)) $criteria->add(HcregconhcmPeer::TIPHCM, $this->tiphcm);
		if ($this->isColumnModified(HcregconhcmPeer::RIFPRO)) $criteria->add(HcregconhcmPeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(HcregconhcmPeer::FECCON)) $criteria->add(HcregconhcmPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(HcregconhcmPeer::MONCON)) $criteria->add(HcregconhcmPeer::MONCON, $this->moncon);
		if ($this->isColumnModified(HcregconhcmPeer::GENEOP)) $criteria->add(HcregconhcmPeer::GENEOP, $this->geneop);
		if ($this->isColumnModified(HcregconhcmPeer::NROFAC)) $criteria->add(HcregconhcmPeer::NROFAC, $this->nrofac);
		if ($this->isColumnModified(HcregconhcmPeer::FECFAC)) $criteria->add(HcregconhcmPeer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(HcregconhcmPeer::FECRECFAC)) $criteria->add(HcregconhcmPeer::FECRECFAC, $this->fecrecfac);
		if ($this->isColumnModified(HcregconhcmPeer::GENOP)) $criteria->add(HcregconhcmPeer::GENOP, $this->genop);
		if ($this->isColumnModified(HcregconhcmPeer::TITPRO)) $criteria->add(HcregconhcmPeer::TITPRO, $this->titpro);
		if ($this->isColumnModified(HcregconhcmPeer::STATOP)) $criteria->add(HcregconhcmPeer::STATOP, $this->statop);
		if ($this->isColumnModified(HcregconhcmPeer::LOGUSE)) $criteria->add(HcregconhcmPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(HcregconhcmPeer::NUMORD)) $criteria->add(HcregconhcmPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(HcregconhcmPeer::ID)) $criteria->add(HcregconhcmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HcregconhcmPeer::DATABASE_NAME);

		$criteria->add(HcregconhcmPeer::ID, $this->id);

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

		$copyObj->setCedfam($this->cedfam);

		$copyObj->setTiphcm($this->tiphcm);

		$copyObj->setRifpro($this->rifpro);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setMoncon($this->moncon);

		$copyObj->setGeneop($this->geneop);

		$copyObj->setNrofac($this->nrofac);

		$copyObj->setFecfac($this->fecfac);

		$copyObj->setFecrecfac($this->fecrecfac);

		$copyObj->setGenop($this->genop);

		$copyObj->setTitpro($this->titpro);

		$copyObj->setStatop($this->statop);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setNumord($this->numord);


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
			self::$peer = new HcregconhcmPeer();
		}
		return self::$peer;
	}

} 