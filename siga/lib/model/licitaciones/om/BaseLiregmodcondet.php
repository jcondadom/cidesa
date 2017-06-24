<?php


abstract class BaseLiregmodcondet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nummod;


	
	protected $codart;


	
	protected $unimed;


	
	protected $cantid;


	
	protected $preuni;


	
	protected $monrec;


	
	protected $cantidaum;


	
	protected $cantiddis;


	
	protected $preunirec;


	
	protected $monrecrec;


	
	protected $cantidadd;


	
	protected $preuniadd;


	
	protected $monrecadd;


	
	protected $cantidtot;


	
	protected $subtot;


	
	protected $tipconpub;


	
	protected $tipo;


	
	protected $eliminada;


	
	protected $liregcondet_id;


	
	protected $id;

	
	protected $aLimodcont;

	
	protected $aLiregcondet;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNummod()
  {

    return trim($this->nummod);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getUnimed()
  {

    return trim($this->unimed);

  }
  
  public function getCantid($val=false)
  {

    if($val) return number_format($this->cantid,2,',','.');
    else return $this->cantid;

  }
  
  public function getPreuni($val=false)
  {

    if($val) return number_format($this->preuni,2,',','.');
    else return $this->preuni;

  }
  
  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
  public function getCantidaum($val=false)
  {

    if($val) return number_format($this->cantidaum,2,',','.');
    else return $this->cantidaum;

  }
  
  public function getCantiddis($val=false)
  {

    if($val) return number_format($this->cantiddis,2,',','.');
    else return $this->cantiddis;

  }
  
  public function getPreunirec($val=false)
  {

    if($val) return number_format($this->preunirec,2,',','.');
    else return $this->preunirec;

  }
  
  public function getMonrecrec($val=false)
  {

    if($val) return number_format($this->monrecrec,2,',','.');
    else return $this->monrecrec;

  }
  
  public function getCantidadd($val=false)
  {

    if($val) return number_format($this->cantidadd,2,',','.');
    else return $this->cantidadd;

  }
  
  public function getPreuniadd($val=false)
  {

    if($val) return number_format($this->preuniadd,2,',','.');
    else return $this->preuniadd;

  }
  
  public function getMonrecadd($val=false)
  {

    if($val) return number_format($this->monrecadd,2,',','.');
    else return $this->monrecadd;

  }
  
  public function getCantidtot($val=false)
  {

    if($val) return number_format($this->cantidtot,2,',','.');
    else return $this->cantidtot;

  }
  
  public function getSubtot($val=false)
  {

    if($val) return number_format($this->subtot,2,',','.');
    else return $this->subtot;

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getEliminada()
  {

    return $this->eliminada;

  }
  
  public function getLiregcondetId()
  {

    return $this->liregcondet_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNummod($v)
	{

    if ($this->nummod !== $v) {
        $this->nummod = $v;
        $this->modifiedColumns[] = LiregmodcondetPeer::NUMMOD;
      }
  
		if ($this->aLimodcont !== null && $this->aLimodcont->getNummod() !== $v) {
			$this->aLimodcont = null;
		}

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LiregmodcondetPeer::CODART;
      }
  
	} 
	
	public function setUnimed($v)
	{

    if ($this->unimed !== $v) {
        $this->unimed = $v;
        $this->modifiedColumns[] = LiregmodcondetPeer::UNIMED;
      }
  
	} 
	
	public function setCantid($v)
	{

    if ($this->cantid !== $v) {
        $this->cantid = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::CANTID;
      }
  
	} 
	
	public function setPreuni($v)
	{

    if ($this->preuni !== $v) {
        $this->preuni = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::PREUNI;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::MONREC;
      }
  
	} 
	
	public function setCantidaum($v)
	{

    if ($this->cantidaum !== $v) {
        $this->cantidaum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::CANTIDAUM;
      }
  
	} 
	
	public function setCantiddis($v)
	{

    if ($this->cantiddis !== $v) {
        $this->cantiddis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::CANTIDDIS;
      }
  
	} 
	
	public function setPreunirec($v)
	{

    if ($this->preunirec !== $v) {
        $this->preunirec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::PREUNIREC;
      }
  
	} 
	
	public function setMonrecrec($v)
	{

    if ($this->monrecrec !== $v) {
        $this->monrecrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::MONRECREC;
      }
  
	} 
	
	public function setCantidadd($v)
	{

    if ($this->cantidadd !== $v) {
        $this->cantidadd = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::CANTIDADD;
      }
  
	} 
	
	public function setPreuniadd($v)
	{

    if ($this->preuniadd !== $v) {
        $this->preuniadd = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::PREUNIADD;
      }
  
	} 
	
	public function setMonrecadd($v)
	{

    if ($this->monrecadd !== $v) {
        $this->monrecadd = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::MONRECADD;
      }
  
	} 
	
	public function setCantidtot($v)
	{

    if ($this->cantidtot !== $v) {
        $this->cantidtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::CANTIDTOT;
      }
  
	} 
	
	public function setSubtot($v)
	{

    if ($this->subtot !== $v) {
        $this->subtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregmodcondetPeer::SUBTOT;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LiregmodcondetPeer::TIPCONPUB;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = LiregmodcondetPeer::TIPO;
      }
  
	} 
	
	public function setEliminada($v)
	{

    if ($this->eliminada !== $v) {
        $this->eliminada = $v;
        $this->modifiedColumns[] = LiregmodcondetPeer::ELIMINADA;
      }
  
	} 
	
	public function setLiregcondetId($v)
	{

    if ($this->liregcondet_id !== $v) {
        $this->liregcondet_id = $v;
        $this->modifiedColumns[] = LiregmodcondetPeer::LIREGCONDET_ID;
      }
  
		if ($this->aLiregcondet !== null && $this->aLiregcondet->getId() !== $v) {
			$this->aLiregcondet = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiregmodcondetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nummod = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->unimed = $rs->getString($startcol + 2);

      $this->cantid = $rs->getFloat($startcol + 3);

      $this->preuni = $rs->getFloat($startcol + 4);

      $this->monrec = $rs->getFloat($startcol + 5);

      $this->cantidaum = $rs->getFloat($startcol + 6);

      $this->cantiddis = $rs->getFloat($startcol + 7);

      $this->preunirec = $rs->getFloat($startcol + 8);

      $this->monrecrec = $rs->getFloat($startcol + 9);

      $this->cantidadd = $rs->getFloat($startcol + 10);

      $this->preuniadd = $rs->getFloat($startcol + 11);

      $this->monrecadd = $rs->getFloat($startcol + 12);

      $this->cantidtot = $rs->getFloat($startcol + 13);

      $this->subtot = $rs->getFloat($startcol + 14);

      $this->tipconpub = $rs->getString($startcol + 15);

      $this->tipo = $rs->getString($startcol + 16);

      $this->eliminada = $rs->getBoolean($startcol + 17);

      $this->liregcondet_id = $rs->getInt($startcol + 18);

      $this->id = $rs->getInt($startcol + 19);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 20; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liregmodcondet object", $e);
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
			$con = Propel::getConnection(LiregmodcondetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiregmodcondetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiregmodcondetPeer::DATABASE_NAME);
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


												
			if ($this->aLimodcont !== null) {
				if ($this->aLimodcont->isModified()) {
					$affectedRows += $this->aLimodcont->save($con);
				}
				$this->setLimodcont($this->aLimodcont);
			}

			if ($this->aLiregcondet !== null) {
				if ($this->aLiregcondet->isModified()) {
					$affectedRows += $this->aLiregcondet->save($con);
				}
				$this->setLiregcondet($this->aLiregcondet);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiregmodcondetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiregmodcondetPeer::doUpdate($this, $con);
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


												
			if ($this->aLimodcont !== null) {
				if (!$this->aLimodcont->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLimodcont->getValidationFailures());
				}
			}

			if ($this->aLiregcondet !== null) {
				if (!$this->aLiregcondet->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiregcondet->getValidationFailures());
				}
			}


			if (($retval = LiregmodcondetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregmodcondetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNummod();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getUnimed();
				break;
			case 3:
				return $this->getCantid();
				break;
			case 4:
				return $this->getPreuni();
				break;
			case 5:
				return $this->getMonrec();
				break;
			case 6:
				return $this->getCantidaum();
				break;
			case 7:
				return $this->getCantiddis();
				break;
			case 8:
				return $this->getPreunirec();
				break;
			case 9:
				return $this->getMonrecrec();
				break;
			case 10:
				return $this->getCantidadd();
				break;
			case 11:
				return $this->getPreuniadd();
				break;
			case 12:
				return $this->getMonrecadd();
				break;
			case 13:
				return $this->getCantidtot();
				break;
			case 14:
				return $this->getSubtot();
				break;
			case 15:
				return $this->getTipconpub();
				break;
			case 16:
				return $this->getTipo();
				break;
			case 17:
				return $this->getEliminada();
				break;
			case 18:
				return $this->getLiregcondetId();
				break;
			case 19:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregmodcondetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNummod(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getUnimed(),
			$keys[3] => $this->getCantid(),
			$keys[4] => $this->getPreuni(),
			$keys[5] => $this->getMonrec(),
			$keys[6] => $this->getCantidaum(),
			$keys[7] => $this->getCantiddis(),
			$keys[8] => $this->getPreunirec(),
			$keys[9] => $this->getMonrecrec(),
			$keys[10] => $this->getCantidadd(),
			$keys[11] => $this->getPreuniadd(),
			$keys[12] => $this->getMonrecadd(),
			$keys[13] => $this->getCantidtot(),
			$keys[14] => $this->getSubtot(),
			$keys[15] => $this->getTipconpub(),
			$keys[16] => $this->getTipo(),
			$keys[17] => $this->getEliminada(),
			$keys[18] => $this->getLiregcondetId(),
			$keys[19] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregmodcondetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNummod($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setUnimed($value);
				break;
			case 3:
				$this->setCantid($value);
				break;
			case 4:
				$this->setPreuni($value);
				break;
			case 5:
				$this->setMonrec($value);
				break;
			case 6:
				$this->setCantidaum($value);
				break;
			case 7:
				$this->setCantiddis($value);
				break;
			case 8:
				$this->setPreunirec($value);
				break;
			case 9:
				$this->setMonrecrec($value);
				break;
			case 10:
				$this->setCantidadd($value);
				break;
			case 11:
				$this->setPreuniadd($value);
				break;
			case 12:
				$this->setMonrecadd($value);
				break;
			case 13:
				$this->setCantidtot($value);
				break;
			case 14:
				$this->setSubtot($value);
				break;
			case 15:
				$this->setTipconpub($value);
				break;
			case 16:
				$this->setTipo($value);
				break;
			case 17:
				$this->setEliminada($value);
				break;
			case 18:
				$this->setLiregcondetId($value);
				break;
			case 19:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregmodcondetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNummod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUnimed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCantid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPreuni($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonrec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCantidaum($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCantiddis($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPreunirec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonrecrec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCantidadd($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPreuniadd($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMonrecadd($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCantidtot($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setSubtot($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTipconpub($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTipo($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setEliminada($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setLiregcondetId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setId($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiregmodcondetPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiregmodcondetPeer::NUMMOD)) $criteria->add(LiregmodcondetPeer::NUMMOD, $this->nummod);
		if ($this->isColumnModified(LiregmodcondetPeer::CODART)) $criteria->add(LiregmodcondetPeer::CODART, $this->codart);
		if ($this->isColumnModified(LiregmodcondetPeer::UNIMED)) $criteria->add(LiregmodcondetPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(LiregmodcondetPeer::CANTID)) $criteria->add(LiregmodcondetPeer::CANTID, $this->cantid);
		if ($this->isColumnModified(LiregmodcondetPeer::PREUNI)) $criteria->add(LiregmodcondetPeer::PREUNI, $this->preuni);
		if ($this->isColumnModified(LiregmodcondetPeer::MONREC)) $criteria->add(LiregmodcondetPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(LiregmodcondetPeer::CANTIDAUM)) $criteria->add(LiregmodcondetPeer::CANTIDAUM, $this->cantidaum);
		if ($this->isColumnModified(LiregmodcondetPeer::CANTIDDIS)) $criteria->add(LiregmodcondetPeer::CANTIDDIS, $this->cantiddis);
		if ($this->isColumnModified(LiregmodcondetPeer::PREUNIREC)) $criteria->add(LiregmodcondetPeer::PREUNIREC, $this->preunirec);
		if ($this->isColumnModified(LiregmodcondetPeer::MONRECREC)) $criteria->add(LiregmodcondetPeer::MONRECREC, $this->monrecrec);
		if ($this->isColumnModified(LiregmodcondetPeer::CANTIDADD)) $criteria->add(LiregmodcondetPeer::CANTIDADD, $this->cantidadd);
		if ($this->isColumnModified(LiregmodcondetPeer::PREUNIADD)) $criteria->add(LiregmodcondetPeer::PREUNIADD, $this->preuniadd);
		if ($this->isColumnModified(LiregmodcondetPeer::MONRECADD)) $criteria->add(LiregmodcondetPeer::MONRECADD, $this->monrecadd);
		if ($this->isColumnModified(LiregmodcondetPeer::CANTIDTOT)) $criteria->add(LiregmodcondetPeer::CANTIDTOT, $this->cantidtot);
		if ($this->isColumnModified(LiregmodcondetPeer::SUBTOT)) $criteria->add(LiregmodcondetPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(LiregmodcondetPeer::TIPCONPUB)) $criteria->add(LiregmodcondetPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LiregmodcondetPeer::TIPO)) $criteria->add(LiregmodcondetPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(LiregmodcondetPeer::ELIMINADA)) $criteria->add(LiregmodcondetPeer::ELIMINADA, $this->eliminada);
		if ($this->isColumnModified(LiregmodcondetPeer::LIREGCONDET_ID)) $criteria->add(LiregmodcondetPeer::LIREGCONDET_ID, $this->liregcondet_id);
		if ($this->isColumnModified(LiregmodcondetPeer::ID)) $criteria->add(LiregmodcondetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiregmodcondetPeer::DATABASE_NAME);

		$criteria->add(LiregmodcondetPeer::ID, $this->id);

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

		$copyObj->setNummod($this->nummod);

		$copyObj->setCodart($this->codart);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setCantid($this->cantid);

		$copyObj->setPreuni($this->preuni);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setCantidaum($this->cantidaum);

		$copyObj->setCantiddis($this->cantiddis);

		$copyObj->setPreunirec($this->preunirec);

		$copyObj->setMonrecrec($this->monrecrec);

		$copyObj->setCantidadd($this->cantidadd);

		$copyObj->setPreuniadd($this->preuniadd);

		$copyObj->setMonrecadd($this->monrecadd);

		$copyObj->setCantidtot($this->cantidtot);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setTipconpub($this->tipconpub);

		$copyObj->setTipo($this->tipo);

		$copyObj->setEliminada($this->eliminada);

		$copyObj->setLiregcondetId($this->liregcondet_id);


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
			self::$peer = new LiregmodcondetPeer();
		}
		return self::$peer;
	}

	
	public function setLimodcont($v)
	{


		if ($v === null) {
			$this->setNummod(NULL);
		} else {
			$this->setNummod($v->getNummod());
		}


		$this->aLimodcont = $v;
	}


	
	public function getLimodcont($con = null)
	{
		if ($this->aLimodcont === null && (($this->nummod !== "" && $this->nummod !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';

      $c = new Criteria();
      $c->add(LimodcontPeer::NUMMOD,$this->nummod);
      
			$this->aLimodcont = LimodcontPeer::doSelectOne($c, $con);

			
		}
		return $this->aLimodcont;
	}

	
	public function setLiregcondet($v)
	{


		if ($v === null) {
			$this->setLiregcondetId(NULL);
		} else {
			$this->setLiregcondetId($v->getId());
		}


		$this->aLiregcondet = $v;
	}


	
	public function getLiregcondet($con = null)
	{
		if ($this->aLiregcondet === null && ($this->liregcondet_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLiregcondetPeer.php';

      $c = new Criteria();
      $c->add(LiregcondetPeer::ID,$this->liregcondet_id);
      
			$this->aLiregcondet = LiregcondetPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiregcondet;
	}

} 