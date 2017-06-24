<?php


abstract class BaseLiregforpagcont extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcont;


	
	protected $desant;


	
	protected $porant;


	
	protected $montot;


	
	protected $monrec;


	
	protected $subtot;


	
	protected $poramoant;


	
	protected $netpag;


	
	protected $fecant;


	
	protected $condic;


	
	protected $tipconpub;


	
	protected $numord;


	
	protected $numche;


	
	protected $feccom;


	
	protected $feccau;


	
	protected $fecpag;


	
	protected $liforpag_id;


	
	protected $numval;


	
	protected $id;

	
	protected $aLicontrat;

	
	protected $aLiforpag;

	
	protected $collLiregforpagmodconts;

	
	protected $lastLiregforpagmodcontCriteria = null;

	
	protected $collLiregforpagaddconts;

	
	protected $lastLiregforpagaddcontCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcont()
  {

    return trim($this->numcont);

  }
  
  public function getDesant()
  {

    return trim($this->desant);

  }
  
  public function getPorant($val=false)
  {

    if($val) return number_format($this->porant,2,',','.');
    else return $this->porant;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getMonrec($val=false)
  {

    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
  public function getSubtot($val=false)
  {

    if($val) return number_format($this->subtot,2,',','.');
    else return $this->subtot;

  }
  
  public function getPoramoant($val=false)
  {

    if($val) return number_format($this->poramoant,2,',','.');
    else return $this->poramoant;

  }
  
  public function getNetpag($val=false)
  {

    if($val) return number_format($this->netpag,2,',','.');
    else return $this->netpag;

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

  
  public function getCondic()
  {

    return trim($this->condic);

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getNumche()
  {

    return trim($this->numche);

  }
  
  public function getFeccom($format = 'Y-m-d')
  {

    if ($this->feccom === null || $this->feccom === '') {
      return null;
    } elseif (!is_int($this->feccom)) {
            $ts = adodb_strtotime($this->feccom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
      }
    } else {
      $ts = $this->feccom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccau($format = 'Y-m-d')
  {

    if ($this->feccau === null || $this->feccau === '') {
      return null;
    } elseif (!is_int($this->feccau)) {
            $ts = adodb_strtotime($this->feccau);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccau] as date/time value: " . var_export($this->feccau, true));
      }
    } else {
      $ts = $this->feccau;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecpag($format = 'Y-m-d')
  {

    if ($this->fecpag === null || $this->fecpag === '') {
      return null;
    } elseif (!is_int($this->fecpag)) {
            $ts = adodb_strtotime($this->fecpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
      }
    } else {
      $ts = $this->fecpag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getLiforpagId()
  {

    return $this->liforpag_id;

  }
  
  public function getNumval()
  {

    return $this->numval;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcont($v)
	{

    if ($this->numcont !== $v) {
        $this->numcont = $v;
        $this->modifiedColumns[] = LiregforpagcontPeer::NUMCONT;
      }
  
		if ($this->aLicontrat !== null && $this->aLicontrat->getNumcont() !== $v) {
			$this->aLicontrat = null;
		}

	} 
	
	public function setDesant($v)
	{

    if ($this->desant !== $v) {
        $this->desant = $v;
        $this->modifiedColumns[] = LiregforpagcontPeer::DESANT;
      }
  
	} 
	
	public function setPorant($v)
	{

    if ($this->porant !== $v) {
        $this->porant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregforpagcontPeer::PORANT;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregforpagcontPeer::MONTOT;
      }
  
	} 
	
	public function setMonrec($v)
	{

    if ($this->monrec !== $v) {
        $this->monrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregforpagcontPeer::MONREC;
      }
  
	} 
	
	public function setSubtot($v)
	{

    if ($this->subtot !== $v) {
        $this->subtot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregforpagcontPeer::SUBTOT;
      }
  
	} 
	
	public function setPoramoant($v)
	{

    if ($this->poramoant !== $v) {
        $this->poramoant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregforpagcontPeer::PORAMOANT;
      }
  
	} 
	
	public function setNetpag($v)
	{

    if ($this->netpag !== $v) {
        $this->netpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiregforpagcontPeer::NETPAG;
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
      $this->modifiedColumns[] = LiregforpagcontPeer::FECANT;
    }

	} 
	
	public function setCondic($v)
	{

    if ($this->condic !== $v) {
        $this->condic = $v;
        $this->modifiedColumns[] = LiregforpagcontPeer::CONDIC;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LiregforpagcontPeer::TIPCONPUB;
      }
  
	} 
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = LiregforpagcontPeer::NUMORD;
      }
  
	} 
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = LiregforpagcontPeer::NUMCHE;
      }
  
	} 
	
	public function setFeccom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccom !== $ts) {
      $this->feccom = $ts;
      $this->modifiedColumns[] = LiregforpagcontPeer::FECCOM;
    }

	} 
	
	public function setFeccau($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccau] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccau !== $ts) {
      $this->feccau = $ts;
      $this->modifiedColumns[] = LiregforpagcontPeer::FECCAU;
    }

	} 
	
	public function setFecpag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = LiregforpagcontPeer::FECPAG;
    }

	} 
	
	public function setLiforpagId($v)
	{

    if ($this->liforpag_id !== $v) {
        $this->liforpag_id = $v;
        $this->modifiedColumns[] = LiregforpagcontPeer::LIFORPAG_ID;
      }
  
		if ($this->aLiforpag !== null && $this->aLiforpag->getId() !== $v) {
			$this->aLiforpag = null;
		}

	} 
	
	public function setNumval($v)
	{

    if ($this->numval !== $v) {
        $this->numval = $v;
        $this->modifiedColumns[] = LiregforpagcontPeer::NUMVAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiregforpagcontPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcont = $rs->getString($startcol + 0);

      $this->desant = $rs->getString($startcol + 1);

      $this->porant = $rs->getFloat($startcol + 2);

      $this->montot = $rs->getFloat($startcol + 3);

      $this->monrec = $rs->getFloat($startcol + 4);

      $this->subtot = $rs->getFloat($startcol + 5);

      $this->poramoant = $rs->getFloat($startcol + 6);

      $this->netpag = $rs->getFloat($startcol + 7);

      $this->fecant = $rs->getDate($startcol + 8, null);

      $this->condic = $rs->getString($startcol + 9);

      $this->tipconpub = $rs->getString($startcol + 10);

      $this->numord = $rs->getString($startcol + 11);

      $this->numche = $rs->getString($startcol + 12);

      $this->feccom = $rs->getDate($startcol + 13, null);

      $this->feccau = $rs->getDate($startcol + 14, null);

      $this->fecpag = $rs->getDate($startcol + 15, null);

      $this->liforpag_id = $rs->getInt($startcol + 16);

      $this->numval = $rs->getInt($startcol + 17);

      $this->id = $rs->getInt($startcol + 18);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 19; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liregforpagcont object", $e);
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
			$con = Propel::getConnection(LiregforpagcontPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiregforpagcontPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiregforpagcontPeer::DATABASE_NAME);
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

			if ($this->aLiforpag !== null) {
				if ($this->aLiforpag->isModified()) {
					$affectedRows += $this->aLiforpag->save($con);
				}
				$this->setLiforpag($this->aLiforpag);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiregforpagcontPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiregforpagcontPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiregforpagmodconts !== null) {
				foreach($this->collLiregforpagmodconts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiregforpagaddconts !== null) {
				foreach($this->collLiregforpagaddconts as $referrerFK) {
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

			if ($this->aLiforpag !== null) {
				if (!$this->aLiforpag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiforpag->getValidationFailures());
				}
			}


			if (($retval = LiregforpagcontPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiregforpagmodconts !== null) {
					foreach($this->collLiregforpagmodconts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiregforpagaddconts !== null) {
					foreach($this->collLiregforpagaddconts as $referrerFK) {
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
		$pos = LiregforpagcontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcont();
				break;
			case 1:
				return $this->getDesant();
				break;
			case 2:
				return $this->getPorant();
				break;
			case 3:
				return $this->getMontot();
				break;
			case 4:
				return $this->getMonrec();
				break;
			case 5:
				return $this->getSubtot();
				break;
			case 6:
				return $this->getPoramoant();
				break;
			case 7:
				return $this->getNetpag();
				break;
			case 8:
				return $this->getFecant();
				break;
			case 9:
				return $this->getCondic();
				break;
			case 10:
				return $this->getTipconpub();
				break;
			case 11:
				return $this->getNumord();
				break;
			case 12:
				return $this->getNumche();
				break;
			case 13:
				return $this->getFeccom();
				break;
			case 14:
				return $this->getFeccau();
				break;
			case 15:
				return $this->getFecpag();
				break;
			case 16:
				return $this->getLiforpagId();
				break;
			case 17:
				return $this->getNumval();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregforpagcontPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcont(),
			$keys[1] => $this->getDesant(),
			$keys[2] => $this->getPorant(),
			$keys[3] => $this->getMontot(),
			$keys[4] => $this->getMonrec(),
			$keys[5] => $this->getSubtot(),
			$keys[6] => $this->getPoramoant(),
			$keys[7] => $this->getNetpag(),
			$keys[8] => $this->getFecant(),
			$keys[9] => $this->getCondic(),
			$keys[10] => $this->getTipconpub(),
			$keys[11] => $this->getNumord(),
			$keys[12] => $this->getNumche(),
			$keys[13] => $this->getFeccom(),
			$keys[14] => $this->getFeccau(),
			$keys[15] => $this->getFecpag(),
			$keys[16] => $this->getLiforpagId(),
			$keys[17] => $this->getNumval(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiregforpagcontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcont($value);
				break;
			case 1:
				$this->setDesant($value);
				break;
			case 2:
				$this->setPorant($value);
				break;
			case 3:
				$this->setMontot($value);
				break;
			case 4:
				$this->setMonrec($value);
				break;
			case 5:
				$this->setSubtot($value);
				break;
			case 6:
				$this->setPoramoant($value);
				break;
			case 7:
				$this->setNetpag($value);
				break;
			case 8:
				$this->setFecant($value);
				break;
			case 9:
				$this->setCondic($value);
				break;
			case 10:
				$this->setTipconpub($value);
				break;
			case 11:
				$this->setNumord($value);
				break;
			case 12:
				$this->setNumche($value);
				break;
			case 13:
				$this->setFeccom($value);
				break;
			case 14:
				$this->setFeccau($value);
				break;
			case 15:
				$this->setFecpag($value);
				break;
			case 16:
				$this->setLiforpagId($value);
				break;
			case 17:
				$this->setNumval($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiregforpagcontPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcont($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesant($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPorant($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMontot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSubtot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPoramoant($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNetpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecant($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCondic($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipconpub($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNumord($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumche($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFeccom($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFeccau($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecpag($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setLiforpagId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNumval($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiregforpagcontPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiregforpagcontPeer::NUMCONT)) $criteria->add(LiregforpagcontPeer::NUMCONT, $this->numcont);
		if ($this->isColumnModified(LiregforpagcontPeer::DESANT)) $criteria->add(LiregforpagcontPeer::DESANT, $this->desant);
		if ($this->isColumnModified(LiregforpagcontPeer::PORANT)) $criteria->add(LiregforpagcontPeer::PORANT, $this->porant);
		if ($this->isColumnModified(LiregforpagcontPeer::MONTOT)) $criteria->add(LiregforpagcontPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(LiregforpagcontPeer::MONREC)) $criteria->add(LiregforpagcontPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(LiregforpagcontPeer::SUBTOT)) $criteria->add(LiregforpagcontPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(LiregforpagcontPeer::PORAMOANT)) $criteria->add(LiregforpagcontPeer::PORAMOANT, $this->poramoant);
		if ($this->isColumnModified(LiregforpagcontPeer::NETPAG)) $criteria->add(LiregforpagcontPeer::NETPAG, $this->netpag);
		if ($this->isColumnModified(LiregforpagcontPeer::FECANT)) $criteria->add(LiregforpagcontPeer::FECANT, $this->fecant);
		if ($this->isColumnModified(LiregforpagcontPeer::CONDIC)) $criteria->add(LiregforpagcontPeer::CONDIC, $this->condic);
		if ($this->isColumnModified(LiregforpagcontPeer::TIPCONPUB)) $criteria->add(LiregforpagcontPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LiregforpagcontPeer::NUMORD)) $criteria->add(LiregforpagcontPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(LiregforpagcontPeer::NUMCHE)) $criteria->add(LiregforpagcontPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(LiregforpagcontPeer::FECCOM)) $criteria->add(LiregforpagcontPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(LiregforpagcontPeer::FECCAU)) $criteria->add(LiregforpagcontPeer::FECCAU, $this->feccau);
		if ($this->isColumnModified(LiregforpagcontPeer::FECPAG)) $criteria->add(LiregforpagcontPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(LiregforpagcontPeer::LIFORPAG_ID)) $criteria->add(LiregforpagcontPeer::LIFORPAG_ID, $this->liforpag_id);
		if ($this->isColumnModified(LiregforpagcontPeer::NUMVAL)) $criteria->add(LiregforpagcontPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(LiregforpagcontPeer::ID)) $criteria->add(LiregforpagcontPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiregforpagcontPeer::DATABASE_NAME);

		$criteria->add(LiregforpagcontPeer::ID, $this->id);

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

		$copyObj->setDesant($this->desant);

		$copyObj->setPorant($this->porant);

		$copyObj->setMontot($this->montot);

		$copyObj->setMonrec($this->monrec);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setPoramoant($this->poramoant);

		$copyObj->setNetpag($this->netpag);

		$copyObj->setFecant($this->fecant);

		$copyObj->setCondic($this->condic);

		$copyObj->setTipconpub($this->tipconpub);

		$copyObj->setNumord($this->numord);

		$copyObj->setNumche($this->numche);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setFeccau($this->feccau);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setLiforpagId($this->liforpag_id);

		$copyObj->setNumval($this->numval);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiregforpagmodconts() as $relObj) {
				$copyObj->addLiregforpagmodcont($relObj->copy($deepCopy));
			}

			foreach($this->getLiregforpagaddconts() as $relObj) {
				$copyObj->addLiregforpagaddcont($relObj->copy($deepCopy));
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
			self::$peer = new LiregforpagcontPeer();
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

	
	public function setLiforpag($v)
	{


		if ($v === null) {
			$this->setLiforpagId(NULL);
		} else {
			$this->setLiforpagId($v->getId());
		}


		$this->aLiforpag = $v;
	}


	
	public function getLiforpag($con = null)
	{
		if ($this->aLiforpag === null && ($this->liforpag_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLiforpagPeer.php';

      $c = new Criteria();
      $c->add(LiforpagPeer::ID,$this->liforpag_id);
      
			$this->aLiforpag = LiforpagPeer::doSelectOne($c, $con);

			
		}
		return $this->aLiforpag;
	}

	
	public function initLiregforpagmodconts()
	{
		if ($this->collLiregforpagmodconts === null) {
			$this->collLiregforpagmodconts = array();
		}
	}

	
	public function getLiregforpagmodconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregforpagmodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregforpagmodconts === null) {
			if ($this->isNew()) {
			   $this->collLiregforpagmodconts = array();
			} else {

				$criteria->add(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, $this->getId());

				LiregforpagmodcontPeer::addSelectColumns($criteria);
				$this->collLiregforpagmodconts = LiregforpagmodcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, $this->getId());

				LiregforpagmodcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregforpagmodcontCriteria) || !$this->lastLiregforpagmodcontCriteria->equals($criteria)) {
					$this->collLiregforpagmodconts = LiregforpagmodcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregforpagmodcontCriteria = $criteria;
		return $this->collLiregforpagmodconts;
	}

	
	public function countLiregforpagmodconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregforpagmodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, $this->getId());

		return LiregforpagmodcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregforpagmodcont(Liregforpagmodcont $l)
	{
		$this->collLiregforpagmodconts[] = $l;
		$l->setLiregforpagcont($this);
	}


	
	public function getLiregforpagmodcontsJoinLimodcont($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregforpagmodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregforpagmodconts === null) {
			if ($this->isNew()) {
				$this->collLiregforpagmodconts = array();
			} else {

				$criteria->add(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, $this->getId());

				$this->collLiregforpagmodconts = LiregforpagmodcontPeer::doSelectJoinLimodcont($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregforpagmodcontPeer::LIREGFORPAGCONT_ID, $this->getId());

			if (!isset($this->lastLiregforpagmodcontCriteria) || !$this->lastLiregforpagmodcontCriteria->equals($criteria)) {
				$this->collLiregforpagmodconts = LiregforpagmodcontPeer::doSelectJoinLimodcont($criteria, $con);
			}
		}
		$this->lastLiregforpagmodcontCriteria = $criteria;

		return $this->collLiregforpagmodconts;
	}

	
	public function initLiregforpagaddconts()
	{
		if ($this->collLiregforpagaddconts === null) {
			$this->collLiregforpagaddconts = array();
		}
	}

	
	public function getLiregforpagaddconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregforpagaddcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregforpagaddconts === null) {
			if ($this->isNew()) {
			   $this->collLiregforpagaddconts = array();
			} else {

				$criteria->add(LiregforpagaddcontPeer::LIREGFORPAGCONT_ID, $this->getId());

				LiregforpagaddcontPeer::addSelectColumns($criteria);
				$this->collLiregforpagaddconts = LiregforpagaddcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregforpagaddcontPeer::LIREGFORPAGCONT_ID, $this->getId());

				LiregforpagaddcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregforpagaddcontCriteria) || !$this->lastLiregforpagaddcontCriteria->equals($criteria)) {
					$this->collLiregforpagaddconts = LiregforpagaddcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregforpagaddcontCriteria = $criteria;
		return $this->collLiregforpagaddconts;
	}

	
	public function countLiregforpagaddconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregforpagaddcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregforpagaddcontPeer::LIREGFORPAGCONT_ID, $this->getId());

		return LiregforpagaddcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregforpagaddcont(Liregforpagaddcont $l)
	{
		$this->collLiregforpagaddconts[] = $l;
		$l->setLiregforpagcont($this);
	}


	
	public function getLiregforpagaddcontsJoinLiaddendum($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregforpagaddcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregforpagaddconts === null) {
			if ($this->isNew()) {
				$this->collLiregforpagaddconts = array();
			} else {

				$criteria->add(LiregforpagaddcontPeer::LIREGFORPAGCONT_ID, $this->getId());

				$this->collLiregforpagaddconts = LiregforpagaddcontPeer::doSelectJoinLiaddendum($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregforpagaddcontPeer::LIREGFORPAGCONT_ID, $this->getId());

			if (!isset($this->lastLiregforpagaddcontCriteria) || !$this->lastLiregforpagaddcontCriteria->equals($criteria)) {
				$this->collLiregforpagaddconts = LiregforpagaddcontPeer::doSelectJoinLiaddendum($criteria, $con);
			}
		}
		$this->lastLiregforpagaddcontCriteria = $criteria;

		return $this->collLiregforpagaddconts;
	}

} 