$(document).ready(function() {

  /**********************************************************************************/  
  /**********************    SCROLL SUR PAGE D'ACCUEIL    ***************************/ 
  /**********************************************************************************/ 

  $(".scroll_btn").click(function(e){
    e.preventDefault();
    let datascroll = $(this).data('scroll');
    let positiontop = $('.scroll_into[data-scroll="'+datascroll+'"]').offset().top;

    // console.log("le data du bouton = "+datascroll+" "+" la position de l'element vers ou on va = "+positiontop);

    $('html, body').animate({
      scrollTop: positiontop
    }, 1000);
  });

  /**********************************************************************************/  
  /**************************    ANIMATION NUAGES    *********************************/  
  /**********************************************************************************/  

  TweenMax.to(".cloud", 20, {
    x: function(index, target) {
      console.log(index, target);
      return (index + 1) * 300 // 100, 200, 300
    }
  })
  
  /**********************************************************************************/  
  /**********************************    SLIDER    **********************************/  
  /**********************************************************************************/      

  $('.container.slider').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: false,
    prevArrow: $('.prev'),
    nextArrow: $('.next')
  });

  /**********************************************************************************/  
  /*******************************   CHECK FORMULAIRE   *****************************/  
  /**********************************************************************************/    

  var verifmail = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

  function checkForm(form, btn, url) {
    var erreur = 0;
    var form = $(form);
    var id_form = form.data("form white_bloc");
    var btn = $(btn);

    form.find('.required').each(function() {
      if ($(this).is(':visible')) {
        if ($(this).val() == '' || $(this).val() == null) {
          $(this).addClass("error");
          erreur++;
        } else {
          $(this).removeClass("error");
        }
      }

      form.find('.mail.required').each(function() {
        if ($(this).is(':visible')) {
          if (verifmail.exec($(this).val()) == null) {
            $(this).addClass("error");
            erreur++;
          } else {
            $(this).removeClass("error");
          }
        }
      });
    });

    form.find('.required').focusout(function() {
      if ($(this).is(':visible')) {
        if ($(this).hasClass("mail required")) {
          if (verifmail.exec($(this).val()) == null) {
            $(this).addClass("error");
            erreur++;
          } else {
            $(this).removeClass("error");
          }
        } else {
          if ($(this).val() == '' || $(this).val() == null) {
            $(this).addClass("error");
            erreur++;
          } else {
            $(this).removeClass("error");
          }
        }
      }
    });

    if (erreur == 0 && !btn.hasClass("disabled")) {
      form.find(".error_message").hide();
      ajaxForm(form, btn, url);
    } else {
      $('html, body').animate({ scrollTop: $(".error").offset().top - 400 }, 300);
      form.find(".error_message").show();
    }

    // console.log (erreur);

  }

    function ajaxForm(form, btn, url) {
      $(".message_error").hide();
      var form = $(form);
      var id_form = form.data("form");
      var btn = $(btn);
      // btn.addClass("disabled");
      var fields = form.serialize();
      $.ajax({
        type: "POST",
        data: fields,
        url: url,
        success: function(data) {
          btn.removeClass("disabled");
          var datas = data.hasOwnProperty('responseJSON') ? data.responseJSON : [];
          console.log('ok');
          alert("formulaire transmis");
        },
        error: function(error) {
          btn.removeClass('disabled');
          var errors = error.hasOwnProperty('responseJSON') ? error.responseJSON : [];
          console.log('nok');          
          alert("Votre formulaire s'estperdu dans les méandres d'internet !! Peut être une autre fois !");
        }
      });
    }

  $(".button").click(function(e) {
    e.preventDefault();
    var id = $(this).data("form");
    var form = $("form[data-form=" + id + "]");
    var url = form.attr("action");
    var btn = $(this);
    checkForm(form, btn, url);
  });

});
