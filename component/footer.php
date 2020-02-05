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
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="js/lightpick.js"></script>
<script>
var picker = new Lightpick({
    field: document.getElementById('daterange'),
    singleDate: false,
    numberOfColumns: 3,
    numberOfMonths: 2,
    inline: false,
    onSelect: function(start, end){
        var str = '';
        var cek = moment(end).add(1, 'days').startOf('day').from(start);
        str += start ? start.format('L') + ' to ' : '';
        str += end ? end.format('L') : '...';
        document.getElementById('daterange').innerHTML = str;
        document.getElementById('durationform').value = cek;
        document.getElementById('berangkat').value = str;
    }
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('.datepicker').datepicker();
});

$(document).ready(function(){
   $('#traveler').modal();
 });

 $(document).ready(function(){
    $('#duration').modal();
  });

  $(document).ready(function(){
     $('#destination').modal();
   });

   $(document).ready(function(){
    $('input.autocomplete').autocomplete({
      data: {
        "Bromo Mountain": null,
        "Madakaripura Waterfall": null,
        "Ranu Agung": null,
        "Pekalen River Rafting": null,
        "Gili ketapang island": null
      },
    });
  });

$(document).ready(function(){
  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();
	  if (scroll > 100) {
	    $(".nav").css("background" , "#01579b");
	  }

	  else{
		  $(".nav").css("background" , "transparent");
	  }
  })
})

function personInc()
{
    var value = parseInt(document.getElementById('personCount').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('personCount').value = value;
    count();
}

function count() {
  var adult = parseInt(document.getElementById('personCount').value, 10);
  var child = parseInt(document.getElementById('childCount').value, 10);
  var sum   = adult+child;
  document.getElementById('person').value = sum+" Person";
  document.getElementById('adult').value = adult;
  document.getElementById('child').value = child;
  document.getElementById('personOrder').value = adult+" Adult | "+child+" Child";
}

function personDec()
{
    var value = parseInt(document.getElementById('personCount').value, 10);
    value = isNaN(value) ? 0 : value;
    if (value <= 0) {
      value = 0;
    } else {
      value--;
    }
    document.getElementById('personCount').value = value;
    count();
}

function childInc()
{
    var value = parseInt(document.getElementById('childCount').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('childCount').value = value;
    count();
}

function childDec()
{
    var value = parseInt(document.getElementById('childCount').value, 10);
    value = isNaN(value) ? 0 : value;
    if (value <= 0) {
      value = 0;
    } else {
      value--;
    }
    document.getElementById('childCount').value = value;
    count();
}

function jemput()
{
    var lokasi = document.getElementById('jemput').value;
    document.getElementById('penjemputan').value = lokasi;
}

</script>
</body>
</html>
