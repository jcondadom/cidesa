<?php

/**
 * bieciemesdan actions.
 *
 * @package    Roraima
 * @subpackage bieciemesdan
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * @version    SVN: $Id$
 */
class bieciemesdanActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo= $this->getRequestParameter('codigo');
    $ajax= $this->getRequestParameter('ajax');
    $javascript=""; $dato="";
    switch ($ajax){
      case '1':
        $r= new Criteria();
        $r->add(Contaba1Peer::PEREJE,$codigo);
        $trajo=Contaba1Peer::doSelectOne($r);
        if ($trajo)
        {
          $anno=substr($trajo->getFechas(), 0,4);
           $r2= new Criteria();
           $r2->add(BndepactPeer::FECDEP,$trajo->getFechas());
           $trajo2=BndepactPeer::doSelectOne($r2);
           if (!$trajo2){
             $r3= new Criteria();
             $sql="to_char(bndepact.fecdep,'yyyy')='$anno'";
             $r3->add(BndepactPeer::FECDEP,$sql,Criteria::CUSTOM);
             $r3->addDescendingOrderByColumn(BndepactPeer::FECDEP);
             $trajo3=BndepactPeer::doSelectOne($r3);
             if ($trajo3)
             {
                 $mes=date('m',strtotime($trajo3->getFecdep())); 
                 $fecdepw=$trajo3->getFecdep();
                 $m1=(integer) $codigo;
                 $m2=(integer) $mes;
                 $dif=$m1-$m2;
                 if ($dif>1)
                   $javascript="alert_('Debe Depreciar el o los meses Anteriores'); $('mesdep').value='';";              
                 else if ($dif<=0) {
                  if ($trajo3->getNumcom()==''){
                     $javascript="
                     if(confirm('La Depreciación ya ha sido calculada pero no tiene Comprobante Contable asociado ¿Desea Generarlo?'))
                     {
                       asiento2('$fecdepw');
                     }";
                  }else $javascript="alert_('La Depreciaci&oacute;n ya ha sido calculada para ese Mes'); $('mesdep').value='';";              
                 }
                 else{
                   $dato=date('d/m/Y',strtotime($trajo->getFechas()));  
                   $javascript="$('botones').show();"; 
                 }
             }else {
                   $dato=date('d/m/Y',strtotime($trajo->getFechas()));  
                   $javascript="$('botones').show();"; 
             }           
           }else {
            $fecdepw=$trajo2->getFecdep();
            if ($trajo2->getNumcom()==''){
                     $javascript="
                     if(confirm('La Depreciación ya ha sido calculada pero no tiene Comprobante Contable asociado ¿Desea Generarlo?'))
                     {
                       asiento2('$fecdepw');
                     }";
            }else $javascript="alert_('La Depreciaci&oacute;n ya ha sido calculada para ese Mes'); $('mesdep').value='';";              
          }
        }else $javascript="alert_('El per&iacute;odo Contable no ha sido definido.'); $('mesdep').value='';";              

        /*$r= new Criteria();
        $r->addDescendingOrderByColumn(BndepactPeer::FECDEP);
        $trajo=BndepactPeer::doSelectOne($r);
        if ($trajo)
        {
          $fec=Herramientas :: dateAdd('m', 1, $trajo->getFecdep(), '+');
          $dato=date('d/m/Y',strtotime($fec));
          $javascript="$('fechareval').show(); $('depcalculada').value='S'; $('label16').innerHTML = 'Fecha Depreciación'; $('fecha').focus();";
        }else
        {
          $dato="";
          $javascript="$('fechareval').show(); $('label16').innerHTML = 'Fecha Inicio de Depreciación';$('fecha').focus();";
        }*/
        $output = '[["javascript","'.$javascript.'",""],["fecha","'.$dato.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '2':
        //$anno=substr(H::getX_vacio('PEREJE','Contaba1','Fechas','01'),0,4);
        $r= new Criteria();
        //$sql="to_char(bndepact.fecdep,'yyyy')='$anno'";
        //$r->add(BndepactPeer::FECDEP,$sql,Criteria::CUSTOM);
        $r->addDescendingOrderByColumn(BndepactPeer::FECDEP);
        $trajo2=BndepactPeer::doSelectOne($r);
        if ($trajo2)
        {
          $fechacomp=$trajo2->getFecdep();
          $feccomp=date('d/m/Y',strtotime($fechacomp));
          if ($this->getRequestParameter('deprecal')!="S")
          {
            $mes=date('m',strtotime($fechacomp));
            $anno=date('Y',strtotime($fechacomp));
            $reftra="DM".str_pad($mes, 2, '0', STR_PAD_LEFT).$anno;
            $s= new Criteria();
            $s->add(ContabcPeer::REFTRA,$reftra);
            $resulto= ContabcPeer::doSelectOne($s);
            if (!$resulto)
            {
              $mondepm=$trajo2->getMonmue();
              $mondepi=$trajo2->getMoninm();
              $mondeps=$trajo2->getMonsem();
              Bienes::generaComprobanteDepreciacion($fechacomp,$comprobante);
              $form="sf_admin/bieciemesdan/confincomgen";
			  $i=0;
 		      $f[$i]=$form.$i;
		      $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
		      $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
		      $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
		      $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
		      $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
		      $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
		      $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
		      $this->getUser()->setAttribute('tipmov', '');
		      $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
		      $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
			  $this->i=0;
			  $this->formulario=$f;
            }else{
            	$this->i="";
                $this->formulario=array();
            	$javascript="alert_('El Asiento Contable de la Depreciaci&oacute;n de Bienes a la fecha $feccomp ya fue realizado');";
            }
          }else
          {
          	  Bienes::generaComprobanteDepreciacion($fechacomp,$comprobante);
	          $form="sf_admin/bieciemesdan/confincomgen";
			  $i=0;
		      $f[$i]=$form.$i;
		      $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
		      $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
		      $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
		      $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
		      $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
		      $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
		      $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
		      $this->getUser()->setAttribute('tipmov', '');
		      $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
		      $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
			  $this->i=0;
			  $this->formulario=$f;
          	  $javascript="alert('Depreciación de Bienes Realizada'); $('botones').hide(); $('mesdep').value=''; $('fecha').value='';";
          }
        }
        else
        { $this->i="";
          $this->formulario=array();
          $javascript="alert_('No se puede realizar un Asiento Contable ya que la Depreciaci&oacute;n de los Bienes no ha sido ejecutada');";
        }
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       break;
      case '3':
         if ($codigo!="")
        {
          $fec1_aux = split("/", $codigo);
          if (checkdate(intval($fec1_aux[1]), intval($fec1_aux[0]), intval($fec1_aux[2])))
          {
            $novalfecact=H::getConfApp2('novalfecact', 'bienes', 'bieciemesdan');
            $lafechadep=$fec1_aux[2]."-".$fec1_aux[1]."-".$fec1_aux[0];
            $fecact=date('Y-m-d');
            $dateFormat = new sfDateFormat('es_VE');
            $fec1 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));
            if ($novalfecact!='S') {
              if ($fec1<=$fecact) {
                $msj="";
                Bienes::iniciarDepreciacionActivos('1',$lafechadep,$depejecutadam,$depejecutadai,$montodepm,$montodepi,$msj);
                Bienes::iniciarDepreciacionActivos('2',$lafechadep,$depejecutadam,$depejecutadai,$montodepm,$montodepi,$msj);
                if ($msj=="")
                {
    	            if ($depejecutadam==true && $depejecutadai==true)
    	            {
    	              Bienes::actualizarFecdep($lafechadep,$montodepm,$montodepi);
    	              $depejecutadam=false;
    	              $depejecutadai=false;
    	            }
                  if ($montodepm>0)
                    $javascript="asiento();";
                  else
                    $javascript="alert('Depreciación de Bienes Realizada'); $('botones').hide(); $('mesdep').value=''; $('fecha').value='';";
                }else
                {
                	$javascript="$msj";
                }
             }else $javascript="alert('La Fecha de la Depreciación no est&aacute; en Curso');";
         }else {
              $msj="";
              Bienes::iniciarDepreciacionActivos('1',$lafechadep,$depejecutadam,$depejecutadai,$montodepm,$montodepi,$msj);
              Bienes::iniciarDepreciacionActivos('2',$lafechadep,$depejecutadam,$depejecutadai,$montodepm,$montodepi,$msj);
              if ($msj=="")
              {
                if ($depejecutadam==true && $depejecutadai==true)
                {
                  Bienes::actualizarFecdep($lafechadep,$montodepm,$montodepi);
                  $depejecutadam=false;
                  $depejecutadai=false;
                }
                if ($montodepm>0)
                  $javascript="asiento();";
                else
                  $javascript="alert('Depreciación de Bienes Realizada'); $('botones').hide(); $('mesdep').value=''; $('fecha').value='';";
              }else
              {
                $javascript="$msj";
              }
         }
        }else $javascript="alert('La Fecha es Inválida');";          
        }else{
            $lafechadep=date('Y-m-d');
            $msj="";
            Bienes::iniciarDepreciacionActivos('1',$lafechadep,$depejecutadam,$depejecutadai,$montodepm,$montodepi,$msj);
            Bienes::iniciarDepreciacionActivos('2',$lafechadep,$depejecutadam,$depejecutadai,$montodepm,$montodepi,$msj);
            if ($msj=="")
            {
            if ($depejecutadam==true && $depejecutadai==true)
            {
              Bienes::actualizarFecdep($lafechadep,$montodepm,$montodepi);
              $depejecutadam=false;
              $depejecutadai=false;
            }
            if ($montodepm>0)
               $javascript="asiento();";
             else
                $javascript="alert('Depreciación de Bienes Realizada'); $('botones').hide(); $('mesdep').value=''; $('fecha').value='';";
            }else
            {
            	$javascript="$msj";
            }
        }
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '4':
        $r= new Criteria();
        $r->add(BndepactPeer::FECDEP,$codigo);
        $trajo2=BndepactPeer::doSelectOne($r);
        if ($trajo2)
        {
          $fechacomp=$trajo2->getFecdep();
          $feccomp=date('d/m/Y',strtotime($fechacomp));
          if ($this->getRequestParameter('deprecal')!="S")
          {
            $mes=date('m',strtotime($fechacomp));
            $anno=date('Y',strtotime($fechacomp));
            $reftra="DM".str_pad($mes, 2, '0', STR_PAD_LEFT).$anno;
            $s= new Criteria();
            $s->add(ContabcPeer::REFTRA,$reftra);
            $resulto= ContabcPeer::doSelectOne($s);
            if (!$resulto)
            {
              $mondepm=$trajo2->getMonmue();
              $mondepi=$trajo2->getMoninm();
              $mondeps=$trajo2->getMonsem();
              Bienes::generaComprobanteDepreciacion($fechacomp,$comprobante);
              $form="sf_admin/bieciemesdan/confincomgen";
        $i=0;
          $f[$i]=$form.$i;
          $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
          $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
          $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
          $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
          $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
          $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
          $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
          $this->getUser()->setAttribute('tipmov', '');
          $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
          $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
        $this->i=0;
        $this->formulario=$f;
            }else{
              $this->i="";
                $this->formulario=array();
              $javascript="alert_('El Asiento Contable de la Depreciaci&oacute;n de Bienes a la fecha $feccomp ya fue realizado');";
            }
          }else
          {
            Bienes::generaComprobanteDepreciacion($fechacomp,$comprobante);
            $form="sf_admin/bieciemesdan/confincomgen";
            $i=0;
            $f[$i]=$form.$i;
            $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
            $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
            $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
            $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
            $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
            $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
            $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
            $this->getUser()->setAttribute('tipmov', '');
            $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
            $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
            $this->i=0;
            $this->formulario=$f;
              //$javascript="alert('El Asiento Contable de la Depreciaci&oacute;n de Activos fue generado satisfactoriamente.'); $('botones').hide(); $('mesdep').value=''; $('fecha').value='';";
          }
        }
        else
        { $this->i="";
          $this->formulario=array();
          $javascript="alert_('No se puede realizar un Asiento Contable ya que la Depreciaci&oacute;n de los Bienes no ha sido ejecutada');";
        }
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       break;       
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
    }

  }

}
