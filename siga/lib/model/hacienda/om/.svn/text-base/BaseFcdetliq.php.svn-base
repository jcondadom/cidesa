<?php


abstract class BaseFcdetliq extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numliq;


	
	protected $numpag;


	
	protected $fecpag;


	
	protected $rifcon;


	
	protected $nomcon;


	
	protected $despag;


	
	protected $monpag;


	
	protected $id;

	
	protected $aFcliqpag;

	
	protected $aFcpagos;

	
	protected $aFcconrep;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumliq()
  {

    return trim($this->numliq);

  }
  
  public function getNumpag()
  {

    return trim($this->numpag);

  }
  
  public function getFecpag($format = 'Y-m-d')
  {

    if ($this->fecpag === null || $this->fecpag === '') {
      return null;
    } elseif (!is_int($this->fecpag)) {
            $ts = adodb_strtotime($this->fecpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
      }
    } else {
      $ts = $this->fecpag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDespag()
  {

    return trim($this->despag);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumliq($v)
	{

    if ($this->numliq !== $v) {
        $this->numliq = $v;
        $this->modifiedColumns[] = FcdetliqPeer::NUMLIQ;
      }
  
		if ($this->aFcliqpag !== null && $this->aFcliqpag->getNumliq() !== $v) {
			$this->aFcliqpag = null;
		}

	} 
	
	public function setNumpag($v)
	{

    if ($this->numpag !== $v) {
        $this->numpag = $v;
        $this->modifiedColumns[] = FcdetliqPeer::NUMPAG;
      }
  
		if ($this->aFcpagos !== null && $this->aFcpagos->getNumpag() !== $v) {
			$this->aFcpagos = null;
		}

	} 
	
	public function setFecpag($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = FcdetliqPeer::FECPAG;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcdetliqPeer::RIFCON;
      }
  
		if ($this->aFcconrep !== null && $this->aFcconrep->getRifcon() !== $v) {
			$this->aFcconrep = null;
		}

	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcdetliqPeer::NOMCON;
      }
  
	} 
	
	public function setDespag($v)
	{

    if ($this->despag !== $v) {
        $this->despag = $v;
        $this->modifiedColumns[] = FcdetliqPeer::DESPAG;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetliqPeer::MONPAG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdetliqPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numliq = $rs->getString($startcol + 0);

      $this->numpag = $rs->getString($startcol + 1);

      $this->fecpag = $rs->getDate($startcol + 2, null);

      $this->rifcon = $rs->getString($startcol + 3);

      $this->nomcon = $rs->getString($startcol + 4);

      $this->despag = $rs->getString($startcol + 5);

      $this->monpag = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdetliq object", $e);
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

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdetliqPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdetliqPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdetliqPeer::DATABASE_NAME);
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


												
			if ($this->aFcliqpag !== null) {
				if ($this->aFcliqpag->isModified()) {
					$affectedRows += $this->aFcliqpag->save($con);
				}
				$this->setFcliqpag($this->aFcliqpag);
			}

			if ($this->aFcpagos !== null) {
				if ($this->aFcpagos->isModified()) {
					$affectedRows += $this->aFcpagos->save($con);
				}
				$this->setFcpagos($this->aFcpagos);
			}

			if ($this->aFcconrep !== null) {
				if ($this->aFcconrep->isModified()) {
					$affectedRows += $this->aFcconrep->save($con);
				}
				$this->setFcconrep($this->aFcconrep);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcdetliqPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdetliqPeer::doUpdate($this, $con);
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


												
			if ($this->aFcliqpag !== null) {
				if (!$this->aFcliqpag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcliqpag->getValidationFailures());
				}
			}

			if ($this->aFcpagos !== null) {
				if (!$this->aFcpagos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcpagos->getValidationFailures());
				}
			}

			if ($this->aFcconrep !== null) {
				if (!$this->aFcconrep->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcconrep->getValidationFailures());
				}
			}


			if (($retval = FcdetliqPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetliqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumliq();
				break;
			case 1:
				return $this->getNumpag();
				break;
			case 2:
				return $this->getFecpag();
				break;
			case 3:
				return $this->getRifcon();
				break;
			case 4:
				return $this->getNomcon();
				break;
			case 5:
				return $this->getDespag();
				break;
			case 6:
				return $this->getMonpag();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdetliqPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumliq(),
			$keys[1] => $this->getNumpag(),
			$keys[2] => $this->getFecpag(),
			$keys[3] => $this->getRifcon(),
			$keys[4] => $this->getNomcon(),
			$keys[5] => $this->getDespag(),
			$keys[6] => $this->getMonpag(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetliqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumliq($value);
				break;
			case 1:
				$this->setNumpag($value);
				break;
			case 2:
				$this->setFecpag($value);
				break;
			case 3:
				$this->setRifcon($value);
				break;
			case 4:
				$this->setNomcon($value);
				break;
			case 5:
				$this->setDespag($value);
				break;
			case 6:
				$this->setMonpag($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdetliqPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumliq($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumpag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecpag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRifcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDespag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdetliqPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdetliqPeer::NUMLIQ)) $criteria->add(FcdetliqPeer::NUMLIQ, $this->numliq);
		if ($this->isColumnModified(FcdetliqPeer::NUMPAG)) $criteria->add(FcdetliqPeer::NUMPAG, $this->numpag);
		if ($this->isColumnModified(FcdetliqPeer::FECPAG)) $criteria->add(FcdetliqPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(FcdetliqPeer::RIFCON)) $criteria->add(FcdetliqPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcdetliqPeer::NOMCON)) $criteria->add(FcdetliqPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcdetliqPeer::DESPAG)) $criteria->add(FcdetliqPeer::DESPAG, $this->despag);
		if ($this->isColumnModified(FcdetliqPeer::MONPAG)) $criteria->add(FcdetliqPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(FcdetliqPeer::ID)) $criteria->add(FcdetliqPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdetliqPeer::DATABASE_NAME);

		$criteria->add(FcdetliqPeer::ID, $this->id);

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

		$copyObj->setNumliq($this->numliq);

		$copyObj->setNumpag($this->numpag);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDespag($this->despag);

		$copyObj->setMonpag($this->monpag);


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
			self::$peer = new FcdetliqPeer();
		}
		return self::$peer;
	}

	
	public function setFcliqpag($v)
	{


		if ($v === null) {
			$this->setNumliq(NULL);
		} else {
			$this->setNumliq($v->getNumliq());
		}


		$this->aFcliqpag = $v;
	}


	
	public function getFcliqpag($con = null)
	{
		if ($this->aFcliqpag === null && (($this->numliq !== "" && $this->numliq !== null))) {
						include_once 'lib/model/hacienda/om/BaseFcliqpagPeer.php';

      $c = new Criteria();
      $c->add(FcliqpagPeer::NUMLIQ,$this->numliq);
      
			$this->aFcliqpag = FcliqpagPeer::doSelectOne($c, $con);

			
		}
		return $this->aFcliqpag;
	}

	
	public function setFcpagos($v)
	{


		if ($v === null) {
			$this->setNumpag(NULL);
		} else {
			$this->setNumpag($v->getNumpag());
		}


		$this->aFcpagos = $v;
	}


	
	public function getFcpagos($con = null)
	{
		if ($this->aFcpagos === null && (($this->numpag !== "" && $this->numpag !== null))) {
						include_once 'lib/model/hacienda/om/BaseFcpagosPeer.php';

      $c = new Criteria();
      $c->add(FcpagosPeer::NUMPAG,$this->numpag);
      
			$this->aFcpagos = FcpagosPeer::doSelectOne($c, $con);

			
		}
		return $this->aFcpagos;
	}

	
	public function setFcconrep($v)
	{


		if ($v === null) {
			$this->setRifcon(NULL);
		} else {
			$this->setRifcon($v->getRifcon());
		}


		$this->aFcconrep = $v;
	}


	
	public function getFcconrep($con = null)
	{
		if ($this->aFcconrep === null && (($this->rifcon !== "" && $this->rifcon !== null))) {
						include_once 'lib/model/hacienda/om/BaseFcconrepPeer.php';

      $c = new Criteria();
      $c->add(FcconrepPeer::RIFCON,$this->rifcon);
      
			$this->aFcconrep = FcconrepPeer::doSelectOne($c, $con);

			
		}
		return $this->aFcconrep;
	}

} 