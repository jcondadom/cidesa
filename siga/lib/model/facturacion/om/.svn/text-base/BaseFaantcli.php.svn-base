<?php


abstract class BaseFaantcli extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroant;


	
	protected $fecant;


	
	protected $refped;


	
	protected $codcli;


	
	protected $desant;


	
	protected $totant;


	
	protected $totxan;


	
	protected $numcue;


	
	protected $codtip;


	
	protected $numcom;


	
	protected $resant;


	
	protected $tipant;


	
	protected $id;

	
	protected $aTsdefban;

	
	protected $aTstipmov;

	
	protected $collFadetants;

	
	protected $lastFadetantCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNroant()
  {

    return trim($this->nroant);

  }
  
  public function getFecant($format = 'Y-m-d')
  {

    if ($this->fecant === null || $this->fecant === '') {
      return null;
    } elseif (!is_int($this->fecant)) {
            $ts = adodb_strtotime($this->fecant);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecant] as date/time value: " . var_export($this->fecant, true));
      }
    } else {
      $ts = $this->fecant;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRefped()
  {

    return trim($this->refped);

  }
  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getDesant()
  {

    return trim($this->desant);

  }
  
  public function getTotant($val=false)
  {

    if($val) return number_format($this->totant,2,',','.');
    else return $this->totant;

  }
  
  public function getTotxan($val=false)
  {

    if($val) return number_format($this->totxan,2,',','.');
    else return $this->totxan;

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getResant($val=false)
  {

    if($val) return number_format($this->resant,2,',','.');
    else return $this->resant;

  }
  
  public function getTipant()
  {

    return trim($this->tipant);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNroant($v)
	{

    if ($this->nroant !== $v) {
        $this->nroant = $v;
        $this->modifiedColumns[] = FaantcliPeer::NROANT;
      }
  
	} 
	
	public function setFecant($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecant] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecant !== $ts) {
      $this->fecant = $ts;
      $this->modifiedColumns[] = FaantcliPeer::FECANT;
    }

	} 
	
	public function setRefped($v)
	{

    if ($this->refped !== $v) {
        $this->refped = $v;
        $this->modifiedColumns[] = FaantcliPeer::REFPED;
      }
  
	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = FaantcliPeer::CODCLI;
      }
  
	} 
	
	public function setDesant($v)
	{

    if ($this->desant !== $v) {
        $this->desant = $v;
        $this->modifiedColumns[] = FaantcliPeer::DESANT;
      }
  
	} 
	
	public function setTotant($v)
	{

    if ($this->totant !== $v) {
        $this->totant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaantcliPeer::TOTANT;
      }
  
	} 
	
	public function setTotxan($v)
	{

    if ($this->totxan !== $v) {
        $this->totxan = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaantcliPeer::TOTXAN;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = FaantcliPeer::NUMCUE;
      }
  
		if ($this->aTsdefban !== null && $this->aTsdefban->getNumcue() !== $v) {
			$this->aTsdefban = null;
		}

	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = FaantcliPeer::CODTIP;
      }
  
		if ($this->aTstipmov !== null && $this->aTstipmov->getCodtip() !== $v) {
			$this->aTstipmov = null;
		}

	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = FaantcliPeer::NUMCOM;
      }
  
	} 
	
	public function setResant($v)
	{

    if ($this->resant !== $v) {
        $this->resant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaantcliPeer::RESANT;
      }
  
	} 
	
	public function setTipant($v)
	{

    if ($this->tipant !== $v) {
        $this->tipant = $v;
        $this->modifiedColumns[] = FaantcliPeer::TIPANT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaantcliPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nroant = $rs->getString($startcol + 0);

      $this->fecant = $rs->getDate($startcol + 1, null);

      $this->refped = $rs->getString($startcol + 2);

      $this->codcli = $rs->getString($startcol + 3);

      $this->desant = $rs->getString($startcol + 4);

      $this->totant = $rs->getFloat($startcol + 5);

      $this->totxan = $rs->getFloat($startcol + 6);

      $this->numcue = $rs->getString($startcol + 7);

      $this->codtip = $rs->getString($startcol + 8);

      $this->numcom = $rs->getString($startcol + 9);

      $this->resant = $rs->getFloat($startcol + 10);

      $this->tipant = $rs->getString($startcol + 11);

      $this->id = $rs->getInt($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faantcli object", $e);
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
			$con = Propel::getConnection(FaantcliPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaantcliPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaantcliPeer::DATABASE_NAME);
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


												
			if ($this->aTsdefban !== null) {
				if ($this->aTsdefban->isModified()) {
					$affectedRows += $this->aTsdefban->save($con);
				}
				$this->setTsdefban($this->aTsdefban);
			}

			if ($this->aTstipmov !== null) {
				if ($this->aTstipmov->isModified()) {
					$affectedRows += $this->aTstipmov->save($con);
				}
				$this->setTstipmov($this->aTstipmov);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FaantcliPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaantcliPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFadetants !== null) {
				foreach($this->collFadetants as $referrerFK) {
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


												
			if ($this->aTsdefban !== null) {
				if (!$this->aTsdefban->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTsdefban->getValidationFailures());
				}
			}

			if ($this->aTstipmov !== null) {
				if (!$this->aTstipmov->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTstipmov->getValidationFailures());
				}
			}


			if (($retval = FaantcliPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFadetants !== null) {
					foreach($this->collFadetants as $referrerFK) {
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
		$pos = FaantcliPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroant();
				break;
			case 1:
				return $this->getFecant();
				break;
			case 2:
				return $this->getRefped();
				break;
			case 3:
				return $this->getCodcli();
				break;
			case 4:
				return $this->getDesant();
				break;
			case 5:
				return $this->getTotant();
				break;
			case 6:
				return $this->getTotxan();
				break;
			case 7:
				return $this->getNumcue();
				break;
			case 8:
				return $this->getCodtip();
				break;
			case 9:
				return $this->getNumcom();
				break;
			case 10:
				return $this->getResant();
				break;
			case 11:
				return $this->getTipant();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaantcliPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroant(),
			$keys[1] => $this->getFecant(),
			$keys[2] => $this->getRefped(),
			$keys[3] => $this->getCodcli(),
			$keys[4] => $this->getDesant(),
			$keys[5] => $this->getTotant(),
			$keys[6] => $this->getTotxan(),
			$keys[7] => $this->getNumcue(),
			$keys[8] => $this->getCodtip(),
			$keys[9] => $this->getNumcom(),
			$keys[10] => $this->getResant(),
			$keys[11] => $this->getTipant(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaantcliPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroant($value);
				break;
			case 1:
				$this->setFecant($value);
				break;
			case 2:
				$this->setRefped($value);
				break;
			case 3:
				$this->setCodcli($value);
				break;
			case 4:
				$this->setDesant($value);
				break;
			case 5:
				$this->setTotant($value);
				break;
			case 6:
				$this->setTotxan($value);
				break;
			case 7:
				$this->setNumcue($value);
				break;
			case 8:
				$this->setCodtip($value);
				break;
			case 9:
				$this->setNumcom($value);
				break;
			case 10:
				$this->setResant($value);
				break;
			case 11:
				$this->setTipant($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaantcliPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroant($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecant($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefped($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcli($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesant($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotant($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotxan($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumcue($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodtip($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumcom($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setResant($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipant($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaantcliPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaantcliPeer::NROANT)) $criteria->add(FaantcliPeer::NROANT, $this->nroant);
		if ($this->isColumnModified(FaantcliPeer::FECANT)) $criteria->add(FaantcliPeer::FECANT, $this->fecant);
		if ($this->isColumnModified(FaantcliPeer::REFPED)) $criteria->add(FaantcliPeer::REFPED, $this->refped);
		if ($this->isColumnModified(FaantcliPeer::CODCLI)) $criteria->add(FaantcliPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(FaantcliPeer::DESANT)) $criteria->add(FaantcliPeer::DESANT, $this->desant);
		if ($this->isColumnModified(FaantcliPeer::TOTANT)) $criteria->add(FaantcliPeer::TOTANT, $this->totant);
		if ($this->isColumnModified(FaantcliPeer::TOTXAN)) $criteria->add(FaantcliPeer::TOTXAN, $this->totxan);
		if ($this->isColumnModified(FaantcliPeer::NUMCUE)) $criteria->add(FaantcliPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(FaantcliPeer::CODTIP)) $criteria->add(FaantcliPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(FaantcliPeer::NUMCOM)) $criteria->add(FaantcliPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(FaantcliPeer::RESANT)) $criteria->add(FaantcliPeer::RESANT, $this->resant);
		if ($this->isColumnModified(FaantcliPeer::TIPANT)) $criteria->add(FaantcliPeer::TIPANT, $this->tipant);
		if ($this->isColumnModified(FaantcliPeer::ID)) $criteria->add(FaantcliPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaantcliPeer::DATABASE_NAME);

		$criteria->add(FaantcliPeer::ID, $this->id);

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

		$copyObj->setNroant($this->nroant);

		$copyObj->setFecant($this->fecant);

		$copyObj->setRefped($this->refped);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setDesant($this->desant);

		$copyObj->setTotant($this->totant);

		$copyObj->setTotxan($this->totxan);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setResant($this->resant);

		$copyObj->setTipant($this->tipant);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFadetants() as $relObj) {
				$copyObj->addFadetant($relObj->copy($deepCopy));
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
			self::$peer = new FaantcliPeer();
		}
		return self::$peer;
	}

	
	public function setTsdefban($v)
	{


		if ($v === null) {
			$this->setNumcue(NULL);
		} else {
			$this->setNumcue($v->getNumcue());
		}


		$this->aTsdefban = $v;
	}


	
	public function getTsdefban($con = null)
	{
		if ($this->aTsdefban === null && (($this->numcue !== "" && $this->numcue !== null))) {
						include_once 'lib/model/om/BaseTsdefbanPeer.php';

      $c = new Criteria();
      $c->add(TsdefbanPeer::NUMCUE,$this->numcue);
      
			$this->aTsdefban = TsdefbanPeer::doSelectOne($c, $con);

			
		}
		return $this->aTsdefban;
	}

	
	public function setTstipmov($v)
	{


		if ($v === null) {
			$this->setCodtip(NULL);
		} else {
			$this->setCodtip($v->getCodtip());
		}


		$this->aTstipmov = $v;
	}


	
	public function getTstipmov($con = null)
	{
		if ($this->aTstipmov === null && (($this->codtip !== "" && $this->codtip !== null))) {
						include_once 'lib/model/om/BaseTstipmovPeer.php';

      $c = new Criteria();
      $c->add(TstipmovPeer::CODTIP,$this->codtip);
      
			$this->aTstipmov = TstipmovPeer::doSelectOne($c, $con);

			
		}
		return $this->aTstipmov;
	}

	
	public function initFadetants()
	{
		if ($this->collFadetants === null) {
			$this->collFadetants = array();
		}
	}

	
	public function getFadetants($criteria = null, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadetantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFadetants === null) {
			if ($this->isNew()) {
			   $this->collFadetants = array();
			} else {

				$criteria->add(FadetantPeer::NROANT, $this->getNroant());

				FadetantPeer::addSelectColumns($criteria);
				$this->collFadetants = FadetantPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FadetantPeer::NROANT, $this->getNroant());

				FadetantPeer::addSelectColumns($criteria);
				if (!isset($this->lastFadetantCriteria) || !$this->lastFadetantCriteria->equals($criteria)) {
					$this->collFadetants = FadetantPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFadetantCriteria = $criteria;
		return $this->collFadetants;
	}

	
	public function countFadetants($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/facturacion/om/BaseFadetantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FadetantPeer::NROANT, $this->getNroant());

		return FadetantPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFadetant(Fadetant $l)
	{
		$this->collFadetants[] = $l;
		$l->setFaantcli($this);
	}

} 