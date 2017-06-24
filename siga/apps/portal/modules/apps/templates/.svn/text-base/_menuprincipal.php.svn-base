<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php function addMenu($menu, $app, $arrmenu, $usuario){?>
  <?php $i=0;
  foreach($menu as $m => $me){?>
    <?php if($app=="siga" && $m!="Seguridad" && $usuario!=''){
      //echo $arrmenu[$i];
      if($arrmenu[$i]==1){?>
        <li><a href="#<?php echo str_replace(array(' '),'',$m)?>" data-toggle="tab"><?php echo $m ?></a></li>
    <?php } }
    else{?>
        <li ><a href="#<?php echo str_replace(array(' '),'',$m)?>" data-toggle="tab"><?php echo $m ?></a></li>
  <?php } $i++;}?>
<?php }?>
       
<?php function addMenusub($menu){?>
  <?php foreach($menu as $m => $me){?>
    <li ><a class="span21 span22"  href="<?php echo str_replace(array(' '),'',$m)?>" data-toggle="tab"><?php echo $m ?></a></li>
  <?php }?>
<?php }?>

<?php function addMenureporte($menu){?>
  <li style="height: 35px"><a href="<?php echo str_replace(array(' '),'',$menu)?>" data-toggle="tab"><?php echo $menu ?></a></li>
<?php }?>


<?php
function addAcerca($modulo, &$tituloaux){
    ?>
    <?php if($modulo=='nomina'){?>
        <?php $tituloaux='TALENTO HUMANO';?>  <!--  MISMO NOMBRE QUE EN LA BD TABLA PUBLICIDAD    -->
        <li><a href='#escritorio' data-toggle="tab">Acerca de Talento Humano</a></li>
        
        <?php } else if($modulo=='finanzas'){?>
        <?php $tituloaux='FINANZAS';?>
        <li><a href="#escritorio" data-toggle="tab">Acerca de Finanzas</a></li>
        
        <?php } else if($modulo=='hacienda'){?>
        <?php $tituloaux='HACIENDA MUNICIPAL';?>
        <li><a href="#escritorio" data-toggle="tab">Acerca de Hacienda Municipal</a></li>
        
        <?php } else if($modulo=='compras'){?>
        <?php $tituloaux='COMPRAS';?>
        <li><a href="#escritorio" data-toggle="tab">Acerca de Compras</a></li>

        <?php } else if($modulo=='contabilidad'){?>
        <?php $tituloaux='CONTABILIDAD';?>
        <li><a href="#escritorio" data-toggle="tab">Acerca de Contabilidad Financiera</a></li>
        
        <?php } else if($modulo=='contratacionespublicas'){?>
        <?php $tituloaux='CONTRATACIONES PUBLICAS';?>
        <li><a href="#escritorio" data-toggle="tab">Acerca de Contrataciones Publicas</a></li>
        <?php }?>
<?php } ?>



<?php
function addAcerca2($modulo, &$arrtitulos){
    ?>
    <?php  
        if($modulo=='nomina'){?>
        <?php $arrtitulos[]='TALENTO HUMANO';?>  <!--  MISMO NOMBRE QUE EN LA BD TABLA PUBLICIDAD    -->
        
        <?php } else if($modulo=='finanzas'){?>
        <?php $arrtitulos[]='FINANZAS';?>
        
        <?php } else if($modulo=='hacienda'){?>
        <?php $arrtitulos[]='HACIENDA MUNICIPAL';?>
        
        <?php } else if($modulo=='compras'){?>
        <?php $arrtitulos[]='COMPRAS';?>

        <?php } else if($modulo=='contabilidad'){?>
        <?php $arrtitulos[]='CONTABILIDAD';?>
        
        <?php } else if($modulo=='contratacionespublicas'){?>
        <?php $arrtitulos[]='CONTRATACIONES PUBLICAS';?>

        <?php } else if($modulo=='bienes'){?>
        <?php $arrtitulos[]='BIENES NACIONALES';?>

        <?php } else if($modulo=='presupuesto'){?>
        <?php $arrtitulos[]='PRESUPUESTO';?>

        <?php } else if($modulo=='ingresos'){?>
        <?php $arrtitulos[]='INGRESOS';?>

        <?php } else if($modulo=='tesoreria'){?>
        <?php $arrtitulos[]='TESORERIA';?>

        <?php } else if($modulo=='ingresos'){?>
        <?php $arrtitulos[]='INGRESOS';?>

        <?php } else if($modulo=='ciudadanos'){?>
        <?php $arrtitulos[]='ATENCION AL CIUDADANO';?>

        <?php } else if($modulo=='documentos'){?>
        <?php $arrtitulos[]='CONTROL DE DOCUMENTOS';?>

        <?php } else { $arrtitulos[]=' '; }?>
<?php } ?>



