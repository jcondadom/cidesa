<?php


abstract class BaseLicontrat extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcont;


	
	protected $resolu;


	
	protected $fecrel;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $numptocuecon;


	
	protected $numexp;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $codpro;


	
	protected $numofe;


	
	protected $objcont;


	
	protected $sancio;


	
	protected $garant;


	
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


	
	protected $tipconpub;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $collLiregforpagconts;

	
	protected $lastLiregforpagcontCriteria = null;

	
	protected $collLidetactforpags;

	
	protected $lastLidetactforpagCriteria = null;

	
	protected $collLiactass;

	
	protected $lastLiactasCriteria = null;

	
	protected $collLiregfiaconts;

	
	protected $lastLiregfiacontCriteria = null;

	
	protected $collLidetactfiaconts;

	
	protected $lastLidetactfiacontCriteria = null;

	
	protected $collLivaluacioness;

	
	protected $lastLivaluacionesCriteria = null;

	
	protected $collLientregass;

	
	protected $lastLientregasCriteria = null;

	
	protected $collLidetcroentcontobs;

	
	protected $lastLidetcroentcontobCriteria = null;

	
	protected $collLiactdesconts;

	
	protected $lastLiactdescontCriteria = null;

	
	protected $collLisolpags;

	
	protected $lastLisolpagCriteria = null;

	
	protected $collLipenalizacioness;

	
	protected $lastLipenalizacionesCriteria = null;

	
	protected $collLiregcondets;

	
	protected $lastLiregcondetCriteria = null;

	
	protected $collLiregconrgos;

	
	protected $lastLiregconrgoCriteria = null;

	
	protected $collLimodconts;

	
	protected $lastLimodcontCriteria = null;

	
	protected $collLiaddendums;

	
	protected $lastLiaddendumCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcont()
  {

    return trim($this->numcont);

  }
  
  public function getResolu()
  {

    return trim($this->resolu);

  }
  
  public function getFecrel($format = 'Y-m-d')
  {

    if ($this->fecrel === null || $this->fecrel === '') {
      return null;
    } elseif (!is_int($this->fecrel)) {
            $ts = adodb_strtotime($this->fecrel);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrel] as date/time value: " . var_export($this->fecrel, true));
      }
    } else {
      $ts = $this->fecrel;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
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

  
  public function getNumptocuecon()
  {

    return trim($this->numptocuecon);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

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
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getNumofe()
  {

    return trim($this->numofe);

  }
  
  public function getObjcont()
  {

    return trim($this->objcont);

  }
  
  public function getSancio()
  {

    return trim($this->sancio);

  }
  
  public function getGarant()
  {

    return trim($this->garant);

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
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcont($v)
	{

    if ($this->numcont !== $v) {
        $this->numcont = $v;
        $this->modifiedColumns[] = LicontratPeer::NUMCONT;
      }
  
	} 
	
	public function setResolu($v)
	{

    if ($this->resolu !== $v) {
        $this->resolu = $v;
        $this->modifiedColumns[] = LicontratPeer::RESOLU;
      }
  
	} 
	
	public function setFecrel($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrel] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrel !== $ts) {
      $this->fecrel = $ts;
      $this->modifiedColumns[] = LicontratPeer::FECREL;
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
      $this->modifiedColumns[] = LicontratPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LicontratPeer::DIAS;
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
      $this->modifiedColumns[] = LicontratPeer::FECVEN;
    }

	} 
	
	public function setNumptocuecon($v)
	{

    if ($this->numptocuecon !== $v) {
        $this->numptocuecon = $v;
        $this->modifiedColumns[] = LicontratPeer::NUMPTOCUECON;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LicontratPeer::NUMEXP;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LicontratPeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LicontratPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LicontratPeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LicontratPeer::CODUNISTE;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = LicontratPeer::CODPRO;
      }
  
	} 
	
	public function setNumofe($v)
	{

    if ($this->numofe !== $v) {
        $this->numofe = $v;
        $this->modifiedColumns[] = LicontratPeer::NUMOFE;
      }
  
	} 
	
	public function setObjcont($v)
	{

    if ($this->objcont !== $v) {
        $this->objcont = $v;
        $this->modifiedColumns[] = LicontratPeer::OBJCONT;
      }
  
	} 
	
	public function setSancio($v)
	{

    if ($this->sancio !== $v) {
        $this->sancio = $v;
        $this->modifiedColumns[] = LicontratPeer::SANCIO;
      }
  
	} 
	
	public function setGarant($v)
	{

    if ($this->garant !== $v) {
        $this->garant = $v;
        $this->modifiedColumns[] = LicontratPeer::GARANT;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LicontratPeer::STATUS;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LicontratPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LicontratPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LicontratPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LicontratPeer::PREPOR;
      }
  
	} 
	
	public function setPreporcar($v)
	{

    if ($this->preporcar !== $v) {
        $this->preporcar = $v;
        $this->modifiedColumns[] = LicontratPeer::PREPORCAR;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LicontratPeer::LISICACT_ID;
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
      $this->modifiedColumns[] = LicontratPeer::FECDECLA;
    }

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LicontratPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LicontratPeer::ANAPOR;
      }
  
	} 
	
	public function setAnaporcar($v)
	{

    if ($this->anaporcar !== $v) {
        $this->anaporcar = $v;
        $this->modifiedColumns[] = LicontratPeer::ANAPORCAR;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LicontratPeer::TIPCONPUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LicontratPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcont = $rs->getString($startcol + 0);

      $this->resolu = $rs->getString($startcol + 1);

      $this->fecrel = $rs->getDate($startcol + 2, null);

      $this->fecreg = $rs->getDate($startcol + 3, null);

      $this->dias = $rs->getInt($startcol + 4);

      $this->fecven = $rs->getDate($startcol + 5, null);

      $this->numptocuecon = $rs->getString($startcol + 6);

      $this->numexp = $rs->getString($startcol + 7);

      $this->codempadm = $rs->getString($startcol + 8);

      $this->coduniadm = $rs->getString($startcol + 9);

      $this->codempeje = $rs->getString($startcol + 10);

      $this->coduniste = $rs->getString($startcol + 11);

      $this->codpro = $rs->getString($startcol + 12);

      $this->numofe = $rs->getString($startcol + 13);

      $this->objcont = $rs->getString($startcol + 14);

      $this->sancio = $rs->getString($startcol + 15);

      $this->garant = $rs->getString($startcol + 16);

      $this->status = $rs->getString($startcol + 17);

      $this->docane1 = $rs->getString($startcol + 18);

      $this->docane2 = $rs->getString($startcol + 19);

      $this->docane3 = $rs->getString($startcol + 20);

      $this->prepor = $rs->getString($startcol + 21);

      $this->preporcar = $rs->getString($startcol + 22);

      $this->lisicact_id = $rs->getInt($startcol + 23);

      $this->fecdecla = $rs->getDate($startcol + 24, null);

      $this->detdecmod = $rs->getString($startcol + 25);

      $this->anapor = $rs->getString($startcol + 26);

      $this->anaporcar = $rs->getString($startcol + 27);

      $this->tipconpub = $rs->getString($startcol + 28);

      $this->id = $rs->getInt($startcol + 29);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 30; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Licontrat object", $e);
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
			$con = Propel::getConnection(LicontratPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LicontratPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LicontratPeer::DATABASE_NAME);
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


												
			if ($this->aLisicact !== null) {
				if ($this->aLisicact->isModified()) {
					$affectedRows += $this->aLisicact->save($con);
				}
				$this->setLisicact($this->aLisicact);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LicontratPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LicontratPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiregforpagconts !== null) {
				foreach($this->collLiregforpagconts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLidetactforpags !== null) {
				foreach($this->collLidetactforpags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiactass !== null) {
				foreach($this->collLiactass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiregfiaconts !== null) {
				foreach($this->collLiregfiaconts as $referrerFK) {
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

			if ($this->collLivaluacioness !== null) {
				foreach($this->collLivaluacioness as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLientregass !== null) {
				foreach($this->collLientregass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLidetcroentcontobs !== null) {
				foreach($this->collLidetcroentcontobs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiactdesconts !== null) {
				foreach($this->collLiactdesconts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLisolpags !== null) {
				foreach($this->collLisolpags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLipenalizacioness !== null) {
				foreach($this->collLipenalizacioness as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiregcondets !== null) {
				foreach($this->collLiregcondets as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiregconrgos !== null) {
				foreach($this->collLiregconrgos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLimodconts !== null) {
				foreach($this->collLimodconts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiaddendums !== null) {
				foreach($this->collLiaddendums as $referrerFK) {
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


												
			if ($this->aLisicact !== null) {
				if (!$this->aLisicact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLisicact->getValidationFailures());
				}
			}


			if (($retval = LicontratPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiregforpagconts !== null) {
					foreach($this->collLiregforpagconts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLidetactforpags !== null) {
					foreach($this->collLidetactforpags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiactass !== null) {
					foreach($this->collLiactass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiregfiaconts !== null) {
					foreach($this->collLiregfiaconts as $referrerFK) {
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

				if ($this->collLivaluacioness !== null) {
					foreach($this->collLivaluacioness as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLientregass !== null) {
					foreach($this->collLientregass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLidetcroentcontobs !== null) {
					foreach($this->collLidetcroentcontobs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiactdesconts !== null) {
					foreach($this->collLiactdesconts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLisolpags !== null) {
					foreach($this->collLisolpags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLipenalizacioness !== null) {
					foreach($this->collLipenalizacioness as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiregcondets !== null) {
					foreach($this->collLiregcondets as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiregconrgos !== null) {
					foreach($this->collLiregconrgos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLimodconts !== null) {
					foreach($this->collLimodconts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiaddendums !== null) {
					foreach($this->collLiaddendums as $referrerFK) {
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
		$pos = LicontratPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcont();
				break;
			case 1:
				return $this->getResolu();
				break;
			case 2:
				return $this->getFecrel();
				break;
			case 3:
				return $this->getFecreg();
				break;
			case 4:
				return $this->getDias();
				break;
			case 5:
				return $this->getFecven();
				break;
			case 6:
				return $this->getNumptocuecon();
				break;
			case 7:
				return $this->getNumexp();
				break;
			case 8:
				return $this->getCodempadm();
				break;
			case 9:
				return $this->getCoduniadm();
				break;
			case 10:
				return $this->getCodempeje();
				break;
			case 11:
				return $this->getCoduniste();
				break;
			case 12:
				return $this->getCodpro();
				break;
			case 13:
				return $this->getNumofe();
				break;
			case 14:
				return $this->getObjcont();
				break;
			case 15:
				return $this->getSancio();
				break;
			case 16:
				return $this->getGarant();
				break;
			case 17:
				return $this->getStatus();
				break;
			case 18:
				return $this->getDocane1();
				break;
			case 19:
				return $this->getDocane2();
				break;
			case 20:
				return $this->getDocane3();
				break;
			case 21:
				return $this->getPrepor();
				break;
			case 22:
				return $this->getPreporcar();
				break;
			case 23:
				return $this->getLisicactId();
				break;
			case 24:
				return $this->getFecdecla();
				break;
			case 25:
				return $this->getDetdecmod();
				break;
			case 26:
				return $this->getAnapor();
				break;
			case 27:
				return $this->getAnaporcar();
				break;
			case 28:
				return $this->getTipconpub();
				break;
			case 29:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LicontratPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcont(),
			$keys[1] => $this->getResolu(),
			$keys[2] => $this->getFecrel(),
			$keys[3] => $this->getFecreg(),
			$keys[4] => $this->getDias(),
			$keys[5] => $this->getFecven(),
			$keys[6] => $this->getNumptocuecon(),
			$keys[7] => $this->getNumexp(),
			$keys[8] => $this->getCodempadm(),
			$keys[9] => $this->getCoduniadm(),
			$keys[10] => $this->getCodempeje(),
			$keys[11] => $this->getCoduniste(),
			$keys[12] => $this->getCodpro(),
			$keys[13] => $this->getNumofe(),
			$keys[14] => $this->getObjcont(),
			$keys[15] => $this->getSancio(),
			$keys[16] => $this->getGarant(),
			$keys[17] => $this->getStatus(),
			$keys[18] => $this->getDocane1(),
			$keys[19] => $this->getDocane2(),
			$keys[20] => $this->getDocane3(),
			$keys[21] => $this->getPrepor(),
			$keys[22] => $this->getPreporcar(),
			$keys[23] => $this->getLisicactId(),
			$keys[24] => $this->getFecdecla(),
			$keys[25] => $this->getDetdecmod(),
			$keys[26] => $this->getAnapor(),
			$keys[27] => $this->getAnaporcar(),
			$keys[28] => $this->getTipconpub(),
			$keys[29] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LicontratPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcont($value);
				break;
			case 1:
				$this->setResolu($value);
				break;
			case 2:
				$this->setFecrel($value);
				break;
			case 3:
				$this->setFecreg($value);
				break;
			case 4:
				$this->setDias($value);
				break;
			case 5:
				$this->setFecven($value);
				break;
			case 6:
				$this->setNumptocuecon($value);
				break;
			case 7:
				$this->setNumexp($value);
				break;
			case 8:
				$this->setCodempadm($value);
				break;
			case 9:
				$this->setCoduniadm($value);
				break;
			case 10:
				$this->setCodempeje($value);
				break;
			case 11:
				$this->setCoduniste($value);
				break;
			case 12:
				$this->setCodpro($value);
				break;
			case 13:
				$this->setNumofe($value);
				break;
			case 14:
				$this->setObjcont($value);
				break;
			case 15:
				$this->setSancio($value);
				break;
			case 16:
				$this->setGarant($value);
				break;
			case 17:
				$this->setStatus($value);
				break;
			case 18:
				$this->setDocane1($value);
				break;
			case 19:
				$this->setDocane2($value);
				break;
			case 20:
				$this->setDocane3($value);
				break;
			case 21:
				$this->setPrepor($value);
				break;
			case 22:
				$this->setPreporcar($value);
				break;
			case 23:
				$this->setLisicactId($value);
				break;
			case 24:
				$this->setFecdecla($value);
				break;
			case 25:
				$this->setDetdecmod($value);
				break;
			case 26:
				$this->setAnapor($value);
				break;
			case 27:
				$this->setAnaporcar($value);
				break;
			case 28:
				$this->setTipconpub($value);
				break;
			case 29:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LicontratPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcont($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setResolu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecrel($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecreg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDias($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecven($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumptocuecon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumexp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodempadm($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCoduniadm($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodempeje($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCoduniste($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodpro($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNumofe($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setObjcont($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setSancio($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setGarant($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setStatus($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDocane1($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDocane2($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDocane3($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setPrepor($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setPreporcar($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setLisicactId($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFecdecla($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDetdecmod($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setAnapor($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setAnaporcar($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setTipconpub($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setId($arr[$keys[29]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LicontratPeer::DATABASE_NAME);

		if ($this->isColumnModified(LicontratPeer::NUMCONT)) $criteria->add(LicontratPeer::NUMCONT, $this->numcont);
		if ($this->isColumnModified(LicontratPeer::RESOLU)) $criteria->add(LicontratPeer::RESOLU, $this->resolu);
		if ($this->isColumnModified(LicontratPeer::FECREL)) $criteria->add(LicontratPeer::FECREL, $this->fecrel);
		if ($this->isColumnModified(LicontratPeer::FECREG)) $criteria->add(LicontratPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LicontratPeer::DIAS)) $criteria->add(LicontratPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LicontratPeer::FECVEN)) $criteria->add(LicontratPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LicontratPeer::NUMPTOCUECON)) $criteria->add(LicontratPeer::NUMPTOCUECON, $this->numptocuecon);
		if ($this->isColumnModified(LicontratPeer::NUMEXP)) $criteria->add(LicontratPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LicontratPeer::CODEMPADM)) $criteria->add(LicontratPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LicontratPeer::CODUNIADM)) $criteria->add(LicontratPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LicontratPeer::CODEMPEJE)) $criteria->add(LicontratPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LicontratPeer::CODUNISTE)) $criteria->add(LicontratPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LicontratPeer::CODPRO)) $criteria->add(LicontratPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(LicontratPeer::NUMOFE)) $criteria->add(LicontratPeer::NUMOFE, $this->numofe);
		if ($this->isColumnModified(LicontratPeer::OBJCONT)) $criteria->add(LicontratPeer::OBJCONT, $this->objcont);
		if ($this->isColumnModified(LicontratPeer::SANCIO)) $criteria->add(LicontratPeer::SANCIO, $this->sancio);
		if ($this->isColumnModified(LicontratPeer::GARANT)) $criteria->add(LicontratPeer::GARANT, $this->garant);
		if ($this->isColumnModified(LicontratPeer::STATUS)) $criteria->add(LicontratPeer::STATUS, $this->status);
		if ($this->isColumnModified(LicontratPeer::DOCANE1)) $criteria->add(LicontratPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LicontratPeer::DOCANE2)) $criteria->add(LicontratPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LicontratPeer::DOCANE3)) $criteria->add(LicontratPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LicontratPeer::PREPOR)) $criteria->add(LicontratPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LicontratPeer::PREPORCAR)) $criteria->add(LicontratPeer::PREPORCAR, $this->preporcar);
		if ($this->isColumnModified(LicontratPeer::LISICACT_ID)) $criteria->add(LicontratPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LicontratPeer::FECDECLA)) $criteria->add(LicontratPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LicontratPeer::DETDECMOD)) $criteria->add(LicontratPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LicontratPeer::ANAPOR)) $criteria->add(LicontratPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LicontratPeer::ANAPORCAR)) $criteria->add(LicontratPeer::ANAPORCAR, $this->anaporcar);
		if ($this->isColumnModified(LicontratPeer::TIPCONPUB)) $criteria->add(LicontratPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LicontratPeer::ID)) $criteria->add(LicontratPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LicontratPeer::DATABASE_NAME);

		$criteria->add(LicontratPeer::ID, $this->id);

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

		$copyObj->setResolu($this->resolu);

		$copyObj->setFecrel($this->fecrel);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setNumptocuecon($this->numptocuecon);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setNumofe($this->numofe);

		$copyObj->setObjcont($this->objcont);

		$copyObj->setSancio($this->sancio);

		$copyObj->setGarant($this->garant);

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

		$copyObj->setTipconpub($this->tipconpub);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiregforpagconts() as $relObj) {
				$copyObj->addLiregforpagcont($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactforpags() as $relObj) {
				$copyObj->addLidetactforpag($relObj->copy($deepCopy));
			}

			foreach($this->getLiactass() as $relObj) {
				$copyObj->addLiactas($relObj->copy($deepCopy));
			}

			foreach($this->getLiregfiaconts() as $relObj) {
				$copyObj->addLiregfiacont($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactfiaconts() as $relObj) {
				$copyObj->addLidetactfiacont($relObj->copy($deepCopy));
			}

			foreach($this->getLivaluacioness() as $relObj) {
				$copyObj->addLivaluaciones($relObj->copy($deepCopy));
			}

			foreach($this->getLientregass() as $relObj) {
				$copyObj->addLientregas($relObj->copy($deepCopy));
			}

			foreach($this->getLidetcroentcontobs() as $relObj) {
				$copyObj->addLidetcroentcontob($relObj->copy($deepCopy));
			}

			foreach($this->getLiactdesconts() as $relObj) {
				$copyObj->addLiactdescont($relObj->copy($deepCopy));
			}

			foreach($this->getLisolpags() as $relObj) {
				$copyObj->addLisolpag($relObj->copy($deepCopy));
			}

			foreach($this->getLipenalizacioness() as $relObj) {
				$copyObj->addLipenalizaciones($relObj->copy($deepCopy));
			}

			foreach($this->getLiregcondets() as $relObj) {
				$copyObj->addLiregcondet($relObj->copy($deepCopy));
			}

			foreach($this->getLiregconrgos() as $relObj) {
				$copyObj->addLiregconrgo($relObj->copy($deepCopy));
			}

			foreach($this->getLimodconts() as $relObj) {
				$copyObj->addLimodcont($relObj->copy($deepCopy));
			}

			foreach($this->getLiaddendums() as $relObj) {
				$copyObj->addLiaddendum($relObj->copy($deepCopy));
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
			self::$peer = new LicontratPeer();
		}
		return self::$peer;
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

	
	public function initLiregforpagconts()
	{
		if ($this->collLiregforpagconts === null) {
			$this->collLiregforpagconts = array();
		}
	}

	
	public function getLiregforpagconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregforpagcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregforpagconts === null) {
			if ($this->isNew()) {
			   $this->collLiregforpagconts = array();
			} else {

				$criteria->add(LiregforpagcontPeer::NUMCONT, $this->getNumcont());

				LiregforpagcontPeer::addSelectColumns($criteria);
				$this->collLiregforpagconts = LiregforpagcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregforpagcontPeer::NUMCONT, $this->getNumcont());

				LiregforpagcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregforpagcontCriteria) || !$this->lastLiregforpagcontCriteria->equals($criteria)) {
					$this->collLiregforpagconts = LiregforpagcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregforpagcontCriteria = $criteria;
		return $this->collLiregforpagconts;
	}

	
	public function countLiregforpagconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregforpagcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregforpagcontPeer::NUMCONT, $this->getNumcont());

		return LiregforpagcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregforpagcont(Liregforpagcont $l)
	{
		$this->collLiregforpagconts[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLiregforpagcontsJoinLiforpag($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregforpagcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregforpagconts === null) {
			if ($this->isNew()) {
				$this->collLiregforpagconts = array();
			} else {

				$criteria->add(LiregforpagcontPeer::NUMCONT, $this->getNumcont());

				$this->collLiregforpagconts = LiregforpagcontPeer::doSelectJoinLiforpag($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregforpagcontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiregforpagcontCriteria) || !$this->lastLiregforpagcontCriteria->equals($criteria)) {
				$this->collLiregforpagconts = LiregforpagcontPeer::doSelectJoinLiforpag($criteria, $con);
			}
		}
		$this->lastLiregforpagcontCriteria = $criteria;

		return $this->collLiregforpagconts;
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

				$criteria->add(LidetactforpagPeer::NUMCONT, $this->getNumcont());

				LidetactforpagPeer::addSelectColumns($criteria);
				$this->collLidetactforpags = LidetactforpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactforpagPeer::NUMCONT, $this->getNumcont());

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

		$criteria->add(LidetactforpagPeer::NUMCONT, $this->getNumcont());

		return LidetactforpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactforpag(Lidetactforpag $l)
	{
		$this->collLidetactforpags[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLidetactforpagsJoinLiactas($criteria = null, $con = null)
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

				$criteria->add(LidetactforpagPeer::NUMCONT, $this->getNumcont());

				$this->collLidetactforpags = LidetactforpagPeer::doSelectJoinLiactas($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactforpagPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLidetactforpagCriteria) || !$this->lastLidetactforpagCriteria->equals($criteria)) {
				$this->collLidetactforpags = LidetactforpagPeer::doSelectJoinLiactas($criteria, $con);
			}
		}
		$this->lastLidetactforpagCriteria = $criteria;

		return $this->collLidetactforpags;
	}

	
	public function initLiactass()
	{
		if ($this->collLiactass === null) {
			$this->collLiactass = array();
		}
	}

	
	public function getLiactass($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactass === null) {
			if ($this->isNew()) {
			   $this->collLiactass = array();
			} else {

				$criteria->add(LiactasPeer::NUMCONT, $this->getNumcont());

				LiactasPeer::addSelectColumns($criteria);
				$this->collLiactass = LiactasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiactasPeer::NUMCONT, $this->getNumcont());

				LiactasPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
					$this->collLiactass = LiactasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiactasCriteria = $criteria;
		return $this->collLiactass;
	}

	
	public function countLiactass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiactasPeer::NUMCONT, $this->getNumcont());

		return LiactasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiactas(Liactas $l)
	{
		$this->collLiactass[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLiactassJoinLitipact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactass === null) {
			if ($this->isNew()) {
				$this->collLiactass = array();
			} else {

				$criteria->add(LiactasPeer::NUMCONT, $this->getNumcont());

				$this->collLiactass = LiactasPeer::doSelectJoinLitipact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
				$this->collLiactass = LiactasPeer::doSelectJoinLitipact($criteria, $con);
			}
		}
		$this->lastLiactasCriteria = $criteria;

		return $this->collLiactass;
	}


	
	public function getLiactassJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactass === null) {
			if ($this->isNew()) {
				$this->collLiactass = array();
			} else {

				$criteria->add(LiactasPeer::NUMCONT, $this->getNumcont());

				$this->collLiactass = LiactasPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
				$this->collLiactass = LiactasPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLiactasCriteria = $criteria;

		return $this->collLiactass;
	}


	
	public function getLiactassJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactass === null) {
			if ($this->isNew()) {
				$this->collLiactass = array();
			} else {

				$criteria->add(LiactasPeer::NUMCONT, $this->getNumcont());

				$this->collLiactass = LiactasPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
				$this->collLiactass = LiactasPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLiactasCriteria = $criteria;

		return $this->collLiactass;
	}


	
	public function getLiactassJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactass === null) {
			if ($this->isNew()) {
				$this->collLiactass = array();
			} else {

				$criteria->add(LiactasPeer::NUMCONT, $this->getNumcont());

				$this->collLiactass = LiactasPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
				$this->collLiactass = LiactasPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiactasCriteria = $criteria;

		return $this->collLiactass;
	}

	
	public function initLiregfiaconts()
	{
		if ($this->collLiregfiaconts === null) {
			$this->collLiregfiaconts = array();
		}
	}

	
	public function getLiregfiaconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregfiacontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregfiaconts === null) {
			if ($this->isNew()) {
			   $this->collLiregfiaconts = array();
			} else {

				$criteria->add(LiregfiacontPeer::NUMCONT, $this->getNumcont());

				LiregfiacontPeer::addSelectColumns($criteria);
				$this->collLiregfiaconts = LiregfiacontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregfiacontPeer::NUMCONT, $this->getNumcont());

				LiregfiacontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregfiacontCriteria) || !$this->lastLiregfiacontCriteria->equals($criteria)) {
					$this->collLiregfiaconts = LiregfiacontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregfiacontCriteria = $criteria;
		return $this->collLiregfiaconts;
	}

	
	public function countLiregfiaconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregfiacontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregfiacontPeer::NUMCONT, $this->getNumcont());

		return LiregfiacontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregfiacont(Liregfiacont $l)
	{
		$this->collLiregfiaconts[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLiregfiacontsJoinLiccomres($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregfiacontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregfiaconts === null) {
			if ($this->isNew()) {
				$this->collLiregfiaconts = array();
			} else {

				$criteria->add(LiregfiacontPeer::NUMCONT, $this->getNumcont());

				$this->collLiregfiaconts = LiregfiacontPeer::doSelectJoinLiccomres($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregfiacontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiregfiacontCriteria) || !$this->lastLiregfiacontCriteria->equals($criteria)) {
				$this->collLiregfiaconts = LiregfiacontPeer::doSelectJoinLiccomres($criteria, $con);
			}
		}
		$this->lastLiregfiacontCriteria = $criteria;

		return $this->collLiregfiaconts;
	}


	
	public function getLiregfiacontsJoinLiregofefia($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregfiacontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregfiaconts === null) {
			if ($this->isNew()) {
				$this->collLiregfiaconts = array();
			} else {

				$criteria->add(LiregfiacontPeer::NUMCONT, $this->getNumcont());

				$this->collLiregfiaconts = LiregfiacontPeer::doSelectJoinLiregofefia($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregfiacontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiregfiacontCriteria) || !$this->lastLiregfiacontCriteria->equals($criteria)) {
				$this->collLiregfiaconts = LiregfiacontPeer::doSelectJoinLiregofefia($criteria, $con);
			}
		}
		$this->lastLiregfiacontCriteria = $criteria;

		return $this->collLiregfiaconts;
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

				$criteria->add(LidetactfiacontPeer::NUMCONT, $this->getNumcont());

				LidetactfiacontPeer::addSelectColumns($criteria);
				$this->collLidetactfiaconts = LidetactfiacontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactfiacontPeer::NUMCONT, $this->getNumcont());

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

		$criteria->add(LidetactfiacontPeer::NUMCONT, $this->getNumcont());

		return LidetactfiacontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactfiacont(Lidetactfiacont $l)
	{
		$this->collLidetactfiaconts[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLidetactfiacontsJoinLiactas($criteria = null, $con = null)
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

				$criteria->add(LidetactfiacontPeer::NUMCONT, $this->getNumcont());

				$this->collLidetactfiaconts = LidetactfiacontPeer::doSelectJoinLiactas($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactfiacontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLidetactfiacontCriteria) || !$this->lastLidetactfiacontCriteria->equals($criteria)) {
				$this->collLidetactfiaconts = LidetactfiacontPeer::doSelectJoinLiactas($criteria, $con);
			}
		}
		$this->lastLidetactfiacontCriteria = $criteria;

		return $this->collLidetactfiaconts;
	}

	
	public function initLivaluacioness()
	{
		if ($this->collLivaluacioness === null) {
			$this->collLivaluacioness = array();
		}
	}

	
	public function getLivaluacioness($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLivaluacioness === null) {
			if ($this->isNew()) {
			   $this->collLivaluacioness = array();
			} else {

				$criteria->add(LivaluacionesPeer::NUMCONT, $this->getNumcont());

				LivaluacionesPeer::addSelectColumns($criteria);
				$this->collLivaluacioness = LivaluacionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LivaluacionesPeer::NUMCONT, $this->getNumcont());

				LivaluacionesPeer::addSelectColumns($criteria);
				if (!isset($this->lastLivaluacionesCriteria) || !$this->lastLivaluacionesCriteria->equals($criteria)) {
					$this->collLivaluacioness = LivaluacionesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLivaluacionesCriteria = $criteria;
		return $this->collLivaluacioness;
	}

	
	public function countLivaluacioness($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LivaluacionesPeer::NUMCONT, $this->getNumcont());

		return LivaluacionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLivaluaciones(Livaluaciones $l)
	{
		$this->collLivaluacioness[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLivaluacionessJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLivaluacioness === null) {
			if ($this->isNew()) {
				$this->collLivaluacioness = array();
			} else {

				$criteria->add(LivaluacionesPeer::NUMCONT, $this->getNumcont());

				$this->collLivaluacioness = LivaluacionesPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LivaluacionesPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLivaluacionesCriteria) || !$this->lastLivaluacionesCriteria->equals($criteria)) {
				$this->collLivaluacioness = LivaluacionesPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLivaluacionesCriteria = $criteria;

		return $this->collLivaluacioness;
	}


	
	public function getLivaluacionessJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLivaluacioness === null) {
			if ($this->isNew()) {
				$this->collLivaluacioness = array();
			} else {

				$criteria->add(LivaluacionesPeer::NUMCONT, $this->getNumcont());

				$this->collLivaluacioness = LivaluacionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LivaluacionesPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLivaluacionesCriteria) || !$this->lastLivaluacionesCriteria->equals($criteria)) {
				$this->collLivaluacioness = LivaluacionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLivaluacionesCriteria = $criteria;

		return $this->collLivaluacioness;
	}


	
	public function getLivaluacionessJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLivaluacioness === null) {
			if ($this->isNew()) {
				$this->collLivaluacioness = array();
			} else {

				$criteria->add(LivaluacionesPeer::NUMCONT, $this->getNumcont());

				$this->collLivaluacioness = LivaluacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LivaluacionesPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLivaluacionesCriteria) || !$this->lastLivaluacionesCriteria->equals($criteria)) {
				$this->collLivaluacioness = LivaluacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLivaluacionesCriteria = $criteria;

		return $this->collLivaluacioness;
	}

	
	public function initLientregass()
	{
		if ($this->collLientregass === null) {
			$this->collLientregass = array();
		}
	}

	
	public function getLientregass($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLientregass === null) {
			if ($this->isNew()) {
			   $this->collLientregass = array();
			} else {

				$criteria->add(LientregasPeer::NUMCONT, $this->getNumcont());

				LientregasPeer::addSelectColumns($criteria);
				$this->collLientregass = LientregasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LientregasPeer::NUMCONT, $this->getNumcont());

				LientregasPeer::addSelectColumns($criteria);
				if (!isset($this->lastLientregasCriteria) || !$this->lastLientregasCriteria->equals($criteria)) {
					$this->collLientregass = LientregasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLientregasCriteria = $criteria;
		return $this->collLientregass;
	}

	
	public function countLientregass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LientregasPeer::NUMCONT, $this->getNumcont());

		return LientregasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLientregas(Lientregas $l)
	{
		$this->collLientregass[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLientregassJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLientregass === null) {
			if ($this->isNew()) {
				$this->collLientregass = array();
			} else {

				$criteria->add(LientregasPeer::NUMCONT, $this->getNumcont());

				$this->collLientregass = LientregasPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LientregasPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLientregasCriteria) || !$this->lastLientregasCriteria->equals($criteria)) {
				$this->collLientregass = LientregasPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLientregasCriteria = $criteria;

		return $this->collLientregass;
	}


	
	public function getLientregassJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLientregass === null) {
			if ($this->isNew()) {
				$this->collLientregass = array();
			} else {

				$criteria->add(LientregasPeer::NUMCONT, $this->getNumcont());

				$this->collLientregass = LientregasPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LientregasPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLientregasCriteria) || !$this->lastLientregasCriteria->equals($criteria)) {
				$this->collLientregass = LientregasPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLientregasCriteria = $criteria;

		return $this->collLientregass;
	}


	
	public function getLientregassJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLientregass === null) {
			if ($this->isNew()) {
				$this->collLientregass = array();
			} else {

				$criteria->add(LientregasPeer::NUMCONT, $this->getNumcont());

				$this->collLientregass = LientregasPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LientregasPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLientregasCriteria) || !$this->lastLientregasCriteria->equals($criteria)) {
				$this->collLientregass = LientregasPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLientregasCriteria = $criteria;

		return $this->collLientregass;
	}

	
	public function initLidetcroentcontobs()
	{
		if ($this->collLidetcroentcontobs === null) {
			$this->collLidetcroentcontobs = array();
		}
	}

	
	public function getLidetcroentcontobs($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentcontobs === null) {
			if ($this->isNew()) {
			   $this->collLidetcroentcontobs = array();
			} else {

				$criteria->add(LidetcroentcontobPeer::NUMCONT, $this->getNumcont());

				LidetcroentcontobPeer::addSelectColumns($criteria);
				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetcroentcontobPeer::NUMCONT, $this->getNumcont());

				LidetcroentcontobPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetcroentcontobCriteria) || !$this->lastLidetcroentcontobCriteria->equals($criteria)) {
					$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetcroentcontobCriteria = $criteria;
		return $this->collLidetcroentcontobs;
	}

	
	public function countLidetcroentcontobs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetcroentcontobPeer::NUMCONT, $this->getNumcont());

		return LidetcroentcontobPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetcroentcontob(Lidetcroentcontob $l)
	{
		$this->collLidetcroentcontobs[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLidetcroentcontobsJoinLiuniadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentcontobs === null) {
			if ($this->isNew()) {
				$this->collLidetcroentcontobs = array();
			} else {

				$criteria->add(LidetcroentcontobPeer::NUMCONT, $this->getNumcont());

				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentcontobPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLidetcroentcontobCriteria) || !$this->lastLidetcroentcontobCriteria->equals($criteria)) {
				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		}
		$this->lastLidetcroentcontobCriteria = $criteria;

		return $this->collLidetcroentcontobs;
	}


	
	public function getLidetcroentcontobsJoinLicroent($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentcontobs === null) {
			if ($this->isNew()) {
				$this->collLidetcroentcontobs = array();
			} else {

				$criteria->add(LidetcroentcontobPeer::NUMCONT, $this->getNumcont());

				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLicroent($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentcontobPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLidetcroentcontobCriteria) || !$this->lastLidetcroentcontobCriteria->equals($criteria)) {
				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLicroent($criteria, $con);
			}
		}
		$this->lastLidetcroentcontobCriteria = $criteria;

		return $this->collLidetcroentcontobs;
	}

	
	public function initLiactdesconts()
	{
		if ($this->collLiactdesconts === null) {
			$this->collLiactdesconts = array();
		}
	}

	
	public function getLiactdesconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactdesconts === null) {
			if ($this->isNew()) {
			   $this->collLiactdesconts = array();
			} else {

				$criteria->add(LiactdescontPeer::NUMCONT, $this->getNumcont());

				LiactdescontPeer::addSelectColumns($criteria);
				$this->collLiactdesconts = LiactdescontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiactdescontPeer::NUMCONT, $this->getNumcont());

				LiactdescontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiactdescontCriteria) || !$this->lastLiactdescontCriteria->equals($criteria)) {
					$this->collLiactdesconts = LiactdescontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiactdescontCriteria = $criteria;
		return $this->collLiactdesconts;
	}

	
	public function countLiactdesconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiactdescontPeer::NUMCONT, $this->getNumcont());

		return LiactdescontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiactdescont(Liactdescont $l)
	{
		$this->collLiactdesconts[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLiactdescontsJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactdesconts === null) {
			if ($this->isNew()) {
				$this->collLiactdesconts = array();
			} else {

				$criteria->add(LiactdescontPeer::NUMCONT, $this->getNumcont());

				$this->collLiactdesconts = LiactdescontPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactdescontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiactdescontCriteria) || !$this->lastLiactdescontCriteria->equals($criteria)) {
				$this->collLiactdesconts = LiactdescontPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLiactdescontCriteria = $criteria;

		return $this->collLiactdesconts;
	}


	
	public function getLiactdescontsJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactdesconts === null) {
			if ($this->isNew()) {
				$this->collLiactdesconts = array();
			} else {

				$criteria->add(LiactdescontPeer::NUMCONT, $this->getNumcont());

				$this->collLiactdesconts = LiactdescontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactdescontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiactdescontCriteria) || !$this->lastLiactdescontCriteria->equals($criteria)) {
				$this->collLiactdesconts = LiactdescontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLiactdescontCriteria = $criteria;

		return $this->collLiactdesconts;
	}


	
	public function getLiactdescontsJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactdesconts === null) {
			if ($this->isNew()) {
				$this->collLiactdesconts = array();
			} else {

				$criteria->add(LiactdescontPeer::NUMCONT, $this->getNumcont());

				$this->collLiactdesconts = LiactdescontPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactdescontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiactdescontCriteria) || !$this->lastLiactdescontCriteria->equals($criteria)) {
				$this->collLiactdesconts = LiactdescontPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiactdescontCriteria = $criteria;

		return $this->collLiactdesconts;
	}

	
	public function initLisolpags()
	{
		if ($this->collLisolpags === null) {
			$this->collLisolpags = array();
		}
	}

	
	public function getLisolpags($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpags === null) {
			if ($this->isNew()) {
			   $this->collLisolpags = array();
			} else {

				$criteria->add(LisolpagPeer::NUMCONT, $this->getNumcont());

				LisolpagPeer::addSelectColumns($criteria);
				$this->collLisolpags = LisolpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LisolpagPeer::NUMCONT, $this->getNumcont());

				LisolpagPeer::addSelectColumns($criteria);
				if (!isset($this->lastLisolpagCriteria) || !$this->lastLisolpagCriteria->equals($criteria)) {
					$this->collLisolpags = LisolpagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLisolpagCriteria = $criteria;
		return $this->collLisolpags;
	}

	
	public function countLisolpags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LisolpagPeer::NUMCONT, $this->getNumcont());

		return LisolpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLisolpag(Lisolpag $l)
	{
		$this->collLisolpags[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLisolpagsJoinLivaluaciones($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpags === null) {
			if ($this->isNew()) {
				$this->collLisolpags = array();
			} else {

				$criteria->add(LisolpagPeer::NUMCONT, $this->getNumcont());

				$this->collLisolpags = LisolpagPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLisolpagCriteria) || !$this->lastLisolpagCriteria->equals($criteria)) {
				$this->collLisolpags = LisolpagPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		}
		$this->lastLisolpagCriteria = $criteria;

		return $this->collLisolpags;
	}


	
	public function getLisolpagsJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpags === null) {
			if ($this->isNew()) {
				$this->collLisolpags = array();
			} else {

				$criteria->add(LisolpagPeer::NUMCONT, $this->getNumcont());

				$this->collLisolpags = LisolpagPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLisolpagCriteria) || !$this->lastLisolpagCriteria->equals($criteria)) {
				$this->collLisolpags = LisolpagPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLisolpagCriteria = $criteria;

		return $this->collLisolpags;
	}


	
	public function getLisolpagsJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpags === null) {
			if ($this->isNew()) {
				$this->collLisolpags = array();
			} else {

				$criteria->add(LisolpagPeer::NUMCONT, $this->getNumcont());

				$this->collLisolpags = LisolpagPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLisolpagCriteria) || !$this->lastLisolpagCriteria->equals($criteria)) {
				$this->collLisolpags = LisolpagPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLisolpagCriteria = $criteria;

		return $this->collLisolpags;
	}


	
	public function getLisolpagsJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpags === null) {
			if ($this->isNew()) {
				$this->collLisolpags = array();
			} else {

				$criteria->add(LisolpagPeer::NUMCONT, $this->getNumcont());

				$this->collLisolpags = LisolpagPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLisolpagCriteria) || !$this->lastLisolpagCriteria->equals($criteria)) {
				$this->collLisolpags = LisolpagPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLisolpagCriteria = $criteria;

		return $this->collLisolpags;
	}

	
	public function initLipenalizacioness()
	{
		if ($this->collLipenalizacioness === null) {
			$this->collLipenalizacioness = array();
		}
	}

	
	public function getLipenalizacioness($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacioness === null) {
			if ($this->isNew()) {
			   $this->collLipenalizacioness = array();
			} else {

				$criteria->add(LipenalizacionesPeer::NUMCONT, $this->getNumcont());

				LipenalizacionesPeer::addSelectColumns($criteria);
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LipenalizacionesPeer::NUMCONT, $this->getNumcont());

				LipenalizacionesPeer::addSelectColumns($criteria);
				if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
					$this->collLipenalizacioness = LipenalizacionesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;
		return $this->collLipenalizacioness;
	}

	
	public function countLipenalizacioness($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LipenalizacionesPeer::NUMCONT, $this->getNumcont());

		return LipenalizacionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLipenalizaciones(Lipenalizaciones $l)
	{
		$this->collLipenalizacioness[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLipenalizacionessJoinLitippen($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacioness === null) {
			if ($this->isNew()) {
				$this->collLipenalizacioness = array();
			} else {

				$criteria->add(LipenalizacionesPeer::NUMCONT, $this->getNumcont());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLitippen($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLitippen($criteria, $con);
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;

		return $this->collLipenalizacioness;
	}


	
	public function getLipenalizacionessJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacioness === null) {
			if ($this->isNew()) {
				$this->collLipenalizacioness = array();
			} else {

				$criteria->add(LipenalizacionesPeer::NUMCONT, $this->getNumcont());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;

		return $this->collLipenalizacioness;
	}


	
	public function getLipenalizacionessJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacioness === null) {
			if ($this->isNew()) {
				$this->collLipenalizacioness = array();
			} else {

				$criteria->add(LipenalizacionesPeer::NUMCONT, $this->getNumcont());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;

		return $this->collLipenalizacioness;
	}


	
	public function getLipenalizacionessJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacioness === null) {
			if ($this->isNew()) {
				$this->collLipenalizacioness = array();
			} else {

				$criteria->add(LipenalizacionesPeer::NUMCONT, $this->getNumcont());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;

		return $this->collLipenalizacioness;
	}

	
	public function initLiregcondets()
	{
		if ($this->collLiregcondets === null) {
			$this->collLiregcondets = array();
		}
	}

	
	public function getLiregcondets($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregcondetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregcondets === null) {
			if ($this->isNew()) {
			   $this->collLiregcondets = array();
			} else {

				$criteria->add(LiregcondetPeer::NUMCONT, $this->getNumcont());

				LiregcondetPeer::addSelectColumns($criteria);
				$this->collLiregcondets = LiregcondetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregcondetPeer::NUMCONT, $this->getNumcont());

				LiregcondetPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregcondetCriteria) || !$this->lastLiregcondetCriteria->equals($criteria)) {
					$this->collLiregcondets = LiregcondetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregcondetCriteria = $criteria;
		return $this->collLiregcondets;
	}

	
	public function countLiregcondets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregcondetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregcondetPeer::NUMCONT, $this->getNumcont());

		return LiregcondetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregcondet(Liregcondet $l)
	{
		$this->collLiregcondets[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLiregcondetsJoinLiregofedet($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregcondetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregcondets === null) {
			if ($this->isNew()) {
				$this->collLiregcondets = array();
			} else {

				$criteria->add(LiregcondetPeer::NUMCONT, $this->getNumcont());

				$this->collLiregcondets = LiregcondetPeer::doSelectJoinLiregofedet($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregcondetPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiregcondetCriteria) || !$this->lastLiregcondetCriteria->equals($criteria)) {
				$this->collLiregcondets = LiregcondetPeer::doSelectJoinLiregofedet($criteria, $con);
			}
		}
		$this->lastLiregcondetCriteria = $criteria;

		return $this->collLiregcondets;
	}

	
	public function initLiregconrgos()
	{
		if ($this->collLiregconrgos === null) {
			$this->collLiregconrgos = array();
		}
	}

	
	public function getLiregconrgos($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregconrgoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregconrgos === null) {
			if ($this->isNew()) {
			   $this->collLiregconrgos = array();
			} else {

				$criteria->add(LiregconrgoPeer::NUMCONT, $this->getNumcont());

				LiregconrgoPeer::addSelectColumns($criteria);
				$this->collLiregconrgos = LiregconrgoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregconrgoPeer::NUMCONT, $this->getNumcont());

				LiregconrgoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregconrgoCriteria) || !$this->lastLiregconrgoCriteria->equals($criteria)) {
					$this->collLiregconrgos = LiregconrgoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregconrgoCriteria = $criteria;
		return $this->collLiregconrgos;
	}

	
	public function countLiregconrgos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregconrgoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregconrgoPeer::NUMCONT, $this->getNumcont());

		return LiregconrgoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregconrgo(Liregconrgo $l)
	{
		$this->collLiregconrgos[] = $l;
		$l->setLicontrat($this);
	}

	
	public function initLimodconts()
	{
		if ($this->collLimodconts === null) {
			$this->collLimodconts = array();
		}
	}

	
	public function getLimodconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodconts === null) {
			if ($this->isNew()) {
			   $this->collLimodconts = array();
			} else {

				$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

				LimodcontPeer::addSelectColumns($criteria);
				$this->collLimodconts = LimodcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

				LimodcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLimodcontCriteria) || !$this->lastLimodcontCriteria->equals($criteria)) {
					$this->collLimodconts = LimodcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLimodcontCriteria = $criteria;
		return $this->collLimodconts;
	}

	
	public function countLimodconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

		return LimodcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLimodcont(Limodcont $l)
	{
		$this->collLimodconts[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLimodcontsJoinLitipmodRelatedByTipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodconts === null) {
			if ($this->isNew()) {
				$this->collLimodconts = array();
			} else {

				$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

				$this->collLimodconts = LimodcontPeer::doSelectJoinLitipmodRelatedByTipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLimodcontCriteria) || !$this->lastLimodcontCriteria->equals($criteria)) {
				$this->collLimodconts = LimodcontPeer::doSelectJoinLitipmodRelatedByTipmod($criteria, $con);
			}
		}
		$this->lastLimodcontCriteria = $criteria;

		return $this->collLimodconts;
	}


	
	public function getLimodcontsJoinLitipmodRelatedByCodtipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodconts === null) {
			if ($this->isNew()) {
				$this->collLimodconts = array();
			} else {

				$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

				$this->collLimodconts = LimodcontPeer::doSelectJoinLitipmodRelatedByCodtipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLimodcontCriteria) || !$this->lastLimodcontCriteria->equals($criteria)) {
				$this->collLimodconts = LimodcontPeer::doSelectJoinLitipmodRelatedByCodtipmod($criteria, $con);
			}
		}
		$this->lastLimodcontCriteria = $criteria;

		return $this->collLimodconts;
	}


	
	public function getLimodcontsJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodconts === null) {
			if ($this->isNew()) {
				$this->collLimodconts = array();
			} else {

				$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

				$this->collLimodconts = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLimodcontCriteria) || !$this->lastLimodcontCriteria->equals($criteria)) {
				$this->collLimodconts = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLimodcontCriteria = $criteria;

		return $this->collLimodconts;
	}


	
	public function getLimodcontsJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodconts === null) {
			if ($this->isNew()) {
				$this->collLimodconts = array();
			} else {

				$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

				$this->collLimodconts = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLimodcontCriteria) || !$this->lastLimodcontCriteria->equals($criteria)) {
				$this->collLimodconts = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLimodcontCriteria = $criteria;

		return $this->collLimodconts;
	}


	
	public function getLimodcontsJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodconts === null) {
			if ($this->isNew()) {
				$this->collLimodconts = array();
			} else {

				$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

				$this->collLimodconts = LimodcontPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLimodcontCriteria) || !$this->lastLimodcontCriteria->equals($criteria)) {
				$this->collLimodconts = LimodcontPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLimodcontCriteria = $criteria;

		return $this->collLimodconts;
	}

	
	public function initLiaddendums()
	{
		if ($this->collLiaddendums === null) {
			$this->collLiaddendums = array();
		}
	}

	
	public function getLiaddendums($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
			   $this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

				LiaddendumPeer::addSelectColumns($criteria);
				$this->collLiaddendums = LiaddendumPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

				LiaddendumPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
					$this->collLiaddendums = LiaddendumPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiaddendumCriteria = $criteria;
		return $this->collLiaddendums;
	}

	
	public function countLiaddendums($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

		return LiaddendumPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiaddendum(Liaddendum $l)
	{
		$this->collLiaddendums[] = $l;
		$l->setLicontrat($this);
	}


	
	public function getLiaddendumsJoinLitipadd($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
				$this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLitipadd($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLitipadd($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}


	
	public function getLiaddendumsJoinLitipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
				$this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLitipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLitipmod($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}


	
	public function getLiaddendumsJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
				$this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}


	
	public function getLiaddendumsJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
				$this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}


	
	public function getLiaddendumsJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendums === null) {
			if ($this->isNew()) {
				$this->collLiaddendums = array();
			} else {

				$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::NUMCONT, $this->getNumcont());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}

} 