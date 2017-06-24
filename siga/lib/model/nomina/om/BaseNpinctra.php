<?php


abstract class BaseNpinctra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tipreg;


	
	protected $codpro;


	
	protected $rifemp;


	
	protected $nomemp;


	
	protected $urbani;


	
	protected $avenid;


	
	protected $conjun;


	
	protected $numero;


	
	protected $ciudad;


	
	protected $estado;


	
	protected $pais;


	
	protected $telefono;


	
	protected $fax;


	
	protected $internet;


	
	protected $frenomobr;


	
	protected $facingobr;


	
	protected $frenomemp;


	
	protected $facingemp;


	
	protected $frenomeje;


	
	protected $facingeje;


	
	protected $frenomcon;


	
	protected $facingcon;


	
	protected $tipcuen;


	
	protected $numcue;


	
	protected $zonpos;


	
	protected $filler;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTipreg()
  {

    return trim($this->tipreg);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getRifemp()
  {

    return trim($this->rifemp);

  }
  
  public function getNomemp()
  {

    return trim($this->nomemp);

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
  
  public function getInternet()
  {

    return trim($this->internet);

  }
  
  public function getFrenomobr()
  {

    return trim($this->frenomobr);

  }
  
  public function getFacingobr()
  {

    return trim($this->facingobr);

  }
  
  public function getFrenomemp()
  {

    return trim($this->frenomemp);

  }
  
  public function getFacingemp()
  {

    return trim($this->facingemp);

  }
  
  public function getFrenomeje()
  {

    return trim($this->frenomeje);

  }
  
  public function getFacingeje()
  {

    return trim($this->facingeje);

  }
  
  public function getFrenomcon()
  {

    return trim($this->frenomcon);

  }
  
  public function getFacingcon()
  {

    return trim($this->facingcon);

  }
  
  public function getTipcuen()
  {

    return trim($this->tipcuen);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getZonpos()
  {

    return trim($this->zonpos);

  }
  
  public function getFiller()
  {

    return trim($this->filler);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTipreg($v)
	{

    if ($this->tipreg !== $v) {
        $this->tipreg = $v;
        $this->modifiedColumns[] = NpinctraPeer::TIPREG;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = NpinctraPeer::CODPRO;
      }
  
	} 
	
	public function setRifemp($v)
	{

    if ($this->rifemp !== $v) {
        $this->rifemp = $v;
        $this->modifiedColumns[] = NpinctraPeer::RIFEMP;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = NpinctraPeer::NOMEMP;
      }
  
	} 
	
	public function setUrbani($v)
	{

    if ($this->urbani !== $v) {
        $this->urbani = $v;
        $this->modifiedColumns[] = NpinctraPeer::URBANI;
      }
  
	} 
	
	public function setAvenid($v)
	{

    if ($this->avenid !== $v) {
        $this->avenid = $v;
        $this->modifiedColumns[] = NpinctraPeer::AVENID;
      }
  
	} 
	
	public function setConjun($v)
	{

    if ($this->conjun !== $v) {
        $this->conjun = $v;
        $this->modifiedColumns[] = NpinctraPeer::CONJUN;
      }
  
	} 
	
	public function setNumero($v)
	{

    if ($this->numero !== $v) {
        $this->numero = $v;
        $this->modifiedColumns[] = NpinctraPeer::NUMERO;
      }
  
	} 
	
	public function setCiudad($v)
	{

    if ($this->ciudad !== $v) {
        $this->ciudad = $v;
        $this->modifiedColumns[] = NpinctraPeer::CIUDAD;
      }
  
	} 
	
	public function setEstado($v)
	{

    if ($this->estado !== $v) {
        $this->estado = $v;
        $this->modifiedColumns[] = NpinctraPeer::ESTADO;
      }
  
	} 
	
	public function setPais($v)
	{

    if ($this->pais !== $v) {
        $this->pais = $v;
        $this->modifiedColumns[] = NpinctraPeer::PAIS;
      }
  
	} 
	
	public function setTelefono($v)
	{

    if ($this->telefono !== $v) {
        $this->telefono = $v;
        $this->modifiedColumns[] = NpinctraPeer::TELEFONO;
      }
  
	} 
	
	public function setFax($v)
	{

    if ($this->fax !== $v) {
        $this->fax = $v;
        $this->modifiedColumns[] = NpinctraPeer::FAX;
      }
  
	} 
	
	public function setInternet($v)
	{

    if ($this->internet !== $v) {
        $this->internet = $v;
        $this->modifiedColumns[] = NpinctraPeer::INTERNET;
      }
  
	} 
	
	public function setFrenomobr($v)
	{

    if ($this->frenomobr !== $v) {
        $this->frenomobr = $v;
        $this->modifiedColumns[] = NpinctraPeer::FRENOMOBR;
      }
  
	} 
	
	public function setFacingobr($v)
	{

    if ($this->facingobr !== $v) {
        $this->facingobr = $v;
        $this->modifiedColumns[] = NpinctraPeer::FACINGOBR;
      }
  
	} 
	
	public function setFrenomemp($v)
	{

    if ($this->frenomemp !== $v) {
        $this->frenomemp = $v;
        $this->modifiedColumns[] = NpinctraPeer::FRENOMEMP;
      }
  
	} 
	
	public function setFacingemp($v)
	{

    if ($this->facingemp !== $v) {
        $this->facingemp = $v;
        $this->modifiedColumns[] = NpinctraPeer::FACINGEMP;
      }
  
	} 
	
	public function setFrenomeje($v)
	{

    if ($this->frenomeje !== $v) {
        $this->frenomeje = $v;
        $this->modifiedColumns[] = NpinctraPeer::FRENOMEJE;
      }
  
	} 
	
	public function setFacingeje($v)
	{

    if ($this->facingeje !== $v) {
        $this->facingeje = $v;
        $this->modifiedColumns[] = NpinctraPeer::FACINGEJE;
      }
  
	} 
	
	public function setFrenomcon($v)
	{

    if ($this->frenomcon !== $v) {
        $this->frenomcon = $v;
        $this->modifiedColumns[] = NpinctraPeer::FRENOMCON;
      }
  
	} 
	
	public function setFacingcon($v)
	{

    if ($this->facingcon !== $v) {
        $this->facingcon = $v;
        $this->modifiedColumns[] = NpinctraPeer::FACINGCON;
      }
  
	} 
	
	public function setTipcuen($v)
	{

    if ($this->tipcuen !== $v) {
        $this->tipcuen = $v;
        $this->modifiedColumns[] = NpinctraPeer::TIPCUEN;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = NpinctraPeer::NUMCUE;
      }
  
	} 
	
	public function setZonpos($v)
	{

    if ($this->zonpos !== $v) {
        $this->zonpos = $v;
        $this->modifiedColumns[] = NpinctraPeer::ZONPOS;
      }
  
	} 
	
	public function setFiller($v)
	{

    if ($this->filler !== $v) {
        $this->filler = $v;
        $this->modifiedColumns[] = NpinctraPeer::FILLER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinctraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tipreg = $rs->getString($startcol + 0);

      $this->codpro = $rs->getString($startcol + 1);

      $this->rifemp = $rs->getString($startcol + 2);

      $this->nomemp = $rs->getString($startcol + 3);

      $this->urbani = $rs->getString($startcol + 4);

      $this->avenid = $rs->getString($startcol + 5);

      $this->conjun = $rs->getString($startcol + 6);

      $this->numero = $rs->getString($startcol + 7);

      $this->ciudad = $rs->getString($startcol + 8);

      $this->estado = $rs->getString($startcol + 9);

      $this->pais = $rs->getString($startcol + 10);

      $this->telefono = $rs->getString($startcol + 11);

      $this->fax = $rs->getString($startcol + 12);

      $this->internet = $rs->getString($startcol + 13);

      $this->frenomobr = $rs->getString($startcol + 14);

      $this->facingobr = $rs->getString($startcol + 15);

      $this->frenomemp = $rs->getString($startcol + 16);

      $this->facingemp = $rs->getString($startcol + 17);

      $this->frenomeje = $rs->getString($startcol + 18);

      $this->facingeje = $rs->getString($startcol + 19);

      $this->frenomcon = $rs->getString($startcol + 20);

      $this->facingcon = $rs->getString($startcol + 21);

      $this->tipcuen = $rs->getString($startcol + 22);

      $this->numcue = $rs->getString($startcol + 23);

      $this->zonpos = $rs->getString($startcol + 24);

      $this->filler = $rs->getString($startcol + 25);

      $this->id = $rs->getInt($startcol + 26);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 27; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinctra object", $e);
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
			$con = Propel::getConnection(NpinctraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinctraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinctraPeer::DATABASE_NAME);
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
					$pk = NpinctraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinctraPeer::doUpdate($this, $con);
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


			if (($retval = NpinctraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinctraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTipreg();
				break;
			case 1:
				return $this->getCodpro();
				break;
			case 2:
				return $this->getRifemp();
				break;
			case 3:
				return $this->getNomemp();
				break;
			case 4:
				return $this->getUrbani();
				break;
			case 5:
				return $this->getAvenid();
				break;
			case 6:
				return $this->getConjun();
				break;
			case 7:
				return $this->getNumero();
				break;
			case 8:
				return $this->getCiudad();
				break;
			case 9:
				return $this->getEstado();
				break;
			case 10:
				return $this->getPais();
				break;
			case 11:
				return $this->getTelefono();
				break;
			case 12:
				return $this->getFax();
				break;
			case 13:
				return $this->getInternet();
				break;
			case 14:
				return $this->getFrenomobr();
				break;
			case 15:
				return $this->getFacingobr();
				break;
			case 16:
				return $this->getFrenomemp();
				break;
			case 17:
				return $this->getFacingemp();
				break;
			case 18:
				return $this->getFrenomeje();
				break;
			case 19:
				return $this->getFacingeje();
				break;
			case 20:
				return $this->getFrenomcon();
				break;
			case 21:
				return $this->getFacingcon();
				break;
			case 22:
				return $this->getTipcuen();
				break;
			case 23:
				return $this->getNumcue();
				break;
			case 24:
				return $this->getZonpos();
				break;
			case 25:
				return $this->getFiller();
				break;
			case 26:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinctraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTipreg(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getRifemp(),
			$keys[3] => $this->getNomemp(),
			$keys[4] => $this->getUrbani(),
			$keys[5] => $this->getAvenid(),
			$keys[6] => $this->getConjun(),
			$keys[7] => $this->getNumero(),
			$keys[8] => $this->getCiudad(),
			$keys[9] => $this->getEstado(),
			$keys[10] => $this->getPais(),
			$keys[11] => $this->getTelefono(),
			$keys[12] => $this->getFax(),
			$keys[13] => $this->getInternet(),
			$keys[14] => $this->getFrenomobr(),
			$keys[15] => $this->getFacingobr(),
			$keys[16] => $this->getFrenomemp(),
			$keys[17] => $this->getFacingemp(),
			$keys[18] => $this->getFrenomeje(),
			$keys[19] => $this->getFacingeje(),
			$keys[20] => $this->getFrenomcon(),
			$keys[21] => $this->getFacingcon(),
			$keys[22] => $this->getTipcuen(),
			$keys[23] => $this->getNumcue(),
			$keys[24] => $this->getZonpos(),
			$keys[25] => $this->getFiller(),
			$keys[26] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinctraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTipreg($value);
				break;
			case 1:
				$this->setCodpro($value);
				break;
			case 2:
				$this->setRifemp($value);
				break;
			case 3:
				$this->setNomemp($value);
				break;
			case 4:
				$this->setUrbani($value);
				break;
			case 5:
				$this->setAvenid($value);
				break;
			case 6:
				$this->setConjun($value);
				break;
			case 7:
				$this->setNumero($value);
				break;
			case 8:
				$this->setCiudad($value);
				break;
			case 9:
				$this->setEstado($value);
				break;
			case 10:
				$this->setPais($value);
				break;
			case 11:
				$this->setTelefono($value);
				break;
			case 12:
				$this->setFax($value);
				break;
			case 13:
				$this->setInternet($value);
				break;
			case 14:
				$this->setFrenomobr($value);
				break;
			case 15:
				$this->setFacingobr($value);
				break;
			case 16:
				$this->setFrenomemp($value);
				break;
			case 17:
				$this->setFacingemp($value);
				break;
			case 18:
				$this->setFrenomeje($value);
				break;
			case 19:
				$this->setFacingeje($value);
				break;
			case 20:
				$this->setFrenomcon($value);
				break;
			case 21:
				$this->setFacingcon($value);
				break;
			case 22:
				$this->setTipcuen($value);
				break;
			case 23:
				$this->setNumcue($value);
				break;
			case 24:
				$this->setZonpos($value);
				break;
			case 25:
				$this->setFiller($value);
				break;
			case 26:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinctraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTipreg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUrbani($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAvenid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setConjun($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumero($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCiudad($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEstado($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPais($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTelefono($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFax($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setInternet($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFrenomobr($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFacingobr($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFrenomemp($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFacingemp($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFrenomeje($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFacingeje($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFrenomcon($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFacingcon($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTipcuen($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setNumcue($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setZonpos($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFiller($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setId($arr[$keys[26]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinctraPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinctraPeer::TIPREG)) $criteria->add(NpinctraPeer::TIPREG, $this->tipreg);
		if ($this->isColumnModified(NpinctraPeer::CODPRO)) $criteria->add(NpinctraPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(NpinctraPeer::RIFEMP)) $criteria->add(NpinctraPeer::RIFEMP, $this->rifemp);
		if ($this->isColumnModified(NpinctraPeer::NOMEMP)) $criteria->add(NpinctraPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(NpinctraPeer::URBANI)) $criteria->add(NpinctraPeer::URBANI, $this->urbani);
		if ($this->isColumnModified(NpinctraPeer::AVENID)) $criteria->add(NpinctraPeer::AVENID, $this->avenid);
		if ($this->isColumnModified(NpinctraPeer::CONJUN)) $criteria->add(NpinctraPeer::CONJUN, $this->conjun);
		if ($this->isColumnModified(NpinctraPeer::NUMERO)) $criteria->add(NpinctraPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(NpinctraPeer::CIUDAD)) $criteria->add(NpinctraPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(NpinctraPeer::ESTADO)) $criteria->add(NpinctraPeer::ESTADO, $this->estado);
		if ($this->isColumnModified(NpinctraPeer::PAIS)) $criteria->add(NpinctraPeer::PAIS, $this->pais);
		if ($this->isColumnModified(NpinctraPeer::TELEFONO)) $criteria->add(NpinctraPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(NpinctraPeer::FAX)) $criteria->add(NpinctraPeer::FAX, $this->fax);
		if ($this->isColumnModified(NpinctraPeer::INTERNET)) $criteria->add(NpinctraPeer::INTERNET, $this->internet);
		if ($this->isColumnModified(NpinctraPeer::FRENOMOBR)) $criteria->add(NpinctraPeer::FRENOMOBR, $this->frenomobr);
		if ($this->isColumnModified(NpinctraPeer::FACINGOBR)) $criteria->add(NpinctraPeer::FACINGOBR, $this->facingobr);
		if ($this->isColumnModified(NpinctraPeer::FRENOMEMP)) $criteria->add(NpinctraPeer::FRENOMEMP, $this->frenomemp);
		if ($this->isColumnModified(NpinctraPeer::FACINGEMP)) $criteria->add(NpinctraPeer::FACINGEMP, $this->facingemp);
		if ($this->isColumnModified(NpinctraPeer::FRENOMEJE)) $criteria->add(NpinctraPeer::FRENOMEJE, $this->frenomeje);
		if ($this->isColumnModified(NpinctraPeer::FACINGEJE)) $criteria->add(NpinctraPeer::FACINGEJE, $this->facingeje);
		if ($this->isColumnModified(NpinctraPeer::FRENOMCON)) $criteria->add(NpinctraPeer::FRENOMCON, $this->frenomcon);
		if ($this->isColumnModified(NpinctraPeer::FACINGCON)) $criteria->add(NpinctraPeer::FACINGCON, $this->facingcon);
		if ($this->isColumnModified(NpinctraPeer::TIPCUEN)) $criteria->add(NpinctraPeer::TIPCUEN, $this->tipcuen);
		if ($this->isColumnModified(NpinctraPeer::NUMCUE)) $criteria->add(NpinctraPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(NpinctraPeer::ZONPOS)) $criteria->add(NpinctraPeer::ZONPOS, $this->zonpos);
		if ($this->isColumnModified(NpinctraPeer::FILLER)) $criteria->add(NpinctraPeer::FILLER, $this->filler);
		if ($this->isColumnModified(NpinctraPeer::ID)) $criteria->add(NpinctraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinctraPeer::DATABASE_NAME);

		$criteria->add(NpinctraPeer::ID, $this->id);

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

		$copyObj->setTipreg($this->tipreg);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setRifemp($this->rifemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setUrbani($this->urbani);

		$copyObj->setAvenid($this->avenid);

		$copyObj->setConjun($this->conjun);

		$copyObj->setNumero($this->numero);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setEstado($this->estado);

		$copyObj->setPais($this->pais);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setFax($this->fax);

		$copyObj->setInternet($this->internet);

		$copyObj->setFrenomobr($this->frenomobr);

		$copyObj->setFacingobr($this->facingobr);

		$copyObj->setFrenomemp($this->frenomemp);

		$copyObj->setFacingemp($this->facingemp);

		$copyObj->setFrenomeje($this->frenomeje);

		$copyObj->setFacingeje($this->facingeje);

		$copyObj->setFrenomcon($this->frenomcon);

		$copyObj->setFacingcon($this->facingcon);

		$copyObj->setTipcuen($this->tipcuen);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setZonpos($this->zonpos);

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
			self::$peer = new NpinctraPeer();
		}
		return self::$peer;
	}

} 