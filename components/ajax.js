    function ready () {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "/cart/count", true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("count").innerHTML = xhttp.responseText;
            }
        }
    }
    document.addEventListener("DOMContentLoaded", ready);
    
    function inCart() {
        var id = this.id;
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "/cart/add/"+id, true);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("count").innerHTML = xhttp.responseText;
            }
        }
    }

