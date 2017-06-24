<?php


abstract class BaseCuentaxcobrarClientes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcliente;


	
	protected $cliente;


	
	protected $cuentaxcobrar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcliente()
  {

    return trim($this->codcliente);

  }
  
  public function getCliente()
  {

    return trim($this->cliente);

  }
  
  public function getCuentaxcobrar($val=false)
  {

    if($val) return number_format($this->cuentaxcobrar,2,',','.');
    else return $this->cuentaxcobrar;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcliente($v)
	{

    if ($this->codcliente !== $v) {
        $this->codcliente = $v;
        $this->modifiedColumns[] = CuentaxcobrarClientesPeer::CODCLIENTE;
      }
  
	} 
	
	public function setCliente($v)
	{

    if ($this->cliente !== $v) {
        $this->cliente = $v;
        $this->modifiedColumns[] = CuentaxcobrarClientesPeer::CLIENTE;
      }
  
	} 
	
	public function setCuentaxcobrar($v)
	{

    if ($this->cuentaxcobrar !== $v) {
        $this->cuentaxcobrar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CuentaxcobrarClientesPeer::CUENTAXCOBRAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CuentaxcobrarClientesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcliente = $rs->getString($startcol + 0);

      $this->cliente = $rs->getString($startcol + 1);

      $this->cuentaxcobrar = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating CuentaxcobrarClientes object", $e);
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
			$con = Propel::getConnection(CuentaxcobrarClientesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CuentaxcobrarClientesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CuentaxcobrarClientesPeer::DATABASE_NAME);
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
					$pk = CuentaxcobrarClientesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CuentaxcobrarClientesPeer::doUpdate($this, $con);
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


			if (($retval = CuentaxcobrarClientesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CuentaxcobrarClientesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcliente();
				break;
			case 1:
				return $this->getCliente();
				break;
			case 2:
				return $this->getCuentaxcobrar();
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
		$keys = CuentaxcobrarClientesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcliente(),
			$keys[1] => $this->getCliente(),
			$keys[2] => $this->getCuentaxcobrar(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CuentaxcobrarClientesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcliente($value);
				break;
			case 1:
				$this->setCliente($value);
				break;
			case 2:
				$this->setCuentaxcobrar($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CuentaxcobrarClientesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcliente($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCliente($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCuentaxcobrar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CuentaxcobrarClientesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CuentaxcobrarClientesPeer::CODCLIENTE)) $criteria->add(CuentaxcobrarClientesPeer::CODCLIENTE, $this->codcliente);
		if ($this->isColumnModified(CuentaxcobrarClientesPeer::CLIENTE)) $criteria->add(CuentaxcobrarClientesPeer::CLIENTE, $this->cliente);
		if ($this->isColumnModified(CuentaxcobrarClientesPeer::CUENTAXCOBRAR)) $criteria->add(CuentaxcobrarClientesPeer::CUENTAXCOBRAR, $this->cuentaxcobrar);
		if ($this->isColumnModified(CuentaxcobrarClientesPeer::ID)) $criteria->add(CuentaxcobrarClientesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CuentaxcobrarClientesPeer::DATABASE_NAME);

		$criteria->add(CuentaxcobrarClientesPeer::ID, $this->id);

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

		$copyObj->setCodcliente($this->codcliente);

		$copyObj->setCliente($this->cliente);

		$copyObj->setCuentaxcobrar($this->cuentaxcobrar);


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
			self::$peer = new CuentaxcobrarClientesPeer();
		}
		return self::$peer;
	}

} 