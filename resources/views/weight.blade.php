@extends('layouts.app')

@section('content')
<form onsubmit="weightPrice(); return false;">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Барааны төрөл</label>
    <div class="col-sm-10">
      <select id="priceselect" class="form-control">
        <option value="200000">200,000₮</option>
        <option value="300000">300,000₮</option>
        <option value="400000">400,000₮</option>
      </select>
      <br>
      <p class="alert alert-warning" id="info_select"></p>
    </div>
  </div>
    <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Өндөр (см)</label>
    <div class="col-sm-10">
      <input type="number" id="a" class="form-control">
    </div>
  </div>
    <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Урт (см)</label>
    <div class="col-sm-10">
      <input type="number" id="b" class="form-control">
    </div>
  </div>
    <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Өргөн (см)</label>
    <div class="col-sm-10">
      <input type="number" id="c" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Үнэ</label>
    <div class="col-sm-10">
      <input type="text" readonly id="resultm3price" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Эзэлхүүн</label>
    <div class="col-sm-10">
      <input type="text" readonly id="resultm3" class="form-control">
    </div>
  </div>

  <div class="form-group row">
      <button class="form-control btn btn-success">Тооцоолох</button>
  </div>

</form>

<script>
  function displayVals() {
  var singleValues = $( "#priceselect" ).val();
  var p400 = $("#400").val();
  var p300 = $("#300").val();
  var p200 = $("#200").val();
  // When using jQuery 3:
  // var multipleValues = $( "#multiple" ).val();
  if(singleValues == "400000") $("#info_select" ).html(p400);
  if(singleValues == "300000") $("#info_select" ).html(p300);
  if(singleValues == "200000") $("#info_select" ).html(p200);
}

$( "select" ).change( displayVals );
displayVals();
    function weightPrice() {
var a = document.getElementById("a").value;
if(a%5!=0){
  var k=5-a%5;
  a=Number(a)+Number(k);

}
var b = document.getElementById("b").value;
if(b%5!=0){
  var k=5-b%5;
  b=Number(b)+Number(k);
}
var c = document.getElementById("c").value;
if(c%5!=0){
  var k=5-c%5;
  c=Number(c)+Number(k);
}
var s = document.getElementById("priceselect").value;

var resultm3 = a*b*c/1000000;

var resultm3price = resultm3*s;

document.getElementById("resultm3").value = resultm3+"м.куб";

if(resultm3price%4000!=0){
  var k=4000-resultm3price%4000;
  resultm3price=Number(resultm3price)+Number(k);
}

resultm3price =　resultm3price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById("resultm3price").value = resultm3price+"₮";
    }
</script>

@endsection
