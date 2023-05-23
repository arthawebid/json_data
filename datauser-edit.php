<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>
<body>
<h3>Ubah Data User</h3>
<div id="hasil"></div>
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
        <button type="button" onclick="updatedata()">Update Data User</button>
    </div>
    <input type="hidden" id="txIDUSER">
</form>


<script>
    const xmlhttp = new XMLHttpRequest();
    caridata();

function caridata(){
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const iduser = urlParams.get('id');

  let q = "https://webpro.ptov.my.id/api/curd.php?aksi=get&q="+iduser;
  
  xmlhttp.open("GET",q)
  xmlhttp.send()

  xmlhttp.onload = function(){
    const mydta = JSON.parse(this.responseText)
    console.log(mydta);
    document.getElementById("txNAMA").value = mydta.isi[0][0];
    document.getElementById("txEMAIL").value = mydta.isi[0][1];
    document.getElementById("txUSER").value = mydta.isi[0][2];
    document.getElementById("txIDUSER").value = mydta.isi[0][3];
  }
}
function updatedata(){
    let url = "https://webpro.ptov.my.id/api/curd.php?aksi=update";
    let nama = document.getElementById("txNAMA").value;
    let email = document.getElementById("txEMAIL").value;
    let username = document.getElementById("txUSER").value;
    let pass1 = document.getElementById("txPASS1").value;
    let pass2 = document.getElementById("txPASS2").value;
    let iduser = document.getElementById("txIDUSER").value;
    let params = "iduser="+iduser+"&nama="+nama+"&email="+email+"&username="+username+"&pass1="+pass1+"&pass2="+pass2;
    console.log("Params: "+params);
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.onload = function () {
        // do something to response
        const hasil = JSON.parse(this.responseText)
        if(hasil["error"] != 0){
            document.getElementById("hasil").innerHTML = "Terjadi Masalah saat update data";
        }else{
            document.getElementById("hasil").innerHTML = "Update Data Sukses!!! <a href='datauser.php'>kembali ke List data</a>";
        }
        //
    };
    xmlhttp.send(params);
}
</script>  

</body>
</html>