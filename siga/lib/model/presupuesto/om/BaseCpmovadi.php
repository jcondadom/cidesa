<?php


abstract class BaseCpmovadi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refadi;


	
	protected $codpre;


	
	protected $perpre;


	
	protected $monmov;


	
	protected $stamov;


	
	protected $tipo;



	protected $monto;



	protected $iva;



	protected $id;

	
	protected $aCpadidis;

	
	protected $aCpdeftit;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefadi()
  {

    return trim($this->refadi);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getPerpre()
  {

    return trim($this->perpre);

  }
  
  public function getMonmov($val=false)
  {

    if($val) return number_format($this->monmov,2,',','.');
    else return $this->monmov;

  }
  
  public function getStamov()
  {

    return trim($this->stamov);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }

  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }

  public function getIva($val=false)
  {

    if($val) return number_format($this->iva,2,',','.');
    else return $this->iva;

  }

  public function getId()
  {

    return $this->id;

  }
	
	public function setRefadi($v)
	{

    if ($this->refadi !== $v) {
        $this->refadi = $v;
        $this->modifiedColumns[] = CpmovadiPeer::REFADI;
      }
  
		if ($this->aCpadidis !== null && $this->aCpadidis->getRefadi() !== $v) {
			$this->aCpadidis = null;
		}

	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CpmovadiPeer::CODPRE;
      }
  
		if ($this->aCpdeftit !== null && $this->aCpdeftit->getCodpre() !== $v) {
			$this->aCpdeftit = null;
		}

	} 
	
	public function setPerpre($v)
	{

    if ($this->perpre !== $v) {
        $this->perpre = $v;
        $this->modifiedColumns[] = CpmovadiPeer::PERPRE;
      }
  
	} 
	
	public function setMonmov($v)
	{

    if ($this->monmov !== $v) {
        $this->monmov = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpmovadiPeer::MONMOV;
      }
  
	} 
	
	public function setStamov($v)
	{

    if ($this->stamov !== $v) {
        $this->stamov = $v;
        $this->modifiedColumns[] = CpmovadiPeer::STAMOV;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CpmovadiPeer::TIPO;
      }

	}

	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpmovadiPeer::MONTO;
      }

	}

	public function setIva($v)
	{

    if ($this->iva !== $v) {
        $this->iva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpmovadiPeer::IVA;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpmovadiPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refadi = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->perpre = $rs->getString($startcol + 2);

      $this->monmov = $rs->getFloat($startcol + 3);

      $this->stamov = $rs->getString($startcol + 4);

      $this->tipo = $rs->getString($startcol + 5);

      $this->monto = $rs->getFloat($startcol + 6);

      $this->iva = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9;
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpmovadi object", $e);
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
			$con = Propel::getConnection(CpmovadiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpmovadiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpmovadiPeer::DATABASE_NAME);
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


												
			if ($this->aCpadidis !== null) {
				if ($this->aCpadidis->isModified()) {
					$affectedRows += $this->aCpadidis->save($con);
				}
				$this->setCpadidis($this->aCpadidis);
			}

			if ($this->aCpdeftit !== null) {
				if ($this->aCpdeftit->isModified()) {
					$affectedRows += $this->aCpdeftit->save($con);
				}
				$this->setCpdeftit($this->aCpdeftit);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CpmovadiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpmovadiPeer::doUpdate($this, $con);
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


												
			if ($this->aCpadidis !== null) {
				if (!$this->aCpadidis->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpadidis->getValidationFailures());
				}
			}

			if ($this->aCpdeftit !== null) {
				if (!$this->aCpdeftit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpdeftit->getValidationFailures());
				}
			}


			if (($retval = CpmovadiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovadiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefadi();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getPerpre();
				break;
			case 3:
				return $this->getMonmov();
				break;
			case 4:
				return $this->getStamov();
				break;
			case 5:
				return $this->getTipo();
				break;
			case 6:
				return $this->getMonto();
				break;
			case 7:
				return $this->getIva();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpmovadiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefadi(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getPerpre(),
			$keys[3] => $this->getMonmov(),
			$keys[4] => $this->getStamov(),
			$keys[5] => $this->getTipo(),
			$keys[6] => $this->getMonto(),
			$keys[7] => $this->getIva(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpmovadiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefadi($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setPerpre($value);
				break;
			case 3:
				$this->setMonmov($value);
				break;
			case 4:
				$this->setStamov($value);
				break;
			case 5:
				$this->setTipo($value);
				break;
			case 6:
				$this->setMonto($value);
				break;
			case 7:
				$this->setIva($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpmovadiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefadi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonmov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStamov($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonto($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIva($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpmovadiPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpmovadiPeer::REFADI)) $criteria->add(CpmovadiPeer::REFADI, $this->refadi);
		if ($this->isColumnModified(CpmovadiPeer::CODPRE)) $criteria->add(CpmovadiPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpmovadiPeer::PERPRE)) $criteria->add(CpmovadiPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(CpmovadiPeer::MONMOV)) $criteria->add(CpmovadiPeer::MONMOV, $this->monmov);
		if ($this->isColumnModified(CpmovadiPeer::STAMOV)) $criteria->add(CpmovadiPeer::STAMOV, $this->stamov);
		if ($this->isColumnModified(CpmovadiPeer::TIPO)) $criteria->add(CpmovadiPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CpmovadiPeer::MONTO)) $criteria->add(CpmovadiPeer::MONTO, $this->monto);
		if ($this->isColumnModified(CpmovadiPeer::IVA)) $criteria->add(CpmovadiPeer::IVA, $this->iva);
		if ($this->isColumnModified(CpmovadiPeer::ID)) $criteria->add(CpmovadiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpmovadiPeer::DATABASE_NAME);

		$criteria->add(CpmovadiPeer::ID, $this->id);

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

		$copyObj->setRefadi($this->refadi);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setPerpre($this->perpre);

		$copyObj->setMonmov($this->monmov);

		$copyObj->setStamov($this->stamov);

		$copyObj->setTipo($this->tipo);

		$copyObj->setMonto($this->monto);

		$copyObj->setIva($this->iva);


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
			self::$peer = new CpmovadiPeer();
		}
		return self::$peer;
	}

	
	public function setCpadidis($v)
	{


		if ($v === null) {
			$this->setRefadi(NULL);
		} else {
			$this->setRefadi($v->getRefadi());
		}


		$this->aCpadidis = $v;
	}


	
	public function getCpadidis($con = null)
	{
		if ($this->aCpadidis === null && (($this->refadi !== "" && $this->refadi !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpadidisPeer.php';

      $c = new Criteria();
      $c->add(CpadidisPeer::REFADI,$this->refadi);
      
			$this->aCpadidis = CpadidisPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpadidis;
	}

	
	public function setCpdeftit($v)
	{


		if ($v === null) {
			$this->setCodpre(NULL);
		} else {
			$this->setCodpre($v->getCodpre());
		}


		$this->aCpdeftit = $v;
	}


	
	public function getCpdeftit($con = null)
	{
		if ($this->aCpdeftit === null && (($this->codpre !== "" && $this->codpre !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpdeftitPeer.php';

      $c = new Criteria();
      $c->add(CpdeftitPeer::CODPRE,$this->codpre);
      
			$this->aCpdeftit = CpdeftitPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpdeftit;
	}

} 