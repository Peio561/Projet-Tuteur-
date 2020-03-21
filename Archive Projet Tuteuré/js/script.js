/**********  Variables globales *************************/
var jjeu="";
var ppseudo="";
var role="";
var max="";
var cotes="";
var tempo="";
/**********  Fonction au chargement de la page *************************/

$(document).ready(function() { 

    jjeu=$(".page").attr("name");
    ppseudo=$(".bandeau").attr("name"); 
    role=$(".bandeau").attr("name"); 
    cotes=document.getElementsByClassName("inline cote");


    $.ajax({
        url : './models/ajax.php' ,
        type : 'POST',
        data : {
            function : "get_max",            
        },
        success : function(retour) {
            max = retour;
        }
    });


    setInterval(function(){
        for (var i = 0; i < cotes.length; i++) {
            tempo=cotes[i];
            $.ajax({
                url : './models/ajax.php',
                type: 'POST',
                data : {
                    function: "get_cote",
                    infos: cotes[i].getAttribute("name")
                },
                success: function(retour){
                    tempo.innerHTML=retour;
                }
            });

        }
    },10000); 


    setInterval(function(){
		$.ajax({
            url : './models/ajax.php',
			type: 'POST',
            data : {
                function: "get_messages",
                id: max,
                jeu : jjeu
            },
            success: function(retour){
                var content ="";	
                $(".ecran").empty();
                for(var i = 0; i<JSON.parse(retour).length ; i++) {
                    content+= "<div class='div_message'> <p class='message'>"+JSON.parse(retour)[i].texte+"</p><p class='auteur'>"+JSON.parse(retour)[i].pseudo+"</p></div>";
                }		
                $(".ecran").append(content);
            }
        });
	},500);




    $(".parier").click(function(){
        console.log($(this).attr("name"))
        $.ajax({
            url : './models/ajax.php' ,
            type : 'POST',
            data : {
                function : "parier",
                infos : $(this).attr("name"),
            },
            success : function(retour) {
                alert("Pari ajouté");
                $(retour+"1").disabled=true;
                $(retour+"2").disabled=true;
                window.location.reload(true);
            }
        });
    });

    $("#envoyer").click(function(){
	if($("#textArea").val()!=""){
       	 $.ajax({
          	  url : './models/ajax.php',
          	  type : 'POST',
          	  data : {
          	      function : "ajout_message",
          	      message : $("#textArea").val(),
          	      pseudo : ppseudo,
          	      jeu : jjeu,
           	 }
       	 });
       	 document.getElementById("textArea").value="";
   	}
    });

	document.body.addEventListener( 'keyup', function (e) {
 	 if ( e.keyCode == 13 ) {
		$("#envoyer").click();
 	 }
	});


    $("#recherche").click(function(){
        $.ajax({
            url : './models/ajax.php',
            type : 'POST',
            data : {
                function : "classement",
                recherche : $("#filtre").val(),
                role_rech : role
            },
            success : function(retour){
                $("#classement").empty();
                $("#classement").append(retour);
            }
        });
    });
});
