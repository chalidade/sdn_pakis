<div class="slide-one-item home-slider owl-carousel" id="slider">
  <div class="site-blocks-cover inner-page overlay" v-bind:style="'background:url(admin/resource/public/Slider/'+info[0].SLIDER_IMG+');background-size:cover'" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-6 text-center" data-aos="fade">
          <h1 class="font-secondary font-weight-bold text-uppercase" style="color:#fff">{{info[0].SLIDER_TITLE}}</h1>
          <h6 style="color:#fff">{{info[0].SLIDER_DESC}}</h6>
        </div>
      </div>
    </div>
  </div>

  <div class="site-blocks-cover inner-page overlay" v-bind:style="'background:url(admin/resource/public/Slider/'+info[1].SLIDER_IMG+');background-size:cover'" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-6 text-center" data-aos="fade">
          <h1 class="font-secondary font-weight-bold text-uppercase" style="color:#fff">{{info[1].SLIDER_TITLE}}</h1>
          <h6 style="color:#fff">{{info[1].SLIDER_DESC}}</h6>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
var url = "<?php echo $urlApi; ?>";
new Vue({
    el: '#slider',
    data () {
      return {
        info: null
      }
    },
    mounted () {
      axios
      .post(url+'/index', {
        action: 'list',
        db: 'sdnpakis',
        table: 'tx_home_slider',
        start: 0
      })
      .then(response => (this.info = response["data"]["result"]))
    }
  })
</script>
