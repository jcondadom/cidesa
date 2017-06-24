<?php


abstract class BaseViasoltraterre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $fecsol;


	
	protected $coddirec;


	
	protected $codeve;


	
	protected $codniv;


	
	protected $esnoemp;


	
	protected $codempusu;


	
	protected $tipserv;


	
	protected $canvehi;


	
	protected $tipvehi;


	
	protected $candias;


	
	protected $canpasaj;


	
	protected $equipaj;


	
	protected $instrum;


	
	protected $bultos;


	
	protected $conesper;


	
	protected $adisposi;


	
	protected $telemp;


	
	protected $nompercon;


	
	protected $apepercon;


	
	protected $numcelpercon;


	
	protected $numsolvi;


	
	protected $ordesp;


	
	protected $staapr;


	
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
  
  public function getEsnoemp()
  {

    return $this->esnoemp;

  }
  
  public function getCodempusu()
  {

    return trim($this->codempusu);

  }
  
  public function getTipserv()
  {

    return trim($this->tipserv);

  }
  
  public function getCanvehi()
  {

    return trim($this->canvehi);

  }
  
  public function getTipvehi()
  {

    return trim($this->tipvehi);

  }
  
  public function getCandias()
  {

    return trim($this->candias);

  }
  
  public function getCanpasaj()
  {

    return trim($this->canpasaj);

  }
  
  public function getEquipaj()
  {

    return $this->equipaj;

  }
  
  public function getInstrum()
  {

    return $this->instrum;

  }
  
  public function getBultos()
  {

    return $this->bultos;

  }
  
  public function getConesper()
  {

    return $this->conesper;

  }
  
  public function getAdisposi()
  {

    return $this->adisposi;

  }
  
  public function getTelemp()
  {

    return trim($this->telemp);

  }
  
  public function getNompercon()
  {

    return trim($this->nompercon);

  }
  
  public function getApepercon()
  {

    return trim($this->apepercon);

  }
  
  public function getNumcelpercon()
  {

    return trim($this->numcelpercon);

  }
  
  public function getNumsolvi()
  {

    return trim($this->numsolvi);

  }
  
  public function getOrdesp()
  {

    return trim($this->ordesp);

  }
  
  public function getStaapr()
  {

    return trim($this->staapr);

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
        $this->modifiedColumns[] = ViasoltraterrePeer::NUMSOL;
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
      $this->modifiedColumns[] = ViasoltraterrePeer::FECSOL;
    }

	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::CODDIREC;
      }
  
	} 
	
	public function setCodeve($v)
	{

    if ($this->codeve !== $v) {
        $this->codeve = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::CODEVE;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::CODNIV;
      }
  
	} 
	
	public function setEsnoemp($v)
	{

    if ($this->esnoemp !== $v) {
        $this->esnoemp = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::ESNOEMP;
      }
  
	} 
	
	public function setCodempusu($v)
	{

    if ($this->codempusu !== $v) {
        $this->codempusu = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::CODEMPUSU;
      }
  
	} 
	
	public function setTipserv($v)
	{

    if ($this->tipserv !== $v) {
        $this->tipserv = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::TIPSERV;
      }
  
	} 
	
	public function setCanvehi($v)
	{

    if ($this->canvehi !== $v) {
        $this->canvehi = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::CANVEHI;
      }
  
	} 
	
	public function setTipvehi($v)
	{

    if ($this->tipvehi !== $v) {
        $this->tipvehi = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::TIPVEHI;
      }
  
	} 
	
	public function setCandias($v)
	{

    if ($this->candias !== $v) {
        $this->candias = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::CANDIAS;
      }
  
	} 
	
	public function setCanpasaj($v)
	{

    if ($this->canpasaj !== $v) {
        $this->canpasaj = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::CANPASAJ;
      }
  
	} 
	
	public function setEquipaj($v)
	{

    if ($this->equipaj !== $v) {
        $this->equipaj = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::EQUIPAJ;
      }
  
	} 
	
	public function setInstrum($v)
	{

    if ($this->instrum !== $v) {
        $this->instrum = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::INSTRUM;
      }
  
	} 
	
	public function setBultos($v)
	{

    if ($this->bultos !== $v) {
        $this->bultos = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::BULTOS;
      }
  
	} 
	
	public function setConesper($v)
	{

    if ($this->conesper !== $v) {
        $this->conesper = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::CONESPER;
      }
  
	} 
	
	public function setAdisposi($v)
	{

    if ($this->adisposi !== $v) {
        $this->adisposi = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::ADISPOSI;
      }
  
	} 
	
	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::TELEMP;
      }
  
	} 
	
	public function setNompercon($v)
	{

    if ($this->nompercon !== $v) {
        $this->nompercon = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::NOMPERCON;
      }
  
	} 
	
	public function setApepercon($v)
	{

    if ($this->apepercon !== $v) {
        $this->apepercon = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::APEPERCON;
      }
  
	} 
	
	public function setNumcelpercon($v)
	{

    if ($this->numcelpercon !== $v) {
        $this->numcelpercon = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::NUMCELPERCON;
      }
  
	} 
	
	public function setNumsolvi($v)
	{

    if ($this->numsolvi !== $v) {
        $this->numsolvi = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::NUMSOLVI;
      }
  
	} 
	
	public function setOrdesp($v)
	{

    if ($this->ordesp !== $v) {
        $this->ordesp = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::ORDESP;
      }
  
	} 
	
	public function setStaapr($v)
	{

    if ($this->staapr !== $v) {
        $this->staapr = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::STAAPR;
      }
  
	} 
	
	public function setUsuapr($v)
	{

    if ($this->usuapr !== $v) {
        $this->usuapr = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::USUAPR;
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
      $this->modifiedColumns[] = ViasoltraterrePeer::FECAPR;
    }

	} 
	
	public function setLogusu($v)
	{

    if ($this->logusu !== $v) {
        $this->logusu = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::LOGUSU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViasoltraterrePeer::ID;
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

      $this->esnoemp = $rs->getBoolean($startcol + 5);

      $this->codempusu = $rs->getString($startcol + 6);

      $this->tipserv = $rs->getString($startcol + 7);

      $this->canvehi = $rs->getString($startcol + 8);

      $this->tipvehi = $rs->getString($startcol + 9);

      $this->candias = $rs->getString($startcol + 10);

      $this->canpasaj = $rs->getString($startcol + 11);

      $this->equipaj = $rs->getBoolean($startcol + 12);

      $this->instrum = $rs->getBoolean($startcol + 13);

      $this->bultos = $rs->getBoolean($startcol + 14);

      $this->conesper = $rs->getBoolean($startcol + 15);

      $this->adisposi = $rs->getBoolean($startcol + 16);

      $this->telemp = $rs->getString($startcol + 17);

      $this->nompercon = $rs->getString($startcol + 18);

      $this->apepercon = $rs->getString($startcol + 19);

      $this->numcelpercon = $rs->getString($startcol + 20);

      $this->numsolvi = $rs->getString($startcol + 21);

      $this->ordesp = $rs->getString($startcol + 22);

      $this->staapr = $rs->getString($startcol + 23);

      $this->usuapr = $rs->getString($startcol + 24);

      $this->fecapr = $rs->getDate($startcol + 25, null);

      $this->logusu = $rs->getString($startcol + 26);

      $this->id = $rs->getInt($startcol + 27);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 28; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viasoltraterre object", $e);
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
			$con = Propel::getConnection(ViasoltraterrePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViasoltraterrePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViasoltraterrePeer::DATABASE_NAME);
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
					$pk = ViasoltraterrePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViasoltraterrePeer::doUpdate($this, $con);
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


			if (($retval = ViasoltraterrePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViasoltraterrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getEsnoemp();
				break;
			case 6:
				return $this->getCodempusu();
				break;
			case 7:
				return $this->getTipserv();
				break;
			case 8:
				return $this->getCanvehi();
				break;
			case 9:
				return $this->getTipvehi();
				break;
			case 10:
				return $this->getCandias();
				break;
			case 11:
				return $this->getCanpasaj();
				break;
			case 12:
				return $this->getEquipaj();
				break;
			case 13:
				return $this->getInstrum();
				break;
			case 14:
				return $this->getBultos();
				break;
			case 15:
				return $this->getConesper();
				break;
			case 16:
				return $this->getAdisposi();
				break;
			case 17:
				return $this->getTelemp();
				break;
			case 18:
				return $this->getNompercon();
				break;
			case 19:
				return $this->getApepercon();
				break;
			case 20:
				return $this->getNumcelpercon();
				break;
			case 21:
				return $this->getNumsolvi();
				break;
			case 22:
				return $this->getOrdesp();
				break;
			case 23:
				return $this->getStaapr();
				break;
			case 24:
				return $this->getUsuapr();
				break;
			case 25:
				return $this->getFecapr();
				break;
			case 26:
				return $this->getLogusu();
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
		$keys = ViasoltraterrePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getFecsol(),
			$keys[2] => $this->getCoddirec(),
			$keys[3] => $this->getCodeve(),
			$keys[4] => $this->getCodniv(),
			$keys[5] => $this->getEsnoemp(),
			$keys[6] => $this->getCodempusu(),
			$keys[7] => $this->getTipserv(),
			$keys[8] => $this->getCanvehi(),
			$keys[9] => $this->getTipvehi(),
			$keys[10] => $this->getCandias(),
			$keys[11] => $this->getCanpasaj(),
			$keys[12] => $this->getEquipaj(),
			$keys[13] => $this->getInstrum(),
			$keys[14] => $this->getBultos(),
			$keys[15] => $this->getConesper(),
			$keys[16] => $this->getAdisposi(),
			$keys[17] => $this->getTelemp(),
			$keys[18] => $this->getNompercon(),
			$keys[19] => $this->getApepercon(),
			$keys[20] => $this->getNumcelpercon(),
			$keys[21] => $this->getNumsolvi(),
			$keys[22] => $this->getOrdesp(),
			$keys[23] => $this->getStaapr(),
			$keys[24] => $this->getUsuapr(),
			$keys[25] => $this->getFecapr(),
			$keys[26] => $this->getLogusu(),
			$keys[27] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViasoltraterrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setEsnoemp($value);
				break;
			case 6:
				$this->setCodempusu($value);
				break;
			case 7:
				$this->setTipserv($value);
				break;
			case 8:
				$this->setCanvehi($value);
				break;
			case 9:
				$this->setTipvehi($value);
				break;
			case 10:
				$this->setCandias($value);
				break;
			case 11:
				$this->setCanpasaj($value);
				break;
			case 12:
				$this->setEquipaj($value);
				break;
			case 13:
				$this->setInstrum($value);
				break;
			case 14:
				$this->setBultos($value);
				break;
			case 15:
				$this->setConesper($value);
				break;
			case 16:
				$this->setAdisposi($value);
				break;
			case 17:
				$this->setTelemp($value);
				break;
			case 18:
				$this->setNompercon($value);
				break;
			case 19:
				$this->setApepercon($value);
				break;
			case 20:
				$this->setNumcelpercon($value);
				break;
			case 21:
				$this->setNumsolvi($value);
				break;
			case 22:
				$this->setOrdesp($value);
				break;
			case 23:
				$this->setStaapr($value);
				break;
			case 24:
				$this->setUsuapr($value);
				break;
			case 25:
				$this->setFecapr($value);
				break;
			case 26:
				$this->setLogusu($value);
				break;
			case 27:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViasoltraterrePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoddirec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodeve($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodniv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEsnoemp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodempusu($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipserv($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCanvehi($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipvehi($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCandias($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCanpasaj($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setEquipaj($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setInstrum($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setBultos($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setConesper($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAdisposi($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTelemp($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setNompercon($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setApepercon($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setNumcelpercon($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setNumsolvi($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setOrdesp($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setStaapr($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setUsuapr($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFecapr($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setLogusu($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setId($arr[$keys[27]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViasoltraterrePeer::DATABASE_NAME);

		if ($this->isColumnModified(ViasoltraterrePeer::NUMSOL)) $criteria->add(ViasoltraterrePeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(ViasoltraterrePeer::FECSOL)) $criteria->add(ViasoltraterrePeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(ViasoltraterrePeer::CODDIREC)) $criteria->add(ViasoltraterrePeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(ViasoltraterrePeer::CODEVE)) $criteria->add(ViasoltraterrePeer::CODEVE, $this->codeve);
		if ($this->isColumnModified(ViasoltraterrePeer::CODNIV)) $criteria->add(ViasoltraterrePeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(ViasoltraterrePeer::ESNOEMP)) $criteria->add(ViasoltraterrePeer::ESNOEMP, $this->esnoemp);
		if ($this->isColumnModified(ViasoltraterrePeer::CODEMPUSU)) $criteria->add(ViasoltraterrePeer::CODEMPUSU, $this->codempusu);
		if ($this->isColumnModified(ViasoltraterrePeer::TIPSERV)) $criteria->add(ViasoltraterrePeer::TIPSERV, $this->tipserv);
		if ($this->isColumnModified(ViasoltraterrePeer::CANVEHI)) $criteria->add(ViasoltraterrePeer::CANVEHI, $this->canvehi);
		if ($this->isColumnModified(ViasoltraterrePeer::TIPVEHI)) $criteria->add(ViasoltraterrePeer::TIPVEHI, $this->tipvehi);
		if ($this->isColumnModified(ViasoltraterrePeer::CANDIAS)) $criteria->add(ViasoltraterrePeer::CANDIAS, $this->candias);
		if ($this->isColumnModified(ViasoltraterrePeer::CANPASAJ)) $criteria->add(ViasoltraterrePeer::CANPASAJ, $this->canpasaj);
		if ($this->isColumnModified(ViasoltraterrePeer::EQUIPAJ)) $criteria->add(ViasoltraterrePeer::EQUIPAJ, $this->equipaj);
		if ($this->isColumnModified(ViasoltraterrePeer::INSTRUM)) $criteria->add(ViasoltraterrePeer::INSTRUM, $this->instrum);
		if ($this->isColumnModified(ViasoltraterrePeer::BULTOS)) $criteria->add(ViasoltraterrePeer::BULTOS, $this->bultos);
		if ($this->isColumnModified(ViasoltraterrePeer::CONESPER)) $criteria->add(ViasoltraterrePeer::CONESPER, $this->conesper);
		if ($this->isColumnModified(ViasoltraterrePeer::ADISPOSI)) $criteria->add(ViasoltraterrePeer::ADISPOSI, $this->adisposi);
		if ($this->isColumnModified(ViasoltraterrePeer::TELEMP)) $criteria->add(ViasoltraterrePeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(ViasoltraterrePeer::NOMPERCON)) $criteria->add(ViasoltraterrePeer::NOMPERCON, $this->nompercon);
		if ($this->isColumnModified(ViasoltraterrePeer::APEPERCON)) $criteria->add(ViasoltraterrePeer::APEPERCON, $this->apepercon);
		if ($this->isColumnModified(ViasoltraterrePeer::NUMCELPERCON)) $criteria->add(ViasoltraterrePeer::NUMCELPERCON, $this->numcelpercon);
		if ($this->isColumnModified(ViasoltraterrePeer::NUMSOLVI)) $criteria->add(ViasoltraterrePeer::NUMSOLVI, $this->numsolvi);
		if ($this->isColumnModified(ViasoltraterrePeer::ORDESP)) $criteria->add(ViasoltraterrePeer::ORDESP, $this->ordesp);
		if ($this->isColumnModified(ViasoltraterrePeer::STAAPR)) $criteria->add(ViasoltraterrePeer::STAAPR, $this->staapr);
		if ($this->isColumnModified(ViasoltraterrePeer::USUAPR)) $criteria->add(ViasoltraterrePeer::USUAPR, $this->usuapr);
		if ($this->isColumnModified(ViasoltraterrePeer::FECAPR)) $criteria->add(ViasoltraterrePeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(ViasoltraterrePeer::LOGUSU)) $criteria->add(ViasoltraterrePeer::LOGUSU, $this->logusu);
		if ($this->isColumnModified(ViasoltraterrePeer::ID)) $criteria->add(ViasoltraterrePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViasoltraterrePeer::DATABASE_NAME);

		$criteria->add(ViasoltraterrePeer::ID, $this->id);

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

		$copyObj->setEsnoemp($this->esnoemp);

		$copyObj->setCodempusu($this->codempusu);

		$copyObj->setTipserv($this->tipserv);

		$copyObj->setCanvehi($this->canvehi);

		$copyObj->setTipvehi($this->tipvehi);

		$copyObj->setCandias($this->candias);

		$copyObj->setCanpasaj($this->canpasaj);

		$copyObj->setEquipaj($this->equipaj);

		$copyObj->setInstrum($this->instrum);

		$copyObj->setBultos($this->bultos);

		$copyObj->setConesper($this->conesper);

		$copyObj->setAdisposi($this->adisposi);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setNompercon($this->nompercon);

		$copyObj->setApepercon($this->apepercon);

		$copyObj->setNumcelpercon($this->numcelpercon);

		$copyObj->setNumsolvi($this->numsolvi);

		$copyObj->setOrdesp($this->ordesp);

		$copyObj->setStaapr($this->staapr);

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
			self::$peer = new ViasoltraterrePeer();
		}
		return self::$peer;
	}

} 