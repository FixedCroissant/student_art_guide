$(document).ready(function(){
    $('.delete-img-cb').click(function(){
        var id = 'btn_' + $(this).attr('id').replace('cb_','');
        var btn = $('#'+id);
        if($(this).prop('checked') == true){
            btn.removeClass('disabled');
        }else{
            btn.addClass('disabled');
        }
    });

    $('.delete-img-btn').click(function(){
        if($(this).hasClass('disabled') == false){

            var id = $(this).attr('id').replace('btn_','');
            var url = window.location.href;
            var replace = url.split("/edit")[0];
            var domain = url.split("/");
            var recreateIndex = domain[0]+"/"+domain[1]+"/"+domain[2]+"/"+domain[3]+"/"+domain[4]+"/"+domain[5]+"/auth/artwork/index";

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            });

            $.ajax({
                //Go back up to the index to declare a route.
                //url: '../../art'+id,
                url: replace,
                type: 'DELETE',
                data: {
                    '_method':'DELETE',
                    id: id,
                },
                success: function(result){
                    $('#cb_' + id).closest('tr').hide();
                    console.log(result);
                    //Go to authorized artwork index.
                    window.location.replace(recreateIndex);
                }
            });
        }
    });
});