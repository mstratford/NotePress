$(document).ready(function(){
          $(".save").hide();
     $(".id").hide();
    $("p").bind("click",function(){
            $(this).parent().parent().parent().find(".save").show("slow");
        var p = $(this);
        var hey = p.text();
        
        p.hide();
        
        $('<textarea cols="34">'+hey+' </textarea>').appendTo(p.parent()).autogrow().focus().blur(function(){
	        var textarea = $(this);
	        p.text(textarea.val())
			textarea.remove();
			p.show();
		});
     });

     
     
     	$(".add a").bind("click", function(){
		
		$(".full:first-child").clone().find("p").text("Note it up!").end().prependTo("#notes");
		
		
	});

$(".save").bind("click", function(){
  var parent = $(this).parent();
  var p = $(parent).find("p");
        var note = p.text();
  var title = $(parent).find(".id").text();
        
        $.ajax({
   type: "POST",
   url: "post.php",
   data: "note="+note+"&id="+title,
   success: function(msg){
$('.l-1').fadeOut("slow");
   $('.l-1').fadeIn("slow", function(){
         $('.l-1').text(msg);
   });
      }
 });
 
 });
 
 $(".new").bind("click", function(){
  var p = $(this).parent().find("p");
        var note = p.text(); 
     
        $.ajax({
   type: "POST",
   url: "post.php",
   data: "note="+note,
   success: function(msg){
$('.l-1').fadeOut("slow");
   $('.l-1').fadeIn("slow", function(){
         $('.l-1').text(msg);
   });
   
   }
 });
 
 });
});

