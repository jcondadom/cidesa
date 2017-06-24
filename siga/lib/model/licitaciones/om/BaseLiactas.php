<?php


abstract class BaseLiactas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numact;


	
	protected $numcont;


	
	protected $codtipact;


	
	protected $detact;


	
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

	
	protected $aLitipact;

	
	protected $aLidatstedetRelatedByCodempadm;

	
	protected $aLidatstedetRelatedByCodempeje;

	
	protected $aLisicact;

	
	protected $collLidetactforpags;

	
	protected $lastLidetactforpagCriteria = null;

	
	protected $collLidetactfiaconts;

	
	protected $lastLidetactfiacontCriteria = null;

	
	protected $collLidetactinss;

	
	protected $lastLidetactinsCriteria = null;

	
	protected $collLidetactcroents;

	
	protected $lastLidetactcroentCriteria = null;

	
	protected $collLidetactactdesconts;

	
	protected $lastLidetactactdescontCriteria = null;

	
	protected $collLidetactsolpags;

	
	protected $lastLidetactsolpagCriteria = null;

	
	protected $collLidetactpens;

	
	protected $lastLidetactpenCriteria = null;

	
	protected $collLidetactmods;

	
	protected $lastLidetactmodCriteria = null;

	
	protected $collLidetactadds;

	
	protected $lastLidetactaddCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumact()
  {

    return trim($this->numact);

  }
  
  public function getNumcont()
  {

    return trim($this->numcont);

  }
  
  public function getCodtipact()
  {

    return trim($this->codtipact);

  }
  
  public function getDetact()
  {

    return trim($this->detact);

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
	
	public function setNumact($v)
	{

    if ($this->numact !== $v) {
        $this->numact = $v;
        $this->modifiedColumns[] = LiactasPeer::NUMACT;
      }
  
	} 
	
	public function setNumcont($v)
	{

    if ($this->numcont !== $v) {
        $this->numcont = $v;
        $this->modifiedColumns[] = LiactasPeer::NUMCONT;
      }
  
		if ($this->aLicontrat !== null && $this->aLicontrat->getNumcont() !== $v) {
			$this->aLicontrat = null;
		}

	} 
	
	public function setCodtipact($v)
	{

    if ($this->codtipact !== $v) {
        $this->codtipact = $v;
        $this->modifiedColumns[] = LiactasPeer::CODTIPACT;
      }
  
		if ($this->aLitipact !== null && $this->aLitipact->getCodtipact() !== $v) {
			$this->aLitipact = null;
		}

	} 
	
	public function setDetact($v)
	{

    if ($this->detact !== $v) {
        $this->detact = $v;
        $this->modifiedColumns[] = LiactasPeer::DETACT;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LiactasPeer::CODEMPADM;
      }
  
		if ($this->aLidatstedetRelatedByCodempadm !== null && $this->aLidatstedetRelatedByCodempadm->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempadm = null;
		}

	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LiactasPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LiactasPeer::CODEMPEJE;
      }
  
		if ($this->aLidatstedetRelatedByCodempeje !== null && $this->aLidatstedetRelatedByCodempeje->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempeje = null;
		}

	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LiactasPeer::CODUNISTE;
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
      $this->modifiedColumns[] = LiactasPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LiactasPeer::DIAS;
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
      $this->modifiedColumns[] = LiactasPeer::FECVEN;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LiactasPeer::STATUS;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LiactasPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LiactasPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LiactasPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LiactasPeer::PREPOR;
      }
  
	} 
	
	public function setPreporcar($v)
	{

    if ($this->preporcar !== $v) {
        $this->preporcar = $v;
        $this->modifiedColumns[] = LiactasPeer::PREPORCAR;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LiactasPeer::LISICACT_ID;
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
      $this->modifiedColumns[] = LiactasPeer::FECDECLA;
    }

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LiactasPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LiactasPeer::ANAPOR;
      }
  
	} 
	
	public function setAnaporcar($v)
	{

    if ($this->anaporcar !== $v) {
        $this->anaporcar = $v;
        $this->modifiedColumns[] = LiactasPeer::ANAPORCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiactasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numact = $rs->getString($startcol + 0);

      $this->numcont = $rs->getString($startcol + 1);

      $this->codtipact = $rs->getString($startcol + 2);

      $this->detact = $rs->getString($startcol + 3);

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
      throw new PropelException("Error populating Liactas object", $e);
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
			$con = Propel::getConnection(LiactasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiactasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiactasPeer::DATABASE_NAME);
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

			if ($this->aLitipact !== null) {
				if ($this->aLitipact->isModified()) {
					$affectedRows += $this->aLitipact->save($con);
				}
				$this->setLitipact($this->aLitipact);
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
					$pk = LiactasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiactasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLidetactforpags !== null) {
				foreach($this->collLidetactforpags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLidetactfiaconts !== null) {
				foreach($this->collLidetactfiaconts as $referrerFK) {
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

			if ($this->collLidetactcroents !== null) {
				foreach($this->collLidetactcroents as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLidetactactdesconts !== null) {
				foreach($this->collLidetactactdesconts as $referrerFK) {
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

			if ($this->collLidetactpens !== null) {
				foreach($this->collLidetactpens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLidetactmods !== null) {
				foreach($this->collLidetactmods as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLidetactadds !== null) {
				foreach($this->collLidetactadds as $referrerFK) {
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

			if ($this->aLitipact !== null) {
				if (!$this->aLitipact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLitipact->getValidationFailures());
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


			if (($retval = LiactasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLidetactforpags !== null) {
					foreach($this->collLidetactforpags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLidetactfiaconts !== null) {
					foreach($this->collLidetactfiaconts as $referrerFK) {
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

				if ($this->collLidetactcroents !== null) {
					foreach($this->collLidetactcroents as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLidetactactdesconts !== null) {
					foreach($this->collLidetactactdesconts as $referrerFK) {
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

				if ($this->collLidetactpens !== null) {
					foreach($this->collLidetactpens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLidetactmods !== null) {
					foreach($this->collLidetactmods as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLidetactadds !== null) {
					foreach($this->collLidetactadds as $referrerFK) {
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
		$pos = LiactasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumact();
				break;
			case 1:
				return $this->getNumcont();
				break;
			case 2:
				return $this->getCodtipact();
				break;
			case 3:
				return $this->getDetact();
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
		$keys = LiactasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumact(),
			$keys[1] => $this->getNumcont(),
			$keys[2] => $this->getCodtipact(),
			$keys[3] => $this->getDetact(),
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
		$pos = LiactasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumact($value);
				break;
			case 1:
				$this->setNumcont($value);
				break;
			case 2:
				$this->setCodtipact($value);
				break;
			case 3:
				$this->setDetact($value);
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
		$keys = LiactasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcont($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtipact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDetact($arr[$keys[3]]);
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
		$criteria = new Criteria(LiactasPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiactasPeer::NUMACT)) $criteria->add(LiactasPeer::NUMACT, $this->numact);
		if ($this->isColumnModified(LiactasPeer::NUMCONT)) $criteria->add(LiactasPeer::NUMCONT, $this->numcont);
		if ($this->isColumnModified(LiactasPeer::CODTIPACT)) $criteria->add(LiactasPeer::CODTIPACT, $this->codtipact);
		if ($this->isColumnModified(LiactasPeer::DETACT)) $criteria->add(LiactasPeer::DETACT, $this->detact);
		if ($this->isColumnModified(LiactasPeer::CODEMPADM)) $criteria->add(LiactasPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LiactasPeer::CODUNIADM)) $criteria->add(LiactasPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LiactasPeer::CODEMPEJE)) $criteria->add(LiactasPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LiactasPeer::CODUNISTE)) $criteria->add(LiactasPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LiactasPeer::FECREG)) $criteria->add(LiactasPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LiactasPeer::DIAS)) $criteria->add(LiactasPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LiactasPeer::FECVEN)) $criteria->add(LiactasPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LiactasPeer::STATUS)) $criteria->add(LiactasPeer::STATUS, $this->status);
		if ($this->isColumnModified(LiactasPeer::DOCANE1)) $criteria->add(LiactasPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LiactasPeer::DOCANE2)) $criteria->add(LiactasPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LiactasPeer::DOCANE3)) $criteria->add(LiactasPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LiactasPeer::PREPOR)) $criteria->add(LiactasPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LiactasPeer::PREPORCAR)) $criteria->add(LiactasPeer::PREPORCAR, $this->preporcar);
		if ($this->isColumnModified(LiactasPeer::LISICACT_ID)) $criteria->add(LiactasPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LiactasPeer::FECDECLA)) $criteria->add(LiactasPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LiactasPeer::DETDECMOD)) $criteria->add(LiactasPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LiactasPeer::ANAPOR)) $criteria->add(LiactasPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LiactasPeer::ANAPORCAR)) $criteria->add(LiactasPeer::ANAPORCAR, $this->anaporcar);
		if ($this->isColumnModified(LiactasPeer::ID)) $criteria->add(LiactasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiactasPeer::DATABASE_NAME);

		$criteria->add(LiactasPeer::ID, $this->id);

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

		$copyObj->setNumact($this->numact);

		$copyObj->setNumcont($this->numcont);

		$copyObj->setCodtipact($this->codtipact);

		$copyObj->setDetact($this->detact);

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

			foreach($this->getLidetactforpags() as $relObj) {
				$copyObj->addLidetactforpag($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactfiaconts() as $relObj) {
				$copyObj->addLidetactfiacont($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactinss() as $relObj) {
				$copyObj->addLidetactins($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactcroents() as $relObj) {
				$copyObj->addLidetactcroent($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactactdesconts() as $relObj) {
				$copyObj->addLidetactactdescont($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactsolpags() as $relObj) {
				$copyObj->addLidetactsolpag($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactpens() as $relObj) {
				$copyObj->addLidetactpen($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactmods() as $relObj) {
				$copyObj->addLidetactmod($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactadds() as $relObj) {
				$copyObj->addLidetactadd($relObj->copy($deepCopy));
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
			self::$peer = new LiactasPeer();
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

	
	public function setLitipact($v)
	{


		if ($v === null) {
			$this->setCodtipact(NULL);
		} else {
			$this->setCodtipact($v->getCodtipact());
		}


		$this->aLitipact = $v;
	}


	
	public function getLitipact($con = null)
	{
		if ($this->aLitipact === null && (($this->codtipact !== "" && $this->codtipact !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLitipactPeer.php';

      $c = new Criteria();
      $c->add(LitipactPeer::CODTIPACT,$this->codtipact);
      
			$this->aLitipact = LitipactPeer::doSelectOne($c, $con);

			
		}
		return $this->aLitipact;
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

	
	public function initLidetactforpags()
	{
		if ($this->collLidetactforpags === null) {
			$this->collLidetactforpags = array();
		}
	}

	
	public function getLidetactforpags($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactforpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactforpags === null) {
			if ($this->isNew()) {
			   $this->collLidetactforpags = array();
			} else {

				$criteria->add(LidetactforpagPeer::NUMACT, $this->getNumact());

				LidetactforpagPeer::addSelectColumns($criteria);
				$this->collLidetactforpags = LidetactforpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactforpagPeer::NUMACT, $this->getNumact());

				LidetactforpagPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetactforpagCriteria) || !$this->lastLidetactforpagCriteria->equals($criteria)) {
					$this->collLidetactforpags = LidetactforpagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetactforpagCriteria = $criteria;
		return $this->collLidetactforpags;
	}

	
	public function countLidetactforpags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactforpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetactforpagPeer::NUMACT, $this->getNumact());

		return LidetactforpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactforpag(Lidetactforpag $l)
	{
		$this->collLidetactforpags[] = $l;
		$l->setLiactas($this);
	}


	
	public function getLidetactforpagsJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactforpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactforpags === null) {
			if ($this->isNew()) {
				$this->collLidetactforpags = array();
			} else {

				$criteria->add(LidetactforpagPeer::NUMACT, $this->getNumact());

				$this->collLidetactforpags = LidetactforpagPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactforpagPeer::NUMACT, $this->getNumact());

			if (!isset($this->lastLidetactforpagCriteria) || !$this->lastLidetactforpagCriteria->equals($criteria)) {
				$this->collLidetactforpags = LidetactforpagPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLidetactforpagCriteria = $criteria;

		return $this->collLidetactforpags;
	}

	
	public function initLidetactfiaconts()
	{
		if ($this->collLidetactfiaconts === null) {
			$this->collLidetactfiaconts = array();
		}
	}

	
	public function getLidetactfiaconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactfiacontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactfiaconts === null) {
			if ($this->isNew()) {
			   $this->collLidetactfiaconts = array();
			} else {

				$criteria->add(LidetactfiacontPeer::NUMACT, $this->getNumact());

				LidetactfiacontPeer::addSelectColumns($criteria);
				$this->collLidetactfiaconts = LidetactfiacontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactfiacontPeer::NUMACT, $this->getNumact());

				LidetactfiacontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetactfiacontCriteria) || !$this->lastLidetactfiacontCriteria->equals($criteria)) {
					$this->collLidetactfiaconts = LidetactfiacontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetactfiacontCriteria = $criteria;
		return $this->collLidetactfiaconts;
	}

	
	public function countLidetactfiaconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactfiacontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetactfiacontPeer::NUMACT, $this->getNumact());

		return LidetactfiacontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactfiacont(Lidetactfiacont $l)
	{
		$this->collLidetactfiaconts[] = $l;
		$l->setLiactas($this);
	}


	
	public function getLidetactfiacontsJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactfiacontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactfiaconts === null) {
			if ($this->isNew()) {
				$this->collLidetactfiaconts = array();
			} else {

				$criteria->add(LidetactfiacontPeer::NUMACT, $this->getNumact());

				$this->collLidetactfiaconts = LidetactfiacontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactfiacontPeer::NUMACT, $this->getNumact());

			if (!isset($this->lastLidetactfiacontCriteria) || !$this->lastLidetactfiacontCriteria->equals($criteria)) {
				$this->collLidetactfiaconts = LidetactfiacontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLidetactfiacontCriteria = $criteria;

		return $this->collLidetactfiaconts;
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

				$criteria->add(LidetactinsPeer::NUMACT, $this->getNumact());

				LidetactinsPeer::addSelectColumns($criteria);
				$this->collLidetactinss = LidetactinsPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactinsPeer::NUMACT, $this->getNumact());

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

		$criteria->add(LidetactinsPeer::NUMACT, $this->getNumact());

		return LidetactinsPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactins(Lidetactins $l)
	{
		$this->collLidetactinss[] = $l;
		$l->setLiactas($this);
	}


	
	public function getLidetactinssJoinLiinspecciones($criteria = null, $con = null)
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

				$criteria->add(LidetactinsPeer::NUMACT, $this->getNumact());

				$this->collLidetactinss = LidetactinsPeer::doSelectJoinLiinspecciones($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactinsPeer::NUMACT, $this->getNumact());

			if (!isset($this->lastLidetactinsCriteria) || !$this->lastLidetactinsCriteria->equals($criteria)) {
				$this->collLidetactinss = LidetactinsPeer::doSelectJoinLiinspecciones($criteria, $con);
			}
		}
		$this->lastLidetactinsCriteria = $criteria;

		return $this->collLidetactinss;
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

				$criteria->add(LidetactcroentPeer::NUMACT, $this->getNumact());

				LidetactcroentPeer::addSelectColumns($criteria);
				$this->collLidetactcroents = LidetactcroentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactcroentPeer::NUMACT, $this->getNumact());

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

		$criteria->add(LidetactcroentPeer::NUMACT, $this->getNumact());

		return LidetactcroentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactcroent(Lidetactcroent $l)
	{
		$this->collLidetactcroents[] = $l;
		$l->setLiactas($this);
	}


	
	public function getLidetactcroentsJoinLisolpag($criteria = null, $con = null)
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

				$criteria->add(LidetactcroentPeer::NUMACT, $this->getNumact());

				$this->collLidetactcroents = LidetactcroentPeer::doSelectJoinLisolpag($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactcroentPeer::NUMACT, $this->getNumact());

			if (!isset($this->lastLidetactcroentCriteria) || !$this->lastLidetactcroentCriteria->equals($criteria)) {
				$this->collLidetactcroents = LidetactcroentPeer::doSelectJoinLisolpag($criteria, $con);
			}
		}
		$this->lastLidetactcroentCriteria = $criteria;

		return $this->collLidetactcroents;
	}

	
	public function initLidetactactdesconts()
	{
		if ($this->collLidetactactdesconts === null) {
			$this->collLidetactactdesconts = array();
		}
	}

	
	public function getLidetactactdesconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactactdesconts === null) {
			if ($this->isNew()) {
			   $this->collLidetactactdesconts = array();
			} else {

				$criteria->add(LidetactactdescontPeer::NUMACT, $this->getNumact());

				LidetactactdescontPeer::addSelectColumns($criteria);
				$this->collLidetactactdesconts = LidetactactdescontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactactdescontPeer::NUMACT, $this->getNumact());

				LidetactactdescontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetactactdescontCriteria) || !$this->lastLidetactactdescontCriteria->equals($criteria)) {
					$this->collLidetactactdesconts = LidetactactdescontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetactactdescontCriteria = $criteria;
		return $this->collLidetactactdesconts;
	}

	
	public function countLidetactactdesconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetactactdescontPeer::NUMACT, $this->getNumact());

		return LidetactactdescontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactactdescont(Lidetactactdescont $l)
	{
		$this->collLidetactactdesconts[] = $l;
		$l->setLiactas($this);
	}


	
	public function getLidetactactdescontsJoinLiactdescont($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactactdesconts === null) {
			if ($this->isNew()) {
				$this->collLidetactactdesconts = array();
			} else {

				$criteria->add(LidetactactdescontPeer::NUMACT, $this->getNumact());

				$this->collLidetactactdesconts = LidetactactdescontPeer::doSelectJoinLiactdescont($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactactdescontPeer::NUMACT, $this->getNumact());

			if (!isset($this->lastLidetactactdescontCriteria) || !$this->lastLidetactactdescontCriteria->equals($criteria)) {
				$this->collLidetactactdesconts = LidetactactdescontPeer::doSelectJoinLiactdescont($criteria, $con);
			}
		}
		$this->lastLidetactactdescontCriteria = $criteria;

		return $this->collLidetactactdesconts;
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

				$criteria->add(LidetactsolpagPeer::NUMACT, $this->getNumact());

				LidetactsolpagPeer::addSelectColumns($criteria);
				$this->collLidetactsolpags = LidetactsolpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactsolpagPeer::NUMACT, $this->getNumact());

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

		$criteria->add(LidetactsolpagPeer::NUMACT, $this->getNumact());

		return LidetactsolpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactsolpag(Lidetactsolpag $l)
	{
		$this->collLidetactsolpags[] = $l;
		$l->setLiactas($this);
	}


	
	public function getLidetactsolpagsJoinLisolpag($criteria = null, $con = null)
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

				$criteria->add(LidetactsolpagPeer::NUMACT, $this->getNumact());

				$this->collLidetactsolpags = LidetactsolpagPeer::doSelectJoinLisolpag($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactsolpagPeer::NUMACT, $this->getNumact());

			if (!isset($this->lastLidetactsolpagCriteria) || !$this->lastLidetactsolpagCriteria->equals($criteria)) {
				$this->collLidetactsolpags = LidetactsolpagPeer::doSelectJoinLisolpag($criteria, $con);
			}
		}
		$this->lastLidetactsolpagCriteria = $criteria;

		return $this->collLidetactsolpags;
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

				$criteria->add(LidetactpenPeer::NUMACT, $this->getNumact());

				LidetactpenPeer::addSelectColumns($criteria);
				$this->collLidetactpens = LidetactpenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactpenPeer::NUMACT, $this->getNumact());

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

		$criteria->add(LidetactpenPeer::NUMACT, $this->getNumact());

		return LidetactpenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactpen(Lidetactpen $l)
	{
		$this->collLidetactpens[] = $l;
		$l->setLiactas($this);
	}


	
	public function getLidetactpensJoinLipenalizaciones($criteria = null, $con = null)
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

				$criteria->add(LidetactpenPeer::NUMACT, $this->getNumact());

				$this->collLidetactpens = LidetactpenPeer::doSelectJoinLipenalizaciones($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactpenPeer::NUMACT, $this->getNumact());

			if (!isset($this->lastLidetactpenCriteria) || !$this->lastLidetactpenCriteria->equals($criteria)) {
				$this->collLidetactpens = LidetactpenPeer::doSelectJoinLipenalizaciones($criteria, $con);
			}
		}
		$this->lastLidetactpenCriteria = $criteria;

		return $this->collLidetactpens;
	}

	
	public function initLidetactmods()
	{
		if ($this->collLidetactmods === null) {
			$this->collLidetactmods = array();
		}
	}

	
	public function getLidetactmods($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactmodPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactmods === null) {
			if ($this->isNew()) {
			   $this->collLidetactmods = array();
			} else {

				$criteria->add(LidetactmodPeer::NUMACT, $this->getNumact());

				LidetactmodPeer::addSelectColumns($criteria);
				$this->collLidetactmods = LidetactmodPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactmodPeer::NUMACT, $this->getNumact());

				LidetactmodPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetactmodCriteria) || !$this->lastLidetactmodCriteria->equals($criteria)) {
					$this->collLidetactmods = LidetactmodPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetactmodCriteria = $criteria;
		return $this->collLidetactmods;
	}

	
	public function countLidetactmods($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactmodPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetactmodPeer::NUMACT, $this->getNumact());

		return LidetactmodPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactmod(Lidetactmod $l)
	{
		$this->collLidetactmods[] = $l;
		$l->setLiactas($this);
	}


	
	public function getLidetactmodsJoinLimodcont($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactmodPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactmods === null) {
			if ($this->isNew()) {
				$this->collLidetactmods = array();
			} else {

				$criteria->add(LidetactmodPeer::NUMACT, $this->getNumact());

				$this->collLidetactmods = LidetactmodPeer::doSelectJoinLimodcont($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactmodPeer::NUMACT, $this->getNumact());

			if (!isset($this->lastLidetactmodCriteria) || !$this->lastLidetactmodCriteria->equals($criteria)) {
				$this->collLidetactmods = LidetactmodPeer::doSelectJoinLimodcont($criteria, $con);
			}
		}
		$this->lastLidetactmodCriteria = $criteria;

		return $this->collLidetactmods;
	}

	
	public function initLidetactadds()
	{
		if ($this->collLidetactadds === null) {
			$this->collLidetactadds = array();
		}
	}

	
	public function getLidetactadds($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactaddPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactadds === null) {
			if ($this->isNew()) {
			   $this->collLidetactadds = array();
			} else {

				$criteria->add(LidetactaddPeer::NUMACT, $this->getNumact());

				LidetactaddPeer::addSelectColumns($criteria);
				$this->collLidetactadds = LidetactaddPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactaddPeer::NUMACT, $this->getNumact());

				LidetactaddPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetactaddCriteria) || !$this->lastLidetactaddCriteria->equals($criteria)) {
					$this->collLidetactadds = LidetactaddPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetactaddCriteria = $criteria;
		return $this->collLidetactadds;
	}

	
	public function countLidetactadds($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactaddPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetactaddPeer::NUMACT, $this->getNumact());

		return LidetactaddPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactadd(Lidetactadd $l)
	{
		$this->collLidetactadds[] = $l;
		$l->setLiactas($this);
	}


	
	public function getLidetactaddsJoinLiaddendum($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetactaddPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetactadds === null) {
			if ($this->isNew()) {
				$this->collLidetactadds = array();
			} else {

				$criteria->add(LidetactaddPeer::NUMACT, $this->getNumact());

				$this->collLidetactadds = LidetactaddPeer::doSelectJoinLiaddendum($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactaddPeer::NUMACT, $this->getNumact());

			if (!isset($this->lastLidetactaddCriteria) || !$this->lastLidetactaddCriteria->equals($criteria)) {
				$this->collLidetactadds = LidetactaddPeer::doSelectJoinLiaddendum($criteria, $con);
			}
		}
		$this->lastLidetactaddCriteria = $criteria;

		return $this->collLidetactadds;
	}

} 