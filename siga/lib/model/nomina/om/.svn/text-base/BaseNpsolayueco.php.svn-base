<?php


abstract class BaseNpsolayueco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsolayu;


	
	protected $fecsolayu;


	
	protected $dessolayu;


	
	protected $tipcom;


	
	protected $esnoemp;


	
	protected $codempayu;


	
	protected $cedrif;


	
	protected $numpuncue;


	
	protected $codtipayu;


	
	protected $codcat;


	
	protected $codeve;


	
	protected $codniv;


	
	protected $monayu;


	
	protected $refcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsolayu()
  {

    return trim($this->numsolayu);

  }
  
  public function getFecsolayu($format = 'Y-m-d')
  {

    if ($this->fecsolayu === null || $this->fecsolayu === '') {
      return null;
    } elseif (!is_int($this->fecsolayu)) {
            $ts = adodb_strtotime($this->fecsolayu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsolayu] as date/time value: " . var_export($this->fecsolayu, true));
      }
    } else {
      $ts = $this->fecsolayu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDessolayu()
  {

    return trim($this->dessolayu);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getEsnoemp()
  {

    return trim($this->esnoemp);

  }
  
  public function getCodempayu()
  {

    return trim($this->codempayu);

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNumpuncue()
  {

    return trim($this->numpuncue);

  }
  
  public function getCodtipayu()
  {

    return trim($this->codtipayu);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodeve()
  {

    return trim($this->codeve);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getMonayu($val=false)
  {

    if($val) return number_format($this->monayu,2,',','.');
    else return $this->monayu;

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsolayu($v)
	{

    if ($this->numsolayu !== $v) {
        $this->numsolayu = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::NUMSOLAYU;
      }
  
	} 
	
	public function setFecsolayu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsolayu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsolayu !== $ts) {
      $this->fecsolayu = $ts;
      $this->modifiedColumns[] = NpsolayuecoPeer::FECSOLAYU;
    }

	} 
	
	public function setDessolayu($v)
	{

    if ($this->dessolayu !== $v) {
        $this->dessolayu = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::DESSOLAYU;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::TIPCOM;
      }
  
	} 
	
	public function setEsnoemp($v)
	{

    if ($this->esnoemp !== $v) {
        $this->esnoemp = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::ESNOEMP;
      }
  
	} 
	
	public function setCodempayu($v)
	{

    if ($this->codempayu !== $v) {
        $this->codempayu = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::CODEMPAYU;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::CEDRIF;
      }
  
	} 
	
	public function setNumpuncue($v)
	{

    if ($this->numpuncue !== $v) {
        $this->numpuncue = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::NUMPUNCUE;
      }
  
	} 
	
	public function setCodtipayu($v)
	{

    if ($this->codtipayu !== $v) {
        $this->codtipayu = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::CODTIPAYU;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::CODCAT;
      }
  
	} 
	
	public function setCodeve($v)
	{

    if ($this->codeve !== $v) {
        $this->codeve = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::CODEVE;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::CODNIV;
      }
  
	} 
	
	public function setMonayu($v)
	{

    if ($this->monayu !== $v) {
        $this->monayu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpsolayuecoPeer::MONAYU;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::REFCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpsolayuecoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsolayu = $rs->getString($startcol + 0);

      $this->fecsolayu = $rs->getDate($startcol + 1, null);

      $this->dessolayu = $rs->getString($startcol + 2);

      $this->tipcom = $rs->getString($startcol + 3);

      $this->esnoemp = $rs->getString($startcol + 4);

      $this->codempayu = $rs->getString($startcol + 5);

      $this->cedrif = $rs->getString($startcol + 6);

      $this->numpuncue = $rs->getString($startcol + 7);

      $this->codtipayu = $rs->getString($startcol + 8);

      $this->codcat = $rs->getString($startcol + 9);

      $this->codeve = $rs->getString($startcol + 10);

      $this->codniv = $rs->getString($startcol + 11);

      $this->monayu = $rs->getFloat($startcol + 12);

      $this->refcom = $rs->getString($startcol + 13);

      $this->id = $rs->getInt($startcol + 14);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 15; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npsolayueco object", $e);
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
			$con = Propel::getConnection(NpsolayuecoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpsolayuecoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpsolayuecoPeer::DATABASE_NAME);
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
					$pk = NpsolayuecoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpsolayuecoPeer::doUpdate($this, $con);
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


			if (($retval = NpsolayuecoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpsolayuecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsolayu();
				break;
			case 1:
				return $this->getFecsolayu();
				break;
			case 2:
				return $this->getDessolayu();
				break;
			case 3:
				return $this->getTipcom();
				break;
			case 4:
				return $this->getEsnoemp();
				break;
			case 5:
				return $this->getCodempayu();
				break;
			case 6:
				return $this->getCedrif();
				break;
			case 7:
				return $this->getNumpuncue();
				break;
			case 8:
				return $this->getCodtipayu();
				break;
			case 9:
				return $this->getCodcat();
				break;
			case 10:
				return $this->getCodeve();
				break;
			case 11:
				return $this->getCodniv();
				break;
			case 12:
				return $this->getMonayu();
				break;
			case 13:
				return $this->getRefcom();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpsolayuecoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsolayu(),
			$keys[1] => $this->getFecsolayu(),
			$keys[2] => $this->getDessolayu(),
			$keys[3] => $this->getTipcom(),
			$keys[4] => $this->getEsnoemp(),
			$keys[5] => $this->getCodempayu(),
			$keys[6] => $this->getCedrif(),
			$keys[7] => $this->getNumpuncue(),
			$keys[8] => $this->getCodtipayu(),
			$keys[9] => $this->getCodcat(),
			$keys[10] => $this->getCodeve(),
			$keys[11] => $this->getCodniv(),
			$keys[12] => $this->getMonayu(),
			$keys[13] => $this->getRefcom(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpsolayuecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsolayu($value);
				break;
			case 1:
				$this->setFecsolayu($value);
				break;
			case 2:
				$this->setDessolayu($value);
				break;
			case 3:
				$this->setTipcom($value);
				break;
			case 4:
				$this->setEsnoemp($value);
				break;
			case 5:
				$this->setCodempayu($value);
				break;
			case 6:
				$this->setCedrif($value);
				break;
			case 7:
				$this->setNumpuncue($value);
				break;
			case 8:
				$this->setCodtipayu($value);
				break;
			case 9:
				$this->setCodcat($value);
				break;
			case 10:
				$this->setCodeve($value);
				break;
			case 11:
				$this->setCodniv($value);
				break;
			case 12:
				$this->setMonayu($value);
				break;
			case 13:
				$this->setRefcom($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpsolayuecoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsolayu($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsolayu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDessolayu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipcom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEsnoemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodempayu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCedrif($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumpuncue($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodtipayu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodcat($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodeve($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodniv($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMonayu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRefcom($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpsolayuecoPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpsolayuecoPeer::NUMSOLAYU)) $criteria->add(NpsolayuecoPeer::NUMSOLAYU, $this->numsolayu);
		if ($this->isColumnModified(NpsolayuecoPeer::FECSOLAYU)) $criteria->add(NpsolayuecoPeer::FECSOLAYU, $this->fecsolayu);
		if ($this->isColumnModified(NpsolayuecoPeer::DESSOLAYU)) $criteria->add(NpsolayuecoPeer::DESSOLAYU, $this->dessolayu);
		if ($this->isColumnModified(NpsolayuecoPeer::TIPCOM)) $criteria->add(NpsolayuecoPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(NpsolayuecoPeer::ESNOEMP)) $criteria->add(NpsolayuecoPeer::ESNOEMP, $this->esnoemp);
		if ($this->isColumnModified(NpsolayuecoPeer::CODEMPAYU)) $criteria->add(NpsolayuecoPeer::CODEMPAYU, $this->codempayu);
		if ($this->isColumnModified(NpsolayuecoPeer::CEDRIF)) $criteria->add(NpsolayuecoPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(NpsolayuecoPeer::NUMPUNCUE)) $criteria->add(NpsolayuecoPeer::NUMPUNCUE, $this->numpuncue);
		if ($this->isColumnModified(NpsolayuecoPeer::CODTIPAYU)) $criteria->add(NpsolayuecoPeer::CODTIPAYU, $this->codtipayu);
		if ($this->isColumnModified(NpsolayuecoPeer::CODCAT)) $criteria->add(NpsolayuecoPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(NpsolayuecoPeer::CODEVE)) $criteria->add(NpsolayuecoPeer::CODEVE, $this->codeve);
		if ($this->isColumnModified(NpsolayuecoPeer::CODNIV)) $criteria->add(NpsolayuecoPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(NpsolayuecoPeer::MONAYU)) $criteria->add(NpsolayuecoPeer::MONAYU, $this->monayu);
		if ($this->isColumnModified(NpsolayuecoPeer::REFCOM)) $criteria->add(NpsolayuecoPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(NpsolayuecoPeer::ID)) $criteria->add(NpsolayuecoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpsolayuecoPeer::DATABASE_NAME);

		$criteria->add(NpsolayuecoPeer::ID, $this->id);

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

		$copyObj->setNumsolayu($this->numsolayu);

		$copyObj->setFecsolayu($this->fecsolayu);

		$copyObj->setDessolayu($this->dessolayu);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setEsnoemp($this->esnoemp);

		$copyObj->setCodempayu($this->codempayu);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNumpuncue($this->numpuncue);

		$copyObj->setCodtipayu($this->codtipayu);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodeve($this->codeve);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setMonayu($this->monayu);

		$copyObj->setRefcom($this->refcom);


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
			self::$peer = new NpsolayuecoPeer();
		}
		return self::$peer;
	}

} 