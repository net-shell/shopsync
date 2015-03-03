@section('price-field')
<div id="price{{ $product->id }}" class="row collapse">
  <div class="small-6 columns">
      <span data-tooltip class="has-tip tip-top" title="Inherits {{ $product->currency }}">
        {!! Form::text('price') !!}
      </span>
  </div>
  <div class="small-6 columns">
    <span class="postfix">
      <a data-dropdown="drop-currency-{{ $product->id }}"
        data-options="align:left" style="display:block">
        <span class="bind"></span>
        <i class="fa fa-angle-down"></i>
      </a>
      <ul id="drop-currency-{{ $product->id }}" class="f-dropdown"
        data-dropdown-content tabindex="-1">
        @foreach(app()['config']['shopsync.currencies'] as $currency)
        <li data-key="{{ $currency }}">
          <a href="javascript:void(0)">{{ $currency }}</a>
        </li>
        @endforeach
      </ul>
    </span>
  </div>
</div>
@stop

@section('js')
@parent
function _model() { return _modelStorage }
function _modelSet(v) { _modelStorage = v }
function model(k, v) { return _model()[k] }
function modelSet(k, v) { _model()[k] = v }
function price(c) { return _model().prices[c ? c : model("currency")] }
function priceSet(v) { _model().prices[model("currency")] = v }

var _modelStorage = {}
_modelSet({ prices: {!! $product->pricesJson !!}, currency: "{{ $product->currency }}" })

$(document).ready(function() {
  var drop = $("#drop-currency-{{ $product->id }}")
  var wrap = $("#price{{ $product->id }}")
  drop.children().click(function(){
    modelSet("currency", $(this).data("key"))
    drop.prev().find(".bind").text(model("currency"))
    if(!price() > 0) {
      var ph = "("+price(model("currencyDefault"))+")"
      wrap.find("input").attr("placeholder", ph)
      //wrap.find(".has-tip").foundation("tooltip", "show")
    }
    wrap.find("input").val(price())
  })
  drop.prev().click(function(){
    $(this).next().find("li").each(function(){
      $(this).toggleClass("val", 0 < price($(this).data("key")))
    })
  });
  wrap.find("input").change(function(){
    priceSet($(this).val().length ? $(this).val() : 0)
  })
  drop.prev().find(".bind").text(model("currency"))
  wrap.find("input")
    .val(price())
    .keypress(function(e) {
      if ((e.which != 46 || $(this).val().indexOf('.') != -1) && (e.which < 48 || e.which > 57))
        e.preventDefault()
    })
  modelSet("currencyDefault", model("currency"))
})
@stop

@section('css')
@parent
.f-dropdown .val a {
  font-weight: bold;
  color: #286328;
}
@stop