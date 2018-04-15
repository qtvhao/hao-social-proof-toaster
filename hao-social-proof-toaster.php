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

#haosf_toasts_container.WpBxx4GfonOpx4GfVcYt_0{
	bottom: auto;
	top: 0;
}

.bounceBottom-enter-active{
	animation: bounceBottomUp 1.1s linear both;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0.WpBx2mQFonOp2mQFVcYt_0{
	border-radius: 0 0 10px 10px;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx1JYFonOp1JYFVcYt_0{
	display: block;
	position: absolute;
	float: left;
	top: 3px;
	left: 3px;
	height: 64px;
	width: 64px;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx1JYFonOp1JYFVcYt_0 img{
	border-radius: 10px;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx2EbConOp2EbCVcYt_0{
	margin-left: 70px;
	padding-right: 8px;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx2EbConOp2EbCVcYt_0 .WpBx2AUlonOp2AUlVcYt_0,#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx2EbConOp2EbCVcYt_0 .WpBx13BWonOp13BWVcYt_0{
	display: block;
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow-x: hidden;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx2EbConOp2EbCVcYt_0 .WpBx2AUlonOp2AUlVcYt_0{
	line-height: 17.5px;
	font-size: 14px;
	font-weight: 700;
	color: #222;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx2EbConOp2EbCVcYt_0 .WpBx13BWonOp13BWVcYt_0{
	line-height: 17.5px;
	font-size: 12px;
	color: #738c98;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx2EbConOp2EbCVcYt_0 .WpBx2PlWonOp2PlWVcYt_0{
	line-height: 1em;
	display: inline-block;
	color: #90a4ae;
	font-size: 11px;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx2EbConOp2EbCVcYt_0 .WpBx3eNuonOp3eNuVcYt_0{
	margin-left: 2px;
	display: inline-block;
	position: relative;
	padding: 3px 5px;
	border-radius: 5px;
	z-index: 10000000;
	font-size: 10px;
	line-height: 1em;
	color: #adbcc4;
	text-decoration: none!important;
	cursor: pointer;
	background-color: #fff;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx2EbConOp2EbCVcYt_0 .WpBx3eNuonOp3eNuVcYt_0 i{
	display: inline;
	margin: -3px 2px;
	vertical-align: middle;
	line-height: 1em;
	font-size: .75rem;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx2EbConOp2EbCVcYt_0 .WpBx3eNuonOp3eNuVcYt_0 i svg{
	overflow: hidden;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx2EbConOp2EbCVcYt_0 .WpBx3eNuonOp3eNuVcYt_0 .WpBx12wMonOp12wMVcYt_0{
	color: #0089d8;
	text-decoration: none!important;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx1N_EonOp1N_EVcYt_0{
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

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx1N_EonOp1N_EVcYt_0 svg{
	width: 11px;
	height: 11px;
	margin: 0;
	padding: 0;
	display: inline-block;
}

#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx1N_EonOp1N_EVcYt_0:hover{
	opacity: .4;
}

#WpBx3dGionOp3dGiVcYt_0 .WpBx2B_4onOp2B_4VcYt_0{
	pointer-events: auto;
	overflow: hidden;
	position: relative;
	height: 70px;
	width: 96%;
	margin: 0 auto;
	background-color: #fff;
	padding: 10px;
	box-sizing: border-box;
	line-height: 1em;
	box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05);
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
}

#WpBx3dGionOp3dGiVcYt_0 .WpBx2B_4onOp2B_4VcYt_0.WpBx3yK7onOp3yK7VcYt_0{
	border-radius: 0 0 10px 10px;
}

#WpBx3dGionOp3dGiVcYt_0 .WpBx2B_4onOp2B_4VcYt_0 .WpBx159fonOp159fVcYt_0{
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

#WpBx3dGionOp3dGiVcYt_0 .WpBx2B_4onOp2B_4VcYt_0 .WpBx159fonOp159fVcYt_0 svg{
	width: 11px;
	height: 11px;
	margin: 0;
	padding: 0;
	display: inline-block;
}

#WpBx3dGionOp3dGiVcYt_0 .WpBx2B_4onOp2B_4VcYt_0 .WpBx159fonOp159fVcYt_0:hover{
	opacity: .4;
}

#WpBx3acHonOp3acHVcYt_0{
	font-family: Roboto,helvetica,arial,sans-serif;
}

#WpBx3acHonOp3acHVcYt_0 .WpBx15RvonOp15RvVcYt_0{
	display: block;
	margin: 9px 0 0 67px;
	font-size: 14px;
	color: #666;
	text-overflow: ellipsis;
	overflow: hidden;
	white-space: nowrap;
}

#WpBx3acHonOp3acHVcYt_0 .WpBx15RvonOp15RvVcYt_0 .WpBx1Jr6onOp1Jr6VcYt_0{
	font-weight: 700;
}

#WpBx3acHonOp3acHVcYt_0 .WpBx15RvonOp15RvVcYt_0 .WpBx2fwXonOp2fwXVcYt_0{
	display: inline-block;
	padding: 3px;
	line-height: 1em;
	border-radius: 3px;
	background-color: rgba(0,149,247,.05);
	color: #0095f7;
	font-weight: 700;
	margin: 0 3px 0 0;
}

