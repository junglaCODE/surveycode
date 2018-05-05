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
    <canvas id="line" class="chart chart-line" chart-data="survey.grpDay.data" chart-labels="survey.grpDay.labels" >
    </canvas>
    </div>
</div>

<div class="col s5">
  <div class="card-panel">
    <canvas id="polar-area" class="chart chart-polar-area"
    chart-data="survey.grpTed.data" chart-options="options" chart-labels="survey.grpTed.labels">
    </canvas> 
  </div>
</div>

<div class="col s7">
  <div class="card-panel">
    <canvas id="base" class="chart-horizontal-bar"
    chart-data="survey.grpCpt.data" chart-options="options" chart-labels="survey.grpCpt.labels">
    </canvas> 
  </div>
</div>