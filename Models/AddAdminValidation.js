
	function get(id) { return document.getElementById(id); }
	
	function validate()
	{
		//debugger;
		cleanUP();
		var hasError=false ;
		if(get("name").value=="")
		{
			get("err_name").innerHTML="*Name required ";
			get("err_name").style.color="red";
			hasError=true;
		}
		else if(get("name").value.length<2)
		{
			get("err_name").innerHTML="*Name should be more than one characters**";
			get("err_name").style.color="red";
			hasError=true;
		}
		
		
		if(get("email").value=="")
		{
			get("err_email").innerHTML="*Email required";
			get("err_email").style.color="red";
			hasError=true;
		}
		
		if(get("pass").value=="")
		{
			get("err_password").innerHTML="*Password required";
			get("err_password").style.color="red";
			hasError=true;
		}
		else if(get("pass").value.length <8)
		{
			get("err_password").innerHTML="*Password should contain at least 8 characters**";
			get("err_password").style.color="red";
			hasError=true;
		}
		
		 if(get("pass").value !=get("cpass").value)
		{
			get("err_cpassword").innerHTML="*Password does not match";
			get("err_cpassword").style.color="red";
			hasError=true;
		}
		
		if(get("number").value=="")
		{
			get("err_phone").innerHTML="*Phone number required";
			get("err_phone").style.color="red";
			hasError=true;
		}
		
		
		if(get("address").value=="")
		{
			get("err_address").innerHTML="*Address required";
			get("err_address").style.color="red";
			hasError=true;
		}
		
		if(!hasError)
		{
			return true;
		}
		return false;
	}
	
	function updateAdminValidate()
	{
		//debugger;
		cleanUP();
		var hasError=false ;
		if(get("name").value=="")
		{
			get("err_name").innerHTML="*Name required ";
			get("err_name").style.color="red";
			hasError=true;
		}
		else if(get("name").value.length<2)
		{
			get("err_name").innerHTML="*Name should be more than one characters**";
			get("err_name").style.color="red";
			hasError=true;
		}
		
		
		if(get("email").value=="")
		{
			get("err_email").innerHTML="*Email required";
			get("err_email").style.color="red";
			hasError=true;
		}
		
		if(get("number").value=="")
		{
			get("err_phone").innerHTML="*Phone number required";
			get("err_phone").style.color="red";
			hasError=true;
		}
		
		
		if(get("address").value=="")
		{
			get("err_address").innerHTML="*Address required";
			get("err_address").style.color="red";
			hasError=true;
		}
		
		if(!hasError)
		{
			return true;
		}
		return false;
	}
	
	function cleanUP()
	{
		get("err_name").innerHTML="";
		get("err_email").innerHTML="";
		get("err_phone").innerHTML="";
		get("err_address").innerHTML="";
	}
	
	function checkEmail(control){
		var email=control.value;
		
		var xhttp=new XMLHttpRequest();
		xhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				var rsp = this.responseText;
				if(rsp == "true"){
					document.getElementById("err_email").innerHTML="Valid Email";
					document.getElementById("err_email").style.color="green";
				}
				else{
					document.getElementById("err_email").innerHTML="<br> *Already have an account with this email";
					document.getElementById("err_email").style.color="red";
				}
			}
		};
		xhttp.open("GET","checkEmail.php?email="+email,true);
		xhttp.send();
		
		
	}
	
		
