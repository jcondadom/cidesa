<?php


abstract class BaseCpdetptocta extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpta;


	
	protected $codpre;


	
	protected $moncod;


	
	protected $id;

	
	protected $aCpdeftit;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpta()
  {

    return trim($this->numpta);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getMoncod($val=false)
  {

    if($val) return number_format($this->moncod,2,',','.');
    else return $this->moncod;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpta($v)
	{

    if ($this->numpta !== $v) {
        $this->numpta = $v;
        $this->modifiedColumns[] = CpdetptoctaPeer::NUMPTA;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CpdetptoctaPeer::CODPRE;
      }
  
		if ($this->aCpdeftit !== null && $this->aCpdeftit->getCodpre() !== $v) {
			$this->aCpdeftit = null;
		}

	} 
	
	public function setMoncod($v)
	{

    if ($this->moncod !== $v) {
        $this->moncod = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdetptoctaPeer::MONCOD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpdetptoctaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpta = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->moncod = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpdetptocta object", $e);
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
			$con = Propel::getConnection(CpdetptoctaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdetptoctaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdetptoctaPeer::DATABASE_NAME);
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


												
			if ($this->aCpdeftit !== null) {
				if ($this->aCpdeftit->isModified()) {
					$affectedRows += $this->aCpdeftit->save($con);
				}
				$this->setCpdeftit($this->aCpdeftit);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CpdetptoctaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpdetptoctaPeer::doUpdate($this, $con);
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


												
			if ($this->aCpdeftit !== null) {
				if (!$this->aCpdeftit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpdeftit->getValidationFailures());
				}
			}


			if (($retval = CpdetptoctaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdetptoctaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpta();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getMoncod();
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
		$keys = CpdetptoctaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpta(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getMoncod(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdetptoctaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpta($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setMoncod($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdetptoctaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMoncod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdetptoctaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdetptoctaPeer::NUMPTA)) $criteria->add(CpdetptoctaPeer::NUMPTA, $this->numpta);
		if ($this->isColumnModified(CpdetptoctaPeer::CODPRE)) $criteria->add(CpdetptoctaPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpdetptoctaPeer::MONCOD)) $criteria->add(CpdetptoctaPeer::MONCOD, $this->moncod);
		if ($this->isColumnModified(CpdetptoctaPeer::ID)) $criteria->add(CpdetptoctaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdetptoctaPeer::DATABASE_NAME);

		$criteria->add(CpdetptoctaPeer::ID, $this->id);

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

		$copyObj->setNumpta($this->numpta);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMoncod($this->moncod);


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
			self::$peer = new CpdetptoctaPeer();
		}
		return self::$peer;
	}

	
	public function setCpdeftit($v)
	{


		if ($v === null) {
			$this->setCodpre(NULL);
		} else {
			$this->setCodpre($v->getCodpre());
		}


		$this->aCpdeftit = $v;
	}


	
	public function getCpdeftit($con = null)
	{
		if ($this->aCpdeftit === null && (($this->codpre !== "" && $this->codpre !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpdeftitPeer.php';

      $c = new Criteria();
      $c->add(CpdeftitPeer::CODPRE,$this->codpre);
      
			$this->aCpdeftit = CpdeftitPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpdeftit;
	}

} 