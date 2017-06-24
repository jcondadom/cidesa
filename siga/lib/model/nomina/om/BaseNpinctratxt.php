<?php


abstract class BaseNpinctratxt extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecinc;


	
	protected $status;


	
	protected $tipreg;


	
	protected $nacemp;


	
	protected $cedemp;


	
	protected $priape;


	
	protected $segape;


	
	protected $prinom;


	
	protected $segnom;


	
	protected $fecnac;


	
	protected $moning;


	
	protected $fecing;


	
	protected $acteco;


	
	protected $cargo;


	
	protected $sexo;


	
	protected $estciv;


	
	protected $urbani;


	
	protected $avenid;


	
	protected $conjun;


	
	protected $numero;


	
	protected $ciudad;


	
	protected $estado;


	
	protected $pais;


	
	protected $telefono;


	
	protected $fax;


	
	protected $celular;


	
	protected $internet;


	
	protected $zonpos;


	
	protected $accion;


	
	protected $tipemp;


	
	protected $codare;


	
	protected $teltrab;


	
	protected $tipcuen;


	
	protected $codofi;


	
	protected $numcue;


	
	protected $filler;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getFecinc($format = 'Y-m-d')
  {

    if ($this->fecinc === null || $this->fecinc === '') {
      return null;
    } elseif (!is_int($this->fecinc)) {
            $ts = adodb_strtotime($this->fecinc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecinc] as date/time value: " . var_export($this->fecinc, true));
      }
    } else {
      $ts = $this->fecinc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStatus()
  {

    return $this->status;

  }
  
  public function getTipreg()
  {

    return trim($this->tipreg);

  }
  
  public function getNacemp()
  {

    return trim($this->nacemp);

  }
  
  public function getCedemp()
  {

    return trim($this->cedemp);

  }
  
  public function getPriape()
  {

    return trim($this->priape);

  }
  
  public function getSegape()
  {

    return trim($this->segape);

  }
  
  public function getPrinom()
  {

    return trim($this->prinom);

  }
  
  public function getSegnom()
  {

    return trim($this->segnom);

  }
  
  public function getFecnac()
  {

    return trim($this->fecnac);

  }
  
  public function getMoning()
  {

    return trim($this->moning);

  }
  
  public function getFecing()
  {

    return trim($this->fecing);

  }
  
  public function getActeco()
  {

    return trim($this->acteco);

  }
  
  public function getCargo()
  {

    return trim($this->cargo);

  }
  
  public function getSexo()
  {

    return trim($this->sexo);

  }
  
  public function getEstciv()
  {

    return trim($this->estciv);

  }
  
  public function getUrbani()
  {

    return trim($this->urbani);

  }
  
  public function getAvenid()
  {

    return trim($this->avenid);

  }
  
  public function getConjun()
  {

    return trim($this->conjun);

  }
  
  public function getNumero()
  {

    return trim($this->numero);

  }
  
  public function getCiudad()
  {

    return trim($this->ciudad);

  }
  
  public function getEstado()
  {

    return trim($this->estado);

  }
  
  public function getPais()
  {

    return trim($this->pais);

  }
  
  public function getTelefono()
  {

    return trim($this->telefono);

  }
  
  public function getFax()
  {

    return trim($this->fax);

  }
  
  public function getCelular()
  {

    return trim($this->celular);

  }
  
  public function getInternet()
  {

    return trim($this->internet);

  }
  
  public function getZonpos()
  {

    return trim($this->zonpos);

  }
  
  public function getAccion()
  {

    return trim($this->accion);

  }
  
  public function getTipemp()
  {

    return trim($this->tipemp);

  }
  
  public function getCodare()
  {

    return trim($this->codare);

  }
  
  public function getTeltrab()
  {

    return trim($this->teltrab);

  }
  
  public function getTipcuen()
  {

    return trim($this->tipcuen);

  }
  
  public function getCodofi()
  {

    return trim($this->codofi);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getFiller()
  {

    return trim($this->filler);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setFecinc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecinc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecinc !== $ts) {
      $this->fecinc = $ts;
      $this->modifiedColumns[] = NpinctratxtPeer::FECINC;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::STATUS;
      }
  
	} 
	
	public function setTipreg($v)
	{

    if ($this->tipreg !== $v) {
        $this->tipreg = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::TIPREG;
      }
  
	} 
	
	public function setNacemp($v)
	{

    if ($this->nacemp !== $v) {
        $this->nacemp = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::NACEMP;
      }
  
	} 
	
	public function setCedemp($v)
	{

    if ($this->cedemp !== $v) {
        $this->cedemp = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::CEDEMP;
      }
  
	} 
	
	public function setPriape($v)
	{

    if ($this->priape !== $v) {
        $this->priape = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::PRIAPE;
      }
  
	} 
	
	public function setSegape($v)
	{

    if ($this->segape !== $v) {
        $this->segape = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::SEGAPE;
      }
  
	} 
	
	public function setPrinom($v)
	{

    if ($this->prinom !== $v) {
        $this->prinom = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::PRINOM;
      }
  
	} 
	
	public function setSegnom($v)
	{

    if ($this->segnom !== $v) {
        $this->segnom = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::SEGNOM;
      }
  
	} 
	
	public function setFecnac($v)
	{

    if ($this->fecnac !== $v) {
        $this->fecnac = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::FECNAC;
      }
  
	} 
	
	public function setMoning($v)
	{

    if ($this->moning !== $v) {
        $this->moning = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::MONING;
      }
  
	} 
	
	public function setFecing($v)
	{

    if ($this->fecing !== $v) {
        $this->fecing = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::FECING;
      }
  
	} 
	
	public function setActeco($v)
	{

    if ($this->acteco !== $v) {
        $this->acteco = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::ACTECO;
      }
  
	} 
	
	public function setCargo($v)
	{

    if ($this->cargo !== $v) {
        $this->cargo = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::CARGO;
      }
  
	} 
	
	public function setSexo($v)
	{

    if ($this->sexo !== $v) {
        $this->sexo = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::SEXO;
      }
  
	} 
	
	public function setEstciv($v)
	{

    if ($this->estciv !== $v) {
        $this->estciv = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::ESTCIV;
      }
  
	} 
	
	public function setUrbani($v)
	{

    if ($this->urbani !== $v) {
        $this->urbani = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::URBANI;
      }
  
	} 
	
	public function setAvenid($v)
	{

    if ($this->avenid !== $v) {
        $this->avenid = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::AVENID;
      }
  
	} 
	
	public function setConjun($v)
	{

    if ($this->conjun !== $v) {
        $this->conjun = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::CONJUN;
      }
  
	} 
	
	public function setNumero($v)
	{

    if ($this->numero !== $v) {
        $this->numero = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::NUMERO;
      }
  
	} 
	
	public function setCiudad($v)
	{

    if ($this->ciudad !== $v) {
        $this->ciudad = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::CIUDAD;
      }
  
	} 
	
	public function setEstado($v)
	{

    if ($this->estado !== $v) {
        $this->estado = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::ESTADO;
      }
  
	} 
	
	public function setPais($v)
	{

    if ($this->pais !== $v) {
        $this->pais = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::PAIS;
      }
  
	} 
	
	public function setTelefono($v)
	{

    if ($this->telefono !== $v) {
        $this->telefono = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::TELEFONO;
      }
  
	} 
	
	public function setFax($v)
	{

    if ($this->fax !== $v) {
        $this->fax = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::FAX;
      }
  
	} 
	
	public function setCelular($v)
	{

    if ($this->celular !== $v) {
        $this->celular = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::CELULAR;
      }
  
	} 
	
	public function setInternet($v)
	{

    if ($this->internet !== $v) {
        $this->internet = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::INTERNET;
      }
  
	} 
	
	public function setZonpos($v)
	{

    if ($this->zonpos !== $v) {
        $this->zonpos = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::ZONPOS;
      }
  
	} 
	
	public function setAccion($v)
	{

    if ($this->accion !== $v) {
        $this->accion = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::ACCION;
      }
  
	} 
	
	public function setTipemp($v)
	{

    if ($this->tipemp !== $v) {
        $this->tipemp = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::TIPEMP;
      }
  
	} 
	
	public function setCodare($v)
	{

    if ($this->codare !== $v) {
        $this->codare = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::CODARE;
      }
  
	} 
	
	public function setTeltrab($v)
	{

    if ($this->teltrab !== $v) {
        $this->teltrab = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::TELTRAB;
      }
  
	} 
	
	public function setTipcuen($v)
	{

    if ($this->tipcuen !== $v) {
        $this->tipcuen = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::TIPCUEN;
      }
  
	} 
	
	public function setCodofi($v)
	{

    if ($this->codofi !== $v) {
        $this->codofi = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::CODOFI;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::NUMCUE;
      }
  
	} 
	
	public function setFiller($v)
	{

    if ($this->filler !== $v) {
        $this->filler = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::FILLER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinctratxtPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->fecinc = $rs->getDate($startcol + 0, null);

      $this->status = $rs->getBoolean($startcol + 1);

      $this->tipreg = $rs->getString($startcol + 2);

      $this->nacemp = $rs->getString($startcol + 3);

      $this->cedemp = $rs->getString($startcol + 4);

      $this->priape = $rs->getString($startcol + 5);

      $this->segape = $rs->getString($startcol + 6);

      $this->prinom = $rs->getString($startcol + 7);

      $this->segnom = $rs->getString($startcol + 8);

      $this->fecnac = $rs->getString($startcol + 9);

      $this->moning = $rs->getString($startcol + 10);

      $this->fecing = $rs->getString($startcol + 11);

      $this->acteco = $rs->getString($startcol + 12);

      $this->cargo = $rs->getString($startcol + 13);

      $this->sexo = $rs->getString($startcol + 14);

      $this->estciv = $rs->getString($startcol + 15);

      $this->urbani = $rs->getString($startcol + 16);

      $this->avenid = $rs->getString($startcol + 17);

      $this->conjun = $rs->getString($startcol + 18);

      $this->numero = $rs->getString($startcol + 19);

      $this->ciudad = $rs->getString($startcol + 20);

      $this->estado = $rs->getString($startcol + 21);

      $this->pais = $rs->getString($startcol + 22);

      $this->telefono = $rs->getString($startcol + 23);

      $this->fax = $rs->getString($startcol + 24);

      $this->celular = $rs->getString($startcol + 25);

      $this->internet = $rs->getString($startcol + 26);

      $this->zonpos = $rs->getString($startcol + 27);

      $this->accion = $rs->getString($startcol + 28);

      $this->tipemp = $rs->getString($startcol + 29);

      $this->codare = $rs->getString($startcol + 30);

      $this->teltrab = $rs->getString($startcol + 31);

      $this->tipcuen = $rs->getString($startcol + 32);

      $this->codofi = $rs->getString($startcol + 33);

      $this->numcue = $rs->getString($startcol + 34);

      $this->filler = $rs->getString($startcol + 35);

      $this->id = $rs->getInt($startcol + 36);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 37; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinctratxt object", $e);
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
			$con = Propel::getConnection(NpinctratxtPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinctratxtPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinctratxtPeer::DATABASE_NAME);
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
					$pk = NpinctratxtPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinctratxtPeer::doUpdate($this, $con);
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


			if (($retval = NpinctratxtPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinctratxtPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecinc();
				break;
			case 1:
				return $this->getStatus();
				break;
			case 2:
				return $this->getTipreg();
				break;
			case 3:
				return $this->getNacemp();
				break;
			case 4:
				return $this->getCedemp();
				break;
			case 5:
				return $this->getPriape();
				break;
			case 6:
				return $this->getSegape();
				break;
			case 7:
				return $this->getPrinom();
				break;
			case 8:
				return $this->getSegnom();
				break;
			case 9:
				return $this->getFecnac();
				break;
			case 10:
				return $this->getMoning();
				break;
			case 11:
				return $this->getFecing();
				break;
			case 12:
				return $this->getActeco();
				break;
			case 13:
				return $this->getCargo();
				break;
			case 14:
				return $this->getSexo();
				break;
			case 15:
				return $this->getEstciv();
				break;
			case 16:
				return $this->getUrbani();
				break;
			case 17:
				return $this->getAvenid();
				break;
			case 18:
				return $this->getConjun();
				break;
			case 19:
				return $this->getNumero();
				break;
			case 20:
				return $this->getCiudad();
				break;
			case 21:
				return $this->getEstado();
				break;
			case 22:
				return $this->getPais();
				break;
			case 23:
				return $this->getTelefono();
				break;
			case 24:
				return $this->getFax();
				break;
			case 25:
				return $this->getCelular();
				break;
			case 26:
				return $this->getInternet();
				break;
			case 27:
				return $this->getZonpos();
				break;
			case 28:
				return $this->getAccion();
				break;
			case 29:
				return $this->getTipemp();
				break;
			case 30:
				return $this->getCodare();
				break;
			case 31:
				return $this->getTeltrab();
				break;
			case 32:
				return $this->getTipcuen();
				break;
			case 33:
				return $this->getCodofi();
				break;
			case 34:
				return $this->getNumcue();
				break;
			case 35:
				return $this->getFiller();
				break;
			case 36:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinctratxtPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecinc(),
			$keys[1] => $this->getStatus(),
			$keys[2] => $this->getTipreg(),
			$keys[3] => $this->getNacemp(),
			$keys[4] => $this->getCedemp(),
			$keys[5] => $this->getPriape(),
			$keys[6] => $this->getSegape(),
			$keys[7] => $this->getPrinom(),
			$keys[8] => $this->getSegnom(),
			$keys[9] => $this->getFecnac(),
			$keys[10] => $this->getMoning(),
			$keys[11] => $this->getFecing(),
			$keys[12] => $this->getActeco(),
			$keys[13] => $this->getCargo(),
			$keys[14] => $this->getSexo(),
			$keys[15] => $this->getEstciv(),
			$keys[16] => $this->getUrbani(),
			$keys[17] => $this->getAvenid(),
			$keys[18] => $this->getConjun(),
			$keys[19] => $this->getNumero(),
			$keys[20] => $this->getCiudad(),
			$keys[21] => $this->getEstado(),
			$keys[22] => $this->getPais(),
			$keys[23] => $this->getTelefono(),
			$keys[24] => $this->getFax(),
			$keys[25] => $this->getCelular(),
			$keys[26] => $this->getInternet(),
			$keys[27] => $this->getZonpos(),
			$keys[28] => $this->getAccion(),
			$keys[29] => $this->getTipemp(),
			$keys[30] => $this->getCodare(),
			$keys[31] => $this->getTeltrab(),
			$keys[32] => $this->getTipcuen(),
			$keys[33] => $this->getCodofi(),
			$keys[34] => $this->getNumcue(),
			$keys[35] => $this->getFiller(),
			$keys[36] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinctratxtPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecinc($value);
				break;
			case 1:
				$this->setStatus($value);
				break;
			case 2:
				$this->setTipreg($value);
				break;
			case 3:
				$this->setNacemp($value);
				break;
			case 4:
				$this->setCedemp($value);
				break;
			case 5:
				$this->setPriape($value);
				break;
			case 6:
				$this->setSegape($value);
				break;
			case 7:
				$this->setPrinom($value);
				break;
			case 8:
				$this->setSegnom($value);
				break;
			case 9:
				$this->setFecnac($value);
				break;
			case 10:
				$this->setMoning($value);
				break;
			case 11:
				$this->setFecing($value);
				break;
			case 12:
				$this->setActeco($value);
				break;
			case 13:
				$this->setCargo($value);
				break;
			case 14:
				$this->setSexo($value);
				break;
			case 15:
				$this->setEstciv($value);
				break;
			case 16:
				$this->setUrbani($value);
				break;
			case 17:
				$this->setAvenid($value);
				break;
			case 18:
				$this->setConjun($value);
				break;
			case 19:
				$this->setNumero($value);
				break;
			case 20:
				$this->setCiudad($value);
				break;
			case 21:
				$this->setEstado($value);
				break;
			case 22:
				$this->setPais($value);
				break;
			case 23:
				$this->setTelefono($value);
				break;
			case 24:
				$this->setFax($value);
				break;
			case 25:
				$this->setCelular($value);
				break;
			case 26:
				$this->setInternet($value);
				break;
			case 27:
				$this->setZonpos($value);
				break;
			case 28:
				$this->setAccion($value);
				break;
			case 29:
				$this->setTipemp($value);
				break;
			case 30:
				$this->setCodare($value);
				break;
			case 31:
				$this->setTeltrab($value);
				break;
			case 32:
				$this->setTipcuen($value);
				break;
			case 33:
				$this->setCodofi($value);
				break;
			case 34:
				$this->setNumcue($value);
				break;
			case 35:
				$this->setFiller($value);
				break;
			case 36:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinctratxtPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecinc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setStatus($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipreg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNacemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCedemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPriape($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSegape($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPrinom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSegnom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecnac($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMoning($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecing($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setActeco($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCargo($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setSexo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEstciv($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUrbani($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAvenid($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setConjun($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNumero($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCiudad($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setEstado($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setPais($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setTelefono($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFax($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCelular($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setInternet($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setZonpos($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setAccion($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTipemp($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCodare($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setTeltrab($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setTipcuen($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setCodofi($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setNumcue($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setFiller($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setId($arr[$keys[36]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinctratxtPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinctratxtPeer::FECINC)) $criteria->add(NpinctratxtPeer::FECINC, $this->fecinc);
		if ($this->isColumnModified(NpinctratxtPeer::STATUS)) $criteria->add(NpinctratxtPeer::STATUS, $this->status);
		if ($this->isColumnModified(NpinctratxtPeer::TIPREG)) $criteria->add(NpinctratxtPeer::TIPREG, $this->tipreg);
		if ($this->isColumnModified(NpinctratxtPeer::NACEMP)) $criteria->add(NpinctratxtPeer::NACEMP, $this->nacemp);
		if ($this->isColumnModified(NpinctratxtPeer::CEDEMP)) $criteria->add(NpinctratxtPeer::CEDEMP, $this->cedemp);
		if ($this->isColumnModified(NpinctratxtPeer::PRIAPE)) $criteria->add(NpinctratxtPeer::PRIAPE, $this->priape);
		if ($this->isColumnModified(NpinctratxtPeer::SEGAPE)) $criteria->add(NpinctratxtPeer::SEGAPE, $this->segape);
		if ($this->isColumnModified(NpinctratxtPeer::PRINOM)) $criteria->add(NpinctratxtPeer::PRINOM, $this->prinom);
		if ($this->isColumnModified(NpinctratxtPeer::SEGNOM)) $criteria->add(NpinctratxtPeer::SEGNOM, $this->segnom);
		if ($this->isColumnModified(NpinctratxtPeer::FECNAC)) $criteria->add(NpinctratxtPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(NpinctratxtPeer::MONING)) $criteria->add(NpinctratxtPeer::MONING, $this->moning);
		if ($this->isColumnModified(NpinctratxtPeer::FECING)) $criteria->add(NpinctratxtPeer::FECING, $this->fecing);
		if ($this->isColumnModified(NpinctratxtPeer::ACTECO)) $criteria->add(NpinctratxtPeer::ACTECO, $this->acteco);
		if ($this->isColumnModified(NpinctratxtPeer::CARGO)) $criteria->add(NpinctratxtPeer::CARGO, $this->cargo);
		if ($this->isColumnModified(NpinctratxtPeer::SEXO)) $criteria->add(NpinctratxtPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(NpinctratxtPeer::ESTCIV)) $criteria->add(NpinctratxtPeer::ESTCIV, $this->estciv);
		if ($this->isColumnModified(NpinctratxtPeer::URBANI)) $criteria->add(NpinctratxtPeer::URBANI, $this->urbani);
		if ($this->isColumnModified(NpinctratxtPeer::AVENID)) $criteria->add(NpinctratxtPeer::AVENID, $this->avenid);
		if ($this->isColumnModified(NpinctratxtPeer::CONJUN)) $criteria->add(NpinctratxtPeer::CONJUN, $this->conjun);
		if ($this->isColumnModified(NpinctratxtPeer::NUMERO)) $criteria->add(NpinctratxtPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(NpinctratxtPeer::CIUDAD)) $criteria->add(NpinctratxtPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(NpinctratxtPeer::ESTADO)) $criteria->add(NpinctratxtPeer::ESTADO, $this->estado);
		if ($this->isColumnModified(NpinctratxtPeer::PAIS)) $criteria->add(NpinctratxtPeer::PAIS, $this->pais);
		if ($this->isColumnModified(NpinctratxtPeer::TELEFONO)) $criteria->add(NpinctratxtPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(NpinctratxtPeer::FAX)) $criteria->add(NpinctratxtPeer::FAX, $this->fax);
		if ($this->isColumnModified(NpinctratxtPeer::CELULAR)) $criteria->add(NpinctratxtPeer::CELULAR, $this->celular);
		if ($this->isColumnModified(NpinctratxtPeer::INTERNET)) $criteria->add(NpinctratxtPeer::INTERNET, $this->internet);
		if ($this->isColumnModified(NpinctratxtPeer::ZONPOS)) $criteria->add(NpinctratxtPeer::ZONPOS, $this->zonpos);
		if ($this->isColumnModified(NpinctratxtPeer::ACCION)) $criteria->add(NpinctratxtPeer::ACCION, $this->accion);
		if ($this->isColumnModified(NpinctratxtPeer::TIPEMP)) $criteria->add(NpinctratxtPeer::TIPEMP, $this->tipemp);
		if ($this->isColumnModified(NpinctratxtPeer::CODARE)) $criteria->add(NpinctratxtPeer::CODARE, $this->codare);
		if ($this->isColumnModified(NpinctratxtPeer::TELTRAB)) $criteria->add(NpinctratxtPeer::TELTRAB, $this->teltrab);
		if ($this->isColumnModified(NpinctratxtPeer::TIPCUEN)) $criteria->add(NpinctratxtPeer::TIPCUEN, $this->tipcuen);
		if ($this->isColumnModified(NpinctratxtPeer::CODOFI)) $criteria->add(NpinctratxtPeer::CODOFI, $this->codofi);
		if ($this->isColumnModified(NpinctratxtPeer::NUMCUE)) $criteria->add(NpinctratxtPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(NpinctratxtPeer::FILLER)) $criteria->add(NpinctratxtPeer::FILLER, $this->filler);
		if ($this->isColumnModified(NpinctratxtPeer::ID)) $criteria->add(NpinctratxtPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinctratxtPeer::DATABASE_NAME);

		$criteria->add(NpinctratxtPeer::ID, $this->id);

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

		$copyObj->setFecinc($this->fecinc);

		$copyObj->setStatus($this->status);

		$copyObj->setTipreg($this->tipreg);

		$copyObj->setNacemp($this->nacemp);

		$copyObj->setCedemp($this->cedemp);

		$copyObj->setPriape($this->priape);

		$copyObj->setSegape($this->segape);

		$copyObj->setPrinom($this->prinom);

		$copyObj->setSegnom($this->segnom);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setMoning($this->moning);

		$copyObj->setFecing($this->fecing);

		$copyObj->setActeco($this->acteco);

		$copyObj->setCargo($this->cargo);

		$copyObj->setSexo($this->sexo);

		$copyObj->setEstciv($this->estciv);

		$copyObj->setUrbani($this->urbani);

		$copyObj->setAvenid($this->avenid);

		$copyObj->setConjun($this->conjun);

		$copyObj->setNumero($this->numero);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setEstado($this->estado);

		$copyObj->setPais($this->pais);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setFax($this->fax);

		$copyObj->setCelular($this->celular);

		$copyObj->setInternet($this->internet);

		$copyObj->setZonpos($this->zonpos);

		$copyObj->setAccion($this->accion);

		$copyObj->setTipemp($this->tipemp);

		$copyObj->setCodare($this->codare);

		$copyObj->setTeltrab($this->teltrab);

		$copyObj->setTipcuen($this->tipcuen);

		$copyObj->setCodofi($this->codofi);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setFiller($this->filler);


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
			self::$peer = new NpinctratxtPeer();
		}
		return self::$peer;
	}

} 