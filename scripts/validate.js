
//save bookmark
function saveBookmark(e){
    //get values from form
    var siteName = document.getElementById("siteName").value;
    var siteUrl = document.getElementById("siteUrl").value;

   if(!validateForm(siteName, siteUrl)){
       return false;
   }
 

//form validation
function validateForm(siteName, siteUrl){
    if(!siteName || !siteUrl){
      alert('Please fill in the form');
      return false;
    }
  
    var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
    var regex = new RegExp(expression);
  
    if(!siteUrl.match(regex)){
      alert('Please use a valid URL');
      return false;
    }
  
    return true;
  }


}
