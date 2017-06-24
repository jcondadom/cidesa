<?php


abstract class BasePapiro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddoc;


	
	protected $documento;


	
	protected $download;


	
	protected $view;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddoc()
  {

    return trim($this->coddoc);

  }
  
  public function getDocumento()
  {

    return $this->documento;

  }
  
  public function getDownload()
  {

    return trim($this->download);

  }
  
  public function getView()
  {

    return trim($this->view);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddoc($v)
	{

    if ($this->coddoc !== $v) {
        $this->coddoc = $v;
        $this->modifiedColumns[] = PapiroPeer::CODDOC;
      }
  
	} 
	
	public function setDocumento($v)
	{

    if ($this->documento !== $v) {
        $this->documento = $v;
        $this->modifiedColumns[] = PapiroPeer::DOCUMENTO;
      }
  
	} 
	
	public function setDownload($v)
	{

    if ($this->download !== $v) {
        $this->download = $v;
        $this->modifiedColumns[] = PapiroPeer::DOWNLOAD;
      }
  
	} 
	
	public function setView($v)
	{

    if ($this->view !== $v) {
        $this->view = $v;
        $this->modifiedColumns[] = PapiroPeer::VIEW;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = PapiroPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddoc = $rs->getString($startcol + 0);

      $this->documento = $rs->getInt($startcol + 1);

      $this->download = $rs->getString($startcol + 2);

      $this->view = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Papiro object", $e);
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
			$con = Propel::getConnection(PapiroPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PapiroPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PapiroPeer::DATABASE_NAME);
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
					$pk = PapiroPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PapiroPeer::doUpdate($this, $con);
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


			if (($retval = PapiroPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PapiroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddoc();
				break;
			case 1:
				return $this->getDocumento();
				break;
			case 2:
				return $this->getDownload();
				break;
			case 3:
				return $this->getView();
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
		$keys = PapiroPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddoc(),
			$keys[1] => $this->getDocumento(),
			$keys[2] => $this->getDownload(),
			$keys[3] => $this->getView(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PapiroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddoc($value);
				break;
			case 1:
				$this->setDocumento($value);
				break;
			case 2:
				$this->setDownload($value);
				break;
			case 3:
				$this->setView($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PapiroPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDocumento($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDownload($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setView($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PapiroPeer::DATABASE_NAME);

		if ($this->isColumnModified(PapiroPeer::CODDOC)) $criteria->add(PapiroPeer::CODDOC, $this->coddoc);
		if ($this->isColumnModified(PapiroPeer::DOCUMENTO)) $criteria->add(PapiroPeer::DOCUMENTO, $this->documento);
		if ($this->isColumnModified(PapiroPeer::DOWNLOAD)) $criteria->add(PapiroPeer::DOWNLOAD, $this->download);
		if ($this->isColumnModified(PapiroPeer::VIEW)) $criteria->add(PapiroPeer::VIEW, $this->view);
		if ($this->isColumnModified(PapiroPeer::ID)) $criteria->add(PapiroPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PapiroPeer::DATABASE_NAME);

		$criteria->add(PapiroPeer::ID, $this->id);

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

		$copyObj->setCoddoc($this->coddoc);

		$copyObj->setDocumento($this->documento);

		$copyObj->setDownload($this->download);

		$copyObj->setView($this->view);


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
			self::$peer = new PapiroPeer();
		}
		return self::$peer;
	}

} 