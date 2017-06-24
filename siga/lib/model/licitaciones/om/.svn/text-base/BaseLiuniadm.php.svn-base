<?php


abstract class BaseLiuniadm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduniadm;


	
	protected $desuniadm;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $nomcar;


	
	protected $resolu;


	
	protected $fecres;


	
	protected $id;

	
	protected $collLidetcroentconts;

	
	protected $lastLidetcroentcontCriteria = null;

	
	protected $collLidetcroentcontobs;

	
	protected $lastLidetcroentcontobCriteria = null;

	
	protected $collLidetcroentmodconts;

	
	protected $lastLidetcroentmodcontCriteria = null;

	
	protected $collLidetcroentaddconts;

	
	protected $lastLidetcroentaddcontCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getDesuniadm()
  {

    return trim($this->desuniadm);

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
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LiuniadmPeer::CODUNIADM;
      }
  
	} 
	
	public function setDesuniadm($v)
	{

    if ($this->desuniadm !== $v) {
        $this->desuniadm = $v;
        $this->modifiedColumns[] = LiuniadmPeer::DESUNIADM;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = LiuniadmPeer::CODEMP;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = LiuniadmPeer::NOMEMP;
      }
  
	} 
	
	public function setNomcar($v)
	{

    if ($this->nomcar !== $v) {
        $this->nomcar = $v;
        $this->modifiedColumns[] = LiuniadmPeer::NOMCAR;
      }
  
	} 
	
	public function setResolu($v)
	{

    if ($this->resolu !== $v) {
        $this->resolu = $v;
        $this->modifiedColumns[] = LiuniadmPeer::RESOLU;
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
      $this->modifiedColumns[] = LiuniadmPeer::FECRES;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiuniadmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coduniadm = $rs->getString($startcol + 0);

      $this->desuniadm = $rs->getString($startcol + 1);

      $this->codemp = $rs->getString($startcol + 2);

      $this->nomemp = $rs->getString($startcol + 3);

      $this->nomcar = $rs->getString($startcol + 4);

      $this->resolu = $rs->getString($startcol + 5);

      $this->fecres = $rs->getDate($startcol + 6, null);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liuniadm object", $e);
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
			$con = Propel::getConnection(LiuniadmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiuniadmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiuniadmPeer::DATABASE_NAME);
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
					$pk = LiuniadmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiuniadmPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLidetcroentconts !== null) {
				foreach($this->collLidetcroentconts as $referrerFK) {
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

			if ($this->collLidetcroentmodconts !== null) {
				foreach($this->collLidetcroentmodconts as $referrerFK) {
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


			if (($retval = LiuniadmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLidetcroentconts !== null) {
					foreach($this->collLidetcroentconts as $referrerFK) {
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

				if ($this->collLidetcroentmodconts !== null) {
					foreach($this->collLidetcroentmodconts as $referrerFK) {
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


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiuniadmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduniadm();
				break;
			case 1:
				return $this->getDesuniadm();
				break;
			case 2:
				return $this->getCodemp();
				break;
			case 3:
				return $this->getNomemp();
				break;
			case 4:
				return $this->getNomcar();
				break;
			case 5:
				return $this->getResolu();
				break;
			case 6:
				return $this->getFecres();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiuniadmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduniadm(),
			$keys[1] => $this->getDesuniadm(),
			$keys[2] => $this->getCodemp(),
			$keys[3] => $this->getNomemp(),
			$keys[4] => $this->getNomcar(),
			$keys[5] => $this->getResolu(),
			$keys[6] => $this->getFecres(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiuniadmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduniadm($value);
				break;
			case 1:
				$this->setDesuniadm($value);
				break;
			case 2:
				$this->setCodemp($value);
				break;
			case 3:
				$this->setNomemp($value);
				break;
			case 4:
				$this->setNomcar($value);
				break;
			case 5:
				$this->setResolu($value);
				break;
			case 6:
				$this->setFecres($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiuniadmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduniadm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesuniadm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomcar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setResolu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecres($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiuniadmPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiuniadmPeer::CODUNIADM)) $criteria->add(LiuniadmPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LiuniadmPeer::DESUNIADM)) $criteria->add(LiuniadmPeer::DESUNIADM, $this->desuniadm);
		if ($this->isColumnModified(LiuniadmPeer::CODEMP)) $criteria->add(LiuniadmPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(LiuniadmPeer::NOMEMP)) $criteria->add(LiuniadmPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(LiuniadmPeer::NOMCAR)) $criteria->add(LiuniadmPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(LiuniadmPeer::RESOLU)) $criteria->add(LiuniadmPeer::RESOLU, $this->resolu);
		if ($this->isColumnModified(LiuniadmPeer::FECRES)) $criteria->add(LiuniadmPeer::FECRES, $this->fecres);
		if ($this->isColumnModified(LiuniadmPeer::ID)) $criteria->add(LiuniadmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiuniadmPeer::DATABASE_NAME);

		$criteria->add(LiuniadmPeer::ID, $this->id);

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

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setDesuniadm($this->desuniadm);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setNomcar($this->nomcar);

		$copyObj->setResolu($this->resolu);

		$copyObj->setFecres($this->fecres);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLidetcroentconts() as $relObj) {
				$copyObj->addLidetcroentcont($relObj->copy($deepCopy));
			}

			foreach($this->getLidetcroentcontobs() as $relObj) {
				$copyObj->addLidetcroentcontob($relObj->copy($deepCopy));
			}

			foreach($this->getLidetcroentmodconts() as $relObj) {
				$copyObj->addLidetcroentmodcont($relObj->copy($deepCopy));
			}

			foreach($this->getLidetcroentaddconts() as $relObj) {
				$copyObj->addLidetcroentaddcont($relObj->copy($deepCopy));
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
			self::$peer = new LiuniadmPeer();
		}
		return self::$peer;
	}

	
	public function initLidetcroentconts()
	{
		if ($this->collLidetcroentconts === null) {
			$this->collLidetcroentconts = array();
		}
	}

	
	public function getLidetcroentconts($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentconts === null) {
			if ($this->isNew()) {
			   $this->collLidetcroentconts = array();
			} else {

				$criteria->add(LidetcroentcontPeer::CODUNIADM, $this->getCoduniadm());

				LidetcroentcontPeer::addSelectColumns($criteria);
				$this->collLidetcroentconts = LidetcroentcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetcroentcontPeer::CODUNIADM, $this->getCoduniadm());

				LidetcroentcontPeer::addSelectColumns($criteria);
				if (!isset($this->lastLidetcroentcontCriteria) || !$this->lastLidetcroentcontCriteria->equals($criteria)) {
					$this->collLidetcroentconts = LidetcroentcontPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidetcroentcontCriteria = $criteria;
		return $this->collLidetcroentconts;
	}

	
	public function countLidetcroentconts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidetcroentcontPeer::CODUNIADM, $this->getCoduniadm());

		return LidetcroentcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetcroentcont(Lidetcroentcont $l)
	{
		$this->collLidetcroentconts[] = $l;
		$l->setLiuniadm($this);
	}


	
	public function getLidetcroentcontsJoinLientregas($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentconts === null) {
			if ($this->isNew()) {
				$this->collLidetcroentconts = array();
			} else {

				$criteria->add(LidetcroentcontPeer::CODUNIADM, $this->getCoduniadm());

				$this->collLidetcroentconts = LidetcroentcontPeer::doSelectJoinLientregas($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentcontPeer::CODUNIADM, $this->getCoduniadm());

			if (!isset($this->lastLidetcroentcontCriteria) || !$this->lastLidetcroentcontCriteria->equals($criteria)) {
				$this->collLidetcroentconts = LidetcroentcontPeer::doSelectJoinLientregas($criteria, $con);
			}
		}
		$this->lastLidetcroentcontCriteria = $criteria;

		return $this->collLidetcroentconts;
	}


	
	public function getLidetcroentcontsJoinLicroent($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLidetcroentcontPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidetcroentconts === null) {
			if ($this->isNew()) {
				$this->collLidetcroentconts = array();
			} else {

				$criteria->add(LidetcroentcontPeer::CODUNIADM, $this->getCoduniadm());

				$this->collLidetcroentconts = LidetcroentcontPeer::doSelectJoinLicroent($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentcontPeer::CODUNIADM, $this->getCoduniadm());

			if (!isset($this->lastLidetcroentcontCriteria) || !$this->lastLidetcroentcontCriteria->equals($criteria)) {
				$this->collLidetcroentconts = LidetcroentcontPeer::doSelectJoinLicroent($criteria, $con);
			}
		}
		$this->lastLidetcroentcontCriteria = $criteria;

		return $this->collLidetcroentconts;
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

				$criteria->add(LidetcroentcontobPeer::CODUNIADM, $this->getCoduniadm());

				LidetcroentcontobPeer::addSelectColumns($criteria);
				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetcroentcontobPeer::CODUNIADM, $this->getCoduniadm());

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

		$criteria->add(LidetcroentcontobPeer::CODUNIADM, $this->getCoduniadm());

		return LidetcroentcontobPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetcroentcontob(Lidetcroentcontob $l)
	{
		$this->collLidetcroentcontobs[] = $l;
		$l->setLiuniadm($this);
	}


	
	public function getLidetcroentcontobsJoinLicontrat($criteria = null, $con = null)
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

				$criteria->add(LidetcroentcontobPeer::CODUNIADM, $this->getCoduniadm());

				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentcontobPeer::CODUNIADM, $this->getCoduniadm());

			if (!isset($this->lastLidetcroentcontobCriteria) || !$this->lastLidetcroentcontobCriteria->equals($criteria)) {
				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLicontrat($criteria, $con);
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

				$criteria->add(LidetcroentcontobPeer::CODUNIADM, $this->getCoduniadm());

				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLicroent($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentcontobPeer::CODUNIADM, $this->getCoduniadm());

			if (!isset($this->lastLidetcroentcontobCriteria) || !$this->lastLidetcroentcontobCriteria->equals($criteria)) {
				$this->collLidetcroentcontobs = LidetcroentcontobPeer::doSelectJoinLicroent($criteria, $con);
			}
		}
		$this->lastLidetcroentcontobCriteria = $criteria;

		return $this->collLidetcroentcontobs;
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

				$criteria->add(LidetcroentmodcontPeer::CODUNIADM, $this->getCoduniadm());

				LidetcroentmodcontPeer::addSelectColumns($criteria);
				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetcroentmodcontPeer::CODUNIADM, $this->getCoduniadm());

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

		$criteria->add(LidetcroentmodcontPeer::CODUNIADM, $this->getCoduniadm());

		return LidetcroentmodcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetcroentmodcont(Lidetcroentmodcont $l)
	{
		$this->collLidetcroentmodconts[] = $l;
		$l->setLiuniadm($this);
	}


	
	public function getLidetcroentmodcontsJoinLimodcont($criteria = null, $con = null)
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

				$criteria->add(LidetcroentmodcontPeer::CODUNIADM, $this->getCoduniadm());

				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLimodcont($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentmodcontPeer::CODUNIADM, $this->getCoduniadm());

			if (!isset($this->lastLidetcroentmodcontCriteria) || !$this->lastLidetcroentmodcontCriteria->equals($criteria)) {
				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLimodcont($criteria, $con);
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

				$criteria->add(LidetcroentmodcontPeer::CODUNIADM, $this->getCoduniadm());

				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLidetcroentcontob($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentmodcontPeer::CODUNIADM, $this->getCoduniadm());

			if (!isset($this->lastLidetcroentmodcontCriteria) || !$this->lastLidetcroentmodcontCriteria->equals($criteria)) {
				$this->collLidetcroentmodconts = LidetcroentmodcontPeer::doSelectJoinLidetcroentcontob($criteria, $con);
			}
		}
		$this->lastLidetcroentmodcontCriteria = $criteria;

		return $this->collLidetcroentmodconts;
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

				$criteria->add(LidetcroentaddcontPeer::CODUNIADM, $this->getCoduniadm());

				LidetcroentaddcontPeer::addSelectColumns($criteria);
				$this->collLidetcroentaddconts = LidetcroentaddcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidetcroentaddcontPeer::CODUNIADM, $this->getCoduniadm());

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

		$criteria->add(LidetcroentaddcontPeer::CODUNIADM, $this->getCoduniadm());

		return LidetcroentaddcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidetcroentaddcont(Lidetcroentaddcont $l)
	{
		$this->collLidetcroentaddconts[] = $l;
		$l->setLiuniadm($this);
	}


	
	public function getLidetcroentaddcontsJoinLiaddendum($criteria = null, $con = null)
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

				$criteria->add(LidetcroentaddcontPeer::CODUNIADM, $this->getCoduniadm());

				$this->collLidetcroentaddconts = LidetcroentaddcontPeer::doSelectJoinLiaddendum($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentaddcontPeer::CODUNIADM, $this->getCoduniadm());

			if (!isset($this->lastLidetcroentaddcontCriteria) || !$this->lastLidetcroentaddcontCriteria->equals($criteria)) {
				$this->collLidetcroentaddconts = LidetcroentaddcontPeer::doSelectJoinLiaddendum($criteria, $con);
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

				$criteria->add(LidetcroentaddcontPeer::CODUNIADM, $this->getCoduniadm());

				$this->collLidetcroentaddconts = LidetcroentaddcontPeer::doSelectJoinLidetcroentcont($criteria, $con);
			}
		} else {
									
			$criteria->add(LidetcroentaddcontPeer::CODUNIADM, $this->getCoduniadm());

			if (!isset($this->lastLidetcroentaddcontCriteria) || !$this->lastLidetcroentaddcontCriteria->equals($criteria)) {
				$this->collLidetcroentaddconts = LidetcroentaddcontPeer::doSelectJoinLidetcroentcont($criteria, $con);
			}
		}
		$this->lastLidetcroentaddcontCriteria = $criteria;

		return $this->collLidetcroentaddconts;
	}

} 