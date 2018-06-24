function resizeVideos() {
	document.querySelectorAll(".card .video-holder video").forEach(function(el) {
		el.style.width = el.parentElement.clientHeight * 426/320 + "px";
	});
}

document.addEventListener("resize", resizeVideos);
resizeVideos();
