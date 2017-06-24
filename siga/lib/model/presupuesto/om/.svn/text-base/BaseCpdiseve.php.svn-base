<?php


abstract class BaseCpdiseve extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refdoc;


	
	protected $codpre;


	
	protected $codeve;


	
	protected $moneve;


	
	protected $tipdoc;


	
	protected $tipmov;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefdoc()
  {

    return trim($this->refdoc);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getCodeve()
  {

    return trim($this->codeve);

  }
  
  public function getMoneve($val=false)
  {

    if($val) return number_format($this->moneve,2,',','.');
    else return $this->moneve;

  }
  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getTipmov()
  {

    return trim($this->tipmov);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefdoc($v)
	{

    if ($this->refdoc !== $v) {
        $this->refdoc = $v;
        $this->modifiedColumns[] = CpdisevePeer::REFDOC;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = CpdisevePeer::CODPRE;
      }
  
	} 
	
	public function setCodeve($v)
	{

    if ($this->codeve !== $v) {
        $this->codeve = $v;
        $this->modifiedColumns[] = CpdisevePeer::CODEVE;
      }
  
	} 
	
	public function setMoneve($v)
	{

    if ($this->moneve !== $v) {
        $this->moneve = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdisevePeer::MONEVE;
      }
  
	} 
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = CpdisevePeer::TIPDOC;
      }
  
	} 
	
	public function setTipmov($v)
	{

    if ($this->tipmov !== $v) {
        $this->tipmov = $v;
        $this->modifiedColumns[] = CpdisevePeer::TIPMOV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpdisevePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refdoc = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->codeve = $rs->getString($startcol + 2);

      $this->moneve = $rs->getFloat($startcol + 3);

      $this->tipdoc = $rs->getString($startcol + 4);

      $this->tipmov = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpdiseve object", $e);
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
			$con = Propel::getConnection(CpdisevePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdisevePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdisevePeer::DATABASE_NAME);
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
					$pk = CpdisevePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpdisevePeer::doUpdate($this, $con);
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


			if (($retval = CpdisevePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdisevePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefdoc();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getCodeve();
				break;
			case 3:
				return $this->getMoneve();
				break;
			case 4:
				return $this->getTipdoc();
				break;
			case 5:
				return $this->getTipmov();
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
		$keys = CpdisevePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefdoc(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getCodeve(),
			$keys[3] => $this->getMoneve(),
			$keys[4] => $this->getTipdoc(),
			$keys[5] => $this->getTipmov(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdisevePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefdoc($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setCodeve($value);
				break;
			case 3:
				$this->setMoneve($value);
				break;
			case 4:
				$this->setTipdoc($value);
				break;
			case 5:
				$this->setTipmov($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdisevePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefdoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodeve($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoneve($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipdoc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipmov($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdisevePeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdisevePeer::REFDOC)) $criteria->add(CpdisevePeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(CpdisevePeer::CODPRE)) $criteria->add(CpdisevePeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpdisevePeer::CODEVE)) $criteria->add(CpdisevePeer::CODEVE, $this->codeve);
		if ($this->isColumnModified(CpdisevePeer::MONEVE)) $criteria->add(CpdisevePeer::MONEVE, $this->moneve);
		if ($this->isColumnModified(CpdisevePeer::TIPDOC)) $criteria->add(CpdisevePeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(CpdisevePeer::TIPMOV)) $criteria->add(CpdisevePeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(CpdisevePeer::ID)) $criteria->add(CpdisevePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdisevePeer::DATABASE_NAME);

		$criteria->add(CpdisevePeer::ID, $this->id);

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

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setCodeve($this->codeve);

		$copyObj->setMoneve($this->moneve);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setTipmov($this->tipmov);


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
			self::$peer = new CpdisevePeer();
		}
		return self::$peer;
	}

} 