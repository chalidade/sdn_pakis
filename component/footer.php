<!--JavaScript at end of body for optimized loading-->
<!-- Vue -->
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

new Vue({
    el: '#pengantar',
    data () {
      return {
        pengantar: null
      }
    },
    mounted () {
      axios
      .post(url+'/index', {
        action: 'list',
        db: 'sdnpakis',
        table: 'tx_home_pengantar',
        start: 0
      })
      .then(response => (this.pengantar = response["data"]["result"]))
    }
  })

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
<script type="text/javascript" src="js/jquery-3.4.1.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</script>
</body>
</html>
