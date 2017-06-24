<?php


abstract class BaseFadetant extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroant;


	
	protected $nroped;


	
	protected $monant;


	
	protected $porant;


	
	protected $id;

	
	protected $aFaantcli;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNroant()
  {

    return trim($this->nroant);

  }
  
  public function getNroped()
  {

    return trim($this->nroped);

  }
  
  public function getMonant($val=false)
  {

    if($val) return number_format($this->monant,2,',','.');
    else return $this->monant;

  }
  
  public function getPorant($val=false)
  {

    if($val) return number_format($this->porant,2,',','.');
    else return $this->porant;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNroant($v)
	{

    if ($this->nroant !== $v) {
        $this->nroant = $v;
        $this->modifiedColumns[] = FadetantPeer::NROANT;
      }
  
		if ($this->aFaantcli !== null && $this->aFaantcli->getNroant() !== $v) {
			$this->aFaantcli = null;
		}

	} 
	
	public function setNroped($v)
	{

    if ($this->nroped !== $v) {
        $this->nroped = $v;
        $this->modifiedColumns[] = FadetantPeer::NROPED;
      }
  
	} 
	
	public function setMonant($v)
	{

    if ($this->monant !== $v) {
        $this->monant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetantPeer::MONANT;
      }
  
	} 
	
	public function setPorant($v)
	{

    if ($this->porant !== $v) {
        $this->porant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetantPeer::PORANT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadetantPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nroant = $rs->getString($startcol + 0);

      $this->nroped = $rs->getString($startcol + 1);

      $this->monant = $rs->getFloat($startcol + 2);

      $this->porant = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadetant object", $e);
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
			$con = Propel::getConnection(FadetantPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadetantPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadetantPeer::DATABASE_NAME);
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


												
			if ($this->aFaantcli !== null) {
				if ($this->aFaantcli->isModified()) {
					$affectedRows += $this->aFaantcli->save($con);
				}
				$this->setFaantcli($this->aFaantcli);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FadetantPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadetantPeer::doUpdate($this, $con);
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


												
			if ($this->aFaantcli !== null) {
				if (!$this->aFaantcli->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaantcli->getValidationFailures());
				}
			}


			if (($retval = FadetantPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadetantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroant();
				break;
			case 1:
				return $this->getNroped();
				break;
			case 2:
				return $this->getMonant();
				break;
			case 3:
				return $this->getPorant();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadetantPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroant(),
			$keys[1] => $this->getNroped(),
			$keys[2] => $this->getMonant(),
			$keys[3] => $this->getPorant(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadetantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroant($value);
				break;
			case 1:
				$this->setNroped($value);
				break;
			case 2:
				$this->setMonant($value);
				break;
			case 3:
				$this->setPorant($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadetantPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroant($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNroped($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonant($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPorant($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadetantPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadetantPeer::NROANT)) $criteria->add(FadetantPeer::NROANT, $this->nroant);
		if ($this->isColumnModified(FadetantPeer::NROPED)) $criteria->add(FadetantPeer::NROPED, $this->nroped);
		if ($this->isColumnModified(FadetantPeer::MONANT)) $criteria->add(FadetantPeer::MONANT, $this->monant);
		if ($this->isColumnModified(FadetantPeer::PORANT)) $criteria->add(FadetantPeer::PORANT, $this->porant);
		if ($this->isColumnModified(FadetantPeer::ID)) $criteria->add(FadetantPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadetantPeer::DATABASE_NAME);

		$criteria->add(FadetantPeer::ID, $this->id);

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

		$copyObj->setNroant($this->nroant);

		$copyObj->setNroped($this->nroped);

		$copyObj->setMonant($this->monant);

		$copyObj->setPorant($this->porant);


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
			self::$peer = new FadetantPeer();
		}
		return self::$peer;
	}

	
	public function setFaantcli($v)
	{


		if ($v === null) {
			$this->setNroant(NULL);
		} else {
			$this->setNroant($v->getNroant());
		}


		$this->aFaantcli = $v;
	}


	
	public function getFaantcli($con = null)
	{
		if ($this->aFaantcli === null && (($this->nroant !== "" && $this->nroant !== null))) {
						include_once 'lib/model/facturacion/om/BaseFaantcliPeer.php';

      $c = new Criteria();
      $c->add(FaantcliPeer::NROANT,$this->nroant);
      
			$this->aFaantcli = FaantcliPeer::doSelectOne($c, $con);

			
		}
		return $this->aFaantcli;
	}

} 