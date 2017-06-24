<?php


abstract class BaseNpinffam extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $cedfam;


	
	protected $nomfam;


	
	protected $sexfam;


	
	protected $fecnac;


	
	protected $edafam;


	
	protected $parfam;


	
	protected $edociv;


	
	protected $grains;


	
	protected $traofi;


	
	protected $codgua;


	
	protected $valgua;


	
	protected $seghcm;


	
	protected $porseghcm;


	
	protected $ocupac;


	
	protected $carben;


	
	protected $dissus;


	
	protected $fecing;


	
	protected $docgua;


	
	protected $nomgua;


	
	protected $confis;


	
	protected $nivaca;


	
	protected $observ;


	
	protected $status;


	
	protected $ctapen;


	
	protected $cptpen;


	
	protected $segfun;


	
	protected $fecinghcm;


	
	protected $coninsest;


	
	protected $becesc;


	
	protected $fecentcie;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCedfam()
  {

    return trim($this->cedfam);

  }
  
  public function getNomfam()
  {

    return trim($this->nomfam);

  }
  
  public function getSexfam()
  {

    return trim($this->sexfam);

  }
  
  public function getFecnac($format = 'Y-m-d')
  {

    if ($this->fecnac === null || $this->fecnac === '') {
      return null;
    } elseif (!is_int($this->fecnac)) {
            $ts = adodb_strtotime($this->fecnac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnac] as date/time value: " . var_export($this->fecnac, true));
      }
    } else {
      $ts = $this->fecnac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEdafam($val=false)
  {

    if($val) return number_format($this->edafam,2,',','.');
    else return $this->edafam;

  }
  
  public function getParfam()
  {

    return trim($this->parfam);

  }
  
  public function getEdociv()
  {

    return trim($this->edociv);

  }
  
  public function getGrains()
  {

    return trim($this->grains);

  }
  
  public function getTraofi()
  {

    return trim($this->traofi);

  }
  
  public function getCodgua()
  {

    return trim($this->codgua);

  }
  
  public function getValgua($val=false)
  {

    if($val) return number_format($this->valgua,2,',','.');
    else return $this->valgua;

  }
  
  public function getSeghcm()
  {

    return trim($this->seghcm);

  }
  
  public function getPorseghcm($val=false)
  {

    if($val) return number_format($this->porseghcm,2,',','.');
    else return $this->porseghcm;

  }
  
  public function getOcupac()
  {

    return trim($this->ocupac);

  }
  
  public function getCarben()
  {

    return trim($this->carben);

  }
  
  public function getDissus()
  {

    return trim($this->dissus);

  }
  
  public function getFecing($format = 'Y-m-d')
  {

    if ($this->fecing === null || $this->fecing === '') {
      return null;
    } elseif (!is_int($this->fecing)) {
            $ts = adodb_strtotime($this->fecing);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecing] as date/time value: " . var_export($this->fecing, true));
      }
    } else {
      $ts = $this->fecing;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDocgua()
  {

    return trim($this->docgua);

  }
  
  public function getNomgua()
  {

    return trim($this->nomgua);

  }
  
  public function getConfis()
  {

    return trim($this->confis);

  }
  
  public function getNivaca()
  {

    return trim($this->nivaca);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getCtapen()
  {

    return trim($this->ctapen);

  }
  
  public function getCptpen()
  {

    return trim($this->cptpen);

  }
  
  public function getSegfun()
  {

    return $this->segfun;

  }
  
  public function getFecinghcm($format = 'Y-m-d')
  {

    if ($this->fecinghcm === null || $this->fecinghcm === '') {
      return null;
    } elseif (!is_int($this->fecinghcm)) {
            $ts = adodb_strtotime($this->fecinghcm);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecinghcm] as date/time value: " . var_export($this->fecinghcm, true));
      }
    } else {
      $ts = $this->fecinghcm;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getConinsest()
  {

    return trim($this->coninsest);

  }
  
  public function getBecesc()
  {

    return trim($this->becesc);

  }
  
  public function getFecentcie($format = 'Y-m-d')
  {

    if ($this->fecentcie === null || $this->fecentcie === '') {
      return null;
    } elseif (!is_int($this->fecentcie)) {
            $ts = adodb_strtotime($this->fecentcie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecentcie] as date/time value: " . var_export($this->fecentcie, true));
      }
    } else {
      $ts = $this->fecentcie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinffamPeer::CODEMP;
      }
  
	} 
	
	public function setCedfam($v)
	{

    if ($this->cedfam !== $v) {
        $this->cedfam = $v;
        $this->modifiedColumns[] = NpinffamPeer::CEDFAM;
      }
  
	} 
	
	public function setNomfam($v)
	{

    if ($this->nomfam !== $v) {
        $this->nomfam = $v;
        $this->modifiedColumns[] = NpinffamPeer::NOMFAM;
      }
  
	} 
	
	public function setSexfam($v)
	{

    if ($this->sexfam !== $v) {
        $this->sexfam = $v;
        $this->modifiedColumns[] = NpinffamPeer::SEXFAM;
      }
  
	} 
	
	public function setFecnac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnac !== $ts) {
      $this->fecnac = $ts;
      $this->modifiedColumns[] = NpinffamPeer::FECNAC;
    }

	} 
	
	public function setEdafam($v)
	{

    if ($this->edafam !== $v) {
        $this->edafam = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpinffamPeer::EDAFAM;
      }
  
	} 
	
	public function setParfam($v)
	{

    if ($this->parfam !== $v) {
        $this->parfam = $v;
        $this->modifiedColumns[] = NpinffamPeer::PARFAM;
      }
  
	} 
	
	public function setEdociv($v)
	{

    if ($this->edociv !== $v) {
        $this->edociv = $v;
        $this->modifiedColumns[] = NpinffamPeer::EDOCIV;
      }
  
	} 
	
	public function setGrains($v)
	{

    if ($this->grains !== $v) {
        $this->grains = $v;
        $this->modifiedColumns[] = NpinffamPeer::GRAINS;
      }
  
	} 
	
	public function setTraofi($v)
	{

    if ($this->traofi !== $v) {
        $this->traofi = $v;
        $this->modifiedColumns[] = NpinffamPeer::TRAOFI;
      }
  
	} 
	
	public function setCodgua($v)
	{

    if ($this->codgua !== $v) {
        $this->codgua = $v;
        $this->modifiedColumns[] = NpinffamPeer::CODGUA;
      }
  
	} 
	
	public function setValgua($v)
	{

    if ($this->valgua !== $v) {
        $this->valgua = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpinffamPeer::VALGUA;
      }
  
	} 
	
	public function setSeghcm($v)
	{

    if ($this->seghcm !== $v) {
        $this->seghcm = $v;
        $this->modifiedColumns[] = NpinffamPeer::SEGHCM;
      }
  
	} 
	
	public function setPorseghcm($v)
	{

    if ($this->porseghcm !== $v) {
        $this->porseghcm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpinffamPeer::PORSEGHCM;
      }
  
	} 
	
	public function setOcupac($v)
	{

    if ($this->ocupac !== $v) {
        $this->ocupac = $v;
        $this->modifiedColumns[] = NpinffamPeer::OCUPAC;
      }
  
	} 
	
	public function setCarben($v)
	{

    if ($this->carben !== $v) {
        $this->carben = $v;
        $this->modifiedColumns[] = NpinffamPeer::CARBEN;
      }
  
	} 
	
	public function setDissus($v)
	{

    if ($this->dissus !== $v) {
        $this->dissus = $v;
        $this->modifiedColumns[] = NpinffamPeer::DISSUS;
      }
  
	} 
	
	public function setFecing($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecing] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecing !== $ts) {
      $this->fecing = $ts;
      $this->modifiedColumns[] = NpinffamPeer::FECING;
    }

	} 
	
	public function setDocgua($v)
	{

    if ($this->docgua !== $v) {
        $this->docgua = $v;
        $this->modifiedColumns[] = NpinffamPeer::DOCGUA;
      }
  
	} 
	
	public function setNomgua($v)
	{

    if ($this->nomgua !== $v) {
        $this->nomgua = $v;
        $this->modifiedColumns[] = NpinffamPeer::NOMGUA;
      }
  
	} 
	
	public function setConfis($v)
	{

    if ($this->confis !== $v) {
        $this->confis = $v;
        $this->modifiedColumns[] = NpinffamPeer::CONFIS;
      }
  
	} 
	
	public function setNivaca($v)
	{

    if ($this->nivaca !== $v) {
        $this->nivaca = $v;
        $this->modifiedColumns[] = NpinffamPeer::NIVACA;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = NpinffamPeer::OBSERV;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = NpinffamPeer::STATUS;
      }
  
	} 
	
	public function setCtapen($v)
	{

    if ($this->ctapen !== $v) {
        $this->ctapen = $v;
        $this->modifiedColumns[] = NpinffamPeer::CTAPEN;
      }
  
	} 
	
	public function setCptpen($v)
	{

    if ($this->cptpen !== $v) {
        $this->cptpen = $v;
        $this->modifiedColumns[] = NpinffamPeer::CPTPEN;
      }
  
	} 
	
	public function setSegfun($v)
	{

    if ($this->segfun !== $v) {
        $this->segfun = $v;
        $this->modifiedColumns[] = NpinffamPeer::SEGFUN;
      }
  
	} 
	
	public function setFecinghcm($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecinghcm] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecinghcm !== $ts) {
      $this->fecinghcm = $ts;
      $this->modifiedColumns[] = NpinffamPeer::FECINGHCM;
    }

	} 
	
	public function setConinsest($v)
	{

    if ($this->coninsest !== $v) {
        $this->coninsest = $v;
        $this->modifiedColumns[] = NpinffamPeer::CONINSEST;
      }
  
	} 
	
	public function setBecesc($v)
	{

    if ($this->becesc !== $v) {
        $this->becesc = $v;
        $this->modifiedColumns[] = NpinffamPeer::BECESC;
      }
  
	} 
	
	public function setFecentcie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecentcie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecentcie !== $ts) {
      $this->fecentcie = $ts;
      $this->modifiedColumns[] = NpinffamPeer::FECENTCIE;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinffamPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->cedfam = $rs->getString($startcol + 1);

      $this->nomfam = $rs->getString($startcol + 2);

      $this->sexfam = $rs->getString($startcol + 3);

      $this->fecnac = $rs->getDate($startcol + 4, null);

      $this->edafam = $rs->getFloat($startcol + 5);

      $this->parfam = $rs->getString($startcol + 6);

      $this->edociv = $rs->getString($startcol + 7);

      $this->grains = $rs->getString($startcol + 8);

      $this->traofi = $rs->getString($startcol + 9);

      $this->codgua = $rs->getString($startcol + 10);

      $this->valgua = $rs->getFloat($startcol + 11);

      $this->seghcm = $rs->getString($startcol + 12);

      $this->porseghcm = $rs->getFloat($startcol + 13);

      $this->ocupac = $rs->getString($startcol + 14);

      $this->carben = $rs->getString($startcol + 15);

      $this->dissus = $rs->getString($startcol + 16);

      $this->fecing = $rs->getDate($startcol + 17, null);

      $this->docgua = $rs->getString($startcol + 18);

      $this->nomgua = $rs->getString($startcol + 19);

      $this->confis = $rs->getString($startcol + 20);

      $this->nivaca = $rs->getString($startcol + 21);

      $this->observ = $rs->getString($startcol + 22);

      $this->status = $rs->getString($startcol + 23);

      $this->ctapen = $rs->getString($startcol + 24);

      $this->cptpen = $rs->getString($startcol + 25);

      $this->segfun = $rs->getBoolean($startcol + 26);

      $this->fecinghcm = $rs->getDate($startcol + 27, null);

      $this->coninsest = $rs->getString($startcol + 28);

      $this->becesc = $rs->getString($startcol + 29);

      $this->fecentcie = $rs->getDate($startcol + 30, null);

      $this->id = $rs->getInt($startcol + 31);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 32; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinffam object", $e);
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
			$con = Propel::getConnection(NpinffamPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinffamPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinffamPeer::DATABASE_NAME);
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
					$pk = NpinffamPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinffamPeer::doUpdate($this, $con);
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


			if (($retval = NpinffamPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinffamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCedfam();
				break;
			case 2:
				return $this->getNomfam();
				break;
			case 3:
				return $this->getSexfam();
				break;
			case 4:
				return $this->getFecnac();
				break;
			case 5:
				return $this->getEdafam();
				break;
			case 6:
				return $this->getParfam();
				break;
			case 7:
				return $this->getEdociv();
				break;
			case 8:
				return $this->getGrains();
				break;
			case 9:
				return $this->getTraofi();
				break;
			case 10:
				return $this->getCodgua();
				break;
			case 11:
				return $this->getValgua();
				break;
			case 12:
				return $this->getSeghcm();
				break;
			case 13:
				return $this->getPorseghcm();
				break;
			case 14:
				return $this->getOcupac();
				break;
			case 15:
				return $this->getCarben();
				break;
			case 16:
				return $this->getDissus();
				break;
			case 17:
				return $this->getFecing();
				break;
			case 18:
				return $this->getDocgua();
				break;
			case 19:
				return $this->getNomgua();
				break;
			case 20:
				return $this->getConfis();
				break;
			case 21:
				return $this->getNivaca();
				break;
			case 22:
				return $this->getObserv();
				break;
			case 23:
				return $this->getStatus();
				break;
			case 24:
				return $this->getCtapen();
				break;
			case 25:
				return $this->getCptpen();
				break;
			case 26:
				return $this->getSegfun();
				break;
			case 27:
				return $this->getFecinghcm();
				break;
			case 28:
				return $this->getConinsest();
				break;
			case 29:
				return $this->getBecesc();
				break;
			case 30:
				return $this->getFecentcie();
				break;
			case 31:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinffamPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCedfam(),
			$keys[2] => $this->getNomfam(),
			$keys[3] => $this->getSexfam(),
			$keys[4] => $this->getFecnac(),
			$keys[5] => $this->getEdafam(),
			$keys[6] => $this->getParfam(),
			$keys[7] => $this->getEdociv(),
			$keys[8] => $this->getGrains(),
			$keys[9] => $this->getTraofi(),
			$keys[10] => $this->getCodgua(),
			$keys[11] => $this->getValgua(),
			$keys[12] => $this->getSeghcm(),
			$keys[13] => $this->getPorseghcm(),
			$keys[14] => $this->getOcupac(),
			$keys[15] => $this->getCarben(),
			$keys[16] => $this->getDissus(),
			$keys[17] => $this->getFecing(),
			$keys[18] => $this->getDocgua(),
			$keys[19] => $this->getNomgua(),
			$keys[20] => $this->getConfis(),
			$keys[21] => $this->getNivaca(),
			$keys[22] => $this->getObserv(),
			$keys[23] => $this->getStatus(),
			$keys[24] => $this->getCtapen(),
			$keys[25] => $this->getCptpen(),
			$keys[26] => $this->getSegfun(),
			$keys[27] => $this->getFecinghcm(),
			$keys[28] => $this->getConinsest(),
			$keys[29] => $this->getBecesc(),
			$keys[30] => $this->getFecentcie(),
			$keys[31] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinffamPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCedfam($value);
				break;
			case 2:
				$this->setNomfam($value);
				break;
			case 3:
				$this->setSexfam($value);
				break;
			case 4:
				$this->setFecnac($value);
				break;
			case 5:
				$this->setEdafam($value);
				break;
			case 6:
				$this->setParfam($value);
				break;
			case 7:
				$this->setEdociv($value);
				break;
			case 8:
				$this->setGrains($value);
				break;
			case 9:
				$this->setTraofi($value);
				break;
			case 10:
				$this->setCodgua($value);
				break;
			case 11:
				$this->setValgua($value);
				break;
			case 12:
				$this->setSeghcm($value);
				break;
			case 13:
				$this->setPorseghcm($value);
				break;
			case 14:
				$this->setOcupac($value);
				break;
			case 15:
				$this->setCarben($value);
				break;
			case 16:
				$this->setDissus($value);
				break;
			case 17:
				$this->setFecing($value);
				break;
			case 18:
				$this->setDocgua($value);
				break;
			case 19:
				$this->setNomgua($value);
				break;
			case 20:
				$this->setConfis($value);
				break;
			case 21:
				$this->setNivaca($value);
				break;
			case 22:
				$this->setObserv($value);
				break;
			case 23:
				$this->setStatus($value);
				break;
			case 24:
				$this->setCtapen($value);
				break;
			case 25:
				$this->setCptpen($value);
				break;
			case 26:
				$this->setSegfun($value);
				break;
			case 27:
				$this->setFecinghcm($value);
				break;
			case 28:
				$this->setConinsest($value);
				break;
			case 29:
				$this->setBecesc($value);
				break;
			case 30:
				$this->setFecentcie($value);
				break;
			case 31:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinffamPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedfam($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomfam($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSexfam($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecnac($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEdafam($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setParfam($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEdociv($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setGrains($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTraofi($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodgua($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setValgua($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setSeghcm($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPorseghcm($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setOcupac($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCarben($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDissus($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecing($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDocgua($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNomgua($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setConfis($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setNivaca($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setObserv($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setStatus($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCtapen($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCptpen($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setSegfun($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setFecinghcm($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setConinsest($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setBecesc($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFecentcie($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setId($arr[$keys[31]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinffamPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinffamPeer::CODEMP)) $criteria->add(NpinffamPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinffamPeer::CEDFAM)) $criteria->add(NpinffamPeer::CEDFAM, $this->cedfam);
		if ($this->isColumnModified(NpinffamPeer::NOMFAM)) $criteria->add(NpinffamPeer::NOMFAM, $this->nomfam);
		if ($this->isColumnModified(NpinffamPeer::SEXFAM)) $criteria->add(NpinffamPeer::SEXFAM, $this->sexfam);
		if ($this->isColumnModified(NpinffamPeer::FECNAC)) $criteria->add(NpinffamPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(NpinffamPeer::EDAFAM)) $criteria->add(NpinffamPeer::EDAFAM, $this->edafam);
		if ($this->isColumnModified(NpinffamPeer::PARFAM)) $criteria->add(NpinffamPeer::PARFAM, $this->parfam);
		if ($this->isColumnModified(NpinffamPeer::EDOCIV)) $criteria->add(NpinffamPeer::EDOCIV, $this->edociv);
		if ($this->isColumnModified(NpinffamPeer::GRAINS)) $criteria->add(NpinffamPeer::GRAINS, $this->grains);
		if ($this->isColumnModified(NpinffamPeer::TRAOFI)) $criteria->add(NpinffamPeer::TRAOFI, $this->traofi);
		if ($this->isColumnModified(NpinffamPeer::CODGUA)) $criteria->add(NpinffamPeer::CODGUA, $this->codgua);
		if ($this->isColumnModified(NpinffamPeer::VALGUA)) $criteria->add(NpinffamPeer::VALGUA, $this->valgua);
		if ($this->isColumnModified(NpinffamPeer::SEGHCM)) $criteria->add(NpinffamPeer::SEGHCM, $this->seghcm);
		if ($this->isColumnModified(NpinffamPeer::PORSEGHCM)) $criteria->add(NpinffamPeer::PORSEGHCM, $this->porseghcm);
		if ($this->isColumnModified(NpinffamPeer::OCUPAC)) $criteria->add(NpinffamPeer::OCUPAC, $this->ocupac);
		if ($this->isColumnModified(NpinffamPeer::CARBEN)) $criteria->add(NpinffamPeer::CARBEN, $this->carben);
		if ($this->isColumnModified(NpinffamPeer::DISSUS)) $criteria->add(NpinffamPeer::DISSUS, $this->dissus);
		if ($this->isColumnModified(NpinffamPeer::FECING)) $criteria->add(NpinffamPeer::FECING, $this->fecing);
		if ($this->isColumnModified(NpinffamPeer::DOCGUA)) $criteria->add(NpinffamPeer::DOCGUA, $this->docgua);
		if ($this->isColumnModified(NpinffamPeer::NOMGUA)) $criteria->add(NpinffamPeer::NOMGUA, $this->nomgua);
		if ($this->isColumnModified(NpinffamPeer::CONFIS)) $criteria->add(NpinffamPeer::CONFIS, $this->confis);
		if ($this->isColumnModified(NpinffamPeer::NIVACA)) $criteria->add(NpinffamPeer::NIVACA, $this->nivaca);
		if ($this->isColumnModified(NpinffamPeer::OBSERV)) $criteria->add(NpinffamPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(NpinffamPeer::STATUS)) $criteria->add(NpinffamPeer::STATUS, $this->status);
		if ($this->isColumnModified(NpinffamPeer::CTAPEN)) $criteria->add(NpinffamPeer::CTAPEN, $this->ctapen);
		if ($this->isColumnModified(NpinffamPeer::CPTPEN)) $criteria->add(NpinffamPeer::CPTPEN, $this->cptpen);
		if ($this->isColumnModified(NpinffamPeer::SEGFUN)) $criteria->add(NpinffamPeer::SEGFUN, $this->segfun);
		if ($this->isColumnModified(NpinffamPeer::FECINGHCM)) $criteria->add(NpinffamPeer::FECINGHCM, $this->fecinghcm);
		if ($this->isColumnModified(NpinffamPeer::CONINSEST)) $criteria->add(NpinffamPeer::CONINSEST, $this->coninsest);
		if ($this->isColumnModified(NpinffamPeer::BECESC)) $criteria->add(NpinffamPeer::BECESC, $this->becesc);
		if ($this->isColumnModified(NpinffamPeer::FECENTCIE)) $criteria->add(NpinffamPeer::FECENTCIE, $this->fecentcie);
		if ($this->isColumnModified(NpinffamPeer::ID)) $criteria->add(NpinffamPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinffamPeer::DATABASE_NAME);

		$criteria->add(NpinffamPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCedfam($this->cedfam);

		$copyObj->setNomfam($this->nomfam);

		$copyObj->setSexfam($this->sexfam);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setEdafam($this->edafam);

		$copyObj->setParfam($this->parfam);

		$copyObj->setEdociv($this->edociv);

		$copyObj->setGrains($this->grains);

		$copyObj->setTraofi($this->traofi);

		$copyObj->setCodgua($this->codgua);

		$copyObj->setValgua($this->valgua);

		$copyObj->setSeghcm($this->seghcm);

		$copyObj->setPorseghcm($this->porseghcm);

		$copyObj->setOcupac($this->ocupac);

		$copyObj->setCarben($this->carben);

		$copyObj->setDissus($this->dissus);

		$copyObj->setFecing($this->fecing);

		$copyObj->setDocgua($this->docgua);

		$copyObj->setNomgua($this->nomgua);

		$copyObj->setConfis($this->confis);

		$copyObj->setNivaca($this->nivaca);

		$copyObj->setObserv($this->observ);

		$copyObj->setStatus($this->status);

		$copyObj->setCtapen($this->ctapen);

		$copyObj->setCptpen($this->cptpen);

		$copyObj->setSegfun($this->segfun);

		$copyObj->setFecinghcm($this->fecinghcm);

		$copyObj->setConinsest($this->coninsest);

		$copyObj->setBecesc($this->becesc);

		$copyObj->setFecentcie($this->fecentcie);


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
			self::$peer = new NpinffamPeer();
		}
		return self::$peer;
	}

} 