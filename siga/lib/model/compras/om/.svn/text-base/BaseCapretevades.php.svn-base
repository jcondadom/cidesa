<?php


abstract class BaseCapretevades extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codeva;


	
	protected $codprg;


	
	protected $punpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodeva()
  {

    return trim($this->codeva);

  }
  
  public function getCodprg()
  {

    return trim($this->codprg);

  }
  
  public function getPunpre($val=false)
  {

    if($val) return number_format($this->punpre,2,',','.');
    else return $this->punpre;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodeva($v)
	{

    if ($this->codeva !== $v) {
        $this->codeva = $v;
        $this->modifiedColumns[] = CapretevadesPeer::CODEVA;
      }
  
	} 
	
	public function setCodprg($v)
	{

    if ($this->codprg !== $v) {
        $this->codprg = $v;
        $this->modifiedColumns[] = CapretevadesPeer::CODPRG;
      }
  
	} 
	
	public function setPunpre($v)
	{

    if ($this->punpre !== $v) {
        $this->punpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CapretevadesPeer::PUNPRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CapretevadesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codeva = $rs->getString($startcol + 0);

      $this->codprg = $rs->getString($startcol + 1);

      $this->punpre = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Capretevades object", $e);
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
			$con = Propel::getConnection(CapretevadesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CapretevadesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CapretevadesPeer::DATABASE_NAME);
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
					$pk = CapretevadesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CapretevadesPeer::doUpdate($this, $con);
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


			if (($retval = CapretevadesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CapretevadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodeva();
				break;
			case 1:
				return $this->getCodprg();
				break;
			case 2:
				return $this->getPunpre();
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
		$keys = CapretevadesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodeva(),
			$keys[1] => $this->getCodprg(),
			$keys[2] => $this->getPunpre(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CapretevadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodeva($value);
				break;
			case 1:
				$this->setCodprg($value);
				break;
			case 2:
				$this->setPunpre($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CapretevadesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodeva($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodprg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPunpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CapretevadesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CapretevadesPeer::CODEVA)) $criteria->add(CapretevadesPeer::CODEVA, $this->codeva);
		if ($this->isColumnModified(CapretevadesPeer::CODPRG)) $criteria->add(CapretevadesPeer::CODPRG, $this->codprg);
		if ($this->isColumnModified(CapretevadesPeer::PUNPRE)) $criteria->add(CapretevadesPeer::PUNPRE, $this->punpre);
		if ($this->isColumnModified(CapretevadesPeer::ID)) $criteria->add(CapretevadesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CapretevadesPeer::DATABASE_NAME);

		$criteria->add(CapretevadesPeer::ID, $this->id);

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

		$copyObj->setCodeva($this->codeva);

		$copyObj->setCodprg($this->codprg);

		$copyObj->setPunpre($this->punpre);


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
			self::$peer = new CapretevadesPeer();
		}
		return self::$peer;
	}

} 