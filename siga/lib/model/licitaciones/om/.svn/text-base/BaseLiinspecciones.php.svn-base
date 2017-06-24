<?php


abstract class BaseLiinspecciones extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numins;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $numval;


	
	protected $detins;


	
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

	
	protected $aLivaluaciones;

	
	protected $aLidatstedetRelatedByCodempadm;

	
	protected $aLidatstedetRelatedByCodempeje;

	
	protected $aLisicact;

	
	protected $collLidetparinss;

	
	protected $lastLidetparinsCriteria = null;

	
	protected $collLidetactinss;

	
	protected $lastLidetactinsCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumins()
  {

    return trim($this->numins);

  }
  
  public function getFecdes($format = 'Y-m-d')
  {

    if ($this->fecdes === null || $this->fecdes === '') {
      return null;
    } elseif (!is_int($this->fecdes)) {
            $ts = adodb_strtotime($this->fecdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
      }
    } else {
      $ts = $this->fecdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechas($format = 'Y-m-d')
  {

    if ($this->fechas === null || $this->fechas === '') {
      return null;
    } elseif (!is_int($this->fechas)) {
            $ts = adodb_strtotime($this->fechas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechas] as date/time value: " . var_export($this->fechas, true));
      }
    } else {
      $ts = $this->fechas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumval()
  {

    return trim($this->numval);

  }
  
  public function getDetins()
  {

    return trim($this->detins);

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
	
	public function setNumins($v)
	{

    if ($this->numins !== $v) {
        $this->numins = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::NUMINS;
      }
  
	} 
	
	public function setFecdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = LiinspeccionesPeer::FECDES;
    }

	} 
	
	public function setFechas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechas !== $ts) {
      $this->fechas = $ts;
      $this->modifiedColumns[] = LiinspeccionesPeer::FECHAS;
    }

	} 
	
	public function setNumval($v)
	{

    if ($this->numval !== $v) {
        $this->numval = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::NUMVAL;
      }
  
		if ($this->aLivaluaciones !== null && $this->aLivaluaciones->getNumval() !== $v) {
			$this->aLivaluaciones = null;
		}

	} 
	
	public function setDetins($v)
	{

    if ($this->detins !== $v) {
        $this->detins = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::DETINS;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::CODEMPADM;
      }
  
		if ($this->aLidatstedetRelatedByCodempadm !== null && $this->aLidatstedetRelatedByCodempadm->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempadm = null;
		}

	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::CODEMPEJE;
      }
  
		if ($this->aLidatstedetRelatedByCodempeje !== null && $this->aLidatstedetRelatedByCodempeje->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempeje = null;
		}

	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::CODUNISTE;
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
      $this->modifiedColumns[] = LiinspeccionesPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::DIAS;
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
      $this->modifiedColumns[] = LiinspeccionesPeer::FECVEN;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::STATUS;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::PREPOR;
      }
  
	} 
	
	public function setPreporcar($v)
	{

    if ($this->preporcar !== $v) {
        $this->preporcar = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::PREPORCAR;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::LISICACT_ID;
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
      $this->modifiedColumns[] = LiinspeccionesPeer::FECDECLA;
    }

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::ANAPOR;
      }
  
	} 
	
	public function setAnaporcar($v)
	{

    if ($this->anaporcar !== $v) {
        $this->anaporcar = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::ANAPORCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiinspeccionesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numins = $rs->getString($startcol + 0);

      $this->fecdes = $rs->getDate($startcol + 1, null);

      $this->fechas = $rs->getDate($startcol + 2, null);

      $this->numval = $rs->getString($startcol + 3);

      $this->detins = $rs->getString($startcol + 4);

      $this->codempadm = $rs->getString($startcol + 5);

      $this->coduniadm = $rs->getString($startcol + 6);

      $this->codempeje = $rs->getString($startcol + 7);

      $this->coduniste = $rs->getString($startcol + 8);

      $this->fecreg = $rs->getDate($startcol + 9, null);

      $this->dias = $rs->getInt($startcol + 10);

      $this->fecven = $rs->getDate($startcol + 11, null);

      $this->status = $rs->getString($startcol + 12);

      $this->docane1 = $rs->getString($startcol + 13);

      $this->docane2 = $rs->getString($startcol + 14);

      $this->docane3 = $rs->getString($startcol + 15);

      $this->prepor = $rs->getString($startcol + 16);

      $this->preporcar = $rs->getString($startcol + 17);

      $this->lisicact_id = $rs->getInt($startcol + 18);

      $this->fecdecla = $rs->getDate($startcol + 19, null);

      $this->detdecmod = $rs->getString($startcol + 20);

      $this->anapor = $rs->getString($startcol + 21);

      $this->anaporcar = $rs->getString($startcol + 22);

      $this->id = $rs->getInt($startcol + 23);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 24; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liinspecciones object", $e);
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
			$con = Propel::getConnection(LiinspeccionesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiinspeccionesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiinspeccionesPeer::DATABASE_NAME);
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
					$pk = LiinspeccionesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiinspeccionesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLidetparinss !== null) {
				foreach($this->collLidetparinss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLidetactinss !== null) {
				foreach($this->collLidetactinss as $referrerFK) {
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


			if (($retval = LiinspeccionesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLidetparinss !== null) {
					foreach($this->collLidetparinss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLidetactinss !== null) {
					foreach($this->collLidetactinss as $referrerFK) {
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
		$pos = LiinspeccionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumins();
				break;
			case 1:
				return $this->getFecdes();
				break;
			case 2:
				return $this->getFechas();
				break;
			case 3:
				return $this->getNumval();
				break;
			case 4:
				return $this->getDetins();
				break;
			case 5:
				return $this->getCodempadm();
				break;
			case 6:
				return $this->getCoduniadm();
				break;
			case 7:
				return $this->getCodempeje();
				break;
			case 8:
				return $this->getCoduniste();
				break;
			case 9:
				return $this->getFecreg();
				break;
			case 10:
				return $this->getDias();
				break;
			case 11:
				return $this->getFecven();
				break;
			case 12:
				return $this->getStatus();
				break;
			case 13:
				return $this->getDocane1();
				break;
			case 14:
				return $this->getDocane2();
				break;
			case 15:
				return $this->getDocane3();
				break;
			case 16:
				return $this->getPrepor();
				break;
			case 17:
				return $this->getPreporcar();
				break;
			case 18:
				return $this->getLisicactId();
				break;
			case 19:
				return $this->getFecdecla();
				break;
			case 20:
				return $this->getDetdecmod();
				break;
			case 21:
				return $this->getAnapor();
				break;
			case 22:
				return $this->getAnaporcar();
				break;
			case 23:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiinspeccionesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumins(),
			$keys[1] => $this->getFecdes(),
			$keys[2] => $this->getFechas(),
			$keys[3] => $this->getNumval(),
			$keys[4] => $this->getDetins(),
			$keys[5] => $this->getCodempadm(),
			$keys[6] => $this->getCoduniadm(),
			$keys[7] => $this->getCodempeje(),
			$keys[8] => $this->getCoduniste(),
			$keys[9] => $this->getFecreg(),
			$keys[10] => $this->getDias(),
			$keys[11] => $this->getFecven(),
			$keys[12] => $this->getStatus(),
			$keys[13] => $this->getDocane1(),
			$keys[14] => $this->getDocane2(),
			$keys[15] => $this->getDocane3(),
			$keys[16] => $this->getPrepor(),
			$keys[17] => $this->getPreporcar(),
			$keys[18] => $this->getLisicactId(),
			$keys[19] => $this->getFecdecla(),
			$keys[20] => $this->getDetdecmod(),
			$keys[21] => $this->getAnapor(),
			$keys[22] => $this->getAnaporcar(),
			$keys[23] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiinspeccionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumins($value);
				break;
			case 1:
				$this->setFecdes($value);
				break;
			case 2:
				$this->setFechas($value);
				break;
			case 3:
				$this->setNumval($value);
				break;
			case 4:
				$this->setDetins($value);
				break;
			case 5:
				$this->setCodempadm($value);
				break;
			case 6:
				$this->setCoduniadm($value);
				break;
			case 7:
				$this->setCodempeje($value);
				break;
			case 8:
				$this->setCoduniste($value);
				break;
			case 9:
				$this->setFecreg($value);
				break;
			case 10:
				$this->setDias($value);
				break;
			case 11:
				$this->setFecven($value);
				break;
			case 12:
				$this->setStatus($value);
				break;
			case 13:
				$this->setDocane1($value);
				break;
			case 14:
				$this->setDocane2($value);
				break;
			case 15:
				$this->setDocane3($value);
				break;
			case 16:
				$this->setPrepor($value);
				break;
			case 17:
				$this->setPreporcar($value);
				break;
			case 18:
				$this->setLisicactId($value);
				break;
			case 19:
				$this->setFecdecla($value);
				break;
			case 20:
				$this->setDetdecmod($value);
				break;
			case 21:
				$this->setAnapor($value);
				break;
			case 22:
				$this->setAnaporcar($value);
				break;
			case 23:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiinspeccionesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumins($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecdes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumval($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDetins($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodempadm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduniadm($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodempeje($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCoduniste($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecreg($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDias($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecven($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStatus($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDocane1($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDocane2($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDocane3($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPrepor($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setPreporcar($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setLisicactId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecdecla($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDetdecmod($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setAnapor($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setAnaporcar($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setId($arr[$keys[23]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiinspeccionesPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiinspeccionesPeer::NUMINS)) $criteria->add(LiinspeccionesPeer::NUMINS, $this->numins);
		if ($this->isColumnModified(LiinspeccionesPeer::FECDES)) $criteria->add(LiinspeccionesPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(LiinspeccionesPeer::FECHAS)) $criteria->add(LiinspeccionesPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(LiinspeccionesPeer::NUMVAL)) $criteria->add(LiinspeccionesPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(LiinspeccionesPeer::DETINS)) $criteria->add(LiinspeccionesPeer::DETINS, $this->detins);
		if ($this->isColumnModified(LiinspeccionesPeer::CODEMPADM)) $criteria->add(LiinspeccionesPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LiinspeccionesPeer::CODUNIADM)) $criteria->add(LiinspeccionesPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LiinspeccionesPeer::CODEMPEJE)) $criteria->add(LiinspeccionesPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LiinspeccionesPeer::CODUNISTE)) $criteria->add(LiinspeccionesPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LiinspeccionesPeer::FECREG)) $criteria->add(LiinspeccionesPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LiinspeccionesPeer::DIAS)) $criteria->add(LiinspeccionesPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LiinspeccionesPeer::FECVEN)) $criteria->add(LiinspeccionesPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LiinspeccionesPeer::STATUS)) $criteria->add(LiinspeccionesPeer::STATUS, $this->status);
		if ($this->isColumnModified(LiinspeccionesPeer::DOCANE1)) $criteria->add(LiinspeccionesPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LiinspeccionesPeer::DOCANE2)) $criteria->add(LiinspeccionesPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LiinspeccionesPeer::DOCANE3)) $criteria->add(LiinspeccionesPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LiinspeccionesPeer::PREPOR)) $criteria->add(LiinspeccionesPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LiinspeccionesPeer::PREPORCAR)) $criteria->add(LiinspeccionesPeer::PREPORCAR, $this->preporcar);
		if ($this->isColumnModified(LiinspeccionesPeer::LISICACT_ID)) $criteria->add(LiinspeccionesPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LiinspeccionesPeer::FECDECLA)) $criteria->add(LiinspeccionesPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LiinspeccionesPeer::DETDECMOD)) $criteria->add(LiinspeccionesPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LiinspeccionesPeer::ANAPOR)) $criteria->add(LiinspeccionesPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LiinspeccionesPeer::ANAPORCAR)) $criteria->add(LiinspeccionesPeer::ANAPORCAR, $this->anaporcar);
		if ($this->isColumnModified(LiinspeccionesPeer::ID)) $criteria->add(LiinspeccionesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiinspeccionesPeer::DATABASE_NAME);

		$criteria->add(LiinspeccionesPeer::ID, $this->id);

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

		$copyObj->setNumins($this->numins);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setFechas($this->fechas);

		$copyObj->setNumval($this->numval);

		$copyObj->setDetins($this->detins);

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

			foreach($this->getLidetparinss() as $relObj) {
				$copyObj->addLidetparins($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactinss() as $relObj) {
				$copyObj->addLidetactins($relObj->copy($deepCopy));
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
			self::$peer = new LiinspeccionesPeer();
		}
		return self::$peer;
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

	
	public function initLidetparinss()
	{
		if ($this->collLidetparinss === null) {
			$this->collLidetparinss = array();
		}
	}

	
	public function getLidetparinss($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetparinsPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetparinss === null) {
			if ($this->isNew()) {
			   $this->collLidetparinss = array();
			} else {

				$criteria->add(LidetparinsPeer::NUMINS, $this->getNumins());

				LidetparinsPeer::addSelectColumns($criteria);
				$this->collLidetparinss = LidetparinsPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetparinsPeer::NUMINS, $this->getNumins());

				LidetparinsPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetparinsCriteria) || !$this->lastLidetparinsCriteria->equals($criteria)) {
					$this->collLidetparinss = LidetparinsPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetparinsCriteria = $criteria;
		return $this->collLidetparinss;
	}

	
	public function countLidetparinss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetparinsPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetparinsPeer::NUMINS, $this->getNumins());

		return LidetparinsPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetparins(Lidetparins $l)
	{
		$this->collLidetparinss[] = $l;
		$l->setLiinspecciones($this);
	}


	
	public function getLidetparinssJoinLidetparval($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetparinsPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetparinss === null) {
			if ($this->isNew()) {
				$this->collLidetparinss = array();
			} else {

				$criteria->add(LidetparinsPeer::NUMINS, $this->getNumins());

				$this->collLidetparinss = LidetparinsPeer::doSelectJoinLidetparval($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetparinsPeer::NUMINS, $this->getNumins());

			if (!isset($this->lastLidetparinsCriteria) || !$this->lastLidetparinsCriteria->equals($criteria)) {
				$this->collLidetparinss = LidetparinsPeer::doSelectJoinLidetparval($criteria, $con);
			}
		}
		$this->lastLidetparinsCriteria = $criteria;

		return $this->collLidetparinss;
	}

	
	public function initLidetactinss()
	{
		if ($this->collLidetactinss === null) {
			$this->collLidetactinss = array();
		}
	}

	
	public function getLidetactinss($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactinsPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactinss === null) {
			if ($this->isNew()) {
			   $this->collLidetactinss = array();
			} else {

				$criteria->add(LidetactinsPeer::NUMINS, $this->getNumins());

				LidetactinsPeer::addSelectColumns($criteria);
				$this->collLidetactinss = LidetactinsPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactinsPeer::NUMINS, $this->getNumins());

				LidetactinsPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetactinsCriteria) || !$this->lastLidetactinsCriteria->equals($criteria)) {
					$this->collLidetactinss = LidetactinsPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetactinsCriteria = $criteria;
		return $this->collLidetactinss;
	}

	
	public function countLidetactinss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactinsPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetactinsPeer::NUMINS, $this->getNumins());

		return LidetactinsPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactins(Lidetactins $l)
	{
		$this->collLidetactinss[] = $l;
		$l->setLiinspecciones($this);
	}


	
	public function getLidetactinssJoinLiactas($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactinsPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactinss === null) {
			if ($this->isNew()) {
				$this->collLidetactinss = array();
			} else {

				$criteria->add(LidetactinsPeer::NUMINS, $this->getNumins());

				$this->collLidetactinss = LidetactinsPeer::doSelectJoinLiactas($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactinsPeer::NUMINS, $this->getNumins());

			if (!isset($this->lastLidetactinsCriteria) || !$this->lastLidetactinsCriteria->equals($criteria)) {
				$this->collLidetactinss = LidetactinsPeer::doSelectJoinLiactas($criteria, $con);
			}
		}
		$this->lastLidetactinsCriteria = $criteria;

		return $this->collLidetactinss;
	}

} 