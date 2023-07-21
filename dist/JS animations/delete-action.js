function removeElement(id) {
  // Removes an element from the document
  var element = document.getElementById(id);
  element.parentNode.removeChild(element);
}
