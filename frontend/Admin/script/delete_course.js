$(document).ready(function () {
  $(".delete-link").click(function (e) {
    e.preventDefault();
    var courseId = $(this).data("id");
    console.log($(this).data("id"));

    $.ajax({
      url: "../../backend/course/delete.php",
      type: "POST",
      data: {
        id: courseId,
      },
      success: function (response) {
        alert(response);
        location.reload(); // Reload the page after successful deletion
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
        alert("Error deleting course. Please try again.");
      },
    });
  });
});
