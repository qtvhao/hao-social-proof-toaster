<?php
/**
 *
 * Plugin Name: Vietnam Social Proof Toaster
 * Plugin URI: https://github.com/qtvhao/social-proof-toaster
 * Author: Hao Nghiem
 * Version: 1.0.0
 * Author URI: https://www.linkedin.com/in/hào-nghiêm-xuân-b61a60106/
 * Text Domain: sproof
 * License: GPLv3
 */

/*
* Init the plugin
*/

add_action('init', 'init_sproof_inject');
function init_sproof_inject() {
	add_action('wp_footer', 'sproof_inject_footer_start_html', 0);
}

/*
* functions for echoing the HTML
*/
function sproof_inject_footer_start_html() {
	$set = ['','set2','set3','set4'][rand(1,4)];
	$randomSlug = rand(1,100);
	$imageSource = "https://robohash.org/$randomSlug.png?size=100x100&set=$set";
	$style = <<<'CSS'
      #haosf_toasts_wrapper div{
      
	-moz-osx-font-smoothing: grayscale!important;
	color: #2c3e50;
	font-family: Roboto,helvetica,arial,sans-serif!important;
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	display: block;
	box-sizing: border-box;
	text-align: left;
}

#haosf_toasts_wrapper img{
	margin: 0;
	padding: 0;
	border-radius: 0;
}

#haosf_toasts_container{
	position: fixed;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 1000000;
}

.bounceBottom-enter-active{
	animation: bounceBottomUp 1.1s linear both;
}

#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_container_side_image{
	display: block;
	position: absolute;
	float: left;
	top: 3px;
	left: 3px;
	height: 64px;
	width: 64px;
}

#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_container_side_image img{
	border-radius: 10px;
}

#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_container_heading{
	margin-left: 70px;
	padding-right: 8px;
}

#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_container_heading .haosf_toast_person,#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_container_heading .haosf_toast_message{
	display: block;
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow-x: hidden;
}

#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_container_heading .haosf_toast_person{
	line-height: 17.5px;
	font-size: 14px;
	font-weight: 700;
	color: #222;
}

#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_container_heading .haosf_toast_message{
	line-height: 17.5px;
	font-size: 12px;
	color: #738c98;
}

#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_container_heading .haosf_toast_time_diff{
	line-height: 1em;
	display: inline-block;
	color: #90a4ae;
	font-size: 11px;
}

#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_button_close_wrapper{
	cursor: pointer;
	position: absolute;
	right: 18px;
	top: 4px;
	opacity: .1;
	width: 18px;
	height: 18px;
	margin: 0;
	padding: 0;
}

#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_button_close_wrapper svg{
	width: 11px;
	height: 11px;
	margin: 0;
	padding: 0;
	display: inline-block;
}

#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_button_close_wrapper:hover{
	opacity: .4;
}

.fadeIn-leave-active{
	opacity: 0;
}

.fadeIn-leave-active,.fadeUp-enter-active{
	transition: opacity .3s;
}

.fadeUp-enter-active{
	animation: fadeUp 1s linear both;
	opacity: 1;
}

.haosf_toast_container{
	height:70px;
	position: relative;
	padding: 10px!important;
}

.elementor-widget-html div .haosf_toast_container{
	background-color:#ffffff;
}
@-webkit-keyframes slideInUp{
0%{-webkit-transform:translate3d(0,100%,0);transform:translate3d(0,100%,0);visibility:visible}
100%{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}}
@keyframes slideInUp{0%{-webkit-transform:translate3d(0,100%,0);transform:translate3d(0,100%,0);visibility:visible}100%{-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}}
.haosf_toast_container.haosf_slideInUp{
	animation-name:slideInUp;
	animation-delay:0s;
	animation-duration:0.82s;
}

.elementor-widget-html div .haosf_toast_container_heading{
	padding-left:12px !important;
}

.haosf_toast_container_heading{
	line-height: 12px;
}

@media screen and (min-width:480px){

	#haosf_toast_wrapper_1997{
		right: auto;
	}
	
	#haosf_toast_wrapper_1997 .haosf_toast_container{
		background: white;
		width: 320px;
		margin: 0 0 10px 10px;
		border-radius: 50px;
		box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05);
		-webkit-box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05);
	}
	
	#haosf_toast_wrapper_1997 .haosf_toast_container .haosf_toast_container_side_image img{
		border-radius: 50%;
	}
}
CSS;
	$toasts = <<<HTML
	
            <div style="">
                <div style="">
                    <div id="haosf_toast_wrapper_1997">
                        <div class="haosf_toast_container haosf_slideInUp">
                            <div class="haosf_toast_container_side_image">
                            	<img class="" src="$imageSource">
                            </div>
                            <div class="haosf_toast_wrapper_heading">
	                            <div class="haosf_toast_container_heading">
	                                <div class="haosf_toast_person"><span class="haosf_toast_person_name">Arun</span> from <span class="haosf_toast_person_address">New Delhi, DL</span></div>
	                                <div class="haosf_toast_message">Recently signed up for Proof</div>
	                                <div class="haosf_toast_time_diff">2 hours ago</div>
	                            </div>
							</div>
                            <div class="haosf_toast_button_close_wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
HTML;
	$html = <<<HTML
	<div id="haosf_toasts_wrapper">
    <div id="haosf_toasts_container" class="">
        <div>
        $toasts
        </div>
    </div>
    <div></div>
</div>
      
HTML;
	echo $html . "<style>$style</style>";
}
