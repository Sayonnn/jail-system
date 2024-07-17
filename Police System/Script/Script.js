function hide(){
    document.getElementById("Add-Person-Involve").style.display = "none";
}

//function for showing and hiding the add cases panel
$(document).ready(function(){
    $("#addCases").click(function(){
        document.getElementById("Officer-Acc-Container").style.display = "none";
        document.getElementById("Officer-Info-Container").style.display = "none";
        document.getElementById("StatisticsContainer").style.display = "none";
        document.getElementById("Add-Person-Involve").style.display = "none";
        document.getElementById("StatisticsContainer").style.display = "none";
        document.getElementById("StatisticsContainer1").style.display = "none";
        document.getElementById("StatisticsContainer2").style.display = "none";
        document.getElementById("StatisticsContainer3").style.display = "none";


        $("#CaseContainer").fadeIn("slow");
    });
});

//function for showing the add person involve panel
$(document).ready(function(){
    $("#addPersons").click(function(){
        document.getElementById("Officer-Acc-Container").style.display = "none";
        document.getElementById("Officer-Info-Container").style.display = "none";
        document.getElementById("StatisticsContainer").style.display = "none";
        document.getElementById("CaseContainer").style.display = "none";
        document.getElementById("StatisticsContainer").style.display = "none";
        document.getElementById("StatisticsContainer1").style.display = "none";
        document.getElementById("StatisticsContainer2").style.display = "none";
        document.getElementById("StatisticsContainer3").style.display = "none";

        $("#Add-Person-Involve").fadeIn("slow");
    });
});


//function for showing add officer information
$(document).ready(function(){
    $("#addOfficer").click(function(){
        $("#Officer-Info-Container").fadeIn("slow");
        document.getElementById("Officer-Acc-Container").style.display = "none";
        document.getElementById("StatisticsContainer").style.display = "none";
        document.getElementById("CaseContainer").style.display = "none";
        document.getElementById("Add-Person-Involve").style.display = "none";
        document.getElementById("StatisticsContainer").style.display = "none";
        document.getElementById("StatisticsContainer1").style.display = "none";
        document.getElementById("StatisticsContainer2").style.display = "none";
        document.getElementById("StatisticsContainer3").style.display = "none";

    });
});
//function for showing add account panel for officer
$(document).ready(function(){
    $("#addAccount").click(function(){
        document.getElementById("Officer-Info-Container").style.display = "none";
        document.getElementById("StatisticsContainer").style.display = "none";
        document.getElementById("Officer-Acc-Container").style.display = "flex";
        document.getElementById("CaseContainer").style.display = "none";
        document.getElementById("Add-Person-Involve").style.display = "none";
        document.getElementById("StatisticsContainer").style.display = "none";
        document.getElementById("StatisticsContainer1").style.display = "none";
        document.getElementById("StatisticsContainer2").style.display = "none";
        document.getElementById("StatisticsContainer3").style.display = "none";

    });
});

