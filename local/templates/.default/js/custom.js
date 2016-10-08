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
		var $minStart;
		var $maxStart;
		var $minStartValue;
		var $dataMinDefault = 1000;
		$('.range-data1').each(function(){
			$minStart = $(this).attr('data-min-start');
			$minStartValue = $(this).val();
		});
		$('.range-data-max1').each(function(){
			$maxStart = $(this).attr('data-max-start');
		});
		function dataDefault(){
			if($minStartValue === ''){
				+ $dataMinDefault;
			}
		}
		$( "#range1" ).slider({
			range: "min",
			value: $dataMinDefault,
			min: 0,
			max: 30000,
			step:1000,
			slide: function( event, ui ) {
				$( ".range-data1" ).val(  + ui.value );
			}
		});
		if($minStartValue != ''){
			$( ".range-data1" ).val(  + $minStartValue);
			$( "#range1" ).slider({
				value:$minStartValue
			})
		}
		else{
			$( ".range-data1" ).val(  + $( "#range1" ).slider( "value" ));
		}
	}
	
	var range2 = $('#range2').length;
	if(range2 != 0){
		var $minStart2;
		var $maxStart2;
		var $minStartValue2;
		var $dataMinDefault2 = 1;
		$('.range-data2').each(function(){
			$minStart2 = $(this).attr('data-min-start');
			$minStartValue2 = $(this).val();
		});
		$('.range-data-max2').each(function(){
			$maxStart2 = $(this).attr('data-max-start');
		});
		function dataDefault2(){
			if($minStartValue2 === ''){
				+ $dataMinDefault2;
			}
		}
		$( "#range2" ).slider({
			range: "min",
			value: $dataMinDefault2,
			min: 0,
			max: 60,
			step:1,
			slide: function( event, ui ) {
				$( ".range-data2" ).val(  + ui.value );
			}
		});
		if($minStartValue2 != ''){
			$( ".range-data2" ).val(  + $minStartValue2);
			$( "#range2" ).slider({
				value:$minStartValue2
			})
		}
		else{
			$( ".range-data2" ).val(  + $( "#range2" ).slider( "value" ));
		}
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
