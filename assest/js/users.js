var li="http://www.peoriafoods.com/demo/";


//password changed
function PasswordChange(){
	$.ajax({
        type: "POST",
        url:li+'home/PasswordChange1',
      }).done (function(data) { 
           $("#PasswordChange1").html(data);
        }).fail (function()  {       
    });
}

function PasswordChange2(data){
	var passwordIn = $(data).val().trim();
	var hiddenSessionId = $('#hiddenSessionId').val().trim();
	//alert(hiddenSessionId);

	if (passwordIn != '' && hiddenSessionId != '') {
		$.ajax({
	        type: "POST",
	        url:li+'home/loginPassword2',
	        data: {passwordIn:""+passwordIn+"", hiddenSessionId:""+hiddenSessionId+""}
	      }).done (function(data) { 
	           $("#password2Result").html(data);
	        }).fail (function()  {       
	    });
	}
	
}
function passwordNewCon3(){
	var passwordNew = $('#passwordNew').val().trim();
	var passwordNewCon = $('#passwordNewCon').val().trim();

	if (passwordNew != '' || passwordNewCon != '') {
		if (passwordNew==passwordNewCon) {
			$passMass = document.getElementById('password3Result').innerHTML = '<span style="margin:5px 0;font-size:12px;color:green;display: block">password matched</span><button value="'+passwordNew+'" onclick="return submitPassword(this)" type="submit"class="btn btn-primary">Changed Password</button>';

		}else{
			document.getElementById('password3Result').innerHTML = '<div class="alert alert-warning">Password not matched</div>';
		}
	}
}
function submitPassword(data){
	var passwordNewCon = $(data).val().trim();
	//alert(passwordNew);

	$.ajax({
        type: "POST",
        url:li+'home/loginPassword3',
        data: {passwordNewCon:""+passwordNewCon+""}
      }).done (function(data) { 
           $("#password4Result").html(data);
        }).fail (function()  {       
    });
}
//change password end


function per_type(data){
	var id = $(data).val().trim();

	if(id == 0){


		$.ajax({
	        type: "POST",
	        url: li+"home/user_access",
	        data: {id:""+id+""}
	      }).done (function(data) { 
	           $('#per').html(data);
	        }).fail (function()  {       
	    });


	}else{
		$("#per").empty();
	}
}

function ttt(id){
	//alert(id);
	if(document.getElementById(id+"c").checked){

		$.ajax({
	        type: "POST",
	        url: li+"home/user_access_sub_menu",
	        data: {id:""+id+""}
	      }).done (function(data) { 
	           $("#"+id+"p").html(data);
	           document.getElementById("getsumitbutton").innerHTML='<button type="submit" class="btn btn-info">Confirm</button>';
	        }).fail (function()  {       
	    });

    }else{
    	$("#"+id+"p").empty();
	    document.getElementById("getsumitbutton").innerHTML='';
    }


}

$("#showPass").click(function(){
		
	if($(this).is(":checked")){
		$("#passShowId").attr('type','text');
	}
	else{			
		$(".#passShowId").attr('type','password');
	}
});



//new start

function deletecat(data){
	var delid = $(data).val().trim();
	
	$.ajax({
        type: "POST",
        url: li+"home/deletecat",
        data: {delid:""+delid+""}
      }).done (function(data) { 
           $('#del'+delid).fadeOut(data);
        }).fail (function()  {       
    });
}
function editcat(data){
	var editcat = $(data).val().trim();
	
	$.ajax({
        type: "POST",
        url: li+"home/editcat",
        data: {editcat:""+editcat+""}
      }).done (function(data) { 
           $("#upcatresult").html(data);
        }).fail (function()  {       
    });
}
function deletegallery(data){
	var delid = $(data).val().trim();
	
	$.ajax({
        type: "POST",
        url: li+"home/deletegallery",
        data: {delid:""+delid+""}
      }).done (function(data) { 
           $('#delg'+delid).fadeOut(data);
        }).fail (function()  {       
    });
}
function editgallery(data){
	var editg = $(data).val().trim();
	
	$.ajax({
        type: "POST",
        url: li+"home/editgallery",
        data: {editg:""+editg+""}
      }).done (function(data) { 
           $("#upcatresult").html(data);
        }).fail (function()  {       
    });
}
function deleteproduct(data){
	var delid = $(data).val().trim();
	
	$.ajax({
        type: "POST",
        url: li+"home/deleteproduct",
        data: {delid:""+delid+""}
      }).done (function(data) { 
           $('#delp'+delid).fadeOut(data);
        }).fail (function()  {       
    });
}
function editproduct(data){
	var editg = $(data).val().trim();
	
	$.ajax({
        type: "POST",
        url: li+"home/editproduct",
        data: {editg:""+editg+""}
      }).done (function(data) { 
           $("#upcatresult").html(data);
        }).fail (function()  {       
    });
}
function userstatus(data){
	var editg = $(data).val().trim();
	
	$.ajax({
        type: "POST",
        url: li+"home/userstatus",
        data: {editg:""+editg+""}
      }).done (function(data) { 
           location.reload();
        }).fail (function()  {       
    });
}
function userdel(data){
	var delid = $(data).val().trim();
	
	$.ajax({
        type: "POST",
        url: li+"home/userdel",
        data: {delid:""+delid+""}
      }).done (function(data) { 
           $('#delu'+delid).fadeOut(data);
        }).fail (function()  {       
    });
}
function searchclick(){
	var proid = $("#seachproid").val().trim();
	
	$.ajax({
        type: "POST",
        url: li+"home/searchproducts",
        data: {proid:""+proid+""}
      }).done (function(data) { 
           $('#searchresultpro').html(data);
        }).fail (function()  {       
    });
}