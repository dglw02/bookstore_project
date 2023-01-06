function loadcart() {
    $.ajax({
        method: "POST",
        url: "/cart/{id}/{quantity}",
        success: function(cartcount){
            if (cartcount == 'success') {
                alert('success');
            }
            else{
                alert('failure');
            }

        },
        error:function(cartcount){

        }
    });
}
