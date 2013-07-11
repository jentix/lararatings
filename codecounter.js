<!--frya.raiting-->
<script>
    var i = 1;
    s = document.createElement("script");
    s.type = "text/javascript";
    s.async = true;
    s.src = "http://rating.fryazino.net/js/lawatch.js";
    document.getElementsByTagName("head")[0].appendChild(s);
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