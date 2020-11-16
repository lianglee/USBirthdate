<script>
	$(document).ready(function(){
		$("input[name='birthdate']").datepicker("destroy");
		$("input[name='birthdate']").removeClass('hasDatepicker');
        var cYear = (new Date).getFullYear();
        var alldays = Ossn.Print('datepicker:days');
        var shortdays = alldays.split(",");
        var allmonths = Ossn.Print('datepicker:months');
        var shortmonths = allmonths.split(",");

        var datepick_args = {
            changeMonth: true,
            changeYear: true,
            dateFormat: 'mm/dd/yy',
            yearRange: '1900:' + cYear,
        };

        if (Ossn.isLangString('datepicker:days')) {
            datepick_args['dayNamesMin'] = shortdays;
        }
        if (Ossn.isLangString('datepicker:months')) {
            datepick_args['monthNamesShort'] = shortmonths;
        }
        $("input[name='birthdate']").datepicker(datepick_args);							   
	});
</script>