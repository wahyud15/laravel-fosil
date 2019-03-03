$(document).ready(function(){

    //create penilaian
    $('#formpenilaiancreate').on('submit', function(event){
       var myForm = document.getElementById('formpenilaiancreate');
       var formData = new FormData(myForm);
       var oldloc = location;
       event.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url: penilaianCreateUrl,
          method: 'post',
          data: formData, 
          contentType: false,
          processData: false,
          success: function(result){
            $('#modalCreatePenilaian').modal('hide');
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
       //end formcreatepenilaian

       //get penilaian data
       $('.editPenilaian').on('click', function(event){
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
                  $('#uid').val(result[0].id);
                  $('#unamapejabatfungsional').val(result[0].nama_pejabat_fungsional);
                  $('#uperiodedupak').val(result[0].periode_dupak);
                  $('#utahun').val(result[0].tahun);
                  $('#utglterimatu').val(result[0].tgl_terima_tu);
                  $('#upetugaspenerimatu').val(result[0].petugas_terima_tu);
                  $('#upenilai1_nama').val(result[0].penilai1_nama);
                  $('#upenilai1_tglmulai').val(result[0].penilai1_tglmulai);
                  $('#upenilai1_tglselesai').val(result[0].penilai1_tglselesai);
                  $('#upenilai2_nama').val(result[0].penilai2_nama);
                  $('#upenilai2_tglmulai').val(result[0].penilai2_tglmulai);
                  $('#upenilai2_tglselesai').val(result[0].penilai2_tglselesai);
                  $('#modalUpdatePenilaian').modal('show');
               },

               error: function(XMLHttpRequest){
                alert("Error: " + XMLHttpRequest.responseText); 
               }

           });
       });
       //end getPenilaian

        //update penilaian
        $('#formpenilaianupdate').on('submit', function(event){
                var myForm = document.getElementById('formpenilaianupdate');
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
        //end form update penilaian

        //hapus penilaian
        $('.hapusPenilaian').on('click', function(event){
            var idrow = $(this).parent().parent().find('th').text();
            var link = $(this).attr('name');
            var oldloc = location;
            var formData = new FormData();
            formData.append('didrow', idrow);

            $userChoosen = confirm("Apakah Anda Yakin Akan Menghapus Penilaian dengan ID Row : ".concat(idrow));

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
        //end hapus penilaian
});
//end arsip.js
  