

//*! ------------CREATE------------ */

function createArticle() {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {

       if (xhr.readyState == 4 && xhr.status == 200) {
            // alert("alert");

        var child = document.createElement ("p");
            child.innerHTML = document.getElementById("title").value + "--" + document.getElementById("content").value;

            //* Attempt to retrieve to display button and retriving ID
            // + '<button onclick="readArticle("'+ art + '")">Read</button>' + '<button onclick="deleteArticle("'+ id + '")">Delete</button>';
            
        var parent = document.getElementById ("parentNewArticle");
            parent.appendChild(child);
        }
    };

xhr.open('POST','./controllers/create_article.php');

var	data = new	FormData();
data.append('title1', document.getElementById('title').value);
data.append('content1', document.getElementById('content').value);

xhr.send(data);  
 
}

//*! ------------READ------------ */

function readArticle($identity) {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {

// Start server response 
       if (xhr.readyState == 4 && xhr.status == 200) {

        var art = JSON.parse(xhr.responseText);
        document.getElementById("id_article").value = art.id;
        document.getElementById("title").value = art.titledB;
        document.getElementById("content").value = art.contentdB;
        }
// End server response         
    };

xhr.open('POST','./controllers/read_article.php');

var data = new FormData();
data.append('id', $identity);

xhr.send(data);
}


//*! ------------UPDATE------------ */

function updateArticle() {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {

       if (xhr.readyState == 4 && xhr.status == 200) {

//START Ajax part to update without refreshing 

       var art = JSON.parse(xhr.responseText);
       var id = art.id;
       var title = art.titledB;
       var content = art.contentdB;

       var zzz = document.getElementById("article_"+id);
       zzz.innerHTML = title + " " + content + " " + '<button onclick="readArticle("'+ art + '")">Read</button>' + '<button onclick="deleteArticle("'+ id + '")">Delete</button>';

    //    zzz.innerHTML = zzz.innerHTML+"<button onclick='readArticle()>Read</button>(article_"+id+")'>";
    //    zzz.innerHTML += "(article_"+id+")";

       zzz.setAttribute("id","article_"+id);

//END Ajax part to update without refreshing 

    }
};

xhr.open('POST', './controllers/update_article.php');

// first pass to server

var data = new FormData();
data.append('id', document.getElementById("id_article").value);
data.append('title1', document.getElementById("title").value);
data.append('content1', document.getElementById("content").value);

xhr.send(data);
}

//*! ---- Function for DELETE --------------*/

function deleteArticle(id) {

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {


            var parent = document.getElementById("parentNewArticle");
            var noeud_article = document.getElementById("article_"+id);
      
            parent.removeChild(noeud_article);
          }
    };

xhr.open('POST', './controllers/delete_article.php');

var data = new FormData();
data.append('id1', id);

xhr.send(data);

}