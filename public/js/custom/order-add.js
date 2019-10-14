$('.all_orders > #add_order').on("click", function(){
   var category_name = $(this).children("p").attr("name");
   $.ajax({
       url: "orders/get/"+category_name,
       success: function(response){
           try {
                response.forEach(function(entry){
                    $(".row-items").append(html(entry, entry))
                })
            } catch(e) {
                console.log(response);
            }
       }
   })
   return false; 
});{}
                    
function html(text, desc){
    return `
    <div class="col-md-4 pt-3">
        <div class="card" id="card">
            <div class="card-body cardItem">
                <h5 class="card-title">${text}</h5>
                <h6 class="card-subtitle mb-2 text-muted">${desc}</h6>
                <p class="card-text"></p>
                <lable>Amount: <input class="inputfield" type="text" name="amount" value="0"> </lable>
            </div>
        </div>
    </div>
    `;
}