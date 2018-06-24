#!/bin/bash

# Run with base URL. i.e. http://localhost:8080/index.php/

RENDER_FOLDER="docs/";
BASE_URL="$1";

/usr/bin/curl $BASE_URL > "${RENDER_FOLDER}/index.html";

for page in 'about.html' 'how-to-order.html' 'get-involved.html'
do
	echo /usr/bin/curl -q "${BASE_URL}${page}" > "${RENDER_FOLDER}${page}";
	/usr/bin/curl -q "${BASE_URL}${page}" > "${RENDER_FOLDER}${page}";
done

for publicOb in public/*
do
	if [[ $publicOb != *.php ]]
       	then
		echo $publicOb;
		cp -r $publicOb $RENDER_FOLDER;
	fi
done
