<?php

/**
 * @package sfGraphics
 * @author Jesus Trias
 * @version 1
 * @internal Clase para generar distintos tipos de graficas con javaScripts
 * @example http://localhost/ficha/web/ficha_dev.php/persona/ReporteCentros ejemplo corriendo de la clase
 * @example ficha/web/ficha_dev.php/persona/ReporteCentros ejemplo del template
 * @example ficha/web/ficha_dev.php/persona/actions ejemplo del action
*/

class  sfGraphics
{
var $titulo;
var $categorias;
var $unidad;
var $columnas;
var $tablaId;
var $leyenda;
var $script;
var $javaScript;
var $datos;
	function __construct(){
		$this->titulo;
		$this->categorias;
		$this->unidad;
		$this->columnas;
		$this->tablaId;
		$this->leyenda;
		$this->script;
		$this->javaScript;
		$this->datos;
	}
    public static function tableGraphic($titulo,$categorias,$unidad,$columnas,$tablaId,$leyenda,$div_style='width: 800px; height: 400px;',$margen=array(50, 50, 350, 200,))
	{
             $mensaje=self::allValidator($categorias);
                if($mensaje!='')
                 {
                     return $mensaje;
                     }else{
		$ajax=self::getJavascripts();
		/**
		 * @param string $titulo titulo que lleva la grafica
		 * @param array $categorias categorias que identifican los datos de la grafica
		 * @param string $unidad unidad de medida de los datos
		 * @param array $columnas columnas de la tabla a graficar
		 * @param string $tablaId id de la tabla que desea graficar
		 * @param boolean $leyenda variable para activar o desactivar la leyenda de la grafica
		 *
		 * @return script devuelve una variable con el script de la grafica ya generado
		 */
		$ajax.="<script type='text/javascript'>
		$(document).ready(function() {
			var chart = new Highcharts.Chart({
				chart: {
					renderTo: 'div_".$tablaId."',
					defaultSeriesType: 'column',
					margin: [";
					foreach($margen as $edge):
					$ajax.=$edge.",";
					endforeach;
					$ajax.="]},
				title: {
					text: '".$titulo."'
				},
				xAxis: {
					categories: [";
			foreach($categorias as $cat):
				$ajax.="'".$cat."'".',';
			endforeach;
			    $ajax.="],
					labels: {
						rotation: -60,
						align: 'right',
						style: {
							 font: 'normal 13px Verdana, sans-serif'
						}
					}
				},
				yAxis: {
					title: {
						text: '".$unidad."'
					}
				},
				legend: {
					enabled: ".$leyenda."
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.x.toUpperCase()+'</b><br/>'+
							this.y +' '+ this.series.name;
					}
				},
				plotOptions: {
					column: {
						data: '".$tablaId."',
						// define a custom data parser function for both series
						dataParser: function(data) {
							var table = document.getElementById(data),
								// get the data rows from the tbody element
								rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'),
								// define the array to hold the real data
								result = [],
								// decide which column to use for this series
								column = {";
			$i=0;
			foreach($columnas as $cols):
				$ajax.="'".$cols."'".": ".$i.", ";
				$i++;
			endforeach;
			$ajax.="}[this.options.name];
							// loop through the rows and get the data depending on the series (this) name
							for (var i = 0; i < rows.length; i++) {
								result.push(
									parseInt(
										rows[i].getElementsByTagName('td')[column].innerHTML // the data cell

									)
								);
							}
							return result;
						}
					}
				},
				series: [";
			foreach($columnas as $cols):
				$ajax.= "{name: '".$cols."'},";
			endforeach;
			$ajax.="]
			});
		});
		</script>";
		$ajax.="<div id='div_".$tablaId."' style='".$div_style."; margin: 0 auto'></div><center><input type='button' value='Imprimir' onClick='window.print()'></center>";
		return $ajax;
                     }
		}
		public static function labeledTable($titulo,$categorias,$unidad,$datos,$contenedor,$leyenda='false',$div_style='width: 800px; height: 400px;',$margen=array(50, 50, 100, 80,))
		{
                $mensaje=self::allValidator($categorias);
                if($mensaje!='')
                 {
                     return $mensaje;
                     }else{
                        $ajax=self::getJavascripts();
                        $ajax.="<script type='text/javascript'>
                        $(document).ready(function() {
                                var chart = new Highcharts.Chart({
                                        chart: {
                                                renderTo: 'div_".$contenedor."',
                                                defaultSeriesType: 'column',
                                                margin: [";
                                                foreach($margen as $edge):
                                                $ajax.=$edge.",";
                                                endforeach;
                                                $ajax.="]
                                        },
                                        title: {
                                                text: '".$titulo."'
                                        },
                                        xAxis: {
                                                categories: [";
                                foreach($categorias as $cat):
                                        $ajax.="'".$cat."'".',';
                                endforeach;
                                    $ajax.="],
                                                labels: {
                                                        rotation: -45,
                                                        align: 'right',
                                                        style: {
                                                                 font: 'normal 13px Verdana, sans-serif'
                                                        }
                                                }
                                        },
                                        yAxis: {
                                                min: 0,
                                                title: {
                                                        text: '".$unidad."'
                                                }
                                        },
                                        legend: {
                                                enabled: ".$leyenda."
                                        },
                                        tooltip: {
                                                formatter: function() {
                                                        return '<b>'+ this.x +'</b><br/>'+
                                                                 ''+ Highcharts.numberFormat(this.y, 0) +
                                                                 '';
                                                }
                                        },
                                        series: [{
                                                name: 'Population',
                                                data: [";
                                foreach($datos as $dat):
                                        $ajax.=$dat.',';
                                endforeach;
                                    $ajax.="],
                                                dataLabels: {
                                                        enabled: true,
                                                        rotation: 0,
                                                        color: '#000000',
                                                        align: 'center',
                                                        x: 3,
                                                        y: -30,
                                                        formatter: function() {
                                                                return this.y;
                                                        },
                                                        style: {
                                                                font: 'normal 13px Verdana, sans-serif'
                                                        }
                                                }
                                        }]
                                });
                        });
                        </script>";
                        $ajax.="<div id='div_".$contenedor."' style='".$div_style." margin: 0 auto'></div><center><input type='button' value='Imprimir' onClick='window.print()'></center>";
                        return $ajax;
                 }
		}
	public static function columns3DMeses($titulo,$serie,$categorias,$datos,$unidad='',$contenedor,$subtitulo='',$div_style='width: 800px; height: 400px;',$titulo_y)
	{  
		//$ajax=self::getJavascripts();
		$ajax="<script type='text/javascript'>
		$(document).ready(function() { 
			var chart = Highcharts.chart('".$contenedor."', {
			    chart: {
				type: 'column',
				options3d: {
				    enabled: true,
				    alpha: 10,
				    beta: 25,
				    depth: 70
				}
			    },
			    title: {
				text: '".$titulo."'
			    },
			    subtitle: {
				text: '".$subtitulo."'
			    },
			    plotOptions: {
				column: {
				    depth: 25
				}
			    },
			    xAxis: {
				categories: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Dicicembre'],
				labels: {
				    rotation: -45,
				    style: {
					fontSize: '13px',
					fontFamily: 'Verdana, sans-serif'
				    }
				}
			    },
			    yAxis: {
				min: 0,
				title: {
				    text: '".$titulo_y."'
				}
			    },
			    series: [{
				name: '".$serie."',
				data: [".$datos."]
			    }]
			});
			});
		</script>";
                $ajax.="<div id='".$contenedor."' style='".$div_style." margin: 0 auto'></div>";
		return $ajax;
	}
	public static function columns3D($titulo,$serie,$categorias,$datos,$unidad='',$contenedor,$subtitulo='',$div_style='width: 800px; height: 400px;',$titulo_y)
	{  
		//$ajax=self::getJavascripts();
		$ajax="<script type='text/javascript'>
		$(document).ready(function() { 
			var chart = Highcharts.chart('".$contenedor."', {
			    chart: {
				type: 'column',
				options3d: {
				    enabled: true,
				    alpha: 10,
				    beta: 25,
				    depth: 70
				}
			    },
			    title: {
				text: '".$titulo."'
			    },
			    subtitle: {
				text: '".$subtitulo."'
			    },
			    plotOptions: {
				column: {
				    depth: 25
				}
			    },
			    xAxis: {
				categories: [".$categorias."],
				labels: {
				    rotation: -45,
				    style: {
					fontSize: '13px',
					fontFamily: 'Verdana, sans-serif'
				    }
				}
			    },

			    yAxis: {
				min: 0,
				title: {
				    text: '".$titulo_y."'
				}
			    },
			    series: [{
				name: '".$serie."',
				data: [".$datos."],
				/*dataLabels: {
					    enabled: true,
					    rotation: -90,
					    color: '#FFFFFF',
					    align: 'right',
					    format: '{point.y:.1f}', // one decimal
					    y: 10, // 10 pixels down from the top
					    style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					    }
					}*/
			    }]

			});
			});
		</script>";
                $ajax.="<div id='".$contenedor."' style='".$div_style." margin: 0 auto'></div>";
		return $ajax;
	}
	public static function basicColumns3D($titulo,$serie,$categorias,$datos,$unidad='',$contenedor,$subtitulo='',$div_style='width: 800px; height: 400px;',$titulo_y,$name1,$name2,$valores1,$valores2)
	{  
		$prueba = '"color:blue"';
		//$ajax=self::getJavascripts();
		$ajax="<script type='text/javascript'>
		$(document).ready(function() { 
			var chart = Highcharts.chart('".$contenedor."', {
			    chart: {
				type: 'column'
			    },

			    title: {
				text: '".$titulo."'
			    },

			    subtitle: {
				text: '".$subtitulo."'
			    },

			    legend: {
				align: 'right',
				verticalAlign: 'middle',
				layout: 'vertical'
			    },

			    xAxis: {
				categories: [".$categorias."],
				labels: {
				    x: -10
				}
			    },

			    yAxis: {
				allowDecimals: false,
				title: {
				    text: '".$titulo_y."'
				}
			    },

			    series: [{
				name: '".$name1."',
				data: [".$valores1."]
			    }, {
				name: '".$valores2."',
				data: [6, 4, 2]
			    }],

			    responsive: {
				rules: [{
				    condition: {
					maxWidth: 500
				    },
				    chartOptions: {
					legend: {
					    align: 'center',
					    verticalAlign: 'bottom',
					    layout: 'horizontal'
					},
					yAxis: {
					    labels: {
						align: 'left',
						x: 0,
						y: -5
					    },
					    title: {
						text: null
					    }
					},
					subtitle: {
					    text: null
					},
					credits: {
					    enabled: false
					}
				    }
				}]
			    }
			});
		     });
		</script>";
                $ajax.="<div id='".$contenedor."' style='".$div_style." margin: 0 auto'></div>";
		return $ajax;
	}
	public static function pie3D($titulo,$subtitulo,$datos,$contenedor,$tot=0,$div_style='width: 900px; height: 400px;',$serie="",$margen=array(70, 200, 60, 170))
	{  
		$ajax="<div id='".$contenedor."' style='".$div_style."'></div>
		<script type='text/javascript'>
			Highcharts.chart('".$contenedor."', {
			    chart: {
				type: 'pie',
				options3d: {
				    enabled: true,
				    alpha: 45,
				    beta: 0
				}
			    },
			    title: {
				text: '".$titulo."'
			    },
			    tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			    },
			    plotOptions: {
				pie: {
				    allowPointSelect: true,
				    cursor: 'pointer',
				    depth: 35,
				    dataLabels: {
					enabled: true,
					format: '{point.name}'
				    }
				}
			    },
			    series: [{
				type: 'pie',
				name: '".$serie."',
				data: [";
					foreach($datos as $data):
						$ajax.="['".$data[0].": ".$data[1]."',".$data[1]."],";
                                        endforeach;
				$ajax.="]
			    }]
			});
		</script>";
		return $ajax;
		
	}
	public static function basicColumns($titulo, $categorias,$datos,$unidad='',$contenedor,$subtitulo='',$div_style='width: 800px; height: 400px;')
	{       
		$ajax=self::getJavascripts();
		$ajax.="<script type='text/javascript'>
		$(document).ready(function() {
			var chart = new Highcharts.Chart({
				chart: {
					renderTo: 'div_".$contenedor."',
					defaultSeriesType: 'bar',
									},
				title: {
					text: ''
				},
				subtitle: {
					text: ''
				},
				xAxis: {
					categories: [";
                                        foreach($categorias as $cat):
                                                $ajax.="'".$cat."'".',';
                                        endforeach;
                                $ajax.="],
				},
				yAxis: {
					min: 0,
					title: {
						text: '".$unidad."'
					}
				},
				legend: {
                                    layout: 'horizontal',
                                    align: 'right',
                                    verticalAlign: 'top',
                                    x: -0,
                                    y: -5,
                                    floating: true,
                                    borderWidth: 1,
                                    backgroundColor: '#FFFFFF',
                                    shadow: true  ,
                                    style: {
                                             font: 'normal 4px Arial'
                                    }
                                },
                                credits: {
                                        enabled: false
                                },
				tooltip: {
					formatter: function() {
						return this.x +' <b>'+ this.series.name+' </b>= '+ this.y;
					}
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
			        series: [";
					foreach($datos as $data):                                                
						$ajax.="{name: '".$data[0]."',";
						$ajax.="data:[".$data[1]."],
                                                dataLabels: {
							enabled: true,
							rotation: -0,
							color: '#616363',
							align: 'center',
							x: -3,
							y: -2,
							formatter: function() {
								//return +this.y;
							},
							style: {
								font: 'normal 11px Verdana, sans-serif'
							}
						},
                                                },";
				    endforeach;
				$ajax.="
                                ]
			});


		});
		</script>";
                $ajax.="<div style='text-align: center; font-size: 14px; font-weight: bold'>".$titulo."</div><div id='div_".$contenedor."' style='".$div_style." margin: 0 auto'></div>";
		return $ajax;

	}
                	
        public static function pieChart($titulo,$subtitulo,$datos,$contenedor,$tot=0,$div_style='width: 900px; height: 400px;',$margen=array(70, 200, 60, 170))
	{
             $mensaje=self::pieValidator($datos);
                if($mensaje!='')
                 {
                     return $mensaje;
                     }else{
		$ajax=self::getJavascripts();
		$ajax.="<script type='text/javascript'>
		$(document).ready(function() {
			var chart = new Highcharts.Chart({
				chart: {
					renderTo: 'div_".$contenedor."',
                                        plotBackgroundColor: null,
                                        plotBorderWidth: null,
                                        plotShadow: false,
					margin: [";
					foreach($margen as $edge):
                                            $ajax.=$edge.",";
					endforeach;
					$ajax.="]
				},
				title: {
					text: '".$titulo."'
				},
                                subtitle: {
					text: '".$subtitulo."'
				},
				plotArea: {
					shadow: 1,
					borderWidth: null,
					backgroundColor: null
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b>';
					}
				},
                                plotOptions: {
					 pie: {
                                                allowPointSelect: true,
                                                cursor: 'pointer',
                                                dataLabels: {
                                                    enabled: true,
                                                    formatter: function() {
                                                        if (this.y > 0)
                                                            var por = this.y*100/".$tot.";
                                                            return por.toFixed(2) + '%';

                                                        },
                                                    color: '#000000',
						},
                                                showInLegend: true
                                            }
				},
				legend: {
                                        plotBorderWidth: null,
					layout: 'vertical',
					style: {
						left: 'auto',
						bottom: 'auto',
						right: '-10px',
						top: '90px'
					}
				},
                                credits: {
                                        enabled: false
                                },
			        series: [{
					type: 'pie',
					name: 'Browser share',
					data: [";
						foreach($datos as $data):
							$ajax.="['".$data[0].": ".$data[1]."',".$data[1]."],";
                                                endforeach;
					$ajax.="]
					}]
			});


		});
		</script>";

		$ajax.="<div id='div_".$contenedor."' style='".$div_style." margin: 0 auto'></div>";
		return $ajax;
                     }
	}
        public static function pieChartNum($titulo,$subtitulo,$datos,$contenedor,$tot=0,$div_style='width: 900px; height: 400px;',$margen=array(70, 200, 60, 170))
	{
             $mensaje=self::pieValidator($datos);
                if($mensaje!='')
                 {
                     return $mensaje;
                     }else{
		$ajax=self::getJavascripts();
		$ajax.="<script type='text/javascript'>
		$(document).ready(function() {
			var chart = new Highcharts.Chart({
				chart: {
					renderTo: 'div_".$contenedor."',
                                        plotBackgroundColor: null,
                                        plotBorderWidth: null,
                                        plotShadow: false,
					margin: [";
					foreach($margen as $edge):
                                            $ajax.=$edge.",";
					endforeach;
					$ajax.="]
				},
				title: {
					text: '".$titulo."'
				},
                                subtitle: {
					text: '".$subtitulo."'
				},
				plotArea: {
					shadow: 1,
					borderWidth: null,
					backgroundColor: null
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b>';
					}
				},
                                plotOptions: {
					 pie: {
                                                allowPointSelect: true,
                                                cursor: 'pointer',
                                                dataLabels: {
                                                    enabled: true,
                                                    formatter: function() {
                                                        if (this.y > 0)
                                                            var por = this.y*100/".$tot.";
                                                            return this.y + ' Presentadas';

                                                        },
                                                    color: '#000000',
						},
                                                showInLegend: true
                                            }
				},
				legend: {
                                        plotBorderWidth: null,
					layout: 'vertical',
					style: {
						left: 'auto',
						bottom: 'auto',
						right: '-10px',
						top: '90px'
					}
				},
                                credits: {
                                        enabled: false
                                },
			        series: [{
					type: 'pie',
					name: 'Browser share',
					data: [";
						foreach($datos as $data):
							$ajax.="['".$data[0].": ".$data[1]."',".$data[1]."],";
                                                endforeach;
					$ajax.="]
					}]
			});


		});
		</script>";

		$ajax.="<div id='div_".$contenedor."' style='".$div_style." margin: 0 auto'></div>";
		return $ajax;
                     }
	}

	public static function basicLines($titulo, $categorias,$datos,$unidad='',$contenedor,$subtitulo='',$div_style='width: 800px; height: 400px;')
	{
             $mensaje=self::pieValidator($datos);
                if($mensaje!='')
                 {
                     return $mensaje;
                     }else{
		$ajax=self::getJavascripts();
		$ajax.="<script type='text/javascript'>
		$(document).ready(function() {
			var chart = new Highcharts.Chart({
				chart: {
					renderTo: 'div_".$contenedor."',
					defaultSeriesType: 'line'
				},
				title: {
					text: '".$titulo."'
				},
				subtitle: {
					text: '".$subtitulo."'
				},
				xAxis: {
					categories: [";
                                                foreach($categorias as $cat):
                                                        $ajax.="'".$cat."'".',';
                                                endforeach;
						$ajax.="],
					title: {
						text: 'x'
					}
				},
				yAxis: {
					title: {
						text: '".$unidad."'
					}
				},
				tooltip: {
					enabled: false,
					formatter: function() {
						return '<b>'+ this.series.name +'</b><br/>'+
							this.x +': '+ this.y +'°C';
					}
				},
				plotOptions: {
					line: {
						dataLabels: {
							enabled: true
						}
					}
				},
				series: [";
					   foreach($datos as $data):
							$ajax.="{name: '".$data[0]."',";
							$ajax.="data:[";
							foreach($data[1] as $valor):
								$ajax.=$valor.",";
							endforeach;
							$ajax.="]},";
					    endforeach;
				$ajax.="]
			});

		});
		</script>";
		$ajax.="<div id='div_".$contenedor."' style='".$div_style." margin: 0 auto'></div><center><input type='button' value='Imprimir' onClick='window.print()'></center>";
		return $ajax;
                     }
	}

 	  public static function getJavascripts()
		  {
		   $valor=explode('/', $_SERVER['REQUEST_URI']);
		   $javaScript='';
		    $script=array('http://localhost/'.$valor[1].'/web/js/jquery-1.4.2.min.js', 'http://localhost/'.$valor[1].'/web/js/highcharts.js');
                    //$script=array('jquery-1.4.2.min.js','highcharts.js');
		    foreach($script as $src):
		     	$javaScript.='<script type="text/javascript" src="'.$src.'"></script>';
		    endforeach;
			return $javaScript;
		  }
            public static function allValidator($categorias)
                  {
                      if($categorias=='')
                          {
                            $mensaje='<center><table><tr valign="middle"><td><img height="32" width="32" src="/centros/web/images/error.png"></td><td><strong>No hay datos para generar la grafica<strong></td></tr></table></center>';
                             // echo $mensaje;
                          //  exit();
                            return $mensaje;
                          }
                  }
            public static function pieValidator($datos)
                  {
                      $i=0;
                      foreach($datos as $dat):
                          $i++;
                          endforeach;
                      if($i==0)
                          {
                            $mensaje='<center><table><tr valign="middle"><td><img height="32" width="32" src="/centros/web/images/error.png"></td><td><strong>No hay datos para generar la grafica<strong></td></tr></table></center>';
                           return $mensaje;
                          }
                  }
            public static function unhtmlentities($string)
                {
                    // replace numeric entities
                    $string = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $string);
                    $string = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $string);
                    // replace literal entities
                    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
                    $trans_tbl = array_flip($trans_tbl);
                    return strtr($string, $trans_tbl);
                }
          public static function variasColumnas($contenedor,$div_style='width: 800px; height: 400px;')
                {
                $ajax=self::getJavascripts();
		$ajax.="<script type='text/javascript'>
		$(document).ready(function() {
                                        var chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'bar'
					},
					title: {
						text: 'Historic World Population by Region'
					},
					subtitle: {
						text: 'Source: Wikipedia.org'
					},
					xAxis: {
						categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
						title: {
							text: null
						}
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Population (millions)',
							align: 'high'
						}
					},
					tooltip: {
						formatter: function() {
							return ''+
								 this.series.name +': '+ this.y +' millions';
						}
					},
					plotOptions: {
						bar: {
							dataLabels: {
								enabled: true
							}
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -100,
						y: 100,
						borderWidth: 1,
						backgroundColor: '#FFFFFF'
					},
					credits: {
						enabled: false
					},
				        series: [{
						name: 'Year 1800',
						data: [107, 31, 635, 203, 2]
					}, {
						name: 'Year 1900',
						data: [133, 156, 947, 408, 6]
					}, {
						name: 'Year 2008',
						data: [973, 914, 4054, 732, 34]
					}]
				});


			});
                        </script>";
                    $ajax.="<div id='div_".$contenedor."' style='".$div_style." margin: 0 auto'></div><center><input type='button' value='Imprimir' onClick='window.print()'></center>";
                    return $ajax;
                }
                	
		public static function CamFormFech($contenido,$fech='',$fech2='')
		 {
		    if($contenido!=null)
		    {
			$fech=explode('-', $contenido,3);
			$fech2=explode(' ', $fech[2],3);
			if(count($fech2) ==2)
			{
			  return $fech2[0]."/".$fech[1]."/".$fech[0]." ".$fech2[1];
			}
			else
			{
			  return $fech2[0]."/".$fech[1]."/".$fech[0];
			}
		    }
               }  
	       public static function NombreMes($mes)
	       {
		    if($mes!=null)
		    {
			if (strlen($mes)==1)
			{
				$mes = "0".$mes;
			}
			$arreglo= array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");
	
			  return $arreglo[$mes];

		    }
               } 
}
?>
