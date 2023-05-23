<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>
<body>
<div id="pencarian"><input type="text" id="txcari"></div>
<div id="konten2"><h3>List Data User</h3><table class="table table-hover"><thead><tr><th scope="col">#</th><th scope="col">Nama Lengkap</th><th scope="col">Email</th><th scope="col">User Name</th><th scope="col"><a href="index.php?pg=dsn&sp=baru" class="btn btn-primary">Baru</a></th></tr></thead><tbody></tbody></table></div>
<script>
  const xmlhttp = new XMLHttpRequest()
  xmlhttp.open("GET","https://webpro.ptov.my.id/api/curd.php?aksi=get")
  xmlhttp.send()

  xmlhttp.onload = function(){
    const mydta = JSON.parse(this.responseText)
    console.log(mydta.isi);
    let tx = '<h3>List Data User</h3><table class="table table-hover">'
        tx += '<thead><tr><th scope="col">#</th><th scope="col">Nama Lengkap</th><th scope="col">Email</th><th scope="col">User Name</th><th scope="col"><a href="datauser-new.php" class="btn btn-primary">Baru</a></th></tr></thead><tbody>'
    let no = 1
        for(i=0;i<mydta.isi.length;i++){
    tx +='<tr>'
    tx +='<th scope="row">'+no+'</th>'
    tx +='  <td>'+mydta.isi[i][0]+'</td>'
    tx +='  <td>'+mydta.isi[i][1]+'</td>'
    tx +='  <td>'+mydta.isi[i][2]+'</td>'
    tx +='  <td>'
    tx +='      <a href="datauser-edit.php?id='+mydta.isi[i][3]+'" class="badge bg-primary"> Edit </a>'
    tx +='      <a href="datauser-hapus.php?id='+mydta.isi[i][3]+'" class="badge bg-danger"> Hapus </a>'
    tx +='  </td>'
    tx +='</tr>'
    no++
        }
  tx +='</tbody></table>'

    document.getElementById("konten2").innerHTML = tx
  }
</script>  

</body>
</html>