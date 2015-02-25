@section('price-field')
<div class="small-7 columns">
  {!! Form::text('price') !!}
</div>
<div class="small-5 columns">
  <span class="postfix">
    <a data-dropdown="drop-currency"
      data-options="align:left" style="display:block"></a>
    <ul id="drop-currency" class="f-dropdown" data-dropdown-content tabindex="-1">
      @foreach(app()['config']['shopsync.currencies'] as $currency)
      <li data-key="{{ $currency }}">
        <a href="javascript:void(0)">{{ $currency }}</a>
      </li>
      @endforeach
    </ul>
  </span>
</div>
@stop

@section('js')
@parent
$(document).ready(function() {
  $("#drop-currency").children().click(function(){
    model.currency = $(this).text().trim()
    $("#drop-currency").prev().text(model.currency)
    var price = model.prices[model.currency]
    if(!price > 0)
      $("input[name='price']").attr("placeholder", model.prices[model.currencyDefault])
    $("input[name='price']").val(price)
  })
  $("#drop-currency").prev().click(function(){
    $(this).next().find("li").each(function(){
      $(this).toggleClass("val", 0 < model.prices[$(this).data("key")])
    })
  });
  $("input[name='price']").change(function(){
    if($(this).val().length)
      model.prices[model.currency] = $(this).val()
    else model.prices[model.currency] = 0
  })
  $("#drop-currency").prev().text(model.currency)
  $("input[name='price']").val(model.prices[model.currency])
  model.currencyDefault = model.currency
})
@stop

@section('css')
@parent
#drop-currency .val a {
  font-weight: bold;
  color: #286328;
}
@stop