<?php
function addModulorepor($menu, $app, &$num1){
    ?>
    <?php $num1++;?>
    <?php $num2=0;?>
    <div class="tab-pane" id="<?php echo str_replace(array(' '),'','Informes')?>" >
    <div class="accordion" id="<? echo str_replace(array(' '),'',$mo).$num1; ?>">      
      <?php foreach($menu as $mo => $modulo){
            if($modulo){?>
            <?php $num2++;?>
          <div class="accordion-group " >
          <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#<? echo str_replace(array(' '),'',$mo).$num1; ?>" href="#<? echo str_replace(array(' '),'',$mo).$num1.$num2; ?>">
                <?php echo $mo ?>
              </a>
            </div>

            <div id="<? echo str_replace(array(' '),'',$mo).$num1.$num2; ?>" class="accordion-body collapse ">
              <div class="accordion-inner">
                <ul>

            <?php foreach($modulo as $f => $formulario) { ?> <!-- Si contiene informacion luego del formulario-->
              <?php if(!is_array($formulario)) {
                    $miarreglo = explode ('-',$formulario);
                    ?>
               
                  <li><a href="/<?php echo $app ?>_dev.php/<?php echo strtolower($miarreglo[0]) ?>" target="_blank" style="font-size: 14px; line-height:100%"  data-toggle="tooltip" data-placement="right" title="<?php echo $miarreglo[1];?>"><?php echo $f ?></a></li>
          
              <?php } else {?>
               
                  <div>   <li type="circle"><?php echo $f ?></li></div>
               
                <?php foreach($formulario as $fi => $subformulario) {
                  $miarreglo2 = explode ('-',$subformulario);
                  ?>
                     
                  <li><a href="/<?php echo $app ?>_dev.php/<?php echo strtolower($miarreglo2[0]) ?>" target="_blank" style="font-size: 14px; line-height:100%" data-toggle="tooltip" data-placement="right" title="<?php echo $miarreglo2[1];?>"><?php echo $fi ?></a></li>
                    
                <?php } ?>
                   
              <?php } ?>
            <?php } ?>
                </ul>
              </div>
            </div>

           </div>
<?php }}?>
          </div>
          </div>
<?php } ?>
       
             









<?php
function addModulo($menu, $app, &$num1, &$esc, &$arrtitulos, $j, $arryml){?>


  <?php foreach($menu as $m => $me){?>
    <?php $num1++; ?>

    <div class="tab-pane" id="<?php echo str_replace(array(' '),'',$m)?>">
      <div style="margin-left: 5px;" > <!-- margin-top: -18px -->
        <div class="page-head">
          <h1><?php echo $m ?></h1>     <!-- Nombre del Menu-->
        </div>
        <br/><br/><br/><br/>    
        <?php $num2=0;?>
        <div class="accordion" id="<?php echo str_replace(array(' '),'',$m).$num1; ?>">


        <?php foreach($me as $mo => $modulo){ //Inicio del Modulo
            if($modulo){ //if(is_array($modulo))?>
            <?php $num2++;?>
         
          <!-- Contenedor de los menu del centro-->
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo str_replace(array(' '),'',$m).$num1; ?>" href="#<?php echo str_replace(array(' '),'',$mo).$num1.$num2; ?>">
                <?php echo $mo ?>
              </a>
            </div>
                              <!--           INICIA EL SUB MENU        -->
            <div id="<?php echo str_replace(array(' '),'',$mo).$num1.$num2; ?>" class="accordion-body collapse ">
              <div class="accordion-inner">
                <ul>

                <?php foreach($modulo as $f => $formulario) { ?> <!-- Si contiene informacion luego del formulario-->
                  <?php if(!is_array($formulario)) {
                      $miarreglo = explode ('-',$formulario);
                      ?>

                    <?php
                    $var=0;
                    if($j==0)
                    {
                      $var=1;
                    }
                    else
                    {
                      $varaux=$f.".yml";
                      for($l=0;$l<$j;$l++){
                        if($arryml[$l]==$varaux)
                        {
                          $var=1;
                        }
                      }
                    }
                      
                    ?>

                         
                      <?php
                        $app2="";
                        $app2=$f;
                        $dir = sfConfig::get('sf_root_dir').'/config/menus/'.$f.'.yml';
                        $yml = sfYaml::load($dir);
                        $menu = $yml[$f]['menu'];
                        $num3=0;
                        $esc++;
                        $bool=0;
                      ?>

          <?php foreach($menu as $mo => $modulo){ //Inicio del Modulo
            if($modulo){ //if(is_array($modulo))?>
            <?php $num3++; ?>

         
          <!-- Contenedor de los menu del centro-->
          <div class="accordion-group">
            <div class="accordion-heading">
              <?php if($bool==0 && $app='siga'){
                  addAcerca2($app2, $arrtitulos);
                  $bool=1;
                }
                if($var==1){?>
              
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo str_replace(array(' '),'',$mo).$num1.$num2; ?>" href="#<?php echo str_replace(array(' '),'',$mo).$num1.$num2.$num3; ?>">
                <?php echo $mo ?>
              </a>
            </div>
                              <!--           INICIA EL SUB MENU        -->
            <div id="<?php echo str_replace(array(' '),'',$mo).$num1.$num2.$num3; ?>" class="accordion-body collapse " >
              <div class="accordion-inner">
                <ul>

                <?php $num4=0;?>
                <?php foreach($modulo as $f => $formulario) { ?> <!-- Si contiene informacion luego del formulario-->
                  <?php if(!is_array($formulario)) {
                        $miarreglo = explode ('-',$formulario);
                        ?>
              
                      <li><a href="/<?php echo $app2 ?>_dev.php/<?php echo strtolower($miarreglo[0]) ?>" target="_blank" style="font-size: 14px; line-height:100%"  data-toggle="tooltip" data-placement="right" title="<?php echo $miarreglo[1];?>"><?php echo $f ?></a></li>
              
                  <?php } else {?>
          
            <?php $num4++;?>
            <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo str_replace(array(' '),'',$mo).$num1.$num2.$num3; ?>" href="#<?php echo str_replace(array(' '),'',$f).$num1.$num2.$num3.$num4; ?>">
                <?php echo $f;?>
              </a>
            </div>
                              <!--           INICIA EL SUB MENU        -->
            <div id="<?php echo str_replace(array(' '),'',$f).$num1.$num2.$num3.$num4; ?>" class="accordion-body collapse ">
              <div class="accordion-inner">
                <ul>


                <?php foreach($formulario as $f => $for) { ?> <!-- Si contiene informacion luego del formulario-->

                  <?php if(!is_array($for)) {
                        $miarreglo = explode ('-',$for);
                        ?>
              
                      <li type="disc"><a href="/<?php echo $app2 ?>_dev.php/<?php echo strtolower($miarreglo[0]);?>" target="_blank" style="font-size: 14px; line-height:100%"  data-toggle="tooltip" data-placement="right" title="<?php echo $miarreglo[1];?>"><?php echo $f ?></a></li>
              
                  <?php } else {?>
                   
                      <div><li type="circle"><?php echo $f ?></li></div>
                      

                      <?php $arreglo = explode (' ',$f);
                      if (strtolower($arreglo[0])=='informe' || strtolower($arreglo[0])=='informes' ) {
                      ?>

                        <?php foreach($for as $fi => $subformulario) {
                        $miarreglo2 = explode ('-',$subformulario);
                        ?>
                           
                        <li type="disc"><a href="/reportes/reportes/<?php echo $app2 ?>/<?php echo strtolower($miarreglo2[0]);?>" target="_blank" style="font-size: 14px; line-height:100%" data-placement="right" ><?php echo $fi ?></a></li>
                          
                        <?php } ?>

                      <?php }else{?>

                        <?php foreach($for as $fi => $subformulario) {
                        $miarreglo2 = explode ('-',$subformulario);
                        ?>
                           
                        <li type="disc"><a href="/<?php echo $app2 ?>_dev.php/<?php echo strtolower($miarreglo2[0]);?>" target="_blank" style="font-size: 14px; line-height:100%" data-toggle="tooltip" data-placement="right" title="<?php echo $miarreglo2[1];?>"><?php echo $fi ?></a></li>
                          
                        <?php } ?>

                      <?php }?>
                   
                    
                       
                  <?php } ?>



                <?php } ?>

                </ul>
              </div>
            </div>
          </div>


                
                  <?php } ?>
                <?php } ?>

                </ul>
              </div>
            </div>
          </div>
         
        <?php }?>
        <?php }   //Fin del Modulo?>







                  <?php }?>
                <?php } ?>
              <?php } ?>

                </ul>
              </div>
            </div>
          </div>
         
        <?php }?>
        <?php }   //Fin del Modulo?>
        </div>
       
        </div>

  </div><!--  Final tab-panel-->

 
<?php } }?>



