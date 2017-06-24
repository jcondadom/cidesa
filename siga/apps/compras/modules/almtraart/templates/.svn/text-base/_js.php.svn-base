 <script type="text/javascript">
 function formapreimpresa()
  {
      var  codtra='<? echo $catraalm->getCodtra();?>';

      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
      
      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/compras/r.php?r=cartraalm.php&codtrades="+codtra+"&codtrahas="+codtra;

      window.open(pagina,codtra,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");      
  }

   var id='<?php echo $catraalm->getId()?>';
    if (id!="")    
      $('trigger_catraalm_fectra').hide();

  </script>