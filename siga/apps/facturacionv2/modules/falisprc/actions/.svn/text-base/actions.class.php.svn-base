<?php

/**
 * falisprc actions.
 *
 * @package    siga
 * @subpackage falisprc
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class falisprcActions extends autofalisprcActions {

  
    public function executeIndex() {
        return $this->forward('falisprc', 'list');
    }

    // Para incluir funcionalidades al executeEdit()
    public function editing() {
        $this->configGrid();
        $res = CadefartPeer::doSelectOne(new Criteria());
        $mascara = $res->getForart();
        $this->params['mascara'] = $mascara;
        
    }

    public function executeList() {
        return $this->forward('falisprc', 'edit');
    }

    public function configGrid($codprg='', $codtipcli='', $conpag_id=0, $coddes='', $codhas='', $filcod='', $filnom='' ) {

       if ($conpag_id != 0)
            $conpag_id = (int) $conpag_id;

        $sql = "select x.id, x.codart, y.desart, x.precio from falisprc x inner join caregart y on x.codart=y.codart WHERE x.codprg='" . $codprg . "' AND x.codtipcli='" . $codtipcli . "' AND x.conpag_id=$conpag_id AND x.fecvig=(SELECT MAX(f.fecvig) from falisprc f WHERE f.codprg='" . $codprg . "' AND f.codtipcli='" . $codtipcli . "' AND f.conpag_id=$conpag_id) ";
        $articulos=array();
        
        if($coddes!='' && $codhas!=''){
           $sql .= " AND x.codart BETWEEN '" . $coddes . "' AND '" . $codhas . "'";
        }

        if($filcod !=''){
            $sql .= " AND x.codart LIKE '%" . $filcod. "%' ";
        }
        
        if($filnom!=''){
            $sql .= " AND y.desart LIKE UPPER('%" .$filnom. "%')";
        }

        $sql .= " order by x.codart";

        if($coddes=='' && $codhas=='' && $filcod=='' && $filnom=='') $sql .= " limit 0";

        Herramientas::BuscarDatos($sql, &$result);

        $mascara = Herramientas :: getMascaraArticulo();
        $lonarti = strlen($mascara);

        $obj = array (
                'codart' => 1,
                'desart' => 2
        );
        $params = array (
                'param1' => $lonarti,
                'val2'
        );

        $this->columnas = Herramientas::getConfigGrid('grid_articulos');

        $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="' . chr(39) . $lonarti . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascara . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} "');
        $this->columnas[1][0]->setCatalogo('caregart', 'sf_admin_edit_form', $obj, 'Caregart_Fapedido', $params);
        
        $this->obj = $this->columnas[0]->getConfig($result);

        $this->falisprc->setGrid($this->obj);
    }

    public function executeAjax() {

        $codigo = $this->getRequestParameter('codigo', '');
        // Esta variable ajax debe ser usada en cada llamado para identificar
        // que objeto hace el llamado y por consiguiente ejecutar el código necesario
        $ajax = $this->getRequestParameter('ajax', '');

        // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
        // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
        // los datos de los objetos de la vista como pasa en un submit normal.
        $javascript="";
        $sw=false;
        switch ($ajax) {
            case '1':

                $codtipcli = $this->getRequestParameter('codtipcli', '');
                $codprg = $this->getRequestParameter('codprg', '');

                    $this->params = array();
                    $this->falisprc = $this->getFalisprcOrCreate();
                    $this->updateFalisprcFromRequest();
                    $this->labels = $this->getLabels();
                    $this->configGrid();
                $output = '[["","",""],["","",""],["javascript","'.$javascript.'",""]]';
                break;

            case '2':

                $conpag_id = $this->getRequestParameter('conpag_id', '');
                $codprg = $this->getRequestParameter('codprg', '');
                if ($codigo!="" && $codprg=="" && $conpag_id ==""){
                    $this->params = array();
                    $this->falisprc = $this->getFalisprcOrCreate();
                    $this->updateFalisprcFromRequest();
                    $this->labels = $this->getLabels();
                    $this->configGrid();
                } else {
                    if($codigo!="" && $conpag_id!="" && $codprg !=""){
                    $this->params = array();
                    $this->falisprc = $this->getFalisprcOrCreate();
                    $this->updateFalisprcFromRequest();
                    $this->labels = $this->getLabels();
                    $this->configGrid($codprg, $codigo, $conpag_id);
                    $fecha = FalisprcPeer::getInfofec($codprg, $conpag_id, $codigo);
                    if($fecha) $javascript = "$('divlistamensaje').update('Lista de Precio con Fecha Vigente al  <b>".$fecha."</b>'); $('divlista').show()";
                    else $javascript = "$('divlista').hide()";               
                }else {
                     $this->params = array();
                    $this->falisprc = $this->getFalisprcOrCreate();
                    $this->updateFalisprcFromRequest();
                    $this->labels = $this->getLabels();
                    $this->configGrid();
                }
                }
                $output = '[["","",""],["","",""],["javascript","'.$javascript.'",""]]';
                break;
            case '3':

                $conpag_id = $this->getRequestParameter('conpag_id', '');
                $codtipcli = $this->getRequestParameter('codtipcli', '');
                if ($codigo!="" && $codtipcli==""  && $conpag_id ==""){
                    $this->params = array();
                    $this->falisprc = $this->getFalisprcOrCreate();
                    $this->updateFalisprcFromRequest();
                    $this->labels = $this->getLabels();
                    $this->configGrid();
                } else {
                    if($codigo!="" && $codtipcli!="" && $conpag_id !=""){
                    $this->params = array();
                    $this->falisprc = $this->getFalisprcOrCreate();
                    $this->updateFalisprcFromRequest();
                    $this->labels = $this->getLabels();
                    $this->configGrid($codigo,  $codtipcli, $conpag_id);
                    $fecha = FalisprcPeer::getInfofec($codigo, $conpag_id, $codtipcli);
                    if($fecha) $javascript = "$('divlistamensaje').update('Lista de Precio con Fecha Vigente al  <b>".$fecha."</b>'); $('divlista').show()";
                    else $javascript = "$('divlista').hide()";           
               
                  }else {
                    $this->params = array();
                    $this->falisprc = $this->getFalisprcOrCreate();
                    $this->updateFalisprcFromRequest();
                    $this->labels = $this->getLabels();
                    $this->configGrid();
                  }
                }
                 $output = '[["","",""],["","",""],["javascript","'.$javascript.'",""]]';
                break;
            case '4':
                $codprg = $this->getRequestParameter('falisprc[codprg]', '');
                $conpag_id = $this->getRequestParameter('falisprc[conpag_id]', '');
                $codtipcli = $this->getRequestParameter('falisprc[codtipcli]', '');
                $coddes = $this->getRequestParameter('fildes', '');
                $codhas = $this->getRequestParameter('filhas', '');
                $filcod=$this->getRequestParameter('filcod', '');
                $filnom= $this->getRequestParameter('filnom', '');
                $this->params = array();
                $this->falisprc = $this->getFalisprcOrCreate();
                $this->updateFalisprcFromRequest();
                $this->labels = $this->getLabels();
                if($coddes=='' && $codhas=='' && $filcod=='' && $filnom=='')  $javascript = "alert('Debe seleccionar algún criterio de búsqueda');";
                $this->configGrid($codprg, $codtipcli, $conpag_id, $coddes, $codhas, $filcod, $filnom);
                $output = '[["","",""],["","",""],["javascript","'.$javascript.'",""]]';
                break;
            default:
                $output = '[["","",""],["","",""],["","",""]]';
        
        }
        // Instruccion para escribir en la cabecera los datos a enviar a la vista
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

        // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
        // mantener habilitar esta instrucción
        if($sw)
            return sfView::HEADER_ONLY;
        // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
        // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.
    }

    public function executeAjaxgrid() {
        $name = $this->getRequestParameter('grid', 'a');
        $grid = $this->getRequestParameter('grid' . $name, '');
        $fila = $this->getRequestParameter('fila', '');
        $col = $this->getRequestParameter('columna', '');
        $javascript = "";
        $jsonextra = "";

        switch ($col) {
            case '1':
                $varop = $grid[$fila][$col - 1];
                $c = new Criteria();
                $c->add(CaregartPeer::CODART, $grid[$fila][$col - 1]);
                $reg = CaregartPeer::doSelectOne($c);
                if ($reg) {
                    if (Hacienda::Repetido($grid, $grid[$fila][$col - 1], $fila, $col - 1)) {

                        $grid[$fila][$col - 1] = "";
                        $grid[$fila][1] = "";
                        $javascript = "alert('El Artículo esta Repetido');";
                    } //else {
                      //  $grid[$fila][1] = CaregartPeer::Desart($grid[$fila][$col - 1]);
                    //}
                } else {
                    $grid[$fila][$col - 1] = "";
                    $grid[$fila][1] = "";
                    $javascript = "alert('El Artículo no Existe');";
                }
                if (($reg) and (Hacienda::Repetido($grid, $grid[$fila][$col - 1], $fila, $col - 1))==False)
                 {
                  $grid[$fila][1] = CaregartPeer::getDesart($grid[$fila][$col - 1]);
                 }


                $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
           
            default:
                $monglo= $this->getRequestParameter('monglo', '');
                $j = 0;
               while ($j < count($grid)) {
                   if($grid[$j][0]!=''){
                        $grid[$j][2]=$monglo;
                   }
                    $j++;
               }
               
            break;
        }

        $output = Herramientas::grid_to_json($grid, $name, $jsonextra);
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

        return sfView::HEADER_ONLY;
    }

    public function validateEdit() {
        $this->coderr = -1;

        // Se deben llamar a las funciones necesarias para cargar los
        // datos de la vista que serán usados en las funciones de validación.
        // Por ejemplo:

        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $this->falisprc = $this->getFalisprcOrCreate();
            try{ $this->updateFalisprcFromRequest();}
            catch (Exception $ex){}            
            $fecvig = $this->getRequestParameter('falisprc[fecvig]');
            $codprg = $this->getRequestParameter('falisprc[codprg]');
            $conpag_id = $this->getRequestParameter('falisprc[conpag_id]');
            $codtipcli = $this->getRequestParameter('falisprc[codtipcli]');
            if($fecvig=='')
                $fecvig= FalisprcPeer::getInfofec($codprg, $conpag_id, $codtipcli);

            if($fecvig==''){
                $this->coderr=1177;
                
            }
            if ($this->coderr != -1) {
                return false;
            } else
                return true;
        }else
            return true;
    }

    /**
     * Función para actualziar el grid en el post si ocurre un error
     * Se pueden colocar aqui los grids adicionales
     *
     */
    public function updateError() {
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
        $res = CadefartPeer::doSelectOne(new Criteria());
        $mascara = $res->getForart();
        $this->params['mascara'] = $mascara;
        
    }

    public function saving($clasemodelo) {
        $grid = Herramientas::CargarDatosGridv2($this, $this->obj);
        $codprg = $clasemodelo->getCodprg();
        $codtipcli = $clasemodelo->getCodtipcli();
        $conpag_id = $clasemodelo->getConpagId();
        $fecvig = $this->getRequestParameter('falisprc[fecvig]');
        if($fecvig=='')
               $fecvig= FalisprcPeer::getInfofec($codprg, $conpag_id, $codtipcli);
        
        Facturacionv2::SalvarListaDePrecios($clasemodelo, $grid, $codprg, $codtipcli, $conpag_id, $fecvig);
        return -1;
        //return parent::saving($clasemodelo);
    }

    public function deleting($clasemodelo) {
 
        return parent::deleting($clasemodelo);
    }

   

}
