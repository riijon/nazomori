import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';


$(document).foundation();

// SMOOTH SCROLL
// #にダブルクォーテーションが必要
$('a[href^="#"]').click(function () {
  var speed = 400;
  var href = $(this).attr("href");
  var target = $(href == "#" || href == "" ? 'html' : href);
  var position = target.offset().top;
  $('body,html').animate({scrollTop: position}, speed, 'swing');
  return false;
});

$(window).on('scroll', function () {
  var h = $(window).height();
  $('.header').toggleClass('fixed', $(this).scrollTop() > h + 40);
  // console.log('scroll');
});

var tokei = $('.tokei');

$(window).on('load resize', function () {
  var w = $(window).width();
  var h = $(window).height();
  var resizePer = (w / h) / 1.8;
  var resizePerT = (h / w) / 0.726;
  var tokeiW = 228 * resizePer;
  var tokeiTop = 103 / resizePer;
  // tokei.css({'top': tokeiTop + 'px'});
  // console.log(resizePer);
  // console.log(resizePerT);
});