<?php
$dir=CIDESA_CONFIG.'/menus/'.strtolower($app).'.yml';
cidesaTools::exitsfile($dir) ? $dir=$dir : $dir = sfConfig::get('sf_root_dir').'/config/menus/'.strtolower($app).'.yml';

$yml = sfYaml::load($dir);
$menu = $yml[$app]['menu'];
$modul1 = 'seguridad';
$dir1=CIDESA_CONFIG.'/menus/'.strtolower($modul1).'.yml';
cidesaTools::exitsfile($dir1) ? $dir1=$dir1 : $dir1 = sfConfig::get('sf_root_dir').'/config/menus/'.strtolower($modul1).'.yml';
$this->setAttribute('reportes', sfConfig::get('app_reportes'));
$this->setAttribute('reportes_web', sfConfig::get('app_reportes_web'));
$yml1 = sfYaml::load($dir1);
$menu1 = $yml1[$modul1]['menu'];
session_destroy();
session_start();
//$_SESSION["dir"] = $this->getAttribute('reportes');
$_SESSION['url'] = $this->getAttribute('reportes_web');
$_SESSION['symfony/user/sfUser/credentials'] = array('admin', 'Catalogo', 15);
$_SESSION['sesion_usuario']=session_id();
$_SESSION['x'] = sfConfig::get('app_contabilidadpresupuesto');
if (!isset($_SESSION['modulo'])){
    $_SESSION['modulo'] = $app;
}

$modul2 = $app;
$dirrep= sfConfig::get('app_reportes') .'reportes/reportes.yml';
cidesaTools::exitsfile($dirrep) ? $dirrep=$dirrep : $dirrep = sfConfig::get('app_reportes') .'reportes/reportes.yml';
$yml2 = sfYaml::load($dirrep);

$_SESSION['y'] =$dirrep;
#if($app!="siga"){
#$menu2 = $yml2[$modul2];
#$_SESSION['y'] =$menu2;
#}
if(!isset($_SESSION['futuro'])){
  $_SESSION['futuro']=date(" h:i:s", strtotime("+1 minutes"));
  $auxsesion=1;
}

//$_SESSION['futuro']=date(" h:i:s", strtotime("+1 minutes"));
#echo "futuro ".$_SESSION['futuro']."<br>";
#echo "ahora ".$_SESSION['ahora']=date(" h:i:s");

?>

