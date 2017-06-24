<?php


abstract class BasesfGuardUserProfile extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $user_id;


	
	protected $email;


	
	protected $information;


	
	protected $fullname;


	
	protected $institution;


	
	protected $pais;


	
	protected $comentario;


	
	protected $tipo;


	
	protected $validate;


	
	protected $id;

	
	protected $asfGuardUser;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getUserId()
  {

    return $this->user_id;

  }
  
  public function getEmail()
  {

    return trim($this->email);

  }
  
  public function getInformation()
  {

    return $this->information;

  }
  
  public function getFullname()
  {

    return trim($this->fullname);

  }
  
  public function getInstitution()
  {

    return trim($this->institution);

  }
  
  public function getPais()
  {

    return trim($this->pais);

  }
  
  public function getComentario()
  {

    return trim($this->comentario);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getValidate()
  {

    return trim($this->validate);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setUserId($v)
	{

    if ($this->user_id !== $v) {
        $this->user_id = $v;
        $this->modifiedColumns[] = sfGuardUserProfilePeer::USER_ID;
      }
  
		if ($this->asfGuardUser !== null && $this->asfGuardUser->getId() !== $v) {
			$this->asfGuardUser = null;
		}

	} 
	
	public function setEmail($v)
	{

    if ($this->email !== $v) {
        $this->email = $v;
        $this->modifiedColumns[] = sfGuardUserProfilePeer::EMAIL;
      }
  
	} 
	
	public function setInformation($v)
	{

    if ($this->information !== $v) {
        $this->information = $v;
        $this->modifiedColumns[] = sfGuardUserProfilePeer::INFORMATION;
      }
  
	} 
	
	public function setFullname($v)
	{

    if ($this->fullname !== $v) {
        $this->fullname = $v;
        $this->modifiedColumns[] = sfGuardUserProfilePeer::FULLNAME;
      }
  
	} 
	
	public function setInstitution($v)
	{

    if ($this->institution !== $v) {
        $this->institution = $v;
        $this->modifiedColumns[] = sfGuardUserProfilePeer::INSTITUTION;
      }
  
	} 
	
	public function setPais($v)
	{

    if ($this->pais !== $v) {
        $this->pais = $v;
        $this->modifiedColumns[] = sfGuardUserProfilePeer::PAIS;
      }
  
	} 
	
	public function setComentario($v)
	{

    if ($this->comentario !== $v) {
        $this->comentario = $v;
        $this->modifiedColumns[] = sfGuardUserProfilePeer::COMENTARIO;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = sfGuardUserProfilePeer::TIPO;
      }
  
	} 
	
	public function setValidate($v)
	{

    if ($this->validate !== $v) {
        $this->validate = $v;
        $this->modifiedColumns[] = sfGuardUserProfilePeer::VALIDATE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = sfGuardUserProfilePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->user_id = $rs->getInt($startcol + 0);

      $this->email = $rs->getString($startcol + 1);

      $this->information = $rs->getBoolean($startcol + 2);

      $this->fullname = $rs->getString($startcol + 3);

      $this->institution = $rs->getString($startcol + 4);

      $this->pais = $rs->getString($startcol + 5);

      $this->comentario = $rs->getString($startcol + 6);

      $this->tipo = $rs->getString($startcol + 7);

      $this->validate = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating sfGuardUserProfile object", $e);
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
			$con = Propel::getConnection(sfGuardUserProfilePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfGuardUserProfilePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(sfGuardUserProfilePeer::DATABASE_NAME);
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


												
			if ($this->asfGuardUser !== null) {
				if ($this->asfGuardUser->isModified()) {
					$affectedRows += $this->asfGuardUser->save($con);
				}
				$this->setsfGuardUser($this->asfGuardUser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfGuardUserProfilePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfGuardUserProfilePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->asfGuardUser !== null) {
				if (!$this->asfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUser->getValidationFailures());
				}
			}


			if (($retval = sfGuardUserProfilePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardUserProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserId();
				break;
			case 1:
				return $this->getEmail();
				break;
			case 2:
				return $this->getInformation();
				break;
			case 3:
				return $this->getFullname();
				break;
			case 4:
				return $this->getInstitution();
				break;
			case 5:
				return $this->getPais();
				break;
			case 6:
				return $this->getComentario();
				break;
			case 7:
				return $this->getTipo();
				break;
			case 8:
				return $this->getValidate();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserProfilePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserId(),
			$keys[1] => $this->getEmail(),
			$keys[2] => $this->getInformation(),
			$keys[3] => $this->getFullname(),
			$keys[4] => $this->getInstitution(),
			$keys[5] => $this->getPais(),
			$keys[6] => $this->getComentario(),
			$keys[7] => $this->getTipo(),
			$keys[8] => $this->getValidate(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardUserProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserId($value);
				break;
			case 1:
				$this->setEmail($value);
				break;
			case 2:
				$this->setInformation($value);
				break;
			case 3:
				$this->setFullname($value);
				break;
			case 4:
				$this->setInstitution($value);
				break;
			case 5:
				$this->setPais($value);
				break;
			case 6:
				$this->setComentario($value);
				break;
			case 7:
				$this->setTipo($value);
				break;
			case 8:
				$this->setValidate($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserProfilePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEmail($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setInformation($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFullname($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setInstitution($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPais($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setComentario($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setValidate($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfGuardUserProfilePeer::DATABASE_NAME);

		if ($this->isColumnModified(sfGuardUserProfilePeer::USER_ID)) $criteria->add(sfGuardUserProfilePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(sfGuardUserProfilePeer::EMAIL)) $criteria->add(sfGuardUserProfilePeer::EMAIL, $this->email);
		if ($this->isColumnModified(sfGuardUserProfilePeer::INFORMATION)) $criteria->add(sfGuardUserProfilePeer::INFORMATION, $this->information);
		if ($this->isColumnModified(sfGuardUserProfilePeer::FULLNAME)) $criteria->add(sfGuardUserProfilePeer::FULLNAME, $this->fullname);
		if ($this->isColumnModified(sfGuardUserProfilePeer::INSTITUTION)) $criteria->add(sfGuardUserProfilePeer::INSTITUTION, $this->institution);
		if ($this->isColumnModified(sfGuardUserProfilePeer::PAIS)) $criteria->add(sfGuardUserProfilePeer::PAIS, $this->pais);
		if ($this->isColumnModified(sfGuardUserProfilePeer::COMENTARIO)) $criteria->add(sfGuardUserProfilePeer::COMENTARIO, $this->comentario);
		if ($this->isColumnModified(sfGuardUserProfilePeer::TIPO)) $criteria->add(sfGuardUserProfilePeer::TIPO, $this->tipo);
		if ($this->isColumnModified(sfGuardUserProfilePeer::VALIDATE)) $criteria->add(sfGuardUserProfilePeer::VALIDATE, $this->validate);
		if ($this->isColumnModified(sfGuardUserProfilePeer::ID)) $criteria->add(sfGuardUserProfilePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfGuardUserProfilePeer::DATABASE_NAME);

		$criteria->add(sfGuardUserProfilePeer::ID, $this->id);

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

		$copyObj->setUserId($this->user_id);

		$copyObj->setEmail($this->email);

		$copyObj->setInformation($this->information);

		$copyObj->setFullname($this->fullname);

		$copyObj->setInstitution($this->institution);

		$copyObj->setPais($this->pais);

		$copyObj->setComentario($this->comentario);

		$copyObj->setTipo($this->tipo);

		$copyObj->setValidate($this->validate);


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
			self::$peer = new sfGuardUserProfilePeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUser($v)
	{


		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}


		$this->asfGuardUser = $v;
	}


	
	public function getsfGuardUser($con = null)
	{
		if ($this->asfGuardUser === null && ($this->user_id !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

      $c = new Criteria();
      $c->add(sfGuardUserPeer::ID,$this->user_id);
      
			$this->asfGuardUser = sfGuardUserPeer::doSelectOne($c, $con);

			
		}
		return $this->asfGuardUser;
	}

} 