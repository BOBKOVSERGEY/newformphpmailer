$(function () {

  $(".contacts-form__input-mask").inputmask("+7(999)999-99-99");


  $('.contacts-form__form').validate({
    submitHandler: function () {
      var form = document.forms.contactsForm,
          formData = new FormData(form),
          xhr = new XMLHttpRequest();
      xhr.open("POST", "/sendPhpMailerAjax.php");
      $('.contacts-form__btn').text('Отправляю');
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
          if(xhr.status == 200) {
            $(".contacts-form__form").html('<div class="modal-form__form-tanks" style="text-align: center; color: green;">Заявка успешно отправлена!<div>');
            $('.contacts-form__btn').text('Отправить');
          }
        }
      };

      xhr.send(formData);
      /* var data = $('.contacts-form__form').serialize();

      $.ajax({
        url: '/sendPhpMailerAjax.php',
        type: 'POST',
        data: data,
        success: function (res) {
          $(".contacts-form__form").html('<div class="modal-form__form-tanks" style="text-align: center; color: green;">Заявка успешно отправлена!<div>');
        },
        error: function () {
          //$("#contacts-form")[0].reset();
          $(".contacts-form__result").html('<div class="modal-form__form-tanks" style="text-align: center; color: red;">Заявка не отправлена!<div>');
        }
      });*/
    },
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true
      }

    },
    messages: {
      name: {
        required: "Введите Ваше имя"
      },
      email: {
        required: "Введите адрес электронной почты",
        email: "Не корректный адрес"
      }
    }
  });


  $('.js-policy').on('click', function($el){
    checkPolicy();
  });
  function checkPolicy () {
    if ($(".js-policy").is(':checked')) {
      $("[type=submit]").prop('disabled', false);
    } else {
      $("[type=submit]").prop('disabled', true);
    }
  };

  var inputs = document.querySelectorAll( '.inputfile' );
  Array.prototype.forEach.call( inputs, function( input )
  {
    var label	 = input.nextElementSibling,
      labelVal = label.innerHTML;

    input.addEventListener( 'change', function( e )
    {
      var fileName = '';
      if( this.files && this.files.length > 1 )
        fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
      else
        fileName = e.target.value.split( '\\' ).pop();

      if( fileName )
        label.querySelector( 'span' ).innerHTML = fileName;
      else
        label.innerHTML = labelVal;
    });
  });
});