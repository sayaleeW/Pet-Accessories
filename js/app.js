
$('#search').click(function(){
document.location.href = "searchpage.php?q="+$(this).parent().prev().val()+"&cat=";

});


$('#sub').click(function(){

var username = $('#usrname').val();

var mobile = $('#mo').val();
var address = $('#add').val();
var id = $('#id').val();
var quantity =  $('#quantity').val();

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

today = mm+'/'+dd+'/'+yyyy;


 if(username==''){
    alert("Please Enter the Name.");
}
else if(mobile==''){
    alert("Please Enter the Mobile Number.");
}
else if(address==''){
    alert("Please Enter the Address.");
}

else{
      alert("We have successfully requested your query..");
  $.post("order.php",
    {
        name: username,
        mobile:mobile,
        address:address,
        pid:id,
        qua:quantity,
        date:today 
    },
    function(data, status){
            alert( data );
    });
}
});




