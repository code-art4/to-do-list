  $(document).ready(function() {

      //alert("Working");
      Insert_record();
      view_record();
      delete_record();
  })

  // Insert Record Into the Database
  function Insert_record() {
      $(document).on('submit', '#postForm', function(e) {
          e.preventDefault();
          var list = $('#list').val();
          if (list == "") {
              setTimeout(function() {
                  $('#list').css('background', 'rgba(255, 0, 0, 0.4)');
                  $('#message').html('Please Fill In the Box Above');
              }, 400);
          } else {
              $.ajax({
                  url: 'insert.php',
                  method: 'post',
                  data: { UName: list },
                  success: function(data) {
                      $('#message').html(data);
                      $('#Registration').modal('show');
                      $('form').trigger('reset');
                      view_record();
                  }
              })
              $('form').trigger('reset');
              $('#message').html('');
          }

          setTimeout(function() {
              $('#message').html('');
          }, 4000);
      })

      $(document).on('keyup', '#list', function() {
          $('#list').css('background', 'white');
      });
  }

  function view_record() {
      $.ajax({
          url: 'view.php',
          method: 'post',
          success: function(data) {
              data = $.parseJSON(data);
              if (data.status == 'success') {
                  $('#list_output').fadeIn('1000', function() {
                      $('#list_output').addClass("list_show");
                      $('#list_output').html(data.html);
                  });
              }
          }
      })
  }

  //Delete Function
  function delete_record() {
      $(document).on('click', '#btn_delete', function() {
          var Delete_ID = $(this).attr('data-id');
          $('#delete').modal('show');
          $(document).on('click', '#btn_delete_record', function() {
              $.ajax({
                  url: 'delete.php',
                  method: 'post',
                  data: { Del_ID: Delete_ID },
                  success: function(data) {
                      $('#delete-message').html(data).fadeOut(5000, function() {
                          $('#delete-message').remove();
                      });
                      view_record();
                  }
              })
          })
      })
  }