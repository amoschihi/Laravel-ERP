<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default settings for charts.
    |--------------------------------------------------------------------------
    */

    'default' => [
        'type' => 'line', // The default chart type.
        'library' => 'material', // The default chart library.
        'element_label' => 'Element', // The default chart element label.
        'empty_dataset_label' => 'No Data Set',
        'empty_dataset_value' => 0,
        'title' => 'My Cool Chart', // Default chart title.
        'height' => 400, // 0 Means it will take 100% of the division height.
        'width' => 0, // 0 Means it will take 100% of the division width.
        'responsive' => false, // Not recommended since all libraries have diferent sizes.
        'background_color' => 'inherit', // The chart division background color.
        'colors' => [], // Default chart colors if using no template is set.
        'one_color' => false, // Only use the first color in all values.
        'template' => 'material', // The default chart color template.
        'legend' => true, // Whether to enable the chart legend (where applicable).
        'x_axis_title' => false, // The title of the x-axis
        'y_axis_title' => null, // The title of the y-axis (When set to null will use element_label value).
        'loader' => [
            'active' => true, // Determines the if loader is active by default.
            'duration' => 500, // In milliseconds.
            'color' => '#000000', // Determines the default loader color.
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | All the color templates available for the charts.
    |--------------------------------------------------------------------------
    */
    'templates' => [
        'material' => [
            '#2196F3', '#F44336', '#FFC107',
        ],
        'red-material' => [
            '#B71C1C', '#F44336', '#E57373',
        ],
        'indigo-material' => [
            '#1A237E', '#3F51B5', '#7986CB',
        ],
        'blue-material' => [
            '#0D47A1', '#2196F3', '#64B5F6',
        ],
        'teal-material' => [
            '#004D40', '#009688', '#4DB6AC',
        ],
        'green-material' => [
            '#1B5E20', '#4CAF50', '#81C784',
        ],
        'yellow-material' => [
            '#F57F17', '#FFEB3B', '#FFF176',
        ],
        'orange-material' => [
            '#E65100', '#FF9800', '#FFB74D',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Assets required by the libraries.
    |--------------------------------------------------------------------------
    */

    'assets' => [
        'global' => [
            'scripts' => [
                'http://localhost:8000/js/jquery.min.js',
            ],
        ],

        'canvas-gauges' => [
            'scripts' => [
                'http://localhost:8000/js/gauge.min.js',
            ],
        ],

        'chartist' => [
            'scripts' => [
                'http://localhost:8000/js/chartist.min.js',
            ],
            'styles' => [
                'http://localhost:8000/css/chartist.min.css',
            ],
        ],

        'chartjs' => [
            'scripts' => [
                'http://localhost:8000/js/Chart.min.js',
            ],
        ],

        'fusioncharts' => [
            'scripts' => [
                'http://localhost:8000/js/fusioncharts.js',
                'http://localhost:8000/js/fusioncharts.theme.fint.js',
            ],
        ],

        'google' => [
            'scripts' => [
                'http://localhost:8000/js/jsapi',
                'http://localhost:8000/js/loader.js',
                "google.charts.load('current', {'packages':['corechart', 'gauge', 'geochart', 'bar', 'line']})",
            ],
        ],

        'highcharts' => [
            'styles' => [
                // The following CSS is not added due to color compatibility errors.
                // 'https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/css/highcharts.css',
            ],
            'scripts' => [
                'http://localhost:8000/js/highcharts.js',
                'http://localhost:8000/js/offline-exporting.js',
                'http://localhost:8000/js/map.js',
                'http://localhost:8000/js/data.js',
                'http://localhost:8000/js/world.js',
            ],
        ],

        'justgage' => [
            'scripts' => [
                'http://localhost:8000/js/raphael.min.js',
                'http://localhost:8000/js/justgage.min.js',
            ],
        ],

        'morris' => [
            'styles' => [
                'http://localhost:8000/css/morris.css',
            ],
            'scripts' => [
                'http://localhost:8000/js/raphael.min.js',
                'http://localhost:8000/js/morris.min.js',
            ],
        ],

        'plottablejs' => [
            'scripts' => [
                'http://localhost:8000/js/d3.min.js',
                'http://localhost:8000/js/plottable.min.js',
            ],
            'styles' => [
                'http://localhost:8000/css/plottable.css',
            ],
        ],

        'progressbarjs' => [
            'scripts' => [
                'http://localhost:8000/js/progressbar.min.js',
            ],
        ],

        'c3' => [
            'scripts' => [
                'http://localhost:8000/js/d3.min.js',
                'http://localhost:8000/js/c3.min.js',
            ],
            'styles' => [
                'http://localhost:8000/css/c3.min.css',
            ],
        ],

        'echarts' => [
            'scripts' => [
                'http://localhost:8000/js/echarts.min.js',
            ],
        ],

        'amcharts' => [
            'scripts' => [
                'http://localhost:8000/js/amcharts.js',
                'http://localhost:8000/js/serial.js',
                'http://localhost:8000/js/exporting.js',
                'http://localhost:8000/js/light.js',
            ],
            'styles' => [
                'http://localhost:8000/css/export.css',
            ],
        ],
    ],
];
