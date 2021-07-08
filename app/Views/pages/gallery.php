<link rel="stylesheet" href="/asset/css/lightgallery-bundle.min.css">
<script src="/asset/js/lightgallery.umd.js" charset="utf-8"></script>
<script src="/asset/js/lg-thumbnail.umd.js"></script>
<script src="/asset/js/lg-zoom.umd.js"></script>
<style>
body{
 background: #C6FFDD;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #f7797d, #FBD786, #C6FFDD);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #f7797d, #FBD786, #C6FFDD); 
}
.wrapper{
    min-height:100vh;
    margin-top:100px;
}
</style>

<div class="wrapper ">
<div class="gallery-container row d-flex align-items-center justify-content-center" id="gallery-container">

<a data-lg-size="1400-1400" class="gallery-item mx-1" data-src="/asset/img/gal1.jpg" data-sub-html="<h4>Photo: INDUSTRIAL IV 2019</h4> ">
  <img class="img-fluid" src="/asset/img/gal1.jpg"  width="400px"/>
</a>
<a data-lg-size="1400-1400" class="gallery-item mx-1" data-src="/asset/img/gal2.jpg" data-sub-html="<h4>Photo: COLLEGE INAGURATION</h4> ">
  <img class="img-fluid" src="/asset/img/gal2.jpg"  width="400px"/>
</a>
<a data-lg-size="1400-1400" class="gallery-item mx-1" data-src="/asset/img/gal5.jpg" data-sub-html="<h4>Photo: COLLEGE NSS CAMP 2020</h4> ">
  <img class="img-fluid" src="/asset/img/gal5.jpg"  width="400px"/>
</a>
<a data-lg-size="1400-1400" class="gallery-item mx-1" data-src="/asset/img/gal6.jpg" data-sub-html="<h4>Photo: BlackBoard</h4> ">
  <img class="img-fluid" src="/asset/img/gal6.jpg"  width="400px"/>
</a>
<a data-lg-size="1400-1400" class="gallery-item mx-1" data-src="/asset/img/gal7.webp" data-sub-html="<h4>Photo: Students</h4> ">
  <img class="img-fluid" src="/asset/img/gal7.webp"  width="400px"/>
</a>
<a data-lg-size="1400-1400" class="gallery-item mx-1" data-src="/asset/img/gal8.jpg" data-sub-html="<h4>Photo: Library</h4> ">
  <img class="img-fluid" src="/asset/img/gal8.jpg"  width="400px"/>
</a>
<a data-lg-size="1400-1400" class="gallery-item mx-1" data-src="/asset/img/gal9.webp" data-sub-html="<h4>Photo: Books</h4> ">
  <img class="img-fluid" src="/asset/img/gal9.webp"  width="400px"/>
</a>
</div>
</div>


<script type="text/javascript">
  lightGallery(document.getElementById("gallery-container"), {
  speed: 500,
    plugins: [lgThumbnail,lgZoom]
});

</script>