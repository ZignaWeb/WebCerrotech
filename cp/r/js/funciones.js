// JavaScript Document
$(document).ready(function(){
	$('textarea').autosize();
	$("a.eliminarelemeto, a.btn-delete").click(function(event){
		event.preventDefault();
		if (confirm('This action cannot be undone. Do you want to continue?')) {
			window.location.href = $(this).attr("href");
		}
	});
	$("a.close").click(function(event){
		$(this).parent().fadeOut();
	});
	
	$( ".date" ).datepicker({ dateFormat: "yy-mm-dd" });
	$( ".datetime" ).datetimepicker({ dateFormat: "yy-mm-dd"});
	
});

function richTextualize (selector) {
	$( selector+" .rtfBtn").click(function(event){
		event.preventDefault();
		var textarea = $(selector + " textarea" )[0];
		var tag = $(this).attr("rel");
		if (tag!="clear" && tag!="undefined" && tag!="link") {
			if ('selectionStart' in textarea) {
					// check whether some text is selected in the textarea
				if (textarea.selectionStart != textarea.selectionEnd) {
					var newText = textarea.value.substring (0, textarea.selectionStart) + 
						"<"+tag+">" + textarea.value.substring  (textarea.selectionStart, textarea.selectionEnd) + "</"+tag+">" +
						textarea.value.substring (textarea.selectionEnd);
					textarea.value = newText;
				}
			} else {
				// Internet Explorer before version 9
				// create a range from the current selection
				var textRange = document.selection.createRange();
				// check whether the selection is within the textarea
				var rangeParent = textRange.parentElement ();
				if (rangeParent === textarea) {
					textRange.text = "<"+tag+">" + textRange.text + "</"+tag+">";
				}
				
			}
		}
		
		if (tag=="clear"){
			textarea.value = textarea.value.replace(/(\<([^\>]+)\>)/ig,"");
		}
		
		if (tag=="link"){
			$("#rtf-lnk-prev").text("...");
			
			$("#data-reveal-addlink").fadeIn(function(){
				
				var url, txt, lnk;
				$("input[name=rtf-lnk-url]").val("");
				$("input[name=rtf-lnk-txt]").val("");
			
				$("input[name=rtf-lnk-url], input[name=rtf-lnk-txt]").keyup(function(event){
					url = $("input[name=rtf-lnk-url]").val();
					txt = $("input[name=rtf-lnk-txt]").val();
					lnk = "<a href='"+url+"' target='_blank'>"+txt+"</a>";
					$("#rtf-lnk-prev").text(lnk);
				});
				var it = 0;
				$(".rtf-lnk-add").click(function(event){
					event.preventDefault();
					it++;
					if (it==1){
						if ('selectionStart' in textarea) {
							if (textarea.selectionStart == textarea.selectionEnd) {
								var pre = textarea.value.substring (0, textarea.selectionStart);
								var pos = textarea.value.substring (textarea.selectionStart);
								var newText = pre + lnk + pos;
								textarea.value = newText;
							}
						}
					}
				});
			
			});
			

		}
		
	});	
}

function ajaxizeForm (form) {
	$(form).after('<div id="enviando">Enviando ...</div><div id="mensaje"></div>');
	
	$(form).submit(function(event) {
	  event.preventDefault();
	  $(form).fadeOut(function(){
		  $("#enviando").fadeIn();
		  
		  var url = $(this).attr('action');
		  var datos = $(this).serialize();
		  
		  $.post(url, datos, function(resultado) {
			  
			$('#mensaje').html(resultado);
			
			$("#enviando").fadeOut(function (){
				$("#mensaje").fadeIn();
			});
		  });  
	  });
	});
}