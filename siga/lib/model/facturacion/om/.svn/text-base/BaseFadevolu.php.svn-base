<?php


abstract class BaseFadevolu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrodev;


	
	protected $fecdev;


	
	protected $refdes;


	
	protected $fatipdev_id;


	
	protected $codalm;


	
	protected $desdev;


	
	protected $stadph;


	
	protected $mondev;


	
	protected $obsdev;


	
	protected $tipdev;


	
	protected $coddirec;


	
	protected $fecanu;


	
	protected $desanu;


	
	protected $usuanu;


	
	protected $fecreg;


	
	protected $id;

	
	protected $aFatipdev;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNrodev()
  {

    return trim($this->nrodev);

  }
  
  public function getFecdev($format = 'Y-m-d')
  {

    if ($this->fecdev === null || $this->fecdev === '') {
      return null;
    } elseif (!is_int($this->fecdev)) {
            $ts = adodb_strtotime($this->fecdev);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdev] as date/time value: " . var_export($this->fecdev, true));
      }
    } else {
      $ts = $this->fecdev;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRefdes()
  {

    return trim($this->refdes);

  }
  
  public function getFatipdevId()
  {

    return $this->fatipdev_id;

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getDesdev()
  {

    return trim($this->desdev);

  }
  
  public function getStadph()
  {

    return trim($this->stadph);

  }
  
  public function getMondev($val=false)
  {

    if($val) return number_format($this->mondev,2,',','.');
    else return $this->mondev;

  }
  
  public function getObsdev()
  {

    return trim($this->obsdev);

  }
  
  public function getTipdev()
  {

    return trim($this->tipdev);

  }
  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getUsuanu()
  {

    return trim($this->usuanu);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
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
	
	public function setNrodev($v)
	{

    if ($this->nrodev !== $v) {
        $this->nrodev = $v;
        $this->modifiedColumns[] = FadevoluPeer::NRODEV;
      }
  
	} 
	
	public function setFecdev($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdev] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdev !== $ts) {
      $this->fecdev = $ts;
      $this->modifiedColumns[] = FadevoluPeer::FECDEV;
    }

	} 
	
	public function setRefdes($v)
	{

    if ($this->refdes !== $v) {
        $this->refdes = $v;
        $this->modifiedColumns[] = FadevoluPeer::REFDES;
      }
  
	} 
	
	public function setFatipdevId($v)
	{

    if ($this->fatipdev_id !== $v) {
        $this->fatipdev_id = $v;
        $this->modifiedColumns[] = FadevoluPeer::FATIPDEV_ID;
      }
  
		if ($this->aFatipdev !== null && $this->aFatipdev->getId() !== $v) {
			$this->aFatipdev = null;
		}

	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = FadevoluPeer::CODALM;
      }
  
	} 
	
	public function setDesdev($v)
	{

    if ($this->desdev !== $v) {
        $this->desdev = $v;
        $this->modifiedColumns[] = FadevoluPeer::DESDEV;
      }
  
	} 
	
	public function setStadph($v)
	{

    if ($this->stadph !== $v) {
        $this->stadph = $v;
        $this->modifiedColumns[] = FadevoluPeer::STADPH;
      }
  
	} 
	
	public function setMondev($v)
	{

    if ($this->mondev !== $v) {
        $this->mondev = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadevoluPeer::MONDEV;
      }
  
	} 
	
	public function setObsdev($v)
	{

    if ($this->obsdev !== $v) {
        $this->obsdev = $v;
        $this->modifiedColumns[] = FadevoluPeer::OBSDEV;
      }
  
	} 
	
	public function setTipdev($v)
	{

    if ($this->tipdev !== $v) {
        $this->tipdev = $v;
        $this->modifiedColumns[] = FadevoluPeer::TIPDEV;
      }
  
	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = FadevoluPeer::CODDIREC;
      }
  
	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = FadevoluPeer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = FadevoluPeer::DESANU;
      }
  
	} 
	
	public function setUsuanu($v)
	{

    if ($this->usuanu !== $v) {
        $this->usuanu = $v;
        $this->modifiedColumns[] = FadevoluPeer::USUANU;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = FadevoluPeer::FECREG;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadevoluPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nrodev = $rs->getString($startcol + 0);

      $this->fecdev = $rs->getDate($startcol + 1, null);

      $this->refdes = $rs->getString($startcol + 2);

      $this->fatipdev_id = $rs->getInt($startcol + 3);

      $this->codalm = $rs->getString($startcol + 4);

      $this->desdev = $rs->getString($startcol + 5);

      $this->stadph = $rs->getString($startcol + 6);

      $this->mondev = $rs->getFloat($startcol + 7);

      $this->obsdev = $rs->getString($startcol + 8);

      $this->tipdev = $rs->getString($startcol + 9);

      $this->coddirec = $rs->getString($startcol + 10);

      $this->fecanu = $rs->getDate($startcol + 11, null);

      $this->desanu = $rs->getString($startcol + 12);

      $this->usuanu = $rs->getString($startcol + 13);

      $this->fecreg = $rs->getDate($startcol + 14, null);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadevolu object", $e);
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
			$con = Propel::getConnection(FadevoluPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadevoluPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadevoluPeer::DATABASE_NAME);
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


												
			if ($this->aFatipdev !== null) {
				if ($this->aFatipdev->isModified()) {
					$affectedRows += $this->aFatipdev->save($con);
				}
				$this->setFatipdev($this->aFatipdev);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FadevoluPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadevoluPeer::doUpdate($this, $con);
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


												
			if ($this->aFatipdev !== null) {
				if (!$this->aFatipdev->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFatipdev->getValidationFailures());
				}
			}


			if (($retval = FadevoluPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadevoluPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNrodev();
				break;
			case 1:
				return $this->getFecdev();
				break;
			case 2:
				return $this->getRefdes();
				break;
			case 3:
				return $this->getFatipdevId();
				break;
			case 4:
				return $this->getCodalm();
				break;
			case 5:
				return $this->getDesdev();
				break;
			case 6:
				return $this->getStadph();
				break;
			case 7:
				return $this->getMondev();
				break;
			case 8:
				return $this->getObsdev();
				break;
			case 9:
				return $this->getTipdev();
				break;
			case 10:
				return $this->getCoddirec();
				break;
			case 11:
				return $this->getFecanu();
				break;
			case 12:
				return $this->getDesanu();
				break;
			case 13:
				return $this->getUsuanu();
				break;
			case 14:
				return $this->getFecreg();
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
		$keys = FadevoluPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrodev(),
			$keys[1] => $this->getFecdev(),
			$keys[2] => $this->getRefdes(),
			$keys[3] => $this->getFatipdevId(),
			$keys[4] => $this->getCodalm(),
			$keys[5] => $this->getDesdev(),
			$keys[6] => $this->getStadph(),
			$keys[7] => $this->getMondev(),
			$keys[8] => $this->getObsdev(),
			$keys[9] => $this->getTipdev(),
			$keys[10] => $this->getCoddirec(),
			$keys[11] => $this->getFecanu(),
			$keys[12] => $this->getDesanu(),
			$keys[13] => $this->getUsuanu(),
			$keys[14] => $this->getFecreg(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadevoluPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNrodev($value);
				break;
			case 1:
				$this->setFecdev($value);
				break;
			case 2:
				$this->setRefdes($value);
				break;
			case 3:
				$this->setFatipdevId($value);
				break;
			case 4:
				$this->setCodalm($value);
				break;
			case 5:
				$this->setDesdev($value);
				break;
			case 6:
				$this->setStadph($value);
				break;
			case 7:
				$this->setMondev($value);
				break;
			case 8:
				$this->setObsdev($value);
				break;
			case 9:
				$this->setTipdev($value);
				break;
			case 10:
				$this->setCoddirec($value);
				break;
			case 11:
				$this->setFecanu($value);
				break;
			case 12:
				$this->setDesanu($value);
				break;
			case 13:
				$this->setUsuanu($value);
				break;
			case 14:
				$this->setFecreg($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadevoluPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrodev($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecdev($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefdes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFatipdevId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodalm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesdev($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStadph($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondev($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObsdev($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipdev($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCoddirec($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecanu($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDesanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUsuanu($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecreg($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadevoluPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadevoluPeer::NRODEV)) $criteria->add(FadevoluPeer::NRODEV, $this->nrodev);
		if ($this->isColumnModified(FadevoluPeer::FECDEV)) $criteria->add(FadevoluPeer::FECDEV, $this->fecdev);
		if ($this->isColumnModified(FadevoluPeer::REFDES)) $criteria->add(FadevoluPeer::REFDES, $this->refdes);
		if ($this->isColumnModified(FadevoluPeer::FATIPDEV_ID)) $criteria->add(FadevoluPeer::FATIPDEV_ID, $this->fatipdev_id);
		if ($this->isColumnModified(FadevoluPeer::CODALM)) $criteria->add(FadevoluPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(FadevoluPeer::DESDEV)) $criteria->add(FadevoluPeer::DESDEV, $this->desdev);
		if ($this->isColumnModified(FadevoluPeer::STADPH)) $criteria->add(FadevoluPeer::STADPH, $this->stadph);
		if ($this->isColumnModified(FadevoluPeer::MONDEV)) $criteria->add(FadevoluPeer::MONDEV, $this->mondev);
		if ($this->isColumnModified(FadevoluPeer::OBSDEV)) $criteria->add(FadevoluPeer::OBSDEV, $this->obsdev);
		if ($this->isColumnModified(FadevoluPeer::TIPDEV)) $criteria->add(FadevoluPeer::TIPDEV, $this->tipdev);
		if ($this->isColumnModified(FadevoluPeer::CODDIREC)) $criteria->add(FadevoluPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(FadevoluPeer::FECANU)) $criteria->add(FadevoluPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(FadevoluPeer::DESANU)) $criteria->add(FadevoluPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(FadevoluPeer::USUANU)) $criteria->add(FadevoluPeer::USUANU, $this->usuanu);
		if ($this->isColumnModified(FadevoluPeer::FECREG)) $criteria->add(FadevoluPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FadevoluPeer::ID)) $criteria->add(FadevoluPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadevoluPeer::DATABASE_NAME);

		$criteria->add(FadevoluPeer::ID, $this->id);

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

		$copyObj->setNrodev($this->nrodev);

		$copyObj->setFecdev($this->fecdev);

		$copyObj->setRefdes($this->refdes);

		$copyObj->setFatipdevId($this->fatipdev_id);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setDesdev($this->desdev);

		$copyObj->setStadph($this->stadph);

		$copyObj->setMondev($this->mondev);

		$copyObj->setObsdev($this->obsdev);

		$copyObj->setTipdev($this->tipdev);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setUsuanu($this->usuanu);

		$copyObj->setFecreg($this->fecreg);


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
			self::$peer = new FadevoluPeer();
		}
		return self::$peer;
	}

	
	public function setFatipdev($v)
	{


		if ($v === null) {
			$this->setFatipdevId(NULL);
		} else {
			$this->setFatipdevId($v->getId());
		}


		$this->aFatipdev = $v;
	}


	
	public function getFatipdev($con = null)
	{
		if ($this->aFatipdev === null && ($this->fatipdev_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFatipdevPeer.php';

      $c = new Criteria();
      $c->add(FatipdevPeer::ID,$this->fatipdev_id);
      
			$this->aFatipdev = FatipdevPeer::doSelectOne($c, $con);

			
		}
		return $this->aFatipdev;
	}

} 