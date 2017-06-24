<?php


abstract class BaseLidetcroentcontob extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcont;


	
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


	
	protected $numval;


	
	protected $licroent_id;


	
	protected $id;

	
	protected $aLicontrat;

	
	protected $aLiuniadm;

	
	protected $aLicroent;

	
	protected $collLidetcroentmodconts;

	
	protected $lastLidetcroentmodcontCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcont()
  {

    return trim($this->numcont);

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
  
  public function getNumval()
  {

    return $this->numval;

  }
  
  public function getLicroentId()
  {

    return trim($this->licroent_id);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcont($v)
	{

    if ($this->numcont !== $v) {
        $this->numcont = $v;
        $this->modifiedColumns[] = LidetcroentcontobPeer::NUMCONT;
      }
  
		if ($this->aLicontrat !== null && $this->aLicontrat->getNumcont() !== $v) {
			$this->aLicontrat = null;
		}

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LidetcroentcontobPeer::CODART;
      }
  
	} 
	
	public function setCantid($v)
	{

    if ($this->cantid !== $v) {
        $this->cantid = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetcroentcontobPeer::CANTID;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LidetcroentcontobPeer::CODUNIADM;
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
      $this->modifiedColumns[] = LidetcroentcontobPeer::FECENTCONT;
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
      $this->modifiedColumns[] = LidetcroentcontobPeer::FECENT;
    }

	} 
	
	public function setCondic($v)
	{

    if ($this->condic !== $v) {
        $this->condic = $v;
        $this->modifiedColumns[] = LidetcroentcontobPeer::CONDIC;
      }
  
	} 
	
	public function setCantidrec($v)
	{

    if ($this->cantidrec !== $v) {
        $this->cantidrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidetcroentcontobPeer::CANTIDREC;
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
      $this->modifiedColumns[] = LidetcroentcontobPeer::FECREC;
    }

	} 
	
	public function setObservacion($v)
	{

    if ($this->observacion !== $v) {
        $this->observacion = $v;
        $this->modifiedColumns[] = LidetcroentcontobPeer::OBSERVACION;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LidetcroentcontobPeer::TIPCONPUB;
      }
  
	} 
	
	public function setNumval($v)
	{

    if ($this->numval !== $v) {
        $this->numval = $v;
        $this->modifiedColumns[] = LidetcroentcontobPeer::NUMVAL;
      }
  
	} 
	
	public function setLicroentId($v)
	{

    if ($this->licroent_id !== $v) {
        $this->licroent_id = $v;
        $this->modifiedColumns[] = LidetcroentcontobPeer::LICROENT_ID;
      }
  
		if ($this->aLicroent !== null && $this->aLicroent->getId() !== $v) {
			$this->aLicroent = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidetcroentcontobPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcont = $rs->getString($startcol + 0);

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

      $this->numval = $rs->getInt($startcol + 11);

      $this->licroent_id = $rs->getString($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidetcroentcontob object", $e);
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
			$con = Propel::getConnection(LidetcroentcontobPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidetcroentcontobPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidetcroentcontobPeer::DATABASE_NAME);
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


												
			if ($this->aLicontrat !== null) {
				if ($this->aLicontrat->isModified()) {
					$affectedRows += $this->aLicontrat->save($con);
				}
				$this->setLicontrat($this->aLicontrat);
			}

			if ($this->aLiuniadm !== null) {
				if ($this->aLiuniadm->isModified()) {
					$affectedRows += $this->aLiuniadm->save($con);
				}
				$this->setLiuniadm($this->aLiuniadm);
			}

			if ($this->aLicroent !== null) {
				if ($this->aLicroent->isModified()) {
					$affectedRows += $this->aLicroent->save($con);
				}
				$this->setLicroent($this->aLicroent);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LidetcroentcontobPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidetcroentcontobPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLidetcroentmodconts !== null) {
				foreach($this->collLidetcroentmodconts as $referrerFK) {
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


												
			if ($this->aLicontrat !== null) {
				if (!$this->aLicontrat->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLicontrat->getValidationFailures());
				}
			}

			if ($this->aLiuniadm !== null) {
				if (!$this->aLiuniadm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiuniadm->getValidationFailures());
				}
			}

			if ($this->aLicroent !== null) {
				if (!$this->aLicroent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLicroent->getValidationFailures());
				}
			}


			if (($retval = LidetcroentcontobPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLidetcroentmodconts !== null) {
					foreach($this->collLidetcroentmodconts as $referrerFK) {
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
		$pos = LidetcroentcontobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcont();
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
				return $this->getNumval();
				break;
			case 12:
				return $this->getLicroentId();
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
		$keys = LidetcroentcontobPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcont(),
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
			$keys[11] => $this->getNumval(),
			$keys[12] => $this->getLicroentId(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetcroentcontobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcont($value);
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
				$this->setNumval($value);
				break;
			case 12:
				$this->setLicroentId($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidetcroentcontobPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcont($arr[$keys[0]]);
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
		if (array_key_exists($keys[11], $arr)) $this->setNumval($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLicroentId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidetcroentcontobPeer::DATABASE_NAME);

		if ($this->isColumnModified(LidetcroentcontobPeer::NUMCONT)) $criteria->add(LidetcroentcontobPeer::NUMCONT, $this->numcont);
		if ($this->isColumnModified(LidetcroentcontobPeer::CODART)) $criteria->add(LidetcroentcontobPeer::CODART, $this->codart);
		if ($this->isColumnModified(LidetcroentcontobPeer::CANTID)) $criteria->add(LidetcroentcontobPeer::CANTID, $this->cantid);
		if ($this->isColumnModified(LidetcroentcontobPeer::CODUNIADM)) $criteria->add(LidetcroentcontobPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LidetcroentcontobPeer::FECENTCONT)) $criteria->add(LidetcroentcontobPeer::FECENTCONT, $this->fecentcont);
		if ($this->isColumnModified(LidetcroentcontobPeer::FECENT)) $criteria->add(LidetcroentcontobPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(LidetcroentcontobPeer::CONDIC)) $criteria->add(LidetcroentcontobPeer::CONDIC, $this->condic);
		if ($this->isColumnModified(LidetcroentcontobPeer::CANTIDREC)) $criteria->add(LidetcroentcontobPeer::CANTIDREC, $this->cantidrec);
		if ($this->isColumnModified(LidetcroentcontobPeer::FECREC)) $criteria->add(LidetcroentcontobPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(LidetcroentcontobPeer::OBSERVACION)) $criteria->add(LidetcroentcontobPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(LidetcroentcontobPeer::TIPCONPUB)) $criteria->add(LidetcroentcontobPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LidetcroentcontobPeer::NUMVAL)) $criteria->add(LidetcroentcontobPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(LidetcroentcontobPeer::LICROENT_ID)) $criteria->add(LidetcroentcontobPeer::LICROENT_ID, $this->licroent_id);
		if ($this->isColumnModified(LidetcroentcontobPeer::ID)) $criteria->add(LidetcroentcontobPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidetcroentcontobPeer::DATABASE_NAME);

		$criteria->add(LidetcroentcontobPeer::ID, $this->id);

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

		$copyObj->setNumcont($this->numcont);

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

		$copyObj->setNumval($this->numval);

		$copyObj->setLicroentId($this->licroent_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLidetcroentmodconts() as $relObj) {
				$copyObj->addLidetcroentmodcont($relObj->copy($deepCopy));
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
			self::$peer = new LidetcroentcontobPeer();
		}
		return self::$peer;
	}

	
	public function setLicontrat($v)
	{


		if ($v === null) {
			$this->setNumcont(NULL);
		} else {
			$this->setNumcont($v->getNumcont());
		}


		$this->aLicontrat = $v;
	}


	
	public function getLicontrat($con = null)
	{
		if ($this->aLicontrat === null && (($this->numcont !== "" && $this->numcont !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLicontratPeer.php';

      $c = new Criteria();
      $c->add(LicontratPeer::NUMCONT,$this->numcont);
      
			$this->aLicontrat = LicontratPeer::doSelectOne($c, $con);

			
		}
		return $this->aLicontrat;
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

	
	public function setLicroent($v)
	{


		if ($v === null) {
			$this->setLicroentId(NULL);
		} else {
			$this->setLicroentId($v->getId());
		}


		$this->aLicroent = $v;
	}


	
	public function getLicroent($con = null)
	{
		if ($this->aLicroent === null && (($this->licroent_id !== "" && $this->licroent_id !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLicroentPeer.php';

      $c = new Criteria();
      $c->add(LicroentPeer::ID,$this->licroent_id);
      
			$this->aLicroent = LicroentPeer::doSelectOne($c, $con);

			
		}
		return $this->aLicroent;
	}

	
	public function initLidetcroentmodconts()
	{
		if ($this->collLidetcroentmodconts === null) {
			$this->collLidetcroentmodconts = array();
		}
	}

	
	public function getLidetcroentmodconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentmodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentmodconts === null) {
			if ($this->isNew()) {
			   $this->collLidetcroentmodconts = array();
			} else {

				$criteria->add(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, $this->getId());

				LidetcroentmodcontPeer::addSelectColumns($criteria);
				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, $this->getId());

				LidetcroentmodcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetcroentmodcontCriteria) || !$this->lastLidetcroentmodcontCriteria->equals($criteria)) {
					$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetcroentmodcontCriteria = $criteria;
		return $this->collLidetcroentmodconts;
	}

	
	public function countLidetcroentmodconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentmodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, $this->getId());

		return LidetcroentmodcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetcroentmodcont(Lidetcroentmodcont $l)
	{
		$this->collLidetcroentmodconts[] = $l;
		$l->setLidetcroentcontob($this);
	}


	
	public function getLidetcroentmodcontsJoinLimodcont($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentmodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentmodconts === null) {
			if ($this->isNew()) {
				$this->collLidetcroentmodconts = array();
			} else {

				$criteria->add(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, $this->getId());

				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLimodcont($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, $this->getId());

			if (!isset($this->lastLidetcroentmodcontCriteria) || !$this->lastLidetcroentmodcontCriteria->equals($criteria)) {
				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLimodcont($criteria, $con);
			}
		}
		$this->lastLidetcroentmodcontCriteria = $criteria;

		return $this->collLidetcroentmodconts;
	}


	
	public function getLidetcroentmodcontsJoinLiuniadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentmodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentmodconts === null) {
			if ($this->isNew()) {
				$this->collLidetcroentmodconts = array();
			} else {

				$criteria->add(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, $this->getId());

				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentmodcontPeer::LIDETCROENTCONTOB_ID, $this->getId());

			if (!isset($this->lastLidetcroentmodcontCriteria) || !$this->lastLidetcroentmodcontCriteria->equals($criteria)) {
				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		}
		$this->lastLidetcroentmodcontCriteria = $criteria;

		return $this->collLidetcroentmodconts;
	}

} 