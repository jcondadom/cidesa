<?php


abstract class BaseLipenalizaciones extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpen;


	
	protected $numcont;


	
	protected $detpen;


	
	protected $codtippen;


	
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

	
	protected $aLitippen;

	
	protected $aLidatstedetRelatedByCodempadm;

	
	protected $aLidatstedetRelatedByCodempeje;

	
	protected $aLisicact;

	
	protected $collLidetactpens;

	
	protected $lastLidetactpenCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpen()
  {

    return trim($this->numpen);

  }
  
  public function getNumcont()
  {

    return trim($this->numcont);

  }
  
  public function getDetpen()
  {

    return trim($this->detpen);

  }
  
  public function getCodtippen()
  {

    return $this->codtippen;

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
	
	public function setNumpen($v)
	{

    if ($this->numpen !== $v) {
        $this->numpen = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::NUMPEN;
      }
  
	} 
	
	public function setNumcont($v)
	{

    if ($this->numcont !== $v) {
        $this->numcont = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::NUMCONT;
      }
  
		if ($this->aLicontrat !== null && $this->aLicontrat->getNumcont() !== $v) {
			$this->aLicontrat = null;
		}

	} 
	
	public function setDetpen($v)
	{

    if ($this->detpen !== $v) {
        $this->detpen = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::DETPEN;
      }
  
	} 
	
	public function setCodtippen($v)
	{

    if ($this->codtippen !== $v) {
        $this->codtippen = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::CODTIPPEN;
      }
  
		if ($this->aLitippen !== null && $this->aLitippen->getCodtippen() !== $v) {
			$this->aLitippen = null;
		}

	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::CODEMPADM;
      }
  
		if ($this->aLidatstedetRelatedByCodempadm !== null && $this->aLidatstedetRelatedByCodempadm->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempadm = null;
		}

	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::CODEMPEJE;
      }
  
		if ($this->aLidatstedetRelatedByCodempeje !== null && $this->aLidatstedetRelatedByCodempeje->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempeje = null;
		}

	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::CODUNISTE;
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
      $this->modifiedColumns[] = LipenalizacionesPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::DIAS;
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
      $this->modifiedColumns[] = LipenalizacionesPeer::FECVEN;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::STATUS;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::PREPOR;
      }
  
	} 
	
	public function setPreporcar($v)
	{

    if ($this->preporcar !== $v) {
        $this->preporcar = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::PREPORCAR;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::LISICACT_ID;
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
      $this->modifiedColumns[] = LipenalizacionesPeer::FECDECLA;
    }

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::ANAPOR;
      }
  
	} 
	
	public function setAnaporcar($v)
	{

    if ($this->anaporcar !== $v) {
        $this->anaporcar = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::ANAPORCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LipenalizacionesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpen = $rs->getString($startcol + 0);

      $this->numcont = $rs->getString($startcol + 1);

      $this->detpen = $rs->getString($startcol + 2);

      $this->codtippen = $rs->getInt($startcol + 3);

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
      throw new PropelException("Error populating Lipenalizaciones object", $e);
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
			$con = Propel::getConnection(LipenalizacionesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LipenalizacionesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LipenalizacionesPeer::DATABASE_NAME);
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

			if ($this->aLitippen !== null) {
				if ($this->aLitippen->isModified()) {
					$affectedRows += $this->aLitippen->save($con);
				}
				$this->setLitippen($this->aLitippen);
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
					$pk = LipenalizacionesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LipenalizacionesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLidetactpens !== null) {
				foreach($this->collLidetactpens as $referrerFK) {
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

			if ($this->aLitippen !== null) {
				if (!$this->aLitippen->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLitippen->getValidationFailures());
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


			if (($retval = LipenalizacionesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLidetactpens !== null) {
					foreach($this->collLidetactpens as $referrerFK) {
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
		$pos = LipenalizacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpen();
				break;
			case 1:
				return $this->getNumcont();
				break;
			case 2:
				return $this->getDetpen();
				break;
			case 3:
				return $this->getCodtippen();
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
		$keys = LipenalizacionesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpen(),
			$keys[1] => $this->getNumcont(),
			$keys[2] => $this->getDetpen(),
			$keys[3] => $this->getCodtippen(),
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
		$pos = LipenalizacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpen($value);
				break;
			case 1:
				$this->setNumcont($value);
				break;
			case 2:
				$this->setDetpen($value);
				break;
			case 3:
				$this->setCodtippen($value);
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
		$keys = LipenalizacionesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpen($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcont($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDetpen($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtippen($arr[$keys[3]]);
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
		$criteria = new Criteria(LipenalizacionesPeer::DATABASE_NAME);

		if ($this->isColumnModified(LipenalizacionesPeer::NUMPEN)) $criteria->add(LipenalizacionesPeer::NUMPEN, $this->numpen);
		if ($this->isColumnModified(LipenalizacionesPeer::NUMCONT)) $criteria->add(LipenalizacionesPeer::NUMCONT, $this->numcont);
		if ($this->isColumnModified(LipenalizacionesPeer::DETPEN)) $criteria->add(LipenalizacionesPeer::DETPEN, $this->detpen);
		if ($this->isColumnModified(LipenalizacionesPeer::CODTIPPEN)) $criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->codtippen);
		if ($this->isColumnModified(LipenalizacionesPeer::CODEMPADM)) $criteria->add(LipenalizacionesPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LipenalizacionesPeer::CODUNIADM)) $criteria->add(LipenalizacionesPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LipenalizacionesPeer::CODEMPEJE)) $criteria->add(LipenalizacionesPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LipenalizacionesPeer::CODUNISTE)) $criteria->add(LipenalizacionesPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LipenalizacionesPeer::FECREG)) $criteria->add(LipenalizacionesPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LipenalizacionesPeer::DIAS)) $criteria->add(LipenalizacionesPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LipenalizacionesPeer::FECVEN)) $criteria->add(LipenalizacionesPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LipenalizacionesPeer::STATUS)) $criteria->add(LipenalizacionesPeer::STATUS, $this->status);
		if ($this->isColumnModified(LipenalizacionesPeer::DOCANE1)) $criteria->add(LipenalizacionesPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LipenalizacionesPeer::DOCANE2)) $criteria->add(LipenalizacionesPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LipenalizacionesPeer::DOCANE3)) $criteria->add(LipenalizacionesPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LipenalizacionesPeer::PREPOR)) $criteria->add(LipenalizacionesPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LipenalizacionesPeer::PREPORCAR)) $criteria->add(LipenalizacionesPeer::PREPORCAR, $this->preporcar);
		if ($this->isColumnModified(LipenalizacionesPeer::LISICACT_ID)) $criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LipenalizacionesPeer::FECDECLA)) $criteria->add(LipenalizacionesPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LipenalizacionesPeer::DETDECMOD)) $criteria->add(LipenalizacionesPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LipenalizacionesPeer::ANAPOR)) $criteria->add(LipenalizacionesPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LipenalizacionesPeer::ANAPORCAR)) $criteria->add(LipenalizacionesPeer::ANAPORCAR, $this->anaporcar);
		if ($this->isColumnModified(LipenalizacionesPeer::ID)) $criteria->add(LipenalizacionesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LipenalizacionesPeer::DATABASE_NAME);

		$criteria->add(LipenalizacionesPeer::ID, $this->id);

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

		$copyObj->setNumpen($this->numpen);

		$copyObj->setNumcont($this->numcont);

		$copyObj->setDetpen($this->detpen);

		$copyObj->setCodtippen($this->codtippen);

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

			foreach($this->getLidetactpens() as $relObj) {
				$copyObj->addLidetactpen($relObj->copy($deepCopy));
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
			self::$peer = new LipenalizacionesPeer();
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

	
	public function setLitippen($v)
	{


		if ($v === null) {
			$this->setCodtippen(NULL);
		} else {
			$this->setCodtippen($v->getCodtippen());
		}


		$this->aLitippen = $v;
	}


	
	public function getLitippen($con = null)
	{
		if ($this->aLitippen === null && ($this->codtippen !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLitippenPeer.php';

      $c = new Criteria();
      $c->add(LitippenPeer::CODTIPPEN,$this->codtippen);
      
			$this->aLitippen = LitippenPeer::doSelectOne($c, $con);

			
		}
		return $this->aLitippen;
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

	
	public function initLidetactpens()
	{
		if ($this->collLidetactpens === null) {
			$this->collLidetactpens = array();
		}
	}

	
	public function getLidetactpens($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactpenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactpens === null) {
			if ($this->isNew()) {
			   $this->collLidetactpens = array();
			} else {

				$criteria->add(LidetactpenPeer::NUMPEN, $this->getNumpen());

				LidetactpenPeer::addSelectColumns($criteria);
				$this->collLidetactpens = LidetactpenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactpenPeer::NUMPEN, $this->getNumpen());

				LidetactpenPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetactpenCriteria) || !$this->lastLidetactpenCriteria->equals($criteria)) {
					$this->collLidetactpens = LidetactpenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetactpenCriteria = $criteria;
		return $this->collLidetactpens;
	}

	
	public function countLidetactpens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactpenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetactpenPeer::NUMPEN, $this->getNumpen());

		return LidetactpenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactpen(Lidetactpen $l)
	{
		$this->collLidetactpens[] = $l;
		$l->setLipenalizaciones($this);
	}


	
	public function getLidetactpensJoinLiactas($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactpenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactpens === null) {
			if ($this->isNew()) {
				$this->collLidetactpens = array();
			} else {

				$criteria->add(LidetactpenPeer::NUMPEN, $this->getNumpen());

				$this->collLidetactpens = LidetactpenPeer::doSelectJoinLiactas($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactpenPeer::NUMPEN, $this->getNumpen());

			if (!isset($this->lastLidetactpenCriteria) || !$this->lastLidetactpenCriteria->equals($criteria)) {
				$this->collLidetactpens = LidetactpenPeer::doSelectJoinLiactas($criteria, $con);
			}
		}
		$this->lastLidetactpenCriteria = $criteria;

		return $this->collLidetactpens;
	}

} 