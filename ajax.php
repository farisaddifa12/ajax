<!DOCTYPE html>
<html>
<head>
  <title>Form Submission with AJAX</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
   td {
    border: 1px solid black;
    margin: 10px;
    padding: 10px;
   }
  </style>

</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <h1 class="fs-4">Formulir Pendaftaran beserta Pendaftar</h1>
      </a>
    </header>
</div>

<div class="container">
    <div class="row">
      <div class="col 6">
  <!-- Form HTML -->
    <form id="form1" method="post" action="/submit">
        <input type="hidden" class="form-control" name="id" value=""><br>
        <label for="name">Name:</label><br>
        <input type="text" class="form-control" name="Nama"><br>
        <label for="email">Email:</label><br>
        <input type="text" class="form-control" name="Email"><br>
        <input type="submit" value="Submit">
    </form>
      </div>
      <div class="row col 6">
        <div id="form2"></div>
    </div>
    </div>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


<script type="text/javascript">
 
 $(document).ready(function() { 
     
    
    $("#form1").submit(function(e) {
         e.preventDefault();
         $.post('submit.php', $('#form1').serialize(), function (a) {
          console.log(a)

        
     }).done(function () {
        reloaddata();
     });
 
 
});

const $showData = $('#form2');


function reloaddata () {
$.getJSON('http://localhost/ajax/submit-json.php', (respon) => {

// mengatur ulang format respon dari json menjadi html
const markup = respon
.map(item => `<tr><td>
 ${item.id}.</td><td>${item.Nama}</td>
  </td><td>${item.Email}</td><td>edit</td></tr>`)
  .join('');

// tampilkan di kolom ke dua
$showData.html(markup);


  })
 }
 reloaddata ()
});

// Event handler untuk tombol edit
$('#edit-button').click(function() {
  // Ambil ID baris yang ingin diedit
  var rowId = $(this).data('row-id');

  // Kirim permintaan edit ke server
  $.ajax({
    url: '/edit/' + rowId,
    type: 'PUT',
    success: function(response) {
      // Tindak lanjut jika edit berhasil
      console.log(response);
    },
    error: function(xhr, status, error) {
      // Tindak lanjut jika edit gagal
      console.log(error);
    }
  });
});

// Event handler untuk tombol hapus
$('#delete-button').click(function() {
  // Ambil ID baris yang ingin dihapus
  var rowId = $(this).data('row-id');

  // Kirim permintaan hapus ke server
  $.ajax({
    url: '/delete/' + rowId,
    type: 'DELETE',
    success: function(response) {
      // Tindak lanjut jika hapus berhasil
      console.log(response);
    },
    error: function(xhr, status, error) {
      // Tindak lanjut jika hapus gagal
      console.log(error);
    }
  });
});




</script>

    
  
</body>
</html>