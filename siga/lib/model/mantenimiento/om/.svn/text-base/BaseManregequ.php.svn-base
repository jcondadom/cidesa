<?php


abstract class BaseManregequ extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numequ;


	
	protected $nomequ;


	
	protected $serequ;


	
	protected $codteq;


	
	protected $codide;


	
	protected $codcla;


	
	protected $codtal;


	
	protected $codtta;


	
	protected $codfab;


	
	protected $fecfab;


	
	protected $coddis;


	
	protected $codmon;


	
	protected $valmon;


	
	protected $cosequ;


	
	protected $codtga;


	
	protected $valgar;


	
	protected $fecgar;


	
	protected $codume;


	
	protected $combus;


	
	protected $codest;


	
	protected $codubi;


	
	protected $codniv;


	
	protected $coduni;


	
	protected $codcencos;


	
	protected $carcos;


	
	protected $codcar;


	
	protected $loguse;


	
	protected $peso;


	
	protected $longit;


	
	protected $altura;


	
	protected $ancho;


	
	protected $balde;


	
	protected $tolba;


	
	protected $llenad;


	
	protected $lubric;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumequ()
  {

    return trim($this->numequ);

  }
  
  public function getNomequ()
  {

    return trim($this->nomequ);

  }
  
  public function getSerequ()
  {

    return trim($this->serequ);

  }
  
  public function getCodteq()
  {

    return trim($this->codteq);

  }
  
  public function getCodide()
  {

    return trim($this->codide);

  }
  
  public function getCodcla()
  {

    return trim($this->codcla);

  }
  
  public function getCodtal()
  {

    return trim($this->codtal);

  }
  
  public function getCodtta()
  {

    return trim($this->codtta);

  }
  
  public function getCodfab()
  {

    return trim($this->codfab);

  }
  
  public function getFecfab($format = 'Y-m-d')
  {

    if ($this->fecfab === null || $this->fecfab === '') {
      return null;
    } elseif (!is_int($this->fecfab)) {
            $ts = adodb_strtotime($this->fecfab);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfab] as date/time value: " . var_export($this->fecfab, true));
      }
    } else {
      $ts = $this->fecfab;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCoddis()
  {

    return trim($this->coddis);

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
  
  public function getCosequ($val=false)
  {

    if($val) return number_format($this->cosequ,2,',','.');
    else return $this->cosequ;

  }
  
  public function getCodtga()
  {

    return trim($this->codtga);

  }
  
  public function getValgar($val=false)
  {

    if($val) return number_format($this->valgar,2,',','.');
    else return $this->valgar;

  }
  
  public function getFecgar($format = 'Y-m-d')
  {

    if ($this->fecgar === null || $this->fecgar === '') {
      return null;
    } elseif (!is_int($this->fecgar)) {
            $ts = adodb_strtotime($this->fecgar);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecgar] as date/time value: " . var_export($this->fecgar, true));
      }
    } else {
      $ts = $this->fecgar;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodume()
  {

    return trim($this->codume);

  }
  
  public function getCombus()
  {

    return trim($this->combus);

  }
  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getCodcencos()
  {

    return trim($this->codcencos);

  }
  
  public function getCarcos()
  {

    return trim($this->carcos);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getPeso($val=false)
  {

    if($val) return number_format($this->peso,2,',','.');
    else return $this->peso;

  }
  
  public function getLongit($val=false)
  {

    if($val) return number_format($this->longit,2,',','.');
    else return $this->longit;

  }
  
  public function getAltura($val=false)
  {

    if($val) return number_format($this->altura,2,',','.');
    else return $this->altura;

  }
  
  public function getAncho($val=false)
  {

    if($val) return number_format($this->ancho,2,',','.');
    else return $this->ancho;

  }
  
  public function getBalde($val=false)
  {

    if($val) return number_format($this->balde,2,',','.');
    else return $this->balde;

  }
  
  public function getTolba($val=false)
  {

    if($val) return number_format($this->tolba,2,',','.');
    else return $this->tolba;

  }
  
  public function getLlenad($val=false)
  {

    if($val) return number_format($this->llenad,2,',','.');
    else return $this->llenad;

  }
  
  public function getLubric()
  {

    return trim($this->lubric);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumequ($v)
	{

    if ($this->numequ !== $v) {
        $this->numequ = $v;
        $this->modifiedColumns[] = ManregequPeer::NUMEQU;
      }
  
	} 
	
	public function setNomequ($v)
	{

    if ($this->nomequ !== $v) {
        $this->nomequ = $v;
        $this->modifiedColumns[] = ManregequPeer::NOMEQU;
      }
  
	} 
	
	public function setSerequ($v)
	{

    if ($this->serequ !== $v) {
        $this->serequ = $v;
        $this->modifiedColumns[] = ManregequPeer::SEREQU;
      }
  
	} 
	
	public function setCodteq($v)
	{

    if ($this->codteq !== $v) {
        $this->codteq = $v;
        $this->modifiedColumns[] = ManregequPeer::CODTEQ;
      }
  
	} 
	
	public function setCodide($v)
	{

    if ($this->codide !== $v) {
        $this->codide = $v;
        $this->modifiedColumns[] = ManregequPeer::CODIDE;
      }
  
	} 
	
	public function setCodcla($v)
	{

    if ($this->codcla !== $v) {
        $this->codcla = $v;
        $this->modifiedColumns[] = ManregequPeer::CODCLA;
      }
  
	} 
	
	public function setCodtal($v)
	{

    if ($this->codtal !== $v) {
        $this->codtal = $v;
        $this->modifiedColumns[] = ManregequPeer::CODTAL;
      }
  
	} 
	
	public function setCodtta($v)
	{

    if ($this->codtta !== $v) {
        $this->codtta = $v;
        $this->modifiedColumns[] = ManregequPeer::CODTTA;
      }
  
	} 
	
	public function setCodfab($v)
	{

    if ($this->codfab !== $v) {
        $this->codfab = $v;
        $this->modifiedColumns[] = ManregequPeer::CODFAB;
      }
  
	} 
	
	public function setFecfab($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfab] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfab !== $ts) {
      $this->fecfab = $ts;
      $this->modifiedColumns[] = ManregequPeer::FECFAB;
    }

	} 
	
	public function setCoddis($v)
	{

    if ($this->coddis !== $v) {
        $this->coddis = $v;
        $this->modifiedColumns[] = ManregequPeer::CODDIS;
      }
  
	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = ManregequPeer::CODMON;
      }
  
	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManregequPeer::VALMON;
      }
  
	} 
	
	public function setCosequ($v)
	{

    if ($this->cosequ !== $v) {
        $this->cosequ = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManregequPeer::COSEQU;
      }
  
	} 
	
	public function setCodtga($v)
	{

    if ($this->codtga !== $v) {
        $this->codtga = $v;
        $this->modifiedColumns[] = ManregequPeer::CODTGA;
      }
  
	} 
	
	public function setValgar($v)
	{

    if ($this->valgar !== $v) {
        $this->valgar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManregequPeer::VALGAR;
      }
  
	} 
	
	public function setFecgar($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecgar] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecgar !== $ts) {
      $this->fecgar = $ts;
      $this->modifiedColumns[] = ManregequPeer::FECGAR;
    }

	} 
	
	public function setCodume($v)
	{

    if ($this->codume !== $v) {
        $this->codume = $v;
        $this->modifiedColumns[] = ManregequPeer::CODUME;
      }
  
	} 
	
	public function setCombus($v)
	{

    if ($this->combus !== $v) {
        $this->combus = $v;
        $this->modifiedColumns[] = ManregequPeer::COMBUS;
      }
  
	} 
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = ManregequPeer::CODEST;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = ManregequPeer::CODUBI;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = ManregequPeer::CODNIV;
      }
  
	} 
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = ManregequPeer::CODUNI;
      }
  
	} 
	
	public function setCodcencos($v)
	{

    if ($this->codcencos !== $v) {
        $this->codcencos = $v;
        $this->modifiedColumns[] = ManregequPeer::CODCENCOS;
      }
  
	} 
	
	public function setCarcos($v)
	{

    if ($this->carcos !== $v) {
        $this->carcos = $v;
        $this->modifiedColumns[] = ManregequPeer::CARCOS;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = ManregequPeer::CODCAR;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = ManregequPeer::LOGUSE;
      }
  
	} 
	
	public function setPeso($v)
	{

    if ($this->peso !== $v) {
        $this->peso = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManregequPeer::PESO;
      }
  
	} 
	
	public function setLongit($v)
	{

    if ($this->longit !== $v) {
        $this->longit = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManregequPeer::LONGIT;
      }
  
	} 
	
	public function setAltura($v)
	{

    if ($this->altura !== $v) {
        $this->altura = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManregequPeer::ALTURA;
      }
  
	} 
	
	public function setAncho($v)
	{

    if ($this->ancho !== $v) {
        $this->ancho = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManregequPeer::ANCHO;
      }
  
	} 
	
	public function setBalde($v)
	{

    if ($this->balde !== $v) {
        $this->balde = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManregequPeer::BALDE;
      }
  
	} 
	
	public function setTolba($v)
	{

    if ($this->tolba !== $v) {
        $this->tolba = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManregequPeer::TOLBA;
      }
  
	} 
	
	public function setLlenad($v)
	{

    if ($this->llenad !== $v) {
        $this->llenad = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManregequPeer::LLENAD;
      }
  
	} 
	
	public function setLubric($v)
	{

    if ($this->lubric !== $v) {
        $this->lubric = $v;
        $this->modifiedColumns[] = ManregequPeer::LUBRIC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ManregequPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numequ = $rs->getString($startcol + 0);

      $this->nomequ = $rs->getString($startcol + 1);

      $this->serequ = $rs->getString($startcol + 2);

      $this->codteq = $rs->getString($startcol + 3);

      $this->codide = $rs->getString($startcol + 4);

      $this->codcla = $rs->getString($startcol + 5);

      $this->codtal = $rs->getString($startcol + 6);

      $this->codtta = $rs->getString($startcol + 7);

      $this->codfab = $rs->getString($startcol + 8);

      $this->fecfab = $rs->getDate($startcol + 9, null);

      $this->coddis = $rs->getString($startcol + 10);

      $this->codmon = $rs->getString($startcol + 11);

      $this->valmon = $rs->getFloat($startcol + 12);

      $this->cosequ = $rs->getFloat($startcol + 13);

      $this->codtga = $rs->getString($startcol + 14);

      $this->valgar = $rs->getFloat($startcol + 15);

      $this->fecgar = $rs->getDate($startcol + 16, null);

      $this->codume = $rs->getString($startcol + 17);

      $this->combus = $rs->getString($startcol + 18);

      $this->codest = $rs->getString($startcol + 19);

      $this->codubi = $rs->getString($startcol + 20);

      $this->codniv = $rs->getString($startcol + 21);

      $this->coduni = $rs->getString($startcol + 22);

      $this->codcencos = $rs->getString($startcol + 23);

      $this->carcos = $rs->getString($startcol + 24);

      $this->codcar = $rs->getString($startcol + 25);

      $this->loguse = $rs->getString($startcol + 26);

      $this->peso = $rs->getFloat($startcol + 27);

      $this->longit = $rs->getFloat($startcol + 28);

      $this->altura = $rs->getFloat($startcol + 29);

      $this->ancho = $rs->getFloat($startcol + 30);

      $this->balde = $rs->getFloat($startcol + 31);

      $this->tolba = $rs->getFloat($startcol + 32);

      $this->llenad = $rs->getFloat($startcol + 33);

      $this->lubric = $rs->getString($startcol + 34);

      $this->id = $rs->getInt($startcol + 35);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 36; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Manregequ object", $e);
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
			$con = Propel::getConnection(ManregequPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ManregequPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ManregequPeer::DATABASE_NAME);
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
					$pk = ManregequPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ManregequPeer::doUpdate($this, $con);
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


			if (($retval = ManregequPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManregequPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumequ();
				break;
			case 1:
				return $this->getNomequ();
				break;
			case 2:
				return $this->getSerequ();
				break;
			case 3:
				return $this->getCodteq();
				break;
			case 4:
				return $this->getCodide();
				break;
			case 5:
				return $this->getCodcla();
				break;
			case 6:
				return $this->getCodtal();
				break;
			case 7:
				return $this->getCodtta();
				break;
			case 8:
				return $this->getCodfab();
				break;
			case 9:
				return $this->getFecfab();
				break;
			case 10:
				return $this->getCoddis();
				break;
			case 11:
				return $this->getCodmon();
				break;
			case 12:
				return $this->getValmon();
				break;
			case 13:
				return $this->getCosequ();
				break;
			case 14:
				return $this->getCodtga();
				break;
			case 15:
				return $this->getValgar();
				break;
			case 16:
				return $this->getFecgar();
				break;
			case 17:
				return $this->getCodume();
				break;
			case 18:
				return $this->getCombus();
				break;
			case 19:
				return $this->getCodest();
				break;
			case 20:
				return $this->getCodubi();
				break;
			case 21:
				return $this->getCodniv();
				break;
			case 22:
				return $this->getCoduni();
				break;
			case 23:
				return $this->getCodcencos();
				break;
			case 24:
				return $this->getCarcos();
				break;
			case 25:
				return $this->getCodcar();
				break;
			case 26:
				return $this->getLoguse();
				break;
			case 27:
				return $this->getPeso();
				break;
			case 28:
				return $this->getLongit();
				break;
			case 29:
				return $this->getAltura();
				break;
			case 30:
				return $this->getAncho();
				break;
			case 31:
				return $this->getBalde();
				break;
			case 32:
				return $this->getTolba();
				break;
			case 33:
				return $this->getLlenad();
				break;
			case 34:
				return $this->getLubric();
				break;
			case 35:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ManregequPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumequ(),
			$keys[1] => $this->getNomequ(),
			$keys[2] => $this->getSerequ(),
			$keys[3] => $this->getCodteq(),
			$keys[4] => $this->getCodide(),
			$keys[5] => $this->getCodcla(),
			$keys[6] => $this->getCodtal(),
			$keys[7] => $this->getCodtta(),
			$keys[8] => $this->getCodfab(),
			$keys[9] => $this->getFecfab(),
			$keys[10] => $this->getCoddis(),
			$keys[11] => $this->getCodmon(),
			$keys[12] => $this->getValmon(),
			$keys[13] => $this->getCosequ(),
			$keys[14] => $this->getCodtga(),
			$keys[15] => $this->getValgar(),
			$keys[16] => $this->getFecgar(),
			$keys[17] => $this->getCodume(),
			$keys[18] => $this->getCombus(),
			$keys[19] => $this->getCodest(),
			$keys[20] => $this->getCodubi(),
			$keys[21] => $this->getCodniv(),
			$keys[22] => $this->getCoduni(),
			$keys[23] => $this->getCodcencos(),
			$keys[24] => $this->getCarcos(),
			$keys[25] => $this->getCodcar(),
			$keys[26] => $this->getLoguse(),
			$keys[27] => $this->getPeso(),
			$keys[28] => $this->getLongit(),
			$keys[29] => $this->getAltura(),
			$keys[30] => $this->getAncho(),
			$keys[31] => $this->getBalde(),
			$keys[32] => $this->getTolba(),
			$keys[33] => $this->getLlenad(),
			$keys[34] => $this->getLubric(),
			$keys[35] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManregequPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumequ($value);
				break;
			case 1:
				$this->setNomequ($value);
				break;
			case 2:
				$this->setSerequ($value);
				break;
			case 3:
				$this->setCodteq($value);
				break;
			case 4:
				$this->setCodide($value);
				break;
			case 5:
				$this->setCodcla($value);
				break;
			case 6:
				$this->setCodtal($value);
				break;
			case 7:
				$this->setCodtta($value);
				break;
			case 8:
				$this->setCodfab($value);
				break;
			case 9:
				$this->setFecfab($value);
				break;
			case 10:
				$this->setCoddis($value);
				break;
			case 11:
				$this->setCodmon($value);
				break;
			case 12:
				$this->setValmon($value);
				break;
			case 13:
				$this->setCosequ($value);
				break;
			case 14:
				$this->setCodtga($value);
				break;
			case 15:
				$this->setValgar($value);
				break;
			case 16:
				$this->setFecgar($value);
				break;
			case 17:
				$this->setCodume($value);
				break;
			case 18:
				$this->setCombus($value);
				break;
			case 19:
				$this->setCodest($value);
				break;
			case 20:
				$this->setCodubi($value);
				break;
			case 21:
				$this->setCodniv($value);
				break;
			case 22:
				$this->setCoduni($value);
				break;
			case 23:
				$this->setCodcencos($value);
				break;
			case 24:
				$this->setCarcos($value);
				break;
			case 25:
				$this->setCodcar($value);
				break;
			case 26:
				$this->setLoguse($value);
				break;
			case 27:
				$this->setPeso($value);
				break;
			case 28:
				$this->setLongit($value);
				break;
			case 29:
				$this->setAltura($value);
				break;
			case 30:
				$this->setAncho($value);
				break;
			case 31:
				$this->setBalde($value);
				break;
			case 32:
				$this->setTolba($value);
				break;
			case 33:
				$this->setLlenad($value);
				break;
			case 34:
				$this->setLubric($value);
				break;
			case 35:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ManregequPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumequ($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomequ($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSerequ($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodteq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodide($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcla($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodtal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodtta($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodfab($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecfab($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCoddis($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodmon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setValmon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCosequ($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodtga($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setValgar($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecgar($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodume($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCombus($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodest($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodubi($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodniv($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCoduni($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCodcencos($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCarcos($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodcar($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setLoguse($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setPeso($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setLongit($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setAltura($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setAncho($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setBalde($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setTolba($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setLlenad($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setLubric($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setId($arr[$keys[35]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ManregequPeer::DATABASE_NAME);

		if ($this->isColumnModified(ManregequPeer::NUMEQU)) $criteria->add(ManregequPeer::NUMEQU, $this->numequ);
		if ($this->isColumnModified(ManregequPeer::NOMEQU)) $criteria->add(ManregequPeer::NOMEQU, $this->nomequ);
		if ($this->isColumnModified(ManregequPeer::SEREQU)) $criteria->add(ManregequPeer::SEREQU, $this->serequ);
		if ($this->isColumnModified(ManregequPeer::CODTEQ)) $criteria->add(ManregequPeer::CODTEQ, $this->codteq);
		if ($this->isColumnModified(ManregequPeer::CODIDE)) $criteria->add(ManregequPeer::CODIDE, $this->codide);
		if ($this->isColumnModified(ManregequPeer::CODCLA)) $criteria->add(ManregequPeer::CODCLA, $this->codcla);
		if ($this->isColumnModified(ManregequPeer::CODTAL)) $criteria->add(ManregequPeer::CODTAL, $this->codtal);
		if ($this->isColumnModified(ManregequPeer::CODTTA)) $criteria->add(ManregequPeer::CODTTA, $this->codtta);
		if ($this->isColumnModified(ManregequPeer::CODFAB)) $criteria->add(ManregequPeer::CODFAB, $this->codfab);
		if ($this->isColumnModified(ManregequPeer::FECFAB)) $criteria->add(ManregequPeer::FECFAB, $this->fecfab);
		if ($this->isColumnModified(ManregequPeer::CODDIS)) $criteria->add(ManregequPeer::CODDIS, $this->coddis);
		if ($this->isColumnModified(ManregequPeer::CODMON)) $criteria->add(ManregequPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(ManregequPeer::VALMON)) $criteria->add(ManregequPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(ManregequPeer::COSEQU)) $criteria->add(ManregequPeer::COSEQU, $this->cosequ);
		if ($this->isColumnModified(ManregequPeer::CODTGA)) $criteria->add(ManregequPeer::CODTGA, $this->codtga);
		if ($this->isColumnModified(ManregequPeer::VALGAR)) $criteria->add(ManregequPeer::VALGAR, $this->valgar);
		if ($this->isColumnModified(ManregequPeer::FECGAR)) $criteria->add(ManregequPeer::FECGAR, $this->fecgar);
		if ($this->isColumnModified(ManregequPeer::CODUME)) $criteria->add(ManregequPeer::CODUME, $this->codume);
		if ($this->isColumnModified(ManregequPeer::COMBUS)) $criteria->add(ManregequPeer::COMBUS, $this->combus);
		if ($this->isColumnModified(ManregequPeer::CODEST)) $criteria->add(ManregequPeer::CODEST, $this->codest);
		if ($this->isColumnModified(ManregequPeer::CODUBI)) $criteria->add(ManregequPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(ManregequPeer::CODNIV)) $criteria->add(ManregequPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(ManregequPeer::CODUNI)) $criteria->add(ManregequPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(ManregequPeer::CODCENCOS)) $criteria->add(ManregequPeer::CODCENCOS, $this->codcencos);
		if ($this->isColumnModified(ManregequPeer::CARCOS)) $criteria->add(ManregequPeer::CARCOS, $this->carcos);
		if ($this->isColumnModified(ManregequPeer::CODCAR)) $criteria->add(ManregequPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(ManregequPeer::LOGUSE)) $criteria->add(ManregequPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(ManregequPeer::PESO)) $criteria->add(ManregequPeer::PESO, $this->peso);
		if ($this->isColumnModified(ManregequPeer::LONGIT)) $criteria->add(ManregequPeer::LONGIT, $this->longit);
		if ($this->isColumnModified(ManregequPeer::ALTURA)) $criteria->add(ManregequPeer::ALTURA, $this->altura);
		if ($this->isColumnModified(ManregequPeer::ANCHO)) $criteria->add(ManregequPeer::ANCHO, $this->ancho);
		if ($this->isColumnModified(ManregequPeer::BALDE)) $criteria->add(ManregequPeer::BALDE, $this->balde);
		if ($this->isColumnModified(ManregequPeer::TOLBA)) $criteria->add(ManregequPeer::TOLBA, $this->tolba);
		if ($this->isColumnModified(ManregequPeer::LLENAD)) $criteria->add(ManregequPeer::LLENAD, $this->llenad);
		if ($this->isColumnModified(ManregequPeer::LUBRIC)) $criteria->add(ManregequPeer::LUBRIC, $this->lubric);
		if ($this->isColumnModified(ManregequPeer::ID)) $criteria->add(ManregequPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ManregequPeer::DATABASE_NAME);

		$criteria->add(ManregequPeer::ID, $this->id);

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

		$copyObj->setNumequ($this->numequ);

		$copyObj->setNomequ($this->nomequ);

		$copyObj->setSerequ($this->serequ);

		$copyObj->setCodteq($this->codteq);

		$copyObj->setCodide($this->codide);

		$copyObj->setCodcla($this->codcla);

		$copyObj->setCodtal($this->codtal);

		$copyObj->setCodtta($this->codtta);

		$copyObj->setCodfab($this->codfab);

		$copyObj->setFecfab($this->fecfab);

		$copyObj->setCoddis($this->coddis);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setCosequ($this->cosequ);

		$copyObj->setCodtga($this->codtga);

		$copyObj->setValgar($this->valgar);

		$copyObj->setFecgar($this->fecgar);

		$copyObj->setCodume($this->codume);

		$copyObj->setCombus($this->combus);

		$copyObj->setCodest($this->codest);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setCodcencos($this->codcencos);

		$copyObj->setCarcos($this->carcos);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setPeso($this->peso);

		$copyObj->setLongit($this->longit);

		$copyObj->setAltura($this->altura);

		$copyObj->setAncho($this->ancho);

		$copyObj->setBalde($this->balde);

		$copyObj->setTolba($this->tolba);

		$copyObj->setLlenad($this->llenad);

		$copyObj->setLubric($this->lubric);


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
			self::$peer = new ManregequPeer();
		}
		return self::$peer;
	}

} 