/*
 * @Author: your name
 * @Date: 2020-03-27 23:12:12
 * @LastEditTime: 2020-05-09 15:51:29
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/covid/js/app.js
 */
/*
 * @Author: your name
 * @Date: 2020-03-27 23:12:12
 * @LastEditTime: 2020-04-04 19:03:06
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /htdocs/covid/js/app.js
 */

// /初始化进入加载ßßßß
// var msg = "1111";
getValue();
// 获取map数据 
function getValue() {
    $.ajax({
        // url: 'http://150.158.119.153:80/php/data.php', //online CORS
        // url: 'http://www.autofanu.com/php/data.php', //online
        // url: 'http://localhost:80/php/data.php', //online

        // url: 'http://localhost:8080/covid/php/data.php', //bendi
        url: 'http://covid:8080/php/data.php', //bendi

        // url: '../php/data.php',
        type: 'GET',
        data: '',
        async: false,
        dataType: 'json',
        // dataType: 'jsonp',
        // // jsonp: "callback",
        // jsonpCallback: "success_jsonpCallback",
        crossDomain: true,
        traditional: true,
        success: function(data) {
            // alert(data);
            console.log(data, "map");
            // console.log(data.initdata);
            var msg = data;
            if (msg) {
                drawMap(msg);
            }

        },
        complete: function() {
            //请求完成的处理
        },
        error: function() {
            //请求出错处理
            alert("加载失败");
        }
    })
}

function drawMap(msg) {
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));
    var option = {
        title: {
            text: 'Australian Coronavirus (COVID-19) Epidemic Tracing',
            left: '25%',
            top: '-1%',
            lineHeight: 56,
            textStyle: {
                fontSize: '28',
                height: '40'
            }
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            // data: msg[0],
            data: ["NSW", "VIC", "QLD", "SA", "WA", "TAS", "NT", "ACT", "TOTAL"],
            icon: 'rectangle',
            left: '35%',
            top: '4%',
            show: true
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        toolbox: {
            feature: {
                saveAsImage: {}
            }
        },
        // label: {
        //     // show: false,
        //     position: 'top',
        //     textStyle: {
        //         color: '#615a5a'
        //     },
        // },
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: msg[0]
        },
        yAxis: {
            type: 'value'
        },
        series: [{
                name: 'TOTAL',
                type: 'line',
                // stack: '总量',
                data: msg[2],
                itemStyle: {
                    normal: {
                        color: '#c23431',
                        lineStyle: {
                            color: '#c23431'
                        },
                        label: {
                            show: true,
                            position: 'top',
                            textStyle: {
                                color: '#c23431'
                            },
                            // formatter: '{c}'
                        },
                    },

                },
            },
            {
                name: 'NSW',
                type: 'line',
                // stack: '总量',
                data: msg[3],
                itemStyle: {
                    normal: {
                        color: ' #4c11ba',
                        lineStyle: {
                            color: ' #4c11ba'
                        },
                        label: {
                            show: true,
                            position: 'top',
                            textStyle: {
                                color: '#4c11ba'
                            },
                            // formatter: '{c}'
                        },
                    },

                },
            },
            {
                name: 'VIC',
                type: 'line',
                // stack: '总量',
                data: msg[4],
                itemStyle: {
                    normal: {
                        color: '#00e0ff',
                        lineStyle: {
                            color: '#00e0ff'
                        },
                        label: {
                            show: true,
                            position: 'top',
                            textStyle: {
                                color: '#00e0ff'
                            }
                        }
                    }
                },

            },
            {
                name: 'QLD',
                type: 'line',
                // stack: '总量',
                data: msg[5],
                itemStyle: {
                    normal: {
                        color: '#b5a900',
                        lineStyle: {
                            color: '#b5a900'
                        }
                    }
                },
            },
            {
                name: 'SA',
                type: 'line',
                // stack: '总量',
                data: msg[6],
                itemStyle: {
                    normal: {
                        color: '#416278',
                        lineStyle: {
                            color: '#416278'
                        }
                    }
                },
            },
            {
                name: 'WA',
                type: 'line',
                // stack: '总量',
                data: msg[7],
                itemStyle: {
                    normal: {
                        color: '#00aa84',
                        lineStyle: {
                            color: '#00aa84'
                        }
                    }
                },

            },
            {
                name: 'TAS',
                type: 'line',
                // stack: '总量',
                data: msg[8],
                itemStyle: {
                    normal: {
                        color: '#00ffc8',
                        lineStyle: {
                            color: '#00ffc8'
                        }
                    }
                }
            },
            {
                name: 'NT',
                type: 'line',
                // stack: '总量',
                data: msg[9],
                itemStyle: {
                    normal: {
                        color: '#8dff50',
                        lineStyle: {
                            color: '#8dff50'
                        }
                    }
                }
            },
            {
                name: 'ACT',
                type: 'line',
                // stack: '总量',
                data: msg[10],
                itemStyle: {
                    normal: {
                        color: '#ff8f55',
                        lineStyle: {
                            color: '#ff8f55'
                        }
                    }
                }
            }
        ]
    };


    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
    setTimeout(function() {
        window.onresize = function() {
            myChart.resize();
        }
    }, 200)
}