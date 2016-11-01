var audioElement = document.createElement('audio');

function playTune(tune) {
    audioElement.setAttribute('src', tune);
    audioElement.setAttribute('autoplay', 'autoplay');
    audioElement.addEventListener("load", function() {
        audioElement.play();
    }, true);

}
