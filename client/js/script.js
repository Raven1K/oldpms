const s1 = document.getElementById("suggest1");
const s2 = document.getElementById("suggest2");
const s3 = document.getElementById("suggest3");

function myFunction() {
 document.getElementById("chatbox").value = "What is your name?";
}

function myFunction2() {
 document.getElementById("chatbox").value = "Can you help me?";
}

function myFunction3() {
 document.getElementById("chatbox").value = "How to file application?";
}


var messages = [], 
  lastUserMessage = "", 
  UserName = "You", 
  botMessage = "",
  botName = ' OLDPMS Bot', 
  talking = true;

function chatbotResponse() {
  talking = true;
  const confused = ["I'm confused","I don't know what you're saying","try again with another words"]
  botMessage = confused[Math.floor(Math.random()*(confused.length))];; //the default message

  if (lastUserMessage === 'hi' || lastUserMessage =='hello' || lastUserMessage =='hey') {
    const hi = ['Hello there! How can I help you today?','Welcome to OLDPMS Chat! May I help you?', 'Hello, thank you for visiting our website. How can we assist you?']
    botMessage = hi[Math.floor(Math.random()*(hi.length))];;
  }

  if (lastUserMessage === 'What is your name?') {
    botMessage = 'My name is ' + botName + " and I'm your assistant for today!";
  }

if (lastUserMessage === 'Can you help me?') {
    botMessage = "pwede";
  }

if (lastUserMessage === 'How to file application?') {
    botMessage = "wala ko kabalo";
  }

}

function newEntry() {
  if (document.getElementById("chatbox").value != "") {
    lastUserMessage = document.getElementById("chatbox").value;
    document.getElementById("chatbox").value = "";
    messages.push("<b>" + `<div style="font-weight: 600">${UserName+ ":</b> "}</div>` + lastUserMessage);
    chatbotResponse();
    messages.push("<b>" + `<div style="color:#055C9D; font-weight: 600"><i class="fa-solid fa-user"></i>${botName+ ":</b> "}</div>` + botMessage);
    Speech(botMessage);
    for (var i = 1; i < 8; i++) {
      if (messages[messages.length - i])
        document.getElementById("chatlog" + i).innerHTML = messages[messages.length - i];
    }
  }
}

function Speech(say) {
  if ('speechSynthesis' in window && talking) {
    var utterance = new SpeechSynthesisUtterance(say);
    speechSynthesis.speak(utterance);
  }  
}

document.onkeypress = keyPress;
function keyPress(e) {
  var x = e || window.event;
  var key = (x.keyCode || x.which);
  if (key == 13 || key == 3) {
     newEntry();
  }
  if (key == 38) {
    console.log('hi')
      
  }
}

function placeHolder() {
  document.getElementById("chatbox").placeholder = "Hi there! Type here to talk to me.";
}

  $(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});

const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const newBtns = document.querySelectorAll(".new-btn");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

newBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    $(document).ready(function() {
        var text_value = $('input[name="num"]').val();
        if(text_value == '') {
            alert('Required field cannot be empty!');
             document.getElementById("lumberd").style.borderColor="#ff0000"
             document.getElementById("refno").style.visibility = 'visible';
             document.getElementById("lumberd").focus({focusVisible: true});
             return;
        } else {
          formStepsNum++;
          updateFormSteps();
          updateProgressbar();

        }
  
});
  });
});

nextBtns.forEach((btn) => {
   btn.addEventListener("click", () => {
    $(document).ready(function() {
        var firstnames = $('input[name="perm_fname"]').val();
        var lastnames = $('input[name="perm_lname"]').val();
        var text_value = $('input[name="bussiness_name"]').val();
        var text_value2 = $('input[name="zips"]').val();
        var text_value3 = $('input[name="purok"]').val();
 if(firstnames === "" && lastnames === "" && text_value === "" && text_value2 === "" && text_value3 === "") {
            alert('Required field cannot be empty!');
           $("#firstn").addClass('custborder');
           $("#lastn").addClass('custborder');
           $("#bname").addClass('custborder');
           $("#zip").addClass('custborder');
           $("#street").addClass('custborder');
            return;
        }
        // else {
        //    $("#firstn").removeClass('custborder');
        //    $("#lastn").removeClass('custborder');
        //    $("#bname").removeClass('custborder');
        //    $("#zip").removeClass('custborder');
        //    $("#street").removeClass('custborder');
        // }
        if(text_value === "") {
            alert('Required field cannot be empty!');
             document.getElementById("bname").style.borderColor="#ff0000"
             return;
        }else  if(text_value2 === "") {
            alert('Required field cannot be empty!');
             document.getElementById("zip").style.borderColor="#ff0000"
             return;
        }else  if(text_value3 === "") {
            alert('Required field cannot be empty!');
             document.getElementById("street").style.borderColor="#ff0000"
             return;
        }else  if(firstnames === "") {
            alert('Required field cannot be empty!');
             document.getElementById("firstn").style.borderColor="#ff0000"
             return;
        }else  if(lastnames === "") {
            alert('Required field cannot be empty!');
             document.getElementById("lastn").style.borderColor="#ff0000"
             return;
        } else {
         
          formStepsNum++;
          updateFormSteps();
          updateProgressbar();

        }
  
});
  });
});


prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}




 document.getElementById("acceptBtn").addEventListener("click", function showFileSize() {
   var toastTrigger = document.getElementById("acceptBtn")
  var toastLiveExample = document.getElementById("liveToast")
    //
  var toastTrigger = document.getElementById("acceptBtn")
  var toastLiveExample = document.getElementById("liveToast")

if (toastTrigger) {
  toastTrigger.addEventListener('click', function () {
    var toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
  })
}

});
