<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
 <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<head>
<title>jQueryͼ</title>

    <script type="text/javascript" src="/testapi2/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/testapi2/Public/js/highcharts.js"></script>
    <script type="text/javascript" src="/testapi2/Public/js/exporting.js"></script>

<script type="text/javascript">
	 $(function () {                                                               
    $('#container').highcharts({                                          
        chart: {                                                          
        },                                                                
        title: {                                                          
            text: '折线，柱状，饼 统计'
        },  
		//x��
        xAxis: {                                                          
            categories: ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums']
        },                                                                
        tooltip: {                                                        
            formatter: function() {                                       
                var s;                                                    
                if (this.point.name) { // the pie chart                   
                    s = ''+                                               
                        this.point.name +': '+ this.y +' fruits';         
                } else {                                                  
                    s = ''+                                               
                        this.x  +': '+ this.y;                            
                }                                                         
                return s;                                                 
            }                                                             
        },                                                                
        labels: {                                                         
            items: [{                                                     
                html: 'Total fruit consumption',                          
                style: {                                                  
                    left: '40px',                                         
                    top: '8px',                                           
                    color: 'black'                                        
                }                                                         
            }]                                                            
        },                                                                
        series: [{                                                        
            type: 'column',                                               
            name: 'Jane',                                                 
            data: [3, 2, 1, 3, 4]                                         
        }, {                                                              
            type: 'column',                                               
            name: 'John',                                                 
            data: [2, 3, 5, 7, 6]                                         
        }, {                                                              
            type: 'column',                                               
            name: 'Joe',                                                  
            data: [4, 3, 3, 9, 0]                                         
        }, {                                                              
            type: 'spline',                                               
            name: 'Average',                                              
            data: [3, 2.67, 3, 6.33, 3.33],                               
            marker: {                                                     
            	lineWidth: 2,                                               
            	lineColor: Highcharts.getOptions().colors[3],               
            	fillColor: 'white'                                          
            }                                                             
        }, {                                                              
            type: 'pie',                                                  
            name: 'Total consumption',                                    
            data: [{                                                      
                name: 'Jane',                                             
                y: 13,                                                    
                color: Highcharts.getOptions().colors[0] // Jane's color  
            }, {                                                          
                name: 'John',                                             
                y: 23,                                                    
                color: Highcharts.getOptions().colors[1] // John's color  
            }, {                                                          
                name: 'Joe',                                              
                y: 19,                                                    
                color: Highcharts.getOptions().colors[2] // Joe's color   
            }],                                                           
            center: [100, 80],                                            
            size: 100,                                                    
            showInLegend: false,                                          
            dataLabels: {                                                 
                enabled: false                                            
            }                                                             
        }]                                                                
    });                                                                   
});                                                                       				         				
</script>

</head>
<body>
<div  style=" margin: 0 auto; margin-bottom: 10px; width:600px; height: 50px;"><span>欢迎使用道驰科技流量充值API--Demo  <a href="/testapi2/index.php?s=/Home/Ask/index">下载地址</a></span></div>
<div  style=" margin: 0 auto; margin-bottom: 10px; width:600px; height: 50px;"><span>欢迎使用道驰科技流量充值API--Demo  <a href="/testapi2/index.php?s=/Home/Ask/phone">充值页面</a></span></div>
<div id="container" style="width:850px;height:500px;margin:0 auto"></div>
</body>
</html>