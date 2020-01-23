/*

var frm =document.getElementById("sub");
var frm=addEventListener("click", function(){

    var fn = document.forms["myForm"]["firstname"].value;
    var mn = document.forms["myForm"]["middlename"].value;
    var ln = document.forms["myForm"]["lastname"].value;
    var cl = document.forms["myForm"]["class"].value;
    var sx = document.forms["myForm"]["sex"].value;
    var nic = document.forms["myForm"]["no_in_lass"].value;

    var ag = document.forms["myForm"]["age"].value;
    var tm = document.forms["myForm"]["term"].value;
    var po = document.forms["myForm"]["position"].value;
    var aa = document.forms["myForm"]["average_age"].value;
    var tso = document.forms["myForm"]["times_sch_opened"].value;

    var ta = document.forms["myForm"]["times_absent"].value;
    var lp = document.forms["myForm"]["lposition"].value;
    var la = document.forms["myForm"]["laverage"].value;
    var perf = document.forms["myForm"]["performance"].value;
    var beh = document.forms["myForm"]["behaviour"].value;

    var nea = document.forms["myForm"]["neatness"].value;
    var tn = document.forms["myForm"]["teach_name"].value;
    var ts = document.forms["myForm"]["teach_sign"].value;
    var td = document.forms["myForm"]["teach_date"].value;
    var ntb = document.forms["myForm"]["n_termbegin"].value;

    var prs = document.forms["myForm"]["n_termfee"].value;
    var prd = document.forms["myForm"]["fee_owing"].value;
    var pr = document.forms["myForm"]["principal"].value;
    var prs = document.forms["myForm"]["pricipal_sign"].value;
    var prd = document.forms["myForm"]["principal_date"].value;

    var pas = document.forms["myForm"]["parent_sign"].value;
    var pad = document.forms["myForm"]["parent_date"].value;

    var obj ={
        "firstname":fn, 
        "middlename":mn, 
        "lastname":ln, 
        "class":cl , 
        "sex":sx , 
        "no_in_class":nic , 
        "term":tm,
        "position":po, 
        "average_age":aa, 
        "age":ag, 
        "times_sch_opened":tso , 
        "times_absent":ta, 
        "lposition":lp,
        "laverage":la, 
        "performance":perf, 
        "behaviour":beh , 
        "neatness":nea, 
        "teach_name": tn, 
        "teach_sign":ts, 
        "teach_date":td ,
        "n_termbegin":ntb, 
        "n_termfee":ntf , 
        "fee_owing":feo , 
        "principal":pr , 
        "principal_sign":prs,
        "principal_date":prd, 
        "parent_sign":pas, 
        "parent_date":pad
    };
    
    document.getElementById("input").innerHTML="  Sending data... Please wait.";

    var dbParam = JSON.stringify(obj);

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange=function(){

    if (this.readyState==4 && this.status==200) {

    myObj = JSON.parse(this.responseText);
    for (x in myObj) {
        txt += myObj[x].result + "<br>";
    }

    document.getElementById("belowsubmit").innerHTML = txt;
    
  };


  xHttp.open("POST", "insert.php?", true);
  xHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("x=" + dbParam);


}

});
*/