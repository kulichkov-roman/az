$(document).ready(function() {
	
	'use strict';
	
	/* ==== Selecter ==== */
	var selL = $('select').length;
	if(selL != 0){
		$('select').selecter({
			mobile:true
		});
	}
	
	/* ==== UI Slider ==== */
	var range1 = $('#range1').length;
	if(range1 != 0){
		$( "#range1" ).slider({
			range: "min",
			value: 7500,
			min: 1,
			max: 30000,
			slide: function( event, ui ) {
				$( "#range-data1" ).val(  + ui.value );
			}
		});
		$( "#range-data1" ).val(  + $( "#range1" ).slider( "value" ) );
	}
	
	var range2 = $('#range2').length;
	if(range2 != 0){
		$( "#range2" ).slider({
			range: "min",
			value: 30,
			min: 1,
			max: 60,
			slide: function( event, ui ) {
				$( "#range-data2" ).val(  + ui.value );
			}
		});
		$( "#range-data2" ).val(  + $( "#range2" ).slider( "value" ) );
	}
	
	
	/* ==== Form validate ==== */
	$('#contact-form').validate({
		rules: {
			name: {
				required: true,
			},
			email: {
				required: true,
				email:true
			},
			result:{
				required: true,
			}
		},
		messages: {
			name: "",
			result: "",
			email: {
				required: "",
				email: ""
			}
		}
	});
	
	$('#subscribe-form').validate({
		rules: {
			email: {
				required: true,
				email:true
			}
		},
		messages: {
			email: {
				required: "",
				email: ""
			}
		}
	});
	
	/* === Toggle nav ==== */
	
	
	
	$('.toggle-nav').click(function(){
		if(!$(this).hasClass('t-menu')){
			$(this).addClass('t-menu');
			$('.menu').addClass('toggle-class');
		}
		else{
			$(this).removeClass('t-menu');
			$('.menu').removeClass('toggle-class');
		}
	});
	
	$('.nav-close').click(function(){
		$(this).parent().removeClass('toggle-class');
		$('.toggle-nav').removeClass('t-menu');
	});
	
	if($(window).width() <= 768){
		$('.menu ul li').click(function(){
			$('.menu ul li .sub-menu').hide();
			if(!$(this).hasClass('open')){
				$('.menu ul li').removeClass('open');
				$(this).addClass('open');
				$(this).find('.sub-menu').show();
			}
			else{
				$(this).removeClass('open');
				$(this).find('.sub-menu').hide();
			}
		});
	}
	if($(window).width() >= 768){
		$('.menu ul li').click(function(){
			$('.menu ul li .sub-menu').hide();
			if(!$(this).hasClass('open')){
				$('.menu ul li').removeClass('open');
				$(this).addClass('open');
				$(this).find('.sub-menu').show();
			}
			else{
				$(this).removeClass('open');
				$(this).find('.sub-menu').hide();
			}
		});
	}
	
});