var course_name = new Array();
var grades = new Array();
var hours = new Array();


var val = document.getElementById("course_string");
var add_bttn = document.getElementById("bttn_add");
var cal_bttn = document.getElementById("bttn_cal");
var clearAll_bttn = document.getElementById("bttn_clearAll");
var list = document.getElementById("list");
var result = document.getElementById("result");

add_bttn.addEventListener("click", add);
cal_bttn.addEventListener("click", calculate);
clearAll_bttn.addEventListener("click", clearAll);

function add() {

    var input = val.value;
    var s = input.split(" ");
    if (input === "") {
        alert("You have not entered in anything!");
    } else if (s.length > 3 || s.length < 3) {
        alert("You have enter invalid data!")
    } else {
        course_name.push(s[0]);
        grades.push(s[1]);
        hours.push(parseInt(s[2]));

        // alert_mess = "You have enter:\nCourse: " + s[0] + " ; Grade: " + s[1] + " ; Hours: " + parseInt(s[2]);
        // alert(alert_mess);

        var str = "<pre>" + s[0] + "        " + s[1] + "            " + parseInt(s[2]) + "<pre/><br/>";
        list.innerHTML += str;
    }
    val.value = "";
    result.innerHTML = "";
}

function calculate() {

    var grade = "";
    var point = 0;
    var total_point = 0;
    var total_hour = 0;
    var gpa = 0;
    for (x = 0; x < grades.length; x++) {
        grade = grades[x];
        switch (grade) {
            case "A+":
            case "A":
                point = 4;
                break;
            case "B+":
                point = 3.5;
                break;
            case "B":
                point = 3;
                break;
            case "C+":
                point = 2.5;
                break;
            case "C":
                point = 2;
                break;
            case "D":
                point = 1;
                break;
            case "F":
            case "AF":
            case "WF":
                point = 0;
        }
        point = point * hours[x];
        total_hour += hours[x];
        total_point += point;

    }
    gpa = total_point / total_hour;

    result.innerHTML = "<h4>" + "Total grade points = " + total_point + "<h4/>";
    result.innerHTML += "<h4>" + "Number of hours = " + total_hour + "<h4/>";
    result.innerHTML += "<h4>" + "GPA = " + gpa.toFixed(2) + "<h4/>";

}

function clearAll() {
    if (result.value != "") {
        result.innerHTML = "";
    }
    if (list.value != "") {
        list.innerHTML = "";
    }
    val.value = "";
}