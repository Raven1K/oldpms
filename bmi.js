function calcBmi() {
    var weight = document.BMIcalc.weight.value
    var height = document.BMIcalc.height.value
    if(weight > 0 && height > 0){	
    var finalBmi = weight/(height*height)
    document.BMIcalc.bmi.value = finalBmi.toFixed(3);
    if(finalBmi < 18.5){
    document.BMIcalc.meaning.value = "You are UNDERWEIGHT! \nLow (but risk to clinical problems increased)"
        }
    if(finalBmi > 18.5 && finalBmi < 25){
    document.BMIcalc.meaning.value = "You are HEALTHY! \nAverage or Normal BMI"
        }
    if(finalBmi > 25 &&  finalBmi <30){
    document.BMIcalc.meaning.value = "You are OVERWEIGHT! - PRE-OBESE \n(Increased Comorbidity Risk)"
        }
    if(finalBmi > 30 &&  finalBmi <35){
    document.BMIcalc.meaning.value = "You are OVERWEIGHT! - OBESE Class 1 \n(Moderate Comorbidity Risk)"
        }
    if(finalBmi > 35 &&  finalBmi <40){
    document.BMIcalc.meaning.value = "You are OVERWEIGHT! - OBESE Class 2 \n(Severe Comorbidity Risk)"
        }
    if(finalBmi > 40){
    document.BMIcalc.meaning.value = "You are OVERWEIGHT! - OBESE Class 3 \n (Very Severe Comorbidity Risk)"
        }
        }
        else{
        alert("Please Enter Correct Format")
        }
    
        }