#WpBx3acHonOp3acHVcYt_0 .WpBx15RvonOp15RvVcYt_0.WpBx1gGxonOp1gGxVcYt_0{
	margin: 15px 0 0 67px;
}

#WpBx3acHonOp3acHVcYt_0 .WpBx14UVonOp14UVVcYt_0{
	font-size: 10px;
	color: #ddd;
	font-weight: 700;
	margin: 1px 0 0 70px;
}

#WpBx3acHonOp3acHVcYt_0 .WpBx14UVonOp14UVVcYt_0 a{
	color: rgba(0,149,247,.5);
	text-decoration: none!important;
}

#WpBx3acHonOp3acHVcYt_0 .WpBx14UVonOp14UVVcYt_0 i{
	display: inline-block;
	margin: -4px 2px;
	vertical-align: middle;
	line-height: 1em;
	font-size: .75rem;
}

#WpBx3acHonOp3acHVcYt_0 .WpBx14UVonOp14UVVcYt_0 i svg{
	overflow: hidden;
}

#WpBx3acHonOp3acHVcYt_0 .WpBxH0WDonOpH0WDVcYt_0{
	display: block;
	position: absolute;
	left: 0;
	top: 0;
	width: 69px;
	height: 69px;
	border-radius: 50%;
	padding: 20px;
}

#WpBx3acHonOp3acHVcYt_0 .WpBxH0WDonOpH0WDVcYt_0 .WpBxh0ePonOph0ePVcYt_0{
	display: block;
	width: 32px;
	height: 32px;
	border-radius: 50%;
	background: #0095f7;
	box-shadow: 0 0 0 rgba(0,149,247,.4);
	animation: WpBxh0ePonOph0ePVcYt_0 2s infinite;
}

#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0.WpBx6ip1onOp6ip1VcYt_0{
	border-radius: 0 0 10px 10px;
}

#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0 .WpBxtoc3onOptoc3VcYt_0{
	font-weight: 700;
	display: inline-block;
	padding: 3px;
	line-height: 1.1em;
	background-color: rgba(0,149,247,.1);
	margin-bottom: 2px;
	border-radius: 3px;
}

#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0 .WpBx37xponOp37xpVcYt_0{
	padding: 10px;
	width: 70px;
	height: 54px;
	display: flex;
	-ms-flex-align: center;
	align-items: center;
	transition-duration: .8s;
	transition-property: transform;
}

#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0 .WpBx37xponOp37xpVcYt_0 img{
	height: 50px;
	width: 50px;
	border-radius: 50%;
}

#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0 .WpBxqu5HonOpqu5HVcYt_0{
	padding: 0 15px;
	font-size: 15px;
}

#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0 .WpBxqu5HonOpqu5HVcYt_0 div,#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0 .WpBxqu5HonOpqu5HVcYt_0 span{
	color: #0095f7;
}

#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0 .WpBx29e1onOp29e1VcYt_0{
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

#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0 .WpBx29e1onOp29e1VcYt_0 svg{
	width: 11px;
	height: 11px;
	margin: 0;
	padding: 0;
	display: inline-block;
}

#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0 .WpBx29e1onOp29e1VcYt_0:hover{
	opacity: .4;
}

