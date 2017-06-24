<?php


abstract class BaseLisolpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsolpag;


	
	protected $numcont;


	
	protected $numval;


	
	protected $obssolpag;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $status;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $prepor;


	
	protected $preporcar;


	
	protected $lisicact_id;


	
	protected $fecdecla;


	
	protected $detdecmod;


	
	protected $anapor;


	
	protected $anaporcar;


	
	protected $id;

	
	protected $aLicontrat;

	
	protected $aLivaluaciones;

	
	protected $aLidatstedetRelatedByCodempadm;

	
	protected $aLidatstedetRelatedByCodempeje;

	
	protected $aLisicact;

	
	protected $collLidetactcroents;

	
	protected $lastLidetactcroentCriteria = null;

	
	protected $collLidetactsolpags;

	
	protected $lastLidetactsolpagCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsolpag()
  {

    return trim($this->numsolpag);

  }
  
  public function getNumcont()
  {

    return trim($this->numcont);

  }
  
  public function getNumval()
  {

    return trim($this->numval);

  }
  
  public function getObssolpag()
  {

    return trim($this->obssolpag);

  }
  
  public function getCodempadm()
  {

    return trim($this->codempadm);

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getCodempeje()
  {

    return trim($this->codempeje);

  }
  
  public function getCoduniste()
  {

    return trim($this->coduniste);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDias()
  {

    return $this->dias;

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

  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getDocane1()
  {

    return trim($this->docane1);

  }
  
  public function getDocane2()
  {

    return trim($this->docane2);

  }
  
  public function getDocane3()
  {

    return trim($this->docane3);

  }
  
  public function getPrepor()
  {

    return trim($this->prepor);

  }
  
  public function getPreporcar()
  {

    return trim($this->preporcar);

  }
  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getFecdecla($format = 'Y-m-d')
  {

    if ($this->fecdecla === null || $this->fecdecla === '') {
      return null;
    } elseif (!is_int($this->fecdecla)) {
            $ts = adodb_strtotime($this->fecdecla);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdecla] as date/time value: " . var_export($this->fecdecla, true));
      }
    } else {
      $ts = $this->fecdecla;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDetdecmod()
  {

    return trim($this->detdecmod);

  }
  
  public function getAnapor()
  {

    return trim($this->anapor);

  }
  
  public function getAnaporcar()
  {

    return trim($this->anaporcar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsolpag($v)
	{

    if ($this->numsolpag !== $v) {
        $this->numsolpag = $v;
        $this->modifiedColumns[] = LisolpagPeer::NUMSOLPAG;
      }
  
	} 
	
	public function setNumcont($v)
	{

    if ($this->numcont !== $v) {
        $this->numcont = $v;
        $this->modifiedColumns[] = LisolpagPeer::NUMCONT;
      }
  
		if ($this->aLicontrat !== null && $this->aLicontrat->getNumcont() !== $v) {
			$this->aLicontrat = null;
		}

	} 
	
	public function setNumval($v)
	{

    if ($this->numval !== $v) {
        $this->numval = $v;
        $this->modifiedColumns[] = LisolpagPeer::NUMVAL;
      }
  
		if ($this->aLivaluaciones !== null && $this->aLivaluaciones->getNumval() !== $v) {
			$this->aLivaluaciones = null;
		}

	} 
	
	public function setObssolpag($v)
	{

    if ($this->obssolpag !== $v) {
        $this->obssolpag = $v;
        $this->modifiedColumns[] = LisolpagPeer::OBSSOLPAG;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LisolpagPeer::CODEMPADM;
      }
  
		if ($this->aLidatstedetRelatedByCodempadm !== null && $this->aLidatstedetRelatedByCodempadm->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempadm = null;
		}

	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LisolpagPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LisolpagPeer::CODEMPEJE;
      }
  
		if ($this->aLidatstedetRelatedByCodempeje !== null && $this->aLidatstedetRelatedByCodempeje->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempeje = null;
		}

	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LisolpagPeer::CODUNISTE;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = LisolpagPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LisolpagPeer::DIAS;
      }
  
	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = LisolpagPeer::FECVEN;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LisolpagPeer::STATUS;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LisolpagPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LisolpagPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LisolpagPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LisolpagPeer::PREPOR;
      }
  
	} 
	
	public function setPreporcar($v)
	{

    if ($this->preporcar !== $v) {
        $this->preporcar = $v;
        $this->modifiedColumns[] = LisolpagPeer::PREPORCAR;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LisolpagPeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setFecdecla($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdecla] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdecla !== $ts) {
      $this->fecdecla = $ts;
      $this->modifiedColumns[] = LisolpagPeer::FECDECLA;
    }

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LisolpagPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LisolpagPeer::ANAPOR;
      }
  
	} 
	
	public function setAnaporcar($v)
	{

    if ($this->anaporcar !== $v) {
        $this->anaporcar = $v;
        $this->modifiedColumns[] = LisolpagPeer::ANAPORCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LisolpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsolpag = $rs->getString($startcol + 0);

      $this->numcont = $rs->getString($startcol + 1);

      $this->numval = $rs->getString($startcol + 2);

      $this->obssolpag = $rs->getString($startcol + 3);

      $this->codempadm = $rs->getString($startcol + 4);

      $this->coduniadm = $rs->getString($startcol + 5);

      $this->codempeje = $rs->getString($startcol + 6);

      $this->coduniste = $rs->getString($startcol + 7);

      $this->fecreg = $rs->getDate($startcol + 8, null);

      $this->dias = $rs->getInt($startcol + 9);

      $this->fecven = $rs->getDate($startcol + 10, null);

      $this->status = $rs->getString($startcol + 11);

      $this->docane1 = $rs->getString($startcol + 12);

      $this->docane2 = $rs->getString($startcol + 13);

      $this->docane3 = $rs->getString($startcol + 14);

      $this->prepor = $rs->getString($startcol + 15);

      $this->preporcar = $rs->getString($startcol + 16);

      $this->lisicact_id = $rs->getInt($startcol + 17);

      $this->fecdecla = $rs->getDate($startcol + 18, null);

      $this->detdecmod = $rs->getString($startcol + 19);

      $this->anapor = $rs->getString($startcol + 20);

      $this->anaporcar = $rs->getString($startcol + 21);

      $this->id = $rs->getInt($startcol + 22);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 23; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lisolpag object", $e);
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
			$con = Propel::getConnection(LisolpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LisolpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LisolpagPeer::DATABASE_NAME);
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

			if ($this->aLivaluaciones !== null) {
				if ($this->aLivaluaciones->isModified()) {
					$affectedRows += $this->aLivaluaciones->save($con);
				}
				$this->setLivaluaciones($this->aLivaluaciones);
			}

			if ($this->aLidatstedetRelatedByCodempadm !== null) {
				if ($this->aLidatstedetRelatedByCodempadm->isModified()) {
					$affectedRows += $this->aLidatstedetRelatedByCodempadm->save($con);
				}
				$this->setLidatstedetRelatedByCodempadm($this->aLidatstedetRelatedByCodempadm);
			}

			if ($this->aLidatstedetRelatedByCodempeje !== null) {
				if ($this->aLidatstedetRelatedByCodempeje->isModified()) {
					$affectedRows += $this->aLidatstedetRelatedByCodempeje->save($con);
				}
				$this->setLidatstedetRelatedByCodempeje($this->aLidatstedetRelatedByCodempeje);
			}

			if ($this->aLisicact !== null) {
				if ($this->aLisicact->isModified()) {
					$affectedRows += $this->aLisicact->save($con);
				}
				$this->setLisicact($this->aLisicact);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LisolpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LisolpagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLidetactcroents !== null) {
				foreach($this->collLidetactcroents as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLidetactsolpags !== null) {
				foreach($this->collLidetactsolpags as $referrerFK) {
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

			if ($this->aLivaluaciones !== null) {
				if (!$this->aLivaluaciones->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLivaluaciones->getValidationFailures());
				}
			}

			if ($this->aLidatstedetRelatedByCodempadm !== null) {
				if (!$this->aLidatstedetRelatedByCodempadm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLidatstedetRelatedByCodempadm->getValidationFailures());
				}
			}

			if ($this->aLidatstedetRelatedByCodempeje !== null) {
				if (!$this->aLidatstedetRelatedByCodempeje->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLidatstedetRelatedByCodempeje->getValidationFailures());
				}
			}

			if ($this->aLisicact !== null) {
				if (!$this->aLisicact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLisicact->getValidationFailures());
				}
			}


			if (($retval = LisolpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLidetactcroents !== null) {
					foreach($this->collLidetactcroents as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLidetactsolpags !== null) {
					foreach($this->collLidetactsolpags as $referrerFK) {
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
		$pos = LisolpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsolpag();
				break;
			case 1:
				return $this->getNumcont();
				break;
			case 2:
				return $this->getNumval();
				break;
			case 3:
				return $this->getObssolpag();
				break;
			case 4:
				return $this->getCodempadm();
				break;
			case 5:
				return $this->getCoduniadm();
				break;
			case 6:
				return $this->getCodempeje();
				break;
			case 7:
				return $this->getCoduniste();
				break;
			case 8:
				return $this->getFecreg();
				break;
			case 9:
				return $this->getDias();
				break;
			case 10:
				return $this->getFecven();
				break;
			case 11:
				return $this->getStatus();
				break;
			case 12:
				return $this->getDocane1();
				break;
			case 13:
				return $this->getDocane2();
				break;
			case 14:
				return $this->getDocane3();
				break;
			case 15:
				return $this->getPrepor();
				break;
			case 16:
				return $this->getPreporcar();
				break;
			case 17:
				return $this->getLisicactId();
				break;
			case 18:
				return $this->getFecdecla();
				break;
			case 19:
				return $this->getDetdecmod();
				break;
			case 20:
				return $this->getAnapor();
				break;
			case 21:
				return $this->getAnaporcar();
				break;
			case 22:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LisolpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsolpag(),
			$keys[1] => $this->getNumcont(),
			$keys[2] => $this->getNumval(),
			$keys[3] => $this->getObssolpag(),
			$keys[4] => $this->getCodempadm(),
			$keys[5] => $this->getCoduniadm(),
			$keys[6] => $this->getCodempeje(),
			$keys[7] => $this->getCoduniste(),
			$keys[8] => $this->getFecreg(),
			$keys[9] => $this->getDias(),
			$keys[10] => $this->getFecven(),
			$keys[11] => $this->getStatus(),
			$keys[12] => $this->getDocane1(),
			$keys[13] => $this->getDocane2(),
			$keys[14] => $this->getDocane3(),
			$keys[15] => $this->getPrepor(),
			$keys[16] => $this->getPreporcar(),
			$keys[17] => $this->getLisicactId(),
			$keys[18] => $this->getFecdecla(),
			$keys[19] => $this->getDetdecmod(),
			$keys[20] => $this->getAnapor(),
			$keys[21] => $this->getAnaporcar(),
			$keys[22] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LisolpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsolpag($value);
				break;
			case 1:
				$this->setNumcont($value);
				break;
			case 2:
				$this->setNumval($value);
				break;
			case 3:
				$this->setObssolpag($value);
				break;
			case 4:
				$this->setCodempadm($value);
				break;
			case 5:
				$this->setCoduniadm($value);
				break;
			case 6:
				$this->setCodempeje($value);
				break;
			case 7:
				$this->setCoduniste($value);
				break;
			case 8:
				$this->setFecreg($value);
				break;
			case 9:
				$this->setDias($value);
				break;
			case 10:
				$this->setFecven($value);
				break;
			case 11:
				$this->setStatus($value);
				break;
			case 12:
				$this->setDocane1($value);
				break;
			case 13:
				$this->setDocane2($value);
				break;
			case 14:
				$this->setDocane3($value);
				break;
			case 15:
				$this->setPrepor($value);
				break;
			case 16:
				$this->setPreporcar($value);
				break;
			case 17:
				$this->setLisicactId($value);
				break;
			case 18:
				$this->setFecdecla($value);
				break;
			case 19:
				$this->setDetdecmod($value);
				break;
			case 20:
				$this->setAnapor($value);
				break;
			case 21:
				$this->setAnaporcar($value);
				break;
			case 22:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LisolpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsolpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcont($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumval($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObssolpag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodempadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCoduniadm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodempeje($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCoduniste($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecreg($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDias($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecven($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStatus($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDocane1($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDocane2($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDocane3($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setPrepor($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPreporcar($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setLisicactId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFecdecla($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDetdecmod($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setAnapor($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setAnaporcar($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setId($arr[$keys[22]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LisolpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(LisolpagPeer::NUMSOLPAG)) $criteria->add(LisolpagPeer::NUMSOLPAG, $this->numsolpag);
		if ($this->isColumnModified(LisolpagPeer::NUMCONT)) $criteria->add(LisolpagPeer::NUMCONT, $this->numcont);
		if ($this->isColumnModified(LisolpagPeer::NUMVAL)) $criteria->add(LisolpagPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(LisolpagPeer::OBSSOLPAG)) $criteria->add(LisolpagPeer::OBSSOLPAG, $this->obssolpag);
		if ($this->isColumnModified(LisolpagPeer::CODEMPADM)) $criteria->add(LisolpagPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LisolpagPeer::CODUNIADM)) $criteria->add(LisolpagPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LisolpagPeer::CODEMPEJE)) $criteria->add(LisolpagPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LisolpagPeer::CODUNISTE)) $criteria->add(LisolpagPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LisolpagPeer::FECREG)) $criteria->add(LisolpagPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LisolpagPeer::DIAS)) $criteria->add(LisolpagPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LisolpagPeer::FECVEN)) $criteria->add(LisolpagPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LisolpagPeer::STATUS)) $criteria->add(LisolpagPeer::STATUS, $this->status);
		if ($this->isColumnModified(LisolpagPeer::DOCANE1)) $criteria->add(LisolpagPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LisolpagPeer::DOCANE2)) $criteria->add(LisolpagPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LisolpagPeer::DOCANE3)) $criteria->add(LisolpagPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LisolpagPeer::PREPOR)) $criteria->add(LisolpagPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LisolpagPeer::PREPORCAR)) $criteria->add(LisolpagPeer::PREPORCAR, $this->preporcar);
		if ($this->isColumnModified(LisolpagPeer::LISICACT_ID)) $criteria->add(LisolpagPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LisolpagPeer::FECDECLA)) $criteria->add(LisolpagPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LisolpagPeer::DETDECMOD)) $criteria->add(LisolpagPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LisolpagPeer::ANAPOR)) $criteria->add(LisolpagPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LisolpagPeer::ANAPORCAR)) $criteria->add(LisolpagPeer::ANAPORCAR, $this->anaporcar);
		if ($this->isColumnModified(LisolpagPeer::ID)) $criteria->add(LisolpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LisolpagPeer::DATABASE_NAME);

		$criteria->add(LisolpagPeer::ID, $this->id);

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

		$copyObj->setNumsolpag($this->numsolpag);

		$copyObj->setNumcont($this->numcont);

		$copyObj->setNumval($this->numval);

		$copyObj->setObssolpag($this->obssolpag);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setStatus($this->status);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setPreporcar($this->preporcar);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setFecdecla($this->fecdecla);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setAnapor($this->anapor);

		$copyObj->setAnaporcar($this->anaporcar);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLidetactcroents() as $relObj) {
				$copyObj->addLidetactcroent($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactsolpags() as $relObj) {
				$copyObj->addLidetactsolpag($relObj->copy($deepCopy));
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
			self::$peer = new LisolpagPeer();
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

	
	public function setLivaluaciones($v)
	{


		if ($v === null) {
			$this->setNumval(NULL);
		} else {
			$this->setNumval($v->getNumval());
		}


		$this->aLivaluaciones = $v;
	}


	
	public function getLivaluaciones($con = null)
	{
		if ($this->aLivaluaciones === null && (($this->numval !== "" && $this->numval !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';

      $c = new Criteria();
      $c->add(LivaluacionesPeer::NUMVAL,$this->numval);
      
			$this->aLivaluaciones = LivaluacionesPeer::doSelectOne($c, $con);

			
		}
		return $this->aLivaluaciones;
	}

	
	public function setLidatstedetRelatedByCodempadm($v)
	{


		if ($v === null) {
			$this->setCodempadm(NULL);
		} else {
			$this->setCodempadm($v->getCodemp());
		}


		$this->aLidatstedetRelatedByCodempadm = $v;
	}


	
	public function getLidatstedetRelatedByCodempadm($con = null)
	{
		if ($this->aLidatstedetRelatedByCodempadm === null && (($this->codempadm !== "" && $this->codempadm !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLidatstedetPeer.php';

      $c = new Criteria();
      $c->add(LidatstedetPeer::CODEMP,$this->codempadm);
      
			$this->aLidatstedetRelatedByCodempadm = LidatstedetPeer::doSelectOne($c, $con);

			
		}
		return $this->aLidatstedetRelatedByCodempadm;
	}

	
	public function setLidatstedetRelatedByCodempeje($v)
	{


		if ($v === null) {
			$this->setCodempeje(NULL);
		} else {
			$this->setCodempeje($v->getCodemp());
		}


		$this->aLidatstedetRelatedByCodempeje = $v;
	}


	
	public function getLidatstedetRelatedByCodempeje($con = null)
	{
		if ($this->aLidatstedetRelatedByCodempeje === null && (($this->codempeje !== "" && $this->codempeje !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLidatstedetPeer.php';

      $c = new Criteria();
      $c->add(LidatstedetPeer::CODEMP,$this->codempeje);
      
			$this->aLidatstedetRelatedByCodempeje = LidatstedetPeer::doSelectOne($c, $con);

			
		}
		return $this->aLidatstedetRelatedByCodempeje;
	}

	
	public function setLisicact($v)
	{


		if ($v === null) {
			$this->setLisicactId(NULL);
		} else {
			$this->setLisicactId($v->getId());
		}


		$this->aLisicact = $v;
	}


	
	public function getLisicact($con = null)
	{
		if ($this->aLisicact === null && ($this->lisicact_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLisicactPeer.php';

      $c = new Criteria();
      $c->add(LisicactPeer::ID,$this->lisicact_id);
      
			$this->aLisicact = LisicactPeer::doSelectOne($c, $con);

			
		}
		return $this->aLisicact;
	}

	
	public function initLidetactcroents()
	{
		if ($this->collLidetactcroents === null) {
			$this->collLidetactcroents = array();
		}
	}

	
	public function getLidetactcroents($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactcroentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactcroents === null) {
			if ($this->isNew()) {
			   $this->collLidetactcroents = array();
			} else {

				$criteria->add(LidetactcroentPeer::NUMSOLPAG, $this->getNumsolpag());

				LidetactcroentPeer::addSelectColumns($criteria);
				$this->collLidetactcroents = LidetactcroentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactcroentPeer::NUMSOLPAG, $this->getNumsolpag());

				LidetactcroentPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetactcroentCriteria) || !$this->lastLidetactcroentCriteria->equals($criteria)) {
					$this->collLidetactcroents = LidetactcroentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetactcroentCriteria = $criteria;
		return $this->collLidetactcroents;
	}

	
	public function countLidetactcroents($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactcroentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetactcroentPeer::NUMSOLPAG, $this->getNumsolpag());

		return LidetactcroentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactcroent(Lidetactcroent $l)
	{
		$this->collLidetactcroents[] = $l;
		$l->setLisolpag($this);
	}


	
	public function getLidetactcroentsJoinLiactas($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactcroentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactcroents === null) {
			if ($this->isNew()) {
				$this->collLidetactcroents = array();
			} else {

				$criteria->add(LidetactcroentPeer::NUMSOLPAG, $this->getNumsolpag());

				$this->collLidetactcroents = LidetactcroentPeer::doSelectJoinLiactas($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactcroentPeer::NUMSOLPAG, $this->getNumsolpag());

			if (!isset($this->lastLidetactcroentCriteria) || !$this->lastLidetactcroentCriteria->equals($criteria)) {
				$this->collLidetactcroents = LidetactcroentPeer::doSelectJoinLiactas($criteria, $con);
			}
		}
		$this->lastLidetactcroentCriteria = $criteria;

		return $this->collLidetactcroents;
	}

	
	public function initLidetactsolpags()
	{
		if ($this->collLidetactsolpags === null) {
			$this->collLidetactsolpags = array();
		}
	}

	
	public function getLidetactsolpags($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactsolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactsolpags === null) {
			if ($this->isNew()) {
			   $this->collLidetactsolpags = array();
			} else {

				$criteria->add(LidetactsolpagPeer::NUMSOLPAG, $this->getNumsolpag());

				LidetactsolpagPeer::addSelectColumns($criteria);
				$this->collLidetactsolpags = LidetactsolpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactsolpagPeer::NUMSOLPAG, $this->getNumsolpag());

				LidetactsolpagPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetactsolpagCriteria) || !$this->lastLidetactsolpagCriteria->equals($criteria)) {
					$this->collLidetactsolpags = LidetactsolpagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetactsolpagCriteria = $criteria;
		return $this->collLidetactsolpags;
	}

	
	public function countLidetactsolpags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactsolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetactsolpagPeer::NUMSOLPAG, $this->getNumsolpag());

		return LidetactsolpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactsolpag(Lidetactsolpag $l)
	{
		$this->collLidetactsolpags[] = $l;
		$l->setLisolpag($this);
	}


	
	public function getLidetactsolpagsJoinLiactas($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactsolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactsolpags === null) {
			if ($this->isNew()) {
				$this->collLidetactsolpags = array();
			} else {

				$criteria->add(LidetactsolpagPeer::NUMSOLPAG, $this->getNumsolpag());

				$this->collLidetactsolpags = LidetactsolpagPeer::doSelectJoinLiactas($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactsolpagPeer::NUMSOLPAG, $this->getNumsolpag());

			if (!isset($this->lastLidetactsolpagCriteria) || !$this->lastLidetactsolpagCriteria->equals($criteria)) {
				$this->collLidetactsolpags = LidetactsolpagPeer::doSelectJoinLiactas($criteria, $con);
			}
		}
		$this->lastLidetactsolpagCriteria = $criteria;

		return $this->collLidetactsolpags;
	}

} 