@section('js')
@parent
$(document).ready(function() {
	$(".datagrid .row").not(".disabled").click(function(){
		var row = $(this)
		if(row.is(".clicked")){
			document.location=row.data("href")
			row.addClass("selected")
			return;
		}
		row.addClass("clicked")
		row.toggleClass("selected")
		row.find("i.check").toggleClass("fa-square-o").toggleClass("fa-check-square-o")
		row.parents(".datagrid").trigger("selected")
		setTimeout(function(){row.removeClass("clicked")},500)
	})
})
@stop

@section('css')
@parent
.datagrid .row:not(.disabled) {
	border-bottom: 1px solid #ccc;
	cursor: pointer;
	color: #286327;
	transition: background-color 0.28s ease;
}
.datagrid .row .columns { padding: .6rem .6rem .2rem; }
.datagrid .row.header {
	color: #152C15;
	font-weight: bold;
}
.datagrid .row { border-bottom: 1px solid #ccc; }
.datagrid .row:not(.disabled).selected {
	background: #38C840;
	color: #152C15;
	border-color: #286328;
}
.datagrid .row:not(.disabled).selected:hover { background: #45EB45; }
.datagrid .row:not(.disabled):hover { color: #152C15; }
.datagrid .row:not(.disabled).clicked,
.datagrid .row:not(.disabled):hover {
	border-color: #152C15;
	background: #ccc;
}
@stop