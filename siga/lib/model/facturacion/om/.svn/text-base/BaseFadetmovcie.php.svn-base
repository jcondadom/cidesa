<?php


abstract class BaseFadetmovcie extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcie;


	
	protected $reffac;


	
	protected $numero;


	
	protected $monpag;


	
	protected $tippag_id;


	
	protected $codban_id;


	
	protected $comision;


	
	protected $id;

	
	protected $aFaciecaj;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcie()
  {

    return $this->codcie;

  }
  
  public function getReffac()
  {

    return trim($this->reffac);

  }
  
  public function getNumero()
  {

    return trim($this->numero);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getTippagId()
  {

    return $this->tippag_id;

  }
  
  public function getCodbanId()
  {

    return $this->codban_id;

  }
  
  public function getComision($val=false)
  {

    if($val) return number_format($this->comision,2,',','.');
    else return $this->comision;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcie($v)
	{

    if ($this->codcie !== $v) {
        $this->codcie = $v;
        $this->modifiedColumns[] = FadetmovciePeer::CODCIE;
      }
  
		if ($this->aFaciecaj !== null && $this->aFaciecaj->getId() !== $v) {
			$this->aFaciecaj = null;
		}

	} 
	
	public function setReffac($v)
	{

    if ($this->reffac !== $v) {
        $this->reffac = $v;
        $this->modifiedColumns[] = FadetmovciePeer::REFFAC;
      }
  
	} 
	
	public function setNumero($v)
	{

    if ($this->numero !== $v) {
        $this->numero = $v;
        $this->modifiedColumns[] = FadetmovciePeer::NUMERO;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetmovciePeer::MONPAG;
      }
  
	} 
	
	public function setTippagId($v)
	{

    if ($this->tippag_id !== $v) {
        $this->tippag_id = $v;
        $this->modifiedColumns[] = FadetmovciePeer::TIPPAG_ID;
      }
  
	} 
	
	public function setCodbanId($v)
	{

    if ($this->codban_id !== $v) {
        $this->codban_id = $v;
        $this->modifiedColumns[] = FadetmovciePeer::CODBAN_ID;
      }
  
	} 
	
	public function setComision($v)
	{

    if ($this->comision !== $v) {
        $this->comision = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetmovciePeer::COMISION;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadetmovciePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcie = $rs->getInt($startcol + 0);

      $this->reffac = $rs->getString($startcol + 1);

      $this->numero = $rs->getString($startcol + 2);

      $this->monpag = $rs->getFloat($startcol + 3);

      $this->tippag_id = $rs->getInt($startcol + 4);

      $this->codban_id = $rs->getInt($startcol + 5);

      $this->comision = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadetmovcie object", $e);
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
			$con = Propel::getConnection(FadetmovciePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadetmovciePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadetmovciePeer::DATABASE_NAME);
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


												
			if ($this->aFaciecaj !== null) {
				if ($this->aFaciecaj->isModified()) {
					$affectedRows += $this->aFaciecaj->save($con);
				}
				$this->setFaciecaj($this->aFaciecaj);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FadetmovciePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadetmovciePeer::doUpdate($this, $con);
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


												
			if ($this->aFaciecaj !== null) {
				if (!$this->aFaciecaj->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFaciecaj->getValidationFailures());
				}
			}


			if (($retval = FadetmovciePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadetmovciePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcie();
				break;
			case 1:
				return $this->getReffac();
				break;
			case 2:
				return $this->getNumero();
				break;
			case 3:
				return $this->getMonpag();
				break;
			case 4:
				return $this->getTippagId();
				break;
			case 5:
				return $this->getCodbanId();
				break;
			case 6:
				return $this->getComision();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadetmovciePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcie(),
			$keys[1] => $this->getReffac(),
			$keys[2] => $this->getNumero(),
			$keys[3] => $this->getMonpag(),
			$keys[4] => $this->getTippagId(),
			$keys[5] => $this->getCodbanId(),
			$keys[6] => $this->getComision(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadetmovciePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcie($value);
				break;
			case 1:
				$this->setReffac($value);
				break;
			case 2:
				$this->setNumero($value);
				break;
			case 3:
				$this->setMonpag($value);
				break;
			case 4:
				$this->setTippagId($value);
				break;
			case 5:
				$this->setCodbanId($value);
				break;
			case 6:
				$this->setComision($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadetmovciePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcie($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setReffac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumero($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonpag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTippagId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodbanId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setComision($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadetmovciePeer::DATABASE_NAME);

		if ($this->isColumnModified(FadetmovciePeer::CODCIE)) $criteria->add(FadetmovciePeer::CODCIE, $this->codcie);
		if ($this->isColumnModified(FadetmovciePeer::REFFAC)) $criteria->add(FadetmovciePeer::REFFAC, $this->reffac);
		if ($this->isColumnModified(FadetmovciePeer::NUMERO)) $criteria->add(FadetmovciePeer::NUMERO, $this->numero);
		if ($this->isColumnModified(FadetmovciePeer::MONPAG)) $criteria->add(FadetmovciePeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(FadetmovciePeer::TIPPAG_ID)) $criteria->add(FadetmovciePeer::TIPPAG_ID, $this->tippag_id);
		if ($this->isColumnModified(FadetmovciePeer::CODBAN_ID)) $criteria->add(FadetmovciePeer::CODBAN_ID, $this->codban_id);
		if ($this->isColumnModified(FadetmovciePeer::COMISION)) $criteria->add(FadetmovciePeer::COMISION, $this->comision);
		if ($this->isColumnModified(FadetmovciePeer::ID)) $criteria->add(FadetmovciePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadetmovciePeer::DATABASE_NAME);

		$criteria->add(FadetmovciePeer::ID, $this->id);

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

		$copyObj->setCodcie($this->codcie);

		$copyObj->setReffac($this->reffac);

		$copyObj->setNumero($this->numero);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setTippagId($this->tippag_id);

		$copyObj->setCodbanId($this->codban_id);

		$copyObj->setComision($this->comision);


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
			self::$peer = new FadetmovciePeer();
		}
		return self::$peer;
	}

	
	public function setFaciecaj($v)
	{


		if ($v === null) {
			$this->setCodcie(NULL);
		} else {
			$this->setCodcie($v->getId());
		}


		$this->aFaciecaj = $v;
	}


	
	public function getFaciecaj($con = null)
	{
		if ($this->aFaciecaj === null && ($this->codcie !== null)) {
						include_once 'lib/model/facturacion/om/BaseFaciecajPeer.php';

      $c = new Criteria();
      $c->add(FaciecajPeer::ID,$this->codcie);
      
			$this->aFaciecaj = FaciecajPeer::doSelectOne($c, $con);

			
		}
		return $this->aFaciecaj;
	}

} 