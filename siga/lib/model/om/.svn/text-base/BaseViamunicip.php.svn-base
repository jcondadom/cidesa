<?php


abstract class BaseViamunicip extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmun;


	
	protected $nommun;


	
	protected $viaestado_codest;


	
	protected $id;

	
	protected $aViaestado;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getNommun()
  {

    return trim($this->nommun);

  }
  
  public function getViaestadoCodest()
  {

    return trim($this->viaestado_codest);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = ViamunicipPeer::CODMUN;
      }
  
	} 
	
	public function setNommun($v)
	{

    if ($this->nommun !== $v) {
        $this->nommun = $v;
        $this->modifiedColumns[] = ViamunicipPeer::NOMMUN;
      }
  
	} 
	
	public function setViaestadoCodest($v)
	{

    if ($this->viaestado_codest !== $v) {
        $this->viaestado_codest = $v;
        $this->modifiedColumns[] = ViamunicipPeer::VIAESTADO_CODEST;
      }
  
		if ($this->aViaestado !== null && $this->aViaestado->getCodest() !== $v) {
			$this->aViaestado = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViamunicipPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codmun = $rs->getString($startcol + 0);

      $this->nommun = $rs->getString($startcol + 1);

      $this->viaestado_codest = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viamunicip object", $e);
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
			$con = Propel::getConnection(ViamunicipPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViamunicipPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViamunicipPeer::DATABASE_NAME);
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


												
			if ($this->aViaestado !== null) {
				if ($this->aViaestado->isModified()) {
					$affectedRows += $this->aViaestado->save($con);
				}
				$this->setViaestado($this->aViaestado);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ViamunicipPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViamunicipPeer::doUpdate($this, $con);
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


												
			if ($this->aViaestado !== null) {
				if (!$this->aViaestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aViaestado->getValidationFailures());
				}
			}


			if (($retval = ViamunicipPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViamunicipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmun();
				break;
			case 1:
				return $this->getNommun();
				break;
			case 2:
				return $this->getViaestadoCodest();
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
		$keys = ViamunicipPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmun(),
			$keys[1] => $this->getNommun(),
			$keys[2] => $this->getViaestadoCodest(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViamunicipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmun($value);
				break;
			case 1:
				$this->setNommun($value);
				break;
			case 2:
				$this->setViaestadoCodest($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViamunicipPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmun($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNommun($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setViaestadoCodest($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViamunicipPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViamunicipPeer::CODMUN)) $criteria->add(ViamunicipPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(ViamunicipPeer::NOMMUN)) $criteria->add(ViamunicipPeer::NOMMUN, $this->nommun);
		if ($this->isColumnModified(ViamunicipPeer::VIAESTADO_CODEST)) $criteria->add(ViamunicipPeer::VIAESTADO_CODEST, $this->viaestado_codest);
		if ($this->isColumnModified(ViamunicipPeer::ID)) $criteria->add(ViamunicipPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViamunicipPeer::DATABASE_NAME);

		$criteria->add(ViamunicipPeer::ID, $this->id);

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

		$copyObj->setCodmun($this->codmun);

		$copyObj->setNommun($this->nommun);

		$copyObj->setViaestadoCodest($this->viaestado_codest);


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
			self::$peer = new ViamunicipPeer();
		}
		return self::$peer;
	}

	
	public function setViaestado($v)
	{


		if ($v === null) {
			$this->setViaestadoCodest(NULL);
		} else {
			$this->setViaestadoCodest($v->getCodest());
		}


		$this->aViaestado = $v;
	}


	
	public function getViaestado($con = null)
	{
		if ($this->aViaestado === null && (($this->viaestado_codest !== "" && $this->viaestado_codest !== null))) {
						include_once 'lib/model/om/BaseViaestadoPeer.php';

      $c = new Criteria();
      $c->add(ViaestadoPeer::CODEST,$this->viaestado_codest);
      
			$this->aViaestado = ViaestadoPeer::doSelectOne($c, $con);

			
		}
		return $this->aViaestado;
	}

} 