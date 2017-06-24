<?php


abstract class BaseFacomban extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codban_id;


	
	protected $tippag_id;


	
	protected $comision;


	
	protected $id;

	
	protected $aFabancos;

	
	protected $aFatippag;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodbanId()
  {

    return $this->codban_id;

  }
  
  public function getTippagId()
  {

    return $this->tippag_id;

  }
  
  public function getComision($val=false)
  {

    if($val) return number_format($this->comision,2,',','.');
    else return $this->comision;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodbanId($v)
	{

    if ($this->codban_id !== $v) {
        $this->codban_id = $v;
        $this->modifiedColumns[] = FacombanPeer::CODBAN_ID;
      }
  
		if ($this->aFabancos !== null && $this->aFabancos->getId() !== $v) {
			$this->aFabancos = null;
		}

	} 
	
	public function setTippagId($v)
	{

    if ($this->tippag_id !== $v) {
        $this->tippag_id = $v;
        $this->modifiedColumns[] = FacombanPeer::TIPPAG_ID;
      }
  
		if ($this->aFatippag !== null && $this->aFatippag->getId() !== $v) {
			$this->aFatippag = null;
		}

	} 
	
	public function setComision($v)
	{

    if ($this->comision !== $v) {
        $this->comision = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FacombanPeer::COMISION;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FacombanPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codban_id = $rs->getInt($startcol + 0);

      $this->tippag_id = $rs->getInt($startcol + 1);

      $this->comision = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Facomban object", $e);
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
			$con = Propel::getConnection(FacombanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FacombanPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FacombanPeer::DATABASE_NAME);
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

			if ($this->aFatippag !== null) {
				if ($this->aFatippag->isModified()) {
					$affectedRows += $this->aFatippag->save($con);
				}
				$this->setFatippag($this->aFatippag);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FacombanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FacombanPeer::doUpdate($this, $con);
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

			if ($this->aFatippag !== null) {
				if (!$this->aFatippag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFatippag->getValidationFailures());
				}
			}


			if (($retval = FacombanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacombanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodbanId();
				break;
			case 1:
				return $this->getTippagId();
				break;
			case 2:
				return $this->getComision();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacombanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodbanId(),
			$keys[1] => $this->getTippagId(),
			$keys[2] => $this->getComision(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacombanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodbanId($value);
				break;
			case 1:
				$this->setTippagId($value);
				break;
			case 2:
				$this->setComision($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacombanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodbanId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTippagId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setComision($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FacombanPeer::DATABASE_NAME);

		if ($this->isColumnModified(FacombanPeer::CODBAN_ID)) $criteria->add(FacombanPeer::CODBAN_ID, $this->codban_id);
		if ($this->isColumnModified(FacombanPeer::TIPPAG_ID)) $criteria->add(FacombanPeer::TIPPAG_ID, $this->tippag_id);
		if ($this->isColumnModified(FacombanPeer::COMISION)) $criteria->add(FacombanPeer::COMISION, $this->comision);
		if ($this->isColumnModified(FacombanPeer::ID)) $criteria->add(FacombanPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FacombanPeer::DATABASE_NAME);

		$criteria->add(FacombanPeer::ID, $this->id);

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

		$copyObj->setCodbanId($this->codban_id);

		$copyObj->setTippagId($this->tippag_id);

		$copyObj->setComision($this->comision);


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
			self::$peer = new FacombanPeer();
		}
		return self::$peer;
	}

	
	public function setFabancos($v)
	{


		if ($v === null) {
			$this->setCodbanId(NULL);
		} else {
			$this->setCodbanId($v->getId());
		}


		$this->aFabancos = $v;
	}


	
	public function getFabancos($con = null)
	{
		if ($this->aFabancos === null && ($this->codban_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFabancosPeer.php';

      $c = new Criteria();
      $c->add(FabancosPeer::ID,$this->codban_id);
      
			$this->aFabancos = FabancosPeer::doSelectOne($c, $con);

			
		}
		return $this->aFabancos;
	}

	
	public function setFatippag($v)
	{


		if ($v === null) {
			$this->setTippagId(NULL);
		} else {
			$this->setTippagId($v->getId());
		}


		$this->aFatippag = $v;
	}


	
	public function getFatippag($con = null)
	{
		if ($this->aFatippag === null && ($this->tippag_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFatippagPeer.php';

      $c = new Criteria();
      $c->add(FatippagPeer::ID,$this->tippag_id);
      
			$this->aFatippag = FatippagPeer::doSelectOne($c, $con);

			
		}
		return $this->aFatippag;
	}

} 