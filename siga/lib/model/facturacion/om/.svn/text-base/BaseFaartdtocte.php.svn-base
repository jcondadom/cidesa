<?php


abstract class BaseFaartdtocte extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fatipcte_id;


	
	protected $codart;


	
	protected $coddesc;


	
	protected $id;

	
	protected $aFatipcte;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getFatipcteId()
  {

    return $this->fatipcte_id;

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCoddesc()
  {

    return trim($this->coddesc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setFatipcteId($v)
	{

    if ($this->fatipcte_id !== $v) {
        $this->fatipcte_id = $v;
        $this->modifiedColumns[] = FaartdtoctePeer::FATIPCTE_ID;
      }
  
		if ($this->aFatipcte !== null && $this->aFatipcte->getId() !== $v) {
			$this->aFatipcte = null;
		}

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FaartdtoctePeer::CODART;
      }
  
	} 
	
	public function setCoddesc($v)
	{

    if ($this->coddesc !== $v) {
        $this->coddesc = $v;
        $this->modifiedColumns[] = FaartdtoctePeer::CODDESC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaartdtoctePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->fatipcte_id = $rs->getInt($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->coddesc = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faartdtocte object", $e);
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
			$con = Propel::getConnection(FaartdtoctePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaartdtoctePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaartdtoctePeer::DATABASE_NAME);
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


												
			if ($this->aFatipcte !== null) {
				if ($this->aFatipcte->isModified()) {
					$affectedRows += $this->aFatipcte->save($con);
				}
				$this->setFatipcte($this->aFatipcte);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FaartdtoctePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaartdtoctePeer::doUpdate($this, $con);
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


												
			if ($this->aFatipcte !== null) {
				if (!$this->aFatipcte->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFatipcte->getValidationFailures());
				}
			}


			if (($retval = FaartdtoctePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartdtoctePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFatipcteId();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCoddesc();
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
		$keys = FaartdtoctePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFatipcteId(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCoddesc(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartdtoctePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFatipcteId($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCoddesc($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartdtoctePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFatipcteId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoddesc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaartdtoctePeer::DATABASE_NAME);

		if ($this->isColumnModified(FaartdtoctePeer::FATIPCTE_ID)) $criteria->add(FaartdtoctePeer::FATIPCTE_ID, $this->fatipcte_id);
		if ($this->isColumnModified(FaartdtoctePeer::CODART)) $criteria->add(FaartdtoctePeer::CODART, $this->codart);
		if ($this->isColumnModified(FaartdtoctePeer::CODDESC)) $criteria->add(FaartdtoctePeer::CODDESC, $this->coddesc);
		if ($this->isColumnModified(FaartdtoctePeer::ID)) $criteria->add(FaartdtoctePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaartdtoctePeer::DATABASE_NAME);

		$criteria->add(FaartdtoctePeer::ID, $this->id);

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

		$copyObj->setFatipcteId($this->fatipcte_id);

		$copyObj->setCodart($this->codart);

		$copyObj->setCoddesc($this->coddesc);


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
			self::$peer = new FaartdtoctePeer();
		}
		return self::$peer;
	}

	
	public function setFatipcte($v)
	{


		if ($v === null) {
			$this->setFatipcteId(NULL);
		} else {
			$this->setFatipcteId($v->getId());
		}


		$this->aFatipcte = $v;
	}


	
	public function getFatipcte($con = null)
	{
		if ($this->aFatipcte === null && ($this->fatipcte_id !== null)) {
						include_once 'lib/model/facturacion/om/BaseFatipctePeer.php';

      $c = new Criteria();
      $c->add(FatipctePeer::ID,$this->fatipcte_id);
      
			$this->aFatipcte = FatipctePeer::doSelectOne($c, $con);

			
		}
		return $this->aFatipcte;
	}

} 