$(document).ready(function() {
  $('[data-toggle="offcanvas"]').click(function () {
    $('.sidebar-offcanvas').toggleClass('active')
  });

  $(window).scroll(function() {
    $('.sidebar-offcanvas').removeClass('active');

    if( $(this).scrollTop()>10 ){
      $('.scrollup').addClass('yes')
    } else {
      $('.scrollup').removeClass('yes')
    }
  });

  $('#iesnl').hide();
  $('#besnl').hide();
  $('#cesnl').hide();

  $('#iese').hide();
  $('#bese').hide();
  $('#cese').hide();

  $('#iest').hide();
  $('#best').hide();
  $('#cest').hide();

  $('#iesu').hide();
  $('#besu').hide();
  $('#cesu').hide();

  $('#iesp').hide();
  $('#besp').hide();
  $('#cesp').hide();

  $('#tesnl').click(function(){
    $('#iesnl').show();
    $('#tesnl').hide();
    $('#hesnl').hide();
    $('#besnl').show();
    $('#cesnl').show();
    
    $('#iese').hide();
    $('#tese').show();
    $('#hese').show();
    $('#bese').hide();
    $('#cese').hide();

    $('#iest').hide();
    $('#test').show();
    $('#hest').show();
    $('#best').hide();
    $('#cest').hide();

    $('#iesu').hide();
    $('#tesu').show();
    $('#hesu').show();
    $('#besu').hide();
    $('#cesu').hide();

    $('#iesp').hide();
    $('#tesp').show();
    $('#hesp').show();
    $('#besp').hide();
    $('#cesp').hide()
  });

  $('#tese').click(function(){
    $('#iesnl').hide();
    $('#tesnl').show();
    $('#hesnl').show();
    $('#besnl').hide();
    $('#cesnl').hide();
    
    $('#iese').show();
    $('#tese').hide();
    $('#hese').hide();
    $('#bese').show();
    $('#cese').show();
    
    $('#iest').hide();
    $('#test').show();
    $('#hest').show();
    $('#best').hide();
    $('#cest').hide();

    $('#iesu').hide();
    $('#tesu').show();
    $('#hesu').show();
    $('#besu').hide();
    $('#cesu').hide();

    $('#iesp').hide();
    $('#tesp').show();
    $('#hesp').show();
    $('#besp').hide();
    $('#cesp').hide()
  });

  $('#test').click(function(){
    $('#iesnl').hide();
    $('#tesnl').show();
    $('#hesnl').show();
    $('#besnl').hide();
    $('#cesnl').hide();
    
    $('#iese').hide();
    $('#tese').show();
    $('#hese').show();
    $('#bese').hide();
    $('#cese').hide();
    
    $('#iest').show();
    $('#test').hide();
    $('#hest').hide();
    $('#best').show();
    $('#cest').show();
    
    $('#iesu').hide();
    $('#tesu').show();
    $('#hesu').show();
    $('#besu').hide();
    $('#cesu').hide();

    $('#iesp').hide();
    $('#tesp').show();
    $('#hesp').show();
    $('#besp').hide();
    $('#cesp').hide()
  });

  $('#tesu').click(function(){
    $('#iesnl').hide();
    $('#tesnl').show();
    $('#hesnl').show();
    $('#besnl').hide();
    $('#cesnl').hide();
    
    $('#iese').hide();
    $('#tese').show();
    $('#hese').show();
    $('#bese').hide();
    $('#cese').hide();
    
    $('#iest').hide();
    $('#test').show();
    $('#hest').show();
    $('#best').hide();
    $('#cest').hide();

    $('#iesu').show();
    $('#tesu').hide();
    $('#hesu').hide();
    $('#besu').show();
    $('#cesu').show();

    $('#iesp').hide();
    $('#tesp').show();
    $('#hesp').show();
    $('#besp').hide();
    $('#cesp').hide()
  });

  $('#tesp').click(function(){
    $('#iesnl').hide();
    $('#tesnl').show();
    $('#hesnl').show();
    $('#besnl').hide();
    $('#cesnl').hide();
    
    $('#iese').hide();
    $('#tese').show();
    $('#hese').show();
    $('#bese').hide();
    $('#cese').hide();
    
    $('#iest').hide();
    $('#test').show();
    $('#hest').show();
    $('#best').hide();
    $('#cest').hide();

    $('#iesu').hide();
    $('#tesu').show();
    $('#hesu').show();
    $('#besu').hide();
    $('#cesu').hide();

    $('#iesp').show();
    $('#tesp').hide();
    $('#hesp').hide();
    $('#besp').show();
    $('#cesp').show()
  });

  $('#besnl').click(function(){
    $('#iesnl').hide();
    $('#tesnl').show();
    $('#hesnl').show();
    $('#besnl').hide();
    $('#cesnl').hide()
  });

  $('#bese').click(function(){
    $('#iese').hide();
    $('#tese').show();
    $('#hese').show();
    $('#bese').hide();
    $('#cese').hide()
  });

  $('#best').click(function(){
    $('#iest').hide();
    $('#test').show();
    $('#hest').show();
    $('#best').hide();
    $('#cest').hide()
  });

  $('#besu').click(function(){
    $('#iesu').hide();
    $('#tesu').show();
    $('#hesu').show();
    $('#besu').hide();
    $('#cesu').hide()
  });

  $('#besp').click(function(){
    $('#iesp').hide();
    $('#tesp').show();
    $('#hesp').show();
    $('#besp').hide();
    $('#cesp').hide()
  });

  $('#falseinput').click(function(){
    $('#fileinput').click()
  });

  $('#ism').on('keyup', function(){
    $('#psm').load('assets/load/load-daftarmenu.php?carimenu=' + $('#ism').val())
  });
  
  $('#isp').on('keyup', function(){
    $('#psp').load('assets/load/load-pengguna.php?cariuser=' + $('#isp').val())
  });
  
  $('#isd').on('keyup', function(){
    $('#pst').load('assets/load/load-datatransaksi.php?carilaporan=' + $('#isd').val());
    $('#psk').load('assets/load/load-datakeuangan.php?carilaporan=' + $('#isd').val());
    $('#pspj').load('assets/load/load-datapenjualan.php?carilaporan=' + $('#isd').val())
  });
  
  $('#bayar').on('keyup', function(){
    $('#platra').load('assets/load/load-kasir.php?total=' + $('#total').val() + '&bayar=' + $('#bayar').val())
  });
  
  $('#loginForm').validate({
    rules: {
      username: {
        required: true,
        minlength: 3
      },
      password: {
        required: true,
        minlength: 5
      },
    },
    messages: {
      username: {
        required: "<i class='text-danger'>*Mohon Masukan Username Anda</i>",
        minlength: "<i class='text-danger'>*Username Harus Lebih Dari 3 Karakter</i>"
      },
      password: {
        required: "<i class='text-danger'>*Mohon Masukan Password Anda</i>",
        minlength: "<i class='text-danger'>*Password  Harus Lebih Dari 5 Karakter</i>"
      }
    }
  });

  $('#regisForm').validate({
    rules: {
      nama_lengkap:{
        required: true,
        maxlength: 50
      },
      username: {
        required: true,
        minlength: 3,
        maxlength: 10
      },
      password: {
        required: true,
        minlength: 5
      },
      email: {
        required: true,
        email: true
      },
      telepon: {
        required: true,
        minlength: 11,
        maxlength: 13
      },
      level: {
        required: true
      }
    },
    messages: {
      nama_lengkap:{
        required: "<i class='text-danger'>*Mohon Masukan Nama Lengkap</i>",
        maxlength: "<i class='text-danger'>*Maksimal 50 Karakter</i>"
      },
      username: {
        required: "<i class='text-danger'>*Mohon Masukan Username</i>",
        minlength: "<i class='text-danger'>*Minimal 3 Karakter</i>",
        maxlength: "<i class='text-danger'>*Maksimal 10 Karakter</i>"
      },
      password: {
        required: "<i class='text-danger'>*Mohon Masukan Password</i>",
        minlength: "<i class='text-danger'>*Minimal 5 Karakter</i>"
      },
      email: {
        required: "<i class='text-danger'>*Mohon Masukan Email</i>",
        email: "<i class='text-danger'>*Mohon Masukan Email Yang Valid</i>"
      },
      telepon: {
        required: "<i class='text-danger'>*Mohon Masukan No Telepon</i>",
        minlength: "<i class='text-danger'>*Minimal 11 Karakter</i>",
        maxlength: "<i class='text-danger'>*Maksimal 13 Karakter</i>"
      },
      level: "<i class='text-danger'>*Mohon Pilih Level</i>"
    }
  });
});
  
$('.scrollup').click(function(){
  $(document).scrollTop(0)
});

$('#fileinput').change(function() {
  $('#selected_filename').text($('#fileinput')[0].files[0].name)
});