'use strict';
        $(document).ready(function(){
            var forClick = document.querySelectorAll(".sidebar .sidebar-container > ul > li"); 
            for (var i = 0; i < forClick.length-10; i++) { 
                forClick[i].addEventListener("click", function(e) {
                });
            }
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
            var ctx=document.getElementById('graph1').getContext("2d");
            var myChart=new Chart(ctx,{
                type:'line',
                data:amuntchart('rgba(75 ,216,14,.3)',[1,15,30,15,25,35,45,20,25,30,200,40],'rgba(75 ,216,14,.2)'),
                options:buildchartoptionear(),
            });
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
            function buildchartoptionear(){
                return{
                    maintainAspectRatio:1,
                    title:{display:1},
                    tooltips:{enabled:!1,},
                    legend:{
                        display:1,
                        labels:{usePointStyle:1}
                    },
                    responsive:1,
                    maintainAspectRatio:!0,
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
                    tooltips:{enabled:!1,},
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