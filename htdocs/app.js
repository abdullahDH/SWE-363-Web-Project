function add() {
    var increase = document.getElementById("NumberOfBurgers").innerHTML
    increase++;
    document.getElementById("NumberOfBurgers").innerHTML = increase;
}

function sub() {
    var decrease = document.getElementById("NumberOfBurgers").innerHTML
    if (decrease > 1) {
        decrease--;
        document.getElementById("NumberOfBurgers").innerHTML = decrease;
    }
}




function showRev() {

    console.log("InUnhideReview");
    var x = document.querySelector("#revHide");
    if (x.style.display === "none") {
        x.style.display = "block";
        x.classList.add("reviewSectionAnimation");
    } else {
        x.style.display = "none";
    }


}


function wordCount(val) {
    var wom = val.match(/\S+/g);
    return {
        charactersNoSpaces: val.replace(/\s+/g, '').length,
        words: wom ? wom.length : 0,
        lines: val.split(/\r*\n/).length
    };
}


var textarea = document.getElementById("Review");
var result = document.getElementById("result");
var cysname = document.getElementById("cusname")


textarea.addEventListener("input", function () {
    var v = wordCount(this.value);
    result.innerHTML = (
        "" + v.charactersNoSpaces + "/500"

    );
}, false);


function valida() {
    if (textarea.value.length < 1) {
        document.getElementById("err").style.display = "block";
    }
    if (cusname.value.length < 1) {
        cusname.value = 'customer';
    }
}
function showReview(id){
    let ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function (){

        if (this.readyState == 4 && this.status == 200){

            var obj = JSON.parse(this.responseText);
            alert("Hello! I am an alert box!!");
            if (obj.length>0){
                for (var i = 0; i<obj.length; i++){
                    var Rname = obj[i]['reviewer_name'];
                    var City = obj[i]['city'];
                    var rating = obj[i]['rating'];
                    var image = obj[i]['image'];
                    var review = obj[i]['review'];
                    var id = obj[i]['id'];
                    alert("Hello! I am an alert box!!");
                    $("#rev").append(
                    '<div>'+
                        '<img src="reviewImages/'+image+'" alt="">'
                        + '<p>'+Rname+  '</p>'
                    );

                }
            }
        }
    }
    ajax.open("GET", "Review.php?id=" + id,true)
    ajax.send()
}
