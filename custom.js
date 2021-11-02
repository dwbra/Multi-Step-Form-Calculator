(function( $ ) {
    'use strict';
    
    jQuery(function() {
      var previous_form, next_form;
      $(".next-form").click(function(){
        previous_form = $(this).parent();
        // console.log(previous_form);
        next_form = $(this).parent().next();
        next_form.show();
        previous_form.hide();
      });  

      $(".previous-form").click(function(){
        previous_form = $(this).parent();
        next_form = $(this).parent().prev();
        next_form.show();
        previous_form.hide();
      });
    });

    
    var counter = 0;
    jQuery(function () {
      $(".newDog").on('click', function(){
        counter ++;
        if (counter < 4) {
          var name = $("<input/>",{
            type: "text",
            name: `dogname${counter}`
        })
          var age = $("<input/>",{
            type: "text",
            name: `dogage${counter}`
        });
          var weight = $("<input/>",{
            type: "text",
            name: `dogweight${counter}`
        });
        var mealPlan = $('#mealplanSelected').clone().attr('name', `mealplanSelected${counter}`);
        } else {
          alert("Max Dog 4");
          return;
        }
        
        $(".dogname-inputs").append(name);
        $(".dogage").append(age);
        $(".dogweight").append(weight);
        $(".mealplan").append(mealPlan);

        const removeLink = $("<span class='removelink'/>").html("X").on('click', function() {
          $(this).prev().remove();
          $(this).remove();
          counter --;
        });

        $(removeLink).appendTo('.dogname-inputs, .dogage, .dogweight, .mealplan');
    });
    })

    jQuery(function() {
    $('#dogForm').submit(function(e) {
      e.preventDefault();
      let calculator = $('.mealCalculator');
      $.ajax({
          type: "POST",
          url: '/wp-content/themes/divi-child/inc/form/form_logic.php',
          data: $(this).serialize(),
          success: function (data, status, xhr) {
            $(calculator).after(data);
            console.log(data);
          },
          error: function (xhr, status, thrownError) {
            $(calculator).after(xhr.status + ":" + xhr.responseText);
          }
      });
      });
    });


})( jQuery );
