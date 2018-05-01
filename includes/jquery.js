
$(document).ready(function(e){
 $('#uploadForm').on('submit', function(e){
   e.preventDefault();

$.ajax({
       url: 'updateVerUpload.php',
       type: new FormData(this),
       contentType: false,
       cache: false,
       processData: false,
       success:function(data){
           alert('It works');
        }
      });
   return false;
 });
});
