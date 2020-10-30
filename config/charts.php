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
                'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js',
                // '{{ asset("js/jquery.min.js") }}'
            ],
        ],

        'canvas-gauges' => [
            'scripts' => [
                'https://cdn.rawgit.com/Mikhus/canvas-gauges/gh-pages/download/2.1.2/all/gauge.min.js',
                // '{{ asset("js/gauge.min.js") }}'
            ],
        ],

        'chartist' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.js',
                // '{{ asset("js/chartist.min.js") }}',
            ],
            'styles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.css',
                // '{{ asset("css/chartist.min.css") }}',
            ],
        ],

        'chartjs' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js',
                // '{{ asset("js/Chart.min.js") }}',
            ],
        ],

        'fusioncharts' => [
            'scripts' => [
                'https://static.fusioncharts.com/code/latest/fusioncharts.js',
                // '{{ asset("js/fusioncharts.js") }}',
                'https://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js',
                // '{{ asset("js/fusioncharts.theme.fint.js") }}',
            ],
        ],

        'google' => [
            'scripts' => [
                'https://www.google.com/jsapi',
                // '{{ asset("js/jsapi") }}',
                'https://www.gstatic.com/charts/loader.js',
                // '{{ asset("js/loader.js") }}',
                "google.charts.load('current', {'packages':['corechart', 'gauge', 'geochart', 'bar', 'line']})",
            ],
        ],

        'highcharts' => [
            'styles' => [
                // The following CSS is not added due to color compatibility errors.
                // 'https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/css/highcharts.css',
            ],
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/highcharts.js',
                // '{{ asset("js/highcharts.js") }}',
                'https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/js/modules/offline-exporting.js',
                // '{{ asset("js/offline-exporting.js") }}',
                'https://cdnjs.cloudflare.com/ajax/libs/highmaps/5.0.7/js/modules/map.js',
                // '{{ asset("js/map.js") }}',
                'https://cdnjs.cloudflare.com/ajax/libs/highmaps/5.0.7/js/modules/data.js',
                // '{{ asset("js/data.js") }}',
                'https://code.highcharts.com/mapdata/custom/world.js',
                // '{{ asset("js/world.js") }}'
            ],
        ],

        'justgage' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.6/raphael.min.js',
                // '{{ asset("js/raphael.min.js") }}',
                'https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.2/justgage.min.js',
                // '{{ asset("js/justgage.min.js") }}',
            ],
        ],

        'morris' => [
            'styles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css',
                // '{{ asset("css/morris.css") }}',
            ],
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.6/raphael.min.js',
                // '{{ asset("js/raphael.min.js") }}',
                'https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js',
                // '{{ asset("js/morris.min.js") }}',
            ],
        ],

        'plottablejs' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js',
                // '{{ asset("js/d3.min.js") }}',
                'https://cdnjs.cloudflare.com/ajax/libs/plottable.js/2.8.0/plottable.min.js',
                // '{{ asset("js/plottable.min.js") }}',
            ],
            'styles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/plottable.js/2.2.0/plottable.css',
                // '{{ asset("css/plottable.css") }}',
            ],
        ],

        'progressbarjs' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js',
                // '{{ asset("js/progressbar.min.js") }}',
            ],
        ],

        'c3' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js',
                // '{{ asset("js/d3.min.js") }}',
                'https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.js',
                // '{{ asset("js/c3.min.js") }}',
            ],
            'styles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.css',
                // '{{ asset("css/c3.min.css") }}',
            ],
        ],

        'echarts' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/echarts/3.6.2/echarts.min.js',
                // '{{ asset("js/echarts.min.js") }}',
            ],
        ],

        'amcharts' => [
            'scripts' => [
                'https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/amcharts.js',
                // '{{ asset("js/amcharts.js") }}',
                'https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/serial.js',
                // '{{ asset("js/serial.js") }}',
                'https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/plugins/export/export.min.js',
                // '{{ asset("js/export.min.js") }}',
                'https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/themes/light.js',
                // '{{ asset("js/light.js") }}',
            ],
            'styles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/amcharts/3.21.2/plugins/export/export.css',
                // '{{ asset("css/export.css") }}',
            ],
        ],
    ],
];
