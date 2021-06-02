$( document ).ready(function() {
	//untuk memanggil plugin select2
    $('#perusahaan').select2({
	  	placeholder: 'Pilih Perusahaan',
	  	language: "id"
	});
	$('#bidang').select2({
	  	placeholder: 'Pilih Bidang',
	  	language: "id"
	});
	$('#pekerja').select2({
	  	placeholder: 'Pilih Pekerja',
	  	language: "id"
	});
	

	//saat pilihan perusahaan di pilih maka mengambil data di data-pekerja menggunakan ajax
	$("#perusahaan").change(function(){
	      $("img#load1").show();
	      var perusahaan_id = $(this).val(); 
	      $.ajax({
	         type: "POST",
	         dataType: "html",
	         url: "data-pekerja.php?jenis=bidang",
	         data: "perusahaan_id="+perusahaan_id,
	         success: function(msg){
	            $("select#bidang").html(msg);                                                       
	            $("img#load1").hide();
	            getAjaxBidang();                                                        
	         }
	      });                    
     });  

	

     
});