<div id="SecondsUntilExpire" class="row" style="font-size: 14px;" >
  <div class= "span3">                                 <!--
 onmousemove="getElementById('<?php echo SeMovio; ?>').style.display='block';" 
   Añadido-->
    <?php $num1=0;
    $esc=0;
    $arrtitulos= array();
    $arrtitulos[]=" ";
    $arryml= array();
    $arryml[]=" ";
    $arrmenu= array();
    for($i=0;$i<20;$i++)
    {
      $arrmenu[]=0;
    }
    $tituloaux="";?>
    <?php
    if($usuario!='')
      include_partial('logout',array('usuario' => $usuario));
    else
      include_partial('login',array('app'=> $app));
    ?>
    <div class="tablaCont" >
      <p>Tabla de Contenido</p>
    </div>
    <div id="slider">
      <ul>    
        
        <?php addAcerca($_SESSION['modulo'], $tituloaux);?><!--   SE LLENA LA PARTE DE ACERCA DEPENDIENDO DEL MODULO  -->

        
      <?php if($app=='siga'){?>
        <li style="list-style-type:none"><a class="accordion-toggle" style="margin-bottom: 2px;" href="#<?php echo 'escritorio'; ?>" data-toggle="tab">Acerca de SIGA</a></li>
      <?php } ?>

      <?php
      $j=0; if($usuario!='' && $app=="siga"){?>
      
      <?php
      $i=0;
      foreach ($resu as $innerArray) {
        if (is_array($innerArray)){
          foreach ($innerArray as $value) {
            $arryml[$j] = $value;
            $j++;?>
            
        <?php 
          $dir = sfConfig::get('sf_root_dir').'/config/menus/siga.yml';
          $yml = sfYaml::load($dir);
          $menu = $yml['siga']['menu'];
        ?>
        <?php foreach($menu as $m => $me){?>
          <?php foreach($me as $mo => $modulo){?>
            <?php foreach($modulo as $f => $formulario) { 
              $var=explode('.', $value);?> 

            <?php if($f == $var[0]){
              $arrmenu[$i]=1;
            }?>

            <?php }?>
          <?php }?>
        <?php }?>


    <?php   }
          } $i++;
        }?>

        <?php }?>

        <?php addMenu($menu, $app, $arrmenu, $usuario);?><!--   Se cargan las opciones principales del modulo  -->
        <?php if($usuario!='' && $app!='siga'){ ?>
        <?//php addMenureporte('Informes');?><!--   Se cargan los resportes del modulo  -->
        <?php }?>
        <?php addMenu($menu1, $app, $arrmenu, $usuario);?><!--   Se carga la opcion de seguridad del modulo  -->

        <li><a href="#plataforma" data-toggle="tab" >Plataforma Tecnológica</a></li>
        <li><a href="#simuladores" data-toggle="tab">Simuladores</a></li>
      </ul>
    </div>

    <div id="slider2">                 
      <ul>

        <?php include_partial('conteinf'); // Se Agrega la 2da parte del Menu?>
      
      </ul>
    </div>
    <div class="contacto">
      <p>Modelo de Servicios</p>
      <div style="margin-top: 5px;"><a href="https://google.com.ve"><img style="width: 68%;" src="/images/cajaregistro/bt.png"></img></a><a href="https://google.com.ve"><p style="font-size: 12px;">Telefonos</p></a></div>

      <div style="margin-top: 5px;"><div style="width: 70%; margin-left: 14px;"><?php echo link_to(image_tag('/images/cajaregistro/bc.png'),'@apps', array('query_string' => 'm='.$app));?></div>
      <p style="font-size: 12px;"><?php echo link_to('Correo Electronico','@apps', array('query_string' => 'm='.$app))?></p></div>
     
      <div style="margin-top: 5px;"><div style="width: 72%; margin-left: 14px;"><?php echo link_to(image_tag('/images/cajaregistro/at.png'),'home/acerca');?></div>
      <p style="font-size: 12px;"><?php echo link_to('Atención Remota','home/acerca')?></p></div>
    </div>
  </div><!-- fin span3-->

    <div class="tab-content span7" style="height: 100%;" >
       
      <?php if($app=="siga"){?>
      <?php addModulo($menu, $app, $num1,$esc,$arrtitulos, $j,$arryml);?>  <!-- Agrega los modulos configuracion y gestion-->
      <?php }else { 
        addModuloVIEJO2($menu, $app, $num1, $usuario,$permisos);
      //  addModuloVIEJO2($menu, $app, $num1);
        }?>
      
      <?php addModuloVIEJO($menu1, 'autenticacion', $num1);?> <!-- Agrega el modulo seguridad-->
      <?php if($usuario!='' && $app!='siga'){ ?>
      <?//php addModulorepor($menu2, $app, $num1);?>
      <?php }?>
     
      <div class="tab-pane active" >
        <?php if($app=='nomina'){?> 
          <?php if($usuario!=''){ ?>
            <div style="height:400px;width: 700px;"> 
              <div class="page-head" style="width: 52%;">
                <h1>Bienvenido</h1>     <!-- Nombre del Menu-->
              </div>
              <div class="page-sub-head" style="width: 54%;">
                <h1>Gestión del Talento Humano</h1>     <!-- Nombre del Menu-->
              </div>          
              <img src="/images/roraimainicio2.png" style="width: 99%;margin-left: 5px;"/>
              <div class="content-img-top">
                <p>Sistema de Información Automatizado en Software Libre para la Integración de la Gestión Administrativa que Regula las Situaciones y Relaciones del Trabajador</p>
              </div>
            </div>
            <?php }else{ ?>
            
            <h1 style="text-align: center">GESTIÓN DEL TALENTO HUMANO</h1><br>
            <center><img src="/images/gth.png" style="width: 75%;margin-left: 5px;"/></center>
            <br><p style="text-align: center; font-size: 16px;">Bienvenido a la aplicación Roraima Talento Humano de Cidesa</p>
            
          <?php }?>
        <?php }?>
        <?php if($app=='siga'){?> 
          <?php if($usuario!=''){ 
            //session_start(); //to ensure you are using same session
            //session_destroy(); //destroy the session
            //header("location:siga"); //to redirect back to "index.php" after logging out
            //exit();
            ?>
            <div style="height:400px;width: 700px;"> 
              <div class="page-head" style="width: 52%;">
                <h1>Bienvenido</h1>     <!-- Nombre del Menu-->
              </div>
              <div class="page-sub-head" style="width: 54.6%;">
                <h1>SIGA</h1>     <!-- Nombre del Menu-->
              </div>          
              <img src="/images/roraimainicio2.png" style="width: 99%;margin-left: 5px; height: auto;"/>
              <div class="content-img-top" style="margin-right: 0px;margin-left: 0px;">
                <p> Sistema de Información Automatizado para la Integración de la Gestión Administrativa, Financiera y Recursos Humanos de Ministerios, Empresas, Institutos de Educación y Institutos Autónomos del Estado. Adaptado a la Legislación Venezolana.</p>
              </div>
            </div>
            <?php }else{ ?>
            
            <h1 style="text-align: center">SIGA</h1><br>
            <center><img src="/images/gth.png" style="width: 75%;margin-left: 5px;"/></center>
            <br><br><p style="text-align: center; font-size: 16px;">Bienvenido a la aplicación SIGA de Cidesa</p>
            
          <?php }?>
        <?php }?>
      </div>



        <?php if($app=="siga"){
          $num1=0;
          $num2=0;
          $i=0;?>
        <div class="tab-pane" id="<?php echo 'escritorio'; ?>" style="height: 1000px;">
          
          <br>
          <?php echo link_to(image_tag('/images/siga.jpg', array('class' => 'centradoi','style' => 'width: 50%')),'/apps/index'.'?m=siga')?>
          <br><p class="justificadot" style="margin-left: 20px;margin-right: 20px; font-size: 16px;">
            Sistema de Información Automatizado para la Integración de la Gestión Administrativa,
            Financiera y Recursos Humanos de Ministerios, Empresas, Institutos de Educación y 
            Institutos Autónomos del Estado. Adaptado a la Legislación Venezolana.
          </p>
          <br><p class="justificadot" style="margin-left: 20px;margin-right: 20px; font-size: 16px;">
            Está conformado por los siguientes Sub-Sistemas: 
          </p><br>
          
        <?php 
          $dir = sfConfig::get('sf_root_dir').'/config/menus/siga.yml';
          $yml = sfYaml::load($dir);
          $menu = $yml['siga']['menu'];
        ?>
        <?php foreach($menu as $m => $me){?>

          <div class="accordion-group">
            <div style="margin-left: 20px;">
              <a data-toggle="collapse" data-parent="#<?php echo 'acerca'.$num1; ?>" href="#<?php echo 'acerca'.$num1; ?>" style="font-size: 16px;">
                <?php echo " + ".$m ?>
              </a>
            </div>

            <div id="<?php echo 'acerca'.$num1; ?>" class="accordion-body collapse " >
              <div class="accordion-inner">
                <p style="margin-left: 20px;">Integrado por:</p>
        <?php foreach($me as $mo => $modulo){ 
          $num1++;
          $num2++;//Inicio del Modulo?>

          <div class="accordion-group">
            <div style="margin-left: 20px; font-size: 16px;">
              <a data-toggle="collapse" data-parent="#<?php echo 'acerca'.$num1.$num2; ?>" href="#<?php echo 'acerca'.$num1.$num2; ?>" style="font-size: 16px;">
                <?php echo " + ".$mo ?>
              </a>
            </div>
          
          <?php foreach($modulo as $f => $formulario) { ?> <!-- Si contiene informacion luego del formulario-->
          <?php if(!is_array($formulario)) {
            $i++;
          ?>

        <?php foreach ($escritorio as $v => $key) : ?>         <!-- Acerca  -->
             <?php if($key->getTitpub()==$arrtitulos[$i]){
                $arrlisto[$i]=0;
              ?>
            <div id="<?php echo 'acerca'.$num1.$num2; ?>" class="accordion-body collapse " >
              <div class="accordion-inner">
              <?php echo link_to(image_tag($key->getImgpub(), array('class' => 'centradoi','style' => 'width: 50%')),'/apps/index'.$key->getLinkpub())?>
              <br><p class="justificadot" style="margin-left: 20px;margin-right: 20px; font-size: 16px;">
                      
              <?php $ar=fopen($key->getDespub(),"r") or die("No se pudo abrir el archivo");
                while (!feof($ar))
                {
                  $linea=fgets($ar);
                  $lineasalto=nl2br($linea);
                  echo $lineasalto;
                }
                fclose($ar);
              ?>
              </p>
              <?php echo link_to('Ver mas...','/apps/index'.$key->getLinkpub()) ?>
              </div>
            </div>     
            <?php }?>
        <?php endforeach; ?>
        
        <?php }?>
        <?php }?>
      </div>
        <?php }?>

              
            </div>
          </div>
        </div>
            <?php }?>
        </div>
        <?php }else{?>

        <div class="tab-pane" id="escritorio" style="height: 1000px;">
         
          <?php foreach ($escritorio as $v => $key) : ?>          <!-- Acerca  -->
                
            <?php if($key->getTitpub()==$tituloaux){?>
                      
              <!--<h2 style="text-align: center"><?php echo $key->getTitpub() ?></h2> -->
              <br>
              <?php echo link_to(image_tag($key->getImgpub(), array('class' => 'centradoi','style' => 'width: 50%')),'/apps/index'.$key->getLinkpub())?>
              <br><p class="justificadot" style="margin-left: 20px;margin-right: 20px; font-size: 16px;">
                      
              <?php $ar=fopen($key->getDespub(),"r") or die("No se pudo abrir el archivo");
                while (!feof($ar))
                {
                  $linea=fgets($ar);
                  $lineasalto=nl2br($linea);
                  echo $lineasalto;
                }
                fclose($ar);
              ?>
              </p>
              <?php echo link_to('Ver mas...','/apps/index'.$key->getLinkpub()) ?>
                    
            <?php }?>
          <?php endforeach; ?> 
        
        </div>
        <?php }?>

        <div class="tab-pane" id="plataforma">
          <div  style="margin-left: 5px">
            <div class="page-head">
            <h1>Plataforma Tecnológica</h1>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="garantias">
          <div  style="margin-left: 5px">
            <div class="page-head">
            <h1>Garantías</h1>
            </div>
         </div>
        </div>
        <div class="tab-pane" id="foros">
          <div  style="margin-left: 5px">
            <div class="page-head">
            <h1>Foros</h1>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="simuladores">
          <div  style="margin-left: 5px">
            <div class="page-head">
            <h1>Simuladores</h1>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="capacitaciones">
          <div  style="margin-left: 5px">
            <div class="page-head">
            <h1>Capacitaciones</h1>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="preparacion">
          <div  style="margin-left: 5px">
            <div class="page-head">
            <h1>Preparación de la Data</h1>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="cambios">
          <div  style="margin-left: 5px">
            <div class="page-head">
            <h1>Cambios y adaptaciones</h1>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="produccion">
          <div  style="margin-left: 5px">
            <div class="page-head">
            <h1>Puesta en Producción</h1>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="privacidad">
          <div  style="margin-left: 5px">
            <div class="page-head">
            <h1>Privacidad</h1>
            </div>
          </div>
        </div>
      </div>
