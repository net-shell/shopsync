@section('js')
@parent
$(document).ready(function() {
	var lastClicked = false
	$(".datagrid .row").not(".disabled").click(function(e){
		var row = $(this)
		if(row.is(".clicked")) {
			document.location=row.data("href")
			row.addClass("selected")
			return;
		}
		row.addClass("clicked")

		var allRows = row.siblings().add(row)
		if(!e.ctrlKey) {
			allRows.removeClass("selected")
		}
		var rows = row
		if(e.shiftKey) {
			if(lastClicked && row != lastClicked) {
				if(allRows.index(row) > allRows.index(lastClicked))
					rows = lastClicked.nextUntil(row)
				else rows = lastClicked.prevUntil(row)
				rows = rows.add(row).add(lastClicked)
			}
		}
		if(e.ctrlKey) {
			row.toggleClass("selected")
		}
		else
			rows.addClass("selected")
		allRows.each(function() {
			var s = $(this).is(".selected")
			$(this).find("i.check").toggleClass("fa-square-o", !s)
				.toggleClass("fa-check-square-o", s)
		});
		lastClicked = row
		row.parents(".datagrid").trigger("selected")
		setTimeout(function(){row.removeClass("clicked")}, 200)
	})
})
@stop

@section('css')
@parent
.datagrid {
	-moz-user-select: none;
	-khtml-user-select: none;
	-webkit-user-select: none;
	-o-user-select: none;
	cursor: default;
} 
.datagrid .row:not(.disabled) {
	border-bottom: 1px solid #ccc;
	color: #333;
	transition: background-color 0.28s ease;
}
.datagrid .row .columns { padding: .3rem .6rem .3rem; }
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
.datagrid .button {
	margin: 0;
	padding: .2em;
	float: left;
	width: 100%;
}
@stop