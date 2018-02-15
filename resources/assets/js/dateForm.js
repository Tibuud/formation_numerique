(function () {


  $("#submit" ).on("click",function() {

    var date_only_from_date_start=$('#date_only_from_date_start').val();
    var time_only_from_date_start=$('#time_only_from_date_start').val();
    var new_datetime_start = date_only_from_date_start.concat('T',time_only_from_date_start);
    $('#date_start').val(new_datetime_start);

    var date_only_from_date_end=$('#date_only_from_date_end').val();
    var time_only_from_date_end=$('#time_only_from_date_end').val();
    var new_datetime_end = date_only_from_date_end.concat('T',time_only_from_date_end);
    $('#date_end').val(new_datetime_end);
  });
})($)
