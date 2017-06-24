<?php


abstract class BaseDetradarventas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $radarventas_id;


	
	protected $codart;


	
	protected $cantot;


	
	protected $id;

	
	protected $aRadarventas;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRadarventasId()
  {

    return $this->radarventas_id;

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCantot($val=false)
  {

    if($val) return number_format($this->cantot,2,',','.');
    else return $this->cantot;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRadarventasId($v)
	{

    if ($this->radarventas_id !== $v) {
        $this->radarventas_id = $v;
        $this->modifiedColumns[] = DetradarventasPeer::RADARVENTAS_ID;
      }
  
		if ($this->aRadarventas !== null && $this->aRadarventas->getId() !== $v) {
			$this->aRadarventas = null;
		}

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = DetradarventasPeer::CODART;
      }
  
	} 
	
	public function setCantot($v)
	{

    if ($this->cantot !== $v) {
        $this->cantot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = DetradarventasPeer::CANTOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = DetradarventasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->radarventas_id = $rs->getInt($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->cantot = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Detradarventas object", $e);
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
			$con = Propel::getConnection(DetradarventasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DetradarventasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DetradarventasPeer::DATABASE_NAME);
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


												
			if ($this->aRadarventas !== null) {
				if ($this->aRadarventas->isModified()) {
					$affectedRows += $this->aRadarventas->save($con);
				}
				$this->setRadarventas($this->aRadarventas);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DetradarventasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DetradarventasPeer::doUpdate($this, $con);
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


												
			if ($this->aRadarventas !== null) {
				if (!$this->aRadarventas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRadarventas->getValidationFailures());
				}
			}


			if (($retval = DetradarventasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DetradarventasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRadarventasId();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCantot();
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
		$keys = DetradarventasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRadarventasId(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCantot(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DetradarventasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRadarventasId($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCantot($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DetradarventasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRadarventasId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCantot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DetradarventasPeer::DATABASE_NAME);

		if ($this->isColumnModified(DetradarventasPeer::RADARVENTAS_ID)) $criteria->add(DetradarventasPeer::RADARVENTAS_ID, $this->radarventas_id);
		if ($this->isColumnModified(DetradarventasPeer::CODART)) $criteria->add(DetradarventasPeer::CODART, $this->codart);
		if ($this->isColumnModified(DetradarventasPeer::CANTOT)) $criteria->add(DetradarventasPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(DetradarventasPeer::ID)) $criteria->add(DetradarventasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DetradarventasPeer::DATABASE_NAME);

		$criteria->add(DetradarventasPeer::ID, $this->id);

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

		$copyObj->setRadarventasId($this->radarventas_id);

		$copyObj->setCodart($this->codart);

		$copyObj->setCantot($this->cantot);


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
			self::$peer = new DetradarventasPeer();
		}
		return self::$peer;
	}

	
	public function setRadarventas($v)
	{


		if ($v === null) {
			$this->setRadarventasId(NULL);
		} else {
			$this->setRadarventasId($v->getId());
		}


		$this->aRadarventas = $v;
	}


	
	public function getRadarventas($con = null)
	{
		if ($this->aRadarventas === null && ($this->radarventas_id !== null)) {
						include_once 'lib/model/om/BaseRadarventasPeer.php';

      $c = new Criteria();
      $c->add(RadarventasPeer::ID,$this->radarventas_id);
      
			$this->aRadarventas = RadarventasPeer::doSelectOne($c, $con);

			
		}
		return $this->aRadarventas;
	}

} 