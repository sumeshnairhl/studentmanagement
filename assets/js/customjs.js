  $(document).ready(function() {

  $('#dataTable').dataTable( {
          paging: true,
        responsive: true,
         "lengthMenu": [[50, 100, 500, -1], [50, 100, 500, "All"]],
    "scrollX": true,
    
  });

//  var tablenit= jQuery('#dataTable2').dataTable( {
  //});

  var tablenit=jQuery('#dataTable2').DataTable( {
         paging: true,
        responsive: true,
         "lengthMenu": [[50, 100, 500, -1], [50, 100, 500, "All"]],
    "scrollX": true,
    
         
    } );

  $('.userstatusch').change(function(){


     var getvalusr=$(this).val();
      tablenit.columns(2).search('').draw();
     if(getvalusr!=" "){
           tablenit.columns(2).search(getvalusr).draw();

     }
  });

  var objectUrl;

$("#audio").on("canplaythrough", function(e){
    var seconds = e.currentTarget.duration;
    var duration = moment.duration(seconds, "seconds");
    
    var time = "";
    var hours = duration.hours();
    if (hours > 0) { time = hours + ":" ; }
    
    time = time + duration.minutes() + ":" + duration.seconds();
    $("#duration").val(time);
    
    URL.revokeObjectURL(objectUrl);
});

$("#file").change(function(e){
    var file = e.currentTarget.files[0];
   
    
    objectUrl = URL.createObjectURL(file);
    $("#audio").prop("src", objectUrl);
});



});