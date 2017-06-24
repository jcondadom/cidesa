<?php


abstract class BaseFaciecaj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codalm;


	
	protected $codcaj;


	
	protected $codusu;


	
	protected $numfacini;


	
	protected $numfaccie;


	
	protected $numctrini;


	
	protected $numctrcie;


	
	protected $observ;


	
	protected $moncie;


	
	protected $fechorcie;


	
	protected $codape;


	
	protected $id;

	
	protected $aFadefcaj;

	
	protected $aFaapecaj;

	
	protected $collFadetbilcies;

	
	protected $lastFadetbilcieCriteria = null;

	
	protected $collFadetmovcies;

	
	protected $lastFadetmovcieCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodcaj()
  {

    return $this->codcaj;

  }
  
  public function getCodusu()
  {

    return trim($this->codusu);

  }
  
  public function getNumfacini()
  {

    return trim($this->numfacini);

  }
  
  public function getNumfaccie()
  {

    return trim($this->numfaccie);

  }
  
  public function getNumctrini()
  {

    return trim($this->numctrini);

  }
  
  public function getNumctrcie()
  {

    return trim($this->numctrcie);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getMoncie($val=false)
  {

    if($val) return number_format($this->moncie,2,',','.');
    else return $this->moncie;

  }
  
  public function getFechorcie($format = 'Y-m-d H:i:s')
  {

    if ($this->fechorcie === null || $this->fechorcie === '') {
      return null;
    } elseif (!is_int($this->fechorcie)) {
            $ts = adodb_strtotime($this->fechorcie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechorcie] as date/time value: " . var_export($this->fechorcie, true));
      }
    } else {
      $ts = $this->fechorcie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodape()
  {

    return $this->codape;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = FaciecajPeer::CODALM;
      }
  
	} 
	
	public function setCodcaj($v)
	{

    if ($this->codcaj !== $v) {
        $this->codcaj = $v;
        $this->modifiedColumns[] = FaciecajPeer::CODCAJ;
      }
  
		if ($this->aFadefcaj !== null && $this->aFadefcaj->getId() !== $v) {
			$this->aFadefcaj = null;
		}

	} 
	
	public function setCodusu($v)
	{

    if ($this->codusu !== $v) {
        $this->codusu = $v;
        $this->modifiedColumns[] = FaciecajPeer::CODUSU;
      }
  
	} 
	
	public function setNumfacini($v)
	{

    if ($this->numfacini !== $v) {
        $this->numfacini = $v;
        $this->modifiedColumns[] = FaciecajPeer::NUMFACINI;
      }
  
	} 
	
	public function setNumfaccie($v)
	{

    if ($this->numfaccie !== $v) {
        $this->numfaccie = $v;
        $this->modifiedColumns[] = FaciecajPeer::NUMFACCIE;
      }
  
	} 
	
	public function setNumctrini($v)
	{

    if ($this->numctrini !== $v) {
        $this->numctrini = $v;
        $this->modifiedColumns[] = FaciecajPeer::NUMCTRINI;
      }
  
	} 
	
	public function setNumctrcie($v)
	{

    if ($this->numctrcie !== $v) {
        $this->numctrcie = $v;
        $this->modifiedColumns[] = FaciecajPeer::NUMCTRCIE;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = FaciecajPeer::OBSERV;
      }
  
	} 
	
	public function setMoncie($v)
	{

    if ($this->moncie !== $v) {
        $this->moncie = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaciecajPeer::MONCIE;
      }
  
	} 
	
	public function setFechorcie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechorcie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechorcie !== $ts) {
      $this->fechorcie = $ts;
      $this->modifiedColumns[] = FaciecajPeer::FECHORCIE;
    }

	} 
	
	public function setCodape($v)
	{

    if ($this->codape !== $v) {
        $this->codape = $v;
        $this->modifiedColumns[] = FaciecajPeer::CODAPE;
      }
  
		if ($this->aFaapecaj !== null && $this->aFaapecaj->getId() !== $v) {
			$this->aFaapecaj = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaciecajPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codalm = $rs->getString($startcol + 0);

      $this->codcaj = $rs->getInt($startcol + 1);

      $this->codusu = $rs->getString($startcol + 2);

      $this->numfacini = $rs->getString($startcol + 3);

      $this->numfaccie = $rs->getString($startcol + 4);

      $this->numctrini = $rs->getString($startcol + 5);

      $this->numctrcie = $rs->getString($startcol + 6);

      $this->observ = $rs->getString($startcol + 7);

      $this->moncie = $rs->getFloat($startcol + 8);

      $this->fechorcie = $rs->getTimestamp($startcol + 9, null);

      $this->codape = $rs->getInt($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faciecaj object", $e);
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
			$con = Propel::getConnection(FaciecajPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaciecajPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaciecajPeer::DATABASE_NAME);
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


												
			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aFadefcaj !== null) {
				if ($this->aFadefcaj->isModified()) {
					$affectedRows += $this->aFadefcaj->save($con);
				}
				$this->setFadefcaj($this->aFadefcaj);
			}

			if ($this->aFaapecaj !== null) {
				if ($this->aFaapecaj->isModified()) {
					$affectedRows += $this->aFaapecaj->save($con);
				}
				$this->setFaapecaj($this->aFaapecaj);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FaciecajPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaciecajPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFadetbilcies !== null) {
				foreach($this->collFadetbilcies as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFadetmovcies !== null) {
				foreach($this->collFadetmovcies as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aFadefcaj !== null) {
				if (!$this->aFadefcaj->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFadefcaj->getValidationFailures());
				}
			}

			if ($this->aFaapecaj !== null) {
				if (!$this->aFaapecaj->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaapecaj->getValidationFailures());
				}
			}


			if (($retval = FaciecajPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFadetbilcies !== null) {
					foreach($this->collFadetbilcies as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFadetmovcies !== null) {
					foreach($this->collFadetmovcies as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaciecajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodalm();
				break;
			case 1:
				return $this->getCodcaj();
				break;
			case 2:
				return $this->getCodusu();
				break;
			case 3:
				return $this->getNumfacini();
				break;
			case 4:
				return $this->getNumfaccie();
				break;
			case 5:
				return $this->getNumctrini();
				break;
			case 6:
				return $this->getNumctrcie();
				break;
			case 7:
				return $this->getObserv();
				break;
			case 8:
				return $this->getMoncie();
				break;
			case 9:
				return $this->getFechorcie();
				break;
			case 10:
				return $this->getCodape();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaciecajPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodalm(),
			$keys[1] => $this->getCodcaj(),
			$keys[2] => $this->getCodusu(),
			$keys[3] => $this->getNumfacini(),
			$keys[4] => $this->getNumfaccie(),
			$keys[5] => $this->getNumctrini(),
			$keys[6] => $this->getNumctrcie(),
			$keys[7] => $this->getObserv(),
			$keys[8] => $this->getMoncie(),
			$keys[9] => $this->getFechorcie(),
			$keys[10] => $this->getCodape(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaciecajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodalm($value);
				break;
			case 1:
				$this->setCodcaj($value);
				break;
			case 2:
				$this->setCodusu($value);
				break;
			case 3:
				$this->setNumfacini($value);
				break;
			case 4:
				$this->setNumfaccie($value);
				break;
			case 5:
				$this->setNumctrini($value);
				break;
			case 6:
				$this->setNumctrcie($value);
				break;
			case 7:
				$this->setObserv($value);
				break;
			case 8:
				$this->setMoncie($value);
				break;
			case 9:
				$this->setFechorcie($value);
				break;
			case 10:
				$this->setCodape($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaciecajPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodalm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcaj($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodusu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumfacini($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumfaccie($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumctrini($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumctrcie($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObserv($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMoncie($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFechorcie($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodape($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaciecajPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaciecajPeer::CODALM)) $criteria->add(FaciecajPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(FaciecajPeer::CODCAJ)) $criteria->add(FaciecajPeer::CODCAJ, $this->codcaj);
		if ($this->isColumnModified(FaciecajPeer::CODUSU)) $criteria->add(FaciecajPeer::CODUSU, $this->codusu);
		if ($this->isColumnModified(FaciecajPeer::NUMFACINI)) $criteria->add(FaciecajPeer::NUMFACINI, $this->numfacini);
		if ($this->isColumnModified(FaciecajPeer::NUMFACCIE)) $criteria->add(FaciecajPeer::NUMFACCIE, $this->numfaccie);
		if ($this->isColumnModified(FaciecajPeer::NUMCTRINI)) $criteria->add(FaciecajPeer::NUMCTRINI, $this->numctrini);
		if ($this->isColumnModified(FaciecajPeer::NUMCTRCIE)) $criteria->add(FaciecajPeer::NUMCTRCIE, $this->numctrcie);
		if ($this->isColumnModified(FaciecajPeer::OBSERV)) $criteria->add(FaciecajPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(FaciecajPeer::MONCIE)) $criteria->add(FaciecajPeer::MONCIE, $this->moncie);
		if ($this->isColumnModified(FaciecajPeer::FECHORCIE)) $criteria->add(FaciecajPeer::FECHORCIE, $this->fechorcie);
		if ($this->isColumnModified(FaciecajPeer::CODAPE)) $criteria->add(FaciecajPeer::CODAPE, $this->codape);
		if ($this->isColumnModified(FaciecajPeer::ID)) $criteria->add(FaciecajPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaciecajPeer::DATABASE_NAME);

		$criteria->add(FaciecajPeer::ID, $this->id);

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

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodcaj($this->codcaj);

		$copyObj->setCodusu($this->codusu);

		$copyObj->setNumfacini($this->numfacini);

		$copyObj->setNumfaccie($this->numfaccie);

		$copyObj->setNumctrini($this->numctrini);

		$copyObj->setNumctrcie($this->numctrcie);

		$copyObj->setObserv($this->observ);

		$copyObj->setMoncie($this->moncie);

		$copyObj->setFechorcie($this->fechorcie);

		$copyObj->setCodape($this->codape);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFadetbilcies() as $relObj) {
				$copyObj->addFadetbilcie($relObj->copy($deepCopy));
			}

			foreach($this->getFadetmovcies() as $relObj) {
				$copyObj->addFadetmovcie($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new FaciecajPeer();
		}
		return self::$peer;
	}

	
	public function setFadefcaj($v)
	{


		if ($v === null) {
			$this->setCodcaj(NULL);
		} else {
			$this->setCodcaj($v->getId());
		}


		$this->aFadefcaj = $v;
	}


	
	public function getFadefcaj($con = null)
	{
		if ($this->aFadefcaj === null && ($this->codcaj !== null)) {
						include_once 'lib/model/facturacion/om/BaseFadefcajPeer.php';

      $c = new Criteria();
      $c->add(FadefcajPeer::ID,$this->codcaj);
      
			$this->aFadefcaj = FadefcajPeer::doSelectOne($c, $con);

			
		}
		return $this->aFadefcaj;
	}

	
	public function setFaapecaj($v)
	{


		if ($v === null) {
			$this->setCodape(NULL);
		} else {
			$this->setCodape($v->getId());
		}


		$this->aFaapecaj = $v;
	}


	
	public function getFaapecaj($con = null)
	{
		if ($this->aFaapecaj === null && ($this->codape !== null)) {
						include_once 'lib/model/facturacion/om/BaseFaapecajPeer.php';

      $c = new Criteria();
      $c->add(FaapecajPeer::ID,$this->codape);
      
			$this->aFaapecaj = FaapecajPeer::doSelectOne($c, $con);

			
		}
		return $this->aFaapecaj;
	}

	
	public function initFadetbilcies()
	{
		if ($this->collFadetbilcies === null) {
			$this->collFadetbilcies = array();
		}
	}

	
	public function getFadetbilcies($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadetbilciePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFadetbilcies === null) {
			if ($this->isNew()) {
			   $this->collFadetbilcies = array();
			} else {

				$criteria->add(FadetbilciePeer::CODCIE, $this->getId());

				FadetbilciePeer::addSelectColumns($criteria);
				$this->collFadetbilcies = FadetbilciePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FadetbilciePeer::CODCIE, $this->getId());

				FadetbilciePeer::addSelectColumns($criteria);
				if (!isset($this->lastFadetbilcieCriteria) || !$this->lastFadetbilcieCriteria->equals($criteria)) {
					$this->collFadetbilcies = FadetbilciePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFadetbilcieCriteria = $criteria;
		return $this->collFadetbilcies;
	}

	
	public function countFadetbilcies($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadetbilciePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FadetbilciePeer::CODCIE, $this->getId());

		return FadetbilciePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFadetbilcie(Fadetbilcie $l)
	{
		$this->collFadetbilcies[] = $l;
		$l->setFaciecaj($this);
	}

	
	public function initFadetmovcies()
	{
		if ($this->collFadetmovcies === null) {
			$this->collFadetmovcies = array();
		}
	}

	
	public function getFadetmovcies($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadetmovciePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFadetmovcies === null) {
			if ($this->isNew()) {
			   $this->collFadetmovcies = array();
			} else {

				$criteria->add(FadetmovciePeer::CODCIE, $this->getId());

				FadetmovciePeer::addSelectColumns($criteria);
				$this->collFadetmovcies = FadetmovciePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FadetmovciePeer::CODCIE, $this->getId());

				FadetmovciePeer::addSelectColumns($criteria);
				if (!isset($this->lastFadetmovcieCriteria) || !$this->lastFadetmovcieCriteria->equals($criteria)) {
					$this->collFadetmovcies = FadetmovciePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFadetmovcieCriteria = $criteria;
		return $this->collFadetmovcies;
	}

	
	public function countFadetmovcies($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadetmovciePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FadetmovciePeer::CODCIE, $this->getId());

		return FadetmovciePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFadetmovcie(Fadetmovcie $l)
	{
		$this->collFadetmovcies[] = $l;
		$l->setFaciecaj($this);
	}

} 