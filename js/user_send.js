$('#update_users').click(function(event){
    var obj = {};

var changed = document.querySelectorAll('.editable-unsaved');
for (i = 0; i < changed.length; i++) {    
    obj[changed[i].id] = {};
}
for (i = 0; i < changed.length; i++) {
    if (changed[i].classList.contains('email')) {
        obj[changed[i].id]['email'] = changed[i].innerText;
    } else if (changed[i].classList.contains('user')) {
        obj[changed[i].id]['user'] = changed[i].innerText;
    } else if (changed[i].classList.contains('date')) {
         obj[changed[i].id]['date_added'] = changed[i].innerText;
    }
}

$('select').each(function() {
    if (($(this).val()) != ($(this).find('option.default').val())) { 
        obj[$(this).attr('id')]['role'] = $(this).find('option').val();
    }
});

    $.ajax({
      type: "POST",
      url: 'user_change.php',
      data: obj,
      beforeSend: function() {
          //document.querySelector('.vex-dialog-message').innerHTML = "Wait...";
      },
      success: function(data) {
          $('#message').html(data);
      }
    });

});

