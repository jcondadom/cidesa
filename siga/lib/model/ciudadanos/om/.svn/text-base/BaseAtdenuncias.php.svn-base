<?php


abstract class BaseAtdenuncias extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroexp;


	
	protected $atciudadano_id;


	
	protected $atsolici;


	
	protected $desden;


	
	protected $telefono;


	
	protected $atunidades_id;


	
	protected $persona;


	
	protected $status;


	
	protected $respuesta;


	
	protected $fechaa;


	
	protected $fechar;


	
	protected $attipsol_id;


	
	protected $atinsrefier_id;


	
	protected $atestayu_id;


	
	protected $usucre;


	
	protected $usumod;


	
	protected $id;

	
	protected $aAtciudadano;

	
	protected $aAtunidades;

	
	protected $aAttipsol;

	
	protected $aAtinsrefier;

	
	protected $aAtestayu;

	
	protected $collAtdetests;

	
	protected $lastAtdetestCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNroexp()
  {

    return trim($this->nroexp);

  }
  
  public function getAtciudadanoId()
  {

    return $this->atciudadano_id;

  }
  
  public function getAtsolici()
  {

    return trim($this->atsolici);

  }
  
  public function getDesden()
  {

    return trim($this->desden);

  }
  
  public function getTelefono()
  {

    return trim($this->telefono);

  }
  
  public function getAtunidadesId()
  {

    return $this->atunidades_id;

  }
  
  public function getPersona()
  {

    return trim($this->persona);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getRespuesta()
  {

    return trim($this->respuesta);

  }
  
  public function getFechaa($format = 'Y-m-d')
  {

    if ($this->fechaa === null || $this->fechaa === '') {
      return null;
    } elseif (!is_int($this->fechaa)) {
            $ts = adodb_strtotime($this->fechaa);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechaa] as date/time value: " . var_export($this->fechaa, true));
      }
    } else {
      $ts = $this->fechaa;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechar($format = 'Y-m-d')
  {

    if ($this->fechar === null || $this->fechar === '') {
      return null;
    } elseif (!is_int($this->fechar)) {
            $ts = adodb_strtotime($this->fechar);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechar] as date/time value: " . var_export($this->fechar, true));
      }
    } else {
      $ts = $this->fechar;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAttipsolId()
  {

    return $this->attipsol_id;

  }
  
  public function getAtinsrefierId()
  {

    return $this->atinsrefier_id;

  }
  
  public function getAtestayuId()
  {

    return $this->atestayu_id;

  }
  
  public function getUsucre()
  {

    return trim($this->usucre);

  }
  
  public function getUsumod()
  {

    return trim($this->usumod);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNroexp($v)
	{

    if ($this->nroexp !== $v) {
        $this->nroexp = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::NROEXP;
      }
  
	} 
	
	public function setAtciudadanoId($v)
	{

    if ($this->atciudadano_id !== $v) {
        $this->atciudadano_id = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::ATCIUDADANO_ID;
      }
  
		if ($this->aAtciudadano !== null && $this->aAtciudadano->getId() !== $v) {
			$this->aAtciudadano = null;
		}

	} 
	
	public function setAtsolici($v)
	{

    if ($this->atsolici !== $v) {
        $this->atsolici = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::ATSOLICI;
      }
  
	} 
	
	public function setDesden($v)
	{

    if ($this->desden !== $v) {
        $this->desden = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::DESDEN;
      }
  
	} 
	
	public function setTelefono($v)
	{

    if ($this->telefono !== $v) {
        $this->telefono = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::TELEFONO;
      }
  
	} 
	
	public function setAtunidadesId($v)
	{

    if ($this->atunidades_id !== $v) {
        $this->atunidades_id = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::ATUNIDADES_ID;
      }
  
		if ($this->aAtunidades !== null && $this->aAtunidades->getId() !== $v) {
			$this->aAtunidades = null;
		}

	} 
	
	public function setPersona($v)
	{

    if ($this->persona !== $v) {
        $this->persona = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::PERSONA;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::STATUS;
      }
  
	} 
	
	public function setRespuesta($v)
	{

    if ($this->respuesta !== $v) {
        $this->respuesta = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::RESPUESTA;
      }
  
	} 
	
	public function setFechaa($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechaa] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechaa !== $ts) {
      $this->fechaa = $ts;
      $this->modifiedColumns[] = AtdenunciasPeer::FECHAA;
    }

	} 
	
	public function setFechar($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechar] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechar !== $ts) {
      $this->fechar = $ts;
      $this->modifiedColumns[] = AtdenunciasPeer::FECHAR;
    }

	} 
	
	public function setAttipsolId($v)
	{

    if ($this->attipsol_id !== $v) {
        $this->attipsol_id = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::ATTIPSOL_ID;
      }
  
		if ($this->aAttipsol !== null && $this->aAttipsol->getId() !== $v) {
			$this->aAttipsol = null;
		}

	} 
	
	public function setAtinsrefierId($v)
	{

    if ($this->atinsrefier_id !== $v) {
        $this->atinsrefier_id = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::ATINSREFIER_ID;
      }
  
		if ($this->aAtinsrefier !== null && $this->aAtinsrefier->getId() !== $v) {
			$this->aAtinsrefier = null;
		}

	} 
	
	public function setAtestayuId($v)
	{

    if ($this->atestayu_id !== $v) {
        $this->atestayu_id = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::ATESTAYU_ID;
      }
  
		if ($this->aAtestayu !== null && $this->aAtestayu->getId() !== $v) {
			$this->aAtestayu = null;
		}

	} 
	
	public function setUsucre($v)
	{

    if ($this->usucre !== $v) {
        $this->usucre = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::USUCRE;
      }
  
	} 
	
	public function setUsumod($v)
	{

    if ($this->usumod !== $v) {
        $this->usumod = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::USUMOD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtdenunciasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nroexp = $rs->getString($startcol + 0);

      $this->atciudadano_id = $rs->getInt($startcol + 1);

      $this->atsolici = $rs->getString($startcol + 2);

      $this->desden = $rs->getString($startcol + 3);

      $this->telefono = $rs->getString($startcol + 4);

      $this->atunidades_id = $rs->getInt($startcol + 5);

      $this->persona = $rs->getString($startcol + 6);

      $this->status = $rs->getString($startcol + 7);

      $this->respuesta = $rs->getString($startcol + 8);

      $this->fechaa = $rs->getDate($startcol + 9, null);

      $this->fechar = $rs->getDate($startcol + 10, null);

      $this->attipsol_id = $rs->getInt($startcol + 11);

      $this->atinsrefier_id = $rs->getInt($startcol + 12);

      $this->atestayu_id = $rs->getInt($startcol + 13);

      $this->usucre = $rs->getString($startcol + 14);

      $this->usumod = $rs->getString($startcol + 15);

      $this->id = $rs->getInt($startcol + 16);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 17; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atdenuncias object", $e);
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
			$con = Propel::getConnection(AtdenunciasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtdenunciasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtdenunciasPeer::DATABASE_NAME);
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


												
			if ($this->aAtciudadano !== null) {
				if ($this->aAtciudadano->isModified()) {
					$affectedRows += $this->aAtciudadano->save($con);
				}
				$this->setAtciudadano($this->aAtciudadano);
			}

			if ($this->aAtunidades !== null) {
				if ($this->aAtunidades->isModified()) {
					$affectedRows += $this->aAtunidades->save($con);
				}
				$this->setAtunidades($this->aAtunidades);
			}

			if ($this->aAttipsol !== null) {
				if ($this->aAttipsol->isModified()) {
					$affectedRows += $this->aAttipsol->save($con);
				}
				$this->setAttipsol($this->aAttipsol);
			}

			if ($this->aAtinsrefier !== null) {
				if ($this->aAtinsrefier->isModified()) {
					$affectedRows += $this->aAtinsrefier->save($con);
				}
				$this->setAtinsrefier($this->aAtinsrefier);
			}

			if ($this->aAtestayu !== null) {
				if ($this->aAtestayu->isModified()) {
					$affectedRows += $this->aAtestayu->save($con);
				}
				$this->setAtestayu($this->aAtestayu);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtdenunciasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtdenunciasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtdetests !== null) {
				foreach($this->collAtdetests as $referrerFK) {
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


												
			if ($this->aAtciudadano !== null) {
				if (!$this->aAtciudadano->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtciudadano->getValidationFailures());
				}
			}

			if ($this->aAtunidades !== null) {
				if (!$this->aAtunidades->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtunidades->getValidationFailures());
				}
			}

			if ($this->aAttipsol !== null) {
				if (!$this->aAttipsol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttipsol->getValidationFailures());
				}
			}

			if ($this->aAtinsrefier !== null) {
				if (!$this->aAtinsrefier->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtinsrefier->getValidationFailures());
				}
			}

			if ($this->aAtestayu !== null) {
				if (!$this->aAtestayu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtestayu->getValidationFailures());
				}
			}


			if (($retval = AtdenunciasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtdetests !== null) {
					foreach($this->collAtdetests as $referrerFK) {
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
		$pos = AtdenunciasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroexp();
				break;
			case 1:
				return $this->getAtciudadanoId();
				break;
			case 2:
				return $this->getAtsolici();
				break;
			case 3:
				return $this->getDesden();
				break;
			case 4:
				return $this->getTelefono();
				break;
			case 5:
				return $this->getAtunidadesId();
				break;
			case 6:
				return $this->getPersona();
				break;
			case 7:
				return $this->getStatus();
				break;
			case 8:
				return $this->getRespuesta();
				break;
			case 9:
				return $this->getFechaa();
				break;
			case 10:
				return $this->getFechar();
				break;
			case 11:
				return $this->getAttipsolId();
				break;
			case 12:
				return $this->getAtinsrefierId();
				break;
			case 13:
				return $this->getAtestayuId();
				break;
			case 14:
				return $this->getUsucre();
				break;
			case 15:
				return $this->getUsumod();
				break;
			case 16:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdenunciasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroexp(),
			$keys[1] => $this->getAtciudadanoId(),
			$keys[2] => $this->getAtsolici(),
			$keys[3] => $this->getDesden(),
			$keys[4] => $this->getTelefono(),
			$keys[5] => $this->getAtunidadesId(),
			$keys[6] => $this->getPersona(),
			$keys[7] => $this->getStatus(),
			$keys[8] => $this->getRespuesta(),
			$keys[9] => $this->getFechaa(),
			$keys[10] => $this->getFechar(),
			$keys[11] => $this->getAttipsolId(),
			$keys[12] => $this->getAtinsrefierId(),
			$keys[13] => $this->getAtestayuId(),
			$keys[14] => $this->getUsucre(),
			$keys[15] => $this->getUsumod(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdenunciasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroexp($value);
				break;
			case 1:
				$this->setAtciudadanoId($value);
				break;
			case 2:
				$this->setAtsolici($value);
				break;
			case 3:
				$this->setDesden($value);
				break;
			case 4:
				$this->setTelefono($value);
				break;
			case 5:
				$this->setAtunidadesId($value);
				break;
			case 6:
				$this->setPersona($value);
				break;
			case 7:
				$this->setStatus($value);
				break;
			case 8:
				$this->setRespuesta($value);
				break;
			case 9:
				$this->setFechaa($value);
				break;
			case 10:
				$this->setFechar($value);
				break;
			case 11:
				$this->setAttipsolId($value);
				break;
			case 12:
				$this->setAtinsrefierId($value);
				break;
			case 13:
				$this->setAtestayuId($value);
				break;
			case 14:
				$this->setUsucre($value);
				break;
			case 15:
				$this->setUsumod($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdenunciasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroexp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAtciudadanoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAtsolici($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesden($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelefono($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAtunidadesId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPersona($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRespuesta($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFechaa($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFechar($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAttipsolId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAtinsrefierId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAtestayuId($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUsucre($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUsumod($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtdenunciasPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtdenunciasPeer::NROEXP)) $criteria->add(AtdenunciasPeer::NROEXP, $this->nroexp);
		if ($this->isColumnModified(AtdenunciasPeer::ATCIUDADANO_ID)) $criteria->add(AtdenunciasPeer::ATCIUDADANO_ID, $this->atciudadano_id);
		if ($this->isColumnModified(AtdenunciasPeer::ATSOLICI)) $criteria->add(AtdenunciasPeer::ATSOLICI, $this->atsolici);
		if ($this->isColumnModified(AtdenunciasPeer::DESDEN)) $criteria->add(AtdenunciasPeer::DESDEN, $this->desden);
		if ($this->isColumnModified(AtdenunciasPeer::TELEFONO)) $criteria->add(AtdenunciasPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(AtdenunciasPeer::ATUNIDADES_ID)) $criteria->add(AtdenunciasPeer::ATUNIDADES_ID, $this->atunidades_id);
		if ($this->isColumnModified(AtdenunciasPeer::PERSONA)) $criteria->add(AtdenunciasPeer::PERSONA, $this->persona);
		if ($this->isColumnModified(AtdenunciasPeer::STATUS)) $criteria->add(AtdenunciasPeer::STATUS, $this->status);
		if ($this->isColumnModified(AtdenunciasPeer::RESPUESTA)) $criteria->add(AtdenunciasPeer::RESPUESTA, $this->respuesta);
		if ($this->isColumnModified(AtdenunciasPeer::FECHAA)) $criteria->add(AtdenunciasPeer::FECHAA, $this->fechaa);
		if ($this->isColumnModified(AtdenunciasPeer::FECHAR)) $criteria->add(AtdenunciasPeer::FECHAR, $this->fechar);
		if ($this->isColumnModified(AtdenunciasPeer::ATTIPSOL_ID)) $criteria->add(AtdenunciasPeer::ATTIPSOL_ID, $this->attipsol_id);
		if ($this->isColumnModified(AtdenunciasPeer::ATINSREFIER_ID)) $criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->atinsrefier_id);
		if ($this->isColumnModified(AtdenunciasPeer::ATESTAYU_ID)) $criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->atestayu_id);
		if ($this->isColumnModified(AtdenunciasPeer::USUCRE)) $criteria->add(AtdenunciasPeer::USUCRE, $this->usucre);
		if ($this->isColumnModified(AtdenunciasPeer::USUMOD)) $criteria->add(AtdenunciasPeer::USUMOD, $this->usumod);
		if ($this->isColumnModified(AtdenunciasPeer::ID)) $criteria->add(AtdenunciasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtdenunciasPeer::DATABASE_NAME);

		$criteria->add(AtdenunciasPeer::ID, $this->id);

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

		$copyObj->setNroexp($this->nroexp);

		$copyObj->setAtciudadanoId($this->atciudadano_id);

		$copyObj->setAtsolici($this->atsolici);

		$copyObj->setDesden($this->desden);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setAtunidadesId($this->atunidades_id);

		$copyObj->setPersona($this->persona);

		$copyObj->setStatus($this->status);

		$copyObj->setRespuesta($this->respuesta);

		$copyObj->setFechaa($this->fechaa);

		$copyObj->setFechar($this->fechar);

		$copyObj->setAttipsolId($this->attipsol_id);

		$copyObj->setAtinsrefierId($this->atinsrefier_id);

		$copyObj->setAtestayuId($this->atestayu_id);

		$copyObj->setUsucre($this->usucre);

		$copyObj->setUsumod($this->usumod);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtdetests() as $relObj) {
				$copyObj->addAtdetest($relObj->copy($deepCopy));
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
			self::$peer = new AtdenunciasPeer();
		}
		return self::$peer;
	}

	
	public function setAtciudadano($v)
	{


		if ($v === null) {
			$this->setAtciudadanoId(NULL);
		} else {
			$this->setAtciudadanoId($v->getId());
		}


		$this->aAtciudadano = $v;
	}


	
	public function getAtciudadano($con = null)
	{
		if ($this->aAtciudadano === null && ($this->atciudadano_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';

      $c = new Criteria();
      $c->add(AtciudadanoPeer::ID,$this->atciudadano_id);
      
			$this->aAtciudadano = AtciudadanoPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtciudadano;
	}

	
	public function setAtunidades($v)
	{


		if ($v === null) {
			$this->setAtunidadesId(NULL);
		} else {
			$this->setAtunidadesId($v->getId());
		}


		$this->aAtunidades = $v;
	}


	
	public function getAtunidades($con = null)
	{
		if ($this->aAtunidades === null && ($this->atunidades_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtunidadesPeer.php';

      $c = new Criteria();
      $c->add(AtunidadesPeer::ID,$this->atunidades_id);
      
			$this->aAtunidades = AtunidadesPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtunidades;
	}

	
	public function setAttipsol($v)
	{


		if ($v === null) {
			$this->setAttipsolId(NULL);
		} else {
			$this->setAttipsolId($v->getId());
		}


		$this->aAttipsol = $v;
	}


	
	public function getAttipsol($con = null)
	{
		if ($this->aAttipsol === null && ($this->attipsol_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAttipsolPeer.php';

      $c = new Criteria();
      $c->add(AttipsolPeer::ID,$this->attipsol_id);
      
			$this->aAttipsol = AttipsolPeer::doSelectOne($c, $con);

			
		}
		return $this->aAttipsol;
	}

	
	public function setAtinsrefier($v)
	{


		if ($v === null) {
			$this->setAtinsrefierId(NULL);
		} else {
			$this->setAtinsrefierId($v->getId());
		}


		$this->aAtinsrefier = $v;
	}


	
	public function getAtinsrefier($con = null)
	{
		if ($this->aAtinsrefier === null && ($this->atinsrefier_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtinsrefierPeer.php';

      $c = new Criteria();
      $c->add(AtinsrefierPeer::ID,$this->atinsrefier_id);
      
			$this->aAtinsrefier = AtinsrefierPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtinsrefier;
	}

	
	public function setAtestayu($v)
	{


		if ($v === null) {
			$this->setAtestayuId(NULL);
		} else {
			$this->setAtestayuId($v->getId());
		}


		$this->aAtestayu = $v;
	}


	
	public function getAtestayu($con = null)
	{
		if ($this->aAtestayu === null && ($this->atestayu_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtestayuPeer.php';

      $c = new Criteria();
      $c->add(AtestayuPeer::ID,$this->atestayu_id);
      
			$this->aAtestayu = AtestayuPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtestayu;
	}

	
	public function initAtdetests()
	{
		if ($this->collAtdetests === null) {
			$this->collAtdetests = array();
		}
	}

	
	public function getAtdetests($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetests === null) {
			if ($this->isNew()) {
			   $this->collAtdetests = array();
			} else {

				$criteria->add(AtdetestPeer::ATDENUNCIAS_ID, $this->getId());

				AtdetestPeer::addSelectColumns($criteria);
				$this->collAtdetests = AtdetestPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdetestPeer::ATDENUNCIAS_ID, $this->getId());

				AtdetestPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdetestCriteria) || !$this->lastAtdetestCriteria->equals($criteria)) {
					$this->collAtdetests = AtdetestPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdetestCriteria = $criteria;
		return $this->collAtdetests;
	}

	
	public function countAtdetests($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdetestPeer::ATDENUNCIAS_ID, $this->getId());

		return AtdetestPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdetest(Atdetest $l)
	{
		$this->collAtdetests[] = $l;
		$l->setAtdenuncias($this);
	}


	
	public function getAtdetestsJoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetests === null) {
			if ($this->isNew()) {
				$this->collAtdetests = array();
			} else {

				$criteria->add(AtdetestPeer::ATDENUNCIAS_ID, $this->getId());

				$this->collAtdetests = AtdetestPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetestPeer::ATDENUNCIAS_ID, $this->getId());

			if (!isset($this->lastAtdetestCriteria) || !$this->lastAtdetestCriteria->equals($criteria)) {
				$this->collAtdetests = AtdetestPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtdetestCriteria = $criteria;

		return $this->collAtdetests;
	}


	
	public function getAtdetestsJoinAtestayuRelatedByAtestayuDesde($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetests === null) {
			if ($this->isNew()) {
				$this->collAtdetests = array();
			} else {

				$criteria->add(AtdetestPeer::ATDENUNCIAS_ID, $this->getId());

				$this->collAtdetests = AtdetestPeer::doSelectJoinAtestayuRelatedByAtestayuDesde($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetestPeer::ATDENUNCIAS_ID, $this->getId());

			if (!isset($this->lastAtdetestCriteria) || !$this->lastAtdetestCriteria->equals($criteria)) {
				$this->collAtdetests = AtdetestPeer::doSelectJoinAtestayuRelatedByAtestayuDesde($criteria, $con);
			}
		}
		$this->lastAtdetestCriteria = $criteria;

		return $this->collAtdetests;
	}


	
	public function getAtdetestsJoinAtestayuRelatedByAtestayuHasta($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetests === null) {
			if ($this->isNew()) {
				$this->collAtdetests = array();
			} else {

				$criteria->add(AtdetestPeer::ATDENUNCIAS_ID, $this->getId());

				$this->collAtdetests = AtdetestPeer::doSelectJoinAtestayuRelatedByAtestayuHasta($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetestPeer::ATDENUNCIAS_ID, $this->getId());

			if (!isset($this->lastAtdetestCriteria) || !$this->lastAtdetestCriteria->equals($criteria)) {
				$this->collAtdetests = AtdetestPeer::doSelectJoinAtestayuRelatedByAtestayuHasta($criteria, $con);
			}
		}
		$this->lastAtdetestCriteria = $criteria;

		return $this->collAtdetests;
	}

} 