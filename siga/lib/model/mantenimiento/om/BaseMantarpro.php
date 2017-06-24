<?php


abstract class BaseMantarpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtar;


	
	protected $destar;


	
	protected $numequ;


	
	protected $codact;


	
	protected $codgru;


	
	protected $genreq;


	
	protected $taract;


	
	protected $codcar;


	
	protected $codtma;


	
	protected $tipfre;


	
	protected $interv;


	
	protected $fecupm;


	
	protected $horupm;


	
	protected $repppm;


	
	protected $fecppm;


	
	protected $horppm;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtar()
  {

    return trim($this->codtar);

  }
  
  public function getDestar()
  {

    return trim($this->destar);

  }
  
  public function getNumequ()
  {

    return trim($this->numequ);

  }
  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getCodgru()
  {

    return trim($this->codgru);

  }
  
  public function getGenreq()
  {

    return trim($this->genreq);

  }
  
  public function getTaract()
  {

    return trim($this->taract);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getCodtma()
  {

    return trim($this->codtma);

  }
  
  public function getTipfre()
  {

    return trim($this->tipfre);

  }
  
  public function getInterv($val=false)
  {

    if($val) return number_format($this->interv,2,',','.');
    else return $this->interv;

  }
  
  public function getFecupm($format = 'Y-m-d')
  {

    if ($this->fecupm === null || $this->fecupm === '') {
      return null;
    } elseif (!is_int($this->fecupm)) {
            $ts = adodb_strtotime($this->fecupm);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecupm] as date/time value: " . var_export($this->fecupm, true));
      }
    } else {
      $ts = $this->fecupm;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorupm($val=false)
  {

    if($val) return number_format($this->horupm,2,',','.');
    else return $this->horupm;

  }
  
  public function getRepppm()
  {

    return trim($this->repppm);

  }
  
  public function getFecppm($format = 'Y-m-d')
  {

    if ($this->fecppm === null || $this->fecppm === '') {
      return null;
    } elseif (!is_int($this->fecppm)) {
            $ts = adodb_strtotime($this->fecppm);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecppm] as date/time value: " . var_export($this->fecppm, true));
      }
    } else {
      $ts = $this->fecppm;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorppm($val=false)
  {

    if($val) return number_format($this->horppm,2,',','.');
    else return $this->horppm;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtar($v)
	{

    if ($this->codtar !== $v) {
        $this->codtar = $v;
        $this->modifiedColumns[] = MantarproPeer::CODTAR;
      }
  
	} 
	
	public function setDestar($v)
	{

    if ($this->destar !== $v) {
        $this->destar = $v;
        $this->modifiedColumns[] = MantarproPeer::DESTAR;
      }
  
	} 
	
	public function setNumequ($v)
	{

    if ($this->numequ !== $v) {
        $this->numequ = $v;
        $this->modifiedColumns[] = MantarproPeer::NUMEQU;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = MantarproPeer::CODACT;
      }
  
	} 
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = MantarproPeer::CODGRU;
      }
  
	} 
	
	public function setGenreq($v)
	{

    if ($this->genreq !== $v) {
        $this->genreq = $v;
        $this->modifiedColumns[] = MantarproPeer::GENREQ;
      }
  
	} 
	
	public function setTaract($v)
	{

    if ($this->taract !== $v) {
        $this->taract = $v;
        $this->modifiedColumns[] = MantarproPeer::TARACT;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = MantarproPeer::CODCAR;
      }
  
	} 
	
	public function setCodtma($v)
	{

    if ($this->codtma !== $v) {
        $this->codtma = $v;
        $this->modifiedColumns[] = MantarproPeer::CODTMA;
      }
  
	} 
	
	public function setTipfre($v)
	{

    if ($this->tipfre !== $v) {
        $this->tipfre = $v;
        $this->modifiedColumns[] = MantarproPeer::TIPFRE;
      }
  
	} 
	
	public function setInterv($v)
	{

    if ($this->interv !== $v) {
        $this->interv = Herramientas::toFloat($v);
        $this->modifiedColumns[] = MantarproPeer::INTERV;
      }
  
	} 
	
	public function setFecupm($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecupm] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecupm !== $ts) {
      $this->fecupm = $ts;
      $this->modifiedColumns[] = MantarproPeer::FECUPM;
    }

	} 
	
	public function setHorupm($v)
	{

    if ($this->horupm !== $v) {
        $this->horupm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = MantarproPeer::HORUPM;
      }
  
	} 
	
	public function setRepppm($v)
	{

    if ($this->repppm !== $v) {
        $this->repppm = $v;
        $this->modifiedColumns[] = MantarproPeer::REPPPM;
      }
  
	} 
	
	public function setFecppm($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecppm] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecppm !== $ts) {
      $this->fecppm = $ts;
      $this->modifiedColumns[] = MantarproPeer::FECPPM;
    }

	} 
	
	public function setHorppm($v)
	{

    if ($this->horppm !== $v) {
        $this->horppm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = MantarproPeer::HORPPM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = MantarproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtar = $rs->getString($startcol + 0);

      $this->destar = $rs->getString($startcol + 1);

      $this->numequ = $rs->getString($startcol + 2);

      $this->codact = $rs->getString($startcol + 3);

      $this->codgru = $rs->getString($startcol + 4);

      $this->genreq = $rs->getString($startcol + 5);

      $this->taract = $rs->getString($startcol + 6);

      $this->codcar = $rs->getString($startcol + 7);

      $this->codtma = $rs->getString($startcol + 8);

      $this->tipfre = $rs->getString($startcol + 9);

      $this->interv = $rs->getFloat($startcol + 10);

      $this->fecupm = $rs->getDate($startcol + 11, null);

      $this->horupm = $rs->getFloat($startcol + 12);

      $this->repppm = $rs->getString($startcol + 13);

      $this->fecppm = $rs->getDate($startcol + 14, null);

      $this->horppm = $rs->getFloat($startcol + 15);

      $this->id = $rs->getInt($startcol + 16);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 17; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Mantarpro object", $e);
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
			$con = Propel::getConnection(MantarproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MantarproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MantarproPeer::DATABASE_NAME);
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
					$pk = MantarproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MantarproPeer::doUpdate($this, $con);
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


			if (($retval = MantarproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MantarproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtar();
				break;
			case 1:
				return $this->getDestar();
				break;
			case 2:
				return $this->getNumequ();
				break;
			case 3:
				return $this->getCodact();
				break;
			case 4:
				return $this->getCodgru();
				break;
			case 5:
				return $this->getGenreq();
				break;
			case 6:
				return $this->getTaract();
				break;
			case 7:
				return $this->getCodcar();
				break;
			case 8:
				return $this->getCodtma();
				break;
			case 9:
				return $this->getTipfre();
				break;
			case 10:
				return $this->getInterv();
				break;
			case 11:
				return $this->getFecupm();
				break;
			case 12:
				return $this->getHorupm();
				break;
			case 13:
				return $this->getRepppm();
				break;
			case 14:
				return $this->getFecppm();
				break;
			case 15:
				return $this->getHorppm();
				break;
			case 16:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MantarproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtar(),
			$keys[1] => $this->getDestar(),
			$keys[2] => $this->getNumequ(),
			$keys[3] => $this->getCodact(),
			$keys[4] => $this->getCodgru(),
			$keys[5] => $this->getGenreq(),
			$keys[6] => $this->getTaract(),
			$keys[7] => $this->getCodcar(),
			$keys[8] => $this->getCodtma(),
			$keys[9] => $this->getTipfre(),
			$keys[10] => $this->getInterv(),
			$keys[11] => $this->getFecupm(),
			$keys[12] => $this->getHorupm(),
			$keys[13] => $this->getRepppm(),
			$keys[14] => $this->getFecppm(),
			$keys[15] => $this->getHorppm(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MantarproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtar($value);
				break;
			case 1:
				$this->setDestar($value);
				break;
			case 2:
				$this->setNumequ($value);
				break;
			case 3:
				$this->setCodact($value);
				break;
			case 4:
				$this->setCodgru($value);
				break;
			case 5:
				$this->setGenreq($value);
				break;
			case 6:
				$this->setTaract($value);
				break;
			case 7:
				$this->setCodcar($value);
				break;
			case 8:
				$this->setCodtma($value);
				break;
			case 9:
				$this->setTipfre($value);
				break;
			case 10:
				$this->setInterv($value);
				break;
			case 11:
				$this->setFecupm($value);
				break;
			case 12:
				$this->setHorupm($value);
				break;
			case 13:
				$this->setRepppm($value);
				break;
			case 14:
				$this->setFecppm($value);
				break;
			case 15:
				$this->setHorppm($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MantarproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumequ($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodgru($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setGenreq($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTaract($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodcar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodtma($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipfre($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setInterv($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecupm($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setHorupm($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRepppm($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecppm($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setHorppm($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MantarproPeer::DATABASE_NAME);

		if ($this->isColumnModified(MantarproPeer::CODTAR)) $criteria->add(MantarproPeer::CODTAR, $this->codtar);
		if ($this->isColumnModified(MantarproPeer::DESTAR)) $criteria->add(MantarproPeer::DESTAR, $this->destar);
		if ($this->isColumnModified(MantarproPeer::NUMEQU)) $criteria->add(MantarproPeer::NUMEQU, $this->numequ);
		if ($this->isColumnModified(MantarproPeer::CODACT)) $criteria->add(MantarproPeer::CODACT, $this->codact);
		if ($this->isColumnModified(MantarproPeer::CODGRU)) $criteria->add(MantarproPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(MantarproPeer::GENREQ)) $criteria->add(MantarproPeer::GENREQ, $this->genreq);
		if ($this->isColumnModified(MantarproPeer::TARACT)) $criteria->add(MantarproPeer::TARACT, $this->taract);
		if ($this->isColumnModified(MantarproPeer::CODCAR)) $criteria->add(MantarproPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(MantarproPeer::CODTMA)) $criteria->add(MantarproPeer::CODTMA, $this->codtma);
		if ($this->isColumnModified(MantarproPeer::TIPFRE)) $criteria->add(MantarproPeer::TIPFRE, $this->tipfre);
		if ($this->isColumnModified(MantarproPeer::INTERV)) $criteria->add(MantarproPeer::INTERV, $this->interv);
		if ($this->isColumnModified(MantarproPeer::FECUPM)) $criteria->add(MantarproPeer::FECUPM, $this->fecupm);
		if ($this->isColumnModified(MantarproPeer::HORUPM)) $criteria->add(MantarproPeer::HORUPM, $this->horupm);
		if ($this->isColumnModified(MantarproPeer::REPPPM)) $criteria->add(MantarproPeer::REPPPM, $this->repppm);
		if ($this->isColumnModified(MantarproPeer::FECPPM)) $criteria->add(MantarproPeer::FECPPM, $this->fecppm);
		if ($this->isColumnModified(MantarproPeer::HORPPM)) $criteria->add(MantarproPeer::HORPPM, $this->horppm);
		if ($this->isColumnModified(MantarproPeer::ID)) $criteria->add(MantarproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MantarproPeer::DATABASE_NAME);

		$criteria->add(MantarproPeer::ID, $this->id);

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

		$copyObj->setCodtar($this->codtar);

		$copyObj->setDestar($this->destar);

		$copyObj->setNumequ($this->numequ);

		$copyObj->setCodact($this->codact);

		$copyObj->setCodgru($this->codgru);

		$copyObj->setGenreq($this->genreq);

		$copyObj->setTaract($this->taract);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodtma($this->codtma);

		$copyObj->setTipfre($this->tipfre);

		$copyObj->setInterv($this->interv);

		$copyObj->setFecupm($this->fecupm);

		$copyObj->setHorupm($this->horupm);

		$copyObj->setRepppm($this->repppm);

		$copyObj->setFecppm($this->fecppm);

		$copyObj->setHorppm($this->horppm);


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
			self::$peer = new MantarproPeer();
		}
		return self::$peer;
	}

} 