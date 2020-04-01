<div class="slant-1"></div>
<div class="site-section first-section" id="fasilitas">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center" data-aos="fade">
        <!-- <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services</span> -->
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Fasilitas Sekolah</h2>
      </div>
    </div>
    <div class="row border-responsive">
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
        <div class="text-center">
          <span class="flaticon-box display-4 d-block mb-3 text-primary"></span>
          <h3 class="text-uppercase h4 mb-3">{{fasilitas[0].FASILITAS_TITLE}}</h3>
          <p style="text-align:justify;">{{fasilitas[0].FASILITAS_DESC}}</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
        <div class="text-center">
          <span class="flaticon-line-chart display-4 d-block mb-3 text-primary"></span>
          <h3 class="text-uppercase h4 mb-3">{{fasilitas[1].FASILITAS_TITLE}}</h3>
          <p style="text-align:justify;">{{fasilitas[1].FASILITAS_DESC}}</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center">
          <span class="flaticon-bar-chart display-4 d-block mb-3 text-primary"></span>
          <h3 class="text-uppercase h4 mb-3">{{fasilitas[2].FASILITAS_TITLE}}</h3>
          <p style="text-align:justify;">{{fasilitas[2].FASILITAS_DESC}}</p>
        </div>
      </div>
    </div>
    <div class="row border-responsive" style="margin-top:30px;">
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
        <div class="text-center">
          <span class="flaticon-target display-4 d-block mb-3 text-primary"></span>
          <h3 class="text-uppercase h4 mb-3">{{fasilitas[3].FASILITAS_TITLE}}</h3>
          <p style="text-align:justify;">{{fasilitas[3].FASILITAS_DESC}}</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
        <div class="text-center">
          <span class="flaticon-settings display-4 d-block mb-3 text-primary"></span>
          <h3 class="text-uppercase h4 mb-3">{{fasilitas[4].FASILITAS_TITLE}}</h3>
          <p style="text-align:justify;">{{fasilitas[4].FASILITAS_DESC}}</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center">
          <span class="flaticon-medal display-4 d-block mb-3 text-primary"></span>
          <h3 class="text-uppercase h4 mb-3">{{fasilitas[5].FASILITAS_TITLE}}</h3>
          <p style="text-align:justify;">{{fasilitas[5].FASILITAS_DESC}}</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
var url = "<?php echo $urlApi; ?>";
new Vue({
    el: '#fasilitas',
    data () {
      return {
        fasilitas: null
      }
    },
    mounted () {
      axios
      .post(url+'/index', {
        action: 'list',
        db: 'sdnpakis',
        table: 'tx_home_fasilitas',
        start: 0
      })
      .then(response => (this.fasilitas = response["data"]["result"]))
    }
  })
</script>
