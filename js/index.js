var cur_box = 5;
function show(str){
	$("#main >div").hide();
	$("#"+str).show();
}
$(document).ready(function(){
	//moodle_IPC
	$('.tdpop_ipc').popover({'container':'#IPC_container'});
	$('.tdpop_order').popover({'container':'#order'});
	

	show('talk');
	if (get_cookie("role")>1) show('meetings');
	$(".from").prepend("<i class='icon-share-alt'></i>");
	$(".usertalkbox").hide();
	$("#usertalkbox5").show();
	$("#btn_usertalkbox5").addClass("btn-info");
	if (get_cookie("role")==0) $("#talkbox_toid").attr("value","5");
	
	$(".msg").toggle(
		function(){
			$(".msg").css({"height":"20px"});
			var el = $(this); 
			curHeight = el.height();
			autoHeight = el.css("height","auto").height();
			el.height(curHeight).animate({height: autoHeight});
		},
		function(){
			$(this).animate({"height":"20px"});
		}
	);
	$(".btn_usertalkbox").click(
		function(){
			$(".usertalkbox").hide();
			id = $(this).attr("id").substr(15,100);
			
			//toggle button
			$("#btn_usertalkbox"+cur_box).removeClass("btn-info");
			cur_box = id;
			$("#btn_usertalkbox"+cur_box).addClass("btn-info");
			
			//toggle talkbox
			$("#usertalkbox"+id).show();
			$("#talkbox_toid").attr("value",id);
		}
	);
}); 