function toggleActiveClass() {
    var listItems = document.querySelectorAll('#medicationList .item');

    listItems.forEach(function(item) {
      item.addEventListener('click', function() {
        // Toggle the active class for the clicked item
        item.classList.remove('bg-background-inactive');
        item.classList.add('bg-white');

        // Remove active class from all list items except the clicked item
        listItems.forEach(function(li) {
            if (li !== item) {
              li.classList.remove('bg-white');
              li.classList.add('bg-background-inactive');
            }
        });
      });
    });
}
  
toggleActiveClass();
  