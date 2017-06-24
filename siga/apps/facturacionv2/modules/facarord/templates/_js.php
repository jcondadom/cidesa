<script lang="Javascript" type="text/javascript">
    var mont=toFloat('facarord_moncar');
    var montped=toFloat('facarord_totped');
    var id='<?php echo $facarord->getId(); ?>'
    if (id!="") {
        if (montped==mont) {
            $('divobj2').hide();
            $('divtotdetped').hide();
        }
    }    
</script>