<?php


abstract class BaseNpconftxtcestic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tiptxt;


	
	protected $initipre1;


	
	protected $lontipre1;


	
	protected $initipdo1;


	
	protected $lontipdo1;


	
	protected $iniideemp;


	
	protected $lonideemp;


	
	protected $ininumlo1;


	
	protected $finnumlo1;


	
	protected $ininomemp;


	
	protected $finnomemp;


	
	protected $inicanreg;


	
	protected $fincanreg;


	
	protected $inicodpla;


	
	protected $fincodpla;


	
	protected $inifecgen;


	
	protected $finfecgen;


	
	protected $inihorgen;


	
	protected $finhorgen;


	
	protected $inicodre1;


	
	protected $fincodre1;


	
	protected $ininomarc;


	
	protected $finnomarc;


	
	protected $inifille1;


	
	protected $finfille1;


	
	protected $iniidere1;


	
	protected $lonidere1;


	
	protected $ininrocon;


	
	protected $finnrocon;


	
	protected $inifecefe;


	
	protected $finfecefe;


	
	protected $inimontot;


	
	protected $finmontot;


	
	protected $inicentr1;


	
	protected $loncentr1;


	
	protected $iniespbla;


	
	protected $lonespbla;


	
	protected $inicodba1;


	
	protected $loncodba1;


	
	protected $inirifem1;


	
	protected $lonrifem1;


	
	protected $initipnom;


	
	protected $lontipnom;


	
	protected $initipre2;


	
	protected $lontipre2;


	
	protected $initipdo2;


	
	protected $lontipdo2;


	
	protected $ininroced;


	
	protected $lonnroced;


	
	protected $inipriape;


	
	protected $lonpriape;


	
	protected $inifille2;


	
	protected $lonfille2;


	
	protected $inisegape;


	
	protected $lonsegape;


	
	protected $inifille3;


	
	protected $lonfille3;


	
	protected $iniprinom;


	
	protected $lonprinom;


	
	protected $inifille4;


	
	protected $lonfille4;


	
	protected $iniciudad;


	
	protected $lonciudad;


	
	protected $iniestado;


	
	protected $lonestado;


	
	protected $inicodofi;


	
	protected $loncodofi;


	
	protected $inisexo;


	
	protected $lonsexo;


	
	protected $inicodare;


	
	protected $loncodare;


	
	protected $ininumtel;


	
	protected $lonnumtel;


	
	protected $inidestel;


	
	protected $londestel;


	
	protected $inifecnac;


	
	protected $lonfecnac;


	
	protected $inicodre2;


	
	protected $fincodre2;


	
	protected $inifille5;


	
	protected $lonfille5;


	
	protected $inipan;


	
	protected $lonpan;


	
	protected $inimotivo;


	
	protected $lonmotivo;


	
	protected $inilibre;


	
	protected $lonlibre;


	
	protected $inipannue;


	
	protected $lonpannue;


	
	protected $iniotrdat;


	
	protected $lonotrdat;


	
	protected $iniidere2;


	
	protected $lonidere2;


	
	protected $ininumtar;


	
	protected $lonnumtar;


	
	protected $inimontra;


	
	protected $lonmontra;


	
	protected $ininomben;


	
	protected $lonnomben;


	
	protected $inicentr2;


	
	protected $loncentr2;


	
	protected $inicodba2;


	
	protected $loncodba2;


	
	protected $ininumlo2;


	
	protected $finnumlo2;


	
	protected $inirifem2;


	
	protected $lonrifem2;


	
	protected $inifille6;


	
	protected $lonfille6;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTiptxt()
  {

    return trim($this->tiptxt);

  }
  
  public function getInitipre1($val=false)
  {

    if($val) return number_format($this->initipre1,2,',','.');
    else return $this->initipre1;

  }
  
  public function getLontipre1($val=false)
  {

    if($val) return number_format($this->lontipre1,2,',','.');
    else return $this->lontipre1;

  }
  
  public function getInitipdo1($val=false)
  {

    if($val) return number_format($this->initipdo1,2,',','.');
    else return $this->initipdo1;

  }
  
  public function getLontipdo1($val=false)
  {

    if($val) return number_format($this->lontipdo1,2,',','.');
    else return $this->lontipdo1;

  }
  
  public function getIniideemp($val=false)
  {

    if($val) return number_format($this->iniideemp,2,',','.');
    else return $this->iniideemp;

  }
  
  public function getLonideemp($val=false)
  {

    if($val) return number_format($this->lonideemp,2,',','.');
    else return $this->lonideemp;

  }
  
  public function getIninumlo1($val=false)
  {

    if($val) return number_format($this->ininumlo1,2,',','.');
    else return $this->ininumlo1;

  }
  
  public function getFinnumlo1($val=false)
  {

    if($val) return number_format($this->finnumlo1,2,',','.');
    else return $this->finnumlo1;

  }
  
  public function getIninomemp($val=false)
  {

    if($val) return number_format($this->ininomemp,2,',','.');
    else return $this->ininomemp;

  }
  
  public function getFinnomemp($val=false)
  {

    if($val) return number_format($this->finnomemp,2,',','.');
    else return $this->finnomemp;

  }
  
  public function getInicanreg($val=false)
  {

    if($val) return number_format($this->inicanreg,2,',','.');
    else return $this->inicanreg;

  }
  
  public function getFincanreg($val=false)
  {

    if($val) return number_format($this->fincanreg,2,',','.');
    else return $this->fincanreg;

  }
  
  public function getInicodpla($val=false)
  {

    if($val) return number_format($this->inicodpla,2,',','.');
    else return $this->inicodpla;

  }
  
  public function getFincodpla($val=false)
  {

    if($val) return number_format($this->fincodpla,2,',','.');
    else return $this->fincodpla;

  }
  
  public function getInifecgen($val=false)
  {

    if($val) return number_format($this->inifecgen,2,',','.');
    else return $this->inifecgen;

  }
  
  public function getFinfecgen($val=false)
  {

    if($val) return number_format($this->finfecgen,2,',','.');
    else return $this->finfecgen;

  }
  
  public function getInihorgen($val=false)
  {

    if($val) return number_format($this->inihorgen,2,',','.');
    else return $this->inihorgen;

  }
  
  public function getFinhorgen($val=false)
  {

    if($val) return number_format($this->finhorgen,2,',','.');
    else return $this->finhorgen;

  }
  
  public function getInicodre1($val=false)
  {

    if($val) return number_format($this->inicodre1,2,',','.');
    else return $this->inicodre1;

  }
  
  public function getFincodre1($val=false)
  {

    if($val) return number_format($this->fincodre1,2,',','.');
    else return $this->fincodre1;

  }
  
  public function getIninomarc($val=false)
  {

    if($val) return number_format($this->ininomarc,2,',','.');
    else return $this->ininomarc;

  }
  
  public function getFinnomarc($val=false)
  {

    if($val) return number_format($this->finnomarc,2,',','.');
    else return $this->finnomarc;

  }
  
  public function getInifille1($val=false)
  {

    if($val) return number_format($this->inifille1,2,',','.');
    else return $this->inifille1;

  }
  
  public function getFinfille1($val=false)
  {

    if($val) return number_format($this->finfille1,2,',','.');
    else return $this->finfille1;

  }
  
  public function getIniidere1($val=false)
  {

    if($val) return number_format($this->iniidere1,2,',','.');
    else return $this->iniidere1;

  }
  
  public function getLonidere1($val=false)
  {

    if($val) return number_format($this->lonidere1,2,',','.');
    else return $this->lonidere1;

  }
  
  public function getIninrocon($val=false)
  {

    if($val) return number_format($this->ininrocon,2,',','.');
    else return $this->ininrocon;

  }
  
  public function getFinnrocon($val=false)
  {

    if($val) return number_format($this->finnrocon,2,',','.');
    else return $this->finnrocon;

  }
  
  public function getInifecefe($val=false)
  {

    if($val) return number_format($this->inifecefe,2,',','.');
    else return $this->inifecefe;

  }
  
  public function getFinfecefe($val=false)
  {

    if($val) return number_format($this->finfecefe,2,',','.');
    else return $this->finfecefe;

  }
  
  public function getInimontot($val=false)
  {

    if($val) return number_format($this->inimontot,2,',','.');
    else return $this->inimontot;

  }
  
  public function getFinmontot($val=false)
  {

    if($val) return number_format($this->finmontot,2,',','.');
    else return $this->finmontot;

  }
  
  public function getInicentr1($val=false)
  {

    if($val) return number_format($this->inicentr1,2,',','.');
    else return $this->inicentr1;

  }
  
  public function getLoncentr1($val=false)
  {

    if($val) return number_format($this->loncentr1,2,',','.');
    else return $this->loncentr1;

  }
  
  public function getIniespbla($val=false)
  {

    if($val) return number_format($this->iniespbla,2,',','.');
    else return $this->iniespbla;

  }
  
  public function getLonespbla($val=false)
  {

    if($val) return number_format($this->lonespbla,2,',','.');
    else return $this->lonespbla;

  }
  
  public function getInicodba1($val=false)
  {

    if($val) return number_format($this->inicodba1,2,',','.');
    else return $this->inicodba1;

  }
  
  public function getLoncodba1($val=false)
  {

    if($val) return number_format($this->loncodba1,2,',','.');
    else return $this->loncodba1;

  }
  
  public function getInirifem1($val=false)
  {

    if($val) return number_format($this->inirifem1,2,',','.');
    else return $this->inirifem1;

  }
  
  public function getLonrifem1($val=false)
  {

    if($val) return number_format($this->lonrifem1,2,',','.');
    else return $this->lonrifem1;

  }
  
  public function getInitipnom($val=false)
  {

    if($val) return number_format($this->initipnom,2,',','.');
    else return $this->initipnom;

  }
  
  public function getLontipnom($val=false)
  {

    if($val) return number_format($this->lontipnom,2,',','.');
    else return $this->lontipnom;

  }
  
  public function getInitipre2($val=false)
  {

    if($val) return number_format($this->initipre2,2,',','.');
    else return $this->initipre2;

  }
  
  public function getLontipre2($val=false)
  {

    if($val) return number_format($this->lontipre2,2,',','.');
    else return $this->lontipre2;

  }
  
  public function getInitipdo2($val=false)
  {

    if($val) return number_format($this->initipdo2,2,',','.');
    else return $this->initipdo2;

  }
  
  public function getLontipdo2($val=false)
  {

    if($val) return number_format($this->lontipdo2,2,',','.');
    else return $this->lontipdo2;

  }
  
  public function getIninroced($val=false)
  {

    if($val) return number_format($this->ininroced,2,',','.');
    else return $this->ininroced;

  }
  
  public function getLonnroced($val=false)
  {

    if($val) return number_format($this->lonnroced,2,',','.');
    else return $this->lonnroced;

  }
  
  public function getInipriape($val=false)
  {

    if($val) return number_format($this->inipriape,2,',','.');
    else return $this->inipriape;

  }
  
  public function getLonpriape($val=false)
  {

    if($val) return number_format($this->lonpriape,2,',','.');
    else return $this->lonpriape;

  }
  
  public function getInifille2($val=false)
  {

    if($val) return number_format($this->inifille2,2,',','.');
    else return $this->inifille2;

  }
  
  public function getLonfille2($val=false)
  {

    if($val) return number_format($this->lonfille2,2,',','.');
    else return $this->lonfille2;

  }
  
  public function getInisegape($val=false)
  {

    if($val) return number_format($this->inisegape,2,',','.');
    else return $this->inisegape;

  }
  
  public function getLonsegape($val=false)
  {

    if($val) return number_format($this->lonsegape,2,',','.');
    else return $this->lonsegape;

  }
  
  public function getInifille3($val=false)
  {

    if($val) return number_format($this->inifille3,2,',','.');
    else return $this->inifille3;

  }
  
  public function getLonfille3($val=false)
  {

    if($val) return number_format($this->lonfille3,2,',','.');
    else return $this->lonfille3;

  }
  
  public function getIniprinom($val=false)
  {

    if($val) return number_format($this->iniprinom,2,',','.');
    else return $this->iniprinom;

  }
  
  public function getLonprinom($val=false)
  {

    if($val) return number_format($this->lonprinom,2,',','.');
    else return $this->lonprinom;

  }
  
  public function getInifille4($val=false)
  {

    if($val) return number_format($this->inifille4,2,',','.');
    else return $this->inifille4;

  }
  
  public function getLonfille4($val=false)
  {

    if($val) return number_format($this->lonfille4,2,',','.');
    else return $this->lonfille4;

  }
  
  public function getIniciudad($val=false)
  {

    if($val) return number_format($this->iniciudad,2,',','.');
    else return $this->iniciudad;

  }
  
  public function getLonciudad($val=false)
  {

    if($val) return number_format($this->lonciudad,2,',','.');
    else return $this->lonciudad;

  }
  
  public function getIniestado($val=false)
  {

    if($val) return number_format($this->iniestado,2,',','.');
    else return $this->iniestado;

  }
  
  public function getLonestado($val=false)
  {

    if($val) return number_format($this->lonestado,2,',','.');
    else return $this->lonestado;

  }
  
  public function getInicodofi($val=false)
  {

    if($val) return number_format($this->inicodofi,2,',','.');
    else return $this->inicodofi;

  }
  
  public function getLoncodofi($val=false)
  {

    if($val) return number_format($this->loncodofi,2,',','.');
    else return $this->loncodofi;

  }
  
  public function getInisexo($val=false)
  {

    if($val) return number_format($this->inisexo,2,',','.');
    else return $this->inisexo;

  }
  
  public function getLonsexo($val=false)
  {

    if($val) return number_format($this->lonsexo,2,',','.');
    else return $this->lonsexo;

  }
  
  public function getInicodare($val=false)
  {

    if($val) return number_format($this->inicodare,2,',','.');
    else return $this->inicodare;

  }
  
  public function getLoncodare($val=false)
  {

    if($val) return number_format($this->loncodare,2,',','.');
    else return $this->loncodare;

  }
  
  public function getIninumtel($val=false)
  {

    if($val) return number_format($this->ininumtel,2,',','.');
    else return $this->ininumtel;

  }
  
  public function getLonnumtel($val=false)
  {

    if($val) return number_format($this->lonnumtel,2,',','.');
    else return $this->lonnumtel;

  }
  
  public function getInidestel($val=false)
  {

    if($val) return number_format($this->inidestel,2,',','.');
    else return $this->inidestel;

  }
  
  public function getLondestel($val=false)
  {

    if($val) return number_format($this->londestel,2,',','.');
    else return $this->londestel;

  }
  
  public function getInifecnac($val=false)
  {

    if($val) return number_format($this->inifecnac,2,',','.');
    else return $this->inifecnac;

  }
  
  public function getLonfecnac($val=false)
  {

    if($val) return number_format($this->lonfecnac,2,',','.');
    else return $this->lonfecnac;

  }
  
  public function getInicodre2($val=false)
  {

    if($val) return number_format($this->inicodre2,2,',','.');
    else return $this->inicodre2;

  }
  
  public function getFincodre2($val=false)
  {

    if($val) return number_format($this->fincodre2,2,',','.');
    else return $this->fincodre2;

  }
  
  public function getInifille5($val=false)
  {

    if($val) return number_format($this->inifille5,2,',','.');
    else return $this->inifille5;

  }
  
  public function getLonfille5($val=false)
  {

    if($val) return number_format($this->lonfille5,2,',','.');
    else return $this->lonfille5;

  }
  
  public function getInipan($val=false)
  {

    if($val) return number_format($this->inipan,2,',','.');
    else return $this->inipan;

  }
  
  public function getLonpan($val=false)
  {

    if($val) return number_format($this->lonpan,2,',','.');
    else return $this->lonpan;

  }
  
  public function getInimotivo($val=false)
  {

    if($val) return number_format($this->inimotivo,2,',','.');
    else return $this->inimotivo;

  }
  
  public function getLonmotivo($val=false)
  {

    if($val) return number_format($this->lonmotivo,2,',','.');
    else return $this->lonmotivo;

  }
  
  public function getInilibre($val=false)
  {

    if($val) return number_format($this->inilibre,2,',','.');
    else return $this->inilibre;

  }
  
  public function getLonlibre($val=false)
  {

    if($val) return number_format($this->lonlibre,2,',','.');
    else return $this->lonlibre;

  }
  
  public function getInipannue($val=false)
  {

    if($val) return number_format($this->inipannue,2,',','.');
    else return $this->inipannue;

  }
  
  public function getLonpannue($val=false)
  {

    if($val) return number_format($this->lonpannue,2,',','.');
    else return $this->lonpannue;

  }
  
  public function getIniotrdat($val=false)
  {

    if($val) return number_format($this->iniotrdat,2,',','.');
    else return $this->iniotrdat;

  }
  
  public function getLonotrdat($val=false)
  {

    if($val) return number_format($this->lonotrdat,2,',','.');
    else return $this->lonotrdat;

  }
  
  public function getIniidere2($val=false)
  {

    if($val) return number_format($this->iniidere2,2,',','.');
    else return $this->iniidere2;

  }
  
  public function getLonidere2($val=false)
  {

    if($val) return number_format($this->lonidere2,2,',','.');
    else return $this->lonidere2;

  }
  
  public function getIninumtar($val=false)
  {

    if($val) return number_format($this->ininumtar,2,',','.');
    else return $this->ininumtar;

  }
  
  public function getLonnumtar($val=false)
  {

    if($val) return number_format($this->lonnumtar,2,',','.');
    else return $this->lonnumtar;

  }
  
  public function getInimontra($val=false)
  {

    if($val) return number_format($this->inimontra,2,',','.');
    else return $this->inimontra;

  }
  
  public function getLonmontra($val=false)
  {

    if($val) return number_format($this->lonmontra,2,',','.');
    else return $this->lonmontra;

  }
  
  public function getIninomben($val=false)
  {

    if($val) return number_format($this->ininomben,2,',','.');
    else return $this->ininomben;

  }
  
  public function getLonnomben($val=false)
  {

    if($val) return number_format($this->lonnomben,2,',','.');
    else return $this->lonnomben;

  }
  
  public function getInicentr2($val=false)
  {

    if($val) return number_format($this->inicentr2,2,',','.');
    else return $this->inicentr2;

  }
  
  public function getLoncentr2($val=false)
  {

    if($val) return number_format($this->loncentr2,2,',','.');
    else return $this->loncentr2;

  }
  
  public function getInicodba2($val=false)
  {

    if($val) return number_format($this->inicodba2,2,',','.');
    else return $this->inicodba2;

  }
  
  public function getLoncodba2($val=false)
  {

    if($val) return number_format($this->loncodba2,2,',','.');
    else return $this->loncodba2;

  }
  
  public function getIninumlo2($val=false)
  {

    if($val) return number_format($this->ininumlo2,2,',','.');
    else return $this->ininumlo2;

  }
  
  public function getFinnumlo2($val=false)
  {

    if($val) return number_format($this->finnumlo2,2,',','.');
    else return $this->finnumlo2;

  }
  
  public function getInirifem2($val=false)
  {

    if($val) return number_format($this->inirifem2,2,',','.');
    else return $this->inirifem2;

  }
  
  public function getLonrifem2($val=false)
  {

    if($val) return number_format($this->lonrifem2,2,',','.');
    else return $this->lonrifem2;

  }
  
  public function getInifille6($val=false)
  {

    if($val) return number_format($this->inifille6,2,',','.');
    else return $this->inifille6;

  }
  
  public function getLonfille6($val=false)
  {

    if($val) return number_format($this->lonfille6,2,',','.');
    else return $this->lonfille6;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTiptxt($v)
	{

    if ($this->tiptxt !== $v) {
        $this->tiptxt = $v;
        $this->modifiedColumns[] = NpconftxtcesticPeer::TIPTXT;
      }
  
	} 
	
	public function setInitipre1($v)
	{

    if ($this->initipre1 !== $v) {
        $this->initipre1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INITIPRE1;
      }
  
	} 
	
	public function setLontipre1($v)
	{

    if ($this->lontipre1 !== $v) {
        $this->lontipre1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONTIPRE1;
      }
  
	} 
	
	public function setInitipdo1($v)
	{

    if ($this->initipdo1 !== $v) {
        $this->initipdo1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INITIPDO1;
      }
  
	} 
	
	public function setLontipdo1($v)
	{

    if ($this->lontipdo1 !== $v) {
        $this->lontipdo1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONTIPDO1;
      }
  
	} 
	
	public function setIniideemp($v)
	{

    if ($this->iniideemp !== $v) {
        $this->iniideemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIIDEEMP;
      }
  
	} 
	
	public function setLonideemp($v)
	{

    if ($this->lonideemp !== $v) {
        $this->lonideemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONIDEEMP;
      }
  
	} 
	
	public function setIninumlo1($v)
	{

    if ($this->ininumlo1 !== $v) {
        $this->ininumlo1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::ININUMLO1;
      }
  
	} 
	
	public function setFinnumlo1($v)
	{

    if ($this->finnumlo1 !== $v) {
        $this->finnumlo1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINNUMLO1;
      }
  
	} 
	
	public function setIninomemp($v)
	{

    if ($this->ininomemp !== $v) {
        $this->ininomemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::ININOMEMP;
      }
  
	} 
	
	public function setFinnomemp($v)
	{

    if ($this->finnomemp !== $v) {
        $this->finnomemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINNOMEMP;
      }
  
	} 
	
	public function setInicanreg($v)
	{

    if ($this->inicanreg !== $v) {
        $this->inicanreg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INICANREG;
      }
  
	} 
	
	public function setFincanreg($v)
	{

    if ($this->fincanreg !== $v) {
        $this->fincanreg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINCANREG;
      }
  
	} 
	
	public function setInicodpla($v)
	{

    if ($this->inicodpla !== $v) {
        $this->inicodpla = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INICODPLA;
      }
  
	} 
	
	public function setFincodpla($v)
	{

    if ($this->fincodpla !== $v) {
        $this->fincodpla = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINCODPLA;
      }
  
	} 
	
	public function setInifecgen($v)
	{

    if ($this->inifecgen !== $v) {
        $this->inifecgen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIFECGEN;
      }
  
	} 
	
	public function setFinfecgen($v)
	{

    if ($this->finfecgen !== $v) {
        $this->finfecgen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINFECGEN;
      }
  
	} 
	
	public function setInihorgen($v)
	{

    if ($this->inihorgen !== $v) {
        $this->inihorgen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIHORGEN;
      }
  
	} 
	
	public function setFinhorgen($v)
	{

    if ($this->finhorgen !== $v) {
        $this->finhorgen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINHORGEN;
      }
  
	} 
	
	public function setInicodre1($v)
	{

    if ($this->inicodre1 !== $v) {
        $this->inicodre1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INICODRE1;
      }
  
	} 
	
	public function setFincodre1($v)
	{

    if ($this->fincodre1 !== $v) {
        $this->fincodre1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINCODRE1;
      }
  
	} 
	
	public function setIninomarc($v)
	{

    if ($this->ininomarc !== $v) {
        $this->ininomarc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::ININOMARC;
      }
  
	} 
	
	public function setFinnomarc($v)
	{

    if ($this->finnomarc !== $v) {
        $this->finnomarc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINNOMARC;
      }
  
	} 
	
	public function setInifille1($v)
	{

    if ($this->inifille1 !== $v) {
        $this->inifille1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIFILLE1;
      }
  
	} 
	
	public function setFinfille1($v)
	{

    if ($this->finfille1 !== $v) {
        $this->finfille1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINFILLE1;
      }
  
	} 
	
	public function setIniidere1($v)
	{

    if ($this->iniidere1 !== $v) {
        $this->iniidere1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIIDERE1;
      }
  
	} 
	
	public function setLonidere1($v)
	{

    if ($this->lonidere1 !== $v) {
        $this->lonidere1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONIDERE1;
      }
  
	} 
	
	public function setIninrocon($v)
	{

    if ($this->ininrocon !== $v) {
        $this->ininrocon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::ININROCON;
      }
  
	} 
	
	public function setFinnrocon($v)
	{

    if ($this->finnrocon !== $v) {
        $this->finnrocon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINNROCON;
      }
  
	} 
	
	public function setInifecefe($v)
	{

    if ($this->inifecefe !== $v) {
        $this->inifecefe = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIFECEFE;
      }
  
	} 
	
	public function setFinfecefe($v)
	{

    if ($this->finfecefe !== $v) {
        $this->finfecefe = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINFECEFE;
      }
  
	} 
	
	public function setInimontot($v)
	{

    if ($this->inimontot !== $v) {
        $this->inimontot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIMONTOT;
      }
  
	} 
	
	public function setFinmontot($v)
	{

    if ($this->finmontot !== $v) {
        $this->finmontot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINMONTOT;
      }
  
	} 
	
	public function setInicentr1($v)
	{

    if ($this->inicentr1 !== $v) {
        $this->inicentr1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INICENTR1;
      }
  
	} 
	
	public function setLoncentr1($v)
	{

    if ($this->loncentr1 !== $v) {
        $this->loncentr1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONCENTR1;
      }
  
	} 
	
	public function setIniespbla($v)
	{

    if ($this->iniespbla !== $v) {
        $this->iniespbla = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIESPBLA;
      }
  
	} 
	
	public function setLonespbla($v)
	{

    if ($this->lonespbla !== $v) {
        $this->lonespbla = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONESPBLA;
      }
  
	} 
	
	public function setInicodba1($v)
	{

    if ($this->inicodba1 !== $v) {
        $this->inicodba1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INICODBA1;
      }
  
	} 
	
	public function setLoncodba1($v)
	{

    if ($this->loncodba1 !== $v) {
        $this->loncodba1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONCODBA1;
      }
  
	} 
	
	public function setInirifem1($v)
	{

    if ($this->inirifem1 !== $v) {
        $this->inirifem1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIRIFEM1;
      }
  
	} 
	
	public function setLonrifem1($v)
	{

    if ($this->lonrifem1 !== $v) {
        $this->lonrifem1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONRIFEM1;
      }
  
	} 
	
	public function setInitipnom($v)
	{

    if ($this->initipnom !== $v) {
        $this->initipnom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INITIPNOM;
      }
  
	} 
	
	public function setLontipnom($v)
	{

    if ($this->lontipnom !== $v) {
        $this->lontipnom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONTIPNOM;
      }
  
	} 
	
	public function setInitipre2($v)
	{

    if ($this->initipre2 !== $v) {
        $this->initipre2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INITIPRE2;
      }
  
	} 
	
	public function setLontipre2($v)
	{

    if ($this->lontipre2 !== $v) {
        $this->lontipre2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONTIPRE2;
      }
  
	} 
	
	public function setInitipdo2($v)
	{

    if ($this->initipdo2 !== $v) {
        $this->initipdo2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INITIPDO2;
      }
  
	} 
	
	public function setLontipdo2($v)
	{

    if ($this->lontipdo2 !== $v) {
        $this->lontipdo2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONTIPDO2;
      }
  
	} 
	
	public function setIninroced($v)
	{

    if ($this->ininroced !== $v) {
        $this->ininroced = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::ININROCED;
      }
  
	} 
	
	public function setLonnroced($v)
	{

    if ($this->lonnroced !== $v) {
        $this->lonnroced = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONNROCED;
      }
  
	} 
	
	public function setInipriape($v)
	{

    if ($this->inipriape !== $v) {
        $this->inipriape = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIPRIAPE;
      }
  
	} 
	
	public function setLonpriape($v)
	{

    if ($this->lonpriape !== $v) {
        $this->lonpriape = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONPRIAPE;
      }
  
	} 
	
	public function setInifille2($v)
	{

    if ($this->inifille2 !== $v) {
        $this->inifille2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIFILLE2;
      }
  
	} 
	
	public function setLonfille2($v)
	{

    if ($this->lonfille2 !== $v) {
        $this->lonfille2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONFILLE2;
      }
  
	} 
	
	public function setInisegape($v)
	{

    if ($this->inisegape !== $v) {
        $this->inisegape = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INISEGAPE;
      }
  
	} 
	
	public function setLonsegape($v)
	{

    if ($this->lonsegape !== $v) {
        $this->lonsegape = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONSEGAPE;
      }
  
	} 
	
	public function setInifille3($v)
	{

    if ($this->inifille3 !== $v) {
        $this->inifille3 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIFILLE3;
      }
  
	} 
	
	public function setLonfille3($v)
	{

    if ($this->lonfille3 !== $v) {
        $this->lonfille3 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONFILLE3;
      }
  
	} 
	
	public function setIniprinom($v)
	{

    if ($this->iniprinom !== $v) {
        $this->iniprinom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIPRINOM;
      }
  
	} 
	
	public function setLonprinom($v)
	{

    if ($this->lonprinom !== $v) {
        $this->lonprinom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONPRINOM;
      }
  
	} 
	
	public function setInifille4($v)
	{

    if ($this->inifille4 !== $v) {
        $this->inifille4 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIFILLE4;
      }
  
	} 
	
	public function setLonfille4($v)
	{

    if ($this->lonfille4 !== $v) {
        $this->lonfille4 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONFILLE4;
      }
  
	} 
	
	public function setIniciudad($v)
	{

    if ($this->iniciudad !== $v) {
        $this->iniciudad = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INICIUDAD;
      }
  
	} 
	
	public function setLonciudad($v)
	{

    if ($this->lonciudad !== $v) {
        $this->lonciudad = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONCIUDAD;
      }
  
	} 
	
	public function setIniestado($v)
	{

    if ($this->iniestado !== $v) {
        $this->iniestado = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIESTADO;
      }
  
	} 
	
	public function setLonestado($v)
	{

    if ($this->lonestado !== $v) {
        $this->lonestado = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONESTADO;
      }
  
	} 
	
	public function setInicodofi($v)
	{

    if ($this->inicodofi !== $v) {
        $this->inicodofi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INICODOFI;
      }
  
	} 
	
	public function setLoncodofi($v)
	{

    if ($this->loncodofi !== $v) {
        $this->loncodofi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONCODOFI;
      }
  
	} 
	
	public function setInisexo($v)
	{

    if ($this->inisexo !== $v) {
        $this->inisexo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INISEXO;
      }
  
	} 
	
	public function setLonsexo($v)
	{

    if ($this->lonsexo !== $v) {
        $this->lonsexo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONSEXO;
      }
  
	} 
	
	public function setInicodare($v)
	{

    if ($this->inicodare !== $v) {
        $this->inicodare = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INICODARE;
      }
  
	} 
	
	public function setLoncodare($v)
	{

    if ($this->loncodare !== $v) {
        $this->loncodare = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONCODARE;
      }
  
	} 
	
	public function setIninumtel($v)
	{

    if ($this->ininumtel !== $v) {
        $this->ininumtel = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::ININUMTEL;
      }
  
	} 
	
	public function setLonnumtel($v)
	{

    if ($this->lonnumtel !== $v) {
        $this->lonnumtel = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONNUMTEL;
      }
  
	} 
	
	public function setInidestel($v)
	{

    if ($this->inidestel !== $v) {
        $this->inidestel = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIDESTEL;
      }
  
	} 
	
	public function setLondestel($v)
	{

    if ($this->londestel !== $v) {
        $this->londestel = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONDESTEL;
      }
  
	} 
	
	public function setInifecnac($v)
	{

    if ($this->inifecnac !== $v) {
        $this->inifecnac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIFECNAC;
      }
  
	} 
	
	public function setLonfecnac($v)
	{

    if ($this->lonfecnac !== $v) {
        $this->lonfecnac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONFECNAC;
      }
  
	} 
	
	public function setInicodre2($v)
	{

    if ($this->inicodre2 !== $v) {
        $this->inicodre2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INICODRE2;
      }
  
	} 
	
	public function setFincodre2($v)
	{

    if ($this->fincodre2 !== $v) {
        $this->fincodre2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINCODRE2;
      }
  
	} 
	
	public function setInifille5($v)
	{

    if ($this->inifille5 !== $v) {
        $this->inifille5 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIFILLE5;
      }
  
	} 
	
	public function setLonfille5($v)
	{

    if ($this->lonfille5 !== $v) {
        $this->lonfille5 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONFILLE5;
      }
  
	} 
	
	public function setInipan($v)
	{

    if ($this->inipan !== $v) {
        $this->inipan = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIPAN;
      }
  
	} 
	
	public function setLonpan($v)
	{

    if ($this->lonpan !== $v) {
        $this->lonpan = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONPAN;
      }
  
	} 
	
	public function setInimotivo($v)
	{

    if ($this->inimotivo !== $v) {
        $this->inimotivo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIMOTIVO;
      }
  
	} 
	
	public function setLonmotivo($v)
	{

    if ($this->lonmotivo !== $v) {
        $this->lonmotivo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONMOTIVO;
      }
  
	} 
	
	public function setInilibre($v)
	{

    if ($this->inilibre !== $v) {
        $this->inilibre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INILIBRE;
      }
  
	} 
	
	public function setLonlibre($v)
	{

    if ($this->lonlibre !== $v) {
        $this->lonlibre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONLIBRE;
      }
  
	} 
	
	public function setInipannue($v)
	{

    if ($this->inipannue !== $v) {
        $this->inipannue = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIPANNUE;
      }
  
	} 
	
	public function setLonpannue($v)
	{

    if ($this->lonpannue !== $v) {
        $this->lonpannue = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONPANNUE;
      }
  
	} 
	
	public function setIniotrdat($v)
	{

    if ($this->iniotrdat !== $v) {
        $this->iniotrdat = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIOTRDAT;
      }
  
	} 
	
	public function setLonotrdat($v)
	{

    if ($this->lonotrdat !== $v) {
        $this->lonotrdat = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONOTRDAT;
      }
  
	} 
	
	public function setIniidere2($v)
	{

    if ($this->iniidere2 !== $v) {
        $this->iniidere2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIIDERE2;
      }
  
	} 
	
	public function setLonidere2($v)
	{

    if ($this->lonidere2 !== $v) {
        $this->lonidere2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONIDERE2;
      }
  
	} 
	
	public function setIninumtar($v)
	{

    if ($this->ininumtar !== $v) {
        $this->ininumtar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::ININUMTAR;
      }
  
	} 
	
	public function setLonnumtar($v)
	{

    if ($this->lonnumtar !== $v) {
        $this->lonnumtar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONNUMTAR;
      }
  
	} 
	
	public function setInimontra($v)
	{

    if ($this->inimontra !== $v) {
        $this->inimontra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIMONTRA;
      }
  
	} 
	
	public function setLonmontra($v)
	{

    if ($this->lonmontra !== $v) {
        $this->lonmontra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONMONTRA;
      }
  
	} 
	
	public function setIninomben($v)
	{

    if ($this->ininomben !== $v) {
        $this->ininomben = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::ININOMBEN;
      }
  
	} 
	
	public function setLonnomben($v)
	{

    if ($this->lonnomben !== $v) {
        $this->lonnomben = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONNOMBEN;
      }
  
	} 
	
	public function setInicentr2($v)
	{

    if ($this->inicentr2 !== $v) {
        $this->inicentr2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INICENTR2;
      }
  
	} 
	
	public function setLoncentr2($v)
	{

    if ($this->loncentr2 !== $v) {
        $this->loncentr2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONCENTR2;
      }
  
	} 
	
	public function setInicodba2($v)
	{

    if ($this->inicodba2 !== $v) {
        $this->inicodba2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INICODBA2;
      }
  
	} 
	
	public function setLoncodba2($v)
	{

    if ($this->loncodba2 !== $v) {
        $this->loncodba2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONCODBA2;
      }
  
	} 
	
	public function setIninumlo2($v)
	{

    if ($this->ininumlo2 !== $v) {
        $this->ininumlo2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::ININUMLO2;
      }
  
	} 
	
	public function setFinnumlo2($v)
	{

    if ($this->finnumlo2 !== $v) {
        $this->finnumlo2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::FINNUMLO2;
      }
  
	} 
	
	public function setInirifem2($v)
	{

    if ($this->inirifem2 !== $v) {
        $this->inirifem2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIRIFEM2;
      }
  
	} 
	
	public function setLonrifem2($v)
	{

    if ($this->lonrifem2 !== $v) {
        $this->lonrifem2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONRIFEM2;
      }
  
	} 
	
	public function setInifille6($v)
	{

    if ($this->inifille6 !== $v) {
        $this->inifille6 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::INIFILLE6;
      }
  
	} 
	
	public function setLonfille6($v)
	{

    if ($this->lonfille6 !== $v) {
        $this->lonfille6 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpconftxtcesticPeer::LONFILLE6;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpconftxtcesticPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tiptxt = $rs->getString($startcol + 0);

      $this->initipre1 = $rs->getFloat($startcol + 1);

      $this->lontipre1 = $rs->getFloat($startcol + 2);

      $this->initipdo1 = $rs->getFloat($startcol + 3);

      $this->lontipdo1 = $rs->getFloat($startcol + 4);

      $this->iniideemp = $rs->getFloat($startcol + 5);

      $this->lonideemp = $rs->getFloat($startcol + 6);

      $this->ininumlo1 = $rs->getFloat($startcol + 7);

      $this->finnumlo1 = $rs->getFloat($startcol + 8);

      $this->ininomemp = $rs->getFloat($startcol + 9);

      $this->finnomemp = $rs->getFloat($startcol + 10);

      $this->inicanreg = $rs->getFloat($startcol + 11);

      $this->fincanreg = $rs->getFloat($startcol + 12);

      $this->inicodpla = $rs->getFloat($startcol + 13);

      $this->fincodpla = $rs->getFloat($startcol + 14);

      $this->inifecgen = $rs->getFloat($startcol + 15);

      $this->finfecgen = $rs->getFloat($startcol + 16);

      $this->inihorgen = $rs->getFloat($startcol + 17);

      $this->finhorgen = $rs->getFloat($startcol + 18);

      $this->inicodre1 = $rs->getFloat($startcol + 19);

      $this->fincodre1 = $rs->getFloat($startcol + 20);

      $this->ininomarc = $rs->getFloat($startcol + 21);

      $this->finnomarc = $rs->getFloat($startcol + 22);

      $this->inifille1 = $rs->getFloat($startcol + 23);

      $this->finfille1 = $rs->getFloat($startcol + 24);

      $this->iniidere1 = $rs->getFloat($startcol + 25);

      $this->lonidere1 = $rs->getFloat($startcol + 26);

      $this->ininrocon = $rs->getFloat($startcol + 27);

      $this->finnrocon = $rs->getFloat($startcol + 28);

      $this->inifecefe = $rs->getFloat($startcol + 29);

      $this->finfecefe = $rs->getFloat($startcol + 30);

      $this->inimontot = $rs->getFloat($startcol + 31);

      $this->finmontot = $rs->getFloat($startcol + 32);

      $this->inicentr1 = $rs->getFloat($startcol + 33);

      $this->loncentr1 = $rs->getFloat($startcol + 34);

      $this->iniespbla = $rs->getFloat($startcol + 35);

      $this->lonespbla = $rs->getFloat($startcol + 36);

      $this->inicodba1 = $rs->getFloat($startcol + 37);

      $this->loncodba1 = $rs->getFloat($startcol + 38);

      $this->inirifem1 = $rs->getFloat($startcol + 39);

      $this->lonrifem1 = $rs->getFloat($startcol + 40);

      $this->initipnom = $rs->getFloat($startcol + 41);

      $this->lontipnom = $rs->getFloat($startcol + 42);

      $this->initipre2 = $rs->getFloat($startcol + 43);

      $this->lontipre2 = $rs->getFloat($startcol + 44);

      $this->initipdo2 = $rs->getFloat($startcol + 45);

      $this->lontipdo2 = $rs->getFloat($startcol + 46);

      $this->ininroced = $rs->getFloat($startcol + 47);

      $this->lonnroced = $rs->getFloat($startcol + 48);

      $this->inipriape = $rs->getFloat($startcol + 49);

      $this->lonpriape = $rs->getFloat($startcol + 50);

      $this->inifille2 = $rs->getFloat($startcol + 51);

      $this->lonfille2 = $rs->getFloat($startcol + 52);

      $this->inisegape = $rs->getFloat($startcol + 53);

      $this->lonsegape = $rs->getFloat($startcol + 54);

      $this->inifille3 = $rs->getFloat($startcol + 55);

      $this->lonfille3 = $rs->getFloat($startcol + 56);

      $this->iniprinom = $rs->getFloat($startcol + 57);

      $this->lonprinom = $rs->getFloat($startcol + 58);

      $this->inifille4 = $rs->getFloat($startcol + 59);

      $this->lonfille4 = $rs->getFloat($startcol + 60);

      $this->iniciudad = $rs->getFloat($startcol + 61);

      $this->lonciudad = $rs->getFloat($startcol + 62);

      $this->iniestado = $rs->getFloat($startcol + 63);

      $this->lonestado = $rs->getFloat($startcol + 64);

      $this->inicodofi = $rs->getFloat($startcol + 65);

      $this->loncodofi = $rs->getFloat($startcol + 66);

      $this->inisexo = $rs->getFloat($startcol + 67);

      $this->lonsexo = $rs->getFloat($startcol + 68);

      $this->inicodare = $rs->getFloat($startcol + 69);

      $this->loncodare = $rs->getFloat($startcol + 70);

      $this->ininumtel = $rs->getFloat($startcol + 71);

      $this->lonnumtel = $rs->getFloat($startcol + 72);

      $this->inidestel = $rs->getFloat($startcol + 73);

      $this->londestel = $rs->getFloat($startcol + 74);

      $this->inifecnac = $rs->getFloat($startcol + 75);

      $this->lonfecnac = $rs->getFloat($startcol + 76);

      $this->inicodre2 = $rs->getFloat($startcol + 77);

      $this->fincodre2 = $rs->getFloat($startcol + 78);

      $this->inifille5 = $rs->getFloat($startcol + 79);

      $this->lonfille5 = $rs->getFloat($startcol + 80);

      $this->inipan = $rs->getFloat($startcol + 81);

      $this->lonpan = $rs->getFloat($startcol + 82);

      $this->inimotivo = $rs->getFloat($startcol + 83);

      $this->lonmotivo = $rs->getFloat($startcol + 84);

      $this->inilibre = $rs->getFloat($startcol + 85);

      $this->lonlibre = $rs->getFloat($startcol + 86);

      $this->inipannue = $rs->getFloat($startcol + 87);

      $this->lonpannue = $rs->getFloat($startcol + 88);

      $this->iniotrdat = $rs->getFloat($startcol + 89);

      $this->lonotrdat = $rs->getFloat($startcol + 90);

      $this->iniidere2 = $rs->getFloat($startcol + 91);

      $this->lonidere2 = $rs->getFloat($startcol + 92);

      $this->ininumtar = $rs->getFloat($startcol + 93);

      $this->lonnumtar = $rs->getFloat($startcol + 94);

      $this->inimontra = $rs->getFloat($startcol + 95);

      $this->lonmontra = $rs->getFloat($startcol + 96);

      $this->ininomben = $rs->getFloat($startcol + 97);

      $this->lonnomben = $rs->getFloat($startcol + 98);

      $this->inicentr2 = $rs->getFloat($startcol + 99);

      $this->loncentr2 = $rs->getFloat($startcol + 100);

      $this->inicodba2 = $rs->getFloat($startcol + 101);

      $this->loncodba2 = $rs->getFloat($startcol + 102);

      $this->ininumlo2 = $rs->getFloat($startcol + 103);

      $this->finnumlo2 = $rs->getFloat($startcol + 104);

      $this->inirifem2 = $rs->getFloat($startcol + 105);

      $this->lonrifem2 = $rs->getFloat($startcol + 106);

      $this->inifille6 = $rs->getFloat($startcol + 107);

      $this->lonfille6 = $rs->getFloat($startcol + 108);

      $this->id = $rs->getInt($startcol + 109);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 110; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npconftxtcestic object", $e);
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
			$con = Propel::getConnection(NpconftxtcesticPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpconftxtcesticPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpconftxtcesticPeer::DATABASE_NAME);
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
					$pk = NpconftxtcesticPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpconftxtcesticPeer::doUpdate($this, $con);
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


			if (($retval = NpconftxtcesticPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpconftxtcesticPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTiptxt();
				break;
			case 1:
				return $this->getInitipre1();
				break;
			case 2:
				return $this->getLontipre1();
				break;
			case 3:
				return $this->getInitipdo1();
				break;
			case 4:
				return $this->getLontipdo1();
				break;
			case 5:
				return $this->getIniideemp();
				break;
			case 6:
				return $this->getLonideemp();
				break;
			case 7:
				return $this->getIninumlo1();
				break;
			case 8:
				return $this->getFinnumlo1();
				break;
			case 9:
				return $this->getIninomemp();
				break;
			case 10:
				return $this->getFinnomemp();
				break;
			case 11:
				return $this->getInicanreg();
				break;
			case 12:
				return $this->getFincanreg();
				break;
			case 13:
				return $this->getInicodpla();
				break;
			case 14:
				return $this->getFincodpla();
				break;
			case 15:
				return $this->getInifecgen();
				break;
			case 16:
				return $this->getFinfecgen();
				break;
			case 17:
				return $this->getInihorgen();
				break;
			case 18:
				return $this->getFinhorgen();
				break;
			case 19:
				return $this->getInicodre1();
				break;
			case 20:
				return $this->getFincodre1();
				break;
			case 21:
				return $this->getIninomarc();
				break;
			case 22:
				return $this->getFinnomarc();
				break;
			case 23:
				return $this->getInifille1();
				break;
			case 24:
				return $this->getFinfille1();
				break;
			case 25:
				return $this->getIniidere1();
				break;
			case 26:
				return $this->getLonidere1();
				break;
			case 27:
				return $this->getIninrocon();
				break;
			case 28:
				return $this->getFinnrocon();
				break;
			case 29:
				return $this->getInifecefe();
				break;
			case 30:
				return $this->getFinfecefe();
				break;
			case 31:
				return $this->getInimontot();
				break;
			case 32:
				return $this->getFinmontot();
				break;
			case 33:
				return $this->getInicentr1();
				break;
			case 34:
				return $this->getLoncentr1();
				break;
			case 35:
				return $this->getIniespbla();
				break;
			case 36:
				return $this->getLonespbla();
				break;
			case 37:
				return $this->getInicodba1();
				break;
			case 38:
				return $this->getLoncodba1();
				break;
			case 39:
				return $this->getInirifem1();
				break;
			case 40:
				return $this->getLonrifem1();
				break;
			case 41:
				return $this->getInitipnom();
				break;
			case 42:
				return $this->getLontipnom();
				break;
			case 43:
				return $this->getInitipre2();
				break;
			case 44:
				return $this->getLontipre2();
				break;
			case 45:
				return $this->getInitipdo2();
				break;
			case 46:
				return $this->getLontipdo2();
				break;
			case 47:
				return $this->getIninroced();
				break;
			case 48:
				return $this->getLonnroced();
				break;
			case 49:
				return $this->getInipriape();
				break;
			case 50:
				return $this->getLonpriape();
				break;
			case 51:
				return $this->getInifille2();
				break;
			case 52:
				return $this->getLonfille2();
				break;
			case 53:
				return $this->getInisegape();
				break;
			case 54:
				return $this->getLonsegape();
				break;
			case 55:
				return $this->getInifille3();
				break;
			case 56:
				return $this->getLonfille3();
				break;
			case 57:
				return $this->getIniprinom();
				break;
			case 58:
				return $this->getLonprinom();
				break;
			case 59:
				return $this->getInifille4();
				break;
			case 60:
				return $this->getLonfille4();
				break;
			case 61:
				return $this->getIniciudad();
				break;
			case 62:
				return $this->getLonciudad();
				break;
			case 63:
				return $this->getIniestado();
				break;
			case 64:
				return $this->getLonestado();
				break;
			case 65:
				return $this->getInicodofi();
				break;
			case 66:
				return $this->getLoncodofi();
				break;
			case 67:
				return $this->getInisexo();
				break;
			case 68:
				return $this->getLonsexo();
				break;
			case 69:
				return $this->getInicodare();
				break;
			case 70:
				return $this->getLoncodare();
				break;
			case 71:
				return $this->getIninumtel();
				break;
			case 72:
				return $this->getLonnumtel();
				break;
			case 73:
				return $this->getInidestel();
				break;
			case 74:
				return $this->getLondestel();
				break;
			case 75:
				return $this->getInifecnac();
				break;
			case 76:
				return $this->getLonfecnac();
				break;
			case 77:
				return $this->getInicodre2();
				break;
			case 78:
				return $this->getFincodre2();
				break;
			case 79:
				return $this->getInifille5();
				break;
			case 80:
				return $this->getLonfille5();
				break;
			case 81:
				return $this->getInipan();
				break;
			case 82:
				return $this->getLonpan();
				break;
			case 83:
				return $this->getInimotivo();
				break;
			case 84:
				return $this->getLonmotivo();
				break;
			case 85:
				return $this->getInilibre();
				break;
			case 86:
				return $this->getLonlibre();
				break;
			case 87:
				return $this->getInipannue();
				break;
			case 88:
				return $this->getLonpannue();
				break;
			case 89:
				return $this->getIniotrdat();
				break;
			case 90:
				return $this->getLonotrdat();
				break;
			case 91:
				return $this->getIniidere2();
				break;
			case 92:
				return $this->getLonidere2();
				break;
			case 93:
				return $this->getIninumtar();
				break;
			case 94:
				return $this->getLonnumtar();
				break;
			case 95:
				return $this->getInimontra();
				break;
			case 96:
				return $this->getLonmontra();
				break;
			case 97:
				return $this->getIninomben();
				break;
			case 98:
				return $this->getLonnomben();
				break;
			case 99:
				return $this->getInicentr2();
				break;
			case 100:
				return $this->getLoncentr2();
				break;
			case 101:
				return $this->getInicodba2();
				break;
			case 102:
				return $this->getLoncodba2();
				break;
			case 103:
				return $this->getIninumlo2();
				break;
			case 104:
				return $this->getFinnumlo2();
				break;
			case 105:
				return $this->getInirifem2();
				break;
			case 106:
				return $this->getLonrifem2();
				break;
			case 107:
				return $this->getInifille6();
				break;
			case 108:
				return $this->getLonfille6();
				break;
			case 109:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpconftxtcesticPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTiptxt(),
			$keys[1] => $this->getInitipre1(),
			$keys[2] => $this->getLontipre1(),
			$keys[3] => $this->getInitipdo1(),
			$keys[4] => $this->getLontipdo1(),
			$keys[5] => $this->getIniideemp(),
			$keys[6] => $this->getLonideemp(),
			$keys[7] => $this->getIninumlo1(),
			$keys[8] => $this->getFinnumlo1(),
			$keys[9] => $this->getIninomemp(),
			$keys[10] => $this->getFinnomemp(),
			$keys[11] => $this->getInicanreg(),
			$keys[12] => $this->getFincanreg(),
			$keys[13] => $this->getInicodpla(),
			$keys[14] => $this->getFincodpla(),
			$keys[15] => $this->getInifecgen(),
			$keys[16] => $this->getFinfecgen(),
			$keys[17] => $this->getInihorgen(),
			$keys[18] => $this->getFinhorgen(),
			$keys[19] => $this->getInicodre1(),
			$keys[20] => $this->getFincodre1(),
			$keys[21] => $this->getIninomarc(),
			$keys[22] => $this->getFinnomarc(),
			$keys[23] => $this->getInifille1(),
			$keys[24] => $this->getFinfille1(),
			$keys[25] => $this->getIniidere1(),
			$keys[26] => $this->getLonidere1(),
			$keys[27] => $this->getIninrocon(),
			$keys[28] => $this->getFinnrocon(),
			$keys[29] => $this->getInifecefe(),
			$keys[30] => $this->getFinfecefe(),
			$keys[31] => $this->getInimontot(),
			$keys[32] => $this->getFinmontot(),
			$keys[33] => $this->getInicentr1(),
			$keys[34] => $this->getLoncentr1(),
			$keys[35] => $this->getIniespbla(),
			$keys[36] => $this->getLonespbla(),
			$keys[37] => $this->getInicodba1(),
			$keys[38] => $this->getLoncodba1(),
			$keys[39] => $this->getInirifem1(),
			$keys[40] => $this->getLonrifem1(),
			$keys[41] => $this->getInitipnom(),
			$keys[42] => $this->getLontipnom(),
			$keys[43] => $this->getInitipre2(),
			$keys[44] => $this->getLontipre2(),
			$keys[45] => $this->getInitipdo2(),
			$keys[46] => $this->getLontipdo2(),
			$keys[47] => $this->getIninroced(),
			$keys[48] => $this->getLonnroced(),
			$keys[49] => $this->getInipriape(),
			$keys[50] => $this->getLonpriape(),
			$keys[51] => $this->getInifille2(),
			$keys[52] => $this->getLonfille2(),
			$keys[53] => $this->getInisegape(),
			$keys[54] => $this->getLonsegape(),
			$keys[55] => $this->getInifille3(),
			$keys[56] => $this->getLonfille3(),
			$keys[57] => $this->getIniprinom(),
			$keys[58] => $this->getLonprinom(),
			$keys[59] => $this->getInifille4(),
			$keys[60] => $this->getLonfille4(),
			$keys[61] => $this->getIniciudad(),
			$keys[62] => $this->getLonciudad(),
			$keys[63] => $this->getIniestado(),
			$keys[64] => $this->getLonestado(),
			$keys[65] => $this->getInicodofi(),
			$keys[66] => $this->getLoncodofi(),
			$keys[67] => $this->getInisexo(),
			$keys[68] => $this->getLonsexo(),
			$keys[69] => $this->getInicodare(),
			$keys[70] => $this->getLoncodare(),
			$keys[71] => $this->getIninumtel(),
			$keys[72] => $this->getLonnumtel(),
			$keys[73] => $this->getInidestel(),
			$keys[74] => $this->getLondestel(),
			$keys[75] => $this->getInifecnac(),
			$keys[76] => $this->getLonfecnac(),
			$keys[77] => $this->getInicodre2(),
			$keys[78] => $this->getFincodre2(),
			$keys[79] => $this->getInifille5(),
			$keys[80] => $this->getLonfille5(),
			$keys[81] => $this->getInipan(),
			$keys[82] => $this->getLonpan(),
			$keys[83] => $this->getInimotivo(),
			$keys[84] => $this->getLonmotivo(),
			$keys[85] => $this->getInilibre(),
			$keys[86] => $this->getLonlibre(),
			$keys[87] => $this->getInipannue(),
			$keys[88] => $this->getLonpannue(),
			$keys[89] => $this->getIniotrdat(),
			$keys[90] => $this->getLonotrdat(),
			$keys[91] => $this->getIniidere2(),
			$keys[92] => $this->getLonidere2(),
			$keys[93] => $this->getIninumtar(),
			$keys[94] => $this->getLonnumtar(),
			$keys[95] => $this->getInimontra(),
			$keys[96] => $this->getLonmontra(),
			$keys[97] => $this->getIninomben(),
			$keys[98] => $this->getLonnomben(),
			$keys[99] => $this->getInicentr2(),
			$keys[100] => $this->getLoncentr2(),
			$keys[101] => $this->getInicodba2(),
			$keys[102] => $this->getLoncodba2(),
			$keys[103] => $this->getIninumlo2(),
			$keys[104] => $this->getFinnumlo2(),
			$keys[105] => $this->getInirifem2(),
			$keys[106] => $this->getLonrifem2(),
			$keys[107] => $this->getInifille6(),
			$keys[108] => $this->getLonfille6(),
			$keys[109] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpconftxtcesticPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTiptxt($value);
				break;
			case 1:
				$this->setInitipre1($value);
				break;
			case 2:
				$this->setLontipre1($value);
				break;
			case 3:
				$this->setInitipdo1($value);
				break;
			case 4:
				$this->setLontipdo1($value);
				break;
			case 5:
				$this->setIniideemp($value);
				break;
			case 6:
				$this->setLonideemp($value);
				break;
			case 7:
				$this->setIninumlo1($value);
				break;
			case 8:
				$this->setFinnumlo1($value);
				break;
			case 9:
				$this->setIninomemp($value);
				break;
			case 10:
				$this->setFinnomemp($value);
				break;
			case 11:
				$this->setInicanreg($value);
				break;
			case 12:
				$this->setFincanreg($value);
				break;
			case 13:
				$this->setInicodpla($value);
				break;
			case 14:
				$this->setFincodpla($value);
				break;
			case 15:
				$this->setInifecgen($value);
				break;
			case 16:
				$this->setFinfecgen($value);
				break;
			case 17:
				$this->setInihorgen($value);
				break;
			case 18:
				$this->setFinhorgen($value);
				break;
			case 19:
				$this->setInicodre1($value);
				break;
			case 20:
				$this->setFincodre1($value);
				break;
			case 21:
				$this->setIninomarc($value);
				break;
			case 22:
				$this->setFinnomarc($value);
				break;
			case 23:
				$this->setInifille1($value);
				break;
			case 24:
				$this->setFinfille1($value);
				break;
			case 25:
				$this->setIniidere1($value);
				break;
			case 26:
				$this->setLonidere1($value);
				break;
			case 27:
				$this->setIninrocon($value);
				break;
			case 28:
				$this->setFinnrocon($value);
				break;
			case 29:
				$this->setInifecefe($value);
				break;
			case 30:
				$this->setFinfecefe($value);
				break;
			case 31:
				$this->setInimontot($value);
				break;
			case 32:
				$this->setFinmontot($value);
				break;
			case 33:
				$this->setInicentr1($value);
				break;
			case 34:
				$this->setLoncentr1($value);
				break;
			case 35:
				$this->setIniespbla($value);
				break;
			case 36:
				$this->setLonespbla($value);
				break;
			case 37:
				$this->setInicodba1($value);
				break;
			case 38:
				$this->setLoncodba1($value);
				break;
			case 39:
				$this->setInirifem1($value);
				break;
			case 40:
				$this->setLonrifem1($value);
				break;
			case 41:
				$this->setInitipnom($value);
				break;
			case 42:
				$this->setLontipnom($value);
				break;
			case 43:
				$this->setInitipre2($value);
				break;
			case 44:
				$this->setLontipre2($value);
				break;
			case 45:
				$this->setInitipdo2($value);
				break;
			case 46:
				$this->setLontipdo2($value);
				break;
			case 47:
				$this->setIninroced($value);
				break;
			case 48:
				$this->setLonnroced($value);
				break;
			case 49:
				$this->setInipriape($value);
				break;
			case 50:
				$this->setLonpriape($value);
				break;
			case 51:
				$this->setInifille2($value);
				break;
			case 52:
				$this->setLonfille2($value);
				break;
			case 53:
				$this->setInisegape($value);
				break;
			case 54:
				$this->setLonsegape($value);
				break;
			case 55:
				$this->setInifille3($value);
				break;
			case 56:
				$this->setLonfille3($value);
				break;
			case 57:
				$this->setIniprinom($value);
				break;
			case 58:
				$this->setLonprinom($value);
				break;
			case 59:
				$this->setInifille4($value);
				break;
			case 60:
				$this->setLonfille4($value);
				break;
			case 61:
				$this->setIniciudad($value);
				break;
			case 62:
				$this->setLonciudad($value);
				break;
			case 63:
				$this->setIniestado($value);
				break;
			case 64:
				$this->setLonestado($value);
				break;
			case 65:
				$this->setInicodofi($value);
				break;
			case 66:
				$this->setLoncodofi($value);
				break;
			case 67:
				$this->setInisexo($value);
				break;
			case 68:
				$this->setLonsexo($value);
				break;
			case 69:
				$this->setInicodare($value);
				break;
			case 70:
				$this->setLoncodare($value);
				break;
			case 71:
				$this->setIninumtel($value);
				break;
			case 72:
				$this->setLonnumtel($value);
				break;
			case 73:
				$this->setInidestel($value);
				break;
			case 74:
				$this->setLondestel($value);
				break;
			case 75:
				$this->setInifecnac($value);
				break;
			case 76:
				$this->setLonfecnac($value);
				break;
			case 77:
				$this->setInicodre2($value);
				break;
			case 78:
				$this->setFincodre2($value);
				break;
			case 79:
				$this->setInifille5($value);
				break;
			case 80:
				$this->setLonfille5($value);
				break;
			case 81:
				$this->setInipan($value);
				break;
			case 82:
				$this->setLonpan($value);
				break;
			case 83:
				$this->setInimotivo($value);
				break;
			case 84:
				$this->setLonmotivo($value);
				break;
			case 85:
				$this->setInilibre($value);
				break;
			case 86:
				$this->setLonlibre($value);
				break;
			case 87:
				$this->setInipannue($value);
				break;
			case 88:
				$this->setLonpannue($value);
				break;
			case 89:
				$this->setIniotrdat($value);
				break;
			case 90:
				$this->setLonotrdat($value);
				break;
			case 91:
				$this->setIniidere2($value);
				break;
			case 92:
				$this->setLonidere2($value);
				break;
			case 93:
				$this->setIninumtar($value);
				break;
			case 94:
				$this->setLonnumtar($value);
				break;
			case 95:
				$this->setInimontra($value);
				break;
			case 96:
				$this->setLonmontra($value);
				break;
			case 97:
				$this->setIninomben($value);
				break;
			case 98:
				$this->setLonnomben($value);
				break;
			case 99:
				$this->setInicentr2($value);
				break;
			case 100:
				$this->setLoncentr2($value);
				break;
			case 101:
				$this->setInicodba2($value);
				break;
			case 102:
				$this->setLoncodba2($value);
				break;
			case 103:
				$this->setIninumlo2($value);
				break;
			case 104:
				$this->setFinnumlo2($value);
				break;
			case 105:
				$this->setInirifem2($value);
				break;
			case 106:
				$this->setLonrifem2($value);
				break;
			case 107:
				$this->setInifille6($value);
				break;
			case 108:
				$this->setLonfille6($value);
				break;
			case 109:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpconftxtcesticPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTiptxt($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setInitipre1($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLontipre1($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setInitipdo1($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLontipdo1($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIniideemp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLonideemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIninumlo1($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFinnumlo1($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIninomemp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFinnomemp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setInicanreg($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFincanreg($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setInicodpla($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFincodpla($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setInifecgen($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFinfecgen($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setInihorgen($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFinhorgen($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setInicodre1($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFincodre1($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setIninomarc($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFinnomarc($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setInifille1($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFinfille1($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setIniidere1($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setLonidere1($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setIninrocon($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setFinnrocon($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setInifecefe($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFinfecefe($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setInimontot($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setFinmontot($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setInicentr1($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setLoncentr1($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setIniespbla($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setLonespbla($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setInicodba1($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setLoncodba1($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setInirifem1($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setLonrifem1($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setInitipnom($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setLontipnom($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setInitipre2($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setLontipre2($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setInitipdo2($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setLontipdo2($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setIninroced($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setLonnroced($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setInipriape($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setLonpriape($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setInifille2($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setLonfille2($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setInisegape($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setLonsegape($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setInifille3($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setLonfille3($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setIniprinom($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setLonprinom($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setInifille4($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setLonfille4($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setIniciudad($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setLonciudad($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setIniestado($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setLonestado($arr[$keys[64]]);
		if (array_key_exists($keys[65], $arr)) $this->setInicodofi($arr[$keys[65]]);
		if (array_key_exists($keys[66], $arr)) $this->setLoncodofi($arr[$keys[66]]);
		if (array_key_exists($keys[67], $arr)) $this->setInisexo($arr[$keys[67]]);
		if (array_key_exists($keys[68], $arr)) $this->setLonsexo($arr[$keys[68]]);
		if (array_key_exists($keys[69], $arr)) $this->setInicodare($arr[$keys[69]]);
		if (array_key_exists($keys[70], $arr)) $this->setLoncodare($arr[$keys[70]]);
		if (array_key_exists($keys[71], $arr)) $this->setIninumtel($arr[$keys[71]]);
		if (array_key_exists($keys[72], $arr)) $this->setLonnumtel($arr[$keys[72]]);
		if (array_key_exists($keys[73], $arr)) $this->setInidestel($arr[$keys[73]]);
		if (array_key_exists($keys[74], $arr)) $this->setLondestel($arr[$keys[74]]);
		if (array_key_exists($keys[75], $arr)) $this->setInifecnac($arr[$keys[75]]);
		if (array_key_exists($keys[76], $arr)) $this->setLonfecnac($arr[$keys[76]]);
		if (array_key_exists($keys[77], $arr)) $this->setInicodre2($arr[$keys[77]]);
		if (array_key_exists($keys[78], $arr)) $this->setFincodre2($arr[$keys[78]]);
		if (array_key_exists($keys[79], $arr)) $this->setInifille5($arr[$keys[79]]);
		if (array_key_exists($keys[80], $arr)) $this->setLonfille5($arr[$keys[80]]);
		if (array_key_exists($keys[81], $arr)) $this->setInipan($arr[$keys[81]]);
		if (array_key_exists($keys[82], $arr)) $this->setLonpan($arr[$keys[82]]);
		if (array_key_exists($keys[83], $arr)) $this->setInimotivo($arr[$keys[83]]);
		if (array_key_exists($keys[84], $arr)) $this->setLonmotivo($arr[$keys[84]]);
		if (array_key_exists($keys[85], $arr)) $this->setInilibre($arr[$keys[85]]);
		if (array_key_exists($keys[86], $arr)) $this->setLonlibre($arr[$keys[86]]);
		if (array_key_exists($keys[87], $arr)) $this->setInipannue($arr[$keys[87]]);
		if (array_key_exists($keys[88], $arr)) $this->setLonpannue($arr[$keys[88]]);
		if (array_key_exists($keys[89], $arr)) $this->setIniotrdat($arr[$keys[89]]);
		if (array_key_exists($keys[90], $arr)) $this->setLonotrdat($arr[$keys[90]]);
		if (array_key_exists($keys[91], $arr)) $this->setIniidere2($arr[$keys[91]]);
		if (array_key_exists($keys[92], $arr)) $this->setLonidere2($arr[$keys[92]]);
		if (array_key_exists($keys[93], $arr)) $this->setIninumtar($arr[$keys[93]]);
		if (array_key_exists($keys[94], $arr)) $this->setLonnumtar($arr[$keys[94]]);
		if (array_key_exists($keys[95], $arr)) $this->setInimontra($arr[$keys[95]]);
		if (array_key_exists($keys[96], $arr)) $this->setLonmontra($arr[$keys[96]]);
		if (array_key_exists($keys[97], $arr)) $this->setIninomben($arr[$keys[97]]);
		if (array_key_exists($keys[98], $arr)) $this->setLonnomben($arr[$keys[98]]);
		if (array_key_exists($keys[99], $arr)) $this->setInicentr2($arr[$keys[99]]);
		if (array_key_exists($keys[100], $arr)) $this->setLoncentr2($arr[$keys[100]]);
		if (array_key_exists($keys[101], $arr)) $this->setInicodba2($arr[$keys[101]]);
		if (array_key_exists($keys[102], $arr)) $this->setLoncodba2($arr[$keys[102]]);
		if (array_key_exists($keys[103], $arr)) $this->setIninumlo2($arr[$keys[103]]);
		if (array_key_exists($keys[104], $arr)) $this->setFinnumlo2($arr[$keys[104]]);
		if (array_key_exists($keys[105], $arr)) $this->setInirifem2($arr[$keys[105]]);
		if (array_key_exists($keys[106], $arr)) $this->setLonrifem2($arr[$keys[106]]);
		if (array_key_exists($keys[107], $arr)) $this->setInifille6($arr[$keys[107]]);
		if (array_key_exists($keys[108], $arr)) $this->setLonfille6($arr[$keys[108]]);
		if (array_key_exists($keys[109], $arr)) $this->setId($arr[$keys[109]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpconftxtcesticPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpconftxtcesticPeer::TIPTXT)) $criteria->add(NpconftxtcesticPeer::TIPTXT, $this->tiptxt);
		if ($this->isColumnModified(NpconftxtcesticPeer::INITIPRE1)) $criteria->add(NpconftxtcesticPeer::INITIPRE1, $this->initipre1);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONTIPRE1)) $criteria->add(NpconftxtcesticPeer::LONTIPRE1, $this->lontipre1);
		if ($this->isColumnModified(NpconftxtcesticPeer::INITIPDO1)) $criteria->add(NpconftxtcesticPeer::INITIPDO1, $this->initipdo1);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONTIPDO1)) $criteria->add(NpconftxtcesticPeer::LONTIPDO1, $this->lontipdo1);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIIDEEMP)) $criteria->add(NpconftxtcesticPeer::INIIDEEMP, $this->iniideemp);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONIDEEMP)) $criteria->add(NpconftxtcesticPeer::LONIDEEMP, $this->lonideemp);
		if ($this->isColumnModified(NpconftxtcesticPeer::ININUMLO1)) $criteria->add(NpconftxtcesticPeer::ININUMLO1, $this->ininumlo1);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINNUMLO1)) $criteria->add(NpconftxtcesticPeer::FINNUMLO1, $this->finnumlo1);
		if ($this->isColumnModified(NpconftxtcesticPeer::ININOMEMP)) $criteria->add(NpconftxtcesticPeer::ININOMEMP, $this->ininomemp);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINNOMEMP)) $criteria->add(NpconftxtcesticPeer::FINNOMEMP, $this->finnomemp);
		if ($this->isColumnModified(NpconftxtcesticPeer::INICANREG)) $criteria->add(NpconftxtcesticPeer::INICANREG, $this->inicanreg);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINCANREG)) $criteria->add(NpconftxtcesticPeer::FINCANREG, $this->fincanreg);
		if ($this->isColumnModified(NpconftxtcesticPeer::INICODPLA)) $criteria->add(NpconftxtcesticPeer::INICODPLA, $this->inicodpla);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINCODPLA)) $criteria->add(NpconftxtcesticPeer::FINCODPLA, $this->fincodpla);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIFECGEN)) $criteria->add(NpconftxtcesticPeer::INIFECGEN, $this->inifecgen);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINFECGEN)) $criteria->add(NpconftxtcesticPeer::FINFECGEN, $this->finfecgen);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIHORGEN)) $criteria->add(NpconftxtcesticPeer::INIHORGEN, $this->inihorgen);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINHORGEN)) $criteria->add(NpconftxtcesticPeer::FINHORGEN, $this->finhorgen);
		if ($this->isColumnModified(NpconftxtcesticPeer::INICODRE1)) $criteria->add(NpconftxtcesticPeer::INICODRE1, $this->inicodre1);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINCODRE1)) $criteria->add(NpconftxtcesticPeer::FINCODRE1, $this->fincodre1);
		if ($this->isColumnModified(NpconftxtcesticPeer::ININOMARC)) $criteria->add(NpconftxtcesticPeer::ININOMARC, $this->ininomarc);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINNOMARC)) $criteria->add(NpconftxtcesticPeer::FINNOMARC, $this->finnomarc);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIFILLE1)) $criteria->add(NpconftxtcesticPeer::INIFILLE1, $this->inifille1);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINFILLE1)) $criteria->add(NpconftxtcesticPeer::FINFILLE1, $this->finfille1);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIIDERE1)) $criteria->add(NpconftxtcesticPeer::INIIDERE1, $this->iniidere1);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONIDERE1)) $criteria->add(NpconftxtcesticPeer::LONIDERE1, $this->lonidere1);
		if ($this->isColumnModified(NpconftxtcesticPeer::ININROCON)) $criteria->add(NpconftxtcesticPeer::ININROCON, $this->ininrocon);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINNROCON)) $criteria->add(NpconftxtcesticPeer::FINNROCON, $this->finnrocon);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIFECEFE)) $criteria->add(NpconftxtcesticPeer::INIFECEFE, $this->inifecefe);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINFECEFE)) $criteria->add(NpconftxtcesticPeer::FINFECEFE, $this->finfecefe);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIMONTOT)) $criteria->add(NpconftxtcesticPeer::INIMONTOT, $this->inimontot);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINMONTOT)) $criteria->add(NpconftxtcesticPeer::FINMONTOT, $this->finmontot);
		if ($this->isColumnModified(NpconftxtcesticPeer::INICENTR1)) $criteria->add(NpconftxtcesticPeer::INICENTR1, $this->inicentr1);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONCENTR1)) $criteria->add(NpconftxtcesticPeer::LONCENTR1, $this->loncentr1);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIESPBLA)) $criteria->add(NpconftxtcesticPeer::INIESPBLA, $this->iniespbla);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONESPBLA)) $criteria->add(NpconftxtcesticPeer::LONESPBLA, $this->lonespbla);
		if ($this->isColumnModified(NpconftxtcesticPeer::INICODBA1)) $criteria->add(NpconftxtcesticPeer::INICODBA1, $this->inicodba1);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONCODBA1)) $criteria->add(NpconftxtcesticPeer::LONCODBA1, $this->loncodba1);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIRIFEM1)) $criteria->add(NpconftxtcesticPeer::INIRIFEM1, $this->inirifem1);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONRIFEM1)) $criteria->add(NpconftxtcesticPeer::LONRIFEM1, $this->lonrifem1);
		if ($this->isColumnModified(NpconftxtcesticPeer::INITIPNOM)) $criteria->add(NpconftxtcesticPeer::INITIPNOM, $this->initipnom);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONTIPNOM)) $criteria->add(NpconftxtcesticPeer::LONTIPNOM, $this->lontipnom);
		if ($this->isColumnModified(NpconftxtcesticPeer::INITIPRE2)) $criteria->add(NpconftxtcesticPeer::INITIPRE2, $this->initipre2);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONTIPRE2)) $criteria->add(NpconftxtcesticPeer::LONTIPRE2, $this->lontipre2);
		if ($this->isColumnModified(NpconftxtcesticPeer::INITIPDO2)) $criteria->add(NpconftxtcesticPeer::INITIPDO2, $this->initipdo2);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONTIPDO2)) $criteria->add(NpconftxtcesticPeer::LONTIPDO2, $this->lontipdo2);
		if ($this->isColumnModified(NpconftxtcesticPeer::ININROCED)) $criteria->add(NpconftxtcesticPeer::ININROCED, $this->ininroced);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONNROCED)) $criteria->add(NpconftxtcesticPeer::LONNROCED, $this->lonnroced);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIPRIAPE)) $criteria->add(NpconftxtcesticPeer::INIPRIAPE, $this->inipriape);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONPRIAPE)) $criteria->add(NpconftxtcesticPeer::LONPRIAPE, $this->lonpriape);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIFILLE2)) $criteria->add(NpconftxtcesticPeer::INIFILLE2, $this->inifille2);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONFILLE2)) $criteria->add(NpconftxtcesticPeer::LONFILLE2, $this->lonfille2);
		if ($this->isColumnModified(NpconftxtcesticPeer::INISEGAPE)) $criteria->add(NpconftxtcesticPeer::INISEGAPE, $this->inisegape);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONSEGAPE)) $criteria->add(NpconftxtcesticPeer::LONSEGAPE, $this->lonsegape);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIFILLE3)) $criteria->add(NpconftxtcesticPeer::INIFILLE3, $this->inifille3);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONFILLE3)) $criteria->add(NpconftxtcesticPeer::LONFILLE3, $this->lonfille3);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIPRINOM)) $criteria->add(NpconftxtcesticPeer::INIPRINOM, $this->iniprinom);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONPRINOM)) $criteria->add(NpconftxtcesticPeer::LONPRINOM, $this->lonprinom);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIFILLE4)) $criteria->add(NpconftxtcesticPeer::INIFILLE4, $this->inifille4);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONFILLE4)) $criteria->add(NpconftxtcesticPeer::LONFILLE4, $this->lonfille4);
		if ($this->isColumnModified(NpconftxtcesticPeer::INICIUDAD)) $criteria->add(NpconftxtcesticPeer::INICIUDAD, $this->iniciudad);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONCIUDAD)) $criteria->add(NpconftxtcesticPeer::LONCIUDAD, $this->lonciudad);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIESTADO)) $criteria->add(NpconftxtcesticPeer::INIESTADO, $this->iniestado);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONESTADO)) $criteria->add(NpconftxtcesticPeer::LONESTADO, $this->lonestado);
		if ($this->isColumnModified(NpconftxtcesticPeer::INICODOFI)) $criteria->add(NpconftxtcesticPeer::INICODOFI, $this->inicodofi);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONCODOFI)) $criteria->add(NpconftxtcesticPeer::LONCODOFI, $this->loncodofi);
		if ($this->isColumnModified(NpconftxtcesticPeer::INISEXO)) $criteria->add(NpconftxtcesticPeer::INISEXO, $this->inisexo);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONSEXO)) $criteria->add(NpconftxtcesticPeer::LONSEXO, $this->lonsexo);
		if ($this->isColumnModified(NpconftxtcesticPeer::INICODARE)) $criteria->add(NpconftxtcesticPeer::INICODARE, $this->inicodare);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONCODARE)) $criteria->add(NpconftxtcesticPeer::LONCODARE, $this->loncodare);
		if ($this->isColumnModified(NpconftxtcesticPeer::ININUMTEL)) $criteria->add(NpconftxtcesticPeer::ININUMTEL, $this->ininumtel);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONNUMTEL)) $criteria->add(NpconftxtcesticPeer::LONNUMTEL, $this->lonnumtel);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIDESTEL)) $criteria->add(NpconftxtcesticPeer::INIDESTEL, $this->inidestel);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONDESTEL)) $criteria->add(NpconftxtcesticPeer::LONDESTEL, $this->londestel);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIFECNAC)) $criteria->add(NpconftxtcesticPeer::INIFECNAC, $this->inifecnac);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONFECNAC)) $criteria->add(NpconftxtcesticPeer::LONFECNAC, $this->lonfecnac);
		if ($this->isColumnModified(NpconftxtcesticPeer::INICODRE2)) $criteria->add(NpconftxtcesticPeer::INICODRE2, $this->inicodre2);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINCODRE2)) $criteria->add(NpconftxtcesticPeer::FINCODRE2, $this->fincodre2);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIFILLE5)) $criteria->add(NpconftxtcesticPeer::INIFILLE5, $this->inifille5);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONFILLE5)) $criteria->add(NpconftxtcesticPeer::LONFILLE5, $this->lonfille5);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIPAN)) $criteria->add(NpconftxtcesticPeer::INIPAN, $this->inipan);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONPAN)) $criteria->add(NpconftxtcesticPeer::LONPAN, $this->lonpan);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIMOTIVO)) $criteria->add(NpconftxtcesticPeer::INIMOTIVO, $this->inimotivo);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONMOTIVO)) $criteria->add(NpconftxtcesticPeer::LONMOTIVO, $this->lonmotivo);
		if ($this->isColumnModified(NpconftxtcesticPeer::INILIBRE)) $criteria->add(NpconftxtcesticPeer::INILIBRE, $this->inilibre);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONLIBRE)) $criteria->add(NpconftxtcesticPeer::LONLIBRE, $this->lonlibre);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIPANNUE)) $criteria->add(NpconftxtcesticPeer::INIPANNUE, $this->inipannue);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONPANNUE)) $criteria->add(NpconftxtcesticPeer::LONPANNUE, $this->lonpannue);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIOTRDAT)) $criteria->add(NpconftxtcesticPeer::INIOTRDAT, $this->iniotrdat);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONOTRDAT)) $criteria->add(NpconftxtcesticPeer::LONOTRDAT, $this->lonotrdat);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIIDERE2)) $criteria->add(NpconftxtcesticPeer::INIIDERE2, $this->iniidere2);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONIDERE2)) $criteria->add(NpconftxtcesticPeer::LONIDERE2, $this->lonidere2);
		if ($this->isColumnModified(NpconftxtcesticPeer::ININUMTAR)) $criteria->add(NpconftxtcesticPeer::ININUMTAR, $this->ininumtar);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONNUMTAR)) $criteria->add(NpconftxtcesticPeer::LONNUMTAR, $this->lonnumtar);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIMONTRA)) $criteria->add(NpconftxtcesticPeer::INIMONTRA, $this->inimontra);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONMONTRA)) $criteria->add(NpconftxtcesticPeer::LONMONTRA, $this->lonmontra);
		if ($this->isColumnModified(NpconftxtcesticPeer::ININOMBEN)) $criteria->add(NpconftxtcesticPeer::ININOMBEN, $this->ininomben);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONNOMBEN)) $criteria->add(NpconftxtcesticPeer::LONNOMBEN, $this->lonnomben);
		if ($this->isColumnModified(NpconftxtcesticPeer::INICENTR2)) $criteria->add(NpconftxtcesticPeer::INICENTR2, $this->inicentr2);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONCENTR2)) $criteria->add(NpconftxtcesticPeer::LONCENTR2, $this->loncentr2);
		if ($this->isColumnModified(NpconftxtcesticPeer::INICODBA2)) $criteria->add(NpconftxtcesticPeer::INICODBA2, $this->inicodba2);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONCODBA2)) $criteria->add(NpconftxtcesticPeer::LONCODBA2, $this->loncodba2);
		if ($this->isColumnModified(NpconftxtcesticPeer::ININUMLO2)) $criteria->add(NpconftxtcesticPeer::ININUMLO2, $this->ininumlo2);
		if ($this->isColumnModified(NpconftxtcesticPeer::FINNUMLO2)) $criteria->add(NpconftxtcesticPeer::FINNUMLO2, $this->finnumlo2);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIRIFEM2)) $criteria->add(NpconftxtcesticPeer::INIRIFEM2, $this->inirifem2);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONRIFEM2)) $criteria->add(NpconftxtcesticPeer::LONRIFEM2, $this->lonrifem2);
		if ($this->isColumnModified(NpconftxtcesticPeer::INIFILLE6)) $criteria->add(NpconftxtcesticPeer::INIFILLE6, $this->inifille6);
		if ($this->isColumnModified(NpconftxtcesticPeer::LONFILLE6)) $criteria->add(NpconftxtcesticPeer::LONFILLE6, $this->lonfille6);
		if ($this->isColumnModified(NpconftxtcesticPeer::ID)) $criteria->add(NpconftxtcesticPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpconftxtcesticPeer::DATABASE_NAME);

		$criteria->add(NpconftxtcesticPeer::ID, $this->id);

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

		$copyObj->setTiptxt($this->tiptxt);

		$copyObj->setInitipre1($this->initipre1);

		$copyObj->setLontipre1($this->lontipre1);

		$copyObj->setInitipdo1($this->initipdo1);

		$copyObj->setLontipdo1($this->lontipdo1);

		$copyObj->setIniideemp($this->iniideemp);

		$copyObj->setLonideemp($this->lonideemp);

		$copyObj->setIninumlo1($this->ininumlo1);

		$copyObj->setFinnumlo1($this->finnumlo1);

		$copyObj->setIninomemp($this->ininomemp);

		$copyObj->setFinnomemp($this->finnomemp);

		$copyObj->setInicanreg($this->inicanreg);

		$copyObj->setFincanreg($this->fincanreg);

		$copyObj->setInicodpla($this->inicodpla);

		$copyObj->setFincodpla($this->fincodpla);

		$copyObj->setInifecgen($this->inifecgen);

		$copyObj->setFinfecgen($this->finfecgen);

		$copyObj->setInihorgen($this->inihorgen);

		$copyObj->setFinhorgen($this->finhorgen);

		$copyObj->setInicodre1($this->inicodre1);

		$copyObj->setFincodre1($this->fincodre1);

		$copyObj->setIninomarc($this->ininomarc);

		$copyObj->setFinnomarc($this->finnomarc);

		$copyObj->setInifille1($this->inifille1);

		$copyObj->setFinfille1($this->finfille1);

		$copyObj->setIniidere1($this->iniidere1);

		$copyObj->setLonidere1($this->lonidere1);

		$copyObj->setIninrocon($this->ininrocon);

		$copyObj->setFinnrocon($this->finnrocon);

		$copyObj->setInifecefe($this->inifecefe);

		$copyObj->setFinfecefe($this->finfecefe);

		$copyObj->setInimontot($this->inimontot);

		$copyObj->setFinmontot($this->finmontot);

		$copyObj->setInicentr1($this->inicentr1);

		$copyObj->setLoncentr1($this->loncentr1);

		$copyObj->setIniespbla($this->iniespbla);

		$copyObj->setLonespbla($this->lonespbla);

		$copyObj->setInicodba1($this->inicodba1);

		$copyObj->setLoncodba1($this->loncodba1);

		$copyObj->setInirifem1($this->inirifem1);

		$copyObj->setLonrifem1($this->lonrifem1);

		$copyObj->setInitipnom($this->initipnom);

		$copyObj->setLontipnom($this->lontipnom);

		$copyObj->setInitipre2($this->initipre2);

		$copyObj->setLontipre2($this->lontipre2);

		$copyObj->setInitipdo2($this->initipdo2);

		$copyObj->setLontipdo2($this->lontipdo2);

		$copyObj->setIninroced($this->ininroced);

		$copyObj->setLonnroced($this->lonnroced);

		$copyObj->setInipriape($this->inipriape);

		$copyObj->setLonpriape($this->lonpriape);

		$copyObj->setInifille2($this->inifille2);

		$copyObj->setLonfille2($this->lonfille2);

		$copyObj->setInisegape($this->inisegape);

		$copyObj->setLonsegape($this->lonsegape);

		$copyObj->setInifille3($this->inifille3);

		$copyObj->setLonfille3($this->lonfille3);

		$copyObj->setIniprinom($this->iniprinom);

		$copyObj->setLonprinom($this->lonprinom);

		$copyObj->setInifille4($this->inifille4);

		$copyObj->setLonfille4($this->lonfille4);

		$copyObj->setIniciudad($this->iniciudad);

		$copyObj->setLonciudad($this->lonciudad);

		$copyObj->setIniestado($this->iniestado);

		$copyObj->setLonestado($this->lonestado);

		$copyObj->setInicodofi($this->inicodofi);

		$copyObj->setLoncodofi($this->loncodofi);

		$copyObj->setInisexo($this->inisexo);

		$copyObj->setLonsexo($this->lonsexo);

		$copyObj->setInicodare($this->inicodare);

		$copyObj->setLoncodare($this->loncodare);

		$copyObj->setIninumtel($this->ininumtel);

		$copyObj->setLonnumtel($this->lonnumtel);

		$copyObj->setInidestel($this->inidestel);

		$copyObj->setLondestel($this->londestel);

		$copyObj->setInifecnac($this->inifecnac);

		$copyObj->setLonfecnac($this->lonfecnac);

		$copyObj->setInicodre2($this->inicodre2);

		$copyObj->setFincodre2($this->fincodre2);

		$copyObj->setInifille5($this->inifille5);

		$copyObj->setLonfille5($this->lonfille5);

		$copyObj->setInipan($this->inipan);

		$copyObj->setLonpan($this->lonpan);

		$copyObj->setInimotivo($this->inimotivo);

		$copyObj->setLonmotivo($this->lonmotivo);

		$copyObj->setInilibre($this->inilibre);

		$copyObj->setLonlibre($this->lonlibre);

		$copyObj->setInipannue($this->inipannue);

		$copyObj->setLonpannue($this->lonpannue);

		$copyObj->setIniotrdat($this->iniotrdat);

		$copyObj->setLonotrdat($this->lonotrdat);

		$copyObj->setIniidere2($this->iniidere2);

		$copyObj->setLonidere2($this->lonidere2);

		$copyObj->setIninumtar($this->ininumtar);

		$copyObj->setLonnumtar($this->lonnumtar);

		$copyObj->setInimontra($this->inimontra);

		$copyObj->setLonmontra($this->lonmontra);

		$copyObj->setIninomben($this->ininomben);

		$copyObj->setLonnomben($this->lonnomben);

		$copyObj->setInicentr2($this->inicentr2);

		$copyObj->setLoncentr2($this->loncentr2);

		$copyObj->setInicodba2($this->inicodba2);

		$copyObj->setLoncodba2($this->loncodba2);

		$copyObj->setIninumlo2($this->ininumlo2);

		$copyObj->setFinnumlo2($this->finnumlo2);

		$copyObj->setInirifem2($this->inirifem2);

		$copyObj->setLonrifem2($this->lonrifem2);

		$copyObj->setInifille6($this->inifille6);

		$copyObj->setLonfille6($this->lonfille6);


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
			self::$peer = new NpconftxtcesticPeer();
		}
		return self::$peer;
	}

} 