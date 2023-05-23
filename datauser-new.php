<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>
<body>
<h3>Tambah Data User</h3>
<form>
    <div>
        Nama Lengkap
        <input type="text" id="txNAMA">
    </div>
    <div>
        Email
        <input type="email" id="txEMAIL">
    </div>
    <div>
        User Name
        <input type="text" id="txUSER">
    </div>
    <div>
        Password
        <input type="text" id="txPASS1">
    </div>
    <div>
        Verifikasi Password
        <input type="text" id="txPASS2">
    </div>
    <div>
        <button type="button" onclick="storedata()">Tambah Data User</button>
    </div>
</form>

<div id="konten2"></div>
<script>

function storedata(){
    let url = "https://webpro.ptov.my.id/api/curd.php?aksi=store";
    let nama = document.getElementById("txNAMA").value;
    let email = document.getElementById("txEMAIL").value;
    let username = document.getElementById("txUSER").value;
    let pass1 = document.getElementById("txPASS1").value;
    let pass2 = document.getElementById("txPASS2").value;
    let params = "nama="+nama+"&email="+email+"&username="+username+"&pass1="+pass1+"&pass2="+pass2;

    console.log("cvd: "+params);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.onload = function () {
        // do something to response
        console.log(this.responseText);
    };
    xmlhttp.send(params);
}
</script>  

</body>
</html>