//this function is for showing the fetched datas from officer account tables
$(document).ready(function(){
    $("#viewAccounts").click(function(){
        document.getElementById("Officer-Acc-Container").style.display = "none";
        document.getElementById("Officer-Info-Container").style.display = "none";
        document.getElementById("StatisticsContainer3").style.display = "grid";
        document.getElementById("StatisticsContainer2").style.display = "none";
        document.getElementById("StatisticsContainer1").style.display = "none";
        document.getElementById("StatisticsContainer").style.display = "none";
        document.getElementById("CaseContainer").style.display = "none";
        document.getElementById("Add-Person-Involve").style.display = "none";
        $("#Update-Acc-Container").fadeOut("fast");
        $("#UpdateCaseContainer").fadeOut("fast");
        $("#Update-Person-Involve-Container").fadeOut("fast");
        $("#Update-Officer-Container").fadeOut("fast");

        $(".StatContainer").fadeOut("fast");
        $(".StatContainer1").fadeOut("fast");
        $(".StatContainer2").fadeOut("slow");
        $(".StatContainer3").slideDown("slow");
    });
});
//function for fetching the person involve or person in the role table
$(document).ready(function(){
    $("#viewPersons").click(function(){
        document.getElementById("Officer-Acc-Container").style.display = "none";
        document.getElementById("Officer-Info-Container").style.display = "none";
        document.getElementById("StatisticsContainer2").style.display = "grid";
        document.getElementById("StatisticsContainer1").style.display = "none";
        document.getElementById("StatisticsContainer").style.display = "none";
        document.getElementById("CaseContainer").style.display = "none";
        document.getElementById("Add-Person-Involve").style.display = "none";
        $("#Update-Acc-Container").fadeOut("fast");
        $("#UpdateCaseContainer").fadeOut("fast");
        $("#Update-Person-Involve-Container").fadeOut("fast");
        $("#Update-Officer-Container").fadeOut("fast");

        $(".StatContainer").fadeOut("fast");
        $(".StatContainer1").fadeOut("fast");
        $(".StatContainer2").slideDown("slow");
        $(".StatContainer3").fadeOut("fast");

    });
});
//function for showing and hiding cases
$(document).ready(function(){
    $("#viewCases").click(function(){
        document.getElementById("Officer-Acc-Container").style.display = "none";
        document.getElementById("Officer-Info-Container").style.display = "none";
        document.getElementById("StatisticsContainer1").style.display = "grid";
        document.getElementById("StatisticsContainer").style.display = "none";
        document.getElementById("CaseContainer").style.display = "none";
        document.getElementById("Add-Person-Involve").style.display = "none";
        document.getElementById("StatisticsContainer2").style.display = "none";
        $("#Update-Acc-Container").fadeOut("fast");
        $("#UpdateCaseContainer").fadeOut("fast");
        $("#Update-Person-Involve-Container").fadeOut("fast");
        $("#Update-Officer-Container").fadeOut("fast");

        $(".StatContainer").fadeOut("fast");
        $(".StatContainer1").slideDown("slow");
        $(".StatContainer2").fadeOut("fast");
        $(".StatContainer3").fadeOut("fast");
    });
});
//document.getElementById("StatisticsContainer").style.display = "none";
//document.getElementById("StatisticsContainer1").style.display = "none";
//document.getElementById("StatisticsContainer2").style.display = "none";
//document.getElementById("StatisticsContainer3").style.display = "none";
//$("#Update-Acc-Container").slideDown("fast");
//$("#UpdateCaseContainer").slideDown("fast");
//$("#Update-Person-Involve-Container").slideDown("fast");
//$("#Update-Officer-Container").slideDown("fast");
//$(".StatContainer").fadeOut("fast");
//$(".StatContainer1").fadeOut("fast");
// $(".StatContainer2").fadeOut("fast");
// $(".StatContainer3").fadeOut("fast");



//function for showing and hiding officer informations
$(document).ready(function(){
    $("#viewOfficers").click(function(){
        document.getElementById("Officer-Acc-Container").style.display = "none";
        document.getElementById("Officer-Info-Container").style.display = "none";
        document.getElementById("StatisticsContainer").style.display = "grid";
        document.getElementById("StatisticsContainer1").style.display = "none";
        document.getElementById("CaseContainer").style.display = "none";
        document.getElementById("Add-Person-Involve").style.display = "none";
        document.getElementById("StatisticsContainer2").style.display = "none";
        $("#Update-Acc-Container").fadeOut("fast");
        $("#UpdateCaseContainer").fadeOut("fast");
        $("#Update-Person-Involve-Container").fadeOut("fast");
        $("#Update-Officer-Container").fadeOut("fast");

        $(".StatContainer3").fadeOut("fast");
        $(".StatContainer2").fadeOut("fast");
        $(".StatContainer1").fadeOut("fast");
        $(".StatContainer").slideDown("slow");
    });
});

//function for showing proof
$(document).ready(function(){
    $("#AddProof").click(function(){
        $("#addCaseProof").slideToggle("slow");
    });
});

//function for hiding proof
$(document).ready(function(){
    $("#HideProof").click(function(){
        $("#addCaseProof").slideToggle("slow");
    });
});