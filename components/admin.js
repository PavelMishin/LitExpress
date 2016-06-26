var show = document.querySelectorAll(".show");
    block = document.querySelectorAll(".hidden");
    close = document.querySelectorAll(".close");
    stat = document.querySelectorAll(".status");
    
for (i = 0; i < show.length; i++) {
    show[i].addEventListener("click", function(event) {
        event.preventDefault();
        for (j = 0; j < show.length; j++) {
            if (this.id == "btn-" + block[j].id) {
                block[j].classList.toggle("display");
            }
        }
    });
    
    close[i].addEventListener("click", function(event) {
        event.preventDefault();
        for (j = 0; j < show.length; j++) {
            if (this.id == "close-" + block[j].id) {
                block[j].classList.remove("display");
            }
        }
    });
    
    stat[i].addEventListener("change", function() {
        var id = this.id.substr(7);
            val = this.value;
            xhttp = new XMLHttpRequest();
        xhttp.open("POST", "/admin/changeOrderStatus/" + id + "/" + val, true);
        xhttp.send();
    });
}


