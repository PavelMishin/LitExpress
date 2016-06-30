var btnComment = document.getElementById("send");
    btnBuy = document.querySelectorAll(".buy-btn");

if (window.btnComment != undefined) {
        btnComment.addEventListener("click", function(event) {
        event.preventDefault();
        sendComment();
    });
}


for (i = 0; i < btnBuy.length; i++) {
    btnBuy[i].addEventListener("click", function(event) {
        event.preventDefault();
        inCart.call(this);
    });
}

function inCart() {
        var id = this.id;
            count = document.getElementById("count");
            xhttp = new XMLHttpRequest();
            
        xhttp.open("POST", "/cart/add/"+id, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                    count.innerHTML = xhttp.responseText;
            }
        }
    }
    
function sendComment() {
    var bookId = document.querySelector(".buy-btn").id;
        userId = document.querySelector(".user-id").id;
        comment = document.querySelector("#comment");
        comments = document.querySelector(".comments");
        xhttp = new XMLHttpRequest();

    if (comment.value.replace(/\s+/g, '') != '') {
        var text = encodeURIComponent(comment.value);
        xhttp.open("POST", "/catalog/comment/" + bookId + "/" + userId, true);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhttp.send('comment=' + text);
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                comment.value = '';
                comments.innerHTML = xhttp.responseText;
            }
        }
    } else {
        var text = document.createTextNode('Введите текст комментария!');
            newspan = document.createElement("span");
            parent = document.getElementById("new-comment");
            newspan.appendChild(text);
            parent.appendChild(newspan);
            setTimeout(function(){parent.removeChild(newspan)}, 10000);
    }
}

