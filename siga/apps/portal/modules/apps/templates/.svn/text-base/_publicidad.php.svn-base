<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<!-- =========================Zona de Mercadeo Pequeña======================= -->
<div class="container" style="font-size:14px;">
<div class="span10 ">
   <!-- Tres columnas para la publicidad -->

   <?php
   ?>
   <div class=" pie " style="height: 380px; ">
       <div class="head-pie" style="font-size: 20px;">
           <p>Información de Interés</p>
       </div>
       <div class="intereses" >

<!-- nuevo -->
          <!-- 1 -->
          <div class="item-interes">
            <img src="/images/negocios/cuadro-medios.png"  style="width: 27%;"></img>
            <div class="infor">
              <p>
                  <a class="dropdown-toggle" href="#algo" style="font-size: 14px;" >
                       Puesta en Producción
                  </a>
              </p>
            </div>   
          </div>
          <!-- 1 -->
          <div class="item-interes">
            <img src="/images/negocios/cuadro-consultas.png"  style="width: 27%;"></img>
            <div class="infor">
              <p>
                <a class="dropdown-toggle" href="http://wiki.cidesa.com.ve/" style="font-size: 14px;" >
                  Cidesa Wiki
                </a>
              </p>
            </div>   
          </div>
          <!-- 3 -->
          <div class="item-interes">
            <img src="http://www.protestantedigital.com/media/img/main/error-404.gif"  style="width: 27%;"></img>
            <div class="infor">
              <p>
                <a class="dropdown-toggle" href="#algo" style="font-size: 14px;" >
                  Privacidad
                </a>
              </p>
            </div>   
          </div>
          <!-- 4 -->
          <div class="item-interes">
            <img src="http://www.protestantedigital.com/media/img/main/error-404.gif"  style="width: 27%;"></img>
            <div class="infor">
              <p>
                <div class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" 
                       onmouseover="getElementById('<?php echo 'seccion1'; ?>').style.display='block';" onmouseout="getElementById('<?php echo 'seccion1'; ?>').style.display='none';" >
                       Bitácora Digital
                  </a>
                  <ul id="<?php echo 'seccion1'; ?>"  
                        onmouseover="getElementById('<?php echo 'seccion1'; ?>').style.display='block';" onmouseout="getElementById('<?php echo 'seccion1'; ?>').style.display='none';"   
                        class="dropdown-menu" role="menu" aria-labelledby="dLabel" 
                        style="text-align: left;display='none';">
                    <li>
                      <a href="http://blog.cidesa.com.ve/">
                        BLOG
                      </a>
                    </li>
                  </ul>       
                </div>
              </p>
            </div>   
          </div>
<!-- fin nuevo -->


           <?php
           $i=0;
           foreach($publicidades as $key){ ?>
           <div class="item-interes">
               <img src="<?php echo $key->getImgpub(); ?>"  style="width: 27%;">
               <div class="infor">
                   <p>
                   <div class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#" 
                       onmouseover="getElementById('<?php echo 'caja'.$i; ?>').style.display='block';" 
                       onmouseout="getElementById('<?php echo 'caja'.$i; ?>').style.display='none';" >
                       <?php echo $key->getTitpub(); ?>
                      </a>
                   
                       <ul id="<?php echo 'caja'.$i; ?>"  
                        onmouseover="getElementById('<?php echo 'caja'.$i; ?>').style.display='block';" 
                        onmouseout="getElementById('<?php echo 'caja'.$i; ?>').style.display='none';"   
                        class="dropdown-menu" role="menu" aria-labelledby="dLabel" 
                        style="text-align: left;display='none';">
                           
                              <?php foreach($detalle as $d){

                                if($d->getIdPub() == $key->getId()){ 

                                    $miarreglo = explode (':',$d->getLinkpub());?>
                            
                                    <?php if($miarreglo[0]=="http" || $miarreglo[0]=="https"){?>
                                        <li><a href="<?php echo $d->getLinkpub(); ?>">
                                          <?php echo $d->getTitpub(); ?></a>
                                        </li>
                                    <?php }else{?>
                                        <li><?php echo link_to($d->getTitpub(),$d->getLinkpub())?></li>
                                    <?php }?>
                                    
                                <?php }?>
                            <?php $i++;}?>
                       </ul>
                   </div>
                   </p>

               </div>
           </div>
           <?php }?>
           
       </div>
   </div>
</div>
</div>