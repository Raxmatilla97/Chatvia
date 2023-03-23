@extends('layouts.app')

@section('content')
@section('css')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/snap.svg/0.1.0/snap.svg-min.js"></script>
@stop

    <ol class="breadcrumb">
        <li class="breadcrumb-item">Satatistikalar</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 ml-4" style="background: #fff;">
                
                  <div class="row">
                    <div class="col-lg-2">
                        <div class="col-xs-12 mt-4 text-center">
                            <h2>Yangiliklar <br> ({{$yangiliklar}} ta)</h2>
                          </div>
                        
                      <ul data-pie-id="svg" class="mt-4" style="font-size: 15px;">
                        <li data-value="{{$yangiliklar_is_active_true}}">Aktiv yangiliklar ({{$yangiliklar_is_active_true}})</li>
                        <li data-value="{{$yangiliklar_is_active_false}}">No aktiv yangiliklar ({{$yangiliklar_is_active_false}})</li>
                        <li data-value="{{$yangiliklar_is_moderate_false}}">Moderatsiya jarayonida ({{$yangiliklar_is_moderate_false}})</li>
                        <li data-value="{{$yangiliklar_is_moderate_true}}">Moderatsiyadan o'tgan ({{$yangiliklar_is_moderate_true}})</li>
                        
                      </ul>
                    </div>
                   
                    <div class="col-lg-3">
                      <div id="svg"></div>
                    </div>
                    <div class="col-lg-2">
                        <div class="col-xs-12 mt-4 text-center">
                            <h2>Modul mazmuni <br> ({{$modul}} ta)</h2>
                          </div>
                      <ul data-pie-id="my-cool-chart" data-options='{"donut": "true"}' class="mt-4" style="font-size: 15px;">
                        <li data-value="{{$modul_is_active_true}}">Aktiv resurslar({{$modul_is_active_true}})</li>
                        <li data-value="{{$modul_is_active_false}}">No aktiv resurslar ({{$modul_is_active_false}})</li>
                        <li data-value="{{$modul_is_moderate_false}}">Moderatsiya jarayonida ({{$modul_is_moderate_false}})</li>
                        <li data-value="{{$modul_is_moderate_true}}">Moderatsiyadan o'tgan ({{$modul_is_moderate_true}})</li>
                        </ul>
                        
                    </div>                  
                    <div class="col-lg-3 mr-4">
                        
                        <div id="my-cool-chart"></div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="animated fadeIn">
            <div class="ui-248">
                
                <div class="container">
                    <div class="col-xs-12 mt-4 text-center">
                        <h2 style="color: #fff;">Yangiliklar statistikasi</h2>
                      </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <!-- item -->
                            <div class="item">
                                <!-- Icon -->
                                <div class="icon bg-red"><i class="fa fa-desktop"></i></div>
                                <!-- Headings -->
                                <h3><a href="/statistika#">Umumiy yangiliklar soni</a></h3>
                                <h2><a href="/statistika#" class="red">{{$yangiliklar}}</a></h2>
                                <!-- Heading with arrow -->
                             
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!-- item -->
                            <div class="item">
                                <!-- Icon -->
                                <div class="icon bg-green"><i class="fa fa-gift"></i></div>
                                <!-- Headings -->
                                <h3><a href="/statistika#">Aktiv yangiliklar soni</a></h3>
                                <h2><a href="/statistika#" class="green">{{$yangiliklar_is_active_true}}</a></h2>
                                <!-- Heading with arrow -->
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!-- item -->
                            <div class="item">
                                <!-- Icon -->
                                <div class="icon bg-lblue"><i class="fa fa-bug"></i></div>
                                <!-- Headings -->
                                <h3><a href="/statistika#">No aktiv yangililar soni</a></h3>
                                <h2><a href="/statistika#" class="lblue">{{$yangiliklar_is_moderate_false}}</a></h2>
                                <!-- Heading with arrow -->
                              
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!-- item -->
                            <div class="item">
                                <!-- Icon -->
                                <div class="icon bg-orange"><i class="fa fa-code"></i></div>
                                <!-- Headings -->
                                <h3><a href="/statistika#">Moderatsiyadagi yangililar</a></h3>
                                <h2><a href="/statistika#" class="orange">{{$yangiliklar_is_moderate_false}}</a></h2>
                                <!-- Heading with arrow -->
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!-- item -->
                            <div class="item">
                                <!-- Icon -->
                                <div class="icon bg-rose"><i class="fa fa-cloud"></i></div>
                                <!-- Headings -->
                                <h3><a href="/statistika#">Moderatsiyadan o'tgan yangiliklar</a></h3>
                                <h2><a href="/statistika#" class="rose">{{$yangiliklar_is_moderate_true}}</a></h2>
                                <!-- Heading with arrow -->
                               
                            </div>
                        </div>
                        
                       
                      
                    </div>
                    
                    <div class="col-xs-12 mt-4 text-center">
                        <h2 style="color: #fff;">Modul mazmuni statistikasi</h2>
                      </div>
                    <div class="row">
                      
                        <div class="col-md-3 col-sm-6">
                            <!-- item -->
                            <div class="item">
                                <!-- Icon -->
                                <div class="icon bg-yellow"><i class="fa fa-ils"></i></div>
                                <!-- Headings -->
                                <h3><a href="/statistika#">Latest Visitor</a></h3>
                                <h2><a href="/statistika#" class="yellow">5,305</a></h2>
                                <!-- Heading with arrow -->
                                <h5 class="clearfix">Total Income <span>5,439 <i class="fa fa-angle-double-up green"></i></span></h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!-- item -->
                            <div class="item">
                                <!-- Icon -->
                                <div class="icon bg-purple"><i class="fa fa-download"></i></div>
                                <!-- Headings -->
                                <h3><a href="/statistika#">Latest Visitor</a></h3>
                                <h2><a href="/statistika#" class="purple">5,305</a></h2>
                                <!-- Heading with arrow -->
                                <h5 class="clearfix">Total Income <span>5,439 <i class="fa fa-angle-double-down red"></i></span></h5>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!-- item -->
                            <div class="item">
                                <!-- Icon -->
                                <div class="icon bg-blue"><i class="fa fa-automobile"></i></div>
                                <!-- Headings -->
                                <h3><a href="/statistika#">Latest Visitor</a></h3>
                                <h2><a href="/statistika#" class="blue">5,305</a></h2>
                                <!-- Heading with arrow -->
                                <h5 class="clearfix">Total Income <span>5,439 <i class="fa fa-angle-double-up green"></i></span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        
          
  
        <script>
            ;(function ($, window, document, undefined) {
                'use strict';

                var Pizza = {
                    version : '0.0.1',

                    settings : {
                    donut: false,
                    donut_inner_ratio: 0.4,   // between 0 and 1
                    percent_offset: 35,       // relative to radius
                    stroke_color: '#333',
                    stroke_width: 0,
                    show_percent: true,       // show or hide the percentage on the chart.
                    animation_speed: 500,
                    animation_type: 'elastic' // options: backin, backout, bounce, easein, 
                                                //          easeinout, easeout, linear
                    },

                    init : function (scope, options) {
                    var self = this;
                    this.scope = scope || document.body;

                    var pies = $('[data-pie-id]', this.scope);

                    $.extend(true, this.settings, options)

                    if (pies.length > 0) {
                        pies.each(function () {
                        return self.build($(this), options);
                        });
                    } else {
                        this.build($(this.scope), options);
                    }

                    this.events();
                    },

                    events : function () {
                    var self = this;

                    $(window).off('.pizza').on('resize.pizza', self.throttle(function () {
                        self.init();
                    }, 100));

                    $(this.scope).off('.pizza').on('mouseenter.pizaa mouseleave.pizza touchstart.pizza', '[data-pie-id] li', function (e) {
                        var parent = $(this).parent(),
                            path = Snap($('#' + parent.data('pie-id') + ' path[data-id="s' + $(this).index() + '"]')[0]),
                            text = Snap($(path.node).parent()
                            .find('text[data-id="' + path.node.getAttribute('data-id') + '"]')[0]),
                            settings = $(this).parent().data('settings');

                        if (/start/i.test(e.type)) {
                        $(path.node).siblings('path').each(function () {
                            if (this.nodeName) {
                            path.animate({
                                transform: 's1 1 ' + path.node.getAttribute('data-cx') + ' ' + path.node.getAttribute('data-cy')
                            }, settings.animation_speed, mina[settings.animation_type]);
                            Snap($(this).next()[0]).animate({
                                opacity: 0
                            }, settings.animation_speed);
                            }
                        });
                        }

                        if (/enter|start/i.test(e.type)) {
                        path.animate({
                            transform: 's1.05 1.05 ' + path.node.getAttribute('data-cx') + ' ' + path.node.getAttribute('data-cy')
                        }, settings.animation_speed, mina[settings.animation_type]);

                        if (settings.show_percent) {
                            text.animate({
                            opacity: 1
                            }, settings.animation_speed);
                        }
                        } else {
                        path.animate({
                            transform: 's1 1 ' + path.node.getAttribute('data-cx') + ' ' + path.node.getAttribute('data-cy')
                        }, settings.animation_speed, mina[settings.animation_type]);
                        text.animate({
                            opacity: 0
                        }, settings.animation_speed);
                        }
                    });
                    },

                    build : function(legends, options) {
                    var self = this;

                    var legend = legends, graph;

                    legend.data('settings', $.extend({}, self.settings, options, legend.data('options')));
                    self.data(legend, options || {});

                    return self.update_DOM(self.pie(legend));
                    },

                    data : function (legend, options) {
                    var data = [],
                        count = 0;

                    $('li', legend).each(function () {
                        var segment = $(this);

                        if (options.data) {
                        data.push({
                            value: options.data[segment.index()], 
                            color: segment.css('color'),
                            segment: segment
                        });
                        } else {
                        data.push({
                            value: segment.data('value'), 
                            color: segment.css('color'),
                            segment: segment
                        });
                        }
                    });

                    return legend.data('graph-data', data);
                    },

                    update_DOM : function (parts) {
                    var legend = parts[0],
                        graph = parts[1];

                    return $(this.identifier(legend)).html(graph);
                    },

                    pie : function (legend) {
                    // pie chart concept from JavaScript the 
                    // Definitive Guide 6th edition by David Flanagan
                    var settings = legend.data('settings'),
                        svg = this.svg(legend, settings),
                        data = legend.data('graph-data'),
                        total = 0,
                        angles = [],
                        start_angle = 0,
                        base = $(this.identifier(legend)).width() - 4;

                    for (var i = 0; i < data.length; i++) {
                        total += data[i].value;
                    }

                    for (var i = 0; i < data.length; i++) {
                        angles[i] = data[i].value / total * Math.PI * 2;
                    }

                    for (var i = 0; i < data.length; i++) {
                        var end_angle = start_angle + angles[i];
                        var cx = (base / 2),
                            cy = (base / 2),
                            r = ((base / 2) * 0.85);

                        if (!settings.donut) {
                        // Compute the two points where our wedge intersects the circle
                        // These formulas are chosen so that an angle of 0 is at 12 o'clock
                        // and positive angles increase clockwise
                        var x1 = cx + r * Math.sin(start_angle);
                        var y1 = cy - r * Math.cos(start_angle);
                        var x2 = cx + r * Math.sin(end_angle);
                        var y2 = cy - r * Math.cos(end_angle);

                        // This is a flag for angles larger than than a half circle
                        // It is required by the SVG arc drawing component
                        var big = 0;
                        if (end_angle - start_angle > Math.PI) big = 1;

                        // This string holds the path details
                        var d = "M" + cx + "," + cy +  // Start at circle center
                            " L" + x1 + "," + y1 +     // Draw line to (x1,y1)
                            " A" + r + "," + r +       // Draw an arc of radius r
                            " 0 " + big + " 1 " +      // Arc details...
                            x2 + "," + y2 +            // Arc goes to to (x2,y2)
                            " Z";                      // Close path back to (cx,cy)
                        }

                        var existing_path = $('path[data-id="s' + i + '"]', svg.node);

                        if (existing_path.length > 0) {
                        var path = Snap(existing_path[0]);
                        } else {
                        var path = svg.path();
                        }

                        var percent = (data[i].value / total) * 100.0;

                        // thanks to Raphael.js
                        var existing_text = $('text[data-id="s' + i + '"]', svg.node);

                        if (existing_text.length > 0) {
                        var text = Snap(existing_text[0]);
                        text.attr({
                            x: cx + (r + settings.percent_offset) * Math.sin(start_angle + (angles[i] / 2)),
                            y: cy - (r + settings.percent_offset) * Math.cos(start_angle + (angles[i] / 2))
                        });
                        } else {
                        var text = path.paper.text(cx + (r + settings.percent_offset) * Math.sin(start_angle + (angles[i] / 2)),
                            cy - (r + settings.percent_offset) * Math.cos(start_angle + (angles[i] / 2)), Math.ceil(percent) + '%');
                        }

                        var left_offset = text.getBBox().width / 2;

                        text.attr({
                        x: text.attr('x') - left_offset,
                        opacity: 0
                        });

                        text.node.setAttribute('data-id', 's' + i);
                        path.node.setAttribute('data-cx', cx);
                        path.node.setAttribute('data-cy', cy);

                        if (settings.donut) {
                        this.annular_sector(path.node, {
                            centerX:cx, centerY:cy,
                            startDegrees:start_angle, endDegrees:end_angle,
                            innerRadius: (r * settings.donut_inner_ratio), outerRadius:r
                        });
                        } else {
                        path.attr({d:d});
                        }

                        path.attr({
                        fill: data[i].color,
                        stroke: settings.stroke_color,
                        strokeWidth: settings.stroke_width
                        });

                        path.node.setAttribute('data-id', 's' + i);

                        this.animate(path, cx, cy, settings);

                        // The next wedge begins where this one ends
                        start_angle = end_angle;
                    }

                    return [legend, svg.node];
                    },

                    animate : function (el, cx, cy, settings) {
                    var self = this;

                    el.hover(function (e) {
                        var path = Snap(e.target),
                            text = Snap($(path.node).parent()
                            .find('text[data-id="' + path.node.getAttribute('data-id') + '"]')[0]);

                        path.animate({
                        transform: 's1.05 1.05 ' + cx + ' ' + cy
                        }, settings.animation_speed, mina[settings.animation_type]);

                        text.touchend(function () {
                        path.animate({
                            transform: 's1.05 1.05 ' + cx + ' ' + cy
                        }, settings.animation_speed, mina[settings.animation_type]);
                        });

                        if (settings.show_percent) {
                        text.animate({
                            opacity: 1
                        }, settings.animation_speed);
                        text.touchend(function () {
                            text.animate({
                            opacity: 1
                            }, settings.animation_speed);
                        });
                        }
                    }, function (e) {
                        var path = Snap(e.target),
                            text = Snap($(path.node).parent()
                            .find('text[data-id="' + path.node.getAttribute('data-id') + '"]')[0]);

                        path.animate({
                        transform: 's1 1 ' + cx + ' ' + cy
                        }, settings.animation_speed, mina[settings.animation_type]);

                        text.animate({
                        opacity: 0
                        }, settings.animation_speed);
                    });
                    },

                    svg : function (legend, settings) {
                    var container = $(this.identifier(legend)),
                        svg = $('svg', container),
                        width = container.width(),
                        height = width;

                    if (svg.length > 0) {
                        svg = Snap(svg[0]);
                    } else {
                        svg = Snap(width, height);
                    }

                    svg.node.setAttribute('width', width + settings.percent_offset);
                    svg.node.setAttribute('height', height + settings.percent_offset);
                    svg.node.setAttribute('viewBox', '-' + settings.percent_offset + ' -' + settings.percent_offset + ' ' + 
                        (width + (settings.percent_offset * 1.5)) + ' ' + 
                        (height + (settings.percent_offset * 1.5)));

                    return svg;
                    },

                    // http://stackoverflow.com/questions/11479185/svg-donut-slice-as-path-element-annular-sector
                    annular_sector : function (path, options) {
                    var opts = optionsWithDefaults(options);

                    var p = [ // points
                        [opts.cx + opts.r2*Math.sin(opts.startRadians),
                        opts.cy - opts.r2*Math.cos(opts.startRadians)],
                        [opts.cx + opts.r2*Math.sin(opts.closeRadians),
                        opts.cy - opts.r2*Math.cos(opts.closeRadians)],
                        [opts.cx + opts.r1*Math.sin(opts.closeRadians),
                        opts.cy - opts.r1*Math.cos(opts.closeRadians)],
                        [opts.cx + opts.r1*Math.sin(opts.startRadians),
                        opts.cy - opts.r1*Math.cos(opts.startRadians)],
                    ];

                    var angleDiff = opts.closeRadians - opts.startRadians;
                    var largeArc = (angleDiff % (Math.PI*2)) > Math.PI ? 1 : 0;
                    var cmds = [];
                    cmds.push("M"+p[0].join());                                // Move to P0
                    cmds.push("A"+[opts.r2,opts.r2,0,largeArc,1,p[1]].join()); // Arc to  P1
                    cmds.push("L"+p[2].join());                                // Line to P2
                    cmds.push("A"+[opts.r1,opts.r1,0,largeArc,0,p[3]].join()); // Arc to  P3
                    cmds.push("z");                                // Close path (Line to P0)
                    path.setAttribute('d',cmds.join(' '));

                    function optionsWithDefaults(o){
                        // Create a new object so that we don't mutate the original
                        var o2 = {
                        cx           : o.centerX || 0,
                        cy           : o.centerY || 0,
                        startRadians : (o.startDegrees || 0),
                        closeRadians : (o.endDegrees   || 0),
                        };

                        var t = o.thickness!==undefined ? o.thickness : 100;
                        if (o.innerRadius!==undefined)      o2.r1 = o.innerRadius;
                        else if (o.outerRadius!==undefined) o2.r1 = o.outerRadius - t;
                        else                                o2.r1 = 200           - t;
                        if (o.outerRadius!==undefined)      o2.r2 = o.outerRadius;
                        else                                o2.r2 = o2.r1         + t;

                        if (o2.r1<0) o2.r1 = 0;
                        if (o2.r2<0) o2.r2 = 0;

                        return o2;
                    }
                    },

                    identifier : function (legend) {
                    return '#' + legend.data('pie-id');
                    },

                    throttle : function(fun, delay) {
                    var timer = null;
                    return function () {
                        var context = this, args = arguments;
                        clearTimeout(timer);
                        timer = setTimeout(function () {
                        fun.apply(context, args);
                        }, delay);
                    };
                    }
                };

                window.Pizza = Pizza;

                }($, this, this.document));

                $(window).load(function() {
                    Pizza.init();
                })

          
            </script>
        </div>        
    </div>


