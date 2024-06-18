function searchData(){
    var Class = document.getElementById('searchClasses').value;
    // var searchStatus = document.getElementById('searchStatus').value;
    var Status = "";
    var Date = document.getElementById('searchDate').value;
    // alert(searchContent+" "+searchStatus+" "+searchDate);

    var url = '/trainer/trainer-dashboard?classId=' + Class + '&date=' + Date;
      // Redirect to the URL
      window.location.href = url;

    // alert("Class is "+Class+" and Date is "+Date);
}

function printData2(){
  var Class = document.getElementById('searchClasses').value;
  // var searchStatus = document.getElementById('searchStatus').value;
  var Status = "";
  var Date = document.getElementById('searchDate').value;
  // alert(searchContent+" "+searchStatus+" "+searchDate);


  var url = '/trainer/trainer-dashboardPrint?classId=' + Class + '&date=' + Date;
  
  // var url = '/trainer/printSale';
    // Redirect to the URL
    window.location.href = url;
}

function resetData(){
    var searchContent = "";
    var searchStatus = "";
    var searchDate = "";
    // alert(searchContent+" "+searchStatus+" "+searchDate);

    var url = '/trainer/trainer-dashboardPrint';
      // Redirect to the URL
      window.location.href = url;
}