<?php


abstract class BaseLidetcroentmodcont extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nummod;


	
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


	
	protected $lidetcroentcontob_id;


	
	protected $numval;


	
	protected $id;

	
	protected $aLimodcont;

	
	protected $aLiuniadm;

	
	protected $aLidetcroentcontob;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNummod()
  {

    return trim($this->nummod);

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
  
  public function getLidetcroentcontobId()
  {

    return trim($this->lidetcroentcontob_id);

  }
  
  public function getNumval()
  {

    return $this->numval;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNummod($v)
	{

    if ($this->nummod !== $v) {
        $this->nummod = $v;
        $this->modifiedColumns[] = LidetcroentmodcontPeer::NUMMOD;
      }
  
		if ($this->aLimodcont !== null && $this->aLimodcont->getNummod() !== $v) {
			$this->aLimodcont = null;
		}

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LidetcroentmodcontPeer::CODART;
      }
  
	} 
	
	public function setCantid($v)
	{

    if ($this->cantid !== $v) {
        $this->cantid = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetcroentmodcontPeer::CANTID;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LidetcroentmodcontPeer::CODUNIADM;
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
      $this->modifiedColumns[] = LidetcroentmodcontPeer::FECENTCONT;
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
      $this->modifiedColumns[] = LidetcroentmodcontPeer::FECENT;
    }

	} 
	
	public function setCondic($v)
	{

    if ($this->condic !== $v) {
        $this->condic = $v;
        $this->modifiedColumns[] = LidetcroentmodcontPeer::CONDIC;
      }
  
	} 
	
	public function setCantidrec($v)
	{

    if ($this->cantidrec !== $v) {
        $this->cantidrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetcroentmodcontPeer::CANTIDREC;
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
      $this->modifiedColumns[] = LidetcroentmodcontPeer::FECREC;
    }

	} 
	
	public function setObservacion($v)
	{

    if ($this->observacion !== $v) {
        $this->observacion = $v;
        $this->modifiedColumns[] = LidetcroentmodcontPeer::OBSERVACION;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LidetcroentmodcontPeer::TIPCONPUB;
      }
  
	} 
	
	public function setLidetcroentcontobId($v)
	{

    if ($this->lidetcroentcontob_id !== $v) {
        $this->lidetcroentcontob_id = $v;
        $this->modifiedColumns[] = LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID;
      }
  
		if ($this->aLidetcroentcontob !== null && $this->aLidetcroentcontob->getId() !== $v) {
			$this->aLidetcroentcontob = null;
		}

	} 
	
	public function setNumval($v)
	{

    if ($this->numval !== $v) {
        $this->numval = $v;
        $this->modifiedColumns[] = LidetcroentmodcontPeer::NUMVAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidetcroentmodcontPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nummod = $rs->getString($startcol + 0);

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

      $this->lidetcroentcontob_id = $rs->getString($startcol + 11);

      $this->numval = $rs->getInt($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidetcroentmodcont object", $e);
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
			$con = Propel::getConnection(LidetcroentmodcontPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidetcroentmodcontPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidetcroentmodcontPeer::DATABASE_NAME);
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


												
			if ($this->aLimodcont !== null) {
				if ($this->aLimodcont->isModified()) {
					$affectedRows += $this->aLimodcont->save($con);
				}
				$this->setLimodcont($this->aLimodcont);
			}

			if ($this->aLiuniadm !== null) {
				if ($this->aLiuniadm->isModified()) {
					$affectedRows += $this->aLiuniadm->save($con);
				}
				$this->setLiuniadm($this->aLiuniadm);
			}

			if ($this->aLidetcroentcontob !== null) {
				if ($this->aLidetcroentcontob->isModified()) {
					$affectedRows += $this->aLidetcroentcontob->save($con);
				}
				$this->setLidetcroentcontob($this->aLidetcroentcontob);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LidetcroentmodcontPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidetcroentmodcontPeer::doUpdate($this, $con);
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


												
			if ($this->aLimodcont !== null) {
				if (!$this->aLimodcont->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLimodcont->getValidationFailures());
				}
			}

			if ($this->aLiuniadm !== null) {
				if (!$this->aLiuniadm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiuniadm->getValidationFailures());
				}
			}

			if ($this->aLidetcroentcontob !== null) {
				if (!$this->aLidetcroentcontob->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLidetcroentcontob->getValidationFailures());
				}
			}


			if (($retval = LidetcroentmodcontPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetcroentmodcontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNummod();
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
				return $this->getLidetcroentcontobId();
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
		$keys = LidetcroentmodcontPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNummod(),
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
			$keys[11] => $this->getLidetcroentcontobId(),
			$keys[12] => $this->getNumval(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetcroentmodcontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNummod($value);
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
				$this->setLidetcroentcontobId($value);
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
		$keys = LidetcroentmodcontPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNummod($arr[$keys[0]]);
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
		if (array_key_exists($keys[11], $arr)) $this->setLidetcroentcontobId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumval($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidetcroentmodcontPeer::DATABASE_NAME);

		if ($this->isColumnModified(LidetcroentmodcontPeer::NUMMOD)) $criteria->add(LidetcroentmodcontPeer::NUMMOD, $this->nummod);
		if ($this->isColumnModified(LidetcroentmodcontPeer::CODART)) $criteria->add(LidetcroentmodcontPeer::CODART, $this->codart);
		if ($this->isColumnModified(LidetcroentmodcontPeer::CANTID)) $criteria->add(LidetcroentmodcontPeer::CANTID, $this->cantid);
		if ($this->isColumnModified(LidetcroentmodcontPeer::CODUNIADM)) $criteria->add(LidetcroentmodcontPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LidetcroentmodcontPeer::FECENTCONT)) $criteria->add(LidetcroentmodcontPeer::FECENTCONT, $this->fecentcont);
		if ($this->isColumnModified(LidetcroentmodcontPeer::FECENT)) $criteria->add(LidetcroentmodcontPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(LidetcroentmodcontPeer::CONDIC)) $criteria->add(LidetcroentmodcontPeer::CONDIC, $this->condic);
		if ($this->isColumnModified(LidetcroentmodcontPeer::CANTIDREC)) $criteria->add(LidetcroentmodcontPeer::CANTIDREC, $this->cantidrec);
		if ($this->isColumnModified(LidetcroentmodcontPeer::FECREC)) $criteria->add(LidetcroentmodcontPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(LidetcroentmodcontPeer::OBSERVACION)) $criteria->add(LidetcroentmodcontPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(LidetcroentmodcontPeer::TIPCONPUB)) $criteria->add(LidetcroentmodcontPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID)) $criteria->add(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, $this->lidetcroentcontob_id);
		if ($this->isColumnModified(LidetcroentmodcontPeer::NUMVAL)) $criteria->add(LidetcroentmodcontPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(LidetcroentmodcontPeer::ID)) $criteria->add(LidetcroentmodcontPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidetcroentmodcontPeer::DATABASE_NAME);

		$criteria->add(LidetcroentmodcontPeer::ID, $this->id);

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

		$copyObj->setNummod($this->nummod);

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

		$copyObj->setLidetcroentcontobId($this->lidetcroentcontob_id);

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
			self::$peer = new LidetcroentmodcontPeer();
		}
		return self::$peer;
	}

	
	public function setLimodcont($v)
	{


		if ($v === null) {
			$this->setNummod(NULL);
		} else {
			$this->setNummod($v->getNummod());
		}


		$this->aLimodcont = $v;
	}


	
	public function getLimodcont($con = null)
	{
		if ($this->aLimodcont === null && (($this->nummod !== "" && $this->nummod !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';

      $c = new Criteria();
      $c->add(LimodcontPeer::NUMMOD,$this->nummod);
      
			$this->aLimodcont = LimodcontPeer::doSelectOne($c, $con);

			
		}
		return $this->aLimodcont;
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

	
	public function setLidetcroentcontob($v)
	{


		if ($v === null) {
			$this->setLidetcroentcontobId(NULL);
		} else {
			$this->setLidetcroentcontobId($v->getId());
		}


		$this->aLidetcroentcontob = $v;
	}


	
	public function getLidetcroentcontob($con = null)
	{
		if ($this->aLidetcroentcontob === null && (($this->lidetcroentcontob_id !== "" && $this->lidetcroentcontob_id !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLidetcroentcontobPeer.php';

      $c = new Criteria();
      $c->add(LidetcroentcontobPeer::ID,$this->lidetcroentcontob_id);
      
			$this->aLidetcroentcontob = LidetcroentcontobPeer::doSelectOne($c, $con);

			
		}
		return $this->aLidetcroentcontob;
	}

} 