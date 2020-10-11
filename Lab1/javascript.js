function validateForm()
{
    var isValid = true;
    var letters = /^[A-Za-z]/;
    
    if(!document.myForm.name.value.match(letters))
    {
        alert( "Name must be alphabet characters only!" );
        isValid = false;
    }
    
    if( document.myForm.name.value == "" ) {
        alert( "Please provide your First Name!" );
        isValid = false;
    }
    
    if( document.myForm.email.value == "" ) {
        alert( "Please provide your Email!" );
        isValid = false;
    }
    
    var emailID = document.myForm.email.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
    if (atpos < 1 || ( dotpos - atpos < 2 )) {
        alert("Please enter correct email ID")
        document.myForm.email.focus() ;
        isValid = false;
    }
    
    
    var phoneno = /^\d{10}$/;
    var contact1=document.myForm.contact.value;
    if(!contact1.match(letters)) {
      alert('password must be alphabet characters only');
      isValid = false;
    }
    
    if( contact1 == "" || contact1.length != 10 || isNaN(contact1)) {
        alert( "Please provide your valid Contact No.!" );        
        document.myForm.contact.focus() ;        
        isValid = false;
     }
       
    
    if( document.myForm.gender.value == "" ) {
        alert( "Please provide your Gender!" );
        document.myForm.gender.focus() ;
        isValid = false;
    }
    
     if( document.myForm.licenseno.value == "" || document.myForm.licenseno.value.length != 15 ) {
        alert( "Please provide valid License No. !" );
        document.myForm.licenseno.focus() ;
        isValid = false;
    }
    
    if( document.myForm.dob.value == "" ) {
        alert( "Please provide your Date of Birth!" );
        document.myForm.dob.focus() ;
        isValid = false;
    }
    
    var firstpassword=document.myForm.password1.value;  
    var secondpassword=document.myForm.confpassword.value;  
                             
    if(firstpassword !== secondpassword) {  
         alert("password must be same!");
         isValid = false;
    }
    
    if( document.myForm.password1.value == "" || document.myForm.password1.value.length <= 7 ) {
        alert( "Please create a Password which contains atleast 8 characters!" );
        document.myForm.password1.focus() ;
        isValid = false;
    }
                     
    
     if( document.myForm.confpassword.value == ""  ) {
        alert( "Please confirm your Password!" );
        document.myForm.confpassword.focus() ;
        isValid = false;
    }        
           
    
    
}                           
   