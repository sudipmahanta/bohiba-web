function myFunction() {
    var x = document.getElementById("minerpwd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }