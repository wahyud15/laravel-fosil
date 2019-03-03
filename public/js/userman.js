$(document).ready(function(){

    //create arsip
    $('#formusercreate').on('submit', function(event){
       var myForm = document.getElementById('formusercreate');
       var formData = new FormData(myForm);
       var oldloc = location;
       event.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url: userCreateUrl,
          method: 'post',
          data: formData, 
          contentType: false,
          processData: false,
          success: function(result){
            $('#modalCreateUser').modal('hide');
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
       //end formcreatearsip

       //get arsip data
       $('.editUser').on('click', function(event){
            var idrow = $(this).parent().parent().find('th').text();
            var link = $(this).attr('name');
            var oldloc = location;
            var formData = new FormData();
            formData.append('idrow', idrow);

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
                    $('#uidrow').val(result[0].id);
                    $('#unama').val(result[0].name);
                    $('#uusername').val(result[0].email);
                    $('#ulevel').val(result[0].level);
                    $('#modalUpdateUser').modal('show');
               },

               error: function(XMLHttpRequest){
                alert("Error: " + XMLHttpRequest.responseText); 
               }

           });
       });
       //end getArsip

        //delete arsip
        $('#formuserupdate').on('submit', function(event){
                var myForm = document.getElementById('formuserupdate');
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
                        $('#modalUpdateUser').modal('hide');
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
        //end formupdatearsip

        //hapus arsip
        $('.hapusUser').on('click', function(event){
            var idrow = $(this).parent().parent().find('th').text();
            var link = $(this).attr('name');
            var oldloc = location;
            var formData = new FormData();
            formData.append('didrow', idrow);

            $userChoosen = confirm("Apakah Anda Yakin Akan Menghapus Pengguna dengan ID Row : ".concat(idrow));

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
        //end hapus arsip

});
//end arsip.js
  