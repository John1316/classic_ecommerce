'use strict';

$(function() {
	/*
  |--------------------------------------------------------------------------
  | Configure your website
  |--------------------------------------------------------------------------
  |
  | We provided several configuration variables for your ease of development.
  | Read their complete description and modify them based on your need.
  |
  */

	page.config({
		/*
    |--------------------------------------------------------------------------
    | Disable AOS on mobile
    |--------------------------------------------------------------------------
    |
    | If true, the Animate On Scroll animations don't run on mobile devices.
    |
    */

		disableAOSonMobile: true,

		/*
    |--------------------------------------------------------------------------
    | Smooth Scroll
    |--------------------------------------------------------------------------
    |
    | If true, the browser's scrollbar moves smoothly on scroll and gives your
    | visitor a better experience for scrolling.
    |
    */

		smoothScroll: true,
	});

	/*
  |--------------------------------------------------------------------------
  | Custom Javascript code
  |--------------------------------------------------------------------------
  |
  | Now that you configured your website, you can write additional Javascript
  | code below this comment. You might want to add more plugins and initialize
  | them in this file.
  |
  */
	$("#cart-btn").click(function () {
		$("#cart").animate({right: "0px",},250);
	});
	$("#x-cart-btn").click(function () {
		$("#cart").animate({ right: "-400px" }, 250);
	});
	// $("#cart").hide();
	$(document).ready(function () {
		$("#loader").fadeOut(2500, function () {
			$("body").css("overflow", "auto");
		});
	});

	$(document).on("click", ".toggle-password", function () {
		$(this).toggleClass("fa-eye fa-eye-slash");

		var input = $("#password");
		input.attr("type") === "password"
			? input.attr("type", "text")
			: input.attr("type", "password");
	});
	$(document).on("click", ".toggle-confirmPassword", function () {
		$(this).toggleClass("fa-eye fa-eye-slash");

		var input = $("#confirmPass");
		input.attr("type") === "password"
			? input.attr("type", "text")
			: input.attr("type", "password");
	});
	// filter toogle button
	$("#filterBtn").click(function () {
		$("#filter").slideToggle(1500);
	});

	// extras card
	$("#extras").click(function () {
		$("#extrasCard").slideToggle(1500);
	});
	$("#extrasCard").hide();
	
	// booking page search card
	$("#bookingFilterBtn").click(function () {
		$("#bookingFilterCard").slideToggle(1500);
	});




	


	

});

