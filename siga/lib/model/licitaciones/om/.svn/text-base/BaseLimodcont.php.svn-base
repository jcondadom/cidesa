<?php


abstract class BaseLimodcont extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nummod;


	
	protected $tipmod;


	
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

	
	protected $aLitipmodRelatedByTipmod;

	
	protected $aLicontrat;

	
	protected $aLitipmodRelatedByCodtipmod;

	
	protected $aLidatstedetRelatedByCodempadm;

	
	protected $aLidatstedetRelatedByCodempeje;

	
	protected $aLisicact;

	
	protected $collLiregmodcondets;

	
	protected $lastLiregmodcondetCriteria = null;

	
	protected $collLidetactmods;

	
	protected $lastLidetactmodCriteria = null;

	
	protected $collLidetcroentmodconts;

	
	protected $lastLidetcroentmodcontCriteria = null;

	
	protected $collLiregforpagmodconts;

	
	protected $lastLiregforpagmodcontCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNummod()
  {

    return trim($this->nummod);

  }
  
  public function getTipmod()
  {

    return trim($this->tipmod);

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
	
	public function setNummod($v)
	{

    if ($this->nummod !== $v) {
        $this->nummod = $v;
        $this->modifiedColumns[] = LimodcontPeer::NUMMOD;
      }
  
	} 
	
	public function setTipmod($v)
	{

    if ($this->tipmod !== $v) {
        $this->tipmod = $v;
        $this->modifiedColumns[] = LimodcontPeer::TIPMOD;
      }
  
		if ($this->aLitipmodRelatedByTipmod !== null && $this->aLitipmodRelatedByTipmod->getCodtipmod() !== $v) {
			$this->aLitipmodRelatedByTipmod = null;
		}

	} 
	
	public function setNumcont($v)
	{

    if ($this->numcont !== $v) {
        $this->numcont = $v;
        $this->modifiedColumns[] = LimodcontPeer::NUMCONT;
      }
  
		if ($this->aLicontrat !== null && $this->aLicontrat->getNumcont() !== $v) {
			$this->aLicontrat = null;
		}

	} 
	
	public function setDetmod($v)
	{

    if ($this->detmod !== $v) {
        $this->detmod = $v;
        $this->modifiedColumns[] = LimodcontPeer::DETMOD;
      }
  
	} 
	
	public function setCodtipmod($v)
	{

    if ($this->codtipmod !== $v) {
        $this->codtipmod = $v;
        $this->modifiedColumns[] = LimodcontPeer::CODTIPMOD;
      }
  
		if ($this->aLitipmodRelatedByCodtipmod !== null && $this->aLitipmodRelatedByCodtipmod->getCodtipmod() !== $v) {
			$this->aLitipmodRelatedByCodtipmod = null;
		}

	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LimodcontPeer::CODEMPADM;
      }
  
		if ($this->aLidatstedetRelatedByCodempadm !== null && $this->aLidatstedetRelatedByCodempadm->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempadm = null;
		}

	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LimodcontPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LimodcontPeer::CODEMPEJE;
      }
  
		if ($this->aLidatstedetRelatedByCodempeje !== null && $this->aLidatstedetRelatedByCodempeje->getCodemp() !== $v) {
			$this->aLidatstedetRelatedByCodempeje = null;
		}

	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LimodcontPeer::CODUNISTE;
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
      $this->modifiedColumns[] = LimodcontPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LimodcontPeer::DIAS;
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
      $this->modifiedColumns[] = LimodcontPeer::FECVEN;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LimodcontPeer::STATUS;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LimodcontPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LimodcontPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LimodcontPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LimodcontPeer::PREPOR;
      }
  
	} 
	
	public function setPreporcar($v)
	{

    if ($this->preporcar !== $v) {
        $this->preporcar = $v;
        $this->modifiedColumns[] = LimodcontPeer::PREPORCAR;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LimodcontPeer::LISICACT_ID;
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
      $this->modifiedColumns[] = LimodcontPeer::FECDECLA;
    }

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LimodcontPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LimodcontPeer::ANAPOR;
      }
  
	} 
	
	public function setAnaporcar($v)
	{

    if ($this->anaporcar !== $v) {
        $this->anaporcar = $v;
        $this->modifiedColumns[] = LimodcontPeer::ANAPORCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LimodcontPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nummod = $rs->getString($startcol + 0);

      $this->tipmod = $rs->getString($startcol + 1);

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
      throw new PropelException("Error populating Limodcont object", $e);
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
			$con = Propel::getConnection(LimodcontPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LimodcontPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LimodcontPeer::DATABASE_NAME);
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


												
			if ($this->aLitipmodRelatedByTipmod !== null) {
				if ($this->aLitipmodRelatedByTipmod->isModified()) {
					$affectedRows += $this->aLitipmodRelatedByTipmod->save($con);
				}
				$this->setLitipmodRelatedByTipmod($this->aLitipmodRelatedByTipmod);
			}

			if ($this->aLicontrat !== null) {
				if ($this->aLicontrat->isModified()) {
					$affectedRows += $this->aLicontrat->save($con);
				}
				$this->setLicontrat($this->aLicontrat);
			}

			if ($this->aLitipmodRelatedByCodtipmod !== null) {
				if ($this->aLitipmodRelatedByCodtipmod->isModified()) {
					$affectedRows += $this->aLitipmodRelatedByCodtipmod->save($con);
				}
				$this->setLitipmodRelatedByCodtipmod($this->aLitipmodRelatedByCodtipmod);
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
					$pk = LimodcontPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LimodcontPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiregmodcondets !== null) {
				foreach($this->collLiregmodcondets as $referrerFK) {
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

			if ($this->collLidetcroentmodconts !== null) {
				foreach($this->collLidetcroentmodconts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiregforpagmodconts !== null) {
				foreach($this->collLiregforpagmodconts as $referrerFK) {
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


												
			if ($this->aLitipmodRelatedByTipmod !== null) {
				if (!$this->aLitipmodRelatedByTipmod->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLitipmodRelatedByTipmod->getValidationFailures());
				}
			}

			if ($this->aLicontrat !== null) {
				if (!$this->aLicontrat->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLicontrat->getValidationFailures());
				}
			}

			if ($this->aLitipmodRelatedByCodtipmod !== null) {
				if (!$this->aLitipmodRelatedByCodtipmod->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLitipmodRelatedByCodtipmod->getValidationFailures());
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


			if (($retval = LimodcontPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiregmodcondets !== null) {
					foreach($this->collLiregmodcondets as $referrerFK) {
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

				if ($this->collLidetcroentmodconts !== null) {
					foreach($this->collLidetcroentmodconts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiregforpagmodconts !== null) {
					foreach($this->collLiregforpagmodconts as $referrerFK) {
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
		$pos = LimodcontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNummod();
				break;
			case 1:
				return $this->getTipmod();
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
		$keys = LimodcontPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNummod(),
			$keys[1] => $this->getTipmod(),
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
		$pos = LimodcontPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNummod($value);
				break;
			case 1:
				$this->setTipmod($value);
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
		$keys = LimodcontPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNummod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipmod($arr[$keys[1]]);
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
		$criteria = new Criteria(LimodcontPeer::DATABASE_NAME);

		if ($this->isColumnModified(LimodcontPeer::NUMMOD)) $criteria->add(LimodcontPeer::NUMMOD, $this->nummod);
		if ($this->isColumnModified(LimodcontPeer::TIPMOD)) $criteria->add(LimodcontPeer::TIPMOD, $this->tipmod);
		if ($this->isColumnModified(LimodcontPeer::NUMCONT)) $criteria->add(LimodcontPeer::NUMCONT, $this->numcont);
		if ($this->isColumnModified(LimodcontPeer::DETMOD)) $criteria->add(LimodcontPeer::DETMOD, $this->detmod);
		if ($this->isColumnModified(LimodcontPeer::CODTIPMOD)) $criteria->add(LimodcontPeer::CODTIPMOD, $this->codtipmod);
		if ($this->isColumnModified(LimodcontPeer::CODEMPADM)) $criteria->add(LimodcontPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LimodcontPeer::CODUNIADM)) $criteria->add(LimodcontPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LimodcontPeer::CODEMPEJE)) $criteria->add(LimodcontPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LimodcontPeer::CODUNISTE)) $criteria->add(LimodcontPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LimodcontPeer::FECREG)) $criteria->add(LimodcontPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LimodcontPeer::DIAS)) $criteria->add(LimodcontPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LimodcontPeer::FECVEN)) $criteria->add(LimodcontPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LimodcontPeer::STATUS)) $criteria->add(LimodcontPeer::STATUS, $this->status);
		if ($this->isColumnModified(LimodcontPeer::DOCANE1)) $criteria->add(LimodcontPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LimodcontPeer::DOCANE2)) $criteria->add(LimodcontPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LimodcontPeer::DOCANE3)) $criteria->add(LimodcontPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LimodcontPeer::PREPOR)) $criteria->add(LimodcontPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LimodcontPeer::PREPORCAR)) $criteria->add(LimodcontPeer::PREPORCAR, $this->preporcar);
		if ($this->isColumnModified(LimodcontPeer::LISICACT_ID)) $criteria->add(LimodcontPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LimodcontPeer::FECDECLA)) $criteria->add(LimodcontPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LimodcontPeer::DETDECMOD)) $criteria->add(LimodcontPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LimodcontPeer::ANAPOR)) $criteria->add(LimodcontPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LimodcontPeer::ANAPORCAR)) $criteria->add(LimodcontPeer::ANAPORCAR, $this->anaporcar);
		if ($this->isColumnModified(LimodcontPeer::ID)) $criteria->add(LimodcontPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LimodcontPeer::DATABASE_NAME);

		$criteria->add(LimodcontPeer::ID, $this->id);

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

		$copyObj->setTipmod($this->tipmod);

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

			foreach($this->getLiregmodcondets() as $relObj) {
				$copyObj->addLiregmodcondet($relObj->copy($deepCopy));
			}

			foreach($this->getLidetactmods() as $relObj) {
				$copyObj->addLidetactmod($relObj->copy($deepCopy));
			}

			foreach($this->getLidetcroentmodconts() as $relObj) {
				$copyObj->addLidetcroentmodcont($relObj->copy($deepCopy));
			}

			foreach($this->getLiregforpagmodconts() as $relObj) {
				$copyObj->addLiregforpagmodcont($relObj->copy($deepCopy));
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
			self::$peer = new LimodcontPeer();
		}
		return self::$peer;
	}

	
	public function setLitipmodRelatedByTipmod($v)
	{


		if ($v === null) {
			$this->setTipmod(NULL);
		} else {
			$this->setTipmod($v->getCodtipmod());
		}


		$this->aLitipmodRelatedByTipmod = $v;
	}


	
	public function getLitipmodRelatedByTipmod($con = null)
	{
		if ($this->aLitipmodRelatedByTipmod === null && (($this->tipmod !== "" && $this->tipmod !== null))) {
						include_once 'lib/model/licitaciones/om/BaseLitipmodPeer.php';

      $c = new Criteria();
      $c->add(LitipmodPeer::CODTIPMOD,$this->tipmod);
      
			$this->aLitipmodRelatedByTipmod = LitipmodPeer::doSelectOne($c, $con);

			
		}
		return $this->aLitipmodRelatedByTipmod;
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

	
	public function setLitipmodRelatedByCodtipmod($v)
	{


		if ($v === null) {
			$this->setCodtipmod(NULL);
		} else {
			$this->setCodtipmod($v->getCodtipmod());
		}


		$this->aLitipmodRelatedByCodtipmod = $v;
	}


	
	public function getLitipmodRelatedByCodtipmod($con = null)
	{
		if ($this->aLitipmodRelatedByCodtipmod === null && ($this->codtipmod !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLitipmodPeer.php';

      $c = new Criteria();
      $c->add(LitipmodPeer::CODTIPMOD,$this->codtipmod);
      
			$this->aLitipmodRelatedByCodtipmod = LitipmodPeer::doSelectOne($c, $con);

			
		}
		return $this->aLitipmodRelatedByCodtipmod;
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

				$criteria->add(LiregmodcondetPeer::NUMMOD, $this->getNummod());

				LiregmodcondetPeer::addSelectColumns($criteria);
				$this->collLiregmodcondets = LiregmodcondetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregmodcondetPeer::NUMMOD, $this->getNummod());

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

		$criteria->add(LiregmodcondetPeer::NUMMOD, $this->getNummod());

		return LiregmodcondetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregmodcondet(Liregmodcondet $l)
	{
		$this->collLiregmodcondets[] = $l;
		$l->setLimodcont($this);
	}


	
	public function getLiregmodcondetsJoinLiregcondet($criteria = null, $con = null)
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

				$criteria->add(LiregmodcondetPeer::NUMMOD, $this->getNummod());

				$this->collLiregmodcondets = LiregmodcondetPeer::doSelectJoinLiregcondet($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregmodcondetPeer::NUMMOD, $this->getNummod());

			if (!isset($this->lastLiregmodcondetCriteria) || !$this->lastLiregmodcondetCriteria->equals($criteria)) {
				$this->collLiregmodcondets = LiregmodcondetPeer::doSelectJoinLiregcondet($criteria, $con);
			}
		}
		$this->lastLiregmodcondetCriteria = $criteria;

		return $this->collLiregmodcondets;
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

				$criteria->add(LidetactmodPeer::NUMMOD, $this->getNummod());

				LidetactmodPeer::addSelectColumns($criteria);
				$this->collLidetactmods = LidetactmodPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetactmodPeer::NUMMOD, $this->getNummod());

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

		$criteria->add(LidetactmodPeer::NUMMOD, $this->getNummod());

		return LidetactmodPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetactmod(Lidetactmod $l)
	{
		$this->collLidetactmods[] = $l;
		$l->setLimodcont($this);
	}


	
	public function getLidetactmodsJoinLiactas($criteria = null, $con = null)
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

				$criteria->add(LidetactmodPeer::NUMMOD, $this->getNummod());

				$this->collLidetactmods = LidetactmodPeer::doSelectJoinLiactas($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetactmodPeer::NUMMOD, $this->getNummod());

			if (!isset($this->lastLidetactmodCriteria) || !$this->lastLidetactmodCriteria->equals($criteria)) {
				$this->collLidetactmods = LidetactmodPeer::doSelectJoinLiactas($criteria, $con);
			}
		}
		$this->lastLidetactmodCriteria = $criteria;

		return $this->collLidetactmods;
	}

	
	public function initLidetcroentmodconts()
	{
		if ($this->collLidetcroentmodconts === null) {
			$this->collLidetcroentmodconts = array();
		}
	}

	
	public function getLidetcroentmodconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentmodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentmodconts === null) {
			if ($this->isNew()) {
			   $this->collLidetcroentmodconts = array();
			} else {

				$criteria->add(LidetcroentmodcontPeer::NUMMOD, $this->getNummod());

				LidetcroentmodcontPeer::addSelectColumns($criteria);
				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetcroentmodcontPeer::NUMMOD, $this->getNummod());

				LidetcroentmodcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetcroentmodcontCriteria) || !$this->lastLidetcroentmodcontCriteria->equals($criteria)) {
					$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetcroentmodcontCriteria = $criteria;
		return $this->collLidetcroentmodconts;
	}

	
	public function countLidetcroentmodconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentmodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetcroentmodcontPeer::NUMMOD, $this->getNummod());

		return LidetcroentmodcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetcroentmodcont(Lidetcroentmodcont $l)
	{
		$this->collLidetcroentmodconts[] = $l;
		$l->setLimodcont($this);
	}


	
	public function getLidetcroentmodcontsJoinLiuniadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentmodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentmodconts === null) {
			if ($this->isNew()) {
				$this->collLidetcroentmodconts = array();
			} else {

				$criteria->add(LidetcroentmodcontPeer::NUMMOD, $this->getNummod());

				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentmodcontPeer::NUMMOD, $this->getNummod());

			if (!isset($this->lastLidetcroentmodcontCriteria) || !$this->lastLidetcroentmodcontCriteria->equals($criteria)) {
				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLiuniadm($criteria, $con);
			}
		}
		$this->lastLidetcroentmodcontCriteria = $criteria;

		return $this->collLidetcroentmodconts;
	}


	
	public function getLidetcroentmodcontsJoinLidetcroentcontob($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentmodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentmodconts === null) {
			if ($this->isNew()) {
				$this->collLidetcroentmodconts = array();
			} else {

				$criteria->add(LidetcroentmodcontPeer::NUMMOD, $this->getNummod());

				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLidetcroentcontob($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentmodcontPeer::NUMMOD, $this->getNummod());

			if (!isset($this->lastLidetcroentmodcontCriteria) || !$this->lastLidetcroentmodcontCriteria->equals($criteria)) {
				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLidetcroentcontob($criteria, $con);
			}
		}
		$this->lastLidetcroentmodcontCriteria = $criteria;

		return $this->collLidetcroentmodconts;
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

				$criteria->add(LiregforpagmodcontPeer::NUMMOD, $this->getNummod());

				LiregforpagmodcontPeer::addSelectColumns($criteria);
				$this->collLiregforpagmodconts = LiregforpagmodcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregforpagmodcontPeer::NUMMOD, $this->getNummod());

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

		$criteria->add(LiregforpagmodcontPeer::NUMMOD, $this->getNummod());

		return LiregforpagmodcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregforpagmodcont(Liregforpagmodcont $l)
	{
		$this->collLiregforpagmodconts[] = $l;
		$l->setLimodcont($this);
	}


	
	public function getLiregforpagmodcontsJoinLiregforpagcont($criteria = null, $con = null)
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

				$criteria->add(LiregforpagmodcontPeer::NUMMOD, $this->getNummod());

				$this->collLiregforpagmodconts = LiregforpagmodcontPeer::doSelectJoinLiregforpagcont($criteria, $con);
			}
		} else {
									
			$criteria->add(LiregforpagmodcontPeer::NUMMOD, $this->getNummod());

			if (!isset($this->lastLiregforpagmodcontCriteria) || !$this->lastLiregforpagmodcontCriteria->equals($criteria)) {
				$this->collLiregforpagmodconts = LiregforpagmodcontPeer::doSelectJoinLiregforpagcont($criteria, $con);
			}
		}
		$this->lastLiregforpagmodcontCriteria = $criteria;

		return $this->collLiregforpagmodconts;
	}

} 