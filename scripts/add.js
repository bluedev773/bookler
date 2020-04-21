
document.getElementById("addForm").addEventListener("submit",saveBookmark);
//save bookmark
function saveBookmark(e){
    //get values from form
    var siteName = document.getElementById("siteName").value;
    var siteUrl = document.getElementById("siteUrl").value;

   if(!validateForm(siteName, siteUrl)){
       return false;
   }
    //create bookmark object
    var bookmark = {
        name: siteName,
        url: siteUrl
    }

    //save to local storage
    //TODO: save to database instead of localstorage

    // localStorage.setItem('test', 'hello world');
    // console.log(localStorage.getItem('test'));
    // localStorage.removeItem('test');
    if(localStorage.getItem('bookmarks') === null){
        var bookmarks= [];
        //add bookmark to bookmarks array
        bookmarks.push(bookmark);
        //write to local storage
        localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
    } else {
        var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));
        //add bookmark to array
        bookmarks.push(bookmark);
        //set back to local storage
        localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
    }

    //reset form
    document.getElementById('addForm').reset();
     // Re-fetch bookmarks
    fetchBookmarks();

    //keep form from submitting
    e.preventDefault();
}

//fetch bookmarks
function fetchBookmarks(){
    var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));
    console.log(bookmarks);

    var bookmarksResults = document.getElementById('bookmarksResults');
    bookmarksResults.innerHTML = '';
    for(var i = 0;i<bookmarks.length;i++){
        var name = bookmarks[i].name;
        var url = bookmarks[i].url;
        bookmarksResults.innerHTML += '<div class = "box" onclick= "window.open(\''+addhttp(url)+'\',\'_blank\')" >'+
                                        '<h3>'+name+ '</h3>' +
                                        ' <a onclick="deleteBookmark(\''+url+'\'); event.stopPropagation();"  href="#"><i class="fas fa-trash-alt"></i></a> ' +
                                        '</div>';
    }
}


function deleteBookmark(url){
  // Get bookmarks from localStorage
  var bookmarks = JSON.parse(localStorage.getItem('bookmarks'));
  // Loop through the bookmarks
  for(var i =0;i < bookmarks.length;i++){
    if(bookmarks[i].url == url){
      // Remove from array
      bookmarks.splice(i, 1);
    }
  }
  // Re-set back to localStorage
  localStorage.setItem('bookmarks', JSON.stringify(bookmarks));

  // Re-fetch bookmarks
  fetchBookmarks();
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

  function addhttp(url) {
    if (!/^(?:f|ht)tps?\:\/\//.test(url)) {
        url = "http://" + url;
    }
    return url;
  }
