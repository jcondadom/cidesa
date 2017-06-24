<?php


abstract class BaseFcdeftasas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtas;


	
	protected $destas;


	
	protected $bsout;


	
	protected $valtas;


	
	protected $codfue;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtas()
  {

    return trim($this->codtas);

  }
  
  public function getDestas()
  {

    return trim($this->destas);

  }
  
  public function getBsout()
  {

    return trim($this->bsout);

  }
  
  public function getValtas($val=false)
  {

    if($val) return number_format($this->valtas,2,',','.');
    else return $this->valtas;

  }
  
  public function getCodfue()
  {

    return trim($this->codfue);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtas($v)
	{

    if ($this->codtas !== $v) {
        $this->codtas = $v;
        $this->modifiedColumns[] = FcdeftasasPeer::CODTAS;
      }
  
	} 
	
	public function setDestas($v)
	{

    if ($this->destas !== $v) {
        $this->destas = $v;
        $this->modifiedColumns[] = FcdeftasasPeer::DESTAS;
      }
  
	} 
	
	public function setBsout($v)
	{

    if ($this->bsout !== $v) {
        $this->bsout = $v;
        $this->modifiedColumns[] = FcdeftasasPeer::BSOUT;
      }
  
	} 
	
	public function setValtas($v)
	{

    if ($this->valtas !== $v) {
        $this->valtas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdeftasasPeer::VALTAS;
      }
  
	} 
	
	public function setCodfue($v)
	{

    if ($this->codfue !== $v) {
        $this->codfue = $v;
        $this->modifiedColumns[] = FcdeftasasPeer::CODFUE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdeftasasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtas = $rs->getString($startcol + 0);

      $this->destas = $rs->getString($startcol + 1);

      $this->bsout = $rs->getString($startcol + 2);

      $this->valtas = $rs->getFloat($startcol + 3);

      $this->codfue = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdeftasas object", $e);
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
			$con = Propel::getConnection(FcdeftasasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdeftasasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdeftasasPeer::DATABASE_NAME);
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
					$pk = FcdeftasasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdeftasasPeer::doUpdate($this, $con);
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


			if (($retval = FcdeftasasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdeftasasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtas();
				break;
			case 1:
				return $this->getDestas();
				break;
			case 2:
				return $this->getBsout();
				break;
			case 3:
				return $this->getValtas();
				break;
			case 4:
				return $this->getCodfue();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdeftasasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtas(),
			$keys[1] => $this->getDestas(),
			$keys[2] => $this->getBsout(),
			$keys[3] => $this->getValtas(),
			$keys[4] => $this->getCodfue(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdeftasasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtas($value);
				break;
			case 1:
				$this->setDestas($value);
				break;
			case 2:
				$this->setBsout($value);
				break;
			case 3:
				$this->setValtas($value);
				break;
			case 4:
				$this->setCodfue($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdeftasasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtas($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBsout($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValtas($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodfue($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdeftasasPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdeftasasPeer::CODTAS)) $criteria->add(FcdeftasasPeer::CODTAS, $this->codtas);
		if ($this->isColumnModified(FcdeftasasPeer::DESTAS)) $criteria->add(FcdeftasasPeer::DESTAS, $this->destas);
		if ($this->isColumnModified(FcdeftasasPeer::BSOUT)) $criteria->add(FcdeftasasPeer::BSOUT, $this->bsout);
		if ($this->isColumnModified(FcdeftasasPeer::VALTAS)) $criteria->add(FcdeftasasPeer::VALTAS, $this->valtas);
		if ($this->isColumnModified(FcdeftasasPeer::CODFUE)) $criteria->add(FcdeftasasPeer::CODFUE, $this->codfue);
		if ($this->isColumnModified(FcdeftasasPeer::ID)) $criteria->add(FcdeftasasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdeftasasPeer::DATABASE_NAME);

		$criteria->add(FcdeftasasPeer::ID, $this->id);

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

		$copyObj->setCodtas($this->codtas);

		$copyObj->setDestas($this->destas);

		$copyObj->setBsout($this->bsout);

		$copyObj->setValtas($this->valtas);

		$copyObj->setCodfue($this->codfue);


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
			self::$peer = new FcdeftasasPeer();
		}
		return self::$peer;
	}

} 