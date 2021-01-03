<script src="asset/js/particles.min.js"></script>
<!-- <script src="js/app.js"></script> -->
<script>
window.onload = function() {
Particles.init({
selector: '.background',
color: ['#c31432', '#c31432'],
connectParticles: true,
maxParticles: 180,
speed:2,
sizeVariations:8,
responsive: [{
breakpoint: 800,
options: {
color: '#0050ef',
maxParticles: 300,
sizeVariations:6,
connectParticles: false
}
}]
});
};



</script>