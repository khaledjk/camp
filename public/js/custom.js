 $(document).ready(function() {

    $('select[name="items"]').on('change', function(){
        var itemsId = $(this).val();           
        if(itemsId) {
            $.ajax({
                url: '/details/get/'+itemsId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="details"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="details"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="details"]').empty();
        }

    });

});