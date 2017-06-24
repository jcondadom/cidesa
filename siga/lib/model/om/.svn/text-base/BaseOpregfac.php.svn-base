<?php


abstract class BaseOpregfac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedrif;


	
	protected $numfac;


	
	protected $fecfac;


	
	protected $basimp;


	
	protected $moniva;


	
	protected $fecrec;


	
	protected $obsfac;


	
	protected $record = 'N';


	
	protected $fecrecord;


	
	protected $codubi;


	
	protected $id;

	
	protected $aOpbenefi;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNumfac()
  {

    return trim($this->numfac);

  }
  
  public function getFecfac($format = 'Y-m-d')
  {

    if ($this->fecfac === null || $this->fecfac === '') {
      return null;
    } elseif (!is_int($this->fecfac)) {
            $ts = adodb_strtotime($this->fecfac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfac] as date/time value: " . var_export($this->fecfac, true));
      }
    } else {
      $ts = $this->fecfac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getBasimp($val=false)
  {

    if($val) return number_format($this->basimp,2,',','.');
    else return $this->basimp;

  }
  
  public function getMoniva($val=false)
  {

    if($val) return number_format($this->moniva,2,',','.');
    else return $this->moniva;

  }
  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getObsfac()
  {

    return trim($this->obsfac);

  }
  
  public function getRecord()
  {

    return trim($this->record);

  }
  
  public function getFecrecord($format = 'Y-m-d')
  {

    if ($this->fecrecord === null || $this->fecrecord === '') {
      return null;
    } elseif (!is_int($this->fecrecord)) {
            $ts = adodb_strtotime($this->fecrecord);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrecord] as date/time value: " . var_export($this->fecrecord, true));
      }
    } else {
      $ts = $this->fecrecord;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = OpregfacPeer::CEDRIF;
      }
  
		if ($this->aOpbenefi !== null && $this->aOpbenefi->getCedrif() !== $v) {
			$this->aOpbenefi = null;
		}

	} 
	
	public function setNumfac($v)
	{

    if ($this->numfac !== $v) {
        $this->numfac = $v;
        $this->modifiedColumns[] = OpregfacPeer::NUMFAC;
      }
  
	} 
	
	public function setFecfac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfac !== $ts) {
      $this->fecfac = $ts;
      $this->modifiedColumns[] = OpregfacPeer::FECFAC;
    }

	} 
	
	public function setBasimp($v)
	{

    if ($this->basimp !== $v) {
        $this->basimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpregfacPeer::BASIMP;
      }
  
	} 
	
	public function setMoniva($v)
	{

    if ($this->moniva !== $v) {
        $this->moniva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpregfacPeer::MONIVA;
      }
  
	} 
	
	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = OpregfacPeer::FECREC;
    }

	} 
	
	public function setObsfac($v)
	{

    if ($this->obsfac !== $v) {
        $this->obsfac = $v;
        $this->modifiedColumns[] = OpregfacPeer::OBSFAC;
      }
  
	} 
	
	public function setRecord($v)
	{

    if ($this->record !== $v || $v === 'N') {
        $this->record = $v;
        $this->modifiedColumns[] = OpregfacPeer::RECORD;
      }
  
	} 
	
	public function setFecrecord($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrecord] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrecord !== $ts) {
      $this->fecrecord = $ts;
      $this->modifiedColumns[] = OpregfacPeer::FECRECORD;
    }

	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = OpregfacPeer::CODUBI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpregfacPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedrif = $rs->getString($startcol + 0);

      $this->numfac = $rs->getString($startcol + 1);

      $this->fecfac = $rs->getDate($startcol + 2, null);

      $this->basimp = $rs->getFloat($startcol + 3);

      $this->moniva = $rs->getFloat($startcol + 4);

      $this->fecrec = $rs->getDate($startcol + 5, null);

      $this->obsfac = $rs->getString($startcol + 6);

      $this->record = $rs->getString($startcol + 7);

      $this->fecrecord = $rs->getDate($startcol + 8, null);

      $this->codubi = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opregfac object", $e);
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
			$con = Propel::getConnection(OpregfacPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpregfacPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpregfacPeer::DATABASE_NAME);
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


												
			if ($this->aOpbenefi !== null) {
				if ($this->aOpbenefi->isModified()) {
					$affectedRows += $this->aOpbenefi->save($con);
				}
				$this->setOpbenefi($this->aOpbenefi);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OpregfacPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpregfacPeer::doUpdate($this, $con);
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


												
			if ($this->aOpbenefi !== null) {
				if (!$this->aOpbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOpbenefi->getValidationFailures());
				}
			}


			if (($retval = OpregfacPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpregfacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedrif();
				break;
			case 1:
				return $this->getNumfac();
				break;
			case 2:
				return $this->getFecfac();
				break;
			case 3:
				return $this->getBasimp();
				break;
			case 4:
				return $this->getMoniva();
				break;
			case 5:
				return $this->getFecrec();
				break;
			case 6:
				return $this->getObsfac();
				break;
			case 7:
				return $this->getRecord();
				break;
			case 8:
				return $this->getFecrecord();
				break;
			case 9:
				return $this->getCodubi();
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
		$keys = OpregfacPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedrif(),
			$keys[1] => $this->getNumfac(),
			$keys[2] => $this->getFecfac(),
			$keys[3] => $this->getBasimp(),
			$keys[4] => $this->getMoniva(),
			$keys[5] => $this->getFecrec(),
			$keys[6] => $this->getObsfac(),
			$keys[7] => $this->getRecord(),
			$keys[8] => $this->getFecrecord(),
			$keys[9] => $this->getCodubi(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpregfacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedrif($value);
				break;
			case 1:
				$this->setNumfac($value);
				break;
			case 2:
				$this->setFecfac($value);
				break;
			case 3:
				$this->setBasimp($value);
				break;
			case 4:
				$this->setMoniva($value);
				break;
			case 5:
				$this->setFecrec($value);
				break;
			case 6:
				$this->setObsfac($value);
				break;
			case 7:
				$this->setRecord($value);
				break;
			case 8:
				$this->setFecrecord($value);
				break;
			case 9:
				$this->setCodubi($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpregfacPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedrif($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumfac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecfac($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setBasimp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMoniva($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecrec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setObsfac($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRecord($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecrecord($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodubi($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpregfacPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpregfacPeer::CEDRIF)) $criteria->add(OpregfacPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(OpregfacPeer::NUMFAC)) $criteria->add(OpregfacPeer::NUMFAC, $this->numfac);
		if ($this->isColumnModified(OpregfacPeer::FECFAC)) $criteria->add(OpregfacPeer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(OpregfacPeer::BASIMP)) $criteria->add(OpregfacPeer::BASIMP, $this->basimp);
		if ($this->isColumnModified(OpregfacPeer::MONIVA)) $criteria->add(OpregfacPeer::MONIVA, $this->moniva);
		if ($this->isColumnModified(OpregfacPeer::FECREC)) $criteria->add(OpregfacPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(OpregfacPeer::OBSFAC)) $criteria->add(OpregfacPeer::OBSFAC, $this->obsfac);
		if ($this->isColumnModified(OpregfacPeer::RECORD)) $criteria->add(OpregfacPeer::RECORD, $this->record);
		if ($this->isColumnModified(OpregfacPeer::FECRECORD)) $criteria->add(OpregfacPeer::FECRECORD, $this->fecrecord);
		if ($this->isColumnModified(OpregfacPeer::CODUBI)) $criteria->add(OpregfacPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(OpregfacPeer::ID)) $criteria->add(OpregfacPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpregfacPeer::DATABASE_NAME);

		$criteria->add(OpregfacPeer::ID, $this->id);

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

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNumfac($this->numfac);

		$copyObj->setFecfac($this->fecfac);

		$copyObj->setBasimp($this->basimp);

		$copyObj->setMoniva($this->moniva);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setObsfac($this->obsfac);

		$copyObj->setRecord($this->record);

		$copyObj->setFecrecord($this->fecrecord);

		$copyObj->setCodubi($this->codubi);


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
			self::$peer = new OpregfacPeer();
		}
		return self::$peer;
	}

	
	public function setOpbenefi($v)
	{


		if ($v === null) {
			$this->setCedrif(NULL);
		} else {
			$this->setCedrif($v->getCedrif());
		}


		$this->aOpbenefi = $v;
	}


	
	public function getOpbenefi($con = null)
	{
		if ($this->aOpbenefi === null && (($this->cedrif !== "" && $this->cedrif !== null))) {
						include_once 'lib/model/om/BaseOpbenefiPeer.php';

      $c = new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$this->cedrif);
      
			$this->aOpbenefi = OpbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aOpbenefi;
	}

} 