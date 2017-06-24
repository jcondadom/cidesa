<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>
<?php use_helper('Javascript', 'wait') ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>
<?php echo wait() ?>
<table width="100%" align="center"><!--DWLayoutTable-->
  <tr>
  <td width="100%">
      <table width="100%" border="0" align="left" cellpadding="0"><!--DWLayoutTable-->
      <tr>
        <td width="100%"><table width="100%" height="0%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="39%" valign="top" ><img src="/images/borrar_01.jpg" width="273" height="89" /></td>  
                  <td colspan="3"  width="100%" valign="top" background=" /images/borrar_03.jpg" align="right"><img src="/images/borrar_04.jpg" width="341" height="89" /></td>
                </tr>
                
                <tr>
                  <td  colspan="2" valign="medium" background=" /images/borrar_05.jpg"><span class="Quote Order"><br>Usuario: <?php echo $sf_user->getAttribute('usuario','Sin Autenticar') ?> (<?php if(isset($_SESSION["nomemp"])) echo $_SESSION["nomemp"] ?>)  |
                    M&oacute;dulo: <?php echo $sf_context->getModuleName() ?></span></td>  
                  <td colspan="2"  width="100%" valign="medium" background=" /images/borrar_05.jpg" align="right"> <br><a href="<?php echo "javascript:self.close()"; ?>"><img src="/images/inicio.png" width="20" height="20" /></a>&nbsp;
 <!--AYUDA DEL SISTEMA-->
           <img src="/images/help.png" width="20" height="20" />&nbsp;
 <a href="<?php if (SF_ENVIRONMENT=='dev') echo "/".sfConfig::get('app_autenticacion')."_dev.php/login/logout"; else echo "/".sfConfig::get('app_autenticacion').".php/login/logout"; ?>"><img src="/images/close.png" width="20" height="20" /></a>&nbsp;            &nbsp;          </td>
                </tr>  
              </table></td>
      </tr>
    </table>
    </td>
  </tr>
<tr>
      <td valign="top" >
        <table width="100%" border="0" cellpadding="0" cellspacing="0" >
          <!--DWLayoutTable-->
          <tr>
            <td width="100%" height="19" align="right">&nbsp;</td>
          </tr>
          <tr>
            <td height="56" ><?php echo $sf_data->getRaw('sf_content'); ?></td>
          </tr>
          <tr>
            <td align="CENTER"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
          <tr>
            <td align="CENTER"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
          <tr>
            <td height="42" align="CENTER"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
          <tr>
            <td height="11" align="CENTER"><hr /></td>
          </tr>
          <tr>
            <td height="25" align="CENTER"><strong><font size='1'></font></strong></td>
          </tr>
           <tr>
            <td align="CENTER"><strong><font size='1'>A.J.V.R. Computer C.A. 2016 / Caracas - Venezuela</font></strong></td>
          </tr>
          <tr>
            <td align="CENTER"><strong><font size='1'>0212-4711896 / 0416-6219902 / 0412-3519425</font></strong></td>
          </tr>
			<tr>
            <td align="CENTER"><strong><font size='1'>www.ajvrcomputer.com.ve</font></strong></td>
          </tr>

        </table></tr>
</td>
</table>

</body>
</html>


