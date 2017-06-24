<?php


abstract class BaseCobfordepche extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numtra;


	
	protected $numche;


	
	protected $fabancos_id;


	
	protected $monche;


	
	protected $cobdetfor_id;


	
	protected $id;

	
	protected $aFabancos;

	
	protected $aCobdetfor;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumtra()
  {

    return trim($this->numtra);

  }
  
  public function getNumche()
  {

    return trim($this->numche);

  }
  
  public function getFabancosId()
  {

    return $this->fabancos_id;

  }
  
  public function getMonche($val=false)
  {

    if($val) return number_format($this->monche,2,',','.');
    else return $this->monche;

  }
  
  public function getCobdetforId()
  {

    return $this->cobdetfor_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumtra($v)
	{

    if ($this->numtra !== $v) {
        $this->numtra = $v;
        $this->modifiedColumns[] = CobfordepchePeer::NUMTRA;
      }
  
	} 
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = CobfordepchePeer::NUMCHE;
      }
  
	} 
	
	public function setFabancosId($v)
	{

    if ($this->fabancos_id !== $v) {
        $this->fabancos_id = $v;
        $this->modifiedColumns[] = CobfordepchePeer::FABANCOS_ID;
      }
  
		if ($this->aFabancos !== null && $this->aFabancos->getId() !== $v) {
			$this->aFabancos = null;
		}

	} 
	
	public function setMonche($v)
	{

    if ($this->monche !== $v) {
        $this->monche = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobfordepchePeer::MONCHE;
      }
  
	} 
	
	public function setCobdetforId($v)
	{

    if ($this->cobdetfor_id !== $v) {
        $this->cobdetfor_id = $v;
        $this->modifiedColumns[] = CobfordepchePeer::COBDETFOR_ID;
      }
  
		if ($this->aCobdetfor !== null && $this->aCobdetfor->getId() !== $v) {
			$this->aCobdetfor = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CobfordepchePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numtra = $rs->getString($startcol + 0);

      $this->numche = $rs->getString($startcol + 1);

      $this->fabancos_id = $rs->getInt($startcol + 2);

      $this->monche = $rs->getFloat($startcol + 3);

      $this->cobdetfor_id = $rs->getInt($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cobfordepche object", $e);
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
			$con = Propel::getConnection(CobfordepchePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobfordepchePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobfordepchePeer::DATABASE_NAME);
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


												
			if ($this->aFabancos !== null) {
				if ($this->aFabancos->isModified()) {
					$affectedRows += $this->aFabancos->save($con);
				}
				$this->setFabancos($this->aFabancos);
			}

			if ($this->aCobdetfor !== null) {
				if ($this->aCobdetfor->isModified()) {
					$affectedRows += $this->aCobdetfor->save($con);
				}
				$this->setCobdetfor($this->aCobdetfor);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CobfordepchePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CobfordepchePeer::doUpdate($this, $con);
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


												
			if ($this->aFabancos !== null) {
				if (!$this->aFabancos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFabancos->getValidationFailures());
				}
			}

			if ($this->aCobdetfor !== null) {
				if (!$this->aCobdetfor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCobdetfor->getValidationFailures());
				}
			}


			if (($retval = CobfordepchePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobfordepchePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumtra();
				break;
			case 1:
				return $this->getNumche();
				break;
			case 2:
				return $this->getFabancosId();
				break;
			case 3:
				return $this->getMonche();
				break;
			case 4:
				return $this->getCobdetforId();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobfordepchePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumtra(),
			$keys[1] => $this->getNumche(),
			$keys[2] => $this->getFabancosId(),
			$keys[3] => $this->getMonche(),
			$keys[4] => $this->getCobdetforId(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobfordepchePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumtra($value);
				break;
			case 1:
				$this->setNumche($value);
				break;
			case 2:
				$this->setFabancosId($value);
				break;
			case 3:
				$this->setMonche($value);
				break;
			case 4:
				$this->setCobdetforId($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobfordepchePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumche($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFabancosId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonche($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCobdetforId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobfordepchePeer::DATABASE_NAME);

		if ($this->isColumnModified(CobfordepchePeer::NUMTRA)) $criteria->add(CobfordepchePeer::NUMTRA, $this->numtra);
		if ($this->isColumnModified(CobfordepchePeer::NUMCHE)) $criteria->add(CobfordepchePeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(CobfordepchePeer::FABANCOS_ID)) $criteria->add(CobfordepchePeer::FABANCOS_ID, $this->fabancos_id);
		if ($this->isColumnModified(CobfordepchePeer::MONCHE)) $criteria->add(CobfordepchePeer::MONCHE, $this->monche);
		if ($this->isColumnModified(CobfordepchePeer::COBDETFOR_ID)) $criteria->add(CobfordepchePeer::COBDETFOR_ID, $this->cobdetfor_id);
		if ($this->isColumnModified(CobfordepchePeer::ID)) $criteria->add(CobfordepchePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobfordepchePeer::DATABASE_NAME);

		$criteria->add(CobfordepchePeer::ID, $this->id);

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

		$copyObj->setNumtra($this->numtra);

		$copyObj->setNumche($this->numche);

		$copyObj->setFabancosId($this->fabancos_id);

		$copyObj->setMonche($this->monche);

		$copyObj->setCobdetforId($this->cobdetfor_id);


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
			self::$peer = new CobfordepchePeer();
		}
		return self::$peer;
	}

	
	public function setFabancos($v)
	{


		if ($v === null) {
			$this->setFabancosId(NULL);
		} else {
			$this->setFabancosId($v->getId());
		}


		$this->aFabancos = $v;
	}


	
	public function getFabancos($con = null)
	{
		if ($this->aFabancos === null && ($this->fabancos_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFabancosPeer.php';

      $c = new Criteria();
      $c->add(FabancosPeer::ID,$this->fabancos_id);
      
			$this->aFabancos = FabancosPeer::doSelectOne($c, $con);

			
		}
		return $this->aFabancos;
	}

	
	public function setCobdetfor($v)
	{


		if ($v === null) {
			$this->setCobdetforId(NULL);
		} else {
			$this->setCobdetforId($v->getId());
		}


		$this->aCobdetfor = $v;
	}


	
	public function getCobdetfor($con = null)
	{
		if ($this->aCobdetfor === null && ($this->cobdetfor_id !== null)) {
						include_once 'lib/model/om/BaseCobdetforPeer.php';

      $c = new Criteria();
      $c->add(CobdetforPeer::ID,$this->cobdetfor_id);
      
			$this->aCobdetfor = CobdetforPeer::doSelectOne($c, $con);

			
		}
		return $this->aCobdetfor;
	}

} 