//Date Picker
$(document).ready(function(){
    var date_input=$('input[name="start_date"]'); //our date input has the name "date"
    var options={
        format: 'yyyy-mm-dd',
        // container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options);
});