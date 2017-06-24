<?php


abstract class BaseNpinfesc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $fecmov;


	
	protected $grado;


	
	protected $paso;


	
	protected $rango;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getFecmov($format = 'Y-m-d')
  {

    if ($this->fecmov === null || $this->fecmov === '') {
      return null;
    } elseif (!is_int($this->fecmov)) {
            $ts = adodb_strtotime($this->fecmov);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecmov] as date/time value: " . var_export($this->fecmov, true));
      }
    } else {
      $ts = $this->fecmov;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getGrado()
  {

    return trim($this->grado);

  }
  
  public function getPaso()
  {

    return trim($this->paso);

  }
  
  public function getRango()
  {

    return trim($this->rango);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinfescPeer::CODEMP;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpinfescPeer::CODCAR;
      }
  
	} 
	
	public function setFecmov($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecmov] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecmov !== $ts) {
      $this->fecmov = $ts;
      $this->modifiedColumns[] = NpinfescPeer::FECMOV;
    }

	} 
	
	public function setGrado($v)
	{

    if ($this->grado !== $v) {
        $this->grado = $v;
        $this->modifiedColumns[] = NpinfescPeer::GRADO;
      }
  
	} 
	
	public function setPaso($v)
	{

    if ($this->paso !== $v) {
        $this->paso = $v;
        $this->modifiedColumns[] = NpinfescPeer::PASO;
      }
  
	} 
	
	public function setRango($v)
	{

    if ($this->rango !== $v) {
        $this->rango = $v;
        $this->modifiedColumns[] = NpinfescPeer::RANGO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinfescPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->codcar = $rs->getString($startcol + 1);

      $this->fecmov = $rs->getDate($startcol + 2, null);

      $this->grado = $rs->getString($startcol + 3);

      $this->paso = $rs->getString($startcol + 4);

      $this->rango = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinfesc object", $e);
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
			$con = Propel::getConnection(NpinfescPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfescPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfescPeer::DATABASE_NAME);
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
					$pk = NpinfescPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinfescPeer::doUpdate($this, $con);
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


			if (($retval = NpinfescPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfescPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getFecmov();
				break;
			case 3:
				return $this->getGrado();
				break;
			case 4:
				return $this->getPaso();
				break;
			case 5:
				return $this->getRango();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfescPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getFecmov(),
			$keys[3] => $this->getGrado(),
			$keys[4] => $this->getPaso(),
			$keys[5] => $this->getRango(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfescPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setFecmov($value);
				break;
			case 3:
				$this->setGrado($value);
				break;
			case 4:
				$this->setPaso($value);
				break;
			case 5:
				$this->setRango($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfescPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecmov($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGrado($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPaso($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRango($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfescPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfescPeer::CODEMP)) $criteria->add(NpinfescPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfescPeer::CODCAR)) $criteria->add(NpinfescPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpinfescPeer::FECMOV)) $criteria->add(NpinfescPeer::FECMOV, $this->fecmov);
		if ($this->isColumnModified(NpinfescPeer::GRADO)) $criteria->add(NpinfescPeer::GRADO, $this->grado);
		if ($this->isColumnModified(NpinfescPeer::PASO)) $criteria->add(NpinfescPeer::PASO, $this->paso);
		if ($this->isColumnModified(NpinfescPeer::RANGO)) $criteria->add(NpinfescPeer::RANGO, $this->rango);
		if ($this->isColumnModified(NpinfescPeer::ID)) $criteria->add(NpinfescPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfescPeer::DATABASE_NAME);

		$criteria->add(NpinfescPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setFecmov($this->fecmov);

		$copyObj->setGrado($this->grado);

		$copyObj->setPaso($this->paso);

		$copyObj->setRango($this->rango);


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
			self::$peer = new NpinfescPeer();
		}
		return self::$peer;
	}

} 