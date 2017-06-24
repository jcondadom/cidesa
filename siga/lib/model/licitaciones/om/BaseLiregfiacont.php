<?php


abstract class BaseLiregfiacont extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcont;


	
	protected $codcomres;


	
	protected $porcen;


	
	protected $empresa;


	
	protected $fecemi;


	
	protected $fecven;


	
	protected $liregofefia_id;


	
	protected $observ;


	
	protected $estatus;


	
	protected $id;

	
	protected $aLicontrat;

	
	protected $aLiccomres;

	
	protected $aLiregofefia;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcont()
  {

    return trim($this->numcont);

  }
  
  public function getCodcomres()
  {

    return trim($this->codcomres);

  }
  
  public function getPorcen($val=false)
  {

    if($val) return number_format($this->porcen,2,',','.');
    else return $this->porcen;

  }
  
  public function getEmpresa()
  {

    return trim($this->empresa);

  }
  
  public function getFecemi($format = 'Y-m-d')
  {

    if ($this->fecemi === null || $this->fecemi === '') {
      return null;
    } elseif (!is_int($this->fecemi)) {
            $ts = adodb_strtotime($this->fecemi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fecemi, true));
      }
    } else {
      $ts = $this->fecemi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
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

  
  public function getLiregofefiaId()
  {

    return $this->liregofefia_id;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getEstatus()
  {

    return $this->estatus;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcont($v)
	{

    if ($this->numcont !== $v) {
        $this->numcont = $v;
        $this->modifiedColumns[] = LiregfiacontPeer::NUMCONT;
      }
  
		if ($this->aLicontrat !== null && $this->aLicontrat->getNumcont() !== $v) {
			$this->aLicontrat = null;
		}

	} 
	
	public function setCodcomres($v)
	{

    if ($this->codcomres !== $v) {
        $this->codcomres = $v;
        $this->modifiedColumns[] = LiregfiacontPeer::CODCOMRES;
      }
  
		if ($this->aLiccomres !== null && $this->aLiccomres->getCodcomres() !== $v) {
			$this->aLiccomres = null;
		}

	} 
	
	public function setPorcen($v)
	{

    if ($this->porcen !== $v) {
        $this->porcen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregfiacontPeer::PORCEN;
      }
  
	} 
	
	public function setEmpresa($v)
	{

    if ($this->empresa !== $v) {
        $this->empresa = $v;
        $this->modifiedColumns[] = LiregfiacontPeer::EMPRESA;
      }
  
	} 
	
	public function setFecemi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecemi !== $ts) {
      $this->fecemi = $ts;
      $this->modifiedColumns[] = LiregfiacontPeer::FECEMI;
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
      $this->modifiedColumns[] = LiregfiacontPeer::FECVEN;
    }

	} 
	
	public function setLiregofefiaId($v)
	{

    if ($this->liregofefia_id !== $v) {
        $this->liregofefia_id = $v;
        $this->modifiedColumns[] = LiregfiacontPeer::LIREGOFEFIA_ID;
      }
  
		if ($this->aLiregofefia !== null && $this->aLiregofefia->getId() !== $v) {
			$this->aLiregofefia = null;
		}

	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = LiregfiacontPeer::OBSERV;
      }
  
	} 
	
	public function setEstatus($v)
	{

    if ($this->estatus !== $v) {
        $this->estatus = $v;
        $this->modifiedColumns[] = LiregfiacontPeer::ESTATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiregfiacontPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcont = $rs->getString($startcol + 0);

      $this->codcomres = $rs->getString($startcol + 1);

      $this->porcen = $rs->getFloat($startcol + 2);

      $this->empresa = $rs->getString($startcol + 3);

      $this->fecemi = $rs->getDate($startcol + 4, null);

      $this->fecven = $rs->getDate($startcol + 5, null);

      $this->liregofefia_id = $rs->getInt($startcol + 6);

      $this->observ = $rs->getString($startcol + 7);

      $this->estatus = $rs->getInt($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liregfiacont object", $e);
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
			$con = Propel::getConnection(LiregfiacontPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiregfiacontPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiregfiacontPeer::DATABASE_NAME);
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


												
			if ($this->aLicontrat !== null) {
				if ($this->aLicontrat->isModified()) {
					$affectedRows += $this->aLicontrat->save($con);
				}
				$this->setLicontrat($this->aLicontrat);
			}

			if ($this->aLiccomres !== null) {
				if ($this->aLiccomres->isModified()) {
					$affectedRows += $this->aLiccomres->save($con);
				}
				$this->setLiccomres($this->aLiccomres);
			}

			if ($this->aLiregofefia !== null) {
				if ($this->aLiregofefia->isModified()) {
					$affectedRows += $this->aLiregofefia->save($con);
				}
				$this->setLiregofefia($this->aLiregofefia);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiregfiacontPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiregfiacontPeer::doUpdate($this, $con);
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


												
			if ($this->aLicontrat !== null) {
				if (!$this->aLicontrat->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLicontrat->getValidationFailures());
				}
			}

			if ($this->aLiccomres !== null) {
				if (!$this->aLiccomres->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiccomres->getValidationFailures());
				}
			}

			if ($this->aLiregofefia !== null) {
				if (!$this->aLiregofefia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiregofefia->getValidationFailures());
				}
			}


			if (($retval = LiregfiacontPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregfiacontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcont();
				break;
			case 1:
				return $this->getCodcomres();
				break;
			case 2:
				return $this->getPorcen();
				break;
			case 3:
				return $this->getEmpresa();
				break;
			case 4:
				return $this->getFecemi();
				break;
			case 5:
				return $this->getFecven();
				break;
			case 6:
				return $this->getLiregofefiaId();
				break;
			case 7:
				return $this->getObserv();
				break;
			case 8:
				return $this->getEstatus();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregfiacontPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcont(),
			$keys[1] => $this->getCodcomres(),
			$keys[2] => $this->getPorcen(),
			$keys[3] => $this->getEmpresa(),
			$keys[4] => $this->getFecemi(),
			$keys[5] => $this->getFecven(),
			$keys[6] => $this->getLiregofefiaId(),
			$keys[7] => $this->getObserv(),
			$keys[8] => $this->getEstatus(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregfiacontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcont($value);
				break;
			case 1:
				$this->setCodcomres($value);
				break;
			case 2:
				$this->setPorcen($value);
				break;
			case 3:
				$this->setEmpresa($value);
				break;
			case 4:
				$this->setFecemi($value);
				break;
			case 5:
				$this->setFecven($value);
				break;
			case 6:
				$this->setLiregofefiaId($value);
				break;
			case 7:
				$this->setObserv($value);
				break;
			case 8:
				$this->setEstatus($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregfiacontPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcont($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcomres($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPorcen($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEmpresa($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecemi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecven($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLiregofefiaId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObserv($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEstatus($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiregfiacontPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiregfiacontPeer::NUMCONT)) $criteria->add(LiregfiacontPeer::NUMCONT, $this->numcont);
		if ($this->isColumnModified(LiregfiacontPeer::CODCOMRES)) $criteria->add(LiregfiacontPeer::CODCOMRES, $this->codcomres);
		if ($this->isColumnModified(LiregfiacontPeer::PORCEN)) $criteria->add(LiregfiacontPeer::PORCEN, $this->porcen);
		if ($this->isColumnModified(LiregfiacontPeer::EMPRESA)) $criteria->add(LiregfiacontPeer::EMPRESA, $this->empresa);
		if ($this->isColumnModified(LiregfiacontPeer::FECEMI)) $criteria->add(LiregfiacontPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(LiregfiacontPeer::FECVEN)) $criteria->add(LiregfiacontPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LiregfiacontPeer::LIREGOFEFIA_ID)) $criteria->add(LiregfiacontPeer::LIREGOFEFIA_ID, $this->liregofefia_id);
		if ($this->isColumnModified(LiregfiacontPeer::OBSERV)) $criteria->add(LiregfiacontPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(LiregfiacontPeer::ESTATUS)) $criteria->add(LiregfiacontPeer::ESTATUS, $this->estatus);
		if ($this->isColumnModified(LiregfiacontPeer::ID)) $criteria->add(LiregfiacontPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiregfiacontPeer::DATABASE_NAME);

		$criteria->add(LiregfiacontPeer::ID, $this->id);

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

		$copyObj->setNumcont($this->numcont);

		$copyObj->setCodcomres($this->codcomres);

		$copyObj->setPorcen($this->porcen);

		$copyObj->setEmpresa($this->empresa);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setFecven($this->fecven);

		$copyObj->setLiregofefiaId($this->liregofefia_id);

		$copyObj->setObserv($this->observ);

		$copyObj->setEstatus($this->estatus);


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
			self::$peer = new LiregfiacontPeer();
		}
		return self::$peer;
	}

	
	public function setLicontrat($v)
	{


		if ($v === null) {
			$this->setNumcont(NULL);
		} else {
			$this->setNumcont($v->getNumcont());
		}


		$this->aLicontrat = $v;
	}


	
	public function getLicontrat($con = null)
	{
		if ($this->aLicontrat === null && (($this->numcont !== "" && $this->numcont !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLicontratPeer.php';

      $c = new Criteria();
      $c->add(LicontratPeer::NUMCONT,$this->numcont);
      
			$this->aLicontrat = LicontratPeer::doSelectOne($c, $con);

			
		}
		return $this->aLicontrat;
	}

	
	public function setLiccomres($v)
	{


		if ($v === null) {
			$this->setCodcomres(NULL);
		} else {
			$this->setCodcomres($v->getCodcomres());
		}


		$this->aLiccomres = $v;
	}


	
	public function getLiccomres($con = null)
	{
		if ($this->aLiccomres === null && (($this->codcomres !== "" && $this->codcomres !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLiccomresPeer.php';

      $c = new Criteria();
      $c->add(LiccomresPeer::CODCOMRES,$this->codcomres);
      
			$this->aLiccomres = LiccomresPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiccomres;
	}

	
	public function setLiregofefia($v)
	{


		if ($v === null) {
			$this->setLiregofefiaId(NULL);
		} else {
			$this->setLiregofefiaId($v->getId());
		}


		$this->aLiregofefia = $v;
	}


	
	public function getLiregofefia($con = null)
	{
		if ($this->aLiregofefia === null && ($this->liregofefia_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLiregofefiaPeer.php';

      $c = new Criteria();
      $c->add(LiregofefiaPeer::ID,$this->liregofefia_id);
      
			$this->aLiregofefia = LiregofefiaPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiregofefia;
	}

} 