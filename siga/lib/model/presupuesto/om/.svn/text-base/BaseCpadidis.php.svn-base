<?php


abstract class BaseCpadidis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refadi;


	
	protected $fecadi;


	
	protected $anoadi;


	
	protected $desadi;


	
	protected $desanu;


	
	protected $adidis;


	
	protected $totadi;


	
	protected $staadi;


	
	protected $numcom;


	
	protected $fecanu;


	
	protected $peradi;


	
	protected $tipgas;


	
	protected $loguse;


	
	protected $fecreg = 1430921782;


	
	protected $clasifica;


	
	protected $coddirec;


	
	protected $nrodec;


	
	protected $fecdec;


	
	protected $refsoladi;


	
	protected $id;

	
	protected $collCpmovadis;

	
	protected $lastCpmovadiCriteria = null;

	
	protected $collCpmovadipers;

	
	protected $lastCpmovadiperCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefadi()
  {

    return trim($this->refadi);

  }
  
  public function getFecadi($format = 'Y-m-d')
  {

    if ($this->fecadi === null || $this->fecadi === '') {
      return null;
    } elseif (!is_int($this->fecadi)) {
            $ts = adodb_strtotime($this->fecadi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecadi] as date/time value: " . var_export($this->fecadi, true));
      }
    } else {
      $ts = $this->fecadi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnoadi()
  {

    return trim($this->anoadi);

  }
  
  public function getDesadi()
  {

    return trim($this->desadi);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getAdidis()
  {

    return trim($this->adidis);

  }
  
  public function getTotadi($val=false)
  {

    if($val) return number_format($this->totadi,2,',','.');
    else return $this->totadi;

  }
  
  public function getStaadi()
  {

    return trim($this->staadi);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

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

  
  public function getPeradi()
  {

    return trim($this->peradi);

  }
  
  public function getTipgas()
  {

    return trim($this->tipgas);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getFecreg($format = 'Y-m-d H:i:s')
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

  
  public function getClasifica()
  {

    return trim($this->clasifica);

  }
  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getNrodec()
  {

    return trim($this->nrodec);

  }
  
  public function getFecdec($format = 'Y-m-d')
  {

    if ($this->fecdec === null || $this->fecdec === '') {
      return null;
    } elseif (!is_int($this->fecdec)) {
            $ts = adodb_strtotime($this->fecdec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdec] as date/time value: " . var_export($this->fecdec, true));
      }
    } else {
      $ts = $this->fecdec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRefsoladi()
  {

    return trim($this->refsoladi);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefadi($v)
	{

    if ($this->refadi !== $v) {
        $this->refadi = $v;
        $this->modifiedColumns[] = CpadidisPeer::REFADI;
      }
  
	} 
	
	public function setFecadi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecadi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecadi !== $ts) {
      $this->fecadi = $ts;
      $this->modifiedColumns[] = CpadidisPeer::FECADI;
    }

	} 
	
	public function setAnoadi($v)
	{

    if ($this->anoadi !== $v) {
        $this->anoadi = $v;
        $this->modifiedColumns[] = CpadidisPeer::ANOADI;
      }
  
	} 
	
	public function setDesadi($v)
	{

    if ($this->desadi !== $v) {
        $this->desadi = $v;
        $this->modifiedColumns[] = CpadidisPeer::DESADI;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CpadidisPeer::DESANU;
      }
  
	} 
	
	public function setAdidis($v)
	{

    if ($this->adidis !== $v) {
        $this->adidis = $v;
        $this->modifiedColumns[] = CpadidisPeer::ADIDIS;
      }
  
	} 
	
	public function setTotadi($v)
	{

    if ($this->totadi !== $v) {
        $this->totadi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpadidisPeer::TOTADI;
      }
  
	} 
	
	public function setStaadi($v)
	{

    if ($this->staadi !== $v) {
        $this->staadi = $v;
        $this->modifiedColumns[] = CpadidisPeer::STAADI;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = CpadidisPeer::NUMCOM;
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
      $this->modifiedColumns[] = CpadidisPeer::FECANU;
    }

	} 
	
	public function setPeradi($v)
	{

    if ($this->peradi !== $v) {
        $this->peradi = $v;
        $this->modifiedColumns[] = CpadidisPeer::PERADI;
      }
  
	} 
	
	public function setTipgas($v)
	{

    if ($this->tipgas !== $v) {
        $this->tipgas = $v;
        $this->modifiedColumns[] = CpadidisPeer::TIPGAS;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = CpadidisPeer::LOGUSE;
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
    if ($this->fecreg !== $ts || $ts === 1430921782) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = CpadidisPeer::FECREG;
    }

	} 
	
	public function setClasifica($v)
	{

    if ($this->clasifica !== $v) {
        $this->clasifica = $v;
        $this->modifiedColumns[] = CpadidisPeer::CLASIFICA;
      }
  
	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = CpadidisPeer::CODDIREC;
      }
  
	} 
	
	public function setNrodec($v)
	{

    if ($this->nrodec !== $v) {
        $this->nrodec = $v;
        $this->modifiedColumns[] = CpadidisPeer::NRODEC;
      }
  
	} 
	
	public function setFecdec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdec !== $ts) {
      $this->fecdec = $ts;
      $this->modifiedColumns[] = CpadidisPeer::FECDEC;
    }

	} 
	
	public function setRefsoladi($v)
	{

    if ($this->refsoladi !== $v) {
        $this->refsoladi = $v;
        $this->modifiedColumns[] = CpadidisPeer::REFSOLADI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpadidisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refadi = $rs->getString($startcol + 0);

      $this->fecadi = $rs->getDate($startcol + 1, null);

      $this->anoadi = $rs->getString($startcol + 2);

      $this->desadi = $rs->getString($startcol + 3);

      $this->desanu = $rs->getString($startcol + 4);

      $this->adidis = $rs->getString($startcol + 5);

      $this->totadi = $rs->getFloat($startcol + 6);

      $this->staadi = $rs->getString($startcol + 7);

      $this->numcom = $rs->getString($startcol + 8);

      $this->fecanu = $rs->getDate($startcol + 9, null);

      $this->peradi = $rs->getString($startcol + 10);

      $this->tipgas = $rs->getString($startcol + 11);

      $this->loguse = $rs->getString($startcol + 12);

      $this->fecreg = $rs->getTimestamp($startcol + 13, null);

      $this->clasifica = $rs->getString($startcol + 14);

      $this->coddirec = $rs->getString($startcol + 15);

      $this->nrodec = $rs->getString($startcol + 16);

      $this->fecdec = $rs->getDate($startcol + 17, null);

      $this->refsoladi = $rs->getString($startcol + 18);

      $this->id = $rs->getInt($startcol + 19);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 20; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpadidis object", $e);
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
			$con = Propel::getConnection(CpadidisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpadidisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpadidisPeer::DATABASE_NAME);
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
					$pk = CpadidisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpadidisPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpmovadis !== null) {
				foreach($this->collCpmovadis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpmovadipers !== null) {
				foreach($this->collCpmovadipers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = CpadidisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpmovadis !== null) {
					foreach($this->collCpmovadis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpmovadipers !== null) {
					foreach($this->collCpmovadipers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpadidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefadi();
				break;
			case 1:
				return $this->getFecadi();
				break;
			case 2:
				return $this->getAnoadi();
				break;
			case 3:
				return $this->getDesadi();
				break;
			case 4:
				return $this->getDesanu();
				break;
			case 5:
				return $this->getAdidis();
				break;
			case 6:
				return $this->getTotadi();
				break;
			case 7:
				return $this->getStaadi();
				break;
			case 8:
				return $this->getNumcom();
				break;
			case 9:
				return $this->getFecanu();
				break;
			case 10:
				return $this->getPeradi();
				break;
			case 11:
				return $this->getTipgas();
				break;
			case 12:
				return $this->getLoguse();
				break;
			case 13:
				return $this->getFecreg();
				break;
			case 14:
				return $this->getClasifica();
				break;
			case 15:
				return $this->getCoddirec();
				break;
			case 16:
				return $this->getNrodec();
				break;
			case 17:
				return $this->getFecdec();
				break;
			case 18:
				return $this->getRefsoladi();
				break;
			case 19:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpadidisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefadi(),
			$keys[1] => $this->getFecadi(),
			$keys[2] => $this->getAnoadi(),
			$keys[3] => $this->getDesadi(),
			$keys[4] => $this->getDesanu(),
			$keys[5] => $this->getAdidis(),
			$keys[6] => $this->getTotadi(),
			$keys[7] => $this->getStaadi(),
			$keys[8] => $this->getNumcom(),
			$keys[9] => $this->getFecanu(),
			$keys[10] => $this->getPeradi(),
			$keys[11] => $this->getTipgas(),
			$keys[12] => $this->getLoguse(),
			$keys[13] => $this->getFecreg(),
			$keys[14] => $this->getClasifica(),
			$keys[15] => $this->getCoddirec(),
			$keys[16] => $this->getNrodec(),
			$keys[17] => $this->getFecdec(),
			$keys[18] => $this->getRefsoladi(),
			$keys[19] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpadidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefadi($value);
				break;
			case 1:
				$this->setFecadi($value);
				break;
			case 2:
				$this->setAnoadi($value);
				break;
			case 3:
				$this->setDesadi($value);
				break;
			case 4:
				$this->setDesanu($value);
				break;
			case 5:
				$this->setAdidis($value);
				break;
			case 6:
				$this->setTotadi($value);
				break;
			case 7:
				$this->setStaadi($value);
				break;
			case 8:
				$this->setNumcom($value);
				break;
			case 9:
				$this->setFecanu($value);
				break;
			case 10:
				$this->setPeradi($value);
				break;
			case 11:
				$this->setTipgas($value);
				break;
			case 12:
				$this->setLoguse($value);
				break;
			case 13:
				$this->setFecreg($value);
				break;
			case 14:
				$this->setClasifica($value);
				break;
			case 15:
				$this->setCoddirec($value);
				break;
			case 16:
				$this->setNrodec($value);
				break;
			case 17:
				$this->setFecdec($value);
				break;
			case 18:
				$this->setRefsoladi($value);
				break;
			case 19:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpadidisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefadi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecadi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnoadi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesadi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesanu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdidis($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotadi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStaadi($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumcom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecanu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPeradi($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipgas($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLoguse($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecreg($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setClasifica($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCoddirec($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNrodec($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecdec($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setRefsoladi($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setId($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpadidisPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpadidisPeer::REFADI)) $criteria->add(CpadidisPeer::REFADI, $this->refadi);
		if ($this->isColumnModified(CpadidisPeer::FECADI)) $criteria->add(CpadidisPeer::FECADI, $this->fecadi);
		if ($this->isColumnModified(CpadidisPeer::ANOADI)) $criteria->add(CpadidisPeer::ANOADI, $this->anoadi);
		if ($this->isColumnModified(CpadidisPeer::DESADI)) $criteria->add(CpadidisPeer::DESADI, $this->desadi);
		if ($this->isColumnModified(CpadidisPeer::DESANU)) $criteria->add(CpadidisPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpadidisPeer::ADIDIS)) $criteria->add(CpadidisPeer::ADIDIS, $this->adidis);
		if ($this->isColumnModified(CpadidisPeer::TOTADI)) $criteria->add(CpadidisPeer::TOTADI, $this->totadi);
		if ($this->isColumnModified(CpadidisPeer::STAADI)) $criteria->add(CpadidisPeer::STAADI, $this->staadi);
		if ($this->isColumnModified(CpadidisPeer::NUMCOM)) $criteria->add(CpadidisPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CpadidisPeer::FECANU)) $criteria->add(CpadidisPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpadidisPeer::PERADI)) $criteria->add(CpadidisPeer::PERADI, $this->peradi);
		if ($this->isColumnModified(CpadidisPeer::TIPGAS)) $criteria->add(CpadidisPeer::TIPGAS, $this->tipgas);
		if ($this->isColumnModified(CpadidisPeer::LOGUSE)) $criteria->add(CpadidisPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(CpadidisPeer::FECREG)) $criteria->add(CpadidisPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(CpadidisPeer::CLASIFICA)) $criteria->add(CpadidisPeer::CLASIFICA, $this->clasifica);
		if ($this->isColumnModified(CpadidisPeer::CODDIREC)) $criteria->add(CpadidisPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(CpadidisPeer::NRODEC)) $criteria->add(CpadidisPeer::NRODEC, $this->nrodec);
		if ($this->isColumnModified(CpadidisPeer::FECDEC)) $criteria->add(CpadidisPeer::FECDEC, $this->fecdec);
		if ($this->isColumnModified(CpadidisPeer::REFSOLADI)) $criteria->add(CpadidisPeer::REFSOLADI, $this->refsoladi);
		if ($this->isColumnModified(CpadidisPeer::ID)) $criteria->add(CpadidisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpadidisPeer::DATABASE_NAME);

		$criteria->add(CpadidisPeer::ID, $this->id);

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

		$copyObj->setRefadi($this->refadi);

		$copyObj->setFecadi($this->fecadi);

		$copyObj->setAnoadi($this->anoadi);

		$copyObj->setDesadi($this->desadi);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setAdidis($this->adidis);

		$copyObj->setTotadi($this->totadi);

		$copyObj->setStaadi($this->staadi);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setPeradi($this->peradi);

		$copyObj->setTipgas($this->tipgas);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setClasifica($this->clasifica);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setNrodec($this->nrodec);

		$copyObj->setFecdec($this->fecdec);

		$copyObj->setRefsoladi($this->refsoladi);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpmovadis() as $relObj) {
				$copyObj->addCpmovadi($relObj->copy($deepCopy));
			}

			foreach($this->getCpmovadipers() as $relObj) {
				$copyObj->addCpmovadiper($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new CpadidisPeer();
		}
		return self::$peer;
	}

	
	public function initCpmovadis()
	{
		if ($this->collCpmovadis === null) {
			$this->collCpmovadis = array();
		}
	}

	
	public function getCpmovadis($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovadis === null) {
			if ($this->isNew()) {
			   $this->collCpmovadis = array();
			} else {

				$criteria->add(CpmovadiPeer::REFADI, $this->getRefadi());

				CpmovadiPeer::addSelectColumns($criteria);
				$this->collCpmovadis = CpmovadiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpmovadiPeer::REFADI, $this->getRefadi());

				CpmovadiPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpmovadiCriteria) || !$this->lastCpmovadiCriteria->equals($criteria)) {
					$this->collCpmovadis = CpmovadiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpmovadiCriteria = $criteria;
		return $this->collCpmovadis;
	}

	
	public function countCpmovadis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpmovadiPeer::REFADI, $this->getRefadi());

		return CpmovadiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpmovadi(Cpmovadi $l)
	{
		$this->collCpmovadis[] = $l;
		$l->setCpadidis($this);
	}


	
	public function getCpmovadisJoinCpdeftit($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovadis === null) {
			if ($this->isNew()) {
				$this->collCpmovadis = array();
			} else {

				$criteria->add(CpmovadiPeer::REFADI, $this->getRefadi());

				$this->collCpmovadis = CpmovadiPeer::doSelectJoinCpdeftit($criteria, $con);
			}
		} else {
									
			$criteria->add(CpmovadiPeer::REFADI, $this->getRefadi());

			if (!isset($this->lastCpmovadiCriteria) || !$this->lastCpmovadiCriteria->equals($criteria)) {
				$this->collCpmovadis = CpmovadiPeer::doSelectJoinCpdeftit($criteria, $con);
			}
		}
		$this->lastCpmovadiCriteria = $criteria;

		return $this->collCpmovadis;
	}

	
	public function initCpmovadipers()
	{
		if ($this->collCpmovadipers === null) {
			$this->collCpmovadipers = array();
		}
	}

	
	public function getCpmovadipers($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovadipers === null) {
			if ($this->isNew()) {
			   $this->collCpmovadipers = array();
			} else {

				$criteria->add(CpmovadiperPeer::REFADI, $this->getRefadi());

				CpmovadiperPeer::addSelectColumns($criteria);
				$this->collCpmovadipers = CpmovadiperPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpmovadiperPeer::REFADI, $this->getRefadi());

				CpmovadiperPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpmovadiperCriteria) || !$this->lastCpmovadiperCriteria->equals($criteria)) {
					$this->collCpmovadipers = CpmovadiperPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpmovadiperCriteria = $criteria;
		return $this->collCpmovadipers;
	}

	
	public function countCpmovadipers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpmovadiperPeer::REFADI, $this->getRefadi());

		return CpmovadiperPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpmovadiper(Cpmovadiper $l)
	{
		$this->collCpmovadipers[] = $l;
		$l->setCpadidis($this);
	}


	
	public function getCpmovadipersJoinCpdeftit($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpmovadiperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpmovadipers === null) {
			if ($this->isNew()) {
				$this->collCpmovadipers = array();
			} else {

				$criteria->add(CpmovadiperPeer::REFADI, $this->getRefadi());

				$this->collCpmovadipers = CpmovadiperPeer::doSelectJoinCpdeftit($criteria, $con);
			}
		} else {
									
			$criteria->add(CpmovadiperPeer::REFADI, $this->getRefadi());

			if (!isset($this->lastCpmovadiperCriteria) || !$this->lastCpmovadiperCriteria->equals($criteria)) {
				$this->collCpmovadipers = CpmovadiperPeer::doSelectJoinCpdeftit($criteria, $con);
			}
		}
		$this->lastCpmovadiperCriteria = $criteria;

		return $this->collCpmovadipers;
	}

} 