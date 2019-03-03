$(document).ready(function(){

    //create ruang diskusi
    $('#formruangdiskusicreate').on('submit', function(event){
       var myForm = document.getElementById('formruangdiskusicreate');
       var formData = new FormData(myForm);
       var oldloc = location;
       event.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url: ruangdiskusiCreateUrl,
          method: 'post',
          data: formData, 
          contentType: false,
          processData: false,
          success: function(result){
            $('#modalCreateRuangdiskusi').modal('hide');
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

       //submit komentar
       $('.submitkomentar').on('click', function(event){
           var formData = new FormData();
           var komentar = $('#isikomentar').val();
           formData.append('isikomentar', komentar);
           formData.append('namatable', namatable);
           var oldloc = location;
           event.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
            url: ruangdiskusiSubmitkomentarUrl,
            method: 'post',
            data: formData, 
            contentType: false,
            processData: false,
            success: function(result){
              if(result.status == '1'){
                  alert(result.response);
                  oldloc.reload();
              }else{
                alert(result.response);
                oldloc.reload();
              }
            },
            
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
              alert("Error: " + XMLHttpRequest.responseText); 
              } 
          });

       });

       //get arsip data
       $('.editruangdiskusi').on('click', function(event){
            var judulruangdiskusi = $(this).parent().parent().children().find('h5').text();
            var link = $(this).attr('name');
            var oldloc = location;
            var formData = new FormData();
            formData.append('judulruangdiskusi', judulruangdiskusi);

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
                    $('#ujudulruangdiskusi').val(result[0].judulruangdiskusi);
                    $('#uringkasanruangdiaskusi').val(result[0].ringkasanruangdiskusi);
                    $('#modalUpdateRuangdiskusi').modal('show');
               },

               error: function(XMLHttpRequest){
                alert("Error: " + XMLHttpRequest.responseText); 
               }

           });
       });
       //end getArsip

      //form update ruang diskusi
      $('#formruangdiskusiupdate').on('submit', function(event){
              var myForm = document.getElementById('formruangdiskusiupdate');
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
                      $('#modalUpdateRuangdiskusi').modal('hide');
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
        //end formupdateruangdiskusi

        //hapus arsip
        $('.hapusruangdiskusi').on('click', function(event){
            var judulruangdiskusi = $(this).parent().parent().children().find('h5').text();
            var link = $(this).attr('name');
            var oldloc = location;
            var formData = new FormData();
            formData.append('djudulruangdiskusi', judulruangdiskusi);

            $userChoosen = confirm("Apakah Anda Yakin Akan Menghapus Ruang Diskusi dengan Tema : ".concat(judulruangdiskusi));

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
        //end hapus 

});
//end ruangdiskusi.js
  