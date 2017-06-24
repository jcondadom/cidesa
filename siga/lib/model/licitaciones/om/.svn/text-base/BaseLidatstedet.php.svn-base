<?php


abstract class BaseLidatstedet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduniste;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $nomcar;


	
	protected $resolu;


	
	protected $fecres;


	
	protected $id;

	
	protected $collLiactassRelatedByCodempadm;

	
	protected $lastLiactasRelatedByCodempadmCriteria = null;

	
	protected $collLiactassRelatedByCodempeje;

	
	protected $lastLiactasRelatedByCodempejeCriteria = null;

	
	protected $collLivaluacionessRelatedByCodempadm;

	
	protected $lastLivaluacionesRelatedByCodempadmCriteria = null;

	
	protected $collLivaluacionessRelatedByCodempeje;

	
	protected $lastLivaluacionesRelatedByCodempejeCriteria = null;

	
	protected $collLiinspeccionessRelatedByCodempadm;

	
	protected $lastLiinspeccionesRelatedByCodempadmCriteria = null;

	
	protected $collLiinspeccionessRelatedByCodempeje;

	
	protected $lastLiinspeccionesRelatedByCodempejeCriteria = null;

	
	protected $collLientregassRelatedByCodempadm;

	
	protected $lastLientregasRelatedByCodempadmCriteria = null;

	
	protected $collLientregassRelatedByCodempeje;

	
	protected $lastLientregasRelatedByCodempejeCriteria = null;

	
	protected $collLiactdescontsRelatedByCodempadm;

	
	protected $lastLiactdescontRelatedByCodempadmCriteria = null;

	
	protected $collLiactdescontsRelatedByCodempeje;

	
	protected $lastLiactdescontRelatedByCodempejeCriteria = null;

	
	protected $collLisolpagsRelatedByCodempadm;

	
	protected $lastLisolpagRelatedByCodempadmCriteria = null;

	
	protected $collLisolpagsRelatedByCodempeje;

	
	protected $lastLisolpagRelatedByCodempejeCriteria = null;

	
	protected $collLipenalizacionessRelatedByCodempadm;

	
	protected $lastLipenalizacionesRelatedByCodempadmCriteria = null;

	
	protected $collLipenalizacionessRelatedByCodempeje;

	
	protected $lastLipenalizacionesRelatedByCodempejeCriteria = null;

	
	protected $collLimodcontsRelatedByCodempadm;

	
	protected $lastLimodcontRelatedByCodempadmCriteria = null;

	
	protected $collLimodcontsRelatedByCodempeje;

	
	protected $lastLimodcontRelatedByCodempejeCriteria = null;

	
	protected $collLiaddendumsRelatedByCodempadm;

	
	protected $lastLiaddendumRelatedByCodempadmCriteria = null;

	
	protected $collLiaddendumsRelatedByCodempeje;

	
	protected $lastLiaddendumRelatedByCodempejeCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoduniste()
  {

    return trim($this->coduniste);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getNomcar()
  {

    return trim($this->nomcar);

  }
  
  public function getResolu()
  {

    return trim($this->resolu);

  }
  
  public function getFecres($format = 'Y-m-d')
  {

    if ($this->fecres === null || $this->fecres === '') {
      return null;
    } elseif (!is_int($this->fecres)) {
            $ts = adodb_strtotime($this->fecres);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecres] as date/time value: " . var_export($this->fecres, true));
      }
    } else {
      $ts = $this->fecres;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LidatstedetPeer::CODUNISTE;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = LidatstedetPeer::CODEMP;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = LidatstedetPeer::NOMEMP;
      }
  
	} 
	
	public function setNomcar($v)
	{

    if ($this->nomcar !== $v) {
        $this->nomcar = $v;
        $this->modifiedColumns[] = LidatstedetPeer::NOMCAR;
      }
  
	} 
	
	public function setResolu($v)
	{

    if ($this->resolu !== $v) {
        $this->resolu = $v;
        $this->modifiedColumns[] = LidatstedetPeer::RESOLU;
      }
  
	} 
	
	public function setFecres($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecres] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecres !== $ts) {
      $this->fecres = $ts;
      $this->modifiedColumns[] = LidatstedetPeer::FECRES;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidatstedetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coduniste = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->nomemp = $rs->getString($startcol + 2);

      $this->nomcar = $rs->getString($startcol + 3);

      $this->resolu = $rs->getString($startcol + 4);

      $this->fecres = $rs->getDate($startcol + 5, null);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidatstedet object", $e);
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
			$con = Propel::getConnection(LidatstedetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidatstedetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidatstedetPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LidatstedetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidatstedetPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiactassRelatedByCodempadm !== null) {
				foreach($this->collLiactassRelatedByCodempadm as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiactassRelatedByCodempeje !== null) {
				foreach($this->collLiactassRelatedByCodempeje as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLivaluacionessRelatedByCodempadm !== null) {
				foreach($this->collLivaluacionessRelatedByCodempadm as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLivaluacionessRelatedByCodempeje !== null) {
				foreach($this->collLivaluacionessRelatedByCodempeje as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiinspeccionessRelatedByCodempadm !== null) {
				foreach($this->collLiinspeccionessRelatedByCodempadm as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiinspeccionessRelatedByCodempeje !== null) {
				foreach($this->collLiinspeccionessRelatedByCodempeje as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLientregassRelatedByCodempadm !== null) {
				foreach($this->collLientregassRelatedByCodempadm as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLientregassRelatedByCodempeje !== null) {
				foreach($this->collLientregassRelatedByCodempeje as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiactdescontsRelatedByCodempadm !== null) {
				foreach($this->collLiactdescontsRelatedByCodempadm as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiactdescontsRelatedByCodempeje !== null) {
				foreach($this->collLiactdescontsRelatedByCodempeje as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLisolpagsRelatedByCodempadm !== null) {
				foreach($this->collLisolpagsRelatedByCodempadm as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLisolpagsRelatedByCodempeje !== null) {
				foreach($this->collLisolpagsRelatedByCodempeje as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLipenalizacionessRelatedByCodempadm !== null) {
				foreach($this->collLipenalizacionessRelatedByCodempadm as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLipenalizacionessRelatedByCodempeje !== null) {
				foreach($this->collLipenalizacionessRelatedByCodempeje as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLimodcontsRelatedByCodempadm !== null) {
				foreach($this->collLimodcontsRelatedByCodempadm as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLimodcontsRelatedByCodempeje !== null) {
				foreach($this->collLimodcontsRelatedByCodempeje as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiaddendumsRelatedByCodempadm !== null) {
				foreach($this->collLiaddendumsRelatedByCodempadm as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiaddendumsRelatedByCodempeje !== null) {
				foreach($this->collLiaddendumsRelatedByCodempeje as $referrerFK) {
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


			if (($retval = LidatstedetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiactassRelatedByCodempadm !== null) {
					foreach($this->collLiactassRelatedByCodempadm as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiactassRelatedByCodempeje !== null) {
					foreach($this->collLiactassRelatedByCodempeje as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLivaluacionessRelatedByCodempadm !== null) {
					foreach($this->collLivaluacionessRelatedByCodempadm as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLivaluacionessRelatedByCodempeje !== null) {
					foreach($this->collLivaluacionessRelatedByCodempeje as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiinspeccionessRelatedByCodempadm !== null) {
					foreach($this->collLiinspeccionessRelatedByCodempadm as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiinspeccionessRelatedByCodempeje !== null) {
					foreach($this->collLiinspeccionessRelatedByCodempeje as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLientregassRelatedByCodempadm !== null) {
					foreach($this->collLientregassRelatedByCodempadm as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLientregassRelatedByCodempeje !== null) {
					foreach($this->collLientregassRelatedByCodempeje as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiactdescontsRelatedByCodempadm !== null) {
					foreach($this->collLiactdescontsRelatedByCodempadm as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiactdescontsRelatedByCodempeje !== null) {
					foreach($this->collLiactdescontsRelatedByCodempeje as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLisolpagsRelatedByCodempadm !== null) {
					foreach($this->collLisolpagsRelatedByCodempadm as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLisolpagsRelatedByCodempeje !== null) {
					foreach($this->collLisolpagsRelatedByCodempeje as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLipenalizacionessRelatedByCodempadm !== null) {
					foreach($this->collLipenalizacionessRelatedByCodempadm as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLipenalizacionessRelatedByCodempeje !== null) {
					foreach($this->collLipenalizacionessRelatedByCodempeje as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLimodcontsRelatedByCodempadm !== null) {
					foreach($this->collLimodcontsRelatedByCodempadm as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLimodcontsRelatedByCodempeje !== null) {
					foreach($this->collLimodcontsRelatedByCodempeje as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiaddendumsRelatedByCodempadm !== null) {
					foreach($this->collLiaddendumsRelatedByCodempadm as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiaddendumsRelatedByCodempeje !== null) {
					foreach($this->collLiaddendumsRelatedByCodempeje as $referrerFK) {
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
		$pos = LidatstedetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduniste();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getNomemp();
				break;
			case 3:
				return $this->getNomcar();
				break;
			case 4:
				return $this->getResolu();
				break;
			case 5:
				return $this->getFecres();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidatstedetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduniste(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getNomemp(),
			$keys[3] => $this->getNomcar(),
			$keys[4] => $this->getResolu(),
			$keys[5] => $this->getFecres(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidatstedetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduniste($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setNomemp($value);
				break;
			case 3:
				$this->setNomcar($value);
				break;
			case 4:
				$this->setResolu($value);
				break;
			case 5:
				$this->setFecres($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidatstedetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduniste($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomcar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setResolu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecres($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidatstedetPeer::DATABASE_NAME);

		if ($this->isColumnModified(LidatstedetPeer::CODUNISTE)) $criteria->add(LidatstedetPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LidatstedetPeer::CODEMP)) $criteria->add(LidatstedetPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(LidatstedetPeer::NOMEMP)) $criteria->add(LidatstedetPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(LidatstedetPeer::NOMCAR)) $criteria->add(LidatstedetPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(LidatstedetPeer::RESOLU)) $criteria->add(LidatstedetPeer::RESOLU, $this->resolu);
		if ($this->isColumnModified(LidatstedetPeer::FECRES)) $criteria->add(LidatstedetPeer::FECRES, $this->fecres);
		if ($this->isColumnModified(LidatstedetPeer::ID)) $criteria->add(LidatstedetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidatstedetPeer::DATABASE_NAME);

		$criteria->add(LidatstedetPeer::ID, $this->id);

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

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setNomcar($this->nomcar);

		$copyObj->setResolu($this->resolu);

		$copyObj->setFecres($this->fecres);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiactassRelatedByCodempadm() as $relObj) {
				$copyObj->addLiactasRelatedByCodempadm($relObj->copy($deepCopy));
			}

			foreach($this->getLiactassRelatedByCodempeje() as $relObj) {
				$copyObj->addLiactasRelatedByCodempeje($relObj->copy($deepCopy));
			}

			foreach($this->getLivaluacionessRelatedByCodempadm() as $relObj) {
				$copyObj->addLivaluacionesRelatedByCodempadm($relObj->copy($deepCopy));
			}

			foreach($this->getLivaluacionessRelatedByCodempeje() as $relObj) {
				$copyObj->addLivaluacionesRelatedByCodempeje($relObj->copy($deepCopy));
			}

			foreach($this->getLiinspeccionessRelatedByCodempadm() as $relObj) {
				$copyObj->addLiinspeccionesRelatedByCodempadm($relObj->copy($deepCopy));
			}

			foreach($this->getLiinspeccionessRelatedByCodempeje() as $relObj) {
				$copyObj->addLiinspeccionesRelatedByCodempeje($relObj->copy($deepCopy));
			}

			foreach($this->getLientregassRelatedByCodempadm() as $relObj) {
				$copyObj->addLientregasRelatedByCodempadm($relObj->copy($deepCopy));
			}

			foreach($this->getLientregassRelatedByCodempeje() as $relObj) {
				$copyObj->addLientregasRelatedByCodempeje($relObj->copy($deepCopy));
			}

			foreach($this->getLiactdescontsRelatedByCodempadm() as $relObj) {
				$copyObj->addLiactdescontRelatedByCodempadm($relObj->copy($deepCopy));
			}

			foreach($this->getLiactdescontsRelatedByCodempeje() as $relObj) {
				$copyObj->addLiactdescontRelatedByCodempeje($relObj->copy($deepCopy));
			}

			foreach($this->getLisolpagsRelatedByCodempadm() as $relObj) {
				$copyObj->addLisolpagRelatedByCodempadm($relObj->copy($deepCopy));
			}

			foreach($this->getLisolpagsRelatedByCodempeje() as $relObj) {
				$copyObj->addLisolpagRelatedByCodempeje($relObj->copy($deepCopy));
			}

			foreach($this->getLipenalizacionessRelatedByCodempadm() as $relObj) {
				$copyObj->addLipenalizacionesRelatedByCodempadm($relObj->copy($deepCopy));
			}

			foreach($this->getLipenalizacionessRelatedByCodempeje() as $relObj) {
				$copyObj->addLipenalizacionesRelatedByCodempeje($relObj->copy($deepCopy));
			}

			foreach($this->getLimodcontsRelatedByCodempadm() as $relObj) {
				$copyObj->addLimodcontRelatedByCodempadm($relObj->copy($deepCopy));
			}

			foreach($this->getLimodcontsRelatedByCodempeje() as $relObj) {
				$copyObj->addLimodcontRelatedByCodempeje($relObj->copy($deepCopy));
			}

			foreach($this->getLiaddendumsRelatedByCodempadm() as $relObj) {
				$copyObj->addLiaddendumRelatedByCodempadm($relObj->copy($deepCopy));
			}

			foreach($this->getLiaddendumsRelatedByCodempeje() as $relObj) {
				$copyObj->addLiaddendumRelatedByCodempeje($relObj->copy($deepCopy));
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
			self::$peer = new LidatstedetPeer();
		}
		return self::$peer;
	}

	
	public function initLiactassRelatedByCodempadm()
	{
		if ($this->collLiactassRelatedByCodempadm === null) {
			$this->collLiactassRelatedByCodempadm = array();
		}
	}

	
	public function getLiactassRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactassRelatedByCodempadm === null) {
			if ($this->isNew()) {
			   $this->collLiactassRelatedByCodempadm = array();
			} else {

				$criteria->add(LiactasPeer::CODEMPADM, $this->getCodemp());

				LiactasPeer::addSelectColumns($criteria);
				$this->collLiactassRelatedByCodempadm = LiactasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiactasPeer::CODEMPADM, $this->getCodemp());

				LiactasPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiactasRelatedByCodempadmCriteria) || !$this->lastLiactasRelatedByCodempadmCriteria->equals($criteria)) {
					$this->collLiactassRelatedByCodempadm = LiactasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiactasRelatedByCodempadmCriteria = $criteria;
		return $this->collLiactassRelatedByCodempadm;
	}

	
	public function countLiactassRelatedByCodempadm($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiactasPeer::CODEMPADM, $this->getCodemp());

		return LiactasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiactasRelatedByCodempadm(Liactas $l)
	{
		$this->collLiactassRelatedByCodempadm[] = $l;
		$l->setLidatstedetRelatedByCodempadm($this);
	}


	
	public function getLiactassRelatedByCodempadmJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactassRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLiactassRelatedByCodempadm = array();
			} else {

				$criteria->add(LiactasPeer::CODEMPADM, $this->getCodemp());

				$this->collLiactassRelatedByCodempadm = LiactasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLiactasRelatedByCodempadmCriteria) || !$this->lastLiactasRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLiactassRelatedByCodempadm = LiactasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLiactasRelatedByCodempadmCriteria = $criteria;

		return $this->collLiactassRelatedByCodempadm;
	}


	
	public function getLiactassRelatedByCodempadmJoinLitipact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactassRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLiactassRelatedByCodempadm = array();
			} else {

				$criteria->add(LiactasPeer::CODEMPADM, $this->getCodemp());

				$this->collLiactassRelatedByCodempadm = LiactasPeer::doSelectJoinLitipact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLiactasRelatedByCodempadmCriteria) || !$this->lastLiactasRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLiactassRelatedByCodempadm = LiactasPeer::doSelectJoinLitipact($criteria, $con);
			}
		}
		$this->lastLiactasRelatedByCodempadmCriteria = $criteria;

		return $this->collLiactassRelatedByCodempadm;
	}


	
	public function getLiactassRelatedByCodempadmJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactassRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLiactassRelatedByCodempadm = array();
			} else {

				$criteria->add(LiactasPeer::CODEMPADM, $this->getCodemp());

				$this->collLiactassRelatedByCodempadm = LiactasPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLiactasRelatedByCodempadmCriteria) || !$this->lastLiactasRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLiactassRelatedByCodempadm = LiactasPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiactasRelatedByCodempadmCriteria = $criteria;

		return $this->collLiactassRelatedByCodempadm;
	}

	
	public function initLiactassRelatedByCodempeje()
	{
		if ($this->collLiactassRelatedByCodempeje === null) {
			$this->collLiactassRelatedByCodempeje = array();
		}
	}

	
	public function getLiactassRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactassRelatedByCodempeje === null) {
			if ($this->isNew()) {
			   $this->collLiactassRelatedByCodempeje = array();
			} else {

				$criteria->add(LiactasPeer::CODEMPEJE, $this->getCodemp());

				LiactasPeer::addSelectColumns($criteria);
				$this->collLiactassRelatedByCodempeje = LiactasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiactasPeer::CODEMPEJE, $this->getCodemp());

				LiactasPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiactasRelatedByCodempejeCriteria) || !$this->lastLiactasRelatedByCodempejeCriteria->equals($criteria)) {
					$this->collLiactassRelatedByCodempeje = LiactasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiactasRelatedByCodempejeCriteria = $criteria;
		return $this->collLiactassRelatedByCodempeje;
	}

	
	public function countLiactassRelatedByCodempeje($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiactasPeer::CODEMPEJE, $this->getCodemp());

		return LiactasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiactasRelatedByCodempeje(Liactas $l)
	{
		$this->collLiactassRelatedByCodempeje[] = $l;
		$l->setLidatstedetRelatedByCodempeje($this);
	}


	
	public function getLiactassRelatedByCodempejeJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactassRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLiactassRelatedByCodempeje = array();
			} else {

				$criteria->add(LiactasPeer::CODEMPEJE, $this->getCodemp());

				$this->collLiactassRelatedByCodempeje = LiactasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLiactasRelatedByCodempejeCriteria) || !$this->lastLiactasRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLiactassRelatedByCodempeje = LiactasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLiactasRelatedByCodempejeCriteria = $criteria;

		return $this->collLiactassRelatedByCodempeje;
	}


	
	public function getLiactassRelatedByCodempejeJoinLitipact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactassRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLiactassRelatedByCodempeje = array();
			} else {

				$criteria->add(LiactasPeer::CODEMPEJE, $this->getCodemp());

				$this->collLiactassRelatedByCodempeje = LiactasPeer::doSelectJoinLitipact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLiactasRelatedByCodempejeCriteria) || !$this->lastLiactasRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLiactassRelatedByCodempeje = LiactasPeer::doSelectJoinLitipact($criteria, $con);
			}
		}
		$this->lastLiactasRelatedByCodempejeCriteria = $criteria;

		return $this->collLiactassRelatedByCodempeje;
	}


	
	public function getLiactassRelatedByCodempejeJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactassRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLiactassRelatedByCodempeje = array();
			} else {

				$criteria->add(LiactasPeer::CODEMPEJE, $this->getCodemp());

				$this->collLiactassRelatedByCodempeje = LiactasPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLiactasRelatedByCodempejeCriteria) || !$this->lastLiactasRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLiactassRelatedByCodempeje = LiactasPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiactasRelatedByCodempejeCriteria = $criteria;

		return $this->collLiactassRelatedByCodempeje;
	}

	
	public function initLivaluacionessRelatedByCodempadm()
	{
		if ($this->collLivaluacionessRelatedByCodempadm === null) {
			$this->collLivaluacionessRelatedByCodempadm = array();
		}
	}

	
	public function getLivaluacionessRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLivaluacionessRelatedByCodempadm === null) {
			if ($this->isNew()) {
			   $this->collLivaluacionessRelatedByCodempadm = array();
			} else {

				$criteria->add(LivaluacionesPeer::CODEMPADM, $this->getCodemp());

				LivaluacionesPeer::addSelectColumns($criteria);
				$this->collLivaluacionessRelatedByCodempadm = LivaluacionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LivaluacionesPeer::CODEMPADM, $this->getCodemp());

				LivaluacionesPeer::addSelectColumns($criteria);
				if (!isset($this->lastLivaluacionesRelatedByCodempadmCriteria) || !$this->lastLivaluacionesRelatedByCodempadmCriteria->equals($criteria)) {
					$this->collLivaluacionessRelatedByCodempadm = LivaluacionesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLivaluacionesRelatedByCodempadmCriteria = $criteria;
		return $this->collLivaluacionessRelatedByCodempadm;
	}

	
	public function countLivaluacionessRelatedByCodempadm($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LivaluacionesPeer::CODEMPADM, $this->getCodemp());

		return LivaluacionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLivaluacionesRelatedByCodempadm(Livaluaciones $l)
	{
		$this->collLivaluacionessRelatedByCodempadm[] = $l;
		$l->setLidatstedetRelatedByCodempadm($this);
	}


	
	public function getLivaluacionessRelatedByCodempadmJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLivaluacionessRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLivaluacionessRelatedByCodempadm = array();
			} else {

				$criteria->add(LivaluacionesPeer::CODEMPADM, $this->getCodemp());

				$this->collLivaluacionessRelatedByCodempadm = LivaluacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LivaluacionesPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLivaluacionesRelatedByCodempadmCriteria) || !$this->lastLivaluacionesRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLivaluacionessRelatedByCodempadm = LivaluacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLivaluacionesRelatedByCodempadmCriteria = $criteria;

		return $this->collLivaluacionessRelatedByCodempadm;
	}


	
	public function getLivaluacionessRelatedByCodempadmJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLivaluacionessRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLivaluacionessRelatedByCodempadm = array();
			} else {

				$criteria->add(LivaluacionesPeer::CODEMPADM, $this->getCodemp());

				$this->collLivaluacionessRelatedByCodempadm = LivaluacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LivaluacionesPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLivaluacionesRelatedByCodempadmCriteria) || !$this->lastLivaluacionesRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLivaluacionessRelatedByCodempadm = LivaluacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLivaluacionesRelatedByCodempadmCriteria = $criteria;

		return $this->collLivaluacionessRelatedByCodempadm;
	}

	
	public function initLivaluacionessRelatedByCodempeje()
	{
		if ($this->collLivaluacionessRelatedByCodempeje === null) {
			$this->collLivaluacionessRelatedByCodempeje = array();
		}
	}

	
	public function getLivaluacionessRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLivaluacionessRelatedByCodempeje === null) {
			if ($this->isNew()) {
			   $this->collLivaluacionessRelatedByCodempeje = array();
			} else {

				$criteria->add(LivaluacionesPeer::CODEMPEJE, $this->getCodemp());

				LivaluacionesPeer::addSelectColumns($criteria);
				$this->collLivaluacionessRelatedByCodempeje = LivaluacionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LivaluacionesPeer::CODEMPEJE, $this->getCodemp());

				LivaluacionesPeer::addSelectColumns($criteria);
				if (!isset($this->lastLivaluacionesRelatedByCodempejeCriteria) || !$this->lastLivaluacionesRelatedByCodempejeCriteria->equals($criteria)) {
					$this->collLivaluacionessRelatedByCodempeje = LivaluacionesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLivaluacionesRelatedByCodempejeCriteria = $criteria;
		return $this->collLivaluacionessRelatedByCodempeje;
	}

	
	public function countLivaluacionessRelatedByCodempeje($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LivaluacionesPeer::CODEMPEJE, $this->getCodemp());

		return LivaluacionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLivaluacionesRelatedByCodempeje(Livaluaciones $l)
	{
		$this->collLivaluacionessRelatedByCodempeje[] = $l;
		$l->setLidatstedetRelatedByCodempeje($this);
	}


	
	public function getLivaluacionessRelatedByCodempejeJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLivaluacionessRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLivaluacionessRelatedByCodempeje = array();
			} else {

				$criteria->add(LivaluacionesPeer::CODEMPEJE, $this->getCodemp());

				$this->collLivaluacionessRelatedByCodempeje = LivaluacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LivaluacionesPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLivaluacionesRelatedByCodempejeCriteria) || !$this->lastLivaluacionesRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLivaluacionessRelatedByCodempeje = LivaluacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLivaluacionesRelatedByCodempejeCriteria = $criteria;

		return $this->collLivaluacionessRelatedByCodempeje;
	}


	
	public function getLivaluacionessRelatedByCodempejeJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLivaluacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLivaluacionessRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLivaluacionessRelatedByCodempeje = array();
			} else {

				$criteria->add(LivaluacionesPeer::CODEMPEJE, $this->getCodemp());

				$this->collLivaluacionessRelatedByCodempeje = LivaluacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LivaluacionesPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLivaluacionesRelatedByCodempejeCriteria) || !$this->lastLivaluacionesRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLivaluacionessRelatedByCodempeje = LivaluacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLivaluacionesRelatedByCodempejeCriteria = $criteria;

		return $this->collLivaluacionessRelatedByCodempeje;
	}

	
	public function initLiinspeccionessRelatedByCodempadm()
	{
		if ($this->collLiinspeccionessRelatedByCodempadm === null) {
			$this->collLiinspeccionessRelatedByCodempadm = array();
		}
	}

	
	public function getLiinspeccionessRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiinspeccionessRelatedByCodempadm === null) {
			if ($this->isNew()) {
			   $this->collLiinspeccionessRelatedByCodempadm = array();
			} else {

				$criteria->add(LiinspeccionesPeer::CODEMPADM, $this->getCodemp());

				LiinspeccionesPeer::addSelectColumns($criteria);
				$this->collLiinspeccionessRelatedByCodempadm = LiinspeccionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiinspeccionesPeer::CODEMPADM, $this->getCodemp());

				LiinspeccionesPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiinspeccionesRelatedByCodempadmCriteria) || !$this->lastLiinspeccionesRelatedByCodempadmCriteria->equals($criteria)) {
					$this->collLiinspeccionessRelatedByCodempadm = LiinspeccionesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiinspeccionesRelatedByCodempadmCriteria = $criteria;
		return $this->collLiinspeccionessRelatedByCodempadm;
	}

	
	public function countLiinspeccionessRelatedByCodempadm($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiinspeccionesPeer::CODEMPADM, $this->getCodemp());

		return LiinspeccionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiinspeccionesRelatedByCodempadm(Liinspecciones $l)
	{
		$this->collLiinspeccionessRelatedByCodempadm[] = $l;
		$l->setLidatstedetRelatedByCodempadm($this);
	}


	
	public function getLiinspeccionessRelatedByCodempadmJoinLivaluaciones($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiinspeccionessRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLiinspeccionessRelatedByCodempadm = array();
			} else {

				$criteria->add(LiinspeccionesPeer::CODEMPADM, $this->getCodemp());

				$this->collLiinspeccionessRelatedByCodempadm = LiinspeccionesPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		} else {
									
			$criteria->add(LiinspeccionesPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLiinspeccionesRelatedByCodempadmCriteria) || !$this->lastLiinspeccionesRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLiinspeccionessRelatedByCodempadm = LiinspeccionesPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		}
		$this->lastLiinspeccionesRelatedByCodempadmCriteria = $criteria;

		return $this->collLiinspeccionessRelatedByCodempadm;
	}


	
	public function getLiinspeccionessRelatedByCodempadmJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiinspeccionessRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLiinspeccionessRelatedByCodempadm = array();
			} else {

				$criteria->add(LiinspeccionesPeer::CODEMPADM, $this->getCodemp());

				$this->collLiinspeccionessRelatedByCodempadm = LiinspeccionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiinspeccionesPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLiinspeccionesRelatedByCodempadmCriteria) || !$this->lastLiinspeccionesRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLiinspeccionessRelatedByCodempadm = LiinspeccionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiinspeccionesRelatedByCodempadmCriteria = $criteria;

		return $this->collLiinspeccionessRelatedByCodempadm;
	}

	
	public function initLiinspeccionessRelatedByCodempeje()
	{
		if ($this->collLiinspeccionessRelatedByCodempeje === null) {
			$this->collLiinspeccionessRelatedByCodempeje = array();
		}
	}

	
	public function getLiinspeccionessRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiinspeccionessRelatedByCodempeje === null) {
			if ($this->isNew()) {
			   $this->collLiinspeccionessRelatedByCodempeje = array();
			} else {

				$criteria->add(LiinspeccionesPeer::CODEMPEJE, $this->getCodemp());

				LiinspeccionesPeer::addSelectColumns($criteria);
				$this->collLiinspeccionessRelatedByCodempeje = LiinspeccionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiinspeccionesPeer::CODEMPEJE, $this->getCodemp());

				LiinspeccionesPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiinspeccionesRelatedByCodempejeCriteria) || !$this->lastLiinspeccionesRelatedByCodempejeCriteria->equals($criteria)) {
					$this->collLiinspeccionessRelatedByCodempeje = LiinspeccionesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiinspeccionesRelatedByCodempejeCriteria = $criteria;
		return $this->collLiinspeccionessRelatedByCodempeje;
	}

	
	public function countLiinspeccionessRelatedByCodempeje($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiinspeccionesPeer::CODEMPEJE, $this->getCodemp());

		return LiinspeccionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiinspeccionesRelatedByCodempeje(Liinspecciones $l)
	{
		$this->collLiinspeccionessRelatedByCodempeje[] = $l;
		$l->setLidatstedetRelatedByCodempeje($this);
	}


	
	public function getLiinspeccionessRelatedByCodempejeJoinLivaluaciones($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiinspeccionessRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLiinspeccionessRelatedByCodempeje = array();
			} else {

				$criteria->add(LiinspeccionesPeer::CODEMPEJE, $this->getCodemp());

				$this->collLiinspeccionessRelatedByCodempeje = LiinspeccionesPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		} else {
									
			$criteria->add(LiinspeccionesPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLiinspeccionesRelatedByCodempejeCriteria) || !$this->lastLiinspeccionesRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLiinspeccionessRelatedByCodempeje = LiinspeccionesPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		}
		$this->lastLiinspeccionesRelatedByCodempejeCriteria = $criteria;

		return $this->collLiinspeccionessRelatedByCodempeje;
	}


	
	public function getLiinspeccionessRelatedByCodempejeJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiinspeccionessRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLiinspeccionessRelatedByCodempeje = array();
			} else {

				$criteria->add(LiinspeccionesPeer::CODEMPEJE, $this->getCodemp());

				$this->collLiinspeccionessRelatedByCodempeje = LiinspeccionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiinspeccionesPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLiinspeccionesRelatedByCodempejeCriteria) || !$this->lastLiinspeccionesRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLiinspeccionessRelatedByCodempeje = LiinspeccionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiinspeccionesRelatedByCodempejeCriteria = $criteria;

		return $this->collLiinspeccionessRelatedByCodempeje;
	}

	
	public function initLientregassRelatedByCodempadm()
	{
		if ($this->collLientregassRelatedByCodempadm === null) {
			$this->collLientregassRelatedByCodempadm = array();
		}
	}

	
	public function getLientregassRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLientregassRelatedByCodempadm === null) {
			if ($this->isNew()) {
			   $this->collLientregassRelatedByCodempadm = array();
			} else {

				$criteria->add(LientregasPeer::CODEMPADM, $this->getCodemp());

				LientregasPeer::addSelectColumns($criteria);
				$this->collLientregassRelatedByCodempadm = LientregasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LientregasPeer::CODEMPADM, $this->getCodemp());

				LientregasPeer::addSelectColumns($criteria);
				if (!isset($this->lastLientregasRelatedByCodempadmCriteria) || !$this->lastLientregasRelatedByCodempadmCriteria->equals($criteria)) {
					$this->collLientregassRelatedByCodempadm = LientregasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLientregasRelatedByCodempadmCriteria = $criteria;
		return $this->collLientregassRelatedByCodempadm;
	}

	
	public function countLientregassRelatedByCodempadm($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LientregasPeer::CODEMPADM, $this->getCodemp());

		return LientregasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLientregasRelatedByCodempadm(Lientregas $l)
	{
		$this->collLientregassRelatedByCodempadm[] = $l;
		$l->setLidatstedetRelatedByCodempadm($this);
	}


	
	public function getLientregassRelatedByCodempadmJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLientregassRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLientregassRelatedByCodempadm = array();
			} else {

				$criteria->add(LientregasPeer::CODEMPADM, $this->getCodemp());

				$this->collLientregassRelatedByCodempadm = LientregasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LientregasPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLientregasRelatedByCodempadmCriteria) || !$this->lastLientregasRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLientregassRelatedByCodempadm = LientregasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLientregasRelatedByCodempadmCriteria = $criteria;

		return $this->collLientregassRelatedByCodempadm;
	}


	
	public function getLientregassRelatedByCodempadmJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLientregassRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLientregassRelatedByCodempadm = array();
			} else {

				$criteria->add(LientregasPeer::CODEMPADM, $this->getCodemp());

				$this->collLientregassRelatedByCodempadm = LientregasPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LientregasPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLientregasRelatedByCodempadmCriteria) || !$this->lastLientregasRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLientregassRelatedByCodempadm = LientregasPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLientregasRelatedByCodempadmCriteria = $criteria;

		return $this->collLientregassRelatedByCodempadm;
	}

	
	public function initLientregassRelatedByCodempeje()
	{
		if ($this->collLientregassRelatedByCodempeje === null) {
			$this->collLientregassRelatedByCodempeje = array();
		}
	}

	
	public function getLientregassRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLientregassRelatedByCodempeje === null) {
			if ($this->isNew()) {
			   $this->collLientregassRelatedByCodempeje = array();
			} else {

				$criteria->add(LientregasPeer::CODEMPEJE, $this->getCodemp());

				LientregasPeer::addSelectColumns($criteria);
				$this->collLientregassRelatedByCodempeje = LientregasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LientregasPeer::CODEMPEJE, $this->getCodemp());

				LientregasPeer::addSelectColumns($criteria);
				if (!isset($this->lastLientregasRelatedByCodempejeCriteria) || !$this->lastLientregasRelatedByCodempejeCriteria->equals($criteria)) {
					$this->collLientregassRelatedByCodempeje = LientregasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLientregasRelatedByCodempejeCriteria = $criteria;
		return $this->collLientregassRelatedByCodempeje;
	}

	
	public function countLientregassRelatedByCodempeje($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LientregasPeer::CODEMPEJE, $this->getCodemp());

		return LientregasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLientregasRelatedByCodempeje(Lientregas $l)
	{
		$this->collLientregassRelatedByCodempeje[] = $l;
		$l->setLidatstedetRelatedByCodempeje($this);
	}


	
	public function getLientregassRelatedByCodempejeJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLientregassRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLientregassRelatedByCodempeje = array();
			} else {

				$criteria->add(LientregasPeer::CODEMPEJE, $this->getCodemp());

				$this->collLientregassRelatedByCodempeje = LientregasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LientregasPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLientregasRelatedByCodempejeCriteria) || !$this->lastLientregasRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLientregassRelatedByCodempeje = LientregasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLientregasRelatedByCodempejeCriteria = $criteria;

		return $this->collLientregassRelatedByCodempeje;
	}


	
	public function getLientregassRelatedByCodempejeJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLientregasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLientregassRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLientregassRelatedByCodempeje = array();
			} else {

				$criteria->add(LientregasPeer::CODEMPEJE, $this->getCodemp());

				$this->collLientregassRelatedByCodempeje = LientregasPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LientregasPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLientregasRelatedByCodempejeCriteria) || !$this->lastLientregasRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLientregassRelatedByCodempeje = LientregasPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLientregasRelatedByCodempejeCriteria = $criteria;

		return $this->collLientregassRelatedByCodempeje;
	}

	
	public function initLiactdescontsRelatedByCodempadm()
	{
		if ($this->collLiactdescontsRelatedByCodempadm === null) {
			$this->collLiactdescontsRelatedByCodempadm = array();
		}
	}

	
	public function getLiactdescontsRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactdescontsRelatedByCodempadm === null) {
			if ($this->isNew()) {
			   $this->collLiactdescontsRelatedByCodempadm = array();
			} else {

				$criteria->add(LiactdescontPeer::CODEMPADM, $this->getCodemp());

				LiactdescontPeer::addSelectColumns($criteria);
				$this->collLiactdescontsRelatedByCodempadm = LiactdescontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiactdescontPeer::CODEMPADM, $this->getCodemp());

				LiactdescontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiactdescontRelatedByCodempadmCriteria) || !$this->lastLiactdescontRelatedByCodempadmCriteria->equals($criteria)) {
					$this->collLiactdescontsRelatedByCodempadm = LiactdescontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiactdescontRelatedByCodempadmCriteria = $criteria;
		return $this->collLiactdescontsRelatedByCodempadm;
	}

	
	public function countLiactdescontsRelatedByCodempadm($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiactdescontPeer::CODEMPADM, $this->getCodemp());

		return LiactdescontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiactdescontRelatedByCodempadm(Liactdescont $l)
	{
		$this->collLiactdescontsRelatedByCodempadm[] = $l;
		$l->setLidatstedetRelatedByCodempadm($this);
	}


	
	public function getLiactdescontsRelatedByCodempadmJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactdescontsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLiactdescontsRelatedByCodempadm = array();
			} else {

				$criteria->add(LiactdescontPeer::CODEMPADM, $this->getCodemp());

				$this->collLiactdescontsRelatedByCodempadm = LiactdescontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactdescontPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLiactdescontRelatedByCodempadmCriteria) || !$this->lastLiactdescontRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLiactdescontsRelatedByCodempadm = LiactdescontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLiactdescontRelatedByCodempadmCriteria = $criteria;

		return $this->collLiactdescontsRelatedByCodempadm;
	}


	
	public function getLiactdescontsRelatedByCodempadmJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactdescontsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLiactdescontsRelatedByCodempadm = array();
			} else {

				$criteria->add(LiactdescontPeer::CODEMPADM, $this->getCodemp());

				$this->collLiactdescontsRelatedByCodempadm = LiactdescontPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactdescontPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLiactdescontRelatedByCodempadmCriteria) || !$this->lastLiactdescontRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLiactdescontsRelatedByCodempadm = LiactdescontPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiactdescontRelatedByCodempadmCriteria = $criteria;

		return $this->collLiactdescontsRelatedByCodempadm;
	}

	
	public function initLiactdescontsRelatedByCodempeje()
	{
		if ($this->collLiactdescontsRelatedByCodempeje === null) {
			$this->collLiactdescontsRelatedByCodempeje = array();
		}
	}

	
	public function getLiactdescontsRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactdescontsRelatedByCodempeje === null) {
			if ($this->isNew()) {
			   $this->collLiactdescontsRelatedByCodempeje = array();
			} else {

				$criteria->add(LiactdescontPeer::CODEMPEJE, $this->getCodemp());

				LiactdescontPeer::addSelectColumns($criteria);
				$this->collLiactdescontsRelatedByCodempeje = LiactdescontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiactdescontPeer::CODEMPEJE, $this->getCodemp());

				LiactdescontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiactdescontRelatedByCodempejeCriteria) || !$this->lastLiactdescontRelatedByCodempejeCriteria->equals($criteria)) {
					$this->collLiactdescontsRelatedByCodempeje = LiactdescontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiactdescontRelatedByCodempejeCriteria = $criteria;
		return $this->collLiactdescontsRelatedByCodempeje;
	}

	
	public function countLiactdescontsRelatedByCodempeje($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiactdescontPeer::CODEMPEJE, $this->getCodemp());

		return LiactdescontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiactdescontRelatedByCodempeje(Liactdescont $l)
	{
		$this->collLiactdescontsRelatedByCodempeje[] = $l;
		$l->setLidatstedetRelatedByCodempeje($this);
	}


	
	public function getLiactdescontsRelatedByCodempejeJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactdescontsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLiactdescontsRelatedByCodempeje = array();
			} else {

				$criteria->add(LiactdescontPeer::CODEMPEJE, $this->getCodemp());

				$this->collLiactdescontsRelatedByCodempeje = LiactdescontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactdescontPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLiactdescontRelatedByCodempejeCriteria) || !$this->lastLiactdescontRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLiactdescontsRelatedByCodempeje = LiactdescontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLiactdescontRelatedByCodempejeCriteria = $criteria;

		return $this->collLiactdescontsRelatedByCodempeje;
	}


	
	public function getLiactdescontsRelatedByCodempejeJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactdescontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactdescontsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLiactdescontsRelatedByCodempeje = array();
			} else {

				$criteria->add(LiactdescontPeer::CODEMPEJE, $this->getCodemp());

				$this->collLiactdescontsRelatedByCodempeje = LiactdescontPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactdescontPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLiactdescontRelatedByCodempejeCriteria) || !$this->lastLiactdescontRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLiactdescontsRelatedByCodempeje = LiactdescontPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiactdescontRelatedByCodempejeCriteria = $criteria;

		return $this->collLiactdescontsRelatedByCodempeje;
	}

	
	public function initLisolpagsRelatedByCodempadm()
	{
		if ($this->collLisolpagsRelatedByCodempadm === null) {
			$this->collLisolpagsRelatedByCodempadm = array();
		}
	}

	
	public function getLisolpagsRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpagsRelatedByCodempadm === null) {
			if ($this->isNew()) {
			   $this->collLisolpagsRelatedByCodempadm = array();
			} else {

				$criteria->add(LisolpagPeer::CODEMPADM, $this->getCodemp());

				LisolpagPeer::addSelectColumns($criteria);
				$this->collLisolpagsRelatedByCodempadm = LisolpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LisolpagPeer::CODEMPADM, $this->getCodemp());

				LisolpagPeer::addSelectColumns($criteria);
				if (!isset($this->lastLisolpagRelatedByCodempadmCriteria) || !$this->lastLisolpagRelatedByCodempadmCriteria->equals($criteria)) {
					$this->collLisolpagsRelatedByCodempadm = LisolpagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLisolpagRelatedByCodempadmCriteria = $criteria;
		return $this->collLisolpagsRelatedByCodempadm;
	}

	
	public function countLisolpagsRelatedByCodempadm($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LisolpagPeer::CODEMPADM, $this->getCodemp());

		return LisolpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLisolpagRelatedByCodempadm(Lisolpag $l)
	{
		$this->collLisolpagsRelatedByCodempadm[] = $l;
		$l->setLidatstedetRelatedByCodempadm($this);
	}


	
	public function getLisolpagsRelatedByCodempadmJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpagsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLisolpagsRelatedByCodempadm = array();
			} else {

				$criteria->add(LisolpagPeer::CODEMPADM, $this->getCodemp());

				$this->collLisolpagsRelatedByCodempadm = LisolpagPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLisolpagRelatedByCodempadmCriteria) || !$this->lastLisolpagRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLisolpagsRelatedByCodempadm = LisolpagPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLisolpagRelatedByCodempadmCriteria = $criteria;

		return $this->collLisolpagsRelatedByCodempadm;
	}


	
	public function getLisolpagsRelatedByCodempadmJoinLivaluaciones($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpagsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLisolpagsRelatedByCodempadm = array();
			} else {

				$criteria->add(LisolpagPeer::CODEMPADM, $this->getCodemp());

				$this->collLisolpagsRelatedByCodempadm = LisolpagPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLisolpagRelatedByCodempadmCriteria) || !$this->lastLisolpagRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLisolpagsRelatedByCodempadm = LisolpagPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		}
		$this->lastLisolpagRelatedByCodempadmCriteria = $criteria;

		return $this->collLisolpagsRelatedByCodempadm;
	}


	
	public function getLisolpagsRelatedByCodempadmJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpagsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLisolpagsRelatedByCodempadm = array();
			} else {

				$criteria->add(LisolpagPeer::CODEMPADM, $this->getCodemp());

				$this->collLisolpagsRelatedByCodempadm = LisolpagPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLisolpagRelatedByCodempadmCriteria) || !$this->lastLisolpagRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLisolpagsRelatedByCodempadm = LisolpagPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLisolpagRelatedByCodempadmCriteria = $criteria;

		return $this->collLisolpagsRelatedByCodempadm;
	}

	
	public function initLisolpagsRelatedByCodempeje()
	{
		if ($this->collLisolpagsRelatedByCodempeje === null) {
			$this->collLisolpagsRelatedByCodempeje = array();
		}
	}

	
	public function getLisolpagsRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpagsRelatedByCodempeje === null) {
			if ($this->isNew()) {
			   $this->collLisolpagsRelatedByCodempeje = array();
			} else {

				$criteria->add(LisolpagPeer::CODEMPEJE, $this->getCodemp());

				LisolpagPeer::addSelectColumns($criteria);
				$this->collLisolpagsRelatedByCodempeje = LisolpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LisolpagPeer::CODEMPEJE, $this->getCodemp());

				LisolpagPeer::addSelectColumns($criteria);
				if (!isset($this->lastLisolpagRelatedByCodempejeCriteria) || !$this->lastLisolpagRelatedByCodempejeCriteria->equals($criteria)) {
					$this->collLisolpagsRelatedByCodempeje = LisolpagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLisolpagRelatedByCodempejeCriteria = $criteria;
		return $this->collLisolpagsRelatedByCodempeje;
	}

	
	public function countLisolpagsRelatedByCodempeje($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LisolpagPeer::CODEMPEJE, $this->getCodemp());

		return LisolpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLisolpagRelatedByCodempeje(Lisolpag $l)
	{
		$this->collLisolpagsRelatedByCodempeje[] = $l;
		$l->setLidatstedetRelatedByCodempeje($this);
	}


	
	public function getLisolpagsRelatedByCodempejeJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpagsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLisolpagsRelatedByCodempeje = array();
			} else {

				$criteria->add(LisolpagPeer::CODEMPEJE, $this->getCodemp());

				$this->collLisolpagsRelatedByCodempeje = LisolpagPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLisolpagRelatedByCodempejeCriteria) || !$this->lastLisolpagRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLisolpagsRelatedByCodempeje = LisolpagPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLisolpagRelatedByCodempejeCriteria = $criteria;

		return $this->collLisolpagsRelatedByCodempeje;
	}


	
	public function getLisolpagsRelatedByCodempejeJoinLivaluaciones($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpagsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLisolpagsRelatedByCodempeje = array();
			} else {

				$criteria->add(LisolpagPeer::CODEMPEJE, $this->getCodemp());

				$this->collLisolpagsRelatedByCodempeje = LisolpagPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLisolpagRelatedByCodempejeCriteria) || !$this->lastLisolpagRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLisolpagsRelatedByCodempeje = LisolpagPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		}
		$this->lastLisolpagRelatedByCodempejeCriteria = $criteria;

		return $this->collLisolpagsRelatedByCodempeje;
	}


	
	public function getLisolpagsRelatedByCodempejeJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolpagsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLisolpagsRelatedByCodempeje = array();
			} else {

				$criteria->add(LisolpagPeer::CODEMPEJE, $this->getCodemp());

				$this->collLisolpagsRelatedByCodempeje = LisolpagPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLisolpagRelatedByCodempejeCriteria) || !$this->lastLisolpagRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLisolpagsRelatedByCodempeje = LisolpagPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLisolpagRelatedByCodempejeCriteria = $criteria;

		return $this->collLisolpagsRelatedByCodempeje;
	}

	
	public function initLipenalizacionessRelatedByCodempadm()
	{
		if ($this->collLipenalizacionessRelatedByCodempadm === null) {
			$this->collLipenalizacionessRelatedByCodempadm = array();
		}
	}

	
	public function getLipenalizacionessRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacionessRelatedByCodempadm === null) {
			if ($this->isNew()) {
			   $this->collLipenalizacionessRelatedByCodempadm = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODEMPADM, $this->getCodemp());

				LipenalizacionesPeer::addSelectColumns($criteria);
				$this->collLipenalizacionessRelatedByCodempadm = LipenalizacionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LipenalizacionesPeer::CODEMPADM, $this->getCodemp());

				LipenalizacionesPeer::addSelectColumns($criteria);
				if (!isset($this->lastLipenalizacionesRelatedByCodempadmCriteria) || !$this->lastLipenalizacionesRelatedByCodempadmCriteria->equals($criteria)) {
					$this->collLipenalizacionessRelatedByCodempadm = LipenalizacionesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLipenalizacionesRelatedByCodempadmCriteria = $criteria;
		return $this->collLipenalizacionessRelatedByCodempadm;
	}

	
	public function countLipenalizacionessRelatedByCodempadm($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LipenalizacionesPeer::CODEMPADM, $this->getCodemp());

		return LipenalizacionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLipenalizacionesRelatedByCodempadm(Lipenalizaciones $l)
	{
		$this->collLipenalizacionessRelatedByCodempadm[] = $l;
		$l->setLidatstedetRelatedByCodempadm($this);
	}


	
	public function getLipenalizacionessRelatedByCodempadmJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacionessRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLipenalizacionessRelatedByCodempadm = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODEMPADM, $this->getCodemp());

				$this->collLipenalizacionessRelatedByCodempadm = LipenalizacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLipenalizacionesRelatedByCodempadmCriteria) || !$this->lastLipenalizacionesRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLipenalizacionessRelatedByCodempadm = LipenalizacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLipenalizacionesRelatedByCodempadmCriteria = $criteria;

		return $this->collLipenalizacionessRelatedByCodempadm;
	}


	
	public function getLipenalizacionessRelatedByCodempadmJoinLitippen($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacionessRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLipenalizacionessRelatedByCodempadm = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODEMPADM, $this->getCodemp());

				$this->collLipenalizacionessRelatedByCodempadm = LipenalizacionesPeer::doSelectJoinLitippen($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLipenalizacionesRelatedByCodempadmCriteria) || !$this->lastLipenalizacionesRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLipenalizacionessRelatedByCodempadm = LipenalizacionesPeer::doSelectJoinLitippen($criteria, $con);
			}
		}
		$this->lastLipenalizacionesRelatedByCodempadmCriteria = $criteria;

		return $this->collLipenalizacionessRelatedByCodempadm;
	}


	
	public function getLipenalizacionessRelatedByCodempadmJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacionessRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLipenalizacionessRelatedByCodempadm = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODEMPADM, $this->getCodemp());

				$this->collLipenalizacionessRelatedByCodempadm = LipenalizacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLipenalizacionesRelatedByCodempadmCriteria) || !$this->lastLipenalizacionesRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLipenalizacionessRelatedByCodempadm = LipenalizacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLipenalizacionesRelatedByCodempadmCriteria = $criteria;

		return $this->collLipenalizacionessRelatedByCodempadm;
	}

	
	public function initLipenalizacionessRelatedByCodempeje()
	{
		if ($this->collLipenalizacionessRelatedByCodempeje === null) {
			$this->collLipenalizacionessRelatedByCodempeje = array();
		}
	}

	
	public function getLipenalizacionessRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacionessRelatedByCodempeje === null) {
			if ($this->isNew()) {
			   $this->collLipenalizacionessRelatedByCodempeje = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODEMPEJE, $this->getCodemp());

				LipenalizacionesPeer::addSelectColumns($criteria);
				$this->collLipenalizacionessRelatedByCodempeje = LipenalizacionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LipenalizacionesPeer::CODEMPEJE, $this->getCodemp());

				LipenalizacionesPeer::addSelectColumns($criteria);
				if (!isset($this->lastLipenalizacionesRelatedByCodempejeCriteria) || !$this->lastLipenalizacionesRelatedByCodempejeCriteria->equals($criteria)) {
					$this->collLipenalizacionessRelatedByCodempeje = LipenalizacionesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLipenalizacionesRelatedByCodempejeCriteria = $criteria;
		return $this->collLipenalizacionessRelatedByCodempeje;
	}

	
	public function countLipenalizacionessRelatedByCodempeje($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LipenalizacionesPeer::CODEMPEJE, $this->getCodemp());

		return LipenalizacionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLipenalizacionesRelatedByCodempeje(Lipenalizaciones $l)
	{
		$this->collLipenalizacionessRelatedByCodempeje[] = $l;
		$l->setLidatstedetRelatedByCodempeje($this);
	}


	
	public function getLipenalizacionessRelatedByCodempejeJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacionessRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLipenalizacionessRelatedByCodempeje = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODEMPEJE, $this->getCodemp());

				$this->collLipenalizacionessRelatedByCodempeje = LipenalizacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLipenalizacionesRelatedByCodempejeCriteria) || !$this->lastLipenalizacionesRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLipenalizacionessRelatedByCodempeje = LipenalizacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLipenalizacionesRelatedByCodempejeCriteria = $criteria;

		return $this->collLipenalizacionessRelatedByCodempeje;
	}


	
	public function getLipenalizacionessRelatedByCodempejeJoinLitippen($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacionessRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLipenalizacionessRelatedByCodempeje = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODEMPEJE, $this->getCodemp());

				$this->collLipenalizacionessRelatedByCodempeje = LipenalizacionesPeer::doSelectJoinLitippen($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLipenalizacionesRelatedByCodempejeCriteria) || !$this->lastLipenalizacionesRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLipenalizacionessRelatedByCodempeje = LipenalizacionesPeer::doSelectJoinLitippen($criteria, $con);
			}
		}
		$this->lastLipenalizacionesRelatedByCodempejeCriteria = $criteria;

		return $this->collLipenalizacionessRelatedByCodempeje;
	}


	
	public function getLipenalizacionessRelatedByCodempejeJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacionessRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLipenalizacionessRelatedByCodempeje = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODEMPEJE, $this->getCodemp());

				$this->collLipenalizacionessRelatedByCodempeje = LipenalizacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLipenalizacionesRelatedByCodempejeCriteria) || !$this->lastLipenalizacionesRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLipenalizacionessRelatedByCodempeje = LipenalizacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLipenalizacionesRelatedByCodempejeCriteria = $criteria;

		return $this->collLipenalizacionessRelatedByCodempeje;
	}

	
	public function initLimodcontsRelatedByCodempadm()
	{
		if ($this->collLimodcontsRelatedByCodempadm === null) {
			$this->collLimodcontsRelatedByCodempadm = array();
		}
	}

	
	public function getLimodcontsRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodempadm === null) {
			if ($this->isNew()) {
			   $this->collLimodcontsRelatedByCodempadm = array();
			} else {

				$criteria->add(LimodcontPeer::CODEMPADM, $this->getCodemp());

				LimodcontPeer::addSelectColumns($criteria);
				$this->collLimodcontsRelatedByCodempadm = LimodcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LimodcontPeer::CODEMPADM, $this->getCodemp());

				LimodcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLimodcontRelatedByCodempadmCriteria) || !$this->lastLimodcontRelatedByCodempadmCriteria->equals($criteria)) {
					$this->collLimodcontsRelatedByCodempadm = LimodcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLimodcontRelatedByCodempadmCriteria = $criteria;
		return $this->collLimodcontsRelatedByCodempadm;
	}

	
	public function countLimodcontsRelatedByCodempadm($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LimodcontPeer::CODEMPADM, $this->getCodemp());

		return LimodcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLimodcontRelatedByCodempadm(Limodcont $l)
	{
		$this->collLimodcontsRelatedByCodempadm[] = $l;
		$l->setLidatstedetRelatedByCodempadm($this);
	}


	
	public function getLimodcontsRelatedByCodempadmJoinLitipmodRelatedByTipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodempadm = array();
			} else {

				$criteria->add(LimodcontPeer::CODEMPADM, $this->getCodemp());

				$this->collLimodcontsRelatedByCodempadm = LimodcontPeer::doSelectJoinLitipmodRelatedByTipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLimodcontRelatedByCodempadmCriteria) || !$this->lastLimodcontRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodempadm = LimodcontPeer::doSelectJoinLitipmodRelatedByTipmod($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodempadmCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodempadm;
	}


	
	public function getLimodcontsRelatedByCodempadmJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodempadm = array();
			} else {

				$criteria->add(LimodcontPeer::CODEMPADM, $this->getCodemp());

				$this->collLimodcontsRelatedByCodempadm = LimodcontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLimodcontRelatedByCodempadmCriteria) || !$this->lastLimodcontRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodempadm = LimodcontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodempadmCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodempadm;
	}


	
	public function getLimodcontsRelatedByCodempadmJoinLitipmodRelatedByCodtipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodempadm = array();
			} else {

				$criteria->add(LimodcontPeer::CODEMPADM, $this->getCodemp());

				$this->collLimodcontsRelatedByCodempadm = LimodcontPeer::doSelectJoinLitipmodRelatedByCodtipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLimodcontRelatedByCodempadmCriteria) || !$this->lastLimodcontRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodempadm = LimodcontPeer::doSelectJoinLitipmodRelatedByCodtipmod($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodempadmCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodempadm;
	}


	
	public function getLimodcontsRelatedByCodempadmJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodempadm = array();
			} else {

				$criteria->add(LimodcontPeer::CODEMPADM, $this->getCodemp());

				$this->collLimodcontsRelatedByCodempadm = LimodcontPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLimodcontRelatedByCodempadmCriteria) || !$this->lastLimodcontRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodempadm = LimodcontPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodempadmCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodempadm;
	}

	
	public function initLimodcontsRelatedByCodempeje()
	{
		if ($this->collLimodcontsRelatedByCodempeje === null) {
			$this->collLimodcontsRelatedByCodempeje = array();
		}
	}

	
	public function getLimodcontsRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodempeje === null) {
			if ($this->isNew()) {
			   $this->collLimodcontsRelatedByCodempeje = array();
			} else {

				$criteria->add(LimodcontPeer::CODEMPEJE, $this->getCodemp());

				LimodcontPeer::addSelectColumns($criteria);
				$this->collLimodcontsRelatedByCodempeje = LimodcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LimodcontPeer::CODEMPEJE, $this->getCodemp());

				LimodcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLimodcontRelatedByCodempejeCriteria) || !$this->lastLimodcontRelatedByCodempejeCriteria->equals($criteria)) {
					$this->collLimodcontsRelatedByCodempeje = LimodcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLimodcontRelatedByCodempejeCriteria = $criteria;
		return $this->collLimodcontsRelatedByCodempeje;
	}

	
	public function countLimodcontsRelatedByCodempeje($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LimodcontPeer::CODEMPEJE, $this->getCodemp());

		return LimodcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLimodcontRelatedByCodempeje(Limodcont $l)
	{
		$this->collLimodcontsRelatedByCodempeje[] = $l;
		$l->setLidatstedetRelatedByCodempeje($this);
	}


	
	public function getLimodcontsRelatedByCodempejeJoinLitipmodRelatedByTipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodempeje = array();
			} else {

				$criteria->add(LimodcontPeer::CODEMPEJE, $this->getCodemp());

				$this->collLimodcontsRelatedByCodempeje = LimodcontPeer::doSelectJoinLitipmodRelatedByTipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLimodcontRelatedByCodempejeCriteria) || !$this->lastLimodcontRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodempeje = LimodcontPeer::doSelectJoinLitipmodRelatedByTipmod($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodempejeCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodempeje;
	}


	
	public function getLimodcontsRelatedByCodempejeJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodempeje = array();
			} else {

				$criteria->add(LimodcontPeer::CODEMPEJE, $this->getCodemp());

				$this->collLimodcontsRelatedByCodempeje = LimodcontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLimodcontRelatedByCodempejeCriteria) || !$this->lastLimodcontRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodempeje = LimodcontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodempejeCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodempeje;
	}


	
	public function getLimodcontsRelatedByCodempejeJoinLitipmodRelatedByCodtipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodempeje = array();
			} else {

				$criteria->add(LimodcontPeer::CODEMPEJE, $this->getCodemp());

				$this->collLimodcontsRelatedByCodempeje = LimodcontPeer::doSelectJoinLitipmodRelatedByCodtipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLimodcontRelatedByCodempejeCriteria) || !$this->lastLimodcontRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodempeje = LimodcontPeer::doSelectJoinLitipmodRelatedByCodtipmod($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodempejeCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodempeje;
	}


	
	public function getLimodcontsRelatedByCodempejeJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimodcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimodcontsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLimodcontsRelatedByCodempeje = array();
			} else {

				$criteria->add(LimodcontPeer::CODEMPEJE, $this->getCodemp());

				$this->collLimodcontsRelatedByCodempeje = LimodcontPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLimodcontRelatedByCodempejeCriteria) || !$this->lastLimodcontRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLimodcontsRelatedByCodempeje = LimodcontPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLimodcontRelatedByCodempejeCriteria = $criteria;

		return $this->collLimodcontsRelatedByCodempeje;
	}

	
	public function initLiaddendumsRelatedByCodempadm()
	{
		if ($this->collLiaddendumsRelatedByCodempadm === null) {
			$this->collLiaddendumsRelatedByCodempadm = array();
		}
	}

	
	public function getLiaddendumsRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendumsRelatedByCodempadm === null) {
			if ($this->isNew()) {
			   $this->collLiaddendumsRelatedByCodempadm = array();
			} else {

				$criteria->add(LiaddendumPeer::CODEMPADM, $this->getCodemp());

				LiaddendumPeer::addSelectColumns($criteria);
				$this->collLiaddendumsRelatedByCodempadm = LiaddendumPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiaddendumPeer::CODEMPADM, $this->getCodemp());

				LiaddendumPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiaddendumRelatedByCodempadmCriteria) || !$this->lastLiaddendumRelatedByCodempadmCriteria->equals($criteria)) {
					$this->collLiaddendumsRelatedByCodempadm = LiaddendumPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiaddendumRelatedByCodempadmCriteria = $criteria;
		return $this->collLiaddendumsRelatedByCodempadm;
	}

	
	public function countLiaddendumsRelatedByCodempadm($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiaddendumPeer::CODEMPADM, $this->getCodemp());

		return LiaddendumPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiaddendumRelatedByCodempadm(Liaddendum $l)
	{
		$this->collLiaddendumsRelatedByCodempadm[] = $l;
		$l->setLidatstedetRelatedByCodempadm($this);
	}


	
	public function getLiaddendumsRelatedByCodempadmJoinLitipadd($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendumsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLiaddendumsRelatedByCodempadm = array();
			} else {

				$criteria->add(LiaddendumPeer::CODEMPADM, $this->getCodemp());

				$this->collLiaddendumsRelatedByCodempadm = LiaddendumPeer::doSelectJoinLitipadd($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLiaddendumRelatedByCodempadmCriteria) || !$this->lastLiaddendumRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLiaddendumsRelatedByCodempadm = LiaddendumPeer::doSelectJoinLitipadd($criteria, $con);
			}
		}
		$this->lastLiaddendumRelatedByCodempadmCriteria = $criteria;

		return $this->collLiaddendumsRelatedByCodempadm;
	}


	
	public function getLiaddendumsRelatedByCodempadmJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendumsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLiaddendumsRelatedByCodempadm = array();
			} else {

				$criteria->add(LiaddendumPeer::CODEMPADM, $this->getCodemp());

				$this->collLiaddendumsRelatedByCodempadm = LiaddendumPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLiaddendumRelatedByCodempadmCriteria) || !$this->lastLiaddendumRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLiaddendumsRelatedByCodempadm = LiaddendumPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLiaddendumRelatedByCodempadmCriteria = $criteria;

		return $this->collLiaddendumsRelatedByCodempadm;
	}


	
	public function getLiaddendumsRelatedByCodempadmJoinLitipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendumsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLiaddendumsRelatedByCodempadm = array();
			} else {

				$criteria->add(LiaddendumPeer::CODEMPADM, $this->getCodemp());

				$this->collLiaddendumsRelatedByCodempadm = LiaddendumPeer::doSelectJoinLitipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLiaddendumRelatedByCodempadmCriteria) || !$this->lastLiaddendumRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLiaddendumsRelatedByCodempadm = LiaddendumPeer::doSelectJoinLitipmod($criteria, $con);
			}
		}
		$this->lastLiaddendumRelatedByCodempadmCriteria = $criteria;

		return $this->collLiaddendumsRelatedByCodempadm;
	}


	
	public function getLiaddendumsRelatedByCodempadmJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendumsRelatedByCodempadm === null) {
			if ($this->isNew()) {
				$this->collLiaddendumsRelatedByCodempadm = array();
			} else {

				$criteria->add(LiaddendumPeer::CODEMPADM, $this->getCodemp());

				$this->collLiaddendumsRelatedByCodempadm = LiaddendumPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODEMPADM, $this->getCodemp());

			if (!isset($this->lastLiaddendumRelatedByCodempadmCriteria) || !$this->lastLiaddendumRelatedByCodempadmCriteria->equals($criteria)) {
				$this->collLiaddendumsRelatedByCodempadm = LiaddendumPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiaddendumRelatedByCodempadmCriteria = $criteria;

		return $this->collLiaddendumsRelatedByCodempadm;
	}

	
	public function initLiaddendumsRelatedByCodempeje()
	{
		if ($this->collLiaddendumsRelatedByCodempeje === null) {
			$this->collLiaddendumsRelatedByCodempeje = array();
		}
	}

	
	public function getLiaddendumsRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendumsRelatedByCodempeje === null) {
			if ($this->isNew()) {
			   $this->collLiaddendumsRelatedByCodempeje = array();
			} else {

				$criteria->add(LiaddendumPeer::CODEMPEJE, $this->getCodemp());

				LiaddendumPeer::addSelectColumns($criteria);
				$this->collLiaddendumsRelatedByCodempeje = LiaddendumPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiaddendumPeer::CODEMPEJE, $this->getCodemp());

				LiaddendumPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiaddendumRelatedByCodempejeCriteria) || !$this->lastLiaddendumRelatedByCodempejeCriteria->equals($criteria)) {
					$this->collLiaddendumsRelatedByCodempeje = LiaddendumPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiaddendumRelatedByCodempejeCriteria = $criteria;
		return $this->collLiaddendumsRelatedByCodempeje;
	}

	
	public function countLiaddendumsRelatedByCodempeje($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiaddendumPeer::CODEMPEJE, $this->getCodemp());

		return LiaddendumPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiaddendumRelatedByCodempeje(Liaddendum $l)
	{
		$this->collLiaddendumsRelatedByCodempeje[] = $l;
		$l->setLidatstedetRelatedByCodempeje($this);
	}


	
	public function getLiaddendumsRelatedByCodempejeJoinLitipadd($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendumsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLiaddendumsRelatedByCodempeje = array();
			} else {

				$criteria->add(LiaddendumPeer::CODEMPEJE, $this->getCodemp());

				$this->collLiaddendumsRelatedByCodempeje = LiaddendumPeer::doSelectJoinLitipadd($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLiaddendumRelatedByCodempejeCriteria) || !$this->lastLiaddendumRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLiaddendumsRelatedByCodempeje = LiaddendumPeer::doSelectJoinLitipadd($criteria, $con);
			}
		}
		$this->lastLiaddendumRelatedByCodempejeCriteria = $criteria;

		return $this->collLiaddendumsRelatedByCodempeje;
	}


	
	public function getLiaddendumsRelatedByCodempejeJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendumsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLiaddendumsRelatedByCodempeje = array();
			} else {

				$criteria->add(LiaddendumPeer::CODEMPEJE, $this->getCodemp());

				$this->collLiaddendumsRelatedByCodempeje = LiaddendumPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLiaddendumRelatedByCodempejeCriteria) || !$this->lastLiaddendumRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLiaddendumsRelatedByCodempeje = LiaddendumPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLiaddendumRelatedByCodempejeCriteria = $criteria;

		return $this->collLiaddendumsRelatedByCodempeje;
	}


	
	public function getLiaddendumsRelatedByCodempejeJoinLitipmod($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendumsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLiaddendumsRelatedByCodempeje = array();
			} else {

				$criteria->add(LiaddendumPeer::CODEMPEJE, $this->getCodemp());

				$this->collLiaddendumsRelatedByCodempeje = LiaddendumPeer::doSelectJoinLitipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLiaddendumRelatedByCodempejeCriteria) || !$this->lastLiaddendumRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLiaddendumsRelatedByCodempeje = LiaddendumPeer::doSelectJoinLitipmod($criteria, $con);
			}
		}
		$this->lastLiaddendumRelatedByCodempejeCriteria = $criteria;

		return $this->collLiaddendumsRelatedByCodempeje;
	}


	
	public function getLiaddendumsRelatedByCodempejeJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiaddendumPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaddendumsRelatedByCodempeje === null) {
			if ($this->isNew()) {
				$this->collLiaddendumsRelatedByCodempeje = array();
			} else {

				$criteria->add(LiaddendumPeer::CODEMPEJE, $this->getCodemp());

				$this->collLiaddendumsRelatedByCodempeje = LiaddendumPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::CODEMPEJE, $this->getCodemp());

			if (!isset($this->lastLiaddendumRelatedByCodempejeCriteria) || !$this->lastLiaddendumRelatedByCodempejeCriteria->equals($criteria)) {
				$this->collLiaddendumsRelatedByCodempeje = LiaddendumPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiaddendumRelatedByCodempejeCriteria = $criteria;

		return $this->collLiaddendumsRelatedByCodempeje;
	}

} 