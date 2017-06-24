<?php


abstract class BaseLianaemptec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numanaemp;


	
	protected $codcri;


	
	protected $punemp;


	
	protected $poremp;


	
	protected $observ;


	
	protected $tipconpub;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumanaemp()
  {

    return trim($this->numanaemp);

  }
  
  public function getCodcri()
  {

    return trim($this->codcri);

  }
  
  public function getPunemp($val=false)
  {

    if($val) return number_format($this->punemp,2,',','.');
    else return $this->punemp;

  }
  
  public function getPoremp($val=false)
  {

    if($val) return number_format($this->poremp,2,',','.');
    else return $this->poremp;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumanaemp($v)
	{

    if ($this->numanaemp !== $v) {
        $this->numanaemp = $v;
        $this->modifiedColumns[] = LianaemptecPeer::NUMANAEMP;
      }
  
	} 
	
	public function setCodcri($v)
	{

    if ($this->codcri !== $v) {
        $this->codcri = $v;
        $this->modifiedColumns[] = LianaemptecPeer::CODCRI;
      }
  
	} 
	
	public function setPunemp($v)
	{

    if ($this->punemp !== $v) {
        $this->punemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaemptecPeer::PUNEMP;
      }
  
	} 
	
	public function setPoremp($v)
	{

    if ($this->poremp !== $v) {
        $this->poremp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaemptecPeer::POREMP;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = LianaemptecPeer::OBSERV;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LianaemptecPeer::TIPCONPUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LianaemptecPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numanaemp = $rs->getString($startcol + 0);

      $this->codcri = $rs->getString($startcol + 1);

      $this->punemp = $rs->getFloat($startcol + 2);

      $this->poremp = $rs->getFloat($startcol + 3);

      $this->observ = $rs->getString($startcol + 4);

      $this->tipconpub = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lianaemptec object", $e);
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
			$con = Propel::getConnection(LianaemptecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LianaemptecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LianaemptecPeer::DATABASE_NAME);
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
					$pk = LianaemptecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LianaemptecPeer::doUpdate($this, $con);
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


			if (($retval = LianaemptecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LianaemptecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumanaemp();
				break;
			case 1:
				return $this->getCodcri();
				break;
			case 2:
				return $this->getPunemp();
				break;
			case 3:
				return $this->getPoremp();
				break;
			case 4:
				return $this->getObserv();
				break;
			case 5:
				return $this->getTipconpub();
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
		$keys = LianaemptecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumanaemp(),
			$keys[1] => $this->getCodcri(),
			$keys[2] => $this->getPunemp(),
			$keys[3] => $this->getPoremp(),
			$keys[4] => $this->getObserv(),
			$keys[5] => $this->getTipconpub(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LianaemptecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumanaemp($value);
				break;
			case 1:
				$this->setCodcri($value);
				break;
			case 2:
				$this->setPunemp($value);
				break;
			case 3:
				$this->setPoremp($value);
				break;
			case 4:
				$this->setObserv($value);
				break;
			case 5:
				$this->setTipconpub($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LianaemptecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumanaemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcri($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPunemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPoremp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObserv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipconpub($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LianaemptecPeer::DATABASE_NAME);

		if ($this->isColumnModified(LianaemptecPeer::NUMANAEMP)) $criteria->add(LianaemptecPeer::NUMANAEMP, $this->numanaemp);
		if ($this->isColumnModified(LianaemptecPeer::CODCRI)) $criteria->add(LianaemptecPeer::CODCRI, $this->codcri);
		if ($this->isColumnModified(LianaemptecPeer::PUNEMP)) $criteria->add(LianaemptecPeer::PUNEMP, $this->punemp);
		if ($this->isColumnModified(LianaemptecPeer::POREMP)) $criteria->add(LianaemptecPeer::POREMP, $this->poremp);
		if ($this->isColumnModified(LianaemptecPeer::OBSERV)) $criteria->add(LianaemptecPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(LianaemptecPeer::TIPCONPUB)) $criteria->add(LianaemptecPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LianaemptecPeer::ID)) $criteria->add(LianaemptecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LianaemptecPeer::DATABASE_NAME);

		$criteria->add(LianaemptecPeer::ID, $this->id);

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

		$copyObj->setNumanaemp($this->numanaemp);

		$copyObj->setCodcri($this->codcri);

		$copyObj->setPunemp($this->punemp);

		$copyObj->setPoremp($this->poremp);

		$copyObj->setObserv($this->observ);

		$copyObj->setTipconpub($this->tipconpub);


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
			self::$peer = new LianaemptecPeer();
		}
		return self::$peer;
	}

} 