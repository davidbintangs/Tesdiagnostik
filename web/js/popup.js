$(function(){
 //ambil form untuk tambah data
 $("#modalButton").click(function(){
     $("#modal").modal('show')
             .find("#modalContent")
             .load($(this).attr('value'));
 });

 $(document).on('click', '#buttonTambahPengalaman', function(){
        $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
        $('#modalTambahPengalaman').modal('show').find('#kontenTambahPengalaman').load($(this).attr('value'));
        options.async=true;
    });

 $(document).on('click', '#buttonTambahPendidikan', function(){
        $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
        $('#modalTambahPendidikan').modal('show').find('#kontenTambahPendidikan').load($(this).attr('value'));
        options.async=true;
    });


 $(document).on('click', '#buttonTambahSertifikasi', function(){
        $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
        $('#modalTambahSertifikasi').modal('show').find('#kontenTambahSertifikasi').load($(this).attr('value'));
        options.async=true;
    });

  $(document).on('click', '#buttonTambahPublikasi', function(){
        $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
        $('#modalTambahPublikasi').modal('show').find('#kontenTambahPublikasi').load($(this).attr('value'));
        options.async=true;
    });

 $(document).on('click', '#buttonTambahPortofolio', function(){
        $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
        $('#modalTambahPortofolio').modal('show').find('#kontenTambahPortofolio').load($(this).attr('value'));
        options.async=true;
    });

 $(document).on('click', '#buttonTambahBahasa', function(){
        $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
        $('#modalTambahBahasa').modal('show').find('#kontenTambahBahasa').load($(this).attr('value'));
        options.async=true;
    });

 $(document).on('click', '#buttonViewPengalaman', function(){
        $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
        $('#modalViewPengalaman').modal('show').find('#kontenViewPengalaman').load($(this).attr('value'));
        options.async=true;
    });

 $(document).on('click', '#btnUpdatePengalaman', function(){
        $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
        $('#mdlUpdatePengalaman').modal('show').find('#ktnUpdatePengalaman').load($(this).attr('value'));
        options.async=true;
    });
   $(document).on('click', '#tawarProyekbtn', function(){
        $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
        $('#tawarProyekmdl').modal('show').find('#tawarProyekktn').load($(this).attr('value'));
        options.async=true;
    });

 $(document).on('click', '#buttonViewPendidikan', function(){
        $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
        $('#modalViewPendidikan').modal('show').find('#kontenViewPendidikan').load($(this).attr('value'));
        options.async=true;
    });

 $(document).on('click', '#buttonUpdatePendidikan', function(){
        $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
        $('#modalUpdatePendidikan').modal('show').find('#kontenUpdatePendidikan').load($(this).attr('value'));
        options.async=true;
    });






});