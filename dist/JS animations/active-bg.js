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

function toggleActiveClassTime() {
  var listItemsTime = document.querySelectorAll('#timeSlotList .time');

  listItemsTime.forEach(function(time) {
    time.addEventListener('click', function() {
      // Toggle the active class for the clicked item
      time.classList.remove('bg-form-fill');
      time.classList.add('bg-time-active');

      // Remove active class from all list items except the clicked item
      listItemsTime.forEach(function(li) {
          if (li !== time) {
            li.classList.remove('bg-time-active');
            li.classList.add('bg-form-fill');
          }
      });
    });
  });
}

toggleActiveClassTime();

  