<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?php if ($msgerr!="") : ?>
        <script type="text/javascript">
	       m='<?php print $msgerr; ?>';
	       alert(m);
         window.location.reload();
        </script>
<?php endif; ?>

<?php if ($btn) : ?>
   <input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:Anular_orden();" />
<?php endif; ?>