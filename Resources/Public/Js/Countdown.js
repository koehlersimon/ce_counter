document.addEventListener('DOMContentLoaded',function(){

    let countdownInstances = document.querySelectorAll('.tx-cecountdown');

    if(countdownInstances){
        let countdownInterval = setInterval(function(){
            let now = new Date().getTime();
            countdownInstances.forEach((countdownInstance, i) => {

                let countDownTime = new Date((countdownInstance.getAttribute('data-time') * 1000));
                let displayTime;

                if(countDownTime > now){
                    displayTime = countDownTime - now;
                }
                else{
                    displayTime = now - countDownTime;
                }

                let days = Math.floor(displayTime / (1000 * 60 * 60 * 24));
                let hours = Math.floor((displayTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((displayTime % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((displayTime % (1000 * 60)) / 1000);

                if(countdownInstance.hasAttribute('data-initialized') === false){
                    countdownInstance.querySelector('.days').innerHTML = days + "d ";
                    countdownInstance.querySelector('.hours').innerHTML = hours + "h ";
                    countdownInstance.querySelector('.mins').innerHTML = minutes + "m ";
                    countdownInstance.setAttribute('data-initialized','true');
                }

                countdownInstance.querySelector('.secs').innerHTML = seconds + "s ";

                if(seconds === 1 || seconds === 59){
                    countdownInstance.querySelector('.mins').innerHTML = minutes + "m ";
                }

            });
        }, 1000);
    }

});
