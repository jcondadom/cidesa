<?php


abstract class BaseLidetactpen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpen;


	
	protected $numact;


	
	protected $id;

	
	protected $aLipenalizaciones;

	
	protected $aLiactas;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpen()
  {

    return trim($this->numpen);

  }
  
  public function getNumact()
  {

    return trim($this->numact);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpen($v)
	{

    if ($this->numpen !== $v) {
        $this->numpen = $v;
        $this->modifiedColumns[] = LidetactpenPeer::NUMPEN;
      }
  
		if ($this->aLipenalizaciones !== null && $this->aLipenalizaciones->getNumpen() !== $v) {
			$this->aLipenalizaciones = null;
		}

	} 
	
	public function setNumact($v)
	{

    if ($this->numact !== $v) {
        $this->numact = $v;
        $this->modifiedColumns[] = LidetactpenPeer::NUMACT;
      }
  
		if ($this->aLiactas !== null && $this->aLiactas->getNumact() !== $v) {
			$this->aLiactas = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidetactpenPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpen = $rs->getString($startcol + 0);

      $this->numact = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidetactpen object", $e);
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
			$con = Propel::getConnection(LidetactpenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidetactpenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidetactpenPeer::DATABASE_NAME);
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


												
			if ($this->aLipenalizaciones !== null) {
				if ($this->aLipenalizaciones->isModified()) {
					$affectedRows += $this->aLipenalizaciones->save($con);
				}
				$this->setLipenalizaciones($this->aLipenalizaciones);
			}

			if ($this->aLiactas !== null) {
				if ($this->aLiactas->isModified()) {
					$affectedRows += $this->aLiactas->save($con);
				}
				$this->setLiactas($this->aLiactas);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LidetactpenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidetactpenPeer::doUpdate($this, $con);
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


												
			if ($this->aLipenalizaciones !== null) {
				if (!$this->aLipenalizaciones->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLipenalizaciones->getValidationFailures());
				}
			}

			if ($this->aLiactas !== null) {
				if (!$this->aLiactas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiactas->getValidationFailures());
				}
			}


			if (($retval = LidetactpenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetactpenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpen();
				break;
			case 1:
				return $this->getNumact();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidetactpenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpen(),
			$keys[1] => $this->getNumact(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetactpenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpen($value);
				break;
			case 1:
				$this->setNumact($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidetactpenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpen($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidetactpenPeer::DATABASE_NAME);

		if ($this->isColumnModified(LidetactpenPeer::NUMPEN)) $criteria->add(LidetactpenPeer::NUMPEN, $this->numpen);
		if ($this->isColumnModified(LidetactpenPeer::NUMACT)) $criteria->add(LidetactpenPeer::NUMACT, $this->numact);
		if ($this->isColumnModified(LidetactpenPeer::ID)) $criteria->add(LidetactpenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidetactpenPeer::DATABASE_NAME);

		$criteria->add(LidetactpenPeer::ID, $this->id);

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

		$copyObj->setNumpen($this->numpen);

		$copyObj->setNumact($this->numact);


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
			self::$peer = new LidetactpenPeer();
		}
		return self::$peer;
	}

	
	public function setLipenalizaciones($v)
	{


		if ($v === null) {
			$this->setNumpen(NULL);
		} else {
			$this->setNumpen($v->getNumpen());
		}


		$this->aLipenalizaciones = $v;
	}


	
	public function getLipenalizaciones($con = null)
	{
		if ($this->aLipenalizaciones === null && (($this->numpen !== "" && $this->numpen !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';

      $c = new Criteria();
      $c->add(LipenalizacionesPeer::NUMPEN,$this->numpen);
      
			$this->aLipenalizaciones = LipenalizacionesPeer::doSelectOne($c, $con);

			
		}
		return $this->aLipenalizaciones;
	}

	
	public function setLiactas($v)
	{


		if ($v === null) {
			$this->setNumact(NULL);
		} else {
			$this->setNumact($v->getNumact());
		}


		$this->aLiactas = $v;
	}


	
	public function getLiactas($con = null)
	{
		if ($this->aLiactas === null && (($this->numact !== "" && $this->numact !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';

      $c = new Criteria();
      $c->add(LiactasPeer::NUMACT,$this->numact);
      
			$this->aLiactas = LiactasPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiactas;
	}

} 