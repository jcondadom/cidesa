<?php


abstract class BaseUsuarios extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $loguse;


	
	protected $nomuse;


	
	protected $apluse;


	
	protected $numemp;


	
	protected $pasuse;


	
	protected $diremp;


	
	protected $telemp;


	
	protected $cedemp;


	
	protected $numuni;


	
	protected $codcat;


	
	protected $codniv;


	
	protected $codgru;


	
	protected $feccad;


	
	protected $stablo;


	
	protected $fecint;


	
	protected $conint;


	
	protected $esgeren = 'N';


	
	protected $id;

	
	protected $collSegperesps;

	
	protected $lastSegperespCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getNomuse()
  {

    return trim($this->nomuse);

  }
  
  public function getApluse()
  {

    return trim($this->apluse);

  }
  
  public function getNumemp()
  {

    return trim($this->numemp);

  }
  
  public function getPasuse()
  {

    return trim($this->pasuse);

  }
  
  public function getDiremp()
  {

    return trim($this->diremp);

  }
  
  public function getTelemp()
  {

    return trim($this->telemp);

  }
  
  public function getCedemp()
  {

    return trim($this->cedemp);

  }
  
  public function getNumuni()
  {

    return trim($this->numuni);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCodgru()
  {

    return trim($this->codgru);

  }
  
  public function getFeccad($format = 'Y-m-d')
  {

    if ($this->feccad === null || $this->feccad === '') {
      return null;
    } elseif (!is_int($this->feccad)) {
            $ts = adodb_strtotime($this->feccad);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccad] as date/time value: " . var_export($this->feccad, true));
      }
    } else {
      $ts = $this->feccad;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStablo()
  {

    return trim($this->stablo);

  }
  
  public function getFecint($format = 'Y-m-d')
  {

    if ($this->fecint === null || $this->fecint === '') {
      return null;
    } elseif (!is_int($this->fecint)) {
            $ts = adodb_strtotime($this->fecint);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecint] as date/time value: " . var_export($this->fecint, true));
      }
    } else {
      $ts = $this->fecint;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getConint()
  {

    return $this->conint;

  }
  
  public function getEsgeren()
  {

    return trim($this->esgeren);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = UsuariosPeer::LOGUSE;
      }
  
	} 
	
	public function setNomuse($v)
	{

    if ($this->nomuse !== $v) {
        $this->nomuse = $v;
        $this->modifiedColumns[] = UsuariosPeer::NOMUSE;
      }
  
	} 
	
	public function setApluse($v)
	{

    if ($this->apluse !== $v) {
        $this->apluse = $v;
        $this->modifiedColumns[] = UsuariosPeer::APLUSE;
      }
  
	} 
	
	public function setNumemp($v)
	{

    if ($this->numemp !== $v) {
        $this->numemp = $v;
        $this->modifiedColumns[] = UsuariosPeer::NUMEMP;
      }
  
	} 
	
	public function setPasuse($v)
	{

    if ($this->pasuse !== $v) {
        $this->pasuse = $v;
        $this->modifiedColumns[] = UsuariosPeer::PASUSE;
      }
  
	} 
	
	public function setDiremp($v)
	{

    if ($this->diremp !== $v) {
        $this->diremp = $v;
        $this->modifiedColumns[] = UsuariosPeer::DIREMP;
      }
  
	} 
	
	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = UsuariosPeer::TELEMP;
      }
  
	} 
	
	public function setCedemp($v)
	{

    if ($this->cedemp !== $v) {
        $this->cedemp = $v;
        $this->modifiedColumns[] = UsuariosPeer::CEDEMP;
      }
  
	} 
	
	public function setNumuni($v)
	{

    if ($this->numuni !== $v) {
        $this->numuni = $v;
        $this->modifiedColumns[] = UsuariosPeer::NUMUNI;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = UsuariosPeer::CODCAT;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = UsuariosPeer::CODNIV;
      }
  
	} 
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = UsuariosPeer::CODGRU;
      }
  
	} 
	
	public function setFeccad($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccad] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccad !== $ts) {
      $this->feccad = $ts;
      $this->modifiedColumns[] = UsuariosPeer::FECCAD;
    }

	} 
	
	public function setStablo($v)
	{

    if ($this->stablo !== $v) {
        $this->stablo = $v;
        $this->modifiedColumns[] = UsuariosPeer::STABLO;
      }
  
	} 
	
	public function setFecint($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecint] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecint !== $ts) {
      $this->fecint = $ts;
      $this->modifiedColumns[] = UsuariosPeer::FECINT;
    }

	} 
	
	public function setConint($v)
	{

    if ($this->conint !== $v) {
        $this->conint = $v;
        $this->modifiedColumns[] = UsuariosPeer::CONINT;
      }
  
	} 
	
	public function setEsgeren($v)
	{

    if ($this->esgeren !== $v || $v === 'N') {
        $this->esgeren = $v;
        $this->modifiedColumns[] = UsuariosPeer::ESGEREN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = UsuariosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->loguse = $rs->getString($startcol + 0);

      $this->nomuse = $rs->getString($startcol + 1);

      $this->apluse = $rs->getString($startcol + 2);

      $this->numemp = $rs->getString($startcol + 3);

      $this->pasuse = $rs->getString($startcol + 4);

      $this->diremp = $rs->getString($startcol + 5);

      $this->telemp = $rs->getString($startcol + 6);

      $this->cedemp = $rs->getString($startcol + 7);

      $this->numuni = $rs->getString($startcol + 8);

      $this->codcat = $rs->getString($startcol + 9);

      $this->codniv = $rs->getString($startcol + 10);

      $this->codgru = $rs->getString($startcol + 11);

      $this->feccad = $rs->getDate($startcol + 12, null);

      $this->stablo = $rs->getString($startcol + 13);

      $this->fecint = $rs->getDate($startcol + 14, null);

      $this->conint = $rs->getInt($startcol + 15);

      $this->esgeren = $rs->getString($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Usuarios object", $e);
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
			$con = Propel::getConnection(UsuariosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			UsuariosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(UsuariosPeer::DATABASE_NAME);
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
					$pk = UsuariosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += UsuariosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collSegperesps !== null) {
				foreach($this->collSegperesps as $referrerFK) {
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


			if (($retval = UsuariosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSegperesps !== null) {
					foreach($this->collSegperesps as $referrerFK) {
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
		$pos = UsuariosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLoguse();
				break;
			case 1:
				return $this->getNomuse();
				break;
			case 2:
				return $this->getApluse();
				break;
			case 3:
				return $this->getNumemp();
				break;
			case 4:
				return $this->getPasuse();
				break;
			case 5:
				return $this->getDiremp();
				break;
			case 6:
				return $this->getTelemp();
				break;
			case 7:
				return $this->getCedemp();
				break;
			case 8:
				return $this->getNumuni();
				break;
			case 9:
				return $this->getCodcat();
				break;
			case 10:
				return $this->getCodniv();
				break;
			case 11:
				return $this->getCodgru();
				break;
			case 12:
				return $this->getFeccad();
				break;
			case 13:
				return $this->getStablo();
				break;
			case 14:
				return $this->getFecint();
				break;
			case 15:
				return $this->getConint();
				break;
			case 16:
				return $this->getEsgeren();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsuariosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLoguse(),
			$keys[1] => $this->getNomuse(),
			$keys[2] => $this->getApluse(),
			$keys[3] => $this->getNumemp(),
			$keys[4] => $this->getPasuse(),
			$keys[5] => $this->getDiremp(),
			$keys[6] => $this->getTelemp(),
			$keys[7] => $this->getCedemp(),
			$keys[8] => $this->getNumuni(),
			$keys[9] => $this->getCodcat(),
			$keys[10] => $this->getCodniv(),
			$keys[11] => $this->getCodgru(),
			$keys[12] => $this->getFeccad(),
			$keys[13] => $this->getStablo(),
			$keys[14] => $this->getFecint(),
			$keys[15] => $this->getConint(),
			$keys[16] => $this->getEsgeren(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UsuariosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLoguse($value);
				break;
			case 1:
				$this->setNomuse($value);
				break;
			case 2:
				$this->setApluse($value);
				break;
			case 3:
				$this->setNumemp($value);
				break;
			case 4:
				$this->setPasuse($value);
				break;
			case 5:
				$this->setDiremp($value);
				break;
			case 6:
				$this->setTelemp($value);
				break;
			case 7:
				$this->setCedemp($value);
				break;
			case 8:
				$this->setNumuni($value);
				break;
			case 9:
				$this->setCodcat($value);
				break;
			case 10:
				$this->setCodniv($value);
				break;
			case 11:
				$this->setCodgru($value);
				break;
			case 12:
				$this->setFeccad($value);
				break;
			case 13:
				$this->setStablo($value);
				break;
			case 14:
				$this->setFecint($value);
				break;
			case 15:
				$this->setConint($value);
				break;
			case 16:
				$this->setEsgeren($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UsuariosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLoguse($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomuse($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApluse($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPasuse($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiremp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTelemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCedemp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumuni($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodcat($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodniv($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodgru($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFeccad($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStablo($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecint($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setConint($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEsgeren($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(UsuariosPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsuariosPeer::LOGUSE)) $criteria->add(UsuariosPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(UsuariosPeer::NOMUSE)) $criteria->add(UsuariosPeer::NOMUSE, $this->nomuse);
		if ($this->isColumnModified(UsuariosPeer::APLUSE)) $criteria->add(UsuariosPeer::APLUSE, $this->apluse);
		if ($this->isColumnModified(UsuariosPeer::NUMEMP)) $criteria->add(UsuariosPeer::NUMEMP, $this->numemp);
		if ($this->isColumnModified(UsuariosPeer::PASUSE)) $criteria->add(UsuariosPeer::PASUSE, $this->pasuse);
		if ($this->isColumnModified(UsuariosPeer::DIREMP)) $criteria->add(UsuariosPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(UsuariosPeer::TELEMP)) $criteria->add(UsuariosPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(UsuariosPeer::CEDEMP)) $criteria->add(UsuariosPeer::CEDEMP, $this->cedemp);
		if ($this->isColumnModified(UsuariosPeer::NUMUNI)) $criteria->add(UsuariosPeer::NUMUNI, $this->numuni);
		if ($this->isColumnModified(UsuariosPeer::CODCAT)) $criteria->add(UsuariosPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(UsuariosPeer::CODNIV)) $criteria->add(UsuariosPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(UsuariosPeer::CODGRU)) $criteria->add(UsuariosPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(UsuariosPeer::FECCAD)) $criteria->add(UsuariosPeer::FECCAD, $this->feccad);
		if ($this->isColumnModified(UsuariosPeer::STABLO)) $criteria->add(UsuariosPeer::STABLO, $this->stablo);
		if ($this->isColumnModified(UsuariosPeer::FECINT)) $criteria->add(UsuariosPeer::FECINT, $this->fecint);
		if ($this->isColumnModified(UsuariosPeer::CONINT)) $criteria->add(UsuariosPeer::CONINT, $this->conint);
		if ($this->isColumnModified(UsuariosPeer::ESGEREN)) $criteria->add(UsuariosPeer::ESGEREN, $this->esgeren);
		if ($this->isColumnModified(UsuariosPeer::ID)) $criteria->add(UsuariosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UsuariosPeer::DATABASE_NAME);

		$criteria->add(UsuariosPeer::ID, $this->id);

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

		$copyObj->setLoguse($this->loguse);

		$copyObj->setNomuse($this->nomuse);

		$copyObj->setApluse($this->apluse);

		$copyObj->setNumemp($this->numemp);

		$copyObj->setPasuse($this->pasuse);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setCedemp($this->cedemp);

		$copyObj->setNumuni($this->numuni);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodgru($this->codgru);

		$copyObj->setFeccad($this->feccad);

		$copyObj->setStablo($this->stablo);

		$copyObj->setFecint($this->fecint);

		$copyObj->setConint($this->conint);

		$copyObj->setEsgeren($this->esgeren);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getSegperesps() as $relObj) {
				$copyObj->addSegperesp($relObj->copy($deepCopy));
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
			self::$peer = new UsuariosPeer();
		}
		return self::$peer;
	}

	
	public function initSegperesps()
	{
		if ($this->collSegperesps === null) {
			$this->collSegperesps = array();
		}
	}

	
	public function getSegperesps($criteria = null, $con = null)
	{
				include_once 'lib/model/sima_user/om/BaseSegperespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSegperesps === null) {
			if ($this->isNew()) {
			   $this->collSegperesps = array();
			} else {

				$criteria->add(SegperespPeer::CEDEMP, $this->getCedemp());

				SegperespPeer::addSelectColumns($criteria);
				$this->collSegperesps = SegperespPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SegperespPeer::CEDEMP, $this->getCedemp());

				SegperespPeer::addSelectColumns($criteria);
				if (!isset($this->lastSegperespCriteria) || !$this->lastSegperespCriteria->equals($criteria)) {
					$this->collSegperesps = SegperespPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSegperespCriteria = $criteria;
		return $this->collSegperesps;
	}

	
	public function countSegperesps($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/sima_user/om/BaseSegperespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SegperespPeer::CEDEMP, $this->getCedemp());

		return SegperespPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSegperesp(Segperesp $l)
	{
		$this->collSegperesps[] = $l;
		$l->setUsuarios($this);
	}

} 