document.addEventListener('DOMContentLoaded',function(){

    let countdownInstances = document.querySelectorAll('.tx-cecountdown');

    if(countdownInstances){
        let countdownInterval = setInterval(function(){
            let now = new Date().getTime();
            countdownInstances.forEach((countdownInstance, i) => {
                let countDownTime = new Date((countdownInstance.getAttribute('data-countdown') * 1000));
                let timeleft = countDownTime - now;
                var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
                countdownInstance.querySelector('.days').innerHTML = days + "d ";
                countdownInstance.querySelector('.hours').innerHTML = hours + "h ";
                countdownInstance.querySelector('.mins').innerHTML = minutes + "m ";
                countdownInstance.querySelector('.secs').innerHTML = seconds + "s ";
            });
        }, 1000);
    }

});
