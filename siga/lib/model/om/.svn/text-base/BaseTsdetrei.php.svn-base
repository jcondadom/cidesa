<?php


abstract class BaseTsdetrei extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcue;


	
	protected $reflib;


	
	protected $tipmov;


	
	protected $refrei;


	
	protected $codpre;


	
	protected $monto;


	
	protected $refere;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getReflib()
  {

    return trim($this->reflib);

  }
  
  public function getTipmov()
  {

    return trim($this->tipmov);

  }
  
  public function getRefrei()
  {

    return trim($this->refrei);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getRefere()
  {

    return trim($this->refere);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TsdetreiPeer::NUMCUE;
      }
  
	} 
	
	public function setReflib($v)
	{

    if ($this->reflib !== $v) {
        $this->reflib = $v;
        $this->modifiedColumns[] = TsdetreiPeer::REFLIB;
      }
  
	} 
	
	public function setTipmov($v)
	{

    if ($this->tipmov !== $v) {
        $this->tipmov = $v;
        $this->modifiedColumns[] = TsdetreiPeer::TIPMOV;
      }
  
	} 
	
	public function setRefrei($v)
	{

    if ($this->refrei !== $v) {
        $this->refrei = $v;
        $this->modifiedColumns[] = TsdetreiPeer::REFREI;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = TsdetreiPeer::CODPRE;
      }
  
	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdetreiPeer::MONTO;
      }
  
	} 
	
	public function setRefere($v)
	{

    if ($this->refere !== $v) {
        $this->refere = $v;
        $this->modifiedColumns[] = TsdetreiPeer::REFERE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsdetreiPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcue = $rs->getString($startcol + 0);

      $this->reflib = $rs->getString($startcol + 1);

      $this->tipmov = $rs->getString($startcol + 2);

      $this->refrei = $rs->getString($startcol + 3);

      $this->codpre = $rs->getString($startcol + 4);

      $this->monto = $rs->getFloat($startcol + 5);

      $this->refere = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsdetrei object", $e);
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
			$con = Propel::getConnection(TsdetreiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdetreiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdetreiPeer::DATABASE_NAME);
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
					$pk = TsdetreiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsdetreiPeer::doUpdate($this, $con);
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


			if (($retval = TsdetreiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdetreiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcue();
				break;
			case 1:
				return $this->getReflib();
				break;
			case 2:
				return $this->getTipmov();
				break;
			case 3:
				return $this->getRefrei();
				break;
			case 4:
				return $this->getCodpre();
				break;
			case 5:
				return $this->getMonto();
				break;
			case 6:
				return $this->getRefere();
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
		$keys = TsdetreiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcue(),
			$keys[1] => $this->getReflib(),
			$keys[2] => $this->getTipmov(),
			$keys[3] => $this->getRefrei(),
			$keys[4] => $this->getCodpre(),
			$keys[5] => $this->getMonto(),
			$keys[6] => $this->getRefere(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdetreiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcue($value);
				break;
			case 1:
				$this->setReflib($value);
				break;
			case 2:
				$this->setTipmov($value);
				break;
			case 3:
				$this->setRefrei($value);
				break;
			case 4:
				$this->setCodpre($value);
				break;
			case 5:
				$this->setMonto($value);
				break;
			case 6:
				$this->setRefere($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdetreiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setReflib($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipmov($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefrei($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonto($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefere($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdetreiPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdetreiPeer::NUMCUE)) $criteria->add(TsdetreiPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TsdetreiPeer::REFLIB)) $criteria->add(TsdetreiPeer::REFLIB, $this->reflib);
		if ($this->isColumnModified(TsdetreiPeer::TIPMOV)) $criteria->add(TsdetreiPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(TsdetreiPeer::REFREI)) $criteria->add(TsdetreiPeer::REFREI, $this->refrei);
		if ($this->isColumnModified(TsdetreiPeer::CODPRE)) $criteria->add(TsdetreiPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(TsdetreiPeer::MONTO)) $criteria->add(TsdetreiPeer::MONTO, $this->monto);
		if ($this->isColumnModified(TsdetreiPeer::REFERE)) $criteria->add(TsdetreiPeer::REFERE, $this->refere);
		if ($this->isColumnModified(TsdetreiPeer::ID)) $criteria->add(TsdetreiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdetreiPeer::DATABASE_NAME);

		$criteria->add(TsdetreiPeer::ID, $this->id);

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

		$copyObj->setNumcue($this->numcue);

		$copyObj->setReflib($this->reflib);

		$copyObj->setTipmov($this->tipmov);

		$copyObj->setRefrei($this->refrei);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMonto($this->monto);

		$copyObj->setRefere($this->refere);


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
			self::$peer = new TsdetreiPeer();
		}
		return self::$peer;
	}

} 