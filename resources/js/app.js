
// Login popup handle
$('.login-button').click(function(){
    $('#register').attr('data-redirect', $(this).attr('data-redirect'))

    if($(this).attr('data-close')){
      $('#register').attr('data-close', $(this).attr('data-close'))
    }else{
      $('#register').attr('data-close', null)
    }

    if($(this).attr('data-callback')){
      $('#register').attr('data-callback', $(this).attr('data-callback'))
    }else{
      $('#register').attr('data-callback', null)
    }


  })




  $('.open-bookmark-auth').on('click', function(){


      $('#register').attr('data-close', true)
      $('#register').attr('data-callback', 'add_to_bookmark')
      window.callbackParam = $(this).data('id')

    $('#bookmark-popup').click()

  })

  $('.bookmark-button').on('click', function(){ 
      add_to_bookmark($(this).data('id'))
  })



  window.add_to_bookmark = function (id = null){
    var listiingId = id || window.callbackParam
    if(!listiingId) return;

    $.get('/user/wishlist/manage/' + listiingId,  // url
      function (data, textStatus, jqXHR) {  // success callback
    
    });

  }