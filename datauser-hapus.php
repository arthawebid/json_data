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
        <input type="text" id="txNAMA" disabled>
    </div>
    <div>
        Email
        <input type="email" id="txEMAIL" disabled>
    </div>
    <div>
        User Name
        <input type="text" id="txUSER" disabled>
    </div>
    <div>
        <button type="button" onclick="deletedata()">Hapus Data User</button>
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
function deletedata(){
    let url = "https://webpro.ptov.my.id/api/curd.php?aksi=destroy";
    let iduser = document.getElementById("txIDUSER").value;
    let params = "iduser="+iduser;
    console.log("Params: "+params);
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.onload = function () {
        // do something to response
        const hasil = JSON.parse(this.responseText)
        if(hasil["error"] != 0){
            document.getElementById("hasil").innerHTML = "Terjadi Masalah saat hapus data";
        }else{
            document.getElementById("hasil").innerHTML = "Penghapusan Data Sukses!!! <a href='datauser.php'>kembali ke List data</a>";
        }
        //
    };
    xmlhttp.send(params);
}
</script>  

</body>
</html>