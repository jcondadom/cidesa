<?php


abstract class BaseOcdetpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codbanpro;


	
	protected $codpar;


	
	protected $canobr;


	
	protected $cancon;


	
	protected $canconfin;


	
	protected $adipar;


	
	protected $cosuni;


	
	protected $cosunifin;


	
	protected $codpre;


	
	protected $monpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodbanpro()
  {

    return trim($this->codbanpro);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getCanobr($val=false)
  {

    if($val) return number_format($this->canobr,2,',','.');
    else return $this->canobr;

  }
  
  public function getCancon($val=false)
  {

    if($val) return number_format($this->cancon,2,',','.');
    else return $this->cancon;

  }
  
  public function getCanconfin($val=false)
  {

    if($val) return number_format($this->canconfin,2,',','.');
    else return $this->canconfin;

  }
  
  public function getAdipar()
  {

    return trim($this->adipar);

  }
  
  public function getCosuni($val=false)
  {

    if($val) return number_format($this->cosuni,2,',','.');
    else return $this->cosuni;

  }
  
  public function getCosunifin($val=false)
  {

    if($val) return number_format($this->cosunifin,2,',','.');
    else return $this->cosunifin;

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getMonpre($val=false)
  {

    if($val) return number_format($this->monpre,2,',','.');
    else return $this->monpre;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodbanpro($v)
	{

    if ($this->codbanpro !== $v) {
        $this->codbanpro = $v;
        $this->modifiedColumns[] = OcdetproPeer::CODBANPRO;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = OcdetproPeer::CODPAR;
      }
  
	} 
	
	public function setCanobr($v)
	{

    if ($this->canobr !== $v) {
        $this->canobr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdetproPeer::CANOBR;
      }
  
	} 
	
	public function setCancon($v)
	{

    if ($this->cancon !== $v) {
        $this->cancon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdetproPeer::CANCON;
      }
  
	} 
	
	public function setCanconfin($v)
	{

    if ($this->canconfin !== $v) {
        $this->canconfin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdetproPeer::CANCONFIN;
      }
  
	} 
	
	public function setAdipar($v)
	{

    if ($this->adipar !== $v) {
        $this->adipar = $v;
        $this->modifiedColumns[] = OcdetproPeer::ADIPAR;
      }
  
	} 
	
	public function setCosuni($v)
	{

    if ($this->cosuni !== $v) {
        $this->cosuni = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdetproPeer::COSUNI;
      }
  
	} 
	
	public function setCosunifin($v)
	{

    if ($this->cosunifin !== $v) {
        $this->cosunifin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdetproPeer::COSUNIFIN;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = OcdetproPeer::CODPRE;
      }
  
	} 
	
	public function setMonpre($v)
	{

    if ($this->monpre !== $v) {
        $this->monpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OcdetproPeer::MONPRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OcdetproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codbanpro = $rs->getString($startcol + 0);

      $this->codpar = $rs->getString($startcol + 1);

      $this->canobr = $rs->getFloat($startcol + 2);

      $this->cancon = $rs->getFloat($startcol + 3);

      $this->canconfin = $rs->getFloat($startcol + 4);

      $this->adipar = $rs->getString($startcol + 5);

      $this->cosuni = $rs->getFloat($startcol + 6);

      $this->cosunifin = $rs->getFloat($startcol + 7);

      $this->codpre = $rs->getString($startcol + 8);

      $this->monpre = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ocdetpro object", $e);
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

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcdetproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcdetproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcdetproPeer::DATABASE_NAME);
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
					$pk = OcdetproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OcdetproPeer::doUpdate($this, $con);
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


			if (($retval = OcdetproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdetproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodbanpro();
				break;
			case 1:
				return $this->getCodpar();
				break;
			case 2:
				return $this->getCanobr();
				break;
			case 3:
				return $this->getCancon();
				break;
			case 4:
				return $this->getCanconfin();
				break;
			case 5:
				return $this->getAdipar();
				break;
			case 6:
				return $this->getCosuni();
				break;
			case 7:
				return $this->getCosunifin();
				break;
			case 8:
				return $this->getCodpre();
				break;
			case 9:
				return $this->getMonpre();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcdetproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodbanpro(),
			$keys[1] => $this->getCodpar(),
			$keys[2] => $this->getCanobr(),
			$keys[3] => $this->getCancon(),
			$keys[4] => $this->getCanconfin(),
			$keys[5] => $this->getAdipar(),
			$keys[6] => $this->getCosuni(),
			$keys[7] => $this->getCosunifin(),
			$keys[8] => $this->getCodpre(),
			$keys[9] => $this->getMonpre(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdetproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodbanpro($value);
				break;
			case 1:
				$this->setCodpar($value);
				break;
			case 2:
				$this->setCanobr($value);
				break;
			case 3:
				$this->setCancon($value);
				break;
			case 4:
				$this->setCanconfin($value);
				break;
			case 5:
				$this->setAdipar($value);
				break;
			case 6:
				$this->setCosuni($value);
				break;
			case 7:
				$this->setCosunifin($value);
				break;
			case 8:
				$this->setCodpre($value);
				break;
			case 9:
				$this->setMonpre($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcdetproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodbanpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanobr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCancon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanconfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdipar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCosuni($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCosunifin($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodpre($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonpre($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcdetproPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcdetproPeer::CODBANPRO)) $criteria->add(OcdetproPeer::CODBANPRO, $this->codbanpro);
		if ($this->isColumnModified(OcdetproPeer::CODPAR)) $criteria->add(OcdetproPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(OcdetproPeer::CANOBR)) $criteria->add(OcdetproPeer::CANOBR, $this->canobr);
		if ($this->isColumnModified(OcdetproPeer::CANCON)) $criteria->add(OcdetproPeer::CANCON, $this->cancon);
		if ($this->isColumnModified(OcdetproPeer::CANCONFIN)) $criteria->add(OcdetproPeer::CANCONFIN, $this->canconfin);
		if ($this->isColumnModified(OcdetproPeer::ADIPAR)) $criteria->add(OcdetproPeer::ADIPAR, $this->adipar);
		if ($this->isColumnModified(OcdetproPeer::COSUNI)) $criteria->add(OcdetproPeer::COSUNI, $this->cosuni);
		if ($this->isColumnModified(OcdetproPeer::COSUNIFIN)) $criteria->add(OcdetproPeer::COSUNIFIN, $this->cosunifin);
		if ($this->isColumnModified(OcdetproPeer::CODPRE)) $criteria->add(OcdetproPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(OcdetproPeer::MONPRE)) $criteria->add(OcdetproPeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(OcdetproPeer::ID)) $criteria->add(OcdetproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcdetproPeer::DATABASE_NAME);

		$criteria->add(OcdetproPeer::ID, $this->id);

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

		$copyObj->setCodbanpro($this->codbanpro);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCanobr($this->canobr);

		$copyObj->setCancon($this->cancon);

		$copyObj->setCanconfin($this->canconfin);

		$copyObj->setAdipar($this->adipar);

		$copyObj->setCosuni($this->cosuni);

		$copyObj->setCosunifin($this->cosunifin);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonpre($this->monpre);


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
			self::$peer = new OcdetproPeer();
		}
		return self::$peer;
	}

} 