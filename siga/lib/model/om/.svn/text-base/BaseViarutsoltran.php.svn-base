<?php


abstract class BaseViarutsoltran extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $dia;


	
	protected $mes;


	
	protected $hora;


	
	protected $ruta;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getDia()
  {

    return trim($this->dia);

  }
  
  public function getMes()
  {

    return trim($this->mes);

  }
  
  public function getHora()
  {

    return trim($this->hora);

  }
  
  public function getRuta()
  {

    return trim($this->ruta);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = ViarutsoltranPeer::NUMSOL;
      }
  
	} 
	
	public function setDia($v)
	{

    if ($this->dia !== $v) {
        $this->dia = $v;
        $this->modifiedColumns[] = ViarutsoltranPeer::DIA;
      }
  
	} 
	
	public function setMes($v)
	{

    if ($this->mes !== $v) {
        $this->mes = $v;
        $this->modifiedColumns[] = ViarutsoltranPeer::MES;
      }
  
	} 
	
	public function setHora($v)
	{

    if ($this->hora !== $v) {
        $this->hora = $v;
        $this->modifiedColumns[] = ViarutsoltranPeer::HORA;
      }
  
	} 
	
	public function setRuta($v)
	{

    if ($this->ruta !== $v) {
        $this->ruta = $v;
        $this->modifiedColumns[] = ViarutsoltranPeer::RUTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViarutsoltranPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->dia = $rs->getString($startcol + 1);

      $this->mes = $rs->getString($startcol + 2);

      $this->hora = $rs->getString($startcol + 3);

      $this->ruta = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viarutsoltran object", $e);
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
			$con = Propel::getConnection(ViarutsoltranPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViarutsoltranPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViarutsoltranPeer::DATABASE_NAME);
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
					$pk = ViarutsoltranPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViarutsoltranPeer::doUpdate($this, $con);
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


			if (($retval = ViarutsoltranPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViarutsoltranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getDia();
				break;
			case 2:
				return $this->getMes();
				break;
			case 3:
				return $this->getHora();
				break;
			case 4:
				return $this->getRuta();
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
		$keys = ViarutsoltranPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getDia(),
			$keys[2] => $this->getMes(),
			$keys[3] => $this->getHora(),
			$keys[4] => $this->getRuta(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViarutsoltranPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setDia($value);
				break;
			case 2:
				$this->setMes($value);
				break;
			case 3:
				$this->setHora($value);
				break;
			case 4:
				$this->setRuta($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViarutsoltranPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDia($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHora($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRuta($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViarutsoltranPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViarutsoltranPeer::NUMSOL)) $criteria->add(ViarutsoltranPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(ViarutsoltranPeer::DIA)) $criteria->add(ViarutsoltranPeer::DIA, $this->dia);
		if ($this->isColumnModified(ViarutsoltranPeer::MES)) $criteria->add(ViarutsoltranPeer::MES, $this->mes);
		if ($this->isColumnModified(ViarutsoltranPeer::HORA)) $criteria->add(ViarutsoltranPeer::HORA, $this->hora);
		if ($this->isColumnModified(ViarutsoltranPeer::RUTA)) $criteria->add(ViarutsoltranPeer::RUTA, $this->ruta);
		if ($this->isColumnModified(ViarutsoltranPeer::ID)) $criteria->add(ViarutsoltranPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViarutsoltranPeer::DATABASE_NAME);

		$criteria->add(ViarutsoltranPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setDia($this->dia);

		$copyObj->setMes($this->mes);

		$copyObj->setHora($this->hora);

		$copyObj->setRuta($this->ruta);


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
			self::$peer = new ViarutsoltranPeer();
		}
		return self::$peer;
	}

} 