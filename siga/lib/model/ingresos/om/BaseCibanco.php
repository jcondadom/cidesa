<?php


abstract class BaseCibanco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codban;


	
	protected $desban;


	
	protected $numcue;


	
	protected $mancom;


	
	protected $porcom;


	
	protected $codcta;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodban()
  {

    return trim($this->codban);

  }
  
  public function getDesban()
  {

    return trim($this->desban);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getMancom()
  {

    return trim($this->mancom);

  }
  
  public function getPorcom($val=false)
  {

    if($val) return number_format($this->porcom,2,',','.');
    else return $this->porcom;

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodban($v)
	{

    if ($this->codban !== $v) {
        $this->codban = $v;
        $this->modifiedColumns[] = CibancoPeer::CODBAN;
      }
  
	} 
	
	public function setDesban($v)
	{

    if ($this->desban !== $v) {
        $this->desban = $v;
        $this->modifiedColumns[] = CibancoPeer::DESBAN;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = CibancoPeer::NUMCUE;
      }
  
	} 
	
	public function setMancom($v)
	{

    if ($this->mancom !== $v) {
        $this->mancom = $v;
        $this->modifiedColumns[] = CibancoPeer::MANCOM;
      }
  
	} 
	
	public function setPorcom($v)
	{

    if ($this->porcom !== $v) {
        $this->porcom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CibancoPeer::PORCOM;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = CibancoPeer::CODCTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CibancoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codban = $rs->getString($startcol + 0);

      $this->desban = $rs->getString($startcol + 1);

      $this->numcue = $rs->getString($startcol + 2);

      $this->mancom = $rs->getString($startcol + 3);

      $this->porcom = $rs->getFloat($startcol + 4);

      $this->codcta = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cibanco object", $e);
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
			$con = Propel::getConnection(CibancoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CibancoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CibancoPeer::DATABASE_NAME);
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
					$pk = CibancoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CibancoPeer::doUpdate($this, $con);
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


			if (($retval = CibancoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CibancoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodban();
				break;
			case 1:
				return $this->getDesban();
				break;
			case 2:
				return $this->getNumcue();
				break;
			case 3:
				return $this->getMancom();
				break;
			case 4:
				return $this->getPorcom();
				break;
			case 5:
				return $this->getCodcta();
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
		$keys = CibancoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodban(),
			$keys[1] => $this->getDesban(),
			$keys[2] => $this->getNumcue(),
			$keys[3] => $this->getMancom(),
			$keys[4] => $this->getPorcom(),
			$keys[5] => $this->getCodcta(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CibancoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodban($value);
				break;
			case 1:
				$this->setDesban($value);
				break;
			case 2:
				$this->setNumcue($value);
				break;
			case 3:
				$this->setMancom($value);
				break;
			case 4:
				$this->setPorcom($value);
				break;
			case 5:
				$this->setCodcta($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CibancoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodban($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesban($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumcue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMancom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorcom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcta($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CibancoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CibancoPeer::CODBAN)) $criteria->add(CibancoPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(CibancoPeer::DESBAN)) $criteria->add(CibancoPeer::DESBAN, $this->desban);
		if ($this->isColumnModified(CibancoPeer::NUMCUE)) $criteria->add(CibancoPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(CibancoPeer::MANCOM)) $criteria->add(CibancoPeer::MANCOM, $this->mancom);
		if ($this->isColumnModified(CibancoPeer::PORCOM)) $criteria->add(CibancoPeer::PORCOM, $this->porcom);
		if ($this->isColumnModified(CibancoPeer::CODCTA)) $criteria->add(CibancoPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CibancoPeer::ID)) $criteria->add(CibancoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CibancoPeer::DATABASE_NAME);

		$criteria->add(CibancoPeer::ID, $this->id);

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

		$copyObj->setCodban($this->codban);

		$copyObj->setDesban($this->desban);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setMancom($this->mancom);

		$copyObj->setPorcom($this->porcom);

		$copyObj->setCodcta($this->codcta);


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
			self::$peer = new CibancoPeer();
		}
		return self::$peer;
	}

} 