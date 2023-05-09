
<p class="text-center" style="margin-top: 5%">
	Reviewed by <b>HHN Team</b>
</p>

<script>

var mysidebar = document.getElementById("mysidebar");

var overlayBg = document.getElementById("myOverlay");


// class="w3-sidebar w3-collapse w3-animate-left" style="z-index:3;width:300px;"


function w3_open() {
    if (mysidebar.style.display === 'block') {
        mysidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mysidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    // document.getElementById('mysidebar').style.width = "0";
    console.log(mysidebar);
    mysidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>
</body>
</html>
