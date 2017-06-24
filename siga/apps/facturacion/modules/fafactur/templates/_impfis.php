    <?php if($fafactur->fueEnviadoImprimir()) : ?>
      <div id="fiscal" class="warning-ok">
        <h2>Esperando Respuesta de la impresora Fiscal</h2>
        <!-- Enviado a imprimir....esperando..r -->
        <?php echo periodically_call_remote (array(
          'frequency' => 15,
          'update' => 'fiscal',
          'url' => 'fafactur/esperar',
          'with' => "'id=".$fafactur->getId()."'",
          'scripts' => true
        )) ?>        
      </div>
    <?php elseif($fafactur->fueImpresa()) : ?>
      <!-- Impreso pero no devuelto. Boton de Devolución -->
      <div id="fiscal" class="save-ok">
        <?php 
            $c = new Criteria();
            $c->add(LogsImpresorasPeer::FACTURA_ID, $fafactur->getId());
            $c->addDescendingOrderByColumn(LogsImpresorasPeer::CREATED_AT);
            $logimp = LogsImpresorasPeer::doSelectOne($c);
            //if(count($logimp)>0) $logimp=$logimp[0];
            //else $logimp=null
        ?>
        <h2>Factura Fiscal Nro: <span> <?php echo $logimp ? $logimp->getNumeroFactura() : "Sin Numero" ?> </span> </h2>
        <!-- Enviado a imprimir....esperando..r -->
      </div>
      <?php  echo button_to('Devolución de Factura Fiscal', 'fafactur/fiscal?devolver=true&id=' . $fafactur->getId(), array (
      'confirm' => "¿Desea devolver la factura en la impresora fiscal?"
      , 'class' => 'sf_admin_action_create float-center',)) ?>
    <?php elseif($fafactur->fueDevuelta()) : ?>
      <!-- Impreso y devuelto. Información de Devolución -->
      <div id="fiscal" class="warning-ok">
        <?php 
            $c = new Criteria();
            $c->add(LogsImpresorasPeer::FACTURA_ID, $fafactur->getId());
            $c->addDescendingOrderByColumn(LogsImpresorasPeer::CREATED_AT);
            $logimp = LogsImpresorasPeer::doSelectOne($c);
            //if(count($logimp)>0) $logimp=$logimp[0];
            //else $logimp=null
        ?>
        <h2>Factura Fiscal Devuelta Nro: <span> <?php echo $logimp ? $logimp->getNumeroDevolucion() : "Sin Numero" ?> </span> </h2>
        <!-- Enviado a imprimir....esperando..r -->
      </div>      
    <?php elseif($fafactur->huboError()) : ?>
      <!-- hubo un error al imprimir la factura -->
    <?php else : ?>
      <!-- Sin enviar a imprimir -->
      <?php  echo button_to('Enviar a Impresora Fiscal', 'fafactur/fiscal?id=' . $fafactur->getId(), array (
      'confirm' => "¿Desea enviar a la impresora fiscal?"
      , 'class' => 'sf_admin_action_create float-center',)) ?>      
    <?php endif; ?>
