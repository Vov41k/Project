$(document).ready(function(){


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


  $('body').on('click',".add",function(e){
  	e.preventDefault();

  var url = $(this).attr("href");
          var id = $(this).attr('id');
          console.log($(this).parents('.inline').find('.qty').text())

        $.ajax({

           type: 'POST',
          url: url,
          contentType: 'json',
          cache: false,
          processData: false,
          success: function(data){
            // console.log(data);
               $(".totalCart").html("Your Cart: " +data.count+ " items"); 
            $("#bag").html('My Shopping Bag'+" "+"("+data.count+")"); 

           $("#qty"+id).html('Qty :'+ data.qty); 
            $(".subtotal").html(data.subtotal);
             // $("#price").html(price+'$');
        
        }});
     
    
    });

  $('body').on('click',".reduce",function(e){
  	e.preventDefault();

  var url = $(this).attr("href");

        var id = $(this).attr('id');
        var row =$(this).parents('.cart-header');

        $.ajax({

           type: 'POST',
                    url: url,
                    contentType: 'json',
                    cache: false,
                    processData: false,
          success: function(data){
            if (!data.qty) {
              row.remove();
            }
               $(".totalCart").html("Your Cart: " +data.count+ " items"); 
             $("#bag").html('My Shopping Bag'+" "+"("+data.count+")"); 
           $("#qty"+id).html('Qty :'+ data.qty); 
            $(".subtotal").html(data.subtotal);
             // $("#price").html(price+'$');
        
        }});
     
    
    });



});

