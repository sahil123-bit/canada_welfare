function start(){
    document.getElementById("display").innerHTML ="I would like to introduce you with Canada Welfare Site,<br>"+ ' ' +
    " It sounds similar with a it’s name, but in this <br> people who are living in this country has to put some efforts to improve their country <br>" + 
    " by putting you best ideas in front of government to improve the country.";
   
    }

function home(){ 
    document.getElementById("display").innerHTML = "What are you waiting for ! <br> Just Click on Signup";
}

function learn(){
   
    var info = {
        name: "Sahil Mehar",
        course: "Business Information Technology",
        college: "Red River College",
        Information : function(){
            return this.name + "<br> " + this.course + "<br> " + this.college;
        }
    }
    document.getElementById("display").innerHTML = "The Site is Created by: <br>" +  info.Information();
    
}
