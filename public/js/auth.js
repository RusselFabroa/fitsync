function mop_change(){
    var mop = document.getElementById("membership_mop").value;
    var gcash = document.getElementById("gcash_logo");
    var bpi = document.getElementById("bpi_logo");
    var receipt = document.getElementById("payment_receipt2");
    var alert2 = document.getElementById("payment_alert");


    if(mop == 'gcash'){
        gcash.style.display = 'block';
        receipt.style.display = 'block';
        alert2.style.display = 'block';
        bpi.style.display = 'none';
    }
    else if(mop == 'bpi'){
        bpi.style.display = 'block';
        gcash.style.display = 'none';
        receipt.style.display = 'block';
        alert2.style.display = 'block';
    }
    else{
        gcash.style.display = 'none';
        receipt.style.display = 'none';
        bpi.style.display = 'none';
        alert2.style.display = 'none';
    }
    // alert(mop);
}