<style>
    /************************
    Designed by : http://responsivewebinc.com
    ************************/
    /* Open Sans  */
    @import url('http://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600');
    /* General */
    body {
        color: #666666;
        font-size: 13px;
        line-height: 23px;
        background: -webkit-radial-gradient(top right, #23EC55, #2D51C1) !important ;
        font-family: 'Open Sans', sans-serif;
        -webkit-font-smoothing: antialiased;
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #666;
        font-family: 'Open Sans', sans-serif;
        font-weight: 600;
        margin: 2px 0px;
        padding: 0px;
    }
    h1 {
        font-size: 30px;
        line-height: 45px;
    }
    h2 {
        font-size: 25px;
        line-height: 40px;
    }
    h3 {
        font-size: 22px;
        line-height: 37px;
    }
    h4 {
        font-size: 18px;
        line-height: 33px;
    }
    h5 {
        font-size: 15px;
        line-height: 30px;
    }
    h6 {
        font-size: 13px;
        line-height: 28px;
    }
    p {
        margin: 2px 0px;
        padding: 0px;
        margin-bottom:5px;
        line-height:28px;
    }
    a{
        text-decoration: none;
        color: #777;
    }
    a:hover,a:active,a:focus {
        outline: 0;
        text-decoration: none;
        color: #999;
    }
    hr {
        margin: 10px 0px;
        padding: 0px;
        border-top: 0px;
        border-bottom: 1px solid #eee;
    }
    :focus {
        outline:none;
    }
    ::-moz-focus-inner {
        border:0;
    }
    /* Text color classes */
    .white {
    color: #ffffff !important;
    }
    .grey {
    color: #eeeeee !important;
    }
    .black {
    color: #555555 !important;
    }
    .red {
    color: #f75353 !important;
    }
    .green {
    color: #51d466 !important;
    }
    .lblue {
    color: #32c8de !important;
    }
    .blue {
    color: #609cec !important;
    }
    .orange {
    color: #f78153 !important;
    }
    .yellow {
    color: #fcd419 !important;
    }
    .purple {
    color: #cb79e6 !important;
    }
    .rose {
    color: #ff61e7 !important;
    }
    .brown {
    color: #d08166 !important;
    }
    /* Background color classes */
    .bg-white {
    background-color: #ffffff !important;
    }
    .bg-grey {
    background-color: #eeeeee !important;
    }
    .bg-black {
    background-color: #555555 !important;
    }
    .bg-red {
    background-color: #f75353 !important;
    }
    .bg-green {
    background-color: #51d466 !important;
    }
    .bg-lblue {
    background-color: #32c8de !important;
    }
    .bg-blue {
    background-color: #609cec !important;
    }
    .bg-orange {
    background-color: #f78153 !important;
    }
    .bg-yellow {
    background-color: #fcd419 !important;
    }
    .bg-purple {
    background-color: #cb79e6 !important;
    }
    .bg-rose {
    background-color: #ff61e7 !important;
    }
    .bg-brown {
    background-color: #d08166 !important;
    }
    /* Border color classes */
    .br-white {
    border: 1px solid #ffffff !important;
    }
    .br-grey {
    border: 1px solid #eeeeee;
    }
    .br-black {
    border: 1px solid #555555;
    }
    .br-red {
    border: 1px solid #f75353;
    }
    .br-green {
    border: 1px solid #51d466;
    }
    .br-lblue {
    border: 1px solid #32c8de;
    }
    .br-blue {
    border: 1px solid #609cec;
    }
    .br-orange {
    border: 1px solid #f78153;
    }
    .br-yellow {
    border: 1px solid #fcd419;
    }
    .br-purple {
    border: 1px solid #cb79e6;
    }
    .br-rose {
    border: 1px solid #ff61e7;
    }
    .br-brown {
    border: 1px solid #d08166;
    }
    /* Button classes */
    .btn {
        border-radius: 2px;
        position: relative;
    }
    .btn.btn-no-border {
        border: 0px !important;
    }
    /* Button colors */
    .btn.btn-white {
        background: #ffffff;
        color: #666666;
        border: 1px solid #dddddd;
    }
    .btn.btn-white:hover,
    .btn.btn-white:focus,
    .btn.btn-white.active,
    .btn.btn-white:active {
        background: #f7f7f7;
        color: #666666;
    }
    .btn.btn-grey {
        background: #eeeeee;
        color: #666666;
        border: 1px solid #d5d5d5;
    }
    .btn.btn-grey:hover,
    .btn.btn-grey:focus,
    .btn.btn-grey.active,
    .btn.btn-grey:active {
        background: #d5d5d5;
        color: #999;
    }
    .btn.btn-black {
        color: #ffffff;
        background: #666666;
        border: 1px solid #4d4d4d;
    }
    .btn.btn-black:hover,
    .btn.btn-black:focus,
    .btn.btn-black.active,
    .btn.btn-black:active {
        background: #4d4d4d;
        color: #ffffff;
    }
    .btn.btn-red {
        color: #ffffff;
        background: #ed5441;
        border: 1px solid #e52d16;
    }
    .btn.btn-red:hover,
    .btn.btn-red:focus,
    .btn.btn-red.active,
    .btn.btn-red:active {
        color: #ffffff;
        background: #e52d16;
    }
    .btn.btn-green {
        color: #ffffff;
        background: #51d466;
        border: 1px solid #30c247;
    }
    .btn.btn-green:hover,
    .btn.btn-green:focus,
    .btn.btn-green.active,
    .btn.btn-green:active {
        background: #30c247;
        color: #ffffff;
    }
    .btn.btn-lblue {
        color: #ffffff;
        background: #32c8de;
        border: 1px solid #1faabe;
    }
    .btn.btn-lblue:hover,
    .btn.btn-lblue:focus,
    .btn.btn-lblue.active,
    .btn.btn-lblue:active {
        background: #1faabe;
        color: #ffffff;
    }
    .btn.btn-blue {
        color: #ffffff;
        background: #609cec;
        border: 1px solid #3280e7;
    }
    .btn.btn-blue:hover,
    .btn.btn-blue:focus,
    .btn.btn-blue.active,
    .btn.btn-blue:active {
        background: #3280e7;
        color: #ffffff;
    }
    .btn.btn-orange {
        color: #ffffff;
        background: #f8a841;
        border: 1px solid #f69110;
    }
    .btn.btn-orange:hover,
    .btn.btn-orange:focus,
    .btn.btn-orange.active,
    .btn.btn-orange:active {
        background: #f69110;
        color: #ffffff;
    }
    .btn.btn-yellow {
        background: #fcd419;
        color: #ffffff;
        border: 1px solid #dfb803;
    }
    .btn.btn-yellow:hover,
    .btn.btn-yellow:focus,
    .btn.btn-yellow.active,
    .btn.btn-yellow:active {
        background: #dfb803;
        color: #ffffff;
    }
    .btn.btn-purple {
        background: #cb79e6;
        color: #ffffff;
        border: 1px solid #ba4ede;
    }
    .btn.btn-purple:hover,
    .btn.btn-purple:focus,
    .btn.btn-purple.active,
    .btn.btn-purple:active {
        background: #ba4ede;
        color: #ffffff;
    }
    .btn.btn-rose {
        background: #ff61e7;
        color: #ffffff;
        border: 1px solid #ff2edf;
    }
    .btn.btn-rose:hover,
    .btn.btn-rose:focus,
    .btn.btn-rose.active,
    .btn.btn-rose:active {
        background: #ff2edf;
        color: #ffffff;
    }
    .btn.btn-brown {
        background: #d08166;
        color: #ffffff;
        border: 1px solid #c4613f;
    }
    .btn.btn-brown:hover,
    .btn.btn-brown:focus,
    .btn.btn-brown.active,
    .btn.btn-brown:active {
        background: #c4613f;
        color: #ffffff;
    }
    /* Label */
    .label {
        border-radius: 2px;
        font-weight: normal;
        padding: 3px 7px;
        font-size: 12px;
        line-height: 18px;
    }
    /* Label sizes */
    .label.label-xs {
        font-size: 10px;
        padding: 1px 5px;
        line-height: 12px;
    }
    .label.label-sm {
        font-size: 11px;
        padding: 2px 6px;
        line-height: 15px;
    }
    .label.label-lg {
        font-size: 13px;
        padding: 5px 9px;
        line-height: 23px;
    }
    /* Label colors */
    .label.label-white{
        color: #666666 !important;
        background: #f7f7f7;
    }
    .label.label-grey {
        color: #666666 !important;
        background: #eeeeee;
    }
    .label.label-black {
        color: #ffffff;
        background: #666666;
    }
    .label.label-red {
        color: #ffffff;
        background: #ed5441;
    }
    .label.label-green {
        color: #ffffff;
        background: #51d466;
    }
    .label.label-lblue {
        color: #ffffff;
        background: #32c8de;
    }
    .label.label-blue {
        color: #ffffff;
        background: #609cec;
    }
    .label.label-orange {
        color: #ffffff;
        background: #f8a841;
    }
    .label.label-yellow {
        background: #fcd419;
        color: #ffffff;
    }
    .label.label-purple {
        background: #cb79e6;
        color: #ffffff;
    }
    .label.label-rose {
        background: #ff61e7;
        color: #ffffff;
    }
    .label.label-brown {
        background: #d08166;
        color: #ffffff;
    }
    /* Badges */
    .badge {
        min-width: 10px;
        padding: 3px 7px !important;
        font-size: 12px;
        line-height: 12px;
        font-weight: normal;
        display: inline-block;
        color: #fff;
        border-radius: 10px;
    }
    .badge.badge-white {
        color: #666666;
        background: #ffffff;
    }
    .badge.badge-grey {
        color: #a2a2a2;
        background: #eeeeee;
    }
    .badge.badge-black {
        color: #ffffff;
        background: #666666;
    }
    .badge.badge-red {
        color: #ffffff;
        background: #ed5441;
    }
    .badge.badge-green {
        color: #ffffff;
        background: #51d466;
    }
    .badge.badge-lblue {
        color: #ffffff;
        background: #32c8de;
    }
    .badge.badge-blue {
        color: #ffffff;
        background: #609cec;
    }
    .badge.badge-orange {
        color: #ffffff;
        background: #f8a841;
    }
    .badge.badge-yellow {
        color: #ffffff;
        background: #fcd419;
    }
    .badge.badge-purple {
        color: #ffffff;
        background: #cb79e6;
    }
    .badge.badge-rose {
        color: #ffffff;
        background: #ff61e7;
    }
    .badge.badge-brown {
        color: #ffffff;
        background: #d08166;
    }
    .btn .badge {
        position: absolute;
        top: -13px;
        right: -8px;
    }
    /* Social Media */
    .facebook {	background: #3280e7; }
    .facebook:hover { background: #134fa0; }
    .twitter { background: #32c8de;}
    .twitter:hover {	background: #188392;}
    .google-plus {background: #f96f4a;}
    .google-plus:hover {	background: #eb6440;}
    .linkedin  {	background: #729fda;}
    .linkedin:hover {background: #3069b6;}
    .pinterest {	background: #ed5441;}
    .pinterest:hover { background: #b72411;}
    .dropbox {background: #32c8de;}
    .dropbox:hover {	background: #188392;}
    .bitcoin {background: #f8a841;}
    .bitcoin:hover {	background: #cc7607;}
    .foursquare {background: #22bed4;}
    .foursquare:hover {background: #146f7c;}
    .flickr { background: #ff61e7;}
    .flickr:hover {	background: #fa00d4;}
    .github {background: #666666;}
    .github:hover {	background: #333333;}
    .instagram {	background: #d6917a;}
    .instagram:hover {background: #b35637;}
    .skype {background: #32c8de;}
    .skype:hover {background: #188392;}
    .tumblr {background: #84a1c8;}
    .tumblr:hover {background: #476d9f;}
    .vimeo {background: #32c8de;}
    .vimeo:hover {background: #188392;}
    .dribbble{background: #ff2edf;}
    .dribbble:hover {background: #c700a9;}
    .youtube {background: #ed5441;}
    .youtube:hover {	background: #b72411;}

    /* UI X */
    body{
        background:#f4f8fd;
    }
    .ui-248{
        margin:50px 0px;
    }
    .ui-248 .item{
        margin:30px auto;
        max-width:320px;
        border-radius:4px;
        border:1px solid #e7e7e7;
        background:#fff;
        box-shadow:2px 2px 0px 1px rgba(0,0,0,0.07);
        position:relative;
    }
    .ui-248 .item .icon{
        position:absolute;
        width:40px;
        height:40px;
        line-height:40px;
        text-align:center;
        color:#fff;
        box-shadow:0px 0px 2px rgba(0,0,0,0.1);
        border-radius:100px;
        top:-20px;
        left:20px;
        font-size:16px;
    }
    .ui-248 .item h3{
        margin-top:30px;
        margin-left:15px;
        font-size:14px;
        line-height:24px;
        text-transform:uppercase;
    }
    .ui-248 .item h2{
        font-weight:400;
        margin-left:15px;
        font-size:35px;
        margin-bottom:55px;
    }
    .ui-248 .item h5{
        position:absolute;
        bottom:-2px;
        width:100%;
        background:#fafafa;
        padding:5px 0px;
        padding-left:15px;
        border-top:1px solid #eee;
        font-size:13px;
        text-transform:uppercase;
    }
    .ui-248 .item h5 span{
        float:right;
        padding-right:15px;
    }


    /* line 20, ../sass/pizza.scss */
    [data-pie-id] li:nth-child(0) {
    color: blue;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id] li:nth-child(1) {
    color: #4d00ff;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id] li:nth-child(2) {
    color: #9900ff;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id] li:nth-child(3) {
    color: #e500ff;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id] li:nth-child(4) {
    color: #ff00cc;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id] li:nth-child(5) {
    color: #ff0080;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id] li:nth-child(6) {
    color: #ff0033;
    }

    /* line 26, ../sass/pizza.scss */
    ul[data-pie-id] {
    list-style: none;
    padding: 10px;
    }


    [data-pie-id='my-cool-chart'] li:nth-child(0) {
    color: #d84200;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id='my-cool-chart'] li:nth-child(1) {
    color: #fc4d00;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id='my-cool-chart'] li:nth-child(2) {
    color: #ff6420;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id='my-cool-chart'] li:nth-child(3) {
    color: #ff7d44;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id='my-cool-chart'] li:nth-child(4) {
    color: #ff9668;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id='my-cool-chart'] li:nth-child(5) {
    color: #ffaf8b;
    }

    /* line 20, ../sass/pizza.scss */
    [data-pie-id='my-cool-chart'] li:nth-child(6) {
    color: #ffc8af;
    }   
    </style>
@endsection

