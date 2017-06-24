<?php 
 if(count($parentescos)!=0) {
  echo options_for_select($parentescos,'','include_custom=Seleccione...');
} else{
echo options_for_select($parentescos,'');
}?>