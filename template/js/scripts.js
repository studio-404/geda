$(document).ready(function(){

	$(".img-responsive").each(function(){
		var image = $(this).data("mainimage"); 
		console.log(image);
		if(image){
			$.get(image, function(done){ 
				console.log("loaded !"); 
				$("#mainimage").attr({"src":image});
			});
		}
	});

	$("blockquote").has("a").css("margin","0px 0px 0px -9px"); 
	$("blockquote a").each(function(){
		$(this).attr({"class":"col-lg-4","target":"_blank"}); 
		$(this).css("margin-top","10px"); 
	});

	$(".searchinput").keyup(function (e) {
	    if (e.keyCode == 13) {
	    	$("#searchinput").click();
	    }
	});

	$("#clinetEmail").keyup(function (e) {
	    if (e.keyCode == 13) {
	    	$("#subsc").click();
	    }
	});

	$(document).on("click","#subsc",function(){
		var clinetEmail = $("#clinetEmail").val();
		var hostname = window.location.hostname;
		var postemail = "http://"+hostname+"/insertemail"; 
		var s = $(".subscribeMessage").data("success");
		var e = $(".subscribeMessage").data("error");
		if(validateEmail(clinetEmail)){
			$("#clinetEmail").css({"color":"white"});
			$.post(postemail, {email:clinetEmail}, function(data){
				if(data==1){
					$(".subscribeMessage").html(s).fadeIn("slow");
				}else{
					$(".subscribeMessage").html(e).fadeIn("slow");
				}
			})
		}else{
			$(".subscribeMessage").html(e).fadeIn("slow");
		}
		
	});

	$(document).on("click","#searchinput",function(){
		var prefix = $(this).data("prefix");
		var val = encodeURIComponent($(".searchinput").val());
	  	location.href = prefix+val;
	});
});

$(document).on("click","ul-li-dropdown-item",function(){
		console.log("test");
		if($('.ul-li-item-header', this).attr("class")=="ul-li-item-header list-up"){
			$('.ul-li-item-header', this).attr({"class":"ul-li-item-header list-down"});
		}else{
			$('.ul-li-item-header', this).attr({"class":"ul-li-item-header list-up"});
		}
});

$(document).on("click",".cre",function(e){
	$(".leasing-load").fadeOut("slow", function(){
		$(".financeImageBg").attr({"class":"financeImageBg creditBg"});
		$(".credit-load").fadeIn("slow"); 
	});
});

$(document).on("click",".lea",function(e){
	$(".credit-load").fadeOut("slow", function(){
		$(".financeImageBg").attr({"class":"financeImageBg leasingBg"});
		$(".leasing-load").fadeIn("slow"); 
	});
});


function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}



function urlParamiters()
{
	var query_string = new Array();
	var query = window.location.search.substring(1);
	var vars = query.split("&");
	for (var i=0;i<vars.length;i++) {
		var pair = vars[i].split("=");
		if (typeof query_string[pair[0]] === "undefined") {
		  query_string[pair[0]] = pair[1];
		} else if (typeof query_string[pair[0]] === "string") {
		  var arr = [ query_string[pair[0]], pair[1] ];
		  query_string[pair[0]] = arr;
		} else {
		  query_string[pair[0]].push(pair[1]);
		}
	} 
	return query_string;		
}
 