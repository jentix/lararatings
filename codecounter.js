<!-- счётчик -->
<script>
	var p = document.getElementsByTagName("script")[0]
	var i = 6;
	s = document.createElement("script")
	s.type = "text/javascript"
	s.async = true
	s.src = "js/lawatch.js"
	document.body.insertBefore(s, p)

	if (s.readyState && !s.onload) {
		s.onreadystatechange = function() {
			if (s.readyState == "loaded" || s.readyState == "complete") {
				s.onreadystatechange = null;
				watcher.id = i;
				watcher.touch();
			}
		}
	}
	else {
		s.onload = function() {
			watcher.id = i;
			watcher.touch();
		};
	}
</script>