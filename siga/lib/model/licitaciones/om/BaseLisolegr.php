<?php


abstract class BaseLisolegr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $numptocue;


	
	protected $numpre;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $despro;


	
	protected $monsol;


	
	protected $codmon;


	
	protected $valcam;


	
	protected $feccam;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $status;


	
	protected $lisicact_id;


	
	protected $detdecmod;


	
	protected $prepor;


	
	protected $cargopre;


	
	protected $aprpor;


	
	protected $cargoapr;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $fecdecla;


	
	protected $monrgo;


	
	protected $monsub;


	
	protected $tipconpub;


	
	protected $codtiplic;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getNumptocue()
  {

    return trim($this->numptocue);

  }
  
  public function getNumpre()
  {

    return trim($this->numpre);

  }
  
  public function getCodempadm()
  {

    return trim($this->codempadm);

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getCodempeje()
  {

    return trim($this->codempeje);

  }
  
  public function getCoduniste()
  {

    return trim($this->coduniste);

  }
  
  public function getDespro()
  {

    return trim($this->despro);

  }
  
  public function getMonsol($val=false)
  {

    if($val) return number_format($this->monsol,2,',','.');
    else return $this->monsol;

  }
  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getValcam($val=false)
  {

    if($val) return number_format($this->valcam,2,',','.');
    else return $this->valcam;

  }
  
  public function getFeccam($format = 'Y-m-d H:i:s')
  {

    if ($this->feccam === null || $this->feccam === '') {
      return null;
    } elseif (!is_int($this->feccam)) {
            $ts = adodb_strtotime($this->feccam);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccam] as date/time value: " . var_export($this->feccam, true));
      }
    } else {
      $ts = $this->feccam;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDocane1()
  {

    return trim($this->docane1);

  }
  
  public function getDocane2()
  {

    return trim($this->docane2);

  }
  
  public function getDocane3()
  {

    return trim($this->docane3);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getDetdecmod()
  {

    return trim($this->detdecmod);

  }
  
  public function getPrepor()
  {

    return trim($this->prepor);

  }
  
  public function getCargopre()
  {

    return trim($this->cargopre);

  }
  
  public function getAprpor()
  {

    return trim($this->aprpor);

  }
  
  public function getCargoapr()
  {

    return trim($this->cargoapr);

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

  
  public function getDias()
  {

    return $this->dias;

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

  
  public function getFecdecla($format = 'Y-m-d')
  {

    if ($this->fecdecla === null || $this->fecdecla === '') {
      return null;
    } elseif (!is_int($this->fecdecla)) {
            $ts = adodb_strtotime($this->fecdecla);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdecla] as date/time value: " . var_export($this->fecdecla, true));
      }
    } else {
      $ts = $this->fecdecla;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonrgo($val=false)
  {

    if($val) return number_format($this->monrgo,2,',','.');
    else return $this->monrgo;

  }
  
  public function getMonsub($val=false)
  {

    if($val) return number_format($this->monsub,2,',','.');
    else return $this->monsub;

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getCodtiplic()
  {

    return trim($this->codtiplic);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = LisolegrPeer::NUMSOL;
      }
  
	} 
	
	public function setNumptocue($v)
	{

    if ($this->numptocue !== $v) {
        $this->numptocue = $v;
        $this->modifiedColumns[] = LisolegrPeer::NUMPTOCUE;
      }
  
	} 
	
	public function setNumpre($v)
	{

    if ($this->numpre !== $v) {
        $this->numpre = $v;
        $this->modifiedColumns[] = LisolegrPeer::NUMPRE;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LisolegrPeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LisolegrPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LisolegrPeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LisolegrPeer::CODUNISTE;
      }
  
	} 
	
	public function setDespro($v)
	{

    if ($this->despro !== $v) {
        $this->despro = $v;
        $this->modifiedColumns[] = LisolegrPeer::DESPRO;
      }
  
	} 
	
	public function setMonsol($v)
	{

    if ($this->monsol !== $v) {
        $this->monsol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrPeer::MONSOL;
      }
  
	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = LisolegrPeer::CODMON;
      }
  
	} 
	
	public function setValcam($v)
	{

    if ($this->valcam !== $v) {
        $this->valcam = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrPeer::VALCAM;
      }
  
	} 
	
	public function setFeccam($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccam] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccam !== $ts) {
      $this->feccam = $ts;
      $this->modifiedColumns[] = LisolegrPeer::FECCAM;
    }

	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LisolegrPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LisolegrPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LisolegrPeer::DOCANE3;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LisolegrPeer::STATUS;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LisolegrPeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LisolegrPeer::DETDECMOD;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LisolegrPeer::PREPOR;
      }
  
	} 
	
	public function setCargopre($v)
	{

    if ($this->cargopre !== $v) {
        $this->cargopre = $v;
        $this->modifiedColumns[] = LisolegrPeer::CARGOPRE;
      }
  
	} 
	
	public function setAprpor($v)
	{

    if ($this->aprpor !== $v) {
        $this->aprpor = $v;
        $this->modifiedColumns[] = LisolegrPeer::APRPOR;
      }
  
	} 
	
	public function setCargoapr($v)
	{

    if ($this->cargoapr !== $v) {
        $this->cargoapr = $v;
        $this->modifiedColumns[] = LisolegrPeer::CARGOAPR;
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
      $this->modifiedColumns[] = LisolegrPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LisolegrPeer::DIAS;
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
      $this->modifiedColumns[] = LisolegrPeer::FECVEN;
    }

	} 
	
	public function setFecdecla($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdecla] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdecla !== $ts) {
      $this->fecdecla = $ts;
      $this->modifiedColumns[] = LisolegrPeer::FECDECLA;
    }

	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrPeer::MONRGO;
      }
  
	} 
	
	public function setMonsub($v)
	{

    if ($this->monsub !== $v) {
        $this->monsub = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LisolegrPeer::MONSUB;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LisolegrPeer::TIPCONPUB;
      }
  
	} 
	
	public function setCodtiplic($v)
	{

    if ($this->codtiplic !== $v) {
        $this->codtiplic = $v;
        $this->modifiedColumns[] = LisolegrPeer::CODTIPLIC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LisolegrPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->numptocue = $rs->getString($startcol + 1);

      $this->numpre = $rs->getString($startcol + 2);

      $this->codempadm = $rs->getString($startcol + 3);

      $this->coduniadm = $rs->getString($startcol + 4);

      $this->codempeje = $rs->getString($startcol + 5);

      $this->coduniste = $rs->getString($startcol + 6);

      $this->despro = $rs->getString($startcol + 7);

      $this->monsol = $rs->getFloat($startcol + 8);

      $this->codmon = $rs->getString($startcol + 9);

      $this->valcam = $rs->getFloat($startcol + 10);

      $this->feccam = $rs->getTimestamp($startcol + 11, null);

      $this->docane1 = $rs->getString($startcol + 12);

      $this->docane2 = $rs->getString($startcol + 13);

      $this->docane3 = $rs->getString($startcol + 14);

      $this->status = $rs->getString($startcol + 15);

      $this->lisicact_id = $rs->getInt($startcol + 16);

      $this->detdecmod = $rs->getString($startcol + 17);

      $this->prepor = $rs->getString($startcol + 18);

      $this->cargopre = $rs->getString($startcol + 19);

      $this->aprpor = $rs->getString($startcol + 20);

      $this->cargoapr = $rs->getString($startcol + 21);

      $this->fecreg = $rs->getDate($startcol + 22, null);

      $this->dias = $rs->getInt($startcol + 23);

      $this->fecven = $rs->getDate($startcol + 24, null);

      $this->fecdecla = $rs->getDate($startcol + 25, null);

      $this->monrgo = $rs->getFloat($startcol + 26);

      $this->monsub = $rs->getFloat($startcol + 27);

      $this->tipconpub = $rs->getString($startcol + 28);

      $this->codtiplic = $rs->getString($startcol + 29);

      $this->id = $rs->getInt($startcol + 30);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 31; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lisolegr object", $e);
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
			$con = Propel::getConnection(LisolegrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LisolegrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LisolegrPeer::DATABASE_NAME);
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


												
			if ($this->aLisicact !== null) {
				if ($this->aLisicact->isModified()) {
					$affectedRows += $this->aLisicact->save($con);
				}
				$this->setLisicact($this->aLisicact);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LisolegrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LisolegrPeer::doUpdate($this, $con);
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


												
			if ($this->aLisicact !== null) {
				if (!$this->aLisicact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLisicact->getValidationFailures());
				}
			}


			if (($retval = LisolegrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LisolegrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getNumptocue();
				break;
			case 2:
				return $this->getNumpre();
				break;
			case 3:
				return $this->getCodempadm();
				break;
			case 4:
				return $this->getCoduniadm();
				break;
			case 5:
				return $this->getCodempeje();
				break;
			case 6:
				return $this->getCoduniste();
				break;
			case 7:
				return $this->getDespro();
				break;
			case 8:
				return $this->getMonsol();
				break;
			case 9:
				return $this->getCodmon();
				break;
			case 10:
				return $this->getValcam();
				break;
			case 11:
				return $this->getFeccam();
				break;
			case 12:
				return $this->getDocane1();
				break;
			case 13:
				return $this->getDocane2();
				break;
			case 14:
				return $this->getDocane3();
				break;
			case 15:
				return $this->getStatus();
				break;
			case 16:
				return $this->getLisicactId();
				break;
			case 17:
				return $this->getDetdecmod();
				break;
			case 18:
				return $this->getPrepor();
				break;
			case 19:
				return $this->getCargopre();
				break;
			case 20:
				return $this->getAprpor();
				break;
			case 21:
				return $this->getCargoapr();
				break;
			case 22:
				return $this->getFecreg();
				break;
			case 23:
				return $this->getDias();
				break;
			case 24:
				return $this->getFecven();
				break;
			case 25:
				return $this->getFecdecla();
				break;
			case 26:
				return $this->getMonrgo();
				break;
			case 27:
				return $this->getMonsub();
				break;
			case 28:
				return $this->getTipconpub();
				break;
			case 29:
				return $this->getCodtiplic();
				break;
			case 30:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LisolegrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getNumptocue(),
			$keys[2] => $this->getNumpre(),
			$keys[3] => $this->getCodempadm(),
			$keys[4] => $this->getCoduniadm(),
			$keys[5] => $this->getCodempeje(),
			$keys[6] => $this->getCoduniste(),
			$keys[7] => $this->getDespro(),
			$keys[8] => $this->getMonsol(),
			$keys[9] => $this->getCodmon(),
			$keys[10] => $this->getValcam(),
			$keys[11] => $this->getFeccam(),
			$keys[12] => $this->getDocane1(),
			$keys[13] => $this->getDocane2(),
			$keys[14] => $this->getDocane3(),
			$keys[15] => $this->getStatus(),
			$keys[16] => $this->getLisicactId(),
			$keys[17] => $this->getDetdecmod(),
			$keys[18] => $this->getPrepor(),
			$keys[19] => $this->getCargopre(),
			$keys[20] => $this->getAprpor(),
			$keys[21] => $this->getCargoapr(),
			$keys[22] => $this->getFecreg(),
			$keys[23] => $this->getDias(),
			$keys[24] => $this->getFecven(),
			$keys[25] => $this->getFecdecla(),
			$keys[26] => $this->getMonrgo(),
			$keys[27] => $this->getMonsub(),
			$keys[28] => $this->getTipconpub(),
			$keys[29] => $this->getCodtiplic(),
			$keys[30] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LisolegrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setNumptocue($value);
				break;
			case 2:
				$this->setNumpre($value);
				break;
			case 3:
				$this->setCodempadm($value);
				break;
			case 4:
				$this->setCoduniadm($value);
				break;
			case 5:
				$this->setCodempeje($value);
				break;
			case 6:
				$this->setCoduniste($value);
				break;
			case 7:
				$this->setDespro($value);
				break;
			case 8:
				$this->setMonsol($value);
				break;
			case 9:
				$this->setCodmon($value);
				break;
			case 10:
				$this->setValcam($value);
				break;
			case 11:
				$this->setFeccam($value);
				break;
			case 12:
				$this->setDocane1($value);
				break;
			case 13:
				$this->setDocane2($value);
				break;
			case 14:
				$this->setDocane3($value);
				break;
			case 15:
				$this->setStatus($value);
				break;
			case 16:
				$this->setLisicactId($value);
				break;
			case 17:
				$this->setDetdecmod($value);
				break;
			case 18:
				$this->setPrepor($value);
				break;
			case 19:
				$this->setCargopre($value);
				break;
			case 20:
				$this->setAprpor($value);
				break;
			case 21:
				$this->setCargoapr($value);
				break;
			case 22:
				$this->setFecreg($value);
				break;
			case 23:
				$this->setDias($value);
				break;
			case 24:
				$this->setFecven($value);
				break;
			case 25:
				$this->setFecdecla($value);
				break;
			case 26:
				$this->setMonrgo($value);
				break;
			case 27:
				$this->setMonsub($value);
				break;
			case 28:
				$this->setTipconpub($value);
				break;
			case 29:
				$this->setCodtiplic($value);
				break;
			case 30:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LisolegrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumptocue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduniadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodempeje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduniste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDespro($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonsol($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodmon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setValcam($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFeccam($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDocane1($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDocane2($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDocane3($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setStatus($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setLisicactId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDetdecmod($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPrepor($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCargopre($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setAprpor($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCargoapr($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFecreg($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDias($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFecven($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFecdecla($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setMonrgo($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setMonsub($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setTipconpub($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCodtiplic($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setId($arr[$keys[30]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LisolegrPeer::DATABASE_NAME);

		if ($this->isColumnModified(LisolegrPeer::NUMSOL)) $criteria->add(LisolegrPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(LisolegrPeer::NUMPTOCUE)) $criteria->add(LisolegrPeer::NUMPTOCUE, $this->numptocue);
		if ($this->isColumnModified(LisolegrPeer::NUMPRE)) $criteria->add(LisolegrPeer::NUMPRE, $this->numpre);
		if ($this->isColumnModified(LisolegrPeer::CODEMPADM)) $criteria->add(LisolegrPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LisolegrPeer::CODUNIADM)) $criteria->add(LisolegrPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LisolegrPeer::CODEMPEJE)) $criteria->add(LisolegrPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LisolegrPeer::CODUNISTE)) $criteria->add(LisolegrPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LisolegrPeer::DESPRO)) $criteria->add(LisolegrPeer::DESPRO, $this->despro);
		if ($this->isColumnModified(LisolegrPeer::MONSOL)) $criteria->add(LisolegrPeer::MONSOL, $this->monsol);
		if ($this->isColumnModified(LisolegrPeer::CODMON)) $criteria->add(LisolegrPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(LisolegrPeer::VALCAM)) $criteria->add(LisolegrPeer::VALCAM, $this->valcam);
		if ($this->isColumnModified(LisolegrPeer::FECCAM)) $criteria->add(LisolegrPeer::FECCAM, $this->feccam);
		if ($this->isColumnModified(LisolegrPeer::DOCANE1)) $criteria->add(LisolegrPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LisolegrPeer::DOCANE2)) $criteria->add(LisolegrPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LisolegrPeer::DOCANE3)) $criteria->add(LisolegrPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LisolegrPeer::STATUS)) $criteria->add(LisolegrPeer::STATUS, $this->status);
		if ($this->isColumnModified(LisolegrPeer::LISICACT_ID)) $criteria->add(LisolegrPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LisolegrPeer::DETDECMOD)) $criteria->add(LisolegrPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LisolegrPeer::PREPOR)) $criteria->add(LisolegrPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LisolegrPeer::CARGOPRE)) $criteria->add(LisolegrPeer::CARGOPRE, $this->cargopre);
		if ($this->isColumnModified(LisolegrPeer::APRPOR)) $criteria->add(LisolegrPeer::APRPOR, $this->aprpor);
		if ($this->isColumnModified(LisolegrPeer::CARGOAPR)) $criteria->add(LisolegrPeer::CARGOAPR, $this->cargoapr);
		if ($this->isColumnModified(LisolegrPeer::FECREG)) $criteria->add(LisolegrPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LisolegrPeer::DIAS)) $criteria->add(LisolegrPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LisolegrPeer::FECVEN)) $criteria->add(LisolegrPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LisolegrPeer::FECDECLA)) $criteria->add(LisolegrPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LisolegrPeer::MONRGO)) $criteria->add(LisolegrPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(LisolegrPeer::MONSUB)) $criteria->add(LisolegrPeer::MONSUB, $this->monsub);
		if ($this->isColumnModified(LisolegrPeer::TIPCONPUB)) $criteria->add(LisolegrPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LisolegrPeer::CODTIPLIC)) $criteria->add(LisolegrPeer::CODTIPLIC, $this->codtiplic);
		if ($this->isColumnModified(LisolegrPeer::ID)) $criteria->add(LisolegrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LisolegrPeer::DATABASE_NAME);

		$criteria->add(LisolegrPeer::ID, $this->id);

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

		$copyObj->setNumptocue($this->numptocue);

		$copyObj->setNumpre($this->numpre);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setDespro($this->despro);

		$copyObj->setMonsol($this->monsol);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValcam($this->valcam);

		$copyObj->setFeccam($this->feccam);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setStatus($this->status);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setCargopre($this->cargopre);

		$copyObj->setAprpor($this->aprpor);

		$copyObj->setCargoapr($this->cargoapr);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setFecdecla($this->fecdecla);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setMonsub($this->monsub);

		$copyObj->setTipconpub($this->tipconpub);

		$copyObj->setCodtiplic($this->codtiplic);


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
			self::$peer = new LisolegrPeer();
		}
		return self::$peer;
	}

	
	public function setLisicact($v)
	{


		if ($v === null) {
			$this->setLisicactId(NULL);
		} else {
			$this->setLisicactId($v->getId());
		}


		$this->aLisicact = $v;
	}


	
	public function getLisicact($con = null)
	{
		if ($this->aLisicact === null && ($this->lisicact_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLisicactPeer.php';

      $c = new Criteria();
      $c->add(LisicactPeer::ID,$this->lisicact_id);
      
			$this->aLisicact = LisicactPeer::doSelectOne($c, $con);

			
		}
		return $this->aLisicact;
	}

} 