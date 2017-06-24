<?php


abstract class BaseCaevadespro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codeva;


	
	protected $feceva;


	
	protected $codpro;


	
	protected $clapro;


	
	protected $observ;


	
	protected $codniv;


	
	protected $loguse;


	
	protected $id;

	
	protected $aCaprovee;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodeva()
  {

    return trim($this->codeva);

  }
  
  public function getFeceva($format = 'Y-m-d')
  {

    if ($this->feceva === null || $this->feceva === '') {
      return null;
    } elseif (!is_int($this->feceva)) {
            $ts = adodb_strtotime($this->feceva);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feceva] as date/time value: " . var_export($this->feceva, true));
      }
    } else {
      $ts = $this->feceva;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getClapro()
  {

    return trim($this->clapro);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodeva($v)
	{

    if ($this->codeva !== $v) {
        $this->codeva = $v;
        $this->modifiedColumns[] = CaevadesproPeer::CODEVA;
      }
  
	} 
	
	public function setFeceva($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feceva] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feceva !== $ts) {
      $this->feceva = $ts;
      $this->modifiedColumns[] = CaevadesproPeer::FECEVA;
    }

	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = CaevadesproPeer::CODPRO;
      }
  
		if ($this->aCaprovee !== null && $this->aCaprovee->getCodpro() !== $v) {
			$this->aCaprovee = null;
		}

	} 
	
	public function setClapro($v)
	{

    if ($this->clapro !== $v) {
        $this->clapro = $v;
        $this->modifiedColumns[] = CaevadesproPeer::CLAPRO;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CaevadesproPeer::OBSERV;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = CaevadesproPeer::CODNIV;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = CaevadesproPeer::LOGUSE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaevadesproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codeva = $rs->getString($startcol + 0);

      $this->feceva = $rs->getDate($startcol + 1, null);

      $this->codpro = $rs->getString($startcol + 2);

      $this->clapro = $rs->getString($startcol + 3);

      $this->observ = $rs->getString($startcol + 4);

      $this->codniv = $rs->getString($startcol + 5);

      $this->loguse = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caevadespro object", $e);
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
			$con = Propel::getConnection(CaevadesproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaevadesproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaevadesproPeer::DATABASE_NAME);
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


												
			if ($this->aCaprovee !== null) {
				if ($this->aCaprovee->isModified()) {
					$affectedRows += $this->aCaprovee->save($con);
				}
				$this->setCaprovee($this->aCaprovee);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CaevadesproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaevadesproPeer::doUpdate($this, $con);
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


												
			if ($this->aCaprovee !== null) {
				if (!$this->aCaprovee->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCaprovee->getValidationFailures());
				}
			}


			if (($retval = CaevadesproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaevadesproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodeva();
				break;
			case 1:
				return $this->getFeceva();
				break;
			case 2:
				return $this->getCodpro();
				break;
			case 3:
				return $this->getClapro();
				break;
			case 4:
				return $this->getObserv();
				break;
			case 5:
				return $this->getCodniv();
				break;
			case 6:
				return $this->getLoguse();
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
		$keys = CaevadesproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodeva(),
			$keys[1] => $this->getFeceva(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getClapro(),
			$keys[4] => $this->getObserv(),
			$keys[5] => $this->getCodniv(),
			$keys[6] => $this->getLoguse(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaevadesproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodeva($value);
				break;
			case 1:
				$this->setFeceva($value);
				break;
			case 2:
				$this->setCodpro($value);
				break;
			case 3:
				$this->setClapro($value);
				break;
			case 4:
				$this->setObserv($value);
				break;
			case 5:
				$this->setCodniv($value);
				break;
			case 6:
				$this->setLoguse($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaevadesproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodeva($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeceva($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setClapro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObserv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodniv($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLoguse($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaevadesproPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaevadesproPeer::CODEVA)) $criteria->add(CaevadesproPeer::CODEVA, $this->codeva);
		if ($this->isColumnModified(CaevadesproPeer::FECEVA)) $criteria->add(CaevadesproPeer::FECEVA, $this->feceva);
		if ($this->isColumnModified(CaevadesproPeer::CODPRO)) $criteria->add(CaevadesproPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CaevadesproPeer::CLAPRO)) $criteria->add(CaevadesproPeer::CLAPRO, $this->clapro);
		if ($this->isColumnModified(CaevadesproPeer::OBSERV)) $criteria->add(CaevadesproPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CaevadesproPeer::CODNIV)) $criteria->add(CaevadesproPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(CaevadesproPeer::LOGUSE)) $criteria->add(CaevadesproPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(CaevadesproPeer::ID)) $criteria->add(CaevadesproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaevadesproPeer::DATABASE_NAME);

		$criteria->add(CaevadesproPeer::ID, $this->id);

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

		$copyObj->setCodeva($this->codeva);

		$copyObj->setFeceva($this->feceva);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setClapro($this->clapro);

		$copyObj->setObserv($this->observ);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setLoguse($this->loguse);


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
			self::$peer = new CaevadesproPeer();
		}
		return self::$peer;
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