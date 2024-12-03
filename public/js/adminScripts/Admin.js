$(document).ready(function() {
    var Username;
    var Password;
    var isRegistered = false;
    var arrUser = [];
    var arrPass = [];

    // Define HideLogin function inside $(document).ready() to ensure it is loaded before usage
    window.HideLogin = function() {
        Username = $("#Username").val();
        Password = $("#Password").val();
        for(var i = 0; i < arrUser.length; i++){
            if(arrUser[i] == Username && arrPass[i] == Password){
                isRegistered = true;
            }
        }

        if(!isRegistered){
            alert("PASSWORD DAN USERNAME SALAH!");
        } else {
            alert("Login Berhasil!");
            window.location.href = routes.adminMenu;
        }
    };

    // Loading JSON for login validation
    function loadJSON(){
        $.getJSON('js/adminScripts/Admin.json', function(data){
            for(var i in data["AdminAccount"]){
                arrUser.push(data["AdminAccount"][i]["username"]);
                arrPass.push(data["AdminAccount"][i]["password"]);
            }
        });
    }

    loadJSON();
});
