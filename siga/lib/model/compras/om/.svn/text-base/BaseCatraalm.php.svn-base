<?php


abstract class BaseCatraalm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtra;


	
	protected $fectra;


	
	protected $destra;


	
	protected $almori;


	
	protected $codubiori;


	
	protected $almdes;


	
	protected $codubides;


	
	protected $statra;


	
	protected $obstra;


	
	protected $codemptra;


	
	protected $fadefveh_id;


	
	protected $fadefcho_id;


	
	protected $fecsal;


	
	protected $feclle;


	
	protected $fecanu;


	
	protected $desanu;


	
	protected $usuanu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtra()
  {

    return trim($this->codtra);

  }
  
  public function getFectra($format = 'Y-m-d')
  {

    if ($this->fectra === null || $this->fectra === '') {
      return null;
    } elseif (!is_int($this->fectra)) {
            $ts = adodb_strtotime($this->fectra);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fectra] as date/time value: " . var_export($this->fectra, true));
      }
    } else {
      $ts = $this->fectra;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDestra()
  {

    return trim($this->destra);

  }
  
  public function getAlmori()
  {

    return trim($this->almori);

  }
  
  public function getCodubiori()
  {

    return trim($this->codubiori);

  }
  
  public function getAlmdes()
  {

    return trim($this->almdes);

  }
  
  public function getCodubides()
  {

    return trim($this->codubides);

  }
  
  public function getStatra()
  {

    return trim($this->statra);

  }
  
  public function getObstra()
  {

    return trim($this->obstra);

  }
  
  public function getCodemptra()
  {

    return trim($this->codemptra);

  }
  
  public function getFadefvehId()
  {

    return $this->fadefveh_id;

  }
  
  public function getFadefchoId()
  {

    return $this->fadefcho_id;

  }
  
  public function getFecsal($format = 'Y-m-d H:i:s')
  {

    if ($this->fecsal === null || $this->fecsal === '') {
      return null;
    } elseif (!is_int($this->fecsal)) {
            $ts = adodb_strtotime($this->fecsal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsal] as date/time value: " . var_export($this->fecsal, true));
      }
    } else {
      $ts = $this->fecsal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeclle($format = 'Y-m-d H:i:s')
  {

    if ($this->feclle === null || $this->feclle === '') {
      return null;
    } elseif (!is_int($this->feclle)) {
            $ts = adodb_strtotime($this->feclle);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feclle] as date/time value: " . var_export($this->feclle, true));
      }
    } else {
      $ts = $this->feclle;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
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
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtra($v)
	{

    if ($this->codtra !== $v) {
        $this->codtra = $v;
        $this->modifiedColumns[] = CatraalmPeer::CODTRA;
      }
  
	} 
	
	public function setFectra($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fectra] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fectra !== $ts) {
      $this->fectra = $ts;
      $this->modifiedColumns[] = CatraalmPeer::FECTRA;
    }

	} 
	
	public function setDestra($v)
	{

    if ($this->destra !== $v) {
        $this->destra = $v;
        $this->modifiedColumns[] = CatraalmPeer::DESTRA;
      }
  
	} 
	
	public function setAlmori($v)
	{

    if ($this->almori !== $v) {
        $this->almori = $v;
        $this->modifiedColumns[] = CatraalmPeer::ALMORI;
      }
  
	} 
	
	public function setCodubiori($v)
	{

    if ($this->codubiori !== $v) {
        $this->codubiori = $v;
        $this->modifiedColumns[] = CatraalmPeer::CODUBIORI;
      }
  
	} 
	
	public function setAlmdes($v)
	{

    if ($this->almdes !== $v) {
        $this->almdes = $v;
        $this->modifiedColumns[] = CatraalmPeer::ALMDES;
      }
  
	} 
	
	public function setCodubides($v)
	{

    if ($this->codubides !== $v) {
        $this->codubides = $v;
        $this->modifiedColumns[] = CatraalmPeer::CODUBIDES;
      }
  
	} 
	
	public function setStatra($v)
	{

    if ($this->statra !== $v) {
        $this->statra = $v;
        $this->modifiedColumns[] = CatraalmPeer::STATRA;
      }
  
	} 
	
	public function setObstra($v)
	{

    if ($this->obstra !== $v) {
        $this->obstra = $v;
        $this->modifiedColumns[] = CatraalmPeer::OBSTRA;
      }
  
	} 
	
	public function setCodemptra($v)
	{

    if ($this->codemptra !== $v) {
        $this->codemptra = $v;
        $this->modifiedColumns[] = CatraalmPeer::CODEMPTRA;
      }
  
	} 
	
	public function setFadefvehId($v)
	{

    if ($this->fadefveh_id !== $v) {
        $this->fadefveh_id = $v;
        $this->modifiedColumns[] = CatraalmPeer::FADEFVEH_ID;
      }
  
	} 
	
	public function setFadefchoId($v)
	{

    if ($this->fadefcho_id !== $v) {
        $this->fadefcho_id = $v;
        $this->modifiedColumns[] = CatraalmPeer::FADEFCHO_ID;
      }
  
	} 
	
	public function setFecsal($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsal !== $ts) {
      $this->fecsal = $ts;
      $this->modifiedColumns[] = CatraalmPeer::FECSAL;
    }

	} 
	
	public function setFeclle($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feclle] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feclle !== $ts) {
      $this->feclle = $ts;
      $this->modifiedColumns[] = CatraalmPeer::FECLLE;
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
      $this->modifiedColumns[] = CatraalmPeer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CatraalmPeer::DESANU;
      }
  
	} 
	
	public function setUsuanu($v)
	{

    if ($this->usuanu !== $v) {
        $this->usuanu = $v;
        $this->modifiedColumns[] = CatraalmPeer::USUANU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatraalmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtra = $rs->getString($startcol + 0);

      $this->fectra = $rs->getDate($startcol + 1, null);

      $this->destra = $rs->getString($startcol + 2);

      $this->almori = $rs->getString($startcol + 3);

      $this->codubiori = $rs->getString($startcol + 4);

      $this->almdes = $rs->getString($startcol + 5);

      $this->codubides = $rs->getString($startcol + 6);

      $this->statra = $rs->getString($startcol + 7);

      $this->obstra = $rs->getString($startcol + 8);

      $this->codemptra = $rs->getString($startcol + 9);

      $this->fadefveh_id = $rs->getInt($startcol + 10);

      $this->fadefcho_id = $rs->getInt($startcol + 11);

      $this->fecsal = $rs->getTimestamp($startcol + 12, null);

      $this->feclle = $rs->getTimestamp($startcol + 13, null);

      $this->fecanu = $rs->getDate($startcol + 14, null);

      $this->desanu = $rs->getString($startcol + 15);

      $this->usuanu = $rs->getString($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catraalm object", $e);
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
			$con = Propel::getConnection(CatraalmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatraalmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatraalmPeer::DATABASE_NAME);
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


												
			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CatraalmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatraalmPeer::doUpdate($this, $con);
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


												
			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}


			if (($retval = CatraalmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatraalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtra();
				break;
			case 1:
				return $this->getFectra();
				break;
			case 2:
				return $this->getDestra();
				break;
			case 3:
				return $this->getAlmori();
				break;
			case 4:
				return $this->getCodubiori();
				break;
			case 5:
				return $this->getAlmdes();
				break;
			case 6:
				return $this->getCodubides();
				break;
			case 7:
				return $this->getStatra();
				break;
			case 8:
				return $this->getObstra();
				break;
			case 9:
				return $this->getCodemptra();
				break;
			case 10:
				return $this->getFadefvehId();
				break;
			case 11:
				return $this->getFadefchoId();
				break;
			case 12:
				return $this->getFecsal();
				break;
			case 13:
				return $this->getFeclle();
				break;
			case 14:
				return $this->getFecanu();
				break;
			case 15:
				return $this->getDesanu();
				break;
			case 16:
				return $this->getUsuanu();
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
		$keys = CatraalmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtra(),
			$keys[1] => $this->getFectra(),
			$keys[2] => $this->getDestra(),
			$keys[3] => $this->getAlmori(),
			$keys[4] => $this->getCodubiori(),
			$keys[5] => $this->getAlmdes(),
			$keys[6] => $this->getCodubides(),
			$keys[7] => $this->getStatra(),
			$keys[8] => $this->getObstra(),
			$keys[9] => $this->getCodemptra(),
			$keys[10] => $this->getFadefvehId(),
			$keys[11] => $this->getFadefchoId(),
			$keys[12] => $this->getFecsal(),
			$keys[13] => $this->getFeclle(),
			$keys[14] => $this->getFecanu(),
			$keys[15] => $this->getDesanu(),
			$keys[16] => $this->getUsuanu(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatraalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtra($value);
				break;
			case 1:
				$this->setFectra($value);
				break;
			case 2:
				$this->setDestra($value);
				break;
			case 3:
				$this->setAlmori($value);
				break;
			case 4:
				$this->setCodubiori($value);
				break;
			case 5:
				$this->setAlmdes($value);
				break;
			case 6:
				$this->setCodubides($value);
				break;
			case 7:
				$this->setStatra($value);
				break;
			case 8:
				$this->setObstra($value);
				break;
			case 9:
				$this->setCodemptra($value);
				break;
			case 10:
				$this->setFadefvehId($value);
				break;
			case 11:
				$this->setFadefchoId($value);
				break;
			case 12:
				$this->setFecsal($value);
				break;
			case 13:
				$this->setFeclle($value);
				break;
			case 14:
				$this->setFecanu($value);
				break;
			case 15:
				$this->setDesanu($value);
				break;
			case 16:
				$this->setUsuanu($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatraalmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFectra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDestra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAlmori($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodubiori($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAlmdes($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodubides($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatra($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObstra($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodemptra($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFadefvehId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFadefchoId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecsal($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFeclle($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecanu($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDesanu($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUsuanu($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatraalmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatraalmPeer::CODTRA)) $criteria->add(CatraalmPeer::CODTRA, $this->codtra);
		if ($this->isColumnModified(CatraalmPeer::FECTRA)) $criteria->add(CatraalmPeer::FECTRA, $this->fectra);
		if ($this->isColumnModified(CatraalmPeer::DESTRA)) $criteria->add(CatraalmPeer::DESTRA, $this->destra);
		if ($this->isColumnModified(CatraalmPeer::ALMORI)) $criteria->add(CatraalmPeer::ALMORI, $this->almori);
		if ($this->isColumnModified(CatraalmPeer::CODUBIORI)) $criteria->add(CatraalmPeer::CODUBIORI, $this->codubiori);
		if ($this->isColumnModified(CatraalmPeer::ALMDES)) $criteria->add(CatraalmPeer::ALMDES, $this->almdes);
		if ($this->isColumnModified(CatraalmPeer::CODUBIDES)) $criteria->add(CatraalmPeer::CODUBIDES, $this->codubides);
		if ($this->isColumnModified(CatraalmPeer::STATRA)) $criteria->add(CatraalmPeer::STATRA, $this->statra);
		if ($this->isColumnModified(CatraalmPeer::OBSTRA)) $criteria->add(CatraalmPeer::OBSTRA, $this->obstra);
		if ($this->isColumnModified(CatraalmPeer::CODEMPTRA)) $criteria->add(CatraalmPeer::CODEMPTRA, $this->codemptra);
		if ($this->isColumnModified(CatraalmPeer::FADEFVEH_ID)) $criteria->add(CatraalmPeer::FADEFVEH_ID, $this->fadefveh_id);
		if ($this->isColumnModified(CatraalmPeer::FADEFCHO_ID)) $criteria->add(CatraalmPeer::FADEFCHO_ID, $this->fadefcho_id);
		if ($this->isColumnModified(CatraalmPeer::FECSAL)) $criteria->add(CatraalmPeer::FECSAL, $this->fecsal);
		if ($this->isColumnModified(CatraalmPeer::FECLLE)) $criteria->add(CatraalmPeer::FECLLE, $this->feclle);
		if ($this->isColumnModified(CatraalmPeer::FECANU)) $criteria->add(CatraalmPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CatraalmPeer::DESANU)) $criteria->add(CatraalmPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CatraalmPeer::USUANU)) $criteria->add(CatraalmPeer::USUANU, $this->usuanu);
		if ($this->isColumnModified(CatraalmPeer::ID)) $criteria->add(CatraalmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatraalmPeer::DATABASE_NAME);

		$criteria->add(CatraalmPeer::ID, $this->id);

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

		$copyObj->setCodtra($this->codtra);

		$copyObj->setFectra($this->fectra);

		$copyObj->setDestra($this->destra);

		$copyObj->setAlmori($this->almori);

		$copyObj->setCodubiori($this->codubiori);

		$copyObj->setAlmdes($this->almdes);

		$copyObj->setCodubides($this->codubides);

		$copyObj->setStatra($this->statra);

		$copyObj->setObstra($this->obstra);

		$copyObj->setCodemptra($this->codemptra);

		$copyObj->setFadefvehId($this->fadefveh_id);

		$copyObj->setFadefchoId($this->fadefcho_id);

		$copyObj->setFecsal($this->fecsal);

		$copyObj->setFeclle($this->feclle);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setUsuanu($this->usuanu);


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
			self::$peer = new CatraalmPeer();
		}
		return self::$peer;
	}

} 