<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<!-- =========================Zona de Mercadeo Pequeña======================= -->
<div class="container">
<div class="span10 ">
   <!-- Tres columnas para la publicidad -->

   <?php
   
   ?>
   <div class=" pie ">
       <div class="head-pie">
           <p>Información de Interés</p>
       </div>
       <div class="intereses" >

           <?php
           $i=0;
           foreach($publicidades as $key){ ?>
           <div class="item-interes">
               <img src="<?php echo $key->getImgpub(); ?>"  style="width: 27%;">
               <div class="infor">
                   <p>
                   <div class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#" 
                       onmouseover="getElementById('<? echo "caja".$i; ?>').style.display='block';" onmouseout="getElementById('<? echo "caja".$i; ?>').style.display='none';" >
                       <?php echo $key->getTitpub(); ?>
                      </a>
                   
                       <ul id="<? echo "caja".$i; ?>"  
                        onmouseover="getElementById('<? echo "caja".$i; ?>').style.display='block';" onmouseout="getElementById('<? echo "caja".$i; ?>').style.display='none';"   
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