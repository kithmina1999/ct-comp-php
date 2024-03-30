function handleAuth(){
    const SignUpBox = document.getElementById("sign-up")
    const LogInBox = document.getElementById("log-in")

    SignUpBox.classList.toggle("d-none");
    LogInBox.classList.toggle("d-none");
}

function signUp() {
    var fn = document.getElementById("fname");
    var ln = document.getElementById("lname");
    var e = document.getElementById("email");
    var pw = document.getElementById("password");
    var cpw = document.getElementById("cpassword");
    var m = document.getElementById("mobile");
    var g = document.getElementById("gender");

    var f = new FormData();
    f.append("fname", fn.value);
    f.append("lname", ln.value);
    f.append("email", e.value);
    f.append("password", pw.value);
    f.append("cpassword", cpw.value);
    f.append("mobile", m.value);
    f.append("gender", g.value);

    var r = new XMLHttpRequest()

    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if (t == "success") {

                document.getElementById("msg").innerHTML = t;
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";

            } else {

                document.getElementById("msg").innerHTML = t;
                document.getElementById("msgdiv").className = "d-block";

            }
        }
    }
    r.open("POST","signUpProcess.php",true);
    r.send(f);
}

function logIn(){
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rm");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange =()=>{
        if(r.readyState==4 && r.status==200){
            var t = r.responseText;
            if(t=="success"){
                window.location = "home.php";
            }else{
                document.getElementById("msg2").innerHTML = t;
                document.getElementById("msgdiv2").className = "d-block";
            }
        }
    }
    r.open("POST","logInProcess.php",true);
    r.send(f);
}
