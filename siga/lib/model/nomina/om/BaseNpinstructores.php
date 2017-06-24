<?php


abstract class BaseNpinstructores extends BaseObject  {


	
	protected static $peer;


	
	protected $cedpro;


	
	protected $nompro;


	
	protected $tippro;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedpro()
  {

    return trim($this->cedpro);

  }
  
  public function getNompro()
  {

    return trim($this->nompro);

  }
  
  public function getTippro()
  {

    return trim($this->tippro);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedpro($v)
	{

    if ($this->cedpro !== $v) {
        $this->cedpro = $v;
        $this->modifiedColumns[] = NpinstructoresPeer::CEDPRO;
      }
  
	} 
	
	public function setNompro($v)
	{

    if ($this->nompro !== $v) {
        $this->nompro = $v;
        $this->modifiedColumns[] = NpinstructoresPeer::NOMPRO;
      }
  
	} 
	
	public function setTippro($v)
	{

    if ($this->tippro !== $v) {
        $this->tippro = $v;
        $this->modifiedColumns[] = NpinstructoresPeer::TIPPRO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinstructoresPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedpro = $rs->getString($startcol + 0);

      $this->nompro = $rs->getString($startcol + 1);

      $this->tippro = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinstructores object", $e);
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
			$con = Propel::getConnection(NpinstructoresPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinstructoresPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinstructoresPeer::DATABASE_NAME);
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
					$pk = NpinstructoresPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinstructoresPeer::doUpdate($this, $con);
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


			if (($retval = NpinstructoresPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinstructoresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedpro();
				break;
			case 1:
				return $this->getNompro();
				break;
			case 2:
				return $this->getTippro();
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
		$keys = NpinstructoresPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedpro(),
			$keys[1] => $this->getNompro(),
			$keys[2] => $this->getTippro(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinstructoresPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinstructoresPeer::CEDPRO)) $criteria->add(NpinstructoresPeer::CEDPRO, $this->cedpro);
		if ($this->isColumnModified(NpinstructoresPeer::NOMPRO)) $criteria->add(NpinstructoresPeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(NpinstructoresPeer::TIPPRO)) $criteria->add(NpinstructoresPeer::TIPPRO, $this->tippro);
		if ($this->isColumnModified(NpinstructoresPeer::ID)) $criteria->add(NpinstructoresPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinstructoresPeer::DATABASE_NAME);

		$criteria->add(NpinstructoresPeer::ID, $this->id);

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

		$copyObj->setCedpro($this->cedpro);

		$copyObj->setNompro($this->nompro);

		$copyObj->setTippro($this->tippro);


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
			self::$peer = new NpinstructoresPeer();
		}
		return self::$peer;
	}

} 