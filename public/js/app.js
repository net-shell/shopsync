jQuery.fn.addHidden = function (name, value) {
    return this.each(function () {
        var input = $("<input>").attr("type", "hidden").attr("name", name).val(value);
        $(this).append($(input));
    });
};

function submitForm(data) {
      var form = $("form").first()
      if("object"==typeof data) {
	      $.each(data, function(k, v) {
	      	form.addHidden(k, JSON.stringify(v))
	    	})
    	}
      form.submit()
}