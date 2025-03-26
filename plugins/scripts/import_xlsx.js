$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').show(function() {
      Toast.fire({
        icon: 'success',
        title: 'The Upload is successful!'
      })
    });

    $('.swalDefaultError').show(function() {
      Toast.fire({
        icon: 'error',
        title: 'Error! Please check your file!'
      })
    });
  });