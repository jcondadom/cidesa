<?php


abstract class BaseNpconsalintfid extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codcon;


	
	protected $id;

	
	protected $aNpnomina;

	
	protected $aNpdefcpt;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpconsalintfidPeer::CODNOM;
      }
  
		if ($this->aNpnomina !== null && $this->aNpnomina->getCodnom() !== $v) {
			$this->aNpnomina = null;
		}

	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpconsalintfidPeer::CODCON;
      }
  
		if ($this->aNpdefcpt !== null && $this->aNpdefcpt->getCodcon() !== $v) {
			$this->aNpdefcpt = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpconsalintfidPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codnom = $rs->getString($startcol + 0);

      $this->codcon = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npconsalintfid object", $e);
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
			$con = Propel::getConnection(NpconsalintfidPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpconsalintfidPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpconsalintfidPeer::DATABASE_NAME);
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


												
			if ($this->aNpnomina !== null) {
				if ($this->aNpnomina->isModified()) {
					$affectedRows += $this->aNpnomina->save($con);
				}
				$this->setNpnomina($this->aNpnomina);
			}

			if ($this->aNpdefcpt !== null) {
				if ($this->aNpdefcpt->isModified()) {
					$affectedRows += $this->aNpdefcpt->save($con);
				}
				$this->setNpdefcpt($this->aNpdefcpt);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NpconsalintfidPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpconsalintfidPeer::doUpdate($this, $con);
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


												
			if ($this->aNpnomina !== null) {
				if (!$this->aNpnomina->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNpnomina->getValidationFailures());
				}
			}

			if ($this->aNpdefcpt !== null) {
				if (!$this->aNpdefcpt->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aNpdefcpt->getValidationFailures());
				}
			}


			if (($retval = NpconsalintfidPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpconsalintfidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodcon();
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
		$keys = NpconsalintfidPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpconsalintfidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpconsalintfidPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpconsalintfidPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpconsalintfidPeer::CODNOM)) $criteria->add(NpconsalintfidPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpconsalintfidPeer::CODCON)) $criteria->add(NpconsalintfidPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpconsalintfidPeer::ID)) $criteria->add(NpconsalintfidPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpconsalintfidPeer::DATABASE_NAME);

		$criteria->add(NpconsalintfidPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodcon($this->codcon);


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
			self::$peer = new NpconsalintfidPeer();
		}
		return self::$peer;
	}

	
	public function setNpnomina($v)
	{


		if ($v === null) {
			$this->setCodnom(NULL);
		} else {
			$this->setCodnom($v->getCodnom());
		}


		$this->aNpnomina = $v;
	}


	
	public function getNpnomina($con = null)
	{
		if ($this->aNpnomina === null && (($this->codnom !== "" && $this->codnom !== null))) {
						include_once 'lib/model/nomina/om/BaseNpnominaPeer.php';

      $c = new Criteria();
      $c->add(NpnominaPeer::CODNOM,$this->codnom);
      
			$this->aNpnomina = NpnominaPeer::doSelectOne($c, $con);

			
		}
		return $this->aNpnomina;
	}

	
	public function setNpdefcpt($v)
	{


		if ($v === null) {
			$this->setCodcon(NULL);
		} else {
			$this->setCodcon($v->getCodcon());
		}


		$this->aNpdefcpt = $v;
	}


	
	public function getNpdefcpt($con = null)
	{
		if ($this->aNpdefcpt === null && (($this->codcon !== "" && $this->codcon !== null))) {
						include_once 'lib/model/nomina/om/BaseNpdefcptPeer.php';

      $c = new Criteria();
      $c->add(NpdefcptPeer::CODCON,$this->codcon);
      
			$this->aNpdefcpt = NpdefcptPeer::doSelectOne($c, $con);

			
		}
		return $this->aNpdefcpt;
	}

} 