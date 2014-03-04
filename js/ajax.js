var ajaxtime = 10000;
function ajax_talkbox(){
	$.ajax({url:"moodle/talk/ajax_talkbox.php", cache:false, success:function(result){
			$("#talkbox").html(result);
			//reset button
			$("#btnfake_talksendbox").hide();
			$("#btn_talksendbox").show();
			
			//effect
			$(".usertalkbox").hide();
			$("#usertalkbox"+cur_box).show();
			$(".from").prepend("<i class='icon-share-alt'></i>");
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
	}});
};

function ajax_meetingbox(){
	$.ajax({url:"moodle/meetings/ajax_meetingbox.php", cache:false, success:function(result){
			$("#meetingbox").html(result);
	}});
};

function ajax_time(){
	$.ajax({url:"moodle/time/ajax_time.php", cache:false, success:function(result){
			$("#time").html(result);
	}});
};
function ajax_IPC(){
	$.ajax({url:"moodle/IPC_table/ajax_IPC.php", cache:false, success:function(result){
			$("#IPC_table").html(result);
			$('.tdpop_ipc').popover({'container':'#IPC_container'});
	}});
};
function ajax_order(){
	$.ajax({url:"moodle/Cabinet_table/ajax_order.php", cache:false, success:function(result){
			$("#order_table").html(result);
			$('.tdpop_order').popover({'container':'#order'});
	}});
};
 
$(document).ready(function(){
	ajax_time_id =  0;
	ajax_time_id =  window.setInterval(function(){ajax_time()},ajaxtime);
	ajax_meetingbox_id = 0;
	ajax_meetingbox_id = window.setInterval(function(){ajax_meetingbox()},ajaxtime);
	ajax_talkbox_id = 0;
	ajax_talkbox_id = window.setInterval(function(){ajax_talkbox()},ajaxtime);
	
	//will interupt user input
	//if (get_cookie("role")!=0) window.setInterval(function(){ajax_IPC()},ajaxtime);
	//if (get_cookie("role")!=0) window.setInterval(function(){ajax_order()},ajaxtime);

	$("#btnfake_talksendbox").hide();
	
	$('#btn_talksendbox').click(function(){
		$("#btn_talksendbox").hide();
		$("#btnfake_talksendbox").show();
	});
    $('#talksendbox').ajaxForm(function() { 
		 $('#msgcontent').attr("value","");
		 ajax_talkbox();
    }); 
   $('#feedbackform').ajaxForm(function() { 
		$("#feedbackalert").show();
		$("#feedback textarea").hide();
	}); 
}); 