</div>




<?php
function addModuloVIEJO($menu, $app, &$num1){?>

  <?php foreach($menu as $m => $me){?>
    <?php $num1++;?>

    <div class="tab-pane" id="<?php echo str_replace(array(' '),'',$m)?>">
      <div style="margin-left: 5px;" > <!-- margin-top: -18px -->
        <div class="page-head">
          <h1><?php echo $m ?></h1>     <!-- Nombre del Menu-->
        </div>
        <br/><br/><br/><br/>    
        <?php $num2=0;?>
        <div class="accordion" id="<?php echo str_replace(array(' '),'',$m).$num1 ?>">

        <?php if( $app!='finanzas') { ?>

        <?php foreach($me as $mo => $modulo){ //Inicio del Modulo
            if($modulo){ //if(is_array($modulo))?>
            <?php $num2++;?>
         
          <!-- Contenedor de los menu del centro-->
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo str_replace(array(' '),'',$m).$num1 ?>" href="#<?php echo str_replace(array(' '),'',$mo).$num2?>">
                <?php echo $mo ?>
              </a>
            </div>
                              <!--           INICIA EL SUB MENU        -->
            <div id="<?php echo str_replace(array(' '),'',$mo).$num2?>" class="accordion-body collapse ">
              <div class="accordion-inner">
                <ul>

                <?php foreach($modulo as $f => $formulario) { ?> <!-- Si contiene informacion luego del formulario-->
                  <?php if(!is_array($formulario)) {
                        $miarreglo = explode ('-',$formulario);
                        ?>
                   
                      <li><a href="/<?php echo $app ?>_dev.php/<?php echo strtolower($miarreglo[0]) ?>" target="_blank" style="font-size: 14px; line-height:100%"  data-toggle="tooltip" data-placement="right" title="<?php echo $miarreglo[1];?>"><?php echo $f ?></a></li>
              
                  <?php } else {?>
                   
                      <div><li type="circle" style="font-size: 14px"><?php echo $f ?></li></div>
                      

                      <?php $arreglo = explode (' ',$f);
                      if (strtolower($arreglo[0])=='informe' || strtolower($arreglo[0])=='informes' ) {
                      ?>

                        <?php foreach($formulario as $fi => $subformulario) {
                        $miarreglo2 = explode ('-',$subformulario);
                        ?>
                           
                        <li><a href="/reportes/reportes/<?php echo $app ?>/<?php echo strtolower($miarreglo2[0]) ?>" target="_blank" style="font-size: 14px; line-height:100%" data-placement="right" ><?php echo $fi ?></a></li>
                          
                        <?php } ?>

                      <?php }else{?>

                        <?php foreach($formulario as $fi => $subformulario) {
                        $miarreglo2 = explode ('-',$subformulario);
                        ?>
                           
                        <li><a href="/<?php echo $app ?>_dev.php/<?php echo strtolower($miarreglo2[0]) ?>" target="_blank" style="font-size: 14px; line-height:100%" data-toggle="tooltip" data-placement="right" title="<?php echo $miarreglo2[1];?>"><?php echo $fi ?></a></li>
                          
                        <?php } ?>

                      <?php }?>
                   
                    
                       
                  <?php } ?>
                <?php } ?>

                </ul>
              </div>
            </div>
          </div>
         
        <?php }?>
        <?php }   //Fin del Modulo?>
        </div>
       
        <?php }else{ ?><!-- Fin del if de finanzas-->
         <div  class="tabbable tabs-left">
        
              <ul class="nav nav-tabs " style="margin-left: -30px;margin-top: -3px;">
              <?php addMenusub($me);?>
              </ul>
            
              <div class="tab-content ">
              
                <?php $indice=0; $pala=""; $ind=0;
                 foreach($me as $f => $for) {
                  $pala=$pala.$f.'-';
                }?>
                <?php $mipal = explode ('-',$pala);//aqui ya se guardaron ?>
                <?php foreach($me as $f => $for) { ?><!--kx4 -->
              
                <?php if($indice==0) {  ?>
                                          <!-- aqui debe ir el titulo   -->
                <div class="tab-pane active " id="<?php echo str_replace(array(' '),'',$f)?>">
                                          <!-- subacordion -->
                  <div class="page-head" style="width: 50%;height:10%">
                    <h1 style="font-size:25px;"><?php echo $f ?></h1>     <!-- Nombre del Menu-->
                  </div>
                  <br><br></br></br>
                  <div class='accordion' id="<? echo str_replace(array(' '),'',$f).$num1; ?>">

                    <?php foreach($for as $def => $formu) { ?>
                        <?php $num2++;?>
                      <div class="accordion-group">
                          <div class="accordion-heading">
                            <a style="width: 75%;background-image: url('/images/fndtitulo.png') no-repeat right bottom ;" class="accordion-toggle" data-toggle="collapse" data-parent="#<? echo str_replace(array(' '),'',$f).$num1; ?>" href="#<? echo str_replace(array(' '),'',$def).$num2; ?>" >
                              <?php echo $def ?>
                            </a>
                          </div>
                          <div id="<? echo str_replace(array(' '),'',$def).$num2; ?>" class="accordion-body collapse ">
                              <div class="accordion-inner">
                                <ul>

                                  <?php foreach($formu as $formularios => $archivos) { ?>
                                  <li ><a href="/<?php echo $app ?>_dev.php/<?php echo strtolower($archivos) ?>" target="_blank"><?php echo $formularios ?>
                                  </a></li>
                                  <?php } ?>

                                </ul>
                              </div>
                          </div>
                      </div>
                      <?php } ?>

                  </div>
 
                </div>
                <?php $indice=1; ?>
      
                <?php } else { ?><!--kx3 -->
    
                  <div class="tab-pane " id="<?php echo str_replace(array(' '),'',$f)?>">
                                        <!-- subacordion -->
                        <div class="page-head" style="width: 50%;height:10%">
                          <h1 style="font-size:25px;"><?php echo $f ?></h1>     <!-- Nombre del Menu-->
                        </div>
                        <br><br></br></br>
                         <div class="accordion" id="<? echo str_replace(array(' '),'',$f).$num1; ?>">

                          <?php foreach($for as $def => $formu) { ?>
                              <?php $num2++;?>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                  <a style="width: 75%;background-image: url('/images/fndtitulo.png') no-repeat right bottom ;" class="accordion-toggle" data-toggle="collapse" data-parent="#<? echo str_replace(array(' '),'',$f).$num1; ?>" href="#<? echo str_replace(array(' '),'',$def).$num2; ?>" >
                                    <?php echo $def ?>
                                  </a>

                                </div>

                                <div id="<? echo str_replace(array(' '),'',$def).$num2; ?>" class="accordion-body collapse ">
                                    <div class="accordion-inner" >
                                      <ul>

                                        <?php foreach($formu as $formularios => $archivos) { ?>
                                        <li  ><a  href="/<?php echo $app ?>_dev.php/<?php echo strtolower($archivos) ?>" target="_blank"><?php echo $formularios ?>
                                        </a></li>

                                        <?php } ?>

                                      </ul>
                                    </div>
                                </div>  

                            </div>
                            <?php } ?>
                         </div>
       
                  </div>
                  <?php } ?><!--kx3 -->

                <?php }    ?><!--kx4 -->
   
              </div>
        </div></div>
<?php } ?>
  </div> </div><!--  Final tab-panel-->
<?php } ?>

<?php }?>

