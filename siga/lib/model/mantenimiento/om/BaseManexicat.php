<?php


abstract class BaseManexicat extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $stccla;


	
	protected $codalm;


	
	protected $eximin;


	
	protected $eximax;


	
	protected $ptoreo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getStccla()
  {

    return trim($this->stccla);

  }
  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getEximin($val=false)
  {

    if($val) return number_format($this->eximin,2,',','.');
    else return $this->eximin;

  }
  
  public function getEximax($val=false)
  {

    if($val) return number_format($this->eximax,2,',','.');
    else return $this->eximax;

  }
  
  public function getPtoreo($val=false)
  {

    if($val) return number_format($this->ptoreo,2,',','.');
    else return $this->ptoreo;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = ManexicatPeer::NUMSOL;
      }
  
	} 
	
	public function setStccla($v)
	{

    if ($this->stccla !== $v) {
        $this->stccla = $v;
        $this->modifiedColumns[] = ManexicatPeer::STCCLA;
      }
  
	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = ManexicatPeer::CODALM;
      }
  
	} 
	
	public function setEximin($v)
	{

    if ($this->eximin !== $v) {
        $this->eximin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManexicatPeer::EXIMIN;
      }
  
	} 
	
	public function setEximax($v)
	{

    if ($this->eximax !== $v) {
        $this->eximax = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManexicatPeer::EXIMAX;
      }
  
	} 
	
	public function setPtoreo($v)
	{

    if ($this->ptoreo !== $v) {
        $this->ptoreo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManexicatPeer::PTOREO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ManexicatPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->stccla = $rs->getString($startcol + 1);

      $this->codalm = $rs->getString($startcol + 2);

      $this->eximin = $rs->getFloat($startcol + 3);

      $this->eximax = $rs->getFloat($startcol + 4);

      $this->ptoreo = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Manexicat object", $e);
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
			$con = Propel::getConnection(ManexicatPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ManexicatPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ManexicatPeer::DATABASE_NAME);
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
					$pk = ManexicatPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ManexicatPeer::doUpdate($this, $con);
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


			if (($retval = ManexicatPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManexicatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getStccla();
				break;
			case 2:
				return $this->getCodalm();
				break;
			case 3:
				return $this->getEximin();
				break;
			case 4:
				return $this->getEximax();
				break;
			case 5:
				return $this->getPtoreo();
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
		$keys = ManexicatPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getStccla(),
			$keys[2] => $this->getCodalm(),
			$keys[3] => $this->getEximin(),
			$keys[4] => $this->getEximax(),
			$keys[5] => $this->getPtoreo(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManexicatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setStccla($value);
				break;
			case 2:
				$this->setCodalm($value);
				break;
			case 3:
				$this->setEximin($value);
				break;
			case 4:
				$this->setEximax($value);
				break;
			case 5:
				$this->setPtoreo($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ManexicatPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setStccla($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodalm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEximin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEximax($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPtoreo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ManexicatPeer::DATABASE_NAME);

		if ($this->isColumnModified(ManexicatPeer::NUMSOL)) $criteria->add(ManexicatPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(ManexicatPeer::STCCLA)) $criteria->add(ManexicatPeer::STCCLA, $this->stccla);
		if ($this->isColumnModified(ManexicatPeer::CODALM)) $criteria->add(ManexicatPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(ManexicatPeer::EXIMIN)) $criteria->add(ManexicatPeer::EXIMIN, $this->eximin);
		if ($this->isColumnModified(ManexicatPeer::EXIMAX)) $criteria->add(ManexicatPeer::EXIMAX, $this->eximax);
		if ($this->isColumnModified(ManexicatPeer::PTOREO)) $criteria->add(ManexicatPeer::PTOREO, $this->ptoreo);
		if ($this->isColumnModified(ManexicatPeer::ID)) $criteria->add(ManexicatPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ManexicatPeer::DATABASE_NAME);

		$criteria->add(ManexicatPeer::ID, $this->id);

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

		$copyObj->setStccla($this->stccla);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setEximin($this->eximin);

		$copyObj->setEximax($this->eximax);

		$copyObj->setPtoreo($this->ptoreo);


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
			self::$peer = new ManexicatPeer();
		}
		return self::$peer;
	}

} 