<?php


abstract class BaseFcelideclar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numdec;


	
	protected $fecven;


	
	protected $fueing;


	
	protected $fecdec;


	
	protected $rifcon;


	
	protected $tipo;


	
	protected $numref;


	
	protected $mondec;


	
	protected $edodec;


	
	protected $funrec;


	
	protected $modo;


	
	protected $numero;


	
	protected $nomcon;


	
	protected $anodec;


	
	protected $motivo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumdec()
  {

    return trim($this->numdec);

  }
  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFueing()
  {

    return trim($this->fueing);

  }
  
  public function getFecdec($format = 'Y-m-d')
  {

    if ($this->fecdec === null || $this->fecdec === '') {
      return null;
    } elseif (!is_int($this->fecdec)) {
            $ts = adodb_strtotime($this->fecdec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdec] as date/time value: " . var_export($this->fecdec, true));
      }
    } else {
      $ts = $this->fecdec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getNumref()
  {

    return trim($this->numref);

  }
  
  public function getMondec($val=false)
  {

    if($val) return number_format($this->mondec,2,',','.');
    else return $this->mondec;

  }
  
  public function getEdodec()
  {

    return trim($this->edodec);

  }
  
  public function getFunrec()
  {

    return trim($this->funrec);

  }
  
  public function getModo()
  {

    return trim($this->modo);

  }
  
  public function getNumero()
  {

    return trim($this->numero);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getAnodec()
  {

    return trim($this->anodec);

  }
  
  public function getMotivo()
  {

    return trim($this->motivo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumdec($v)
	{

    if ($this->numdec !== $v) {
        $this->numdec = $v;
        $this->modifiedColumns[] = FcelideclarPeer::NUMDEC;
      }
  
	} 
	
	public function setFecven($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = FcelideclarPeer::FECVEN;
    }

	} 
	
	public function setFueing($v)
	{

    if ($this->fueing !== $v) {
        $this->fueing = $v;
        $this->modifiedColumns[] = FcelideclarPeer::FUEING;
      }
  
	} 
	
	public function setFecdec($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdec !== $ts) {
      $this->fecdec = $ts;
      $this->modifiedColumns[] = FcelideclarPeer::FECDEC;
    }

	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcelideclarPeer::RIFCON;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FcelideclarPeer::TIPO;
      }
  
	} 
	
	public function setNumref($v)
	{

    if ($this->numref !== $v) {
        $this->numref = $v;
        $this->modifiedColumns[] = FcelideclarPeer::NUMREF;
      }
  
	} 
	
	public function setMondec($v)
	{

    if ($this->mondec !== $v) {
        $this->mondec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcelideclarPeer::MONDEC;
      }
  
	} 
	
	public function setEdodec($v)
	{

    if ($this->edodec !== $v) {
        $this->edodec = $v;
        $this->modifiedColumns[] = FcelideclarPeer::EDODEC;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = FcelideclarPeer::FUNREC;
      }
  
	} 
	
	public function setModo($v)
	{

    if ($this->modo !== $v) {
        $this->modo = $v;
        $this->modifiedColumns[] = FcelideclarPeer::MODO;
      }
  
	} 
	
	public function setNumero($v)
	{

    if ($this->numero !== $v) {
        $this->numero = $v;
        $this->modifiedColumns[] = FcelideclarPeer::NUMERO;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcelideclarPeer::NOMCON;
      }
  
	} 
	
	public function setAnodec($v)
	{

    if ($this->anodec !== $v) {
        $this->anodec = $v;
        $this->modifiedColumns[] = FcelideclarPeer::ANODEC;
      }
  
	} 
	
	public function setMotivo($v)
	{

    if ($this->motivo !== $v) {
        $this->motivo = $v;
        $this->modifiedColumns[] = FcelideclarPeer::MOTIVO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcelideclarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numdec = $rs->getString($startcol + 0);

      $this->fecven = $rs->getDate($startcol + 1, null);

      $this->fueing = $rs->getString($startcol + 2);

      $this->fecdec = $rs->getDate($startcol + 3, null);

      $this->rifcon = $rs->getString($startcol + 4);

      $this->tipo = $rs->getString($startcol + 5);

      $this->numref = $rs->getString($startcol + 6);

      $this->mondec = $rs->getFloat($startcol + 7);

      $this->edodec = $rs->getString($startcol + 8);

      $this->funrec = $rs->getString($startcol + 9);

      $this->modo = $rs->getString($startcol + 10);

      $this->numero = $rs->getString($startcol + 11);

      $this->nomcon = $rs->getString($startcol + 12);

      $this->anodec = $rs->getString($startcol + 13);

      $this->motivo = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcelideclar object", $e);
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
			$con = Propel::getConnection(FcelideclarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcelideclarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcelideclarPeer::DATABASE_NAME);
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
					$pk = FcelideclarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcelideclarPeer::doUpdate($this, $con);
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


			if (($retval = FcelideclarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcelideclarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumdec();
				break;
			case 1:
				return $this->getFecven();
				break;
			case 2:
				return $this->getFueing();
				break;
			case 3:
				return $this->getFecdec();
				break;
			case 4:
				return $this->getRifcon();
				break;
			case 5:
				return $this->getTipo();
				break;
			case 6:
				return $this->getNumref();
				break;
			case 7:
				return $this->getMondec();
				break;
			case 8:
				return $this->getEdodec();
				break;
			case 9:
				return $this->getFunrec();
				break;
			case 10:
				return $this->getModo();
				break;
			case 11:
				return $this->getNumero();
				break;
			case 12:
				return $this->getNomcon();
				break;
			case 13:
				return $this->getAnodec();
				break;
			case 14:
				return $this->getMotivo();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcelideclarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumdec(),
			$keys[1] => $this->getFecven(),
			$keys[2] => $this->getFueing(),
			$keys[3] => $this->getFecdec(),
			$keys[4] => $this->getRifcon(),
			$keys[5] => $this->getTipo(),
			$keys[6] => $this->getNumref(),
			$keys[7] => $this->getMondec(),
			$keys[8] => $this->getEdodec(),
			$keys[9] => $this->getFunrec(),
			$keys[10] => $this->getModo(),
			$keys[11] => $this->getNumero(),
			$keys[12] => $this->getNomcon(),
			$keys[13] => $this->getAnodec(),
			$keys[14] => $this->getMotivo(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcelideclarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumdec($value);
				break;
			case 1:
				$this->setFecven($value);
				break;
			case 2:
				$this->setFueing($value);
				break;
			case 3:
				$this->setFecdec($value);
				break;
			case 4:
				$this->setRifcon($value);
				break;
			case 5:
				$this->setTipo($value);
				break;
			case 6:
				$this->setNumref($value);
				break;
			case 7:
				$this->setMondec($value);
				break;
			case 8:
				$this->setEdodec($value);
				break;
			case 9:
				$this->setFunrec($value);
				break;
			case 10:
				$this->setModo($value);
				break;
			case 11:
				$this->setNumero($value);
				break;
			case 12:
				$this->setNomcon($value);
				break;
			case 13:
				$this->setAnodec($value);
				break;
			case 14:
				$this->setMotivo($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcelideclarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumdec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecven($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFueing($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecdec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRifcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumref($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEdodec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFunrec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setModo($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNumero($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNomcon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAnodec($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMotivo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcelideclarPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcelideclarPeer::NUMDEC)) $criteria->add(FcelideclarPeer::NUMDEC, $this->numdec);
		if ($this->isColumnModified(FcelideclarPeer::FECVEN)) $criteria->add(FcelideclarPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FcelideclarPeer::FUEING)) $criteria->add(FcelideclarPeer::FUEING, $this->fueing);
		if ($this->isColumnModified(FcelideclarPeer::FECDEC)) $criteria->add(FcelideclarPeer::FECDEC, $this->fecdec);
		if ($this->isColumnModified(FcelideclarPeer::RIFCON)) $criteria->add(FcelideclarPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcelideclarPeer::TIPO)) $criteria->add(FcelideclarPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FcelideclarPeer::NUMREF)) $criteria->add(FcelideclarPeer::NUMREF, $this->numref);
		if ($this->isColumnModified(FcelideclarPeer::MONDEC)) $criteria->add(FcelideclarPeer::MONDEC, $this->mondec);
		if ($this->isColumnModified(FcelideclarPeer::EDODEC)) $criteria->add(FcelideclarPeer::EDODEC, $this->edodec);
		if ($this->isColumnModified(FcelideclarPeer::FUNREC)) $criteria->add(FcelideclarPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcelideclarPeer::MODO)) $criteria->add(FcelideclarPeer::MODO, $this->modo);
		if ($this->isColumnModified(FcelideclarPeer::NUMERO)) $criteria->add(FcelideclarPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(FcelideclarPeer::NOMCON)) $criteria->add(FcelideclarPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcelideclarPeer::ANODEC)) $criteria->add(FcelideclarPeer::ANODEC, $this->anodec);
		if ($this->isColumnModified(FcelideclarPeer::MOTIVO)) $criteria->add(FcelideclarPeer::MOTIVO, $this->motivo);
		if ($this->isColumnModified(FcelideclarPeer::ID)) $criteria->add(FcelideclarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcelideclarPeer::DATABASE_NAME);

		$criteria->add(FcelideclarPeer::ID, $this->id);

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

		$copyObj->setNumdec($this->numdec);

		$copyObj->setFecven($this->fecven);

		$copyObj->setFueing($this->fueing);

		$copyObj->setFecdec($this->fecdec);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setTipo($this->tipo);

		$copyObj->setNumref($this->numref);

		$copyObj->setMondec($this->mondec);

		$copyObj->setEdodec($this->edodec);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setModo($this->modo);

		$copyObj->setNumero($this->numero);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setAnodec($this->anodec);

		$copyObj->setMotivo($this->motivo);


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
			self::$peer = new FcelideclarPeer();
		}
		return self::$peer;
	}

} 