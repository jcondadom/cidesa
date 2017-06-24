<?php

/**
 * nomsolayueco actions.
 *
 * @package    siga
 * @subpackage nomsolayueco
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomsolayuecoActions extends autonomsolayuecoActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->npsolayueco->getNumsolayu(),$this->npsolayueco->getEsnoemp());
  }

  public function configGrid($numsolayu='', $esnoemp='S')
  {
     $c= new Criteria();
     $c->add(NpdetsolayuecoPeer::NUMSOLAYU,$numsolayu);    
     $reg= NpdetsolayuecoPeer::doSelect($c);

     $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/nomsolayueco/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');

     $params= array('param1' => "'+$('npsolayueco_esnoemp_S').checked+'", 'val2');
     $params1= array('param1' => "'+$('npsolayueco_esnoemp_N').checked+'", 'val2');
     
     if ($esnoemp=='S')
       $this->columnas[1][0]->setCatalogo('nphojint', 'sf_admin_edit_form', array('codemp' => 1, 'nomemp' => 2), 'Viasolviatra_empleado', $params1);
     else
       $this->columnas[1][0]->setCatalogo('vianoemp', 'sf_admin_edit_form', array('codemp' => 1, 'nomemp' => 2), 'Viasolviatra_empleado', $params);

     $this->obj = $this->columnas[0]->getConfig($reg);

     $this->npsolayueco->setGrid($this->obj);    
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $dato=""; $js=""; $sw=true;

    switch ($ajax){
      case '1':
        $p= new Criteria();
        $p->add(CpdoccomPeer::TIPCOM,$codigo);
        $result= CpdoccomPeer::doSelectOne($p);
        if ($result)
          $dato=$result->getNomext();
        else
          $js="alert('El Tipo de Compromiso no existe'); $('npsolayueco_tipcom').value=''; $('npsolayueco_tipcom').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
        $esnoemp1= $this->getRequestParameter('esnoemp1','');
        $esnomemp2= $this->getRequestParameter('esnoemp2','');
        $p= new Criteria();
        if ($esnoemp1=='true')
        {
          $p->add(NphojintPeer::CODEMP,$codigo);
          $result= NphojintPeer::doSelectOne($p);        
          if ($result)
            $dato=$result->getNomemp();
          else
            $js="alert('El Empleado no existe'); $('npsolayueco_codempayu').value=''; $('npsolayueco_codempayu').focus();";
        }else {
          $p->add(VianoempPeer::RIFNEMP,$codigo);
          $result= VianoempPeer::doSelectOne($p);        
          if ($result)
            $dato=$result->getNomnemp();
          else
            $js="alert('El Personal no existe'); $('npsolayueco_codempayu').value=''; $('npsolayueco_codempayu').focus();";
         }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
        $p= new Criteria();
        $p->add(OpbenefiPeer::CEDRIF,$codigo);
        $result= OpbenefiPeer::doSelectOne($p);
        if ($result)
          $dato=$result->getNomben();
        else
          $js="alert('El Beneficiario no existe'); $('npsolayueco_cedrif').value=''; $('npsolayueco_cedrif').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '4':
        $p= new Criteria();
        $p->add(NptipayuPeer::CODTIPAYU,$codigo);
        $result= NptipayuPeer::doSelectOne($p);
        if ($result)
          $dato=$result->getDestipayu();
        else
          $js="alert('El Tipo de Ayuda no existe'); $('npsolayueco_codtipayu').value=''; $('npsolayueco_codtipayu').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '5':
        $p= new Criteria();
        $p->add(NpcatprePeer::CODCAT,$codigo);
        $result= NpcatprePeer::doSelectOne($p);
        if ($result)
          $dato=$result->getNomcat();
        else
          $js="alert('La Categoria no existe'); $('npsolayueco_codcat').value=''; $('npsolayueco_codcat').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '6':
        $p= new Criteria();
        $p->add(CpeveprePeer::CODEVE,$codigo);
        $result= CpeveprePeer::doSelectOne($p);
        if ($result)
          $dato=$result->getDeseve();
        else
          $js="alert('El Evento no existe'); $('npsolayueco_codeve').value=''; $('npsolayueco_codeve').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '7':
        $p= new Criteria();
        $p->add(NpestorgPeer::CODNIV,$codigo);
        $result= NpestorgPeer::doSelectOne($p);
        if ($result)
          $dato=$result->getDesniv();
        else
          $js="alert('La Unidad Solicitante no existe'); $('npsolayueco_codniv').value=''; $('npsolayueco_codniv').focus();";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;   
      case '8':
        $sw=false;
        $esnoemp= $this->getRequestParameter('esnoemp','');
        if ($esnoemp=='true')
          $esnoempaux='N';
        else $esnoempaux='S';

        $this->params=array();
        $this->labels = $this->getLabels();
        $this->npsolayueco= $this->getNpsolayuecoOrCreate();        
        $this->configGrid('',$esnoempaux);

        $output = '[["","",""],["","",""],["","",""]]';
        break;                                      
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw) return sfView::HEADER_ONLY;
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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    if ($clasemodelo->getId())
      $clasemodelo->save();
    else {
      $codpre=$clasemodelo->getCodcat().'-'.H::getX_vacio('CODTIPAYU','Nptipayu','Codpar',$clasemodelo->getCodtipayu());
      $disponible = H::Monto_disponible(H::getCodPreDis($codpre),$clasemodelo->getFecsolayu());
      if ($disponible<H::toFloat($clasemodelo->getMonayu()))
        return 152;
      else{
          $tienecorrelativo = false;
          if (Herramientas::getVerCorrelativo('corayu', 'npdefgen', $r)) {
            if ($clasemodelo->getNumsolayu() == '########') {
              $tienecorrelativo = true;
              $encontrado = false;
              while (!$encontrado) {
                $numero = str_pad($r, 8, '0', STR_PAD_LEFT);

                $sql = "select numsolayu from npsolayueco where numsolayu='" . $numero . "'";
                if (Herramientas::BuscarDatos($sql, $result)) {
                  $r = $r + 1;
                } else {
                  $encontrado = true;
                }
              }
              $solayu= str_pad($r, 8, '0', STR_PAD_LEFT);
              $clasemodelo->setNumsolayu($solayu);
            }
         }
        Nomina::generarCompromisoSolAyu($clasemodelo,$codpre,$refcom);
        $clasemodelo->setRefcom($refcom);
        $clasemodelo->save();
        if ($tienecorrelativo)
          Herramientas::getSalvarCorrelativo('corayu', 'npdefgen', 'Solicitud de Ayuda', $r, $msg);    
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
        //Salvar ayuda otorgada
        $x = $grid[0];
        $j = 0;
        while ($j < count($x)) {
          if ($x[$j]->getCodempayu() != ''){
            $x[$j]->setNumsolayu($clasemodelo->getNumsolayu());
            $x[$j]->save();
          }
          $j++;
        }
        $z = $grid[1];
        $h = 0;
        if (!empty($z[$h]))
        {
          while ($h < count($z))
          {
            $z[$h]->delete();
            $h++;
          }
        }      
      }
   }
    return -1;
  }

  public function deleting($clasemodelo)
  {
    H::EliminarRegistro('Cpcompro', 'Refcom', $clasemodelo->getRefcom());
    H::EliminarRegistro('Npdetsolayueco', 'Numsolayu', $clasemodelo->getNumsolayu());
    $clasemodelo->delete();
    return -1;
  }

 /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traer el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $esnoemp= $this->getRequestParameter('npsolayueco_esnoemp_S','');
    $javascript="";  $jsonextra="";

    switch ($col) {
        case '1':
            if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
            {
               if ($esnoemp=='true')
               {
                  $t= new Criteria();
                  $t->add(NphojintPeer::CODEMP,$grid[$fila][$col-1]);
                  $reg= NphojintPeer::doSelectOne($t);
                  if ($reg)
                  {
                     $grid[$fila][$col]=$reg->getNomemp();                      
                  }else {                  
                     $grid[$fila][$col-1]="";
                     $grid[$fila][$col]="";
                     $javascript="alert('El Empleado no existe');";
                  }                    
               }else {
                  $t= new Criteria();
                  $t->add(VianoempPeer::RIFNEMP,$grid[$fila][$col-1]);
                  $reg= VianoempPeer::doSelectOne($t);
                  if ($reg)
                  {
                     $grid[$fila][$col]=$reg->getNomnemp();                      
                  }else {                  
                     $grid[$fila][$col-1]="";
                     $grid[$fila][$col]="";
                     $javascript="alert('El Personal no existe');";
                  }    
                }                
            }else {                
               $grid[$fila][$col-1]="";
               $grid[$fila][$col]="";
               if ($esnoemp=='S') $javascript="alert('El Empleado esta repetido');";
               else $javascript="alert('El Personal esta repetido');";
            }           
     
          $jsonextra = ',["javascript","' . $javascript . '",""]';
          break;         
          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }  


}
