<?php


abstract class BaseSegperesp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedemp;


	
	protected $pasuse;


	
	protected $proceso;


	
	protected $codapl;


	
	protected $id;

	
	protected $aUsuarios;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedemp()
  {

    return trim($this->cedemp);

  }
  
  public function getPasuse()
  {

    return trim($this->pasuse);

  }
  
  public function getProceso()
  {

    return trim($this->proceso);

  }
  
  public function getCodapl()
  {

    return trim($this->codapl);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedemp($v)
	{

    if ($this->cedemp !== $v) {
        $this->cedemp = $v;
        $this->modifiedColumns[] = SegperespPeer::CEDEMP;
      }
  
		if ($this->aUsuarios !== null && $this->aUsuarios->getCedemp() !== $v) {
			$this->aUsuarios = null;
		}

	} 
	
	public function setPasuse($v)
	{

    if ($this->pasuse !== $v) {
        $this->pasuse = $v;
        $this->modifiedColumns[] = SegperespPeer::PASUSE;
      }
  
	} 
	
	public function setProceso($v)
	{

    if ($this->proceso !== $v) {
        $this->proceso = $v;
        $this->modifiedColumns[] = SegperespPeer::PROCESO;
      }
  
	} 
	
	public function setCodapl($v)
	{

    if ($this->codapl !== $v) {
        $this->codapl = $v;
        $this->modifiedColumns[] = SegperespPeer::CODAPL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = SegperespPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedemp = $rs->getString($startcol + 0);

      $this->pasuse = $rs->getString($startcol + 1);

      $this->proceso = $rs->getString($startcol + 2);

      $this->codapl = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Segperesp object", $e);
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
			$con = Propel::getConnection(SegperespPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SegperespPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SegperespPeer::DATABASE_NAME);
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


												
			if ($this->aUsuarios !== null) {
				if ($this->aUsuarios->isModified()) {
					$affectedRows += $this->aUsuarios->save($con);
				}
				$this->setUsuarios($this->aUsuarios);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SegperespPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SegperespPeer::doUpdate($this, $con);
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


												
			if ($this->aUsuarios !== null) {
				if (!$this->aUsuarios->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUsuarios->getValidationFailures());
				}
			}


			if (($retval = SegperespPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SegperespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedemp();
				break;
			case 1:
				return $this->getPasuse();
				break;
			case 2:
				return $this->getProceso();
				break;
			case 3:
				return $this->getCodapl();
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
		$keys = SegperespPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedemp(),
			$keys[1] => $this->getPasuse(),
			$keys[2] => $this->getProceso(),
			$keys[3] => $this->getCodapl(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SegperespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedemp($value);
				break;
			case 1:
				$this->setPasuse($value);
				break;
			case 2:
				$this->setProceso($value);
				break;
			case 3:
				$this->setCodapl($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SegperespPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPasuse($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setProceso($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodapl($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SegperespPeer::DATABASE_NAME);

		if ($this->isColumnModified(SegperespPeer::CEDEMP)) $criteria->add(SegperespPeer::CEDEMP, $this->cedemp);
		if ($this->isColumnModified(SegperespPeer::PASUSE)) $criteria->add(SegperespPeer::PASUSE, $this->pasuse);
		if ($this->isColumnModified(SegperespPeer::PROCESO)) $criteria->add(SegperespPeer::PROCESO, $this->proceso);
		if ($this->isColumnModified(SegperespPeer::CODAPL)) $criteria->add(SegperespPeer::CODAPL, $this->codapl);
		if ($this->isColumnModified(SegperespPeer::ID)) $criteria->add(SegperespPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SegperespPeer::DATABASE_NAME);

		$criteria->add(SegperespPeer::ID, $this->id);

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

		$copyObj->setCedemp($this->cedemp);

		$copyObj->setPasuse($this->pasuse);

		$copyObj->setProceso($this->proceso);

		$copyObj->setCodapl($this->codapl);


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
			self::$peer = new SegperespPeer();
		}
		return self::$peer;
	}

	
	public function setUsuarios($v)
	{


		if ($v === null) {
			$this->setCedemp(NULL);
		} else {
			$this->setCedemp($v->getCedemp());
		}


		$this->aUsuarios = $v;
	}


	
	public function getUsuarios($con = null)
	{
		if ($this->aUsuarios === null && (($this->cedemp !== "" && $this->cedemp !== null))) {
						include_once 'lib/model/sima_user/om/BaseUsuariosPeer.php';

      $c = new Criteria();
      $c->add(UsuariosPeer::CEDEMP,$this->cedemp);
      
			$this->aUsuarios = UsuariosPeer::doSelectOne($c, $con);

			
		}
		return $this->aUsuarios;
	}

} 