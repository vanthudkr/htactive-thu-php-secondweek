function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

//function admin
function openTable(evt, tableName) {
  var i, tablecontent, tablelink;
  tablecontent = document.getElementsByClassName("tablecontent");
  for (i=0; i<tablecontent.length; i++) {
    tablecontent[i].style.display = "none";
  }
  tablelink = document.getElementsByClassName("tablelink");
  for (i=0; i<tablelink.length; i++) {
    tablelink[i].className = tablelink[i].className.replace(" active","");
  }
  document.getElementById(tableName).style.display = "block";
  evt.currentTarget.className += "active";
}

