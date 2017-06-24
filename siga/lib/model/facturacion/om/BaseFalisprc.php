<?php


abstract class BaseFalisprc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprg;


	
	protected $codtipcli;


	
	protected $conpag_id;


	
	protected $codart;


	
	protected $precio;


	
	protected $fecvig;


	
	protected $id;

	
	protected $aFadefprg;

	
	protected $aFatipcte;

	
	protected $aFaconpag;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodprg()
  {

    return trim($this->codprg);

  }
  
  public function getCodtipcli()
  {

    return trim($this->codtipcli);

  }
  
  public function getConpagId()
  {

    return $this->conpag_id;

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getPrecio($val=false)
  {

    if($val) return number_format($this->precio,2,',','.');
    else return $this->precio;

  }
  
  public function getFecvig($format = 'Y-m-d')
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

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodprg($v)
	{

    if ($this->codprg !== $v) {
        $this->codprg = $v;
        $this->modifiedColumns[] = FalisprcPeer::CODPRG;
      }
  
		if ($this->aFadefprg !== null && $this->aFadefprg->getCodprg() !== $v) {
			$this->aFadefprg = null;
		}

	} 
	
	public function setCodtipcli($v)
	{

    if ($this->codtipcli !== $v) {
        $this->codtipcli = $v;
        $this->modifiedColumns[] = FalisprcPeer::CODTIPCLI;
      }
  
		if ($this->aFatipcte !== null && $this->aFatipcte->getId() !== $v) {
			$this->aFatipcte = null;
		}

	} 
	
	public function setConpagId($v)
	{

    if ($this->conpag_id !== $v) {
        $this->conpag_id = $v;
        $this->modifiedColumns[] = FalisprcPeer::CONPAG_ID;
      }
  
		if ($this->aFaconpag !== null && $this->aFaconpag->getId() !== $v) {
			$this->aFaconpag = null;
		}

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FalisprcPeer::CODART;
      }
  
	} 
	
	public function setPrecio($v)
	{

    if ($this->precio !== $v) {
        $this->precio = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FalisprcPeer::PRECIO;
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
      $this->modifiedColumns[] = FalisprcPeer::FECVIG;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FalisprcPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codprg = $rs->getString($startcol + 0);

      $this->codtipcli = $rs->getString($startcol + 1);

      $this->conpag_id = $rs->getInt($startcol + 2);

      $this->codart = $rs->getString($startcol + 3);

      $this->precio = $rs->getFloat($startcol + 4);

      $this->fecvig = $rs->getDate($startcol + 5, null);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Falisprc object", $e);
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
			$con = Propel::getConnection(FalisprcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FalisprcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FalisprcPeer::DATABASE_NAME);
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


												
			if ($this->aFadefprg !== null) {
				if ($this->aFadefprg->isModified()) {
					$affectedRows += $this->aFadefprg->save($con);
				}
				$this->setFadefprg($this->aFadefprg);
			}

			if ($this->aFatipcte !== null) {
				if ($this->aFatipcte->isModified()) {
					$affectedRows += $this->aFatipcte->save($con);
				}
				$this->setFatipcte($this->aFatipcte);
			}

			if ($this->aFaconpag !== null) {
				if ($this->aFaconpag->isModified()) {
					$affectedRows += $this->aFaconpag->save($con);
				}
				$this->setFaconpag($this->aFaconpag);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FalisprcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FalisprcPeer::doUpdate($this, $con);
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


												
			if ($this->aFadefprg !== null) {
				if (!$this->aFadefprg->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFadefprg->getValidationFailures());
				}
			}

			if ($this->aFatipcte !== null) {
				if (!$this->aFatipcte->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFatipcte->getValidationFailures());
				}
			}

			if ($this->aFaconpag !== null) {
				if (!$this->aFaconpag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaconpag->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}


			if (($retval = FalisprcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FalisprcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodprg();
				break;
			case 1:
				return $this->getCodtipcli();
				break;
			case 2:
				return $this->getConpagId();
				break;
			case 3:
				return $this->getCodart();
				break;
			case 4:
				return $this->getPrecio();
				break;
			case 5:
				return $this->getFecvig();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FalisprcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprg(),
			$keys[1] => $this->getCodtipcli(),
			$keys[2] => $this->getConpagId(),
			$keys[3] => $this->getCodart(),
			$keys[4] => $this->getPrecio(),
			$keys[5] => $this->getFecvig(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FalisprcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodprg($value);
				break;
			case 1:
				$this->setCodtipcli($value);
				break;
			case 2:
				$this->setConpagId($value);
				break;
			case 3:
				$this->setCodart($value);
				break;
			case 4:
				$this->setPrecio($value);
				break;
			case 5:
				$this->setFecvig($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FalisprcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodtipcli($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setConpagId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPrecio($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecvig($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FalisprcPeer::DATABASE_NAME);

		if ($this->isColumnModified(FalisprcPeer::CODPRG)) $criteria->add(FalisprcPeer::CODPRG, $this->codprg);
		if ($this->isColumnModified(FalisprcPeer::CODTIPCLI)) $criteria->add(FalisprcPeer::CODTIPCLI, $this->codtipcli);
		if ($this->isColumnModified(FalisprcPeer::CONPAG_ID)) $criteria->add(FalisprcPeer::CONPAG_ID, $this->conpag_id);
		if ($this->isColumnModified(FalisprcPeer::CODART)) $criteria->add(FalisprcPeer::CODART, $this->codart);
		if ($this->isColumnModified(FalisprcPeer::PRECIO)) $criteria->add(FalisprcPeer::PRECIO, $this->precio);
		if ($this->isColumnModified(FalisprcPeer::FECVIG)) $criteria->add(FalisprcPeer::FECVIG, $this->fecvig);
		if ($this->isColumnModified(FalisprcPeer::ID)) $criteria->add(FalisprcPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FalisprcPeer::DATABASE_NAME);

		$criteria->add(FalisprcPeer::ID, $this->id);

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

		$copyObj->setCodprg($this->codprg);

		$copyObj->setCodtipcli($this->codtipcli);

		$copyObj->setConpagId($this->conpag_id);

		$copyObj->setCodart($this->codart);

		$copyObj->setPrecio($this->precio);

		$copyObj->setFecvig($this->fecvig);


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
			self::$peer = new FalisprcPeer();
		}
		return self::$peer;
	}

	
	public function setFadefprg($v)
	{


		if ($v === null) {
			$this->setCodprg(NULL);
		} else {
			$this->setCodprg($v->getCodprg());
		}


		$this->aFadefprg = $v;
	}


	
	public function getFadefprg($con = null)
	{
		if ($this->aFadefprg === null && (($this->codprg !== "" && $this->codprg !== null))) {
						include_once 'lib/model/facturacion/om/BaseFadefprgPeer.php';

      $c = new Criteria();
      $c->add(FadefprgPeer::CODPRG,$this->codprg);
      
			$this->aFadefprg = FadefprgPeer::doSelectOne($c, $con);

			
		}
		return $this->aFadefprg;
	}

	
	public function setFatipcte($v)
	{


		if ($v === null) {
			$this->setCodtipcli(NULL);
		} else {
			$this->setCodtipcli($v->getId());
		}


		$this->aFatipcte = $v;
	}


	
	public function getFatipcte($con = null)
	{
		if ($this->aFatipcte === null && (($this->codtipcli !== "" && $this->codtipcli !== null))) {
						include_once 'lib/model/facturacion/om/BaseFatipctePeer.php';

      $c = new Criteria();
      $c->add(FatipctePeer::ID,$this->codtipcli);
      
			$this->aFatipcte = FatipctePeer::doSelectOne($c, $con);

			
		}
		return $this->aFatipcte;
	}

	
	public function setFaconpag($v)
	{


		if ($v === null) {
			$this->setConpagId(NULL);
		} else {
			$this->setConpagId($v->getId());
		}


		$this->aFaconpag = $v;
	}


	
	public function getFaconpag($con = null)
	{
		if ($this->aFaconpag === null && ($this->conpag_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFaconpagPeer.php';

      $c = new Criteria();
      $c->add(FaconpagPeer::ID,$this->conpag_id);
      
			$this->aFaconpag = FaconpagPeer::doSelectOne($c, $con);

			
		}
		return $this->aFaconpag;
	}

} 