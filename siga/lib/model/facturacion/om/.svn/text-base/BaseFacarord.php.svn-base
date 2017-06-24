<?php


abstract class BaseFacarord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcar;


	
	protected $feccar;


	
	protected $fecven;


	
	protected $codentcre;


	
	protected $codpro;


	
	protected $ramart;


	
	protected $descar;


	
	protected $codban;


	
	protected $moncar;


	
	protected $stacar;


	
	protected $codalmusu;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $created_by_user;


	
	protected $updated_by_user;


	
	protected $id;

	
	protected $aFaentcre;

	
	protected $aFaclienteRelatedByCodpro;

	
	protected $aFaclienteRelatedByCodban;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcar()
  {

    return trim($this->numcar);

  }
  
  public function getFeccar($format = 'Y-m-d')
  {

    if ($this->feccar === null || $this->feccar === '') {
      return null;
    } elseif (!is_int($this->feccar)) {
            $ts = adodb_strtotime($this->feccar);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccar] as date/time value: " . var_export($this->feccar, true));
      }
    } else {
      $ts = $this->feccar;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodentcre()
  {

    return trim($this->codentcre);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getRamart()
  {

    return trim($this->ramart);

  }
  
  public function getDescar()
  {

    return trim($this->descar);

  }
  
  public function getCodban()
  {

    return trim($this->codban);

  }
  
  public function getMoncar($val=false)
  {

    if($val) return number_format($this->moncar,2,',','.');
    else return $this->moncar;

  }
  
  public function getStacar()
  {

    return trim($this->stacar);

  }
  
  public function getCodalmusu()
  {

    return trim($this->codalmusu);

  }
  
  public function getCreatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->created_at === null || $this->created_at === '') {
      return null;
    } elseif (!is_int($this->created_at)) {
            $ts = adodb_strtotime($this->created_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
      }
    } else {
      $ts = $this->created_at;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUpdatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->updated_at === null || $this->updated_at === '') {
      return null;
    } elseif (!is_int($this->updated_at)) {
            $ts = adodb_strtotime($this->updated_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
      }
    } else {
      $ts = $this->updated_at;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCreatedByUser()
  {

    if($this->created_by_user=='') $this->setCreatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse'));
    return $this->created_by_user;

  }
  
  public function getUpdatedByUser()
  {

    $this->setUpdatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse'));
    return $this->updated_by_user;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcar($v)
	{

    if ($this->numcar !== $v) {
        $this->numcar = $v;
        $this->modifiedColumns[] = FacarordPeer::NUMCAR;
      }
  
	} 
	
	public function setFeccar($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccar] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccar !== $ts) {
      $this->feccar = $ts;
      $this->modifiedColumns[] = FacarordPeer::FECCAR;
    }

	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = FacarordPeer::FECVEN;
    }

	} 
	
	public function setCodentcre($v)
	{

    if ($this->codentcre !== $v) {
        $this->codentcre = $v;
        $this->modifiedColumns[] = FacarordPeer::CODENTCRE;
      }
  
		if ($this->aFaentcre !== null && $this->aFaentcre->getCodentcre() !== $v) {
			$this->aFaentcre = null;
		}

	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FacarordPeer::CODPRO;
      }
  
		if ($this->aFaclienteRelatedByCodpro !== null && $this->aFaclienteRelatedByCodpro->getCodpro() !== $v) {
			$this->aFaclienteRelatedByCodpro = null;
		}

	} 
	
	public function setRamart($v)
	{

    if ($this->ramart !== $v) {
        $this->ramart = $v;
        $this->modifiedColumns[] = FacarordPeer::RAMART;
      }
  
	} 
	
	public function setDescar($v)
	{

    if ($this->descar !== $v) {
        $this->descar = $v;
        $this->modifiedColumns[] = FacarordPeer::DESCAR;
      }
  
	} 
	
	public function setCodban($v)
	{

    if ($this->codban !== $v) {
        $this->codban = $v;
        $this->modifiedColumns[] = FacarordPeer::CODBAN;
      }
  
		if ($this->aFaclienteRelatedByCodban !== null && $this->aFaclienteRelatedByCodban->getCodpro() !== $v) {
			$this->aFaclienteRelatedByCodban = null;
		}

	} 
	
	public function setMoncar($v)
	{

    if ($this->moncar !== $v) {
        $this->moncar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacarordPeer::MONCAR;
      }
  
	} 
	
	public function setStacar($v)
	{

    if ($this->stacar !== $v) {
        $this->stacar = $v;
        $this->modifiedColumns[] = FacarordPeer::STACAR;
      }
  
	} 
	
	public function setCodalmusu($v)
	{

    if ($this->codalmusu !== $v) {
        $this->codalmusu = $v;
        $this->modifiedColumns[] = FacarordPeer::CODALMUSU;
      }
  
	} 
	
	public function setCreatedAt($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->created_at !== $ts) {
      $this->created_at = $ts;
      $this->modifiedColumns[] = FacarordPeer::CREATED_AT;
    }

	} 
	
	public function setUpdatedAt($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->updated_at !== $ts) {
      $this->updated_at = $ts;
      $this->modifiedColumns[] = FacarordPeer::UPDATED_AT;
    }

	} 
	
	public function setCreatedByUser($v)
	{

    if ($this->created_by_user !== $v) {
        $this->created_by_user = $v;
        $this->modifiedColumns[] = FacarordPeer::CREATED_BY_USER;
      }
  
	} 
	
	public function setUpdatedByUser($v)
	{

    if ($this->updated_by_user !== $v) {
        $this->updated_by_user = $v;
        $this->modifiedColumns[] = FacarordPeer::UPDATED_BY_USER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FacarordPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcar = $rs->getString($startcol + 0);

      $this->feccar = $rs->getDate($startcol + 1, null);

      $this->fecven = $rs->getDate($startcol + 2, null);

      $this->codentcre = $rs->getString($startcol + 3);

      $this->codpro = $rs->getString($startcol + 4);

      $this->ramart = $rs->getString($startcol + 5);

      $this->descar = $rs->getString($startcol + 6);

      $this->codban = $rs->getString($startcol + 7);

      $this->moncar = $rs->getFloat($startcol + 8);

      $this->stacar = $rs->getString($startcol + 9);

      $this->codalmusu = $rs->getString($startcol + 10);

      $this->created_at = $rs->getTimestamp($startcol + 11, null);

      $this->updated_at = $rs->getTimestamp($startcol + 12, null);

      $this->created_by_user = $rs->getString($startcol + 13);

      $this->updated_by_user = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Facarord object", $e);
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
			$con = Propel::getConnection(FacarordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FacarordPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(FacarordPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(FacarordPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(FacarordPeer::CREATED_BY_USER))
    {
      $this->setCreatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse','Sin Usuario'));
    }

    if ($this->isModified() && !$this->isColumnModified(FacarordPeer::UPDATED_BY_USER))
    {
      $this->setUpdatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse','Sin Usuario'));
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FacarordPeer::DATABASE_NAME);
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


												
			if ($this->aFaentcre !== null) {
				if ($this->aFaentcre->isModified()) {
					$affectedRows += $this->aFaentcre->save($con);
				}
				$this->setFaentcre($this->aFaentcre);
			}

			if ($this->aFaclienteRelatedByCodpro !== null) {
				if ($this->aFaclienteRelatedByCodpro->isModified()) {
					$affectedRows += $this->aFaclienteRelatedByCodpro->save($con);
				}
				$this->setFaclienteRelatedByCodpro($this->aFaclienteRelatedByCodpro);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aFaclienteRelatedByCodban !== null) {
				if ($this->aFaclienteRelatedByCodban->isModified()) {
					$affectedRows += $this->aFaclienteRelatedByCodban->save($con);
				}
				$this->setFaclienteRelatedByCodban($this->aFaclienteRelatedByCodban);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FacarordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FacarordPeer::doUpdate($this, $con);
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


												
			if ($this->aFaentcre !== null) {
				if (!$this->aFaentcre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaentcre->getValidationFailures());
				}
			}

			if ($this->aFaclienteRelatedByCodpro !== null) {
				if (!$this->aFaclienteRelatedByCodpro->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaclienteRelatedByCodpro->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aFaclienteRelatedByCodban !== null) {
				if (!$this->aFaclienteRelatedByCodban->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaclienteRelatedByCodban->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}


			if (($retval = FacarordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacarordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcar();
				break;
			case 1:
				return $this->getFeccar();
				break;
			case 2:
				return $this->getFecven();
				break;
			case 3:
				return $this->getCodentcre();
				break;
			case 4:
				return $this->getCodpro();
				break;
			case 5:
				return $this->getRamart();
				break;
			case 6:
				return $this->getDescar();
				break;
			case 7:
				return $this->getCodban();
				break;
			case 8:
				return $this->getMoncar();
				break;
			case 9:
				return $this->getStacar();
				break;
			case 10:
				return $this->getCodalmusu();
				break;
			case 11:
				return $this->getCreatedAt();
				break;
			case 12:
				return $this->getUpdatedAt();
				break;
			case 13:
				return $this->getCreatedByUser();
				break;
			case 14:
				return $this->getUpdatedByUser();
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
		$keys = FacarordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcar(),
			$keys[1] => $this->getFeccar(),
			$keys[2] => $this->getFecven(),
			$keys[3] => $this->getCodentcre(),
			$keys[4] => $this->getCodpro(),
			$keys[5] => $this->getRamart(),
			$keys[6] => $this->getDescar(),
			$keys[7] => $this->getCodban(),
			$keys[8] => $this->getMoncar(),
			$keys[9] => $this->getStacar(),
			$keys[10] => $this->getCodalmusu(),
			$keys[11] => $this->getCreatedAt(),
			$keys[12] => $this->getUpdatedAt(),
			$keys[13] => $this->getCreatedByUser(),
			$keys[14] => $this->getUpdatedByUser(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacarordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcar($value);
				break;
			case 1:
				$this->setFeccar($value);
				break;
			case 2:
				$this->setFecven($value);
				break;
			case 3:
				$this->setCodentcre($value);
				break;
			case 4:
				$this->setCodpro($value);
				break;
			case 5:
				$this->setRamart($value);
				break;
			case 6:
				$this->setDescar($value);
				break;
			case 7:
				$this->setCodban($value);
				break;
			case 8:
				$this->setMoncar($value);
				break;
			case 9:
				$this->setStacar($value);
				break;
			case 10:
				$this->setCodalmusu($value);
				break;
			case 11:
				$this->setCreatedAt($value);
				break;
			case 12:
				$this->setUpdatedAt($value);
				break;
			case 13:
				$this->setCreatedByUser($value);
				break;
			case 14:
				$this->setUpdatedByUser($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacarordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecven($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodentcre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodpro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRamart($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodban($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMoncar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStacar($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodalmusu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedAt($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreatedByUser($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedByUser($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FacarordPeer::DATABASE_NAME);

		if ($this->isColumnModified(FacarordPeer::NUMCAR)) $criteria->add(FacarordPeer::NUMCAR, $this->numcar);
		if ($this->isColumnModified(FacarordPeer::FECCAR)) $criteria->add(FacarordPeer::FECCAR, $this->feccar);
		if ($this->isColumnModified(FacarordPeer::FECVEN)) $criteria->add(FacarordPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FacarordPeer::CODENTCRE)) $criteria->add(FacarordPeer::CODENTCRE, $this->codentcre);
		if ($this->isColumnModified(FacarordPeer::CODPRO)) $criteria->add(FacarordPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FacarordPeer::RAMART)) $criteria->add(FacarordPeer::RAMART, $this->ramart);
		if ($this->isColumnModified(FacarordPeer::DESCAR)) $criteria->add(FacarordPeer::DESCAR, $this->descar);
		if ($this->isColumnModified(FacarordPeer::CODBAN)) $criteria->add(FacarordPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(FacarordPeer::MONCAR)) $criteria->add(FacarordPeer::MONCAR, $this->moncar);
		if ($this->isColumnModified(FacarordPeer::STACAR)) $criteria->add(FacarordPeer::STACAR, $this->stacar);
		if ($this->isColumnModified(FacarordPeer::CODALMUSU)) $criteria->add(FacarordPeer::CODALMUSU, $this->codalmusu);
		if ($this->isColumnModified(FacarordPeer::CREATED_AT)) $criteria->add(FacarordPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(FacarordPeer::UPDATED_AT)) $criteria->add(FacarordPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(FacarordPeer::CREATED_BY_USER)) $criteria->add(FacarordPeer::CREATED_BY_USER, $this->created_by_user);
		if ($this->isColumnModified(FacarordPeer::UPDATED_BY_USER)) $criteria->add(FacarordPeer::UPDATED_BY_USER, $this->updated_by_user);
		if ($this->isColumnModified(FacarordPeer::ID)) $criteria->add(FacarordPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FacarordPeer::DATABASE_NAME);

		$criteria->add(FacarordPeer::ID, $this->id);

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

		$copyObj->setNumcar($this->numcar);

		$copyObj->setFeccar($this->feccar);

		$copyObj->setFecven($this->fecven);

		$copyObj->setCodentcre($this->codentcre);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setRamart($this->ramart);

		$copyObj->setDescar($this->descar);

		$copyObj->setCodban($this->codban);

		$copyObj->setMoncar($this->moncar);

		$copyObj->setStacar($this->stacar);

		$copyObj->setCodalmusu($this->codalmusu);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setCreatedByUser($this->created_by_user);

		$copyObj->setUpdatedByUser($this->updated_by_user);


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
			self::$peer = new FacarordPeer();
		}
		return self::$peer;
	}

	
	public function setFaentcre($v)
	{


		if ($v === null) {
			$this->setCodentcre(NULL);
		} else {
			$this->setCodentcre($v->getCodentcre());
		}


		$this->aFaentcre = $v;
	}


	
	public function getFaentcre($con = null)
	{
		if ($this->aFaentcre === null && (($this->codentcre !== "" && $this->codentcre !== null))) {
						include_once 'lib/model/facturacion/om/BaseFaentcrePeer.php';

      $c = new Criteria();
      $c->add(FaentcrePeer::CODENTCRE,$this->codentcre);
      
			$this->aFaentcre = FaentcrePeer::doSelectOne($c, $con);

			
		}
		return $this->aFaentcre;
	}

	
	public function setFaclienteRelatedByCodpro($v)
	{


		if ($v === null) {
			$this->setCodpro(NULL);
		} else {
			$this->setCodpro($v->getCodpro());
		}


		$this->aFaclienteRelatedByCodpro = $v;
	}


	
	public function getFaclienteRelatedByCodpro($con = null)
	{
		if ($this->aFaclienteRelatedByCodpro === null && (($this->codpro !== "" && $this->codpro !== null))) {
						include_once 'lib/model/facturacion/om/BaseFaclientePeer.php';

      $c = new Criteria();
      $c->add(FaclientePeer::CODPRO,$this->codpro);
      
			$this->aFaclienteRelatedByCodpro = FaclientePeer::doSelectOne($c, $con);

			
		}
		return $this->aFaclienteRelatedByCodpro;
	}

	
	public function setFaclienteRelatedByCodban($v)
	{


		if ($v === null) {
			$this->setCodban(NULL);
		} else {
			$this->setCodban($v->getCodpro());
		}


		$this->aFaclienteRelatedByCodban = $v;
	}


	
	public function getFaclienteRelatedByCodban($con = null)
	{
		if ($this->aFaclienteRelatedByCodban === null && (($this->codban !== "" && $this->codban !== null))) {
						include_once 'lib/model/facturacion/om/BaseFaclientePeer.php';

      $c = new Criteria();
      $c->add(FaclientePeer::CODPRO,$this->codban);
      
			$this->aFaclienteRelatedByCodban = FaclientePeer::doSelectOne($c, $con);

			
		}
		return $this->aFaclienteRelatedByCodban;
	}

} 