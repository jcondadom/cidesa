<?php


abstract class BaseLiaddendum extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numadd;


	
	protected $tipadd;


	
	protected $numcont;


	
	protected $detmod;


	
	protected $codtipmod;


	
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

	
	protected $aLitipadd;

	
	protected $aLicontrat;

	
	protected $aLitipmod;

	
	protected $aLidatstedetRelatedByCodempadm;

	
	protected $aLidatstedetRelatedByCodempeje;

	
	protected $aLisicact;

	
	protected $collLiregaddcondets;

	
	protected $lastLiregaddcondetCriteria = null;

	
	protected $collLidetactadds;

	
	protected $lastLidetactaddCriteria = null;

	
	protected $collLidetcroentaddconts;

	
	protected $lastLidetcroentaddcontCriteria = null;

	
	protected $collLiregforpagaddconts;

	
	protected $lastLiregforpagaddcontCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumadd()
  {

    return trim($this->numadd);

  }
  
  public function getTipadd()
  {

    return trim($this->tipadd);

  }
  
  public function getNumcont()
  {

    return trim($this->numcont);

  }
  
  public function getDetmod()
  {

    return trim($this->detmod);

  }
  
  public function getCodtipmod()
  {

    return $this->codtipmod;

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
	
	public function setNumadd($v)
	{

    if ($this->numadd !== $v) {
        $this->numadd = $v;
        $this->modifiedColumns[] = LiaddendumPeer::NUMADD;
      }
  
	} 
	
	public function setTipadd($v)
	{

    if ($this->tipadd !== $v) {
        $this->tipadd = $v;
        $this->modifiedColumns[] = LiaddendumPeer::TIPADD;
      }
  
		if ($this->aLitipadd !== null && $this->aLitipadd->getCodtipadd() !== $v) {
			$this->aLitipadd = null;
		}

	} 
	
	public function setNumcont($v)
	{

    if ($this->numcont !== $v) {
        $this->numcont = $v;
        $this->modifiedColumns[] = LiaddendumPeer::NUMCONT;
      }
  
		if ($this->aLicontrat !== null && $this->aLicontrat->getNumcont() !== $v) {
			$this->aLicontrat = null;
		}

	} 
	
	public function setDetmod($v)
	{

    if ($this->detmod !== $v) {
        $this->detmod = $v;
        $this->modifiedColumns[] = LiaddendumPeer::DETMOD;
      }
  
	} 
	
	public function setCodtipmod($v)
	{

    if ($this->codtipmod !== $v) {
        $this->codtipmod = $v;
        $this->modifiedColumns[] = LiaddendumPeer::CODTIPMOD;
      }
  
		if ($this->aLitipmod !== null && $this->aLitipmod->getCodtipmod() !== $v) {
			$this->aLitipmod = null;
		}

	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LiaddendumPeer::CODEMPADM;
      }
  
		if ($this->aLidatstedetRelatedByCodempadm !== null && $this->aLidatstedetRelatedByCodempadm->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempadm = null;
		}

	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LiaddendumPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LiaddendumPeer::CODEMPEJE;
      }
  
		if ($this->aLidatstedetRelatedByCodempeje !== null && $this->aLidatstedetRelatedByCodempeje->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempeje = null;
		}

	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LiaddendumPeer::CODUNISTE;
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
      $this->modifiedColumns[] = LiaddendumPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LiaddendumPeer::DIAS;
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
      $this->modifiedColumns[] = LiaddendumPeer::FECVEN;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LiaddendumPeer::STATUS;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LiaddendumPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LiaddendumPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LiaddendumPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LiaddendumPeer::PREPOR;
      }
  
	} 
	
	public function setPreporcar($v)
	{

    if ($this->preporcar !== $v) {
        $this->preporcar = $v;
        $this->modifiedColumns[] = LiaddendumPeer::PREPORCAR;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LiaddendumPeer::LISICACT_ID;
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
      $this->modifiedColumns[] = LiaddendumPeer::FECDECLA;
    }

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LiaddendumPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LiaddendumPeer::ANAPOR;
      }
  
	} 
	
	public function setAnaporcar($v)
	{

    if ($this->anaporcar !== $v) {
        $this->anaporcar = $v;
        $this->modifiedColumns[] = LiaddendumPeer::ANAPORCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiaddendumPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numadd = $rs->getString($startcol + 0);

      $this->tipadd = $rs->getString($startcol + 1);

      $this->numcont = $rs->getString($startcol + 2);

      $this->detmod = $rs->getString($startcol + 3);

      $this->codtipmod = $rs->getInt($startcol + 4);

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
      throw new PropelException("Error populating Liaddendum object", $e);
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
			$con = Propel::getConnection(LiaddendumPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiaddendumPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiaddendumPeer::DATABASE_NAME);
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


												
			if ($this->aLitipadd !== null) {
				if ($this->aLitipadd->isModified()) {
					$affectedRows += $this->aLitipadd->save($con);
				}
				$this->setLitipadd($this->aLitipadd);
			}

			if ($this->aLicontrat !== null) {
				if ($this->aLicontrat->isModified()) {
					$affectedRows += $this->aLicontrat->save($con);
				}
				$this->setLicontrat($this->aLicontrat);
			}

			if ($this->aLitipmod !== null) {
				if ($this->aLitipmod->isModified()) {
					$affectedRows += $this->aLitipmod->save($con);
				}
				$this->setLitipmod($this->aLitipmod);
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
					$pk = LiaddendumPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiaddendumPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiregaddcondets !== null) {
				foreach($this->collLiregaddcondets as $referrerFK) {
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

			if ($this->collLidetcroentaddconts !== null) {
				foreach($this->collLidetcroentaddconts as $referrerFK) {
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


												
			if ($this->aLitipadd !== null) {
				if (!$this->aLitipadd->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLitipadd->getValidationFailures());
				}
			}

			if ($this->aLicontrat !== null) {
				if (!$this->aLicontrat->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLicontrat->getValidationFailures());
				}
			}

			if ($this->aLitipmod !== null) {
				if (!$this->aLitipmod->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLitipmod->getValidationFailures());
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


			if (($retval = LiaddendumPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiregaddcondets !== null) {
					foreach($this->collLiregaddcondets as $referrerFK) {
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

				if ($this->collLidetcroentaddconts !== null) {
					foreach($this->collLidetcroentaddconts as $referrerFK) {
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
		$pos = LiaddendumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumadd();
				break;
			case 1:
				return $this->getTipadd();
				break;
			case 2:
				return $this->getNumcont();
				break;
			case 3:
				return $this->getDetmod();
				break;
			case 4:
				return $this->getCodtipmod();
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
		$keys = LiaddendumPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumadd(),
			$keys[1] => $this->getTipadd(),
			$keys[2] => $this->getNumcont(),
			$keys[3] => $this->getDetmod(),
			$keys[4] => $this->getCodtipmod(),
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
		$pos = LiaddendumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumadd($value);
				break;
			case 1:
				$this->setTipadd($value);
				break;
			case 2:
				$this->setNumcont($value);
				break;
			case 3:
				$this->setDetmod($value);
				break;
			case 4:
				$this->setCodtipmod($value);
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
		$keys = LiaddendumPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumadd($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipadd($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumcont($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDetmod($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodtipmod($arr[$keys[4]]);
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
		$criteria = new Criteria(LiaddendumPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiaddendumPeer::NUMADD)) $criteria->add(LiaddendumPeer::NUMADD, $this->numadd);
		if ($this->isColumnModified(LiaddendumPeer::TIPADD)) $criteria->add(LiaddendumPeer::TIPADD, $this->tipadd);
		if ($this->isColumnModified(LiaddendumPeer::NUMCONT)) $criteria->add(LiaddendumPeer::NUMCONT, $this->numcont);
		if ($this->isColumnModified(LiaddendumPeer::DETMOD)) $criteria->add(LiaddendumPeer::DETMOD, $this->detmod);
		if ($this->isColumnModified(LiaddendumPeer::CODTIPMOD)) $criteria->add(LiaddendumPeer::CODTIPMOD, $this->codtipmod);
		if ($this->isColumnModified(LiaddendumPeer::CODEMPADM)) $criteria->add(LiaddendumPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LiaddendumPeer::CODUNIADM)) $criteria->add(LiaddendumPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LiaddendumPeer::CODEMPEJE)) $criteria->add(LiaddendumPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LiaddendumPeer::CODUNISTE)) $criteria->add(LiaddendumPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LiaddendumPeer::FECREG)) $criteria->add(LiaddendumPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LiaddendumPeer::DIAS)) $criteria->add(LiaddendumPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LiaddendumPeer::FECVEN)) $criteria->add(LiaddendumPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LiaddendumPeer::STATUS)) $criteria->add(LiaddendumPeer::STATUS, $this->status);
		if ($this->isColumnModified(LiaddendumPeer::DOCANE1)) $criteria->add(LiaddendumPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LiaddendumPeer::DOCANE2)) $criteria->add(LiaddendumPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LiaddendumPeer::DOCANE3)) $criteria->add(LiaddendumPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LiaddendumPeer::PREPOR)) $criteria->add(LiaddendumPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LiaddendumPeer::PREPORCAR)) $criteria->add(LiaddendumPeer::PREPORCAR, $this->preporcar);
		if ($this->isColumnModified(LiaddendumPeer::LISICACT_ID)) $criteria->add(LiaddendumPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LiaddendumPeer::FECDECLA)) $criteria->add(LiaddendumPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LiaddendumPeer::DETDECMOD)) $criteria->add(LiaddendumPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LiaddendumPeer::ANAPOR)) $criteria->add(LiaddendumPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LiaddendumPeer::ANAPORCAR)) $criteria->add(LiaddendumPeer::ANAPORCAR, $this->anaporcar);
		if ($this->isColumnModified(LiaddendumPeer::ID)) $criteria->add(LiaddendumPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiaddendumPeer::DATABASE_NAME);

		$criteria->add(LiaddendumPeer::ID, $this->id);

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

		$copyObj->setNumadd($this->numadd);

		$copyObj->setTipadd($this->tipadd);

		$copyObj->setNumcont($this->numcont);

		$copyObj->setDetmod($this->detmod);

		$copyObj->setCodtipmod($this->codtipmod);

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

			foreach($this->getLiregaddcondets() as $relObj) {
				$copyObj->addLiregaddcondet($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactadds() as $relObj) {
				$copyObj->addLidetactadd($relObj->copy($deepCopy));
			}

			foreach($this->getLidetcroentaddconts() as $relObj) {
				$copyObj->addLidetcroentaddcont($relObj->copy($deepCopy));
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
			self::$peer = new LiaddendumPeer();
		}
		return self::$peer;
	}

	
	public function setLitipadd($v)
	{


		if ($v === null) {
			$this->setTipadd(NULL);
		} else {
			$this->setTipadd($v->getCodtipadd());
		}


		$this->aLitipadd = $v;
	}


	
	public function getLitipadd($con = null)
	{
		if ($this->aLitipadd === null && (($this->tipadd !== "" && $this->tipadd !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLitipaddPeer.php';

      $c = new Criteria();
      $c->add(LitipaddPeer::CODTIPADD,$this->tipadd);
      
			$this->aLitipadd = LitipaddPeer::doSelectOne($c, $con);

			
		}
		return $this->aLitipadd;
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

	
	public function setLitipmod($v)
	{


		if ($v === null) {
			$this->setCodtipmod(NULL);
		} else {
			$this->setCodtipmod($v->getCodtipmod());
		}


		$this->aLitipmod = $v;
	}


	
	public function getLitipmod($con = null)
	{
		if ($this->aLitipmod === null && ($this->codtipmod !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLitipmodPeer.php';

      $c = new Criteria();
      $c->add(LitipmodPeer::CODTIPMOD,$this->codtipmod);
      
			$this->aLitipmod = LitipmodPeer::doSelectOne($c, $con);

			
		}
		return $this->aLitipmod;
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

	
	public function initLiregaddcondets()
	{
		if ($this->collLiregaddcondets === null) {
			$this->collLiregaddcondets = array();
		}
	}

	
	public function getLiregaddcondets($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregaddcondetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregaddcondets === null) {
			if ($this->isNew()) {
			   $this->collLiregaddcondets = array();
			} else {

				$criteria->add(LiregaddcondetPeer::NUMADD, $this->getNumadd());

				LiregaddcondetPeer::addSelectColumns($criteria);
				$this->collLiregaddcondets = LiregaddcondetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregaddcondetPeer::NUMADD, $this->getNumadd());

				LiregaddcondetPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregaddcondetCriteria) || !$this->lastLiregaddcondetCriteria->equals($criteria)) {
					$this->collLiregaddcondets = LiregaddcondetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregaddcondetCriteria = $criteria;
		return $this->collLiregaddcondets;
	}

	
	public function countLiregaddcondets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregaddcondetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregaddcondetPeer::NUMADD, $this->getNumadd());

		return LiregaddcondetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregaddcondet(Liregaddcondet $l)
	{
		$this->collLiregaddcondets[] = $l;
		$l->setLiaddendum($this);
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

				$criteria->add(LidetactaddPeer::NUMADD, $this->getNumadd());

				LidetactaddPeer::addSelectColumns($criteria);
				$this->collLidetactadds = LidetactaddPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactaddPeer::NUMADD, $this->getNumadd());

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

		$criteria->add(LidetactaddPeer::NUMADD, $this->getNumadd());

		return LidetactaddPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactadd(Lidetactadd $l)
	{
		$this->collLidetactadds[] = $l;
		$l->setLiaddendum($this);
	}


	
	public function getLidetactaddsJoinLiactas($criteria = null, $con = null)
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

				$criteria->add(LidetactaddPeer::NUMADD, $this->getNumadd());

				$this->collLidetactadds = LidetactaddPeer::doSelectJoinLiactas($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactaddPeer::NUMADD, $this->getNumadd());

			if (!isset($this->lastLidetactaddCriteria) || !$this->lastLidetactaddCriteria->equals($criteria)) {
				$this->collLidetactadds = LidetactaddPeer::doSelectJoinLiactas($criteria, $con);
			}
		}
		$this->lastLidetactaddCriteria = $criteria;

		return $this->collLidetactadds;
	}

	
	public function initLidetcroentaddconts()
	{
		if ($this->collLidetcroentaddconts === null) {
			$this->collLidetcroentaddconts = array();
		}
	}

	
	public function getLidetcroentaddconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentaddcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentaddconts === null) {
			if ($this->isNew()) {
			   $this->collLidetcroentaddconts = array();
			} else {

				$criteria->add(LidetcroentaddcontPeer::NUMADD, $this->getNumadd());

				LidetcroentaddcontPeer::addSelectColumns($criteria);
				$this->collLidetcroentaddconts = LidetcroentaddcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetcroentaddcontPeer::NUMADD, $this->getNumadd());

				LidetcroentaddcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetcroentaddcontCriteria) || !$this->lastLidetcroentaddcontCriteria->equals($criteria)) {
					$this->collLidetcroentaddconts = LidetcroentaddcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetcroentaddcontCriteria = $criteria;
		return $this->collLidetcroentaddconts;
	}

	
	public function countLidetcroentaddconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentaddcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetcroentaddcontPeer::NUMADD, $this->getNumadd());

		return LidetcroentaddcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetcroentaddcont(Lidetcroentaddcont $l)
	{
		$this->collLidetcroentaddconts[] = $l;
		$l->setLiaddendum($this);
	}


	
	public function getLidetcroentaddcontsJoinLiuniadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentaddcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentaddconts === null) {
			if ($this->isNew()) {
				$this->collLidetcroentaddconts = array();
			} else {

				$criteria->add(LidetcroentaddcontPeer::NUMADD, $this->getNumadd());

				$this->collLidetcroentaddconts = LidetcroentaddcontPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentaddcontPeer::NUMADD, $this->getNumadd());

			if (!isset($this->lastLidetcroentaddcontCriteria) || !$this->lastLidetcroentaddcontCriteria->equals($criteria)) {
				$this->collLidetcroentaddconts = LidetcroentaddcontPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		}
		$this->lastLidetcroentaddcontCriteria = $criteria;

		return $this->collLidetcroentaddconts;
	}


	
	public function getLidetcroentaddcontsJoinLidetcroentcont($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentaddcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentaddconts === null) {
			if ($this->isNew()) {
				$this->collLidetcroentaddconts = array();
			} else {

				$criteria->add(LidetcroentaddcontPeer::NUMADD, $this->getNumadd());

				$this->collLidetcroentaddconts = LidetcroentaddcontPeer::doSelectJoinLidetcroentcont($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentaddcontPeer::NUMADD, $this->getNumadd());

			if (!isset($this->lastLidetcroentaddcontCriteria) || !$this->lastLidetcroentaddcontCriteria->equals($criteria)) {
				$this->collLidetcroentaddconts = LidetcroentaddcontPeer::doSelectJoinLidetcroentcont($criteria, $con);
			}
		}
		$this->lastLidetcroentaddcontCriteria = $criteria;

		return $this->collLidetcroentaddconts;
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

				$criteria->add(LiregforpagaddcontPeer::NUMADD, $this->getNumadd());

				LiregforpagaddcontPeer::addSelectColumns($criteria);
				$this->collLiregforpagaddconts = LiregforpagaddcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregforpagaddcontPeer::NUMADD, $this->getNumadd());

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

		$criteria->add(LiregforpagaddcontPeer::NUMADD, $this->getNumadd());

		return LiregforpagaddcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregforpagaddcont(Liregforpagaddcont $l)
	{
		$this->collLiregforpagaddconts[] = $l;
		$l->setLiaddendum($this);
	}


	
	public function getLiregforpagaddcontsJoinLiregforpagcont($criteria = null, $con = null)
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

				$criteria->add(LiregforpagaddcontPeer::NUMADD, $this->getNumadd());

				$this->collLiregforpagaddconts = LiregforpagaddcontPeer::doSelectJoinLiregforpagcont($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregforpagaddcontPeer::NUMADD, $this->getNumadd());

			if (!isset($this->lastLiregforpagaddcontCriteria) || !$this->lastLiregforpagaddcontCriteria->equals($criteria)) {
				$this->collLiregforpagaddconts = LiregforpagaddcontPeer::doSelectJoinLiregforpagcont($criteria, $con);
			}
		}
		$this->lastLiregforpagaddcontCriteria = $criteria;

		return $this->collLiregforpagaddconts;
	}

} 