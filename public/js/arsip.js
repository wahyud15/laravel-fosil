$(document).ready(function(){

    //create arsip
    $('#formarsipcreate').on('submit', function(event){
       var myForm = document.getElementById('formarsipcreate');
       var formData = new FormData(myForm);
       var oldloc = location;
       event.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url: arsipCreateUrl,
          method: 'post',
          data: formData, 
          contentType: false,
          processData: false,
          success: function(result){
            $('#modalCreateArsip').modal('hide');
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
       $('.editArsip').on('click', function(event){
            var judul = $(this).parent().parent().children().find('h5').text();
            var link = $(this).attr('name');
            var oldloc = location;
            var formData = new FormData();
            formData.append('judul', judul);

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
                    $('#ujudul').val(result[0].judul);
                    $('#uringkasan').val(result[0].ringkasan);
                    $('#modalUpdateArsip').modal('show');
               },

               error: function(XMLHttpRequest){
                alert("Error: " + XMLHttpRequest.responseText); 
               }

           });
       });
       //end getArsip

        //delete arsip
        $('#formarsipupdate').on('submit', function(event){
                var myForm = document.getElementById('formarsipupdate');
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
                        $('#modalUpdateArsip').modal('hide');
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
        $('.hapusArsip').on('click', function(event){
            var judul = $(this).parent().parent().children().find('h5').text();
            var link = $(this).attr('name');
            var oldloc = location;
            var formData = new FormData();
            formData.append('djudul', judul);

            $userChoosen = confirm("Apakah Anda Yakin Akan Menghapus Arsip dengan Judul : ".concat(judul));

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
  