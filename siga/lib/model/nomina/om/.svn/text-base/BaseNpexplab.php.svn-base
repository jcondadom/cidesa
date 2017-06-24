<?php


abstract class BaseNpexplab extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $codcar;


	
	protected $descar;


	
	protected $fecini;


	
	protected $fecter;


	
	protected $sueobt;


	
	protected $stacar;


	
	protected $compobt;


	
	protected $durexp;


	
	protected $tiporg;


	
	protected $montopres;


	
	protected $codniv;


	
	protected $codnom;


	
	protected $dedica;


	
	protected $status;


	
	protected $estlab;


	
	protected $motegr;


	
	protected $desniv;


	
	protected $pagpre;


	
	protected $observ;


	
	protected $codmotcamcar;


	
	protected $refdoc;


	
	protected $eduuni;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getDescar()
  {

    return trim($this->descar);

  }
  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecter($format = 'Y-m-d')
  {

    if ($this->fecter === null || $this->fecter === '') {
      return null;
    } elseif (!is_int($this->fecter)) {
            $ts = adodb_strtotime($this->fecter);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecter] as date/time value: " . var_export($this->fecter, true));
      }
    } else {
      $ts = $this->fecter;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getSueobt($val=false)
  {

    if($val) return number_format($this->sueobt,2,',','.');
    else return $this->sueobt;

  }
  
  public function getStacar()
  {

    return trim($this->stacar);

  }
  
  public function getCompobt($val=false)
  {

    if($val) return number_format($this->compobt,2,',','.');
    else return $this->compobt;

  }
  
  public function getDurexp()
  {

    return trim($this->durexp);

  }
  
  public function getTiporg()
  {

    return trim($this->tiporg);

  }
  
  public function getMontopres($val=false)
  {

    if($val) return number_format($this->montopres,2,',','.');
    else return $this->montopres;

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getDedica()
  {

    return trim($this->dedica);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getEstlab()
  {

    return trim($this->estlab);

  }
  
  public function getMotegr()
  {

    return trim($this->motegr);

  }
  
  public function getDesniv()
  {

    return trim($this->desniv);

  }
  
  public function getPagpre()
  {

    return trim($this->pagpre);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCodmotcamcar()
  {

    return trim($this->codmotcamcar);

  }
  
  public function getRefdoc()
  {

    return trim($this->refdoc);

  }
  
  public function getEduuni()
  {

    return trim($this->eduuni);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpexplabPeer::CODEMP;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = NpexplabPeer::NOMEMP;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpexplabPeer::CODCAR;
      }
  
	} 
	
	public function setDescar($v)
	{

    if ($this->descar !== $v) {
        $this->descar = $v;
        $this->modifiedColumns[] = NpexplabPeer::DESCAR;
      }
  
	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = NpexplabPeer::FECINI;
    }

	} 
	
	public function setFecter($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecter] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecter !== $ts) {
      $this->fecter = $ts;
      $this->modifiedColumns[] = NpexplabPeer::FECTER;
    }

	} 
	
	public function setSueobt($v)
	{

    if ($this->sueobt !== $v) {
        $this->sueobt = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpexplabPeer::SUEOBT;
      }
  
	} 
	
	public function setStacar($v)
	{

    if ($this->stacar !== $v) {
        $this->stacar = $v;
        $this->modifiedColumns[] = NpexplabPeer::STACAR;
      }
  
	} 
	
	public function setCompobt($v)
	{

    if ($this->compobt !== $v) {
        $this->compobt = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpexplabPeer::COMPOBT;
      }
  
	} 
	
	public function setDurexp($v)
	{

    if ($this->durexp !== $v) {
        $this->durexp = $v;
        $this->modifiedColumns[] = NpexplabPeer::DUREXP;
      }
  
	} 
	
	public function setTiporg($v)
	{

    if ($this->tiporg !== $v) {
        $this->tiporg = $v;
        $this->modifiedColumns[] = NpexplabPeer::TIPORG;
      }
  
	} 
	
	public function setMontopres($v)
	{

    if ($this->montopres !== $v) {
        $this->montopres = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpexplabPeer::MONTOPRES;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = NpexplabPeer::CODNIV;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpexplabPeer::CODNOM;
      }
  
	} 
	
	public function setDedica($v)
	{

    if ($this->dedica !== $v) {
        $this->dedica = $v;
        $this->modifiedColumns[] = NpexplabPeer::DEDICA;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = NpexplabPeer::STATUS;
      }
  
	} 
	
	public function setEstlab($v)
	{

    if ($this->estlab !== $v) {
        $this->estlab = $v;
        $this->modifiedColumns[] = NpexplabPeer::ESTLAB;
      }
  
	} 
	
	public function setMotegr($v)
	{

    if ($this->motegr !== $v) {
        $this->motegr = $v;
        $this->modifiedColumns[] = NpexplabPeer::MOTEGR;
      }
  
	} 
	
	public function setDesniv($v)
	{

    if ($this->desniv !== $v) {
        $this->desniv = $v;
        $this->modifiedColumns[] = NpexplabPeer::DESNIV;
      }
  
	} 
	
	public function setPagpre($v)
	{

    if ($this->pagpre !== $v) {
        $this->pagpre = $v;
        $this->modifiedColumns[] = NpexplabPeer::PAGPRE;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = NpexplabPeer::OBSERV;
      }
  
	} 
	
	public function setCodmotcamcar($v)
	{

    if ($this->codmotcamcar !== $v) {
        $this->codmotcamcar = $v;
        $this->modifiedColumns[] = NpexplabPeer::CODMOTCAMCAR;
      }
  
	} 
	
	public function setRefdoc($v)
	{

    if ($this->refdoc !== $v) {
        $this->refdoc = $v;
        $this->modifiedColumns[] = NpexplabPeer::REFDOC;
      }
  
	} 
	
	public function setEduuni($v)
	{

    if ($this->eduuni !== $v) {
        $this->eduuni = $v;
        $this->modifiedColumns[] = NpexplabPeer::EDUUNI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpexplabPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->nomemp = $rs->getString($startcol + 1);

      $this->codcar = $rs->getString($startcol + 2);

      $this->descar = $rs->getString($startcol + 3);

      $this->fecini = $rs->getDate($startcol + 4, null);

      $this->fecter = $rs->getDate($startcol + 5, null);

      $this->sueobt = $rs->getFloat($startcol + 6);

      $this->stacar = $rs->getString($startcol + 7);

      $this->compobt = $rs->getFloat($startcol + 8);

      $this->durexp = $rs->getString($startcol + 9);

      $this->tiporg = $rs->getString($startcol + 10);

      $this->montopres = $rs->getFloat($startcol + 11);

      $this->codniv = $rs->getString($startcol + 12);

      $this->codnom = $rs->getString($startcol + 13);

      $this->dedica = $rs->getString($startcol + 14);

      $this->status = $rs->getString($startcol + 15);

      $this->estlab = $rs->getString($startcol + 16);

      $this->motegr = $rs->getString($startcol + 17);

      $this->desniv = $rs->getString($startcol + 18);

      $this->pagpre = $rs->getString($startcol + 19);

      $this->observ = $rs->getString($startcol + 20);

      $this->codmotcamcar = $rs->getString($startcol + 21);

      $this->refdoc = $rs->getString($startcol + 22);

      $this->eduuni = $rs->getString($startcol + 23);

      $this->id = $rs->getInt($startcol + 24);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 25; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npexplab object", $e);
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
			$con = Propel::getConnection(NpexplabPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpexplabPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpexplabPeer::DATABASE_NAME);
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
					$pk = NpexplabPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpexplabPeer::doUpdate($this, $con);
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


			if (($retval = NpexplabPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpexplabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNomemp();
				break;
			case 2:
				return $this->getCodcar();
				break;
			case 3:
				return $this->getDescar();
				break;
			case 4:
				return $this->getFecini();
				break;
			case 5:
				return $this->getFecter();
				break;
			case 6:
				return $this->getSueobt();
				break;
			case 7:
				return $this->getStacar();
				break;
			case 8:
				return $this->getCompobt();
				break;
			case 9:
				return $this->getDurexp();
				break;
			case 10:
				return $this->getTiporg();
				break;
			case 11:
				return $this->getMontopres();
				break;
			case 12:
				return $this->getCodniv();
				break;
			case 13:
				return $this->getCodnom();
				break;
			case 14:
				return $this->getDedica();
				break;
			case 15:
				return $this->getStatus();
				break;
			case 16:
				return $this->getEstlab();
				break;
			case 17:
				return $this->getMotegr();
				break;
			case 18:
				return $this->getDesniv();
				break;
			case 19:
				return $this->getPagpre();
				break;
			case 20:
				return $this->getObserv();
				break;
			case 21:
				return $this->getCodmotcamcar();
				break;
			case 22:
				return $this->getRefdoc();
				break;
			case 23:
				return $this->getEduuni();
				break;
			case 24:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpexplabPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNomemp(),
			$keys[2] => $this->getCodcar(),
			$keys[3] => $this->getDescar(),
			$keys[4] => $this->getFecini(),
			$keys[5] => $this->getFecter(),
			$keys[6] => $this->getSueobt(),
			$keys[7] => $this->getStacar(),
			$keys[8] => $this->getCompobt(),
			$keys[9] => $this->getDurexp(),
			$keys[10] => $this->getTiporg(),
			$keys[11] => $this->getMontopres(),
			$keys[12] => $this->getCodniv(),
			$keys[13] => $this->getCodnom(),
			$keys[14] => $this->getDedica(),
			$keys[15] => $this->getStatus(),
			$keys[16] => $this->getEstlab(),
			$keys[17] => $this->getMotegr(),
			$keys[18] => $this->getDesniv(),
			$keys[19] => $this->getPagpre(),
			$keys[20] => $this->getObserv(),
			$keys[21] => $this->getCodmotcamcar(),
			$keys[22] => $this->getRefdoc(),
			$keys[23] => $this->getEduuni(),
			$keys[24] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpexplabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNomemp($value);
				break;
			case 2:
				$this->setCodcar($value);
				break;
			case 3:
				$this->setDescar($value);
				break;
			case 4:
				$this->setFecini($value);
				break;
			case 5:
				$this->setFecter($value);
				break;
			case 6:
				$this->setSueobt($value);
				break;
			case 7:
				$this->setStacar($value);
				break;
			case 8:
				$this->setCompobt($value);
				break;
			case 9:
				$this->setDurexp($value);
				break;
			case 10:
				$this->setTiporg($value);
				break;
			case 11:
				$this->setMontopres($value);
				break;
			case 12:
				$this->setCodniv($value);
				break;
			case 13:
				$this->setCodnom($value);
				break;
			case 14:
				$this->setDedica($value);
				break;
			case 15:
				$this->setStatus($value);
				break;
			case 16:
				$this->setEstlab($value);
				break;
			case 17:
				$this->setMotegr($value);
				break;
			case 18:
				$this->setDesniv($value);
				break;
			case 19:
				$this->setPagpre($value);
				break;
			case 20:
				$this->setObserv($value);
				break;
			case 21:
				$this->setCodmotcamcar($value);
				break;
			case 22:
				$this->setRefdoc($value);
				break;
			case 23:
				$this->setEduuni($value);
				break;
			case 24:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpexplabPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecini($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecter($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSueobt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStacar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCompobt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDurexp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTiporg($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMontopres($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodniv($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodnom($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDedica($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setStatus($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEstlab($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setMotegr($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDesniv($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setPagpre($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setObserv($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodmotcamcar($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setRefdoc($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setEduuni($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setId($arr[$keys[24]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpexplabPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpexplabPeer::CODEMP)) $criteria->add(NpexplabPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpexplabPeer::NOMEMP)) $criteria->add(NpexplabPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(NpexplabPeer::CODCAR)) $criteria->add(NpexplabPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpexplabPeer::DESCAR)) $criteria->add(NpexplabPeer::DESCAR, $this->descar);
		if ($this->isColumnModified(NpexplabPeer::FECINI)) $criteria->add(NpexplabPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpexplabPeer::FECTER)) $criteria->add(NpexplabPeer::FECTER, $this->fecter);
		if ($this->isColumnModified(NpexplabPeer::SUEOBT)) $criteria->add(NpexplabPeer::SUEOBT, $this->sueobt);
		if ($this->isColumnModified(NpexplabPeer::STACAR)) $criteria->add(NpexplabPeer::STACAR, $this->stacar);
		if ($this->isColumnModified(NpexplabPeer::COMPOBT)) $criteria->add(NpexplabPeer::COMPOBT, $this->compobt);
		if ($this->isColumnModified(NpexplabPeer::DUREXP)) $criteria->add(NpexplabPeer::DUREXP, $this->durexp);
		if ($this->isColumnModified(NpexplabPeer::TIPORG)) $criteria->add(NpexplabPeer::TIPORG, $this->tiporg);
		if ($this->isColumnModified(NpexplabPeer::MONTOPRES)) $criteria->add(NpexplabPeer::MONTOPRES, $this->montopres);
		if ($this->isColumnModified(NpexplabPeer::CODNIV)) $criteria->add(NpexplabPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(NpexplabPeer::CODNOM)) $criteria->add(NpexplabPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpexplabPeer::DEDICA)) $criteria->add(NpexplabPeer::DEDICA, $this->dedica);
		if ($this->isColumnModified(NpexplabPeer::STATUS)) $criteria->add(NpexplabPeer::STATUS, $this->status);
		if ($this->isColumnModified(NpexplabPeer::ESTLAB)) $criteria->add(NpexplabPeer::ESTLAB, $this->estlab);
		if ($this->isColumnModified(NpexplabPeer::MOTEGR)) $criteria->add(NpexplabPeer::MOTEGR, $this->motegr);
		if ($this->isColumnModified(NpexplabPeer::DESNIV)) $criteria->add(NpexplabPeer::DESNIV, $this->desniv);
		if ($this->isColumnModified(NpexplabPeer::PAGPRE)) $criteria->add(NpexplabPeer::PAGPRE, $this->pagpre);
		if ($this->isColumnModified(NpexplabPeer::OBSERV)) $criteria->add(NpexplabPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(NpexplabPeer::CODMOTCAMCAR)) $criteria->add(NpexplabPeer::CODMOTCAMCAR, $this->codmotcamcar);
		if ($this->isColumnModified(NpexplabPeer::REFDOC)) $criteria->add(NpexplabPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(NpexplabPeer::EDUUNI)) $criteria->add(NpexplabPeer::EDUUNI, $this->eduuni);
		if ($this->isColumnModified(NpexplabPeer::ID)) $criteria->add(NpexplabPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpexplabPeer::DATABASE_NAME);

		$criteria->add(NpexplabPeer::ID, $this->id);

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

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setDescar($this->descar);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecter($this->fecter);

		$copyObj->setSueobt($this->sueobt);

		$copyObj->setStacar($this->stacar);

		$copyObj->setCompobt($this->compobt);

		$copyObj->setDurexp($this->durexp);

		$copyObj->setTiporg($this->tiporg);

		$copyObj->setMontopres($this->montopres);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setDedica($this->dedica);

		$copyObj->setStatus($this->status);

		$copyObj->setEstlab($this->estlab);

		$copyObj->setMotegr($this->motegr);

		$copyObj->setDesniv($this->desniv);

		$copyObj->setPagpre($this->pagpre);

		$copyObj->setObserv($this->observ);

		$copyObj->setCodmotcamcar($this->codmotcamcar);

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setEduuni($this->eduuni);


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
			self::$peer = new NpexplabPeer();
		}
		return self::$peer;
	}

} 