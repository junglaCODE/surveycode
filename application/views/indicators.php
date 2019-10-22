<div class="col s4">
<div class="card-panel">
  <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="col s4"> <h1> <?= $total ?> </h1></div>
        <div class="col s8"> <h4> Total </h4> </div>    
      </div>
    </div>
  </div>
</div>
</div>

<div class="col s8">
  <div class="card-panel">
    <canvas id="bar" class="chart chart-bar" chart-data="survey.grpDay.data" chart-labels="survey.grpDay.labels" >
    </canvas>
    </div>
</div>

</div>