<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<!-- =========================Zona de Mercadeo======================== -->
<div class="marketing margensuperior margeninferior2 container contenedor" style="background-image: url('/images/fondo1.jpg');background-size:1000px 650px;;height: 625px;">
    <br><br><br><br><br><br><br>
    <!-- ================= Tweet ================= 
    <div class="container margensuperior margeninferior">
        <div class="span3 margensuperior3">
            <a href="https://twitter.com/CIDESA" target="_blank"><img class="logot" align="right" src="/images/logot.png"></a>
        </div>   
        <div class="span5">

            <div class="container" id="ultimotweet">
                <script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
                <script src="/bootstrap/js/Utweet.js"></script>
            </div>
        </div>
        <div class="alignli alignlt tweetbutton">
            <a href="https://twitter.com/cidesa" class="twitter-follow-button" data-show-count="false" data-lang="es">Seguir a @cidesa</a>
        </div>
    </div>
    <!-- ================= Tweet ================= -->
    <!-- ================= Ingrese al Sistema ================= -->
    <center>
    <div class="well ingSistema2">
      <div>
        

          <?php if($usuario==''){?>
        <div id="sf_guard_auth_form" class="login" style="width: 500px;">
          <div class="ingSistema"> 
            <div class="ingHeader">
              <p>Ingrese al Sistema</p>
            </div>
          <?php echo form_tag('@sf_guard_signin') ?>
            <div class="form-row" id="sf_guard_auth_username">
                <?php echo form_error('username') ?>
                
                <input id="username" name="username" class="input-block-level" type="text" placeholder="Usuario" style="width: 80%">
            </div>
            <div class="form-row" id="sf_guard_auth_password">
              <?php echo form_error('password') ?>
                <input id="password" name="password" class="input-block-level" type="password" placeholder="Contraseña" style="width: 80%">
            </div>

            <button class="btn" type="submit"  style="font-family: 'stylo2'; font-size: 16px;">Entrar</button>
            
          </form>
          <br>
          <div ><?php echo link_to('¿Olvidó su contraseña?','', array('query_string' => 'm='.$app, 'class' =>"btn", 'style' =>'font-size:16px;')) ?></div>
          <div > <?php echo link_to('Registar Usuario','@apply', array('query_string' => 'm='.$app, 'class' =>"btn", 'style' =>'font-size:16px;')) ?></div>

          <?php }else{?>
          <?php
          $url = "portal_dev.php/apps?m=siga";
          header('Refresh: 0.0001; url="'.$url.'"');
          ?>

            <div id="sf_guard_auth_form">
            <form method="post" action="/portal_dev.php/logout">   
                <div class="ingSistema3">
            <?php echo form_tag('@sf_guard_signout') ?>
                    <div class="div">
                        <h3 style="z-index: 30; color: #fff; text-align: center;">Bienvenido</h3>
                </div>
                <br>
                    <div class="div" style="text-align: center;">
                      <h5><?php echo strtoupper ($usuario) ?> </h5>
                  </div>
                <button class="btn" style="font-family: 'stylo2'; font-size: 16px;" type="submit">Salir</button>
                </div>
            </form>
            </div>
          </div>
        </div>
        <center>
        <?php if($usuario!=''){?>
          <img src="/images/301.GIF" style="width:50px;"></img>
        <?php }?>
        </center>

        <!--<?php
        foreach($publicidades as $key){?>
            <div class="span35  ">
                <?php echo link_to(image_tag( $key->getImgpub(), array('class' => 'img-rounded centradoi')),'/apps/index'.$key->getLinkpub())?>
                <h4 class="centradot"><?php  echo $key->getTitpub()?> </h4>
                <p class="justificadot" style="font-size:14px;"><?php  echo $key->getDespub()?>
                </p><?php echo link_to('Ver mas...','/apps/index'.$key->getLinkpub())?>
            </div>
        <?php }?>-->


          <?php }?>
            <!--
            <a href="portal_dev.php/apps?m=siga" onclick="document.forms[0].submit();return false;">Click</a>
            <a href="<?php echo 'portal_dev.php/apps?m='.$app;?>" target="_blank"><input type="submit" class="btn" value="Entrar2"  onclick="window.location.href=<?php echo 'apps?m='.$app;?>" style="font-family: stylo2; font-size: 16px;"></a>

           <!-- <div> <?php echo button_to('my article', 'apps?m='.$app, array('type' => "submit", 'class' =>"btn", 'style' =>'font-size:16px;')) ?> 
                <input type="button" value="¿Olvido su contraseña?"  class="btn" href="#"/>
            </div>
            <div>/apps?m=nomina
                <input type="button" value="Registrar Usuario"  class="btn" onclick="#"/>
            </div>--> 
            
      
      </div>
    </div></center>
    
    <!-- ================= Ingrese al Sistema ================= -->
</div>