<?php


abstract class BaseNptabhcm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $parent;


	
	protected $sexo;


	
	protected $edades;


	
	protected $edahas;


	
	protected $moncuo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getParent()
  {

    return trim($this->parent);

  }
  
  public function getSexo()
  {

    return trim($this->sexo);

  }
  
  public function getEdades()
  {

    return $this->edades;

  }
  
  public function getEdahas()
  {

    return $this->edahas;

  }
  
  public function getMoncuo($val=false)
  {

    if($val) return number_format($this->moncuo,2,',','.');
    else return $this->moncuo;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NptabhcmPeer::CODCON;
      }
  
	} 
	
	public function setParent($v)
	{

    if ($this->parent !== $v) {
        $this->parent = $v;
        $this->modifiedColumns[] = NptabhcmPeer::PARENT;
      }
  
	} 
	
	public function setSexo($v)
	{

    if ($this->sexo !== $v) {
        $this->sexo = $v;
        $this->modifiedColumns[] = NptabhcmPeer::SEXO;
      }
  
	} 
	
	public function setEdades($v)
	{

    if ($this->edades !== $v) {
        $this->edades = $v;
        $this->modifiedColumns[] = NptabhcmPeer::EDADES;
      }
  
	} 
	
	public function setEdahas($v)
	{

    if ($this->edahas !== $v) {
        $this->edahas = $v;
        $this->modifiedColumns[] = NptabhcmPeer::EDAHAS;
      }
  
	} 
	
	public function setMoncuo($v)
	{

    if ($this->moncuo !== $v) {
        $this->moncuo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NptabhcmPeer::MONCUO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NptabhcmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->parent = $rs->getString($startcol + 1);

      $this->sexo = $rs->getString($startcol + 2);

      $this->edades = $rs->getInt($startcol + 3);

      $this->edahas = $rs->getInt($startcol + 4);

      $this->moncuo = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nptabhcm object", $e);
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
			$con = Propel::getConnection(NptabhcmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NptabhcmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NptabhcmPeer::DATABASE_NAME);
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
					$pk = NptabhcmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NptabhcmPeer::doUpdate($this, $con);
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


			if (($retval = NptabhcmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptabhcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getParent();
				break;
			case 2:
				return $this->getSexo();
				break;
			case 3:
				return $this->getEdades();
				break;
			case 4:
				return $this->getEdahas();
				break;
			case 5:
				return $this->getMoncuo();
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
		$keys = NptabhcmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getParent(),
			$keys[2] => $this->getSexo(),
			$keys[3] => $this->getEdades(),
			$keys[4] => $this->getEdahas(),
			$keys[5] => $this->getMoncuo(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptabhcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setParent($value);
				break;
			case 2:
				$this->setSexo($value);
				break;
			case 3:
				$this->setEdades($value);
				break;
			case 4:
				$this->setEdahas($value);
				break;
			case 5:
				$this->setMoncuo($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NptabhcmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setParent($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSexo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEdades($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEdahas($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMoncuo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NptabhcmPeer::DATABASE_NAME);

		if ($this->isColumnModified(NptabhcmPeer::CODCON)) $criteria->add(NptabhcmPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NptabhcmPeer::PARENT)) $criteria->add(NptabhcmPeer::PARENT, $this->parent);
		if ($this->isColumnModified(NptabhcmPeer::SEXO)) $criteria->add(NptabhcmPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(NptabhcmPeer::EDADES)) $criteria->add(NptabhcmPeer::EDADES, $this->edades);
		if ($this->isColumnModified(NptabhcmPeer::EDAHAS)) $criteria->add(NptabhcmPeer::EDAHAS, $this->edahas);
		if ($this->isColumnModified(NptabhcmPeer::MONCUO)) $criteria->add(NptabhcmPeer::MONCUO, $this->moncuo);
		if ($this->isColumnModified(NptabhcmPeer::ID)) $criteria->add(NptabhcmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NptabhcmPeer::DATABASE_NAME);

		$criteria->add(NptabhcmPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setParent($this->parent);

		$copyObj->setSexo($this->sexo);

		$copyObj->setEdades($this->edades);

		$copyObj->setEdahas($this->edahas);

		$copyObj->setMoncuo($this->moncuo);


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
			self::$peer = new NptabhcmPeer();
		}
		return self::$peer;
	}

} 