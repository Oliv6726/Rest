$('#add_order').on("click", function(){
   var category_name = $(this).children("img").attr("name");
   $.ajax({
       url: "orders/get/"+category_name,
       success: function(response){
            response.forEach(function(entry){
                alert(entry);
            })
       }
   })
   return false; 
});