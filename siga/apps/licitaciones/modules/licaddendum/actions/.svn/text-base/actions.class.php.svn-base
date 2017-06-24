<?php

/**
 * licaddendum actions.
 *
 * @package    siga
 * @subpackage licaddendum
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licaddendumActions extends autolicaddendumActions
{

//  public function listing()
//  {
//      $this->c = new Criteria();
//      $sql = "(Liaddendum.tipconpub='O')";
//      $this->c->add(LiaddendumPeer::TIPCONPUB,$sql,Criteria::CUSTOM);
//  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridArt();
    $this->configGridRgo();
    $this->configGridForPag();
    $this->configGridCroEnt();
    $this->configGridFia();
  }

  public function configGridArt($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;
    if(!(count($reg)>0))
    {
      if(!$this->liaddendum->getId()){
        $c = new Criteria();
        $c->add(LiregcondetPeer::NUMCONT,$this->liaddendum->getNumcont());
        $reg_liregcondet = LiregcondetPeer::doSelect($c);
        if($reg_liregcondet){
          foreach($reg_liregcondet as $liregcondet){
            $liregmodcondet = new Liregmodcondet();
            $liregmodcondet->setLiregcondetId($liregcondet->getId());
            foreach($campos = array('numcont', 'codart', 'unimed', 'cantid', 'preuni', 'monrec', 'cantidaum', 'cantiddis', 'preunirec', 'monrecrec', 'cantidadd', 'preuniadd', 'monrecadd', 'cantidtot', 'subtot', 'tipconpub') as $campo){
                $setcampo = 'set'.ucfirst($campo);
                $getcampo = 'get'.ucfirst($campo);
                $liregmodcondet->$setcampo($liregcondet->$getcampo());
            }
            $reg[] = $liregmodcondet;
          }
        }
      }else{
        // Aquí va el código para traernos los registros que contendrá el grid
        $c = new Criteria();
        $c->add(LiregmodcondetPeer::NUMMOD,$this->liaddendum->getNummod());
        $reg = LiregmodcondetPeer::doSelect($c);
      }
    }
    $this->obj = Herramientas::getConfigGrid('gridart');

    $this->obj = $this->obj[0]->getConfig($reg);
    $params = array();
    $params = $this->params;
    $params['gridart'] = $this->obj;
    $this->params = $params;

   }

   public function configGridRgo($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      if(!$this->liaddendum->getId()){

//        $c = new Criteria();
//        $c->add(LiregofefiaPeer::NUMOFE,$this->liaddendum->getNumofe());
//        $reg = LiregofefiaPeer::doSelect($c);
      }else{
        // Aquí va el código para traernos los registros que contendrá el grid
        $c = new Criteria();
        $c->add(LiregofergoPeer::NUMOFE,$this->liaddendum->getNummod());
        $reg = LiregofergoPeer::doSelect($c);
      }
    }
    $this->obj2 = Herramientas::getConfigGrid('gridrgo');

    $this->obj2 = $this->obj2[0]->getConfig($reg);
    $this->params['gridrgo'] = $this->obj2;

   }

   public function configGridForPag($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      if(!$this->liaddendum->getId()){
        $c = new Criteria();
        $c->add(LiregforpagcontPeer::NUMCONT,$this->liaddendum->getNumcont());
        $reg_Liregforpagcont = LiregforpagcontPeer::doSelect($c);
        if($reg_Liregforpagcont){
          foreach($reg_Liregforpagcont as $Liregforpagcont){
            $liregforpagmodcont = new Liregforpagmodcont();
            $liregforpagmodcont->setLiregforpagcontId($Liregforpagcont->getId());
            foreach($campos = array ('numcont', 'desant', 'porant', 'montot', 'monrec', 'subtot', 'poramoant', 'netpag', 'fecant', 'condic', 'tipconpub', 'numval') as $campo){
                $setcampo = 'set'.ucfirst($campo);
                $getcampo = 'get'.ucfirst($campo);
                $liregforpagmodcont->$setcampo($Liregforpagcont->$getcampo());
            }
            $reg[] = $liregforpagmodcont;
          }
        }
      }else{
        // Aquí va el código para traernos los registros que contendrá el grid
        $c = new Criteria();
        $c->add(LiregforpagmodcontPeer::NUMMOD,$this->liaddendum->getNummod());
        $reg = LiregforpagmodcontPeer::doSelect($c);
      }
    }
    $this->obj3 = Herramientas::getConfigGrid('gridforpag');

    $this->obj3 = $this->obj3[0]->getConfig($reg);
    $params = array();
    $params = $this->params;
    $params['gridforpag'] = $this->obj3;
    $this->params = $params;

   }

   public function configGridCroEnt($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      if(!$this->liaddendum->getId()){
        $c = new Criteria();
        $c->add(LidetcroentcontobPeer::NUMCONT,$this->liaddendum->getNumcont());
        $reg_Lidetcroentcontob = LidetcroentcontobPeer::doSelect($c);
        if($reg_Lidetcroentcontob){
          foreach($reg_Lidetcroentcontob as $Lidetcroentcontob){
            $lidetcroentmodcont = new Lidetcroentmodcont();
            $lidetcroentmodcont->setLidetcroentcontobId($Lidetcroentcontob->getId());
            foreach($campos = array ('numcont', 'codart', 'cantid', 'coduniadm', 'fecentcont', 'fecent', 'condic', 'cantidrec', 'fecrec', 'observacion', 'tipconpub', 'numval') as $campo){
                $setcampo = 'set'.ucfirst($campo);
                $getcampo = 'get'.ucfirst($campo);
                $lidetcroentmodcont->$setcampo($Lidetcroentcontob->$getcampo());
            }
            $reg[] = $lidetcroentmodcont;
          }
        }
      }else{

        // Aquí va el código para traernos los registros que contendrá el grid
        $c = new Criteria();
        $c->add(LidetcroentmodcontPeer::NUMMOD,$this->liaddendum->getNummod());
        $reg = LidetcroentmodcontPeer::doSelect($c);
      }
    }
    $this->obj4 = Herramientas::getConfigGrid('gridcroent');

    $this->obj4 = $this->obj4[0]->getConfig($reg);
    $params = array();
    $params = $this->params;
    $params['gridcroent'] = $this->obj4;
    $this->params = $params;

   }

   public function configGridFia($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      if(!$this->liaddendum->getId()){
//        $c = new Criteria();
//        $c->add(LiregofefiaPeer::NUMOFE,$this->liaddendum->getNumofe());
//        $reg = LiregofefiaPeer::doSelect($c);

      }else{
        // Aquí va el código para traernos los registros que contendrá el grid
        $c = new Criteria();
        $c->add(LiregofefiaPeer::NUMOFE,$this->liaddendum->getNumofe());
        $reg = LiregofefiaPeer::doSelect($c);
      }

    }
    $this->obj8 = Herramientas::getConfigGrid('gridfia');

    $this->obj8 = $this->obj8[0]->getConfig($reg);
    $this->params['gridfia'] = $this->obj8;

   }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');
    $sw=true;

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $sw=false;
           $this->ajax='1';
           $bieser = '';
           $compra = '';
           $modcon = '';
           $desclacomp = '';
           $numrecofe= '';
           $numexp = '';
           $codpro = '';
           $numofe = '';
           $fecofe = '';
           $monofe = '';
           $nompro = '';
           $rifpro = '';
           $nomrepleg = '';
           $direccion = '';
           $monsubofe = '';
           $monrecofe = '';
           $c = new Criteria();
           $c->add(LiptocueconPeer::NUMPTOCUECON,$codigo);
           $sql = "(Liptocuecon.tipconpub='O')";
           $c->add(LiptocueconPeer::TIPCONPUB,$sql,Criteria::CUSTOM);
           $c->addJoin(LiplieespPeer::NUMEXP,LiptocueconPeer::NUMEXP);
           $c->addJoin(LiplieespPeer::NUMCOMINT,  LisolegrPeer::NUMSOL);
           $per = LisolegrPeer::doSelectOne($c);
           if($per)
           {
               $compra = $per->getTipcom();
               $modcon = H::GetX('Codtiplic','Litiplic','Destiplic',$per->getCodtiplic());
               $desclacomp = $per->getDesclacomp();
               $numplie = H::GetX('Numexp','Liplieesp','Numplie',$codigo);
           }
           $numrecofe = H::GetX('Numptocuecon','Liptocuecon','Numrecofe',$codigo);
           $c = new Criteria();
           $c->add(LirecomenPeer::NUMRECOFE,  $numrecofe);
           $c->addJoin(LiregofePeer::NUMEXP,LirecomenPeer::NUMEXP);
           $c->addJoin(LirecomenPeer::NUMRECOFE,LirecomendetPeer::NUMRECOFE);
           $c->addJoin(LiregofePeer::CODPRO,LirecomendetPeer::CODPRO);
           $c->addDescendingOrderByColumn(LirecomendetPeer::PUNTOT);
           $per = LiregofePeer::doSelectOne($c);
           if($per)
           {
                $numexp = $per->getNumexp();
                $codpro = $per->getCodpro();
                $numofe = $per->getNumofe();
                $fecofe = $per->getFecofe('d/m/Y');
                $monsubofe = $per->getMonofe();
                $monrecofe = $per->getMonrecofe();
                $monofe = $per->getMonofetot();
           }
           $c = new Criteria();
           $c->add(LiregofePeer::NUMOFE,$numofe);
           $c->addJoin(LiempparPeer::NUMEXP,LiregofePeer::NUMEXP);
           $c->addJoin(LiregofePeer::CODPRO,LiempparPeer::CODPRO);
           $per = LiempparPeer::doSelectOne($c);
           if($per)
           {
               $nompro=$per->getNompro();
               $rifpro=$per->getrifpro();
               $nomrepleg=$per->getNomrepleg();
               $direccion=H::GetX('Codpro','Caprovee','Dirpro',$per->getCodpro());
           }
           $this->liaddendum = $this->getLiaddendumOrCreate();
           $this->updateLiaddendumFromRequest();
           $this->liaddendum->setNumcont($codigo);
           $this->configGridArt();
           $js="toAjaxUpdater('divgridcroent','7',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["liaddendum_tipcom","'.$compra.'",""],["liaddendum_destiplic","'.$modcon.'",""],
                       ["liaddendum_desclacomp","'.$desclacomp.'",""],["liaddendum_numrecofe","'.$numrecofe.'",""],["liaddendum_numexp","'.$numexp.'",""],
                       ["liaddendum_codpro","'.$codpro.'",""],["liaddendum_nompro","'.$nompro.'",""],["liaddendum_rifpro","'.$rifpro.'",""],["liaddendum_nomrepleg","'.$nomrepleg.'",""],
                       ["liaddendum_dirpro","'.$direccion.'",""],["liaddendum_numofe","'.$numofe.'",""],["liaddendum_fecofe","'.$fecofe.'",""],
                       ["liaddendum_monofe","'.H::FormatoMonto($monofe).'",""],["liaddendum_monofelet","'.H::obtenermontoescrito($monofe).'",""],
                       ["liaddendum_monart","'.H::FormatoMonto($monsubofe).'",""],["liaddendum_monrec","'.H::FormatoMonto($monrecofe).'",""],
                       ["javascript","'.$js.'",""]]';
        break;
      case '2':
            $nomemp = '';
            $nomcar = '';
            $coduniadm = '';
            $desuniadm = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODEMP,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $nomemp = $per->getNomemp();
                $nomcar = $per->getNomcar();
                $coduniadm = $per->getCoduniste();
                $desuniadm = $per->getDesuniste();
            }
            $output = '[["Liaddendum_nomempadm","'.$nomemp.'",""],["Liaddendum_nomcaradm","'.$nomcar.'",""],["Liaddendum_coduniadm","'.$coduniadm.'",""],["Liaddendum_desuniadm","'.$desuniadm.'",""]]';
        break;
      case '3':
            $coduniadm = '';
            $desuniadm = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODUNISTE,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $coduniadm = $per->getCoduniste();
                $desuniadm = $per->getDesuniste();
            }
            $output = '[["Liaddendum_coduniadm","'.$coduniadm.'",""],["Liaddendum_desuniadm","'.$desuniadm.'",""],["","",""]]';
        break;
      case '4':
            $nomemp = '';
            $nomcar = '';
            $coduniste = '';
            $desuniste = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODEMP,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $nomemp = $per->getNomemp();
                $nomcar = $per->getNomcar();
                $coduniste = $per->getCoduniste();
                $desuniste = $per->getDesuniste();
            }
            $output = '[["Liaddendum_nomempeje","'.$nomemp.'",""],["Liaddendum_nomcareje","'.$nomcar.'",""],["Liaddendum_coduniste","'.$coduniste.'",""],["Liaddendum_desuniste","'.$desuniste.'",""]]';
        break;
      case '5':
            $coduniste = '';
            $desuniste = '';
            $c = new Criteria();
            $c->add(LidatstePeer::CODUNISTE,$codigo);
            $per = LidatstePeer::doSelectOne($c);
            if($per)
            {
                $coduniste = $per->getCoduniste();
                $desuniste = $per->getDesuniste();
            }
            $output = '[["Liaddendum_coduniste","'.$coduniste.'",""],["Liaddendum_desuniste","'.$desuniste.'",""],["","",""]]';
        break;
      case '6':
          $fecha = $this->getRequestParameter('fecha','');
          $dias = $this->getRequestParameter('dias','');
          if($fecha && $dias)
          {
              $sql="select to_char(to_date('$fecha','dd/mm/yyyy')+$dias,'dd/mm/yyyy') as fecven";
              if(H::BuscarDatos($sql, $rs))
                 $fecven = $rs[0]['fecven'];
          }else
             $fecven=null;
          $output = '[["liaddendum_fecven","'.$fecven.'",""],["","",""],["","",""]]';
        break;
      case '7':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $sw=false;
           $this->ajax='7';
           $numofe= $this->getRequestParameter('numofe','');
           $this->liaddendum = $this->getLiaddendumOrCreate();
           $this->liaddendum->setNumcont($codigo);
           $this->configGridCroEnt();
           $js="toAjaxUpdater('divgridforpag','8',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '8':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $sw=false;
           $this->ajax='8';
           $numofe= $this->getRequestParameter('numofe','');
           $this->liaddendum = $this->getLiaddendumOrCreate();
           $this->liaddendum->setNumcont($codigo);
           $this->configGridForpag();
           //$js="toAjaxUpdater('divgridrgo','9',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $js="";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '9':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $sw=false;
           $this->ajax='9';
           $numofe= $this->getRequestParameter('numofe','');
           $this->Liaddendum = $this->getLiaddendumOrCreate();
           $this->Liaddendum->setNumofe($numofe);
           $this->configGridRgo();
           $js="toAjaxUpdater('divgridfia','10',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      case '10':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
           $sw=false;
           $this->ajax='10';
           $numofe= $this->getRequestParameter('numofe','');
           $this->Liaddendum = $this->getLiaddendumOrCreate();
           $this->Liaddendum->setNumofe($numofe);
           $this->configGridFia();
           $js="";
           $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    if($sw)
        return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }

  public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid', 'a');
    $grid = $this->getRequestParameter('grid' . $name, '');

    $fila = $this->getRequestParameter('fila', '');
    $columna = $this->getRequestParameter('columna', '');

    if($name=='a'){
      $grid[$fila][7] = H::toFloat($grid[$fila][3]) + H::toFloat($grid[$fila][5]) - H::toFloat($grid[$fila][6]);

      if(H::toFloat($grid[$fila][8])>0) $grid[$fila][10] = H::toFloat($grid[$fila][8]) * $grid[$fila][7];
      else $grid[$fila][10] = H::toFloat($grid[$fila][4]) * $grid[$fila][7];


      $grid[$fila][7] = number_format($grid[$fila][7], 2, '.',',');
      $grid[$fila][10] = number_format($grid[$fila][10], 2, '.',',');

      $jsonextra = '';
      $javascript = '';
      $jsonextra = ',["javascript","' . $javascript . '",""]';

    }elseif($name=='c'){

      $jsonextra = '';
      $javascript = '';
      $jsonextra = ',["javascript","' . $javascript . '",""]';

      if($grid[$fila][0]!='0'){
        $subtotal = H::toFloat($grid[$fila][2])+H::toFloat($grid[$fila][3]);
        $grid[$fila][4] = number_format($subtotal,2,'.',',');

        $anticipo = $subtotal*(H::toFloat($grid[$fila][5])/100);
        $grid[$fila][6] = number_format($anticipo, 2,'.',',');

        $grid[$fila][7] = number_format($subtotal-$anticipo, 2,'.',',');
      }

    }elseif($name=='d'){

      $jsonextra = '';
      $javascript = '';
      $jsonextra = ',["javascript","' . $javascript . '",""]';
    }




    $output = Herramientas::grid_to_json($grid, $name, $jsonextra);

    $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

    return sfView::HEADER_ONLY;

  }

  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGridArt();
    $this->configGridRgo();
    $this->configGridForPag();
    $this->configGridCroEnt();
    $this->configGridFia();

    $gridart = Herramientas::CargarDatosGridv2($this,$this->obj);
    $gridrgo = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $gridforpag = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $gridcroent = Herramientas::CargarDatosGridv2($this,$this->obj4);
    $gridfia = Herramientas::CargarDatosGridv2($this,$this->obj8);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {

    $this->configGridArt();
    $this->configGridRgo();
    $this->configGridForPag();
    $this->configGridCroEnt();
    $this->configGridFia();

    $gridart = Herramientas::CargarDatosGridv2($this,$this->obj);
    //$gridrgo = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $gridforpag = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $gridcroent = Herramientas::CargarDatosGridv2($this,$this->obj4);
    //$gridfia = Herramientas::CargarDatosGridv2($this,$this->obj8);

    Licitacion::SalvarGeneral($clasemodelo,'Liaddendum','Nummod','Obmodcont','O');
    Licitacion::SalvarModificacionContrato($clasemodelo, $gridart, $gridforpag, $gridcroent);
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

}
