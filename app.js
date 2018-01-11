/*jshint esversion: 6*/
/*global document, window, console*/

const stocks = (function() {
  'use strict';

  var modifier, tbody, mesProduit, deleteBtn;


  const deleteProd = function deleteProd() {

    var checkbox = tbody.querySelectorAll(".deleteProduit input:checked");
    console.log(checkbox);
    for (let i = 0; i < checkbox.length; i++) {
      let id = checkbox[i].parentElement.parentElement;
      id = id.firstChild.textContent;

      let fd = new FormData();
      let xhr = new XMLHttpRequest();

     fd.append("action", "delete_prod");
     fd.append("id", JSON.stringify(id));

      xhr.open("POST", "traitement.php");
      xhr.send(fd);

  }
};

  const init = function init() {

    tbody = document.getElementById('tabBody');
    deleteBtn = document.getElementById('delete');
    deleteBtn.onclick = deleteProd;

  };

  window.addEventListener("DOMContentLoaded", init);

}());
