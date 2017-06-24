<?php


abstract class BaseMantarord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $numtar;


	
	protected $destar;


	
	protected $codins;


	
	protected $codest;


	
	protected $rutina;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getNumtar()
  {

    return trim($this->numtar);

  }
  
  public function getDestar()
  {

    return trim($this->destar);

  }
  
  public function getCodins()
  {

    return trim($this->codins);

  }
  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getRutina()
  {

    return trim($this->rutina);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = MantarordPeer::NUMORD;
      }
  
	} 
	
	public function setNumtar($v)
	{

    if ($this->numtar !== $v) {
        $this->numtar = $v;
        $this->modifiedColumns[] = MantarordPeer::NUMTAR;
      }
  
	} 
	
	public function setDestar($v)
	{

    if ($this->destar !== $v) {
        $this->destar = $v;
        $this->modifiedColumns[] = MantarordPeer::DESTAR;
      }
  
	} 
	
	public function setCodins($v)
	{

    if ($this->codins !== $v) {
        $this->codins = $v;
        $this->modifiedColumns[] = MantarordPeer::CODINS;
      }
  
	} 
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = MantarordPeer::CODEST;
      }
  
	} 
	
	public function setRutina($v)
	{

    if ($this->rutina !== $v) {
        $this->rutina = $v;
        $this->modifiedColumns[] = MantarordPeer::RUTINA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = MantarordPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->numtar = $rs->getString($startcol + 1);

      $this->destar = $rs->getString($startcol + 2);

      $this->codins = $rs->getString($startcol + 3);

      $this->codest = $rs->getString($startcol + 4);

      $this->rutina = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Mantarord object", $e);
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
			$con = Propel::getConnection(MantarordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MantarordPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MantarordPeer::DATABASE_NAME);
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
					$pk = MantarordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MantarordPeer::doUpdate($this, $con);
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


			if (($retval = MantarordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MantarordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getNumtar();
				break;
			case 2:
				return $this->getDestar();
				break;
			case 3:
				return $this->getCodins();
				break;
			case 4:
				return $this->getCodest();
				break;
			case 5:
				return $this->getRutina();
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
		$keys = MantarordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getNumtar(),
			$keys[2] => $this->getDestar(),
			$keys[3] => $this->getCodins(),
			$keys[4] => $this->getCodest(),
			$keys[5] => $this->getRutina(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MantarordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setNumtar($value);
				break;
			case 2:
				$this->setDestar($value);
				break;
			case 3:
				$this->setCodins($value);
				break;
			case 4:
				$this->setCodest($value);
				break;
			case 5:
				$this->setRutina($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MantarordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumtar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDestar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodins($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodest($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRutina($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MantarordPeer::DATABASE_NAME);

		if ($this->isColumnModified(MantarordPeer::NUMORD)) $criteria->add(MantarordPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(MantarordPeer::NUMTAR)) $criteria->add(MantarordPeer::NUMTAR, $this->numtar);
		if ($this->isColumnModified(MantarordPeer::DESTAR)) $criteria->add(MantarordPeer::DESTAR, $this->destar);
		if ($this->isColumnModified(MantarordPeer::CODINS)) $criteria->add(MantarordPeer::CODINS, $this->codins);
		if ($this->isColumnModified(MantarordPeer::CODEST)) $criteria->add(MantarordPeer::CODEST, $this->codest);
		if ($this->isColumnModified(MantarordPeer::RUTINA)) $criteria->add(MantarordPeer::RUTINA, $this->rutina);
		if ($this->isColumnModified(MantarordPeer::ID)) $criteria->add(MantarordPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MantarordPeer::DATABASE_NAME);

		$criteria->add(MantarordPeer::ID, $this->id);

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

		$copyObj->setNumord($this->numord);

		$copyObj->setNumtar($this->numtar);

		$copyObj->setDestar($this->destar);

		$copyObj->setCodins($this->codins);

		$copyObj->setCodest($this->codest);

		$copyObj->setRutina($this->rutina);


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
			self::$peer = new MantarordPeer();
		}
		return self::$peer;
	}

} 