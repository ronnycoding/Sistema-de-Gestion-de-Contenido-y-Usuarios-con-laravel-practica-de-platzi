var elixir = require('laravel-elixir');


elixir(function(mix) {
    mix.sass('app.scss')
    	.version(['public/css/app.css']);
    mix.scripts([
			'node_modules/jquery/dist/jquery.min.js',
			'resources/assets/js/tether.js',
			'node_modules/bootstrap/dist/js/bootstrap.min.js',
			'resources/assets/js/app.js'
                 ], 'public/js/app.js',
                 './');
});