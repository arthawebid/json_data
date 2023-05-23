<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>
<body>
<div id="pencarian"><input type="text" id="txcari" onkeyup="caridata()"></div>
<div id="konten2"><h3>List Data User</h3><table class="table table-hover"><thead><tr><th scope="col">#</th><th scope="col">Nama Lengkap</th><th scope="col">Email</th><th scope="col">User Name</th><th scope="col"><a href="index.php?pg=dsn&sp=baru" class="btn btn-primary">Baru</a></th></tr></thead><tbody></tbody></table></div>
<script>

function caridata(){
  let iduser = document.getElementById("txcari").value;
  let q = "https://webpro.ptov.my.id/api/curd.php?aksi=getall&q="+iduser
  console.log("data q: "+q);
  const xmlhttp = new XMLHttpRequest()
  xmlhttp.open("GET",q)
  xmlhttp.send()

  xmlhttp.onload = function(){
    const mydta = JSON.parse(this.responseText)
    console.log(mydta);
    let tx = '<h3>List Data User</h3><table class="table table-hover">'
        tx += '<thead><tr><th scope="col">#</th><th scope="col">Nama Lengkap</th><th scope="col">Email</th><th scope="col">User Name</th><th scope="col"><a href="index.php?pg=dsn&sp=baru" class="btn btn-primary">Baru</a></th></tr></thead><tbody>'
    let no = 1
        for(i=0;i<mydta.isi.length;i++){
    tx +='<tr>'
    tx +='<th scope="row">'+no+'</th>'
    tx +='  <td>'+mydta.isi[i][0]+'</td>'
    tx +='  <td>'+mydta.isi[i][1]+'</td>'
    tx +='  <td>'+mydta.isi[i][2]+'</td>'
    tx +='  <td>'
    tx +='      <a href="index.php?pg=dsn&sp=edit&nidn='+mydta.isi[i][3]+'" class="badge bg-primary"> Edit </a>'
    tx +='      <a href="index.php?pg=dsn&sp=dele&nidn='+mydta.isi[i][3]+'" class="badge bg-danger"> Hapus </a>'
    tx +='  </td>'
    tx +='</tr>'
    no++
        }
  tx +='</tbody></table>'

    document.getElementById("konten2").innerHTML = tx
  }
}
</script>  

</body>
</html>