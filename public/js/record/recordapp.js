function restore(){
  $("#record, #live").removeClass("disabled");
  $("#pause").replaceWith('<a class="button one" id="pause">Pause</a>');
  $(".one").addClass("disabled");
  Fr.voice.stop();
}

function makeWaveform(){
  var analyser = Fr.voice.recorder.analyser;

  var bufferLength = analyser.frequencyBinCount;
  var dataArray = new Uint8Array(bufferLength);

  /**
   * The Waveform canvas
   */
  var WIDTH = 500,
      HEIGHT = 200;

  var canvasCtx = $("#level")[0].getContext("2d");
  canvasCtx.clearRect(0, 0, WIDTH, HEIGHT);

  function draw() {
    var drawVisual = requestAnimationFrame(draw);

    analyser.getByteTimeDomainData(dataArray);

    canvasCtx.fillStyle = 'rgb(200, 200, 200)';
    canvasCtx.fillRect(0, 0, WIDTH, HEIGHT);
    canvasCtx.lineWidth = 2;
    canvasCtx.strokeStyle = 'rgb(0, 0, 0)';

    canvasCtx.beginPath();

    var sliceWidth = WIDTH * 1.0 / bufferLength;
    var x = 0;
    for(var i = 0; i < bufferLength; i++) {
      var v = dataArray[i] / 128.0;
      var y = v * HEIGHT/2;

      if(i === 0) {
        canvasCtx.moveTo(x, y);
      } else {
        canvasCtx.lineTo(x, y);
      }

      x += sliceWidth;
    }
    canvasCtx.lineTo(WIDTH, HEIGHT/2);
    canvasCtx.stroke();
  };
  draw();
}

$(document).ready(function(){
  $(document).on("click", "#record:not(.disabled)", function(){
      if($(this).attr('data-action')=='start') {
          Fr.voice.record($("#live").is(":checked"), function(){
              $(".recordButton").addClass("disabled");

              $("#live").addClass("disabled");
              $(".one").removeClass("disabled");

              makeWaveform();
          });
          $(this).closest("div.card").addClass("recVisitButton");
          $(this).addClass("recButton");
          $(this).html('Stop Recording');
          $(this).attr('data-action','pause');
          $(".btn-primary").hide();
          $(".btn-default").hide();
      }else{
          $(this).attr('data-action','start');
          $(this).closest("div.card").removeClass("recVisitButton");
          $(this).removeClass("recButton");
          $(this).html('Start Recording');
          var saverecordname = $("#saverecordname").val() + ".WAV";
          Fr.voice.export(function(url){
              $("<a href='" + url + "' download='"+ saverecordname + "'></a>")[0].click();
          }, "URL");
          // function upload(blob){
          //     var formData = new FormData();
          //     formData.append('fname', 'test.wav');
          //     formData.append('data', blob);
          //     $.ajax({
          //         headers: {
          //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          //         },
          //         url: $("#saverecurl").val(),
          //         type: 'POST',
          //         data: formData,
          //         processData: false,
          //         contentType: false,
          //         success: function(filename) {
          //             $("#recordFile").val(filename);
          //         }
          //     });
          // }
          // Fr.voice.export(upload, "blob");
          restore();
          $(".btn-primary").show();
          $(".btn-default").show();
      }
  });

  $(document).on("click", "#recordFor5:not(.disabled)", function(){
    Fr.voice.record($("#live").is(":checked"), function(){
      $(".recordButton").addClass("disabled");

      $("#live").addClass("disabled");
      $(".one").removeClass("disabled");

      makeWaveform();
    });

    Fr.voice.stopRecordingAfter(5000, function(){
      alert("Recording stopped after 5 seconds");
    });
  });

  $(document).on("click", "#pause:not(.disabled)", function(){
    if($(this).hasClass("resume")){
      Fr.voice.resume();
      $(this).replaceWith('<a class="button one" id="pause">Pause</a>');
    }else{
      Fr.voice.pause();
      $(this).replaceWith('<a class="button one resume" id="pause">Resume</a>');
    }
  });

  $(document).on("click", "#stop:not(.disabled)", function(){
    restore();
  });

  $(document).on("click", "#play:not(.disabled)", function(){
    if($(this).parent().data("type") === "mp3"){
      Fr.voice.exportMP3(function(url){
        $("#audio").attr("src", url);
        $("#audio")[0].play();
      }, "URL");
    }else{
      Fr.voice.export(function(url){
        $("#audio").attr("src", url);
        $("#audio")[0].play();
      }, "URL");
    }
    restore();
  });

  $(document).on("click", "#download:not(.disabled)", function(){
      Fr.voice.export(function(url){
          $("<a href='" + url + "' download='MyRecording.wav'></a>")[0].click();
      }, "URL");
    restore();
  });

  $(document).on("click", "#base64:not(.disabled)", function(){
      Fr.voice.export(function(url){
        console.log("Here is the base64 URL : " + url);
        alert("Check the web console for the URL");

        $("<a href='"+ url +"' target='_blank'></a>")[0].click();
      }, "base64");
     restore();
  });

  $(document).on("click", "#save:not(.disabled)", function(){
    function upload(blob){
      var formData = new FormData();
        formData.append('fname', 'test.wav');
        formData.append('data', blob);
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        url: $("#saverecurl").val(),
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(filename) {
              $("#recordFile").val(filename);
        }
      });
    }
   Fr.voice.export(upload, "blob");
   restore();
  });
});
