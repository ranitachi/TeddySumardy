<!DOCTYPE html>
<!-- saved from url=(0023)http://eng.ui.ac.id/en/ -->
<html lang="en-US" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths cssfilters cssresize svgfilters" style="">
    
<head>
    @include('frontend.includes.head')
    @yield('title')
</head>

<body class="home page-template-default page page-id-1389  responsive menu-style-one templateid_179264 template-builder wide rt_content_animations header-design1" style="padding-top:0px;">
		
    <div id="container">   

        <section id="mobile_bar" class="clearfix">
            <div class="mobile_menu_control icon-menu"></div>
            <div class="top_bar_control icon-cog"></div>    
        </section>

        @include('frontend.includes.toplink')

        @include('frontend.includes.navbar')

        @yield('content')
        
	</div>

    @include('frontend.includes.footer')
    
    @include('frontend.includes.script')

    @yield('footscript')

</body>
</html>