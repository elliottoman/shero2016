<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript">
    var $y = jQuery.noConflict(true);
</script>

<script type="text/javascript">


    $y(document).ready(function($) {
        $y('#accordion').find('.accordion-toggle').click(function(){

            //Expand or collapse this panel
            $y(this).next().slideToggle('fast');

            //Hide the other panels
            $y(".accordion-content").not($y(this).next()).slideUp('fast');

        });
    });
</script>

<style>
    .accordion-toggle {cursor: pointer; margin: 0;}
    .accordion-content {display: none;}
    .accordion-content.default {display: block;}
</style>