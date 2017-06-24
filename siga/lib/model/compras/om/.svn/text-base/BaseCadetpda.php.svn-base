<?php


abstract class BaseCadetpda extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpda;


	
	protected $ordcom;


	
	protected $codart;


	
	protected $desart;


	
	protected $canart;


	
	protected $fecent;


	
	protected $tiptra;


	
	protected $dirori;


	
	protected $codedo;


	
	protected $catipalm_id;


	
	protected $tmart;


	
	protected $codpro;


	
	protected $observ;


	
	protected $mes;


	
	protected $id;

	
	protected $aCatipalm;

	
	protected $aCaprovee;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefpda()
  {

    return trim($this->refpda);

  }
  
  public function getOrdcom()
  {

    return trim($this->ordcom);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getCanart($val=false)
  {

    if($val) return number_format($this->canart,2,',','.');
    else return $this->canart;

  }
  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTiptra()
  {

    return trim($this->tiptra);

  }
  
  public function getDirori()
  {

    return trim($this->dirori);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCatipalmId()
  {

    return $this->catipalm_id;

  }
  
  public function getTmart($val=false)
  {

    if($val) return number_format($this->tmart,2,',','.');
    else return $this->tmart;

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getMes()
  {

    return trim($this->mes);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpda($v)
	{

    if ($this->refpda !== $v) {
        $this->refpda = $v;
        $this->modifiedColumns[] = CadetpdaPeer::REFPDA;
      }
  
	} 
	
	public function setOrdcom($v)
	{

    if ($this->ordcom !== $v) {
        $this->ordcom = $v;
        $this->modifiedColumns[] = CadetpdaPeer::ORDCOM;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CadetpdaPeer::CODART;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = CadetpdaPeer::DESART;
      }
  
	} 
	
	public function setCanart($v)
	{

    if ($this->canart !== $v) {
        $this->canart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetpdaPeer::CANART;
      }
  
	} 
	
	public function setFecent($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = CadetpdaPeer::FECENT;
    }

	} 
	
	public function setTiptra($v)
	{

    if ($this->tiptra !== $v) {
        $this->tiptra = $v;
        $this->modifiedColumns[] = CadetpdaPeer::TIPTRA;
      }
  
	} 
	
	public function setDirori($v)
	{

    if ($this->dirori !== $v) {
        $this->dirori = $v;
        $this->modifiedColumns[] = CadetpdaPeer::DIRORI;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = CadetpdaPeer::CODEDO;
      }
  
	} 
	
	public function setCatipalmId($v)
	{

    if ($this->catipalm_id !== $v) {
        $this->catipalm_id = $v;
        $this->modifiedColumns[] = CadetpdaPeer::CATIPALM_ID;
      }
  
		if ($this->aCatipalm !== null && $this->aCatipalm->getId() !== $v) {
			$this->aCatipalm = null;
		}

	} 
	
	public function setTmart($v)
	{

    if ($this->tmart !== $v) {
        $this->tmart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadetpdaPeer::TMART;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = CadetpdaPeer::CODPRO;
      }
  
		if ($this->aCaprovee !== null && $this->aCaprovee->getCodpro() !== $v) {
			$this->aCaprovee = null;
		}

	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CadetpdaPeer::OBSERV;
      }
  
	} 
	
	public function setMes($v)
	{

    if ($this->mes !== $v) {
        $this->mes = $v;
        $this->modifiedColumns[] = CadetpdaPeer::MES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadetpdaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpda = $rs->getString($startcol + 0);

      $this->ordcom = $rs->getString($startcol + 1);

      $this->codart = $rs->getString($startcol + 2);

      $this->desart = $rs->getString($startcol + 3);

      $this->canart = $rs->getFloat($startcol + 4);

      $this->fecent = $rs->getDate($startcol + 5, null);

      $this->tiptra = $rs->getString($startcol + 6);

      $this->dirori = $rs->getString($startcol + 7);

      $this->codedo = $rs->getString($startcol + 8);

      $this->catipalm_id = $rs->getInt($startcol + 9);

      $this->tmart = $rs->getFloat($startcol + 10);

      $this->codpro = $rs->getString($startcol + 11);

      $this->observ = $rs->getString($startcol + 12);

      $this->mes = $rs->getString($startcol + 13);

      $this->id = $rs->getInt($startcol + 14);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 15; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadetpda object", $e);
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
			$con = Propel::getConnection(CadetpdaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadetpdaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadetpdaPeer::DATABASE_NAME);
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


												
			if ($this->aCatipalm !== null) {
				if ($this->aCatipalm->isModified()) {
					$affectedRows += $this->aCatipalm->save($con);
				}
				$this->setCatipalm($this->aCatipalm);
			}

			if ($this->aCaprovee !== null) {
				if ($this->aCaprovee->isModified()) {
					$affectedRows += $this->aCaprovee->save($con);
				}
				$this->setCaprovee($this->aCaprovee);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CadetpdaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadetpdaPeer::doUpdate($this, $con);
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


												
			if ($this->aCatipalm !== null) {
				if (!$this->aCatipalm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatipalm->getValidationFailures());
				}
			}

			if ($this->aCaprovee !== null) {
				if (!$this->aCaprovee->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCaprovee->getValidationFailures());
				}
			}


			if (($retval = CadetpdaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetpdaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpda();
				break;
			case 1:
				return $this->getOrdcom();
				break;
			case 2:
				return $this->getCodart();
				break;
			case 3:
				return $this->getDesart();
				break;
			case 4:
				return $this->getCanart();
				break;
			case 5:
				return $this->getFecent();
				break;
			case 6:
				return $this->getTiptra();
				break;
			case 7:
				return $this->getDirori();
				break;
			case 8:
				return $this->getCodedo();
				break;
			case 9:
				return $this->getCatipalmId();
				break;
			case 10:
				return $this->getTmart();
				break;
			case 11:
				return $this->getCodpro();
				break;
			case 12:
				return $this->getObserv();
				break;
			case 13:
				return $this->getMes();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetpdaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpda(),
			$keys[1] => $this->getOrdcom(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getDesart(),
			$keys[4] => $this->getCanart(),
			$keys[5] => $this->getFecent(),
			$keys[6] => $this->getTiptra(),
			$keys[7] => $this->getDirori(),
			$keys[8] => $this->getCodedo(),
			$keys[9] => $this->getCatipalmId(),
			$keys[10] => $this->getTmart(),
			$keys[11] => $this->getCodpro(),
			$keys[12] => $this->getObserv(),
			$keys[13] => $this->getMes(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetpdaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpda($value);
				break;
			case 1:
				$this->setOrdcom($value);
				break;
			case 2:
				$this->setCodart($value);
				break;
			case 3:
				$this->setDesart($value);
				break;
			case 4:
				$this->setCanart($value);
				break;
			case 5:
				$this->setFecent($value);
				break;
			case 6:
				$this->setTiptra($value);
				break;
			case 7:
				$this->setDirori($value);
				break;
			case 8:
				$this->setCodedo($value);
				break;
			case 9:
				$this->setCatipalmId($value);
				break;
			case 10:
				$this->setTmart($value);
				break;
			case 11:
				$this->setCodpro($value);
				break;
			case 12:
				$this->setObserv($value);
				break;
			case 13:
				$this->setMes($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetpdaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpda($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOrdcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanart($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecent($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTiptra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDirori($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodedo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCatipalmId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTmart($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodpro($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setObserv($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMes($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadetpdaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadetpdaPeer::REFPDA)) $criteria->add(CadetpdaPeer::REFPDA, $this->refpda);
		if ($this->isColumnModified(CadetpdaPeer::ORDCOM)) $criteria->add(CadetpdaPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(CadetpdaPeer::CODART)) $criteria->add(CadetpdaPeer::CODART, $this->codart);
		if ($this->isColumnModified(CadetpdaPeer::DESART)) $criteria->add(CadetpdaPeer::DESART, $this->desart);
		if ($this->isColumnModified(CadetpdaPeer::CANART)) $criteria->add(CadetpdaPeer::CANART, $this->canart);
		if ($this->isColumnModified(CadetpdaPeer::FECENT)) $criteria->add(CadetpdaPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(CadetpdaPeer::TIPTRA)) $criteria->add(CadetpdaPeer::TIPTRA, $this->tiptra);
		if ($this->isColumnModified(CadetpdaPeer::DIRORI)) $criteria->add(CadetpdaPeer::DIRORI, $this->dirori);
		if ($this->isColumnModified(CadetpdaPeer::CODEDO)) $criteria->add(CadetpdaPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(CadetpdaPeer::CATIPALM_ID)) $criteria->add(CadetpdaPeer::CATIPALM_ID, $this->catipalm_id);
		if ($this->isColumnModified(CadetpdaPeer::TMART)) $criteria->add(CadetpdaPeer::TMART, $this->tmart);
		if ($this->isColumnModified(CadetpdaPeer::CODPRO)) $criteria->add(CadetpdaPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CadetpdaPeer::OBSERV)) $criteria->add(CadetpdaPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CadetpdaPeer::MES)) $criteria->add(CadetpdaPeer::MES, $this->mes);
		if ($this->isColumnModified(CadetpdaPeer::ID)) $criteria->add(CadetpdaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadetpdaPeer::DATABASE_NAME);

		$criteria->add(CadetpdaPeer::ID, $this->id);

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

		$copyObj->setRefpda($this->refpda);

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setCodart($this->codart);

		$copyObj->setDesart($this->desart);

		$copyObj->setCanart($this->canart);

		$copyObj->setFecent($this->fecent);

		$copyObj->setTiptra($this->tiptra);

		$copyObj->setDirori($this->dirori);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCatipalmId($this->catipalm_id);

		$copyObj->setTmart($this->tmart);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setObserv($this->observ);

		$copyObj->setMes($this->mes);


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
			self::$peer = new CadetpdaPeer();
		}
		return self::$peer;
	}

	
	public function setCatipalm($v)
	{


		if ($v === null) {
			$this->setCatipalmId(NULL);
		} else {
			$this->setCatipalmId($v->getId());
		}


		$this->aCatipalm = $v;
	}


	
	public function getCatipalm($con = null)
	{
		if ($this->aCatipalm === null && ($this->catipalm_id !== null)) {
						include_once 'lib/model/compras/om/BaseCatipalmPeer.php';

      $c = new Criteria();
      $c->add(CatipalmPeer::ID,$this->catipalm_id);
      
			$this->aCatipalm = CatipalmPeer::doSelectOne($c, $con);

			
		}
		return $this->aCatipalm;
	}

	
	public function setCaprovee($v)
	{


		if ($v === null) {
			$this->setCodpro(NULL);
		} else {
			$this->setCodpro($v->getCodpro());
		}


		$this->aCaprovee = $v;
	}


	
	public function getCaprovee($con = null)
	{
		if ($this->aCaprovee === null && (($this->codpro !== "" && $this->codpro !== null))) {
						include_once 'lib/model/compras/om/BaseCaproveePeer.php';

      $c = new Criteria();
      $c->add(CaproveePeer::CODPRO,$this->codpro);
      
			$this->aCaprovee = CaproveePeer::doSelectOne($c, $con);

			
		}
		return $this->aCaprovee;
	}

} 