jQuery.fn.addHidden = function (name, value) {
    return this.each(function () {
        var input = $("<input>").attr("type", "hidden").attr("name", name).val(value);
        $(this).append($(input));
    });
};

function dd(v) { console.log(v) }

var SS = {
  submitForm: function(a, b) {
        var form = $(!!b ? a : "form").first()
        if(!b) b = a;
        if("object" == typeof b) {
  	      $.each(b, function(k, v) {
                  if("object" == typeof v) {
                    v = JSON.stringify(v)
                  }
  	      	form.addHidden(k, v)
  	    	})
        }
        form.submit()
  }
}