 



function spinner_loading() {

    $.post({
        url: "blog.php",
        data: {
        title : $("#title").val(),
        content : $("#content").val()
        },
        success: function(article) {
           var template= $("#div-card2").clone();

            
            $("#card-title1").html(article.titledB);
            console.log(article);
            $("#card-text1").html(article.contentdB);
            $("div-card2").attr("id","");

        template.appendTo("#div-card1");
        console.log(article);
        },
        dataType: "json"
        }
        )

};       

// function clone_card () {
//     $("#main-card").clone().insertAfter("#main-card:last");

// }

// $(document).ready(function(){
//     $("button").click(function(){
//       $("#div-card2").clone().appendTo("#div-card1");
//     });
//   });


 