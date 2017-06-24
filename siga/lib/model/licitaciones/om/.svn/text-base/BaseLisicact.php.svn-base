<?php


abstract class BaseLisicact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $dessicact;


	
	protected $id;

	
	protected $collLireglics;

	
	protected $lastLireglicCriteria = null;

	
	protected $collLiprebass;

	
	protected $lastLiprebasCriteria = null;

	
	protected $collLimemorans;

	
	protected $lastLimemoranCriteria = null;

	
	protected $collLicomints;

	
	protected $lastLicomintCriteria = null;

	
	protected $collLirecomens;

	
	protected $lastLirecomenCriteria = null;

	
	protected $collLiptocues;

	
	protected $lastLiptocueCriteria = null;

	
	protected $collLisolegrs;

	
	protected $lastLisolegrCriteria = null;

	
	protected $collLiplieesps;

	
	protected $lastLiplieespCriteria = null;

	
	protected $collLiregofes;

	
	protected $lastLiregofeCriteria = null;

	
	protected $collLianaofes;

	
	protected $lastLianaofeCriteria = null;

	
	protected $collLiptocuecons;

	
	protected $lastLiptocueconCriteria = null;

	
	protected $collLinotifics;

	
	protected $lastLinotificCriteria = null;

	
	protected $collLiplieesphiss;

	
	protected $lastLiplieesphisCriteria = null;

	
	protected $collLiasigdecs;

	
	protected $lastLiasigdecCriteria = null;

	
	protected $collLiasigdechiss;

	
	protected $lastLiasigdechisCriteria = null;

	
	protected $collLicontrats;

	
	protected $lastLicontratCriteria = null;

	
	protected $collLiordcoms;

	
	protected $lastLiordcomCriteria = null;

	
	protected $collLiactass;

	
	protected $lastLiactasCriteria = null;

	
	protected $collLivaluacioness;

	
	protected $lastLivaluacionesCriteria = null;

	
	protected $collLiinspeccioness;

	
	protected $lastLiinspeccionesCriteria = null;

	
	protected $collLientregass;

	
	protected $lastLientregasCriteria = null;

	
	protected $collLiactdesconts;

	
	protected $lastLiactdescontCriteria = null;

	
	protected $collLisolpags;

	
	protected $lastLisolpagCriteria = null;

	
	protected $collLipenalizacioness;

	
	protected $lastLipenalizacionesCriteria = null;

	
	protected $collLianaemps;

	
	protected $lastLianaempCriteria = null;

	
	protected $collLimodconts;

	
	protected $lastLimodcontCriteria = null;

	
	protected $collLiaddendums;

	
	protected $lastLiaddendumCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDessicact()
  {

    return trim($this->dessicact);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDessicact($v)
	{

    if ($this->dessicact !== $v) {
        $this->dessicact = $v;
        $this->modifiedColumns[] = LisicactPeer::DESSICACT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LisicactPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->dessicact = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lisicact object", $e);
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
			$con = Propel::getConnection(LisicactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LisicactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LisicactPeer::DATABASE_NAME);
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
					$pk = LisicactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LisicactPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLireglics !== null) {
				foreach($this->collLireglics as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiprebass !== null) {
				foreach($this->collLiprebass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLimemorans !== null) {
				foreach($this->collLimemorans as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLicomints !== null) {
				foreach($this->collLicomints as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLirecomens !== null) {
				foreach($this->collLirecomens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiptocues !== null) {
				foreach($this->collLiptocues as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLisolegrs !== null) {
				foreach($this->collLisolegrs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiplieesps !== null) {
				foreach($this->collLiplieesps as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiregofes !== null) {
				foreach($this->collLiregofes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLianaofes !== null) {
				foreach($this->collLianaofes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiptocuecons !== null) {
				foreach($this->collLiptocuecons as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLinotifics !== null) {
				foreach($this->collLinotifics as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiplieesphiss !== null) {
				foreach($this->collLiplieesphiss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiasigdecs !== null) {
				foreach($this->collLiasigdecs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiasigdechiss !== null) {
				foreach($this->collLiasigdechiss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLicontrats !== null) {
				foreach($this->collLicontrats as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiordcoms !== null) {
				foreach($this->collLiordcoms as $referrerFK) {
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

			if ($this->collLivaluacioness !== null) {
				foreach($this->collLivaluacioness as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiinspeccioness !== null) {
				foreach($this->collLiinspeccioness as $referrerFK) {
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

			if ($this->collLianaemps !== null) {
				foreach($this->collLianaemps as $referrerFK) {
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


			if (($retval = LisicactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLireglics !== null) {
					foreach($this->collLireglics as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiprebass !== null) {
					foreach($this->collLiprebass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLimemorans !== null) {
					foreach($this->collLimemorans as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLicomints !== null) {
					foreach($this->collLicomints as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLirecomens !== null) {
					foreach($this->collLirecomens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiptocues !== null) {
					foreach($this->collLiptocues as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLisolegrs !== null) {
					foreach($this->collLisolegrs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiplieesps !== null) {
					foreach($this->collLiplieesps as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiregofes !== null) {
					foreach($this->collLiregofes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLianaofes !== null) {
					foreach($this->collLianaofes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiptocuecons !== null) {
					foreach($this->collLiptocuecons as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLinotifics !== null) {
					foreach($this->collLinotifics as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiplieesphiss !== null) {
					foreach($this->collLiplieesphiss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiasigdecs !== null) {
					foreach($this->collLiasigdecs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiasigdechiss !== null) {
					foreach($this->collLiasigdechiss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLicontrats !== null) {
					foreach($this->collLicontrats as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiordcoms !== null) {
					foreach($this->collLiordcoms as $referrerFK) {
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

				if ($this->collLivaluacioness !== null) {
					foreach($this->collLivaluacioness as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiinspeccioness !== null) {
					foreach($this->collLiinspeccioness as $referrerFK) {
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

				if ($this->collLianaemps !== null) {
					foreach($this->collLianaemps as $referrerFK) {
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
		$pos = LisicactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDessicact();
				break;
			case 1:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LisicactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDessicact(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LisicactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDessicact($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LisicactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDessicact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LisicactPeer::DATABASE_NAME);

		if ($this->isColumnModified(LisicactPeer::DESSICACT)) $criteria->add(LisicactPeer::DESSICACT, $this->dessicact);
		if ($this->isColumnModified(LisicactPeer::ID)) $criteria->add(LisicactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LisicactPeer::DATABASE_NAME);

		$criteria->add(LisicactPeer::ID, $this->id);

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

		$copyObj->setDessicact($this->dessicact);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLireglics() as $relObj) {
				$copyObj->addLireglic($relObj->copy($deepCopy));
			}

			foreach($this->getLiprebass() as $relObj) {
				$copyObj->addLiprebas($relObj->copy($deepCopy));
			}

			foreach($this->getLimemorans() as $relObj) {
				$copyObj->addLimemoran($relObj->copy($deepCopy));
			}

			foreach($this->getLicomints() as $relObj) {
				$copyObj->addLicomint($relObj->copy($deepCopy));
			}

			foreach($this->getLirecomens() as $relObj) {
				$copyObj->addLirecomen($relObj->copy($deepCopy));
			}

			foreach($this->getLiptocues() as $relObj) {
				$copyObj->addLiptocue($relObj->copy($deepCopy));
			}

			foreach($this->getLisolegrs() as $relObj) {
				$copyObj->addLisolegr($relObj->copy($deepCopy));
			}

			foreach($this->getLiplieesps() as $relObj) {
				$copyObj->addLiplieesp($relObj->copy($deepCopy));
			}

			foreach($this->getLiregofes() as $relObj) {
				$copyObj->addLiregofe($relObj->copy($deepCopy));
			}

			foreach($this->getLianaofes() as $relObj) {
				$copyObj->addLianaofe($relObj->copy($deepCopy));
			}

			foreach($this->getLiptocuecons() as $relObj) {
				$copyObj->addLiptocuecon($relObj->copy($deepCopy));
			}

			foreach($this->getLinotifics() as $relObj) {
				$copyObj->addLinotific($relObj->copy($deepCopy));
			}

			foreach($this->getLiplieesphiss() as $relObj) {
				$copyObj->addLiplieesphis($relObj->copy($deepCopy));
			}

			foreach($this->getLiasigdecs() as $relObj) {
				$copyObj->addLiasigdec($relObj->copy($deepCopy));
			}

			foreach($this->getLiasigdechiss() as $relObj) {
				$copyObj->addLiasigdechis($relObj->copy($deepCopy));
			}

			foreach($this->getLicontrats() as $relObj) {
				$copyObj->addLicontrat($relObj->copy($deepCopy));
			}

			foreach($this->getLiordcoms() as $relObj) {
				$copyObj->addLiordcom($relObj->copy($deepCopy));
			}

			foreach($this->getLiactass() as $relObj) {
				$copyObj->addLiactas($relObj->copy($deepCopy));
			}

			foreach($this->getLivaluacioness() as $relObj) {
				$copyObj->addLivaluaciones($relObj->copy($deepCopy));
			}

			foreach($this->getLiinspeccioness() as $relObj) {
				$copyObj->addLiinspecciones($relObj->copy($deepCopy));
			}

			foreach($this->getLientregass() as $relObj) {
				$copyObj->addLientregas($relObj->copy($deepCopy));
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

			foreach($this->getLianaemps() as $relObj) {
				$copyObj->addLianaemp($relObj->copy($deepCopy));
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
			self::$peer = new LisicactPeer();
		}
		return self::$peer;
	}

	
	public function initLireglics()
	{
		if ($this->collLireglics === null) {
			$this->collLireglics = array();
		}
	}

	
	public function getLireglics($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLireglicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLireglics === null) {
			if ($this->isNew()) {
			   $this->collLireglics = array();
			} else {

				$criteria->add(LireglicPeer::LISICACT_ID, $this->getId());

				LireglicPeer::addSelectColumns($criteria);
				$this->collLireglics = LireglicPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LireglicPeer::LISICACT_ID, $this->getId());

				LireglicPeer::addSelectColumns($criteria);
				if (!isset($this->lastLireglicCriteria) || !$this->lastLireglicCriteria->equals($criteria)) {
					$this->collLireglics = LireglicPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLireglicCriteria = $criteria;
		return $this->collLireglics;
	}

	
	public function countLireglics($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLireglicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LireglicPeer::LISICACT_ID, $this->getId());

		return LireglicPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLireglic(Lireglic $l)
	{
		$this->collLireglics[] = $l;
		$l->setLisicact($this);
	}


	
	public function getLireglicsJoinLitiplic($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLireglicPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLireglics === null) {
			if ($this->isNew()) {
				$this->collLireglics = array();
			} else {

				$criteria->add(LireglicPeer::LISICACT_ID, $this->getId());

				$this->collLireglics = LireglicPeer::doSelectJoinLitiplic($criteria, $con);
			}
		} else {
									
			$criteria->add(LireglicPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLireglicCriteria) || !$this->lastLireglicCriteria->equals($criteria)) {
				$this->collLireglics = LireglicPeer::doSelectJoinLitiplic($criteria, $con);
			}
		}
		$this->lastLireglicCriteria = $criteria;

		return $this->collLireglics;
	}

	
	public function initLiprebass()
	{
		if ($this->collLiprebass === null) {
			$this->collLiprebass = array();
		}
	}

	
	public function getLiprebass($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiprebasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiprebass === null) {
			if ($this->isNew()) {
			   $this->collLiprebass = array();
			} else {

				$criteria->add(LiprebasPeer::LISICACT_ID, $this->getId());

				LiprebasPeer::addSelectColumns($criteria);
				$this->collLiprebass = LiprebasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiprebasPeer::LISICACT_ID, $this->getId());

				LiprebasPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiprebasCriteria) || !$this->lastLiprebasCriteria->equals($criteria)) {
					$this->collLiprebass = LiprebasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiprebasCriteria = $criteria;
		return $this->collLiprebass;
	}

	
	public function countLiprebass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiprebasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiprebasPeer::LISICACT_ID, $this->getId());

		return LiprebasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiprebas(Liprebas $l)
	{
		$this->collLiprebass[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLimemorans()
	{
		if ($this->collLimemorans === null) {
			$this->collLimemorans = array();
		}
	}

	
	public function getLimemorans($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimemoranPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLimemorans === null) {
			if ($this->isNew()) {
			   $this->collLimemorans = array();
			} else {

				$criteria->add(LimemoranPeer::LISICACT_ID, $this->getId());

				LimemoranPeer::addSelectColumns($criteria);
				$this->collLimemorans = LimemoranPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LimemoranPeer::LISICACT_ID, $this->getId());

				LimemoranPeer::addSelectColumns($criteria);
				if (!isset($this->lastLimemoranCriteria) || !$this->lastLimemoranCriteria->equals($criteria)) {
					$this->collLimemorans = LimemoranPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLimemoranCriteria = $criteria;
		return $this->collLimemorans;
	}

	
	public function countLimemorans($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLimemoranPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LimemoranPeer::LISICACT_ID, $this->getId());

		return LimemoranPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLimemoran(Limemoran $l)
	{
		$this->collLimemorans[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLicomints()
	{
		if ($this->collLicomints === null) {
			$this->collLicomints = array();
		}
	}

	
	public function getLicomints($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLicomintPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLicomints === null) {
			if ($this->isNew()) {
			   $this->collLicomints = array();
			} else {

				$criteria->add(LicomintPeer::LISICACT_ID, $this->getId());

				LicomintPeer::addSelectColumns($criteria);
				$this->collLicomints = LicomintPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LicomintPeer::LISICACT_ID, $this->getId());

				LicomintPeer::addSelectColumns($criteria);
				if (!isset($this->lastLicomintCriteria) || !$this->lastLicomintCriteria->equals($criteria)) {
					$this->collLicomints = LicomintPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLicomintCriteria = $criteria;
		return $this->collLicomints;
	}

	
	public function countLicomints($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLicomintPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LicomintPeer::LISICACT_ID, $this->getId());

		return LicomintPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLicomint(Licomint $l)
	{
		$this->collLicomints[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLirecomens()
	{
		if ($this->collLirecomens === null) {
			$this->collLirecomens = array();
		}
	}

	
	public function getLirecomens($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLirecomenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLirecomens === null) {
			if ($this->isNew()) {
			   $this->collLirecomens = array();
			} else {

				$criteria->add(LirecomenPeer::LISICACT_ID, $this->getId());

				LirecomenPeer::addSelectColumns($criteria);
				$this->collLirecomens = LirecomenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LirecomenPeer::LISICACT_ID, $this->getId());

				LirecomenPeer::addSelectColumns($criteria);
				if (!isset($this->lastLirecomenCriteria) || !$this->lastLirecomenCriteria->equals($criteria)) {
					$this->collLirecomens = LirecomenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLirecomenCriteria = $criteria;
		return $this->collLirecomens;
	}

	
	public function countLirecomens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLirecomenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LirecomenPeer::LISICACT_ID, $this->getId());

		return LirecomenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLirecomen(Lirecomen $l)
	{
		$this->collLirecomens[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiptocues()
	{
		if ($this->collLiptocues === null) {
			$this->collLiptocues = array();
		}
	}

	
	public function getLiptocues($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiptocuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiptocues === null) {
			if ($this->isNew()) {
			   $this->collLiptocues = array();
			} else {

				$criteria->add(LiptocuePeer::LISICACT_ID, $this->getId());

				LiptocuePeer::addSelectColumns($criteria);
				$this->collLiptocues = LiptocuePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiptocuePeer::LISICACT_ID, $this->getId());

				LiptocuePeer::addSelectColumns($criteria);
				if (!isset($this->lastLiptocueCriteria) || !$this->lastLiptocueCriteria->equals($criteria)) {
					$this->collLiptocues = LiptocuePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiptocueCriteria = $criteria;
		return $this->collLiptocues;
	}

	
	public function countLiptocues($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiptocuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiptocuePeer::LISICACT_ID, $this->getId());

		return LiptocuePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiptocue(Liptocue $l)
	{
		$this->collLiptocues[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLisolegrs()
	{
		if ($this->collLisolegrs === null) {
			$this->collLisolegrs = array();
		}
	}

	
	public function getLisolegrs($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolegrPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLisolegrs === null) {
			if ($this->isNew()) {
			   $this->collLisolegrs = array();
			} else {

				$criteria->add(LisolegrPeer::LISICACT_ID, $this->getId());

				LisolegrPeer::addSelectColumns($criteria);
				$this->collLisolegrs = LisolegrPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LisolegrPeer::LISICACT_ID, $this->getId());

				LisolegrPeer::addSelectColumns($criteria);
				if (!isset($this->lastLisolegrCriteria) || !$this->lastLisolegrCriteria->equals($criteria)) {
					$this->collLisolegrs = LisolegrPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLisolegrCriteria = $criteria;
		return $this->collLisolegrs;
	}

	
	public function countLisolegrs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLisolegrPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LisolegrPeer::LISICACT_ID, $this->getId());

		return LisolegrPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLisolegr(Lisolegr $l)
	{
		$this->collLisolegrs[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiplieesps()
	{
		if ($this->collLiplieesps === null) {
			$this->collLiplieesps = array();
		}
	}

	
	public function getLiplieesps($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiplieespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiplieesps === null) {
			if ($this->isNew()) {
			   $this->collLiplieesps = array();
			} else {

				$criteria->add(LiplieespPeer::LISICACT_ID, $this->getId());

				LiplieespPeer::addSelectColumns($criteria);
				$this->collLiplieesps = LiplieespPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiplieespPeer::LISICACT_ID, $this->getId());

				LiplieespPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiplieespCriteria) || !$this->lastLiplieespCriteria->equals($criteria)) {
					$this->collLiplieesps = LiplieespPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiplieespCriteria = $criteria;
		return $this->collLiplieesps;
	}

	
	public function countLiplieesps($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiplieespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiplieespPeer::LISICACT_ID, $this->getId());

		return LiplieespPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiplieesp(Liplieesp $l)
	{
		$this->collLiplieesps[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiregofes()
	{
		if ($this->collLiregofes === null) {
			$this->collLiregofes = array();
		}
	}

	
	public function getLiregofes($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregofePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiregofes === null) {
			if ($this->isNew()) {
			   $this->collLiregofes = array();
			} else {

				$criteria->add(LiregofePeer::LISICACT_ID, $this->getId());

				LiregofePeer::addSelectColumns($criteria);
				$this->collLiregofes = LiregofePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiregofePeer::LISICACT_ID, $this->getId());

				LiregofePeer::addSelectColumns($criteria);
				if (!isset($this->lastLiregofeCriteria) || !$this->lastLiregofeCriteria->equals($criteria)) {
					$this->collLiregofes = LiregofePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiregofeCriteria = $criteria;
		return $this->collLiregofes;
	}

	
	public function countLiregofes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiregofePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiregofePeer::LISICACT_ID, $this->getId());

		return LiregofePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiregofe(Liregofe $l)
	{
		$this->collLiregofes[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLianaofes()
	{
		if ($this->collLianaofes === null) {
			$this->collLianaofes = array();
		}
	}

	
	public function getLianaofes($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLianaofePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLianaofes === null) {
			if ($this->isNew()) {
			   $this->collLianaofes = array();
			} else {

				$criteria->add(LianaofePeer::LISICACT_ID, $this->getId());

				LianaofePeer::addSelectColumns($criteria);
				$this->collLianaofes = LianaofePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LianaofePeer::LISICACT_ID, $this->getId());

				LianaofePeer::addSelectColumns($criteria);
				if (!isset($this->lastLianaofeCriteria) || !$this->lastLianaofeCriteria->equals($criteria)) {
					$this->collLianaofes = LianaofePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLianaofeCriteria = $criteria;
		return $this->collLianaofes;
	}

	
	public function countLianaofes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLianaofePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LianaofePeer::LISICACT_ID, $this->getId());

		return LianaofePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLianaofe(Lianaofe $l)
	{
		$this->collLianaofes[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiptocuecons()
	{
		if ($this->collLiptocuecons === null) {
			$this->collLiptocuecons = array();
		}
	}

	
	public function getLiptocuecons($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiptocueconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiptocuecons === null) {
			if ($this->isNew()) {
			   $this->collLiptocuecons = array();
			} else {

				$criteria->add(LiptocueconPeer::LISICACT_ID, $this->getId());

				LiptocueconPeer::addSelectColumns($criteria);
				$this->collLiptocuecons = LiptocueconPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiptocueconPeer::LISICACT_ID, $this->getId());

				LiptocueconPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiptocueconCriteria) || !$this->lastLiptocueconCriteria->equals($criteria)) {
					$this->collLiptocuecons = LiptocueconPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiptocueconCriteria = $criteria;
		return $this->collLiptocuecons;
	}

	
	public function countLiptocuecons($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiptocueconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiptocueconPeer::LISICACT_ID, $this->getId());

		return LiptocueconPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiptocuecon(Liptocuecon $l)
	{
		$this->collLiptocuecons[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLinotifics()
	{
		if ($this->collLinotifics === null) {
			$this->collLinotifics = array();
		}
	}

	
	public function getLinotifics($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLinotificPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLinotifics === null) {
			if ($this->isNew()) {
			   $this->collLinotifics = array();
			} else {

				$criteria->add(LinotificPeer::LISICACT_ID, $this->getId());

				LinotificPeer::addSelectColumns($criteria);
				$this->collLinotifics = LinotificPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LinotificPeer::LISICACT_ID, $this->getId());

				LinotificPeer::addSelectColumns($criteria);
				if (!isset($this->lastLinotificCriteria) || !$this->lastLinotificCriteria->equals($criteria)) {
					$this->collLinotifics = LinotificPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLinotificCriteria = $criteria;
		return $this->collLinotifics;
	}

	
	public function countLinotifics($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLinotificPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LinotificPeer::LISICACT_ID, $this->getId());

		return LinotificPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLinotific(Linotific $l)
	{
		$this->collLinotifics[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiplieesphiss()
	{
		if ($this->collLiplieesphiss === null) {
			$this->collLiplieesphiss = array();
		}
	}

	
	public function getLiplieesphiss($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiplieesphisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiplieesphiss === null) {
			if ($this->isNew()) {
			   $this->collLiplieesphiss = array();
			} else {

				$criteria->add(LiplieesphisPeer::LISICACT_ID, $this->getId());

				LiplieesphisPeer::addSelectColumns($criteria);
				$this->collLiplieesphiss = LiplieesphisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiplieesphisPeer::LISICACT_ID, $this->getId());

				LiplieesphisPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiplieesphisCriteria) || !$this->lastLiplieesphisCriteria->equals($criteria)) {
					$this->collLiplieesphiss = LiplieesphisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiplieesphisCriteria = $criteria;
		return $this->collLiplieesphiss;
	}

	
	public function countLiplieesphiss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiplieesphisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiplieesphisPeer::LISICACT_ID, $this->getId());

		return LiplieesphisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiplieesphis(Liplieesphis $l)
	{
		$this->collLiplieesphiss[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiasigdecs()
	{
		if ($this->collLiasigdecs === null) {
			$this->collLiasigdecs = array();
		}
	}

	
	public function getLiasigdecs($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiasigdecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiasigdecs === null) {
			if ($this->isNew()) {
			   $this->collLiasigdecs = array();
			} else {

				$criteria->add(LiasigdecPeer::LISICACT_ID, $this->getId());

				LiasigdecPeer::addSelectColumns($criteria);
				$this->collLiasigdecs = LiasigdecPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiasigdecPeer::LISICACT_ID, $this->getId());

				LiasigdecPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiasigdecCriteria) || !$this->lastLiasigdecCriteria->equals($criteria)) {
					$this->collLiasigdecs = LiasigdecPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiasigdecCriteria = $criteria;
		return $this->collLiasigdecs;
	}

	
	public function countLiasigdecs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiasigdecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiasigdecPeer::LISICACT_ID, $this->getId());

		return LiasigdecPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiasigdec(Liasigdec $l)
	{
		$this->collLiasigdecs[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiasigdechiss()
	{
		if ($this->collLiasigdechiss === null) {
			$this->collLiasigdechiss = array();
		}
	}

	
	public function getLiasigdechiss($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiasigdechisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiasigdechiss === null) {
			if ($this->isNew()) {
			   $this->collLiasigdechiss = array();
			} else {

				$criteria->add(LiasigdechisPeer::LISICACT_ID, $this->getId());

				LiasigdechisPeer::addSelectColumns($criteria);
				$this->collLiasigdechiss = LiasigdechisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiasigdechisPeer::LISICACT_ID, $this->getId());

				LiasigdechisPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiasigdechisCriteria) || !$this->lastLiasigdechisCriteria->equals($criteria)) {
					$this->collLiasigdechiss = LiasigdechisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiasigdechisCriteria = $criteria;
		return $this->collLiasigdechiss;
	}

	
	public function countLiasigdechiss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiasigdechisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiasigdechisPeer::LISICACT_ID, $this->getId());

		return LiasigdechisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiasigdechis(Liasigdechis $l)
	{
		$this->collLiasigdechiss[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLicontrats()
	{
		if ($this->collLicontrats === null) {
			$this->collLicontrats = array();
		}
	}

	
	public function getLicontrats($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLicontratPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLicontrats === null) {
			if ($this->isNew()) {
			   $this->collLicontrats = array();
			} else {

				$criteria->add(LicontratPeer::LISICACT_ID, $this->getId());

				LicontratPeer::addSelectColumns($criteria);
				$this->collLicontrats = LicontratPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LicontratPeer::LISICACT_ID, $this->getId());

				LicontratPeer::addSelectColumns($criteria);
				if (!isset($this->lastLicontratCriteria) || !$this->lastLicontratCriteria->equals($criteria)) {
					$this->collLicontrats = LicontratPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLicontratCriteria = $criteria;
		return $this->collLicontrats;
	}

	
	public function countLicontrats($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLicontratPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LicontratPeer::LISICACT_ID, $this->getId());

		return LicontratPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLicontrat(Licontrat $l)
	{
		$this->collLicontrats[] = $l;
		$l->setLisicact($this);
	}

	
	public function initLiordcoms()
	{
		if ($this->collLiordcoms === null) {
			$this->collLiordcoms = array();
		}
	}

	
	public function getLiordcoms($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiordcoms === null) {
			if ($this->isNew()) {
			   $this->collLiordcoms = array();
			} else {

				$criteria->add(LiordcomPeer::LISICACT_ID, $this->getId());

				LiordcomPeer::addSelectColumns($criteria);
				$this->collLiordcoms = LiordcomPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiordcomPeer::LISICACT_ID, $this->getId());

				LiordcomPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiordcomCriteria) || !$this->lastLiordcomCriteria->equals($criteria)) {
					$this->collLiordcoms = LiordcomPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiordcomCriteria = $criteria;
		return $this->collLiordcoms;
	}

	
	public function countLiordcoms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiordcomPeer::LISICACT_ID, $this->getId());

		return LiordcomPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiordcom(Liordcom $l)
	{
		$this->collLiordcoms[] = $l;
		$l->setLisicact($this);
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

				$criteria->add(LiactasPeer::LISICACT_ID, $this->getId());

				LiactasPeer::addSelectColumns($criteria);
				$this->collLiactass = LiactasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiactasPeer::LISICACT_ID, $this->getId());

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

		$criteria->add(LiactasPeer::LISICACT_ID, $this->getId());

		return LiactasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiactas(Liactas $l)
	{
		$this->collLiactass[] = $l;
		$l->setLisicact($this);
	}


	
	public function getLiactassJoinLicontrat($criteria = null, $con = null)
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

				$criteria->add(LiactasPeer::LISICACT_ID, $this->getId());

				$this->collLiactass = LiactasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
				$this->collLiactass = LiactasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLiactasCriteria = $criteria;

		return $this->collLiactass;
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

				$criteria->add(LiactasPeer::LISICACT_ID, $this->getId());

				$this->collLiactass = LiactasPeer::doSelectJoinLitipact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LiactasPeer::LISICACT_ID, $this->getId());

				$this->collLiactass = LiactasPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LiactasPeer::LISICACT_ID, $this->getId());

				$this->collLiactass = LiactasPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
				$this->collLiactass = LiactasPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLiactasCriteria = $criteria;

		return $this->collLiactass;
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

				$criteria->add(LivaluacionesPeer::LISICACT_ID, $this->getId());

				LivaluacionesPeer::addSelectColumns($criteria);
				$this->collLivaluacioness = LivaluacionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LivaluacionesPeer::LISICACT_ID, $this->getId());

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

		$criteria->add(LivaluacionesPeer::LISICACT_ID, $this->getId());

		return LivaluacionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLivaluaciones(Livaluaciones $l)
	{
		$this->collLivaluacioness[] = $l;
		$l->setLisicact($this);
	}


	
	public function getLivaluacionessJoinLicontrat($criteria = null, $con = null)
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

				$criteria->add(LivaluacionesPeer::LISICACT_ID, $this->getId());

				$this->collLivaluacioness = LivaluacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LivaluacionesPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLivaluacionesCriteria) || !$this->lastLivaluacionesCriteria->equals($criteria)) {
				$this->collLivaluacioness = LivaluacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLivaluacionesCriteria = $criteria;

		return $this->collLivaluacioness;
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

				$criteria->add(LivaluacionesPeer::LISICACT_ID, $this->getId());

				$this->collLivaluacioness = LivaluacionesPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LivaluacionesPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LivaluacionesPeer::LISICACT_ID, $this->getId());

				$this->collLivaluacioness = LivaluacionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LivaluacionesPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLivaluacionesCriteria) || !$this->lastLivaluacionesCriteria->equals($criteria)) {
				$this->collLivaluacioness = LivaluacionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLivaluacionesCriteria = $criteria;

		return $this->collLivaluacioness;
	}

	
	public function initLiinspeccioness()
	{
		if ($this->collLiinspeccioness === null) {
			$this->collLiinspeccioness = array();
		}
	}

	
	public function getLiinspeccioness($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiinspeccioness === null) {
			if ($this->isNew()) {
			   $this->collLiinspeccioness = array();
			} else {

				$criteria->add(LiinspeccionesPeer::LISICACT_ID, $this->getId());

				LiinspeccionesPeer::addSelectColumns($criteria);
				$this->collLiinspeccioness = LiinspeccionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiinspeccionesPeer::LISICACT_ID, $this->getId());

				LiinspeccionesPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiinspeccionesCriteria) || !$this->lastLiinspeccionesCriteria->equals($criteria)) {
					$this->collLiinspeccioness = LiinspeccionesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiinspeccionesCriteria = $criteria;
		return $this->collLiinspeccioness;
	}

	
	public function countLiinspeccioness($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiinspeccionesPeer::LISICACT_ID, $this->getId());

		return LiinspeccionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiinspecciones(Liinspecciones $l)
	{
		$this->collLiinspeccioness[] = $l;
		$l->setLisicact($this);
	}


	
	public function getLiinspeccionessJoinLivaluaciones($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiinspeccioness === null) {
			if ($this->isNew()) {
				$this->collLiinspeccioness = array();
			} else {

				$criteria->add(LiinspeccionesPeer::LISICACT_ID, $this->getId());

				$this->collLiinspeccioness = LiinspeccionesPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		} else {
									
			$criteria->add(LiinspeccionesPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLiinspeccionesCriteria) || !$this->lastLiinspeccionesCriteria->equals($criteria)) {
				$this->collLiinspeccioness = LiinspeccionesPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		}
		$this->lastLiinspeccionesCriteria = $criteria;

		return $this->collLiinspeccioness;
	}


	
	public function getLiinspeccionessJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiinspeccioness === null) {
			if ($this->isNew()) {
				$this->collLiinspeccioness = array();
			} else {

				$criteria->add(LiinspeccionesPeer::LISICACT_ID, $this->getId());

				$this->collLiinspeccioness = LiinspeccionesPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LiinspeccionesPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLiinspeccionesCriteria) || !$this->lastLiinspeccionesCriteria->equals($criteria)) {
				$this->collLiinspeccioness = LiinspeccionesPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLiinspeccionesCriteria = $criteria;

		return $this->collLiinspeccioness;
	}


	
	public function getLiinspeccionessJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiinspeccionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiinspeccioness === null) {
			if ($this->isNew()) {
				$this->collLiinspeccioness = array();
			} else {

				$criteria->add(LiinspeccionesPeer::LISICACT_ID, $this->getId());

				$this->collLiinspeccioness = LiinspeccionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LiinspeccionesPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLiinspeccionesCriteria) || !$this->lastLiinspeccionesCriteria->equals($criteria)) {
				$this->collLiinspeccioness = LiinspeccionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLiinspeccionesCriteria = $criteria;

		return $this->collLiinspeccioness;
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

				$criteria->add(LientregasPeer::LISICACT_ID, $this->getId());

				LientregasPeer::addSelectColumns($criteria);
				$this->collLientregass = LientregasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LientregasPeer::LISICACT_ID, $this->getId());

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

		$criteria->add(LientregasPeer::LISICACT_ID, $this->getId());

		return LientregasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLientregas(Lientregas $l)
	{
		$this->collLientregass[] = $l;
		$l->setLisicact($this);
	}


	
	public function getLientregassJoinLicontrat($criteria = null, $con = null)
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

				$criteria->add(LientregasPeer::LISICACT_ID, $this->getId());

				$this->collLientregass = LientregasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LientregasPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLientregasCriteria) || !$this->lastLientregasCriteria->equals($criteria)) {
				$this->collLientregass = LientregasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLientregasCriteria = $criteria;

		return $this->collLientregass;
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

				$criteria->add(LientregasPeer::LISICACT_ID, $this->getId());

				$this->collLientregass = LientregasPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LientregasPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LientregasPeer::LISICACT_ID, $this->getId());

				$this->collLientregass = LientregasPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LientregasPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLientregasCriteria) || !$this->lastLientregasCriteria->equals($criteria)) {
				$this->collLientregass = LientregasPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLientregasCriteria = $criteria;

		return $this->collLientregass;
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

				$criteria->add(LiactdescontPeer::LISICACT_ID, $this->getId());

				LiactdescontPeer::addSelectColumns($criteria);
				$this->collLiactdesconts = LiactdescontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiactdescontPeer::LISICACT_ID, $this->getId());

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

		$criteria->add(LiactdescontPeer::LISICACT_ID, $this->getId());

		return LiactdescontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiactdescont(Liactdescont $l)
	{
		$this->collLiactdesconts[] = $l;
		$l->setLisicact($this);
	}


	
	public function getLiactdescontsJoinLicontrat($criteria = null, $con = null)
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

				$criteria->add(LiactdescontPeer::LISICACT_ID, $this->getId());

				$this->collLiactdesconts = LiactdescontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactdescontPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLiactdescontCriteria) || !$this->lastLiactdescontCriteria->equals($criteria)) {
				$this->collLiactdesconts = LiactdescontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLiactdescontCriteria = $criteria;

		return $this->collLiactdesconts;
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

				$criteria->add(LiactdescontPeer::LISICACT_ID, $this->getId());

				$this->collLiactdesconts = LiactdescontPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactdescontPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LiactdescontPeer::LISICACT_ID, $this->getId());

				$this->collLiactdesconts = LiactdescontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactdescontPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLiactdescontCriteria) || !$this->lastLiactdescontCriteria->equals($criteria)) {
				$this->collLiactdesconts = LiactdescontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
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

				$criteria->add(LisolpagPeer::LISICACT_ID, $this->getId());

				LisolpagPeer::addSelectColumns($criteria);
				$this->collLisolpags = LisolpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LisolpagPeer::LISICACT_ID, $this->getId());

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

		$criteria->add(LisolpagPeer::LISICACT_ID, $this->getId());

		return LisolpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLisolpag(Lisolpag $l)
	{
		$this->collLisolpags[] = $l;
		$l->setLisicact($this);
	}


	
	public function getLisolpagsJoinLicontrat($criteria = null, $con = null)
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

				$criteria->add(LisolpagPeer::LISICACT_ID, $this->getId());

				$this->collLisolpags = LisolpagPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLisolpagCriteria) || !$this->lastLisolpagCriteria->equals($criteria)) {
				$this->collLisolpags = LisolpagPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLisolpagCriteria = $criteria;

		return $this->collLisolpags;
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

				$criteria->add(LisolpagPeer::LISICACT_ID, $this->getId());

				$this->collLisolpags = LisolpagPeer::doSelectJoinLivaluaciones($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LisolpagPeer::LISICACT_ID, $this->getId());

				$this->collLisolpags = LisolpagPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LisolpagPeer::LISICACT_ID, $this->getId());

				$this->collLisolpags = LisolpagPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LisolpagPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLisolpagCriteria) || !$this->lastLisolpagCriteria->equals($criteria)) {
				$this->collLisolpags = LisolpagPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
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

				$criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->getId());

				LipenalizacionesPeer::addSelectColumns($criteria);
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->getId());

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

		$criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->getId());

		return LipenalizacionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLipenalizaciones(Lipenalizaciones $l)
	{
		$this->collLipenalizacioness[] = $l;
		$l->setLisicact($this);
	}


	
	public function getLipenalizacionessJoinLicontrat($criteria = null, $con = null)
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

				$criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->getId());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;

		return $this->collLipenalizacioness;
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

				$criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->getId());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLitippen($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->getId());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->getId());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;

		return $this->collLipenalizacioness;
	}

	
	public function initLianaemps()
	{
		if ($this->collLianaemps === null) {
			$this->collLianaemps = array();
		}
	}

	
	public function getLianaemps($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLianaempPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLianaemps === null) {
			if ($this->isNew()) {
			   $this->collLianaemps = array();
			} else {

				$criteria->add(LianaempPeer::LISICACT_ID, $this->getId());

				LianaempPeer::addSelectColumns($criteria);
				$this->collLianaemps = LianaempPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LianaempPeer::LISICACT_ID, $this->getId());

				LianaempPeer::addSelectColumns($criteria);
				if (!isset($this->lastLianaempCriteria) || !$this->lastLianaempCriteria->equals($criteria)) {
					$this->collLianaemps = LianaempPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLianaempCriteria = $criteria;
		return $this->collLianaemps;
	}

	
	public function countLianaemps($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLianaempPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LianaempPeer::LISICACT_ID, $this->getId());

		return LianaempPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLianaemp(Lianaemp $l)
	{
		$this->collLianaemps[] = $l;
		$l->setLisicact($this);
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

				$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

				LimodcontPeer::addSelectColumns($criteria);
				$this->collLimodconts = LimodcontPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

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

		$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

		return LimodcontPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLimodcont(Limodcont $l)
	{
		$this->collLimodconts[] = $l;
		$l->setLisicact($this);
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

				$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

				$this->collLimodconts = LimodcontPeer::doSelectJoinLitipmodRelatedByTipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLimodcontCriteria) || !$this->lastLimodcontCriteria->equals($criteria)) {
				$this->collLimodconts = LimodcontPeer::doSelectJoinLitipmodRelatedByTipmod($criteria, $con);
			}
		}
		$this->lastLimodcontCriteria = $criteria;

		return $this->collLimodconts;
	}


	
	public function getLimodcontsJoinLicontrat($criteria = null, $con = null)
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

				$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

				$this->collLimodconts = LimodcontPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLimodcontCriteria) || !$this->lastLimodcontCriteria->equals($criteria)) {
				$this->collLimodconts = LimodcontPeer::doSelectJoinLicontrat($criteria, $con);
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

				$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

				$this->collLimodconts = LimodcontPeer::doSelectJoinLitipmodRelatedByCodtipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

				$this->collLimodconts = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

				$this->collLimodconts = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LimodcontPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLimodcontCriteria) || !$this->lastLimodcontCriteria->equals($criteria)) {
				$this->collLimodconts = LimodcontPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
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

				$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

				LiaddendumPeer::addSelectColumns($criteria);
				$this->collLiaddendums = LiaddendumPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

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

		$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

		return LiaddendumPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiaddendum(Liaddendum $l)
	{
		$this->collLiaddendums[] = $l;
		$l->setLisicact($this);
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

				$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLitipadd($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLitipadd($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}


	
	public function getLiaddendumsJoinLicontrat($criteria = null, $con = null)
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

				$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLicontrat($criteria, $con);
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

				$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLitipmod($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

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

				$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaddendumPeer::LISICACT_ID, $this->getId());

			if (!isset($this->lastLiaddendumCriteria) || !$this->lastLiaddendumCriteria->equals($criteria)) {
				$this->collLiaddendums = LiaddendumPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLiaddendumCriteria = $criteria;

		return $this->collLiaddendums;
	}

} 