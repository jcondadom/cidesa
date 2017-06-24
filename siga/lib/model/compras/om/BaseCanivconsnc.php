<?php


abstract class BaseCanivconsnc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codniv;


	
	protected $desniv;


	
	protected $mondes;


	
	protected $monhas;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getDesniv()
  {

    return trim($this->desniv);

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMonhas($val=false)
  {

    if($val) return number_format($this->monhas,2,',','.');
    else return $this->monhas;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = CanivconsncPeer::CODNIV;
      }
  
	} 
	
	public function setDesniv($v)
	{

    if ($this->desniv !== $v) {
        $this->desniv = $v;
        $this->modifiedColumns[] = CanivconsncPeer::DESNIV;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CanivconsncPeer::MONDES;
      }
  
	} 
	
	public function setMonhas($v)
	{

    if ($this->monhas !== $v) {
        $this->monhas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CanivconsncPeer::MONHAS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CanivconsncPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codniv = $rs->getString($startcol + 0);

      $this->desniv = $rs->getString($startcol + 1);

      $this->mondes = $rs->getFloat($startcol + 2);

      $this->monhas = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Canivconsnc object", $e);
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
			$con = Propel::getConnection(CanivconsncPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CanivconsncPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CanivconsncPeer::DATABASE_NAME);
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
					$pk = CanivconsncPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CanivconsncPeer::doUpdate($this, $con);
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


			if (($retval = CanivconsncPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CanivconsncPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodniv();
				break;
			case 1:
				return $this->getDesniv();
				break;
			case 2:
				return $this->getMondes();
				break;
			case 3:
				return $this->getMonhas();
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
		$keys = CanivconsncPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodniv(),
			$keys[1] => $this->getDesniv(),
			$keys[2] => $this->getMondes(),
			$keys[3] => $this->getMonhas(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CanivconsncPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodniv($value);
				break;
			case 1:
				$this->setDesniv($value);
				break;
			case 2:
				$this->setMondes($value);
				break;
			case 3:
				$this->setMonhas($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CanivconsncPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodniv($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesniv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMondes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonhas($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CanivconsncPeer::DATABASE_NAME);

		if ($this->isColumnModified(CanivconsncPeer::CODNIV)) $criteria->add(CanivconsncPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(CanivconsncPeer::DESNIV)) $criteria->add(CanivconsncPeer::DESNIV, $this->desniv);
		if ($this->isColumnModified(CanivconsncPeer::MONDES)) $criteria->add(CanivconsncPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CanivconsncPeer::MONHAS)) $criteria->add(CanivconsncPeer::MONHAS, $this->monhas);
		if ($this->isColumnModified(CanivconsncPeer::ID)) $criteria->add(CanivconsncPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CanivconsncPeer::DATABASE_NAME);

		$criteria->add(CanivconsncPeer::ID, $this->id);

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

		$copyObj->setCodniv($this->codniv);

		$copyObj->setDesniv($this->desniv);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonhas($this->monhas);


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
			self::$peer = new CanivconsncPeer();
		}
		return self::$peer;
	}

} 