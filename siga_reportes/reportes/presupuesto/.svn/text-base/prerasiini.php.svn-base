<?php
include_once("../../lib/general/headhtml.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
require_once("../../lib/modelo/business/presupuesto.class.php");
$bd=new basedatosAdo();
$catalogo[] = presupuesto::catalogo_codprePrerasiini('codpredesde','A');
$catalogo[] = presupuesto::catalogo_codprePrerasiini('codprehasta','D');
$catalogo[] = presupuesto::catalogo_sector('sect1');
$catalogo[] = presupuesto::catalogo_sector('sect2');
$catalogo[] = presupuesto::catalogo_programa('pro1');
$catalogo[] = presupuesto::catalogo_programa('pro2');
$catalogo[] = presupuesto::catalogo_actividad('act1');
$catalogo[] = presupuesto::catalogo_actividad('act2');
$catalogo[] = presupuesto::catalogo_partida('par1');
$catalogo[] = presupuesto::catalogo_partida('par2');

$_SESSION['prerasiini'] = $catalogo;

$titulo='Asignacion Inicial';
$orientacion='HORIZONTAL';
$tipopagina='CARTA';
?>
<?php include_once("../../lib/general/formtop.php")?>
<tr bordercolor="#6699CC">
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><div align="left"><strong>Nivel</strong></div></td>
             <td>
             <select name="nivel1" class="breadcrumb"  id="nivel1">
              <? $sql="SELECT CONSEC as con,CONSEC||' - '||NOMEXT as agrupar FROM CPNIVELES ORDER BY CONSEC asc"; ?>
    	      <? LlenarComboSql($sql,"con","agrupar","",$bd); ?>
             </select></td>
              <td>
              <select name="nivel2" class="breadcrumb"  id="nivel2">
             <? $sql="SELECT CONSEC as con,CONSEC||' - '||NOMEXT as agrupar FROM CPNIVELES ORDER BY CONSEC DESC"; ?>
    	      <? LlenarComboSql($sql,"con","agrupar","",$bd); ?>
              </select></td>
            </tr>

           <!--   <tr bordercolor="#6699CC">
              <td height="27" class="form_label_01"><strong>Código Presupuestario</strong></td>
              <td>
                  <input name="codpredesde" type="text" class="breadcrumb" id="codpredesde"
              value="<?$sql="select min(codpre) as codpredesde from cpdeftit";
              LlenarTextoSql($sql,"codpredesde",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',0); "></a>
             </td>
              <td>
              <input name="codprehasta" type="text" class="breadcrumb" id="codprehasta"
              value="<?$sql="select max(codpre) as codprehasta from cpdeftit";
              LlenarTextoSql($sql,"codprehasta",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',1); "></a>
              </td>
            </tr>-->
             <tr bordercolor="#6699CC">
              <td height="27" class="form_label_01"><strong>Código Sector</strong></td>
              <td>
                  <input name="sect1" type="text" class="breadcrumb" id="sect1"
              value="<?$sql="select min(substr(codpre,1,2)) as minsect from cpdeftit where (substr(codpre,1,2))<>''";
              LlenarTextoSql($sql,"minsect",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',2); "></a>
             </td>
                  <td>
                  <input name="sect2" type="text" class="breadcrumb" id="sect2"
              value="<?$sql="select max(substr(codpre,1,2)) as maxsect from cpdeftit where (substr(codpre,1,2))<>''";
              LlenarTextoSql($sql,"maxsect",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',3); "></a>
             </td>

            </tr>
            <tr bordercolor="#6699CC">
              <td height="27" class="form_label_01"><strong>Código Programa</strong></td>
              <td>
                  <input name="pro1" type="text" class="breadcrumb" id="pro1"
              value="<?$sql="select min(substr(codpre,4,2)) as minpro from cpdeftit where (substr(codpre,4,2))<>''";
              LlenarTextoSql($sql,"minpro",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',4); "></a>
             </td>
                 <td>
                  <input name="pro2" type="text" class="breadcrumb" id="pro2"
              value="<?$sql="select max(substr(codpre,4,2)) as maxpro from cpdeftit where (substr(codpre,4,2))<>''";
              LlenarTextoSql($sql,"maxpro",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',5); "></a>
             </td>

            </tr>
                   <tr bordercolor="#6699CC">
              <td height="27" class="form_label_01"><strong>Código Actividad</strong></td>
              <td>
                  <input name="act1" type="text" class="breadcrumb" id="act1"
              value="<?$sql="select min(substr(codpre,7,2)) as minact from cpdeftit where (substr(codpre,7,2))<>'' and LENGTH((substr(codpre,10,12)))=(select sum(lonniv+1)-1 as par from cpniveles where CATPAR='P')";
              LlenarTextoSql($sql,"minact",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',6); "></a>
             </td>
                  <td>
                  <input name="act2" type="text" class="breadcrumb" id="act2"
              value="<?$sql="select max(substr(codpre,7,2)) as maxact from cpdeftit where (substr(codpre,7,2))<>'' and LENGTH((substr(codpre,10,12)))=(select sum(lonniv+1)-1 as par from cpniveles where CATPAR='P')";
              LlenarTextoSql($sql,"maxact",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',7); "></a>
             </td>

            </tr>
                        <tr bordercolor="#6699CC">
              <td height="27" class="form_label_01"><strong>Código Partida</strong></td>
              <td>
                  <input name="par1" type="text" class="breadcrumb" id="par1"
              value="<?$sql="select min(substr(codpre,10,12)) as minpar from cpdeftit where (substr(codpre,10,12))<>'' and LENGTH((substr(codpre,10,12)))=(select sum(lonniv+1)-1 as par from cpniveles where CATPAR='P')";
              LlenarTextoSql($sql,"minpar",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',8); "></a>
             </td>
                 <td>
                  <input name="par2" type="text" class="breadcrumb" id="par2"
              value="<?$sql="select max(substr(codpre,10,12)) as maxpar from cpdeftit where (substr(codpre,10,12))<>'' and LENGTH((substr(codpre,10,12)))=(select sum(lonniv+1)-1 as par from cpniveles where CATPAR='P')";
              LlenarTextoSql($sql,"maxpar",$bd); ?>" size ="25">
              <a href="#"><img src="../../img/search.gif" align="top" onclick="catalogo('prerasiini',9); "></a>
             </td>

            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"><div align="left"><strong>Subtotal</strong></div></td>
             <td>
             <select name="nivel3" class="breadcrumb"  id="nivel3" onChange="verificar()">
              <? $sql="SELECT CONSEC as con,CONSEC||' - '||NOMEXT as agrupar FROM CPNIVELES WHERE CATPAR='P' ORDER BY CONSEC"; ?>
    	      <? LlenarComboSql($sql,"con","agrupar","",$bd,'Ninguno'); ?>
             </select></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>Filtro</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%%" size="50">
                </div></td>
            </tr>
             <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>REVISADO</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="revisado" type="text" class="breadcrumb" id="revisado" value="" size="50">
                </div></td>
            </tr>
             <tr bordercolor="#6699CC">
              <td class="form_label_01"> <div align="left"><strong>CONFORMADO</strong></div></td>
              <td colspan="2"> <div align="left"></div>
                <div align="left">
                  <input name="conformado" type="text" class="breadcrumb" id="conformado" value="" size="50">
                </div></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">Este ejemplo listara, todo
                los códigos presupuestarios que en su sexto nivel contengan 401 y en el décimo
                un 002</td>
            </tr>
<?php include_once("../../lib/general/formbottom.php")?>
<script language="javascript">
function verificar()
{
 if ((parseInt($('nivel3').value)>=parseInt($('nivel2').value)) || (parseInt($('nivel3').value)<=parseInt($('nivel1').value)))
 {
  alert('Los subtotales deben sacarse en base a los Niveles escogidos');
  $('nivel3').value="";
 }

}
</script>