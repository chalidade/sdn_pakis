<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="../js/axios.min.js"></script>
    <script src="../js/vue.js"></script>
  </head>
  <body>
    <center>
    <div id="app" style="width:100%;margin:auto;z-index:99">
      <h1 style="text-align:center">Message</h1>
      {{ info }}
    </div>
     <img src="../img/pleasewait1.gif" alt="" style="width:50%;margin:auto;z-index:-1">
     <?php
      header("Refresh: 5; URL=$urlAdmin?id=$page&start=0&page=1");
     ?>
   </center>
  </body>
  <script type="text/javascript">
    var json = <?php echo $data ?>;
    var url = "<?php echo $urlApi ?>";
    new Vue({
        el: '#app',
        data () {
          return {
            info: null
          }
        },
        mounted () {
          axios
          .post(url+'/store', json)
          .then(response => (this.info = response["data"]["message"]))
        }
      })
  </script>
</html>
