<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

  <?php use_helper('Javascript', 'wait') ?>

  <?php include_metas() ?>

  <?php include_title() ?>

  <link href="/css/bootstrap/bootstrap.less" rel="stylesheet/less" type="text/css">
  <link href="/css/application.less" rel="stylesheet/less" type="text/css">
  <link href="/css/DT_bootstrap.css" rel="stylesheet/less" type="text/css">

  <!-- Javascript -->
  <script src="/js/jquery-1.7.2.min.js" type="text/javascript"></script>
  <script src="/js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script>
  <script src="/js/jquery-dataTables.js" type="text/javascript"></script>
  <script src="/js/DT_bootstrap.js" type="text/javascript"></script>
  
  
  <script src="/js/bootstrap/bootstrap-collapse.js" type="text/javascript"></script>
  <script src="/js/bootstrap/bootstrap-transition.js" type="text/javascript"></script>
  <script src="/js/bootstrap/bootstrap-scrollspy.js" type="text/javascript"></script>
  <script src="/js/bootstrap/bootstrap-dropdown.js" type="text/javascript"></script>
  <script src="/js/bootstrap/bootstrap-alerts.js" type="text/javascript"></script>
  <script src="/js/bootstrap/bootstrap-modal.js" type="text/javascript"></script>
  <script src="/js/application.js" type="text/javascript"></script>
  <script src="/js/less-1.1.3.min.js" type="text/javascript"></script>

  <link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
<?php echo wait() ?>
  <!-- Header:Start -->
  <div class="header">
    <!-- Logo de la empresa del cliente -->
    <?php echo link_to(image_tag('logo-cidesa-new.jpg',array('style'=>"width: 50px;")), "principal/index", array('class' =>
    'brand logo')) ?>
    <!-- Información de la sesión -->
    <p class="pull-right">
      Usuario:
      <a href="#" class="username"><?php echo $sf_user->getAttribute('usuario','Sin Autenticar') ?></a>
      <a href="<?php if (SF_ENVIRONMENT=='dev') echo "/".sfConfig::get('app_autenticacion')."_dev.php/login/logout"; else echo "/".sfConfig::get('app_autenticacion').".php/login/logout"; ?>">[ salir ]</a>
      <br>
      Empresa:
      <a href="#" class="username"><?php if(isset($_SESSION["nomemp"])) echo $_SESSION["nomemp"] ?></a>
    </p>

    <!-- Menú -->
    <ul class="main-tabs" data-dropdown="dropdown">
      <!-- Opciones Principales -->
      <li class="active first">
        <a href="#">
          <?php echo ucfirst($sf_context->getModuleName())  ?></a>
      </li>
      <li class="first">
        <a href="/<?php echo sfConfig::get('sf_app').(SF_ENVIRONMENT=='dev' ? '_dev' : '').'.php' ?>/principal">Menú Principal</a>
      </li>
      <li>
        <a href="#" class="dropdown-toggle">Reportes Favoritos</a>
        <ul class="dropdown-menu">
          <li>
            <?php echo link_to("Reporte 1", "reporte1/index") ?></li>
          <li>
            <?php echo link_to("Reporte 2", "reporte2/index") ?></li>
          <li>
            <?php echo link_to("Reporte 3", "reporte2/index") ?></li>
        </ul>

      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle">Procesos Favoritos</a>
        <!-- Subopciones -->
        <ul class="dropdown-menu">
          <li>
            <?php echo link_to("Formulario Favorito 3", "opedeftipequ/index") ?></li>
          <li>
            <?php echo link_to("Formulario Favorito 3", "opedefestequ/index") ?></li>
          <li>
            <?php echo link_to("Formulario Favorito 3", "opedeftipest/index") ?></li>

        </ul>
      </li>

      <!-- Opciones Secundarias -->
      <li class="secondary">
        <a href="javascript: var w = window.open('<?php if (SF_ENVIRONMENT=='dev') echo "/".sfConfig::get('app_autenticacion')."_dev.php/ayudas?m=".sfConfig::get('app_this'); else echo "/".sfConfig::get('app_autenticacion').".php/ayudas?m=".sfConfig::get('app_this'); ?>')">Ayuda</a>
      </li>
      <li class="secondary">
        <a href="javascript: var w = window.open('http://wiki.cidesa.com.ve')">Comunidad</a>
      </li>
      <li class="secondary">
        <a href="<?php echo "javascript:self.close()"; ?>">Cerrar</a>
      </li>
    </ul>
  </div>
  <!-- Header:End -->

  <div class="container-fluid">
    <?php echo $sf_content ?></div>

  <footer>
    <div><p style="text-align:center">Licencia GNU GPL v2. Cidesa 2012</p></div>

    <div id="catalogo" class="modal hide" style="display: none;" data-toggle="modal" >
      <div class="modal-header">
        <a class="close" href="#">×</a>
        <h3>Catálogo de Búsqueda</h3>
      </div>
      <div class="modal-body">
        <img id="loading_catalogo" class="center" src="/images/loading.gif">
        <div id="grid-search">
          <!-- Divs de Catalogos -->
          
        </div>
      </div>
      <div class="modal-footer">
        <a id="close-catalogo" class="btn danger close" href="#">Cerrar</a>
      </div>
    </div>
  </footer>
</body>
</html>

<script type="text/javascript">
  jQuery('#close-catalogo').click(function() {
    jQuery('#catalogo').modal('hide');
  });

  jQuery('.close').click(function() {
    jQuery('#catalogo').modal('hide');
  });

</script>