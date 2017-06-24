<?php


abstract class BaseCadefalm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codalm;


	
	protected $nomalm;


	
	protected $codzon;


	
	protected $codcat;


	
	protected $codtip;


	
	protected $catipalm_id;


	
	protected $diralm;


	
	protected $codalt;


	
	protected $codedo;


	
	protected $esptoven;


	
	protected $codtippv;


	
	protected $codcta;


	
	protected $codemp;


	
	protected $tipreg;


	
	protected $unicor;


	
	protected $corfac;


	
	protected $cornumctr;


	
	protected $id;


	
	protected $codalmsap;

	
	protected $aCatipalmRelatedByCodtip;

	
	protected $aCatipalmRelatedByCatipalmId;

	
	protected $collCadpharts;

	
	protected $lastCadphartCriteria = null;

	
	protected $collCarcparts;

	
	protected $lastCarcpartCriteria = null;

	
	protected $collCaentalms;

	
	protected $lastCaentalmCriteria = null;

	
	protected $collCasalalms;

	
	protected $lastCasalalmCriteria = null;

	
	protected $collCausualms;

	
	protected $lastCausualmCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getNomalm()
  {

    return trim($this->nomalm);

  }
  
  public function getCodzon()
  {

    return trim($this->codzon);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodtip()
  {

    return $this->codtip;

  }
  
  public function getCatipalmId()
  {

    return $this->catipalm_id;

  }
  
  public function getDiralm()
  {

    return trim($this->diralm);

  }
  
  public function getCodalt()
  {

    return trim($this->codalt);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getEsptoven()
  {

    return $this->esptoven;

  }
  
  public function getCodtippv()
  {

    return trim($this->codtippv);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getTipreg()
  {

    return trim($this->tipreg);

  }
  
  public function getUnicor()
  {

    return trim($this->unicor);

  }
  
  public function getCorfac($val=false)
  {

    if($val) return number_format($this->corfac,2,',','.');
    else return $this->corfac;

  }
  
  public function getCornumctr($val=false)
  {

    if($val) return number_format($this->cornumctr,2,',','.');
    else return $this->cornumctr;

  }
  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCodalmsap()
  {

    return trim($this->codalmsap);

  }
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODALM;
      }
  
	} 
	
	public function setNomalm($v)
	{

    if ($this->nomalm !== $v) {
        $this->nomalm = $v;
        $this->modifiedColumns[] = CadefalmPeer::NOMALM;
      }
  
	} 
	
	public function setCodzon($v)
	{

    if ($this->codzon !== $v) {
        $this->codzon = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODZON;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODCAT;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODTIP;
      }
  
		if ($this->aCatipalmRelatedByCodtip !== null && $this->aCatipalmRelatedByCodtip->getId() !== $v) {
			$this->aCatipalmRelatedByCodtip = null;
		}

	} 
	
	public function setCatipalmId($v)
	{

    if ($this->catipalm_id !== $v) {
        $this->catipalm_id = $v;
        $this->modifiedColumns[] = CadefalmPeer::CATIPALM_ID;
      }
  
		if ($this->aCatipalmRelatedByCatipalmId !== null && $this->aCatipalmRelatedByCatipalmId->getId() !== $v) {
			$this->aCatipalmRelatedByCatipalmId = null;
		}

	} 
	
	public function setDiralm($v)
	{

    if ($this->diralm !== $v) {
        $this->diralm = $v;
        $this->modifiedColumns[] = CadefalmPeer::DIRALM;
      }
  
	} 
	
	public function setCodalt($v)
	{

    if ($this->codalt !== $v) {
        $this->codalt = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODALT;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODEDO;
      }
  
	} 
	
	public function setEsptoven($v)
	{

    if ($this->esptoven !== $v) {
        $this->esptoven = $v;
        $this->modifiedColumns[] = CadefalmPeer::ESPTOVEN;
      }
  
	} 
	
	public function setCodtippv($v)
	{

    if ($this->codtippv !== $v) {
        $this->codtippv = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODTIPPV;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODCTA;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODEMP;
      }
  
	} 
	
	public function setTipreg($v)
	{

    if ($this->tipreg !== $v) {
        $this->tipreg = $v;
        $this->modifiedColumns[] = CadefalmPeer::TIPREG;
      }
  
	} 
	
	public function setUnicor($v)
	{

    if ($this->unicor !== $v) {
        $this->unicor = $v;
        $this->modifiedColumns[] = CadefalmPeer::UNICOR;
      }
  
	} 
	
	public function setCorfac($v)
	{

    if ($this->corfac !== $v) {
        $this->corfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadefalmPeer::CORFAC;
      }
  
	} 
	
	public function setCornumctr($v)
	{

    if ($this->cornumctr !== $v) {
        $this->cornumctr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadefalmPeer::CORNUMCTR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefalmPeer::ID;
      }
  
	} 
	
	public function setCodalmsap($v)
	{

    if ($this->codalmsap !== $v) {
        $this->codalmsap = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODALMSAP;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codalm = $rs->getString($startcol + 0);

      $this->nomalm = $rs->getString($startcol + 1);

      $this->codzon = $rs->getString($startcol + 2);

      $this->codcat = $rs->getString($startcol + 3);

      $this->codtip = $rs->getInt($startcol + 4);

      $this->catipalm_id = $rs->getInt($startcol + 5);

      $this->diralm = $rs->getString($startcol + 6);

      $this->codalt = $rs->getString($startcol + 7);

      $this->codedo = $rs->getString($startcol + 8);

      $this->esptoven = $rs->getBoolean($startcol + 9);

      $this->codtippv = $rs->getString($startcol + 10);

      $this->codcta = $rs->getString($startcol + 11);

      $this->codemp = $rs->getString($startcol + 12);

      $this->tipreg = $rs->getString($startcol + 13);

      $this->unicor = $rs->getString($startcol + 14);

      $this->corfac = $rs->getFloat($startcol + 15);

      $this->cornumctr = $rs->getFloat($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->codalmsap = $rs->getString($startcol + 18);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 19; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefalm object", $e);
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
			$con = Propel::getConnection(CadefalmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefalmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadefalmPeer::DATABASE_NAME);
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


												
			if ($this->aCatipalmRelatedByCodtip !== null) {
				if ($this->aCatipalmRelatedByCodtip->isModified()) {
					$affectedRows += $this->aCatipalmRelatedByCodtip->save($con);
				}
				$this->setCatipalmRelatedByCodtip($this->aCatipalmRelatedByCodtip);
			}

			if ($this->aCatipalmRelatedByCatipalmId !== null) {
				if ($this->aCatipalmRelatedByCatipalmId->isModified()) {
					$affectedRows += $this->aCatipalmRelatedByCatipalmId->save($con);
				}
				$this->setCatipalmRelatedByCatipalmId($this->aCatipalmRelatedByCatipalmId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CadefalmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadefalmPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCadpharts !== null) {
				foreach($this->collCadpharts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCarcparts !== null) {
				foreach($this->collCarcparts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCaentalms !== null) {
				foreach($this->collCaentalms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCasalalms !== null) {
				foreach($this->collCasalalms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCausualms !== null) {
				foreach($this->collCausualms as $referrerFK) {
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


												
			if ($this->aCatipalmRelatedByCodtip !== null) {
				if (!$this->aCatipalmRelatedByCodtip->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatipalmRelatedByCodtip->getValidationFailures());
				}
			}

			if ($this->aCatipalmRelatedByCatipalmId !== null) {
				if (!$this->aCatipalmRelatedByCatipalmId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatipalmRelatedByCatipalmId->getValidationFailures());
				}
			}


			if (($retval = CadefalmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCadpharts !== null) {
					foreach($this->collCadpharts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCarcparts !== null) {
					foreach($this->collCarcparts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCaentalms !== null) {
					foreach($this->collCaentalms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCasalalms !== null) {
					foreach($this->collCasalalms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCausualms !== null) {
					foreach($this->collCausualms as $referrerFK) {
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
		$pos = CadefalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodalm();
				break;
			case 1:
				return $this->getNomalm();
				break;
			case 2:
				return $this->getCodzon();
				break;
			case 3:
				return $this->getCodcat();
				break;
			case 4:
				return $this->getCodtip();
				break;
			case 5:
				return $this->getCatipalmId();
				break;
			case 6:
				return $this->getDiralm();
				break;
			case 7:
				return $this->getCodalt();
				break;
			case 8:
				return $this->getCodedo();
				break;
			case 9:
				return $this->getEsptoven();
				break;
			case 10:
				return $this->getCodtippv();
				break;
			case 11:
				return $this->getCodcta();
				break;
			case 12:
				return $this->getCodemp();
				break;
			case 13:
				return $this->getTipreg();
				break;
			case 14:
				return $this->getUnicor();
				break;
			case 15:
				return $this->getCorfac();
				break;
			case 16:
				return $this->getCornumctr();
				break;
			case 17:
				return $this->getId();
				break;
			case 18:
				return $this->getCodalmsap();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefalmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodalm(),
			$keys[1] => $this->getNomalm(),
			$keys[2] => $this->getCodzon(),
			$keys[3] => $this->getCodcat(),
			$keys[4] => $this->getCodtip(),
			$keys[5] => $this->getCatipalmId(),
			$keys[6] => $this->getDiralm(),
			$keys[7] => $this->getCodalt(),
			$keys[8] => $this->getCodedo(),
			$keys[9] => $this->getEsptoven(),
			$keys[10] => $this->getCodtippv(),
			$keys[11] => $this->getCodcta(),
			$keys[12] => $this->getCodemp(),
			$keys[13] => $this->getTipreg(),
			$keys[14] => $this->getUnicor(),
			$keys[15] => $this->getCorfac(),
			$keys[16] => $this->getCornumctr(),
			$keys[17] => $this->getId(),
			$keys[18] => $this->getCodalmsap(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodalm($value);
				break;
			case 1:
				$this->setNomalm($value);
				break;
			case 2:
				$this->setCodzon($value);
				break;
			case 3:
				$this->setCodcat($value);
				break;
			case 4:
				$this->setCodtip($value);
				break;
			case 5:
				$this->setCatipalmId($value);
				break;
			case 6:
				$this->setDiralm($value);
				break;
			case 7:
				$this->setCodalt($value);
				break;
			case 8:
				$this->setCodedo($value);
				break;
			case 9:
				$this->setEsptoven($value);
				break;
			case 10:
				$this->setCodtippv($value);
				break;
			case 11:
				$this->setCodcta($value);
				break;
			case 12:
				$this->setCodemp($value);
				break;
			case 13:
				$this->setTipreg($value);
				break;
			case 14:
				$this->setUnicor($value);
				break;
			case 15:
				$this->setCorfac($value);
				break;
			case 16:
				$this->setCornumctr($value);
				break;
			case 17:
				$this->setId($value);
				break;
			case 18:
				$this->setCodalmsap($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefalmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodalm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomalm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodzon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodtip($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCatipalmId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDiralm($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodalt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodedo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEsptoven($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodtippv($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodcta($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodemp($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipreg($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUnicor($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCorfac($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCornumctr($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodalmsap($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadefalmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefalmPeer::CODALM)) $criteria->add(CadefalmPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CadefalmPeer::NOMALM)) $criteria->add(CadefalmPeer::NOMALM, $this->nomalm);
		if ($this->isColumnModified(CadefalmPeer::CODZON)) $criteria->add(CadefalmPeer::CODZON, $this->codzon);
		if ($this->isColumnModified(CadefalmPeer::CODCAT)) $criteria->add(CadefalmPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CadefalmPeer::CODTIP)) $criteria->add(CadefalmPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(CadefalmPeer::CATIPALM_ID)) $criteria->add(CadefalmPeer::CATIPALM_ID, $this->catipalm_id);
		if ($this->isColumnModified(CadefalmPeer::DIRALM)) $criteria->add(CadefalmPeer::DIRALM, $this->diralm);
		if ($this->isColumnModified(CadefalmPeer::CODALT)) $criteria->add(CadefalmPeer::CODALT, $this->codalt);
		if ($this->isColumnModified(CadefalmPeer::CODEDO)) $criteria->add(CadefalmPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(CadefalmPeer::ESPTOVEN)) $criteria->add(CadefalmPeer::ESPTOVEN, $this->esptoven);
		if ($this->isColumnModified(CadefalmPeer::CODTIPPV)) $criteria->add(CadefalmPeer::CODTIPPV, $this->codtippv);
		if ($this->isColumnModified(CadefalmPeer::CODCTA)) $criteria->add(CadefalmPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CadefalmPeer::CODEMP)) $criteria->add(CadefalmPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(CadefalmPeer::TIPREG)) $criteria->add(CadefalmPeer::TIPREG, $this->tipreg);
		if ($this->isColumnModified(CadefalmPeer::UNICOR)) $criteria->add(CadefalmPeer::UNICOR, $this->unicor);
		if ($this->isColumnModified(CadefalmPeer::CORFAC)) $criteria->add(CadefalmPeer::CORFAC, $this->corfac);
		if ($this->isColumnModified(CadefalmPeer::CORNUMCTR)) $criteria->add(CadefalmPeer::CORNUMCTR, $this->cornumctr);
		if ($this->isColumnModified(CadefalmPeer::ID)) $criteria->add(CadefalmPeer::ID, $this->id);
		if ($this->isColumnModified(CadefalmPeer::CODALMSAP)) $criteria->add(CadefalmPeer::CODALMSAP, $this->codalmsap);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefalmPeer::DATABASE_NAME);

		$criteria->add(CadefalmPeer::ID, $this->id);

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

		$copyObj->setCodalm($this->codalm);

		$copyObj->setNomalm($this->nomalm);

		$copyObj->setCodzon($this->codzon);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setCatipalmId($this->catipalm_id);

		$copyObj->setDiralm($this->diralm);

		$copyObj->setCodalt($this->codalt);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setEsptoven($this->esptoven);

		$copyObj->setCodtippv($this->codtippv);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setTipreg($this->tipreg);

		$copyObj->setUnicor($this->unicor);

		$copyObj->setCorfac($this->corfac);

		$copyObj->setCornumctr($this->cornumctr);

		$copyObj->setCodalmsap($this->codalmsap);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCadpharts() as $relObj) {
				$copyObj->addCadphart($relObj->copy($deepCopy));
			}

			foreach($this->getCarcparts() as $relObj) {
				$copyObj->addCarcpart($relObj->copy($deepCopy));
			}

			foreach($this->getCaentalms() as $relObj) {
				$copyObj->addCaentalm($relObj->copy($deepCopy));
			}

			foreach($this->getCasalalms() as $relObj) {
				$copyObj->addCasalalm($relObj->copy($deepCopy));
			}

			foreach($this->getCausualms() as $relObj) {
				$copyObj->addCausualm($relObj->copy($deepCopy));
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
			self::$peer = new CadefalmPeer();
		}
		return self::$peer;
	}

	
	public function setCatipalmRelatedByCodtip($v)
	{


		if ($v === null) {
			$this->setCodtip(NULL);
		} else {
			$this->setCodtip($v->getId());
		}


		$this->aCatipalmRelatedByCodtip = $v;
	}


	
	public function getCatipalmRelatedByCodtip($con = null)
	{
		if ($this->aCatipalmRelatedByCodtip === null && ($this->codtip !== null)) {
						include_once 'lib/model/compras/om/BaseCatipalmPeer.php';

      $c = new Criteria();
      $c->add(CatipalmPeer::ID,$this->codtip);
      
			$this->aCatipalmRelatedByCodtip = CatipalmPeer::doSelectOne($c, $con);

			
		}
		return $this->aCatipalmRelatedByCodtip;
	}

	
	public function setCatipalmRelatedByCatipalmId($v)
	{


		if ($v === null) {
			$this->setCatipalmId(NULL);
		} else {
			$this->setCatipalmId($v->getId());
		}


		$this->aCatipalmRelatedByCatipalmId = $v;
	}


	
	public function getCatipalmRelatedByCatipalmId($con = null)
	{
		if ($this->aCatipalmRelatedByCatipalmId === null && ($this->catipalm_id !== null)) {
						include_once 'lib/model/compras/om/BaseCatipalmPeer.php';

      $c = new Criteria();
      $c->add(CatipalmPeer::ID,$this->catipalm_id);
      
			$this->aCatipalmRelatedByCatipalmId = CatipalmPeer::doSelectOne($c, $con);

			
		}
		return $this->aCatipalmRelatedByCatipalmId;
	}

	
	public function initCadpharts()
	{
		if ($this->collCadpharts === null) {
			$this->collCadpharts = array();
		}
	}

	
	public function getCadpharts($criteria = null, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCadphartPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCadpharts === null) {
			if ($this->isNew()) {
			   $this->collCadpharts = array();
			} else {

				$criteria->add(CadphartPeer::CODALMUSU, $this->getCodalm());

				CadphartPeer::addSelectColumns($criteria);
				$this->collCadpharts = CadphartPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CadphartPeer::CODALMUSU, $this->getCodalm());

				CadphartPeer::addSelectColumns($criteria);
				if (!isset($this->lastCadphartCriteria) || !$this->lastCadphartCriteria->equals($criteria)) {
					$this->collCadpharts = CadphartPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCadphartCriteria = $criteria;
		return $this->collCadpharts;
	}

	
	public function countCadpharts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCadphartPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CadphartPeer::CODALMUSU, $this->getCodalm());

		return CadphartPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCadphart(Cadphart $l)
	{
		$this->collCadpharts[] = $l;
		$l->setCadefalm($this);
	}

	
	public function initCarcparts()
	{
		if ($this->collCarcparts === null) {
			$this->collCarcparts = array();
		}
	}

	
	public function getCarcparts($criteria = null, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCarcpartPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCarcparts === null) {
			if ($this->isNew()) {
			   $this->collCarcparts = array();
			} else {

				$criteria->add(CarcpartPeer::CODALMUSU, $this->getCodalm());

				CarcpartPeer::addSelectColumns($criteria);
				$this->collCarcparts = CarcpartPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CarcpartPeer::CODALMUSU, $this->getCodalm());

				CarcpartPeer::addSelectColumns($criteria);
				if (!isset($this->lastCarcpartCriteria) || !$this->lastCarcpartCriteria->equals($criteria)) {
					$this->collCarcparts = CarcpartPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCarcpartCriteria = $criteria;
		return $this->collCarcparts;
	}

	
	public function countCarcparts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCarcpartPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CarcpartPeer::CODALMUSU, $this->getCodalm());

		return CarcpartPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCarcpart(Carcpart $l)
	{
		$this->collCarcparts[] = $l;
		$l->setCadefalm($this);
	}

	
	public function initCaentalms()
	{
		if ($this->collCaentalms === null) {
			$this->collCaentalms = array();
		}
	}

	
	public function getCaentalms($criteria = null, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCaentalmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaentalms === null) {
			if ($this->isNew()) {
			   $this->collCaentalms = array();
			} else {

				$criteria->add(CaentalmPeer::CODALMUSU, $this->getCodalm());

				CaentalmPeer::addSelectColumns($criteria);
				$this->collCaentalms = CaentalmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CaentalmPeer::CODALMUSU, $this->getCodalm());

				CaentalmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCaentalmCriteria) || !$this->lastCaentalmCriteria->equals($criteria)) {
					$this->collCaentalms = CaentalmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCaentalmCriteria = $criteria;
		return $this->collCaentalms;
	}

	
	public function countCaentalms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCaentalmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CaentalmPeer::CODALMUSU, $this->getCodalm());

		return CaentalmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCaentalm(Caentalm $l)
	{
		$this->collCaentalms[] = $l;
		$l->setCadefalm($this);
	}


	
	public function getCaentalmsJoinCatipent($criteria = null, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCaentalmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaentalms === null) {
			if ($this->isNew()) {
				$this->collCaentalms = array();
			} else {

				$criteria->add(CaentalmPeer::CODALMUSU, $this->getCodalm());

				$this->collCaentalms = CaentalmPeer::doSelectJoinCatipent($criteria, $con);
			}
		} else {
									
			$criteria->add(CaentalmPeer::CODALMUSU, $this->getCodalm());

			if (!isset($this->lastCaentalmCriteria) || !$this->lastCaentalmCriteria->equals($criteria)) {
				$this->collCaentalms = CaentalmPeer::doSelectJoinCatipent($criteria, $con);
			}
		}
		$this->lastCaentalmCriteria = $criteria;

		return $this->collCaentalms;
	}

	
	public function initCasalalms()
	{
		if ($this->collCasalalms === null) {
			$this->collCasalalms = array();
		}
	}

	
	public function getCasalalms($criteria = null, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCasalalmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCasalalms === null) {
			if ($this->isNew()) {
			   $this->collCasalalms = array();
			} else {

				$criteria->add(CasalalmPeer::CODALMUSU, $this->getCodalm());

				CasalalmPeer::addSelectColumns($criteria);
				$this->collCasalalms = CasalalmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CasalalmPeer::CODALMUSU, $this->getCodalm());

				CasalalmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCasalalmCriteria) || !$this->lastCasalalmCriteria->equals($criteria)) {
					$this->collCasalalms = CasalalmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCasalalmCriteria = $criteria;
		return $this->collCasalalms;
	}

	
	public function countCasalalms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCasalalmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CasalalmPeer::CODALMUSU, $this->getCodalm());

		return CasalalmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCasalalm(Casalalm $l)
	{
		$this->collCasalalms[] = $l;
		$l->setCadefalm($this);
	}


	
	public function getCasalalmsJoinCatipsal($criteria = null, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCasalalmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCasalalms === null) {
			if ($this->isNew()) {
				$this->collCasalalms = array();
			} else {

				$criteria->add(CasalalmPeer::CODALMUSU, $this->getCodalm());

				$this->collCasalalms = CasalalmPeer::doSelectJoinCatipsal($criteria, $con);
			}
		} else {
									
			$criteria->add(CasalalmPeer::CODALMUSU, $this->getCodalm());

			if (!isset($this->lastCasalalmCriteria) || !$this->lastCasalalmCriteria->equals($criteria)) {
				$this->collCasalalms = CasalalmPeer::doSelectJoinCatipsal($criteria, $con);
			}
		}
		$this->lastCasalalmCriteria = $criteria;

		return $this->collCasalalms;
	}

	
	public function initCausualms()
	{
		if ($this->collCausualms === null) {
			$this->collCausualms = array();
		}
	}

	
	public function getCausualms($criteria = null, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCausualmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCausualms === null) {
			if ($this->isNew()) {
			   $this->collCausualms = array();
			} else {

				$criteria->add(CausualmPeer::CODALM, $this->getCodalm());

				CausualmPeer::addSelectColumns($criteria);
				$this->collCausualms = CausualmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CausualmPeer::CODALM, $this->getCodalm());

				CausualmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCausualmCriteria) || !$this->lastCausualmCriteria->equals($criteria)) {
					$this->collCausualms = CausualmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCausualmCriteria = $criteria;
		return $this->collCausualms;
	}

	
	public function countCausualms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/compras/om/BaseCausualmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CausualmPeer::CODALM, $this->getCodalm());

		return CausualmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCausualm(Causualm $l)
	{
		$this->collCausualms[] = $l;
		$l->setCadefalm($this);
	}

} 