$(document).ready(function() {
	$(".datagrid .row").click(function(){
		var row = $(this)
		if(row.is(".clicked")){
			document.location=row.data("href")
			row.addClass("selected")
			return;
		}
		row.addClass("clicked")
		row.toggleClass("selected")
		row.find("i.fa").toggleClass("fa-square-o").toggleClass("fa-check-square-o")
		row.parents(".datagrid").trigger("selected")
		setTimeout(function(){row.removeClass("clicked")},500)
	})
})