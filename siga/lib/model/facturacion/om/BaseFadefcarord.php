<?php


abstract class BaseFadefcarord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nivfam;


	
	protected $codprg;


	
	protected $conpagpre_id;


	
	protected $conpagped_id;


	
	protected $id;

	
	protected $aFadefprg;

	
	protected $aFaconpagRelatedByConpagpreId;

	
	protected $aFaconpagRelatedByConpagpedId;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNivfam()
  {

    return trim($this->nivfam);

  }
  
  public function getCodprg()
  {

    return trim($this->codprg);

  }
  
  public function getConpagpreId()
  {

    return $this->conpagpre_id;

  }
  
  public function getConpagpedId()
  {

    return $this->conpagped_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNivfam($v)
	{

    if ($this->nivfam !== $v) {
        $this->nivfam = $v;
        $this->modifiedColumns[] = FadefcarordPeer::NIVFAM;
      }
  
	} 
	
	public function setCodprg($v)
	{

    if ($this->codprg !== $v) {
        $this->codprg = $v;
        $this->modifiedColumns[] = FadefcarordPeer::CODPRG;
      }
  
		if ($this->aFadefprg !== null && $this->aFadefprg->getCodprg() !== $v) {
			$this->aFadefprg = null;
		}

	} 
	
	public function setConpagpreId($v)
	{

    if ($this->conpagpre_id !== $v) {
        $this->conpagpre_id = $v;
        $this->modifiedColumns[] = FadefcarordPeer::CONPAGPRE_ID;
      }
  
		if ($this->aFaconpagRelatedByConpagpreId !== null && $this->aFaconpagRelatedByConpagpreId->getId() !== $v) {
			$this->aFaconpagRelatedByConpagpreId = null;
		}

	} 
	
	public function setConpagpedId($v)
	{

    if ($this->conpagped_id !== $v) {
        $this->conpagped_id = $v;
        $this->modifiedColumns[] = FadefcarordPeer::CONPAGPED_ID;
      }
  
		if ($this->aFaconpagRelatedByConpagpedId !== null && $this->aFaconpagRelatedByConpagpedId->getId() !== $v) {
			$this->aFaconpagRelatedByConpagpedId = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadefcarordPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nivfam = $rs->getString($startcol + 0);

      $this->codprg = $rs->getString($startcol + 1);

      $this->conpagpre_id = $rs->getInt($startcol + 2);

      $this->conpagped_id = $rs->getInt($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadefcarord object", $e);
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
			$con = Propel::getConnection(FadefcarordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadefcarordPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadefcarordPeer::DATABASE_NAME);
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

			if ($this->aFaconpagRelatedByConpagpreId !== null) {
				if ($this->aFaconpagRelatedByConpagpreId->isModified()) {
					$affectedRows += $this->aFaconpagRelatedByConpagpreId->save($con);
				}
				$this->setFaconpagRelatedByConpagpreId($this->aFaconpagRelatedByConpagpreId);
			}

			if ($this->aFaconpagRelatedByConpagpedId !== null) {
				if ($this->aFaconpagRelatedByConpagpedId->isModified()) {
					$affectedRows += $this->aFaconpagRelatedByConpagpedId->save($con);
				}
				$this->setFaconpagRelatedByConpagpedId($this->aFaconpagRelatedByConpagpedId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FadefcarordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadefcarordPeer::doUpdate($this, $con);
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

			if ($this->aFaconpagRelatedByConpagpreId !== null) {
				if (!$this->aFaconpagRelatedByConpagpreId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaconpagRelatedByConpagpreId->getValidationFailures());
				}
			}

			if ($this->aFaconpagRelatedByConpagpedId !== null) {
				if (!$this->aFaconpagRelatedByConpagpedId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaconpagRelatedByConpagpedId->getValidationFailures());
				}
			}


			if (($retval = FadefcarordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadefcarordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNivfam();
				break;
			case 1:
				return $this->getCodprg();
				break;
			case 2:
				return $this->getConpagpreId();
				break;
			case 3:
				return $this->getConpagpedId();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefcarordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNivfam(),
			$keys[1] => $this->getCodprg(),
			$keys[2] => $this->getConpagpreId(),
			$keys[3] => $this->getConpagpedId(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadefcarordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNivfam($value);
				break;
			case 1:
				$this->setCodprg($value);
				break;
			case 2:
				$this->setConpagpreId($value);
				break;
			case 3:
				$this->setConpagpedId($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefcarordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNivfam($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodprg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setConpagpreId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setConpagpedId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadefcarordPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadefcarordPeer::NIVFAM)) $criteria->add(FadefcarordPeer::NIVFAM, $this->nivfam);
		if ($this->isColumnModified(FadefcarordPeer::CODPRG)) $criteria->add(FadefcarordPeer::CODPRG, $this->codprg);
		if ($this->isColumnModified(FadefcarordPeer::CONPAGPRE_ID)) $criteria->add(FadefcarordPeer::CONPAGPRE_ID, $this->conpagpre_id);
		if ($this->isColumnModified(FadefcarordPeer::CONPAGPED_ID)) $criteria->add(FadefcarordPeer::CONPAGPED_ID, $this->conpagped_id);
		if ($this->isColumnModified(FadefcarordPeer::ID)) $criteria->add(FadefcarordPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadefcarordPeer::DATABASE_NAME);

		$criteria->add(FadefcarordPeer::ID, $this->id);

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

		$copyObj->setNivfam($this->nivfam);

		$copyObj->setCodprg($this->codprg);

		$copyObj->setConpagpreId($this->conpagpre_id);

		$copyObj->setConpagpedId($this->conpagped_id);


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
			self::$peer = new FadefcarordPeer();
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

	
	public function setFaconpagRelatedByConpagpreId($v)
	{


		if ($v === null) {
			$this->setConpagpreId(NULL);
		} else {
			$this->setConpagpreId($v->getId());
		}


		$this->aFaconpagRelatedByConpagpreId = $v;
	}


	
	public function getFaconpagRelatedByConpagpreId($con = null)
	{
		if ($this->aFaconpagRelatedByConpagpreId === null && ($this->conpagpre_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFaconpagPeer.php';

      $c = new Criteria();
      $c->add(FaconpagPeer::ID,$this->conpagpre_id);
      
			$this->aFaconpagRelatedByConpagpreId = FaconpagPeer::doSelectOne($c, $con);

			
		}
		return $this->aFaconpagRelatedByConpagpreId;
	}

	
	public function setFaconpagRelatedByConpagpedId($v)
	{


		if ($v === null) {
			$this->setConpagpedId(NULL);
		} else {
			$this->setConpagpedId($v->getId());
		}


		$this->aFaconpagRelatedByConpagpedId = $v;
	}


	
	public function getFaconpagRelatedByConpagpedId($con = null)
	{
		if ($this->aFaconpagRelatedByConpagpedId === null && ($this->conpagped_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFaconpagPeer.php';

      $c = new Criteria();
      $c->add(FaconpagPeer::ID,$this->conpagped_id);
      
			$this->aFaconpagRelatedByConpagpedId = FaconpagPeer::doSelectOne($c, $con);

			
		}
		return $this->aFaconpagRelatedByConpagpedId;
	}

} 