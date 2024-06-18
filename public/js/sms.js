function SelectReceiver(receiverName, receiverNumber){
    console.log('Name: '+receiverName+" Number: "+receiverNumber);
    document.getElementById('receiverName').value = receiverName;
    document.getElementById('receiverNumber').value = receiverNumber;

    // reminder =  document.getElementById('reminderType').value;
   
    // document.getElementById('reminderMessage').value = "Hello "+receiverName+", "+reminder;
   
    // document.getElementById('reminderMessage').value = reminder;
}


function selectReminder(){
    var reminder =  document.getElementById('reminderType').value;
    var receiverName = document.getElementById('receiverName').value;
    // document.getElementById('reminderMessage').value = "Hello "+receiverName+", "+reminder;
   
    document.getElementById('reminderMessage').value = "Hello "+receiverName+"! "+reminder;

}