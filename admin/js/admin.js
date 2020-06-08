'use strict';

$(document).ready(function(){
           
            var ctx=document.getElementById('app-sale1').getContext("2d");
            var myChart=new Chart(ctx,{
                type:'bar',
                data:amuntchart('#11c15b',[1,15,30,15,25,35,45,20,25,30],'transperent'),
                options:buildchartoption(),
            });
            var ctx=document.getElementById('app-sale2').getContext("2d");
            var myChart=new Chart(ctx,{
                type:'bar',
                data:amuntchart('#2196f3',[10,25,3,5,6,7,9,22,25,33],'transperent'),
                options:buildchartoption(),
            });
            var ctx=document.getElementById('app-sale3').getContext("2d");
            var myChart=new Chart(ctx,{
                type:'bar',
                data:amuntchart('#ff3c7e',[0,5,4,5,6,7,9,2,15,13],'transperent'),
                options:buildchartoption(),
            });
            var ctx=document.getElementById('app-sale4').getContext("2d");
            var myChart=new Chart(ctx,{
                type:'bar',
                data:amuntchart('#ff5722',[10,25,3,5,6,7,9,22,25,33],'transperent'),
                options:buildchartoption(),
            });
     var ctx=document.getElementById('app-sale5').getContext("2d");
            var myChart=new Chart(ctx,{
                type:'line',
                data:amuntchart('#fff',[10,25,3,5,6,7,9,22,25,33],'transperent'),
                options:buildchartoption(),
            });
    var ctx=document.getElementById('app-sale6').getContext("2d");
            var myChart=new Chart(ctx,{
                type:'bar',
                data:amuntchartx('#add3ff',[10,25,3,5,6,7,9,22,25,33],'#add3ff'),
                options:buildchartoption(),
            });
//            var ctx=document.getElementById('my-graph-1').getContext("2d");
//            var myChart=new Chart(ctx,{
//                type:'line',
//                data:amuntchartx('rgba(75 ,216,14,.3)',[90,100,80,35,45,20,25,30,200,40,50,80,90,100,80],'rgba(75 ,216,14,.2)'),
//                options:buildchartoption(),
//            });
//            var ctx=document.getElementById('my-graph-2').getContext("2d");
//            var myChart=new Chart(ctx,{
//                type:'line',
//                data:amuntchartx('rgba(255, 87, 34, .5)',[50,80,90,100,90,25,30,200,40,100,80,35,45,20,80],'rgba(255, 87, 34, .5)'),
//                options:buildchartoption(),
//            });
//            var ctx=document.getElementById('my-graph-3').getContext("2d");
//            var myChart=new Chart(ctx,{
//                type:'line',
//                data:amuntchartx('rgba(92, 179, 231, .5)',[80,90,90,40,50,100,100,80,35,45,20,80,25,30,200],'rgba(92, 179, 231, .5)'),
//                options:buildchartoption(),
//            });
            function amuntchart(a,b,f){
                if(f==null){f="rgba(0,0,0,0)";}
                return{
                    labels:["January","February","March","April","May","June","July","August","September","October","november","december"],
                    datasets:[{
                        barThickness: 2,
                        label:"",
                        borderColor:a,
                        borderWidth:2,
                        hitRadius:30,pointHoverRadius:4,pointBorderWidth:50,pointHoverBorderWidth:12,
                        pointBackgroundColor:Chart.helpers.color("#000000").alpha(0).rgbString(),
                        pointBorderColor:Chart.helpers.color("#000000").alpha(0).rgbString(),
                        fill:true,backgroundColor:f,data:b,
                    }]
                };
            }
            function amuntchartx(a,b,f){
               if(f==null){f="rgba(0,0,0,0)";}
                return{
                    labels:["January","February","March","April","May","June","July","August","September","October","november","december"],
                    datasets:[{
                        barThickness: 12,
                        label:"",
                        borderColor:a,
                        borderWidth:2,
                        hitRadius:30,pointHoverRadius:4,pointBorderWidth:50,pointHoverBorderWidth:12,
                        pointBackgroundColor:Chart.helpers.color("#fff").alpha(0).rgbString(),
                        pointBorderColor:Chart.helpers.color("#fff").alpha(0).rgbString(),
                        fill:true,backgroundColor:f,data:b,
                    }]
                };
            }
            function buildchartoptionear(){
                return{
                    maintainAspectRatio:0,
                    title:{display:!1},
                    tooltips:{enabled:!1,},
                    legend:{
                        display:!1,
                        labels:{usePointStyle:!1}
                    },
                    responsive:1,
                   
                    hover:{mode:"index"},
                    elements:{
                        point:{
                            radius:4,
                            borderWidth:12
                        }
                    },
                    layout:{
                        padding:{
                            left:0,
                            right:0,
                            top:10,
                            bottom:0
                        }
                    }
                };
            }
            function buildchartoption(){
                return{
                    maintainAspectRatio:false,
                    title:{display:!1},
                    tooltips:{enabled:1,},
                    legend:{
                        display:!1,
                        labels:{usePointStyle:!1}
                    },
                    responsive:!1,
                    maintainAspectRatio:!0,
                    hover:{mode:"index"},
                    scales:{
                        xAxes:[{
                            display:!1,
                            gridLines:!1,
                            scaleLabel:{display:!0,labelString:"Month"}
                        }],
                        yAxes:[{
                            display:!1,
                            gridLines:!1,
                            scaleLabel:{display:!0,labelString:"Value"},
                            ticks:{beginAtZero:!0}
                        }]
                    },
                    elements:{
                        point:{
                            radius:4,
                            borderWidth:12
                        }
                    },
                    layout:{
                        padding:{
                            left:0,
                            right:0,
                            top:5,
                            bottom:0
                        }
                    }
                };
            }
            
        });
