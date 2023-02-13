<script>
    $("#contact_form").on("submit", function(e) {
      e.preventDefault();
      var fd = new FormData(this);
      $.ajax({
        url: "/send.php",
        type: "POST",
        contentType: false,
        processData: false,
        data: fd,
        success: function success(msg) {
          if (msg === "ok") {
            alert("Ваше сообщение доставлено!");
          } else {
            alert("Ошибка");
          }
        },
      });
    });
  </script>

