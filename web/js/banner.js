/**
 * Created by Admin on 12.05.2016.
 */
var _banner = null;
var _currentBanner = null;
var _prevBanner = null;
var _nextBanner = null;

$(document).ready(function () {
    $('.banner-main').css('background', 'url("../' + $('.banner-main .active').attr('data-path') + '") no-repeat top center');
    setInterval(function(){nextBanner()}, 6000);
});

function prevBanner() {
    _banner = $('.banner-main .active');

    _currentBanner = $('div[data-id=' + _banner.attr('data-id') + ']');
    _prevBanner = $('div[data-id=' + _banner.attr('data-prev') + ']');

    $('.banner-main').css('background', 'url("../' + _prevBanner.attr('data-path') + '") no-repeat top center');
    _currentBanner.removeClass('active');
    _prevBanner.addClass('active');
}

function nextBanner() {
    _banner = $('.banner-main .active');

    _currentBanner = $('div[data-id=' + _banner.attr('data-id') + ']');
    _nextBanner = $('div[data-id=' + _banner.attr('data-next') + ']');

    $('.banner-main').css('background', 'url("../' + _nextBanner.attr('data-path') + '") no-repeat top center');
    _currentBanner.removeClass('active');
    _nextBanner.addClass('active');
}