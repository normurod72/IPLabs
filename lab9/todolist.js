$(function(){
	load_all_contents();
	$("#add_to_bottom").click(add_to_bottom);
	$("#text-box").keydown(function(e){if(e.which==13){add_to_bottom();}});
	$("#delete_from_top").click(delete_from_top);
	$("#list").sortable({
		update:function(e,u){
			var items=[];
			for(var i=0; i<$("#list li").length;i++){
				items[i]=($("#list li")[i].innerText);
			}
	$("#text-box").autocomplete({
		source:items
	});
			$.ajax({
				url:"todolist.php",
				type:"post",
				dataType:"json",
				async:true,
				data:{write_all:1, items:items},
				error:function(sts,xhr){
					console.log(sts,xhr);
				},
				success:function(data){
					//console.log(data);
				}
			});
			$(u.item).effect('bounce');
		}
	});

	function load_all_contents(){
		$.ajax({
			url:"todolist.php",
			type:"post",
			dataType:"json",
			cache:false,
			data:{read_all:1},
			error:function(sts,xhr){
				console.log(sts,xhr);
			},
			success:function(data){
				$("#list").empty();
				for(var i=0; i<data.length; i++){
					$("#list").append($("<li/>").html(data[i]));
				}
			}
		});
	}


	function add_to_bottom(){
		if($("#text-box").val().length!=0){
			$.ajax({
				url:"todolist.php",
				type:"post",
				dataType:"json",
				cache:false,
				data:{
					add:1,
					val:$("#text-box").val()
				},
				error:function(sts,xhr){
					console.log(sts,xhr);
				},
				success:function(data){
					$("#list").append($("<li/>").html($("#text-box").val()));
					$("#text-box").val("");
				}
			});	
		}else{
			return;
		}
	}

	function delete_from_top(){
		$("#delete_from_top").attr("disabled","disabled");
		if($("#list li").length!=0){
			$.ajax({
				url:"todolist.php",
				type:"post",
				dataType:"json",
				cache:false,
				data:{
					delete:1
				},
				error:function(sts,xhr){
					console.log(sts,xhr);
				},
				success:function(data){
					$("#list li").first().remove();	
					$("#delete_from_top").removeAttr("disabled");
				}
			});
		}else{
			return;
		}
	}

	setInterval(function(){
		if($("#text-box").val().length==0){
			$("#add_to_bottom").attr("disabled","disabled");
		}else{
			$("#add_to_bottom").removeAttr("disabled");
		}

		if($("#list li").length==0){
			$("#delete_from_top").attr("disabled","disabled");
		}else{
			$("#delete_from_top").removeAttr("disabled");
		}
	},500);
});
