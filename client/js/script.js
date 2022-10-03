const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
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


  const realFileBtnAccept = document.getElementById("acceptBtn");
  const realFileBtn = document.getElementById("realfile");
  const realFileBtn2 = document.getElementById("realfile2");
  const realFileBtn3 = document.getElementById("realfile3");
  const realFileBtn4 = document.getElementById("realfile4");
  const realFileBtn5 = document.getElementById("realfile5");
  const realFileBtn6 = document.getElementById("realfile6");

  const customBtn = document.getElementById("custom-button");
  const customBtn2 = document.getElementById("custom-button2");
  const customBtn3 = document.getElementById("custom-button3");
  const customBtn4 = document.getElementById("custom-button4");
  const customBtn5 = document.getElementById("custom-button5");
  const customBtn6 = document.getElementById("custom-button6");

  const customTxt = document.getElementById("custom-text");
  const customTxt2 = document.getElementById("custom-text2");
  const customTxt3 = document.getElementById("custom-text3");
  const customTxt4 = document.getElementById("custom-text4");
  const customTxt5 = document.getElementById("custom-text5");
  const customTxt6 = document.getElementById("custom-text6");

  const customTxtMB = document.getElementById("mb1");
  const customTxtMB2 = document.getElementById("mb2");
  const customTxtMB3 = document.getElementById("mb3");
  const customTxtMB4 = document.getElementById("mb4");
  const customTxtMB5 = document.getElementById("mb5");
  const customTxtMB6 = document.getElementById("mb6");


  customBtn.addEventListener("click", function() {
        realFileBtn.click();
  });
  realFileBtn.addEventListener("change", function(){
    let files = realFileBtn.files;
    var totalBytes = this.files[0].size;

    if (files.length > 0){
      for (var i = 0; i < this.files.length; i++){
         customTxt.style.color="red";
            customTxt.innerHTML = this.files.item(i).name;
            customBtn.innerHTML = "Upload file..";
                  }
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB.innerHTML = 'File exceed 10 mb';
        customTxtMB.style.color = "red";
        customTxt.innerHTML = this.files.item(i).name;
        customTxt.style.color="red";
        return;
      }
    }
    if (totalBytes < 1000000){
      var _size = Math.floor(totalBytes/1000) + ' KB';
    }else {
      var _size = Math.floor(totalBytes/1000000) + ' MB'; 
    }
    
    customTxtMB.innerHTML = _size;
    customTxtMB.style.color = "#808080";
        if (realFileBtn.value) {
            customTxt.style.color = "#4285F4";
            customTxt.innerHTML = this.files.item(i).name;
        } else {
          customTxt.innerHTML = "Application form or duly accompished & sworn/notarized. ";
          customTxt.style.color = "#808080";
        }
  });

  customBtn2.addEventListener("click", function() {
        realFileBtn2.click();
  });
  realFileBtn2.addEventListener("change", function(){
    let files = realFileBtn2.files;
    var totalBytes2 = this.files[0].size;
 for (var i = 0; i < this.files.length; i++){
         customTxt2.style.color="red";
            customTxt2.innerHTML = this.files.item(i).name;
              customBtn2.innerHTML = "Upload file..";
      }

    if (files.length > 0){
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB2.innerHTML = 'File exceed 10 mb';
        customTxtMB2.style.color = "red";
        customTxt2.innerHTML = this.files.item(i).name;
        customTxt2.style.color="red";
        return;
      }
    }

       if (totalBytes2 < 1000000){
      var _size = Math.floor(totalBytes2/1000) + ' KB';
      }else 
      {
      var _size = Math.floor(totalBytes2/1000000) + ' MB'; 
    }

    customTxtMB2.innerHTML = _size;
    customTxtMB2.style.color = "#808080";
        if (realFileBtn2.value) {
            customTxt2.style.color = "#4285F4";
            customTxt2.innerHTML = this.files.item(i).name;
        } else {
          customTxt2.innerHTML = "Lumber Supply Contract/Agreement from legitimate suppliers/subsisting lumber dealer ";
          customTxt2.style.color = "#808080";
        }
  });

    customBtn3.addEventListener("click", function() {
        realFileBtn3.click();
  });
  realFileBtn3.addEventListener("change", function(){
    let files = realFileBtn3.files;
    var totalBytes3 = this.files[0].size;
    for (var i = 0; i < this.files.length; i++){
         customTxt3.style.color="red";
            customTxt3.innerHTML = this.files.item(i).name;
              customBtn3.innerHTML = "Upload file..";
      }
    if (files.length > 0){
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB3.innerHTML = 'File exceed 10 mb';
        customTxtMB3.style.color = "red";
        customTxt3.innerHTML = this.files.item(i).name;
        customTxt3.style.color="red";
        return;
      }
    }

       if (totalBytes3 < 1000000){
      var _size = Math.floor(totalBytes3/1000) + ' KB';
      }else 
      {
      var _size = Math.floor(totalBytes3/1000000) + ' MB'; 
    }

    customTxtMB3.innerHTML = _size;

    customTxtMB3.style.color = "#808080";
        if (realFileBtn3.value) {
            customTxt3.style.color = "#4285F4";
            customTxt3.innerHTML = this.files.item(i).name;
        } else {
          customTxt3.innerHTML = "Mayor's Permit/Business Permit ";
          customTxt3.style.color = "#808080";
        }
  });


   customBtn4.addEventListener("click", function() {
        realFileBtn4.click();
  });
  realFileBtn4.addEventListener("change", function(){
    let files = realFileBtn4.files;
     var totalBytes4 = this.files[0].size;

      for (var i = 0; i < this.files.length; i++){
         customTxt4.style.color="red";
            customTxt4.innerHTML = this.files.item(i).name;
             customBtn4.innerHTML = "Upload file..";
      }

    if (files.length > 0){
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB4.innerHTML = 'File exceed 10 mb';
        customTxtMB4.style.color = "red";
        customTxt4.innerHTML = this.files.item(i).name;
        customTxt4.style.color="red";
        return;
      }
    }
    
       if (totalBytes4 < 1000000){
      var _size = Math.floor(totalBytes4/1000) + ' KB';
      }else 
      {
      var _size = Math.floor(totalBytes4/1000000) + ' MB'; 
    }

    customTxtMB4.innerHTML = _size;

    customTxtMB4.style.color = "#808080";
        if (realFileBtn4.value) {
            customTxt4.style.color = "#4285F4";
            customTxt4.innerHTML = this.files.item(i).name;
        } else {
          customTxt4.innerHTML = "Annual Business Plan ";
          customTxt4.style.color = "#808080";
        }
  });

     customBtn5.addEventListener("click", function() {
        realFileBtn5.click();
  });
  realFileBtn5.addEventListener("change", function(){
    let files = realFileBtn5.files;
      var totalBytes5 = this.files[0].size;
        for (var i = 0; i < this.files.length; i++){
         customTxt5.style.color="red";
            customTxt5.innerHTML = this.files.item(i).name;
             customBtn5.innerHTML = "Upload file..";
      }

    if (files.length > 0){
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB5.innerHTML = 'File exceed 10 mb';
        customTxtMB5.style.color = "red";
        customTxt5.innerHTML = this.files.item(i).name;
        customTxt5.style.color="red";
        return;
      }
    }
  
       if (totalBytes5 < 1000000){
      var _size = Math.floor(totalBytes5/1000) + ' KB';
      }else 
      {
      var _size = Math.floor(totalBytes5/1000000) + ' MB'; 
    }

    customTxtMB5.innerHTML = _size;
    customTxtMB5.style.color = "#808080";
        if (realFileBtn5.value) {
            customTxt5.style.color = "#4285F4";
            customTxt5.innerHTML = this.files.item(i).name;
        } else {
          customTxt5.innerHTML = "Latest Income Tax return ";
          customTxt5.style.color = "#808080";
        }
  });

     customBtn6.addEventListener("click", function() {
        realFileBtn6.click();});
  realFileBtn6.addEventListener("change", function(){
    let files = realFileBtn6.files;
      var totalBytes6 = this.files[0].size;
        for (var i = 0; i < this.files.length; i++){
         customTxt6.style.color="red";
            customTxt6.innerHTML = this.files.item(i).name;
             customBtn6.innerHTML = "Upload file..";
      }
    if (files.length > 0){
      if(files[0].size > 10 * 1024 * 1024){
        customTxtMB6.innerHTML = 'File exceed 10 mb';
        customTxtMB6.style.color = "red";
        customTxt6.innerHTML = this.files.item(i).name;
        customTxt6.style.color="red";
        return;
      }
    }
   
       if (totalBytes6 < 1000000){
      var _size = Math.floor(totalBytes6/1000) + ' KB';
      }else 
      {
      var _size = Math.floor(totalBytes6/1000000) + ' MB'; 
    }

    customTxtMB6.innerHTML = _size;
    customTxtMB6.style.color = "#808080";
        if (realFileBtn6.value) {
            customTxt6.style.color = "#4285F4";
            customTxt6.innerHTML = this.files.item(i).name;
        } else {
          customTxt6.innerHTML = "Proof of ownership of the lumberyard or consent/agreement with the owner ";
          customTxt6.style.color = "#808080";
        }
  });

 $(document).ready(function(){
  $('input[type="file"]').change(function(){
    if( $('#realfile').val() != '' && $('#realfile2').val() != '' && $('#realfile3').val() != ''  && $('#realfile4').val() != ''  
      && $('#realfile5').val() != ''  && $('#realfile6').val() != '')
    {
      $('#acceptBtn').attr('disabled', false);
    }
  });
});

 document.getElementById("acceptBtn").addEventListener("click", function showFileSize() {
    if (!window.FileReader) { 
        console.log("The file API isn't supported on this browser yet.");
        return;
    }
    var input = document.getElementById('realfile');
    if (!input.files) { 
        console.error("This browser doesn't seem to support the `files` property of file inputs.");
    } else {
        var file = input.files[0];
        alert("File " + file.name + " is " + " more than 10 MB in size");
          $('#acceptBtn').attr('disabled', true);
    }

});