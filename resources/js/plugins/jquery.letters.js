// Letters only control handler
jQuery.fn.letters = function() {
  return this.each(function() {
    $(this).keydown(function(e) {
      if (e.ctrlKey || e.altKey) {
        e.preventDefault();
      } else {
        var key = e.keyCode;
        if (
          !(
            key == 8 ||
            key == 32 ||
            key == 46 ||
            (key >= 35 && key <= 40) ||
            (key >= 65 && key <= 90)
          )
        ) {
          e.preventDefault();
        }
      }
    });
  });
};
