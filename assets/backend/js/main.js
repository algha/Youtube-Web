 $(document).ready(function () {
	 
 	$(".ts-sidebar-menu li a").each(function () {
 		if ($(this).next().length > 0) {
 			$(this).addClass("parent");
 		};
 	})
 	var menux = $('.ts-sidebar-menu li a.parent');
 	$('<div class="more"><i class="fa fa-angle-down"></i></div>').insertBefore(menux);
 	$('.more').click(function () {
 		$(this).parent('li').toggleClass('open');
 	});
	$('.parent').click(function (e) {
		e.preventDefault();
 		$(this).parent('li').toggleClass('open');
 	});
 	$('.menu-btn').click(function () {
 		$('nav.ts-sidebar').toggleClass('menu-open');
 	});
	
 });
 
 function InitOverviewDataTable(id,url,aoColumns,columnDefs,options)
 {
   oOverviewTable = $(id).dataTable(
   {
     "bPaginate": options.pagination,
     "bJQueryUI": true,
     "bLengthChange": true,
     "bFilter": options.filter,
     "bSort": options.sort,
     "bInfo": options.info,
     "bAutoWidth": true,
     "bProcessing": true,
     "serverSide": options.serverSide,
     "iDisplayLength": options.pageLength,
     "sAjaxSource": url,
     "aoColumns":aoColumns,
     "columnDefs":columnDefs
   });
 }

 function RefreshTable(tableId, urlData)
 {
   $.getJSON(urlData, null, function( json )
   {
     table = $(tableId).dataTable();
     oSettings = table.fnSettings();

     table.fnClearTable(this);
     
     for (var i=0; i<json.aaData.length; i++)
     {
       table.oApi._fnAddData(oSettings, json.aaData[i]);
     }

     oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
     table.fnDraw();
   });
 }
 
 function del(url,id,dataUrl){
	    $.ajax({
	        type: "get",
	        url: url,
	        cache: false,               
	        success: function(json){                        
		        try{        
		            var obj = jQuery.parseJSON(json);
		            RefreshTable(id,dataUrl);
		            if(obj.status == 0){
		            	toastr.error(obj.info, 'くるみ');
		            }else {
		            	toastr.success(obj.info, 'くるみ');
		            }
		            
		        }catch(e) {     
		        	toastr.error('Exception while request.. json error', 'Inconceivable!')
		        }       
	        },
	        error: function(){                      
	        	toastr.error('Exception while request..', 'Inconceivable!')
	        }
	    });
 }

 function SubmitAjax(element){
	 	var url = $(element).attr("action");
	 	var id = $(element).data("id");
	 	var dataUrl = $(element).data("table-source");
	 	var data = $(element).serialize();
	    $.ajax({
	        type: "post",
	        url: url,
	        cache: false,               
	        data: data,
	        success: function(json){   
	        	//alert(json);
		        try{        
		            var obj = jQuery.parseJSON(json);
		            RefreshTable(id,dataUrl);
		            toastr.success(obj.info, 'Kumuri');
		        }catch(e) {     
		        	toastr.error('json error,Exception while request.. ', 'Inconceivable!')
		        }       
	        },
	        error: function(){  
	        	//alert(json);
	        	toastr.error('Exception while request..', 'Inconceivable!')
	        }
	    });
	 return false;
}

 function SubmitAjaxOnly(element){
	 	var url = $(element).attr("action");
	 	var data = $(element).serialize();
	    $.ajax({
	        type: "POST",
	        url: url,          
	        data: data,
	        success: function(json){  
		        try{
		            var obj = jQuery.parseJSON(json);
		            if (obj.status == 0){
		        		alert(obj.info);
		        		return;
		        	}
		            if(obj.redirect != null){
		            	window.location.href = obj.redirect;
		            	return;
		            }
		            if (obj.showMessage == true){
		            	toastr.success(obj.info, 'Kumuri');
		            	return;
		            }
		        }catch(e) {     
		        	toastr.error(' json error, Exception while request..', 'Inconceivable!');
		        }       
	        },
	        error: function(){                      
	        	toastr.error('Exception while request..', 'Inconceivable!');
	        }
	    });
	 return false;
}

 
function handleClick(cb) {
	var classname = $(cb).data("class");
	if(cb.checked){
		$("."+classname).prop('checked', true);
	}else{
		$("."+classname).prop('checked', false);
	}
}

function checkChekced(cb){
	var classname = $(cb).attr("class");
	var checkedLength = $("."+classname+":checked").size();
	var length = $("."+classname).size();
	if (checkedLength == length){
		$("#"+classname).prop('checked', true);
	}else{
		$("#"+classname).prop('checked', false);
	}
}

function uploadImage(id,posturl){
	input = $(".image_input");
	
	input.change(function(event){
		file = $(this)[0].files[0];
		if (file == "undefined"){
			return;
		}
		var formData = new FormData();
		formData.append("Image", file);
		
		$.ajax({
			  url: posturl,
			  data: formData,
			  processData: false,
			  contentType: false,
			  type: 'POST',
			  success: function(data){
				//  alert(data);
				  try {
					  var result = $.parseJSON(data); 
					  createHTML(id, result);
					}
					catch(err) {
						alert("Select a image, and data is:"+data); 
					}
			  },
			  error: function (result) {
	                alert("Error");
	           }
		});
	});
}

function createHTML(parent_id, result){
	fileurl = result.address;
	input = result.input;
	var div = $("<div class='imgList'></div>");
	div.append("<img src='"+fileurl+"' />");
	div.append("<span onclick='remove(this)'>x</span>");
	div.append("<input type='hidden' name='Images[]' value='"+input+"' />");
	$(parent_id).append(div);
}

function remove(el){
	parent = $(el).parent();
	parent.remove();
	
}