<?php


abstract class BaseLiasigdechis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $lisicact_id;


	
	protected $fecdecla;


	
	protected $detdecmod;


	
	protected $anapor;


	
	protected $anaporcar;


	
	protected $status;


	
	protected $numdoc;


	
	protected $tabla;


	
	protected $numdec;


	
	protected $tipconpub;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getFecdecla($format = 'Y-m-d')
  {

    if ($this->fecdecla === null || $this->fecdecla === '') {
      return null;
    } elseif (!is_int($this->fecdecla)) {
            $ts = adodb_strtotime($this->fecdecla);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdecla] as date/time value: " . var_export($this->fecdecla, true));
      }
    } else {
      $ts = $this->fecdecla;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDetdecmod()
  {

    return trim($this->detdecmod);

  }
  
  public function getAnapor()
  {

    return trim($this->anapor);

  }
  
  public function getAnaporcar()
  {

    return trim($this->anaporcar);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getNumdoc()
  {

    return trim($this->numdoc);

  }
  
  public function getTabla()
  {

    return trim($this->tabla);

  }
  
  public function getNumdec()
  {

    return $this->numdec;

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LiasigdechisPeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setFecdecla($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdecla] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdecla !== $ts) {
      $this->fecdecla = $ts;
      $this->modifiedColumns[] = LiasigdechisPeer::FECDECLA;
    }

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LiasigdechisPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LiasigdechisPeer::ANAPOR;
      }
  
	} 
	
	public function setAnaporcar($v)
	{

    if ($this->anaporcar !== $v) {
        $this->anaporcar = $v;
        $this->modifiedColumns[] = LiasigdechisPeer::ANAPORCAR;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LiasigdechisPeer::STATUS;
      }
  
	} 
	
	public function setNumdoc($v)
	{

    if ($this->numdoc !== $v) {
        $this->numdoc = $v;
        $this->modifiedColumns[] = LiasigdechisPeer::NUMDOC;
      }
  
	} 
	
	public function setTabla($v)
	{

    if ($this->tabla !== $v) {
        $this->tabla = $v;
        $this->modifiedColumns[] = LiasigdechisPeer::TABLA;
      }
  
	} 
	
	public function setNumdec($v)
	{

    if ($this->numdec !== $v) {
        $this->numdec = $v;
        $this->modifiedColumns[] = LiasigdechisPeer::NUMDEC;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LiasigdechisPeer::TIPCONPUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiasigdechisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->lisicact_id = $rs->getInt($startcol + 0);

      $this->fecdecla = $rs->getDate($startcol + 1, null);

      $this->detdecmod = $rs->getString($startcol + 2);

      $this->anapor = $rs->getString($startcol + 3);

      $this->anaporcar = $rs->getString($startcol + 4);

      $this->status = $rs->getString($startcol + 5);

      $this->numdoc = $rs->getString($startcol + 6);

      $this->tabla = $rs->getString($startcol + 7);

      $this->numdec = $rs->getInt($startcol + 8);

      $this->tipconpub = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liasigdechis object", $e);
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
			$con = Propel::getConnection(LiasigdechisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiasigdechisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiasigdechisPeer::DATABASE_NAME);
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


												
			if ($this->aLisicact !== null) {
				if ($this->aLisicact->isModified()) {
					$affectedRows += $this->aLisicact->save($con);
				}
				$this->setLisicact($this->aLisicact);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiasigdechisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiasigdechisPeer::doUpdate($this, $con);
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


												
			if ($this->aLisicact !== null) {
				if (!$this->aLisicact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLisicact->getValidationFailures());
				}
			}


			if (($retval = LiasigdechisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiasigdechisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLisicactId();
				break;
			case 1:
				return $this->getFecdecla();
				break;
			case 2:
				return $this->getDetdecmod();
				break;
			case 3:
				return $this->getAnapor();
				break;
			case 4:
				return $this->getAnaporcar();
				break;
			case 5:
				return $this->getStatus();
				break;
			case 6:
				return $this->getNumdoc();
				break;
			case 7:
				return $this->getTabla();
				break;
			case 8:
				return $this->getNumdec();
				break;
			case 9:
				return $this->getTipconpub();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiasigdechisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLisicactId(),
			$keys[1] => $this->getFecdecla(),
			$keys[2] => $this->getDetdecmod(),
			$keys[3] => $this->getAnapor(),
			$keys[4] => $this->getAnaporcar(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getNumdoc(),
			$keys[7] => $this->getTabla(),
			$keys[8] => $this->getNumdec(),
			$keys[9] => $this->getTipconpub(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiasigdechisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLisicactId($value);
				break;
			case 1:
				$this->setFecdecla($value);
				break;
			case 2:
				$this->setDetdecmod($value);
				break;
			case 3:
				$this->setAnapor($value);
				break;
			case 4:
				$this->setAnaporcar($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setNumdoc($value);
				break;
			case 7:
				$this->setTabla($value);
				break;
			case 8:
				$this->setNumdec($value);
				break;
			case 9:
				$this->setTipconpub($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiasigdechisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLisicactId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecdecla($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDetdecmod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnapor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAnaporcar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumdoc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTabla($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumdec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipconpub($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiasigdechisPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiasigdechisPeer::LISICACT_ID)) $criteria->add(LiasigdechisPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LiasigdechisPeer::FECDECLA)) $criteria->add(LiasigdechisPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LiasigdechisPeer::DETDECMOD)) $criteria->add(LiasigdechisPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LiasigdechisPeer::ANAPOR)) $criteria->add(LiasigdechisPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LiasigdechisPeer::ANAPORCAR)) $criteria->add(LiasigdechisPeer::ANAPORCAR, $this->anaporcar);
		if ($this->isColumnModified(LiasigdechisPeer::STATUS)) $criteria->add(LiasigdechisPeer::STATUS, $this->status);
		if ($this->isColumnModified(LiasigdechisPeer::NUMDOC)) $criteria->add(LiasigdechisPeer::NUMDOC, $this->numdoc);
		if ($this->isColumnModified(LiasigdechisPeer::TABLA)) $criteria->add(LiasigdechisPeer::TABLA, $this->tabla);
		if ($this->isColumnModified(LiasigdechisPeer::NUMDEC)) $criteria->add(LiasigdechisPeer::NUMDEC, $this->numdec);
		if ($this->isColumnModified(LiasigdechisPeer::TIPCONPUB)) $criteria->add(LiasigdechisPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LiasigdechisPeer::ID)) $criteria->add(LiasigdechisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiasigdechisPeer::DATABASE_NAME);

		$criteria->add(LiasigdechisPeer::ID, $this->id);

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

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setFecdecla($this->fecdecla);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setAnapor($this->anapor);

		$copyObj->setAnaporcar($this->anaporcar);

		$copyObj->setStatus($this->status);

		$copyObj->setNumdoc($this->numdoc);

		$copyObj->setTabla($this->tabla);

		$copyObj->setNumdec($this->numdec);

		$copyObj->setTipconpub($this->tipconpub);


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
			self::$peer = new LiasigdechisPeer();
		}
		return self::$peer;
	}

	
	public function setLisicact($v)
	{


		if ($v === null) {
			$this->setLisicactId(NULL);
		} else {
			$this->setLisicactId($v->getId());
		}


		$this->aLisicact = $v;
	}


	
	public function getLisicact($con = null)
	{
		if ($this->aLisicact === null && ($this->lisicact_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLisicactPeer.php';

      $c = new Criteria();
      $c->add(LisicactPeer::ID,$this->lisicact_id);
      
			$this->aLisicact = LisicactPeer::doSelectOne($c, $con);

			
		}
		return $this->aLisicact;
	}

} 