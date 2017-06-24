<?php


abstract class BaseRutavendedores extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ruta_id;


	
	protected $vendedores_id;


	
	protected $status;


	
	protected $id;

	
	protected $aRuta;

	
	protected $aVendedores;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRutaId()
  {

    return $this->ruta_id;

  }
  
  public function getVendedoresId()
  {

    return $this->vendedores_id;

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRutaId($v)
	{

    if ($this->ruta_id !== $v) {
        $this->ruta_id = $v;
        $this->modifiedColumns[] = RutavendedoresPeer::RUTA_ID;
      }
  
		if ($this->aRuta !== null && $this->aRuta->getId() !== $v) {
			$this->aRuta = null;
		}

	} 
	
	public function setVendedoresId($v)
	{

    if ($this->vendedores_id !== $v) {
        $this->vendedores_id = $v;
        $this->modifiedColumns[] = RutavendedoresPeer::VENDEDORES_ID;
      }
  
		if ($this->aVendedores !== null && $this->aVendedores->getId() !== $v) {
			$this->aVendedores = null;
		}

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = RutavendedoresPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RutavendedoresPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ruta_id = $rs->getInt($startcol + 0);

      $this->vendedores_id = $rs->getInt($startcol + 1);

      $this->status = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rutavendedores object", $e);
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
			$con = Propel::getConnection(RutavendedoresPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RutavendedoresPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RutavendedoresPeer::DATABASE_NAME);
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


												
			if ($this->aRuta !== null) {
				if ($this->aRuta->isModified()) {
					$affectedRows += $this->aRuta->save($con);
				}
				$this->setRuta($this->aRuta);
			}

			if ($this->aVendedores !== null) {
				if ($this->aVendedores->isModified()) {
					$affectedRows += $this->aVendedores->save($con);
				}
				$this->setVendedores($this->aVendedores);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RutavendedoresPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RutavendedoresPeer::doUpdate($this, $con);
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


												
			if ($this->aRuta !== null) {
				if (!$this->aRuta->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRuta->getValidationFailures());
				}
			}

			if ($this->aVendedores !== null) {
				if (!$this->aVendedores->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aVendedores->getValidationFailures());
				}
			}


			if (($retval = RutavendedoresPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RutavendedoresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRutaId();
				break;
			case 1:
				return $this->getVendedoresId();
				break;
			case 2:
				return $this->getStatus();
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
		$keys = RutavendedoresPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRutaId(),
			$keys[1] => $this->getVendedoresId(),
			$keys[2] => $this->getStatus(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RutavendedoresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRutaId($value);
				break;
			case 1:
				$this->setVendedoresId($value);
				break;
			case 2:
				$this->setStatus($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RutavendedoresPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRutaId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setVendedoresId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStatus($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RutavendedoresPeer::DATABASE_NAME);

		if ($this->isColumnModified(RutavendedoresPeer::RUTA_ID)) $criteria->add(RutavendedoresPeer::RUTA_ID, $this->ruta_id);
		if ($this->isColumnModified(RutavendedoresPeer::VENDEDORES_ID)) $criteria->add(RutavendedoresPeer::VENDEDORES_ID, $this->vendedores_id);
		if ($this->isColumnModified(RutavendedoresPeer::STATUS)) $criteria->add(RutavendedoresPeer::STATUS, $this->status);
		if ($this->isColumnModified(RutavendedoresPeer::ID)) $criteria->add(RutavendedoresPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RutavendedoresPeer::DATABASE_NAME);

		$criteria->add(RutavendedoresPeer::ID, $this->id);

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

		$copyObj->setRutaId($this->ruta_id);

		$copyObj->setVendedoresId($this->vendedores_id);

		$copyObj->setStatus($this->status);


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
			self::$peer = new RutavendedoresPeer();
		}
		return self::$peer;
	}

	
	public function setRuta($v)
	{


		if ($v === null) {
			$this->setRutaId(NULL);
		} else {
			$this->setRutaId($v->getId());
		}


		$this->aRuta = $v;
	}


	
	public function getRuta($con = null)
	{
		if ($this->aRuta === null && ($this->ruta_id !== null)) {
						include_once 'lib/model/om/BaseRutaPeer.php';

      $c = new Criteria();
      $c->add(RutaPeer::ID,$this->ruta_id);
      
			$this->aRuta = RutaPeer::doSelectOne($c, $con);

			
		}
		return $this->aRuta;
	}

	
	public function setVendedores($v)
	{


		if ($v === null) {
			$this->setVendedoresId(NULL);
		} else {
			$this->setVendedoresId($v->getId());
		}


		$this->aVendedores = $v;
	}


	
	public function getVendedores($con = null)
	{
		if ($this->aVendedores === null && ($this->vendedores_id !== null)) {
						include_once 'lib/model/om/BaseVendedoresPeer.php';

      $c = new Criteria();
      $c->add(VendedoresPeer::ID,$this->vendedores_id);
      
			$this->aVendedores = VendedoresPeer::doSelectOne($c, $con);

			
		}
		return $this->aVendedores;
	}

} 