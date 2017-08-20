
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../vendors/bs-simple-admin/assets/js/custom');
require('../../vendors/summernote/summernote');

$(document).ready(function() {
    $('#summernote').summernote();
});

/*window.Vue = require('vue');

/!**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 *!/

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data: {
        name: '',
    }
});*/


function translit(text){

    var arrru = new Array ('Я','я','Ю','ю','Ч','ч','Ш','ш','Щ','щ','Ж','ж','А','а','Б','б','В','в','Г','г','Д','д','Е','е','Ё','ё','З','з','И','и','Й','й','К','к','Л','л','М','м','Н','н', 'О','о','П','п','Р','р','С','с','Т','т','У','у','Ф','ф','Х','х','Ц','ц','Ы','ы','Ь','ь','Ъ','ъ','Э','э');
    var arren = new Array ('Ya','ya','Yu','yu','Ch','ch','Sh','sh','Sh','sh','Zh','zh','A','a','B','b','V','v','G','g','D','d','E','e','E','e','Z','z','I','i','J','j','K','k','L','l','M','m','N','n', 'O','o','P','p','R','r','S','s','T','t','U','u','F','f','H','h','C','c','Y','y','','','','','E', 'e');

    for(var i=0; i<arrru.length; i++){
        var reg = new RegExp(arrru[i], "g");
        text = text.replace(reg, arren[i]);
    }
    return text;
}

var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();

$('input[name="name"]').keyup(function(){
    delay(function(){
        var url = $('input[name="name"]').val();
        var old_url = $('input[name="url"]').data('url');
        url = translit(url);
        url = url.replace(/\s/g, '-').toLowerCase();
        $('input[name="url"]').val(url);
        $.ajax({
            url: 'http://topin/api/' + resource + '/' + url,
            dataType: "json",
            success: function(data) {
                if (data.free == true){
                    $('input[name="url"]').closest('.form-group').removeClass('has-error');
                } else if (url != old_url)  {
                    $('input[name="url"]').closest('.form-group').addClass('has-error');
                }
            }
        });
    }, 500);
});

$('input[name="url"]').keyup(function(){
    delay(function(){
        var url = $('input[name="url"]').val();
        var old_url = $('input[name="url"]').data('url');
        $.ajax({
            url: 'http://topin/api/' + resource + '/' + url,
            dataType: "json",
            success: function(data) {
                if (data.free == true){
                    $('input[name="url"]').closest('.form-group').removeClass('has-error');
                } else if (url != old_url)  {
                    $('input[name="url"]').closest('.form-group').addClass('has-error');
                }
            }
        });
    }, 500);
});