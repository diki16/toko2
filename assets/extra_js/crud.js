$(".edit_button").click(function(){
    var kd = $(this).val();
    var form = new FormData();
form.append("kd", kd);

var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://localhost/toko_online/dbarang/info_barang",
  "method": "POST",
  "headers": {
    "cache-control": "no-cache",
    "postman-token": "8c731ed7-5d4c-8350-5c44-d27f6fe30980"
  },
  "processData": false,
  "contentType": false,
  "mimeType": "multipart/form-data",
  "data": form
}

$.ajax(settings).done(function (response) {
  console.log(response);
    var json = JSON.parse(response);
    document.getElementById("kd_barang").value = json.kd_barang;
    document.getElementById("n_barang").value = json.n_barang;
    document.getElementById("harga").value = json.harga;
    document.getElementById("kuantitas").value = json.kuantitas;
});
   $("#modal_edit").modal("show"); 
});