<?php function addModuloVIEJO2($menu, $app, &$num1, $usuario,$permisos){
         if($usuario != ''){?>
  <?php foreach($menu as $m => $me){?>
    <?php $num1++;?>

    <div class="tab-pane" id="<?php echo str_replace(array(' '),'',$m)?>">
      <div style="margin-left: 5px;" > <!-- margin-top: -18px -->
        <div class="page-head">
          <h1><?php echo $m ?></h1>     <!-- Nombre del Menu-->
        </div>
        <br/><br/><br/><br/>    
        <?php $num2=0; $i=0;?>
        <div class="accordion" id="<?php echo 'accordion'.$num1; ?>">

        <?php if( $app!='finanzas') { ?>

        <?php foreach($me as $mo => $modulo){ //Inicio del Modulo
            if($modulo){ //if(is_array($modulo))?>
            <?php $num2++;?>
         
          <!-- Contenedor de los menu del centro-->
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo 'accordion'.$num1; ?>" href="#<?php echo 'collapse'.$num1.$num2; ?>">
                <?php echo $mo ?>
              </a>
            </div>
                
                              <!--           INICIA EL SUB MENU        -->
            <div id="<?php echo 'collapse'.$num1.$num2; ?>" class="accordion-body collapse ">
              <div class="accordion-inner">
                <ul>
               <?php    $j=0;
              $perm=array();
      foreach ($permisos as $miArray) {
        if (is_array($miArray)){
          foreach ($miArray as $value) {
          // echo $value;
            $perm[$j] = $value;
         // echo $perm[$j].'  ';
      $j++;}}}
            $imprimir=''; $i=0;
               foreach($modulo as $f => $formulario) { ?> <!-- Si contiene informacion luego del formulario-->
               <?php //foreach($permisos as $miarray){?>
                  <?php if(!is_array($formulario)) {
                        $miarreglo = explode ('-',$formulario);
                       // foreach($permisos as $miarray){
                      //  $perm= str_ireplace(array('(',')'),'',explode('=>', print_r($miArray,TRUE)));
                        
                       
               
                    
                    foreach($perm as $valor){
                        ?><!--<h1>permisooooos</h1>!--><?php  
                      //echo $valor;?>
                <!--<h1>areglooo (yml)</h1>!-->
                 <?php  //echo $miarreglo[0];
                      if($valor==$miarreglo[0]){
                         // $miarreglo[0]= next ($miarreglo);
                        //echo $valor;
                        $imprimir[$i]=$valor;
                    
                     ?>
       
                      <li><a href="/<?php echo $app ?>_dev.php/<?php echo strtolower($miarreglo[0]) ?>" target="_blank" style="font-size: 14px; line-height:100%"  data-toggle="tooltip" data-placement="right" title="<?php echo $miarreglo[1];?>"><?php echo $f ?></a></li>
              
          <?php }}}/*else{*/ /*$i++; */  else {?>
                   
                      <div><li type="circle" style="font-size: 14px"><?php echo $f ?></li></div>
                      
  
                      <?php $arreglo = explode (' ',$f);
                      if ((strtolower($arreglo[0])=='informe' || strtolower($arreglo[0])=='informes') && $usuario!='' ) {
                      ?>

                        <?php foreach($formulario as $fi => $subformulario) {
                        $miarreglo2 = explode ('-',$subformulario);
                        ?>
                           
                        <li><a href="/reportes/reportes/<?php echo $app ?>/<?php echo strtolower($miarreglo2[0]) ?>" target="_blank" style="font-size: 14px; line-height:100%" data-toggle="tooltip" data-placement="right"  title="<?php echo $miarreglo2[1];?>"> <?php echo $fi ?></a></li>
                          
                        <?php } ?>

                      <?php }else{$h=0;?>
                        
                        <?php foreach($formulario as $fi => $subformulario) {
                        $miarreglo2 = explode ('-',$subformulario);
                        foreach($perm as $valor1){
                        if($valor1==$miarreglo2[0]){
                         // $miarreglo[0]= next ($miarreglo);
                        //echo $valor;
                        $imprimir1[$h]=$valor1;
                    
                        ?>
                          
                        <li><a href="/<?php echo $app ?>_dev.php/<?php echo strtolower($miarreglo2[0]) ?>" target="_blank" style="font-size: 14px; line-height:100%" data-toggle="tooltip" data-placement="right" title="<?php echo $miarreglo2[1];?>"><?php echo $fi ?></a></li>
                          
                        <?php  }
                        }}?>

                      <?php }?>
                   <?php }?>
                    
                       
                  <?php } ?>
                <?php } ?>

                </ul>
              </div>
            </div>
          </div>
         
        
         
        <?php }   //Fin del Modulo?>
        </div>
       
        <?php }else{ ?><!-- Fin del if de finanzas-->
         <div  class="tabbable tabs-left">
        
              <ul class="nav nav-tabs " style="margin-left: -30px;margin-top: -3px;">
              <?php addMenusub($me);?>
              </ul>
            
              <div class="tab-content ">
              
                <?php $indice=0; $pala=""; $ind=0;
                 foreach($me as $f => $for) {
                  $pala=$pala.$f.'-';
                }?>
                <?php $mipal = explode ('-',$pala);//aqui ya se guardaron ?>
                <?php foreach($me as $f => $for) { ?><!--kx4 -->
              
                <?php if($indice==0) {  ?>
                                          <!-- aqui debe ir el titulo   -->
                <div class="tab-pane active " id="<?php echo str_replace(array(' '),'',$f)?>">
                                          <!-- subacordion -->
                  <div class="page-head" style="width: 50%;height:10%">
                    <h1 style="font-size:25px;"><?php echo $f ?></h1>     <!-- Nombre del Menu-->
                  </div>
                  <br><br></br></br>
                  <div class="accordion" id="<?php echo 'accordion'.$num1; ?>">

                    <?php foreach($for as $def => $formu) { ?>
                        <?php $num2++;?>
                      <div class="accordion-group">
                          <div class="accordion-heading">
                            <a style="width: 75%;background-image: url('/images/fndtitulo.png') no-repeat right bottom ;" class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo 'accordion'.$num1; ?>" href="#<?php echo 'collapse'.$num1.$num2; ?>" >
                              <?php echo $def ?>
                            </a>
                          </div>
                          <div id="<?php echo 'collapse'.$num1.$num2; ?>" class="accordion-body collapse ">
                              <div class="accordion-inner">
                                <ul>

                                  <?php foreach($formu as $formularios => $archivos) { ?>
                                  <li ><a href="/<?php echo $app ?>_dev.php/<?php echo strtolower($archivos) ?>" target="_blank"><?php echo $formularios ?>
                                  </a></li>
                                  <?php } ?>

                                </ul>
                              </div>
                          </div>
                      </div>
                      <?php } ?>

                  </div>
 
                </div>
                <?php $indice=1; ?>
      
                <?php } else { ?><!--kx3 -->
    
                  <div class="tab-pane " id="<?php echo str_replace(array(' '),'',$f)?>">
                                        <!-- subacordion -->
                        <div class="page-head" style="width: 50%;height:10%">
                          <h1 style="font-size:25px;"><?php echo $f ?></h1>     <!-- Nombre del Menu-->
                        </div>
                        <br><br></br></br>
                         <div class="accordion" id="<?php echo 'accordion'.$num1; ?>">

                          <?php foreach($for as $def => $formu) { ?>
                              <?php $num2++;?>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                  <a style="width: 75%;background-image: url('/images/fndtitulo.png') no-repeat right bottom ;" class="accordion-toggle" data-toggle="collapse" data-parent="#<? echo "accordion".$num1; ?>" href="#<? echo "collapse".$num1.$num2; ?>" >
                                    <?php echo $def ?>
                                  </a>

                                </div>

                                <div id="<?php echo 'collapse'.$num1.$num2; ?>" class="accordion-body collapse ">
                                    <div class="accordion-inner" >
                                      <ul>

                                        <?php foreach($formu as $formularios => $archivos) { ?>
                                        <li  ><a  href="/<?php echo $app ?>_dev.php/<?php echo strtolower($archivos) ?>" target="_blank"><?php echo $formularios ?>
                                        </a></li>

                                        <?php } ?>

                                      </ul>
                                    </div>
                                </div>  

                            </div>
                            <?php } ?>
                         </div>
       
                  </div>
                  <?php } ?><!--kx3 -->

                <?php }    ?><!--kx4 -->
   
              </div>
        </div></div>
<?php } ?>
  </div> </div><!--  Final tab-panel-->
<?php } ?>
 
 


<?php } else { ?>
  <h3> Debes Logearte para visualizar las opciones</h3>
  
<?php } }?>