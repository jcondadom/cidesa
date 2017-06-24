<?php


abstract class BaseCadepreg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprg;


	
	protected $desprg;


	
	protected $tipprg;


	
	protected $prepro;


	
	protected $preins;


	
	protected $prepys;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodprg()
  {

    return trim($this->codprg);

  }
  
  public function getDesprg()
  {

    return trim($this->desprg);

  }
  
  public function getTipprg()
  {

    return trim($this->tipprg);

  }
  
  public function getPrepro()
  {

    return $this->prepro;

  }
  
  public function getPreins()
  {

    return $this->preins;

  }
  
  public function getPrepys()
  {

    return $this->prepys;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodprg($v)
	{

    if ($this->codprg !== $v) {
        $this->codprg = $v;
        $this->modifiedColumns[] = CadepregPeer::CODPRG;
      }
  
	} 
	
	public function setDesprg($v)
	{

    if ($this->desprg !== $v) {
        $this->desprg = $v;
        $this->modifiedColumns[] = CadepregPeer::DESPRG;
      }
  
	} 
	
	public function setTipprg($v)
	{

    if ($this->tipprg !== $v) {
        $this->tipprg = $v;
        $this->modifiedColumns[] = CadepregPeer::TIPPRG;
      }
  
	} 
	
	public function setPrepro($v)
	{

    if ($this->prepro !== $v) {
        $this->prepro = $v;
        $this->modifiedColumns[] = CadepregPeer::PREPRO;
      }
  
	} 
	
	public function setPreins($v)
	{

    if ($this->preins !== $v) {
        $this->preins = $v;
        $this->modifiedColumns[] = CadepregPeer::PREINS;
      }
  
	} 
	
	public function setPrepys($v)
	{

    if ($this->prepys !== $v) {
        $this->prepys = $v;
        $this->modifiedColumns[] = CadepregPeer::PREPYS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadepregPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codprg = $rs->getString($startcol + 0);

      $this->desprg = $rs->getString($startcol + 1);

      $this->tipprg = $rs->getString($startcol + 2);

      $this->prepro = $rs->getBoolean($startcol + 3);

      $this->preins = $rs->getBoolean($startcol + 4);

      $this->prepys = $rs->getBoolean($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadepreg object", $e);
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
			$con = Propel::getConnection(CadepregPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadepregPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadepregPeer::DATABASE_NAME);
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
					$pk = CadepregPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadepregPeer::doUpdate($this, $con);
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


			if (($retval = CadepregPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadepregPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodprg();
				break;
			case 1:
				return $this->getDesprg();
				break;
			case 2:
				return $this->getTipprg();
				break;
			case 3:
				return $this->getPrepro();
				break;
			case 4:
				return $this->getPreins();
				break;
			case 5:
				return $this->getPrepys();
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
		$keys = CadepregPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprg(),
			$keys[1] => $this->getDesprg(),
			$keys[2] => $this->getTipprg(),
			$keys[3] => $this->getPrepro(),
			$keys[4] => $this->getPreins(),
			$keys[5] => $this->getPrepys(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadepregPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodprg($value);
				break;
			case 1:
				$this->setDesprg($value);
				break;
			case 2:
				$this->setTipprg($value);
				break;
			case 3:
				$this->setPrepro($value);
				break;
			case 4:
				$this->setPreins($value);
				break;
			case 5:
				$this->setPrepys($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadepregPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesprg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipprg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPrepro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPreins($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPrepys($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadepregPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadepregPeer::CODPRG)) $criteria->add(CadepregPeer::CODPRG, $this->codprg);
		if ($this->isColumnModified(CadepregPeer::DESPRG)) $criteria->add(CadepregPeer::DESPRG, $this->desprg);
		if ($this->isColumnModified(CadepregPeer::TIPPRG)) $criteria->add(CadepregPeer::TIPPRG, $this->tipprg);
		if ($this->isColumnModified(CadepregPeer::PREPRO)) $criteria->add(CadepregPeer::PREPRO, $this->prepro);
		if ($this->isColumnModified(CadepregPeer::PREINS)) $criteria->add(CadepregPeer::PREINS, $this->preins);
		if ($this->isColumnModified(CadepregPeer::PREPYS)) $criteria->add(CadepregPeer::PREPYS, $this->prepys);
		if ($this->isColumnModified(CadepregPeer::ID)) $criteria->add(CadepregPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadepregPeer::DATABASE_NAME);

		$criteria->add(CadepregPeer::ID, $this->id);

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

		$copyObj->setCodprg($this->codprg);

		$copyObj->setDesprg($this->desprg);

		$copyObj->setTipprg($this->tipprg);

		$copyObj->setPrepro($this->prepro);

		$copyObj->setPreins($this->preins);

		$copyObj->setPrepys($this->prepys);


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
			self::$peer = new CadepregPeer();
		}
		return self::$peer;
	}

} 