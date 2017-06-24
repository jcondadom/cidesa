<?php


abstract class BaseTspagele extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpag;


	
	protected $numcue;


	
	protected $fecpag;


	
	protected $monpag;


	
	protected $estpag;


	
	protected $loguse;


	
	protected $tipdoc;


	
	protected $despag;


	
	protected $cedrif;


	
	protected $tiptxt;


	
	protected $fecanu;


	
	protected $desanu;


	
	protected $fecpagado;


	
	protected $fecefepag;


	
	protected $codmon;


	
	protected $valmon;


	
	protected $coddirec;


	
	protected $id;

	
	protected $aTsdefmon;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefpag()
  {

    return trim($this->refpag);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getFecpag($format = 'Y-m-d')
  {

    if ($this->fecpag === null || $this->fecpag === '') {
      return null;
    } elseif (!is_int($this->fecpag)) {
            $ts = adodb_strtotime($this->fecpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
      }
    } else {
      $ts = $this->fecpag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getEstpag()
  {

    return trim($this->estpag);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getDespag()
  {

    return trim($this->despag);

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getTiptxt()
  {

    return trim($this->tiptxt);

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
  
  public function getFecpagado($format = 'Y-m-d')
  {

    if ($this->fecpagado === null || $this->fecpagado === '') {
      return null;
    } elseif (!is_int($this->fecpagado)) {
            $ts = adodb_strtotime($this->fecpagado);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpagado] as date/time value: " . var_export($this->fecpagado, true));
      }
    } else {
      $ts = $this->fecpagado;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecefepag($format = 'Y-m-d')
  {

    if ($this->fecefepag === null || $this->fecefepag === '') {
      return null;
    } elseif (!is_int($this->fecefepag)) {
            $ts = adodb_strtotime($this->fecefepag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecefepag] as date/time value: " . var_export($this->fecefepag, true));
      }
    } else {
      $ts = $this->fecefepag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,2,',','.');
    else return $this->valmon;

  }
  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpag($v)
	{

    if ($this->refpag !== $v) {
        $this->refpag = $v;
        $this->modifiedColumns[] = TspagelePeer::REFPAG;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TspagelePeer::NUMCUE;
      }
  
	} 
	
	public function setFecpag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = TspagelePeer::FECPAG;
    }

	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspagelePeer::MONPAG;
      }
  
	} 
	
	public function setEstpag($v)
	{

    if ($this->estpag !== $v) {
        $this->estpag = $v;
        $this->modifiedColumns[] = TspagelePeer::ESTPAG;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = TspagelePeer::LOGUSE;
      }
  
	} 
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = TspagelePeer::TIPDOC;
      }
  
	} 
	
	public function setDespag($v)
	{

    if ($this->despag !== $v) {
        $this->despag = $v;
        $this->modifiedColumns[] = TspagelePeer::DESPAG;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = TspagelePeer::CEDRIF;
      }
  
	} 
	
	public function setTiptxt($v)
	{

    if ($this->tiptxt !== $v) {
        $this->tiptxt = $v;
        $this->modifiedColumns[] = TspagelePeer::TIPTXT;
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
      $this->modifiedColumns[] = TspagelePeer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = TspagelePeer::DESANU;
      }
  
	} 
	
	public function setFecpagado($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpagado] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpagado !== $ts) {
      $this->fecpagado = $ts;
      $this->modifiedColumns[] = TspagelePeer::FECPAGADO;
    }

	} 
	
	public function setFecefepag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecefepag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecefepag !== $ts) {
      $this->fecefepag = $ts;
      $this->modifiedColumns[] = TspagelePeer::FECEFEPAG;
    }

	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = TspagelePeer::CODMON;
      }
  
		if ($this->aTsdefmon !== null && $this->aTsdefmon->getCodmon() !== $v) {
			$this->aTsdefmon = null;
		}

	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspagelePeer::VALMON;
      }
  
	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = TspagelePeer::CODDIREC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TspagelePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpag = $rs->getString($startcol + 0);

      $this->numcue = $rs->getString($startcol + 1);

      $this->fecpag = $rs->getDate($startcol + 2, null);

      $this->monpag = $rs->getFloat($startcol + 3);

      $this->estpag = $rs->getString($startcol + 4);

      $this->loguse = $rs->getString($startcol + 5);

      $this->tipdoc = $rs->getString($startcol + 6);

      $this->despag = $rs->getString($startcol + 7);

      $this->cedrif = $rs->getString($startcol + 8);

      $this->tiptxt = $rs->getString($startcol + 9);

      $this->fecanu = $rs->getDate($startcol + 10, null);

      $this->desanu = $rs->getString($startcol + 11);

      $this->fecpagado = $rs->getDate($startcol + 12, null);

      $this->fecefepag = $rs->getDate($startcol + 13, null);

      $this->codmon = $rs->getString($startcol + 14);

      $this->valmon = $rs->getFloat($startcol + 15);

      $this->coddirec = $rs->getString($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tspagele object", $e);
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
			$con = Propel::getConnection(TspagelePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TspagelePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TspagelePeer::DATABASE_NAME);
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


												
			if ($this->aTsdefmon !== null) {
				if ($this->aTsdefmon->isModified()) {
					$affectedRows += $this->aTsdefmon->save($con);
				}
				$this->setTsdefmon($this->aTsdefmon);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TspagelePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TspagelePeer::doUpdate($this, $con);
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


												
			if ($this->aTsdefmon !== null) {
				if (!$this->aTsdefmon->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTsdefmon->getValidationFailures());
				}
			}


			if (($retval = TspagelePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TspagelePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpag();
				break;
			case 1:
				return $this->getNumcue();
				break;
			case 2:
				return $this->getFecpag();
				break;
			case 3:
				return $this->getMonpag();
				break;
			case 4:
				return $this->getEstpag();
				break;
			case 5:
				return $this->getLoguse();
				break;
			case 6:
				return $this->getTipdoc();
				break;
			case 7:
				return $this->getDespag();
				break;
			case 8:
				return $this->getCedrif();
				break;
			case 9:
				return $this->getTiptxt();
				break;
			case 10:
				return $this->getFecanu();
				break;
			case 11:
				return $this->getDesanu();
				break;
			case 12:
				return $this->getFecpagado();
				break;
			case 13:
				return $this->getFecefepag();
				break;
			case 14:
				return $this->getCodmon();
				break;
			case 15:
				return $this->getValmon();
				break;
			case 16:
				return $this->getCoddirec();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TspagelePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpag(),
			$keys[1] => $this->getNumcue(),
			$keys[2] => $this->getFecpag(),
			$keys[3] => $this->getMonpag(),
			$keys[4] => $this->getEstpag(),
			$keys[5] => $this->getLoguse(),
			$keys[6] => $this->getTipdoc(),
			$keys[7] => $this->getDespag(),
			$keys[8] => $this->getCedrif(),
			$keys[9] => $this->getTiptxt(),
			$keys[10] => $this->getFecanu(),
			$keys[11] => $this->getDesanu(),
			$keys[12] => $this->getFecpagado(),
			$keys[13] => $this->getFecefepag(),
			$keys[14] => $this->getCodmon(),
			$keys[15] => $this->getValmon(),
			$keys[16] => $this->getCoddirec(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TspagelePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpag($value);
				break;
			case 1:
				$this->setNumcue($value);
				break;
			case 2:
				$this->setFecpag($value);
				break;
			case 3:
				$this->setMonpag($value);
				break;
			case 4:
				$this->setEstpag($value);
				break;
			case 5:
				$this->setLoguse($value);
				break;
			case 6:
				$this->setTipdoc($value);
				break;
			case 7:
				$this->setDespag($value);
				break;
			case 8:
				$this->setCedrif($value);
				break;
			case 9:
				$this->setTiptxt($value);
				break;
			case 10:
				$this->setFecanu($value);
				break;
			case 11:
				$this->setDesanu($value);
				break;
			case 12:
				$this->setFecpagado($value);
				break;
			case 13:
				$this->setFecefepag($value);
				break;
			case 14:
				$this->setCodmon($value);
				break;
			case 15:
				$this->setValmon($value);
				break;
			case 16:
				$this->setCoddirec($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TspagelePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecpag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonpag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEstpag($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLoguse($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipdoc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDespag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCedrif($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTiptxt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecanu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDesanu($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecpagado($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecefepag($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodmon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setValmon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCoddirec($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TspagelePeer::DATABASE_NAME);

		if ($this->isColumnModified(TspagelePeer::REFPAG)) $criteria->add(TspagelePeer::REFPAG, $this->refpag);
		if ($this->isColumnModified(TspagelePeer::NUMCUE)) $criteria->add(TspagelePeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TspagelePeer::FECPAG)) $criteria->add(TspagelePeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(TspagelePeer::MONPAG)) $criteria->add(TspagelePeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(TspagelePeer::ESTPAG)) $criteria->add(TspagelePeer::ESTPAG, $this->estpag);
		if ($this->isColumnModified(TspagelePeer::LOGUSE)) $criteria->add(TspagelePeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(TspagelePeer::TIPDOC)) $criteria->add(TspagelePeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(TspagelePeer::DESPAG)) $criteria->add(TspagelePeer::DESPAG, $this->despag);
		if ($this->isColumnModified(TspagelePeer::CEDRIF)) $criteria->add(TspagelePeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(TspagelePeer::TIPTXT)) $criteria->add(TspagelePeer::TIPTXT, $this->tiptxt);
		if ($this->isColumnModified(TspagelePeer::FECANU)) $criteria->add(TspagelePeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(TspagelePeer::DESANU)) $criteria->add(TspagelePeer::DESANU, $this->desanu);
		if ($this->isColumnModified(TspagelePeer::FECPAGADO)) $criteria->add(TspagelePeer::FECPAGADO, $this->fecpagado);
		if ($this->isColumnModified(TspagelePeer::FECEFEPAG)) $criteria->add(TspagelePeer::FECEFEPAG, $this->fecefepag);
		if ($this->isColumnModified(TspagelePeer::CODMON)) $criteria->add(TspagelePeer::CODMON, $this->codmon);
		if ($this->isColumnModified(TspagelePeer::VALMON)) $criteria->add(TspagelePeer::VALMON, $this->valmon);
		if ($this->isColumnModified(TspagelePeer::CODDIREC)) $criteria->add(TspagelePeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(TspagelePeer::ID)) $criteria->add(TspagelePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TspagelePeer::DATABASE_NAME);

		$criteria->add(TspagelePeer::ID, $this->id);

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

		$copyObj->setRefpag($this->refpag);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setEstpag($this->estpag);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setDespag($this->despag);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setTiptxt($this->tiptxt);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setFecpagado($this->fecpagado);

		$copyObj->setFecefepag($this->fecefepag);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setCoddirec($this->coddirec);


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
			self::$peer = new TspagelePeer();
		}
		return self::$peer;
	}

	
	public function setTsdefmon($v)
	{


		if ($v === null) {
			$this->setCodmon(NULL);
		} else {
			$this->setCodmon($v->getCodmon());
		}


		$this->aTsdefmon = $v;
	}


	
	public function getTsdefmon($con = null)
	{
		if ($this->aTsdefmon === null && (($this->codmon !== "" && $this->codmon !== null))) {
						include_once 'lib/model/om/BaseTsdefmonPeer.php';

      $c = new Criteria();
      $c->add(TsdefmonPeer::CODMON,$this->codmon);
      
			$this->aTsdefmon = TsdefmonPeer::doSelectOne($c, $con);

			
		}
		return $this->aTsdefmon;
	}

} 