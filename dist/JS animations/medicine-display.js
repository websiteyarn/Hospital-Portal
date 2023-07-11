function getName() {
    var listItems = document.querySelectorAll('#medicationList div');
    listItems.forEach(function(div) {
      div.addEventListener('click', function() {
        divName = div.getAttribute('name');
        var value = divName;  // JavaScript variable value
        document.cookie = "name=" + encodeURIComponent(value);  // Set the cookie 
        location.reload();
    });
  
  });
  }
  getName(); 