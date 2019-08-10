<!-- inject:js -->
<script src="<?php echo base_url('js/d3.min.js')?>"></script>
<script src="<?php echo base_url('js/getmdl-select.min.js')?>"></script>
<script src="<?php echo base_url('js/material.min.js')?>"></script>
<script src="<?php echo base_url('js/nv.d3.min.js')?>"></script>
<script src="<?php echo base_url('js/layout/layout.min.js')?>"></script>
<script src="<?php echo base_url('js/scroll/scroll.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/charts/discreteBarChart.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/charts/linePlusBarChart.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/charts/stackedBarChart.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/employer-form/employer-form.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/line-chart/line-charts-nvd3.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/map/maps.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/pie-chart/pie-charts-nvd3.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/table/table.min.js')?>"></script>
<script src="<?php echo base_url('js/widgets/todo/todo.min.js')?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js" integrity="sha256-qSIshlknROr4J8GMHRlW3fGKrPki733tLq+qeMCR05Q=" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>

<script type="text/javascript">

window.onload = function() {
  <?php if($_SESSION['msg_body']!=""){ ?>
  Swal.fire({
    type: '<?php echo  $_SESSION['msg_type'];?>',
    title: '<?php echo  $_SESSION['msg_title'];?>',
    text: '<?php echo  $_SESSION['msg_body'];?>',
    footer: '<?php echo  $_SESSION['msg_footer'];?>'
  });

    <?php  $_SESSION['msg_title'] = "";?>
    <?php  $_SESSION['msg_type'] = "";?>
    <?php  $_SESSION['msg_body'] = "";?>
    <?php  $_SESSION['msg_footer'] = "";?>
    <?php } ?>
};

</script>

<script type="text/javascript">
const options = {
  connectTimeout: 1000,
  // Authentication
  clientId: 'client_id_'+ Math.floor((Math.random() * 1000000) + 1),
  username: 'VwaaCMWpQ1uTFJu',
  password: '5F9z2Y46j3SeV5Q',
  keepalive: 60,
  clean: true,
}

// WebSocket connect url
const WebSocket_URL = 'wss://ioticos.org:8094/mqtt';
const client = mqtt.connect(WebSocket_URL, options)


client.on('connect', () => {
  console.log('Connect success');
  client.subscribe('+/#', { qos: 0 }, (error) => {
    if(error){

    }else{

    }

  })
})

client.on('message', (topic, message) => {
  console.log('Mensaje recibido bajo tópico: ', topic, ' -> ', message.toString());
$("#display_output").append("Tópico ⇨ "+topic+" Mensaje ⇨ "+message.toString()+"<br>");
})

client.on('reconnect', (error) => {
  console.log('reconnecting:', error);
  $("#display_status").append("🔵 Reconectando... :(<br>");
})

client.on('error', (error) => {
  console.log('Connect Error:', error);
  $("#display_status").append("🔴 Error en la conexión :(<br>");
})



</script>
<!-- endinject -->
