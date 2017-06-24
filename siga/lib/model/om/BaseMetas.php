<?php


abstract class BaseMetas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $vendedores_id;


	
	protected $catproductos_id;


	
	protected $cantidad;


	
	protected $mes_asignacion;


	
	protected $anio_asignacion;


	
	protected $status;


	
	protected $id;

	
	protected $aVendedores;

	
	protected $aCatproductos;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getVendedoresId()
  {

    return $this->vendedores_id;

  }
  
  public function getCatproductosId()
  {

    return $this->catproductos_id;

  }
  
  public function getCantidad()
  {

    return $this->cantidad;

  }
  
  public function getMesAsignacion()
  {

    return $this->mes_asignacion;

  }
  
  public function getAnioAsignacion()
  {

    return $this->anio_asignacion;

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setVendedoresId($v)
	{

    if ($this->vendedores_id !== $v) {
        $this->vendedores_id = $v;
        $this->modifiedColumns[] = MetasPeer::VENDEDORES_ID;
      }
  
		if ($this->aVendedores !== null && $this->aVendedores->getId() !== $v) {
			$this->aVendedores = null;
		}

	} 
	
	public function setCatproductosId($v)
	{

    if ($this->catproductos_id !== $v) {
        $this->catproductos_id = $v;
        $this->modifiedColumns[] = MetasPeer::CATPRODUCTOS_ID;
      }
  
		if ($this->aCatproductos !== null && $this->aCatproductos->getId() !== $v) {
			$this->aCatproductos = null;
		}

	} 
	
	public function setCantidad($v)
	{

    if ($this->cantidad !== $v) {
        $this->cantidad = $v;
        $this->modifiedColumns[] = MetasPeer::CANTIDAD;
      }
  
	} 
	
	public function setMesAsignacion($v)
	{

    if ($this->mes_asignacion !== $v) {
        $this->mes_asignacion = $v;
        $this->modifiedColumns[] = MetasPeer::MES_ASIGNACION;
      }
  
	} 
	
	public function setAnioAsignacion($v)
	{

    if ($this->anio_asignacion !== $v) {
        $this->anio_asignacion = $v;
        $this->modifiedColumns[] = MetasPeer::ANIO_ASIGNACION;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = MetasPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = MetasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->vendedores_id = $rs->getInt($startcol + 0);

      $this->catproductos_id = $rs->getInt($startcol + 1);

      $this->cantidad = $rs->getInt($startcol + 2);

      $this->mes_asignacion = $rs->getInt($startcol + 3);

      $this->anio_asignacion = $rs->getInt($startcol + 4);

      $this->status = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Metas object", $e);
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
			$con = Propel::getConnection(MetasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MetasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MetasPeer::DATABASE_NAME);
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


												
			if ($this->aVendedores !== null) {
				if ($this->aVendedores->isModified()) {
					$affectedRows += $this->aVendedores->save($con);
				}
				$this->setVendedores($this->aVendedores);
			}

			if ($this->aCatproductos !== null) {
				if ($this->aCatproductos->isModified()) {
					$affectedRows += $this->aCatproductos->save($con);
				}
				$this->setCatproductos($this->aCatproductos);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MetasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MetasPeer::doUpdate($this, $con);
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


												
			if ($this->aVendedores !== null) {
				if (!$this->aVendedores->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aVendedores->getValidationFailures());
				}
			}

			if ($this->aCatproductos !== null) {
				if (!$this->aCatproductos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatproductos->getValidationFailures());
				}
			}


			if (($retval = MetasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MetasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getVendedoresId();
				break;
			case 1:
				return $this->getCatproductosId();
				break;
			case 2:
				return $this->getCantidad();
				break;
			case 3:
				return $this->getMesAsignacion();
				break;
			case 4:
				return $this->getAnioAsignacion();
				break;
			case 5:
				return $this->getStatus();
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
		$keys = MetasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getVendedoresId(),
			$keys[1] => $this->getCatproductosId(),
			$keys[2] => $this->getCantidad(),
			$keys[3] => $this->getMesAsignacion(),
			$keys[4] => $this->getAnioAsignacion(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MetasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setVendedoresId($value);
				break;
			case 1:
				$this->setCatproductosId($value);
				break;
			case 2:
				$this->setCantidad($value);
				break;
			case 3:
				$this->setMesAsignacion($value);
				break;
			case 4:
				$this->setAnioAsignacion($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MetasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setVendedoresId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatproductosId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCantidad($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMesAsignacion($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAnioAsignacion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MetasPeer::DATABASE_NAME);

		if ($this->isColumnModified(MetasPeer::VENDEDORES_ID)) $criteria->add(MetasPeer::VENDEDORES_ID, $this->vendedores_id);
		if ($this->isColumnModified(MetasPeer::CATPRODUCTOS_ID)) $criteria->add(MetasPeer::CATPRODUCTOS_ID, $this->catproductos_id);
		if ($this->isColumnModified(MetasPeer::CANTIDAD)) $criteria->add(MetasPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(MetasPeer::MES_ASIGNACION)) $criteria->add(MetasPeer::MES_ASIGNACION, $this->mes_asignacion);
		if ($this->isColumnModified(MetasPeer::ANIO_ASIGNACION)) $criteria->add(MetasPeer::ANIO_ASIGNACION, $this->anio_asignacion);
		if ($this->isColumnModified(MetasPeer::STATUS)) $criteria->add(MetasPeer::STATUS, $this->status);
		if ($this->isColumnModified(MetasPeer::ID)) $criteria->add(MetasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MetasPeer::DATABASE_NAME);

		$criteria->add(MetasPeer::ID, $this->id);

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

		$copyObj->setVendedoresId($this->vendedores_id);

		$copyObj->setCatproductosId($this->catproductos_id);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setMesAsignacion($this->mes_asignacion);

		$copyObj->setAnioAsignacion($this->anio_asignacion);

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
			self::$peer = new MetasPeer();
		}
		return self::$peer;
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

	
	public function setCatproductos($v)
	{


		if ($v === null) {
			$this->setCatproductosId(NULL);
		} else {
			$this->setCatproductosId($v->getId());
		}


		$this->aCatproductos = $v;
	}


	
	public function getCatproductos($con = null)
	{
		if ($this->aCatproductos === null && ($this->catproductos_id !== null)) {
						include_once 'lib/model/om/BaseCatproductosPeer.php';

      $c = new Criteria();
      $c->add(CatproductosPeer::ID,$this->catproductos_id);
      
			$this->aCatproductos = CatproductosPeer::doSelectOne($c, $con);

			
		}
		return $this->aCatproductos;
	}

} 