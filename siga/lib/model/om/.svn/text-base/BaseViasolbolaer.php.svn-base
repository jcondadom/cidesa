<?php


abstract class BaseViasolbolaer extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $fecsol;


	
	protected $coddirec;


	
	protected $codeve;


	
	protected $codniv;


	
	protected $fecsal;


	
	protected $horsal;


	
	protected $fecreg;


	
	protected $horreg;


	
	protected $rutbolaer;


	
	protected $motviabol;


	
	protected $tippas;


	
	protected $numsolvi;


	
	protected $staapr;


	
	protected $idavue;


	
	protected $usuapr;


	
	protected $fecapr;


	
	protected $logusu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getFecsol($format = 'Y-m-d')
  {

    if ($this->fecsol === null || $this->fecsol === '') {
      return null;
    } elseif (!is_int($this->fecsol)) {
            $ts = adodb_strtotime($this->fecsol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
      }
    } else {
      $ts = $this->fecsol;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getCodeve()
  {

    return trim($this->codeve);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getFecsal($format = 'Y-m-d')
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

  
  public function getHorsal()
  {

    return trim($this->horsal);

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

  
  public function getHorreg()
  {

    return trim($this->horreg);

  }
  
  public function getRutbolaer()
  {

    return trim($this->rutbolaer);

  }
  
  public function getMotviabol()
  {

    return trim($this->motviabol);

  }
  
  public function getTippas()
  {

    return trim($this->tippas);

  }
  
  public function getNumsolvi()
  {

    return trim($this->numsolvi);

  }
  
  public function getStaapr()
  {

    return trim($this->staapr);

  }
  
  public function getIdavue()
  {

    return trim($this->idavue);

  }
  
  public function getUsuapr()
  {

    return trim($this->usuapr);

  }
  
  public function getFecapr($format = 'Y-m-d')
  {

    if ($this->fecapr === null || $this->fecapr === '') {
      return null;
    } elseif (!is_int($this->fecapr)) {
            $ts = adodb_strtotime($this->fecapr);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecapr] as date/time value: " . var_export($this->fecapr, true));
      }
    } else {
      $ts = $this->fecapr;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getLogusu()
  {

    return trim($this->logusu);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::NUMSOL;
      }
  
	} 
	
	public function setFecsol($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = ViasolbolaerPeer::FECSOL;
    }

	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::CODDIREC;
      }
  
	} 
	
	public function setCodeve($v)
	{

    if ($this->codeve !== $v) {
        $this->codeve = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::CODEVE;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::CODNIV;
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
      $this->modifiedColumns[] = ViasolbolaerPeer::FECSAL;
    }

	} 
	
	public function setHorsal($v)
	{

    if ($this->horsal !== $v) {
        $this->horsal = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::HORSAL;
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
      $this->modifiedColumns[] = ViasolbolaerPeer::FECREG;
    }

	} 
	
	public function setHorreg($v)
	{

    if ($this->horreg !== $v) {
        $this->horreg = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::HORREG;
      }
  
	} 
	
	public function setRutbolaer($v)
	{

    if ($this->rutbolaer !== $v) {
        $this->rutbolaer = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::RUTBOLAER;
      }
  
	} 
	
	public function setMotviabol($v)
	{

    if ($this->motviabol !== $v) {
        $this->motviabol = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::MOTVIABOL;
      }
  
	} 
	
	public function setTippas($v)
	{

    if ($this->tippas !== $v) {
        $this->tippas = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::TIPPAS;
      }
  
	} 
	
	public function setNumsolvi($v)
	{

    if ($this->numsolvi !== $v) {
        $this->numsolvi = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::NUMSOLVI;
      }
  
	} 
	
	public function setStaapr($v)
	{

    if ($this->staapr !== $v) {
        $this->staapr = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::STAAPR;
      }
  
	} 
	
	public function setIdavue($v)
	{

    if ($this->idavue !== $v) {
        $this->idavue = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::IDAVUE;
      }
  
	} 
	
	public function setUsuapr($v)
	{

    if ($this->usuapr !== $v) {
        $this->usuapr = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::USUAPR;
      }
  
	} 
	
	public function setFecapr($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecapr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecapr !== $ts) {
      $this->fecapr = $ts;
      $this->modifiedColumns[] = ViasolbolaerPeer::FECAPR;
    }

	} 
	
	public function setLogusu($v)
	{

    if ($this->logusu !== $v) {
        $this->logusu = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::LOGUSU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViasolbolaerPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->fecsol = $rs->getDate($startcol + 1, null);

      $this->coddirec = $rs->getString($startcol + 2);

      $this->codeve = $rs->getString($startcol + 3);

      $this->codniv = $rs->getString($startcol + 4);

      $this->fecsal = $rs->getDate($startcol + 5, null);

      $this->horsal = $rs->getString($startcol + 6);

      $this->fecreg = $rs->getDate($startcol + 7, null);

      $this->horreg = $rs->getString($startcol + 8);

      $this->rutbolaer = $rs->getString($startcol + 9);

      $this->motviabol = $rs->getString($startcol + 10);

      $this->tippas = $rs->getString($startcol + 11);

      $this->numsolvi = $rs->getString($startcol + 12);

      $this->staapr = $rs->getString($startcol + 13);

      $this->idavue = $rs->getString($startcol + 14);

      $this->usuapr = $rs->getString($startcol + 15);

      $this->fecapr = $rs->getDate($startcol + 16, null);

      $this->logusu = $rs->getString($startcol + 17);

      $this->id = $rs->getInt($startcol + 18);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 19; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viasolbolaer object", $e);
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
			$con = Propel::getConnection(ViasolbolaerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViasolbolaerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViasolbolaerPeer::DATABASE_NAME);
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
					$pk = ViasolbolaerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViasolbolaerPeer::doUpdate($this, $con);
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


			if (($retval = ViasolbolaerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViasolbolaerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getFecsol();
				break;
			case 2:
				return $this->getCoddirec();
				break;
			case 3:
				return $this->getCodeve();
				break;
			case 4:
				return $this->getCodniv();
				break;
			case 5:
				return $this->getFecsal();
				break;
			case 6:
				return $this->getHorsal();
				break;
			case 7:
				return $this->getFecreg();
				break;
			case 8:
				return $this->getHorreg();
				break;
			case 9:
				return $this->getRutbolaer();
				break;
			case 10:
				return $this->getMotviabol();
				break;
			case 11:
				return $this->getTippas();
				break;
			case 12:
				return $this->getNumsolvi();
				break;
			case 13:
				return $this->getStaapr();
				break;
			case 14:
				return $this->getIdavue();
				break;
			case 15:
				return $this->getUsuapr();
				break;
			case 16:
				return $this->getFecapr();
				break;
			case 17:
				return $this->getLogusu();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViasolbolaerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getFecsol(),
			$keys[2] => $this->getCoddirec(),
			$keys[3] => $this->getCodeve(),
			$keys[4] => $this->getCodniv(),
			$keys[5] => $this->getFecsal(),
			$keys[6] => $this->getHorsal(),
			$keys[7] => $this->getFecreg(),
			$keys[8] => $this->getHorreg(),
			$keys[9] => $this->getRutbolaer(),
			$keys[10] => $this->getMotviabol(),
			$keys[11] => $this->getTippas(),
			$keys[12] => $this->getNumsolvi(),
			$keys[13] => $this->getStaapr(),
			$keys[14] => $this->getIdavue(),
			$keys[15] => $this->getUsuapr(),
			$keys[16] => $this->getFecapr(),
			$keys[17] => $this->getLogusu(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViasolbolaerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setFecsol($value);
				break;
			case 2:
				$this->setCoddirec($value);
				break;
			case 3:
				$this->setCodeve($value);
				break;
			case 4:
				$this->setCodniv($value);
				break;
			case 5:
				$this->setFecsal($value);
				break;
			case 6:
				$this->setHorsal($value);
				break;
			case 7:
				$this->setFecreg($value);
				break;
			case 8:
				$this->setHorreg($value);
				break;
			case 9:
				$this->setRutbolaer($value);
				break;
			case 10:
				$this->setMotviabol($value);
				break;
			case 11:
				$this->setTippas($value);
				break;
			case 12:
				$this->setNumsolvi($value);
				break;
			case 13:
				$this->setStaapr($value);
				break;
			case 14:
				$this->setIdavue($value);
				break;
			case 15:
				$this->setUsuapr($value);
				break;
			case 16:
				$this->setFecapr($value);
				break;
			case 17:
				$this->setLogusu($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViasolbolaerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoddirec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodeve($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodniv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecsal($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setHorsal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecreg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setHorreg($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRutbolaer($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMotviabol($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTippas($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumsolvi($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStaapr($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setIdavue($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUsuapr($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecapr($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setLogusu($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViasolbolaerPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViasolbolaerPeer::NUMSOL)) $criteria->add(ViasolbolaerPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(ViasolbolaerPeer::FECSOL)) $criteria->add(ViasolbolaerPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(ViasolbolaerPeer::CODDIREC)) $criteria->add(ViasolbolaerPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(ViasolbolaerPeer::CODEVE)) $criteria->add(ViasolbolaerPeer::CODEVE, $this->codeve);
		if ($this->isColumnModified(ViasolbolaerPeer::CODNIV)) $criteria->add(ViasolbolaerPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(ViasolbolaerPeer::FECSAL)) $criteria->add(ViasolbolaerPeer::FECSAL, $this->fecsal);
		if ($this->isColumnModified(ViasolbolaerPeer::HORSAL)) $criteria->add(ViasolbolaerPeer::HORSAL, $this->horsal);
		if ($this->isColumnModified(ViasolbolaerPeer::FECREG)) $criteria->add(ViasolbolaerPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(ViasolbolaerPeer::HORREG)) $criteria->add(ViasolbolaerPeer::HORREG, $this->horreg);
		if ($this->isColumnModified(ViasolbolaerPeer::RUTBOLAER)) $criteria->add(ViasolbolaerPeer::RUTBOLAER, $this->rutbolaer);
		if ($this->isColumnModified(ViasolbolaerPeer::MOTVIABOL)) $criteria->add(ViasolbolaerPeer::MOTVIABOL, $this->motviabol);
		if ($this->isColumnModified(ViasolbolaerPeer::TIPPAS)) $criteria->add(ViasolbolaerPeer::TIPPAS, $this->tippas);
		if ($this->isColumnModified(ViasolbolaerPeer::NUMSOLVI)) $criteria->add(ViasolbolaerPeer::NUMSOLVI, $this->numsolvi);
		if ($this->isColumnModified(ViasolbolaerPeer::STAAPR)) $criteria->add(ViasolbolaerPeer::STAAPR, $this->staapr);
		if ($this->isColumnModified(ViasolbolaerPeer::IDAVUE)) $criteria->add(ViasolbolaerPeer::IDAVUE, $this->idavue);
		if ($this->isColumnModified(ViasolbolaerPeer::USUAPR)) $criteria->add(ViasolbolaerPeer::USUAPR, $this->usuapr);
		if ($this->isColumnModified(ViasolbolaerPeer::FECAPR)) $criteria->add(ViasolbolaerPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(ViasolbolaerPeer::LOGUSU)) $criteria->add(ViasolbolaerPeer::LOGUSU, $this->logusu);
		if ($this->isColumnModified(ViasolbolaerPeer::ID)) $criteria->add(ViasolbolaerPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViasolbolaerPeer::DATABASE_NAME);

		$criteria->add(ViasolbolaerPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setCodeve($this->codeve);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setFecsal($this->fecsal);

		$copyObj->setHorsal($this->horsal);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setHorreg($this->horreg);

		$copyObj->setRutbolaer($this->rutbolaer);

		$copyObj->setMotviabol($this->motviabol);

		$copyObj->setTippas($this->tippas);

		$copyObj->setNumsolvi($this->numsolvi);

		$copyObj->setStaapr($this->staapr);

		$copyObj->setIdavue($this->idavue);

		$copyObj->setUsuapr($this->usuapr);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setLogusu($this->logusu);


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
			self::$peer = new ViasolbolaerPeer();
		}
		return self::$peer;
	}

} 