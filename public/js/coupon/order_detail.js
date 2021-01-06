$('.view_order').on('click',function () {
        var url = $('.view_order').attr("url");
        var order = $(this).attr("data");
        var token = $('meta[name=csrf-token]').attr('content');
        $.post(url, {
                     _token: $('meta[name=csrf-token]').attr('content'),
                     id_order: order
                 }
                )
                .done(function(data) {
                   $("#package_name").html(data.package);
                   $("#package_limmit").html(data.lim+" month");
                   $("#package_total").html(data.total+" $");
                   $('#myModal').modal('show'); 
                })
                .fail(function() {
                    alert( "error" );
                });
    }); 