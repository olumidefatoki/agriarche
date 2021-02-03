$(function(){
    $.ajax({
        url: "{{ url('/dashboardReport/') }}",
        type: "GET",
        dataType: "json",
        success: function(data) {
            console.log(data);            
        }
    });
    // $.getJSON("{{ url('/dashboardReport/') }}",function(json){
    //     console.log(json);
    //     $.each(json.generic,function(i,dat){
    //     });
    // });
});