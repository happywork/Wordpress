jQuery(document).ready(function($){


	


	$("#main_playlists").accordion({


		header: ".main-playlist-header",


    	collapsible: true,


    	heightStyle: "content",


    	active: false


    }).sortable({


        axis: "x,y",


        handle: ".main-playlist-header",


        start: startMainPlaylistsOrder,


        update: updateMainPlaylistsOrder


    });





	$(".pls").accordion({


		header: ".playlist-header",


    	collapsible: true,


    	heightStyle: "content",


    	active: false


    }).sortable({


        axis: "x,y",


        handle: ".playlist-header-sort",


        start: startPlaylistsOrder,


        update: updatePlaylistsOrder


    });


	


	$(".fwd-playlist").mouseover(function(){


		$(this).addClass("pl_over");


		$(this).find(".pl-header").css("color", "#212121");


	});


	


	$(".fwd-playlist").mouseout(function(){


		$(this).removeClass("pl_over");


		$(this).find(".pl-header").css("color", "#555555");


	});


	


	var imgPath = iconsPath + "normal-icon.png";


	var img = "<img src='" + imgPath + "' style='position:absolute;left:6px;top:6px;'>";


	


	$(".playlist > h3").prepend(img);


	


	$(".playlist-header .ui-accordion-header-icon").css("left", "22px");





	$(".vids").sortable({


        axis: "x,y",


        handle: ".video-header",


        start: startVideosOrder,


        update: updateVideosOrder


    });


	


	$(".fwd-video").mouseover(function(){


		$(this).addClass("vid_over");


		$(this).find(".video-header").css("color", "#212121");


	});


	


	$(".fwd-video").mouseout(function(){


		$(this).removeClass("vid_over");


		$(this).find(".video-header").css("color", "#555555");


	});


	


	if ($("#main_playlists .main-playlist").length > 0){


		$("#mp_em").hide();


	}


	


	$("img").tooltip({


        position:{


    		my: "center bottom-10",


    		at: "center top"


        }


    });


    


	


	function startMainPlaylistsOrder(ev, ui){


		var allMpItems = $(this).sortable("toArray");	


		curMpOrderId = allMpItems.indexOf($(ui.item).attr("id"));


	}


	


	function updateMainPlaylistsOrder(ev, ui){


		var allMpItems = $(this).sortable("toArray");


   		newMpOrderId = allMpItems.indexOf($(ui.item).attr("id"));


   		


   		var curItem = mainPlaylistsAr.splice(curMpOrderId, 1)[0];


   	    mainPlaylistsAr.splice(newMpOrderId, 0, curItem);


	};


	


	function startPlaylistsOrder(ev, ui){


		var allPlItems = $(this).sortable("toArray");


		curPlOrderId = allPlItems.indexOf($(ui.item).attr("id"));


	}


	


	function updatePlaylistsOrder(ev, ui){


		var allPlItems = $(this).sortable("toArray");


   		newPlOrderId = allPlItems.indexOf($(ui.item).attr("id"));


   		


   		var allMpItems = $("#main_playlists").sortable("toArray");


   		var plParent = $(this).closest(".main-playlist");


   		


   		curMpOrderId = allMpItems.indexOf($(plParent).attr("id"));


		


   		var curItem = mainPlaylistsAr[curMpOrderId].playlists.splice(curPlOrderId, 1)[0];


		


		mainPlaylistsAr[curMpOrderId].playlists.splice(newPlOrderId, 0, curItem);


	}


	


	function startVideosOrder(ev, ui){


		var allVidItems = $(this).sortable("toArray");


		


		curVidOrderId = allVidItems.indexOf($(ui.item).attr("id"));


	}


	


	function updateVideosOrder(ev, ui){


		var allVidItems = $(this).sortable("toArray");





   		newVidOrderId = allVidItems.indexOf($(ui.item).attr("id"));


   		


   		var allMpItems = $("#main_playlists").sortable("toArray");


   		var plParent = $(this).closest(".main-playlist");


   		


   		curMpOrderId = allMpItems.indexOf($(plParent).attr("id"));


   		


   		var allPlItems = $($(this).closest(".pls")).sortable("toArray");


   		var catParent = $(this).closest(".playlist");





   		curPlOrderId = allPlItems.indexOf($(catParent).attr("id"));


   		


   		var curItem = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos.splice(curVidOrderId, 1)[0];


   	  


   		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos.splice(newVidOrderId, 0, curItem);


	}
	
	function checkTimeFormat(tips, el, prop, min, max){
		
		var timeRegExp = /^(?:2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]$/;
		
      	if(!timeRegExp.test(el.val())){
        	el.addClass("ui-state-error");
        	updateTips(tips, "The  " + prop + " field must have the format hh:mm:ss ex:00:10:48.");
        	return false;
      	}else{
        	return true;
      	}

	}





    function checkLength(tips, el, prop, min, max){


      	if ((el.val().length > max) || (el.val().length < min)){


        	el.addClass("ui-state-error");


        	updateTips(tips, "Length of " + prop + " must be between " + min + " and " + max + ".");


        	


        	return false;


      	}else{


        	return true;


      	}


	}


	


	function checkMP4OrYoutube(tips, el, prop){


    	var str = el.val().toLowerCase();


		


    	if ((str.length < 2) || (str.indexOf("vimeo.com") != -1) || (str.length < 2) || (str.indexOf(".mp4") != -1) || ((str.indexOf("youtube.com") != -1) && ((str.indexOf("?v=") != -1) || (str.indexOf("&v=") != -1)))) {


            return true;


        }else{


        	el.addClass("ui-state-error");


        	updateTips(tips, "The " + prop + " field value is not a MP4 video or a well formatted Youtube or Vimeo video URL.");


        	


        	return false;


        }


	}


	


	function checkYoutubePlaylist(tips, el, prop){


    	var str = el.val().toLowerCase();


		


    	if ((str.indexOf("youtube.com") != -1) && ((str.indexOf("?list=") != -1) || (str.indexOf("&list=") != -1))){


            return true;


        }else{


        	el.addClass("ui-state-error");


        	updateTips(tips, "The " + prop + " field value is not a well formatted Youtube playlist URL.");


        	


        	return false;


        }


	}


	


	function checkFolder(tips, el, prop){


    	var str = el.val().toLowerCase();


		


    	if ((str.indexOf("http:") != -1) || (str.indexOf("https:") != -1) || (str.indexOf("ftp:") != -1)){


			el.addClass("ui-state-error");


        	updateTips(tips, "The " + prop + " field value is not a well formatted folder path.");


        	


        	return false;


        }else{


			return true;


        }


	}
	
	
	function checkXML(tips, el, prop){

    	var str = el.val().toLowerCase();

		

    	if ((str.indexOf(".xml") == -1)){

			el.addClass("ui-state-error");

        	updateTips(tips, "The " + prop + " field value is not a well formatted xml path.");

   
        	return false;

        }else{

			return true;

        }

	}
	
	





	function updateTips(tips, txt){


	    tips.text(txt).addClass("ui-state-highlight");


	    setTimeout(function(){


	    	tips.removeClass("ui-state-highlight", 1500);


	    }, 500);


	    


	    tips.addClass("fwd-error");


	}


	


	/* ################################### */


	// main playlist


	/* ################################### */


	var curMpOrderId;


	var newMpOrderId;


	


	var curVidOrderId;


	var newVidOrderId;


	var allFieldsMp = $([]).add($("#mp_name"));


	var allFieldsMpEdit = $([]).add($("#mp_name_edit"));


	


	


	$("#add_main_playlist_btn").click(function(e){


		e.preventDefault();


        $("#add-main-playlist-dialog").dialog("open");


    });





	$("#add-main-playlist-dialog").dialog({


		autoOpen: false,


		width: 350,


	    height: 250,


	    modal: true,


	    buttons:{


	        "Add main playlist": function(){


	         	var fValid = true;


	         	var tips = $("#add_mp_tips");


	         	


	          	allFieldsMp.removeClass("ui-state-error");


	 


	          	fValid = fValid && checkLength(tips, $("#mp_name"), "name", 1, 64);


	 


	          	if (fValid){


	


	          		var mid = $("#main_playlists .main-playlist").length;


				


	          		var plsIdsAr = [];


	          		


	          		if (mid > 0){


	          			$.each(mainPlaylistsAr, function(i, el){


							plsIdsAr.push(el.id);


						});


    	          		for (var i=0; i<mainPlaylistsAr.length; i++){


    	          			if($.inArray(i, plsIdsAr) == -1){


    	          				mid = i;


    	          				break;


    	          			}


    	          		}


	          		}else{


	          			$("#mp_em").hide();


	          		}


	          		


		            $("#main_playlists").append("<div id='mp" + mid + "' class='main-playlist'>"


		    	    	+ "<h3 class='main-playlist-header'>" + $("#mp_name").val().replace(/"/g, "'") + " <span style='float:right'>ID : " + mid + "</span></h3>"


		    	       	+ "<div>"


		    	       	+ "<div id='mp" + mid + "_pls' class='pls' style='width:654px'></div>"


		    	       	+ "<button class='add_playlist_btn' id='mp" + mid + "_add_btn' style='cursor:pointer;'>Add new playlist</button>"


		    	       	+ "<button class='edit_main_playlist_btn' id='mp" + mid + "_edit_btn' style='cursor:pointer;'>Edit</button>"


		    	    	+ "<button class='delete_main_playlist_btn' id='mp" + mid + "_del_btn' style='cursor:pointer;'>Delete</button>"


		    	       	+ "</div>"


		    	   	+ "</div>");





		            $(".add_playlist_btn").click(function(e){


						e.preventDefault();


						


            			var reg_exp = /mp[0-9]+_/;


            			cur_mp_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));


            	        $("#add-playlist-dialog").dialog("open");


            	    });


		            


		            $(".edit_main_playlist_btn").click(function(e){


						e.preventDefault();


					


            			var reg_exp = /mp[0-9]+_/;


            			cur_mp_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));


            			


            			var allMpItems = $("#main_playlists").sortable("toArray");


            	   		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);


            			


            	        $("#edit-main-playlist-dialog").dialog("open");


            	    });


		            


		            $(".delete_main_playlist_btn").click(function(e){


						e.preventDefault();


					


            			var reg_exp = /mp[0-9]+_/;


            			


            			cur_mp_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));         			


            			


            	        $("#delete-main-playlist-dialog").dialog("open");


            	    });


		            


		            $("#mp" + mid + "_pls").accordion({


            			header: ".playlist-header",


            	    	collapsible: true,


            	    	heightStyle: "content",


            	    	active: false


            	    }).sortable({


            	        axis: "x,y",


            	        handle: ".playlist-header-sort",


            	        start: startPlaylistsOrder,


            	        update: updatePlaylistsOrder


            	    });       





		            $("#main_playlists").sortable("refresh");


		            $("#main_playlists").accordion("refresh");


		            


		            var newMp ={


		            	id: mid,


		            	name: $("#mp_name").val().replace(/"/g, "'"),


		            	playlists: []


		            };


		            


		            mainPlaylistsAr.push(newMp);





		            $(this).dialog("close");


	         	 }	


	        },


	        "Cancel": function(){


	        	$(this).dialog("close");


	        }


	    },


	    close: function(){


		    allFieldsMp.removeClass("ui-state-error");


		    $("#add_mp_tips").removeClass("fwd-error");


	    },


	    open: function(){


	    	$("#mp_name").val("");  


		    $("#add_mp_tips").text("The name field is required.");


		}


	});


	


	$(".edit_main_playlist_btn").click(function(e){


		e.preventDefault();


		


		var reg_exp = /mp[0-9]+_/;


		cur_mp_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));


		


		var allMpItems = $("#main_playlists").sortable("toArray");


   		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);


		


        $("#edit-main-playlist-dialog").dialog("open");


    });





	$("#edit-main-playlist-dialog").dialog({


		autoOpen: false,


		width: 350,


	    height: 250,


	    modal: true,


	    buttons:{


	        "Update": function(){


	         	var fValid = true;


	         	var tips = $("#edit_mp_tips");


	         	


	         	allFieldsMpEdit.removeClass("ui-state-error");


	 


	          	fValid = fValid && checkLength(tips, $("#mp_name_edit"), "name", 1, 64);


	 


	          	if (fValid){


	          		var content = $("#mp" + cur_mp_id + " > h3").html();


	          		var pos = content.indexOf(mainPlaylistsAr[curMpOrderId].name);


	          		


	          		content = content.slice(0, pos);


	          		


	          		$("#mp" + cur_mp_id + " > h3").html(content + $("#mp_name_edit").val().replace(/"/g, "'") + "<span style='float:right'>ID : " + mainPlaylistsAr[curMpOrderId].id + "</span>");


	          		


		            mainPlaylistsAr[curMpOrderId].name = $("#mp_name_edit").val().replace(/"/g, "'");


		            


		            $(this).dialog("close");


	         	 }	


	        },


	        "Cancel": function(){


	        	$(this).dialog("close");


	        }


	    },


	    close: function(){


		    allFieldsMpEdit.removeClass("ui-state-error");


		    $("#edit_mp_tips").removeClass("fwd-error");


	    },


	    open: function(){


	    	$("#mp_name_edit").val(mainPlaylistsAr[curMpOrderId].name);


	    	$("#edit_mp_tips").text("The name field is required.");


		}


	});


	


	$(".delete_main_playlist_btn").click(function(e){


		e.preventDefault();


	


		var reg_exp = /mp[0-9]+_/;


		cur_mp_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));


		


        $("#delete-main-playlist-dialog").dialog("open");


    });


	


	$("#delete-main-playlist-dialog").dialog({


		autoOpen: false,


		width: 320,


	    height: 160,


	    modal: true,


	    buttons:{


	        "Yes": function(){


		   		var allMpItems = $("#main_playlists").sortable("toArray");


	       		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);





		   		mainPlaylistsAr.splice(curMpOrderId, 1);


		   		


	            $("#mp" + cur_mp_id).remove();


	            


	            $("#main_playlists").accordion("option", "active", false);


	            $("#main_playlists").sortable("refresh");


	            $("#main_playlists").accordion("refresh");


	            


	            if ($("#main_playlists .main-playlist").length == 0){


	            	$("#mp_em").show();


	            }


	            


	            $(this).dialog("close");


	        },


	        "No": function(){


	        	$(this).dialog("close");


	        }


	    }


	});


	


	/* ################################### */


	// playlist dialogs


	/* ################################### */


	var curPlOrderId;


	var newPlOrderId;


	var pl_name = $("#pl_name");


    var pl_type = $("#pl_type");


	var pl_source = $("#pl_source");


    var pl_thumb = $("#pl_thumb");


    var pl_text = $("#pl_text");


	var allFieldsPl = $([]).add(pl_name).add(pl_source).add(pl_thumb);


	var pl_name_edit = $("#pl_name_edit");


    var pl_type_edit = $("#pl_type_edit");


	var pl_source_edit = $("#pl_source_edit");


    var pl_thumb_edit = $("#pl_thumb_edit");


    var pl_text_edit = $("#pl_text_edit");


	var allFieldsPlEdit = $([]).add(pl_name_edit).add(pl_source_edit).add(pl_thumb_edit);


	


	$("#add-playlist-dialog").dialog({


		autoOpen: false,


		width: 610,


	    height: 690,


	    modal: true,


	    buttons:{


	        "Add playlist": function(){


	         	


				var fValid = true;


	         	var tips = $("#add_pl_tips");


	         	


	          	allFieldsPl.removeClass("ui-state-error");


	 


	          	fValid = fValid && checkLength(tips, pl_name, "playlist name", 1, 64);


				


				if ($("#pl_type").val() != "normal"){


					fValid = fValid && checkLength(tips, pl_source, "playlist source", 1, 256);


					


					switch ($("#pl_type").val()){


						case "youtube":


							fValid = fValid && checkYoutubePlaylist(tips, pl_source, "playlist source");


							break;


						case "folder":


							fValid = fValid && checkFolder(tips, pl_source, "playlist source");


							break;
						case "xml":

							fValid = fValid && checkXML(tips, pl_source, "playlist source");

							break;


					}


				}


				


	       		fValid = fValid && checkLength(tips, pl_thumb, "playlist thumbnail path", 1, 256);


				


				fValid = true;


	 


	          	if (fValid){


					


	          		var pid = $("#mp" + cur_mp_id + "_pls .playlist-count").length;


	          		var plsIdsAr = [];


	          		


	          		var allMpItems = $("#main_playlists").sortable("toArray");


	          		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);


	          		


	          		$.each($("#mp" + cur_mp_id + "_pls .playlist-count"), function(i, el){


	          			var reg_exp = /pl[0-9]+/;


            			var pl_id = parseInt($(el).attr("id").match(reg_exp)[0].slice(2));


            			


            			plsIdsAr.push(pl_id);


      				});


	          		


	          		for (var i=0; i<mainPlaylistsAr[curMpOrderId].playlists.length; i++){


	          			if ($.inArray(i, plsIdsAr) == -1){


	          				pid = i;


	          				break;


	          			}


	          		}


					


					if ($("#pl_type").val() != "normal"){


						var imgPath = iconsPath;


					


						switch ($("#pl_type").val()){


							case "youtube":


								imgPath += "youtube-icon.png";


								break;


							case "folder":


								imgPath += "folder-icon.png";


								break;
							case "xml":

								imgPath += "xml-icon.png";

								break;


						}


						


						var img = "<img src='" + imgPath + "' style='position:absolute;left:6px;top:6px;'>";


					


						$("#mp" + cur_mp_id + "_pls").append("<div id='mp" + cur_mp_id + "_pl" + pid + "' class='fwd-playlist playlist-count'>"


							+ img


							+ "<h3 class='playlist-header-sort pl-header'><span style='position:relative; margin-left:22px; top:-1px;'>" + pl_name.val().replace(/"/g, "'") + "</span></h3>"
							


							+ "<button class='edit_playlist_btn2' id='mp" + cur_mp_id + "_pl" + pid + "_edit_btn'>Edit</button>"


							+ "<button class='delete_playlist_btn2' id='mp" + cur_mp_id + "_pl" + pid + "_del_btn'>Delete</button>"


						+ "</div>");


						


						$(".fwd-playlist").mouseover(function(){


							$(this).addClass("pl_over");


							$(this).find(".pl-header").css("color", "#212121");


						});


						


						$(".fwd-playlist").mouseout(function(){


							$(this).removeClass("pl_over");


							$(this).find(".pl-header").css("color", "#555555");


						});


					}else{


						$("#mp" + cur_mp_id + "_pls").append("<div id='mp" + cur_mp_id + "_pl" + pid + "' class='playlist playlist-count'>"


							+ "<h3 class='playlist-header-sort playlist-header'><span style='margin-left:12px;'>" + pl_name.val().replace(/"/g, "'") + "</span></h3>"


							+ "<div>"


							+ "<div id='mp" + cur_mp_id + "_pl" + pid + "_vids' class='vids' style='width:554px'></div>"


							+ "<button class='add_video_btn' id='mp" + cur_mp_id + "_pl" + pid + "_btn' style='cursor:pointer;'>Add new video</button>"


							+ "<button class='edit_playlist_btn' id='mp" + cur_mp_id + "_pl" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"


							+ "<button class='delete_playlist_btn' id='mp" + cur_mp_id + "_pl" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"


							+ "</div>"


						+ "</div>");


						


						var imgPath = iconsPath + "normal-icon.png";


						var img = "<img src='" + imgPath + "' style='position:absolute;left:6px;top:6px;'>";


						


						$(".playlist > h3").prepend(img);


					


						$(".add_video_btn").click(function(e){


							e.preventDefault();


						


							var reg_exp1 = /mp[0-9]+_/;


							var reg_exp2 = /pl[0-9]+_/;


							


							cur_mp_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));


							cur_pl_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(2, -1));


							


							$("#add-video-dialog").dialog("open");


						});


					}


					


					$(".edit_playlist_btn, .edit_playlist_btn2").click(function(e){


						e.preventDefault();


					


						var reg_exp1 = /mp[0-9]+_/;


						var reg_exp2 = /pl[0-9]+_/;


						


						cur_mp_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));


						cur_pl_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(2, -1));


						


						var allMpItems = $("#main_playlists").sortable("toArray");


						curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);


						


						var allPlItems = $("#mp" + cur_mp_id + "_pls").sortable("toArray");


						curPlOrderId = allPlItems.indexOf("mp" + cur_mp_id + "_pl" + cur_pl_id);


						


						$("#edit-playlist-dialog").dialog("open");


					});


					


					$(".delete_playlist_btn, .delete_playlist_btn2").click(function(e){


						e.preventDefault();


					


						var reg_exp1 = /mp[0-9]+_/;


						var reg_exp2 = /pl[0-9]+_/;


						


						cur_mp_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));


						cur_pl_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(2, -1));


						


						$("#delete-playlist-dialog").dialog("open");


					});


		            


		            $("#mp" + cur_mp_id + "_pl" + pid + "_vids").sortable({


            	        axis: "x,y",


            	        handle: ".video-header",


            	        start: startVideosOrder,


            	        update: updateVideosOrder


            	    });





		            $(".pls").sortable("refresh");


		            $(".pls").accordion("refresh");


					


					$(".playlist-header .ui-accordion-header-icon").css("left", "22px");


		            


		            var newPl ={


		            	name: pl_name.val().replace(/"/g, "'"),


						type: pl_type.val(),


						source: pl_source.val().replace(/"/g, "'"),


						thumb: pl_thumb.val().replace(/"/g, "'"),


						text: getPlaylistText(),


		            	videos: []


		            };


		            


		            mainPlaylistsAr[curMpOrderId].playlists.push(newPl);





		            $(this).dialog("close");


	         	 }	


	        },


	        "Cancel": function() {


	        	$(this).dialog("close");


	        }


	    },


	    close: function(){


		    allFieldsPl.removeClass("ui-state-error");  


		    $("#add_pl_tips").removeClass("fwd-error");


	    },


	    open: function(){


	    	$("#pl_name").val("");


			$("#pl_type").val("normal");


			$("#pl_source").val("");


	    	$("#pl_thumb").val("");


		    


		    setPlaylistText("");


			


			$("#uploads_pl_thumb").attr("src", "");


		    


		    $("#wp-pltext-wrap").attr("style", "margin-top:-30px;");


		    $("#pltext-html").html("HTML");


			


			$("#pl_source_div").hide();


	    	


	    	$("#add_pl_tips").text("The playlist name and thumbnail path fields are required (and also the playlist source if the type is not 'normal').");


			


			$("#pltext_ifr").height(181);


		}


	});


	


	function setPlaylistText(str){


		if (typeof tinyMCE !== "undefined" && tinyMCE.get("pltext")){


			tinyMCE.get("pltext").setContent(str);


		}


	    


	    $("#pltext").val(str);


	}


	


	function getPlaylistText(){


		var pl_text;


		


		if (typeof tinyMCE !== "undefined" && tinyMCE.get("pltext")){


			if ($("#wp-pltext-wrap").hasClass("tmce-active")){


				pl_text = tinyMCE.get("pltext").getContent();


				


				if (pl_text.length < 1){


					pl_text = $("#pltext").val();


				}


			}else{


				pl_text = $("#pltext").val();


			}


	    }else{


			pl_text = $("#pltext").val();


		}





        return pl_text.replace(/"/g, "'").replace(/\n/g, "");


	}


	


	$("#pl_type").change(function(){


		if ($("#pl_type").val() == "normal"){


			$("#pl_source_div").hide(200);


		}else{


			$("#pl_source_div").show(200);


			


			switch ($("#pl_type").val()){


				case "youtube":


					$("#source_help_img").prop("title", "The source must be a Youtube playlist URL that looks something like this 'http://www.youtube.com/playlist?list=PL5F394CB9AB8A3519'.");


					break;


				case "folder":


					$("#source_help_img").prop("title", "The source represents the relative path to a folder containing only MP4 files that must be a subfolder of the 'content' folder contained in the plugin directory 'wp-content/plugins/fwduvp'.");


					break;
					
				case "xml":

					$("#source_help_img").prop("title", "The source represents the absolute path of an XML file that contains a formatted XML playlist. You can get the file example from the plugin main zip file or from the following URL  http://webdesign-flash.ro/w/uvp/content/playlist_dark.xml.");

					break;


			}


		}


	});





	$(".add_playlist_btn").click(function(e){


		e.preventDefault();


	


		var reg_exp = /mp[0-9]+_/;


		


		cur_mp_id = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));


		


        $("#add-playlist-dialog").dialog("open");


    });


    


	$("#edit-playlist-dialog").dialog({


		autoOpen: false,


		width: 610,


	    height: 690,


	    modal: true,


	    buttons:{


	        "Update playlist": function(){


	         	var fValid = true;


	         	var tips = $("#edit_pl_tips");


	         	


	          	allFieldsPlEdit.removeClass("ui-state-error");


				


				fValid = fValid && checkLength(tips, pl_name_edit, "playlist name", 1, 64);


				


				if ($("#pl_type_edit").val() != "normal"){


					fValid = fValid && checkLength(tips, pl_source_edit, "playlist source", 1, 256);


					


					switch ($("#pl_type_edit ").val()){


						case "youtube":


							fValid = fValid && checkYoutubePlaylist(tips, pl_source_edit, "playlist source");


							break;


						case "folder":


							fValid = fValid && checkFolder(tips, pl_source_edit, "playlist source");


							break;
						
						case "xml":

							fValid = fValid && checkXML(tips, pl_source_edit, "playlist source");

							break;


					}


				}


				


	       		fValid = fValid && checkLength(tips, pl_thumb_edit, "playlist thumbnail path", 1, 256);


			


	          	if (fValid){


	          		


					var content = $("#mp" + cur_mp_id + "_pl" + cur_pl_id + " > h3").html();


	          		var pos = content.indexOf(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].name);


					


	          		content = content.slice(0, pos);


	          		


	          		$("#mp" + cur_mp_id + "_pl" + cur_pl_id + " > h3").html(content + pl_name_edit.val().replace(/"/g, "'"));


	          		


	          		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].name = pl_name_edit.val().replace(/"/g, "'");


	          		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].source = pl_source_edit.val().replace(/"/g, "'");


	          		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].thumb = pl_thumb_edit.val().replace(/"/g, "'");


	          		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].text = getPlaylistTextEdit();





		            $(this).dialog("close");


	         	 }	


	        },


	        "Cancel": function(){


	        	$(this).dialog("close");


	        }


	    },


	    close: function(){


		    allFieldsPlEdit.removeClass("ui-state-error");


		    $("#edit_pl_tips").removeClass("fwd-error");


	    },


	    open: function(){


			$("#pl_name_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].name);


			


			$("#pl_type_edit").prop("disabled", false);


			$("#pl_type_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].type);
			


			$("#pl_type_edit").prop("disabled", true);


			


			$("#pl_source_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].source);


	    	$("#pl_thumb_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].thumb);


		    


		    setPlaylistTextEdit(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].text);


			


			$("#uploads_pl_thumb_edit").attr("src", mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].thumb);


		    


		    $("#wp-pltextedit-wrap").attr("style", "margin-top:-30px;");


		    $("#pltextedit-html").html("HTML");


			


			if ($("#pl_type_edit").val() == "normal"){


				$("#pl_source_div_edit").hide();


			}else{


				$("#pl_source_div_edit").show();


				


				switch ($("#pl_type_edit").val()){


					case "youtube":


						$("#source_help_img_edit").prop("title", "The source must be a Youtube playlist URL that looks something like this 'http://www.youtube.com/playlist?list=PL5F394CB9AB8A3519'.");


						break;


					case "folder":


						$("#source_help_img_edit").prop("title", "The source represents the relative path to a folder containing only MP4 files that must be a subfolder of the 'content' folder contained in the plugin directory 'wp-content/plugins/fwduvp'.");


						break;
						
					case "xml":

						$("#source_help_img_edit").prop("title", "The source represents the absolute path of an XML file that contains a formatted XML playlist. You can get the file example from the plugin main zip file or from the following URL  http://webdesign-flash.ro/w/uvp/content/playlist_dark.xml.");

						break;


				}


			}


	    	


	    	$("#edit_pl_tips").text("The playlist name and thumbnail path fields are required (and also the playlist source if the type is not 'normal').");


			


			$("#pltextedit_ifr").height(181);


		}


	});


	


	function setPlaylistTextEdit(str){


		if (typeof tinyMCE !== "undefined" && tinyMCE.get("pltextedit")){


			tinyMCE.get("pltextedit").setContent(str);


		}


	    


	    $("#pltextedit").val(str);


	}


	


	function getPlaylistTextEdit(){


		var pl_text_edit;


		


		if (typeof tinyMCE !== "undefined" && tinyMCE.get("pltextedit")){


			if ($("#wp-pltextedit-wrap").hasClass("tmce-active")){


				pl_text_edit = tinyMCE.get("pltextedit").getContent();


				


				if (pl_text_edit.length < 1){


					pl_text_edit = $("#pltextedit").val();


				}


			}else{


				pl_text_edit = $("#pltextedit").val();


			}


	    }else{


			pl_text_edit = $("#pltextedit").val();


		}





        return pl_text_edit.replace(/"/g, "'").replace(/\n/g, "");


	}


	


	$(".edit_playlist_btn, .edit_playlist_btn2").click(function(e){


		e.preventDefault();


	


		var reg_exp1 = /mp[0-9]+_/;


		var reg_exp2 = /pl[0-9]+_/;


		


		cur_mp_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));


		cur_pl_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(2, -1));


		


		var allMpItems = $("#main_playlists").sortable("toArray");


		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);


		


		var allPlItems = $("#mp" + cur_mp_id + "_pls").sortable("toArray");


		curPlOrderId = allPlItems.indexOf("mp" + cur_mp_id + "_pl" + cur_pl_id);


		


		$("#edit-playlist-dialog").dialog("open");


	});


	


	$("#delete-playlist-dialog").dialog({


		autoOpen: false,


		width: 300,


	    height: 160,


	    modal: true,


	    buttons:{


	        "Yes": function(){


	            var allMpItems = $("#main_playlists").sortable("toArray");


	       		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);


	            


	            var allPlItems = $("#mp" + cur_mp_id + "_pls").sortable("toArray");


	       		curPlOrderId = allPlItems.indexOf("mp" + cur_mp_id + "_pl" + cur_pl_id);


	       		


	       		mainPlaylistsAr[curMpOrderId].playlists.splice(curPlOrderId, 1);


	       		


	       		$("#mp" + cur_mp_id + "_pl" + cur_pl_id).remove();


	       		


	       		$(".pls").accordion("option", "active", false);





	       		$(".pls").sortable("refresh");


	            $(".pls").accordion("refresh");


				


				$(".playlist-header .ui-accordion-header-icon").css("left", "22px");


	            


	            $(this).dialog("close");


	        },


	        "No": function(){


	        	$(this).dialog("close");


	        }


	    }


	});


	


	$(".delete_playlist_btn, .delete_playlist_btn2").click(function(e)


	{


		e.preventDefault();


	


		var reg_exp1 = /mp[0-9]+_/;


		var reg_exp2 = /pl[0-9]+_/;


		


		cur_mp_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));


		cur_pl_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(2, -1));


		


		$("#delete-playlist-dialog").dialog("open");


	});
	
	//###############################################//
	/* Add video sources */
	//###############################################//
	$("#add_video_button").click(function(e){
        e.preventDefault();
		
		$('#add-video-dialog').parent().css("left", -2000);
		$("#add-video-final-dialog").dialog("open");
		//isEditVideo = false;
	});
	
	$("#add_video_button_edit").click(function(e){
        e.preventDefault();
		//isEditVideo = true;
		$('#edit-video-dialog').parent().css("left", -2000);
		$("#add-video-final-dialog").dialog("open");
		
	});
	

	var clickOnce = true;
	var vidsId;
	var isEditVideo = false;
	var allFieldsVideo = $([]).add($("#video_label")).add($("#video_source")).add($("#video_label_edit")).add($("#video_source_edit"))

	$("#add-video-final-dialog").dialog({
		autoOpen: false,
		width: 542,
	    height: 383,
	    modal: true,
	    buttons:{

	        "Add video": function(){

	         	var fValid = true;
	         	var tips = $("#add-video-tips");
	          	allFieldsVideo.removeClass("ui-state-error");

				fValid = fValid && checkLength(tips, $("#video_label"), "label", 1, 64);
				fValid = fValid && checkLength(tips, $("#video_source"), "source", 1, 1000);
				
				/*
				for(var i=0; i<vids_ar.length; i++){
					if(vids_ar[i].name == $("#video_label").val()){
						$("#video_label").vidClass("ui-state-error");
						updateTips(tips, "Please make sure the video label is unique.");
						return;
					}
				}
				*/
		
	          	if (fValid){
					
					if(isEditVideo){
						var pid = $("#main_vids_edit .fwd-item").length || 0;
					}else{
						var pid = $("#main_vids .fwd-item").length || 0;
					}
					
					var plsIdsAr = [];
					
					if (pid > 0){
	          			$.each(vids_ar, function(i, el){
							plsIdsAr.push(el.id);
						});
    	          		for (var i=0; i<vids_ar.length; i++){
    	          			if($.inArray(i, plsIdsAr) == -1){
    	          				pid = i;
    	          				break;
    	          			}
    	          		}
	          		}else{
	          			$("#mp_em").hide();
	          		}
					
					
					
					if(isEditVideo){
						$("#main_vids_edit").append("<div id='vid" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + $("#video_label").val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<input class='checkbox_vid' type='checkbox' name='checkbox_vid_checkbox' value='" + pid + "' id='vid" + pid + "_checkbox'></input>"
						+ "<button class='edit_vid_btn' id='vid" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_vid_btn' id='vid" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
					+ "</div>");
					}else{
						$("#main_vids").append("<div id='vid" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + $("#video_label").val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<input class='checkbox_vid' type='checkbox' name='checkbox_vid_checkbox' value='" + pid + "' id='vid" + pid + "_checkbox'></input>"
						+ "<button class='edit_vid_btn' id='vid" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_vid_btn' id='vid" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
						+ "</div>");
					}
					
					if(vids_ar.length == 0){
						$("input.checkbox_vid").attr("disabled", true);
					}else{
						$("input.checkbox_vid").attr("disabled", false);
					}
					curVidsId = pid;
					
					
					$("#private_video_div").show();
					$("#main_vids").append($("#private_video_div"));
					
					$("#private_video_div_edit").show();
					$("#main_vids_edit").append($("#private_video_div_edit"));
					
					
					setTimeout(function(){
						disableEnableVideoCheckboxes("vid" + pid + "_checkbox");
					}, 50);
					
					
					$(".checkbox_vid").click(function(e){
						e.preventDefault();
						var reg_exp1 = /vid[0-9]+_/;
						
						if(!clickOnce) return;
						clickOnce = false;
						setTimeout(function(){clickOnce = true;},50);
						vidsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
						
						var allMpItems = [];
						if(isEditVideo){
							for(var i=0; i<$("#main_vids_edit").children().length; i++){
								allMpItems.push($("#main_vids_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_vids").children().length; i++){
								allMpItems.push($("#main_vids").children()[i].getAttribute("id"));
							}
						}
						
						curVidsId = allMpItems.indexOf("vid" + vidsId);
						
						disableEnableVideoCheckboxes($(this).attr("id"))
					});
					
					$(".edit_vid_btn").click(function(e){
						e.preventDefault();
						var reg_exp1 = /vid[0-9]+_/;
						vidsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
						
						var allMpItems = [];
						if(isEditVideo){
							for(var i=0; i<$("#main_vids_edit").children().length; i++){
								allMpItems.push($("#main_vids_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_vids").children().length; i++){
								allMpItems.push($("#main_vids").children()[i].getAttribute("id"));
							}
						}
						
						curVidsId = allMpItems.indexOf("vid" + vidsId);
		
						$("#edit-video-final-dialog").dialog("open");
					});
				
					$(".delete_vid_btn").click(function(e){
						var reg_exp1 = /vid[0-9]+_/;
						vidsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
						
						var allMpItems = [];
						if(isEditVideo){
							for(var i=0; i<$("#main_vids_edit").children().length; i++){
								allMpItems.push($("#main_vids_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_vids").children().length; i++){
								allMpItems.push($("#main_vids").children()[i].getAttribute("id"));
							}
						}
											
						curVidsId = allMpItems.indexOf("vid" + vidsId);
						$("#delete-video-final-dialog").dialog("open");
					});

					$(".vid .ui-accordion-header-icon").css("left", "22px");
					
					
					var newPl ={
						id:pid,
						source: $("#video_source").val().replace(/"/g, "'"),
						label: $("#video_label").val().replace(/"/g, "'"),
						is360: $("#is360").val().replace(/"/g, "'"),
						encrypt:$("#fwd_evpencript").val()
					};
					
					vids_ar.push(newPl);
					$(this).dialog("close");
					$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
					$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	         	}	

	        },
	        "Cancel": function(){
	        	if(vids_ar.length == 0){
					$("#main_vids").hide();
					$("#main_vids_edit").hide();
				}else{
					$("#main_vids").show();
					$("#main_vids_edit").show();
				}
				
	        	$(this).dialog("close");
				$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	        }
	    },

	    close: function(){
		
			if(vids_ar.length == 0){
				$("#main_vids").hide();
				$("#main_vids_edit").hide();
			}else{
				$("#main_vids").show();
				$("#main_vids_edit").show();
			}
		
			
		    allFieldsVideo.removeClass("ui-state-error");  
		    $("#edit-video-tips").removeClass("fwd-error");
			$("#video-tips-edit").removeClass("fwd-error");
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});


	    },

	    open: function(){
			
			if(vids_ar.length == 0){
				$("#main_vids_edit").hide();
				//$("#main_ads").hide();
			}else{
				//$("#main_ads").show();
				$("#main_vids_edit").show();
			}
			$("#is360").val("no");
			$("#fwd_evpencript").val("no");
			$("#video_label").val("");
			$("#video_source").val("");
		    $("#vid-video-tips").text("The name field is required.");
		}
					
	});
	
	function disableEnableVideoCheckboxes(id){
		$('.checkbox_vid').each(function () {
			if($(this).attr("id") == id){
				setTimeout(function(){
					$("#" + id).prop('checked', true);
				},50);
			}else{
				$(this).prop('checked', false);
			}
		});
		
		for(var i=0; i<vids_ar.length; i++){
			if("vid" + i + "_checkbox" == id){
				vids_ar[i].checked = true;
			}else{
				vids_ar[i].checked = false;
			}
		}
		
		if(vids_ar.length <= 1){
			$("input.checkbox_vid").attr("disabled", true);
		}else{
			$("input.checkbox_vid").attr("disabled", false);
		}
	}
	
	$("#edit-video-final-dialog").dialog({
		autoOpen: false,
		width: 542,
	    height: 383,
	    modal: true,
	    buttons:{
	        "Update video": function(){
				var fValid = true;
				var tips = $("#video-tips-edit");
				
				allFieldsVideo.removeClass("ui-state-error");
				
				fValid = fValid && checkLength(tips, $("#video_label_edit"), "label", 1, 64);
				fValid = fValid && checkLength(tips, $("#video_source_edit"), "source", 1, 1000);
				
				if (fValid){
					
					$(this).dialog("close");
					
					var content = $("#vid" + vidsId + " > h3").html();
	          		var pos = content.indexOf(vids_ar[curVidsId].label);
	          		content = content.slice(0, pos);
					
					$("#vid" + vidsId + " > h3").html(content + $("#video_label_edit").val().replace(/"/g, "'"));
					
					vids_ar[curVidsId].source = $("#video_source_edit").val().replace(/"/g, "'");
					vids_ar[curVidsId].label = $("#video_label_edit").val().replace(/"/g, "'");	
					vids_ar[curVidsId].is360 = $("#is360_edit").val().replace(/"/g, "'");
					vids_ar[curVidsId].encrypt = $("#fwd_evpencript_edit").val().replace(/"/g, "'");
			
					$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
					$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				}
	        },
	        "Cancel": function(){
	        	$(this).dialog("close");
				$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	        }
	    },
	    close: function(){
		    allFieldsVideo.removeClass("ui-state-error");
		    $("#video-tips-edit").removeClass("fwd-error");
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	    },
	    open: function(){
			
			$('#add-video-dialog').parent().css("left", -2000);
			$('#edit-video-dialog').parent().css("left", -2000);
			$("#video-tips-edit").text("The video label is required:");
			
			allFieldsVideo.removeClass("ui-state-error");
			$("#is360_edit").val(vids_ar[curVidsId].is360);
			$("#fwd_evpencript_edit").val(vids_ar[curVidsId].encrypt);
			
			$("#video_source_edit").val(vids_ar[curVidsId].source);
			$("#video_label_edit").val(vids_ar[curVidsId].label);
			$("#edit-video-final-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
		}
	});
	
	$("#delete-video-final-dialog").dialog({
		autoOpen: false,
		width: 300,
	    height: 150,
	    modal: true,
	    buttons:{
	        "Yes": function(){
	       		vids_ar.splice(curVidsId, 1);
	       		$("#vid" + vidsId).remove();
				curVidsId = vids_ar.length - 1;
				if(vids_ar.length > 0){
					disableEnableVideoCheckboxes("vid" + vids_ar[vids_ar.length - 1].id + "_checkbox");
				}
				
	            $(this).dialog("close");
				
				if(vids_ar.length == 0){
					$("#main_vids").hide();
					$("#main_vids_edit").hide();
				}
	        },
	        "No": function(){
	        	$(this).dialog("close");
	        }
	    },
	    close: function(){
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	    },
	    open: function(){
			
			$('#add-video-dialog').parent().css("left", -2000);
			$('#edit-video-dialog').parent().css("left", -2000);
		}
	});
	
	$(".delete_ads_btn").click(function(e){
		e.preventDefault();
		var reg_exp = /pl[0-9]+_/;
		vidId = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));
	
		$("#delete-video-dialog").dialog("open");
	});
	
	
	//###############################################//
	/* Add subtitle sources */
	//###############################################//
	$("#add_subtitle_button").click(function(e){
        e.preventDefault();
		
		$('#add-video-dialog').parent().css("left", -2000);
		$("#add-subtitle-dialog").dialog("open");
		//isEditsubtitle = false;
	});
	
	$("#subtitle_button_edit").click(function(e){
        e.preventDefault();
		//isEditsubtitle = true;
		$('#edit-video-dialog').parent().css("left", -2000);
		$("#add-subtitle-dialog").dialog("open");
		
	});
	
	var clickOnce = true;
	var subtitleId;
	var isEditsubtitle = false;
	var isEditCuepoints = false;
	var allFieldssubtitle = $([]).add($("#subtitle_label")).add($("#subtitle_source")).add($("#subtitle_label_edit")).add($("#subtitle_source_edit"));

	$("#add-subtitle-dialog").dialog({
		autoOpen: false,
		width: 528,
	    height: 290,
	    modal: true,
	    buttons:{

	        "Add subtitle": function(){

	         	var fValid = true;
	         	var tips = $("#subtitle-subtitle-tips");
	          	allFieldssubtitle.removeClass("ui-state-error");
	
				fValid = fValid && checkLength(tips, $("#subtitle_label"), "label", 1, 64);
				fValid = fValid && checkLength(tips, $("#subtitle_source"), "source", 1, 1000);
				
				/*
				for(var i=0; i<subtitles_ar.length; i++){
					if(subtitles_ar[i].name == $("#subtitle_label").val()){
						$("#subtitle_label").subtitleClass("ui-state-error");
						updateTips(tips, "Please make sure the subtitle label is unique.");
						return;
					}
				}
				*/
				
	          	if (fValid){
					
					if(isEditsubtitle){
						var pid = $("#main_subtitles_edit .fwd-item").length || 0;
					}else{
						var pid = $("#main_subtitles .fwd-item").length || 0;
					}
					
					var plsIdsAr = [];
					
					if (pid > 0){
	          			$.each(subtitles_ar, function(i, el){
							plsIdsAr.push(el.id);
						});
    	          		for (var i=0; i<subtitles_ar.length; i++){
    	          			if($.inArray(i, plsIdsAr) == -1){
    	          				pid = i;
    	          				break;
    	          			}
    	          		}
	          		}else{
	          			$("#mp_em").hide();
	          		}
					
					if(isEditsubtitle){
						$("#main_subtitles_edit").append("<div id='subtitle" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + $("#subtitle_label").val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<input class='checkbox_subtitle' type='checkbox' name='checkbox_subtitle_checkbox' value='" + pid + "' id='subtitle" + pid + "_checkbox'></input>"
						+ "<button class='edit_subtitle_btn' id='subtitle" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_subtitle_btn' id='subtitle" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
					+ "</div>");
					}else{
						$("#main_subtitles").append("<div id='subtitle" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + $("#subtitle_label").val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<input class='checkbox_subtitle' type='checkbox' name='checkbox_subtitle_checkbox' value='" + pid + "' id='subtitle" + pid + "_checkbox'></input>"
						+ "<button class='edit_subtitle_btn' id='subtitle" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_subtitle_btn' id='subtitle" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
						+ "</div>");
					}
					
					if(subtitles_ar.length == 0){
						$("input.checkbox_subtitle").attr("disabled", true);
					}else{
						$("input.checkbox_subtitle").attr("disabled", false);
					}
					subtitleId = pid;
					
					setTimeout(function(){
						disableEnableSubtitleCheckboxes("subtitle" + pid + "_checkbox");
					}, 100);
					
					
					$(".checkbox_subtitle").click(function(e){
						e.preventDefault();
						var reg_exp1 = /subtitle[0-9]+_/;
						
						if(!clickOnce) return;
						clickOnce = false;
						setTimeout(function(){clickOnce = true;},50);
						subtitleId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(8, -1));
						
						var allMpItems = [];
						if(isEditsubtitle){
							for(var i=0; i<$("#main_subtitles_edit").children().length; i++){
								allMpItems.push($("#main_subtitles_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_subtitles").children().length; i++){
								allMpItems.push($("#main_subtitles").children()[i].getAttribute("id"));
							}
						}
						
						curSubtitleId = allMpItems.indexOf("subtitle" + subtitleId);
						
						disableEnableSubtitleCheckboxes($(this).attr("id"))
					});
					
					$(".edit_subtitle_btn").click(function(e){
						e.preventDefault();
						var reg_exp1 = /subtitle[0-9]+_/;
						subtitleId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(8, -1));
					
						var allMpItems = [];
						if(isEditsubtitle){
							for(var i=0; i<$("#main_subtitles_edit").children().length; i++){
								allMpItems.push($("#main_subtitles_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_subtitles").children().length; i++){
								allMpItems.push($("#main_subtitles").children()[i].getAttribute("id"));
							}
						}
						
						curSubtitleId = allMpItems.indexOf("subtitle" + subtitleId);
		
						$("#edit-subtitle-dialog").dialog("open");
					});
				
					$(".delete_subtitle_btn").click(function(e){
						var reg_exp1 = /subtitle[0-9]+_/;
						subtitleId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(8, -1));
						
						var allMpItems = [];
						if(isEditsubtitle){
							for(var i=0; i<$("#main_subtitles_edit").children().length; i++){
								allMpItems.push($("#main_subtitles_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_subtitles").children().length; i++){
								allMpItems.push($("#main_subtitles").children()[i].getAttribute("id"));
							}
						}
											
						curSubtitleId = allMpItems.indexOf("subtitle" + subtitleId);
						$("#delete-subtitle-dialog").dialog("open");
					});

					$(".subtitle .ui-accordion-header-icon").css("left", "22px");
					
					var newSubtitlesObj ={
						id:pid,
						source: $("#subtitle_source").val().replace(/"/g, "'"),
						label: $("#subtitle_label").val().replace(/"/g, "'")
					};
					
					subtitles_ar.push(newSubtitlesObj);
					$(this).dialog("close");
					$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
					$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	         	}	

	        },
	        "Cancel": function(){
	        	if(subtitles_ar.length == 0){
					$("#main_subtitles").hide();
					$("#main_subtitles_edit").hide();
				}else{
					$("#main_subtitles").show();
					$("#main_subtitles_edit").show();
				}
				
	        	$(this).dialog("close");
				$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	        }
	    },

	    close: function(){
			if(subtitles_ar.length == 0){
				$("#main_subtitles").hide();
				$("#main_subtitles_edit").hide();
			}else{
				$("#main_subtitles").show();
				$("#main_subtitles_edit").show();
			}
			
		    allFieldssubtitle.removeClass("ui-state-error");  
		    $("#edit-subtitle-tips").removeClass("fwd-error");
			$("#subtitle-tips-edit").removeClass("fwd-error");
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});

	    },

	    open: function(){
			
			if(subtitles_ar.length == 0){
				$("#main_subtitles_edit").hide();
				$("#main_ads").hide();
			}else{
				$("#main_ads").show();
				$("#main_subtitles_edit").show();
			}
			
			$("#subtitle_label").val("");
			$("#subtitle_source").val("");
		    $("#subtitle-subtitle-tips").text("The name field is required.");
		}

	});
	
	function disableEnableSubtitleCheckboxes(id){
		
		$('.checkbox_subtitle').each(function () {
			if($(this).attr("id") == id){
				setTimeout(function(){
					$("#" + id).prop('checked', true);
				},50);
			}else{
				$(this).prop('checked', false);
			}
		});
		
		for(var i=0; i<subtitles_ar.length; i++){
			if("subtitle" + i + "_checkbox" == id){
				subtitles_ar[i]["checked"] = true;
			}else{
				subtitles_ar[i]["checked"] = false;
			}
		}
	
		if(subtitles_ar.length <= 1){
			$("input.checkbox_subtitle").attr("disabled", true);
		}else{
			$("input.checkbox_subtitle").attr("disabled", false);
		}
	}
	
	function disableEnableAdsCheckboxes(id){
		
		$('.checkbox_ads').each(function () {
			if($(this).attr("id") == id){
				setTimeout(function(){
					$("#" + id).prop('checked', true);
				},50);
			}else{
				$(this).prop('checked', false);
			}
		});
		
		for(var i=0; i<adss_ar.length; i++){i
			if("ads" + i + "_checkbox" == id){
				adss_ar[i]["checked"] = true;
			}else{
				adss_ar[i]["checked"] = false;
			}
		}
		
		if(adss_ar.length <= 1){
			$("input.checkbox_ads").attr("disabled", true);
		}else{
			$("input.checkbox_ads").attr("disabled", false);
		}
	}
	
	$("#edit-subtitle-dialog").dialog({
		autoOpen: false,
		width: 528,
	    height: 290,
	    modal: true,
	    buttons:{
	        "Update subtitle": function(){
				var fValid = true;
				var tips = $("#subtitle-tips-edit");
				
				allFieldssubtitle.removeClass("ui-state-error");
				
				fValid = fValid && checkLength(tips, $("#subtitle_label_edit"), "label", 1, 64);
				fValid = fValid && checkLength(tips, $("#subtitle_source_edit"), "source", 1, 1000);
				
				if (fValid){
					
					$(this).dialog("close");
					
					var content = $("#subtitle" + subtitleId + " > h3").html();
	          		var pos = content.indexOf(subtitles_ar[curSubtitleId].label);
	          		content = content.slice(0, pos);
					
					$("#subtitle" + subtitleId + " > h3").html(content + $("#subtitle_label_edit").val().replace(/"/g, "'"));
					
					subtitles_ar[curSubtitleId].source = $("#subtitle_source_edit").val().replace(/"/g, "'");
					subtitles_ar[curSubtitleId].label = $("#subtitle_label_edit").val().replace(/"/g, "'");	
					
					$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
					$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				}
	        },
	        "Cancel": function(){
	        	$(this).dialog("close");
				$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	        }
	    },
	    close: function(){
		    allFieldssubtitle.removeClass("ui-state-error");
		    $("#subtitle-tips-edit").removeClass("fwd-error");
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	    },
	    open: function(){
			
			$('#add-video-dialog').parent().css("left", -2000);
			$('#edit-video-dialog').parent().css("left", -2000);
			$("#subtitle-tips-edit").text("The subtitle label is required:");
			
			allFieldssubtitle.removeClass("ui-state-error");
			$("#subtitle_source_edit").val(subtitles_ar[curSubtitleId].source);
			$("#subtitle_label_edit").val(subtitles_ar[curSubtitleId].label);
			$("#edit-subtitle-final-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
		}
	});
	
	$("#delete-subtitle-dialog").dialog({
		autoOpen: false,
		width: 300,
	    height: 150,
	    modal: true,
	    buttons:{
	        "Yes": function(){
				
	       		subtitles_ar.splice(curSubtitleId, 1);
	       		$("#subtitle" + subtitleId).remove();
				curSubtitleId = subtitles_ar.length - 1;
				
				
				if(subtitles_ar.length > 0){
					disableEnableSubtitleCheckboxes("subtitle" + subtitles_ar[subtitles_ar.length - 1].id + "_checkbox");
				}
				
	            $(this).dialog("close");
				
				if(subtitles_ar.length == 0){
					$("#main_subtitles").hide();
					$("#main_subtitles_edit").hide();
				}
	        },
	        "No": function(){
	        	$(this).dialog("close");
	        }
	    },
	    close: function(){
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	    },
	    open: function(){
			
			$('#add-video-dialog').parent().css("left", -2000);
			$('#edit-video-dialog').parent().css("left", -2000);
		}
	});
	
	$(".delete_ads_btn").click(function(e){
		e.preventDefault();
		var reg_exp = /pl[0-9]+_/;
		subtitleId = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));
		$("#delete-subtitle-dialog").dialog("open");
	});
	
	//###############################################//
	/* Add cuepoint sources */
	//###############################################//
	$("#add_cuepoint_button").click(function(e){
        e.preventDefault();
		
		$('#add-video-dialog').parent().css("left", -2000);
		$("#add-cuepoint-dialog").dialog("open");
		//isEditCuepoints = false;
	});
	
	$("#edit_cuepoint_button").click(function(e){
        e.preventDefault();
		//isEditCuepoints = true;
		$('#edit-video-dialog').parent().css("left", -2000);
		$("#add-cuepoint-dialog").dialog("open");
		
	});
	
	var clickOnce = true;
	var curCuepointId;
	var curCuepointId;
	var isEditCuepoints = false;
	var allFieldscuepoint = $([]).add($("#cuepoint_label")).add($("#cuepoint_start_time")).add($("#cuepoint_code")).add($("#cuepoint_label_edit")).add($("#cuepoint_start_time_edit")).add($("#cuepoint_code_edit"))

	$("#add-cuepoint-dialog").dialog({
		autoOpen: false,
		width: 536,
	    height: 231,
	    modal: true,
	    buttons:{

	        "Add cuepoint": function(){

	         	var fValid = true;
	         	var tips = $("#cuepoint_cuepoints_tips");
	          	allFieldscuepoint.removeClass("ui-state-error");
	
				fValid = fValid && checkLength(tips, $("#cuepoint_label"), "label", 1, 64);
				fValid = fValid && checkTimeFormat(tips, $("#cuepoint_start_time"), "start time");
				fValid = fValid && checkLength(tips, $("#cuepoint_code"), "cuepoint javascript code", 1, 250);
				
	          	if (fValid){
					
					if(isEditCuepoints){
						var pid = $("#main_cuepoints_edit .fwd-item").length || 0;
					}else{
						var pid = $("#main_cuepoints .fwd-item").length || 0;
					}
					
					var plsIdsAr = [];
					
					if (pid > 0){
	          			$.each(cuepoints_ar, function(i, el){
							plsIdsAr.push(el.id);
						});
    	          		for (var i=0; i<cuepoints_ar.length; i++){
    	          			if($.inArray(i, plsIdsAr) == -1){
    	          				pid = i;
    	          				break;
    	          			}
    	          		}
	          		}else{
	          			$("#mp_em").hide();
	          		} 
					
					if(isEditCuepoints){
						$("#main_cuepoints_edit").append("<div id='cuepoint" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + $("#cuepoint_label").val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<button class='edit_cuepoint_btn' id='cuepoint" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_cuepoint_btn' id='cuepoint" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
					+ "</div>");
					}else{
						$("#main_cuepoints").append("<div id='cuepoint" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + $("#cuepoint_label").val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<button class='edit_cuepoint_btn' id='cuepoint" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_cuepoint_btn' id='cuepoint" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
						+ "</div>");
					}
					
					cuepointId = pid;
					
					$(".edit_cuepoint_btn").click(function(e){
						e.preventDefault();
						var reg_exp1 = /cuepoint[0-9]+_/;
						cuepointId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(8, -1));
						
						
						var allMpItems = [];
						if(isEditCuepoints){
							for(var i=0; i<$("#main_cuepoints_edit").children().length; i++){
								allMpItems.push($("#main_cuepoints_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_cuepoints").children().length; i++){
								allMpItems.push($("#main_cuepoints").children()[i].getAttribute("id"));
							}
						}
						
					
						curCuepointId = allMpItems.indexOf("cuepoint" + cuepointId);
						$("#edit-cuepoints-dialog").dialog("open");
					});
				
					$(".delete_cuepoint_btn").click(function(e){
						var reg_exp1 = /cuepoint[0-9]+_/;
						cuepointId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(8, -1));
						
						var allMpItems = [];
						if(isEditCuepoints){
							for(var i=0; i<$("#main_cuepoints_edit").children().length; i++){
								allMpItems.push($("#main_cuepoints_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_cuepoints").children().length; i++){
								allMpItems.push($("#main_cuepoints").children()[i].getAttribute("id"));
							}
						}
											
						curCuepointId = allMpItems.indexOf("cuepoint" + cuepointId);
						$("#delete-cuepoint-dialog").dialog("open");
					});

					$(".cuepoint .ui-accordion-header-icon").css("left", "22px");
					
					var newcuepointsObj ={
						id:pid,
						label: $("#cuepoint_label").val().replace(/"/g, "'"),
						startAtTime: $("#cuepoint_start_time").val().replace(/"/g, "'"),
						code: $("#cuepoint_code").val().replace(/"/g, "'")
					};
					
					cuepoints_ar.push(newcuepointsObj);
					$(this).dialog("close");
					$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
					$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	         	}	

	        },
	        "Cancel": function(){
				if(cuepoints_ar){
					if(cuepoints_ar.length == 0){
						$("#main_cuepoints").hide();
						$("#main_cuepoints_edit").hide();
					}else{
						$("#main_cuepoints").show();
						$("#main_cuepoints_edit").show();
					}
				}
				
	        	$(this).dialog("close");
				$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	        }
	    },

	    close: function(){
			if(cuepoints_ar){
				if(cuepoints_ar.length == 0){
					$("#main_cuepoints").hide();
					$("#main_cuepoints_edit").hide();
				}else{
					$("#main_cuepoints").show();
					$("#main_cuepoints_edit").show();
				}
			}
			
		    allFieldscuepoint.removeClass("ui-state-error");  
		    $("#edit-cuepoint-tips").removeClass("fwd-error");
			$("#cuepoint-tips-edit").removeClass("fwd-error");
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});

	    },

	    open: function(){
			if(!cuepoints_ar) cuepoints_ar = [];
			if(cuepoints_ar.length == 0){
				$("#main_cuepoints_edit").hide();
				$("#main_cuepoints").hide();
			}else{
				$("#main_cuepoints").show();
				$("#main_cuepoints_edit").show();
			}
			
			$("#cuepoint_label").val("");
			$("#cuepoint_start_time").val("");
			$("#cuepoint_code").val("");
			$("#cuepoint_cuepoints_tips").removeClass("ui-state-error");
		    $("#cuepoint_cuepoints_tips").removeClass("fwd-error");
		    $("#cuepoint_cuepoints_tips").text("The label field is required.");
		}

	});
	
	$("#edit-cuepoints-dialog").dialog({
		autoOpen: false,
		width: 536,
	    height: 231,
	    modal: true,
	    buttons:{
	        "Update cuepoints": function(){
				var fValid = true;
				var tips = $("#cuepoint-tips-edit");
				
				allFieldscuepoint.removeClass("ui-state-error");
				
				fValid = fValid && checkLength(tips, $("#cuepoint_label_edit"), "label", 1, 64);
				fValid = fValid && checkTimeFormat(tips, $("#cuepoint_start_time_edit"), "start time");
				fValid = fValid && checkLength(tips, $("#cuepoint_code_edit"), "cuepoint javascript code", 1, 250);
				
				if (fValid){
					
					$(this).dialog("close");
					
					var content = $("#cuepoint" + cuepointId + " > h3").html();
				
	          		var pos = content.indexOf(cuepoints_ar[curCuepointId].label);
	          		content = content.slice(0, pos);
					
					$("#cuepoint" + cuepointId + " > h3").html(content + $("#cuepoint_label_edit").val().replace(/"/g, "'"));
					
					cuepoints_ar[curCuepointId].label = $("#cuepoint_label_edit").val().replace(/"/g, "'");	
					cuepoints_ar[curCuepointId].startAtTime = $("#cuepoint_start_time_edit").val().replace(/"/g, "'");
					cuepoints_ar[curCuepointId].code = $("#cuepoint_code_edit").val().replace(/"/g, "'");	

					$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
					$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				}
	        },
	        "Cancel": function(){
	        	$(this).dialog("close");
				$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	        }
	    },
	    close: function(){
		    allFieldscuepoint.removeClass("ui-state-error");
		    $("#cuepoint-tips-edit").removeClass("fwd-error");
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	    },
	    open: function(){
			
			$('#add-video-dialog').parent().css("left", -2000);
			$('#edit-video-dialog').parent().css("left", -2000);
			$("#cuepoint-tips-edit").text("The cuepoint label is required:");
			allFieldscuepoint.removeClass("ui-state-error");
			
			$("#cuepoint_label_edit").val(cuepoints_ar[curCuepointId].label);
			$("#cuepoint_start_time_edit").val(cuepoints_ar[curCuepointId].startAtTime);
			$("#cuepoint_code_edit").val(cuepoints_ar[curCuepointId].code);
			$("#edit-cuepoint-final-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
		}
	});
	
	$("#delete-cuepoint-dialog").dialog({
		autoOpen: false,
		width: 300,
	    height: 150,
	    modal: true,
	    buttons:{
	        "Yes": function(){
				
	       		cuepoints_ar.splice(curCuepointId, 1);
	       		$("#cuepoint" + cuepointId).remove();
				curCuepointId = cuepoints_ar.length - 1;
			
	            $(this).dialog("close");
				
				if(cuepoints_ar.length == 0){
					$("#main_cuepoints").hide();
					$("#main_cuepoints_edit").hide();
				}
	        },
	        "No": function(){
	        	$(this).dialog("close");
	        }
	    },
	    close: function(){
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	    },
	    open: function(){
			
			$('#add-video-dialog').parent().css("left", -2000);
			$('#edit-video-dialog').parent().css("left", -2000);
		}
	});
	
	
	//###############################################//
	/* Add popupad sources */
	//###############################################//
	$("#add_popupad_button").click(function(e){
        e.preventDefault();
		
		$('#add-video-dialog').parent().css("left", -2000);
		$("#add-popupad-dialog").dialog("open");
		//isEditpopupad = false;
	});
	
	$("#edit_popupad_button").click(function(e){
        e.preventDefault();
		//isEditpopupad = true;
		$('#edit-video-dialog').parent().css("left", -2000);
		$("#add-popupad-dialog").dialog("open");
		
	});
	
	var clickOnce = true;
	var popupadId;
	var curpopupadId;
	var isEditpopupad = false;
	var allFieldspopupad = $([]).add($("#popupads_label")).add($("#popupads_source")).add($("#popupads_start_time")).add($("#popupads_stop_time"));

	$("#add-popupad-dialog").dialog({
		autoOpen: false,
		width: 580,
	    height: 390,
	    modal: true,
	    buttons:{

	        "Add pop-up advertisement": function(){

	         	var fValid = true;
	         	var tips = $("#popupad_popupads_tips");
	          	allFieldspopupad.removeClass("ui-state-error");
	
				fValid = fValid && checkLength(tips, $("#popupads_label"), "label", 1, 64);
				fValid = fValid && checkLength(tips, $("#popupads_source"), "source", 1, 1000);
				fValid = fValid && checkTimeFormat(tips, $("#popupads_start_time"), "start time");
				fValid = fValid && checkTimeFormat(tips, $("#popupads_stop_time"), "stop time");
				
				
	          	if (fValid){
					
					if(isEditpopupad){
						var pid = $("#main_popupads_edit .fwd-item").length || 0;
					}else{
						var pid = $("#main_popupads .fwd-item").length || 0;
					}
					
					var plsIdsAr = [];
					
					if (pid > 0){
	          			$.each(popupads_ar, function(i, el){
							plsIdsAr.push(el.id);
						});
    	          		for (var i=0; i<popupads_ar.length; i++){
    	          			if($.inArray(i, plsIdsAr) == -1){
    	          				pid = i;
    	          				break;
    	          			}
    	          		}
	          		}else{
	          			$("#mp_em").hide();
	          		} 
					
					if(isEditpopupad){
						$("#main_popupads_edit").append("<div id='popupad" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + $("#popupads_label").val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<button class='edit_popupad_btn' id='popupad" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_popupad_btn' id='popupad" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
					+ "</div>");
					}else{
						$("#main_popupads").append("<div id='popupad" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + $("#popupads_label").val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<button class='edit_popupad_btn' id='popupad" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_popupad_btn' id='popupad" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
						+ "</div>");
					}
					
					if(popupads_ar.length == 0){
						$("input.checkbox_popupad").attr("disabled", true);
					}else{
						$("input.checkbox_popupad").attr("disabled", false);
					}
					popupadId = pid;
					
					setTimeout(function(){
						disableEnablepopupadCheckboxes("popupad" + pid + "_checkbox");
					}, 100);
					
					
					$(".checkbox_popupad").click(function(e){
						e.preventDefault();
						var reg_exp1 = /popupad[0-9]+_/;
						
						if(!clickOnce) return;
						clickOnce = false;
						setTimeout(function(){clickOnce = true;},50);
						popupadId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(7, -1));
						
						var allMpItems = [];
						if(isEditpopupad){
							for(var i=0; i<$("#main_popupads_edit").children().length; i++){
								allMpItems.push($("#main_popupads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_popupads").children().length; i++){
								allMpItems.push($("#main_popupads").children()[i].getAttribute("id"));
							}
						}
						
						curpopupadId = allMpItems.indexOf("popupad" + popupadId);
						
						disableEnablepopupadCheckboxes($(this).attr("id"))
					});
					
					$(".edit_popupad_btn").click(function(e){
						e.preventDefault();
						var reg_exp1 = /popupad[0-9]+_/;
						popupadId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(7, -1));
					
						var allMpItems = [];
						if(isEditpopupad){
							for(var i=0; i<$("#main_popupads_edit").children().length; i++){
								allMpItems.push($("#main_popupads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_popupads").children().length; i++){
								allMpItems.push($("#main_popupads").children()[i].getAttribute("id"));
							}
						}
						
						curpopupadId = allMpItems.indexOf("popupad" + popupadId);
						
						$("#edit-popupad-dialog").dialog("open");
					});
				
					$(".delete_popupad_btn").click(function(e){
						var reg_exp1 = /popupad[0-9]+_/;
						popupadId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(7, -1));
						
						var allMpItems = [];
						if(isEditpopupad){
							for(var i=0; i<$("#main_popupads_edit").children().length; i++){
								allMpItems.push($("#main_popupads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_popupads").children().length; i++){
								allMpItems.push($("#main_popupads").children()[i].getAttribute("id"));
							}
						}
											
						curpopupadId = allMpItems.indexOf("popupad" + popupadId);
						$("#delete-popupad-dialog").dialog("open");
					});

					$(".popupad .ui-accordion-header-icon").css("left", "22px");
					
					var newpopupadsObj ={
						id:pid,
						source: $("#popupads_source").val().replace(/"/g, "'"),
						label: $("#popupads_label").val().replace(/"/g, "'"),
						url: $("#popupads_url").val().replace(/"/g, "'"),
						target: $("#popupads_target").val().replace(/"/g, "'"),
						startTime: $("#popupads_start_time").val().replace(/"/g, "'"),
						stopTime: $("#popupads_stop_time").val().replace(/"/g, "'")
					};
					
					popupads_ar.push(newpopupadsObj);
					$(this).dialog("close");
					$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
					$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	         	}	

	        },
	        "Cancel": function(){
	        	if(popupads_ar.length == 0){
					$("#main_popupads").hide();
					$("#main_popupads_edit").hide();
				}else{
					$("#main_popupads").show();
					$("#main_popupads_edit").show();
				}
				
	        	$(this).dialog("close");
				$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	        }
	    },

	    close: function(){
			if(popupads_ar.length == 0){
				$("#main_popupads").hide();
				$("#main_popupads_edit").hide();
			}else{
				$("#main_popupads").show();
				$("#main_popupads_edit").show();
			}
			
		    allFieldspopupad.removeClass("ui-state-error");  
		    $("#edit-popupad-tips").removeClass("fwd-error");
			$("#popupad-tips-edit").removeClass("fwd-error");
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});

	    },

	    open: function(){
			
			if(popupads_ar.length == 0){
				$("#main_popupads_edit").hide();
				$("#main_popupads").hide();
			}else{
				$("#main_popupads").show();
				$("#main_popupads_edit").show();
			}
			
			$("#popupads_label").val("");
			$("#popupads_source").val("");
			$("#popupads_url").val("");
			$("#popupads_target").val("_blank");
			$("#popupads_start_time").val("");
			$("#popupads_stop_time").val("");
			$("#popupad_popupads_tips").removeClass("ui-state-error");
		    $("#popupad_popupads_tips").removeClass("fwd-error");
		    $("#popupad_popupads_tips").text("The label field is required.");
		}

	});
	
	function disableEnablepopupadCheckboxes(id){
		
		$('.checkbox_popupad').each(function () {
			if($(this).attr("id") == id){
				setTimeout(function(){
					$("#" + id).prop('checked', true);
				},50);
			}else{
				$(this).prop('checked', false);
			}
		});
		
		for(var i=0; i<popupads_ar.length; i++){
			if("popupad" + i + "_checkbox" == id){
				popupads_ar[i]["checked"] = true;
			}else{
				popupads_ar[i]["checked"] = false;
			}
		}
	
		if(popupads_ar.length <= 1){
			$("input.checkbox_popupad").attr("disabled", true);
		}else{
			$("input.checkbox_popupad").attr("disabled", false);
		}
	}
	
	$("#edit-popupad-dialog").dialog({
		autoOpen: false,
		width: 580,
	    height: 390,
	    modal: true,
	    buttons:{
	        "Update pop-up advertisement": function(){
				var fValid = true;
				var tips = $("#popupad-tips-edit");
				
				allFieldspopupad.removeClass("ui-state-error");
				
				fValid = fValid && checkLength(tips, $("#popupads_label_edit"), "label", 1, 64);
				fValid = fValid && checkLength(tips, $("#popupads_source_edit"), "source", 1, 1000);
				fValid = fValid && checkTimeFormat(tips, $("#popupads_start_time_edit"), "start time");
				fValid = fValid && checkTimeFormat(tips, $("#popupads_stop_time_edit"), "stop time");
				
				if (fValid){
					
					$(this).dialog("close");
					
					var content = $("#popupad" + popupadId + " > h3").html();
	          		var pos = content.indexOf(popupads_ar[curpopupadId].label);
	          		content = content.slice(0, pos);
					
					$("#popupad" + popupadId + " > h3").html(content + $("#popupads_label_edit").val().replace(/"/g, "'"));
					
					popupads_ar[curpopupadId].source = $("#popupads_source_edit").val().replace(/"/g, "'");
					popupads_ar[curpopupadId].label = $("#popupads_label_edit").val().replace(/"/g, "'");	
					popupads_ar[curpopupadId].url = $("#popupads_url_edit").val().replace(/"/g, "'");	
					popupads_ar[curpopupadId].target = $("#popupads_target_edit").val().replace(/"/g, "'");	
					popupads_ar[curpopupadId].startTime = $("#popupads_start_time_edit").val().replace(/"/g, "'");	
					popupads_ar[curpopupadId].stopTime = $("#popupads_stop_time_edit").val().replace(/"/g, "'");	
					
					
					$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
					$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				}
	        },
	        "Cancel": function(){
	        	$(this).dialog("close");
				$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	        }
	    },
	    close: function(){
		    allFieldspopupad.removeClass("ui-state-error");
		    $("#popupad-tips-edit").removeClass("fwd-error");
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	    },
	    open: function(){
			
			$('#add-video-dialog').parent().css("left", -2000);
			$('#edit-video-dialog').parent().css("left", -2000);
			$("#popupad-tips-edit").text("The popupad label is required:");
			allFieldspopupad.removeClass("ui-state-error");
			$("#popupads_source_edit").val(popupads_ar[curpopupadId].source);
			$("#popupads_label_edit").val(popupads_ar[curpopupadId].label);
			$("#popupads_url_edit").val(popupads_ar[curpopupadId].url);
			$("#popupads_target_edit").val(popupads_ar[curpopupadId].target);
			$("#popupads_start_time_edit").val(popupads_ar[curpopupadId].startTime);
			$("#popupads_stop_time_edit").val(popupads_ar[curpopupadId].stopTime);
			
		
			$("#edit-popupad-final-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
		}
	});
	
	$("#delete-popupad-dialog").dialog({
		autoOpen: false,
		width: 300,
	    height: 150,
	    modal: true,
	    buttons:{
	        "Yes": function(){
				
	       		popupads_ar.splice(curpopupadId, 1);
	       		$("#popupad" + popupadId).remove();
				curpopupadId = popupads_ar.length - 1;
				
				
				if(popupads_ar.length > 0){
					disableEnablepopupadCheckboxes("popupad" + popupads_ar[popupads_ar.length - 1].id + "_checkbox");
				}
				
	            $(this).dialog("close");
				
				if(popupads_ar.length == 0){
					$("#main_popupads").hide();
					$("#main_popupads_edit").hide();
				}
	        },
	        "No": function(){
	        	$(this).dialog("close");
	        }
	    },
	    close: function(){
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	    },
	    open: function(){
			
			$('#add-video-dialog').parent().css("left", -2000);
			$('#edit-video-dialog').parent().css("left", -2000);
		}
	});
	

	//###############################################//
	/* Add advertisement sources */
	//###############################################//
	$("#add_ads_button").click(function(e){
        e.preventDefault();
		
		$('#add-video-dialog').parent().css("left", -2000);
		$("#add-ads-dialog").dialog("open");
		//isEditads = false;
	});
	
	$("#edit_ads_button").click(function(e){
        e.preventDefault();
		//isEditads = true;
		$('#edit-video-dialog').parent().css("left", -2000);
		$("#add-ads-dialog").dialog("open");
		
	});

	var adsId;
	var isEditads = false;
	var allFieldsads = $([]).add($("#ads_label")).add($("#ads_source")).add($("#ads_start_time")).add($("#time_to_hold_ad")).add($("#add_duration"));
	var allFieldsadsEdit = $([]).add($("#ads_label_edit")).add($("#ads_source_edit")).add($("#ads_start_time_edit")).add($("#time_to_hold_ad_edit")).add($("#add_duration_edit"));

	$("#add-ads-dialog").dialog({
		autoOpen: false,
		width: 580,
	    height: 430,
	    modal: true,
	    buttons:{

	        "Add advertisement": function(){

	         	var fValid = true;
	         	var tips = $("#add_ads_tips");
	          	allFieldsads.removeClass("ui-state-error");
				
				fValid = fValid && checkLength(tips, $("#ads_label"), "advertisement", 1, 300);
				fValid = fValid && checkLength(tips, $("#ads_source"), "source", 1, 300);
				fValid = fValid && checkTimeFormat(tips, $("#ads_start_time"), "start time");
				fValid = fValid && checkLength(tips, $("#time_to_hold_ad"), "time to hold add", 1, 64);
				fValid = fValid && checkTimeFormat(tips, $("#add_duration"), "add duration");
				
				/*
				for(var i=0; i<ads_ar .length; i++){
					if(ads_ar [i].name == $("#ads_label").val()){
						$("#ads_label").adsClass("ui-state-error");
						updateTips(tips, "Please make sure the advertisements label is unique.");
						return;
					}
				}
				*/
				
	          	if (fValid){
					
					if(isEditads){
						var pid = $("#main_ads_edit .fwd-item").length || 0;
					}else{
						var pid = $("#main_ads .fwd-item").length || 0;
					}
					
					var plsIdsAr = [];
					
					if (pid > 0){
	          			$.each(ads_ar , function(i, el){
							plsIdsAr.push(el.id);
						});
    	          		for (var i=0; i<ads_ar .length; i++){
    	          			if($.inArray(i, plsIdsAr) == -1){
    	          				pid = i;
    	          				break;
    	          			}
    	          		}
	          		}else{
	          			$("#mp_em").hide();
	          		}
					
					if(isEditads){
						$("#main_ads_edit").append("<div id='ads" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + $("#ads_label").val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<button class='edit_ads_btn' id='ads" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_ads_btn' id='ads" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
					+ "</div>");
					}else{
						$("#main_ads").append("<div id='ads" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + $("#ads_label").val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<button class='edit_ads_btn' id='ads" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_ads_btn' id='ads" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
						+ "</div>");
					}
					
					if(ads_ar.length == 0){
						$("input.checkbox_ads").attr("disabled", true);
					}else{
						$("input.checkbox_ads").attr("disabled", false);
					}
					adsId = pid;
					
					setTimeout(function(){
						disableEnableAdsCheckboxes("ads" + pid + "_checkbox");
					}, 100);
					
					
					$(".checkbox_ads").click(function(e){
						e.preventDefault();
						var reg_exp1 = /ads[0-9]+_/;
						
						if(!clickOnce) return;
						clickOnce = false;
						setTimeout(function(){clickOnce = true;},50);
						adsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
						
						var allMpItems = [];
						if(isEditads){
							for(var i=0; i<$("#main_ads_edit").children().length; i++){
								allMpItems.push($("#main_ads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_ads").children().length; i++){
								allMpItems.push($("#main_ads").children()[i].getAttribute("id"));
							}
						}
						
						curAdsId = allMpItems.indexOf("ads" + adsId);
						
						disableEnableAdsCheckboxes($(this).attr("id"))
					});
					
					$(".edit_ads_btn").click(function(e){
						e.preventDefault();
						var reg_exp1 = /ads[0-9]+_/;
						adsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
					
						var allMpItems = [];
						if(isEditads){
							for(var i=0; i<$("#main_ads_edit").children().length; i++){
								allMpItems.push($("#main_ads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_ads").children().length; i++){
								allMpItems.push($("#main_ads").children()[i].getAttribute("id"));
							}
						}
						
						curAdsId = allMpItems.indexOf("ads" + adsId);
						
						$("#edit-ads-dialog").dialog("open");
					});
				
					$(".delete_ads_btn").click(function(e){
						var reg_exp1 = /ads[0-9]+_/;
						adsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
						
						var allMpItems = [];
						if(isEditads){
							for(var i=0; i<$("#main_ads_edit").children().length; i++){
								allMpItems.push($("#main_ads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_ads").children().length; i++){
								allMpItems.push($("#main_ads").children()[i].getAttribute("id"));
							}
						}
											
						curAdsId = allMpItems.indexOf("ads" + adsId);
						$("#delete-ads-dialog").dialog("open");
					});

					$(".ads .ui-accordion-header-icon").css("left", "22px");
					
					var newadsObj ={
						id:pid,
						label:$("#ads_label").val().replace(/"/g, "'"),
						source: $("#ads_source").val().replace(/"/g, "'"),
						url: $("#ads_url").val().replace(/"/g, "'"),
						target: $("#ads_target").val().replace(/"/g, "'"),
						startTime: $("#ads_start_time").val().replace(/"/g, "'"),
						timeToHoldAd: $("#time_to_hold_ad").val().replace(/"/g, "'"),
						addDuration: $("#add_duration").val().replace(/"/g, "'")
					};
					
					ads_ar.push(newadsObj);
					$(this).dialog("close");
					$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
					$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	         	}	

	        },
	        "Cancel": function(){
	        	if(ads_ar .length == 0){
					$("#main_ads").hide();
					$("#main_ads_edit").hide();
				}else{
					$("#main_ads").show();
					$("#main_ads_edit").show();
				}
				
	        	$(this).dialog("close");
				$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	        }
	    },

	    close: function(){
			if(ads_ar .length == 0){
				$("#main_ads").hide();
				$("#main_ads_edit").hide();
			}else{
				$("#main_ads").show();
				$("#main_ads_edit").show();
			}
			
		    allFieldsads.removeClass("ui-state-error");  
		    $("#edit-ads-tips").removeClass("fwd-error");
			$("#ads-tips-edit").removeClass("fwd-error");
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});

	    },

	    open: function(){
			
			if(ads_ar .length == 0){
				$("#main_ads_edit").hide();
				$("#main_ads").hide();
			}else{
				$("#main_ads").show();
				$("#main_ads_edit").show();
			}
			 $("#edit-ads-tips").removeClass("fwd-error");
			 $("#add_ads_tips").removeClass("fwd-error");
			
			$("#ads_label").val("");
			$("#ads_source").val("");
			$("#ads_url").val("");
			$("#ads_target").val("_blank");
			$("#ads_start_time").val("00:00:00");
			$("#time_to_hold_ad").val("4");
			$("#ads_stop_time").val("");
			$("#add_duration").val("00:00:10");
		    $("#add_ads_tips").text("The source field is required.");  
		}
	});
	
	function disableEnableAdsCheckboxes(id){
		
		$('.checkbox_ads').each(function () {
			if($(this).attr("id") == id){
				setTimeout(function(){
					$("#" + id).prop('checked', true);
				},50);
			}else{
				$(this).prop('checked', false);
			}
		});
		
		for(var i=0; i<ads_ar .length; i++){
			if("ads" + i + "_checkbox" == id){
				ads_ar[i]["checked"] = true;
			}else{
				ads_ar[i]["checked"] = false;
			}
		}
		
		if(ads_ar .length <= 1){
			$("input.checkbox_ads").attr("disabled", true);
		}else{
			$("input.checkbox_ads").attr("disabled", false);
		}
	}
	
	$("#delete-ads-dialog").dialog({
		autoOpen: false,
		width: 300,
	    height: 150,
	    modal: true,
	    buttons:{
	        "Yes": function(){
				
	       		ads_ar .splice(curAdsId, 1);
	       		$("#ads" + adsId).remove();
				curAdsId = ads_ar .length - 1;
				
				
				if(ads_ar .length > 0){
					disableEnableAdsCheckboxes("ads" + ads_ar[ads_ar .length - 1].id + "_checkbox");
				}
				
	            $(this).dialog("close");
				
				if(ads_ar .length == 0){
					$("#main_ads").hide();
					$("#main_ads_edit").hide();
				}
	        },
	        "No": function(){
	        	$(this).dialog("close");
	        }
	    },
	    close: function(){
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	    },
	    open: function(){
			
			$('#add-video-dialog').parent().css("left", -2000);
			$('#edit-video-dialog').parent().css("left", -2000);
		}
	});
	
	$(".delete_ads_btn").click(function(e){
		e.preventDefault();
		var reg_exp = /pl[0-9]+_/;
		adsId = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));
		$("#delete-ads-dialog").dialog("open");
	});

	



	var vid_name = $("#vid_name");


    var vid_source = $("#vid_source");


    var vid_source_mobile = $("#vid_source_mobile");


    var vid_thumb = $("#vid_thumb");


    var vid_poster = $("#vid_poster");


    var vid_poster_mobile = $("#vid_poster_mobile");


    var vid_dl = $("#vid_dl");


	var vid_subtitle = $("#vid_subtitle_source");


	


	


	var ads_source = $("#ads_vid_path");


	var ads_source_mobile = $("#ads_vid_path_mobile");


	var ads_url = $("#ads_url");


	var ads_url_target = $("#ads_url_target");


	var ads_hold_time = $("#ads_hold_time");
	var ads_ar;
	var subtitles_ar;


	var showAds = false;


	var allFieldsVid = $([]).add(vid_name).add(vid_source).add(vid_source_mobile).add(vid_thumb).add(vid_poster).add(vid_poster_mobile).add(vid_subtitle).add(ads_source).add(ads_source_mobile).add(ads_url).add(ads_hold_time).add($("#start_at_time")).add($("#stop_at_time"));

	

	$("#add-video-dialog").dialog({

		autoOpen: false,

		width: 640,

	    height: 700,

	    modal: true,

	    buttons:{


	        "Add video": function() {


	         	var fValid = true;


	         	var tips = $("#add_vid_tips");

	          	allFieldsVid.removeClass("ui-state-error");

	          	fValid = fValid && checkLength(tips, vid_name, "video name", 1, 64);

	       		fValid = fValid && checkLength(tips, vid_thumb, "video thumbnail", 1, 256);

	       		fValid = fValid && checkLength(tips, vid_poster, "video poster", 0, 256);
				if($("#start_at_time").val().length > 0) fValid = fValid && checkTimeFormat(tips, $("#start_at_time"), "start at time");
				if($("#stop_at_time").val().length > 0) fValid = fValid && checkTimeFormat(tips, $("#stop_at_time"), "stop at time");
				
				if(vids_ar.length == 0){
					updateTips(tips, "Please make sure at least one video source is added");
					return;
				}

				


	          	if (fValid){


	          		var vidId = $("#mp" + cur_mp_id + "_pl" + cur_pl_id + "_vids .fwd-video").length;

	          		var vidsIdsAr = [];

	          		var allMpItems = $("#main_playlists").sortable("toArray");

		       		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);


		            var allPlItems = $("#mp" + cur_mp_id + "_pls").sortable("toArray");

		       		curPlOrderId = allPlItems.indexOf("mp" + cur_mp_id + "_pl" + cur_pl_id);


	          		$.each($("#mp" + cur_mp_id + "_pl" + cur_pl_id + "_vids .fwd-video"), function(i, el){

	          			var reg_exp = /vid[0-9]+/;

            			var vid_id = parseInt($(el).attr("id").match(reg_exp)[0].slice(3));

            			vidsIdsAr.push(vid_id);

      				});


	          		

	          		for (var i=0; i<mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos.length; i++){

						if ($.inArray(i, vidsIdsAr) == -1){

	          				vidId = i;

	          				break;

	          			}

	          		}


	          		$("#mp" + cur_mp_id + "_pl" + cur_pl_id + "_vids").append("<div id='mp" + cur_mp_id + "_pl" + cur_pl_id + "_vid" + vidId + "' class='fwd-video'>"

		    	    	+ "<h3 class='video-header'>" + vid_name.val().replace(/"/g, "'") + "</h3>"
						+ "<img src='" + vid_thumb.val().replace(/"/g, "'") + "' class='fwd-video-image-img' id='mp" + cur_mp_id + "_pl" + cur_pl_id + "_vid" + vidId  + "_img'></img>"

		    	       	+ "<button class='delete_video_btn' id='mp" + cur_mp_id + "_pl" + cur_pl_id + "_vid" + vidId + "_del_btn'>Delete</button>"

		    	       	+ "<button class='edit_video_btn' id='mp" + cur_mp_id + "_pl" + cur_pl_id + "_vid" + vidId + "_edit_btn'>Edit</button>"

			    	+ "</div>");


	          		

	          		$(".edit_video_btn").click(function(e){

						e.preventDefault();

      					var reg_exp1 = /mp[0-9]+_/;

      					var reg_exp2 = /pl[0-9]+_/;

      					var reg_exp3 = /vid[0-9]+_/;


      					cur_mp_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));

      					cur_pl_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(2, -1));

      					cur_vid_id = parseInt($(this).attr("id").match(reg_exp3)[0].slice(3));


      					var allMpItems = $("#main_playlists").sortable("toArray");

      			   		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);


      			        var allPlItems = $("#mp" + cur_mp_id + "_pls").sortable("toArray");

      			   		curPlOrderId = allPlItems.indexOf("mp" + cur_mp_id + "_pl" + cur_pl_id);


      			   		var allVidItems = $("#mp" + cur_mp_id + "_pl" + cur_pl_id + "_vids").sortable("toArray");

      			   		curVidOrderId = allVidItems.indexOf("mp" + cur_mp_id + "_pl" + cur_pl_id + "_vid" + cur_vid_id);

      					ads_ar = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].ads_ar;
						cuepoints_ar = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].cuepoints_ar;
						vids_ar = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].vids_ar;

      			        $("#edit-video-dialog").dialog("open");

      			    });


	          		$(".delete_video_btn").click(function(e){

						e.preventDefault();

      					var reg_exp1 = /mp[0-9]+_/;

      					var reg_exp2 = /pl[0-9]+_/;

      					var reg_exp3 = /vid[0-9]+_/;


      					cur_mp_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));

      					cur_pl_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(2, -1));

      					cur_vid_id = parseInt($(this).attr("id").match(reg_exp3)[0].slice(3));

      			        $("#delete-video-dialog").dialog("open");

      			    });


		            $(".vids").sortable("refresh");
					

		            $(".fwd-video").mouseover(function(){

            			$(this).addClass("vid_over");

            			$(this).find(".video-header").css("color", "#212121");

            		});


            		$(".fwd-video").mouseout(function(){

            			$(this).removeClass("vid_over");

            			$(this).find(".video-header").css("color", "#555555");

            		});
					
					var password = $("#password").val().replace(/"/g, "'");
					if(password.length < 2) password = undefined;
				

		            var newVid ={

		            	name: vid_name.val().replace(/"/g, "'"),

		            	thumb: vid_thumb.val().replace(/"/g, "'"),

		            	poster: vid_poster.val().replace(/"/g, "'"),
						popw:$("#popw_label").val(),
						downloadable:$("#vid_dl").val(),

		            	short_descr: getVideoShortDescr(),

		            	long_descr: getVideoLongDescr(),
						ads_ar: ads_ar,
						cuepoints_ar:cuepoints_ar,
						vids_ar: vids_ar,
						subtitles_ar: subtitles_ar,
						popupads_ar: popupads_ar,
						isPrivate:$("#is_private").val(),
						password:password,
						startAtTime:$("#start_at_time").val(),
						stopAtTime:$("#stop_at_time").val()

		            };


		            mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos.push(newVid);

		            $(this).dialog("close");

	         	}else{

	          		$("#add-video-dialog").scrollTop(0);

	          	}

	        },

	        "Cancel": function(){

	        	$(this).dialog("close");

	        }

	    },

	    close: function(){

		    allFieldsVid.removeClass("ui-state-error");

		    $("#add_vid_tips").removeClass("fwd-error");

	    },

	    open: function(){
	
			ads_ar = [];
			cuepoints_ar = [];
			vids_ar = [];
			subtitles_ar = [];
			popupads_ar = [];
			
			isEditAdd = false;
			isEditVideo = false;
			isEditsubtitle = false;
			isEditCuepoints = false;
			isEditads = false;
			isEditpopupad = false;
			
			$("#main_ads").hide();
			$("#main_cuepoints").hide();
			$("#main_vids").hide();
			$("#main_subtitles").hide();
			$("#main_popupads").hide();

	    	$("#vid_name").val("");

	    	$("#vid_thumb").val("");

	    	$("#vid_poster").val("");
			$("#password").val("");
			$("#start_at_time").val("");
			$("#stop_at_time").val("");
			$("#is_private").val("no");
			$("#private_video_div").hide();
			
			
			
			

	    	//vids
			$("#edit-video-dialog").append($("#private_video_div_edit"));
			$("#add-video-dialog").append($("#private_video_div"));
			$("#main_vids").empty();
			$("#main_vids_edit").empty();


			showAds = false;

			$("#video_ads_div").hide();

			$("#video_ads_btn").text("Show ads settings");

			$("#ads_vid_path").val("");

	    	$("#ads_vid_path_mobile").val("");

	    	$("#ads_url").val("");

	    	$("#ads_url_target").val("_blank");

	    	$("#ads_hold_time").val("");


		    setVideoShortDescr("");

		    setVideoLongDescr("");


			$("#uploads_thumb").attr("src", "");

			$("#uploads_poster").attr("src", "");

			$("#uploads_poster_mobile").attr("src", "");

		    $("#wp-vidshortdescr-wrap").attr("style", "margin-top:-30px;");

		    $("#vidshortdescr-html").html("HTML");

			$("#wp-vidlongdescr-wrap").attr("style", "margin-top:-30px;");

		    $("#vidlongdescr-html").html("HTML");


		    var allMpItems = $("#main_playlists").sortable("toArray");

       		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);

		    $("#add_vid_tips").text("The video name, source and thumbnail path fields are required.");


       		$("#vidshortdescr_ifr").height(181);

       		$("#vidlongdescr_ifr").height(181);

		}

	});


	$("#video_ads_btn").click(function(e){

		e.preventDefault();

		if (showAds){

			showAds = false;

			$("#video_ads_div").hide(200);

			$("#video_ads_btn").text("Show ads settings");

		}else{

			showAds = true;

			$("#video_ads_div").show(200);

			$("#video_ads_btn").text("Hide ads settings");

		}

	});


	

	function setVideoShortDescr(str){

		if (typeof tinyMCE !== "undefined" && tinyMCE.get("vidshortdescr")){

			tinyMCE.get("vidshortdescr").setContent(str);

		}

	    $("#vidshortdescr").val(str);

	}
	

	function getVideoShortDescr(){


		var vid_short_descr;


		


		if (typeof tinyMCE !== "undefined" && tinyMCE.get("vidshortdescr")){


			if ($("#wp-vidshortdescr-wrap").hasClass("tmce-active")){


				vid_short_descr = tinyMCE.get("vidshortdescr").getContent();


				


				if (vid_short_descr.length < 1){


					vid_short_descr = $("#vidshortdescr").val();


				}


			}else{


				vid_short_descr = $("#vidshortdescr").val();


			}


	    }else{


			vid_short_descr = $("#vidshortdescr").val();


		}





        return vid_short_descr.replace(/"/g, "'").replace(/\n/g, "");


	}


	


	function setVideoLongDescr(str){


		if (typeof tinyMCE !== "undefined" && tinyMCE.get("vidlongdescr")){


			tinyMCE.get("vidlongdescr").setContent(str);


		}


	    


	    $("#vidlongdescr").val(str);


	}


	


	function getVideoLongDescr(){


		var vid_long_descr;


		


		if (typeof tinyMCE !== "undefined" && tinyMCE.get("vidlongdescr")){


			if ($("#wp-vidlongdescr-wrap").hasClass("tmce-active")){


				vid_long_descr = tinyMCE.get("vidlongdescr").getContent();


				


				if (vid_long_descr.length < 1){


					vid_long_descr = $("#vidlongdescr").val();


				}


			}else{


				vid_long_descr = $("#vidlongdescr").val();


			}


	    }else{


			vid_long_descr = $("#vidlongdescr").val();


		}





        return vid_long_descr.replace(/"/g, "'").replace(/\n/g, "");


	}





	$(".add_video_btn").click(function(e){

		e.preventDefault();

		var reg_exp1 = /mp[0-9]+_/;

		var reg_exp2 = /pl[0-9]+_/;

	

		cur_mp_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));

		cur_pl_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(2, -1));

        $("#add-video-dialog").dialog("open");

    });


	


	var vid_name_edit = $("#vid_name_edit");


    var vid_source_edit = $("#vid_source_edit");


    var vid_source_mobile_edit = $("#vid_source_mobile_edit");


    var vid_thumb_edit = $("#vid_thumb_edit");


    var vid_poster_edit = $("#vid_poster_edit");


    var vid_poster_mobile_edit = $("#vid_poster_mobile_edit");


    var vid_dl_edit = $("#vid_dl_edit");


	var vid_subtitle_edit = $("#vid_subtitle_source_edit");


	


	var ads_source_edit = $("#ads_vid_path_edit");


	var ads_source_mobile_edit = $("#ads_vid_path_mobile_edit");


	var ads_url_edit = $("#ads_url_edit");


	var ads_url_target_edit = $("#ads_url_target_edit");


	var ads_hold_time_edit = $("#ads_hold_time_edit");
	

	var checkedpopupadId = 0;
	var checkedId = 0;
	var checkedSubtitleId = 0;
	var vidCheckedId = 0;

	var showAdsEdit = false;
	var start_at_video_main_edit = document.getElementById("start_at_video_main_edit");


    


    var allFieldsVidEdit = $([]).add(vid_name_edit).add(vid_source_edit).add(vid_source_mobile_edit).add(vid_thumb_edit).add(vid_poster_edit).add(vid_poster_mobile_edit).add(ads_source_edit).add(ads_source_mobile_edit).add(ads_url_edit).add(ads_hold_time_edit).add($("#start_at_time_edit")).add($("#stop_at_time_edit"))





	$("#edit-video-dialog").dialog({


		autoOpen: false,


		width: 640,


	    height: 700,


	    modal: true,


	    buttons:{


	        "Update video": function(){


	         	var fValid = true;


	         	var tips = $("#edit_vid_tips");


	          	allFieldsVidEdit.removeClass("ui-state-error");

				fValid = fValid && checkLength(tips, vid_name_edit, "video name", 1, 64);

	       		fValid = fValid && checkLength(tips, vid_thumb_edit, "video thumbnail", 1, 256);

	       		fValid = fValid && checkLength(tips, vid_poster_edit, "video poster", 0, 256);
				if($("#start_at_time_edit").val().length > 0) fValid = fValid && checkTimeFormat(tips, $("#start_at_time_edit"), "start at time");
				if($("#stop_at_time_edit").val().length > 0) fValid = fValid && checkTimeFormat(tips, $("#stop_at_time_edit"), "stop at time");
				
				if(vids_ar.length == 0){
					updateTips(tips, "Please make sure at least one video source is added");
					return;
				}

			

	          	if (fValid){
					

	          		var content = $("#mp" + cur_mp_id + "_pl" + cur_pl_id + "_vid" + cur_vid_id + " > h3").html();

	          		var pos = content.indexOf(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].name);


	          		content = content.slice(0, pos);


	          		$("#mp" + cur_mp_id + "_pl" + cur_pl_id + "_vid" + cur_vid_id + " > h3").html(content + vid_name_edit.val().replace(/"/g, "'"));


	          		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].name = vid_name_edit.val().replace(/"/g, "'");

	          		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].vids_ar = vids_ar;
					
					mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].ads_ar = ads_ar;
					mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].cuepoints_ar = cuepoints_ar;
					
					mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].subtitles_ar = subtitles_ar;
					mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].popupads_ar = popupads_ar;
					
					mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].startAtTime = $("#start_at_time_edit").val().replace(/"/g, "'");
					mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].stopAtTime = $("#stop_at_time_edit").val().replace(/"/g, "'");

	          		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].thumb = vid_thumb_edit.val().replace(/"/g, "'");

	          		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].poster = vid_poster_edit.val().replace(/"/g, "'");
					mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].popw = $("#popw_label_edit").val().replace(/"/g, "'");
					
					mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].downloadable = $("#vid_dl_edit").val();
					

					mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].subtitle = vid_subtitle_edit.val();

	          		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].short_descr = getVideoShortDescrEdit();

	          		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].long_descr = getVideoLongDescrEdit();
					mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].isPrivate = $("#is_private_edit").val();
					mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].password = $("#password_edit").val().replace(/"/g, "'");
					
				

		            $(this).dialog("close");


	         	}else{


	          		$("#edit-video-dialog").scrollTop(0);


	          	}


	        },


	        "Cancel": function(){


	        	$(this).dialog("close");


	        }


	    },


	    close: function(){


		    allFieldsVidEdit.removeClass("ui-state-error");


		    $("#edit_vid_tips").removeClass("fwd-error");


	    },


	    open: function(){
			

	    	$("#vid_name_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].name);

	    	$("#vid_source_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].source);

	    	$("#vid_source_mobile_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].source_mobile);

	    	$("#vid_thumb_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].thumb);

	    	$("#vid_poster_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].poster);
			$("#popw_label_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].popw);
			

	    	$("#vid_poster_mobile_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].poster_mobile);
			
			$("#start_at_time_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].startAtTime);
			$("#stop_at_time_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].stopAtTime);


	    	$("#vid_dl_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].downloadable);

			$("#vid_subtitle_source_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].subtitle);


		    setVideoShortDescrEdit(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].short_descr);

		    setVideoLongDescrEdit(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].long_descr);


			$("#uploads_thumb_edit").attr("src", mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].thumb);

			$("#uploads_poster_edit").attr("src", mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].poster);

			$("#uploads_poster_mobile_edit").attr("src", mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].poster_mobile);
			

			showAdsEdit = false;


			$("#video_ads_div_edit").hide();

			$("#video_ads_btn_edit").text("Show ads settings");


		    $("#wp-vidshortdescredit-wrap").attr("style", "margin-top:-30px;");


		    $("#vidshortdescredit-html").html("HTML");

			


			$("#wp-vidlongdescredit-wrap").attr("style", "margin-top:-30px;");


		    $("#vidlongdescredit-html").html("HTML");


		    var allMpItems = $("#main_playlists").sortable("toArray");


       		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);
			
			
			vids_ar = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].vids_ar;
			
			subtitles_ar = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].subtitles_ar;
			popupads_ar  = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].popupads_ar;
			cuepoints_ar  = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].cuepoints_ar;
			
			isEditAdd = true;
			isEditVideo = true;
			isEditsubtitle = true;
			isEditCuepoints = true;
			isEditads = true;
			isEditpopupad = true;
			
			//vids
			$("#edit-video-dialog").append($("#private_video_div_edit"));
			$("#add-video-dialog").append($("#private_video_div"));
			$("#main_vids").empty();
			$("#main_vids_edit").empty();
			
			if(vids_ar.length > 0){
				$("#main_vids_edit").show();
				var pid = 0;
				
				for(var i=0; i<vids_ar.length; i++){
					$("#main_vids_edit").append("<div id='vid" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + vids_ar[pid]['label'] + "</span></h3>"
						+ "<div>"
						+ "<input class='checkbox_vid' type='checkbox' name='checkbox_vid_checkbox' value='" + pid + "' id='vid" + pid + "_checkbox'></input>"
						+ "<button class='edit_vid_btn' id='vid" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_vid_btn' id='vid" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
						+ "</div>");
					pid++;
					vids_ar[i].id = i;
					
					if(vids_ar[i].checked){
						vidCheckedId = i;
					}
				}
				
				setTimeout(function(){
					disableEnableVideoCheckboxes("vid" + vidCheckedId  + "_checkbox");
				},50);
				
				$(".checkbox_vid").click(function(e){
					e.preventDefault();
					var reg_exp1 = /vid[0-9]+_/;
					
					if(!clickOnce) return;
					clickOnce = false;
					setTimeout(function(){clickOnce = true;},50);
					vidsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
					
					var allMpItems = [];
					if(isEditVideo){
						for(var i=0; i<$("#main_vids_edit").children().length; i++){
							allMpItems.push($("#main_vids_edit").children()[i].getAttribute("id"));
						}
					}else{
						for(var i=0; i<$("#main_vids").children().length; i++){
							allMpItems.push($("#main_vids").children()[i].getAttribute("id"));
						}
					}
					
					curVidsId = allMpItems.indexOf("vid" + vidsId);
					disableEnableVideoCheckboxes($(this).attr("id"))
				});
							
				$(".edit_vid_btn").click(function(e){
					e.preventDefault();
					var reg_exp1 = /vid[0-9]+_/;
					vidsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
					
					var allMpItems = [];
					if(isEditVideo){
						for(var i=0; i<$("#main_vids_edit").children().length; i++){
							allMpItems.push($("#main_vids_edit").children()[i].getAttribute("id"));
						}
					}else{
						for(var i=0; i<$("#main_vids").children().length; i++){
							allMpItems.push($("#main_vids").children()[i].getAttribute("id"));
						}
					}
					
					curVidsId = allMpItems.indexOf("vid" + vidsId);
	
					$("#edit-video-final-dialog").dialog("open");
				});
				
					$(".delete_vid_btn").click(function(e){
						var reg_exp1 = /vid[0-9]+_/;
						vidsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
						
						var allMpItems = [];
						if(isEditVideo){
							for(var i=0; i<$("#main_vids_edit").children().length; i++){
								allMpItems.push($("#main_vids_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_vids").children().length; i++){
								allMpItems.push($("#main_vids").children()[i].getAttribute("id"));
							}
						}
											
						curVidsId = allMpItems.indexOf("vid" + vidsId);
						$("#delete-video-final-dialog").dialog("open");
					});
			}else{
				$("#main_vids_edit").hide();
			}
			
			$("#main_vids_edit").append($("#private_video_div_edit"));
			$("private_video_div_edit").show();
			
			$("#is_private_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].isPrivate);
			$("#password_edit").val(mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].password);
			
			
			//subtitles
			$("#main_subtitles").empty();
			$("#main_subtitles_edit").empty();
			
			if(subtitles_ar.length > 0){
				$("#main_subtitles_edit").show();
				var pid = 0;
				for(var i=0; i<subtitles_ar.length; i++){
					$("#main_subtitles_edit").append("<div id='subtitle" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + subtitles_ar[pid]['label'] + "</span></h3>"
						+ "<div>"
						+ "<input class='checkbox_subtitle' type='checkbox' name='checkbox_subtitle_checkbox' value='" + pid + "' id='subtitle" + pid + "_checkbox'></input>"
						+ "<button class='edit_subtitle_btn' id='subtitle" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_subtitle_btn' id='subtitle" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
						+ "</div>");
					pid++;
					subtitles_ar[i].id = i;
					if(subtitles_ar[i].checked){
						checkedSubtitleId = i;
					}
				}
				
						
				setTimeout(function(){
					disableEnableSubtitleCheckboxes("subtitle" + checkedSubtitleId  + "_checkbox");
				},50);
				
				$(".checkbox_subtitle").click(function(e){
						e.preventDefault();
						var reg_exp1 = /subtitle[0-9]+_/;
						
						if(!clickOnce) return;
						clickOnce = false;
						setTimeout(function(){clickOnce = true;},50);
						subtitleId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(8, -1));
						
						var allMpItems = [];
						if(isEditsubtitle){
							for(var i=0; i<$("#main_subtitles_edit").children().length; i++){
								allMpItems.push($("#main_subtitles_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_subtitles").children().length; i++){
								allMpItems.push($("#main_subtitles").children()[i].getAttribute("id"));
							}
						}
						
						curSubtitleId = allMpItems.indexOf("subtitle" + subtitleId);
						disableEnableSubtitleCheckboxes($(this).attr("id"))
					});
							
				$(".edit_subtitle_btn").click(function(e){
						e.preventDefault();
						var reg_exp1 = /subtitle[0-9]+_/;
						subtitleId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(8, -1));
						
						var allMpItems = [];
						if(isEditsubtitle){
							for(var i=0; i<$("#main_subtitles_edit").children().length; i++){
								allMpItems.push($("#main_subtitles_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_subtitles").children().length; i++){
								allMpItems.push($("#main_subtitles").children()[i].getAttribute("id"));
							}
						}
						
						curSubtitleId = allMpItems.indexOf("subtitle" + subtitleId);
		
						$("#edit-subtitle-dialog").dialog("open");
					});
				
					$(".delete_subtitle_btn").click(function(e){
						var reg_exp1 = /subtitle[0-9]+_/;
						subtitleId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(8, -1));
						
						var allMpItems = [];
						if(isEditsubtitle){
							for(var i=0; i<$("#main_subtitles_edit").children().length; i++){
								allMpItems.push($("#main_subtitles_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_subtitles").children().length; i++){
								allMpItems.push($("#main_subtitles").children()[i].getAttribute("id"));
							}
						}
						
						
						curSubtitleId = allMpItems.indexOf("subtitle" + subtitleId);
						$("#delete-subtitle-dialog").dialog("open");
					});
			}else{
				$("#main_subtitles_edit").hide();
			}
			
			//cuepoints
			$("#main_cuepoints").empty();
			$("#main_cuepoints_edit").empty();
			
			if(cuepoints_ar && cuepoints_ar.length > 0){
				$("#main_cuepoints_edit").show();
				var pid = 0;
				
				for(var i=0; i<cuepoints_ar.length; i++){
					$("#main_cuepoints_edit").append("<div id='cuepoint" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + cuepoints_ar[pid]['label'] + "</span></h3>"
						+ "<div>"
						+ "<button class='edit_cuepoint_btn' id='cuepoint" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_cuepoint_btn' id='cuepoint" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
						+ "</div>");
					pid++;
					cuepoints_ar[i].id = i;
					if(cuepoints_ar[i].checked){
						checkedId = i;
					}
				}
				
							
				$(".edit_cuepoint_btn").click(function(e){
					e.preventDefault();
					var reg_exp1 = /cuepoint[0-9]+_/;
					cuepointId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(8, -1));
					var allMpItems = [];
					if(isEditCuepoints){
						for(var i=0; i<$("#main_cuepoints_edit").children().length; i++){
							allMpItems.push($("#main_cuepoints_edit").children()[i].getAttribute("id"));
						}
					}else{
						for(var i=0; i<$("#main_cuepoints").children().length; i++){
							allMpItems.push($("#main_cuepoints").children()[i].getAttribute("id"));
						}
					}
					
					curCuepointId = allMpItems.indexOf("cuepoint" + cuepointId);
					
					$("#edit-cuepoints-dialog").dialog("open");
				});
			
				$(".delete_cuepoint_btn").click(function(e){
					var reg_exp1 = /cuepoint[0-9]+_/;
					cuepointId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(8, -1));
					
					var allMpItems = [];
					if(isEditCuepoints){
						for(var i=0; i<$("#main_cuepoints_edit").children().length; i++){
							allMpItems.push($("#main_cuepoints_edit").children()[i].getAttribute("id"));
						}
					}else{
						for(var i=0; i<$("#main_cuepoints").children().length; i++){
							allMpItems.push($("#main_cuepoints").children()[i].getAttribute("id"));
						}
					}
					
					
					curCuepointId = allMpItems.indexOf("cuepoint" + cuepointId);
					$("#delete-cuepoint-dialog").dialog("open");
				});
			}else{
				$("#main_cuepoints_edit").hide();
			}
			
			//ads
			$("#main_ads").empty();
			$("#main_ads_edit").empty();
			
			if(ads_ar && ads_ar.length > 0){
				$("#main_ads_edit").show();
				var pid = 0;
				
				for(var i=0; i<ads_ar.length; i++){
					$("#main_ads_edit").append("<div id='ads" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + ads_ar[pid]['label'] + "</span></h3>"
						+ "<div>"
						+ "<button class='edit_ads_btn' id='ads" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_ads_btn' id='ads" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
						+ "</div>");
					pid++;
					ads_ar[i].id = i;
					if(ads_ar[i].checked){
						checkedId = i;
					}
				}
				
						
				setTimeout(function(){
					disableEnableAdsCheckboxes("ads" + checkedId  + "_checkbox");
				},50);
				
				$(".checkbox_ads").click(function(e){
						e.preventDefault();
						var reg_exp1 = /ads[0-9]+_/;
						
						if(!clickOnce) return;
						clickOnce = false;
						setTimeout(function(){clickOnce = true;},50);
						adsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
						
						var allMpItems = [];
						if(isEditads){
							for(var i=0; i<$("#main_ads_edit").children().length; i++){
								allMpItems.push($("#main_ads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_ads").children().length; i++){
								allMpItems.push
							}
						}
						
						curAdsId = allMpItems.indexOf("ads" + adsId);
						disableEnableAdsCheckboxes($(this).attr("id"))
					});
							
				$(".edit_ads_btn").click(function(e){
						e.preventDefault();
						var reg_exp1 = /ads[0-9]+_/;
				
						adsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
						
						var allMpItems = [];
						if(isEditads){
							for(var i=0; i<$("#main_ads_edit").children().length; i++){
								allMpItems.push($("#main_ads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_ads").children().length; i++){
								allMpItems.push($("#main_ads").children()[i].getAttribute("id"));
							}
						}
						
						curAdsId = allMpItems.indexOf("ads" + adsId);
						
						$("#edit-ads-dialog").dialog("open");
					});
				
					$(".delete_ads_btn").click(function(e){
						var reg_exp1 = /ads[0-9]+_/;
						adsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(3, -1));
						
						var allMpItems = [];
						if(isEditads){
							for(var i=0; i<$("#main_ads_edit").children().length; i++){
								allMpItems.push($("#main_ads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_ads").children().length; i++){
								allMpItems.push($("#main_ads").children()[i].getAttribute("id"));
							}
						}
						
						
						curAdsId = allMpItems.indexOf("ads" + adsId);
						$("#delete-ads-dialog").dialog("open");
					});
			}else{
				$("#main_ads_edit").hide();
			}
			
			//popup ads
			$("#main_popupads").empty();
			$("#main_popupads_edit").empty();
			
			if(popupads_ar.length > 0){
				$("#main_popupads_edit").show();
				var pid = 0;
				for(var i=0; i<popupads_ar.length; i++){
					$("#main_popupads_edit").append("<div id='popupad" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + popupads_ar[pid]['label'] + "</span></h3>"
						+ "<div>"
						+ "<button class='edit_popupad_btn' id='popupad" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_popupad_btn' id='popupad" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
						+ "</div>");
					pid++;
					popupads_ar[i].id = i;
					if(popupads_ar[i].checked){
						checkedpopupadId = i;
					}
				}
				
						
				setTimeout(function(){
					disableEnablepopupadCheckboxes("popupad" + checkedpopupadId  + "_checkbox");
				},50);
				
				$(".checkbox_popupad").click(function(e){
						e.preventDefault();
						var reg_exp1 = /popupad[0-9]+_/;
						
						if(!clickOnce) return;
						clickOnce = false;
						setTimeout(function(){clickOnce = true;},50);
						popupadId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(7, -1));
						
						var allMpItems = [];
						if(isEditpopupad){
							for(var i=0; i<$("#main_popupads_edit").children().length; i++){
								allMpItems.push($("#main_popupads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_popupads").children().length; i++){
								allMpItems.push($("#main_popupads").children()[i].getAttribute("id"));
							}
						}
						
						curpopupadId = allMpItems.indexOf("popupad" + popupadId);
						disableEnablepopupadCheckboxes($(this).attr("id"))
					});
							
				$(".edit_popupad_btn").click(function(e){
						e.preventDefault();
						var reg_exp1 = /popupad[0-9]+_/;
						popupadId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(7, -1));
						
						var allMpItems = [];
						if(isEditpopupad){
							for(var i=0; i<$("#main_popupads_edit").children().length; i++){
								allMpItems.push($("#main_popupads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_popupads").children().length; i++){
								allMpItems.push($("#main_popupads").children()[i].getAttribute("id"));
							}
						}
						
						curpopupadId = allMpItems.indexOf("popupad" + popupadId);
		
						$("#edit-popupad-dialog").dialog("open");
					});
				
					$(".delete_popupad_btn").click(function(e){
						
						var reg_exp1 = /popupad[0-9]+_/;
						popupadId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(7, -1));
						
						var allMpItems = [];
						if(isEditpopupad){
							for(var i=0; i<$("#main_popupads_edit").children().length; i++){
								allMpItems.push($("#main_popupads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_popupads").children().length; i++){
								allMpItems.push($("#main_popupads").children()[i].getAttribute("id"));
							}
						}
						
						
						curpopupadId = allMpItems.indexOf("popupad" + popupadId);
						
						$("#delete-popupad-dialog").dialog("open");
					});
			}else{
				$("#main_popupads_edit").hide();
			}
			
			

		    $("#edit_vid_tips").text("The video name, source and thumbnail path fields are required.");


       		


       		$("#vidshortdescredit_ifr").height(181);


       		$("#vidlongdescredit_ifr").height(181);


		}


	});


	


	$("#video_ads_btn_edit").click(function(e)


	{


		e.preventDefault();


	


		if (showAdsEdit)


		{


			showAdsEdit = false;


		


			$("#video_ads_div_edit").hide(200);


			$("#video_ads_btn_edit").text("Show ads settings");


		}


		else


		{


			showAdsEdit = true;


			


			$("#video_ads_div_edit").show(200);


			$("#video_ads_btn_edit").text("Hide ads settings");


		}


	});


	


	function setVideoShortDescrEdit(str)


	{


		if (typeof tinyMCE !== "undefined" && tinyMCE.get("vidshortdescredit"))


	    {


	    	tinyMCE.get("vidshortdescredit").setContent(str);


	    }


	    


	    $("#vidshortdescredit").val(str);


	}


	


	function getVideoShortDescrEdit()


	{


		var vid_short_descr_edit;


		


		if (typeof tinyMCE !== "undefined" && tinyMCE.get("vidshortdescredit"))


	    {


			if ($("#wp-vidshortdescredit-wrap").hasClass("tmce-active"))


			{


				vid_short_descr_edit = tinyMCE.get("vidshortdescredit").getContent();


				


				if (vid_short_descr_edit.length < 1)


				{


					vid_short_descr_edit = $("#vidshortdescredit").val();


				}


			}


			else


			{


				vid_short_descr_edit = $("#vidshortdescredit").val();


			}


	    }


		else


		{


			vid_short_descr_edit = $("#vidshortdescredit").val();


		}





        return vid_short_descr_edit.replace(/"/g, "'").replace(/\n/g, "");


	}


	


	function setVideoLongDescrEdit(str)


	{


		if (typeof tinyMCE !== "undefined" && tinyMCE.get("vidlongdescredit"))


	    {


	    	tinyMCE.get("vidlongdescredit").setContent(str);


	    }


	    


	    $("#vidlongdescredit").val(str);


	}


	


	function getVideoLongDescrEdit(){


		var vid_long_descr_edit;


		


		if (typeof tinyMCE !== "undefined" && tinyMCE.get("vidlongdescredit")){


			if ($("#wp-vidlongdescredit-wrap").hasClass("tmce-active")){


				vid_long_descr_edit = tinyMCE.get("vidlongdescredit").getContent();


				


				if (vid_long_descr_edit.length < 1){


					vid_long_descr_edit = $("#vidlongdescredit").val();


				}


			}else{


				vid_long_descr_edit = $("#vidlongdescredit").val();


			}


	    }else{


			vid_long_descr_edit = $("#vidlongdescredit").val();


		}





        return vid_long_descr_edit.replace(/"/g, "'").replace(/\n/g, "");


	}





	$(".edit_video_btn").click(function(e){

		e.preventDefault();


		var reg_exp1 = /mp[0-9]+_/;

		var reg_exp2 = /pl[0-9]+_/;

		var reg_exp3 = /vid[0-9]+_/;

		cur_mp_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));

		cur_pl_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(2, -1));

		cur_vid_id = parseInt($(this).attr("id").match(reg_exp3)[0].slice(3));


		var allMpItems = $("#main_playlists").sortable("toArray");

   		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);


        var allPlItems = $("#mp" + cur_mp_id + "_pls").sortable("toArray");

   		curPlOrderId = allPlItems.indexOf("mp" + cur_mp_id + "_pl" + cur_pl_id);


   		var allVidItems = $("#mp" + cur_mp_id + "_pl" + cur_pl_id + "_vids").sortable("toArray");

   		curVidOrderId = allVidItems.indexOf("mp" + cur_mp_id + "_pl" + cur_pl_id + "_vid" + cur_vid_id);


		ads_ar = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].ads_ar;
		cuepoints_ar = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].cuepoints_ar;
		vids_ar = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].vids_ar;
		subtitles_ar = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].subtitles_ar;
		popupads_ar = mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos[curVidOrderId].popupads_ar;
		

        $("#edit-video-dialog").dialog("open");

    });


	


	$("#delete-video-dialog").dialog({

		autoOpen: false,

		width: 300,

	    height: 160,

	    modal: true,

	    buttons:{

	        "Yes": function(){

				var allMpItems = $("#main_playlists").sortable("toArray");

		   		curMpOrderId = allMpItems.indexOf("mp" + cur_mp_id);


		        var allPlItems = $("#mp" + cur_mp_id + "_pls").sortable("toArray");

		   		curPlOrderId = allPlItems.indexOf("mp" + cur_mp_id + "_pl" + cur_pl_id);


		   		var allVidItems = $("#mp" + cur_mp_id + "_pl" + cur_pl_id + "_vids").sortable("toArray");

		   		curVidOrderId = allVidItems.indexOf("mp" + cur_mp_id + "_pl" + cur_pl_id + "_vid" + cur_vid_id);


		   		mainPlaylistsAr[curMpOrderId].playlists[curPlOrderId].videos.splice(curVidOrderId, 1);


		   		$("#mp" + cur_mp_id + "_pl" + cur_pl_id + "_vid" + cur_vid_id).remove();

		   		$(".vids").sortable("refresh");		        

		        $(this).dialog("close");

	        },


	        "No": function(){

	        	$(this).dialog("close");

	        }

	    }

	});


	


	$(".delete_video_btn").click(function(e){


		e.preventDefault();


		var reg_exp1 = /mp[0-9]+_/;

		var reg_exp2 = /pl[0-9]+_/;

		var reg_exp3 = /vid[0-9]+_/;


		cur_mp_id = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));

		cur_pl_id = parseInt($(this).attr("id").match(reg_exp2)[0].slice(2, -1));


		cur_vid_id = parseInt($(this).attr("id").match(reg_exp3)[0].slice(3));

        $("#delete-video-dialog").dialog("open");

    });


	var curAdsId;
	var pr_name = $("#pr_name");
	var pr_name_edit = $("#pr_name_edit");
    var image_source = $("#image_source");
	var image_source_edit =  $("#image_source_edit");
	var url_edit = $("#url_edit");
	var ads_start_time_edit = $("#ads_start_time_edit");
	var stop_time_edit = $("#stop_time_edit");
	var start_time = $("#start_time");
	var stop_time = $("#stop_time");
	var show_after_zoom_edit = $("#show_after_zoom_edit");
	var show_after_zoom = $("#show_after_zoom");
    var pr_type_edit = $("#pr_type_edit");
	var pr_source_edit = $("#pr_source_edit");
	var allFieldsPl = $([]).add(pr_name).add(image_source).add(ads_url).add(start_time).add(stop_time);
	var allFieldsPlEdit = $([]).add(pr_name_edit).add(image_source_edit).add(url_edit).add(ads_start_time_edit).add(stop_time_edit);
	var adsId;
	var isEditAdd = false;
	
	
	$("#ads_ads_btn").click(function(e){

		e.preventDefault();
		isEditAdd = false;
        $("#add-ad-dialog").dialog("open");
		$('#add-video-dialog').parent().css("left", -2000);
    });
	
	$("#ads_ads_btn_edit").click(function(e){

		e.preventDefault();
		isEditAdd = true;
        $("#add-ad-dialog").dialog("open");
		$('#edit-video-dialog').parent().css("left", -2000);
    });
	
	$("#add-ad-dialog").dialog({
		autoOpen: false,
		width: 620,
	    height: 390,
	    modal: true,
	    buttons:{
	        "Add ad": function(){
	         	
				var fValid = true;
	         	var tips = $("#add_pr_tips");
	         	
	          	allFieldsPl.removeClass("ui-state-error");
	          	fValid = fValid && checkLength(tips, $("#ads_label"), "label", 1, 64);
				fValid = fValid && checkLength(tips,  $("#ads_source"), "source", 1, 500);
				fValid = fValid && checkLength(tips, $("#ads_start_time"), "start time", 1, 64);
				fValid = fValid && checkLength(tips, $("#add_duration"), "duration", 1, 64);
				
				for(var i=0; i<ads_ar.length; i++){
					if(ads_ar[i].name == pr_name.val()){
						pr_name.addClass("ui-state-error");
						updateTips(tips, "Please make sure the advertisement label is unique.");
						return;
					}
				}

				
				if (fValid){
					
					if(isEditAdd){
						var pid = $("#main_ads_edit .fwd-item").length || 0;
					}else{
						var pid = $("#main_ads .fwd-item").length || 0;
					}
					
					
	          		var plsIdsAr = [];
	          		
	          		if (pid > 0){
	          			$.each(ads_ar, function(i, el){
							plsIdsAr.push(el.id);
						});
    	          		for (var i=0; i<ads_ar.length; i++){
    	          			if($.inArray(i, plsIdsAr) == -1){
    	          				pid = i;
    	          				break;
    	          			}
    	          		}
	          		}else{
	          			$("#mp_em").hide();
	          		}
					
					if(isEditAdd){
						$("#main_ads_edit").append("<div id='ad" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + pr_name.val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<img src='" + image_source.val().replace(/"/g, "'") + "' class='fwd-item-image-img' id='ad" + pid + "_img'></img>"
						+ "<button class='edit_ads_btn' id='ad" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_ads_btn' id='ad" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
					+ "</div>");
					}else{
						$("#main_ads").append("<div id='ad" + pid + "' class='fwd-item'>"
						+ "<h3 class='item-header'><span style='margin-left:0px;'>" + pr_name.val().replace(/"/g, "'") + "</span></h3>"
						+ "<div>"
						+ "<img src='" + image_source.val().replace(/"/g, "'") + "' class='fwd-item-image-img' id='ad" + pid + "_img'></img>"
						+ "<button class='edit_ads_btn' id='ad" + pid + "_edit_btn' style='cursor:pointer;'>Edit</button>"
						+ "<button class='delete_ads_btn' id='ad" + pid + "_del_btn' style='cursor:pointer;'>Delete</button>"
						+ "</div>"
					+ "</div>");
					}
					
					
					$(".edit_ads_btn").click(function(e){
						e.preventDefault();
						var reg_exp1 = /ads[0-9]+_/;
						adsId = parseInt($(this).attr("id").match(reg_exp1)[0].slice(2, -1));
						
						var allMpItems = [];
						if(isEditAdd){
							for(var i=0; i<$("#main_ads_edit").children().length; i++){
								allMpItems.push($("#main_ads_edit").children()[i].getAttribute("id"));
							}
						}else{
							for(var i=0; i<$("#main_ads").children().length; i++){
								allMpItems.push($("#main_ads").children()[i].getAttribute("id"));
							}
						}
						
						curAdsId = allMpItems.indexOf("ad" + adsId);
						
						$("#edit-ads-dialog").dialog("open");
					});
				
					$(".delete_ads_btn").click(function(e){
						e.preventDefault();
						var reg_exp = /ads[0-9]+_/;
						adsId = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));
						$("#delete-ad-dialog").dialog("open");
					});

					$(".ad .ui-accordion-header-icon").css("left", "22px");
				
					
					var newPl ={
						id:pid,
						name:  $("#ads_label").val().replace(/"/g, "'"),
						source: $("#ads_source").val().replace(/"/g, "'"),
						url:$("#ads_url").val().replace(/"/g, "'"),
						target:$("#ads_target").val().replace(/"/g, "'"),
						start_time:$("#ads_start_time").val().replace(/"/g, "'"),
						time_to_hold_ad:$("#time_to_hold_ad").val().replace(/"/g, "'"),
						add_duration:$("#add_duration").val().replace(/"/g, "'")
					};
					
					ads_ar.push(newPl);
					
					$(this).dialog("close");
					
					
					$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
					$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
						
				}
	         	 
	        },
	        "Cancel": function() {
				if(ads_ar.length == 0){
					$("#main_ads").hide();
					$("#main_ads_edit").hide();
				}else{
					$("#main_ads").show();
					$("#main_ads_edit").show();
				}
				
	        	$(this).dialog("close");
				$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	        }
	    },
	    close: function(){
			if(ads_ar.length == 0){
				$("#main_ads_edit").hide();
				$("#main_ads").hide();
			}else{
				$("#main_ads").show();
				$("#main_ads_edit").show();
			}
			
		    allFieldsPl.removeClass("ui-state-error");  
		    $("#add_pr_tips").removeClass("fwd-error");
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			
	    },
	    open: function(){
			if(ads_ar.length == 0){
				$("#main_ads_edit").hide();
				$("#main_ads").hide();
			}else{
				$("#main_ads").show();
				$("#main_ads_edit").show();
			}
			$("#pr_name").val("");
	    	$("#ads_url").val("");
			$("#ads_target").val("_blank");
			$("#start_time").val("00:00:00");
			$("#stop_time").val("");
			$("#image_source").val("00:00:00");
			$("#thumb_source").attr("src", "");
			
			$("#add_ads_tips").text("The advertisement label is required:");
			$("#add_ads_tips").removeClass("fwd-error");
			 
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
		}
	});
	
	$(".add_ads_btn").click(function(e){
		e.preventDefault();
	
		var reg_exp = /mp[0-9]+_/;
		
		adsId = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));
		
        $("#add-ad-dialog").dialog("open");
    });
    
	$("#edit-ads-dialog").dialog({
		autoOpen: false,
		width: 580,
	    height: 440,
	    modal: true,
	    buttons:{
	        "Update advertisement": function(){
				var fValid = true;
				var tips = $("#edit_ads_tips");
				
				allFieldsadsEdit.removeClass("ui-state-error");
				
				fValid = fValid && checkLength(tips, $("#ads_label_edit"), "label", 1, 64);
				fValid = fValid && checkLength(tips,  $("#ads_source_edit"), "source", 1, 500);
				fValid = fValid && checkLength(tips, $("#ads_start_time_edit"), "start time", 1, 64);
				fValid = fValid && checkLength(tips, $("#time_to_hold_ad_edit"), "time to hold ad", 1, 64);
				fValid = fValid && checkLength(tips, $("#add_duration_edit"), "duration", 1, 64);
				
				if (fValid){
					
					var content = $("#ads" + adsId + " > h3").html();
	          		var pos = content.indexOf(ads_ar[curAdsId].label);
	          		content = content.slice(0, pos);
					
					$("#ads" + adsId + " > h3").html(content + $("#ads_label_edit").val().replace(/"/g, "'"));
					
					ads_ar[curAdsId].label = $("#ads_label_edit").val().replace(/"/g, "'");
					ads_ar[curAdsId].source = $("#ads_source_edit").val().replace(/"/g, "'");
					ads_ar[curAdsId].url = $("#ads_url_edit").val().replace(/"/g, "'");
					ads_ar[curAdsId].target = $("#ads_target_edit").val().replace(/"/g, "'");
					ads_ar[curAdsId].startTime = $("#ads_start_time_edit").val().replace(/"/g, "'");
					ads_ar[curAdsId].timeToHoldAd = $("#time_to_hold_ad_edit").val().replace(/"/g, "'");
					ads_ar[curAdsId].addDuration = $("#add_duration_edit").val().replace(/"/g, "'");
					
					$(this).dialog("close");
					
					$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
					$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				}
	        },
	        "Cancel": function(){
	        	$(this).dialog("close");
				$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
				$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	        }
	    },
	    close: function(){
		    allFieldsPlEdit.removeClass("ui-state-error");
		    $("#video-tips-edit").removeClass("fwd-error");
			$("#add-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
			$("#edit-video-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
	    },
	    open: function(){
			
			$('#add-video-dialog').parent().css("left", -2000);
			$('#edit-video-dialog').parent().css("left", -2000);
			
			$("#edit_ads_tips").text("The advertisement label is required:");
			$("#edit_ads_tips").removeClass("fwd-error");
			$("#pr_name_edit").prop('disabled', 'disabled');
			
			$("#ads_label_edit").val(ads_ar[curAdsId].label);
			$("#ads_source_edit").val(ads_ar[curAdsId].source);
			$("#ads_url_edit").val(ads_ar[curAdsId].url);
			$("#ads_start_time_edit").val(ads_ar[curAdsId].startTime);
			$("#ads_target_edit").val(ads_ar[curAdsId].target);
			$("#time_to_hold_ad_edit").val(ads_ar[curAdsId].timeToHoldAd);
			$("#add_duration_edit").val(ads_ar[curAdsId].addDuration);
		
			$("#edit-ads-dialog").dialog("option", "position", {my: "center", at: "center", of: window});
		}
	});
	
	$("#delete-ad-dialog").dialog({
		autoOpen: false,
		width: 300,
	    height: 150,
	    modal: true,
	    buttons:{
	        "Yes": function(){
				var allMpItems = [];
				if(isEditAdd){
					for(var i=0; i<$("#main_ads_edit").children().length; i++){
						allMpItems.push($("#main_ads_edit").children()[i].getAttribute("id"));
					}
				}else{
					for(var i=0; i<$("#main_ads").children().length; i++){
						allMpItems.push($("#main_ads").children()[i].getAttribute("id"));
					}
					
				}
	            
	       		var plsId = allMpItems.indexOf("ad" + adsId);
	       		ads_ar.splice(plsId, 1);
				
	       		$("#ad" + adsId).remove();
				
	            $(this).dialog("close");
				
				if(ads_ar.length == 0){
					$("#main_ads").hide();
					$("#main_ads_edit").hide();
				}
	        },
	        "No": function(){
	        	$(this).dialog("close");
	        }
	    }
	});
	
	$(".delete_ads_btn").click(function(e){
		e.preventDefault();
	
		var reg_exp = /pl[0-9]+_/;
		
		adsId = parseInt($(this).attr("id").match(reg_exp)[0].slice(2, -1));
	
		$("#delete-ad-dialog").dialog("open");
	});
	
	//item custom uploader edit
	

	// video custom uploader

	var custom_uploader;

	var curScroll;


    $("#uploads_video_button, #uploads_video_button_edit").click(function(e){
		

        e.preventDefault();

		curScroll = $("#add-video-dialog").scrollTop();


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader){

            custom_uploader.open();

            return;

        }


        //Extend the wp.media object

        custom_uploader = wp.media.frames.file_frame = wp.media({

            title: "Choose MP4",

            button:{

                text: "Add MP4"

            },

            library:

            {

            	type: "video/mp4"

            },

            multiple: false

        });


        //When a file is selected, grab the URL and set it as the text field's value

        custom_uploader.on("select", function(){

            attachment = custom_uploader.state().get("selection").first().toJSON();
				
			var source = attachment.url;
			

            $("#video_source").val(source);
			$("#video_source_edit").val(source);

        });


        //Open the uploader dialog

        custom_uploader.open();


		custom_uploader.on("close", function(){

            $("#add-video-dialog").scrollTop(curScroll);

        });

    });
	
	

	// video mobile custom uploader


	var custom_uploader2;


	var curScroll2;


    


    $("#uploads_video_button_mobile").click(function(e)


    {


        e.preventDefault();


		


		curScroll2 = $("#add-video-dialog").scrollTop();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader2)


        {


            custom_uploader2.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader2 = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose MP4",


            button:


            {


                text: "Add MP4"


            },


            library:


            {


            	type: "video/mp4"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader2.on("select", function()


        {


            attachment = custom_uploader2.state().get("selection").first().toJSON();


            


            $("#vid_source_mobile").val(attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader2.open();


		


		custom_uploader2.on("close", function()


        {


            $("#add-video-dialog").scrollTop(curScroll2);


        });


    });


	


	// video thumb custom uploader


	var custom_uploader3;


	var curScroll3;


    


    $("#uploads_thumb_button").click(function(e)


    {


        e.preventDefault();


		


		curScroll3 = $("#add-video-dialog").scrollTop();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader3)


        {


            custom_uploader3.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader3 = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose Image",


            button:


            {


                text: "Add Image"


            },


            library:


            {


            	type: "image"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader3.on("select", function()


        {


            attachment = custom_uploader3.state().get("selection").first().toJSON();


            


            $("#vid_thumb").val(attachment.url);


            $("#uploads_thumb").attr("src", attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader3.open();


		


		custom_uploader3.on("close", function()


        {


            $("#add-video-dialog").scrollTop(curScroll3);


        });


    });


	


	// video poster custom uploader


	var custom_uploader4;


	var curScroll4;


    


    $("#uploads_poster_button").click(function(e)


    {


        e.preventDefault();


		


		curScroll4 = $("#add-video-dialog").scrollTop();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader4)


        {


            custom_uploader4.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader4 = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose Image",


            button:


            {


                text: "Add Image"


            },


            library:


            {


            	type: "image"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader4.on("select", function()


        {


            attachment = custom_uploader4.state().get("selection").first().toJSON();


            


            $("#vid_poster").val(attachment.url);


            $("#uploads_poster").attr("src", attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader4.open();


		


		custom_uploader4.on("close", function()


        {


            $("#add-video-dialog").scrollTop(curScroll4);


        });


    });


	


	// video mobile poster custom uploader


	var custom_uploader5;


	var curScroll5;


    


    $("#uploads_poster_button_mobile").click(function(e)


    {


        e.preventDefault();


		


		curScroll5 = $("#add-video-dialog").scrollTop();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader5)


        {


            custom_uploader5.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader5 = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose Image",


            button:


            {


                text: "Add Image"


            },


            library:


            {


            	type: "image"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader5.on("select", function()


        {


            attachment = custom_uploader5.state().get("selection").first().toJSON();


            


            $("#vid_poster_mobile").val(attachment.url);


            $("#uploads_poster_mobile").attr("src", attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader5.open();


		


		custom_uploader5.on("close", function()


        {


            $("#add-video-dialog").scrollTop(curScroll5);


        });


    });


    


	// video mobile custom uploader edit


	var custom_uploader2_edit;


	var curScrollEdit2;


    


   


	// video thumb custom uploader edit


	var custom_uploader3_edit;


	var curScrollEdit3;


    


    $("#uploads_thumb_button_edit").click(function(e)


    {


        e.preventDefault();


		


		curScrollEdit3 = $("#edit-video-dialog").scrollTop();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader3_edit)


        {


            custom_uploader3_edit.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader3_edit = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose Image",


            button:


            {


                text: "Add Image"


            },


            library:


            {


            	type: "image"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader3_edit.on("select", function()


        {


            attachment = custom_uploader3_edit.state().get("selection").first().toJSON();


            


            $("#vid_thumb_edit").val(attachment.url);


            $("#uploads_thumb_edit").attr("src", attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader3_edit.open();


		


		custom_uploader3_edit.on("close", function()


        {


            $("#edit-video-dialog").scrollTop(curScrollEdit3);


        });


    });


	


	// video poster custom uploader edit


	var custom_uploader4_edit;


	var curScrollEdit4;


    


    $("#uploads_poster_button_edit").click(function(e)


    {


        e.preventDefault();


		


		curScrollEdit4 = $("#edit-video-dialog").scrollTop();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader4_edit)


        {


            custom_uploader4_edit.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader4_edit = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose Image",


            button:


            {


                text: "Add Image"


            },


            library:


            {


            	type: "image"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader4_edit.on("select", function()


        {


            attachment = custom_uploader4_edit.state().get("selection").first().toJSON();


            


            $("#vid_poster_edit").val(attachment.url);


            $("#uploads_poster_edit").attr("src", attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader4_edit.open();


		


		custom_uploader4_edit.on("close", function()


        {


            $("#edit-video-dialog").scrollTop(curScrollEdit4);


        });


    });


	


	// video mobile poster custom uploader edit


	var custom_uploader5_edit;


	var curScrollEdit5;


    


    $("#uploads_poster_button_mobile_edit").click(function(e)


    {


        e.preventDefault();


		


		curScrollEdit5 = $("#edit-video-dialog").scrollTop();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader5_edit)


        {


            custom_uploader5_edit.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader5_edit = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose Image",


            button:


            {


                text: "Add Image"


            },


            library:


            {


            	type: "image"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader5_edit.on("select", function()


        {


            attachment = custom_uploader5_edit.state().get("selection").first().toJSON();


            


            $("#vid_poster_mobile_edit").val(attachment.url);


            $("#uploads_poster_mobile_edit").attr("src", attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader5_edit.open();


		


		custom_uploader5_edit.on("close", function()


        {


            $("#edit-video-dialog").scrollTop(curScrollEdit5);


        });


    });


	


	// playlist thumb custom uploader


	var custom_uploader_pl;


    


    $("#uploads_pl_thumb_button").click(function(e)


    {





        e.preventDefault();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader_pl)


        {


            custom_uploader_pl.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader_pl = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose Image",


            button:


            {


                text: "Add Image"


            },


            library:


            {


            	type: "image"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader_pl.on("select", function()


        {


            attachment = custom_uploader_pl.state().get("selection").first().toJSON();


            


            $("#pl_thumb").val(attachment.url);


            $("#uploads_pl_thumb").attr("src", attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader_pl.open();


    });


	


	// playlist thumb custom uploader edit


	var custom_uploader_pl_edit;


    


    $("#uploads_pl_thumb_button_edit").click(function(e)


    {


        e.preventDefault();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader_pl_edit)


        {


            custom_uploader_pl_edit.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader_pl_edit = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose Image",


            button:


            {


                text: "Add Image"


            },


            library:


            {


            	type: "image"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader_pl_edit.on("select", function()


        {


            attachment = custom_uploader_pl_edit.state().get("selection").first().toJSON();


            


            $("#pl_thumb_edit").val(attachment.url);


            $("#uploads_pl_thumb_edit").attr("src", attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader_pl_edit.open();


    });


	


	// ads video custom uploader


	var custom_uploader_ads;


	var curScrollAds;


    


    $("#uploads_ads_video_button").click(function(e)


    {


        e.preventDefault();


		


		curScrollAds = $("#add-video-dialog").scrollTop();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader_ads)


        {


            custom_uploader_ads.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader_ads = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose MP4",


            button:


            {


                text: "Add MP4"


            },


            library:


            {


            	type: "video/mp4"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader_ads.on("select", function()


        {


            attachment = custom_uploader_ads.state().get("selection").first().toJSON();


            


            $("#ads_vid_path").val(attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader_ads.open();


		


		custom_uploader_ads.on("close", function()


        {


            $("#add-video-dialog").scrollTop(curScrollAds);


        });


    });


	


	// ads video custom uploader mobile


	var custom_uploader_ads_mobile;


	var curScrollAdsMobile;


    


    $("#uploads_ads_video_button_mobile").click(function(e)


    {


        e.preventDefault();


		


		curScrollAdsMobile = $("#add-video-dialog").scrollTop();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader_ads_mobile)


        {


            custom_uploader_ads_mobile.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader_ads_mobile = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose MP4",


            button:


            {


                text: "Add MP4"


            },


            library:


            {


            	type: "video/mp4"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader_ads_mobile.on("select", function()


        {


            attachment = custom_uploader_ads_mobile.state().get("selection").first().toJSON();


            


            $("#ads_vid_path_mobile").val(attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader_ads_mobile.open();


		


		custom_uploader_ads_mobile.on("close", function()


        {


            $("#add-video-dialog").scrollTop(curScrollAdsMobile);


        });


    });


	


	// ads video custom uploader edit


	var custom_uploader_ads_edit;


	var curScrollAdsEdit;


    


    $("#uploads_ads_video_button_edit").click(function(e)


    {


        e.preventDefault();


		


		curScrollAdsEdit = $("#edit-video-dialog").scrollTop();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader_ads_edit)


        {


            custom_uploader_ads_edit.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader_ads_edit = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose MP4",


            button:


            {


                text: "Add MP4"


            },


            library:


            {


            	type: "video/mp4"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader_ads_edit.on("select", function()


        {


            attachment = custom_uploader_ads_edit.state().get("selection").first().toJSON();


            


            $("#ads_vid_path_edit").val(attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader_ads_edit.open();


		


		custom_uploader_ads_edit.on("close", function()


        {


            $("#edit-video-dialog").scrollTop(curScrollAdsEdit);


        });


    });


	


	// ads video custom uploader mobile edit


	var custom_uploader_ads_mobile_edit;


	var curScrollAdsMobileEdit;


    


    $("#uploads_ads_video_button_mobile_edit").click(function(e)


    {


        e.preventDefault();


		


		curScrollAdsMobileEdit = $("#edit-video-dialog").scrollTop();


 


        //If the uploader object has already been created, reopen the dialog


        if (custom_uploader_ads_mobile_edit)


        {


            custom_uploader_ads_mobile_edit.open();


            return;


        }


        


        //Extend the wp.media object


        custom_uploader_ads_mobile_edit = wp.media.frames.file_frame = wp.media(


        {


            title: "Choose MP4",


            button:


            {


                text: "Add MP4"


            },


            library:


            {


            	type: "video/mp4"


            },


            multiple: false


        });


 


        //When a file is selected, grab the URL and set it as the text field's value


        custom_uploader_ads_mobile_edit.on("select", function()


        {


            attachment = custom_uploader_ads_mobile_edit.state().get("selection").first().toJSON();


            


            $("#ads_vid_path_mobile_edit").val(attachment.url);


        });


 


        //Open the uploader dialog


        custom_uploader_ads_mobile_edit.open();


		


		custom_uploader_ads_mobile_edit.on("close", function()


        {


            $("#edit-video-dialog").scrollTop(curScrollAdsMobileEdit);


        });


    });


	


		// playlist thumb custom uploader


	var subtitle_uploader_pl;


    


    $("#uploads_subtitle_button, #uploads_subtitle_button_edit").click(function(e){

        e.preventDefault();

        //If the uploader object has already been created, reopen the dialog

        if (subtitle_uploader_pl){

            subtitle_uploader_pl.open();

            return;

        }


        //Extend the wp.media object

        subtitle_uploader_pl = wp.media.frames.file_frame = wp.media({

            title: "Choose subtitle(.txt or .srt format)",

            button:{

                text: "Add subtitle"

            },

            multiple: false

        });




        //When a file is selected, grab the URL and set it as the text field's value

        subtitle_uploader_pl.on("select", function(){

            attachment = subtitle_uploader_pl.state().get("selection").first().toJSON();

            $("#subtitle_source").val(attachment.url);

			$("#subtitle_source_edit").val(attachment.url);

        });


        //Open the uploader dialog
        subtitle_uploader_pl.open();

    });
	
	//item custom uploader edit
	var uploads_image;
	var curScrollEdit;
    
    $("#ads_source_button").click(function(e){
        e.preventDefault();
		
		curScrollEdit = $("#edit-item-dialog").scrollTop();
 
        //If the uploader object has already been created, reopen the dialog
        if (uploads_image){
            uploads_image.open();
            return;
        }
        
        //Extend the wp.media object
        uploads_image = wp.media.frames.file_frame = wp.media(
        {
            title: "Choose mp4 video or image",
            button:
            {
                text: "Add item"
            },library:
            {
            	type: "image, video/mp4"
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        uploads_image.on("select", function(){
            attachment = uploads_image.state().get("selection").first().toJSON();   
            $("#ads_source").val(attachment.url);
        });
 
        //Open the uploader dialog
        uploads_image.open();
		
		uploads_image.on("close", function() {
          //  $("#edit-item-dialog").scrollTop(curScrollEdit);
        });
    });
	
	
	
	//item custom uploader edit
	var uploads_image2;
	var curScrollEdit2;
    
    $("#uploads_source_button_edit, #ads_source_button_edit").click(function(e){
        e.preventDefault();
		
		curScrollEdit = $("#edit-item-dialog").scrollTop();
 
        //If the uploader object has already been created, reopen the dialog
        if (uploads_image2){
            uploads_image2.open();
            return;
        }
        
        //Extend the wp.media object
        uploads_image2 = wp.media.frames.file_frame = wp.media(
        {
            title: "Choose item",
            button:
            {
                text: "Add item"
            },library:
            {
            	type: "image"
            },
            multiple: false
        });
		
        //When a file is selected, grab the URL and set it as the text field's value
        uploads_image2.on("select", function(){
            attachment = uploads_image2.state().get("selection").first().toJSON();  
			$("#ads_source").val(attachment.url);			
            $("#ads_source_edit").val(attachment.url);
			//$("#thumb_source_edit").attr("src", attachment.url);
        });
 
        //Open the uploader dialog
        uploads_image2.open();
		
		uploads_image2.on("close", function() {
            $("#edit-item-dialog").scrollTop(curScrollEdit2);
        });
    });
	
	
	//item custom uploader edit
	var uploads_image2;
	var curScrollEdit2;
    
    $("#popupads_source_button, #popupads_source_button_edit").click(function(e){
        e.preventDefault();
		
		curScrollEdit = $("#edit-item-dialog").scrollTop();
 
        //If the uploader object has already been created, reopen the dialog
        if (uploads_image2){
            uploads_image2.open();
            return;
        }
        
        //Extend the wp.media object
        uploads_image2 = wp.media.frames.file_frame = wp.media(
        {
            title: "Choose item",
            button:
            {
                text: "Add item"
            },library:
            {
            	type: "image"
            },
            multiple: false
        });
		
        //When a file is selected, grab the URL and set it as the text field's value
        uploads_image2.on("select", function(){
            attachment = uploads_image2.state().get("selection").first().toJSON();  
			$("#popupads_source").val(attachment.url);			
            $("#popupads_source_edit").val(attachment.url);
			//$("#thumb_source_edit").attr("src", attachment.url);
        });
 
        //Open the uploader dialog
        uploads_image2.open();
		
		uploads_image2.on("close", function() {
            $("#edit-item-dialog").scrollTop(curScrollEdit2);
        });
    });


    


    $("#update_btn").click(function(){


    	$("#playlist_data").val(JSON.stringify(mainPlaylistsAr));


    });


})




function adjustHeight(element){
	element.style.height = "auto";
	element.style.height = (element.scrollHeight)+"px";
}