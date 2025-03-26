$(document).ready(function(){  

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-start',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
      });
    
      $('.toastSuccess').show(function() {
        Toast.fire({
          icon: 'success',
          title: 'Your item is now added to cart'
        })
      }); 
});  