#WpBx1BlYonOp1BlYVcYt_0{
	position: fixed;
	left: 0;
	right: 0;
	bottom: 0;
	pointer-events: none;
	z-index: 1000000;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx2KJlonOp2KJlVcYt_0{
	pointer-events: auto;
	position: fixed;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 1000000;
	background-color: #fff;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx2KJlonOp2KJlVcYt_0 iframe{
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	height: 100%;
	width: 100%;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0{
	z-index: 10000000;
	pointer-events: auto;
	overflow: hidden;
	position: relative;
	width: 96%;
	margin: 0 auto;
	border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	background-color: #fefefe;
	color: #0095f7;
	padding: 30px 10px;
	box-sizing: border-box;
	line-height: 1em;
	display: flex;
	-ms-flex-direction: column;
	flex-direction: column;
	-ms-flex-align: center;
	align-items: center;
	text-align: center;
	transition: all .2s linear;
	box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05),0 10px 100px rgba(0,0,0,.1);
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBx3dAgonOp3dAgVcYt_0{
	position: absolute;
	background-color: #0095f7;
	height: 4px;
	top: 0;
	left: 0;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBx1EyZonOp1EyZVcYt_0{
	margin: 10px auto;
	width: 80px;
	height: 80px;
	display: inline-block;
	border-radius: 50%;
	box-shadow: 0 2px 4px rgba(0,0,0,.1);
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBx1EyZonOp1EyZVcYt_0 img{
	height: 80px;
	width: 80px;
	border: 2px solid #fff;
	display: block;
	border-radius: 50%;
	background: transparent;
	box-shadow: 0 0 0 rgba(0,149,247,.4);
	animation: WpBx1k5KonOp1k5KVcYt_0 2s infinite;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBx2PMeonOp2PMeVcYt_0{
	position: absolute;
	top: 12px;
	right: 10px;
	opacity: .1;
	cursor: pointer;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBx2PMeonOp2PMeVcYt_0:hover{
	opacity: .15;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBx2cVkonOp2cVkVcYt_0{
	display: block;
	width: 100%;
	margin-top: 15px;
	line-height: 1em;
	padding: 25px;
	border-radius: 5px;
	color: #fff;
	background-color: #0095f7;
	font-weight: 700;
	cursor: pointer;
	box-shadow: 2px 0 3px 0 rgba(0,0,0,.05),0 1px 2px 0 rgba(0,0,0,.08);
	text-decoration: none!important;
	transition: all .1s linear;
	font-size: 20px;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBx2cVkonOp2cVkVcYt_0:hover{
	box-shadow: 0 5px 15px 0 rgba(0,0,0,.1),0 1px 3px 0 rgba(0,0,0,.1);
	text-decoration: none!important;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBx2cVkonOp2cVkVcYt_0:active{
	box-shadow: none;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBxaOxlonOpaOxlVcYt_0{
	opacity: .7;
	color: #90a4ae;
	font-size: 12px;
	line-height: 1em;
	font-weight: 700;
	padding: 10px;
	text-align: center;
	position: absolute;
	bottom: 5px;
	left: 0;
	right: 0;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBxaOxlonOpaOxlVcYt_0 a{
	color: #0095f7;
}

#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBxaOxlonOpaOxlVcYt_0 a:hover{
	text-decoration: none;
}

.WpBx1AeFonOp1AeFVcYt_0{
	z-index: 100000;
	background-color: rgba(0,0,0,.5);
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	bottom: 0;
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

.WpBx3zjZonOp3zjZVcYt_0{
	height:70px;
	position: relative;
	padding: 10px!important;
}

.elementor-widget-html div .WpBx3zjZonOp3zjZVcYt_0{
	background-color:#ffffff;
}

.elementor-widget-html div .WpBx3zjZonOp3zjZVcYt_0.yp_onscreen{
	animation-name:slideInUp;
	animation-delay:0s;
	animation-duration:0.82s;
}

.elementor-widget-html div .WpBx2EbConOp2EbCVcYt_0{
	padding-left:12px !important;
}

.WpBx2EbConOp2EbCVcYt_0{
	line-height: 12px;
}

@media screen and (min-width:480px){

	#haosf_toasts_container.WpBx2TNmonOp2TNmVcYt_0{
		left: auto;
		right: 10px;
	}
	
	#WpBx2fZIonOp2fZIVcYt_0{
		right: auto;
	}
	
	#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0{
		background: white;
		width: 320px;
		margin: 0 0 10px 10px;
		border-radius: 50px;
		box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05);
		-webkit-box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05);
	}
	
	#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0.WpBx3SlronOp3SlrVcYt_0{
		border-radius: 5px;
	}
	
	#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0.WpBx2riIonOp2riIVcYt_0{
		cursor: pointer;
		transition: all .1s ease-in-out;
	}
	
	body.yp-selector-hover #WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0.WpBx2riIonOp2riIVcYt_0{
		box-shadow: 0 0 1px rgba(0,0,0,.1),0 3px 6px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.2);
		-webkit-box-shadow: 0 0 1px rgba(0,0,0,.1),0 3px 6px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.2);
		transform: translateY(-3px);
		-webkit-transform: translateY(-3px);
	}
	
	#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx1JYFonOp1JYFVcYt_0 img{
		border-radius: 50%;
	}
	
	#WpBx2fZIonOp2fZIVcYt_0 .WpBx3zjZonOp3zjZVcYt_0 .WpBx1JYFonOp1JYFVcYt_0 img.WpBx3SlronOp3SlrVcYt_0{
		border-radius: 5px;
	}
	
	#WpBx3dGionOp3dGiVcYt_0{
		right: auto;
	}
	
	#WpBx3dGionOp3dGiVcYt_0 .WpBx2B_4onOp2B_4VcYt_0{
		width: 320px;
		margin: 0 0 10px 10px;
		border-radius: 50px;
		box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05);
		-webkit-box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05);
	}
	
	#WpBx3dGionOp3dGiVcYt_0 .WpBx2B_4onOp2B_4VcYt_0.WpBx3_88onOp3_88VcYt_0{
		border-radius: 5px;
	}
	
	#WpBx3dGionOp3dGiVcYt_0 .WpBx2B_4onOp2B_4VcYt_0.WpBxD2zVonOpD2zVVcYt_0{
		cursor: pointer;
		transition: all .1s ease-in-out;
	}
	
	body.yp-selector-hover #WpBx3dGionOp3dGiVcYt_0 .WpBx2B_4onOp2B_4VcYt_0.WpBxD2zVonOpD2zVVcYt_0{
		box-shadow: 0 0 1px rgba(0,0,0,.1),0 3px 6px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.2);
		-webkit-box-shadow: 0 0 1px rgba(0,0,0,.1),0 3px 6px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.2);
		transform: translateY(-3px);
		-webkit-transform: translateY(-3px);
	}
	
	#WpBx2lrionOp2lriVcYt_0{
		right: auto;
	}
	
	#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0{
		width: 320px;
		margin: 0 0 10px 10px;
		box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05);
		-webkit-box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05);
		border-radius: 5px;
	}
	
	#WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0.WpBx27wVonOp27wVVcYt_0{
		cursor: pointer;
		transition: all .1s ease-in-out;
	}
	
	body.yp-selector-hover #WpBx2lrionOp2lriVcYt_0 .WpBx1XogonOp1XogVcYt_0.WpBx27wVonOp27wVVcYt_0{
		box-shadow: 0 0 1px rgba(0,0,0,.1),0 3px 6px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.2);
		-webkit-box-shadow: 0 0 1px rgba(0,0,0,.1),0 3px 6px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.2);
		transform: translateY(-3px);
		-webkit-transform: translateY(-3px);
	}
	
	#WpBx1BlYonOp1BlYVcYt_0{
		right: auto;
		bottom: 10px;
	}
	
	#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0{
		width: 320px;
		border-radius: 5px;
		margin: 0 0 0 10px;
		box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05),0 10px 100px rgba(0,0,0,.1);
		-webkit-box-shadow: 0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.05),0 8px 50px rgba(0,0,0,.05),0 10px 100px rgba(0,0,0,.1);
		padding: 30px 10px 50px;
	}
	
	#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0.WpBx-xBDonOp-xBDVcYt_0{
		border-radius: 5px;
	}
	
	#WpBx1BlYonOp1BlYVcYt_0 .WpBx3YFlonOp3YFlVcYt_0 .WpBx2cVkonOp2cVkVcYt_0{
		display: inline-block;
		padding: 15px 25px;
		width: auto;
		font-size: 17px;
	}
	
}
CSS;
	$toasts = <<<HTML
	
            <div style="">
                <div style="">
                    <div id="WpBx2fZIonOp2fZIVcYt_0">
                        <div class="WpBx3zjZonOp3zjZVcYt_0 yp_onscreen">
                            <div class="WpBx1JYFonOp1JYFVcYt_0"><img class=""
                                                                     src="$imageSource">
                            </div>
                            <div class="WpBx2EbConOp2EbCVcYt_0">
                                <div class="WpBx2AUlonOp2AUlVcYt_0">Arun from New Delhi, DL</div>
                                <div class="WpBx13BWonOp13BWVcYt_0">Recently signed up for Proof</div>
                                <div class="WpBx2PlWonOp2PlWVcYt_0">2 hours ago</div>
                                <div class="WpBx3eNuonOp3eNuVcYt_0"></div>
                            </div>
                            <div class="WpBx1N_EonOp1N_EVcYt_0">
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
