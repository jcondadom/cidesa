<script type="text/javascript"language="Javascript">

    if($('viasolviatra_status').value=='N') {
        $$('.sf_admin_action_delete')[0].hide();
        $$('.sf_admin_action_delete')[1].hide();
        $$('.sf_admin_action_save')[0].hide();
    }

    var ocuinfsol='<?php echo H::getConfApp2('ocuinfsol', 'viaticos', 'viasolviatra'); ?>';
    if (ocuinfsol=='S'){
    	$('divtipbol').hide();
    	$('divmonbol').hide();
    	$('divhorsal').hide();
    	$('divhorlle').hide();
    	$('divreqhospe').hide();
    	$('divhosped').hide();
    	$('divobshos').hide();    	
    }
</script>    