<?php


abstract class BaseBnciudad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codciu;


	
	protected $nomciu;


	
	protected $bnmunicip_codmun;


	
	protected $id;

	
	protected $aBnmunicip;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getNomciu()
  {

    return trim($this->nomciu);

  }
  
  public function getBnmunicipCodmun()
  {

    return trim($this->bnmunicip_codmun);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = strtoupper($v);
        $this->modifiedColumns[] = BnciudadPeer::CODCIU;
      }
  
	} 
	
	public function setNomciu($v)
	{

    if ($this->nomciu !== $v) {
        $this->nomciu = strtoupper($v);
        $this->modifiedColumns[] = BnciudadPeer::NOMCIU;
      }
  
	} 
	
	public function setBnmunicipCodmun($v)
	{

    if ($this->bnmunicip_codmun !== $v) {
        $this->bnmunicip_codmun = strtoupper($v);
        $this->modifiedColumns[] = BnciudadPeer::BNMUNICIP_CODMUN;
      }
  
		if ($this->aBnmunicip !== null && $this->aBnmunicip->getCodmun() !== $v) {
			$this->aBnmunicip = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnciudadPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codciu = $rs->getString($startcol + 0);

      $this->nomciu = $rs->getString($startcol + 1);

      $this->bnmunicip_codmun = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnciudad object", $e);
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
			$con = Propel::getConnection(BnciudadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnciudadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnciudadPeer::DATABASE_NAME);
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


												
			if ($this->aBnmunicip !== null) {
				if ($this->aBnmunicip->isModified()) {
					$affectedRows += $this->aBnmunicip->save($con);
				}
				$this->setBnmunicip($this->aBnmunicip);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = BnciudadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnciudadPeer::doUpdate($this, $con);
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


												
			if ($this->aBnmunicip !== null) {
				if (!$this->aBnmunicip->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aBnmunicip->getValidationFailures());
				}
			}


			if (($retval = BnciudadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodciu();
				break;
			case 1:
				return $this->getNomciu();
				break;
			case 2:
				return $this->getBnmunicipCodmun();
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
		$keys = BnciudadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodciu(),
			$keys[1] => $this->getNomciu(),
			$keys[2] => $this->getBnmunicipCodmun(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodciu($value);
				break;
			case 1:
				$this->setNomciu($value);
				break;
			case 2:
				$this->setBnmunicipCodmun($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnciudadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodciu($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomciu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBnmunicipCodmun($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnciudadPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnciudadPeer::CODCIU)) $criteria->add(BnciudadPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(BnciudadPeer::NOMCIU)) $criteria->add(BnciudadPeer::NOMCIU, $this->nomciu);
		if ($this->isColumnModified(BnciudadPeer::BNMUNICIP_CODMUN)) $criteria->add(BnciudadPeer::BNMUNICIP_CODMUN, $this->bnmunicip_codmun);
		if ($this->isColumnModified(BnciudadPeer::ID)) $criteria->add(BnciudadPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnciudadPeer::DATABASE_NAME);

		$criteria->add(BnciudadPeer::ID, $this->id);

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

		$copyObj->setCodciu($this->codciu);

		$copyObj->setNomciu($this->nomciu);

		$copyObj->setBnmunicipCodmun($this->bnmunicip_codmun);


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
			self::$peer = new BnciudadPeer();
		}
		return self::$peer;
	}

	
	public function setBnmunicip($v)
	{


		if ($v === null) {
			$this->setBnmunicipCodmun(NULL);
		} else {
			$this->setBnmunicipCodmun($v->getCodmun());
		}


		$this->aBnmunicip = $v;
	}


	
	public function getBnmunicip($con = null)
	{
		if ($this->aBnmunicip === null && (($this->bnmunicip_codmun !== "" && $this->bnmunicip_codmun !== null))) {
						include_once 'lib/model/om/BaseBnmunicipPeer.php';

      $c = new Criteria();
      $c->add(BnmunicipPeer::CODMUN,$this->bnmunicip_codmun);
      
			$this->aBnmunicip = BnmunicipPeer::doSelectOne($c, $con);

			
		}
		return $this->aBnmunicip;
	}

} 