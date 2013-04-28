#! /usr/bin/nodejs

uglifyjs ./public/static/js/libs/gumby.min.js \
	 ./public/static/js/plugins.js \
	 ./public/static/js/main.js \
	 -o ./public/static/js/app.min.js
	 --source-map ./public/static/js/app.src.js.map \
	 --source-map-root http://fideloper.com/static/js \
	 -c -m
