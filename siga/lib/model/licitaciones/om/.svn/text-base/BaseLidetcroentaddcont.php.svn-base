<?php


abstract class BaseLidetcroentaddcont extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numadd;


	
	protected $codart;


	
	protected $cantid;


	
	protected $coduniadm;


	
	protected $fecentcont;


	
	protected $fecent;


	
	protected $condic;


	
	protected $cantidrec;


	
	protected $fecrec;


	
	protected $observacion;


	
	protected $tipconpub;


	
	protected $lidetcroentcont_id;


	
	protected $numval;


	
	protected $id;

	
	protected $aLiaddendum;

	
	protected $aLiuniadm;

	
	protected $aLidetcroentcont;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumadd()
  {

    return trim($this->numadd);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCantid($val=false)
  {

    if($val) return number_format($this->cantid,2,',','.');
    else return $this->cantid;

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getFecentcont($format = 'Y-m-d')
  {

    if ($this->fecentcont === null || $this->fecentcont === '') {
      return null;
    } elseif (!is_int($this->fecentcont)) {
            $ts = adodb_strtotime($this->fecentcont);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecentcont] as date/time value: " . var_export($this->fecentcont, true));
      }
    } else {
      $ts = $this->fecentcont;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCondic()
  {

    return trim($this->condic);

  }
  
  public function getCantidrec($val=false)
  {

    if($val) return number_format($this->cantidrec,2,',','.');
    else return $this->cantidrec;

  }
  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getObservacion()
  {

    return trim($this->observacion);

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getLidetcroentcontId()
  {

    return trim($this->lidetcroentcont_id);

  }
  
  public function getNumval()
  {

    return $this->numval;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumadd($v)
	{

    if ($this->numadd !== $v) {
        $this->numadd = $v;
        $this->modifiedColumns[] = LidetcroentaddcontPeer::NUMADD;
      }
  
		if ($this->aLiaddendum !== null && $this->aLiaddendum->getNumadd() !== $v) {
			$this->aLiaddendum = null;
		}

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LidetcroentaddcontPeer::CODART;
      }
  
	} 
	
	public function setCantid($v)
	{

    if ($this->cantid !== $v) {
        $this->cantid = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetcroentaddcontPeer::CANTID;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LidetcroentaddcontPeer::CODUNIADM;
      }
  
		if ($this->aLiuniadm !== null && $this->aLiuniadm->getCoduniadm() !== $v) {
			$this->aLiuniadm = null;
		}

	} 
	
	public function setFecentcont($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecentcont] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecentcont !== $ts) {
      $this->fecentcont = $ts;
      $this->modifiedColumns[] = LidetcroentaddcontPeer::FECENTCONT;
    }

	} 
	
	public function setFecent($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = LidetcroentaddcontPeer::FECENT;
    }

	} 
	
	public function setCondic($v)
	{

    if ($this->condic !== $v) {
        $this->condic = $v;
        $this->modifiedColumns[] = LidetcroentaddcontPeer::CONDIC;
      }
  
	} 
	
	public function setCantidrec($v)
	{

    if ($this->cantidrec !== $v) {
        $this->cantidrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetcroentaddcontPeer::CANTIDREC;
      }
  
	} 
	
	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = LidetcroentaddcontPeer::FECREC;
    }

	} 
	
	public function setObservacion($v)
	{

    if ($this->observacion !== $v) {
        $this->observacion = $v;
        $this->modifiedColumns[] = LidetcroentaddcontPeer::OBSERVACION;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LidetcroentaddcontPeer::TIPCONPUB;
      }
  
	} 
	
	public function setLidetcroentcontId($v)
	{

    if ($this->lidetcroentcont_id !== $v) {
        $this->lidetcroentcont_id = $v;
        $this->modifiedColumns[] = LidetcroentaddcontPeer::LIDETCROENTCONT_ID;
      }
  
		if ($this->aLidetcroentcont !== null && $this->aLidetcroentcont->getId() !== $v) {
			$this->aLidetcroentcont = null;
		}

	} 
	
	public function setNumval($v)
	{

    if ($this->numval !== $v) {
        $this->numval = $v;
        $this->modifiedColumns[] = LidetcroentaddcontPeer::NUMVAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidetcroentaddcontPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numadd = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->cantid = $rs->getFloat($startcol + 2);

      $this->coduniadm = $rs->getString($startcol + 3);

      $this->fecentcont = $rs->getDate($startcol + 4, null);

      $this->fecent = $rs->getDate($startcol + 5, null);

      $this->condic = $rs->getString($startcol + 6);

      $this->cantidrec = $rs->getFloat($startcol + 7);

      $this->fecrec = $rs->getDate($startcol + 8, null);

      $this->observacion = $rs->getString($startcol + 9);

      $this->tipconpub = $rs->getString($startcol + 10);

      $this->lidetcroentcont_id = $rs->getString($startcol + 11);

      $this->numval = $rs->getInt($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidetcroentaddcont object", $e);
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
			$con = Propel::getConnection(LidetcroentaddcontPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidetcroentaddcontPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidetcroentaddcontPeer::DATABASE_NAME);
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


												
			if ($this->aLiaddendum !== null) {
				if ($this->aLiaddendum->isModified()) {
					$affectedRows += $this->aLiaddendum->save($con);
				}
				$this->setLiaddendum($this->aLiaddendum);
			}

			if ($this->aLiuniadm !== null) {
				if ($this->aLiuniadm->isModified()) {
					$affectedRows += $this->aLiuniadm->save($con);
				}
				$this->setLiuniadm($this->aLiuniadm);
			}

			if ($this->aLidetcroentcont !== null) {
				if ($this->aLidetcroentcont->isModified()) {
					$affectedRows += $this->aLidetcroentcont->save($con);
				}
				$this->setLidetcroentcont($this->aLidetcroentcont);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LidetcroentaddcontPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidetcroentaddcontPeer::doUpdate($this, $con);
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


												
			if ($this->aLiaddendum !== null) {
				if (!$this->aLiaddendum->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiaddendum->getValidationFailures());
				}
			}

			if ($this->aLiuniadm !== null) {
				if (!$this->aLiuniadm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiuniadm->getValidationFailures());
				}
			}

			if ($this->aLidetcroentcont !== null) {
				if (!$this->aLidetcroentcont->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLidetcroentcont->getValidationFailures());
				}
			}


			if (($retval = LidetcroentaddcontPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetcroentaddcontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumadd();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCantid();
				break;
			case 3:
				return $this->getCoduniadm();
				break;
			case 4:
				return $this->getFecentcont();
				break;
			case 5:
				return $this->getFecent();
				break;
			case 6:
				return $this->getCondic();
				break;
			case 7:
				return $this->getCantidrec();
				break;
			case 8:
				return $this->getFecrec();
				break;
			case 9:
				return $this->getObservacion();
				break;
			case 10:
				return $this->getTipconpub();
				break;
			case 11:
				return $this->getLidetcroentcontId();
				break;
			case 12:
				return $this->getNumval();
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
		$keys = LidetcroentaddcontPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumadd(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCantid(),
			$keys[3] => $this->getCoduniadm(),
			$keys[4] => $this->getFecentcont(),
			$keys[5] => $this->getFecent(),
			$keys[6] => $this->getCondic(),
			$keys[7] => $this->getCantidrec(),
			$keys[8] => $this->getFecrec(),
			$keys[9] => $this->getObservacion(),
			$keys[10] => $this->getTipconpub(),
			$keys[11] => $this->getLidetcroentcontId(),
			$keys[12] => $this->getNumval(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetcroentaddcontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumadd($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCantid($value);
				break;
			case 3:
				$this->setCoduniadm($value);
				break;
			case 4:
				$this->setFecentcont($value);
				break;
			case 5:
				$this->setFecent($value);
				break;
			case 6:
				$this->setCondic($value);
				break;
			case 7:
				$this->setCantidrec($value);
				break;
			case 8:
				$this->setFecrec($value);
				break;
			case 9:
				$this->setObservacion($value);
				break;
			case 10:
				$this->setTipconpub($value);
				break;
			case 11:
				$this->setLidetcroentcontId($value);
				break;
			case 12:
				$this->setNumval($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidetcroentaddcontPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumadd($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCantid($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCoduniadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecentcont($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecent($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCondic($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCantidrec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecrec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObservacion($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipconpub($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLidetcroentcontId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumval($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidetcroentaddcontPeer::DATABASE_NAME);

		if ($this->isColumnModified(LidetcroentaddcontPeer::NUMADD)) $criteria->add(LidetcroentaddcontPeer::NUMADD, $this->numadd);
		if ($this->isColumnModified(LidetcroentaddcontPeer::CODART)) $criteria->add(LidetcroentaddcontPeer::CODART, $this->codart);
		if ($this->isColumnModified(LidetcroentaddcontPeer::CANTID)) $criteria->add(LidetcroentaddcontPeer::CANTID, $this->cantid);
		if ($this->isColumnModified(LidetcroentaddcontPeer::CODUNIADM)) $criteria->add(LidetcroentaddcontPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LidetcroentaddcontPeer::FECENTCONT)) $criteria->add(LidetcroentaddcontPeer::FECENTCONT, $this->fecentcont);
		if ($this->isColumnModified(LidetcroentaddcontPeer::FECENT)) $criteria->add(LidetcroentaddcontPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(LidetcroentaddcontPeer::CONDIC)) $criteria->add(LidetcroentaddcontPeer::CONDIC, $this->condic);
		if ($this->isColumnModified(LidetcroentaddcontPeer::CANTIDREC)) $criteria->add(LidetcroentaddcontPeer::CANTIDREC, $this->cantidrec);
		if ($this->isColumnModified(LidetcroentaddcontPeer::FECREC)) $criteria->add(LidetcroentaddcontPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(LidetcroentaddcontPeer::OBSERVACION)) $criteria->add(LidetcroentaddcontPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(LidetcroentaddcontPeer::TIPCONPUB)) $criteria->add(LidetcroentaddcontPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LidetcroentaddcontPeer::LIDETCROENTCONT_ID)) $criteria->add(LidetcroentaddcontPeer::LIDETCROENTCONT_ID, $this->lidetcroentcont_id);
		if ($this->isColumnModified(LidetcroentaddcontPeer::NUMVAL)) $criteria->add(LidetcroentaddcontPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(LidetcroentaddcontPeer::ID)) $criteria->add(LidetcroentaddcontPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidetcroentaddcontPeer::DATABASE_NAME);

		$criteria->add(LidetcroentaddcontPeer::ID, $this->id);

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

		$copyObj->setNumadd($this->numadd);

		$copyObj->setCodart($this->codart);

		$copyObj->setCantid($this->cantid);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setFecentcont($this->fecentcont);

		$copyObj->setFecent($this->fecent);

		$copyObj->setCondic($this->condic);

		$copyObj->setCantidrec($this->cantidrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setObservacion($this->observacion);

		$copyObj->setTipconpub($this->tipconpub);

		$copyObj->setLidetcroentcontId($this->lidetcroentcont_id);

		$copyObj->setNumval($this->numval);


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
			self::$peer = new LidetcroentaddcontPeer();
		}
		return self::$peer;
	}

	
	public function setLiaddendum($v)
	{


		if ($v === null) {
			$this->setNumadd(NULL);
		} else {
			$this->setNumadd($v->getNumadd());
		}


		$this->aLiaddendum = $v;
	}


	
	public function getLiaddendum($con = null)
	{
		if ($this->aLiaddendum === null && (($this->numadd !== "" && $this->numadd !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';

      $c = new Criteria();
      $c->add(LiaddendumPeer::NUMADD,$this->numadd);
      
			$this->aLiaddendum = LiaddendumPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiaddendum;
	}

	
	public function setLiuniadm($v)
	{


		if ($v === null) {
			$this->setCoduniadm(NULL);
		} else {
			$this->setCoduniadm($v->getCoduniadm());
		}


		$this->aLiuniadm = $v;
	}


	
	public function getLiuniadm($con = null)
	{
		if ($this->aLiuniadm === null && (($this->coduniadm !== "" && $this->coduniadm !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLiuniadmPeer.php';

      $c = new Criteria();
      $c->add(LiuniadmPeer::CODUNIADM,$this->coduniadm);
      
			$this->aLiuniadm = LiuniadmPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiuniadm;
	}

	
	public function setLidetcroentcont($v)
	{


		if ($v === null) {
			$this->setLidetcroentcontId(NULL);
		} else {
			$this->setLidetcroentcontId($v->getId());
		}


		$this->aLidetcroentcont = $v;
	}


	
	public function getLidetcroentcont($con = null)
	{
		if ($this->aLidetcroentcont === null && (($this->lidetcroentcont_id !== "" && $this->lidetcroentcont_id !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLidetcroentcontPeer.php';

      $c = new Criteria();
      $c->add(LidetcroentcontPeer::ID,$this->lidetcroentcont_id);
      
			$this->aLidetcroentcont = LidetcroentcontPeer::doSelectOne($c, $con);

			
		}
		return $this->aLidetcroentcont;
	}

} 