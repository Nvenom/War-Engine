<?php
include 'twilio/Twilio/Capability.php';
 
        $accountSid = 'ACd0b273c5eb786da29d609dd6652f746f';
        $authToken  = 'ad9e6135123b28779057d902b3551fde';
        $appSid     = 'AP6f03728dcfc64ec5d2a97e971f376ba1';
 
$clientName = $_GET['c'];

if (isset($_REQUEST['client'])) {
    $clientName = $_REQUEST['client'];
}
 
$capability = new Services_Twilio_Capability($accountSid, $authToken);
$capability->allowClientOutgoing($appSid);
$capability->allowClientIncoming($clientName);
$token = $capability->generateToken();
?>
 
<!DOCTYPE html>
<html>
  <head>
    <title>Hello Client Monkey 6</title>
    <script type="text/javascript" src="https://static.twilio.com/libs/twiliojs/1.1/twilio.min.js"></script>
	<script src='../c-controller.js'></script>
    <Style>
	body {
  text-align: center;
  margin: 0;
  background: url(logo.png) top center no-repeat, url(whitey.png) center top repeat;
}

#log {
  width: 466px;
  height: 25px;
  background: #404040;
  padding: 10px;
  /*margin-left: -243px;*/
  margin: 25px auto 0 auto;
  border: 1px solid #d4d4d4;
  text-decoration: none;
  font:18px/normal sans-serif;
  color: white;
  white-space: nowrap;
  outline: none;
  background-color: #404040;
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#000), to(#404040));
  background-image: -moz-linear-gradient(#000, #404040);
  background-image: -o-linear-gradient(#000, #404040);
  background-image: linear-gradient(#000, #404040);
  -webkit-background-clip: padding;
  -moz-background-clip: padding;
  -o-background-clip: padding-box;
  /*background-clip: padding-box;*/ /* commented out due to Opera 11.10 bug */
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  line-height: 25px;
  border-radius: 5px;
  /* IE hacks */
  zoom: 1;
  *display: inline;
}

#people {
    position:fixed;
    bottom:0px;
    right: 0px;
    height:100%;
    width:200px;
    margin: 0;
    padding: 0;
    list-style: none;
    font-family:'Helvetica','Arial';
    text-align: left;
    background-color:#ee0000 !important;
    border:none !important;
    overflow: auto;
    overflow-x: hidden;

}

#people li {
    position:relative;
    width: 100%;
    display:block;
    color:#eee !important;
    background-color:#ff0000!important;
    border:solid 1px #ee0000 !important;
    padding: 0.5em 0 0.5em 1em;
    background: #f7f2ea;
    cursor: pointer;
}

#people li:HOVER {
    color: #fff;
    background-color:#dd0000!important;
}

#people li:ACTIVE {
    color: #fff;
    background-color:#C00 !important;
}




/* ------------------------------------------
CSS3 GITHUB BUTTONS (Nicolas Gallagher)
Licensed under Unlicense
http://github.com/necolas/css3-github-buttons
------------------------------------------ */


/* ------------------------------------------------------------------------------------------------------------- BUTTON */

button.call, button.hangup, input {
    -moz-box-shadow: 1px 2px 10px #BBB;
    -webkit-box-shadow: 1px 2px 10px #BBB;
    box-shadow: 1px 2px 10px #BBB;
}

