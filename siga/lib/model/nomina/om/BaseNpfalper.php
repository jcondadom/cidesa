<?php


abstract class BaseNpfalper extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codmot;


	
	protected $codnom;


	
	protected $nrodia;


	
	protected $observ;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $nrohoras;


	
	protected $numctr;


	
	protected $hordes;


	
	protected $horhas;


	
	protected $tipsal;


	
	protected $tipper;


	
	protected $nomsup;


	
	protected $monsup;


	
	protected $medexp;


	
	protected $espmed;


	
	protected $fecinc;


	
	protected $cenate;


	
	protected $tipdoc;


	
	protected $diarep;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodmot()
  {

    return trim($this->codmot);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getNrodia($val=false)
  {

    if($val) return number_format($this->nrodia,2,',','.');
    else return $this->nrodia;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getFecdes($format = 'Y-m-d')
  {

    if ($this->fecdes === null || $this->fecdes === '') {
      return null;
    } elseif (!is_int($this->fecdes)) {
            $ts = adodb_strtotime($this->fecdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
      }
    } else {
      $ts = $this->fecdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechas($format = 'Y-m-d')
  {

    if ($this->fechas === null || $this->fechas === '') {
      return null;
    } elseif (!is_int($this->fechas)) {
            $ts = adodb_strtotime($this->fechas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechas] as date/time value: " . var_export($this->fechas, true));
      }
    } else {
      $ts = $this->fechas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNrohoras($val=false)
  {

    if($val) return number_format($this->nrohoras,2,',','.');
    else return $this->nrohoras;

  }
  
  public function getNumctr()
  {

    return trim($this->numctr);

  }
  
  public function getHordes()
  {

    return trim($this->hordes);

  }
  
  public function getHorhas()
  {

    return trim($this->horhas);

  }
  
  public function getTipsal()
  {

    return trim($this->tipsal);

  }
  
  public function getTipper()
  {

    return trim($this->tipper);

  }
  
  public function getNomsup()
  {

    return trim($this->nomsup);

  }
  
  public function getMonsup($val=false)
  {

    if($val) return number_format($this->monsup,2,',','.');
    else return $this->monsup;

  }
  
  public function getMedexp()
  {

    return trim($this->medexp);

  }
  
  public function getEspmed()
  {

    return trim($this->espmed);

  }
  
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

  
  public function getCenate()
  {

    return trim($this->cenate);

  }
  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getDiarep()
  {

    return trim($this->diarep);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpfalperPeer::CODEMP;
      }
  
	} 
	
	public function setCodmot($v)
	{

    if ($this->codmot !== $v) {
        $this->codmot = $v;
        $this->modifiedColumns[] = NpfalperPeer::CODMOT;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpfalperPeer::CODNOM;
      }
  
	} 
	
	public function setNrodia($v)
	{

    if ($this->nrodia !== $v) {
        $this->nrodia = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpfalperPeer::NRODIA;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = NpfalperPeer::OBSERV;
      }
  
	} 
	
	public function setFecdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = NpfalperPeer::FECDES;
    }

	} 
	
	public function setFechas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechas !== $ts) {
      $this->fechas = $ts;
      $this->modifiedColumns[] = NpfalperPeer::FECHAS;
    }

	} 
	
	public function setNrohoras($v)
	{

    if ($this->nrohoras !== $v) {
        $this->nrohoras = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpfalperPeer::NROHORAS;
      }
  
	} 
	
	public function setNumctr($v)
	{

    if ($this->numctr !== $v) {
        $this->numctr = $v;
        $this->modifiedColumns[] = NpfalperPeer::NUMCTR;
      }
  
	} 
	
	public function setHordes($v)
	{

    if ($this->hordes !== $v) {
        $this->hordes = $v;
        $this->modifiedColumns[] = NpfalperPeer::HORDES;
      }
  
	} 
	
	public function setHorhas($v)
	{

    if ($this->horhas !== $v) {
        $this->horhas = $v;
        $this->modifiedColumns[] = NpfalperPeer::HORHAS;
      }
  
	} 
	
	public function setTipsal($v)
	{

    if ($this->tipsal !== $v) {
        $this->tipsal = $v;
        $this->modifiedColumns[] = NpfalperPeer::TIPSAL;
      }
  
	} 
	
	public function setTipper($v)
	{

    if ($this->tipper !== $v) {
        $this->tipper = $v;
        $this->modifiedColumns[] = NpfalperPeer::TIPPER;
      }
  
	} 
	
	public function setNomsup($v)
	{

    if ($this->nomsup !== $v) {
        $this->nomsup = $v;
        $this->modifiedColumns[] = NpfalperPeer::NOMSUP;
      }
  
	} 
	
	public function setMonsup($v)
	{

    if ($this->monsup !== $v) {
        $this->monsup = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpfalperPeer::MONSUP;
      }
  
	} 
	
	public function setMedexp($v)
	{

    if ($this->medexp !== $v) {
        $this->medexp = $v;
        $this->modifiedColumns[] = NpfalperPeer::MEDEXP;
      }
  
	} 
	
	public function setEspmed($v)
	{

    if ($this->espmed !== $v) {
        $this->espmed = $v;
        $this->modifiedColumns[] = NpfalperPeer::ESPMED;
      }
  
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
      $this->modifiedColumns[] = NpfalperPeer::FECINC;
    }

	} 
	
	public function setCenate($v)
	{

    if ($this->cenate !== $v) {
        $this->cenate = $v;
        $this->modifiedColumns[] = NpfalperPeer::CENATE;
      }
  
	} 
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = NpfalperPeer::TIPDOC;
      }
  
	} 
	
	public function setDiarep($v)
	{

    if ($this->diarep !== $v) {
        $this->diarep = $v;
        $this->modifiedColumns[] = NpfalperPeer::DIAREP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpfalperPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->codmot = $rs->getString($startcol + 1);

      $this->codnom = $rs->getString($startcol + 2);

      $this->nrodia = $rs->getFloat($startcol + 3);

      $this->observ = $rs->getString($startcol + 4);

      $this->fecdes = $rs->getDate($startcol + 5, null);

      $this->fechas = $rs->getDate($startcol + 6, null);

      $this->nrohoras = $rs->getFloat($startcol + 7);

      $this->numctr = $rs->getString($startcol + 8);

      $this->hordes = $rs->getString($startcol + 9);

      $this->horhas = $rs->getString($startcol + 10);

      $this->tipsal = $rs->getString($startcol + 11);

      $this->tipper = $rs->getString($startcol + 12);

      $this->nomsup = $rs->getString($startcol + 13);

      $this->monsup = $rs->getFloat($startcol + 14);

      $this->medexp = $rs->getString($startcol + 15);

      $this->espmed = $rs->getString($startcol + 16);

      $this->fecinc = $rs->getDate($startcol + 17, null);

      $this->cenate = $rs->getString($startcol + 18);

      $this->tipdoc = $rs->getString($startcol + 19);

      $this->diarep = $rs->getString($startcol + 20);

      $this->id = $rs->getInt($startcol + 21);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 22; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npfalper object", $e);
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
			$con = Propel::getConnection(NpfalperPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpfalperPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpfalperPeer::DATABASE_NAME);
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
					$pk = NpfalperPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpfalperPeer::doUpdate($this, $con);
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


			if (($retval = NpfalperPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpfalperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodmot();
				break;
			case 2:
				return $this->getCodnom();
				break;
			case 3:
				return $this->getNrodia();
				break;
			case 4:
				return $this->getObserv();
				break;
			case 5:
				return $this->getFecdes();
				break;
			case 6:
				return $this->getFechas();
				break;
			case 7:
				return $this->getNrohoras();
				break;
			case 8:
				return $this->getNumctr();
				break;
			case 9:
				return $this->getHordes();
				break;
			case 10:
				return $this->getHorhas();
				break;
			case 11:
				return $this->getTipsal();
				break;
			case 12:
				return $this->getTipper();
				break;
			case 13:
				return $this->getNomsup();
				break;
			case 14:
				return $this->getMonsup();
				break;
			case 15:
				return $this->getMedexp();
				break;
			case 16:
				return $this->getEspmed();
				break;
			case 17:
				return $this->getFecinc();
				break;
			case 18:
				return $this->getCenate();
				break;
			case 19:
				return $this->getTipdoc();
				break;
			case 20:
				return $this->getDiarep();
				break;
			case 21:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpfalperPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodmot(),
			$keys[2] => $this->getCodnom(),
			$keys[3] => $this->getNrodia(),
			$keys[4] => $this->getObserv(),
			$keys[5] => $this->getFecdes(),
			$keys[6] => $this->getFechas(),
			$keys[7] => $this->getNrohoras(),
			$keys[8] => $this->getNumctr(),
			$keys[9] => $this->getHordes(),
			$keys[10] => $this->getHorhas(),
			$keys[11] => $this->getTipsal(),
			$keys[12] => $this->getTipper(),
			$keys[13] => $this->getNomsup(),
			$keys[14] => $this->getMonsup(),
			$keys[15] => $this->getMedexp(),
			$keys[16] => $this->getEspmed(),
			$keys[17] => $this->getFecinc(),
			$keys[18] => $this->getCenate(),
			$keys[19] => $this->getTipdoc(),
			$keys[20] => $this->getDiarep(),
			$keys[21] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpfalperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodmot($value);
				break;
			case 2:
				$this->setCodnom($value);
				break;
			case 3:
				$this->setNrodia($value);
				break;
			case 4:
				$this->setObserv($value);
				break;
			case 5:
				$this->setFecdes($value);
				break;
			case 6:
				$this->setFechas($value);
				break;
			case 7:
				$this->setNrohoras($value);
				break;
			case 8:
				$this->setNumctr($value);
				break;
			case 9:
				$this->setHordes($value);
				break;
			case 10:
				$this->setHorhas($value);
				break;
			case 11:
				$this->setTipsal($value);
				break;
			case 12:
				$this->setTipper($value);
				break;
			case 13:
				$this->setNomsup($value);
				break;
			case 14:
				$this->setMonsup($value);
				break;
			case 15:
				$this->setMedexp($value);
				break;
			case 16:
				$this->setEspmed($value);
				break;
			case 17:
				$this->setFecinc($value);
				break;
			case 18:
				$this->setCenate($value);
				break;
			case 19:
				$this->setTipdoc($value);
				break;
			case 20:
				$this->setDiarep($value);
				break;
			case 21:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpfalperPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodnom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNrodia($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObserv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecdes($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechas($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNrohoras($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumctr($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setHordes($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setHorhas($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipsal($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTipper($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNomsup($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMonsup($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMedexp($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEspmed($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecinc($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCenate($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setTipdoc($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDiarep($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setId($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpfalperPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpfalperPeer::CODEMP)) $criteria->add(NpfalperPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpfalperPeer::CODMOT)) $criteria->add(NpfalperPeer::CODMOT, $this->codmot);
		if ($this->isColumnModified(NpfalperPeer::CODNOM)) $criteria->add(NpfalperPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpfalperPeer::NRODIA)) $criteria->add(NpfalperPeer::NRODIA, $this->nrodia);
		if ($this->isColumnModified(NpfalperPeer::OBSERV)) $criteria->add(NpfalperPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(NpfalperPeer::FECDES)) $criteria->add(NpfalperPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(NpfalperPeer::FECHAS)) $criteria->add(NpfalperPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(NpfalperPeer::NROHORAS)) $criteria->add(NpfalperPeer::NROHORAS, $this->nrohoras);
		if ($this->isColumnModified(NpfalperPeer::NUMCTR)) $criteria->add(NpfalperPeer::NUMCTR, $this->numctr);
		if ($this->isColumnModified(NpfalperPeer::HORDES)) $criteria->add(NpfalperPeer::HORDES, $this->hordes);
		if ($this->isColumnModified(NpfalperPeer::HORHAS)) $criteria->add(NpfalperPeer::HORHAS, $this->horhas);
		if ($this->isColumnModified(NpfalperPeer::TIPSAL)) $criteria->add(NpfalperPeer::TIPSAL, $this->tipsal);
		if ($this->isColumnModified(NpfalperPeer::TIPPER)) $criteria->add(NpfalperPeer::TIPPER, $this->tipper);
		if ($this->isColumnModified(NpfalperPeer::NOMSUP)) $criteria->add(NpfalperPeer::NOMSUP, $this->nomsup);
		if ($this->isColumnModified(NpfalperPeer::MONSUP)) $criteria->add(NpfalperPeer::MONSUP, $this->monsup);
		if ($this->isColumnModified(NpfalperPeer::MEDEXP)) $criteria->add(NpfalperPeer::MEDEXP, $this->medexp);
		if ($this->isColumnModified(NpfalperPeer::ESPMED)) $criteria->add(NpfalperPeer::ESPMED, $this->espmed);
		if ($this->isColumnModified(NpfalperPeer::FECINC)) $criteria->add(NpfalperPeer::FECINC, $this->fecinc);
		if ($this->isColumnModified(NpfalperPeer::CENATE)) $criteria->add(NpfalperPeer::CENATE, $this->cenate);
		if ($this->isColumnModified(NpfalperPeer::TIPDOC)) $criteria->add(NpfalperPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(NpfalperPeer::DIAREP)) $criteria->add(NpfalperPeer::DIAREP, $this->diarep);
		if ($this->isColumnModified(NpfalperPeer::ID)) $criteria->add(NpfalperPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpfalperPeer::DATABASE_NAME);

		$criteria->add(NpfalperPeer::ID, $this->id);

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

		$copyObj->setCodmot($this->codmot);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setNrodia($this->nrodia);

		$copyObj->setObserv($this->observ);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setFechas($this->fechas);

		$copyObj->setNrohoras($this->nrohoras);

		$copyObj->setNumctr($this->numctr);

		$copyObj->setHordes($this->hordes);

		$copyObj->setHorhas($this->horhas);

		$copyObj->setTipsal($this->tipsal);

		$copyObj->setTipper($this->tipper);

		$copyObj->setNomsup($this->nomsup);

		$copyObj->setMonsup($this->monsup);

		$copyObj->setMedexp($this->medexp);

		$copyObj->setEspmed($this->espmed);

		$copyObj->setFecinc($this->fecinc);

		$copyObj->setCenate($this->cenate);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setDiarep($this->diarep);


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
			self::$peer = new NpfalperPeer();
		}
		return self::$peer;
	}

} 