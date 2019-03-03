$(document).ready(function(){

    //create pengumuman
    $('#formpengumumancreate').on('submit', function(event){
       var myForm = document.getElementById('formpengumumancreate');
       var formData = new FormData(myForm);
       var oldloc = location;
       event.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url: pengumumanCreateUrl,
          method: 'post',
          data: formData, 
          contentType: false,
          processData: false,
          success: function(result){
            $('#modalCreatePengumuman').modal('hide');
            alert(result.respond);
            myForm.reset();
            oldloc.reload();
           
          },
          
          error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Error: " + XMLHttpRequest.responseText); 
            myForm.reset();
            } 
        });

       });
       //end formcreatepengumuman

       //get arsip pengumuman
       $('.editPengumuman').on('click', function(event){
            var judul = $(this).parent().parent().children().find('h5').text();
            var link = $(this).attr('name');
            var oldloc = location;
            var formData = new FormData();
            formData.append('judulpengumuman', judul);

            $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });

           $.ajax({
               url : link,
               method : 'post',
               data : formData,
               contentType: false,
               processData: false,
               dataType: 'json',
               success: function(result){
                    $('#ujudulpengumuman').val(result[0].judulpengumuman);
                    $('#uringkasanpengumuman').val(result[0].ringkasanpengumuman);
                    $('#modalUpdatePengumuman').modal('show');
               },

               error: function(XMLHttpRequest){
                alert("Error: " + XMLHttpRequest.responseText); 
               }

           });
       });
       //end get Pengumuman

        //delete pengumuman
        $('#formpengumumanupdate').on('submit', function(event){
                var myForm = document.getElementById('formpengumumanupdate');
                var oldloc = location;
                var formData = new FormData(myForm);
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'post',
                    data: formData, 
                    contentType: false,
                    processData: false,
                    success: function(result){
                        $('#modalUpdatePengumuman').modal('hide');
                        alert(result.respond);
                        myForm.reset();  
                        oldloc.reload();     
                    },
                    
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Error: " + XMLHttpRequest.responseText); 
                        myForm.reset();
                        } 
                });
            });
        //end formupdatepengumuman

        //hapus pengumuman
        $('.hapusPengumuman').on('click', function(event){
            var judul = $(this).parent().parent().children().find('h5').text();
            var link = $(this).attr('name');
            var oldloc = location;
            var formData = new FormData();
            formData.append('djudulpengumuman', judul);

            $userChoosen = confirm("Apakah Anda Yakin Akan Menghapus Pengumuman dengan Judul : ".concat(judul));

            if($userChoosen){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
    
                $.ajax({
                    url : link,
                    method : 'post',
                    data : formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(result){
                        alert(result.respond);
                        oldloc.reload();
                    },
    
                    error: function(XMLHttpRequest){
                        alert("Error: " + XMLHttpRequest.responseText); 
                    }
    
                });
            }

        });
        //end hapus pengumuman

});
//end arsip.js
  