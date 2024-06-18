function searchData(){
    var searchContent = document.getElementById('searchContent').value;
    // var searchStatus = document.getElementById('searchStatus').value;
    var searchStatus = "";
    var searchDate = document.getElementById('searchDate').value;
    // alert(searchContent+" "+searchStatus+" "+searchDate);

    var url = '/superadmin/reportSale?search=' + searchContent + '&status=' + searchStatus + '&date=' + searchDate;
      // Redirect to the URL
      window.location.href = url;
}

function printData(){
  var searchContent = document.getElementById('searchContent').value;
  // var searchStatus = document.getElementById('searchStatus').value;
  var searchStatus = "";
  var searchDate = document.getElementById('searchDate').value;
  // alert(searchContent+" "+searchStatus+" "+searchDate);

   var url = '/superadmin/printSale?search=' + searchContent + '&status=' + searchStatus + '&date=' + searchDate;
  
  // var url = '/trainer/printSale';
    // Redirect to the URL
    window.location.href = url;
}

function resetData(){
    var searchContent = "";
    var searchStatus = "";
    var searchDate = "";
    // alert(searchContent+" "+searchStatus+" "+searchDate);

    var url = '/superadmin/reportSale?search=' + searchContent + '&status=' + searchStatus + '&date=' + searchDate;
      // Redirect to the URL
      window.location.href = url;
}