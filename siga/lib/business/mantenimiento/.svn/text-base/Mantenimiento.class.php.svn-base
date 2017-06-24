<?php
class Mantenimiento {

  public static function salvarEquipo($clasemodelo,$grid,$grid2){
  	$clasemodelo->save();
  	self::grabarNombres($clasemodelo,$grid);
  	self::grabarComponentes($clasemodelo,$grid2);
  }

  public static function grabarNombres($clasemodelo,$grid){
    $p= new Criteria();
    $p->add(MannomequPeer::NUMEQU,$clasemodelo->getNumequ());
    MannomequPeer::doDelete($p);

  	$x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getNomalt()!="")
      {
        $x[$j]->setNumequ($clasemodelo->getNumequ());       
        $x[$j]->save();        
      }       
      $j++;
    }

    /*$z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }*/
  }

  public static function grabarComponentes($clasemodelo,$grid){
  	$x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodcom()!="" && $x[$j]->getDescom()!="")
      {
        $x[$j]->setNumequ($clasemodelo->getNumequ());        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }

  public static function grabarDetalleEstandar($clasemodelo,$grid){
    $clasemodelo->save();
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodart()!="" )
      {
        $x[$j]->setCodest($clasemodelo->getCodest());        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }

  public static function salvarActividades($clasemodelo,$grid,$grid2){
    $clasemodelo->save();
    self::grabarTareas($clasemodelo,$grid);
    self::grabarRRHH($clasemodelo,$grid2);
  }

  public static function grabarTareas($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getNumtar()!=""  && $x[$j]->getDestar()!="")
      {
        $x[$j]->setCodact($clasemodelo->getCodact());        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }

  public static function grabarRRHH($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodcar()!="" && $x[$j]->getCanrec()>0)
      {
        $x[$j]->setCodact($clasemodelo->getCodact());        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }

  public static function CargarFechasProximas($candia,$fecini,&$arreglo){
    $arreglo=array();
    for ($i=0; $i <10 ; $i++) { 
      if ($i==0)
        $arreglo[$i]["fecini"]=$fecini;
      else{
        $arreglo[$i]["fecini"]=H::dateAdd('d', $candia, $fecini, '+');
        $fecini=$arreglo[$i]["fecini"];
      }
    }
  }

  public static function SalvarProgGrupo($clasemodelo,$grid){
    if ($clasemodelo->getId())
      $nuevo='S';
    else
      $nuevo='N';
    $clasemodelo->save();
    if ($nuevo=='N'){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
          $x[$j]->setCodgru($clasemodelo->getCodgru());        
          $x[$j]->setStatus('N');        
          $x[$j]->save();
              
        $j++;
      }
    }
  }

  public static function CargarEquipoProgramado($codgru,$fec,&$arreglo){

  }

  public static function salvarOrdendeTrabajo($clasemodelo,$grid,$grid1,$grid2,$grid3,$grid4,$grid5){
    
    if ($clasemodelo->getId()){
      $clasemodelo->save();
      self::grabarAvancesOrden($clasemodelo,$grid3);
      self::grabarComponentesOrden($clasemodelo,$grid4);
      self::grabarRrhhRealOrden($clasemodelo,$grid5);
    }else {
    self::grabarOrden($clasemodelo);
    self::grabarTareasOrden($clasemodelo,$grid);
    self::grabarRrhhOrden($clasemodelo,$grid1);
    self::grabarRequisicionesOrden($clasemodelo,$grid2);
    
   }
  }

  public static function grabarOrden($clasemodelo){
    $tienecorrelativo=false;    
    if ($clasemodelo->getNumord()=='########')
    {
       if (Herramientas::getVerCorrelativo('corord','Mandefemp',$r))
       {
          $tienecorrelativo=true;
          $encontrado=false;
          while (!$encontrado)
          {
            $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

            $sql="select numord from manordtra where numord='".$numero."'";
            if (Herramientas::BuscarDatos($sql,$result))
            {
              $r=$r+1;
            }
            else
            {
              $encontrado=true;
            }
          }
          $clasemodelo->setNumord(str_pad($r, 8, '0', STR_PAD_LEFT));  
          }   
    }
    else
    {
      $clasemodelo->setNumord(str_replace('#','0',$clasemodelo->getNumord()));
    }

   if ($tienecorrelativo)
   {
     Herramientas::getSalvarCorrelativo('corord','Mandefemp','Referencia',$r,$msg);
   }
   $clasemodelo->save();
  }

    public static function grabarTareasOrden($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getNumtar()!=""  && $x[$j]->getDestar()!="")
      {
        $x[$j]->setNumord($clasemodelo->getNumord());        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }

  public static function grabarRrhhOrden($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodcar()!="" && $x[$j]->getCanrec()>0)
      {
        $x[$j]->setNumord($clasemodelo->getNumord());        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }

  public static function grabarRequisicionesOrden($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getReqart()!="")
      {
        $x[$j]->setNumord($clasemodelo->getNumord());        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }

    public static function grabarAvancesOrden($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getFecava()!="" && $x[$j]->getObsava()!="")
      {
        $x[$j]->setNumord($clasemodelo->getNumord());        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }

    public static function grabarComponentesOrden($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodcom()!="" && $x[$j]->getDescom()!="")
      {
        $x[$j]->setNumord($clasemodelo->getNumord());        
        $x[$j]->setNumequ($clasemodelo->getNumequ());        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }

    public static function grabarRrhhRealOrden($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCedrec()!="" && $x[$j]->getCanhor()>0)
      {
        $x[$j]->setNumord($clasemodelo->getNumord());        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }

  public static function salvarCatalogacionMateriales($clasemodelo,$grid,$grid2,$grid3,$grid4){

    $clasemodelo->save();
    self::grabarPartes($clasemodelo,$grid);
    self::grabarAPL($clasemodelo,$grid2);
    self::grabarRefCruzada($clasemodelo,$grid3);
    self::grabarReposicion($clasemodelo,$grid4);
  }

  public static function grabarPartes($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    $numsol=$clasemodelo->getNumsol();
    while ($j<count($x))
    {
      if ($x[$j]->getCodfab()!="" && $x[$j]->getNumpar()!='')
      {
        $x[$j]->setNumsol($numsol);        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }

  public static function grabarAPL($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    $numsol=$clasemodelo->getNumsol();
    while ($j<count($x))
    {
      if ($x[$j]->getNumequ()!="" && $x[$j]->getCanins()>0)
      {
        $x[$j]->setNumsol($numsol);        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  } 

  public static function grabarRefCruzada($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    $numsol=$clasemodelo->getNumsol();
    while ($j<count($x))
    {
      if ($x[$j]->getStccod()!="" && $x[$j]->getRefere()!='')
      {
        $x[$j]->setNumsol($numsol);        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  } 

  public static function grabarReposicion($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    $numsol=$clasemodelo->getNumsol();
    while ($j<count($x))
    {
      if ($x[$j]->getStccla()!="" && $x[$j]->getCodalm()!='')
      {
        $x[$j]->setNumsol($numsol);        
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
  }     

}?>