<?php


abstract class BaseManordtra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $numequ;


	
	protected $refest;


	
	protected $fecemi;


	
	protected $codact;


	
	protected $priori;


	
	protected $cedemp;


	
	protected $cedres;


	
	protected $codtma;


	
	protected $desord;


	
	protected $tipord;


	
	protected $codart;


	
	protected $incree;


	
	protected $codsor;


	
	protected $codgrr;


	
	protected $codsis;


	
	protected $codsfa;


	
	protected $coddfa;


	
	protected $codcfa;


	
	protected $parfal;


	
	protected $fecici;


	
	protected $feccci;


	
	protected $cedrec;


	
	protected $valhci;


	
	protected $demcie;


	
	protected $codcfc;


	
	protected $obscie;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getNumequ()
  {

    return trim($this->numequ);

  }
  
  public function getRefest()
  {

    return trim($this->refest);

  }
  
  public function getFecemi($format = 'Y-m-d')
  {

    if ($this->fecemi === null || $this->fecemi === '') {
      return null;
    } elseif (!is_int($this->fecemi)) {
            $ts = adodb_strtotime($this->fecemi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fecemi, true));
      }
    } else {
      $ts = $this->fecemi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getPriori()
  {

    return trim($this->priori);

  }
  
  public function getCedemp()
  {

    return trim($this->cedemp);

  }
  
  public function getCedres()
  {

    return trim($this->cedres);

  }
  
  public function getCodtma()
  {

    return trim($this->codtma);

  }
  
  public function getDesord()
  {

    return trim($this->desord);

  }
  
  public function getTipord()
  {

    return trim($this->tipord);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getIncree()
  {

    return trim($this->incree);

  }
  
  public function getCodsor()
  {

    return trim($this->codsor);

  }
  
  public function getCodgrr()
  {

    return trim($this->codgrr);

  }
  
  public function getCodsis()
  {

    return trim($this->codsis);

  }
  
  public function getCodsfa()
  {

    return trim($this->codsfa);

  }
  
  public function getCoddfa()
  {

    return trim($this->coddfa);

  }
  
  public function getCodcfa()
  {

    return trim($this->codcfa);

  }
  
  public function getParfal()
  {

    return trim($this->parfal);

  }
  
  public function getFecici($format = 'Y-m-d H:i:s')
  {

    if ($this->fecici === null || $this->fecici === '') {
      return null;
    } elseif (!is_int($this->fecici)) {
            $ts = adodb_strtotime($this->fecici);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecici] as date/time value: " . var_export($this->fecici, true));
      }
    } else {
      $ts = $this->fecici;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccci($format = 'Y-m-d H:i:s')
  {

    if ($this->feccci === null || $this->feccci === '') {
      return null;
    } elseif (!is_int($this->feccci)) {
            $ts = adodb_strtotime($this->feccci);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccci] as date/time value: " . var_export($this->feccci, true));
      }
    } else {
      $ts = $this->feccci;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrec()
  {

    return trim($this->cedrec);

  }
  
  public function getValhci($val=false)
  {

    if($val) return number_format($this->valhci,2,',','.');
    else return $this->valhci;

  }
  
  public function getDemcie()
  {

    return trim($this->demcie);

  }
  
  public function getCodcfc()
  {

    return trim($this->codcfc);

  }
  
  public function getObscie()
  {

    return trim($this->obscie);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = ManordtraPeer::NUMORD;
      }
  
	} 
	
	public function setNumequ($v)
	{

    if ($this->numequ !== $v) {
        $this->numequ = $v;
        $this->modifiedColumns[] = ManordtraPeer::NUMEQU;
      }
  
	} 
	
	public function setRefest($v)
	{

    if ($this->refest !== $v) {
        $this->refest = $v;
        $this->modifiedColumns[] = ManordtraPeer::REFEST;
      }
  
	} 
	
	public function setFecemi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecemi !== $ts) {
      $this->fecemi = $ts;
      $this->modifiedColumns[] = ManordtraPeer::FECEMI;
    }

	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = ManordtraPeer::CODACT;
      }
  
	} 
	
	public function setPriori($v)
	{

    if ($this->priori !== $v) {
        $this->priori = $v;
        $this->modifiedColumns[] = ManordtraPeer::PRIORI;
      }
  
	} 
	
	public function setCedemp($v)
	{

    if ($this->cedemp !== $v) {
        $this->cedemp = $v;
        $this->modifiedColumns[] = ManordtraPeer::CEDEMP;
      }
  
	} 
	
	public function setCedres($v)
	{

    if ($this->cedres !== $v) {
        $this->cedres = $v;
        $this->modifiedColumns[] = ManordtraPeer::CEDRES;
      }
  
	} 
	
	public function setCodtma($v)
	{

    if ($this->codtma !== $v) {
        $this->codtma = $v;
        $this->modifiedColumns[] = ManordtraPeer::CODTMA;
      }
  
	} 
	
	public function setDesord($v)
	{

    if ($this->desord !== $v) {
        $this->desord = $v;
        $this->modifiedColumns[] = ManordtraPeer::DESORD;
      }
  
	} 
	
	public function setTipord($v)
	{

    if ($this->tipord !== $v) {
        $this->tipord = $v;
        $this->modifiedColumns[] = ManordtraPeer::TIPORD;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = ManordtraPeer::CODART;
      }
  
	} 
	
	public function setIncree($v)
	{

    if ($this->incree !== $v) {
        $this->incree = $v;
        $this->modifiedColumns[] = ManordtraPeer::INCREE;
      }
  
	} 
	
	public function setCodsor($v)
	{

    if ($this->codsor !== $v) {
        $this->codsor = $v;
        $this->modifiedColumns[] = ManordtraPeer::CODSOR;
      }
  
	} 
	
	public function setCodgrr($v)
	{

    if ($this->codgrr !== $v) {
        $this->codgrr = $v;
        $this->modifiedColumns[] = ManordtraPeer::CODGRR;
      }
  
	} 
	
	public function setCodsis($v)
	{

    if ($this->codsis !== $v) {
        $this->codsis = $v;
        $this->modifiedColumns[] = ManordtraPeer::CODSIS;
      }
  
	} 
	
	public function setCodsfa($v)
	{

    if ($this->codsfa !== $v) {
        $this->codsfa = $v;
        $this->modifiedColumns[] = ManordtraPeer::CODSFA;
      }
  
	} 
	
	public function setCoddfa($v)
	{

    if ($this->coddfa !== $v) {
        $this->coddfa = $v;
        $this->modifiedColumns[] = ManordtraPeer::CODDFA;
      }
  
	} 
	
	public function setCodcfa($v)
	{

    if ($this->codcfa !== $v) {
        $this->codcfa = $v;
        $this->modifiedColumns[] = ManordtraPeer::CODCFA;
      }
  
	} 
	
	public function setParfal($v)
	{

    if ($this->parfal !== $v) {
        $this->parfal = $v;
        $this->modifiedColumns[] = ManordtraPeer::PARFAL;
      }
  
	} 
	
	public function setFecici($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecici] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecici !== $ts) {
      $this->fecici = $ts;
      $this->modifiedColumns[] = ManordtraPeer::FECICI;
    }

	} 
	
	public function setFeccci($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccci] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccci !== $ts) {
      $this->feccci = $ts;
      $this->modifiedColumns[] = ManordtraPeer::FECCCI;
    }

	} 
	
	public function setCedrec($v)
	{

    if ($this->cedrec !== $v) {
        $this->cedrec = $v;
        $this->modifiedColumns[] = ManordtraPeer::CEDREC;
      }
  
	} 
	
	public function setValhci($v)
	{

    if ($this->valhci !== $v) {
        $this->valhci = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManordtraPeer::VALHCI;
      }
  
	} 
	
	public function setDemcie($v)
	{

    if ($this->demcie !== $v) {
        $this->demcie = $v;
        $this->modifiedColumns[] = ManordtraPeer::DEMCIE;
      }
  
	} 
	
	public function setCodcfc($v)
	{

    if ($this->codcfc !== $v) {
        $this->codcfc = $v;
        $this->modifiedColumns[] = ManordtraPeer::CODCFC;
      }
  
	} 
	
	public function setObscie($v)
	{

    if ($this->obscie !== $v) {
        $this->obscie = $v;
        $this->modifiedColumns[] = ManordtraPeer::OBSCIE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ManordtraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->numequ = $rs->getString($startcol + 1);

      $this->refest = $rs->getString($startcol + 2);

      $this->fecemi = $rs->getDate($startcol + 3, null);

      $this->codact = $rs->getString($startcol + 4);

      $this->priori = $rs->getString($startcol + 5);

      $this->cedemp = $rs->getString($startcol + 6);

      $this->cedres = $rs->getString($startcol + 7);

      $this->codtma = $rs->getString($startcol + 8);

      $this->desord = $rs->getString($startcol + 9);

      $this->tipord = $rs->getString($startcol + 10);

      $this->codart = $rs->getString($startcol + 11);

      $this->incree = $rs->getString($startcol + 12);

      $this->codsor = $rs->getString($startcol + 13);

      $this->codgrr = $rs->getString($startcol + 14);

      $this->codsis = $rs->getString($startcol + 15);

      $this->codsfa = $rs->getString($startcol + 16);

      $this->coddfa = $rs->getString($startcol + 17);

      $this->codcfa = $rs->getString($startcol + 18);

      $this->parfal = $rs->getString($startcol + 19);

      $this->fecici = $rs->getTimestamp($startcol + 20, null);

      $this->feccci = $rs->getTimestamp($startcol + 21, null);

      $this->cedrec = $rs->getString($startcol + 22);

      $this->valhci = $rs->getFloat($startcol + 23);

      $this->demcie = $rs->getString($startcol + 24);

      $this->codcfc = $rs->getString($startcol + 25);

      $this->obscie = $rs->getString($startcol + 26);

      $this->id = $rs->getInt($startcol + 27);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 28; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Manordtra object", $e);
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
			$con = Propel::getConnection(ManordtraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ManordtraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ManordtraPeer::DATABASE_NAME);
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
					$pk = ManordtraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ManordtraPeer::doUpdate($this, $con);
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


			if (($retval = ManordtraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManordtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getNumequ();
				break;
			case 2:
				return $this->getRefest();
				break;
			case 3:
				return $this->getFecemi();
				break;
			case 4:
				return $this->getCodact();
				break;
			case 5:
				return $this->getPriori();
				break;
			case 6:
				return $this->getCedemp();
				break;
			case 7:
				return $this->getCedres();
				break;
			case 8:
				return $this->getCodtma();
				break;
			case 9:
				return $this->getDesord();
				break;
			case 10:
				return $this->getTipord();
				break;
			case 11:
				return $this->getCodart();
				break;
			case 12:
				return $this->getIncree();
				break;
			case 13:
				return $this->getCodsor();
				break;
			case 14:
				return $this->getCodgrr();
				break;
			case 15:
				return $this->getCodsis();
				break;
			case 16:
				return $this->getCodsfa();
				break;
			case 17:
				return $this->getCoddfa();
				break;
			case 18:
				return $this->getCodcfa();
				break;
			case 19:
				return $this->getParfal();
				break;
			case 20:
				return $this->getFecici();
				break;
			case 21:
				return $this->getFeccci();
				break;
			case 22:
				return $this->getCedrec();
				break;
			case 23:
				return $this->getValhci();
				break;
			case 24:
				return $this->getDemcie();
				break;
			case 25:
				return $this->getCodcfc();
				break;
			case 26:
				return $this->getObscie();
				break;
			case 27:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ManordtraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getNumequ(),
			$keys[2] => $this->getRefest(),
			$keys[3] => $this->getFecemi(),
			$keys[4] => $this->getCodact(),
			$keys[5] => $this->getPriori(),
			$keys[6] => $this->getCedemp(),
			$keys[7] => $this->getCedres(),
			$keys[8] => $this->getCodtma(),
			$keys[9] => $this->getDesord(),
			$keys[10] => $this->getTipord(),
			$keys[11] => $this->getCodart(),
			$keys[12] => $this->getIncree(),
			$keys[13] => $this->getCodsor(),
			$keys[14] => $this->getCodgrr(),
			$keys[15] => $this->getCodsis(),
			$keys[16] => $this->getCodsfa(),
			$keys[17] => $this->getCoddfa(),
			$keys[18] => $this->getCodcfa(),
			$keys[19] => $this->getParfal(),
			$keys[20] => $this->getFecici(),
			$keys[21] => $this->getFeccci(),
			$keys[22] => $this->getCedrec(),
			$keys[23] => $this->getValhci(),
			$keys[24] => $this->getDemcie(),
			$keys[25] => $this->getCodcfc(),
			$keys[26] => $this->getObscie(),
			$keys[27] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManordtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setNumequ($value);
				break;
			case 2:
				$this->setRefest($value);
				break;
			case 3:
				$this->setFecemi($value);
				break;
			case 4:
				$this->setCodact($value);
				break;
			case 5:
				$this->setPriori($value);
				break;
			case 6:
				$this->setCedemp($value);
				break;
			case 7:
				$this->setCedres($value);
				break;
			case 8:
				$this->setCodtma($value);
				break;
			case 9:
				$this->setDesord($value);
				break;
			case 10:
				$this->setTipord($value);
				break;
			case 11:
				$this->setCodart($value);
				break;
			case 12:
				$this->setIncree($value);
				break;
			case 13:
				$this->setCodsor($value);
				break;
			case 14:
				$this->setCodgrr($value);
				break;
			case 15:
				$this->setCodsis($value);
				break;
			case 16:
				$this->setCodsfa($value);
				break;
			case 17:
				$this->setCoddfa($value);
				break;
			case 18:
				$this->setCodcfa($value);
				break;
			case 19:
				$this->setParfal($value);
				break;
			case 20:
				$this->setFecici($value);
				break;
			case 21:
				$this->setFeccci($value);
				break;
			case 22:
				$this->setCedrec($value);
				break;
			case 23:
				$this->setValhci($value);
				break;
			case 24:
				$this->setDemcie($value);
				break;
			case 25:
				$this->setCodcfc($value);
				break;
			case 26:
				$this->setObscie($value);
				break;
			case 27:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ManordtraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumequ($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefest($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecemi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodact($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPriori($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCedemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCedres($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodtma($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDesord($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipord($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodart($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setIncree($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodsor($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodgrr($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodsis($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodsfa($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCoddfa($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodcfa($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setParfal($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFecici($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFeccci($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCedrec($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setValhci($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDemcie($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodcfc($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setObscie($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setId($arr[$keys[27]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ManordtraPeer::DATABASE_NAME);

		if ($this->isColumnModified(ManordtraPeer::NUMORD)) $criteria->add(ManordtraPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(ManordtraPeer::NUMEQU)) $criteria->add(ManordtraPeer::NUMEQU, $this->numequ);
		if ($this->isColumnModified(ManordtraPeer::REFEST)) $criteria->add(ManordtraPeer::REFEST, $this->refest);
		if ($this->isColumnModified(ManordtraPeer::FECEMI)) $criteria->add(ManordtraPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(ManordtraPeer::CODACT)) $criteria->add(ManordtraPeer::CODACT, $this->codact);
		if ($this->isColumnModified(ManordtraPeer::PRIORI)) $criteria->add(ManordtraPeer::PRIORI, $this->priori);
		if ($this->isColumnModified(ManordtraPeer::CEDEMP)) $criteria->add(ManordtraPeer::CEDEMP, $this->cedemp);
		if ($this->isColumnModified(ManordtraPeer::CEDRES)) $criteria->add(ManordtraPeer::CEDRES, $this->cedres);
		if ($this->isColumnModified(ManordtraPeer::CODTMA)) $criteria->add(ManordtraPeer::CODTMA, $this->codtma);
		if ($this->isColumnModified(ManordtraPeer::DESORD)) $criteria->add(ManordtraPeer::DESORD, $this->desord);
		if ($this->isColumnModified(ManordtraPeer::TIPORD)) $criteria->add(ManordtraPeer::TIPORD, $this->tipord);
		if ($this->isColumnModified(ManordtraPeer::CODART)) $criteria->add(ManordtraPeer::CODART, $this->codart);
		if ($this->isColumnModified(ManordtraPeer::INCREE)) $criteria->add(ManordtraPeer::INCREE, $this->incree);
		if ($this->isColumnModified(ManordtraPeer::CODSOR)) $criteria->add(ManordtraPeer::CODSOR, $this->codsor);
		if ($this->isColumnModified(ManordtraPeer::CODGRR)) $criteria->add(ManordtraPeer::CODGRR, $this->codgrr);
		if ($this->isColumnModified(ManordtraPeer::CODSIS)) $criteria->add(ManordtraPeer::CODSIS, $this->codsis);
		if ($this->isColumnModified(ManordtraPeer::CODSFA)) $criteria->add(ManordtraPeer::CODSFA, $this->codsfa);
		if ($this->isColumnModified(ManordtraPeer::CODDFA)) $criteria->add(ManordtraPeer::CODDFA, $this->coddfa);
		if ($this->isColumnModified(ManordtraPeer::CODCFA)) $criteria->add(ManordtraPeer::CODCFA, $this->codcfa);
		if ($this->isColumnModified(ManordtraPeer::PARFAL)) $criteria->add(ManordtraPeer::PARFAL, $this->parfal);
		if ($this->isColumnModified(ManordtraPeer::FECICI)) $criteria->add(ManordtraPeer::FECICI, $this->fecici);
		if ($this->isColumnModified(ManordtraPeer::FECCCI)) $criteria->add(ManordtraPeer::FECCCI, $this->feccci);
		if ($this->isColumnModified(ManordtraPeer::CEDREC)) $criteria->add(ManordtraPeer::CEDREC, $this->cedrec);
		if ($this->isColumnModified(ManordtraPeer::VALHCI)) $criteria->add(ManordtraPeer::VALHCI, $this->valhci);
		if ($this->isColumnModified(ManordtraPeer::DEMCIE)) $criteria->add(ManordtraPeer::DEMCIE, $this->demcie);
		if ($this->isColumnModified(ManordtraPeer::CODCFC)) $criteria->add(ManordtraPeer::CODCFC, $this->codcfc);
		if ($this->isColumnModified(ManordtraPeer::OBSCIE)) $criteria->add(ManordtraPeer::OBSCIE, $this->obscie);
		if ($this->isColumnModified(ManordtraPeer::ID)) $criteria->add(ManordtraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ManordtraPeer::DATABASE_NAME);

		$criteria->add(ManordtraPeer::ID, $this->id);

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

		$copyObj->setNumord($this->numord);

		$copyObj->setNumequ($this->numequ);

		$copyObj->setRefest($this->refest);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setCodact($this->codact);

		$copyObj->setPriori($this->priori);

		$copyObj->setCedemp($this->cedemp);

		$copyObj->setCedres($this->cedres);

		$copyObj->setCodtma($this->codtma);

		$copyObj->setDesord($this->desord);

		$copyObj->setTipord($this->tipord);

		$copyObj->setCodart($this->codart);

		$copyObj->setIncree($this->incree);

		$copyObj->setCodsor($this->codsor);

		$copyObj->setCodgrr($this->codgrr);

		$copyObj->setCodsis($this->codsis);

		$copyObj->setCodsfa($this->codsfa);

		$copyObj->setCoddfa($this->coddfa);

		$copyObj->setCodcfa($this->codcfa);

		$copyObj->setParfal($this->parfal);

		$copyObj->setFecici($this->fecici);

		$copyObj->setFeccci($this->feccci);

		$copyObj->setCedrec($this->cedrec);

		$copyObj->setValhci($this->valhci);

		$copyObj->setDemcie($this->demcie);

		$copyObj->setCodcfc($this->codcfc);

		$copyObj->setObscie($this->obscie);


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
			self::$peer = new ManordtraPeer();
		}
		return self::$peer;
	}

} 