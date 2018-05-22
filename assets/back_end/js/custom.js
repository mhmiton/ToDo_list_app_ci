$(document).ready(function() {
    $('.del_btn').click(function(){
        var url  = $(this).data('href');
        var id  = $(this).data('id');

        swal({title:'Are You Sure Delete This Data', icon:'warning', buttons:true, dangerMode:true})
        .then((willDelete) => {
          if(willDelete)
          {
            location.replace(URL.site_url(url+'_clear/'+id));
          }
        });
    });
});

function form_reset(form)
{
    $('#form')[0].reset();
    $('#submit').text('Save');
    $('.change').text('Add');
}