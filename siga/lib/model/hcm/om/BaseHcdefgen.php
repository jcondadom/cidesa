<?php


abstract class BaseHcdefgen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $hcmcob;


	
	protected $matcob;


	
	protected $odocob;


	
	protected $funcob;


	
	protected $fecvig;


	
	protected $codreem;


	
	protected $durcarava;


	
	protected $codreeo;


	
	protected $codramhcm;


	
	protected $codramgasfun;


	
	protected $notdef;


	
	protected $duraut;


	
	protected $firemp1;


	
	protected $firemp2;


	
	protected $fecha;


	
	protected $codpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getHcmcob($val=false)
  {

    if($val) return number_format($this->hcmcob,2,',','.');
    else return $this->hcmcob;

  }
  
  public function getMatcob($val=false)
  {

    if($val) return number_format($this->matcob,2,',','.');
    else return $this->matcob;

  }
  
  public function getOdocob($val=false)
  {

    if($val) return number_format($this->odocob,2,',','.');
    else return $this->odocob;

  }
  
  public function getFuncob($val=false)
  {

    if($val) return number_format($this->funcob,2,',','.');
    else return $this->funcob;

  }
  
  public function getFecvig($format = 'Y-m-d H:i:s')
  {

    if ($this->fecvig === null || $this->fecvig === '') {
      return null;
    } elseif (!is_int($this->fecvig)) {
            $ts = adodb_strtotime($this->fecvig);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvig] as date/time value: " . var_export($this->fecvig, true));
      }
    } else {
      $ts = $this->fecvig;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodreem()
  {

    return trim($this->codreem);

  }
  
  public function getDurcarava()
  {

    return $this->durcarava;

  }
  
  public function getCodreeo()
  {

    return trim($this->codreeo);

  }
  
  public function getCodramhcm()
  {

    return trim($this->codramhcm);

  }
  
  public function getCodramgasfun()
  {

    return trim($this->codramgasfun);

  }
  
  public function getNotdef()
  {

    return trim($this->notdef);

  }
  
  public function getDuraut()
  {

    return $this->duraut;

  }
  
  public function getFiremp1()
  {

    return trim($this->firemp1);

  }
  
  public function getFiremp2()
  {

    return trim($this->firemp2);

  }
  
  public function getFecha($format = 'Y-m-d H:i:s')
  {

    if ($this->fecha === null || $this->fecha === '') {
      return null;
    } elseif (!is_int($this->fecha)) {
            $ts = adodb_strtotime($this->fecha);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
      }
    } else {
      $ts = $this->fecha;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setHcmcob($v)
	{

    if ($this->hcmcob !== $v) {
        $this->hcmcob = Herramientas::toFloat($v);
        $this->modifiedColumns[] = HcdefgenPeer::HCMCOB;
      }
  
	} 
	
	public function setMatcob($v)
	{

    if ($this->matcob !== $v) {
        $this->matcob = Herramientas::toFloat($v);
        $this->modifiedColumns[] = HcdefgenPeer::MATCOB;
      }
  
	} 
	
	public function setOdocob($v)
	{

    if ($this->odocob !== $v) {
        $this->odocob = Herramientas::toFloat($v);
        $this->modifiedColumns[] = HcdefgenPeer::ODOCOB;
      }
  
	} 
	
	public function setFuncob($v)
	{

    if ($this->funcob !== $v) {
        $this->funcob = Herramientas::toFloat($v);
        $this->modifiedColumns[] = HcdefgenPeer::FUNCOB;
      }
  
	} 
	
	public function setFecvig($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvig] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvig !== $ts) {
      $this->fecvig = $ts;
      $this->modifiedColumns[] = HcdefgenPeer::FECVIG;
    }

	} 
	
	public function setCodreem($v)
	{

    if ($this->codreem !== $v) {
        $this->codreem = $v;
        $this->modifiedColumns[] = HcdefgenPeer::CODREEM;
      }
  
	} 
	
	public function setDurcarava($v)
	{

    if ($this->durcarava !== $v) {
        $this->durcarava = $v;
        $this->modifiedColumns[] = HcdefgenPeer::DURCARAVA;
      }
  
	} 
	
	public function setCodreeo($v)
	{

    if ($this->codreeo !== $v) {
        $this->codreeo = $v;
        $this->modifiedColumns[] = HcdefgenPeer::CODREEO;
      }
  
	} 
	
	public function setCodramhcm($v)
	{

    if ($this->codramhcm !== $v) {
        $this->codramhcm = $v;
        $this->modifiedColumns[] = HcdefgenPeer::CODRAMHCM;
      }
  
	} 
	
	public function setCodramgasfun($v)
	{

    if ($this->codramgasfun !== $v) {
        $this->codramgasfun = $v;
        $this->modifiedColumns[] = HcdefgenPeer::CODRAMGASFUN;
      }
  
	} 
	
	public function setNotdef($v)
	{

    if ($this->notdef !== $v) {
        $this->notdef = $v;
        $this->modifiedColumns[] = HcdefgenPeer::NOTDEF;
      }
  
	} 
	
	public function setDuraut($v)
	{

    if ($this->duraut !== $v) {
        $this->duraut = $v;
        $this->modifiedColumns[] = HcdefgenPeer::DURAUT;
      }
  
	} 
	
	public function setFiremp1($v)
	{

    if ($this->firemp1 !== $v) {
        $this->firemp1 = $v;
        $this->modifiedColumns[] = HcdefgenPeer::FIREMP1;
      }
  
	} 
	
	public function setFiremp2($v)
	{

    if ($this->firemp2 !== $v) {
        $this->firemp2 = $v;
        $this->modifiedColumns[] = HcdefgenPeer::FIREMP2;
      }
  
	} 
	
	public function setFecha($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = HcdefgenPeer::FECHA;
    }

	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = HcdefgenPeer::CODPRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = HcdefgenPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->hcmcob = $rs->getFloat($startcol + 0);

      $this->matcob = $rs->getFloat($startcol + 1);

      $this->odocob = $rs->getFloat($startcol + 2);

      $this->funcob = $rs->getFloat($startcol + 3);

      $this->fecvig = $rs->getTimestamp($startcol + 4, null);

      $this->codreem = $rs->getString($startcol + 5);

      $this->durcarava = $rs->getInt($startcol + 6);

      $this->codreeo = $rs->getString($startcol + 7);

      $this->codramhcm = $rs->getString($startcol + 8);

      $this->codramgasfun = $rs->getString($startcol + 9);

      $this->notdef = $rs->getString($startcol + 10);

      $this->duraut = $rs->getInt($startcol + 11);

      $this->firemp1 = $rs->getString($startcol + 12);

      $this->firemp2 = $rs->getString($startcol + 13);

      $this->fecha = $rs->getTimestamp($startcol + 14, null);

      $this->codpre = $rs->getString($startcol + 15);

      $this->id = $rs->getInt($startcol + 16);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 17; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Hcdefgen object", $e);
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
			$con = Propel::getConnection(HcdefgenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HcdefgenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HcdefgenPeer::DATABASE_NAME);
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
					$pk = HcdefgenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HcdefgenPeer::doUpdate($this, $con);
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


			if (($retval = HcdefgenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HcdefgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getHcmcob();
				break;
			case 1:
				return $this->getMatcob();
				break;
			case 2:
				return $this->getOdocob();
				break;
			case 3:
				return $this->getFuncob();
				break;
			case 4:
				return $this->getFecvig();
				break;
			case 5:
				return $this->getCodreem();
				break;
			case 6:
				return $this->getDurcarava();
				break;
			case 7:
				return $this->getCodreeo();
				break;
			case 8:
				return $this->getCodramhcm();
				break;
			case 9:
				return $this->getCodramgasfun();
				break;
			case 10:
				return $this->getNotdef();
				break;
			case 11:
				return $this->getDuraut();
				break;
			case 12:
				return $this->getFiremp1();
				break;
			case 13:
				return $this->getFiremp2();
				break;
			case 14:
				return $this->getFecha();
				break;
			case 15:
				return $this->getCodpre();
				break;
			case 16:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HcdefgenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getHcmcob(),
			$keys[1] => $this->getMatcob(),
			$keys[2] => $this->getOdocob(),
			$keys[3] => $this->getFuncob(),
			$keys[4] => $this->getFecvig(),
			$keys[5] => $this->getCodreem(),
			$keys[6] => $this->getDurcarava(),
			$keys[7] => $this->getCodreeo(),
			$keys[8] => $this->getCodramhcm(),
			$keys[9] => $this->getCodramgasfun(),
			$keys[10] => $this->getNotdef(),
			$keys[11] => $this->getDuraut(),
			$keys[12] => $this->getFiremp1(),
			$keys[13] => $this->getFiremp2(),
			$keys[14] => $this->getFecha(),
			$keys[15] => $this->getCodpre(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HcdefgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setHcmcob($value);
				break;
			case 1:
				$this->setMatcob($value);
				break;
			case 2:
				$this->setOdocob($value);
				break;
			case 3:
				$this->setFuncob($value);
				break;
			case 4:
				$this->setFecvig($value);
				break;
			case 5:
				$this->setCodreem($value);
				break;
			case 6:
				$this->setDurcarava($value);
				break;
			case 7:
				$this->setCodreeo($value);
				break;
			case 8:
				$this->setCodramhcm($value);
				break;
			case 9:
				$this->setCodramgasfun($value);
				break;
			case 10:
				$this->setNotdef($value);
				break;
			case 11:
				$this->setDuraut($value);
				break;
			case 12:
				$this->setFiremp1($value);
				break;
			case 13:
				$this->setFiremp2($value);
				break;
			case 14:
				$this->setFecha($value);
				break;
			case 15:
				$this->setCodpre($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HcdefgenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setHcmcob($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMatcob($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOdocob($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFuncob($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecvig($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodreem($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDurcarava($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodreeo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodramhcm($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodramgasfun($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNotdef($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDuraut($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFiremp1($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFiremp2($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecha($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodpre($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HcdefgenPeer::DATABASE_NAME);

		if ($this->isColumnModified(HcdefgenPeer::HCMCOB)) $criteria->add(HcdefgenPeer::HCMCOB, $this->hcmcob);
		if ($this->isColumnModified(HcdefgenPeer::MATCOB)) $criteria->add(HcdefgenPeer::MATCOB, $this->matcob);
		if ($this->isColumnModified(HcdefgenPeer::ODOCOB)) $criteria->add(HcdefgenPeer::ODOCOB, $this->odocob);
		if ($this->isColumnModified(HcdefgenPeer::FUNCOB)) $criteria->add(HcdefgenPeer::FUNCOB, $this->funcob);
		if ($this->isColumnModified(HcdefgenPeer::FECVIG)) $criteria->add(HcdefgenPeer::FECVIG, $this->fecvig);
		if ($this->isColumnModified(HcdefgenPeer::CODREEM)) $criteria->add(HcdefgenPeer::CODREEM, $this->codreem);
		if ($this->isColumnModified(HcdefgenPeer::DURCARAVA)) $criteria->add(HcdefgenPeer::DURCARAVA, $this->durcarava);
		if ($this->isColumnModified(HcdefgenPeer::CODREEO)) $criteria->add(HcdefgenPeer::CODREEO, $this->codreeo);
		if ($this->isColumnModified(HcdefgenPeer::CODRAMHCM)) $criteria->add(HcdefgenPeer::CODRAMHCM, $this->codramhcm);
		if ($this->isColumnModified(HcdefgenPeer::CODRAMGASFUN)) $criteria->add(HcdefgenPeer::CODRAMGASFUN, $this->codramgasfun);
		if ($this->isColumnModified(HcdefgenPeer::NOTDEF)) $criteria->add(HcdefgenPeer::NOTDEF, $this->notdef);
		if ($this->isColumnModified(HcdefgenPeer::DURAUT)) $criteria->add(HcdefgenPeer::DURAUT, $this->duraut);
		if ($this->isColumnModified(HcdefgenPeer::FIREMP1)) $criteria->add(HcdefgenPeer::FIREMP1, $this->firemp1);
		if ($this->isColumnModified(HcdefgenPeer::FIREMP2)) $criteria->add(HcdefgenPeer::FIREMP2, $this->firemp2);
		if ($this->isColumnModified(HcdefgenPeer::FECHA)) $criteria->add(HcdefgenPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(HcdefgenPeer::CODPRE)) $criteria->add(HcdefgenPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(HcdefgenPeer::ID)) $criteria->add(HcdefgenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HcdefgenPeer::DATABASE_NAME);

		$criteria->add(HcdefgenPeer::ID, $this->id);

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

		$copyObj->setHcmcob($this->hcmcob);

		$copyObj->setMatcob($this->matcob);

		$copyObj->setOdocob($this->odocob);

		$copyObj->setFuncob($this->funcob);

		$copyObj->setFecvig($this->fecvig);

		$copyObj->setCodreem($this->codreem);

		$copyObj->setDurcarava($this->durcarava);

		$copyObj->setCodreeo($this->codreeo);

		$copyObj->setCodramhcm($this->codramhcm);

		$copyObj->setCodramgasfun($this->codramgasfun);

		$copyObj->setNotdef($this->notdef);

		$copyObj->setDuraut($this->duraut);

		$copyObj->setFiremp1($this->firemp1);

		$copyObj->setFiremp2($this->firemp2);

		$copyObj->setFecha($this->fecha);

		$copyObj->setCodpre($this->codpre);


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
			self::$peer = new HcdefgenPeer();
		}
		return self::$peer;
	}

} 