button.call, button.hangup {
    position: relative;
    overflow: visible;
    display: inline-block;
    padding: 0.5em 1em;
    border: 1px solid #d4d4d4;
    margin: 300px 0 0 0;
    text-decoration: none;
    text-shadow: 1px 1px 0 #fff;
    font:35px/normal sans-serif;
    font-weight: bold;
    color: #333;
    white-space: nowrap;
    cursor: pointer;
    outline: none;
    background-color: #ececec;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f4f4f4), to(#ececec));
    background-image: -moz-linear-gradient(#f4f4f4, #ececec);
    background-image: -o-linear-gradient(#f4f4f4, #ececec);
    background-image: linear-gradient(#f4f4f4, #ececec);
    -webkit-background-clip: padding;
    -moz-background-clip: padding;
    -o-background-clip: padding-box;
    /*background-clip: padding-box;*/ /* commented out due to Opera 11.10 bug */
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    /* IE hacks */
    zoom: 1;
    *display: inline;
}

button.call:hover,
button.call:focus,
button.call:active,
button.call.active,
button.hangup:hover,
button.hangup:focus,
button.hangup:active,
button.hangup.active {
    border-color: #3072b3;
    border-bottom-color: #2a65a0;
    text-decoration: none;
    text-shadow: -1px -1px 0 rgba(0,0,0,0.3);
    color: #fff;
    background-color: #3C8DDE;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ff0000), to(#dd0000));
    background-image: -moz-linear-gradient(#599bdc, #3072b3);
    background-image: -o-linear-gradient(#599bdc, #3072b3);
    background-image: linear-gradient(#599bdc, #3072b3);
}

button.call:active,
button.call.active,
button.hangup:active,
button.hangup.active {
    border-color: #2a65a0;
    border-bottom-color: #3884CF;
    background-color: #3072b3;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#3072b3), to(#599bdc));
    background-image: -moz-linear-gradient(#3072b3, #599bdc);
    background-image: -o-linear-gradient(#3072b3, #599bdc);
    background-image: linear-gradient(#3072b3, #599bdc);
}

/* overrides extra padding on button elements in Firefox */
button.call::-moz-focus-inner,
button.hangup::-moz-focus-inner {
    padding: 0;
    border: 0;
}

input {
  display: block;
  margin: 25px auto 0 auto;
  outline: none;
  border: 1px solid #999;
  line-height: 1.4em;
  font-size: 24px;
  padding: 10px;
  width: 466px;
}

/* ............................................................................................................. Icons */

button.call:before,
button.hangup:before {
    content: "";
    position: relative;
    top: 1px;
    float:left;
    width: 44px;
    height: 37px;
    margin: 0 0.75em 0 -0.25em;
    background: url(buttons.png) 0 99px no-repeat;
}

button.call:before { background-position: 0 -48px; }
button.call:hover:before,
button.call:focus:before,
button.call:active:before { background-position: 0 0; }

button.hangup {
   margin-left: 25px;
}

button.hangup:before { background-position: 0 -131px; }
button.hangup:hover:before,
button.hangup:focus:before,
button.hangup:active:before { background-position: 0 -88px; }
	</style>
    <script type="text/javascript">
 
      Twilio.Device.setup("<?php echo $token; ?>");
 
      Twilio.Device.ready(function (device) {
        $("#log").text("Client '<?php echo $clientName ?>' is ready");
      });
 
      Twilio.Device.error(function (error) {
        $("#log").text("Error: " + error.message);
      });
 
      Twilio.Device.connect(function (conn) {
        $("#log").text("Successfully established call");
      });
 
      Twilio.Device.disconnect(function (conn) {
        $("#log").text("Call ended");
      });
 
      Twilio.Device.incoming(function (conn) {
        $("#log").text("Incoming connection from " + conn.parameters.From);
        // accept the incoming connection and start two-way audio
        conn.accept();
      });
 
      Twilio.Device.presence(function (pres) {
        if (pres.available) {
          // create an item for the client that became available
          $("<li>", {id: pres.from, text: pres.from}).click(function () {
            $("#number").val(pres.from);
            call();
          }).prependTo("#people");
        }
        else {
          // find the item by client name and remove it
          $("#" + pres.from).remove();
        }
      });
 
      function call() {
        // get the phone number or client to connect the call to
        params = {"PhoneNumber": $("#number").val()};
        Twilio.Device.connect(params);
      }
 
      function hangup() {
        Twilio.Device.disconnectAll();
      }
    </script>
  </head>
  <body>
    <button class="call" onclick="call();">
      Call
    </button>
 
    <button class="hangup" onclick="hangup();">
      Hangup
    </button>
 
    <input type="text" id="number" name="number"
      placeholder="Enter a phone number or client to call"/>
 
    <div id="log">Loading pigeons...</div>
 
    <ul id="people"/>
  </body>
</html>