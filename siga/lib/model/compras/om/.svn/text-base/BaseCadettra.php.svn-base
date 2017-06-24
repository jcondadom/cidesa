<?php


abstract class BaseCadettra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtra;


	
	protected $codart;


	
	protected $canart;


	
	protected $canrec;


	
	protected $candev;


	
	protected $candif;


	
	protected $codfal;


	
	protected $fecest;


	
	protected $obstra;


	
	protected $numlotori;


	
	protected $numlotdes;


	
	protected $almori;


	
	protected $codubiori;


	
	protected $almdes;


	
	protected $codubides;


	
	protected $id;

	
	protected $aCamotfal;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtra()
  {

    return trim($this->codtra);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCanart($val=false)
  {

    if($val) return number_format($this->canart,2,',','.');
    else return $this->canart;

  }
  
  public function getCanrec($val=false)
  {

    if($val) return number_format($this->canrec,2,',','.');
    else return $this->canrec;

  }
  
  public function getCandev($val=false)
  {

    if($val) return number_format($this->candev,2,',','.');
    else return $this->candev;

  }
  
  public function getCandif($val=false)
  {

    if($val) return number_format($this->candif,2,',','.');
    else return $this->candif;

  }
  
  public function getCodfal()
  {

    return trim($this->codfal);

  }
  
  public function getFecest($format = 'Y-m-d')
  {

    if ($this->fecest === null || $this->fecest === '') {
      return null;
    } elseif (!is_int($this->fecest)) {
            $ts = adodb_strtotime($this->fecest);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecest] as date/time value: " . var_export($this->fecest, true));
      }
    } else {
      $ts = $this->fecest;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getObstra()
  {

    return trim($this->obstra);

  }
  
  public function getNumlotori()
  {

    return trim($this->numlotori);

  }
  
  public function getNumlotdes()
  {

    return trim($this->numlotdes);

  }
  
  public function getAlmori()
  {

    return trim($this->almori);

  }
  
  public function getCodubiori()
  {

    return trim($this->codubiori);

  }
  
  public function getAlmdes()
  {

    return trim($this->almdes);

  }
  
  public function getCodubides()
  {

    return trim($this->codubides);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtra($v)
	{

    if ($this->codtra !== $v) {
        $this->codtra = $v;
        $this->modifiedColumns[] = CadettraPeer::CODTRA;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CadettraPeer::CODART;
      }
  
	} 
	
	public function setCanart($v)
	{

    if ($this->canart !== $v) {
        $this->canart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadettraPeer::CANART;
      }
  
	} 
	
	public function setCanrec($v)
	{

    if ($this->canrec !== $v) {
        $this->canrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadettraPeer::CANREC;
      }
  
	} 
	
	public function setCandev($v)
	{

    if ($this->candev !== $v) {
        $this->candev = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadettraPeer::CANDEV;
      }
  
	} 
	
	public function setCandif($v)
	{

    if ($this->candif !== $v) {
        $this->candif = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadettraPeer::CANDIF;
      }
  
	} 
	
	public function setCodfal($v)
	{

    if ($this->codfal !== $v) {
        $this->codfal = $v;
        $this->modifiedColumns[] = CadettraPeer::CODFAL;
      }
  
		if ($this->aCamotfal !== null && $this->aCamotfal->getCodfal() !== $v) {
			$this->aCamotfal = null;
		}

	} 
	
	public function setFecest($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecest] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecest !== $ts) {
      $this->fecest = $ts;
      $this->modifiedColumns[] = CadettraPeer::FECEST;
    }

	} 
	
	public function setObstra($v)
	{

    if ($this->obstra !== $v) {
        $this->obstra = $v;
        $this->modifiedColumns[] = CadettraPeer::OBSTRA;
      }
  
	} 
	
	public function setNumlotori($v)
	{

    if ($this->numlotori !== $v) {
        $this->numlotori = $v;
        $this->modifiedColumns[] = CadettraPeer::NUMLOTORI;
      }
  
	} 
	
	public function setNumlotdes($v)
	{

    if ($this->numlotdes !== $v) {
        $this->numlotdes = $v;
        $this->modifiedColumns[] = CadettraPeer::NUMLOTDES;
      }
  
	} 
	
	public function setAlmori($v)
	{

    if ($this->almori !== $v) {
        $this->almori = $v;
        $this->modifiedColumns[] = CadettraPeer::ALMORI;
      }
  
	} 
	
	public function setCodubiori($v)
	{

    if ($this->codubiori !== $v) {
        $this->codubiori = $v;
        $this->modifiedColumns[] = CadettraPeer::CODUBIORI;
      }
  
	} 
	
	public function setAlmdes($v)
	{

    if ($this->almdes !== $v) {
        $this->almdes = $v;
        $this->modifiedColumns[] = CadettraPeer::ALMDES;
      }
  
	} 
	
	public function setCodubides($v)
	{

    if ($this->codubides !== $v) {
        $this->codubides = $v;
        $this->modifiedColumns[] = CadettraPeer::CODUBIDES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadettraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtra = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->canart = $rs->getFloat($startcol + 2);

      $this->canrec = $rs->getFloat($startcol + 3);

      $this->candev = $rs->getFloat($startcol + 4);

      $this->candif = $rs->getFloat($startcol + 5);

      $this->codfal = $rs->getString($startcol + 6);

      $this->fecest = $rs->getDate($startcol + 7, null);

      $this->obstra = $rs->getString($startcol + 8);

      $this->numlotori = $rs->getString($startcol + 9);

      $this->numlotdes = $rs->getString($startcol + 10);

      $this->almori = $rs->getString($startcol + 11);

      $this->codubiori = $rs->getString($startcol + 12);

      $this->almdes = $rs->getString($startcol + 13);

      $this->codubides = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadettra object", $e);
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
			$con = Propel::getConnection(CadettraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadettraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadettraPeer::DATABASE_NAME);
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


												
			if ($this->aCamotfal !== null) {
				if ($this->aCamotfal->isModified()) {
					$affectedRows += $this->aCamotfal->save($con);
				}
				$this->setCamotfal($this->aCamotfal);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CadettraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadettraPeer::doUpdate($this, $con);
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


												
			if ($this->aCamotfal !== null) {
				if (!$this->aCamotfal->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCamotfal->getValidationFailures());
				}
			}


			if (($retval = CadettraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadettraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtra();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCanart();
				break;
			case 3:
				return $this->getCanrec();
				break;
			case 4:
				return $this->getCandev();
				break;
			case 5:
				return $this->getCandif();
				break;
			case 6:
				return $this->getCodfal();
				break;
			case 7:
				return $this->getFecest();
				break;
			case 8:
				return $this->getObstra();
				break;
			case 9:
				return $this->getNumlotori();
				break;
			case 10:
				return $this->getNumlotdes();
				break;
			case 11:
				return $this->getAlmori();
				break;
			case 12:
				return $this->getCodubiori();
				break;
			case 13:
				return $this->getAlmdes();
				break;
			case 14:
				return $this->getCodubides();
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
		$keys = CadettraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtra(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCanart(),
			$keys[3] => $this->getCanrec(),
			$keys[4] => $this->getCandev(),
			$keys[5] => $this->getCandif(),
			$keys[6] => $this->getCodfal(),
			$keys[7] => $this->getFecest(),
			$keys[8] => $this->getObstra(),
			$keys[9] => $this->getNumlotori(),
			$keys[10] => $this->getNumlotdes(),
			$keys[11] => $this->getAlmori(),
			$keys[12] => $this->getCodubiori(),
			$keys[13] => $this->getAlmdes(),
			$keys[14] => $this->getCodubides(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadettraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtra($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCanart($value);
				break;
			case 3:
				$this->setCanrec($value);
				break;
			case 4:
				$this->setCandev($value);
				break;
			case 5:
				$this->setCandif($value);
				break;
			case 6:
				$this->setCodfal($value);
				break;
			case 7:
				$this->setFecest($value);
				break;
			case 8:
				$this->setObstra($value);
				break;
			case 9:
				$this->setNumlotori($value);
				break;
			case 10:
				$this->setNumlotdes($value);
				break;
			case 11:
				$this->setAlmori($value);
				break;
			case 12:
				$this->setCodubiori($value);
				break;
			case 13:
				$this->setAlmdes($value);
				break;
			case 14:
				$this->setCodubides($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadettraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanrec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCandev($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCandif($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodfal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecest($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObstra($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumlotori($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumlotdes($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAlmori($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodubiori($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAlmdes($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodubides($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadettraPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadettraPeer::CODTRA)) $criteria->add(CadettraPeer::CODTRA, $this->codtra);
		if ($this->isColumnModified(CadettraPeer::CODART)) $criteria->add(CadettraPeer::CODART, $this->codart);
		if ($this->isColumnModified(CadettraPeer::CANART)) $criteria->add(CadettraPeer::CANART, $this->canart);
		if ($this->isColumnModified(CadettraPeer::CANREC)) $criteria->add(CadettraPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(CadettraPeer::CANDEV)) $criteria->add(CadettraPeer::CANDEV, $this->candev);
		if ($this->isColumnModified(CadettraPeer::CANDIF)) $criteria->add(CadettraPeer::CANDIF, $this->candif);
		if ($this->isColumnModified(CadettraPeer::CODFAL)) $criteria->add(CadettraPeer::CODFAL, $this->codfal);
		if ($this->isColumnModified(CadettraPeer::FECEST)) $criteria->add(CadettraPeer::FECEST, $this->fecest);
		if ($this->isColumnModified(CadettraPeer::OBSTRA)) $criteria->add(CadettraPeer::OBSTRA, $this->obstra);
		if ($this->isColumnModified(CadettraPeer::NUMLOTORI)) $criteria->add(CadettraPeer::NUMLOTORI, $this->numlotori);
		if ($this->isColumnModified(CadettraPeer::NUMLOTDES)) $criteria->add(CadettraPeer::NUMLOTDES, $this->numlotdes);
		if ($this->isColumnModified(CadettraPeer::ALMORI)) $criteria->add(CadettraPeer::ALMORI, $this->almori);
		if ($this->isColumnModified(CadettraPeer::CODUBIORI)) $criteria->add(CadettraPeer::CODUBIORI, $this->codubiori);
		if ($this->isColumnModified(CadettraPeer::ALMDES)) $criteria->add(CadettraPeer::ALMDES, $this->almdes);
		if ($this->isColumnModified(CadettraPeer::CODUBIDES)) $criteria->add(CadettraPeer::CODUBIDES, $this->codubides);
		if ($this->isColumnModified(CadettraPeer::ID)) $criteria->add(CadettraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadettraPeer::DATABASE_NAME);

		$criteria->add(CadettraPeer::ID, $this->id);

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

		$copyObj->setCodtra($this->codtra);

		$copyObj->setCodart($this->codart);

		$copyObj->setCanart($this->canart);

		$copyObj->setCanrec($this->canrec);

		$copyObj->setCandev($this->candev);

		$copyObj->setCandif($this->candif);

		$copyObj->setCodfal($this->codfal);

		$copyObj->setFecest($this->fecest);

		$copyObj->setObstra($this->obstra);

		$copyObj->setNumlotori($this->numlotori);

		$copyObj->setNumlotdes($this->numlotdes);

		$copyObj->setAlmori($this->almori);

		$copyObj->setCodubiori($this->codubiori);

		$copyObj->setAlmdes($this->almdes);

		$copyObj->setCodubides($this->codubides);


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
			self::$peer = new CadettraPeer();
		}
		return self::$peer;
	}

	
	public function setCamotfal($v)
	{


		if ($v === null) {
			$this->setCodfal(NULL);
		} else {
			$this->setCodfal($v->getCodfal());
		}


		$this->aCamotfal = $v;
	}


	
	public function getCamotfal($con = null)
	{
		if ($this->aCamotfal === null && (($this->codfal !== "" && $this->codfal !== null))) {
						include_once 'lib/model/compras/om/BaseCamotfalPeer.php';

      $c = new Criteria();
      $c->add(CamotfalPeer::CODFAL,$this->codfal);
      
			$this->aCamotfal = CamotfalPeer::doSelectOne($c, $con);

			
		}
		return $this->aCamotfal;
	}

} 