<?php


abstract class BaseLidefemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $diremp;


	
	protected $telemp;


	
	protected $faxemp;


	
	protected $emaemp;


	
	protected $unitri;


	
	protected $ptocta;


	
	protected $prebas;


	
	protected $expdie;


	
	protected $numemo;


	
	protected $solegr;


	
	protected $comint;


	
	protected $pliego;


	
	protected $aclara;


	
	protected $oferta;


	
	protected $anaofe;


	
	protected $recome;


	
	protected $ptocuecon;


	
	protected $notifi;


	
	protected $numdec;


	
	protected $contrat;


	
	protected $ordcom;


	
	protected $entregas;


	
	protected $anaemp;


	
	protected $penalizaciones;


	
	protected $actdescont;


	
	protected $obptocta;


	
	protected $obprebas;


	
	protected $obexpdie;


	
	protected $obnumemo;


	
	protected $obsolegr;


	
	protected $obpliego;


	
	protected $obaclara;


	
	protected $oboferta;


	
	protected $obanaofe;


	
	protected $obrecome;


	
	protected $obptocuecon;


	
	protected $obnotifi;


	
	protected $obnumdec;


	
	protected $obcontrat;


	
	protected $obactas;


	
	protected $obvaluaciones;


	
	protected $obinspecciones;


	
	protected $obsolpag;


	
	protected $obentregas;


	
	protected $obanaemp;


	
	protected $obpenalizaciones;


	
	protected $obactdescont;


	
	protected $obmodcont;


	
	protected $obaddendum;


	
	protected $codifili;


	
	protected $codifiob;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getDiremp()
  {

    return trim($this->diremp);

  }
  
  public function getTelemp()
  {

    return trim($this->telemp);

  }
  
  public function getFaxemp()
  {

    return trim($this->faxemp);

  }
  
  public function getEmaemp()
  {

    return trim($this->emaemp);

  }
  
  public function getUnitri($val=false)
  {

    if($val) return number_format($this->unitri,2,',','.');
    else return $this->unitri;

  }
  
  public function getPtocta()
  {

    return $this->ptocta;

  }
  
  public function getPrebas()
  {

    return $this->prebas;

  }
  
  public function getExpdie()
  {

    return $this->expdie;

  }
  
  public function getNumemo()
  {

    return $this->numemo;

  }
  
  public function getSolegr()
  {

    return $this->solegr;

  }
  
  public function getComint()
  {

    return $this->comint;

  }
  
  public function getPliego()
  {

    return $this->pliego;

  }
  
  public function getAclara()
  {

    return $this->aclara;

  }
  
  public function getOferta()
  {

    return $this->oferta;

  }
  
  public function getAnaofe()
  {

    return $this->anaofe;

  }
  
  public function getRecome()
  {

    return $this->recome;

  }
  
  public function getPtocuecon()
  {

    return $this->ptocuecon;

  }
  
  public function getNotifi()
  {

    return $this->notifi;

  }
  
  public function getNumdec()
  {

    return $this->numdec;

  }
  
  public function getContrat()
  {

    return $this->contrat;

  }
  
  public function getOrdcom()
  {

    return $this->ordcom;

  }
  
  public function getEntregas()
  {

    return $this->entregas;

  }
  
  public function getAnaemp()
  {

    return $this->anaemp;

  }
  
  public function getPenalizaciones()
  {

    return $this->penalizaciones;

  }
  
  public function getActdescont()
  {

    return $this->actdescont;

  }
  
  public function getObptocta()
  {

    return $this->obptocta;

  }
  
  public function getObprebas()
  {

    return $this->obprebas;

  }
  
  public function getObexpdie()
  {

    return $this->obexpdie;

  }
  
  public function getObnumemo()
  {

    return $this->obnumemo;

  }
  
  public function getObsolegr()
  {

    return $this->obsolegr;

  }
  
  public function getObpliego()
  {

    return $this->obpliego;

  }
  
  public function getObaclara()
  {

    return $this->obaclara;

  }
  
  public function getOboferta()
  {

    return $this->oboferta;

  }
  
  public function getObanaofe()
  {

    return $this->obanaofe;

  }
  
  public function getObrecome()
  {

    return $this->obrecome;

  }
  
  public function getObptocuecon()
  {

    return $this->obptocuecon;

  }
  
  public function getObnotifi()
  {

    return $this->obnotifi;

  }
  
  public function getObnumdec()
  {

    return $this->obnumdec;

  }
  
  public function getObcontrat()
  {

    return $this->obcontrat;

  }
  
  public function getObactas()
  {

    return $this->obactas;

  }
  
  public function getObvaluaciones()
  {

    return $this->obvaluaciones;

  }
  
  public function getObinspecciones()
  {

    return $this->obinspecciones;

  }
  
  public function getObsolpag()
  {

    return $this->obsolpag;

  }
  
  public function getObentregas()
  {

    return $this->obentregas;

  }
  
  public function getObanaemp()
  {

    return $this->obanaemp;

  }
  
  public function getObpenalizaciones()
  {

    return $this->obpenalizaciones;

  }
  
  public function getObactdescont()
  {

    return $this->obactdescont;

  }
  
  public function getObmodcont()
  {

    return $this->obmodcont;

  }
  
  public function getObaddendum()
  {

    return $this->obaddendum;

  }
  
  public function getCodifili()
  {

    return trim($this->codifili);

  }
  
  public function getCodifiob()
  {

    return trim($this->codifiob);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = LidefempPeer::CODEMP;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = LidefempPeer::NOMEMP;
      }
  
	} 
	
	public function setDiremp($v)
	{

    if ($this->diremp !== $v) {
        $this->diremp = $v;
        $this->modifiedColumns[] = LidefempPeer::DIREMP;
      }
  
	} 
	
	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = LidefempPeer::TELEMP;
      }
  
	} 
	
	public function setFaxemp($v)
	{

    if ($this->faxemp !== $v) {
        $this->faxemp = $v;
        $this->modifiedColumns[] = LidefempPeer::FAXEMP;
      }
  
	} 
	
	public function setEmaemp($v)
	{

    if ($this->emaemp !== $v) {
        $this->emaemp = $v;
        $this->modifiedColumns[] = LidefempPeer::EMAEMP;
      }
  
	} 
	
	public function setUnitri($v)
	{

    if ($this->unitri !== $v) {
        $this->unitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidefempPeer::UNITRI;
      }
  
	} 
	
	public function setPtocta($v)
	{

    if ($this->ptocta !== $v) {
        $this->ptocta = $v;
        $this->modifiedColumns[] = LidefempPeer::PTOCTA;
      }
  
	} 
	
	public function setPrebas($v)
	{

    if ($this->prebas !== $v) {
        $this->prebas = $v;
        $this->modifiedColumns[] = LidefempPeer::PREBAS;
      }
  
	} 
	
	public function setExpdie($v)
	{

    if ($this->expdie !== $v) {
        $this->expdie = $v;
        $this->modifiedColumns[] = LidefempPeer::EXPDIE;
      }
  
	} 
	
	public function setNumemo($v)
	{

    if ($this->numemo !== $v) {
        $this->numemo = $v;
        $this->modifiedColumns[] = LidefempPeer::NUMEMO;
      }
  
	} 
	
	public function setSolegr($v)
	{

    if ($this->solegr !== $v) {
        $this->solegr = $v;
        $this->modifiedColumns[] = LidefempPeer::SOLEGR;
      }
  
	} 
	
	public function setComint($v)
	{

    if ($this->comint !== $v) {
        $this->comint = $v;
        $this->modifiedColumns[] = LidefempPeer::COMINT;
      }
  
	} 
	
	public function setPliego($v)
	{

    if ($this->pliego !== $v) {
        $this->pliego = $v;
        $this->modifiedColumns[] = LidefempPeer::PLIEGO;
      }
  
	} 
	
	public function setAclara($v)
	{

    if ($this->aclara !== $v) {
        $this->aclara = $v;
        $this->modifiedColumns[] = LidefempPeer::ACLARA;
      }
  
	} 
	
	public function setOferta($v)
	{

    if ($this->oferta !== $v) {
        $this->oferta = $v;
        $this->modifiedColumns[] = LidefempPeer::OFERTA;
      }
  
	} 
	
	public function setAnaofe($v)
	{

    if ($this->anaofe !== $v) {
        $this->anaofe = $v;
        $this->modifiedColumns[] = LidefempPeer::ANAOFE;
      }
  
	} 
	
	public function setRecome($v)
	{

    if ($this->recome !== $v) {
        $this->recome = $v;
        $this->modifiedColumns[] = LidefempPeer::RECOME;
      }
  
	} 
	
	public function setPtocuecon($v)
	{

    if ($this->ptocuecon !== $v) {
        $this->ptocuecon = $v;
        $this->modifiedColumns[] = LidefempPeer::PTOCUECON;
      }
  
	} 
	
	public function setNotifi($v)
	{

    if ($this->notifi !== $v) {
        $this->notifi = $v;
        $this->modifiedColumns[] = LidefempPeer::NOTIFI;
      }
  
	} 
	
	public function setNumdec($v)
	{

    if ($this->numdec !== $v) {
        $this->numdec = $v;
        $this->modifiedColumns[] = LidefempPeer::NUMDEC;
      }
  
	} 
	
	public function setContrat($v)
	{

    if ($this->contrat !== $v) {
        $this->contrat = $v;
        $this->modifiedColumns[] = LidefempPeer::CONTRAT;
      }
  
	} 
	
	public function setOrdcom($v)
	{

    if ($this->ordcom !== $v) {
        $this->ordcom = $v;
        $this->modifiedColumns[] = LidefempPeer::ORDCOM;
      }
  
	} 
	
	public function setEntregas($v)
	{

    if ($this->entregas !== $v) {
        $this->entregas = $v;
        $this->modifiedColumns[] = LidefempPeer::ENTREGAS;
      }
  
	} 
	
	public function setAnaemp($v)
	{

    if ($this->anaemp !== $v) {
        $this->anaemp = $v;
        $this->modifiedColumns[] = LidefempPeer::ANAEMP;
      }
  
	} 
	
	public function setPenalizaciones($v)
	{

    if ($this->penalizaciones !== $v) {
        $this->penalizaciones = $v;
        $this->modifiedColumns[] = LidefempPeer::PENALIZACIONES;
      }
  
	} 
	
	public function setActdescont($v)
	{

    if ($this->actdescont !== $v) {
        $this->actdescont = $v;
        $this->modifiedColumns[] = LidefempPeer::ACTDESCONT;
      }
  
	} 
	
	public function setObptocta($v)
	{

    if ($this->obptocta !== $v) {
        $this->obptocta = $v;
        $this->modifiedColumns[] = LidefempPeer::OBPTOCTA;
      }
  
	} 
	
	public function setObprebas($v)
	{

    if ($this->obprebas !== $v) {
        $this->obprebas = $v;
        $this->modifiedColumns[] = LidefempPeer::OBPREBAS;
      }
  
	} 
	
	public function setObexpdie($v)
	{

    if ($this->obexpdie !== $v) {
        $this->obexpdie = $v;
        $this->modifiedColumns[] = LidefempPeer::OBEXPDIE;
      }
  
	} 
	
	public function setObnumemo($v)
	{

    if ($this->obnumemo !== $v) {
        $this->obnumemo = $v;
        $this->modifiedColumns[] = LidefempPeer::OBNUMEMO;
      }
  
	} 
	
	public function setObsolegr($v)
	{

    if ($this->obsolegr !== $v) {
        $this->obsolegr = $v;
        $this->modifiedColumns[] = LidefempPeer::OBSOLEGR;
      }
  
	} 
	
	public function setObpliego($v)
	{

    if ($this->obpliego !== $v) {
        $this->obpliego = $v;
        $this->modifiedColumns[] = LidefempPeer::OBPLIEGO;
      }
  
	} 
	
	public function setObaclara($v)
	{

    if ($this->obaclara !== $v) {
        $this->obaclara = $v;
        $this->modifiedColumns[] = LidefempPeer::OBACLARA;
      }
  
	} 
	
	public function setOboferta($v)
	{

    if ($this->oboferta !== $v) {
        $this->oboferta = $v;
        $this->modifiedColumns[] = LidefempPeer::OBOFERTA;
      }
  
	} 
	
	public function setObanaofe($v)
	{

    if ($this->obanaofe !== $v) {
        $this->obanaofe = $v;
        $this->modifiedColumns[] = LidefempPeer::OBANAOFE;
      }
  
	} 
	
	public function setObrecome($v)
	{

    if ($this->obrecome !== $v) {
        $this->obrecome = $v;
        $this->modifiedColumns[] = LidefempPeer::OBRECOME;
      }
  
	} 
	
	public function setObptocuecon($v)
	{

    if ($this->obptocuecon !== $v) {
        $this->obptocuecon = $v;
        $this->modifiedColumns[] = LidefempPeer::OBPTOCUECON;
      }
  
	} 
	
	public function setObnotifi($v)
	{

    if ($this->obnotifi !== $v) {
        $this->obnotifi = $v;
        $this->modifiedColumns[] = LidefempPeer::OBNOTIFI;
      }
  
	} 
	
	public function setObnumdec($v)
	{

    if ($this->obnumdec !== $v) {
        $this->obnumdec = $v;
        $this->modifiedColumns[] = LidefempPeer::OBNUMDEC;
      }
  
	} 
	
	public function setObcontrat($v)
	{

    if ($this->obcontrat !== $v) {
        $this->obcontrat = $v;
        $this->modifiedColumns[] = LidefempPeer::OBCONTRAT;
      }
  
	} 
	
	public function setObactas($v)
	{

    if ($this->obactas !== $v) {
        $this->obactas = $v;
        $this->modifiedColumns[] = LidefempPeer::OBACTAS;
      }
  
	} 
	
	public function setObvaluaciones($v)
	{

    if ($this->obvaluaciones !== $v) {
        $this->obvaluaciones = $v;
        $this->modifiedColumns[] = LidefempPeer::OBVALUACIONES;
      }
  
	} 
	
	public function setObinspecciones($v)
	{

    if ($this->obinspecciones !== $v) {
        $this->obinspecciones = $v;
        $this->modifiedColumns[] = LidefempPeer::OBINSPECCIONES;
      }
  
	} 
	
	public function setObsolpag($v)
	{

    if ($this->obsolpag !== $v) {
        $this->obsolpag = $v;
        $this->modifiedColumns[] = LidefempPeer::OBSOLPAG;
      }
  
	} 
	
	public function setObentregas($v)
	{

    if ($this->obentregas !== $v) {
        $this->obentregas = $v;
        $this->modifiedColumns[] = LidefempPeer::OBENTREGAS;
      }
  
	} 
	
	public function setObanaemp($v)
	{

    if ($this->obanaemp !== $v) {
        $this->obanaemp = $v;
        $this->modifiedColumns[] = LidefempPeer::OBANAEMP;
      }
  
	} 
	
	public function setObpenalizaciones($v)
	{

    if ($this->obpenalizaciones !== $v) {
        $this->obpenalizaciones = $v;
        $this->modifiedColumns[] = LidefempPeer::OBPENALIZACIONES;
      }
  
	} 
	
	public function setObactdescont($v)
	{

    if ($this->obactdescont !== $v) {
        $this->obactdescont = $v;
        $this->modifiedColumns[] = LidefempPeer::OBACTDESCONT;
      }
  
	} 
	
	public function setObmodcont($v)
	{

    if ($this->obmodcont !== $v) {
        $this->obmodcont = $v;
        $this->modifiedColumns[] = LidefempPeer::OBMODCONT;
      }
  
	} 
	
	public function setObaddendum($v)
	{

    if ($this->obaddendum !== $v) {
        $this->obaddendum = $v;
        $this->modifiedColumns[] = LidefempPeer::OBADDENDUM;
      }
  
	} 
	
	public function setCodifili($v)
	{

    if ($this->codifili !== $v) {
        $this->codifili = $v;
        $this->modifiedColumns[] = LidefempPeer::CODIFILI;
      }
  
	} 
	
	public function setCodifiob($v)
	{

    if ($this->codifiob !== $v) {
        $this->codifiob = $v;
        $this->modifiedColumns[] = LidefempPeer::CODIFIOB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidefempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->nomemp = $rs->getString($startcol + 1);

      $this->diremp = $rs->getString($startcol + 2);

      $this->telemp = $rs->getString($startcol + 3);

      $this->faxemp = $rs->getString($startcol + 4);

      $this->emaemp = $rs->getString($startcol + 5);

      $this->unitri = $rs->getFloat($startcol + 6);

      $this->ptocta = $rs->getInt($startcol + 7);

      $this->prebas = $rs->getInt($startcol + 8);

      $this->expdie = $rs->getInt($startcol + 9);

      $this->numemo = $rs->getInt($startcol + 10);

      $this->solegr = $rs->getInt($startcol + 11);

      $this->comint = $rs->getInt($startcol + 12);

      $this->pliego = $rs->getInt($startcol + 13);

      $this->aclara = $rs->getInt($startcol + 14);

      $this->oferta = $rs->getInt($startcol + 15);

      $this->anaofe = $rs->getInt($startcol + 16);

      $this->recome = $rs->getInt($startcol + 17);

      $this->ptocuecon = $rs->getInt($startcol + 18);

      $this->notifi = $rs->getInt($startcol + 19);

      $this->numdec = $rs->getInt($startcol + 20);

      $this->contrat = $rs->getInt($startcol + 21);

      $this->ordcom = $rs->getInt($startcol + 22);

      $this->entregas = $rs->getInt($startcol + 23);

      $this->anaemp = $rs->getInt($startcol + 24);

      $this->penalizaciones = $rs->getInt($startcol + 25);

      $this->actdescont = $rs->getInt($startcol + 26);

      $this->obptocta = $rs->getInt($startcol + 27);

      $this->obprebas = $rs->getInt($startcol + 28);

      $this->obexpdie = $rs->getInt($startcol + 29);

      $this->obnumemo = $rs->getInt($startcol + 30);

      $this->obsolegr = $rs->getInt($startcol + 31);

      $this->obpliego = $rs->getInt($startcol + 32);

      $this->obaclara = $rs->getInt($startcol + 33);

      $this->oboferta = $rs->getInt($startcol + 34);

      $this->obanaofe = $rs->getInt($startcol + 35);

      $this->obrecome = $rs->getInt($startcol + 36);

      $this->obptocuecon = $rs->getInt($startcol + 37);

      $this->obnotifi = $rs->getInt($startcol + 38);

      $this->obnumdec = $rs->getInt($startcol + 39);

      $this->obcontrat = $rs->getInt($startcol + 40);

      $this->obactas = $rs->getInt($startcol + 41);

      $this->obvaluaciones = $rs->getInt($startcol + 42);

      $this->obinspecciones = $rs->getInt($startcol + 43);

      $this->obsolpag = $rs->getInt($startcol + 44);

      $this->obentregas = $rs->getInt($startcol + 45);

      $this->obanaemp = $rs->getInt($startcol + 46);

      $this->obpenalizaciones = $rs->getInt($startcol + 47);

      $this->obactdescont = $rs->getInt($startcol + 48);

      $this->obmodcont = $rs->getInt($startcol + 49);

      $this->obaddendum = $rs->getInt($startcol + 50);

      $this->codifili = $rs->getString($startcol + 51);

      $this->codifiob = $rs->getString($startcol + 52);

      $this->id = $rs->getInt($startcol + 53);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 54; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidefemp object", $e);
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
			$con = Propel::getConnection(LidefempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidefempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidefempPeer::DATABASE_NAME);
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
					$pk = LidefempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidefempPeer::doUpdate($this, $con);
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


			if (($retval = LidefempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNomemp();
				break;
			case 2:
				return $this->getDiremp();
				break;
			case 3:
				return $this->getTelemp();
				break;
			case 4:
				return $this->getFaxemp();
				break;
			case 5:
				return $this->getEmaemp();
				break;
			case 6:
				return $this->getUnitri();
				break;
			case 7:
				return $this->getPtocta();
				break;
			case 8:
				return $this->getPrebas();
				break;
			case 9:
				return $this->getExpdie();
				break;
			case 10:
				return $this->getNumemo();
				break;
			case 11:
				return $this->getSolegr();
				break;
			case 12:
				return $this->getComint();
				break;
			case 13:
				return $this->getPliego();
				break;
			case 14:
				return $this->getAclara();
				break;
			case 15:
				return $this->getOferta();
				break;
			case 16:
				return $this->getAnaofe();
				break;
			case 17:
				return $this->getRecome();
				break;
			case 18:
				return $this->getPtocuecon();
				break;
			case 19:
				return $this->getNotifi();
				break;
			case 20:
				return $this->getNumdec();
				break;
			case 21:
				return $this->getContrat();
				break;
			case 22:
				return $this->getOrdcom();
				break;
			case 23:
				return $this->getEntregas();
				break;
			case 24:
				return $this->getAnaemp();
				break;
			case 25:
				return $this->getPenalizaciones();
				break;
			case 26:
				return $this->getActdescont();
				break;
			case 27:
				return $this->getObptocta();
				break;
			case 28:
				return $this->getObprebas();
				break;
			case 29:
				return $this->getObexpdie();
				break;
			case 30:
				return $this->getObnumemo();
				break;
			case 31:
				return $this->getObsolegr();
				break;
			case 32:
				return $this->getObpliego();
				break;
			case 33:
				return $this->getObaclara();
				break;
			case 34:
				return $this->getOboferta();
				break;
			case 35:
				return $this->getObanaofe();
				break;
			case 36:
				return $this->getObrecome();
				break;
			case 37:
				return $this->getObptocuecon();
				break;
			case 38:
				return $this->getObnotifi();
				break;
			case 39:
				return $this->getObnumdec();
				break;
			case 40:
				return $this->getObcontrat();
				break;
			case 41:
				return $this->getObactas();
				break;
			case 42:
				return $this->getObvaluaciones();
				break;
			case 43:
				return $this->getObinspecciones();
				break;
			case 44:
				return $this->getObsolpag();
				break;
			case 45:
				return $this->getObentregas();
				break;
			case 46:
				return $this->getObanaemp();
				break;
			case 47:
				return $this->getObpenalizaciones();
				break;
			case 48:
				return $this->getObactdescont();
				break;
			case 49:
				return $this->getObmodcont();
				break;
			case 50:
				return $this->getObaddendum();
				break;
			case 51:
				return $this->getCodifili();
				break;
			case 52:
				return $this->getCodifiob();
				break;
			case 53:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidefempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNomemp(),
			$keys[2] => $this->getDiremp(),
			$keys[3] => $this->getTelemp(),
			$keys[4] => $this->getFaxemp(),
			$keys[5] => $this->getEmaemp(),
			$keys[6] => $this->getUnitri(),
			$keys[7] => $this->getPtocta(),
			$keys[8] => $this->getPrebas(),
			$keys[9] => $this->getExpdie(),
			$keys[10] => $this->getNumemo(),
			$keys[11] => $this->getSolegr(),
			$keys[12] => $this->getComint(),
			$keys[13] => $this->getPliego(),
			$keys[14] => $this->getAclara(),
			$keys[15] => $this->getOferta(),
			$keys[16] => $this->getAnaofe(),
			$keys[17] => $this->getRecome(),
			$keys[18] => $this->getPtocuecon(),
			$keys[19] => $this->getNotifi(),
			$keys[20] => $this->getNumdec(),
			$keys[21] => $this->getContrat(),
			$keys[22] => $this->getOrdcom(),
			$keys[23] => $this->getEntregas(),
			$keys[24] => $this->getAnaemp(),
			$keys[25] => $this->getPenalizaciones(),
			$keys[26] => $this->getActdescont(),
			$keys[27] => $this->getObptocta(),
			$keys[28] => $this->getObprebas(),
			$keys[29] => $this->getObexpdie(),
			$keys[30] => $this->getObnumemo(),
			$keys[31] => $this->getObsolegr(),
			$keys[32] => $this->getObpliego(),
			$keys[33] => $this->getObaclara(),
			$keys[34] => $this->getOboferta(),
			$keys[35] => $this->getObanaofe(),
			$keys[36] => $this->getObrecome(),
			$keys[37] => $this->getObptocuecon(),
			$keys[38] => $this->getObnotifi(),
			$keys[39] => $this->getObnumdec(),
			$keys[40] => $this->getObcontrat(),
			$keys[41] => $this->getObactas(),
			$keys[42] => $this->getObvaluaciones(),
			$keys[43] => $this->getObinspecciones(),
			$keys[44] => $this->getObsolpag(),
			$keys[45] => $this->getObentregas(),
			$keys[46] => $this->getObanaemp(),
			$keys[47] => $this->getObpenalizaciones(),
			$keys[48] => $this->getObactdescont(),
			$keys[49] => $this->getObmodcont(),
			$keys[50] => $this->getObaddendum(),
			$keys[51] => $this->getCodifili(),
			$keys[52] => $this->getCodifiob(),
			$keys[53] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNomemp($value);
				break;
			case 2:
				$this->setDiremp($value);
				break;
			case 3:
				$this->setTelemp($value);
				break;
			case 4:
				$this->setFaxemp($value);
				break;
			case 5:
				$this->setEmaemp($value);
				break;
			case 6:
				$this->setUnitri($value);
				break;
			case 7:
				$this->setPtocta($value);
				break;
			case 8:
				$this->setPrebas($value);
				break;
			case 9:
				$this->setExpdie($value);
				break;
			case 10:
				$this->setNumemo($value);
				break;
			case 11:
				$this->setSolegr($value);
				break;
			case 12:
				$this->setComint($value);
				break;
			case 13:
				$this->setPliego($value);
				break;
			case 14:
				$this->setAclara($value);
				break;
			case 15:
				$this->setOferta($value);
				break;
			case 16:
				$this->setAnaofe($value);
				break;
			case 17:
				$this->setRecome($value);
				break;
			case 18:
				$this->setPtocuecon($value);
				break;
			case 19:
				$this->setNotifi($value);
				break;
			case 20:
				$this->setNumdec($value);
				break;
			case 21:
				$this->setContrat($value);
				break;
			case 22:
				$this->setOrdcom($value);
				break;
			case 23:
				$this->setEntregas($value);
				break;
			case 24:
				$this->setAnaemp($value);
				break;
			case 25:
				$this->setPenalizaciones($value);
				break;
			case 26:
				$this->setActdescont($value);
				break;
			case 27:
				$this->setObptocta($value);
				break;
			case 28:
				$this->setObprebas($value);
				break;
			case 29:
				$this->setObexpdie($value);
				break;
			case 30:
				$this->setObnumemo($value);
				break;
			case 31:
				$this->setObsolegr($value);
				break;
			case 32:
				$this->setObpliego($value);
				break;
			case 33:
				$this->setObaclara($value);
				break;
			case 34:
				$this->setOboferta($value);
				break;
			case 35:
				$this->setObanaofe($value);
				break;
			case 36:
				$this->setObrecome($value);
				break;
			case 37:
				$this->setObptocuecon($value);
				break;
			case 38:
				$this->setObnotifi($value);
				break;
			case 39:
				$this->setObnumdec($value);
				break;
			case 40:
				$this->setObcontrat($value);
				break;
			case 41:
				$this->setObactas($value);
				break;
			case 42:
				$this->setObvaluaciones($value);
				break;
			case 43:
				$this->setObinspecciones($value);
				break;
			case 44:
				$this->setObsolpag($value);
				break;
			case 45:
				$this->setObentregas($value);
				break;
			case 46:
				$this->setObanaemp($value);
				break;
			case 47:
				$this->setObpenalizaciones($value);
				break;
			case 48:
				$this->setObactdescont($value);
				break;
			case 49:
				$this->setObmodcont($value);
				break;
			case 50:
				$this->setObaddendum($value);
				break;
			case 51:
				$this->setCodifili($value);
				break;
			case 52:
				$this->setCodifiob($value);
				break;
			case 53:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidefempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiremp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFaxemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmaemp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUnitri($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPtocta($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPrebas($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setExpdie($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumemo($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSolegr($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setComint($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPliego($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAclara($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setOferta($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAnaofe($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setRecome($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPtocuecon($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNotifi($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setNumdec($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setContrat($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setOrdcom($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setEntregas($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setAnaemp($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setPenalizaciones($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setActdescont($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setObptocta($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setObprebas($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setObexpdie($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setObnumemo($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setObsolegr($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setObpliego($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setObaclara($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setOboferta($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setObanaofe($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setObrecome($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setObptocuecon($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setObnotifi($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setObnumdec($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setObcontrat($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setObactas($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setObvaluaciones($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setObinspecciones($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setObsolpag($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setObentregas($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setObanaemp($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setObpenalizaciones($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setObactdescont($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setObmodcont($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setObaddendum($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setCodifili($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setCodifiob($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setId($arr[$keys[53]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidefempPeer::DATABASE_NAME);

		if ($this->isColumnModified(LidefempPeer::CODEMP)) $criteria->add(LidefempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(LidefempPeer::NOMEMP)) $criteria->add(LidefempPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(LidefempPeer::DIREMP)) $criteria->add(LidefempPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(LidefempPeer::TELEMP)) $criteria->add(LidefempPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(LidefempPeer::FAXEMP)) $criteria->add(LidefempPeer::FAXEMP, $this->faxemp);
		if ($this->isColumnModified(LidefempPeer::EMAEMP)) $criteria->add(LidefempPeer::EMAEMP, $this->emaemp);
		if ($this->isColumnModified(LidefempPeer::UNITRI)) $criteria->add(LidefempPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(LidefempPeer::PTOCTA)) $criteria->add(LidefempPeer::PTOCTA, $this->ptocta);
		if ($this->isColumnModified(LidefempPeer::PREBAS)) $criteria->add(LidefempPeer::PREBAS, $this->prebas);
		if ($this->isColumnModified(LidefempPeer::EXPDIE)) $criteria->add(LidefempPeer::EXPDIE, $this->expdie);
		if ($this->isColumnModified(LidefempPeer::NUMEMO)) $criteria->add(LidefempPeer::NUMEMO, $this->numemo);
		if ($this->isColumnModified(LidefempPeer::SOLEGR)) $criteria->add(LidefempPeer::SOLEGR, $this->solegr);
		if ($this->isColumnModified(LidefempPeer::COMINT)) $criteria->add(LidefempPeer::COMINT, $this->comint);
		if ($this->isColumnModified(LidefempPeer::PLIEGO)) $criteria->add(LidefempPeer::PLIEGO, $this->pliego);
		if ($this->isColumnModified(LidefempPeer::ACLARA)) $criteria->add(LidefempPeer::ACLARA, $this->aclara);
		if ($this->isColumnModified(LidefempPeer::OFERTA)) $criteria->add(LidefempPeer::OFERTA, $this->oferta);
		if ($this->isColumnModified(LidefempPeer::ANAOFE)) $criteria->add(LidefempPeer::ANAOFE, $this->anaofe);
		if ($this->isColumnModified(LidefempPeer::RECOME)) $criteria->add(LidefempPeer::RECOME, $this->recome);
		if ($this->isColumnModified(LidefempPeer::PTOCUECON)) $criteria->add(LidefempPeer::PTOCUECON, $this->ptocuecon);
		if ($this->isColumnModified(LidefempPeer::NOTIFI)) $criteria->add(LidefempPeer::NOTIFI, $this->notifi);
		if ($this->isColumnModified(LidefempPeer::NUMDEC)) $criteria->add(LidefempPeer::NUMDEC, $this->numdec);
		if ($this->isColumnModified(LidefempPeer::CONTRAT)) $criteria->add(LidefempPeer::CONTRAT, $this->contrat);
		if ($this->isColumnModified(LidefempPeer::ORDCOM)) $criteria->add(LidefempPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(LidefempPeer::ENTREGAS)) $criteria->add(LidefempPeer::ENTREGAS, $this->entregas);
		if ($this->isColumnModified(LidefempPeer::ANAEMP)) $criteria->add(LidefempPeer::ANAEMP, $this->anaemp);
		if ($this->isColumnModified(LidefempPeer::PENALIZACIONES)) $criteria->add(LidefempPeer::PENALIZACIONES, $this->penalizaciones);
		if ($this->isColumnModified(LidefempPeer::ACTDESCONT)) $criteria->add(LidefempPeer::ACTDESCONT, $this->actdescont);
		if ($this->isColumnModified(LidefempPeer::OBPTOCTA)) $criteria->add(LidefempPeer::OBPTOCTA, $this->obptocta);
		if ($this->isColumnModified(LidefempPeer::OBPREBAS)) $criteria->add(LidefempPeer::OBPREBAS, $this->obprebas);
		if ($this->isColumnModified(LidefempPeer::OBEXPDIE)) $criteria->add(LidefempPeer::OBEXPDIE, $this->obexpdie);
		if ($this->isColumnModified(LidefempPeer::OBNUMEMO)) $criteria->add(LidefempPeer::OBNUMEMO, $this->obnumemo);
		if ($this->isColumnModified(LidefempPeer::OBSOLEGR)) $criteria->add(LidefempPeer::OBSOLEGR, $this->obsolegr);
		if ($this->isColumnModified(LidefempPeer::OBPLIEGO)) $criteria->add(LidefempPeer::OBPLIEGO, $this->obpliego);
		if ($this->isColumnModified(LidefempPeer::OBACLARA)) $criteria->add(LidefempPeer::OBACLARA, $this->obaclara);
		if ($this->isColumnModified(LidefempPeer::OBOFERTA)) $criteria->add(LidefempPeer::OBOFERTA, $this->oboferta);
		if ($this->isColumnModified(LidefempPeer::OBANAOFE)) $criteria->add(LidefempPeer::OBANAOFE, $this->obanaofe);
		if ($this->isColumnModified(LidefempPeer::OBRECOME)) $criteria->add(LidefempPeer::OBRECOME, $this->obrecome);
		if ($this->isColumnModified(LidefempPeer::OBPTOCUECON)) $criteria->add(LidefempPeer::OBPTOCUECON, $this->obptocuecon);
		if ($this->isColumnModified(LidefempPeer::OBNOTIFI)) $criteria->add(LidefempPeer::OBNOTIFI, $this->obnotifi);
		if ($this->isColumnModified(LidefempPeer::OBNUMDEC)) $criteria->add(LidefempPeer::OBNUMDEC, $this->obnumdec);
		if ($this->isColumnModified(LidefempPeer::OBCONTRAT)) $criteria->add(LidefempPeer::OBCONTRAT, $this->obcontrat);
		if ($this->isColumnModified(LidefempPeer::OBACTAS)) $criteria->add(LidefempPeer::OBACTAS, $this->obactas);
		if ($this->isColumnModified(LidefempPeer::OBVALUACIONES)) $criteria->add(LidefempPeer::OBVALUACIONES, $this->obvaluaciones);
		if ($this->isColumnModified(LidefempPeer::OBINSPECCIONES)) $criteria->add(LidefempPeer::OBINSPECCIONES, $this->obinspecciones);
		if ($this->isColumnModified(LidefempPeer::OBSOLPAG)) $criteria->add(LidefempPeer::OBSOLPAG, $this->obsolpag);
		if ($this->isColumnModified(LidefempPeer::OBENTREGAS)) $criteria->add(LidefempPeer::OBENTREGAS, $this->obentregas);
		if ($this->isColumnModified(LidefempPeer::OBANAEMP)) $criteria->add(LidefempPeer::OBANAEMP, $this->obanaemp);
		if ($this->isColumnModified(LidefempPeer::OBPENALIZACIONES)) $criteria->add(LidefempPeer::OBPENALIZACIONES, $this->obpenalizaciones);
		if ($this->isColumnModified(LidefempPeer::OBACTDESCONT)) $criteria->add(LidefempPeer::OBACTDESCONT, $this->obactdescont);
		if ($this->isColumnModified(LidefempPeer::OBMODCONT)) $criteria->add(LidefempPeer::OBMODCONT, $this->obmodcont);
		if ($this->isColumnModified(LidefempPeer::OBADDENDUM)) $criteria->add(LidefempPeer::OBADDENDUM, $this->obaddendum);
		if ($this->isColumnModified(LidefempPeer::CODIFILI)) $criteria->add(LidefempPeer::CODIFILI, $this->codifili);
		if ($this->isColumnModified(LidefempPeer::CODIFIOB)) $criteria->add(LidefempPeer::CODIFIOB, $this->codifiob);
		if ($this->isColumnModified(LidefempPeer::ID)) $criteria->add(LidefempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidefempPeer::DATABASE_NAME);

		$criteria->add(LidefempPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setFaxemp($this->faxemp);

		$copyObj->setEmaemp($this->emaemp);

		$copyObj->setUnitri($this->unitri);

		$copyObj->setPtocta($this->ptocta);

		$copyObj->setPrebas($this->prebas);

		$copyObj->setExpdie($this->expdie);

		$copyObj->setNumemo($this->numemo);

		$copyObj->setSolegr($this->solegr);

		$copyObj->setComint($this->comint);

		$copyObj->setPliego($this->pliego);

		$copyObj->setAclara($this->aclara);

		$copyObj->setOferta($this->oferta);

		$copyObj->setAnaofe($this->anaofe);

		$copyObj->setRecome($this->recome);

		$copyObj->setPtocuecon($this->ptocuecon);

		$copyObj->setNotifi($this->notifi);

		$copyObj->setNumdec($this->numdec);

		$copyObj->setContrat($this->contrat);

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setEntregas($this->entregas);

		$copyObj->setAnaemp($this->anaemp);

		$copyObj->setPenalizaciones($this->penalizaciones);

		$copyObj->setActdescont($this->actdescont);

		$copyObj->setObptocta($this->obptocta);

		$copyObj->setObprebas($this->obprebas);

		$copyObj->setObexpdie($this->obexpdie);

		$copyObj->setObnumemo($this->obnumemo);

		$copyObj->setObsolegr($this->obsolegr);

		$copyObj->setObpliego($this->obpliego);

		$copyObj->setObaclara($this->obaclara);

		$copyObj->setOboferta($this->oboferta);

		$copyObj->setObanaofe($this->obanaofe);

		$copyObj->setObrecome($this->obrecome);

		$copyObj->setObptocuecon($this->obptocuecon);

		$copyObj->setObnotifi($this->obnotifi);

		$copyObj->setObnumdec($this->obnumdec);

		$copyObj->setObcontrat($this->obcontrat);

		$copyObj->setObactas($this->obactas);

		$copyObj->setObvaluaciones($this->obvaluaciones);

		$copyObj->setObinspecciones($this->obinspecciones);

		$copyObj->setObsolpag($this->obsolpag);

		$copyObj->setObentregas($this->obentregas);

		$copyObj->setObanaemp($this->obanaemp);

		$copyObj->setObpenalizaciones($this->obpenalizaciones);

		$copyObj->setObactdescont($this->obactdescont);

		$copyObj->setObmodcont($this->obmodcont);

		$copyObj->setObaddendum($this->obaddendum);

		$copyObj->setCodifili($this->codifili);

		$copyObj->setCodifiob($this->codifiob);


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
			self::$peer = new LidefempPeer();
		}
		return self::$peer;
	}

} 