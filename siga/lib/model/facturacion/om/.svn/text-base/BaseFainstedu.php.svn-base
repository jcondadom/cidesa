<?php


abstract class BaseFainstedu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codinst;


	
	protected $nominst;


	
	protected $dirinst;


	
	protected $telinst;


	
	protected $faxinst;


	
	protected $emailinst;


	
	protected $codedo;


	
	protected $codciu;


	
	protected $codmun;


	
	protected $codpar;


	
	protected $ingesta;


	
	protected $matinst;


	
	protected $coddep;


	
	protected $codsub;


	
	protected $persona;


	
	protected $id;

	
	protected $aFadependencia;

	
	protected $aFasubsistema;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodinst()
  {

    return trim($this->codinst);

  }
  
  public function getNominst()
  {

    return trim($this->nominst);

  }
  
  public function getDirinst()
  {

    return trim($this->dirinst);

  }
  
  public function getTelinst()
  {

    return trim($this->telinst);

  }
  
  public function getFaxinst()
  {

    return trim($this->faxinst);

  }
  
  public function getEmailinst()
  {

    return trim($this->emailinst);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getIngesta()
  {

    return trim($this->ingesta);

  }
  
  public function getMatinst()
  {

    return trim($this->matinst);

  }
  
  public function getCoddep()
  {

    return trim($this->coddep);

  }
  
  public function getCodsub()
  {

    return trim($this->codsub);

  }
  
  public function getPersona()
  {

    return trim($this->persona);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodinst($v)
	{

    if ($this->codinst !== $v) {
        $this->codinst = $v;
        $this->modifiedColumns[] = FainsteduPeer::CODINST;
      }
  
	} 
	
	public function setNominst($v)
	{

    if ($this->nominst !== $v) {
        $this->nominst = $v;
        $this->modifiedColumns[] = FainsteduPeer::NOMINST;
      }
  
	} 
	
	public function setDirinst($v)
	{

    if ($this->dirinst !== $v) {
        $this->dirinst = $v;
        $this->modifiedColumns[] = FainsteduPeer::DIRINST;
      }
  
	} 
	
	public function setTelinst($v)
	{

    if ($this->telinst !== $v) {
        $this->telinst = $v;
        $this->modifiedColumns[] = FainsteduPeer::TELINST;
      }
  
	} 
	
	public function setFaxinst($v)
	{

    if ($this->faxinst !== $v) {
        $this->faxinst = $v;
        $this->modifiedColumns[] = FainsteduPeer::FAXINST;
      }
  
	} 
	
	public function setEmailinst($v)
	{

    if ($this->emailinst !== $v) {
        $this->emailinst = $v;
        $this->modifiedColumns[] = FainsteduPeer::EMAILINST;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = FainsteduPeer::CODEDO;
      }
  
	} 
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = FainsteduPeer::CODCIU;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = FainsteduPeer::CODMUN;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = FainsteduPeer::CODPAR;
      }
  
	} 
	
	public function setIngesta($v)
	{

    if ($this->ingesta !== $v) {
        $this->ingesta = $v;
        $this->modifiedColumns[] = FainsteduPeer::INGESTA;
      }
  
	} 
	
	public function setMatinst($v)
	{

    if ($this->matinst !== $v) {
        $this->matinst = $v;
        $this->modifiedColumns[] = FainsteduPeer::MATINST;
      }
  
	} 
	
	public function setCoddep($v)
	{

    if ($this->coddep !== $v) {
        $this->coddep = $v;
        $this->modifiedColumns[] = FainsteduPeer::CODDEP;
      }
  
		if ($this->aFadependencia !== null && $this->aFadependencia->getCoddep() !== $v) {
			$this->aFadependencia = null;
		}

	} 
	
	public function setCodsub($v)
	{

    if ($this->codsub !== $v) {
        $this->codsub = $v;
        $this->modifiedColumns[] = FainsteduPeer::CODSUB;
      }
  
		if ($this->aFasubsistema !== null && $this->aFasubsistema->getCodsub() !== $v) {
			$this->aFasubsistema = null;
		}

	} 
	
	public function setPersona($v)
	{

    if ($this->persona !== $v) {
        $this->persona = $v;
        $this->modifiedColumns[] = FainsteduPeer::PERSONA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FainsteduPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codinst = $rs->getString($startcol + 0);

      $this->nominst = $rs->getString($startcol + 1);

      $this->dirinst = $rs->getString($startcol + 2);

      $this->telinst = $rs->getString($startcol + 3);

      $this->faxinst = $rs->getString($startcol + 4);

      $this->emailinst = $rs->getString($startcol + 5);

      $this->codedo = $rs->getString($startcol + 6);

      $this->codciu = $rs->getString($startcol + 7);

      $this->codmun = $rs->getString($startcol + 8);

      $this->codpar = $rs->getString($startcol + 9);

      $this->ingesta = $rs->getString($startcol + 10);

      $this->matinst = $rs->getString($startcol + 11);

      $this->coddep = $rs->getString($startcol + 12);

      $this->codsub = $rs->getString($startcol + 13);

      $this->persona = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fainstedu object", $e);
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
			$con = Propel::getConnection(FainsteduPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FainsteduPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FainsteduPeer::DATABASE_NAME);
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


												
			if ($this->aFadependencia !== null) {
				if ($this->aFadependencia->isModified()) {
					$affectedRows += $this->aFadependencia->save($con);
				}
				$this->setFadependencia($this->aFadependencia);
			}

			if ($this->aFasubsistema !== null) {
				if ($this->aFasubsistema->isModified()) {
					$affectedRows += $this->aFasubsistema->save($con);
				}
				$this->setFasubsistema($this->aFasubsistema);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FainsteduPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FainsteduPeer::doUpdate($this, $con);
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


												
			if ($this->aFadependencia !== null) {
				if (!$this->aFadependencia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFadependencia->getValidationFailures());
				}
			}

			if ($this->aFasubsistema !== null) {
				if (!$this->aFasubsistema->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFasubsistema->getValidationFailures());
				}
			}


			if (($retval = FainsteduPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FainsteduPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodinst();
				break;
			case 1:
				return $this->getNominst();
				break;
			case 2:
				return $this->getDirinst();
				break;
			case 3:
				return $this->getTelinst();
				break;
			case 4:
				return $this->getFaxinst();
				break;
			case 5:
				return $this->getEmailinst();
				break;
			case 6:
				return $this->getCodedo();
				break;
			case 7:
				return $this->getCodciu();
				break;
			case 8:
				return $this->getCodmun();
				break;
			case 9:
				return $this->getCodpar();
				break;
			case 10:
				return $this->getIngesta();
				break;
			case 11:
				return $this->getMatinst();
				break;
			case 12:
				return $this->getCoddep();
				break;
			case 13:
				return $this->getCodsub();
				break;
			case 14:
				return $this->getPersona();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FainsteduPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodinst(),
			$keys[1] => $this->getNominst(),
			$keys[2] => $this->getDirinst(),
			$keys[3] => $this->getTelinst(),
			$keys[4] => $this->getFaxinst(),
			$keys[5] => $this->getEmailinst(),
			$keys[6] => $this->getCodedo(),
			$keys[7] => $this->getCodciu(),
			$keys[8] => $this->getCodmun(),
			$keys[9] => $this->getCodpar(),
			$keys[10] => $this->getIngesta(),
			$keys[11] => $this->getMatinst(),
			$keys[12] => $this->getCoddep(),
			$keys[13] => $this->getCodsub(),
			$keys[14] => $this->getPersona(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FainsteduPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodinst($value);
				break;
			case 1:
				$this->setNominst($value);
				break;
			case 2:
				$this->setDirinst($value);
				break;
			case 3:
				$this->setTelinst($value);
				break;
			case 4:
				$this->setFaxinst($value);
				break;
			case 5:
				$this->setEmailinst($value);
				break;
			case 6:
				$this->setCodedo($value);
				break;
			case 7:
				$this->setCodciu($value);
				break;
			case 8:
				$this->setCodmun($value);
				break;
			case 9:
				$this->setCodpar($value);
				break;
			case 10:
				$this->setIngesta($value);
				break;
			case 11:
				$this->setMatinst($value);
				break;
			case 12:
				$this->setCoddep($value);
				break;
			case 13:
				$this->setCodsub($value);
				break;
			case 14:
				$this->setPersona($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FainsteduPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodinst($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNominst($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirinst($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelinst($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFaxinst($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmailinst($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodedo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodciu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodmun($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodpar($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIngesta($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMatinst($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCoddep($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodsub($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setPersona($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FainsteduPeer::DATABASE_NAME);

		if ($this->isColumnModified(FainsteduPeer::CODINST)) $criteria->add(FainsteduPeer::CODINST, $this->codinst);
		if ($this->isColumnModified(FainsteduPeer::NOMINST)) $criteria->add(FainsteduPeer::NOMINST, $this->nominst);
		if ($this->isColumnModified(FainsteduPeer::DIRINST)) $criteria->add(FainsteduPeer::DIRINST, $this->dirinst);
		if ($this->isColumnModified(FainsteduPeer::TELINST)) $criteria->add(FainsteduPeer::TELINST, $this->telinst);
		if ($this->isColumnModified(FainsteduPeer::FAXINST)) $criteria->add(FainsteduPeer::FAXINST, $this->faxinst);
		if ($this->isColumnModified(FainsteduPeer::EMAILINST)) $criteria->add(FainsteduPeer::EMAILINST, $this->emailinst);
		if ($this->isColumnModified(FainsteduPeer::CODEDO)) $criteria->add(FainsteduPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(FainsteduPeer::CODCIU)) $criteria->add(FainsteduPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(FainsteduPeer::CODMUN)) $criteria->add(FainsteduPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(FainsteduPeer::CODPAR)) $criteria->add(FainsteduPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FainsteduPeer::INGESTA)) $criteria->add(FainsteduPeer::INGESTA, $this->ingesta);
		if ($this->isColumnModified(FainsteduPeer::MATINST)) $criteria->add(FainsteduPeer::MATINST, $this->matinst);
		if ($this->isColumnModified(FainsteduPeer::CODDEP)) $criteria->add(FainsteduPeer::CODDEP, $this->coddep);
		if ($this->isColumnModified(FainsteduPeer::CODSUB)) $criteria->add(FainsteduPeer::CODSUB, $this->codsub);
		if ($this->isColumnModified(FainsteduPeer::PERSONA)) $criteria->add(FainsteduPeer::PERSONA, $this->persona);
		if ($this->isColumnModified(FainsteduPeer::ID)) $criteria->add(FainsteduPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FainsteduPeer::DATABASE_NAME);

		$criteria->add(FainsteduPeer::ID, $this->id);

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

		$copyObj->setCodinst($this->codinst);

		$copyObj->setNominst($this->nominst);

		$copyObj->setDirinst($this->dirinst);

		$copyObj->setTelinst($this->telinst);

		$copyObj->setFaxinst($this->faxinst);

		$copyObj->setEmailinst($this->emailinst);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodciu($this->codciu);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setIngesta($this->ingesta);

		$copyObj->setMatinst($this->matinst);

		$copyObj->setCoddep($this->coddep);

		$copyObj->setCodsub($this->codsub);

		$copyObj->setPersona($this->persona);


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
			self::$peer = new FainsteduPeer();
		}
		return self::$peer;
	}

	
	public function setFadependencia($v)
	{


		if ($v === null) {
			$this->setCoddep(NULL);
		} else {
			$this->setCoddep($v->getCoddep());
		}


		$this->aFadependencia = $v;
	}


	
	public function getFadependencia($con = null)
	{
		if ($this->aFadependencia === null && (($this->coddep !== "" && $this->coddep !== null))) {
						include_once 'lib/model/facturacion/om/BaseFadependenciaPeer.php';

      $c = new Criteria();
      $c->add(FadependenciaPeer::CODDEP,$this->coddep);
      
			$this->aFadependencia = FadependenciaPeer::doSelectOne($c, $con);

			
		}
		return $this->aFadependencia;
	}

	
	public function setFasubsistema($v)
	{


		if ($v === null) {
			$this->setCodsub(NULL);
		} else {
			$this->setCodsub($v->getCodsub());
		}


		$this->aFasubsistema = $v;
	}


	
	public function getFasubsistema($con = null)
	{
		if ($this->aFasubsistema === null && (($this->codsub !== "" && $this->codsub !== null))) {
						include_once 'lib/model/facturacion/om/BaseFasubsistemaPeer.php';

      $c = new Criteria();
      $c->add(FasubsistemaPeer::CODSUB,$this->codsub);
      
			$this->aFasubsistema = FasubsistemaPeer::doSelectOne($c, $con);

			
		}
		return $this->aFasubsistema;
	}

} 