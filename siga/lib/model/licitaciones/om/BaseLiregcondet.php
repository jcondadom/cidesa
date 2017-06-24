<?php


abstract class BaseLiregcondet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcont;


	
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


	
	protected $liregofedet_id;


	
	protected $id;

	
	protected $aLicontrat;

	
	protected $aLiregofedet;

	
	protected $collLidetparvals;

	
	protected $lastLidetparvalCriteria = null;

	
	protected $collLiregmodcondets;

	
	protected $lastLiregmodcondetCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcont()
  {

    return trim($this->numcont);

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
  
  public function getLiregofedetId()
  {

    return $this->liregofedet_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcont($v)
	{

    if ($this->numcont !== $v) {
        $this->numcont = $v;
        $this->modifiedColumns[] = LiregcondetPeer::NUMCONT;
      }
  
		if ($this->aLicontrat !== null && $this->aLicontrat->getNumcont() !== $v) {
			$this->aLicontrat = null;
		}

	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = LiregcondetPeer::CODART;
      }
  
	} 
	
	public function setUnimed($v)
	{

    if ($this->unimed !== $v) {
        $this->unimed = $v;
        $this->modifiedColumns[] = LiregcondetPeer::UNIMED;
      }
  
	} 
	
	public function setCantid($v)
	{

    if ($this->cantid !== $v) {
        $this->cantid = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::CANTID;
      }
  
	} 
	
	public function setPreuni($v)
	{

    if ($this->preuni !== $v) {
        $this->preuni = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::PREUNI;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::MONREC;
      }
  
	} 
	
	public function setCantidaum($v)
	{

    if ($this->cantidaum !== $v) {
        $this->cantidaum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::CANTIDAUM;
      }
  
	} 
	
	public function setCantiddis($v)
	{

    if ($this->cantiddis !== $v) {
        $this->cantiddis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::CANTIDDIS;
      }
  
	} 
	
	public function setPreunirec($v)
	{

    if ($this->preunirec !== $v) {
        $this->preunirec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::PREUNIREC;
      }
  
	} 
	
	public function setMonrecrec($v)
	{

    if ($this->monrecrec !== $v) {
        $this->monrecrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::MONRECREC;
      }
  
	} 
	
	public function setCantidadd($v)
	{

    if ($this->cantidadd !== $v) {
        $this->cantidadd = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::CANTIDADD;
      }
  
	} 
	
	public function setPreuniadd($v)
	{

    if ($this->preuniadd !== $v) {
        $this->preuniadd = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::PREUNIADD;
      }
  
	} 
	
	public function setMonrecadd($v)
	{

    if ($this->monrecadd !== $v) {
        $this->monrecadd = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::MONRECADD;
      }
  
	} 
	
	public function setCantidtot($v)
	{

    if ($this->cantidtot !== $v) {
        $this->cantidtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::CANTIDTOT;
      }
  
	} 
	
	public function setSubtot($v)
	{

    if ($this->subtot !== $v) {
        $this->subtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregcondetPeer::SUBTOT;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LiregcondetPeer::TIPCONPUB;
      }
  
	} 
	
	public function setLiregofedetId($v)
	{

    if ($this->liregofedet_id !== $v) {
        $this->liregofedet_id = $v;
        $this->modifiedColumns[] = LiregcondetPeer::LIREGOFEDET_ID;
      }
  
		if ($this->aLiregofedet !== null && $this->aLiregofedet->getId() !== $v) {
			$this->aLiregofedet = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiregcondetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcont = $rs->getString($startcol + 0);

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

      $this->liregofedet_id = $rs->getInt($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liregcondet object", $e);
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
			$con = Propel::getConnection(LiregcondetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiregcondetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiregcondetPeer::DATABASE_NAME);
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


												
			if ($this->aLicontrat !== null) {
				if ($this->aLicontrat->isModified()) {
					$affectedRows += $this->aLicontrat->save($con);
				}
				$this->setLicontrat($this->aLicontrat);
			}

			if ($this->aLiregofedet !== null) {
				if ($this->aLiregofedet->isModified()) {
					$affectedRows += $this->aLiregofedet->save($con);
				}
				$this->setLiregofedet($this->aLiregofedet);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiregcondetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiregcondetPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLidetparvals !== null) {
				foreach($this->collLidetparvals as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiregmodcondets !== null) {
				foreach($this->collLiregmodcondets as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aLicontrat !== null) {
				if (!$this->aLicontrat->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLicontrat->getValidationFailures());
				}
			}

			if ($this->aLiregofedet !== null) {
				if (!$this->aLiregofedet->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiregofedet->getValidationFailures());
				}
			}


			if (($retval = LiregcondetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLidetparvals !== null) {
					foreach($this->collLidetparvals as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiregmodcondets !== null) {
					foreach($this->collLiregmodcondets as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregcondetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcont();
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
				return $this->getLiregofedetId();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregcondetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcont(),
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
			$keys[16] => $this->getLiregofedetId(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregcondetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcont($value);
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
				$this->setLiregofedetId($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregcondetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcont($arr[$keys[0]]);
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
		if (array_key_exists($keys[16], $arr)) $this->setLiregofedetId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiregcondetPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiregcondetPeer::NUMCONT)) $criteria->add(LiregcondetPeer::NUMCONT, $this->numcont);
		if ($this->isColumnModified(LiregcondetPeer::CODART)) $criteria->add(LiregcondetPeer::CODART, $this->codart);
		if ($this->isColumnModified(LiregcondetPeer::UNIMED)) $criteria->add(LiregcondetPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(LiregcondetPeer::CANTID)) $criteria->add(LiregcondetPeer::CANTID, $this->cantid);
		if ($this->isColumnModified(LiregcondetPeer::PREUNI)) $criteria->add(LiregcondetPeer::PREUNI, $this->preuni);
		if ($this->isColumnModified(LiregcondetPeer::MONREC)) $criteria->add(LiregcondetPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(LiregcondetPeer::CANTIDAUM)) $criteria->add(LiregcondetPeer::CANTIDAUM, $this->cantidaum);
		if ($this->isColumnModified(LiregcondetPeer::CANTIDDIS)) $criteria->add(LiregcondetPeer::CANTIDDIS, $this->cantiddis);
		if ($this->isColumnModified(LiregcondetPeer::PREUNIREC)) $criteria->add(LiregcondetPeer::PREUNIREC, $this->preunirec);
		if ($this->isColumnModified(LiregcondetPeer::MONRECREC)) $criteria->add(LiregcondetPeer::MONRECREC, $this->monrecrec);
		if ($this->isColumnModified(LiregcondetPeer::CANTIDADD)) $criteria->add(LiregcondetPeer::CANTIDADD, $this->cantidadd);
		if ($this->isColumnModified(LiregcondetPeer::PREUNIADD)) $criteria->add(LiregcondetPeer::PREUNIADD, $this->preuniadd);
		if ($this->isColumnModified(LiregcondetPeer::MONRECADD)) $criteria->add(LiregcondetPeer::MONRECADD, $this->monrecadd);
		if ($this->isColumnModified(LiregcondetPeer::CANTIDTOT)) $criteria->add(LiregcondetPeer::CANTIDTOT, $this->cantidtot);
		if ($this->isColumnModified(LiregcondetPeer::SUBTOT)) $criteria->add(LiregcondetPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(LiregcondetPeer::TIPCONPUB)) $criteria->add(LiregcondetPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LiregcondetPeer::LIREGOFEDET_ID)) $criteria->add(LiregcondetPeer::LIREGOFEDET_ID, $this->liregofedet_id);
		if ($this->isColumnModified(LiregcondetPeer::ID)) $criteria->add(LiregcondetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiregcondetPeer::DATABASE_NAME);

		$criteria->add(LiregcondetPeer::ID, $this->id);

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

		$copyObj->setNumcont($this->numcont);

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

		$copyObj->setLiregofedetId($this->liregofedet_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLidetparvals() as $relObj) {
				$copyObj->addLidetparval($relObj->copy($deepCopy));
			}

			foreach($this->getLiregmodcondets() as $relObj) {
				$copyObj->addLiregmodcondet($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new LiregcondetPeer();
		}
		return self::$peer;
	}

	
	public function setLicontrat($v)
	{


		if ($v === null) {
			$this->setNumcont(NULL);
		} else {
			$this->setNumcont($v->getNumcont());
		}


		$this->aLicontrat = $v;
	}


	
	public function getLicontrat($con = null)
	{
		if ($this->aLicontrat === null && (($this->numcont !== "" && $this->numcont !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLicontratPeer.php';

      $c = new Criteria();
      $c->add(LicontratPeer::NUMCONT,$this->numcont);
      
			$this->aLicontrat = LicontratPeer::doSelectOne($c, $con);

			
		}
		return $this->aLicontrat;
	}

	
	public function setLiregofedet($v)
	{


		if ($v === null) {
			$this->setLiregofedetId(NULL);
		} else {
			$this->setLiregofedetId($v->getId());
		}


		$this->aLiregofedet = $v;
	}


	
	public function getLiregofedet($con = null)
	{
		if ($this->aLiregofedet === null && ($this->liregofedet_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLiregofedetPeer.php';

      $c = new Criteria();
      $c->add(LiregofedetPeer::ID,$this->liregofedet_id);
      
			$this->aLiregofedet = LiregofedetPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiregofedet;
	}

	
	public function initLidetparvals()
	{
		if ($this->collLidetparvals === null) {
			$this->collLidetparvals = array();
		}
	}

	
	public function getLidetparvals($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetparvalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetparvals === null) {
			if ($this->isNew()) {
			   $this->collLidetparvals = array();
			} else {

				$criteria->add(LidetparvalPeer::LIREGCONDET_ID, $this->getId());

				LidetparvalPeer::addSelectColumns($criteria);
				$this->collLidetparvals = LidetparvalPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetparvalPeer::LIREGCONDET_ID, $this->getId());

				LidetparvalPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetparvalCriteria) || !$this->lastLidetparvalCriteria->equals($criteria)) {
					$this->collLidetparvals = LidetparvalPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetparvalCriteria = $criteria;
		return $this->collLidetparvals;
	}

	
	public function countLidetparvals($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetparvalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetparvalPeer::LIREGCONDET_ID, $this->getId());

		return LidetparvalPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetparval(Lidetparval $l)
	{
		$this->collLidetparvals[] = $l;
		$l->setLiregcondet($this);
	}


	
	public function getLidetparvalsJoinLivaluaciones($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetparvalPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetparvals === null) {
			if ($this->isNew()) {
				$this->collLidetparvals = array();
			} else {

				$criteria->add(LidetparvalPeer::LIREGCONDET_ID, $this->getId());

				$this->collLidetparvals = LidetparvalPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetparvalPeer::LIREGCONDET_ID, $this->getId());

			if (!isset($this->lastLidetparvalCriteria) || !$this->lastLidetparvalCriteria->equals($criteria)) {
				$this->collLidetparvals = LidetparvalPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		}
		$this->lastLidetparvalCriteria = $criteria;

		return $this->collLidetparvals;
	}

	
	public function initLiregmodcondets()
	{
		if ($this->collLiregmodcondets === null) {
			$this->collLiregmodcondets = array();
		}
	}

	
	public function getLiregmodcondets($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregmodcondetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregmodcondets === null) {
			if ($this->isNew()) {
			   $this->collLiregmodcondets = array();
			} else {

				$criteria->add(LiregmodcondetPeer::LIREGCONDET_ID, $this->getId());

				LiregmodcondetPeer::addSelectColumns($criteria);
				$this->collLiregmodcondets = LiregmodcondetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregmodcondetPeer::LIREGCONDET_ID, $this->getId());

				LiregmodcondetPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregmodcondetCriteria) || !$this->lastLiregmodcondetCriteria->equals($criteria)) {
					$this->collLiregmodcondets = LiregmodcondetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregmodcondetCriteria = $criteria;
		return $this->collLiregmodcondets;
	}

	
	public function countLiregmodcondets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregmodcondetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregmodcondetPeer::LIREGCONDET_ID, $this->getId());

		return LiregmodcondetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregmodcondet(Liregmodcondet $l)
	{
		$this->collLiregmodcondets[] = $l;
		$l->setLiregcondet($this);
	}


	
	public function getLiregmodcondetsJoinLimodcont($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregmodcondetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregmodcondets === null) {
			if ($this->isNew()) {
				$this->collLiregmodcondets = array();
			} else {

				$criteria->add(LiregmodcondetPeer::LIREGCONDET_ID, $this->getId());

				$this->collLiregmodcondets = LiregmodcondetPeer::doSelectJoinLimodcont($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregmodcondetPeer::LIREGCONDET_ID, $this->getId());

			if (!isset($this->lastLiregmodcondetCriteria) || !$this->lastLiregmodcondetCriteria->equals($criteria)) {
				$this->collLiregmodcondets = LiregmodcondetPeer::doSelectJoinLimodcont($criteria, $con);
			}
		}
		$this->lastLiregmodcondetCriteria = $criteria;

		return $this->collLiregmodcondets;
	}

} 